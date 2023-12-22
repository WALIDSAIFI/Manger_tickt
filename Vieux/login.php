<?php
require_once("../Class/utilisateur.php");

session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mot_pass = $_POST['pass'];
    $email = $_POST['email'];
    $user = new utilisateur();
    if ($user->login($mot_pass, $email) == true) {
        $userInfo = $user->getUserInfo($email); 
        $_SESSION['user_id'] = $userInfo['id_utilisateur'];
        $_SESSION['user_nom'] = $userInfo['nom'];
        $_SESSION['user_prenom'] = $userInfo['prenom'];
        header("location:page_princepalle.php");
    }
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page de Connexion</title>
  
  <!-- Liens CDN Bootstrap 5.1.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      margin-top: 50px; 
      background-color: #ffffff; 
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header text-center">
          Connexion
        </div>
        <div class="card-body">
          <form action="login.php" method="post">
            <div class="mb-3">
              <label for="inputEmail" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Entrez votre email">
            </div>
            <div class="mb-3">
              <label for="inputPassword" class="form-label">Mot de passe</label>
              <input type="password" name = "pass" class="form-control" id="inputPassword" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button> 
          </form>
                  <div class="mt-3 text-center">
                    <p>Vous n'avez pas de compte ? <a href="SinUp.php">Inscrivez-vous ici</a></p>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Liens CDN Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8Yg0lBsGTF/cWsZP+R9dU5K3YB77FsapAnT44pKZmP7I8tEiMjtuX3aVTFSI" crossorigin="anonymous"></script>

</body>
</html>
