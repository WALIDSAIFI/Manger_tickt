<?php
require_once("../Class/dataBase.php");
require_once("../Class/utilisateur.php");
$userId = 17;
$data_user = new utilisateur();

$userInfo = $data_user->getUserInfo_tickt_assinement($userId);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <?php  require_once("nav_bar.php");  ?>
<div class="w-10/12 ml-[300px] absolute right-0 " >
    <h2 class="text-2xl font-bold text-white mb-4">information sur  tickets</h2>
    

</div>

</body>
</html>
