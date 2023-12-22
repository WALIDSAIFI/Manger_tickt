<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
} else {
    require_once("../Class/dataBase.php");
    require_once("../Class/utilisateur.php");

    $userId = $_SESSION['user_id'];
    $data_user = new utilisateur();
    $userInfo = $data_user->getUserInfo_mon_Tickets($userId);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    </head>
    <body class="bg-blue-900">
        <?php require_once("nav_bar.php"); ?>
        <div class="w-10/12 ml-[300px] absolute right-0 mt-8">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-blue-900 mb-4">Liste des tickets</h2>

                <?php if ($userInfo && is_array($userInfo)): ?>
                    <table id="ticketTable" class="stripe hover" style="width:100%">
                        <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Titre</th>
                            <th class="py-2 px-4 border-b">Date</th>
                            <th class="py-2 px-4 border-b">Statut</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($userInfo as $ticket): ?>
                            <?php if (is_array($ticket)): ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?php echo $ticket['titre']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $ticket['date_creation']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $ticket['libelle']; ?></td>
                                    <td class="py-2 px-4 border-b"></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-gray-700">User not found or has no tickets.</p>
                <?php endif; ?>
            </div>
        </div>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <script src="jquery.js"></script>
        <script>
            $(document).ready(function () {
                $('#ticketTable').DataTable({
                    "searching": true // Enable search bar
                });
            });
        </script>
    </body>
    </html>
<?php } ?>
