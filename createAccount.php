<?php

if (!_server['REQUEST_METHOD'] == 'POST'){
    require("dbconnect.php");
    $email = htmlspecialchars($_POST['emailInput']);
    $pwd = htmlspecialchars($_POST['passwordInput']);
    $fname = htmlspecialchars($_POST['firstNameInput']);
    $lname = htmlspecialchars($_POST['lastNameInput']);
    $streetAddress = htmlspecialchars($_POST['streetAddress']);
    $state = htmlspecialchars($_POST['state']);
    $zipcode = htmlspecialchars($_POST['zipcode']);

    $query = "INSERT INTO users (email, password, fname, lname, street, state, zipcode) VALUES (:email, :pwd, :fname, :lname, :streetAddress, :state, :zipcode)";
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":pwd", $pwd);
    $statement->bindValue(":fname", $fname);
    $statement->bindValue(":lname", $lname);
    $statement->bindValue(":streetAddress", $streetAddress);
    $statement->bindValue(":state", $state);
    $statement->bindValue(":zipcode", $zipcode);
    $statement->execute();
    $statement->closeCursor();

    session_start();
    $_SESSION['user'];

}

?>
