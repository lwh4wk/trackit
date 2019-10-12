<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");
    $email = htmlspecialchars($_POST['emailInput']);
    $pwd = password_hash(htmlspecialchars($_POST['passwordInput']), PASSWORD_BCRYPT);

    $sql = "SELECT password FROM users WHERE email=\"$email\"";
    $statement = $db->prepare($sql);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $row = $statement->fetch();
        if (password_verify($pwd,$row[0])) {
            $statement->closeCursor();

            session_start();

            $_SESSION['user'] = $email;

            $_SESSION['time'] = $_SERVER['REQUEST_TIME'];

            $sql = "SELECT fname FROM users WHERE email=\"$email\"";
            $statement = $db->prepare($sql);
            $statement->execute();
            $row = $statement->fetch();
            print_r($db->errorInfo());
            //echo "true";
        }
        else {
            echo "<div style=\"padding-top: 3%;\"><p class='alert alert-danger'>Username and password do not match our record.</p></div> <br/>";
            $statement->closeCursor();
        }
    }
    else {
        echo "<div style=\"padding-top: 3%;\"><p class='alert alert-danger'>There is no account associated with this email.</p></div> <br/>";
        $statement->closeCursor();
    }
}