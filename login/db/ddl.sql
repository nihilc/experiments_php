-- Active: 1676903718850@@127.0.0.1@3306@test
DROP database `test`;

CREATE database `test`;

USE `test`;

CREATE TABLE `users` (
    `id` int (11) NOT NULL AUTO_INCREMENT,
    `username` varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL,
    `rol` enum ('admin', 'dev', 'test') NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username_UNIQUE` (`username`)
);