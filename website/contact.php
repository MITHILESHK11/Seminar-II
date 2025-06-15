<?php
require_once 'config.php';

$success = '';
$error = '';

// Handle contact form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $subject = sanitizeInput($_POST['subject']);
    $message = sanitizeInput($_POST['message']);
    
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        // In a real application, you would send an email or store the message
        // For now, we'll just show a success message
        $success = 'Thank you for your message! We\'ll get back to you soon.';
        
        // Clear form data
        $_POST = array();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact AstraLearn - Get in touch with our team">
    <title>Contact - AstraLearn</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.replit.com/agent/bootstrap-agent-dark-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <!-- Navigation Bar -->
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="navbar-brand">
                    <img src="assets/logo.svg" alt="AstraLearn Logo" height="40">
                    <span class="ms-2 fw-bold">AstraLearn</span>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo isLoggedIn() ? 'home.php' : 'index.php'; ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="features.php">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <div class="d-flex gap-2">
                        <?php if (isLoggedIn()): ?>
                            <a href="home.php" class="btn btn-info btn-sm">Go to App</a>
                            <a href="logout.php" class="btn btn-outline-secondary btn-sm">Logout</a>
                        <?php else: ?>
                            <a href="login.php" class="btn btn-primary btn-sm">Login</a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Page Header -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center" style="margin-top: 80px;">
            <h1 class="display-4 fw-bold">Contact Us</h1>
            <p class="lead">Have questions or feedback? We'd love to hear from you</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-5">
                            <h3 class="fw-bold mb-4">Send us a message</h3>
                            
                            <?php if ($error): ?>
                                <div class="alert alert-danger" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i><?php echo htmlspecialchars($error); ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($success): ?>
                                <div class="alert alert-success" role="alert">
                                    <i class="fas fa-check-circle me-2"></i><?php echo htmlspecialchars($success); ?>
                                </div>
                            <?php endif; ?>
                            
                            <form method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Your Name</label>
                                        <input type="text" class="form-control" id="name" name="name" 
                                               value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="subject" class="form-label">Subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject" 
                                               value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="6" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fas fa-paper-plane me-2"></i>Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Information -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4">Get In Touch</h4>
                            <p class="text-muted mb-4">Whether you have questions about AstraLearn, need help with implementation, or want to contribute to the project, feel free to reach out to us using any of the contact methods below.</p>
                            
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-user text-primary me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Mithilesh Kolhapurkar</h6>
                                        <small class="text-muted">Project Creator & Maintainer</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fab fa-github text-dark me-3"></i>
                                    <div>
                                        <h6 class="mb-0">GitHub</h6>
                                        <a href="https://github.com/MITHILESHK11" target="_blank" class="text-decoration-none">MITHILESHK11</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fab fa-linkedin text-primary me-3"></i>
                                    <div>
                                        <h6 class="mb-0">LinkedIn</h6>
                                        <a href="https://www.linkedin.com/in/mithilesh-kolhapurkar/" target="_blank" class="text-decoration-none">Mithilesh Kolhapurkar</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="alert alert-info">
                                <p class="mb-0"><strong>Note:</strong> We're constantly improving AstraLearn based on user feedback and would love to hear about your experience!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="bg-body-secondary py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold">Frequently Asked Questions</h2>
                <p class="lead text-muted">Quick answers to common questions</p>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Do I need my own API key to use AstraLearn?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    No, AstraLearn comes with built-in API access. You can start using all the features immediately without any additional setup or API keys.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Is AstraLearn free to use?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, AstraLearn is completely free to use with no hidden costs. We've already integrated API access, so you don't need to worry about usage limits or additional expenses.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    How can I contribute to the project?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can contribute by forking the repository on GitHub, making improvements, and submitting pull requests. We welcome contributions in the form of code enhancements, documentation, bug fixes, and feature suggestions.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    What subjects does AstraLearn support?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    AstraLearn can help with a wide range of academic subjects including but not limited to mathematics, science, literature, history, and languages. The quality of assistance depends on the capabilities of the underlying Gemini AI model.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <img src="assets/logo.svg" alt="AstraLearn Logo" height="30">
                        <span class="ms-2 fw-bold">AstraLearn</span>
                    </div>
                    <p class="mb-0">&copy; 2023 AstraLearn. All rights reserved.</p>
                    <p class="small">Licensed under the <a href="https://github.com/MITHILESHK11" target="_blank" class="text-light">MIT License</a></p>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold mb-3">Connect With Us</h6>
                    <div class="d-flex gap-3">
                        <a href="https://github.com/MITHILESHK11" target="_blank" class="text-light">
                            <i class="fab fa-github fa-lg"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/mithilesh-kolhapurkar/" target="_blank" class="text-light">
                            <i class="fab fa-linkedin fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
