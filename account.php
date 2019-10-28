<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require("dbconnect.php");
    session_start();
    $user = $_SESSION["user"];

    $sql = "SELECT * FROM users WHERE email='{" . $user . "}'";
    $statement = $db->prepare($sql);
    $statement->execute();

    $result = "";
    if ($statement->rowCount() > 0) {
        $accountInfo = $statement->fetchAll();
        foreach ($accountInfo as $row) {
            $result .= $row[0] . "^";
            $result .= $row[2] . "^";
            $result .= $row[3] . "^";
            $result .= $row[4] . "^";
            $result .= $row[5] . "^";
            $result .= $row[6] . "^";
            $result .= $row[7];

        }
    }
    $statement->closeCursor();
    echo $result;

}