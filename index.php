<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Cinema</title>

    <link rel="stylesheet" href="style/style.css" />
  </head>
  <?php 
    // include "api/read.php";
    // require_once "install.php";
  ?>
  <body>
    <form method="post" action="">
      <label for="input">Input:</label>
      <input type="text" id="input" name="input">
      <input type="submit" value="Submit">
    </form>
  </body>

  <?php
    require_once "api/read.php";
  ?>

</html>