ALTER TABLE cats ADD COLUMN litter_id INT;
ALTER TABLE cats ADD FOREIGN KEY (litter_id) REFERENCES litters(id);
