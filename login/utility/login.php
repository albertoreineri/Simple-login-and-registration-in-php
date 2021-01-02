<?php
//Config File
include("config.php");

/*------------------------------------------------------
                    LOGIN
-------------------------------------------------------*/
///$_Post variables
$email = $_POST['email'];
$password = $_POST['password'];

//Query
$q = $dbh->prepare("SELECT * FROM users WHERE email = :email OR username =:email");
$q->bindParam(':email', $email);
$q->execute(); // eseguo la query
$q->setFetchMode(PDO::FETCH_ASSOC);
$rows = $q->rowCount();
if ($rows > 0) {
    while ($row = $q->fetch()) {

        //Password control
        if (!(password_verify($password, $row["password"]))) {
            header("location: ../error.php?error=Wrong Password");
            die();
        }

        //Start Session
        session_start();

        //Save user id in session
        $_SESSION['id'] = $row["id"];

        //Redirect to backend homepage
        header("location: ../welcome.php");
        die();
    }
} else {
    header("location: ../error.php?error=Wrong Email or Username");
    die();
}
