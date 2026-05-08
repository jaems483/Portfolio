<!DOCTYPE html>
<html lang="en" data-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dark Mode Toggle</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Merriweather:wght@700&family=JetBrains+Mono&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="styles.css" />
    <style>
      
    </style>
  </head>
  <body>
    <header class="header">
      <div class="name">James Karl Silpao</div>
      <div class="nav-links">
        <nav>
            <a href="#">Home</a>
            <a href="#projects-section">Projects</a>
            <a href="#skills-section">Skills</a>
            <a href="#contact-section">Contact</a>
        </nav>
      </div>
      <input type="checkbox" id="dark-mode-toggle" />
      <label for="dark-mode-toggle" class="toggle"></label>
    </header>

    <div class="hero-container">
        <section class="hero">
            <div class="content" data-aos="fade-up">
                <p style='background: var(--btn-bg); width: fit-content; color: var(--btn-text); padding: 10px 20px; border-radius: 8px;'>Hello There!</p>
                <h1>I'm James Karl Silpao</h1>
                <p>
                A passionate web developer creating beautiful and functional websites and also a Business Analyst that loves turning data into actionable insights.
                </p>
                <a class="btn" href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>

                <a class="btn" href="https://github.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="GitHub">
                <i class="fab fa-github"></i>
                </a>
            </div>
            <div class="content" data-aos="fade-up" data-aos-delay="200">
                <img src="photo.png" alt="Profile Picture" class="profile-pic" />
            </div>
        </section>
    </div>

    <section class="projects-section" id='projects-section' data-aos="fade-up">
        <div class="projects-header">
            <h2>Featured Projects</h2>
            <p>Crafted solutions showcasing expertise in modern web development</p>
        </div>
        <div class="projects-container">
            <div class="project-card" data-aos="fade-up">
                <div class="project-image-wrapper">
                    <img src="coop.png" alt="COOP Banking" class="project-image" />
                    <div class="project-overlay">
                        <a href="https://jameskarlsilpao-coop.infinityfreeapp.com/?i=1" target="_blank" rel="noopener noreferrer" class="project-link">Live Demo</a>
                    </div>
                </div>
                <div class="project-content">
                    <span class="project-tag">First Project</span>
                    <h3>COOP Banking</h3>
                    <p>A web application designed to streamline banking operations, enhance customer experience, and provide secure financial services.</p>
                    <div class="project-tech">
                        <span class="tech-badge">PHP</span>
                        <span class="tech-badge">MySQL</span>
                        <span class="tech-badge">Bootstrap</span>
                    </div>
                    <div class="project-actions">
                        <a href="https://jameskarlsilpao-coop.infinityfreeapp.com/?i=1" target="_blank" class="btn btn-primary">View Project</a>
                        <a href="https://github.com" target="_blank" class="btn btn-secondary"><i class="fab fa-github"></i> Repository</a>
                    </div>
                </div>
            </div>

            <div class="project-card" data-aos="fade-up" data-aos-delay="100">
                <div class="project-image-wrapper">
                    <img src="coop.png" alt="Key Borrowing System" class="project-image" />
                    <div class="project-overlay">
                        <a href="#" target="_blank" rel="noopener noreferrer" class="project-link">Live Demo</a>
                    </div>
                </div>
                <div class="project-content">
                    <span class="project-tag">Second Project</span>
                    <h3>Key Borrowing System</h3>
                    <p>A web application designed to simplify the key borrowing process, improve inventory management, and enhance user experience.</p>
                    <div class="project-tech">
                        <span class="tech-badge">React</span>
                        <span class="tech-badge">Node.js</span>
                        <span class="tech-badge">MongoDB</span>
                    </div>
                    <div class="project-actions">
                        <a href="#" target="_blank" class="btn btn-primary">View Project</a>
                        <a href="https://github.com" target="_blank" class="btn btn-secondary"><i class="fab fa-github"></i> Repository</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="skills-section" id="skills-section" data-aos="fade-up">
        <div class="skills-header">
            <h2>Technical Skills & Technologies</h2>
            <p>Expertise in modern web development and enterprise solutions</p>
        </div>
        <div class="carousel-wrapper">
            <div class="carousel-container">
                <div class="skill-item-carousel active" data-index="0">
                    <div class="skill-carousel-icon"><i class="fas fa-code"></i></div>
                    <div class="skill-carousel-title">Programming Languages</div>
                    <div class="skill-carousel-items">
                        <span class="skill-carousel-badge">Java</span>
                        <span class="skill-carousel-badge">C++</span>
                        <span class="skill-carousel-badge">Python</span>
                        <span class="skill-carousel-badge">ABAP</span>
                    </div>
                </div>

                <div class="skill-item-carousel next" data-index="1">
                    <div class="skill-carousel-icon"><i class="fas fa-globe"></i></div>
                    <div class="skill-carousel-title">Web Development</div>
                    <div class="skill-carousel-items">
                        <span class="skill-carousel-badge">HTML</span>
                        <span class="skill-carousel-badge">Django</span>
                        <span class="skill-carousel-badge">CSS</span>
                        <span class="skill-carousel-badge">JavaScript</span>
                        <span class="skill-carousel-badge">PHP</span>
                        <span class="skill-carousel-badge">XML</span>
                    </div>
                </div>

                <div class="skill-item-carousel next" data-index="2">
                    <div class="skill-carousel-icon"><i class="fas fa-database"></i></div>
                    <div class="skill-carousel-title">Databases</div>
                    <div class="skill-carousel-items">
                        <span class="skill-carousel-badge">MySQL</span>
                        <span class="skill-carousel-badge">MS SQL Server</span>
                    </div>
                </div>

                <div class="skill-item-carousel next" data-index="3">
                    <div class="skill-carousel-icon"><i class="fas fa-network-wired"></i></div>
                    <div class="skill-carousel-title">Networking</div>
                    <div class="skill-carousel-items">
                        <span class="skill-carousel-badge">IP Addressing</span>
                        <span class="skill-carousel-badge">Subnetting</span>
                        <span class="skill-carousel-badge">File Sharing</span>
                        <span class="skill-carousel-badge">Troubleshooting</span>
                    </div>
                </div>

                <div class="skill-item-carousel next" data-index="4">
                    <div class="skill-carousel-icon"><i class="fas fa-chart-bar"></i></div>
                    <div class="skill-carousel-title">Analytics & Data</div>
                    <div class="skill-carousel-items">
                        <span class="skill-carousel-badge">Data Visualization</span>
                        <span class="skill-carousel-badge">Excel, Power BI</span>
                        <span class="skill-carousel-badge">Data Cleaning</span>
                        <span class="skill-carousel-badge">Python, SPSS</span>
                        <span class="skill-carousel-badge">Machine Learning</span>
                        <span class="skill-carousel-badge">Orange</span>
                    </div>
                </div>
            </div>
            <div class="carousel-nav">
                <div class="carousel-dot active" data-slide="0"></div>
                <div class="carousel-dot" data-slide="1"></div>
                <div class="carousel-dot" data-slide="2"></div>
                <div class="carousel-dot" data-slide="3"></div>
                <div class="carousel-dot" data-slide="4"></div>
            </div>
        </div>
    </section>

    <!-- Contact Modal -->
    <div id="contact-modal" class="modal" role="dialog" aria-labelledby="contact-modal-title">
        <div class="modal-content" data-aos="zoom-in">
            <button class="close" aria-label="Close contact form">&times;</button>
            <div class="contact-modal-header">
                <h2 id="contact-modal-title">Get In Touch</h2>
                <p>Let's connect and explore opportunities together</p>
            </div>
            <div class="contact-modal-body">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Phone</h4>
                            <p><a href="tel:+639354033185">+63 935-403-3185</a></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p><a href="#" id="email-trigger" class="email-link">jameskarlsilpao@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Location</h4>
                            <p>Caloocan, Metro Manila</p>
                        </div>
                    </div>
                </div>
                <div class="contact-social">
                    <h4>Connect With Me</h4>
                    <div class="social-icons">
                        <a href="https://linkedin.com/in/james-karl-silpao-0346a3286/" target="_blank" rel="noopener noreferrer" class="social-btn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="social-btn">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Email Form Modal -->
    <div id="email-modal" class="modal" role="dialog" aria-labelledby="email-modal-title">
        <div class="modal-content email-modal-content" data-aos="zoom-in">
            <button class="close" aria-label="Close email form">&times;</button>
            <div class="contact-modal-header">
                <h2 id="email-modal-title">Send Me an Email</h2>
                <p>I'll get back to you as soon as possible</p>
            </div>
            <form id="email-form" class="email-form" novalidate>
                <div class="form-group">
                    <label for="sender-name">Your Name</label>
                    <input type="text" id="sender-name" name="name" placeholder="John Doe" required />
                    <span class="error-message"></span>
                </div>
                <div class="form-group">
                    <label for="sender-email">Your Email</label>
                    <input type="email" id="sender-email" name="email" placeholder="you@example.com" required />
                    <span class="error-message"></span>
                </div>
                <div class="form-group">
                    <label for="sender-subject">Subject</label>
                    <input type="text" id="sender-subject" name="subject" placeholder="What's this about?" required />
                    <span class="error-message"></span>
                </div>
                <div class="form-group">
                    <label for="sender-message">Message</label>
                    <textarea id="sender-message" name="message" placeholder="Your message here..." rows="5" required></textarea>
                    <span class="error-message"></span>
                </div>
                <div id="form-status" class="form-status"></div>
                <button type="submit" class="btn btn-submit" id="email-submit">Send Email</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out',
            offset: 100,
            once: false
        });
    </script>
    <script src="main.js"></script>
  </body>
</html>