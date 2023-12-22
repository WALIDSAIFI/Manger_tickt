<?php
require_once("../Class/utilisateur.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $user = new utilisateur();
    $user->SinUp($nom, $prenom, $email, $hashedPassword);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header text-center">
          Inscription
        </div> 
        <div class="card-body">
          <form action="" method="post">
            <div class="mb-3">
              <label for="inputName" class="form-label">Nom</label>
              <input type="text" name="nom" class="form-control" id="inputName" placeholder="Entrez votre nom et prénom">
            </div>
            <div class="mb-3">
              <label for="inputName" class="form-label">Prénom</label>
              <input type="text" name="prenom" class="form-control" id="inputName" placeholder="Entrez votre nom et prénom">
            </div>
            <div class="mb-3">
              <label for="inputEmail" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Entrez votre email">
            </div>
            <div class="mb-3">
              <label for="inputPassword" class="form-label">Mot de passe</label>
              <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Bootstrap JS CDN link here -->

</body>
</html>
