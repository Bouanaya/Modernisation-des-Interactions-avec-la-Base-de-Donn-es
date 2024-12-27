CREATE DATABASE players_db
USE players_db;
CREATE TABLE players (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    team VARCHAR(100) NOT NULL,
    position VARCHAR(50),
    club VARCHAR(100),
    nationality VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE players 
MODIFY COLUMN position ENUM('GK', 'ST', 'CM', 'SE') NOT NULL;