<?php
require_once 'config.php';
require_once 'session_check.php';

// Redirect logged-in users to home.php
if (isLoggedIn()) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AstraLearn - AI-Powered Student Assistant built with Google's Gemini API">
    <meta name="keywords" content="AI, student assistant, Gemini API, academic help, note summarization, study tips">
    <meta name="author" content="Mithilesh Kolhapurkar">
    
    <title>AstraLearn - AI-Powered Academic Support</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.replit.com/agent/bootstrap-agent-dark-theme.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles\main.css">
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
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="features.php">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <div class="d-flex gap-2">
                        <a href="login.php" class="btn btn-primary">Login</a>
                        <a href="register.php" class="btn btn-outline-primary">Register</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="display-4 fw-bold mb-4">AI-Powered Academic Support At Your Fingertips</h1>
                        <p class="lead mb-4">AstraLearn helps you summarize notes, answer academic questions, and receive personalized study tips - all powered by Google's Gemini AI.</p>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="login.php" class="btn btn-outline-light btn-lg">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="assets/hero-illustration.svg" alt="Student using AI assistant" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Benefits Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Why Choose AstraLearn</h2>
                <p class="lead text-muted">Discover how our AI-powered platform transforms your learning experience</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-bolt fa-3x"></i>
                            </div>
                            <h5 class="card-title">Instant Results</h5>
                            <p class="card-text">Get immediate responses to your academic questions and note summarization requests without waiting.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="text-success mb-3">
                                <i class="fas fa-chart-line fa-3x"></i>
                            </div>
                            <h5 class="card-title">Improved Performance</h5>
                            <p class="card-text">Our users report better grades and deeper understanding of complex subjects through our personalized assistance.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="text-info mb-3">
                                <i class="fas fa-clock fa-3x"></i>
                            </div>
                            <h5 class="card-title">Time-Saving</h5>
                            <p class="card-text">Spend less time struggling with difficult concepts and more time mastering your subjects effectively.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="bg-dark text-white py-5">
        <div class="container text-center">
            <h2 class="display-6 fw-bold mb-3">Ready to boost your academic performance?</h2>
            <p class="lead mb-4">Join thousands of students already using AstraLearn to improve their learning experience</p>
            <a href="register.php" class="btn btn-primary btn-lg">Sign Up Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-body-tertiary py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <img src="assets/logo.svg" alt="AstraLearn Logo" height="30">
                        <span class="ms-2 fw-bold">AstraLearn</span>
                    </div>
                    <p class="text-muted">© 2023 AstraLearn. All rights reserved.</p>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold mb-3">Connect With Us</h6>
                    <div class="d-flex gap-3">
                        <a href="https://github.com/MITHILESHK11" target="_blank" class="text-decoration-none">
                            <i class="fab fa-github fa-lg"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/mithilesh-kolhapurkar/" target="_blank" class="text-decoration-none">
                            <i class="fab fa-linkedin fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts/main.js"></script>
</body>
</html>