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
        <label for="membersFilter">Show just members</label>
        <input type="checkbox" name="membersFilter" id="membersFilter">
        <button type="submit">Valider</button>
    </form>
    <ul>
        <?php foreach ($members as $member):?>
            <?php if($membersFilter && $membersFilter == "on"): ?>
                <?php if(gettype($member["id_subscription"]) != NULL):?>
                    <div><?= $member["firstname"] . "-" . $member["lastname"]?><span>(----MEMBER)</span></div>
                <?php endif ?>
            <?php else: ?>
                <?php if(gettype($member["id_subscription"]) == "NULL"):?>
                    <div><?= $member["firstname"] . "-" . $member["lastname"] ?></div>
                <?php elseif(gettype($member["id_subscription"]) !== "NULL"): ?>
                    <div><?= $member["firstname"] . "-" . $member["lastname"]?><span>(----MEMBER)</span></div>
                <?php endif ?>
            <?php endif ?>
        <?php endforeach ?>
    </ul>
</body>
</html>