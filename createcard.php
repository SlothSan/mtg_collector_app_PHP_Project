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
    <title>MTG Card Collector - Create Card!</title>
</head>
<body class="create-card-body">
<section class="create-card-section">
    <div class="create-card-container">
        <div class="create-card-explainer">
            <h2>Create a Card!</h2>
            <p>Fill in the form below and submit it using the button at the bottom to add your Card to the collection!</p>
            <a class="create-card-link" href="https://mtg.fandom.com/wiki/Parts_of_a_card" target="_blank">
                Click Here For Info On The Layout Of A Magic Card!
            </a>
        </div>
        <form class="create-card-form" method="get" action="registrationpage.php">
            <label for="title" id="title">Card Title: </label>
            <input type="text" name="title" alt="input for card title" placeholder="Centaur Courser" required>
            <label for="cardType" id-="cardType">Card Type: </label>
            <input type="text" name="cardType" placeholder="Creature - Centaur Warrior" required>
            <label for="color">Select The Card Color: </label>
            <select name="color" required>
                <option value="Green" selected="selected">Green</option>
                <option value="Blue">Blue</option>
                <option value="Black">Black</option>
                <option value="Red">Red</option>
                <option value="White">White</option>
            </select>
            <label for="raritySet">Select The Card Rarity: </label>
            <select name="raritySet" required>
                <option value="Common" selected="selected">Common</option>
                <option value="Uncommon">Uncommon</option>
                <option value="Rare">Rare</option>
                <option value="Mythic Rare">Mythic Rare</option>
            </select>
            <label for="genericCost">Generic Mana Cost: </label>
            <select name="genericCost">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label for="greenCost">Green Mana Cost: </label>
            <select name="greenCost">
                <option value=null selected="selected">0</option>
                <option value=1>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label for="blackCost">Black Mana Cost: </label>
            <select name="blackCost">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label for="blueCost">Blue Mana Cost: </label>
            <select name="blueCost">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label for="redCost">Red Mana Cost: </label>
            <select name="redCost">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label for="whiteCost">White Mana Cost: </label>
            <select name="whiteCost">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <p class="create-card-text">Ability Costs are the costs to use ability's you create on the card, see the explainer at the top!</p>
            <label for="abilityCostGeneric">Ability Generic Mana Cost: </label>
            <select name="abilityCostGeneric">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label for="abilityCostGreen">Ability Green Mana Cost: </label>
            <select name="abilityCostGreen">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label for="abilityCostBlack">Ability Black Mana Cost: </label>
            <select name="abilityCostBlack">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label for="abilityCostBlue">Ability Blue Mana Cost: </label>
            <select name="abilityCostBlue">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label for="abilityCostRed">Ability Red Mana Cost: </label>
            <select name="abilityCostRed">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label for="abilityCostWhite">Ability White Mana Cost: </label>
            <select name="abilityCostWhite">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <label for="abilityTap">Does the Ability Require the Card to be tapped: </label>
            <select name="abilityTap">
                <option value="0" selected="selected">No Tap</option>
                <option value="1">Tap to use ability</option>
            </select>
            <p class="create-card-text">Below are the text areas for adding your card's description (start with the abilitys) and flavour text in the other text area</p>
            <label for="description" id="description">Enter your cards abilitys and description: </label>
            <textarea class="create-card-textarea" rows="6" name="description" placeholder="EG: Many have heard the slither of dragging armor and the soft squelch of its voice. But only its victims ever meet its icy gaze."></textarea>
            <label for="designerFlavourText" id="designerFlavourText">Enter your cards flavour text: </label>
            <textarea class="create-card-textarea" rows="6" name="designerFlavourText" placeholder="EG: Many have heard the slither of dragging armor and the soft squelch of its voice. But only its victims ever meet its icy gaze."></textarea>
            <p class="create-card-text">Below are fields for the power and toughness of your card (if you have created a spell please leave these on 0</p>
            <label for="power">Power: </label>
            <select name="power">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option><option value="5">5</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <label for="toughness">Toughness: </label>
            <select name="toughness">
                <option value="null" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option><option value="5">5</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <input type="submit" value="Submit Your Card!">
        </form>
    </div>
</body>
</html>
