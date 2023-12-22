<?php


 class Database{

    private  $host = "localhost";
    private  $username = "root";
    private  $password = "";
    private  $db_name = "database_Tickt";
    protected  $conn;
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        $this->createTables();
       
    }
    public function getConnection()
    {
        return $this->conn;
    }

    private function createUtilisateurTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Utilisateur (
            id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
            nom VARCHAR(255),
            prenom VARCHAR(255),
            email VARCHAR(255),
            mot_de_passe VARCHAR(255)
        )";
        $this->conn->query($sql);
    }


    private function createStatutTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Statut (
            id_statut INT PRIMARY KEY AUTO_INCREMENT,
            libelle VARCHAR(255)
        )";
        $this->conn->query($sql);
    }


    private function createTagTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Tag (
            id_tag INT PRIMARY KEY AUTO_INCREMENT,
            libelle_tag VARCHAR(255)
        )";
        $this->conn->query($sql);
    }
    

    private function createTicketTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Ticket (
            id_ticket INT PRIMARY KEY AUTO_INCREMENT,
            titre VARCHAR(255),
            description TEXT,
            date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            priorite INT,
            id_createur INT,
            id_statut INT,
            FOREIGN KEY (id_statut) REFERENCES Statut(id_statut),
            FOREIGN KEY (id_createur) REFERENCES Utilisateur(id_utilisateur)
        )";
        $this->conn->query($sql);
    }


    private function createCommentaireTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Commentaire (
            id_commentaire INT PRIMARY KEY AUTO_INCREMENT,
            contenu TEXT,
            date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            id_utilisateur INT,
            id_ticket INT,
            FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur),
            FOREIGN KEY (id_ticket) REFERENCES Ticket(id_ticket)
        )";
        $this->conn->query($sql);
    }

    private function createAssignementTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Assignement (
            id_ticket INT,
            id_assigne INT,
            date_assignement TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_ticket) REFERENCES Ticket(id_ticket),
            FOREIGN KEY (id_assigne) REFERENCES Utilisateur(id_utilisateur)
        )";
        $this->conn->query($sql);
    }

    private function createAffecterTagTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS AffecterTag (
            id_ticket INT,
            id_tag INT,
            FOREIGN KEY (id_ticket) REFERENCES Ticket(id_ticket),
            FOREIGN KEY (id_tag) REFERENCES Tag(id_tag)
        )";
        $this->conn->query($sql);
    }

    private function createTables()
    {
        $this->createUtilisateurTable();
        $this->createStatutTable();
        $this->createTagTable();
        $this->createTicketTable();
        $this->createCommentaireTable();
        $this->createAssignementTable();
        $this->createAffecterTagTable();
    }

}


?>