// AstraLearn JavaScript functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initializeNavigation();
    initializeAnimations();
    initializeForms();
    
    // Initialize specific page components
    if (window.location.pathname.includes('trial.php')) {
        initializeTrialFeatures();
    }
    
    if (window.location.pathname.includes('contact.php')) {
        initializeContactForm();
    }
});

// Navigation functionality
function initializeNavigation() {
    const header = document.querySelector('.header');
    const navToggler = document.querySelector('.navbar-toggler');
    const navCollapse = document.querySelector('.navbar-collapse');
    
    // Header scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
    
    // Close mobile menu when clicking on nav links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            if (navCollapse.classList.contains('show')) {
                navToggler.click();
            }
        });
    });
    
    // Set active navigation link
    const currentPath = window.location.pathname;
    document.querySelectorAll('.nav-link').forEach(link => {
        const href = link.getAttribute('href');
        if (currentPath.includes(href) || (href === 'index.php' && currentPath === '/')) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
}

// Animation functionality
function initializeAnimations() {
    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    // Observe elements for animation
    document.querySelectorAll('.card, .feature-card, .step').forEach(el => {
        observer.observe(el);
    });
}

// Form functionality
function initializeForms() {
    // Add loading states to forms
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
            }
        });
    });
    
    // Form validation enhancement
    document.querySelectorAll('.form-control, .form-select').forEach(input => {
        input.addEventListener('blur', function() {
            validateField(this);
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid')) {
                validateField(this);
            }
        });
    });
}

// Field validation
function validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let errorMessage = '';
    
    // Required field validation
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        errorMessage = 'This field is required.';
    }
    
    // Email validation
    if (field.type === 'email' && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            isValid = false;
            errorMessage = 'Please enter a valid email address.';
        }
    }
    
    // Password validation
    if (field.type === 'password' && value && value.length < 6) {
        isValid = false;
        errorMessage = 'Password must be at least 6 characters long.';
    }
    
    // Update field appearance
    field.classList.remove('is-valid', 'is-invalid');
    const feedback = field.parentNode.querySelector('.invalid-feedback');
    
    if (isValid && value) {
        field.classList.add('is-valid');
        if (feedback) feedback.remove();
    } else if (!isValid) {
        field.classList.add('is-invalid');
        if (!feedback) {
            const feedbackEl = document.createElement('div');
            feedbackEl.className = 'invalid-feedback';
            feedbackEl.textContent = errorMessage;
            field.parentNode.appendChild(feedbackEl);
        } else {
            feedback.textContent = errorMessage;
        }
    }
    
    return isValid;
}

// Trial page functionality
function initializeTrialFeatures() {
    // Demo functionality for trial features
    window.demoSummarize = function() {
        const resultDiv = document.getElementById('summarize-result');
        const textarea = resultDiv.closest('.card').querySelector('textarea');
        
        if (!textarea.value.trim()) {
            showAlert('Please enter some text to summarize.', 'warning');
            return;
        }
        
        // Simulate AI processing
        showProcessing(resultDiv, function() {
            resultDiv.classList.remove('d-none');
            resultDiv.classList.add('fade-in-up');
        });
    };
    
    window.demoQA = function() {
        const resultDiv = document.getElementById('qa-result');
        const input = resultDiv.closest('.card').querySelector('input');
        
        if (!input.value.trim()) {
            showAlert('Please enter a question.', 'warning');
            return;
        }
        
        showProcessing(resultDiv, function() {
            resultDiv.classList.remove('d-none');
            resultDiv.classList.add('fade-in-up');
        });
    };
    
    window.demoTips = function() {
        const resultDiv = document.getElementById('tips-result');
        
        showProcessing(resultDiv, function() {
            resultDiv.classList.remove('d-none');
            resultDiv.classList.add('fade-in-up');
        });
    };
}

// Contact form functionality
function initializeContactForm() {
    const form = document.querySelector('form[method="POST"]');
    if (form) {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validate all fields
            form.querySelectorAll('.form-control').forEach(field => {
                if (!validateField(field)) {
                    isValid = false;
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                showAlert('Please correct the errors above.', 'danger');
            }
        });
    }
}

// Utility functions
function showAlert(message, type = 'info') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    // Insert at top of main content
    const main = document.querySelector('main, .container, section');
    if (main) {
        main.insertBefore(alertDiv, main.firstChild);
        
        // Auto-dismiss after 5 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    }
}

function showProcessing(element, callback) {
    const processingDiv = document.createElement('div');
    processingDiv.className = 'alert alert-info d-flex align-items-center';
    processingDiv.innerHTML = `
        <div class="spinner-border spinner-border-sm me-2" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        Processing your request...
    `;
    
    element.parentNode.insertBefore(processingDiv, element);
    
    setTimeout(() => {
        processingDiv.remove();
        callback();
    }, 1500);
}

// Password strength indicator
function initializePasswordStrength() {
    const passwordInputs = document.querySelectorAll('input[type="password"]');
    
    passwordInputs.forEach(input => {
        const strengthIndicator = document.createElement('div');
        strengthIndicator.className = 'password-strength mt-1';
        input.parentNode.appendChild(strengthIndicator);
        
        input.addEventListener('input', function() {
            const strength = calculatePasswordStrength(this.value);
            updatePasswordStrength(strengthIndicator, strength);
        });
    });
}

function calculatePasswordStrength(password) {
    let score = 0;
    
    if (password.length >= 8) score++;
    if (/[a-z]/.test(password)) score++;
    if (/[A-Z]/.test(password)) score++;
    if (/\d/.test(password)) score++;
    if (/[^a-zA-Z\d]/.test(password)) score++;
    
    return score;
}

function updatePasswordStrength(indicator, strength) {
    const levels = ['Very Weak', 'Weak', 'Fair', 'Good', 'Strong'];
    const colors = ['danger', 'warning', 'info', 'primary', 'success'];
    
    indicator.innerHTML = `
        <small class="text-${colors[strength - 1] || 'muted'}">
            Password strength: ${levels[strength - 1] || 'Too short'}
        </small>
    `;
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const headerHeight = document.querySelector('.header').offsetHeight;
            const targetPosition = target.offsetTop - headerHeight - 20;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// Initialize tooltips and popovers
function initializeBootstrapComponents() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Initialize popovers
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
}

// Call initialization when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeBootstrapComponents);
} else {
    initializeBootstrapComponents();
}
