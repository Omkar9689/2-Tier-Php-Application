<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - EmployeeHub</title>
    
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
        
        .about-section {
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
        
        .content-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            animation: slideUp 0.8s ease-out;
            transition: all 0.3s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        }
        
        .content-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        
        .content-card p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.8;
            margin-bottom: 1rem;
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 3rem;
        }
        
        .feature-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            animation: fadeIn 0.6s ease-out both;
        }
        
        .feature-item:nth-child(1) { animation-delay: 0.2s; }
        .feature-item:nth-child(2) { animation-delay: 0.4s; }
        .feature-item:nth-child(3) { animation-delay: 0.6s; }
        
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
        
        .feature-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1.5rem;
            transition: all 0.4s ease;
        }
        
        .feature-item:nth-child(1) .feature-icon { background: var(--gradient-1); }
        .feature-item:nth-child(2) .feature-icon { background: var(--gradient-2); }
        .feature-item:nth-child(3) .feature-icon { background: var(--gradient-3); }
        
        .feature-item:hover .feature-icon {
            transform: rotate(360deg) scale(1.1);
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
                    <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="about-section">
        <div class="container">
            <div class="section-header">
                <h1>About <span class="gradient-text">EmployeeHub</span></h1>
                <p>Transforming the way organizations manage their most valuable asset - their people</p>
            </div>
            
            <div class="content-card">
                <h3><i class="fas fa-bullseye"></i> Our Mission</h3>
                <p>
                    At EmployeeHub, we're on a mission to revolutionize employee management systems. We believe that managing 
                    your workforce shouldn't be complicated, time-consuming, or frustrating. Our platform is designed to 
                    streamline every aspect of employee data management, from registration to daily operations.
                </p>
                <p>
                    We empower organizations of all sizes to build stronger teams by providing intuitive tools that make 
                    employee management effortless. Our commitment is to deliver a seamless experience that saves time, 
                    reduces errors, and enhances productivity.
                </p>
            </div>
            
            <div class="content-card">
                <h3><i class="fas fa-eye"></i> Our Vision</h3>
                <p>
                    We envision a world where HR professionals and managers can focus on what truly matters - building 
                    relationships, fostering growth, and creating exceptional workplace cultures - while our technology 
                    handles the administrative burden.
                </p>
                <p>
                    Through continuous innovation and a deep understanding of organizational needs, we're creating the 
                    future of employee management. A future that's automated, intelligent, and human-centered.
                </p>
            </div>
            
            <div class="feature-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Innovation First</h4>
                    <p style="color: rgba(255,255,255,0.7);">
                        Cutting-edge technology and modern design principles drive everything we create.
                    </p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Security Focused</h4>
                    <p style="color: rgba(255,255,255,0.7);">
                        Enterprise-grade security ensures your employee data is always protected and private.
                    </p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4>User-Centric</h4>
                    <p style="color: rgba(255,255,255,0.7);">
                        Designed with real users in mind, our platform is intuitive and easy to use.
                    </p>
                </div>
            </div>
            
            <div class="content-card mt-5">
                <h3><i class="fas fa-users"></i> Why Choose Us?</h3>
                <div class="row mt-4">
                    <div class="col-md-6 mb-3">
                        <h5><i class="fas fa-check-circle" style="color: #4facfe;"></i> Simple & Intuitive</h5>
                        <p style="color: rgba(255,255,255,0.7);">
                            No complex training required. Get started in minutes with our user-friendly interface.
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5><i class="fas fa-check-circle" style="color: #4facfe;"></i> Powerful Features</h5>
                        <p style="color: rgba(255,255,255,0.7);">
                            Comprehensive tools for registration, profile management, and administrative oversight.
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5><i class="fas fa-check-circle" style="color: #4facfe;"></i> Scalable Solution</h5>
                        <p style="color: rgba(255,255,255,0.7);">
                            Grows with your organization, from small teams to enterprise-level deployments.
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5><i class="fas fa-check-circle" style="color: #4facfe;"></i> Dedicated Support</h5>
                        <p style="color: rgba(255,255,255,0.7);">
                            Our team is always here to help you succeed with responsive customer support.
                        </p>
                    </div>
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
