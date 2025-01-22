<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $subscription = $_GET["subscription"];
        $subscriptionId = $_GET["subscriptionId"];
        $firstname = $_GET["firstname"];
        $lastname = $_GET["lastname"];
        $id = $_GET["id"];
    ?>

    <div style="display: flex; justify-content: space-around; flex-wrap: wrap;">
        <div style="display: flex; align-items: flex-start; gap: 15px;">
            <img src="https://media.istockphoto.com/id/1214416600/photo/happy-rescued-sloth.jpg?s=612x612&w=0&k=20&c=Pa8lENkboBvXf6Kt7YvrxGyHlGHhQuQyYbP9ugRNer0=" alt="">
            <div>
                <h1><?php echo $lastname . " " . $firstname;?></h1>
                <div style="display: flex;">
                        <form action="?subscription=<?php echo htmlspecialchars($subscription); ?>&firstname=<?php echo htmlspecialchars($firstname); ?>&lastname=<?php echo htmlspecialchars($lastname); ?>&id=<?php echo htmlspecialchars($id); ?>&subscriptionId=<?php echo htmlspecialchars($subscriptionId); ?>" method="GET">
                            <input type="hidden" name="subscription" value="<?php echo htmlspecialchars($subscription); ?>">
                            <input type="hidden" name="subscriptionId" value="<?php echo htmlspecialchars($subscriptionId); ?>">
                            <input type="hidden" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>">
                            <input type="hidden" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                            <select name="subscription_select" id="">
                                <option <?= (!$subscription ? 'selected="selected"': '')?>>No subscription</option>
                                <option value="1" <?= ($subscriptionId == "1" ? 'selected="selected"': '')?>>VIP</option>
                                <option value="2" <?= ($subscriptionId == "2" ? 'selected="selected"': '')?>>GOLD</option>
                                <option value="3" <?= ($subscriptionId == "3" ? 'selected="selected"': '')?>>CLASSIC</option>
                                <option value="4" <?= ($subscriptionId == "4" ? 'selected="selected"': '')?>>PASS DAY</option>
                                <option value="DELETE">DELETE</option>
                            </select>
                            <input type="submit" value="Change">
                        </form>
                    </div>
            </div>
        </div>
        <?php if(count($movieHistory) > 0): ?>
            <div>
                <div style="display: flex; flex-direction: column; align-items: center; gap: 20px;">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <h2>History</h2>
                        <form action="" method="get">
                            <button type="submit">Add to history</button>
                        </form>
                    </div>
                    <table>
                        <tr>
                            <th>Movie</th>
                            <th>Date</th>
                            <th>Room</th>
                        </tr>
                        <?php foreach($movieHistory as $row): ?>
                            <tr style="text-align: center;">
                                <td><?= $row["movie_title"];?></td>
                                <td><?= $row["date_begin"];?></td>
                                <td><?= $row["room"];?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        <?php endif ?>
    </div>
    
</body>
</html>