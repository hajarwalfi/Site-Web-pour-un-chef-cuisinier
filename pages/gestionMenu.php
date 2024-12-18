<?php
require_once '../database.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 w-full h-full font-sans">
    <div class="flex flex-wrap">
        <!-- Sidebar -->
        <aside class="w-full h-30 md:w-1/5 md:min-h-screen bg-white p-6 flex flex-col shadow-lg">
            <h2 class="text-xl font-semibold mb-4 text-center">Menu</h2>
            <div class="space-y-4">
                <a href="../pages/dashboard.php" class="w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded block text-center">Statistiques</a>
                <a href="../pages/gestionReservations.php" class="w-full bg-green-500 hover:bg-green-700 text-white py-2 rounded block text-center">Gestion des Réservations</a>
                <a href="../pages/gestionMenu.php" class="w-full bg-yellow-500 hover:bg-yellow-700 text-white py-2 rounded block text-center">Gestion des Plats</a>
            </div>
        </aside>

      
        <div class="w-full md:w-4/5 px-4">
            <h1 class="text-3xl font-bold mb-6 pt-4 text-center text-gray-700">Menu Management</h1>

       
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-700">Create a New Menu</h2>
                    <label class="block text-gray-600 font-medium mb-2">Menu Title</label>
                    <input type="text" name="menuTitle" required class="w-full border-gray-300 rounded-lg px-4 py-2">

                    <label class="block text-gray-600 font-medium mb-2 mt-4">Menu Description</label>
                    <textarea name="menuDescription" required class="w-full border-gray-300 rounded-lg px-4 py-2"></textarea>

                    <label class="block text-gray-600 font-medium mb-2 mt-4">Menu Picture</label>
                    <input type="file" name="image" class="w-full border-gray-300 rounded-lg px-4 py-2">
                </div>

        
                <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-700">Add Dishes to Menu</h2>
                    <div id="dishes-container">
                        <div class="bg-gray-100 border border-gray-300 rounded-lg p-4">
                            <label class="block text-gray-600 font-medium mb-2">Dish Title</label>
                            <input type="text" name="dishes[title][]" required class="w-full border-gray-300 rounded-lg px-4 py-2">

                            <label class="block text-gray-600 font-medium mb-2 mt-4">Dish Category</label>
                            <input type="text" name="dishes[category][]" required class="w-full border-gray-300 rounded-lg px-4 py-2">

                            <label class="block text-gray-600 font-medium mb-2 mt-4">Dish Description</label>
                            <textarea name="dishes[description][]" required class="w-full border-gray-300 rounded-lg px-4 py-2"></textarea>

                            <label class="block text-gray-600 font-medium mb-2 mt-4">Ingredients</label>
                            <textarea name="dishes[ingredients][]" required class="w-full border-gray-300 rounded-lg px-4 py-2"></textarea>
                        </div>
                    </div>
                    <button id="add-dish-btn" type="button" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded">+ Add Another Dish</button>
                </div>

                <button name="saveMenu" type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg w-full">Save Menu</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('add-dish-btn').addEventListener('click', function() {
            const container = document.getElementById('dishes-container');
            const dishHTML = `
                <div class="bg-gray-100 border border-gray-300 rounded-lg p-4 mt-4">
                    <label class="block text-gray-600 font-medium mb-2">Dish Title</label>
                    <input type="text" name="dishes[title][]" required class="w-full border-gray-300 rounded-lg px-4 py-2">

                    <label class="block text-gray-600 font-medium mb-2 mt-4">Dish Category</label>
                    <input type="text" name="dishes[category][]" required class="w-full border-gray-300 rounded-lg px-4 py-2">

                    <label class="block text-gray-600 font-medium mb-2 mt-4">Dish Description</label>
                    <textarea name="dishes[description][]" required class="w-full border-gray-300 rounded-lg px-4 py-2"></textarea>

                    <label class="block text-gray-600 font-medium mb-2 mt-4">Ingredients</label>
                    <textarea name="dishes[ingredients][]" required class="w-full border-gray-300 rounded-lg px-4 py-2"></textarea>
                </div>`;
            container.insertAdjacentHTML('beforeend', dishHTML);
        });
    </script>

<?php
if (isset($_POST['saveMenu'])) {
    $menuTitle = mysqli_real_escape_string($conn, $_POST['menuTitle']);
    $menuDescription = mysqli_real_escape_string($conn, $_POST['menuDescription']);

    function uploadImage($file, $uploadsDir = '../uploads/', $maxSize = 2 * 1024 * 1024, $allowedTypes = ['image/jpeg', 'image/png', 'image/gif']) {
        if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
            $photoTmpName = $file['tmp_name'];
            $photoName = basename($file['name']);
            $photoSize = $file['size'];
            $photoType = mime_content_type($photoTmpName);
    

            if (!in_array($photoType, $allowedTypes)) {
                return ['success' => false, 'message' => "Type de fichier non supporté. Veuillez utiliser JPEG, PNG ou GIF."];
            }
    

            if ($photoSize > $maxSize) {
                return ['success' => false, 'message' => "Le fichier est trop volumineux. Limite de " . ($maxSize / (1024 * 1024)) . " Mo."];
            }
    
            $photoPath = $uploadsDir . uniqid() . '-' . $photoName;
        
            if (move_uploaded_file($photoTmpName, $photoPath)) {
                return ['success' => true, 'filePath' => $photoPath];
            } else {
                return ['success' => false, 'message' => "Erreur lors de l'upload de l'image."];
            }
        } else {
            return ['success' => false, 'message' => "Aucun fichier sélectionné ou erreur lors de l'upload."];
        }
    }

    $uploadResult = uploadImage($_FILES['image']);
    if (!$uploadResult['success']) {
        echo $uploadResult['message'];
        exit;
    }
    $image = $uploadResult['filePath'];

    $menuQuery = "INSERT INTO menu (titre, description, picture) VALUES ('$menuTitle', '$menuDescription', '$image')";
    if (mysqli_query($conn, $menuQuery)) {
        $menuId = mysqli_insert_id($conn);

        foreach ($_POST['dishes']['title'] as $index => $dishTitle) {
            $dishCategory = mysqli_real_escape_string($conn, $_POST['dishes']['category'][$index]);
            $dishDescription = mysqli_real_escape_string($conn, $_POST['dishes']['description'][$index]);
            $dishIngredients = mysqli_real_escape_string($conn, $_POST['dishes']['ingredients'][$index]);

            $dishQuery = "INSERT INTO plat (nom, categorie, description, ingredient, id_menu) VALUES ('$dishTitle', '$dishCategory', '$dishDescription', '$dishIngredients', $menuId)";
            mysqli_query($conn, $dishQuery);
        }

        echo "<script>Swal.fire('Success', 'Menu created successfully!', 'success');</script>";
    } else {
        echo "<script>Swal.fire('Error', 'Failed to create menu.', 'error');</script>";
    }
}
?>
</body>
</html>
