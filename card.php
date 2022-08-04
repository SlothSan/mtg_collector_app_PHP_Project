<?php
session_start();
require_once('functions.php');
if(isset($_POST['return'])) {
    unset($_POST['return']);
    header('Location: index.php');
}
?>

<html lang="en">
<head>
    <title>MTG Card Display Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="normalize.css" type="text/css" rel="stylesheet">
    <link href="styles.css" type="text/css" rel="stylesheet">
</head>
<body class="cardpage-body">
<div class="mtg-card-container">
    <div class="mtg-card-header">
        <h1 class="mtg-card-header-title">MTG Card Generator</h1>
        <p class="mtg-card-header-text">Takes the info from the DB and generates a card using PHP & CSS</p>
    </div>
    <?php echo createMTGCard(checkSingleCardAndGetAllInfo($_SESSION['createCard'])); ?>
    <form method="post">
        <button class="return-button" type='submit' value='return' name='return'>Go Back To Homepage</button>
    </form>
</div>
</body>
</html>