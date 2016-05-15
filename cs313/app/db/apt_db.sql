CREATE TABLE user_review
(
	id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,
	apt_id int NOT NULL,
	review varchar(1000),
	user_rating NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (user_id) REFERENCES user(id),
	FOREIGN KEY (apt_id) REFERENCES complex(id)
);

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
	first_name varchar(80) NOT NULL,
	last_name varchar(80) NOT NULL,
	gender boolean NOT NULL,
	PRIMARY KEY (id)
);
