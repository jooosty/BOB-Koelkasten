DROP DATABASE `bobkoelkast`;

CREATE DATABASE `bobkoelkast`;

USE `bobkoelkast`; 

CREATE TABLE `koelkast`(
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    koelkast VARCHAR(100) NOT NULL,
    prijs INT NOT NULL,
    energielabel VARCHAR(100) NOT NULL,
    beschrijving VARCHAR(100) NOT NULL,
    artikelnummer VARCHAR(100) NOT NULL,
    gebruikt VARCHAR(100) NOT NULL,
    inhoud INT NOT NULL,
    aantal INT NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO `koelkast` (`koelkast`, `prijs`, `energielabel`, `beschrijving`, `artikelnummer`, `gebruikt`, `inhoud`, `aantal`) VALUES 
('SAMSUNG RB34T670', '649', 'D', 'beschrijving', '1672473', 'nee', '340', '69'),
('SAMSUNG RB34T670DSA', '649', 'D', 'beschrijving', '1672473', 'nee', '340', '69');
 

CREATE TABLE `gebruikers`(
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    wachtwoord VARCHAR(100) NOT NULL,
    token VARCHAR(100) NOT NULL
);

INSERT INTO `gebruikers` (`username`, `wachtwoord`, `token`) VALUES 
('testuser', 'wachtwoord', 'abc');

CREATE TABLE `verzekering`(
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    verzekering VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);
INSERT INTO `verzekering` (`verzekering`) VALUES 
('valschade'),
('waterschade'),
('elektronische shade'),
('diefslaldekking');


CREATE TABLE `koelkast_link_verzekering`(
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    koelkast_id MEDIUMINT NOT NULL,
    verzekering_id MEDIUMINT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (koelkast_id) REFERENCES koelkast(id),
    FOREIGN KEY (verzekering_id) REFERENCES verzekering(id)
);
INSERT INTO `koelkast_link_verzekering` (`koelkast_id`, `verzekering_id`) VALUES 
('1', '2'),
('1', '3'),
('2', '1'),
('2', '3');

CREATE TABLE `reperatie`(
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    plaatsnaam VARCHAR(100) NOT NULL,
    adres VARCHAR(100) NOT NULL,
    koelkast VARCHAR(100) NOT NULL,
    artikelnummer VARCHAR(100) NOT NULL,
    beschrijving VARCHAR(100) NOT NULL
);
