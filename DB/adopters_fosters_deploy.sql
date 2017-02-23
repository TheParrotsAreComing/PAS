alter table adopters add column do_not_adopt tinyint(1) after email;
alter table adopters add column dna_reason text after do_not_adopt;
