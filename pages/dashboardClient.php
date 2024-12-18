<?php
ob_start();
?>

<?php
include '../database.php'; // Include database connection

// Query to fetch reservation data
$query = "
    SELECT 
        reservation.id_reservation,
        users.nom AS user_name,
        menu.titre AS menu_title,
        reservation.statut,
        reservation.date_reservation,
        reservation.nombre_personnes
    FROM 
        reservation
    INNER JOIN 
        users ON reservation.id_user = users.id_user
    INNER JOIN 
        menu ON reservation.id_menu = menu.id_menu
    ORDER BY 
        reservation.id_reservation ASC";

$result = mysqli_query($conn, $query);

// Check if the query returned any results
if (mysqli_num_rows($result) > 0):
?>
<div class="mb-8 mt-8 h-[70%] p-4 overflow-auto">
    <table class="w-full text-sm text-center text-gray-500 bg-gray-100 border border-purple-500">
        <thead class="text-s text-gray-700 bg-[#f9f3fe]">
            <tr>
                <th scope="col" class="px-6 py-3">N° Réservation</th>
                <th scope="col" class="px-6 py-3">Nom</th>
                <th scope="col" class="px-6 py-3">Menu</th>
                <th scope="col" class="px-6 py-3">Statut</th>
                <th scope="col" class="px-6 py-3">Date de Réservation</th>
                <th scope="col" class="px-6 py-3">Nb Personnes</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr class="bg-white lowercase hover:bg-purple-50">
                    <td class="px-6 py-4"><?php echo htmlspecialchars($row['id_reservation']); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($row['user_name']); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($row['menu_title']); ?></td>
                    <td class="px-6 py-4">
                        <span class="<?php echo ($row['statut'] === 'Confirmée') ? 'text-green-500' : 'text-red-500'; ?> cursor-pointer hover:underline">
                            <?php echo htmlspecialchars($row['statut']); ?>
                        </span>
                    </td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($row['date_reservation']); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($row['nombre_personnes']); ?></td>
                    <td class="px-6 py-4">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600" onclick="modifierReservation(<?php echo $row['id_reservation']; ?>)">Modifier</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="supprimerReservation(<?php echo $row['id_reservation']; ?>)">Supprimer</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>



<?php
$content = ob_get_clean();
include '../layout/layout.php';
?>
