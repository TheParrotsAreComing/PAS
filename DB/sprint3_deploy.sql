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

-- add fields to cat for adopt a pet
IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='cats' AND column_name='good_with_kids'))
THEN
ALTER TABLE cats ADD good_with_kids BOOLEAN;
END IF;

IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='cats' AND column_name='good_with_dogs'))
THEN 
ALTER TABLE cats ADD good_with_dogs BOOLEAN;
END IF;

IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='cats' AND column_name='good_with_cats'))
THEN
ALTER TABLE cats ADD good_with_cats BOOLEAN;
END IF;

IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='cats' AND column_name='special_needs'))
THEN 
ALTER TABLE cats ADD special_needs BOOLEAN;
END IF;

IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='cats' AND column_name='needs_experienced_adopter'))
THEN
ALTER TABLE cats ADD needs_experienced_adopter BOOLEAN;
END IF;

-- add a breed table for cats and exporting to adopt a pet
IF NOT EXISTS ((SELECT * FROM information_schema.tables where table_name = 'breeds'))
THEN
CREATE TABLE breeds(id INT AUTO_INCREMENT PRIMARY KEY, breed VARCHAR(24));
END IF;

-- add the initial breeds
IF NOT EXISTS ((SELECT * FROM breeds))
THEN
INSERT INTO breeds(breed) VALUES ("Abyssinian");
INSERT INTO breeds(breed) VALUES ("American Bobtail");
INSERT INTO breeds(breed) VALUES ("American Curl");
INSERT INTO breeds(breed) VALUES ("American Shorthair");
INSERT INTO breeds(breed) VALUES ("American Wirehair");
INSERT INTO breeds(breed) VALUES ("Balinese");
INSERT INTO breeds(breed) VALUES ("Bengal");
INSERT INTO breeds(breed) VALUES ("Birman");
INSERT INTO breeds(breed) VALUES ("Bombay");
INSERT INTO breeds(breed) VALUES ("British Shorthair");
INSERT INTO breeds(breed) VALUES ("Burmese");
INSERT INTO breeds(breed) VALUES ("Calico");
INSERT INTO breeds(breed) VALUES ("Chartreux");
INSERT INTO breeds(breed) VALUES ("Colorpoint Shorthair");
INSERT INTO breeds(breed) VALUES ("Cornish Rex");
INSERT INTO breeds(breed) VALUES ("Cymric");
INSERT INTO breeds(breed) VALUES ("Devon Rex");
INSERT INTO breeds(breed) VALUES ("Domestic Longhair");
INSERT INTO breeds(breed) VALUES ("Domestic Mediumhair");
INSERT INTO breeds(breed) VALUES ("Domestic Shorthair");
INSERT INTO breeds(breed) VALUES ("Egyptian Mau");
INSERT INTO breeds(breed) VALUES ("European Burmese");
INSERT INTO breeds(breed) VALUES ("Exotic");
INSERT INTO breeds(breed) VALUES ("Havana Brown");
INSERT INTO breeds(breed) VALUES ("Hemingway/Polydactyl");
INSERT INTO breeds(breed) VALUES ("Himalayan");
INSERT INTO breeds(breed) VALUES ("Japanese Bobtail");
INSERT INTO breeds(breed) VALUES ("Javanese");
INSERT INTO breeds(breed) VALUES ("Korat");
INSERT INTO breeds(breed) VALUES ("LaPerm");
INSERT INTO breeds(breed) VALUES ("Maine Coon");
INSERT INTO breeds(breed) VALUES ("Manx");
INSERT INTO breeds(breed) VALUES ("Munchkin");
INSERT INTO breeds(breed) VALUES ("Norwegian Forest Cat");
INSERT INTO breeds(breed) VALUES ("Ocicat");
INSERT INTO breeds(breed) VALUES ("Oriental");
INSERT INTO breeds(breed) VALUES ("Persian");
INSERT INTO breeds(breed) VALUES ("Polydactyl/Hemingway");
INSERT INTO breeds(breed) VALUES ("RagaMuffin");
INSERT INTO breeds(breed) VALUES ("Ragdoll");
INSERT INTO breeds(breed) VALUES ("Russian Blue");
INSERT INTO breeds(breed) VALUES ("Scottish Fold");
INSERT INTO breeds(breed) VALUES ("Selkirk Rex");
INSERT INTO breeds(breed) VALUES ("Siamese");
INSERT INTO breeds(breed) VALUES ("Siberian");
INSERT INTO breeds(breed) VALUES ("Singapura");
INSERT INTO breeds(breed) VALUES ("Snowshoe");
INSERT INTO breeds(breed) VALUES ("Somali");
INSERT INTO breeds(breed) VALUES ("Sphynx");
INSERT INTO breeds(breed) VALUES ("Tonkinese");
INSERT INTO breeds(breed) VALUES ("Turkish Angora");
INSERT INTO breeds(breed) VALUES ("Turkish Van");
END IF;

-- add the breed reference to cat
IF NOT EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='cats' AND column_name='breed_id'))
THEN
ALTER TABLE cats ADD breed_id INT NOT NULL;
ALTER TABLE cats ADD CONSTRAINT breed_ref FOREIGN KEY (breed_id) REFERENCES breeds(id);
END IF;


-- add colors for exporting to adopt a pet
IF NOT EXISTS ((SELECT * FROM information_schema.tables where table_name = 'colors'))
THEN
CREATE TABLE colors(id INT AUTO_INCREMENT PRIMARY KEY, color VARCHAR(32));
END IF;

-- populate the colors table if need be

IF NOT EXISTS ((SELECT * FROM colors))
THEN
INSERT INTO colors(color) VALUES ("Black (All)");
INSERT INTO colors(color) VALUES ("Black (Mostly)");
INSERT INTO colors(color) VALUES ("Black & White or Tuxedo");
INSERT INTO colors(color) VALUES ("Brown or Chocolate");
INSERT INTO colors(color) VALUES ("Brown or Chocolate (Mostly)");
INSERT INTO colors(color) VALUES ("Brown Tabby");
INSERT INTO colors(color) VALUES ("Calico or Dilute Calico");
INSERT INTO colors(color) VALUES ("Cream or Ivory");
INSERT INTO colors(color) VALUES ("Cream or Ivory (Mostly)");
INSERT INTO colors(color) VALUES ("Gray, Blue, or Silver Tabby");
INSERT INTO colors(color) VALUES ("Gray or Blue");
INSERT INTO colors(color) VALUES ("Gray or Blue (Mostly)");
INSERT INTO colors(color) VALUES ("Orange or Red");
INSERT INTO colors(color) VALUES ("Orange or Red (Mostly)");
INSERT INTO colors(color) VALUES ("Orange or Red Tabby");
INSERT INTO colors(color) VALUES ("Spotted Tabby/Leopard Spotted");
INSERT INTO colors(color) VALUES ("Tan or Fawn");
INSERT INTO colors(color) VALUES ("Tan or Fawn (Mostly)");
INSERT INTO colors(color) VALUES ("Tiger Striped");
INSERT INTO colors(color) VALUES ("Tortoiseshell");
INSERT INTO colors(color) VALUES ("White");
INSERT INTO colors(color) VALUES ("White (Mostly)");
END IF;

-- remove the old breed field from the cats table
IF EXISTS ((SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='cats' AND column_name='breed'))
THEN
ALTER TABLE cats DROP COLUMN breed;
END IF;

END $$

-- run the stored procedure
CALL sprint3_deploy() $$

-- drop the stored procedure
DROP PROCEDURE IF EXISTS sprint3_deploy $$

DELIMITER ;
