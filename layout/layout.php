<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="./assets/logo1.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body class="font-sans bg-black min-h-screen">

    <nav class="bg-black shadow-md">
        <!-- Normal Menu -->

        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-white lg:px-8">

            <div class="flex justify-between h-16 items-center">

                <!-- Logo or Brand Name -->
                <div class="flex-shrink-0">
                    <a href="../pages/home.php" class="text-2xl font-bold text-blue-500"><img src="../img/logo.png" class="w-16"></a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-8">
                    <a href="../pages/home.php" class=" hover:text-decoration hover:underline font-medium">Home</a>
                    <a href="../pages/menu.php" class=" hover:text-blue-500 font-medium">Menu</a>
                    <a href="#" class=" hover:text-blue-500 font-medium">Contact</a>
                    <a href="#" class=" hover:text-blue-500 font-medium">About</a>
                </div>

                <!-- Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"><a href="../pages/signup.php">Sign Up</a></button>
                    <button class="bg-gray-200  px-4 py-2 rounded hover:bg-gray-300"><a href="../pages/login.php">Log In</a></button>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 focus:outline-none focus:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden h-screen">
            <a href="../pages/home.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Home</a>
            <a href="../pages/menu.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Menu</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Contact</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">About</a>
        <div class="px-4 py-2">
            <!-- Sign Up Button -->
            <button class="bg-gradient-to-r from-yellow-500 to-orange-600 text-white w-full px-6 py-3 rounded-lg shadow-xl hover:from-yellow-600 hover:to-orange-700 transition-all duration-300 mb-4">
                <a href="../pages/signup.php" class="font-semibold text-lg">Sign Up</a>
            </button>

            <!-- Log In Button -->
            <button class="bg-gradient-to-r from-purple-600 to-indigo-700 text-white w-full px-6 py-3 rounded-lg shadow-xl hover:from-purple-700 hover:to-indigo-800 transition-all duration-300">
                <a href="../pages/login.php" class="font-semibold text-lg">Log In</a>
            </button>
        </div>


        </div>

    </nav>

    <main>
        <div>
            <div class=" w-full ">
                <?php
                echo isset($content) ? $content : '<p>Hello World!</p>';
                ?>
            </div>
        </div>
    </main>

    
    <footer class="bg-black text-gray-300 py-10 p-4 mt-4">
        <div class="max-w-7xl mx-auto px-6 sm:px-8">
            <!-- Top Section -->
            <div class="flex flex-col md:flex-row justify-between items-center border-b border-gray-700 pb-8">
                <!-- Logo and Info -->
                <div class="mb-6 md:mb-0 text-center md:text-left">
                    <h1 class="text-2xl font-bold  text-[#876a17]">Codebenders</h1>
                    <p class="mt-2 text-sm text-gray-400">Empowering business through creativity and innovation.</p>
                </div>
                <!-- Navigation Links -->
                <ul class="flex flex-wrap justify-center md:justify-start space-x-6">
                    <li><a href="#about" class="text-gray-400 hover:text-white">About</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white">Services</a></li>
                    <li><a href="#portfolio" class="text-gray-400 hover:text-white">Portfolio</a></li>
                    <li><a href="#contact" class="text-gray-400 hover:text-white">Contact</a></li>
                </ul>
            </div>

            <!-- Bottom Section -->
            <div class="mt-8 flex flex-col md:flex-row justify-between items-center">
                 <!-- Copyright -->
                <p class="text-sm text-center  text-white md:text-left">&copy; 2024 Codebenders. All rights reserved.</p>
                <!-- Social Media Icons -->
                <div class="mt-4 md:mt-0 flex space-x-6">
                    <a href="https://facebook.com" class="text-gray-400 hover:text-white" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.988H8.294v-2.89h2.144V9.856c0-2.123 1.263-3.293 3.196-3.293.928 0 1.902.166 1.902.166v2.091h-1.071c-1.055 0-1.384.654-1.384 1.326v1.594h2.35l-.376 2.89h-1.974V21.878C18.343 21.128 22 16.991 22 12z"/></svg></a>
                    <a href="https://twitter.com" class="text-gray-400 hover:text-white" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.46 6.011c-.805.356-1.67.597-2.573.703a4.53 4.53 0 0 0 1.993-2.496c-.876.518-1.847.894-2.885 1.095a4.493 4.493 0 0 0-7.656 4.095 12.785 12.785 0 0 1-9.28-4.703 4.5 4.5 0 0 0 1.393 6.012 4.481 4.481 0 0 1-2.033-.562v.057a4.493 4.493 0 0 0 3.603 4.408 4.52 4.52 0 0 1-2.028.076 4.496 4.496 0 0 0 4.197 3.121 9.008 9.008 0 0 1-5.582 1.926c-.362 0-.719-.021-1.072-.062a12.743 12.743 0 0 0 6.91 2.027c8.295 0 12.829-6.873 12.829-12.829 0-.195-.004-.39-.013-.584a9.154 9.154 0 0 0 2.256-2.335z"/></svg></a>
                    <a href="https://linkedin.com" class="text-gray-400 hover:text-white" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452H17.27v-5.569c0-1.328-.027-3.038-1.85-3.038-1.854 0-2.141 1.446-2.141 2.939v5.668H9.09V9.048h3.046v1.561h.043c.425-.803 1.463-1.65 3.01-1.65 3.22 0 3.813 2.121 3.813 4.877v6.616zM5.337 7.433a1.743 1.743 0 1 1 0-3.487 1.743 1.743 0 0 1 0 3.487zM6.863 20.452H3.811V9.048h3.052v11.404zM22.225 0H1.771C.792 0 0 .772 0 1.729v20.542C0 23.228.792 24 1.771 24h20.451C23.208 24 24 23.228 24 22.271V1.729C24 .772 23.208 0 22.225 0z"/></svg></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="../js/script.js"></script>
</body>
</html>
