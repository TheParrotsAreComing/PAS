
/* Adopter Email was not nullable, and unique. Made NUllable to save empty emails*/
alter table adopters modify column email varchar(255) null;
