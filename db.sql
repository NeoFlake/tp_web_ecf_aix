CREATE DATABASE library_database;

USE library_database;

CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(128),
    last_name VARCHAR(128),
    email VARCHAR(128) UNIQUE,
    password VARCHAR(128)
);

CREATE TABLE author (
    id INT PRIMARY KEY AUTO_INCREMENT,
    complete_name VARCHAR(512),
    nationality VARCHAR(128)
);

CREATE TABLE book (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(240) UNIQUE,
    category VARCHAR(128),
    publishing_year INT,
    resume VARCHAR(1024),
    id_author INT,
    id_admin INT,
    FOREIGN KEY (id_author) REFERENCES author (id),
    FOREIGN KEY (id_admin) REFERENCES admin (id)
); 

SELECT * FROM book;

INSERT INTO book (title,
    category,
    publishing_year,
    resume,
    id_author,
    id_admin)

    VALUES (
        "Notre Dame de Paris",
        "Historique",
        1835,
        "Un livre extraordinaire qui a donné naissance à une comédie musicale affreuse",
        5,
        2
    );

SELECT * FROM admin;

SELECT b.title AS title, 
        b.category AS category, 
        b.publishing_year AS publishing_year, 
        auth.complete_name AS author_name ,
        b.id_author
        FROM book AS b
        JOIN author AS auth ON b.id_author = auth.id
        WHERE b.id_author = 1
        ORDER BY publishing_year DESC;