-- Active: 1675264412932@@89.116.147.1@3306@u112463479_lequaiantique
CREATE TABLE users (
    id CHAR(36) NOT NULL PRIMARY KEY,
    email VARCHAR(256) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    firstName VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    allergy VARCHAR(500)
);

CREATE TABLE roles (
    id CHAR(36) NOT NULL PRIMARY KEY,
    name VARCHAR (100) NOT NULL
);

CREATE TABLE userRoles (
    userId CHAR(36) NOT NULL,
    roleId CHAR(36) NOT NULL,
    PRIMARY KEY(userId, roleId),
    FOREIGN KEY(userId) REFERENCES users(id),
    FOREIGN KEY(roleId) REFERENCES roles(id)
);

CREATE TABLE entrances (
    id CHAR(36) NOT NULL PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    description TEXT(1000) NOT NULL,
    price DECIMAL(4,2) NOT NULL
);

CREATE TABLE dishes (
    id CHAR(36) NOT NULL PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    description TEXT(1000) NOT NULL,
    price DECIMAL(4,2) NOT NULL
);

CREATE TABLE desserts (
    id CHAR(36) NOT NULL PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    description TEXT(1000) NOT NULL,
    price DECIMAL(4,2) NOT NULL
);

CREATE TABLE formulaMenu (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE menus (
    id CHAR(36) NOT NULL PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    formula INT NOT NULL,
    entrance1 CHAR(36) NOT NULL,
    entrance2 CHAR(36),
    entrance3 CHAR(36),
    dishe1 CHAR(36) NOT NULL,
    dishe2 CHAR(36),
    dishe3 CHAR(36),
    dessert1 CHAR(36) NOT NULL,
    dessert2 CHAR(36),
    dessert3 CHAR(36),
    price DECIMAL(4,2) NOT NULL,
    FOREIGN KEY (formula) REFERENCES formulaMenu(id),
    FOREIGN KEY (entrance1) REFERENCES entrances(id),
    FOREIGN KEY (entrance2) REFERENCES entrances(id),
    FOREIGN KEY (entrance3) REFERENCES entrances(id),
    FOREIGN KEY (dishe1) REFERENCES dishes(id),
    FOREIGN KEY (dishe2) REFERENCES dishes(id),
    FOREIGN KEY (dishe3) REFERENCES dishes(id),
    FOREIGN KEY (dessert1) REFERENCES desserts(id),
    FOREIGN KEY (dessert2) REFERENCES desserts(id),
    FOREIGN KEY (dessert3) REFERENCES desserts(id)
);

CREATE TABLE restaurants (
    id CHAR(36) PRIMARY KEY NOT NULL,
    name VARCHAR(200) NOT NULL,
    address VARCHAR(200) NOT NULL,
    postalCode VARCHAR(5) NOT NULL,
    city VARCHAR(100) NOT NULL,
    numberPlace INT(10) NOT NULL
);

CREATE TABLE hoursOpening (
    id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    restaurant CHAR(36) NOT NULL,
    dayOfWeek VARCHAR(50) NOT NULL,
    lunchOpening TIME NOT NULL,
    lunchClosing TIME NOT NULL,
    dinerOpening TIME NOT NULL,
    dinerClosing TIME NOT NULL,
    FOREIGN KEY (restaurant) REFERENCES restaurants(id)
);

CREATE TABLE visitor (
    id CHAR(36) NOT NULL PRIMARY KEY,
    lastName VARCHAR(50) NOT NULL, 
    fistName VARCHAR(50) NOT NULL,
    email VARCHAR(256) NOT NULL, 
    phone VARCHAR(10) NOT NULL
);

CREATE TABLE reservation (
    id CHAR(36) NOT NULL PRIMARY KEY,
    restaurant CHAR(36) NOT NULL,
    dateReservation DATETIME NOT NULL, 
    user CHAR(36),
    visitor CHAR(36),
    FOREIGN KEY (user) REFERENCES users(id),
    FOREIGN KEY (visitor) REFERENCES visitor(id) 
);

CREATE TABLE images (
    id CHAR(36) NOT NULL PRIMARY KEY,
    title VARCHAR(100) NOT NULL,  
    img VARCHAR(1000) NOT NULL 
);

INSERT INTO restaurants (id, name, address, postalCode, city, numberPlace) VALUES 
    (UUID(), "Le Quai Antique", "32 Chemin du Quai", "73000", "Chambéry", 180);

INSERT INTO hoursOpening (dayOfweek, restaurant, lunchOpening, lunchClosing, dinerOpening, dinerClosing)
VALUES 
('Mercredi', '10c4075e-a30d-11ed-9875-f39927f76100', '12:00:00', '14:30:00', '18:30:00', '22:30:00'),
('Jeudi', '10c4075e-a30d-11ed-9875-f39927f76100', '12:00:00', '14:30:00', '18:30:00', '22:30:00'),
('Vendredi', '10c4075e-a30d-11ed-9875-f39927f76100', '12:00:00', '14:30:00', '18:30:00', '22:30:00'),
('Samedi', '10c4075e-a30d-11ed-9875-f39927f76100', '12:00:00', '14:30:00', '18:30:00', '23:00:00'),
('Dimanche', '10c4075e-a30d-11ed-9875-f39927f76100', '11:00:00', '15:00:00', '18:30:00', '22:30:00');

INSERT INTO roles (id, name) VALUES (UUID(), 'role_admin'), (UUID(), 'role_user');

SELECT id FROM users WHERE email = "roman.pons31@gmail.com";

SELECT * FROM userRoles JOIN roles ON roles.id = userRoles.roleId WHERE id = '745aa622-a707-11ed-9875-f39927f7610';

SELECT * FROM `userRoles` JOIN roles ON roles.id = userRoles.roleId 
JOIN users ON users.id = userRoles.userId WHERE userRoles.userId = users.id AND roles.id = userRoles.roleId;

SELECT * FROM `userRoles` JOIN roles ON roles.id = userRoles.roleId WHERE userRoles.userId = '745aa622-a707-11ed-9875-f39927f76100';

SELECT * FROM userRoles WHERE userId = '745aa622-a707-11ed-9875-f39927f76100';

UPDATE Table userRoles SET roleId = "ff0fcbb4-a6e9-11ed-9875-f39927f76100" WHERE userId = '745aa622-a707-11ed-9875-f39927f76100';

UPDATE `userRoles` SET `roleId` = 'ff0fcbb4-a6e9-11ed-9875-f39927f76100' WHERE `userRoles`.`userId` = '745aa622-a707-11ed-9875-f39927f76100' AND `userRoles`.`roleId` = 'ff1194a8-a6e9-11ed-9875-f39927f76100';