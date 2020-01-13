<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Error</title>
</head>


<body>
    <div class="container">
        <div class="box error">

            <h1>Login Failed</h1>

            <!-- ERROR -->
                <?php
                echo $_GET['error'];
                ?>

        </div>
    </div>
</body>

</html>