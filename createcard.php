<?php
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="'Mike Oram', PHP, CSS, Magic The Gathering">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mike Oram's PHP Collectors App">
    <link href="normalize.css" type="text/css" rel="stylesheet">
    <link href="styles.css" type="text/css" rel="stylesheet">
    <title>MTG Card Collector - Create Card!.</title>
</head>
<body class="create-card-body">
<section class="create-card-section">
    <div class="create-card-container">
        <div class="create-card-explainer">
            <h2>Create a Card!</h2>
            <p>Fill in the form below and submit it using the button at the bottom to add your Card to the collection!</p>
        </div>
        <form class="create-card-form" method="get" action="registrationpage.php">
            <label for="name">Card Title: </label>
            <input type="text" name="title" alt="input for card title" placeholder="Centaur Courser" required>
            <label for="cardType">Card Type: </label>
            <input type="text" name="cardType" placeholder="Creature - Centaur Warrior" required>
            <label for="color">Select The Card Color: </label>
            <select name="color" required>
                <option value="Green">Green</option>
                <option value="Blue">Blue</option>
                <option value="Black">Black</option>
                <option value="Red">Red</option>
                <option value="White">White</option>
            </select>
            <label for="raritySet">Select The Card Rarity: </label>
            <select name="raritySet" required>
                <option value="Common">Common</option>
                <option value="Uncommon">Uncommon</option>
                <option value="Rare">Rare</option>
                <option value="Mythic Rare">Mythic Rare</option>
            </select>
            <input type="submit" value="Submit Your Card!">
        </form>
    </div>
</body>
</html>
