use paws_db;

/* DEV DESTRUCTION

This block should never need to be ran on production, 
as it deletes all tables for re-creating everything
from scratch

	
	USE paws_db;
    DROP TABLE IF EXISTS contacts;
	DROP TABLE IF EXISTS tags_fosters; 
	DROP TABLE IF EXISTS tags_adopters; 
    DROP TABLE IF EXISTS tags_cats; 
    DROP TABLE IF EXISTS tags; 
    DROP TABLE IF EXISTS users_events; 
    DROP TABLE IF EXISTS users; 
    DROP TABLE IF EXISTS cats_adoption_events; 
    DROP TABLE IF EXISTS adoption_events; 
    DROP TABLE IF EXISTS cat_medical_histories;
    DROP TABLE IF EXISTS cat_histories;
    DROP TABLE IF EXISTS cats;
    DROP TABLE IF EXISTS files;
    DROP TABLE IF EXISTS fosters; 
    DROP TABLE IF EXISTS adopters; 
    DROP TABLE IF EXISTS litters;
    DROP TABLE IF EXISTS breeds;
    DROP TABLE IF EXISTS colors;
    
    
*/


CREATE TABLE litters ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
	kc_ref_id INT NOT NULL,
    litter_name VARCHAR(255) NOT NULL,
    the_cat_count INT NOT NULL,
    kitten_count INT NOT NULL,
    dob DATE,
    asn_start DATE,						
    asn_end DATE,
    est_arrival VARCHAR(50),
    breed VARCHAR(255),
    foster_notes VARCHAR(255),
    notes TEXT,
    created DATETIME,
    is_deleted BOOLEAN NOT NULL
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
	created DATETIME,
    is_deleted BOOLEAN NOT NULL,
    do_not_adopt BOOLEAN,
    dna_reason TEXT
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
	created DATETIME,
    is_deleted BOOLEAN NOT NULL
); 


CREATE TABLE files ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
	entity_type INT NOT NULL,
    entity_id INT NOT NULL,
	is_photo BOOLEAN NOT NULL,
    mime_type VARCHAR(128) NOT NULL,
    file_size INT NOT NULL,
	file_path VARCHAR(256) NOT NULL,
    file_ext VARCHAR(10) NOT NULL,
    created DATETIME NOT NULL,
    is_deleted BOOLEAN NOT NULL
); 


CREATE TABLE breeds(
    id INT AUTO_INCREMENT PRIMARY KEY, 
    breed VARCHAR(24)
);

CREATE TABLE cats ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
	litter_id INT,
	adopter_id INT,
	foster_id INT,
	cat_name VARCHAR(255) NOT NULL,
	is_kitten BOOLEAN NOT NULL,
	dob DATE NOT NULL,
	is_female BOOLEAN NOT NULL,
    breed_id INT NOT NULL,
	color VARCHAR(75) NOT NULL,
	coat VARCHAR(75) NOT NULL,
	bio TEXT,
	diet TEXT,
	specialty_notes TEXT,					
	profile_pic_file_id INT,    
	microchip_number INT,
    is_microchip_registered BOOLEAN,
	created DATETIME,
	adoption_fee_amount DECIMAL(10,2),
	is_paws BOOLEAN,
    is_deleted BOOLEAN NOT NULL,
    is_exported_to_adoptapet BOOLEAN,
    good_with_kids BOOLEAN,
    good_with_dogs BOOLEAN,
    good_with_cats BOOLEAN,
    special_needs BOOLEAN,
    needs_experienced_adopter BOOLEAN,
    FOREIGN KEY profile_pic_ref(profile_pic_file_id) REFERENCES files(id),
	FOREIGN KEY litter_ref (litter_id) REFERENCES litters(id),
	FOREIGN KEY adopter_ref (adopter_id) REFERENCES adopters(id),
	FOREIGN KEY foster_ref (foster_id) REFERENCES fosters(id),
    FOREIGN KEY breed_ref (breed_id) REFERENCES breeds(id)
    
    -- TODO: Need to revisit medical histories as a seperate entities
    /*
    vaccine_date VARCHAR(255), --xxx Added by Eric, 2/8/17. Data types/sizes are up for debate xxx
	marquis VARCHAR(64),
	dewormer_date VARCHAR(255),
	flea_treatment_date VARCHAR(255), 
	disease_testing_date VARCHAR(255),
	spay_neuter_date VARCHAR(255),
	lime_dip VARCHAR(255),
    antibiotics VARCHAR(255), --xxx End additions by Eric xxx
    */
    
); 

CREATE TABLE cat_medical_histories (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cat_id INT NOT NULL,
	is_fvrcp BOOLEAN,
	is_deworm BOOLEAN,
	is_flea BOOLEAN,
	is_rabies BOOLEAN,
    is_other BOOLEAN,
	administered_date DATE NOT NULL,
	notes TEXT,
	FOREIGN KEY cat_ref (cat_id) REFERENCES cats(id)
);


CREATE TABLE cat_histories ( 
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


CREATE TABLE adoption_events ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
	event_date DATE NOT NULL,
	description TEXT,
    is_deleted BOOLEAN NOT NULL
); 


CREATE TABLE cats_adoption_events ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	cat_id INT NOT NULL,
	adoption_event_id INT NOT NULL,
	FOREIGN KEY cat_ref (cat_id) REFERENCES cats(id),
	FOREIGN KEY event_ref (adoption_event_id) REFERENCES adoption_events(id)
); 


CREATE TABLE users ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    is_deleted BOOLEAN NOT NULL
); 

CREATE TABLE users_events ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    adoption_event_id INT NOT NULL
); 


CREATE TABLE tags ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
	label VARCHAR(64),
	color VARCHAR(6), /* for hex code */
	type_bit TINYINT(3), /* Bit mask for type: cats, fosters, adopters, or a combination */
    -- NOTE: We should probably consider splitting this into separate flags for each, for maintainability
    -- ALSO: Cake seems to hate TINYINT ?
    is_deleted BOOLEAN NOT NULL
); 


CREATE TABLE tags_cats ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
	tag_id INT NOT NULL,
	cat_id INT NOT NULL,
	FOREIGN KEY tag_ref(tag_id) REFERENCES tags(id),
	FOREIGN KEY cat_ref(cat_id) REFERENCES cats(id)
); 


CREATE TABLE tags_adopters ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
    tag_id INT NOT NULL,
	adopter_id INT NOT NULL,
	FOREIGN KEY tag_ref(tag_id) REFERENCES tags(id),
	FOREIGN KEY adopter_ref(adopter_id) REFERENCES adopters(id)
); 


CREATE TABLE tags_fosters ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
    tag_id INT NOT NULL,
	foster_id INT NOT NULL,
	FOREIGN KEY tag_ref(tag_id) REFERENCES tags(id),
	FOREIGN KEY foster_ref(foster_id) REFERENCES fosters(id)
); 

CREATE TABLE contacts (
	id INT AUTO_INCREMENT PRIMARY KEY,
	contact_name VARCHAR(64) NOT NULL,
	organization VARCHAR(128),
	email VARCHAR(128),
	phone VARCHAR(10),
	address VARCHAR(128),
	city VARCHAR(64),
	state VARCHAR(2),
	zip INT(5),
    is_deleted BOOLEAN NOT NULL
);

CREATE TABLE colors(
    id INT AUTO_INCREMENT PRIMARY KEY, 
    color VARCHAR(32)
);
