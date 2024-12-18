<?php
    require_once '../database.php';
    ob_start();
?>

<!-- Hero Section -->
<section class="bg-cover h-[70%] bg-no-repeat bg-center md:h-screen  bg-[url('../img/home3.jpg')]">
    <div class="bg-black bg-opacity-50 h-[70%] md:h-screen flex items-center justify-center text-center text-white">
        <div class="px-4 sm:px-6 md:px-8">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold leading-tight mb-6">Taste the difference</h1>
            <p class="text-base sm:text-lg md:text-xl mb-6">Discover exquisite menus and book your unique culinary experience today!</p>
        </div>
    </div>
</section>


<!-- Features Section -->
<section id="services" class="py-20 bg-black text-white">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-semibold text-white mb-10">Our Services</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3  gap-12">
            <!-- Feature 1 -->
            <div class=" shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                <img src="../img/first.avif" alt="Feature Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-[#876a17] mb-4">Custom Meal Preparation</h3>
                    <p class="text-white mb-4">A private chef offers personalized, restaurant-quality dining at home for stress-free special occasions.</p>
                </div>
            </div>
            <!-- Feature 2 -->
            <div class=" shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                <img src="../img/second.avif" alt="Feature Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold  text-[#876a17] mb-4">Private Dining Experience</h3>
                    <p class="text-white mb-4">A private chef delivers personalized, restaurant-quality dining at home, perfect for intimate gatherings and special occasions.</p>
                </div>
            </div>
            <!-- Feature 3 -->
            <div class=" shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                <img src="../img/third.avif" alt="Feature Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold  text-[#876a17] mb-4">Special Occasion Catering</h3>
                    <p class="text-white mb-4">A private chef elevates intimate gatherings by creating personalized menus, cooking, serving, and cleaning, ensuring stress-free, memorable celebrations.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    $content = ob_get_clean();
    require_once '../layout/layout.php';
?>

