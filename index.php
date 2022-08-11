<?php
session_start();
require_once('./functions.php');
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
        <link href="./normalize.css" type="text/css" rel="stylesheet">
        <link href="./styles.css" type="text/css" rel="stylesheet">
        <title>MTG Card Collector - PHP Project - iO Academy.</title>
    </head>
    <body>
        <header>
            <div class="header-container">
                <h1 class="header-title">MTG Card Collector App</h1>
                <p class="header-intro-text">Created by Mike O for the Full Stack Track Course at iO Academy.</p>
            </div>
        </header>
        <section class="project-blurb-section">
            <div class="project-blurb-container">
                <p class="project-blurb-text">This is a project to showcase my PHP, CSS and SQL skills learnt at iO Academy.</p>
                <p class="project-blurb-text">There is a DB that holds Magic The Gathering Cards. They are all displayed below.</p>
            </div>
        </section>
        <section class="registration-section">
            <div class="registration-container">
                <p>Click the link below to be taken to a page to add a card to the collection !</p>
                <a href="createcard.php">Create a Card !</a>
            </div>
        </section>
        <section class="cardDisplay-container">
            <?php  echo createAllDisplayCards(getAllCardsFromDb()); ?>
        </section>
    </body>
</html>
