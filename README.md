# bookshare
Web page for book sharing.

In order for application to work properly it is required to have SQL database named bookshare_db with two tables, users and books.

SQL query for creating table user:
CREATE TABLE `users` (
 `username` varchar(100) NOT NULL,
 `password` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 PRIMARY KEY (`username`))
 
 SQL query for creating table user:
 CREATE TABLE `books` (
 `id` int(100) NOT NULL AUTO_INCREMENT,
 `title` varchar(30) NOT NULL,
 `author` varchar(30) NOT NULL,
 `description` varchar(200) NOT NULL,
 `picture` varchar(100) NOT NULL DEFAULT 'no_image.jpg',
 `username` varchar(20) NOT NULL,
 `email` varchar(20) NOT NULL,
 PRIMARY KEY (`id`))
