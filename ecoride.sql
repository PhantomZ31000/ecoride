CREATE DATABASE ecoride;


USE ecoride;

-- Créer les tables
-- User
CREATE TABLE User (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(180) NOT NULL,
    roles JSON NOT NULL,
    password VARCHAR(255) NOT NULL,
    pseudo VARCHAR(50) NOT NULL,
    nom VARCHAR(50) DEFAULT NULL,
    prenom VARCHAR(50) DEFAULT NULL,
    date_naissance DATE DEFAULT NULL,
    adresse VARCHAR(255) DEFAULT NULL,
    telephone VARCHAR(20) DEFAULT NULL,
    photo LONGBLOB DEFAULT NULL,
    role VARCHAR(20) NOT NULL
);

-- Voiture
CREATE TABLE Voiture (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NOT NULL,
    modele VARCHAR(50) NOT NULL,
    immatriculation VARCHAR(20) NOT NULL,
    energie VARCHAR(50) NOT NULL,
    couleur VARCHAR(50) DEFAULT NULL,
    marque VARCHAR(50) DEFAULT NULL,
    premiere_immatriculation DATE DEFAULT NULL,
    nombre_places INT DEFAULT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES User(id)
);

-- Covoiturage
CREATE TABLE Covoiturage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conducteur_id INT NOT NULL,
    voiture_id INT NOT NULL,
    lieu_depart VARCHAR(255) NOT NULL,
    lieu_arrivee VARCHAR(255) NOT NULL,
    date_depart DATE NOT NULL,
    heure_depart TIME NOT NULL,
    prix FLOAT NOT NULL,
    nombre_places_disponibles INT NOT NULL,
    FOREIGN KEY (conducteur_id) REFERENCES User(id),
    FOREIGN KEY (voiture_id) REFERENCES Voiture(id)
);

-- Avis
CREATE TABLE Avis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    passager_id INT NOT NULL,
    conducteur_id INT NOT NULL,
    covoiturage_id INT NOT NULL,
    note INT NOT NULL,
    commentaire TEXT,
    date_avis DATE NOT NULL,
    FOREIGN KEY (passager_id) REFERENCES User(id),
    FOREIGN KEY (conducteur_id) REFERENCES User(id),
    FOREIGN KEY (covoiturage_id) REFERENCES Covoiturage(id)
);

-- Configuration
CREATE TABLE Configuration (
    id INT AUTO_INCREMENT PRIMARY KEY
);

-- Parametre
CREATE TABLE Parametre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    propriete VARCHAR(50) NOT NULL,
    valeur VARCHAR(50) NOT NULL
);

-- Marque
CREATE TABLE Marque (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

-- Dispose
CREATE TABLE Dispose (
    configuration_id INT NOT NULL,
    parametre_id INT NOT NULL,
    PRIMARY KEY (configuration_id, parametre_id),
    FOREIGN KEY (configuration_id) REFERENCES Configuration(id),
    FOREIGN KEY (parametre_id) REFERENCES Parametre(id)
);

