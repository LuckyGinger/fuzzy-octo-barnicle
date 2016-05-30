CREATE TABLE topic
(
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL
);

CREATE TABLE scripture_topic
(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    scripture_id int NOT NULL,
    topic_id int NOT NULL,
    FOREIGN KEY (scripture_id) REFERENCES scriptures(id),
    FOREIGN KEY (topic_id) REFERENCES topic(id)
);


INSERT INTO topic VALUES (null, "Faith");
INSERT INTO topic VALUES (null, "Sacrifice");
INSERT INTO topic VALUES (null, "Charity");

INSERT INTO scripture_topic VALUES (null, 1, 1);
INSERT INTO scripture_topic VALUES (null, 2, 2);
INSERT INTO scripture_topic VALUES (null, 3, 3);
INSERT INTO scripture_topic VALUES (null, 4, 2);

SELECT * FROM topic;

CREATE USER 'testuser1'@'localhost' IDENTIFIED BY 'testpass';
GRANT INSERT ON script.* TO 'testuser'@'localhost';
GRANT DELETE ON script.* TO 'testuser'@'localhost';
GRANT UPDATE ON script.* TO 'testuser'@'localhost';
