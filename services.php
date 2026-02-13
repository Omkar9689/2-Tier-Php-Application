<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - EmployeeHub</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            min-height: 100vh;
            color: white;
        }
        
        .navbar {
            background: rgba(26, 26, 46, 0.9) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 1.8rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: white !important;
        }
        
        .services-section {
            padding: 150px 0 80px;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
            animation: fadeInUp 0.8s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .section-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 900;
            margin-bottom: 1rem;
        }
        
        .gradient-text {
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .section-header p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.7);
            max-width: 700px;
            margin: 0 auto;
        }
        
        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .service-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2.5rem;
            transition: all 0.4s ease;
            animation: fadeIn 0.6s ease-out both;
        }
        
        .service-card:nth-child(1) { animation-delay: 0.1s; }
        .service-card:nth-child(2) { animation-delay: 0.2s; }
        .service-card:nth-child(3) { animation-delay: 0.3s; }
        .service-card:nth-child(4) { animation-delay: 0.4s; }
        .service-card:nth-child(5) { animation-delay: 0.5s; }
        .service-card:nth-child(6) { animation-delay: 0.6s; }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        }
        
        .service-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            transition: all 0.4s ease;
        }
        
        .service-card:nth-child(1) .service-icon { background: var(--gradient-1); }
        .service-card:nth-child(2) .service-icon { background: var(--gradient-2); }
        .service-card:nth-child(3) .service-icon { background: var(--gradient-3); }
        .service-card:nth-child(4) .service-icon { background: var(--gradient-1); }
        .service-card:nth-child(5) .service-icon { background: var(--gradient-2); }
        .service-card:nth-child(6) .service-icon { background: var(--gradient-3); }
        
        .service-card:hover .service-icon {
            transform: rotate(360deg) scale(1.1);
        }
        
        .service-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .service-card p {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.8;
        }
        
        .service-card ul {
            list-style: none;
            padding: 0;
            margin-top: 1rem;
        }
        
        .service-card ul li {
            padding: 0.5rem 0;
            color: rgba(255, 255, 255, 0.8);
        }
        
        .service-card ul li i {
            color: #4facfe;
            margin-right: 0.5rem;
        }
        
        footer {
            background: rgba(0, 0, 0, 0.3);
            padding: 3rem 0 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 4rem;
        }
        
        footer a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        footer a:hover {
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-building"></i> EmployeeHub
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link active" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <h1>Our <span class="gradient-text">Services</span></h1>
                <p>Comprehensive employee management solutions designed to streamline your workflow</p>
            </div>
            
            <div class="service-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3>Employee Registration</h3>
                    <p>Streamlined onboarding process for new team members</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Quick signup process</li>
                        <li><i class="fas fa-check"></i> Email verification</li>
                        <li><i class="fas fa-check"></i> Secure password encryption</li>
                        <li><i class="fas fa-check"></i> Instant account activation</li>
                    </ul>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <h3>Profile Management</h3>
                    <p>Complete control over employee profiles and information</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Edit personal details</li>
                        <li><i class="fas fa-check"></i> Update position info</li>
                        <li><i class="fas fa-check"></i> Manage biography</li>
                        <li><i class="fas fa-check"></i> Change password</li>
                    </ul>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3>Admin Dashboard</h3>
                    <p>Powerful administrative tools for complete oversight</p>
                    <ul>
                        <li><i class="fas fa-check"></i> View all employees</li>
                        <li><i class="fas fa-check"></i> Search & filter records</li>
                        <li><i class="fas fa-check"></i> Detailed analytics</li>
                        <li><i class="fas fa-check"></i> User management</li>
                    </ul>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3>Security & Privacy</h3>
                    <p>Enterprise-grade security to protect sensitive data</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Password encryption</li>
                        <li><i class="fas fa-check"></i> Secure sessions</li>
                        <li><i class="fas fa-check"></i> Role-based access</li>
                        <li><i class="fas fa-check"></i> Data protection</li>
                    </ul>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3>Data Management</h3>
                    <p>Efficient storage and retrieval of employee records</p>
                    <ul>
                        <li><i class="fas fa-check"></i> MySQL database</li>
                        <li><i class="fas fa-check"></i> Data backup</li>
                        <li><i class="fas fa-check"></i> Record deletion</li>
                        <li><i class="fas fa-check"></i> Export capabilities</li>
                    </ul>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Responsive Design</h3>
                    <p>Access from any device, anywhere, anytime</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Mobile friendly</li>
                        <li><i class="fas fa-check"></i> Tablet optimized</li>
                        <li><i class="fas fa-check"></i> Desktop ready</li>
                        <li><i class="fas fa-check"></i> Cross-browser support</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0" style="color: rgba(255,255,255,0.6);">
                        &copy; 2024 EmployeeHub. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="me-3"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
