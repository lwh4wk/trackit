<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");
    $email = htmlspecialchars($_POST['emailInput']);
    $pwd = htmlspecialchars($_POST['passwordInput']);

    $sql = "SELECT password FROM users WHERE email='{" . $email . "}'";
    $statement = $db->prepare($sql);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $row = $statement->fetch();
        $pass = substr($row[0], 1, strlen($row[0]) - 2);
        if (password_verify($pwd,$pass)) {
            $statement->closeCursor();

            session_start();

            $_SESSION['user'] = $email;

            $_SESSION['time'] = $_SERVER['REQUEST_TIME'];
            echo "<div class=\"form-group col-12\" style='padding-top: 3%;'>
                    <span>
                        <div class=\"alert alert-success\" role=\"alert\">Successfully Logged In.</div>
                    </span>
                    </div>";
        }
        else {
            echo "<div style=\"padding-top: 3%;\"><p class='alert alert-danger'>Username and password do not match our record.</p></div> <br/>";
            $statement->closeCursor();
        }
    }
    else {
        echo "<div style=\"padding-top: 3%;\"><p class='alert alert-danger'>There is no account associated with this email, please <a href='signup.html'>create an account</a>.</p></div> <br/>";
        $statement->closeCursor();
    }
}