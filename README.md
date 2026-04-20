# EmployeeHub - Professional Employee Management System

A highly advanced, professional employee registration and management website built with HTML, CSS, JavaScript, Bootstrap, Tailwind CSS, PHP, and MySQL.

## 🌟 Features

### User Features
- **Beautiful Landing Page** with professional animations
- **User Registration** with email validation and password encryption
- **Secure Login System** with role-based access control
- **Personal Dashboard** for employees to:
  - View their profile information
  - Edit their details (name, position, bio)
  - Change their password
  - Delete their account

### Admin Features
- **Admin Dashboard** with:
  - View all employee records in a professional table
  - Search and filter functionality
  - Real-time statistics (total employees, users, admins)
  - View detailed employee information in modal
  - Delete employee records (except admins)

### Design Features
- **Professional Animations** including:
  - Fade-in effects
  - Slide-up/down animations
  - Hover transformations
  - Gradient backgrounds
  - Smooth transitions
- **Responsive Design** works perfectly on:
  - Desktop computers
  - Tablets
  - Mobile phones
- **Modern UI/UX** with:
  - Glass-morphism effects
  - Gradient color schemes
  - Custom typography (Playfair Display + Inter)
  - Professional iconography (Font Awesome)

## 📁 File Structure

```
employee-hub/
├── index.php              # Landing page
├── register.php           # Employee registration
├── login.php             # Login page
├── dashboard.php         # User dashboard
├── admin_dashboard.php   # Admin dashboard
├── about.php             # About page
├── services.php          # Services page
├── contact.php           # Contact page
├── logout.php            # Logout handler
├── config.php            # Database configuration
└── README.md             # This file
```

## 🚀 Installation Instructions

### Prerequisites
- **XAMPP** (or any Apache + PHP + MySQL server)
- **Web Browser** (Chrome, Firefox, Safari, etc.)
- **Text Editor** (VS Code, Sublime, etc.)

### Step 1: Install XAMPP
1. Download XAMPP from [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Install XAMPP on your system
3. Start Apache and MySQL from XAMPP Control Panel

### Step 2: Create Database
1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Click on "New" to create a new database
3. Name it: `company_db`
4. Click "Create"
5. Select the `company_db` database
6. Click on "SQL" tab
7. Copy and paste the following SQL:

```sql
CREATE DATABASE company_db;
USE company_db;

CREATE TABLE employees (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    position VARCHAR(100),
    bio TEXT,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a default admin account
INSERT INTO employees (full_name, email, password, position, role) 
VALUES ('Admin User', 'admin@employeehub.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System Administrator', 'admin');
-- Default admin password: password
```

8. Click "Go" to execute

### Step 3: Setup Files
1. Copy all PHP files to your XAMPP htdocs folder:
   - Windows: `C:\xampp\htdocs\employee-hub\`
   - Mac: `/Applications/XAMPP/htdocs/employee-hub/`
   - Linux: `/opt/lampp/htdocs/employee-hub/`

2. Open `config.php` and verify database settings:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'company_db');
```

### Step 4: Access the Website
1. Open your web browser
2. Navigate to: `http://localhost/employee-hub/index.php`
3. You should see the beautiful landing page!

## 🔐 Default Login Credentials

### Admin Account
- **Email:** admin@employeehub.com
- **Password:** password

**Important:** Change the admin password after first login!

## 📖 Usage Guide

### For Employees:
1. **Register:** Click "Register" and fill in your details
2. **Login:** Use your email and password to login
3. **Dashboard:** View and edit your profile
4. **Manage:** Update information or delete your account

### For Administrators:
1. **Login:** Use admin credentials
2. **View Records:** See all employee data in the admin dashboard
3. **Search:** Use the search box to find specific employees
4. **Manage:** View details or delete user accounts

## 🎨 Technologies Used

### Frontend
- **HTML5** - Structure
- **CSS3** - Styling with animations
- **JavaScript** - Interactivity
- **Bootstrap 5** - Responsive framework
- **Tailwind CSS** - Utility-first CSS
- **Font Awesome** - Icons
- **Google Fonts** - Typography (Playfair Display, Inter)

### Backend
- **PHP 7+** - Server-side logic
- **MySQL** - Database management
- **Session Management** - User authentication

## 🔒 Security Features

- Password hashing using PHP's `password_hash()`
- SQL injection prevention with `mysqli_real_escape_string()`
- Session-based authentication
- Role-based access control (user/admin)
- XSS protection with `htmlspecialchars()`
- Secure password validation

## 📱 Responsive Breakpoints

- **Mobile:** < 768px
- **Tablet:** 768px - 1024px
- **Desktop:** > 1024px

## 🎭 Animation Effects

- Fade In/Out
- Slide Up/Down
- Scale Transforms
- Rotation Effects
- Gradient Animations
- Hover Transitions
- Scroll Reveals

## 🐛 Troubleshooting

### Database Connection Error
- Check if MySQL is running in XAMPP
- Verify database credentials in `config.php`
- Ensure database `company_db` exists

### Login Not Working
- Clear browser cache and cookies
- Check if sessions are enabled in PHP
- Verify user exists in database

### Styling Issues
- Clear browser cache
- Check if CDN links are accessible
- Verify internet connection for external resources

## 🔄 Future Enhancements

Potential features to add:
- Password reset functionality
- Email verification
- Profile picture upload
- Advanced search filters
- Export data to CSV/PDF
- Employee performance tracking
- Attendance management
- Leave request system

## 📄 License

This project is open-source and available for educational purposes.

## 👨‍💻 Developer Notes

### Database Schema
- **id:** Primary key, auto-increment
- **full_name:** Employee's full name
- **email:** Unique email address
- **password:** Hashed password
- **position:** Job position/title
- **bio:** Employee biography (optional)
- **role:** 'user' or 'admin'
- **created_at:** Registration timestamp

### Security Best Practices
- Always use prepared statements for production
- Implement CSRF protection
- Add rate limiting for login attempts
- Enable HTTPS in production
- Regular database backups

##Author <br>
Omkar Barbade
