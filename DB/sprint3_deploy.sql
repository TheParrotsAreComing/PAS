USE paws_db;

DELIMITER $$

-- just in case the procedure already exists
DROP PROCEDURE IF EXISTS sprint3_deploy $$

-- create the stored procedure to perform the needed changes
CREATE PROCEDURE sprint3_deploy()

BEGIN

-- add is_exported_to_adoptapet to the cats table, if it doesn't already exist
IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='cats' AND column_name='is_exported_to_adoptapet'))
THEN
ALTER TABLE cats ADD is_exported_to_adoptapet BOOLEAN;
END IF;

-- change cat_count in litters to the_cat_count to stop cake madness
IF EXISTS((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='litters' AND column_name='cat_count'))
THEN
ALTER TABLE litters CHANGE cat_count the_cat_count INT NOT NULL;
END IF;

END $$

-- run the stored procedure
CALL sprint3_deploy() $$

-- drop the stored procedure
DROP PROCEDURE IF EXISTS sprint3_deploy $$

DELIMITER ;