
<?php
require_once 'config.php';
include 'partials/header.php';
?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-4">Welcome to MyWebsite</h1>
    <?php if(isset($_SESSION['user_id'])): ?>
        <p class="mb-4">Welcome back! Visit your <a href="profile.php" class="text-blue-600">profile</a> to manage your information.</p>
    <?php else: ?>
        <p class="mb-4">Please <a href="login.php" class="text-blue-600">login</a> or <a href="register.php" class="text-blue-600">register</a> to access your profile.</p>
    <?php endif; ?>
</div>

<?php include 'partials/footer.php'; ?>