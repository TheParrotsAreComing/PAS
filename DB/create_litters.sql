use paws_db;

-- make a litter
INSERT INTO litters (kc_ref_id, litter_name, cat_count, kitten_count, dob, est_arrival, breed, foster_notes, notes, created, is_deleted)
VALUES (99999,"A Test Litter",1,2,'2017-02-14',"Early March","Minx/Tabby/Calico mixes","Still needs foster home","Litter that needs to stay together, and needs special care",NOW(),false);

-- add a mom and kittens to it
INSERT INTO cats (cat_name, is_kitten, dob, is_female, breed, bio, created,is_deleted, litter_id)
VALUES ("Mary, the Litter Mom",false,'2007-03-20',true,"DSH Minx","Very caring mother of kittens",NOW(),false,
	(SELECT id FROM litters WHERE litter_name="A Test Litter"));

INSERT INTO cats (cat_name, is_kitten, dob, is_female, breed, bio, created,is_deleted, litter_id)
VALUES ("Edgar the Kitten",true,'2017-02-01',false,"DLH Minx/Tabby mix","Very playful and outgoing",NOW(),false,
	(SELECT id FROM litters WHERE litter_name="A Test Litter"));

INSERT INTO cats (cat_name, is_kitten, dob, is_female, breed, bio, created,is_deleted, litter_id)
VALUES ("Sally the Kitten",true,'2017-02-01',true,"DSH Minx/Calico mix","Very shy (except with bonded mom and brother), but very playful",NOW(),false,
	(SELECT id FROM litters WHERE litter_name="A Test Litter"));