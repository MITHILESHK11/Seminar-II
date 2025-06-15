<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AstraLearn Features - Discover the powerful AI-powered tools for academic success">
    <title>Features - AstraLearn</title>
    
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
                            <a class="nav-link active" href="features.php">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
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
            <h1 class="display-4 fw-bold">Our Features</h1>
            <p class="lead">Discover the powerful tools designed to enhance your learning experience</p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold">Powerful Academic Features</h2>
                <p class="lead text-muted">Our AI-powered tools are designed to enhance your learning experience</p>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-lg-4">
                    <div class="card h-100 border-2 border-primary">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <img src="assets/feature-summarize.svg" alt="Note Summarization" width="80" height="80">
                            </div>
                            <h4 class="card-title text-center mb-3">Note Summarization</h4>
                            <p class="card-text">Converts complex notes into clear, concise summaries tailored to your specific needs and learning style.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Multiple summary lengths</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Key concept extraction</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Custom formatting options</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100 border-2 border-success">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <img src="assets/feature-qa.svg" alt="Q&A Engine" width="80" height="80">
                            </div>
                            <h4 class="card-title text-center mb-3">Q&A Engine</h4>
                            <p class="card-text">Answers subject-specific academic questions in detail, breaking down complex concepts into understandable explanations.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>In-depth explanations</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Subject-specific knowledge</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Step-by-step solutions</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100 border-2 border-info">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <img src="assets/feature-tips.svg" alt="Study Tips Generator" width="80" height="80">
                            </div>
                            <h4 class="card-title text-center mb-3">Study Tips Generator</h4>
                            <p class="card-text">Generates personalized study strategies and techniques based on your learning style, goals, and subject matter.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Learning style adaptation</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Goal-oriented techniques</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Time management advice</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <?php if (isLoggedIn()): ?>
                    <a href="home.php" class="btn btn-primary btn-lg">Use Features Now</a>
                <?php else: ?>
                    
                    <a href="register.php" class="btn btn-primary btn-lg">Create Account</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Advanced Features Section -->
    <section class="bg-body-secondary py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold">Advanced Capabilities</h2>
                <p class="lead text-muted">Going beyond basic assistance to provide comprehensive academic support</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-brain fa-3x"></i>
                            </div>
                            <h5 class="card-title">AI-Enhanced Learning</h5>
                            <p class="card-text">Utilizes the powerful Gemini 1.5 AI model to provide intelligent insights tailored to your specific needs and subjects.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="text-success mb-3">
                                <i class="fas fa-cogs fa-3x"></i>
                            </div>
                            <h5 class="card-title">Ready-to-Use Solution</h5>
                            <p class="card-text">Get started immediately with no setup required - all API access is built-in and ready to use without any configuration.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="text-info mb-3">
                                <i class="fas fa-sync-alt fa-3x"></i>
                            </div>
                            <h5 class="card-title">Real-Time Assistance</h5>
                            <p class="card-text">Get immediate help with your academic questions and study needs without delays or complicated setup procedures.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="text-warning mb-3">
                                <i class="fas fa-user-graduate fa-3x"></i>
                            </div>
                            <h5 class="card-title">Subject Versatility</h5>
                            <p class="card-text">Compatible with a wide range of academic subjects from mathematics and sciences to humanities and languages.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold">How It Works</h2>
                <p class="lead text-muted">Simple steps to get the help you need</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <span class="h2 mb-0">1</span>
                        </div>
                        <h5>Choose Your Tool</h5>
                        <p class="text-muted">Select from note summarization, Q&A, or study tips based on your current needs.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <span class="h2 mb-0">2</span>
                        </div>
                        <h5>Input Your Content</h5>
                        <p class="text-muted">Paste your notes, ask your question, or specify your study requirements.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <span class="h2 mb-0">3</span>
                        </div>
                        <h5>Get AI-Powered Results</h5>
                        <p class="text-muted">Receive instant, personalized assistance from our Gemini-powered AI system.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2 class="display-6 fw-bold mb-3">Ready to experience these features?</h2>
            <p class="lead mb-4">Start using AstraLearn today and transform your learning experience</p>
            <?php if (isLoggedIn()): ?>
                <a href="home.php" class="btn btn-light btn-lg">Launch AstraLearn</a>
            <?php else: ?>
                
                <a href="register.php" class="btn btn-light btn-lg">Create Account</a>
            <?php endif; ?>
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
