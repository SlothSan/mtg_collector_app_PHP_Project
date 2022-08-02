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
    echo "<div class='card-back-$color'>";
    echo "</div>";
}