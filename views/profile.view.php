<?php
include 'partials/header.php';
?>

<div class="container mx-auto px-4 py-8" style="height: 100vh;">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Profile</h2>
        
        <?php if(isset($success)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>
        
        <?php if(!empty($errors)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php foreach($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php
        // Check if user has filled in additional profile data
        $hasProfileData = !empty($user['phone']) || !empty($user['profile_photo']);
        ?>
        
        <?php if($hasProfileData): ?>
            <!-- Display user information -->
            <div id="profile-info" class="mb-6">
                <div class="flex items-start space-x-6 mb-6">
                    <?php if($user['profile_photo']): ?>
                        <img src="<?php echo htmlspecialchars($user['profile_photo']); ?>" 
                             alt="Profile Photo" 
                             class="w-32 h-32 rounded-full object-cover">
                    <?php endif; ?>
                    <div>
                        <h3 class="text-xl font-semibold mb-2 font-family: 'Roboto', sans-serif; ">
                            <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?>
                        </h3>
                        <p class="text-gray-600 mb-1">
                            <span class="font-medium font-family: 'Roboto', sans-serif;" " >Email:</span> 
                            <?php echo htmlspecialchars($user['email']); ?>
                        </p>
                        <?php if($user['phone']): ?>
                            <p class="text-gray-600">
                                <span class="font-medium font-family: 'Roboto', sans-serif;" ">Phone:</span> 
                                <?php echo htmlspecialchars($user['phone']); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <button  onclick="toggleForm()" style="background-color: #14213d; font-family: 'Roboto', sans-serif;" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Profile
                </button>
            </div>
        <?php endif; ?>
        
        <!-- Profile Form - Hidden by default if profile data exists -->
        <form method="POST" action="profile.php" enctype="multipart/form-data" 
              id="profile-form" class="<?php echo $hasProfileData ? 'hidden' : ''; ?>">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2 font-family: 'Roboto', sans-serif;" >
                    Profile Photo
                </label>
                <?php if($user['profile_photo']): ?>
                    <img src="<?php echo htmlspecialchars($user['profile_photo']); ?>" 
                         alt="Current Profile Photo" 
                         class="w-32 h-32 rounded-full object-cover mb-2">
                <?php endif; ?>
                <input type="file" name="profile_photo" accept="image/*" class="w-full">
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2 font-family: 'Roboto', sans-serif;" " for="first_name">
                    First Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="first_name" id="first_name" 
                    value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2 font-family: 'Roboto', sans-serif;" " for="last_name">
                    Last Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="last_name" id="last_name" 
                    value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2 font-family: 'Roboto', sans-serif;" " for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="email" name="email" id="email" 
                    value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2 font-family: 'Roboto', sans-serif;" " for="phone">
                    Phone Number
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="tel" name="phone" id="phone" 
                    value="<?php echo htmlspecialchars($user['phone']); ?>">
            </div>
            
            <div class="flex justify-between">
                <?php if($hasProfileData): ?>
                    <button type="button" onclick="toggleForm()" 
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel
                    </button>
                <?php endif; ?>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-family: 'Roboto', sans-serif;"  >
                    <?php echo $hasProfileData ? 'Save Changes' : 'Create Profile'; ?>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function toggleForm() {
    const form = document.getElementById('profile-form');
    const info = document.getElementById('profile-info');
    
    if(form.classList.contains('hidden')) {
        form.classList.remove('hidden');
        info.classList.add('hidden');
    } else {
        form.classList.add('hidden');
        info.classList.remove('hidden');
    }
}
</script>

<?php include 'partials/footer.php'; ?>