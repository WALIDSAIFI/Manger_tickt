<?php
require_once("../Class/dataBase.php");
require_once("../Class/Tickt.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all required fields are set and not empty
    if (!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['priority']) && !empty($_POST['assigneur'])) {
        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $priority = htmlspecialchars($_POST['priority']);
        $assigneur = $_POST['assigneur'];

        $conn = new Database();
        $tick = new Ticket($titre, $description, $priority, '1', '1');
        $id = $tick->createTicket();

        foreach ($assigneur as $userId) {
            $stmt = $conn->getConnection()->prepare("INSERT INTO assignement (id_ticket, id_assigne) VALUES (?, ?)");
            $stmt->bind_param("ii", $id, $userId);
            $stmt->execute();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Ticket</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #007BFF;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form action="" method="post">
    <h2>Ajouter un Ticket</h2>
    
    <label for="titre">Titre du Ticket:</label>
    <input type="text" id="titre" name="titre" required><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br>

    <label for="priority">Priorité:</label>
    <select id="priority" name="priority" required>
        <option value="" disabled selected>Choisissez une priorité</option>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select><br>

    <label for="assigneur[]">Créateur:</label>
    <select id="assigneur" name="assigneur[]" multiple>
        <?php
        $conn = new Database();
        $result = $conn->getConnection()->query("SELECT id_utilisateur, nom, prenom FROM Utilisateur");
        while ($row = $result->fetch_assoc()) {
            $userId = $row['id_utilisateur'];
            $userName = htmlspecialchars($row['nom'] . " " . $row['prenom']);
            echo "<option value='$userId'>$userName</option>";
        }
        ?>
    </select><br>

    <input type="submit" value="Ajouter Ticket">
</form>

</body>
</html>
