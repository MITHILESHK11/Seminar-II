<?php
require_once 'config.php';
require_once 'session_check.php';

// Require authentication
requireAuth();

$user = null;
if (isLoggedIn()) {
    $user = getUserById($pdo, $_SESSION['user_id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gemini-Powered Student Assistant - An AI-powered academic helper built using Google's Gemini API and LangChain">
    <meta name="keywords" content="AI, student assistant, Gemini API, academic help, note summarization, study tips">
    <meta name="author" content="Mithilesh Kolhapurkar">
    
    <title>AstraLearn - Dashboard</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/main.css">
    <script>
        const isLoggedIn = <?php echo json_encode(isLoggedIn()); ?>;
    </script>

    <!-- Inline styles to define missing variables and layouts -->
    <style>
        :root {
            --bs-dark: #212529;
            --bs-light: #f8f9fa;
            --bs-primary: #6366f1;
            --bs-secondary: #06b6d4;
            --bs-border-color: #dee2e6;
            --bs-body-color: #212529;
        }
        body {
            color: var(--bs-body-color);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem 0;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand a {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            font-weight: 600;
            color: #333;
        }
        .nav-links {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            align-items: center;
            gap: 1rem;
        }
        .nav-link {
            color: #333;
            text-decoration: none;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
        }
        
        .nav-link.active {
            font-weight: 600;
            color: var(--bs-primary);
        }
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
        }
        .bar {
            width: 25px;
            height: 3px;
            background-color: #333;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #2a5e6e;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1e4a55;
        }
        .btn-outline-primary {
            background-color: transparent;
            color: #333;
            border: 1px solid #ccc;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-outline-primary:hover {
            background-color: #f0f0f0;
        }
        .hero {
            padding: 5rem 0;
            margin-top: 60px; /* Space for fixed header */
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .hero-content h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .hero-content p {
            font-size: 1.25rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }
        .hero-image img {
            max-width: 100%;
            height: auto;
        }
        .key-benefits {
            padding: 3rem 0;
        }
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 600;
        }
        .section-header p {
            font-size: 1.1rem;
            color: #6c757d;
        }
        .benefits-container {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        .benefit-card {
            flex: 1;
            min-width: 250px;
            max-width: 350px;
            text-align: center;
            padding: 1.5rem;
            background: #fff;
            border-radius: 10px;
        }
        .benefit-icon i {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .benefit-icon.primary i {
            color: var(--bs-primary);
        }
        .benefit-icon.success i {
            color: var(--bs-success);
        }
        .benefit-icon.info i {
            color: var(--bs-info);
        }
        .benefit-card h5 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .cta-banner {
            text-align: center;
            padding: 3rem 0;
            background: var(--bs-dark);
            color: #fff;
        }
        .cta-banner h2 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .cta-banner p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        .footer {
            padding: 2rem 0;
            background: #f8f9fa !important;
        }
        .footer-content {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: space-between;
        }
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .footer-social {
            display: flex;
            flex-direction: column;
        }
        .footer-social h6 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .social-icons {
            display: flex;
            gap: 1rem;
        }
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }
            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px;
                left: 0;
                width: 100%;
                background: rgba(255, 255, 255, 0.95);
                padding: 1rem;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }
            .nav-links.active {
                display: flex;
            }
            .hero-content h1 {
                font-size: 2rem;
            }
            .hero-content p {
                font-size: 1rem;
            }
            .section-header h2 {
                font-size: 2rem;
            }
            .cta-banner h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <div class="navbar-brand">
                    <a href="home.php">
                        <img src="assets/logo.svg" alt="AstraLearn Logo" height="40">
                        <span>AstraLearn</span>
                    </a>
                </div>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <ul class="nav-links">
                    <li><a class="nav-link active" href="home.php">Home</a></li>
                    <li><a class="nav-link" href="features.php">Features</a></li>
                    <li><a class="nav-link" href="about.php">About</a></li>
                    <li><a class="nav-link" href="contact.php">Contact</a></li>
                    <li><a id="goToAppLink" class="nav-link btn btn-primary" href="#">Go to App</a></li>
                    <li><a class="nav-link btn btn-outline-primary" href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero fade-in-up">
        <div class="container">
            <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 2rem;">
                <div style="flex: 1; min-width: 300px;">
                    <div class="hero-content">
                        <h1 class="display-4">AI-Powered Academic Support At Your Fingertips</h1>
                        <p class="lead">AstraLearn helps you summarize notes, answer academic questions, and receive personalized study tips - all powered by Google's Gemini AI.</p>
                        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <a href="register.php" class="btn btn-lg" style="background-color: #ffffff; color: #007bff; border: 2px solid #007bff; text-decoration: none;">Get Full Access</a>
                    </div>
                    </div>
                </div>
                <div style="flex: 1; min-width: 300px; text-align: center;">
                    <div class="hero-image">
                        <img src="assets/hero-illustration.svg" alt="Student using AI assistant">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Benefits Section -->
    <section class="key-benefits fade-in-up">
        <div class="container">
            <div class="section-header">
                <h2 class="display-5">Why Choose AstraLearn</h2>
                <p>Discover how our AI-powered platform transforms your learning experience</p>
            </div>
            <div class="benefits-container">
                <div class="benefit-card card">
                    <div class="benefit-icon primary">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h5>Instant Results</h5>
                    <p>Get immediate responses to your academic questions and note summarization requests without waiting.</p>
                </div>
                <div class="benefit-card card">
                    <div class="benefit-icon success">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h5>Improved Performance</h5>
                    <p>Our users report better grades and deeper understanding of complex subjects through our personalized assistance.</p>
                </div>
                <div class="benefit-card card">
                    <div class="benefit-icon info">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5>Time-Saving</h5>
                    <p>Spend less time struggling with difficult concepts and more time mastering your subjects effectively.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="cta-banner fade-in-up">
        <div class="container">
            <h2 class="display-6">Ready to boost your academic performance?</h2>
            <p>Join thousands of students already using AstraLearn to improve their learning experience</p>
            <a href="register.php" class="btn btn-primary btn-lg">Sign Up Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer fade-in-up">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="assets/logo.svg" alt="AstraLearn Logo" height="30">
                    <span>AstraLearn</span>
                </div>
                <div class="footer-social">
                    <h6>Connect With Us</h6>
                    <div class="social-icons">
                        <a href="https://github.com/MITHILEH11" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="https://www.linkedin.com/in/mithilesh-kolhapurkar/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <p style="text-align: center; color: #6c757d;">© 2023 AstraLearn. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="scripts/main.js"></script>
    <script>
  document.getElementById('goToAppLink').addEventListener('click', function (e) {
    if (isLoggedIn) {
      window.location.href = "https://seminar-v67yh9ldpa7j3app4d9wdft.streamlit.app/";
    } else {
      alert("Please log in to access the app.");
      window.location.href = "login.php";
    }
  });
</script>

</body>
</html>