use paws_db;


CREATE TABLE phone_numbers ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
	entity_type INT(11) NOT NULL,
	phone_type INT(11) NOT NULL, 
    entity_id INT NOT NULL,
    phone_num VARCHAR(10) NOT NULL,
    created DATETIME NOT NULL
); 
INSERT INTO phone_numbers(entity_type, phone_type, entity_id, phone_num, created)
VALUES (1, 1, 2, 9161234567, CAST(NOW() AS DATE));
INSERT INTO phone_numbers(entity_type, phone_type, entity_id, phone_num, created)
VALUES (1, 2, 2, 9161234567, CAST(NOW() AS DATE));
INSERT INTO phone_numbers(entity_type, phone_type, entity_id, phone_num, created)
VALUES (1, 3, 2, 9161234567, CAST(NOW() AS DATE));

INSERT INTO phone_numbers(entity_type, phone_type, entity_id, phone_num, created)
VALUES (2, 1, 2, 2091234567, CAST(NOW() AS DATE));
INSERT INTO phone_numbers(entity_type, phone_type, entity_id, phone_num, created)
VALUES (2, 2, 2, 2091234567, CAST(NOW() AS DATE));
INSERT INTO phone_numbers(entity_type, phone_type, entity_id, phone_num, created)
VALUES (2, 3, 2, 2091234567, CAST(NOW() AS DATE));