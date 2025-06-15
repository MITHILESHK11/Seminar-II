<?php
require_once 'config.php';

// Redirect if already logged in
redirectIfLoggedIn();

$error = '';
$success = '';

// Check for trial expired message
if (isset($_SESSION['trial_expired'])) {
    $error = 'Your trial has ended. Please log in to continue using the application.';
    unset($_SESSION['trial_expired']);
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitizeInput($_POST['username']);
    $password = $_POST['password'];
    
    if (empty($username) || empty($password)) {
        $error = 'Please fill in all fields.';
    } else {
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
            $stmt->execute([$username, $username]);
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['full_name'] = $user['full_name'];
                
                // Clear any trial session
                unset($_SESSION['trial_start_time']);
                
                header('Location: home.php');
                exit();
            } else {
                $error = 'Invalid username or password.';
            }
        } catch(PDOException $e) {
            $error = 'Database error. Please try again.';
            error_log("Login error: " . $e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AstraLearn</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.replit.com/agent/bootstrap-agent-dark-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="D:\xampp\htdocs\sem\SecureWebPortal\styles\main.css">
</head>
<body>
    <div class="min-vh-100 d-flex align-items-center bg-body-secondary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <img src="assets/logo.svg" alt="AstraLearn Logo" height="50">
                                <h3 class="mt-3 fw-bold">Welcome Back</h3>
                                <p class="text-muted">Sign in to your account</p>
                            </div>
                            
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
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username or Email</label>
                                    <input type="text" class="form-control" id="username" name="username" 
                                           value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                                </button>
                            </form>
                            
                            <div class="text-center">
                                <p class="mb-2">Don't have an account? <a href="register.php" class="text-decoration-none">Create one</a></p>
                                <hr class="my-3">
                                <a href="index.php" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-arrow-left me-2"></i>Back to Home
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-3">
                        <small class="text-muted">
                            Demo Account: Username: <code>demo</code>, Password: <code>password123</code>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
