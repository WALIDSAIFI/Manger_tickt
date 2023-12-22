
CREATE TABLE Utilisateur (
    id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255) ,
    mot_de_passe VARCHAR(255)
);

CREATE TABLE Statut (
    id_statut INT PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(255)
);

CREATE TABLE Tag (
    id_tag INT PRIMARY KEY AUTO_INCREMENT,
    libelle_tag VARCHAR(255)
);

CREATE TABLE Ticket (
    id_ticket INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255),
    description TEXT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    priorite INT,
    id_createur INT,
    id_statut INT,
    priorite INT,
    FOREIGN KEY (id_statut) REFERENCES Statut(id_statut),
    FOREIGN KEY (id_createur) REFERENCES Utilisateur(id_utilisateur),
);

CREATE TABLE Commentaire (
    id_commentaire INT PRIMARY KEY AUTO_INCREMENT,
    contenu TEXT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_utilisateur INT,
    id_ticket INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur),
    FOREIGN KEY (id_ticket) REFERENCES Ticket(id_ticket)
);

CREATE TABLE Assignement (
    id_ticket INT,
    id_assigne INT,
    date_assignement TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_ticket) REFERENCES Ticket(id_ticket),
    FOREIGN KEY (id_assigne) REFERENCES Utilisateur(id_utilisateur)
);

CREATE TABLE affecter_tag(
    id_ticket INT,
    id_tag INt,
    FOREIGN KEY(id_ticket) REFERENCES Ticket(id_ticket),
    FOREIGN Key(id_tag)  REFERENCES Tag(id_tag)
);
/**code pour réperation de les utlisateur assignement**/

   SELECT *
   FROM utilisateur JOIN assignement JOIN ticket
   ON utilisateur.id_utilisateur = assignement.id_assigne AND assignement.id_ticket=ticket.id_ticket;
   SELECT *
   FROM ticket JOIN tag JOIN affectertag 
   on ticket.id_ticket=affectertag.id_ticket AND affectertag.id_tag = tag.id_tag;