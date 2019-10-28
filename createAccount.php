<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require("dbconnect.php");
    $email = htmlspecialchars($_POST['emailInput']);
    $pwd = password_hash(htmlspecialchars($_POST['passwordInput']), PASSWORD_BCRYPT);
    $fname = htmlspecialchars($_POST['firstNameInput']);
    $lname = htmlspecialchars($_POST['lastNameInput']);
    $city = htmlspecialchars($_POST['city']);
    $streetAddress = htmlspecialchars($_POST['streetAddress']);
    $state = htmlspecialchars($_POST['state']);
    $zipcode = htmlspecialchars($_POST['zipcode']);

    $query = "INSERT INTO users (email, password, fname, lname, street, city, state, zipcode) VALUES (:email, :pwd, :fname, :lname, :streetAddress, :city, :state, :zipcode)";
    $statement = $db->prepare($query);
    $statement->bindValue(":email", "{" . $email . "}");
    $statement->bindValue(":pwd", "{" . $pwd . "}");
    $statement->bindValue(":fname", "{" . $fname . "}");
    $statement->bindValue(":lname", "{" . $lname . "}");
    $statement->bindValue(":streetAddress", "{" . $streetAddress . "}");
    $statement->bindValue(":city", "{" . $city . "}");
    $statement->bindValue(":state", "{" . $state . "}");
    $statement->bindValue(":zipcode", intval($zipcode));
    $statement->execute();
    $statement->closeCursor();

    session_start();
    $_SESSION['user'] = $email;

    require("sendSignupEmail.php");

} else {
    echo "test";
}
