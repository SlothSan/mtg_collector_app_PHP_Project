<?php
session_start();
include_once('functions.php');
if(isset($_POST['return'])) {
    unset($_POST['return']);
    header('Location: index.php');
}
?>

<html>
<head>
    <title>MTG Card Display Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="normalize.css" type="text/css" rel="stylesheet">
    <link href="styles.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="mtg-card-container">
        <h1>MTG Card Generator</h1>
        <p>Takes the info from the DB and generates a card using PHP & CSS - Neat !</p>
        <?php createMTGCard(checkSingleCardAndGetAllInfo($_SESSION['createCard'])); ?>
    </div>
    <form method="post">
        <button type='submit' value='return' name='return'>Go Back To Homepage</button>
    </form>
</body>
</html>

