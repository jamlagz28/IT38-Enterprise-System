-- Create the database
CREATE DATABASE IF NOT EXISTS bukid_crafts;
USE bukid_crafts;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default admin user (plain text password for now)
INSERT INTO users (username, password, email) VALUES
('admin', 'password123', 'admin@bukidcrafts.com');
