CREATE DATABASE school_management;

USE school_management;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentName VARCHAR(100) NOT NULL,
    studentID VARCHAR(50) NOT NULL UNIQUE,
    class VARCHAR(50) NOT NULL
);

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentID VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    status ENUM('present', 'absent') NOT NULL
);
