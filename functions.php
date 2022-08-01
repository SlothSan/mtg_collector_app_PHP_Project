<?php

function checkSingleCardTitleInDb(string $cardTitle): array {
    $connectionString = 'mysql:host=db; dbname=mtg_cards';
    $dbUsername = 'root';
    $dbPassword = 'password';
    $db = new PDO ($connectionString, $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $queryString = 'SELECT `title`, `color`, `raritySet` FROM `cards` WHERE ' . "`title` LIKE '%{$cardTitle}%'";
    $query = $db->prepare($queryString);
    $query->execute();
    $result = $query->fetch();
    return $result;
}

function createSingleDisplayCard(array $result) {
    echo "<div>";
        echo "<p>Card Title: " . $result['title'] . "</p>";
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
    echo"</div>";
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
    $result = $query->fetch();
    return $result;

}