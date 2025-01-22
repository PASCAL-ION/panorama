<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css" />
    <title>Member Details</title>
</head>
<body>
    <?php
        require_once "../controllers/cntrl_member_details.php";
        userHistory();
        changeSubscription();
    ?>
</body>
</html>