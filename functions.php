<?php

function addCardToDb(array $card)
{
    //Placeholder setup for hardening the Db add against SQL Injection.
    $title = $card['title'];
    $cardType = $card['cardType'];
    $color = $card['color'];
    $raritySet = $card['raritySet'];
    $genericCost = checkIfNull($card['genericCost']);
    $greenCost = checkIfNull($card['greenCost']);
    $blackCost = checkIfNull($card['blackCost']);
    $blueCost = checkIfNull($card['blueCost']);
    $redCost = checkIfNull($card['redCost']);
    $whiteCost = checkIfNull($card['whiteCost']);
    $abilityCostGeneric = checkIfNull($card['abilityCostGeneric']);
    $abilityCostGreen = checkIfNull($card['abilityCostGreen']);
    $abilityCostBlack = checkIfNull($card['abilityCostBlack']);
    $abilityCostBlue = checkIfNull($card['abilityCostBlue']);
    $abilityCostRed = checkIfNull($card['abilityCostRed']);
    $abilityCostWhite = checkIfNull($card['abilityCostWhite']);
    $abilityTap = $card['abilityTap'];
    $description = $card['description'];
    $designerFlavourText = $card['designerFlavourText'];
    $power = checkIfNull($card['power']);
    $toughness = checkIfNull($card['toughness']);

    $connectionString = 'mysql:host=db; dbname=mtg_cards';
    $dbUsername = 'root';
    $dbPassword = '4qUSDQpcGu6H';
    $db = new PDO($connectionString, $dbUsername, $dbPassword);
    $queryString = 'INSERT INTO  `cards` (`title`, `cardType`, `color`, `raritySet`, `genericCost`, `greenCost`, `blackCost`, `blueCost`, 
                      `redCost`, `whiteCost`, `abilityCostGeneric`, `abilityCostGreen`, `abilityCostBlack`, `abilityCostBlue`, `abilityCostRed`, 
                      `abilityCostWhite`, `abilityTap`, `description`, `designerFlavourText`, `power`, `toughness`)
	VALUES (:title, :cardType, :color, :raritySet, :genericCost, :greenCost, :blackCost, :blueCost, :redCost, :whiteCost,
	         :abilityCostGeneric, :abilityCostGreen, :abilityCostBlack, :abilityCostBlue, :abilityCostRed, :abilityCostWhite, 
	        :abilityTap, :description, :designerFlavourText, :power, :toughness)';
    $query = $db->prepare($queryString);
    $query->execute(['title' => $title, 'cardType' => $cardType, 'color' => $color, 'raritySet' => $raritySet, 'genericCost' => $genericCost,
    'greenCost' => $greenCost, 'blackCost' => $blackCost, 'blueCost' => $blueCost, 'redCost' => $redCost, 'whiteCost' => $whiteCost,
        'abilityCostGeneric' => $abilityCostGeneric, 'abilityCostGreen' => $abilityCostGreen, 'abilityCostBlack' => $abilityCostBlack,
        'abilityCostBlue' => $abilityCostBlue, 'abilityCostRed' => $abilityCostRed, 'abilityCostWhite' => $abilityCostWhite, 'abilityTap' => $abilityTap,
        'description' => $description, 'designerFlavourText' => $designerFlavourText, 'power' => $power, 'toughness' => $toughness]);

}

function checkIfNull($toBeChecked)
{
    if ($toBeChecked === 'null') {
        return null;
    } else {
        return intval($toBeChecked);
    }
}

function createAllDisplayCards(array $results): string
{
    $outputString = '';

    foreach ($results as $card) {
        if (
            !is_array($card) ||
            !array_key_exists('title', $card) ||
            !array_key_exists('cardType', $card) ||
            !array_key_exists('color', $card) ||
            !array_key_exists('raritySet', $card)
        ) {
            return '';
        }
        $cardString = "<div class='display-card'>";
        $cardString .= "<p>Card Title: ". $card['title'] . "</p>";
        $cardString .= "<p>Card Type: " . $card['cardType'] . "</p>";
        $cardString .= "<p>Card Color: " . $card['color'] . "</p>";
        $cardString .= "<p>Rarity: " . $card['raritySet'] . "</p>";
        $cardString .= "<form method='post'>";
            $cardString .= "<button class='view-card-button' type='submit' value='". $card['title'] . "' name='createCard'>View Card</button>";
        $cardString .= "</form>";
        $cardString .= "</div>";
        $outputString .=  $cardString;
    }
    return $outputString;
}

function getAllCardsFromDb(): array
{
    $connectionString = 'mysql:host=db; dbname=mtg_cards';
    $dbUsername = 'root';
    $dbPassword = 'password';
    $db = new PDO($connectionString, $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $queryString = 'SELECT `id`, `title`, `cardType`, `color`, `raritySet` FROM `cards`
                    ORDER BY `id` DESC';
    $query = $db->prepare($queryString);
    $query->execute();
    return $query->fetchAll();
}

function checkSingleCardAndGetAllInfo(string $cardTitle): array
{
    $cardName = $cardTitle;
    $connectionString = 'mysql:host=db; dbname=mtg_cards';
    $dbUsername = 'root';
    $dbPassword = '4qUSDQpcGu6H';
    $db = new PDO($connectionString, $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $queryString = "SELECT `color`, `title`, `genericCost`, `greenCost`, `blackCost`, `blueCost`, `redCost`, `whiteCost`,
       `cardArt`, `cardType`, `setType`, `raritySet`, `abilityCostGeneric`, `abilityCostGreen`, `abilityCostRed`, `abilityCostBlue`,
       `abilityCostBlack`, `abilityCostWhite`, `abilityTap`, `description`, `designerFlavourText`, `power`, `toughness`
        FROM `cards` WHERE `title` LIKE :cardTitle";
    $query = $db->prepare($queryString);
    $query->bindParam(':cardTitle', $cardName);
    $query->execute();
    return $result = $query->fetch();
}

function createMTGCard(array $card_array): string
{
    if (!array_key_exists('color', $card_array) ||
        !array_key_exists('title', $card_array) ||
        !array_key_exists('genericCost', $card_array) ||
        !array_key_exists('greenCost', $card_array) ||
        !array_key_exists('blackCost', $card_array) ||
        !array_key_exists('blueCost', $card_array) ||
        !array_key_exists('redCost', $card_array) ||
        !array_key_exists('whiteCost', $card_array) ||
        !array_key_exists('cardArt', $card_array) ||
        !array_key_exists('cardType', $card_array) ||
        !array_key_exists('setType', $card_array) ||
        !array_key_exists('raritySet', $card_array) ||
        !array_key_exists('abilityCostGeneric', $card_array) ||
        !array_key_exists('abilityCostGreen', $card_array) ||
        !array_key_exists('abilityCostRed', $card_array) ||
        !array_key_exists('abilityCostBlue', $card_array) ||
        !array_key_exists('abilityCostBlack', $card_array) ||
        !array_key_exists('abilityCostWhite', $card_array) ||
        !array_key_exists('abilityTap', $card_array) ||
        !array_key_exists('description', $card_array) ||
        !array_key_exists('designerFlavourText', $card_array) ||
        !array_key_exists('power', $card_array) ||
        !array_key_exists('toughness', $card_array)) {
        return '';
    }

    $color = $card_array['color'];
    $cardTitle = $card_array['title'];
    $genericManaCost = $card_array['genericCost'];
    $cardArt = $card_array['cardArt'];
    $cardType = $card_array['cardType'];
    $setType = $card_array['raritySet'];
    $description = $card_array['description'];
    $flavorDesignerText = $card_array['designerFlavourText'];
    $power = $card_array['power'];
    $toughness = $card_array['toughness'];
    $outputString =  "<div class='card-back-$color'>";
    $outputString .= "<div class='card-top-container'>";
    $outputString .= "<div class='card-title-container'>";
    $outputString .= "<p>$cardTitle</p>";
    $outputString .=  "</div>";
    $outputString .=  "<div class='mana-cost-container'>";
    $outputString .=  "<div class='mana-cost-display-container'>";
    if($genericManaCost != null) {
        $outputString .= "<div class='mana-neutral-container'>";
        $outputString .= "<img class='mana-neutral' src='./imgs/manaCosts/mana_circle.png' alt='neutral mana'>";
        $outputString .= "<p class='mana-neutral-cost'>$genericManaCost</p>";
        $outputString .= "</div>";
    }
    if ($card_array['greenCost'] != null) {
        $counterGreen = $card_array['greenCost'];
        for ($counterGreen; $counterGreen > 0; $counterGreen--) {
            $outputString .= "<img class='mana-cost-color' src='./imgs/manaCosts/mana_g.png' alt='green mana'>";
        }
    }
    if ($card_array['blackCost'] != null) {
        $counterBlack = $card_array['blackCost'];
        for ($counterBlack; $counterBlack > 0; $counterBlack--) {
            $outputString .= "<img class='mana-cost-color' src='./imgs/manaCosts/mana_b.png' alt='black mana'>";
        }
    }
    if ($card_array['blueCost'] != null) {
        $counterBlue = $card_array['blueCost'];
        for ($counterBlue; $counterBlue > 0; $counterBlue--) {
            $outputString .= "<img class='mana-cost-color' src='./imgs/manaCosts/mana_u.png' alt='blue mana'>";
        }
    }
    if ($card_array['redCost'] != null) {
        $counterRed = $card_array['redCost'];
        for ($counterRed; $counterRed > 0; $counterRed--) {
            $outputString .= "<img class='mana-cost-color' src='./imgs/manaCosts/mana_r.png' alt='red mana'>";
        }
    }
    if ($card_array['whiteCost'] != null) {
        $counterWhite = $card_array['whiteCost'];
        for ($counterWhite; $counterWhite > 0; $counterWhite--) {
            $outputString .= "<img class='mana-cost-color' src='./imgs/manaCosts/mana_w.png' alt='white mana'>";
        }
    }
    $outputString .= "</div>"; // Close mana-cost
    $outputString .=  "</div>"; // Close Mana Container
    $outputString .=  "</div>"; // Close Card Top Div
    $outputString .= "<div class='card-art-container''>";
    $outputString .= "<img class='card-art' src='./imgs/cardArt/$cardArt' alt='$cardTitle' >";
    $outputString .= "</div>"; //End of card art container
    $outputString .=  "<div class='card-type-container'>";
    $outputString .= "<div class='card-type-title-container'>";
    $outputString .=  "<p class='card-type-text'>$cardType</p>";
    $outputString .=  "</div>";
    $outputString .=  "<div class='card-type-setLogo-container'>";
    $outputString .=  "<img class='card-set-logo-image' src='./imgs/M15_setIcons/m15_setIcon_$setType.jpeg' alt='M15 $setType' >";
    $outputString .=  "</div>";
    $outputString .=  "</div>"; // End of card type container
    $outputString .=  "<div class='description-container'>";
    $outputString .=  "<span class='ability-cost-container'>";
    if($card_array['abilityCostGeneric'] != null) { //Logic goes here for ability costs / tap
        $outputString .=  "<img class='ability-cost ability-neutral' src='./imgs/manaCosts/mana_circle.png' alt='ability mana cost'>";
        $outputString .=  "<p class='ability-neutral-cost'>" . $card_array['abilityCostGeneric'] . "</p>";
    }
    if ($card_array['abilityCostGreen'] != null) {
        $outputString .= "<img class='ability-cost' src='./imgs/manaCosts/mana_g.png' alt='green ability mana cost'>";
    }
    if ($card_array['abilityCostRed'] != null) {
        $outputString .=  "<img class='ability-cost' src='./imgs/manaCosts/mana_r.png' alt='red ability mana cost'>";
    }
    if ($card_array['abilityCostBlue'] != null) {
        $outputString .=  "<img class='ability-cost' src='./imgs/manaCosts/mana_u.png' alt='blue ability mana cost'>";
    }
    if ($card_array['abilityCostBlack'] != null) {
        $outputString .=  "<img class='ability-cost' src='./imgs/manaCosts/mana_b.png.' alt='black ability mana cost'>";
    }
    if ($card_array['abilityCostWhite'] != null) {
        $outputString .=  "<img class='ability-cost' src='./imgs/manaCosts/mana_w.png' alt='white ability mana cost'>";
    }
    if ($card_array['abilityTap']) {
        $outputString .=  ", ";
        $outputString .= "<img class='ability-cost' src='./imgs/manaCosts/mana_t.png' alt='tap-icon'>";
        $outputString .=   ", ";
    }
    $outputString .=  "</span>";
    $outputString .=  "<div class='description-contents-container'>";
    if ($card_array['description'] != null) {
        $outputString .=  "<p>$description</p>";
    }
    if($card_array['designerFlavourText'] != null) {
        $outputString .=  "<p class='designer-text'>$flavorDesignerText</p>";
    }
    $outputString .= "</div>";
    $outputString .=  "</div>"; // End of description container.
    $outputString .=  "<div class='powerandtough-container'>";
    if($card_array['power'] and $card_array['toughness'] != null) {
        $outputString .=  "<p class='powerandtough'>$power/$toughness</p>";
    }
    $outputString .= "</div>"; // end of power and tough
    $outputString .=  "</div>";

    return $outputString;
}

