<?php
session_start();
require_once('functions.php');
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="'Mike Oram', PHP, CSS, Magic The Gathering">
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
        <section class="addCard-container">
            <p>Click below to be redirected to the page to create your own card!!!</p>
            <form method="post">
                <input type="button" value="Add a Card!" name="addCard">
            </form>
        </section>
        <section class="cardSearch-container">
            <p>Use the search below to find a specific card</p>
            <form method="post">
                <label>Enter Card Title</label>
                <input type="text" name="cardTitle" placeholder="Enter a card title !">
                <input type="submit" value="Find Card !">
            </form>
            <div> <!--For Testing only remove when ready-->
                <?php
                    if(isset($_POST['cardTitle'])) {
                        createSingleDisplayCard(checkSingleCardTitleInDb($_POST['cardTitle']));
                    }
                    ?>
            </div>
        </section>
        <section class="cardDisplay-container">

        </section>
    </body>
</html>
