USE paws_db;

DELIMITER $$

-- just in case the procedure already exists
DROP PROCEDURE IF EXISTS sprint5_deploy $$

-- create the stored procedure to perform the needed changes
CREATE PROCEDURE sprint5_deploy()

BEGIN

-- add phone_numbers table
IF NOT EXISTS ((SELECT * FROM information_schema.tables where table_name = 'phone_numbers'))
THEN
CREATE TABLE phone_numbers ( 
	id INT AUTO_INCREMENT PRIMARY KEY,
	entity_type INT(11) NOT NULL,
	phone_type INT(11) NOT NULL, 
    entity_id INT NOT NULL,
    phone_num VARCHAR(10) NOT NULL,
    created DATETIME NOT NULL
);
END IF;
-- remove the old phone field from the adopters table
IF EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='adopters' AND column_name='phone'))
THEN
ALTER TABLE adopters DROP COLUMN phone;
END IF;
-- remove the old phone field from the fosters table
IF EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='fosters' AND column_name='phone'))
THEN
ALTER TABLE fosters DROP COLUMN phone;
END IF;

-- add is_deceased to cats, initialize to 0
IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='cats' AND column_name='is_deceased'))
THEN
ALTER TABLE cats ADD is_deceased BOOLEAN;
UPDATE cats SET is_deceased = 0 WHERE id > 0;
END IF;

IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='files' AND column_name='original_filename'))
THEN 
ALTER TABLE files ADD original_filename VARCHAR(128) NOT NULL;
END IF;

IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='files' AND column_name='note'))
THEN
ALTER TABLE files ADD note TEXT;
END IF;

-- add profile pic reference for adopters
IF NOT EXISTS (SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='adopters' AND column_name='profile_pic_file_id')
THEN
ALTER TABLE adopters ADD profile_pic_file_id INT,
	ADD CONSTRAINT adopter_profile_pic_ref FOREIGN KEY(profile_pic_file_id) REFERENCES files(id);
END IF;

-- add profile pic reference for fosters
IF NOT EXISTS (SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='fosters' AND column_name='profile_pic_file_id')
THEN
ALTER TABLE fosters ADD profile_pic_file_id INT,
	ADD CONSTRAINT foster_profile_pic_ref FOREIGN KEY(profile_pic_file_id) REFERENCES files(id);
END IF;

IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='cat_medical_histories' AND column_name='file_id'))
THEN
ALTER TABLE cat_medical_histories ADD file_id INT;
END IF;


END $$

-- run the stored procedure
CALL sprint5_deploy() $$

-- drop the stored procedure
DROP PROCEDURE IF EXISTS sprint5_deploy $$

DELIMITER ;

