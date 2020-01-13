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
$sql = "SELECT * FROM utenti WHERE email = '" . $email . "' OR user ='" . $email . "'";
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
$conn->close();
