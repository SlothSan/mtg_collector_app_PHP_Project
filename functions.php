<?php

function checkSingleCardTitleInDb(string $cardTitle): array {
    $connectionString = 'mysql:host=db; dbname=mtg_cards';
    $dbUsername = 'root';
    $dbPassword = 'password';
    $db = new PDO ($connectionString, $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $queryString = 'SELECT `title`, `color`, `cardType`, `raritySet` FROM `cards` WHERE ' . "`title` LIKE '%{$cardTitle}%'";
    $query = $db->prepare($queryString);
    $query->execute();
    return $result = $query->fetch();
}

function checkSingleCardAndGetAllInfo(string $cardTitle) {
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

function createSingleDisplayCard(array $result) {
    echo "<div>";
        echo "<p>Card Title: " . $result['title'] . "</p>";
        echo "<p>Card Type: " . $result['cardType'] . "</p>";
        if($result['color'] === 'green') {
            echo "<p>Card Color: Green</p>";
        } else if ($result['color'] === 'black') {
            echo "<p>Card Color: Black</p>";
        } else if ($result['color'] === 'red') {
            echo "<p>Card Color: Red</p>";
        } else if ($result['color'] === 'blue') {
            echo "<p>Card Color: Blue</p>";
        } else if ($result['color'] === 'white') {
            echo "<p>Card Color: White</p>";
        }

        if ($result['raritySet'] === 'common') {
            echo "<p>Rarity: Common</p>";
        } else if ($result['raritySet'] === 'uncommon') {
            echo "<p>Rarity: Uncommon</p>";
        } else if ($result['raritySet'] === 'rare') {
            echo "<p>Rarity: Rare</p>";
        } else if ($result['raritySet'] === "mythicRare") {
            echo "<p>Rarity: Mythic Rare</p>";
        }

        echo "<form method='post'>";
        echo "<button type='submit' value='". $result['title'] . "' name='createCard'>Create Card!!!</button>";
        echo "</form>";
    echo"</div>";
}

function createAllDisplayCards(array $results) {
    foreach ($results as $card) {
        echo "<div>";
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
                echo "<button type='submit' value='". $card['title'] . "' name='createCard'>Create Card!!!</button>";
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
    echo "<div class='card-back-$color'>";
    echo "<div class='card-top-container'>";
    echo "<div class='card-title-container'>";
    echo "<p>$cardTitle</p>";
    echo "</div>";
    echo "<div class='mana-cost-container'>";
    echo "<div class='mana-cost'>";

        if($genericManaCost != null) {
            echo "<img class='mana-neutral' src='./imgs/manaCosts/mana_circle.png' alt='neutral mana'>";
            echo "<p class='mana-neutral-cost'>$genericManaCost</p>";
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
    echo "</div>";
}