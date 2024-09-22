CREATE DATABASE IF NOT EXISTS School;
USE School;

CREATE TABLE Students (
    id_student INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    birth_date DATE,
    id_course INT,
    FOREIGN KEY (id_course) REFERENCES Courses(id_course)
);

CREATE TABLE Teachers (
    id_teacher INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    specialization VARCHAR(100)
);

CREATE TABLE Courses (
    id_course INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100),
    description TEXT,
    id_teacher INT,
    id_room INT,
    FOREIGN KEY (id_teacher) REFERENCES Teachers(id_teacher),
    FOREIGN KEY (id_room) REFERENCES Rooms(id_room)
);

CREATE TABLE Rooms (
    id_room INT AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(50),
    capacity INT
);

INSERT INTO Rooms (room_name, capacity) VALUES
('Room 101', 30),
('Room 102', 25),
('Room 103', 40),
('Room 104', 35),
('Room 105', 20);

INSERT INTO Teachers (first_name, last_name, specialization) VALUES
('Oleksandr', 'Shevchenko', 'English'),
('Iryna', 'Kovalenko', 'Catalan'),
('Dmytro', 'Melnyk', 'TIC'),
('Svitlana', 'Zhuk', 'Math'),
('Viktor', 'Pavlenko', 'History');

INSERT INTO Courses (course_name, description, id_teacher, id_room) VALUES
('English', 'Basic English for primary school students', 1, 1),
('Catalan', 'Introduction to Catalan language', 2, 2),
('TIC', 'Basic technology and computer skills', 3, 3),
('Math', 'Primary level mathematics', 4, 4),
('History', 'General history for primary education', 5, 5);

INSERT INTO Students (first_name, last_name, birth_date, id_course) VALUES
('Andriy', 'Klymenko', '2012-08-20', 1),
('Oksana', 'Bondarenko', '2011-10-12', 2),
('Yuriy', 'Hrytsenko', '2010-05-15', 3),
('Tetiana', 'Lytvyn', '2012-03-22', 4),
('Maksym', 'Polishchuk', '2011-11-11', 5);
