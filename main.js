// Skills Carousel Functionality
const carouselContainer = document.querySelector('.carousel-container');
const skillItems = document.querySelectorAll('.skill-item-carousel');
const dots = document.querySelectorAll('.carousel-dot');

let currentIndex = 0;
let autoRotateTimer;

function updateCarousel() {
    // Remove all classes
    skillItems.forEach((item, index) => {
        item.classList.remove('prev', 'active', 'next');
        
        // Calculate relative position
        let relativeIndex = (index - currentIndex + skillItems.length) % skillItems.length;
        
        if (relativeIndex === 0) {
            item.classList.add('active');
        } else if (relativeIndex === skillItems.length - 1) {
            item.classList.add('prev');
        } else if (relativeIndex === 1) {
            item.classList.add('next');
        }
    });
    
    // Update dots
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === currentIndex);
    });
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % skillItems.length;
    updateCarousel();
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + skillItems.length) % skillItems.length;
    updateCarousel();
}

function goToSlide(index) {
    currentIndex = index;
    updateCarousel();
    resetAutoRotate();
}

function startAutoRotate() {
    autoRotateTimer = setInterval(() => {
        nextSlide();
    }, 4000); // Rotate every 4 seconds
}

function resetAutoRotate() {
    clearInterval(autoRotateTimer);
    startAutoRotate();
}

// Dot navigation
dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        goToSlide(index);
    });
});

// Keyboard navigation
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') {
        prevSlide();
        resetAutoRotate();
    } else if (e.key === 'ArrowRight') {
        nextSlide();
        resetAutoRotate();
    }
});

// Start carousel on load
updateCarousel();
startAutoRotate();

// Contact Modal JavaScript
const modal = document.getElementById('contact-modal');
const contactLinks = document.querySelectorAll('a[href="#contact-section"]');
const closeBtn = document.querySelector('.close');

function openModal() {
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
    AOS.refresh();
}

function closeModal() {
    modal.classList.remove('show');
    document.body.style.overflow = 'auto';
}

contactLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        openModal();
    });
});

closeBtn.addEventListener('click', closeModal);

// Close modal when clicking outside
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        closeModal();
    }
});

// Close modal on Escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('show')) {
        closeModal();
    }
});

// Email Modal Functionality
const emailModal = document.getElementById('email-modal');
const emailTrigger = document.getElementById('email-trigger');
const emailForm = document.getElementById('email-form');
const emailSubmitBtn = document.getElementById('email-submit');
const formStatus = document.getElementById('form-status');
const emailCloseBtn = emailModal.querySelector('.close');

// Validation patterns
const validators = {
    name: (value) => value.trim().length >= 2,
    email: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
    subject: (value) => value.trim().length >= 3,
    message: (value) => value.trim().length >= 10
};

const errorMessages = {
    name: 'Please enter a valid name (at least 2 characters)',
    email: 'Please enter a valid email address',
    subject: 'Subject must be at least 3 characters',
    message: 'Message must be at least 10 characters'
};

function openEmailModal() {
    emailModal.classList.add('show');
    document.body.style.overflow = 'hidden';
    emailForm.reset();
    formStatus.textContent = '';
    formStatus.className = 'form-status';
    document.querySelectorAll('.form-group').forEach(group => group.classList.remove('error'));
    AOS.refresh();
}

function closeEmailModal() {
    emailModal.classList.remove('show');
    document.body.style.overflow = 'auto';
    emailForm.reset();
    formStatus.textContent = '';
    formStatus.className = 'form-status';
}

function validateField(fieldName, value) {
    const isValid = validators[fieldName](value);
    const formGroup = document.getElementById(`sender-${fieldName}`).parentElement;
    const errorSpan = formGroup.querySelector('.error-message');
    
    if (!isValid) {
        formGroup.classList.add('error');
        errorSpan.textContent = errorMessages[fieldName];
    } else {
        formGroup.classList.remove('error');
        errorSpan.textContent = '';
    }
    
    return isValid;
}

function validateForm() {
    const formData = {
        name: document.getElementById('sender-name').value,
        email: document.getElementById('sender-email').value,
        subject: document.getElementById('sender-subject').value,
        message: document.getElementById('sender-message').value
    };
    
    const results = [];
    Object.entries(formData).forEach(([field, value]) => {
        results.push(validateField(field, value));
    });
    
    return results.every(result => result === true);
}

// Email trigger
emailTrigger.addEventListener('click', (e) => {
    e.preventDefault();
    closeModal();
    openEmailModal();
});

// Email form submission
emailForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    if (!validateForm()) {
        formStatus.textContent = 'Please fix the errors above';
        formStatus.className = 'form-status error';
        return;
    }
    
    const formData = new FormData(emailForm);
    
    // Add loading state
    emailSubmitBtn.disabled = true;
    emailSubmitBtn.classList.add('loading');
    formStatus.textContent = 'Sending your email...';
    formStatus.className = 'form-status loading';
    
    try {
        const response = await fetch('send-email.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            formStatus.textContent = '✓ Email sent successfully! I\'ll get back to you soon.';
            formStatus.className = 'form-status success';
            emailForm.reset();
            document.querySelectorAll('.form-group').forEach(group => group.classList.remove('error'));
            
            setTimeout(() => {
                closeEmailModal();
            }, 3000);
        } else {
            formStatus.textContent = result.message || 'Failed to send email. Please try again.';
            formStatus.className = 'form-status error';
        }
    } catch (error) {
        console.error('Error:', error);
        formStatus.textContent = 'Network error. Please check your connection and try again.';
        formStatus.className = 'form-status error';
    } finally {
        emailSubmitBtn.disabled = false;
        emailSubmitBtn.classList.remove('loading');
    }
});

// Email modal close handlers
emailCloseBtn.addEventListener('click', closeEmailModal);

emailModal.addEventListener('click', (e) => {
    if (e.target === emailModal) {
        closeEmailModal();
    }
});

// Real-time validation on blur
document.getElementById('sender-name').addEventListener('blur', (e) => {
    validateField('name', e.target.value);
});

document.getElementById('sender-email').addEventListener('blur', (e) => {
    validateField('email', e.target.value);
});

document.getElementById('sender-subject').addEventListener('blur', (e) => {
    validateField('subject', e.target.value);
});

document.getElementById('sender-message').addEventListener('blur', (e) => {
    validateField('message', e.target.value);
});
