<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/members.css" />
    <title>Members</title>
</head>
<body>
    <?php 
        require_once "../views/templates/header.php";
        require_once "../controllers/cntrl_members.php";
      
        showUsers();
    ?>
</body>
</html>