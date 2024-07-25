<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="account.css">
</head>
<body>
    <div class="container">
        <div class="profile-section">
            <?php
            session_start(); // Start the session to retrieve the image path
            $profile_photo = isset($_SESSION['profile_photo']) ? $_SESSION['profile_photo'] : 'default.png';
            ?>
            <img src="<?php echo $profile_photo; ?>" alt="Profile Photo" class="profile-photo">
            <button class="profile-button" onclick="openModal('upload-photo-modal')">Upload Your Photo</button>
        </div>
        
        <div class="account-actions">
            <button class="action-button" onclick="openModal('edit-name-modal')">Edit Your Name</button>
            <button class="action-button" onclick="openModal('change-password-modal')">Change Your Password</button>
            <button class="action-button" onclick="openModal('edit-address-modal')">Edit Your Address Information</button>
        </div>

        <!-- Upload Photo Modal -->
        <div id="upload-photo-modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('upload-photo-modal')">&times;</span>
                <h2>Upload Photo</h2>
                <form action="accountphoto.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload" name="submit">
                </form>
            </div>
        </div>

        <!-- Edit Name Modal -->
        <div id="edit-name-modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('edit-name-modal')">&times;</span>
                <h2>Edit Name</h2>
                <form action="editname.php" method="post">
                    <label for="new-name">New Name:</label>
                    <input type="text" id="new-name" name="new-name" required>
                    <input type="submit" value="Save">
                </form>
            </div>
        </div>

        
        <div id="change-password-modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('change-password-modal')">&times;</span>
                <h2>Change Password</h2>
                <form action="changepass.php" method="post">
                    <label for="current-password">Current Password:</label>
                    <input type="password" id="current-password" name="current-password" required>
                    <label for="new-password">New Password:</label>
                    <input type="password" id="new-password" name="new-password" required>
                    <label for="confirm-password">Confirm New Password:</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                    <input type="submit" value="Change">
                </form>
            </div>
        </div>

        <!-- Edit Address Modal -->
        <div id="edit-address-modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('edit-address-modal')">&times;</span>
                <h2>Edit Address Information</h2>
                <form action="address.php" method="post">
                    <label for="new-address">New Address:</label>
                    <textarea id="new-address" name="new-address" required></textarea>
                    <input type="submit" value="Save">
                </form>
            </div>
        </div>

    </div>

    <script>
        // JavaScript functions to open and close modals
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
    </script>
</body>
</html>
