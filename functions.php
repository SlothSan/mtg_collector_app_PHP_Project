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

function createAllDisplayCards(array $results) {
    foreach ($results as $card) {
        echo "<div class='display-card'>";
            echo "<p>Card Title: ". $card['title'] . "</p>";
            echo "<p>Card Type: " . $card['cardType'] . "</p>";
            if($card['color'] === 'green') {
                echo "<p>Card Color: Green</p>";
            } else if ($card['color'] === 'black') {
                echo "<p>Card Color: Black</p>";
            } else if ($card['color'] === 'red') {
                echo "<p>Card Color: Red</p>";
            } else if ($card['color'] === 'blue') {
                echo "<p>Card Color: Blue</p>";
            } else if ($card['color'] === 'white') {
                echo "<p>Card Color: White</p>";
            }

            if ($card['raritySet'] === 'common') {
                echo "<p>Rarity: Common</p>";
            } else if ($card['raritySet'] === 'uncommon') {
                echo "<p>Rarity: Uncommon</p>";
            } else if ($card['raritySet'] === 'rare') {
                echo "<p>Rarity: Rare</p>";
            } else if ($card['raritySet'] === "mythicRare") {
                echo "<p>Rarity: Mythic Rare</p>";
            }
            echo "<form method='post'>";
                echo "<button class='view-card-button' type='submit' value='". $card['title'] . "' name='createCard'>View Card</button>";
            echo "</form>";
        echo "</div>";
    }
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
    $result = $query->fetchAll();
    return $result;

}

function createMTGCard(array $result) {
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

    echo "<div class='card-back-$color'>";
    echo "<div class='card-top-container'>";
    echo "<div class='card-title-container'>";
    echo "<p>$cardTitle</p>";
    echo "</div>";
    echo "<div class='mana-cost-container'>";
    echo "<div class='mana-cost-display-container'>";

        if($genericManaCost != null) {
            echo "<div class='mana-neutral-container'>";
                echo "<img class='mana-neutral' src='./imgs/manaCosts/mana_circle.png' alt='neutral mana'>";
                echo "<p class='mana-neutral-cost'>$genericManaCost</p>";
            echo "</div>";
        }
        if ($result['greenCost'] != null) {
            $counterGreen = $result['greenCost'];
            for ($counterGreen; $counterGreen > 0; $counterGreen--) {
                echo '<img class="mana-cost-color" src="./imgs/manaCosts/mana_g.png" alt="green mana">';
            }
        }
        if ($result['blackCost'] != null) {
            $counterBlack = $result['blackCost'];
            for ($counterBlack; $counterBlack > 0; $counterBlack--) {
                echo '<img class="mana-cost-color" src="./imgs/manaCosts/mana_b.png" alt="black mana">';
            }
        }
        if ($result['blueCost'] != null) {
            $counterBlue = $result['blueCost'];
            for ($counterBlue; $counterBlue > 0; $counterBlue--) {
                echo '<img class="mana-cost-color" src="./imgs/manaCosts/mana_u.png" alt="blue mana">';
            }
        }
        if ($result['redCost'] != null) {
            $counterRed = $result['redCost'];
            for ($counterRed; $counterRed > 0; $counterRed--) {
                echo '<img class="mana-cost-color" src="./imgs/manaCosts/mana_r.png" alt="red mana">';
            }
        }
        if ($result['whiteCost'] != null) {
            $counterWhite = $result['whiteCost'];
            for ($counterWhite; $counterWhite > 0; $counterWhite--) {
                echo '<img class="mana-cost-color" src="./imgs/manaCosts/mana_w.png" alt="white mana">';
            }
        }
    echo "</div>"; // Close mana-cost
    echo "</div>"; // Close Mana Container
    echo "</div>"; // Close Card Top Div
    echo "<div class='card-art-container''>";
        echo "<img class='card-art' src='./imgs/cardArt/$cardArt' alt='$cardTitle' >";
    echo "</div>"; //End of card art container
    echo "<div class='card-type-container'>";
        echo "<div class='card-type-title-container'>";
            echo "<p class='card-type-text'>$cardType</p>";
        echo "</div>";
        echo "<div class='card-type-setLogo-container'>";
            echo "<img class='card-set-logo-image' src='./imgs/M15_setIcons/m15_setIcon_$setType.jpeg' alt='M15 $setType' >";
        echo "</div>";
    echo "</div>"; // End of card type container
    echo "<div class='description-container'>";
        echo "<span class='ability-cost-container'>";
        if($result['abilityCostGeneric'] != null) { //Logic goes here for ability costs / tap
            echo "<img class='ability-cost ability-neutral' src='./imgs/manaCosts/mana_circle.png' alt='ability mana cost'>";
            echo "<p class='ability-neutral-cost'>" . $result['abilityCostGeneric'] . "</p>";
        }
        if ($result['abilityCostGreen'] != null) {
            echo "<img class='ability-cost' src='./imgs/manaCosts/mana_g.png' alt='green ability mana cost'>";
        }
        if ($result['abilityCostRed'] != null) {
            echo "<img class='ability-cost' src='./imgs/manaCosts/mana_r.png' alt='red ability mana cost'>";
        }
        if ($result['abilityCostBlue'] != null) {
            echo "<img class='ability-cost' src='./imgs/manaCosts/mana_u.png' alt='blue ability mana cost'>";
        }
        if ($result['abilityCostBlack'] != null) {
            echo "<img class='ability-cost' src='./imgs/manaCosts/mana_b.png.' alt='black ability mana cost'>";
        }
        if ($result['abilityCostWhite'] != null) {
            echo "<img class='ability-cost' src='./imgs/manaCosts/mana_w.png' alt='white ability mana cost'>";
        }
        if ($result['abilityTap']) {
            echo ", ";
            echo "<img class='ability-cost' src='./imgs/manaCosts/mana_t.png' alt='tap-icon'>";
            echo  ", ";
        }
        echo "</span>";
        echo "<div class='description-contents-container'>";
        if ($result['description'] != null) {
            echo "<p>$description</p>";
        }
        if($result['designerFlavourText'] != null) {
            echo "<p class='designer-text'>$flavorDesignerText</p>";
        }
        echo "</div>";
    echo "</div>"; // End of description container.
        echo "<div class='powerandtough-container'>";
        if($result['power'] or $result['toughness'] != null) {
            echo "<p class='powerandtough'>$power/$toughness</p>";
        }
    echo "</div>"; // end of power and tough
    echo "</div>";
}