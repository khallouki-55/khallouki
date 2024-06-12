CREATE DATABASE articles;
use articles;
CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255),
    prix DECIMAL(10, 2),
    quantite INT
);

INSERT INTO articles (description, prix, quantite) VALUES 
('Article 1', 100, 10),
('Article 2', 200, 20),
('Article 3', 300, 30),
('Article 4', 400, 40),
('Article 5', 500, 50);
