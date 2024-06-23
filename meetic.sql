DROP DATABASE IF EXISTS meetic;
CREATE DATABASE meetic;

USE meetic;


DROP TABLE IF EXISTS user;



CREATE TABLE user (
    id              INT             NOT NULL AUTO_INCREMENT,
    email           VARCHAR(255)    NOT NULL UNIQUE,
    password        VARCHAR(255)    NOT NULL,
    firstname       VARCHAR(255)    NOT NULL,
    lastname        VARCHAR(255)    NOT NULL,
    birthdate       DATETIME        NOT NULL,
    address         VARCHAR(255),
    genre           VARCHAR(255),
    city            VARCHAR(255),
    passion        VARCHAR(255),
    PRIMARY KEY (id)
);

