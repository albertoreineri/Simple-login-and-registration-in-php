<?php
define("PAGE", "Login");
include("layouts/header.php");
?>

<div class="container">
  <div class="box">

    <?php
    if (isset($_GET['user']) && $_GET['user'] == 'yes') {
    ?>
      <div class="box welcome">
        <h1>New user created!</h1>
        <p>Now you can Log In</p>
      </div>
    <?php
    }
    ?>

    <h1>Simple php login</h1>

    <!-- Login form -->
    <form class="" action="utility/login.php" method="POST">

      <!-- Action -->
      <input type="hidden" name="action" value="login">

      <!-- Email or Username -->
      <label for="email">Email or Username</label>
      <input autofocus name="email" type="text">

      <!-- Password -->
      <label for="password">Password</label>
      <input name="password" id="password" placeholder="" type="password">

      <!-- Login Button -->
      <button type="submit">Login</button>

    </form>
    <!-- /Login form -->

  </div>
</div>

<?php
include("layouts/footer.php");
?>