CREATE DATABASE PPT;

USE PPT;

CREATE TABLE TypeUser (
    id INT NOT NULL AUTO_INCREMENT,
    Nom VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO TypeUser (id, Nom) VALUES (1, 'Utilisateur');
INSERT INTO TypeUser (id, Nom) VALUES (2, 'Admin');

CREATE TABLE Membre (
    ID_Membre INT NOT NULL AUTO_INCREMENT,
    TypeUtilisateur INT NOT NULL,
    Nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    MotPasse TEXT NOT NULL, -- Penser à un stockage sécurisé pour les mots de passe
    Tel VARCHAR(15) NOT NULL,
    PRIMARY KEY (ID_Membre),
    FOREIGN KEY (TypeUtilisateur) REFERENCES TypeUser(id)
);

ALTER TABLE Membre
MODIFY TypeUtilisateur INT NOT NULL DEFAULT 1;


CREATE TABLE Musee (
    ID_Musee INT NOT NULL AUTO_INCREMENT,
    Nom VARCHAR(50) NOT NULL,
    DescriptionEvenement TEXT NOT NULL,
    Debut DATE NOT NULL,
    Fin DATE NOT NULL,
    Tarif FLOAT NOT NULL,
    Capacite INT NOT NULL,
    PRIMARY KEY (ID_Musee)
);

ALTER TABLE Musee
ADD Lieu TEXT NOT NULL;

CREATE TABLE Reservation (
    ID_res INT NOT NULL AUTO_INCREMENT,
    ID_MembreRes INT NOT NULL,
    ID_EvenRes INT NOT NULL,
    PRIMARY KEY (ID_res),
    FOREIGN KEY (ID_MembreRes) REFERENCES Membre(ID_Membre) ON DELETE CASCADE,
    FOREIGN KEY (ID_EvenRes) REFERENCES Musee(ID_Musee) ON DELETE CASCADE
);
