<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Login</title>
</head>


<body>
  <div class="container">
    <div class="box">

      <h1>Simple php login</h1>

      <!-- Login form -->
      <form class="" action="access.php" method="POST">

        <!-- Action -->
        <input type="hidden" name="action" value="login">

        <!-- Email or Username -->
        <label for="email">Email or Username</label>
        <input autofocus name="email" type="text">

        <!-- Password -->
        <label for="password">Password</label>
        <input name="password" id="password" placeholder="" type="password">

        <!-- Login Button -->
        <button class="btn btn-primary btn-lg" type="submit">Login</button>

      </form>
      <!-- /Login form -->

    </div>
  </div>
</body>

</html>