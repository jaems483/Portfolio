<?php
/**
 * Professional Email Handler
 * Handles secure email submissions from the contact form
 */

// Set JSON response header
header('Content-Type: application/json');

// Enable error reporting for development (disable in production)
ini_set('display_errors', 0);
error_reporting(E_ALL);

// Start session for rate limiting
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Response Helper
 */
function sendResponse($success, $message = '', $data = []) {
    http_response_code($success ? 200 : 400);
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}

/**
 * Rate Limiting - Allow max 3 emails per hour per IP
 */
function checkRateLimit() {
    $clientIP = $_SERVER['REMOTE_ADDR'];
    $sessionKey = 'email_submissions_' . $clientIP;
    
    if (!isset($_SESSION[$sessionKey])) {
        $_SESSION[$sessionKey] = [
            'count' => 0,
            'timestamp' => time()
        ];
    }
    
    $now = time();
    $difference = $now - $_SESSION[$sessionKey]['timestamp'];
    
    // Reset count if more than 1 hour has passed
    if ($difference > 3600) {
        $_SESSION[$sessionKey]['count'] = 0;
        $_SESSION[$sessionKey]['timestamp'] = $now;
    }
    
    // Check if limit exceeded (3 emails per hour)
    if ($_SESSION[$sessionKey]['count'] >= 3) {
        return false;
    }
    
    // Increment counter
    $_SESSION[$sessionKey]['count']++;
    
    return true;
}

/**
 * Input Validation
 */
function validateInput($data) {
    $errors = [];
    
    // Name validation
    if (empty($data['name'])) {
        $errors['name'] = 'Name is required';
    } elseif (strlen($data['name']) < 2) {
        $errors['name'] = 'Name must be at least 2 characters';
    } elseif (strlen($data['name']) > 100) {
        $errors['name'] = 'Name must not exceed 100 characters';
    }
    
    // Email validation
    if (empty($data['email'])) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }
    
    // Subject validation
    if (empty($data['subject'])) {
        $errors['subject'] = 'Subject is required';
    } elseif (strlen($data['subject']) < 3) {
        $errors['subject'] = 'Subject must be at least 3 characters';
    } elseif (strlen($data['subject']) > 100) {
        $errors['subject'] = 'Subject must not exceed 100 characters';
    }
    
    // Message validation
    if (empty($data['message'])) {
        $errors['message'] = 'Message is required';
    } elseif (strlen($data['message']) < 10) {
        $errors['message'] = 'Message must be at least 10 characters';
    } elseif (strlen($data['message']) > 5000) {
        $errors['message'] = 'Message must not exceed 5000 characters';
    }
    
    return $errors;
}

/**
 * Sanitize Input
 */
function sanitizeInput($data) {
    $sanitized = [];
    $sanitized['name'] = htmlspecialchars(trim($data['name']), ENT_QUOTES, 'UTF-8');
    $sanitized['email'] = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
    $sanitized['subject'] = htmlspecialchars(trim($data['subject']), ENT_QUOTES, 'UTF-8');
    $sanitized['message'] = htmlspecialchars(trim($data['message']), ENT_QUOTES, 'UTF-8');
    
    return $sanitized;
}

/**
 * Main Email Handler
 */

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse(false, 'Invalid request method');
}

// Check rate limit
if (!checkRateLimit()) {
    sendResponse(false, 'Too many submissions. Please try again later.');
}

// Get POST data
$input = [
    'name' => $_POST['name'] ?? '',
    'email' => $_POST['email'] ?? '',
    'subject' => $_POST['subject'] ?? '',
    'message' => $_POST['message'] ?? ''
];

// Validate input
$validationErrors = validateInput($input);
if (!empty($validationErrors)) {
    sendResponse(false, 'Validation failed', $validationErrors);
}

// Sanitize input
$data = sanitizeInput($input);

// Email configuration
$recipientEmail = 'jameskarlsilpao@gmail.com'; // Replace with actual email
$senderName = $data['name'];
$senderEmail = $data['email'];
$subject = 'Portfolio Contact: ' . $data['subject'];

// Create email body with proper formatting
$emailBody = sprintf(
    "You have received a new message from your portfolio website.\n\n" .
    "===========================================\n" .
    "FROM: %s\n" .
    "EMAIL: %s\n" .
    "SUBJECT: %s\n" .
    "===========================================\n\n" .
    "%s\n\n" .
    "===========================================\n" .
    "Sent at: %s\n" .
    "From IP: %s\n" .
    "===========================================\n",
    $senderName,
    $senderEmail,
    $data['subject'],
    $data['message'],
    date('Y-m-d H:i:s'),
    $_SERVER['REMOTE_ADDR']
);

// Email headers
$headers = [
    'From' => "noreply@jameskarlsilpao.com",
    'Reply-To' => $senderEmail,
    'X-Mailer' => 'Portfolio Contact Form',
    'Content-Type' => 'text/plain; charset=UTF-8'
];

$headerString = '';
foreach ($headers as $key => $value) {
    $headerString .= $key . ': ' . $value . "\r\n";
}

// Send email
if (mail($recipientEmail, $subject, $emailBody, $headerString)) {
    sendResponse(
        true,
        'Email sent successfully! I will get back to you soon.'
    );
} else {
    // Log error for debugging
    error_log('Failed to send email from ' . $senderEmail . ' at ' . date('Y-m-d H:i:s'));
    
    sendResponse(
        false,
        'Failed to send email. Please try again later or contact me directly.'
    );
}
?>
