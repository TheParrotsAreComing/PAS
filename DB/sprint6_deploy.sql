USE paws_db;

DELIMITER $$

-- just in case the procedure already exists
DROP PROCEDURE IF EXISTS sprint6_deploy $$

-- create the stored procedure to perform the needed changes
CREATE PROCEDURE sprint6_deploy()

BEGIN

-- rename users_events to users_adoption_events for more clarity
IF NOT EXISTS (SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='users_adoption_events')
THEN
RENAME TABLE users_events TO users_adoption_events;
END IF;

-- add foreign key for user to users_adoption_events
IF NOT EXISTS (SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='users_adoption_events' AND column_name='user_ref')
THEN
ALTER TABLE users_adoption_events ADD CONSTRAINT user_ref FOREIGN KEY(user_id) REFERENCES users(id);
END IF;

IF NOT EXISTS (SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='users_adoption_events' AND column_name='adoption_events_ref')
THEN
ALTER TABLE users_adoption_events ADD CONSTRAINT adoption_events_ref FOREIGN KEY(adoption_event_id) REFERENCES adoption_events(id);
END IF;

END $$

-- run the stored procedure
CALL sprint6_deploy() $$

-- drop the stored procedure
DROP PROCEDURE IF EXISTS sprint6_deploy $$

DELIMITER ;
