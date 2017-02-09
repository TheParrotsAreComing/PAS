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
    DROP TABLE IF EXISTS users_types;
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
	kc_ref_id INT NOT NULL,
    litter_name VARCHAR(255) NOT NULL,
    cat_count INT NOT NULL,
    kitten_count INT NOT NULL,
    dob DATE,
    asn_start DATE,						
    asn_end DATE,
    est_arrival VARCHAR(50),
    breed VARCHAR(255),
    foster_notes VARCHAR(255),
    notes TEXT,
    created DATETIME
);


CREATE TABLE adopters ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
	phone VARCHAR(10) NOT NULL,
	cat_count INT NOT NULL,
	address VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	notes TEXT,
    fee BOOLEAN NOT NULL,
	created DATETIME
); 


CREATE TABLE fosters ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
	phone VARCHAR(10) NOT NULL,
	address VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	exp VARCHAR(255),
	pets VARCHAR(255),
	kids VARCHAR(255),
	avail VARCHAR(255),
	rating INT,
	notes TEXT,
	created DATETIME
); 


CREATE TABLE cats ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
	litter_id INT,
	adopter_id INT,
	foster_id INT,
	name VARCHAR(255) NOT NULL,
	is_kitten BIT(1) NOT NULL,
	dob DATE NOT NULL,
	is_female BIT(1) NOT NULL,
	breed VARCHAR(255) NOT NULL,
	bio TEXT,
	asn DATE,
	caretaker_notes VARCHAR(255),
	medical_notes TEXT,					
	microchip INT,
	microchip_date DATE,	
	created DATETIME,
	FOREIGN KEY litter_ref (litter_id) REFERENCES litters(id),
	FOREIGN KEY adopter_ref (adopter_id) REFERENCES adopters(id),
	FOREIGN KEY foster_ref (foster_id) REFERENCES fosters(id)
); 


CREATE TABLE cathistory ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
	cat_id INT NOT NULL,
	adopter_id INT,
	foster_id INT,	
	start_date DATE NOT NULL,
	end_date DATE,
	FOREIGN KEY cat_ref (cat_id) REFERENCES cats(id),
	FOREIGN KEY adopter_ref (adopter_id) REFERENCES adopters(id),
	FOREIGN KEY foster_ref (foster_id) REFERENCES fosters(id)	
); 


CREATE TABLE adoptionevents ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
	event_date DATE NOT NULL,
	description TEXT
); 


CREATE TABLE cats_adoptionevents ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	cat_id INT NOT NULL,
	event_id INT NOT NULL,
	FOREIGN KEY cat_ref (cat_id) REFERENCES cats(id),
	FOREIGN KEY event_ref (event_id) REFERENCES adoptionevents(id)
); 


CREATE TABLE users ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
    FOREIGN KEY user_ref (user_type_id) REFERENCES user_types(id),
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL
); 

CREATE TABLE users_types ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT
); 

CREATE TABLE users_events ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    event_id INT NOT NULL
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