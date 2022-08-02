<?php
session_start();
if(isset($_POST['return'])) {
    unset($_POST['return']);
    header('Location: index.php');
}
echo "Hello You Are On The Card Page !";
print_r($_SESSION);
?>

<html>
<head>
    <title>MTG Card Display Page</title>
</head>
<body>
    <form method="post">
        <button type='submit' value='return' name='return'>Go Back To Homepage</button>
    </form>
</body>
</html>


