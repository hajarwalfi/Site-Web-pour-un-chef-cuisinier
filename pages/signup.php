<?php
 include('../database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <!-- Main Container -->
    <div class=" h-[80%] flex flex-col justify-center items-center px-4">
        <!-- Card -->
        <div class="bg-white w-full max-w-md p-6 md:p-8">
            <!-- Header -->
            <h2 class="text-3xl font-bold text-center text-gray-800">Sign Up</h2>
            <p class="text-center text-gray-500 mt-2">Join us to start your journey!</p>
            
            <!-- Sign-Up Form -->
            <form id="form" class="mt-6 space-y-6" action="" method="post">

                <!-- First Name -->
                <div>
                    <label for="fname" class="block text-sm font-medium text-gray-700">First name</label>                    
                    <input type="text" id="fname" name="fname" placeholder="John"  class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"required>
                </div>

                <!-- Last Name -->
                <div>
                    <label for="lname" class="block text-sm font-medium text-gray-700">Last name</label>
                    <input type="text" id="lname" name="lname" placeholder="Doe" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                </div>
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password"  name="password" placeholder="••••••••" class="mt-2 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"required>
                </div>
                <!-- Submit Button -->
                <button type="submit" name="signup" id="signup" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">Sign Up</button>
            </form>

            <!-- Footer -->
            <p class="text-center text-sm text-gray-500 mt-6">Already have an account? <a href="../pages/login.php" class="text-blue-600 hover:underline">Log In</a></p>
        </div>
    </div>
    <script>
        let form = document.querySelector("form"); 
        let fnameInput = document.querySelector("input[name='fname']"); 
        let lnameInput = document.querySelector("input[name='lname']"); 
        let emailInput = document.querySelector("input[name='email']"); 
        let passwordInput = document.querySelector("input[name='password']"); 

    form.onsubmit = function (e) {
        let fname = fnameInput.value.trim(); 
        let lname = lnameInput.value.trim(); 
        let email = emailInput.value.trim();
        let password = passwordInput.value.trim();

        form.onsubmit = function (e) {

            if (/^[A-Za-z]+$/.test(fname)) {
            alert("First name must contain only letters.");
            e.preventDefault();
            return;
            }

            if (!/^[A-Za-z]+$/.test(lname)) {
            alert("Last name must contain only letters.");
            e.preventDefault();
            return;
            }

            if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
            alert("Please enter a valid email address.");
            e.preventDefault();
            return;
            }

            if (!/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password)) {
            alert(
                "Password must be at least 8 characters long, contain at least one letter, one number, and one special character."
            );
            e.preventDefault();
            return;
        }
    }
    }
    </script>
</body>
</html>

<?php
/*
to ensure that the code inside runs onnly when the form submission 
button signup is pressed , how?
-  by checking if the form has been submitted using the POST method 
-  isset() checks whether a variable is set and not NULL
*/
if (isset($_POST['signup'])) {
    /*
    We retrieve the name entered in the form and we escape special chars
    to make it safe for use 
    - mysqli_real_escape_string(): excapes special chars to prevent sql inj
    - it takes two parameters : 
        a. a valid database connection object 
        b. the raw user input from the form
    - it gives back a sanitized version of the input data
    */
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    /*
    here we dont need that function , because whatever the input data 
    we need just to hash it */
    $id_role = 2;

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    /*
    this function hashes the user's pass securely so that its not stored in plain 
    text in the database
    it takes two param:
    - the plain text as entered by the user
    - a constant that seleects the default hashing algorithm (bycrypt)
    the algos of hashing : 
        - bycrypt
        - crypt_blowfish
        - argon2i
        - argon2id 
    */
    $sql = "INSERT INTO users (nom, prenom, email, password, id_role) VALUES (?, ?, ?, ?, ?)";
    /*
    normal insertion but this time with prepared statements 
    1. we need to create an sql query to insert a new record into users tabel
       we used placeholders ? and each of them will be replaced by actual data later
    2. then we prepare the sql stmt for execution 
       taking two params :
        - the database conn object
        - the sql query with placeholders
       it outputs a prepared statement object $stmt stored int his var that can 
       be executed later 
    3. if the sql statement was successfully prepared great next step return true false
    4. then we nedd to bind actual values to the placeholders in the prepared statement 
       we take the prepared statement object , a string that specifies the data types 
       of each paleceholder (string , interger), the actual values that are stored in each 
       variable after they were being escaped from special chars
    5. theen we executes the prepared statement with the bound param 
       if the query is succ it returns true 
    6. then we close the prepared statement and frees its ressources
    */
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "ssssi", $lname, $fname, $email, $hashed_password, $id_role);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../pages/menu.php");
        } else {
            echo "<p class='text-red-500 text-center'>Erreur lors de l'inscription : " . mysqli_error($conn) . "</p>";
        }
        mysqli_stmt_close($stmt);
        
    } else {
        echo "<p class='text-red-500 text-center'>Erreur lors de la préparation de la requête : " . mysqli_error($conn) . "</p>";
    }
}


mysqli_close($conn);
?>
<!--  Prepared statements
  process : 
    1. prepare : n SQL statement template is created and sent to the database. 
    Certain values are left unspecified, called parameters (labeled "?").
    Example: INSERT INTO MyGuests VALUES(?, ?, ?)
    2. The database parses, compiles, and performs query optimization on the SQL statement template, 
    and stores the result without executing it
    3. Execute: At a later time, the application binds the values to the parameters, and the database executes the statement.
-->