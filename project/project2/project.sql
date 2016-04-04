DROP TABLE IF EXISTS my_songs5;
DROP TABLE IF EXISTS my_artists5;
DROP TABLE IF EXISTS people5;



/* Two tables for hw4  songs and artist table */
CREATE TABLE my_songs5 (
    id INT NOT NULL AUTO_INCREMENT,
    songTitle VARCHAR(45) NOT NULL,
    artistID VARCHAR(45) NOT NULL,
    releaseYR VARCHAR(128) NOT NULL,
	youtubeURL VARCHAR(45),
    PRIMARY KEY (id)
);

CREATE TABLE my_artists5 (
	artID INT NOT NULL AUTO_INCREMENT,
	artName VARCHAR(128) NOT NULL,
	artCountry VARCHAR(45),
	artBirth VARCHAR(25),
	PRIMARY KEY (artID)
	);
CREATE TABLE people5 (
    id INT NOT NULL AUTO_INCREMENT,
    hashedPass VARCHAR(255) NOT NULL,
    firstname VARCHAR(45) NOT NULL,
    lastname VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL,
    PRIMARY KEY (ID)
);


INSERT INTO my_songs5 (songTitle, releaseYR, youtubeURL, artistID) VALUES ('Stressed Out', '2015', 'https://www.youtube.com/watch?v=pXRviuL6vMY','1');
INSERT INTO my_songs5 (songTitle, releaseYR, youtubeURL, artistID) VALUES ('Ride', '2015', 'https://www.youtube.com/watch?v=Pw-0pbY9JeU','1');
INSERT INTO my_songs5 (songTitle, releaseYR, youtubeURL, artistID) VALUES ('Carry On My Wayword Son', '1974', 'https://www.youtube.com/watch?v=2X_2IdybTV0','2');


INSERT INTO my_artists5 (artID, artName, artCountry, artBirth) VALUES ('1', 'Twentyone Pilots', 'USA', '2009');
INSERT INTO my_artists5 (artID, artName, artCountry, artBirth) VALUES ('2', 'Kansas', 'USA', '1965');