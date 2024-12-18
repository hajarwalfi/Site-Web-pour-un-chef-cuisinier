<?php
include '../database.php';
session_start();
ob_start();

$query = "SELECT * FROM menu";
$result = mysqli_query($conn, $query);
$menus = mysqli_fetch_all($result, MYSQLI_ASSOC);
$dishes = [];
foreach ($menus as $menu) {
    $menu_id = $menu['id_menu'];
    $dish_query = "SELECT * FROM plat WHERE id_menu = $menu_id";
    $dish_result = mysqli_query($conn, $dish_query);
    $dishes[$menu_id] = mysqli_fetch_all($dish_result, MYSQLI_ASSOC);
}

$selected_menu_id = $_GET['menu_id'];

if (!isset($_SESSION['id_user'])) {
    echo "<script>alert('You must be logged in to make a reservation.'); window.location.href = '../pages/login.php';</script>";
    exit;
}

$id_user= $_SESSION['id_user']; 
?>

<h1 class="text-4xl font-bold text-white text-center mt-4 mb-10">Our Menu</h1>

<!-- Menu cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-6">
    <?php foreach ($menus as $menu): ?>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="<?php echo htmlspecialchars($menu['picture']); ?>" alt="<?php echo htmlspecialchars($menu['titre']); ?>" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2"><?php echo htmlspecialchars($menu['titre']); ?></h2>
                <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($menu['description']); ?></p>
                <div class="flex justify-evenly">
                    <a href="?menu_id=<?php echo $menu['id_menu']; ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Details</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php if ($selected_menu_id): ?>
    <!-- Details Modal -->
    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-4 w-11/12 md:w-3/4 lg:w-1/2 max-h-[80vh] overflow-auto">
            <a href="?" class="text-gray-500 hover:text-gray-700 float-right">&times;</a>
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Menu Details</h2>
            <div id="menuDetails" class="space-y-4 overflow-auto">
                <?php foreach ($dishes[$selected_menu_id] as $dish): ?>
                    <div class="bg-gray-100 border border-gray-300 rounded-lg p-4 space-y-4">
                        <div class="flex items-center space-x-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-700"><?php echo htmlspecialchars($dish['nom']); ?></h3>
                                <p class="text-gray-500"><?php echo htmlspecialchars($dish['description']); ?></p>
                                <p class="text-gray-500 text-sm">Ingredients: <?php echo htmlspecialchars($dish['ingredient']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <form action="" method="POST" class="mt-4 space-y-4">
                <input type="hidden" name="selected_menu_id" value="<?php echo $selected_menu_id; ?>">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-600 font-medium mb-2" for="date_reservation">Reservation Date</label>
                        <input type="date" id="date_reservation" name="date_reservation" required class="w-full border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-600 font-medium mb-2" for="time_reservation">Reservation Time</label>
                        <input type="time" id="time_reservation" name="time_reservation" required class="w-full border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block text-gray-600 font-medium mb-2" for="people_number">Number of People</label>
                        <input type="number" name="people_number" id="people_number" min="1" required class="w-full border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                </div>
                <button type="submit" name="ajouter_reservation" class="bg-green-500 text-white px-6 py-3 rounded-lg w-full hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">Reserve Now</button>
            </form>
        </div>
    </div>

<?php endif; ?>

<?php

if (isset($_POST['ajouter_reservation'])) {
    $date_reservation = mysqli_real_escape_string($conn, $_POST['date_reservation']);
    $time_reservation = mysqli_real_escape_string($conn, $_POST['time_reservation']);
    $people_number = mysqli_real_escape_string($conn, $_POST['people_number']);
    $menu_id = mysqli_real_escape_string($conn, $_POST['selected_menu_id']);
    $id_user = $id_user;

    $sql = "INSERT INTO reservation (id_user, id_menu, date_reservation, heure_reservation, nombre_personnes, statut)
            VALUES (?, ?, ?, ?, ?, 'pending')";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iissi", $id_user, $menu_id, $date_reservation, $time_reservation, $people_number);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Reservation submitted successfully!');</script>";
    }

    mysqli_stmt_close($stmt);
}

$content = ob_get_clean();
include '../layout/layout.php';
