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
        $cardString = "<div class='display-card'>";
        $cardString .= "<p>Card Title: ". $card['title'] . "</p>";
        $cardString .= "<p>Card Type: " . $card['cardType'] . "</p>";
        $cardString .= "<p>Card Color: " . $card['color'] . "</p>";
        $cardString .= "<p>Rarity: " . $card['raritySet'] . "</p>";
        $cardString .= "</div>";
        $outputString .=  $cardString;
    }
 return $outputString;
}

function getAllCardsFromDb(): array {
    $connectionString = 'mysql:host=db; dbname=mtg_cards';
    $dbUsername = 'root';
    $dbPassword = 'password';
    $db = new PDO($connectionString, $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $queryString = 'SELECT * FROM `cards`';
    $query = $db->prepare($queryString);
    $query->execute();
    return $query->fetchAll();
}

