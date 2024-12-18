<?php
include('../database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <!-- Main Container -->
    <div class="h-[80%] flex flex-col justify-center items-center px-4">
        <!-- Card -->
        <div class="bg-white w-full max-w-md p-6 md:p-8">
            <!-- Header -->
            <h2 class="text-3xl font-bold text-center text-gray-800">Log In</h2>
            <p class="text-center text-gray-500 mt-2">Welcome back! Please log in to your account.</p>
            
            <!-- Login Form -->
            <form id="form" class="mt-6 space-y-6" action="" method="post">

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="login" id="login" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">Log In</button>
            </form>

            <!-- Footer -->
            <p class="text-center text-sm text-gray-500 mt-6">Don't have an account? <a href="../pages/signup.php" class="text-blue-600 hover:underline">Sign Up</a></p>
        </div>
    </div>

    <script>
        let form = document.querySelector("form");
        let emailInput = document.querySelector("input[name='email']");
        let passwordInput = document.querySelector("input[name='password']");

        form.onsubmit = function (e) {
            let email = emailInput.value.trim();
            let password = passwordInput.value.trim();

            if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
                alert("Please enter a valid email address.");
                e.preventDefault();
                return;
            }
        }
    </script>

</body>
</html>

<?php
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../pages/menu.php");
        } else {
            echo "<p class='text-red-500 text-center'>Invalid email or password.</p>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<p class='text-red-500 text-center'>Error with the database query: " . mysqli_error($conn) . "</p>";
    }
}

mysqli_close($conn);
?>
