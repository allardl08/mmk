<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="setaddress.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
    <script>
        function initAutocomplete() {
            const locationInput = document.getElementById('location');
            const options = {
                types: ['geocode'],
                componentRestrictions: { country: 'PH' } // Restrict to Philippines
            };

            new google.maps.places.Autocomplete(locationInput, options);
        }

        google.maps.event.addDomListener(window, 'load', initAutocomplete);
    </script>
</head>
<body>
    <div class="container">
        <h1>Contact Information</h1>
        <form action="saveaddress.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>
            
            <h2>Address Information</h2>
            
            <label for="location">Select Location:</label>
<select id="location" name="location" required>
    <option value="">Select Location</option>
    <option value="Philippines">Philippines</option>
    <!-- Add more options as needed -->
</select>

            
            <label for="municipality">Select Municipality:</label>
            <select id="municipality" name="municipality" required>
                <option value="">Select Municipality</option>
                <!-- Add your options here -->
                <option value="Manila">Manila</option>
                <option value="Quezon City">Quezon City</option>
                <option value="Batangas">Batangas</option>
                <!-- Add more options as needed -->
            </select>
            
            <label for="district">Select District:</label>
            <select id="district" name="district" required>
                <option value="">Select District</option>
                <!-- Add your options here -->
                <option value="Calatagan">Calatagan</option>
                <option value="Nasugbu">Nasugbu</option>
                <!-- Add more options as needed -->
            </select>
            
            <label for="barangay">Select Barangay:</label>
            <select id="barangay" name="barangay" required>
                <option value="">Select Barangay</option>
                <!-- Add your options here -->
                <option value="Barangay Real">Barangay Real</option>
                <option value="Barangay Balibago">Barangay Balibago</option>
                <!-- Add more options as needed -->
            </select>
            
            <label for="other_details">Other Details:</label>
            <textarea id="other_details" name="other_details"></textarea>
            
            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>
