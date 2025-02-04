<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile System</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-e5e5e5">
    <nav class="bg-14213d p-4">
        <div class="container mx-auto flex justify-between items-center >
            <a href="index.php" class="text-fca311 text-xl font-bold" style="font-family: 'Bebas Neue', sans-serif;">PHP Practical Assignment</a>
            <div>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="profile.php" class="text-fca311 mr-4" style="font-family: 'Bebas Neue', sans-serif;">Profile</a>
                    <a href="logout.php" class="text-fca311" style="font-family: 'Bebas Neue', sans-serif;">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="text-fca311 mr-4" style="font-family: 'Bebas Neue', sans-serif;">Login</a>
                    <a href="register.php" class="text-fca311" style="font-family: 'Bebas Neue', sans-serif;">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>