<?php


function checkSingleCardAndGetAllInfo(string $cardTitle): array {
    $connectionString = 'mysql:host=db; dbname=mtg_cards';
    $dbUsername = 'root';
    $dbPassword = 'password';
    $db = new PDO ($connectionString, $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $queryString = "SELECT * FROM `cards` WHERE `title` LIKE '$cardTitle'";
    $query = $db->prepare($queryString);
    $query->execute();
    return $result = $query->fetch();
}

function createAllDisplayCards(array $results): string {
    $outputString = '';


    foreach ($results as $card) {
        if (!is_array($card) ||
            !array_key_exists('title', $card) ||
            !array_key_exists('cardType', $card) ||
            !array_key_exists('color', $card) ||
            !array_key_exists('raritySet', $card)) {
            return '';
        }
        $returnString = '';
        $returnString .=  "<div class='display-card'>";
        $returnString .= "<p>Card Title: ". $card['title'] . "</p>";
        $returnString .= "<p>Card Type: " . $card['cardType'] . "</p>";
            if($card['color'] === 'green') {
                $returnString .= "<p>Card Color: Green</p>";
            } else if ($card['color'] === 'black') {
                $returnString .= "<p>Card Color: Black</p>";
            } else if ($card['color'] === 'red') {
                $returnString .= "<p>Card Color: Red</p>";
            } else if ($card['color'] === 'blue') {
                $returnString .= "<p>Card Color: Blue</p>";
            } else if ($card['color'] === 'white') {
                $returnString .= "<p>Card Color: White</p>";
            }

            if ($card['raritySet'] === 'common') {
                $returnString .= "<p>Rarity: Common</p>";
            } else if ($card['raritySet'] === 'uncommon') {
                $returnString .= "<p>Rarity: Uncommon</p>";
            } else if ($card['raritySet'] === 'rare') {
                $returnString .=  "<p>Rarity: Rare</p>";
            } else if ($card['raritySet'] === "mythicRare") {
                $returnString .=  "<p>Rarity: Mythic Rare</p>";
            }
            $returnString .= "<form method='post'>";
                $returnString .= "<button class='view-card-button' type='submit' value='". $card['title'] . "' name='createCard'>View Card</button>";
            $returnString .= "</form>";
        $returnString .= "</div>";
        $outputString .=  $returnString;
    }
 return $outputString;
}

function checkAllCards(): array {
    $connectionString = 'mysql:host=db; dbname=mtg_cards';
    $dbUsername = 'root';
    $dbPassword = 'password';
    $db = new PDO ($connectionString, $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $queryString = 'SELECT * FROM `cards`';
    $query = $db->prepare($queryString);
    $query->execute();
    return $result = $query->fetchAll();
}

function createMTGCard(array $result): string {
    if (!array_key_exists('color', $result) ||
        !array_key_exists('title', $result) ||
        !array_key_exists('genericCost', $result) ||
        !array_key_exists('greenCost', $result) ||
        !array_key_exists('blackCost', $result) ||
        !array_key_exists('blueCost', $result) ||
        !array_key_exists('redCost', $result) ||
        !array_key_exists('whiteCost', $result) ||
        !array_key_exists('cardArt', $result) ||
        !array_key_exists('cardType', $result) ||
        !array_key_exists('setType', $result) ||
        !array_key_exists('raritySet', $result) ||
        !array_key_exists('abilityCostGeneric', $result) ||
        !array_key_exists('abilityCostGreen', $result) ||
        !array_key_exists('abilityCostRed', $result) ||
        !array_key_exists('abilityCostBlue', $result) ||
        !array_key_exists('abilityCostBlack', $result) ||
        !array_key_exists('abilityCostWhite', $result) ||
        !array_key_exists('abilityTap', $result) ||
        !array_key_exists('description', $result) ||
        !array_key_exists('designerFlavourText', $result) ||
        !array_key_exists('power', $result) ||
        !array_key_exists('toughness', $result)) {
        return '';
    }

    $color = $result['color'];
    $cardTitle = $result['title'];
    $genericManaCost = $result['genericCost'];
    $cardArt = $result['cardArt'];
    $cardType = $result['cardType'];
    $setType = $result['raritySet'];
    $description = $result['description'];
    $flavorDesignerText = $result['designerFlavourText'];
    $power = $result['power'];
    $toughness = $result['toughness'];
    $outputString = '';
    $outputString .=  "<div class='card-back-$color'>";
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
        if ($result['greenCost'] != null) {
            $counterGreen = $result['greenCost'];
            for ($counterGreen; $counterGreen > 0; $counterGreen--) {
                $outputString .= "<img class='mana-cost-color' src='./imgs/manaCosts/mana_g.png' alt='green mana'>";
            }
        }
        if ($result['blackCost'] != null) {
            $counterBlack = $result['blackCost'];
            for ($counterBlack; $counterBlack > 0; $counterBlack--) {
                $outputString .= "<img class='mana-cost-color' src='./imgs/manaCosts/mana_b.png' alt='black mana'>";
            }
        }
        if ($result['blueCost'] != null) {
            $counterBlue = $result['blueCost'];
            for ($counterBlue; $counterBlue > 0; $counterBlue--) {
                $outputString .= "<img class='mana-cost-color' src='./imgs/manaCosts/mana_u.png' alt='blue mana'>";
            }
        }
        if ($result['redCost'] != null) {
            $counterRed = $result['redCost'];
            for ($counterRed; $counterRed > 0; $counterRed--) {
                $outputString .= "<img class='mana-cost-color' src='./imgs/manaCosts/mana_r.png' alt='red mana'>";
            }
        }
        if ($result['whiteCost'] != null) {
            $counterWhite = $result['whiteCost'];
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
        if($result['abilityCostGeneric'] != null) { //Logic goes here for ability costs / tap
            $outputString .=  "<img class='ability-cost ability-neutral' src='./imgs/manaCosts/mana_circle.png' alt='ability mana cost'>";
            $outputString .=  "<p class='ability-neutral-cost'>" . $result['abilityCostGeneric'] . "</p>";
        }
        if ($result['abilityCostGreen'] != null) {
            $outputString .= "<img class='ability-cost' src='./imgs/manaCosts/mana_g.png' alt='green ability mana cost'>";
        }
        if ($result['abilityCostRed'] != null) {
            $outputString .=  "<img class='ability-cost' src='./imgs/manaCosts/mana_r.png' alt='red ability mana cost'>";
        }
        if ($result['abilityCostBlue'] != null) {
            $outputString .=  "<img class='ability-cost' src='./imgs/manaCosts/mana_u.png' alt='blue ability mana cost'>";
        }
        if ($result['abilityCostBlack'] != null) {
            $outputString .=  "<img class='ability-cost' src='./imgs/manaCosts/mana_b.png.' alt='black ability mana cost'>";
        }
        if ($result['abilityCostWhite'] != null) {
            $outputString .=  "<img class='ability-cost' src='./imgs/manaCosts/mana_w.png' alt='white ability mana cost'>";
        }
        if ($result['abilityTap']) {
            $outputString .=  ", ";
            $outputString .= "<img class='ability-cost' src='./imgs/manaCosts/mana_t.png' alt='tap-icon'>";
            $outputString .=   ", ";
        }
        $outputString .=  "</span>";
        $outputString .=  "<div class='description-contents-container'>";
        if ($result['description'] != null) {
            $outputString .=  "<p>$description</p>";
        }
        if($result['designerFlavourText'] != null) {
            $outputString .=  "<p class='designer-text'>$flavorDesignerText</p>";
        }
        $outputString .= "</div>";
    $outputString .=  "</div>"; // End of description container.
        $outputString .=  "<div class='powerandtough-container'>";
        if($result['power'] and $result['toughness'] != null) {
            $outputString .=  "<p class='powerandtough'>$power/$toughness</p>";
        }
    $outputString .= "</div>"; // end of power and tough
    $outputString .=  "</div>";

    return $outputString;
}