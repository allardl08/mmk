<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customize</title>
    <link rel="stylesheet" href="customize.css">
</head>
<body>
    <div class="container">
        <div class="back-button-container">
            <button class="back-button" onclick="window.location.href='homepage.php'">Back </button>
        </div>
        <h1>Weekly Meal Planning</h1>
        <div class="weekly-planning">
            <h2>Select Date and Meals</h2>
            <form id="meal-planning-form">
                <div class="date-selection">
                    <label for="selected-date">Select Date:</label>
                    <input type="date" id="selected-date" name="selected-date" required>
                </div>
                <div class="time-selection">
                    <label for="delivery-time">Select Delivery Time:</label>
                    <input type="time" id="delivery-time" name="delivery-time" required>
                </div>
                <div class="meal-selection">
                    <h3>Choose Meals:</h3>
                    <div class="menu-items">
                        <!-- Initial Menu Items -->
                        <div class="item breakfast" data-type="breakfast">
                            <img src="images/hotsilog.jpg" alt="Hotsilog">
                            <h3>HOTSILOG</h3>
                            <p>PHP 80</p>
                            <label><input type="checkbox" name="meal" value="Hotsilog"> Add to meal plan</label>
                        </div>
                        <div class="item lunch" data-type="lunch">
                            <img src="images/lugaw.jpg" alt="Lugaw">
                            <h3>LUGAW</h3>
                            <p>PHP 30</p>
                            <label><input type="checkbox" name="meal" value="Lugaw"> Add to meal plan</label>
                        </div>
                        <div class="item breakfast" data-type="breakfast">
                            <img src="images/champorado.jpg" alt="Champorado">
                            <h3>CHAMPORADO</h3>
                            <p>PHP 70</p>
                            <label><input type="checkbox" name="meal" value="Champorado"> Add to meal plan</label>
                        </div>
                        
                        <!-- Hidden Menu Items (Initially Hidden) -->
                        <div class="item hidden-item dinner" data-type="dinner">
                            <img src="images/kare-kare.jpg" alt="Kare-Kare">
                            <h3>KARE-KARE</h3>
                            <p>PHP 70</p>
                            <label><input type="checkbox" name="meal" value="Kare-Kare"> Add to meal plan</label>
                        </div>
                        <div class="item hidden-item dinner" data-type="dinner">
                            <img src="images/adobo.jpg" alt="Adobong Baboy">
                            <h3>ADOBONG BABOY</h3>
                            <p>PHP 70</p>
                            <label><input type="checkbox" name="meal" value="Adobong Baboy"> Add to meal plan</label>
                        </div>
                        <div class="item hidden-item lunch" data-type="lunch">
                            <img src="images/palabok.jpg" alt="Palabok">
                            <h3>PALABOK</h3>
                            <p>PHP 70</p>
                            <label><input type="checkbox" name="meal" value="Palabok"> Add to meal plan</label>
                        </div>
                        <!-- Add more hidden items as needed -->
                    </div>
                    <button type="button" class="show-more-btn" onclick="toggleMenuItems()">Show More</button>
                </div>
                <button type="button" class="add-meal-button" onclick="addMeal()">Add Meal</button>
            </form>
            <div class="planned-meals">
                <h2>Planned Meals</h2>
                <ul id="meal-list">
                    <!-- Planned meals will appear here -->
                </ul>
            </div>
        </div>
        <div class="submit-meal-plan-container">
            <button class="submit-meal-plan-button">Submit Meal Plan</button>
        </div>
        <div class="recommendations-container">
            <h2>Food Recommendations</h2>
            <form>
                <label for="fridge-items">What's available in the fridge:</label>
                <textarea id="fridge-items" rows="4" placeholder="List items here..."></textarea>
                <label for="meal-type">Type of Meal:</label>
                <select id="meal-type">
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <!-- Add more options as needed -->
                </select>
                <button type="submit" class="submit-button">Get Recommendations</button>
            </form>
            <div class="recommendations-result">
                <!-- Recommendations will be displayed here -->
            </div>
        </div>
    </div>

<script>
    function toggleMenuItems() {
        const hiddenItems = document.querySelectorAll('.hidden-item');
        hiddenItems.forEach(item => item.classList.toggle('show'));
        const button = document.querySelector('.show-more-btn');
        if (button.textContent === 'Show More') {
            button.textContent = 'Show Less';
        } else {
            button.textContent = 'Show More';
        }
    }

    function addMeal() {
        const date = document.getElementById('selected-date').value;
        const time = document.getElementById('delivery-time').value;
        const mealOptions = document.querySelectorAll('input[name="meal"]:checked');
        const mealList = document.getElementById('meal-list');

        if (date && time && mealOptions.length) {
            let meals = Array.from(mealOptions).map(option => option.value).join(', ');
            let listItem = document.createElement('li');
            listItem.textContent = `${date} ${time}: ${meals}`;
            mealList.appendChild(listItem);
            document.getElementById('meal-planning-form').reset(); // Reset form after adding
        } else {
            alert('Please select a date, time, and at least one meal.');
        }
    }
</script>
</body>
</html>
