<?php
session_start();
include("../database.php");

if(isset($_POST["statut"]))
{  $id_reservation =  intval($_POST["id_reservation"]);
   $statut= htmlspecialchars(trim($_POST["statut"]));

  $sql  = "UPDATE reservation set statut = ? where id_reservation = ?" ; 
  $stmt = mysqli_prepare($conn  , $sql) ;
  mysqli_stmt_bind_param($stmt , "si" , $statut , $id_reservation) ; 
  mysqli_stmt_execute($stmt); 
  mysqli_stmt_close($stmt) ;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 w-full h-full font-sans">
    <div class="flex flex-wrap">
        <!-- Sidebar -->
        <aside class="w-1/5 min-h-screen bg-white p-6 flex flex-col shadow-lg">
            <h2 class="text-xl font-semibold mb-4 text-center">Menu</h2>
            <div class="space-y-4">
                <a href="../pages/dashboard.php" class="block w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded text-center">Statistiques</a>
                <a href="../pages/gestionReservations.php" class="block w-full bg-green-500 hover:bg-green-700 text-white py-2 rounded text-center">Gestion des Réservations</a>
                <a href="../pages/gestionMenu.php" class="block w-full bg-yellow-500 hover:bg-yellow-700 text-white py-2 rounded text-center">Gestion des Plats</a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="w-4/5 px-8 py-6">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Reservation Table</h1>
            <div class="overflow-x-auto shadow-lg rounded-lg">
                <table class="min-w-full bg-white rounded-lg">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white text-sm uppercase">
                            <th class="py-4 px-6 text-left font-semibold">Client</th>
                            <th class="py-4 px-6 text-left font-semibold">Reservation Time & Date</th>
                            <th class="py-4 px-6 text-left font-semibold">Menu</th>
                            <th class="py-4 px-6 text-left font-semibold">People Number</th>
                            <th class="py-4 px-6 text-left font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        <?php
                        $sql = "SELECT r.id_reservation, r.date_reservation, r.heure_reservation, r.nombre_personnes, r.statut, u.nom AS client, m.titre AS title
                                FROM reservation AS r
                                INNER JOIN users AS u ON r.id_user = u.id_user
                                INNER JOIN menu AS m ON r.id_menu = m.id_menu
                                ";

                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $id, $date, $time, $people_number, $statut, $client, $title);

                        while (mysqli_stmt_fetch($stmt)) {
                            echo "                            
                            <tr class='border-b border-gray-200 hover:bg-gray-100'>
                                <form action='' method='post'>
                                    <input type='hidden' name='id_reservation' value='{$id}'>
                                    <td class='py-4 px-6'>{$client}</td>
                                    <td class='py-4 px-6'>{$date} {$time}</td>
                                    <td class='py-4 px-6'>{$title}</td>
                                    <td class='py-4 px-6'>{$people_number}</td>
                                    <td class='py-4 px-6'>
                                        <select name='statut' onchange='this.form.submit()' class='w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm'>
                                            <option value='pending'" . ($statut == 'pending' ? ' selected' : '') . ">Pending</option>
                                            <option value='confirmed'" . ($statut == 'confirmed' ? ' selected' : '') . ">Confirmed</option>
                                            <option value='canceled'" . ($statut == 'canceled' ? ' selected' : '') . ">Canceled</option>
                                        </select>
                                    </td>
                                </form>
                            </tr>";
                        }
                        mysqli_stmt_close($stmt);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
