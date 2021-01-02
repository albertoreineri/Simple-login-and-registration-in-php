<?php
define("PAGE", "Register");
include("layouts/header.php");
?>

<div class="container">
    <div class="box">

        <h1>Register New User</h1>

        <!-- Login form -->
        <form class="" action="utility/register.php" method="POST">

            <!-- Action -->
            <input type="hidden" name="action" value="register">

            <!-- Username -->
            <label for="username">Username</label>
            <input autofocus name="username" type="text">

            <!-- Email -->
            <label for="email">Email </label>
            <input autofocus name="email" type="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}">

            <!-- Password -->
            <label for="password">Password</label>
            <input name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="" type="password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

            <!-- Login Button -->
            <button type="submit">Register</button>

        </form>
        <!-- /Login form -->

    </div>
</div>

<?php
include("layouts/footer.php");
?>