USE paws_db;

DELIMITER $$

-- just in case the procedure already exists
DROP PROCEDURE IF EXISTS sprint4_deploy $$

-- create the stored procedure to perform the needed changes
CREATE PROCEDURE sprint4_deploy()

BEGIN
-- add cat medical histories table
IF NOT EXISTS ((SELECT * FROM information_schema.tables where table_name = 'cat_medical_histories'))
THEN
CREATE TABLE cat_medical_histories (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cat_id INT NOT NULL,
	is_fvrcp BOOLEAN,
	is_deworm BOOLEAN,
	is_flea BOOLEAN,
	is_rabies BOOLEAN,
	administered_date DATE NOT NULL,
	notes TEXT,
	FOREIGN KEY cat_ref (cat_id) REFERENCES cats(id)
);
END IF;

-- add is_other to medical histories
IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='cat_medical_histories' AND column_name='is_other'))
THEN
ALTER TABLE cat_medical_histories ADD is_other BOOLEAN;
END IF;

-- change columns in files to all be not nullable
IF EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='files' AND column_name='entity_id' AND is_nullable = 'YES'))
THEN
ALTER TABLE files CHANGE entity_id entity_id INT NOT NULL;
END IF;

IF EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='files' AND column_name='file_path' AND is_nullable = 'YES'))
THEN
ALTER TABLE files CHANGE file_path file_path VARCHAR(256) NOT NULL;
END IF;


-- change file_type to is_photo
IF EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='files' AND column_name='filetype'))
THEN
ALTER TABLE files CHANGE filetype is_photo BOOLEAN NOT NULL;
END IF;

-- add created
IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='files' AND column_name='created'))
THEN
ALTER TABLE files ADD created DATETIME NOT NULL;
END IF;


-- add entity type
IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='files' AND column_name='entity_type'))
THEN
ALTER TABLE files ADD entity_type INT NOT NULL;
END IF;

-- add file size
IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='files' AND column_name='file_size'))
THEN
ALTER TABLE files ADD file_size INT NOT NULL;
END IF;

-- add mime type
IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='files' AND column_name='mime_type'))
THEN
ALTER TABLE files ADD mime_type VARCHAR(128) NOT NULL;
END IF;

-- add file ext
IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='files' AND column_name='file_ext'))
THEN
ALTER TABLE files ADD file_ext VARCHAR(10) NOT NULL;
END IF;



END $$

-- run the stored procedure
CALL sprint4_deploy() $$

-- drop the stored procedure
DROP PROCEDURE IF EXISTS sprint4_deploy $$

DELIMITER ;
