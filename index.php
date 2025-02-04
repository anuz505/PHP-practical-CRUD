
<?php
require_once 'config.php';
include 'partials/header.php';
?>

<div class="container mx-auto px-4 py-8 bg-e5e5e5">
    <h1 class="text-4xl font-bold mb-4" style="font-family: 'Bebas Neue', sans-serif; color: #14213d;">Welcome to MyWebsite</h1>
    <?php if(isset($_SESSION['user_id'])): ?>
        <p class="mb-4" style="color: #000000;">Welcome back! Visit your <a href="profile.php" class="text-fca311" style="font-family: 'Bebas Neue', sans-serif;">profile</a> to manage your information.</p>
    <?php else: ?>
        <p class="mb-4" style="color: #000000;">Please <a href="login.php" class="text-fca311" style="font-family: 'Bebas Neue', sans-serif;">login</a> or <a href="register.php" class="text-fca311" style="font-family: 'Bebas Neue', sans-serif;">register</a> to access your profile.</p>
    <?php endif; ?>
</div>

<?php include 'partials/footer.php'; ?>