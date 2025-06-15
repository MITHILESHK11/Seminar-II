<?php
require_once 'config.php';

function checkTrialAccess() {
    // Check if user has an active trial session
    if (isset($_SESSION['trial_start_time'])) {
        $trial_duration = 180; // 3 minutes in seconds
        $elapsed_time = time() - $_SESSION['trial_start_time'];
        
        if ($elapsed_time < $trial_duration) {
            return true;
        } else {
            // Trial expired, clear session
            unset($_SESSION['trial_start_time']);
            return false;
        }
    }
    
    return false;
}

function requireAuth() {
    // Check if user is logged in
    if (isLoggedIn()) {
        return true;
    }
    
    // Check if trial is active
    if (checkTrialAccess()) {
        return true;
    }
    
    // Neither logged in nor trial active, redirect to login
    $_SESSION['trial_expired'] = true;
    header('Location: login.php');
    exit();
}

function startTrial() {
    global $pdo;
    
    // Start trial session
    $_SESSION['trial_start_time'] = time();
    
    // Store trial session in database
    $session_id = session_id();
    $ip_address = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    $expires_at = date('Y-m-d H:i:s', time() + 180); // 3 minutes
    
    try {
        $stmt = $pdo->prepare("INSERT INTO trial_sessions (session_id, ip_address, expires_at) VALUES (?, ?, ?)");
        $stmt->execute([$session_id, $ip_address, $expires_at]);
    } catch(PDOException $e) {
        // Continue even if database insert fails
        error_log("Trial session insert failed: " . $e->getMessage());
    }
}

function getTrialTimeRemaining() {
    if (isset($_SESSION['trial_start_time'])) {
        $trial_duration = 180; // 3 minutes
        $elapsed_time = time() - $_SESSION['trial_start_time'];
        return max(0, $trial_duration - $elapsed_time);
    }
    return 0;
}
?>
