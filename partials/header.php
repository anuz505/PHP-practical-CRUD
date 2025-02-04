<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.php" class="text-white text-xl font-bold">MyWebsite</a>
            <div>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="profile.php" class="text-white mr-4">Profile</a>
                    <a href="logout.php" class="text-white">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="text-white mr-4">Login</a>
                    <a href="register.php" class="text-white">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
