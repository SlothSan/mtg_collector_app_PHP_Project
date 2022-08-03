<?php

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
            };
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

