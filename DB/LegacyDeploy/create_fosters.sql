use paws_db;

INSERT INTO fosters (first_name, last_name, phone, address, email, exp, pets, kids, avail, rating, notes, created, is_deleted)
VALUES ('Bruce', 'Wayne', '9160000000', 'Gotham County', 'brucewayne@mail.com', 'He has encountered a catwoman',
 'A couple hundred bats', 'Several although he refers to them as sidekicks', 'Only available at night', 5, 'His favorite color is black', NOW(), FALSE);

INSERT INTO fosters (first_name, last_name, phone, address, email, created, is_deleted)
VALUES ('Clark', 'Kent', '916000001', 'Krypton', 'clarkent@mail.com', NOW(), FALSE);

INSERT INTO fosters (first_name, last_name, phone, address, email, is_deleted)
VALUES ('Alexander' ,'Luthor', '9160000002', 'Unknown', 'lexluthor@mail.com', FALSE);