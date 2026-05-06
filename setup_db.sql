-- SQL Schema for AuthVault
CREATE DATABASE IF NOT EXISTS authvault;
USE authvault;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'user',
    secret_data VARCHAR(255) DEFAULT '••••••••',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert some dummy data for the lesson
-- Password for these is 'password123' (hashed)
-- Note: In a real app, admin wouldn't have a hardcoded secret in a table like this, 
-- but it serves the educational purpose of the lesson.
INSERT IGNORE INTO users (email, password_hash, full_name, role, secret_data) VALUES
('admin@corp.com', '$2y$10$JuLgbm8d/DaEYazfxeVy4OXlu/ePSHt8aQXVXgPUnp15inK4LBBbG', 'Admin', 'administrator', 'CR3D1T-4412'),
('alice@corp.com', '$2y$10$JuLgbm8d/DaEYazfxeVy4OXlu/ePSHt8aQXVXgPUnp15inK4LBBbG', 'Alice', 'user', '••••••••'),
('bob@corp.com', '$2y$10$JuLgbm8d/DaEYazfxeVy4OXlu/ePSHt8aQXVXgPUnp15inK4LBBbG', 'Bob', 'user', '••••••••');
