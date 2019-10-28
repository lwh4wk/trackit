<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");
    $user = htmlspecialchars($_POST['emailInput']);

    $query = "SELECT * FROM users WHERE email='{" . $user . "}'";
    $statement = $db->prepare($query);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        echo "false";
        $statement->closeCursor();
    }
    else {
        echo "true";
        $statement->closeCursor();
    }
}