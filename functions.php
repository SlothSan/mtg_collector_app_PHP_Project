<?php

function checkSingleCardTitleInDb(string $cardTitle): array {
    $connectionString = 'mysql:host=db; dbname=mtg_cards';
    $dbUsername = 'root';
    $dbPassword = 'password';
    $db = new PDO ($connectionString, $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $queryString = 'SELECT * FROM `cards` WHERE ' . "`title` LIKE '%{$cardTitle}%'";
    $query = $db->prepare($queryString);
    $query->execute();
    $result = $query->fetch();
    return $result;

}