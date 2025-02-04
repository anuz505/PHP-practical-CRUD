<?php
include 'partials/header.php';
?>

<div class="container mx-auto px-4 py-8 bg-e5e5e5 ">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4" style="color: #14213d; font-family: 'Bebas Neue', sans-serif;">Register</h2>
        
        <?php if(!empty($errors)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php foreach($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="register.php">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name" style="color: #000000;">
                    First Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="first_name" id="first_name" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name" style="color: #000000;">
                    Last Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="last_name" id="last_name" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email" style="color: #000000;">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="email" name="email" id="email" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password" style="color: #000000;">
                    Password
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    type="password" name="password" id="password" required>
            </div>
            
            <button class="bg-fca311 hover:bg-fca311 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                type="submit" style="background-color: #fca311;">
                Register
            </button>
        </form>
    </div>
</div>

<?php include 'partials/footer.php'; ?>