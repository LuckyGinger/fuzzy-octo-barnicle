
CREATE TABLE complex
(
	id int NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	description varchar(500) NOT NULL,
	gender_housing boolean NOT NULL,
	average_rating decimal(4, 2) NOT NULL,
	semester_price int NOT NULL,
	PRIMARY KEY (id)
);


CREATE TABLE user
(
	id int NOT NULL AUTO_INCREMENT UNIQUE,
	user_name varchar(80) NOT NULL UNIQUE,
        first_name varchar(80) NOT NULL,
	last_name varchar(80) NOT NULL,
	gender boolean NOT NULL,
        pwd varchar(255) NOT NULL,
        admin boolean NOT NULL DEFAULT 0,
	PRIMARY KEY (id)
);

CREATE TABLE user_review
(
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,
	apt_id int NOT NULL,
	review varchar(1000),
	user_rating decimal(4, 2) NOT NULL,
        time_stamp DATETIME DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (user_id) REFERENCES user(id),
	FOREIGN KEY (apt_id) REFERENCES complex(id)
);

-- INSERT INTO user (id, first_name, last_name, gender) VALUES (null, 'lucky1', 'Thom', 'Allen', 0, );
-- INSERT INTO user (id, first_name, last_name, gender) VALUES (null, 'Emma', 'Howe', 1);
-- INSERT INTO user (id, first_name, last_name, gender) VALUES (null, 'Nick', 'Nelson', 0);
-- INSERT INTO user (id, first_name, last_name, gender) VALUES (null, 'Bree', 'Carrick', 1);
-- INSERT INTO user (id, first_name, last_name, gender) VALUES (null, 'Steve', 'Wonder', 0);
-- INSERT INTO user (id, first_name, last_name, gender) VALUES (null, 'Carlos', 'Bear', 0);

INSERT INTO complex (id, name, description, gender_housing, average_rating, semester_price)
VALUES (
        null,
        'Boundiful Place', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in volutpat erat. Nulla congue tempor libero, sit amet maximus turpis ultricies in. Phasellus in nunc quis elit pharetra luctus lacinia a risus. Vestibulum felis dolor, gravida vel venenatis nec, interdum vitae turpis. Etiam viverra congue gravida. Sed tincidunt pretium eros, vitae suscipit metus finibus vitae. Suspendisse potenti. Sed vel ante sem. Morbi mollis metus purus, id vestibulum diam auctor quis. Pellentesque risus metus, venenatis sed rhoncus ut, pulvinar in nunc. Nunc non nisi tincidunt, laoreet purus eget, auctor erat. Curabitur interdum eu magna sed commodo. Sed pulvinar aliquet hendrerit. Duis placerat lobortis sem. Aenean ac est tincidunt, scelerisque leo consequat, consequat nisi. Vivamus viverra sed tortor quis tempor.',
        0,
        0.00,
        1000
);
INSERT INTO complex (id, name, description, gender_housing, average_rating, semester_price)
VALUES (
        null,
        'Mountain Lofts', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in volutpat erat. Nulla congue tempor libero, sit amet maximus turpis ultricies in. Phasellus in nunc quis elit pharetra luctus lacinia a risus. Vestibulum felis dolor, gravida vel venenatis nec, interdum vitae turpis. Etiam viverra congue gravida. Sed tincidunt pretium eros, vitae suscipit metus finibus vitae. Suspendisse potenti. Sed vel ante sem. Morbi mollis metus purus, id vestibulum diam auctor quis. Pellentesque risus metus, venenatis sed rhoncus ut, pulvinar in nunc. Nunc non nisi tincidunt, laoreet purus eget, auctor erat. Curabitur interdum eu magna sed commodo. Sed pulvinar aliquet hendrerit. Duis placerat lobortis sem. Aenean ac est tincidunt, scelerisque leo consequat, consequat nisi. Vivamus viverra sed tortor quis tempor.',
        0,
        0.00,
        1200
);
INSERT INTO complex (id, name, description, gender_housing, average_rating, semester_price)
VALUES (
        null,
        'The Colonial House', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in volutpat erat. Nulla congue tempor libero, sit amet maximus turpis ultricies in. Phasellus in nunc quis elit pharetra luctus lacinia a risus. Vestibulum felis dolor, gravida vel venenatis nec, interdum vitae turpis. Etiam viverra congue gravida. Sed tincidunt pretium eros, vitae suscipit metus finibus vitae. Suspendisse potenti. Sed vel ante sem. Morbi mollis metus purus, id vestibulum diam auctor quis. Pellentesque risus metus, venenatis sed rhoncus ut, pulvinar in nunc. Nunc non nisi tincidunt, laoreet purus eget, auctor erat. Curabitur interdum eu magna sed commodo. Sed pulvinar aliquet hendrerit. Duis placerat lobortis sem. Aenean ac est tincidunt, scelerisque leo consequat, consequat nisi. Vivamus viverra sed tortor quis tempor.',
        1,
        0.00,
        1000
);
INSERT INTO complex (id, name, description, gender_housing, average_rating, semester_price)
VALUES (
        null,
        'Royal Crest', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in volutpat erat. Nulla congue tempor libero, sit amet maximus turpis ultricies in. Phasellus in nunc quis elit pharetra luctus lacinia a risus. Vestibulum felis dolor, gravida vel venenatis nec, interdum vitae turpis. Etiam viverra congue gravida. Sed tincidunt pretium eros, vitae suscipit metus finibus vitae. Suspendisse potenti. Sed vel ante sem. Morbi mollis metus purus, id vestibulum diam auctor quis. Pellentesque risus metus, venenatis sed rhoncus ut, pulvinar in nunc. Nunc non nisi tincidunt, laoreet purus eget, auctor erat. Curabitur interdum eu magna sed commodo. Sed pulvinar aliquet hendrerit. Duis placerat lobortis sem. Aenean ac est tincidunt, scelerisque leo consequat, consequat nisi. Vivamus viverra sed tortor quis tempor.',
        1,
        0.00,
        1000
);

-- INSERT INTO user_review (id, user_id, apt_id, review, user_rating) VALUES (null, 1, 1, "This apartment is the Bee's pajamas!", 7.5);
-- INSERT INTO user_review (id, user_id, apt_id, review, user_rating) VALUES (null, 2, 4, "Smells like crab apples and tuna. Not the best of place, but it's home.", 8.2);
-- INSERT INTO user_review (id, user_id, apt_id, review, user_rating) VALUES (null, 3, 2, "Its like you're actually in the mountains!", 8);
-- INSERT INTO user_review (id, user_id, apt_id, review, user_rating) VALUES (null, 4, 3, "This place is grate for people who are into heavy death metal rock bands.", 6.6);
-- INSERT INTO user_review (id, user_id, apt_id, review, user_rating) VALUES (null, 5, 2, "There is so much YES that comes with this apartment!", 7.9);
-- INSERT INTO user_review (id, user_id, apt_id, review, user_rating) VALUES (null, 6, 1, "I'm a Bear so...", 10);
