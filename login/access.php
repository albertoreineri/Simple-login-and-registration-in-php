<?php
//Config File
include("config.php");

//Control Action
if ($_POST['action'] == "login") {
    /*------------------------------------------------------
                        LOGIN
    -------------------------------------------------------*/
    ///$_Post variables
    $email = $_POST['email'];
    $password = $_POST['password'];


    //Query
    $sql = "SELECT * FROM users WHERE email = '" . $email . "' OR username ='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            //Password control
            if (!(password_verify($password, $row["password"]))) {
                header("location: error.php?error=Wrong Password");
                die();
            }

            //Start Session
            session_start();

            //Save user id in session
            $_SESSION['id'] = $row["id"];

            //Redirect to backend homepage
            header("location: welcome.php");
            die();
        }
    } else {
        header("location: error.php?error=Wrong Email or Username");
        die();
    }
} elseif ($_POST['action'] == "register") {
     /*------------------------------------------------------
                        REGISTER
    -------------------------------------------------------*/
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Control if the user or email are already in the database
    $sql = "SELECT * FROM users WHERE email = '" . $email . "' OR username = '" . $username . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            header("location: error.php?error=Email or Username already register!");
        }
    }


    //Insert new user in DB
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username,email,password) 
    VALUES (
    '" . $username . "', 
    '" . $email . "', 
    '" . $password . "'
    )";
    if ($conn->query($sql) === TRUE) {       
        header("location: index.php");
    } else {
        header("location: error.php?error=" . $conn->error);
    }
}
$conn->close();
