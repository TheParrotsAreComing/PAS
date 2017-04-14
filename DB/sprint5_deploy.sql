USE paws_db;

DELIMITER $$

-- just in case the procedure already exists
DROP PROCEDURE IF EXISTS sprint5_deploy $$

-- create the stored procedure to perform the needed changes
CREATE PROCEDURE sprint5_deploy()

BEGIN

-- add is_deceased to cats, initialize to 0
IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='cats' AND column_name='is_deceased'))
THEN
ALTER TABLE cats ADD is_deceased BOOLEAN;
UPDATE cats SET is_deceased = 0 WHERE id > 0;
END IF;

-- add profile pic reference for adopters
IF NOT EXISTS (SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='adopters' AND column_name='profile_pic_file_id')
THEN
ALTER TABLE adopters ADD profile_pic_file_id INT,
	ADD CONSTRAINT adopter_profile_pic_ref FOREIGN KEY(profile_pic_file_id) REFERENCES files(id);
END IF;

END $$

-- run the stored procedure
CALL sprint5_deploy() $$

-- drop the stored procedure
DROP PROCEDURE IF EXISTS sprint5_deploy $$

DELIMITER ;

