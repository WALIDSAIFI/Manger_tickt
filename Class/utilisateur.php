<?php
require_once("dataBase.php");

class  utilisateur extends Database{
    public $nom;
    public $prenom;
    public $email;
    public $mot_de_passe;
    public $data;
 /** 
 * Constructeur de la classe Utilisateur.
 *
 * @param string $nom Le nom de l'utilisateur.
 * @param string $prenom Le prénom de l'utilisateur.
 * @param string $email L'adresse e-mail de l'utilisateur.
 * @param string $mot_de_passe Le mot de passe de l'utilisateur.
 * 
 */
    function __construct()
    {
        parent::__construct();         
    }
    
    /**
     * Getter pour le nom de l'utilisateur.
     *
     * @return string Le nom de l'utilisateur.
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Setter pour le nom de l'utilisateur.
     *
     * @param string $nom Le nouveau nom de l'utilisateur.
     */
    public function setNom($nom) {
        $this->nom = $nom;
    }

    /**
     * Getter pour le prénom de l'utilisateur.
     *
     * @return string Le prénom de l'utilisateur.
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * Setter pour le prénom de l'utilisateur.
     *
     * @param string $prenom Le nouveau prénom de l'utilisateur.
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    /**
     * Getter pour l'adresse e-mail de l'utilisateur.
     *
     * @return string L'adresse e-mail de l'utilisateur.
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Setter pour l'adresse e-mail de l'utilisateur.
     *
     * @param string $email La nouvelle adresse e-mail de l'utilisateur.
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Getter pour le mot de passe de l'utilisateur.
     *
     * @return string Le mot de passe de l'utilisateur.
     */
    public function getMotDePasse() {
        return $this->mot_de_passe;
    }

    /**
     * Setter pour le mot de passe de l'utilisateur.
     *
     * @param string $mot_de_passe Le nouveau mot de passe de l'utilisateur.
     */
    public function setMotDePasse($mot_de_passe) {
        $this->mot_de_passe = $mot_de_passe;
    }
    /**
     * 
     */
    public function SinUp($nom,$prenom,$email,$password){
        $query = "INSERT INTO Utilisateur (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->bind_param("ssss", $nom, $prenom, $email, $password);
        $stmt->execute();
        echo $this->getConnection()->insert_id;
        $stmt->close();

    }
    public function updateUser() {
        $query = "UPDATE Utilisateur SET nom=?, prenom=?, mot_de_passe=? WHERE id_utilisateur=?";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->bind_param("ssss", $this->nom, $this->prenom, $this->mot_de_passe, $this->email);
        $stmt->execute();
        $stmt->close();
    }


    public function deleteUser($id) {
        $query = "DELETE FROM Utilisateur WHERE id_utilisateur=?";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->close();
    }


    public function login($enteredPassword, $email) {
        $sql_code = "SELECT * FROM utilisateur WHERE email = ?";
        $data = new Database();
        $stmt = $data->getConnection()->prepare($sql_code);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $Password = $row['mot_de_passe'];
            if (password_verify($enteredPassword, $Password)) {
                return true;
            }else{
                return false; 
            }
        }
    }
    public function getUserInfo($email) {
        $sql_code = "SELECT id_utilisateur, nom, prenom FROM utilisateur WHERE email = ?";
        $data = new Database();
        $stmt = $data->getConnection()->prepare($sql_code);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    
        return null; 
    }
    public function getUserInfo_id($id) {
        $sql_code = "SELECT * FROM utilisateur WHERE id_utilisateur = ?";
        $data = new Database();
        $stmt = $data->getConnection()->prepare($sql_code);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    
        return null; 

    } 


    public function getUserInfo_mon_Tickets($id) {
        $sql_code = "SELECT utilisateur.*, ticket.*, statut.*
        FROM utilisateur
        JOIN assignement ON utilisateur.id_utilisateur = assignement.id_assigne
        JOIN ticket ON assignement.id_ticket = ticket.id_ticket
        JOIN statut ON ticket.id_statut = statut.id_statut
        WHERE ticket.id_createur = $id";
                    $data = new Database();
                    $result = $data->getConnection()->query($sql_code );
                    return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getUserInfo_tickt_assinement($id) {
        $sql_code = "SELECT utilisateur.*, ticket.*, statut.*, assignement.*
        FROM utilisateur
        JOIN assignement ON utilisateur.id_utilisateur = assignement.id_assigne
        JOIN ticket ON assignement.id_ticket = ticket.id_ticket
        JOIN statut ON ticket.id_statut = statut.id_statut
        WHERE assignement.id_assigne = $id
        ORDER BY ticket.priorite DESC";
            
        $data = new Database();
        $connection = $data->getConnection();
        
        if ($connection) {
            $result = $connection->query($sql_code);
    
            if ($result) {
                $data = $result->fetch_all(MYSQLI_ASSOC);
                $result->close(); // Close the result set
                return $data;
            } else {
                // Handle query execution error
                echo "Error executing the query: " . $connection->error;
            }
        } else {
            // Handle database connection error
            echo "Error connecting to the database.";
        }
    
        return array(); // Return an empty array if there's an error
    }
    



    
}
    




 

?>