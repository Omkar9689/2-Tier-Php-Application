-- EmployeeHub Database Setup
-- This file contains all necessary SQL commands to set up the database

-- Create the database
CREATE DATABASE IF NOT EXISTS company_db;

-- Use the database
USE company_db;

-- Drop table if exists (for fresh installation)
DROP TABLE IF EXISTS employees;

-- Create employees table
CREATE TABLE employees (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    position VARCHAR(100),
    bio TEXT,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_role (role)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default admin account
-- Email: admin@employeehub.com
-- Password: password (you should change this after first login!)
INSERT INTO employees (full_name, email, password, position, bio, role) 
VALUES (
    'Admin User', 
    'admin@employeehub.com', 
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
    'System Administrator',
    'Default system administrator account. Please change the password after first login.',
    'admin'
);

-- Insert sample employee accounts for testing (optional)
INSERT INTO employees (full_name, email, password, position, bio, role) 
VALUES 
(
    'John Doe', 
    'john@example.com', 
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
    'Software Engineer',
    'Passionate software developer with 5 years of experience in web development.',
    'user'
),
(
    'Jane Smith', 
    'jane@example.com', 
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
    'Product Manager',
    'Experienced product manager focused on delivering exceptional user experiences.',
    'user'
),
(
    'Mike Johnson', 
    'mike@example.com', 
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
    'UX Designer',
    'Creative designer passionate about creating beautiful and functional interfaces.',
    'user'
);

-- Note: All sample accounts use the password "password" for testing
-- Make sure to change passwords in production!

-- Display success message
SELECT 'Database setup completed successfully!' AS message;
SELECT 'Default admin credentials:' AS info;
SELECT 'Email: admin@employeehub.com' AS email;
SELECT 'Password: password' AS password;
SELECT 'Please change the admin password after first login!' AS warning;
