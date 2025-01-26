<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="form-members" action="" method="get">
        <label class="form-members__label" for="lastname">Lastname :</label>
        <input class="form-members__input" type="text" name="lastname" id="lastname">

        <label class="form-members__label" for="firstname">Firstname :</label>
        <input class="form-members__input" type="text" name="firstname" id="firstname">

        <button class="form-members__submit" type="submit">Valider</button>
    </form>
    <form class="form-reset" action="POST">
    <input class="form-reset__submit" type="submit" value="Delete filters">
</form>

    <ul class="members-list">
        <?php foreach($members as $member): ?>
            <li class="members-list__item">
                <a class="members-list__link" href="/member_details.php?id=<?php echo $member["userid"];?>">
                    <div class="members-list__info">
                        <?= $member["lastname"]."-".$member["firstname"] ?>
                        <span class="members-list__subscription"><?= $member["subscriptionName"] ? $member["subscriptionName"] : ""?></span>
                    </div>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</body>
</html>
