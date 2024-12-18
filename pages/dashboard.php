<?php
  require_once('../database.php');
?>


<?php
  // subscribed clients 
    $sql = "SELECT COUNT(*) AS sub_clients
            FROM users
            WHERE id_role = ?
          ";

    $stmt = mysqli_prepare($conn, $sql);
    $client = 2;

    if($stmt){
      mysqli_stmt_bind_param($stmt, "i", $client);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt, $sub_clients);
      mysqli_stmt_fetch($stmt);
      mysqli_stmt_close($stmt);
    }
  // end calculating sub clients

  // displaying the next reservation
    $sql1 = "SELECT r.date_reservation, r.heure_reservation, r.nombre_personnes, u.nom, u.prenom, m.titre
              FROM reservation AS r
              INNER JOIN users AS u ON u.id_user = r.id_user
              INNER JOIN menu AS m ON m.id_menu = r.id_menu
              WHERE r.date_reservation >= CURRENT_DATE()
              AND r.heure_reservation >= CURRENT_TIME()
              AND r.statut = 'confirmed'
              ORDER BY r.date_reservation ASC
              LIMIT 1
            ";

    $result = mysqli_query($conn,$sql1);
    $next = mysqli_fetch_assoc($result);
    
    if($next){
      $nom = $next['nom'].''.$next['prenom'];
      $titre = $next['titre'];
      $day = $next['date_reservation'];
      $time = $next['heure_reservation'];
    }else{
      $nom = '❌';
      $titre ='';
      $day = '';
      $time = '❌';
      
    }
  // end displaying the next reservation

  // confirmed requests for today
    $sql2 = "SELECT COUNT(*) AS confirmed_today 
    FROM reservation 
    WHERE statut = 'confirmed' 
    AND date_reservation = CURDATE() + INTERVAL 1 DAY";

    $result1 = mysqli_query($conn, $sql2);

    if ($result1) {
    $row = mysqli_fetch_assoc($result1);
    $confirmed_today = $row['confirmed_today'];
    }
  //end calculating confirmed requests for today

  
  // confirmed requests for tomorrow 
    $sql3 = "SELECT COUNT(*) AS confirmed_demain
    FROM reservation 
    WHERE statut = 'confirmed' 
    AND date_reservation = CURDATE() + INTERVAL 2 DAY";

    $result2 = mysqli_query($conn, $sql3);

    if ($result2) {
    $row = mysqli_fetch_assoc($result2);
    $confirmed_demain = $row['confirmed_demain'];
    }
  // end calculating confirmed requests for tomorrow

  // calculate pending requests 
    $sql4 =" SELECT COUNT(*) AS pending
    FROM reservation
    WHERE statut = 'pending' ";
  
    $result3 = mysqli_query($conn, $sql4);

    if ($result3) {
    $row = mysqli_fetch_assoc($result3);
    $pending = $row['pending'];
    }
  // end calculating pending requests

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chef Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 w-full h-full font-sans">
  <!-- Container for Aside and Main -->
  <div class="flex">
    <!-- aside -->
    <aside class="w-1/5 min-h-screen bg-white p-6 flex flex-col shadow-lg">
      <h2 class="text-xl font-semibold mb-4 text-center">Menu</h2>
      <div class="space-y-4">
        <!-- Statistiques Button -->
        <button class="w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded focus:outline-none"><a
            href="../pages/dashboard.php">Statistiques</a></button>
        <!-- Gestion des Réservations Button -->
        <button class="w-full bg-green-500 hover:bg-green-700 text-white py-2 rounded focus:outline-none"><a
            href="../pages/gestionReservations.php">Gestion des Réservations</a></button>
        <!-- Gestion des Plats Button -->
        <button class="w-full bg-yellow-500 hover:bg-yellow-700 text-white py-2 rounded focus:outline-none"><a
            href="../pages/gestionMenu.php">Gestion des Plats</a></button>
      </div>
    </aside>

    <!-- main -->
    <main class="w-4/5 p-6">

      <div class="max-w-6xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">

        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Statistiques</h1>

        <!-- cards of Statistiques -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

          <!-- Demandes en attente -->
          <div class="bg-blue-100 p-6 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Pending Requests</h2>
            <p class="text-3xl font-bold text-blue-600"><?php echo $pending;?></p>
          </div>

          <!-- Demandes approuvées aujourd'hui -->
          <div class="bg-green-100 p-6 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Today's Requests</h2>
            <p class="text-3xl font-bold text-green-600"><?php echo $confirmed_today;?></p>
          </div>

          <!-- Demandes approuvées pour demain -->
          <div class="bg-yellow-100 p-6 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Tomorrow's Requests</h2>
            <p class="text-3xl font-bold text-yellow-600"><?php echo $confirmed_demain;?></p>
          </div>

          <!-- Prochain client -->
          <div class="bg-red-100 p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold text-gray-700 mb-2  text-center">Next Client</h2>
            <p class="text-md text-gray-700  text-start"><strong>Name : </strong> <?php echo $nom; ?> </p>
            <p class="text-md text-gray-700 text-start "><strong>Date : </strong><?php echo $day .'  '. $time ;?></p>
          </div>

          <!-- Nombre de clients inscrits -->
          <div class="bg-purple-100 p-6 rounded-lg shadow-lg text-center">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Subscribed Clients</h2>
            <p class="text-3xl font-bold text-purple-600"><?php echo $sub_clients; ?></p>
          </div>
          
        </div>
      </div>

    </main>

  </div>

</body>
</html>



