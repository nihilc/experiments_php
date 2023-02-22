-- Active: 1676903718850@@127.0.0.1@3306@test
DROP TABLE Cities;

CREATE TABLE Cities(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255)
);

DROP TABLE Companies;

CREATE TABLE Companies(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    info TEXT,
    city_id INT,
    Foreign Key (city_id) REFERENCES Cities(id)
);

DROP TABLE Users;

CREATE TABLE Users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(50),
    lname VARCHAR(50),
    phone VARCHAR(20),
    city_id INT,
    company_id INT,
    Foreign Key (city_id) REFERENCES Cities(id),
    Foreign Key (company_id) REFERENCES Companies(id)
);