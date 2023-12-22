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
    <h2 class="text-2xl font-bold text-white mb-4">Liste des tickets</h2>

    <?php if ($userInfo && is_array($userInfo)): ?>
        <table class=" bg-white border border-gray-300 w-full">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">Titre</th>
                <th class="py-2 px-4 border-b">Date</th>
                <th class="py-2 px-4 border-b">Statut</th>
                <th class="py-2 px-4 border-b">Prioréte</th>
                <th class="py-2 px-4 border-b">Action</th>
                
            </tr>
            </thead>
            <tbody>
            <?php foreach ($userInfo as $ticket): ?>
                <?php if (is_array($ticket)): ?>
                    <tr>
                        <td class="py-2 px-4 border-b"><?php echo $ticket['titre']; ?></td>
                        <td class="py-2 px-4 border-b"><?php echo $ticket['date_creation']; ?></td>
                        <td class="py-2 px-4 border-b"><?php echo $ticket['libelle']; ?></td>
                        <td class="py-2 px-4 border-b"><?php echo $ticket['priorite']; ?></td>
                        <td class="py-2 px-4 border-b">
                        <a href="operation_ticket.php?ticket_id=<?php echo $ticket['id_ticket']; ?>" class="bg-blue-500 text-white py-1 px-2 rounded-md">Opération</a>
          
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>User not found or has no tickets.</p>
    <?php endif; ?>
</div>

</body>
</html>
