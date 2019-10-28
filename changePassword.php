<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");
    session_start();

    $user = $_SESSION['user'];

    $currentPassword = $_POST['current'];
    $newPassword = $_POST['new'];

    $sql = "select password from users where email='{" . $user . "}'";
    $statement = $db->prepare($sql);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $row = $statement->fetch();
        $pass = substr($row[0], 1, strlen($row[0]) - 2);
        if (password_verify($currentPassword, $pass)) {
            $statement->closeCursor();
            $query = "UPDATE users SET password=:pwd WHERE user=:userName";
            $statement = $db->prepare($query);
            $statement->bindValue(':userName', $user);
            $statement->bindValue(':pwd', password_hash($newPassword, PASSWORD_BCRYPT));
            $statement->execute();
            $statement->closeCursor();
            echo "success";
        } else {
            echo "failed";
        }
    } else {
        echo "no user";
    }
}
