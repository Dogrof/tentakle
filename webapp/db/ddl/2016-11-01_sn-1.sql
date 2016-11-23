-- Users 
CREATE TABLE IF NOT EXISTS users (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(40),
	first_name VARCHAR(20),
	last_name VARCHAR(20),
	sex char(1),
	birth_date DATE
);
