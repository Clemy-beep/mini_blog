CREATE DATABASE blog;

CREATE TABLE blog.users (
    `id` TINYINT(3) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `username` VARCHAR(100) NOT NULL,
    `password` VARCHAR (255) NOT NULL,
    `email` VARCHAR (255) NOT NULL
);

CREATE TABLE blog.articles(
    `id` TINYINT(3) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	`title` VARCHAR(100) NOT NULL,
    `content` TEXT NOT NULL,
    `published_on` DATE NOT NULL,
    `author` VARCHAR(100) NOT NULL
);