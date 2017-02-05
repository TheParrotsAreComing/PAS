use paws_db;

/* DEV DESTRUCTION

This block should never need to be ran on production, 
as it deletes all tables for re-creating everything
from scratch

	
	USE paws_db;
	DROP TABLE IF EXISTS files; 
	DROP TABLE IF EXISTS tags_fosters; 
	DROP TABLE IF EXISTS tags_adopters; 
    DROP TABLE IF EXISTS tags_cats; 
    DROP TABLE IF EXISTS tags; 
    DROP TABLE IF EXISTS users_events; 
    DROP TABLE IF EXISTS users; 
    DROP TABLE IF EXISTS cats_adoptionevents; 
    DROP TABLE IF EXISTS adoptionevents; 
    DROP TABLE IF EXISTS cathistory;
    DROP TABLE IF EXISTS cats;
    DROP TABLE IF EXISTS fosters; 
    DROP TABLE IF EXISTS adopters; 
    DROP TABLE IF EXISTS litters;
    
*/


CREATE TABLE litters ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
    litter_name VARCHAR(255) NOT NULL
);


CREATE TABLE adopters ( 
	id INT AUTO_INCREMENT PRIMARY KEY  
); 


CREATE TABLE fosters ( 
	id INT AUTO_INCREMENT PRIMARY KEY  
); 


CREATE TABLE cats ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
	litter_id INT,
	FOREIGN KEY (litter_id) REFERENCES litters(id)
); 


CREATE TABLE cathistory ( 
	id INT AUTO_INCREMENT PRIMARY KEY  
); 


CREATE TABLE adoptionevents ( 
	id INT AUTO_INCREMENT PRIMARY KEY  
); 


CREATE TABLE cats_adoptionevents ( 
	id INT AUTO_INCREMENT PRIMARY KEY  
); 


CREATE TABLE users ( 
	id INT AUTO_INCREMENT PRIMARY KEY  
); 


CREATE TABLE users_events ( 
	id INT AUTO_INCREMENT PRIMARY KEY  
); 


CREATE TABLE tags ( 
	id INT AUTO_INCREMENT PRIMARY KEY  
); 


CREATE TABLE tags_cats ( 
	id INT AUTO_INCREMENT PRIMARY KEY  
); 


CREATE TABLE tags_adopters ( 
	id INT AUTO_INCREMENT PRIMARY KEY  
); 


CREATE TABLE tags_fosters ( 
	id INT AUTO_INCREMENT PRIMARY KEY  
); 


CREATE TABLE files ( 
	id INT AUTO_INCREMENT PRIMARY KEY  
); 