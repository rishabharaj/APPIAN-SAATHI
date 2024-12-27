CREATE TABLE documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    classification VARCHAR(50),
    summary TEXT,
    cloud_url VARCHAR(255) DEFAULT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
