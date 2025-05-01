-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a test user (hashed password)
INSERT INTO users (username, email, password) VALUES 
('testuser', 'test@example.com', PASSWORD_HASH('password123', PASSWORD_DEFAULT));


-- Create the register table
CREATE TABLE register (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Unique ID for each user
    username VARCHAR(50) NOT NULL UNIQUE, -- Username (must be unique)
    email VARCHAR(100) NOT NULL UNIQUE, -- Email address (must be unique)
    fullname VARCHAR(100) NOT NULL, -- Full name of the user
    password VARCHAR(255) NOT NULL, -- Hashed password
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Timestamp of account creation
);

-- Insert a test user (hashed password is an example, replace it with a hashed value from PHP)
INSERT INTO register (username, email, fullname, password) VALUES
('testuser', 'test@example.com', 'Test User', '$2y$10$E8N0x0k8zKj.9qj/R9UIrOY.fhTpJe.xRxZk/gCJJYF2rKdqT1eWm');

