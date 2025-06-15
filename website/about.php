<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About AstraLearn - Learn about our mission, technology, and the team behind the AI-powered academic helper">
    <title>About - AstraLearn</title>
    
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
                            <a class="nav-link active" href="about.php">About</a>
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
            <h1 class="display-4 fw-bold">About AstraLearn</h1>
            <p class="lead">Learn about our mission, technology, and the team behind the project</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="text-center mb-5">
                        <h2 class="display-6 fw-bold">Our Mission</h2>
                        <p class="lead text-muted">Designed by students, for students</p>
                    </div>
                    
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body p-5">
                            <p class="lead">AstraLearn was created to help students maximize their learning potential by leveraging the latest in AI technology. We believe that every student deserves access to high-quality academic support.</p>
                            
                            <h4 class="mt-4 mb-3">Our Vision</h4>
                            <p>We envision a future where AI-powered tools democratize education by providing personalized, on-demand academic assistance to students worldwide. By breaking down barriers to learning, we aim to help students achieve their educational goals regardless of their location or circumstances.</p>
                            
                            <h4 class="mt-4 mb-3">Technology Stack</h4>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-brain text-primary me-3"></i>
                                        <span>Gemini 1.5 API</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-link text-success me-3"></i>
                                        <span>LangChain</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-lock text-info me-3"></i>
                                        <span>Built-in API Access</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-php text-warning me-3"></i>
                                        <span>PHP & MySQL</span>
                                    </div>
                                </div>
                            </div>
                            
                            <h4 class="mt-4 mb-3">Open Source Project</h4>
                            <p>This project is open source and we welcome contributions from the community. Feel free to fork the repository, make improvements, and submit pull requests. Together, we can create an even more powerful tool for students worldwide.</p>
                            
                            <div class="text-center mt-4">
                                <a href="https://github.com/MITHILESHK11" class="btn btn-outline-primary" target="_blank">
                                    <i class="fab fa-github me-2"></i>View on GitHub
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="bg-body-secondary py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold">Meet the Creator</h2>
                <p class="lead text-muted">The mind behind the Student Assistant</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <img src="assets/team-placeholder.svg" alt="Mithilesh Kolhapurkar" class="rounded-circle mb-3" width="120" height="120">
                            <h5 class="fw-bold">Mithilesh Kolhapurkar</h5>
                            <p class="text-muted mb-3">Project Creator & Maintainer</p>
                            <p class="small">Passionate about leveraging AI to improve educational outcomes for students worldwide. Experienced in building applications that harness the power of large language models for practical use cases.</p>
                            <div class="d-flex justify-content-center gap-3 mt-3">
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
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2 class="display-6 fw-bold mb-3">Ready to see what we've built?</h2>
            <p class="lead mb-4">Experience AstraLearn yourself and discover how it can enhance your learning journey</p>
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
