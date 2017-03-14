use paws_db;


-- first, create a full set of data, marked deleted

	-- create a deleted litter, with a mom and 2 kittens
	INSERT INTO litters(kc_ref_id, litter_name, the_cat_count, kitten_count, dob, asn_start, asn_end, est_arrival, breed, foster_notes, notes, created, is_deleted)
	VALUES(123, "A Deleted Litter...", 1, 2, '2017-02-14', '2017-03-14', '2017-03-21', "Early/Mid March", "Calico minx tabby mixes", "This litter is no longer coming in, hence why it's deleted", "Other litter notes... needs etc.", NOW(),true);

		-- save the current litter id to use for adding cats
		SET @current_litter_id = (SELECT id FROM litters ORDER BY id DESC LIMIT 1);

		INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
		VALUES (@current_litter_id, "Deleted Litter Mom", 0, '2015-08-21', 1, "cat breed text", "cat color text", "cat coat text", "cat bio text", "cat diet text", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, true, false);

		INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
		VALUES (@current_litter_id, "Deleted Liter kitten female", 1, '2017-02-14', 1, "cat breed text", "cat color text", "cat coat text", "cat bio text", "cat diet text", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, true, false);

		INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
		VALUES (@current_litter_id, "Deleted Liter kitten male", 1, '2017-02-14', 0, "cat breed text", "cat color text", "cat coat text", "cat bio text", "cat diet text", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, true, false);



	-- add a deleted cat, no associations to a litter
    INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
	VALUES (NULL, "Deleted cat", 1, '2017-01-12', 1, "Tabby", "Dark brown", "Short and rough", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, true, false);


    
    -- add a deleted adopter
    INSERT INTO adopters(first_name, last_name, phone, cat_count, address, email, notes, created, is_deleted, do_not_adopt, dna_reason)
	VALUES("Deleted", "Adopter", "7654327654", 2, "123 Geek Street, Rocklin, CA", "marylou@hotmailz.com", "Frequent adopter, very good.", NOW(), true, false, NULL);
    
    
    -- add a deleted foster
	INSERT INTO fosters(first_name, last_name, phone, address, email, exp, pets, kids, avail, rating, notes, created, is_deleted)
	VALUES("Deleted", "Foster", "4536548764", "Lon Lon Ranch, Hyrule Field", "malon@lonlon.net", "Very experienced, has had tons of cats on the ranch.", "Many pets, outdoor farm cats only.", "Many kids of all ages on the ranch.", "Weekends and evenings.", 4, "Malon is used mostly for overflow of cats.", NOW(), true);



-- next, make real data!

-- add some litters and cats

-- seuss themed litter
INSERT INTO litters(kc_ref_id, litter_name, the_cat_count, kitten_count, dob, asn_start, asn_end, est_arrival, breed, foster_notes, notes, created, is_deleted)
VALUES(456, "A Seuss Litter", 1, 2, '2017-02-07', '2017-03-07', '2017-03-18', "Late March", "Calico minx tabby mixes", "This litter is still in need of a foster home upon arrival...", "If this litter had special needs or other notes, they'd be here.", NOW(),false);

SET @current_litter_id = (SELECT id FROM litters ORDER BY id DESC LIMIT 1);

INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
VALUES (@current_litter_id, "Mom Cat in a Hat", 0, '2015-08-21', 1, "Minx", "Black/White/Grey", "Long fluffy", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);

INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
VALUES (@current_litter_id, "Red kitten", 1, '2017-02-07', 1, "Calico", "Grey/Orange", "Short but dense", "cat bio and history", "cat diet and food details", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);

INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
VALUES (@current_litter_id, "Blue kitten", 1, '2017-02-07', 0, "Sphinx", "Black/White", "Short fluffy", "cat bio, history and description", "cat diet and food notes", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);



-- grumpy themed litter
INSERT INTO litters(kc_ref_id, litter_name, the_cat_count, kitten_count, dob, asn_start, asn_end, est_arrival, breed, foster_notes, notes, created, is_deleted)
VALUES(159, "The Grumps", 0, 3, '2017-03-01', '2017-04-01', '2017-04-17', "April Second", "Wide mix", "This litter is still in need of a foster home upon arrival...", "If this litter had special needs or other notes, they'd be here.", NOW(),false);

SET @current_litter_id = (SELECT id FROM litters ORDER BY id DESC LIMIT 1);

INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
VALUES (@current_litter_id, "Grumpy Miranda", 1, '2017-03-01', 1, "Minx", "Black/White/Grey", "Long fluffy", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);

INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
VALUES (@current_litter_id, "Grumpy Stella", 1, '2017-03-01', 1, "Calico", "Grey/Orange", "Short but dense", "cat bio and history", "cat diet and food details", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);

INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
VALUES (@current_litter_id, "Grumpy Nikko", 1, '2017-03-01', 0, "Tabby", "Black/White", "Short fluffy", "cat bio, history and description", "cat diet and food notes", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);


/*

	The Data Set other than the litters above (no foster/adopter asociations to them)
    
    [Foster] Princess Zelda
		[Cat-F-K] Rachele
        [Cat-M-C] Leeroy
        [Cat-F-C] Alicia
        
	[Foster] Malon Lon Lon
		[Cat-M-C] Steve
        [Cat-M-C] Barry
        [Cat-F-k] Lizzette
        
	[Foster] Bryant McCoco
    
    
    
    [Adopter] Marylou McBride
		[Cat-F-C] Carmella
        [Cat-F-k] Stasia
    
    [Adopter] Doretta Armwood
		[Cat-M-k] Mittens
        
	[Adopter-DNA] Peter Ziegler
    
    [Adopter] Max Carter
    
    
    
    [Cat-F-k] Sadie
    
    [Cat-F-K] Whiskers
    
    [Cat-M-C] Jabba
*/



-- add Zelda and her fostered 3 cats/kittens
INSERT INTO fosters(first_name, last_name, phone, address, email, exp, pets, kids, avail, rating, notes, created, is_deleted)
VALUES("Princess", "Zelda", "8672459001", "123 Royal Way, Hyrule Castle", "zelda@hyrulez.net", "Very experienced, has had tons of cats at her castle.", "Many pets, but castle has dedicated cat areas.", "No kids.", "All the time, dedicates lots of time.", 5, "Zelda is capable of housing lots of cats in her castle.", NOW(), false);

	SET @current_foster_id = (SELECT id FROM fosters ORDER BY id DESC LIMIT 1);

	INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
	VALUES (NULL, "Rachelle", 1, '2017-01-03', 1, "Tabby", "Dark red", "Short and rough", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);
		
        SET @current_cat_id = (SELECT id FROM cats ORDER BY id DESC LIMIT 1);
        
        INSERT INTO cat_histories(cat_id, adopter_id, foster_id, start_date, end_date)
        VALUES (@current_cat_id, NULL, @current_foster_id, CAST(NOW() AS DATE), NULL);

	INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
	VALUES (NULL, "Leeroy", 0, '2016-01-12', 0, "Tabby", "Dark black", "Short and rough", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);
    
		SET @current_cat_id = (SELECT id FROM cats ORDER BY id DESC LIMIT 1);
        
        INSERT INTO cat_histories(cat_id, adopter_id, foster_id, start_date, end_date)
        VALUES (@current_cat_id, NULL, @current_foster_id, CAST(NOW() AS DATE), NULL);

	INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
	VALUES (NULL, "Alicia", 0, '2016-01-12', 1, "Tabby", "Light grey", "Long", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);
    
		SET @current_cat_id = (SELECT id FROM cats ORDER BY id DESC LIMIT 1);
        
        INSERT INTO cat_histories(cat_id, adopter_id, foster_id, start_date, end_date)
        VALUES (@current_cat_id, NULL, @current_foster_id, CAST(NOW() AS DATE), NULL);



-- add Malon and her fostered cats/kittens
INSERT INTO fosters(first_name, last_name, phone, address, email, exp, pets, kids, avail, rating, notes, created, is_deleted)
VALUES("Malon", "Lon Lon", "8672459987", "Lon Lon Ranch, Hyrule Field", "malon@lonlon.net", "Very experienced, has had tons of cats on the ranch.", "Many pets, outdoor farm cats only.", "Many kids of all ages on the ranch.", "Weekends and evenings.", 4, "Malon is used mostly for overflow of cats.", NOW(), false);

	SET @current_foster_id = (SELECT id FROM fosters ORDER BY id DESC LIMIT 1);

	INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
	VALUES (NULL, "Steve", 0, '2014-06-04', 0, "Tabby", "Dark red", "Long and fluffs", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);
    
		SET @current_cat_id = (SELECT id FROM cats ORDER BY id DESC LIMIT 1);
        
        INSERT INTO cat_histories(cat_id, adopter_id, foster_id, start_date, end_date)
        VALUES (@current_cat_id, NULL, @current_foster_id, CAST(NOW() AS DATE), NULL);

	INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
	VALUES (NULL, "Barry", 0, '2013-11-12', 0, "Tabby", "Dark black", "Short and rough", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);
    
		SET @current_cat_id = (SELECT id FROM cats ORDER BY id DESC LIMIT 1);
        
        INSERT INTO cat_histories(cat_id, adopter_id, foster_id, start_date, end_date)
        VALUES (@current_cat_id, NULL, @current_foster_id, CAST(NOW() AS DATE), NULL);

	INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
	VALUES (NULL, "Lizette", 1, '2016-01-12', 1, "Tabby", "Light grey", "Long", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);
    
		SET @current_cat_id = (SELECT id FROM cats ORDER BY id DESC LIMIT 1);
        
        INSERT INTO cat_histories(cat_id, adopter_id, foster_id, start_date, end_date)
        VALUES (@current_cat_id, NULL, @current_foster_id, CAST(NOW() AS DATE), NULL);



-- add Bryant, no cats
INSERT INTO fosters(first_name, last_name, phone, address, email, exp, pets, kids, avail, rating, notes, created, is_deleted)
VALUES("Bryant", "McCoco", "2757433581", "1823 Harbor Way, Venice Beach CA", "bryant@cocoz.net", "Low experience, but willing to learn.", "No pets.", "Teenagers.", "During the day, most weekends.", 4, "Bryant is new and learning fast. He will be a great asset", NOW(), false);



-- add Marylou and her 2 cats
INSERT INTO adopters(first_name, last_name, phone, cat_count, address, email, notes, created, is_deleted, do_not_adopt, dna_reason)
VALUES("Marylou", "McBride", "3454452356", 2, "123 Geek Street, Rocklin, CA", "marylou@hotmailz.com", "Frequent adopter, very good.", NOW(), false, false, NULL);

	SET @current_adopter_id = (SELECT id FROM adopters ORDER BY id DESC LIMIT 1);

	INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
	VALUES (NULL, "Carmella", 0, '2015-04-18', 1, "Tabby", "Light grey", "Long", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);
    
		SET @current_cat_id = (SELECT id FROM cats ORDER BY id DESC LIMIT 1);
        
        INSERT INTO cat_histories(cat_id, adopter_id, foster_id, start_date, end_date)
        VALUES (@current_cat_id, @current_adopter_id, NULL, CAST(NOW() AS DATE), NULL);
    
    INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
	VALUES (NULL, "Rachelle", 1, '2017-01-28', 1, "Tabby", "Dark red", "Short and rough", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);
    
		SET @current_cat_id = (SELECT id FROM cats ORDER BY id DESC LIMIT 1);
        
        INSERT INTO cat_histories(cat_id, adopter_id, foster_id, start_date, end_date)
        VALUES (@current_cat_id, @current_adopter_id, NULL, CAST(NOW() AS DATE), NULL);



-- add Doretta and her 1 cat
INSERT INTO adopters(first_name, last_name, phone, cat_count, address, email, notes, created, is_deleted, do_not_adopt, dna_reason)
VALUES("Doretta", "Armwood", "3454452111", 1, "754 Harvard Lane, Rocklin, CA", "adoretta@armwoodfam.net", "Soon to be old cat lady, but great!", NOW(), false, false, NULL);

	SET @current_adopter_id = (SELECT id FROM adopters ORDER BY id DESC LIMIT 1);

	INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
	VALUES (NULL, "Mittens", 1, '2016-12-29', 0, "Tabby", "Tiger stripped", "Long", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);
    
		SET @current_cat_id = (SELECT id FROM cats ORDER BY id DESC LIMIT 1);
        
        INSERT INTO cat_histories(cat_id, adopter_id, foster_id, start_date, end_date)
        VALUES (@current_cat_id, @current_adopter_id, NULL, CAST(NOW() AS DATE), NULL);



-- add Peter the DNA creep
INSERT INTO adopters(first_name, last_name, phone, cat_count, address, email, notes, created, is_deleted, do_not_adopt, dna_reason)
VALUES("Peter", "Ziegler", "xxxxxxxxxx", 0, "no address.", "noemail@mail.com", NULL, NOW(), false, true, "Got a call that this man feeds kittens to snakes. DO NOT ADOPT TO THIS MAN.");



-- add Max, the potential
INSERT INTO adopters(first_name, last_name, phone, cat_count, address, email, notes, created, is_deleted, do_not_adopt, dna_reason)
VALUES("Max", "Carter", "3454456241", 0, "734 Rosevelt St, Rocklin, CA", "mcarter@carterfam.net", "Potential adopter! Has visited 3 weekends in a row.", NOW(), false, false, NULL);


-- add the cats
INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
VALUES (NULL, "Sadie", 1, '2017-01-12', 1, "Tabby", "Dark brown", "Short and rough", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);

INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
VALUES (NULL, "Whiskers", 1, '2017-01-18', 1, "Tabby", "Dark brown", "Short and rough", "cat bio and background...", "cat diet, and what it eats now", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);

INSERT INTO cats(litter_id, cat_name, is_kitten, dob, is_female, breed, color, coat, bio, diet, specialty_notes, profile_pic_file_id, microchip_number, is_microchip_registered, created, adoption_fee_amount, is_paws, is_deleted, is_exported_to_adoptapet)
VALUES (NULL, "Jabba", 0, '2013-01-21', 0, "Tabby", "Dark brown", "Short and rough", "cat bio and background...", "should really just be left to sit and eat its own fat", "specialty notes here...", NULL, NULL, NULL, NOW(), NULL, false, false, false);


