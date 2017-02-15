use paws_db;

INSERT INTO cats (cat_name, is_kitten, dob, is_female, breed, bio, created,is_deleted)
VALUES ("Rogue",1,'2001-03-20',1,"Wolverine","Fast health regeneration, adamantium claws, aggressive...",NOW(),false);

INSERT INTO cats (cat_name, is_kitten, dob, is_female, breed, bio, created,is_deleted)
VALUES ("Nightcrawler",1,'2003-09-02',0,"Alien","Teleportation, high agility, above average intelligence",NOW(),false);

INSERT INTO cats (cat_name, is_kitten, dob, is_female, breed, bio, created,is_deleted)
VALUES ("Mystique",0,'1929-12-04',1,"Shapeshifter","High metabolic cell structure",NOW(),false);
