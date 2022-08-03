<?php

function addCardToDb(array $card) {
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

    $connectionString = 'mysql:host=db; dbname=mtg_cards';
    $dbUsername = 'root';
    $dbPassword = 'password';
    $db = new PDO($connectionString, $dbUsername, $dbPassword);
    $queryString = 'INSERT INTO  `cards` (`title`, `cardType`, `color`, `raritySet`, `genericCost`, `greenCost`, `blackCost`, `blueCost`, 
                      `redCost`, `whiteCost`)
	VALUES (:title, :cardType, :color, :raritySet, :genericCost, :greenCost, :blackCost, :blueCost, :redCost, :whiteCost)';
    $query = $db->prepare($queryString);
    $query->execute(['title' => $title, 'cardType' => $cardType, 'color' => $color, 'raritySet' => $raritySet, 'genericCost' => $genericCost,
    'greenCost' => $greenCost, 'blackCost' => $blackCost, 'blueCost' => $blueCost, 'redCost' => $redCost, 'whiteCost' => $whiteCost]);

}

function checkIfNull($toBeChecked) {
    if ($toBeChecked === 'null') {
        return null;
    } else {
        return intval($toBeChecked);
    }
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

