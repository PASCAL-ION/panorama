<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label for="lastname">Lastname :</label>
        <input type="text" name="lastname" id="lastname">

        <label for="firstname">Firstname :</label>
        <input type="text" name="firstname" id="firstname">


        <button type="submit">Valider</button>
    </form>
    <ul>
        <?php foreach($members as $member): ?>
            <?php echo $member["subscriptionPlan"];?>
            <li>
                <a href="/member_details.php?id=<?php echo $member["userid"];?>&subscription=<?php echo $member["subscriptionPlan"];?>&firstname=<?php echo $member["firstname"];?>&lastname=<?php echo $member["lastname"];?>">
                <div>
                    <?= $member["lastname"]."-".$member["firstname"] ?>
                    <span class="subscription"><?= $member["subscriptionPlan"] ? $member["subscriptionPlan"] : ""?></span>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
</body>
</html>




