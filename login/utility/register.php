<?php
//Config File
include("config.php");

/*------------------------------------------------------
                    REGISTER
-------------------------------------------------------*/
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

//Control if the user or email are already in the database
$q = $dbh->prepare("SELECT * FROM users WHERE email = :email OR username =:username");
$q->bindParam(':email', $email);
$q->bindParam(':username', $username);
$q->execute(); // eseguo la query
$q->setFetchMode(PDO::FETCH_ASSOC);
$rows = $q->rowCount();
if ($rows > 0) {
    while ($row = $q->fetch()) {
        header("location: ../error.php?error=Email or Username already register!");
        die();
    }
}

//Insert new user in DB
$password = password_hash($password, PASSWORD_DEFAULT);
$q = $dbh->prepare("INSERT INTO users (username,email,password) 
    VALUES (
    :username, 
    :email, 
    :password
    )");
$q->bindParam(':username', $username);
$q->bindParam(':email', $email);
$q->bindParam(':password', $password);
$res = $q->execute(); // eseguo la query

if ($res) {
    header("location: ../index.php?user=yes");
} else {
    header("location: ../error.php?error=" . $conn->error);
}
