CREATE DATABASE IF NOT EXISTS qna_database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE qna_database;

CREATE TABLE IF NOT EXISTS qna (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    answer TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO qna (question, answer) VALUES 
('Ako funguje tento systém?', 'Toto je systém pre často kladené otázky.'),
('Kde nájdem dokumentáciu?', 'Dokumentácia je dostupná v administráčnej časti.');