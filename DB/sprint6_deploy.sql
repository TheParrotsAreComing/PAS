USE paws_db;

DELIMITER $$

-- just in case the procedure already exists
DROP PROCEDURE IF EXISTS sprint6_deploy $$

-- create the stored procedure to perform the needed changes
CREATE PROCEDURE sprint6_deploy()

BEGIN


-- add foster reference for users
IF NOT EXISTS (SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='users' AND column_name='foster_id')
THEN
ALTER TABLE users ADD column foster_id INT,
	ADD CONSTRAINT foster_ref FOREIGN KEY(foster_id) REFERENCES fosters(id);
END IF;


IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='users' AND column_name='profile_pic_file_id'))
THEN
ALTER TABLE users ADD COLUMN profile_pic_file_id INT,
	ADD CONSTRAINT user_profile_pic_ref FOREIGN KEY(profile_pic_file_id) REFERENCES files(id);
END IF;


END $$

-- run the stored procedure
CALL sprint6_deploy() $$

-- drop the stored procedure
DROP PROCEDURE IF EXISTS sprint6_deploy $$

DELIMITER ;
