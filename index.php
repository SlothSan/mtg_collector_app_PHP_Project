<?php
session_start();
require_once('functions.php');
if(isset($_POST['createCard'])) {
    $_SESSION['createCard'] = $_POST['createCard'];
    header('Location: card.php');
}
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="keywords" content="'Mike Oram', PHP, CSS, Magic The Gathering">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Mike Oram's PHP Collectors App">
        <link href="normalize.css" type="text/css" rel="stylesheet">
        <link href="styles.css" type="text/css" rel="stylesheet">
        <title>MTG Card Collector - PHP Project - iO Academy.</title>
    </head>
    <body>
        <header class="header-container">
            <h1>MTG Card Collector App</h1>
            <p>Created by Mike O for the Full Stack Track Course at iO Academy.</p>
        </header>
        <section class="project-blurb-container">
            <p>This is a project to showcase my PHP, CSS and SQL skills learnt at iO Academy.</p>
            <p>There is a DB that holds Magic The Gathering Cards, you can query it with the search below, add new cards using the submit button,
                or view all cards in the table below the submit button - Neat !</p>
        </section>
        <section class="cardDisplay-container">
            <?php createAllDisplayCards(checkAllCards()); ?>
        </section>
    </body>
</html>
