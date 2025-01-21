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
        $firstname = $_GET["firstname"];
        $lastname = $_GET["lastname"];
        $subscription = $_GET["subscription"];
        $id = $_GET["id"];
    ?>
        
    <div style="display: flex; justify-content: space-around; flex-wrap: wrap;">
        <div style="display: flex; align-items: flex-start; gap: 15px;">
            <img src="https://media.istockphoto.com/id/1214416600/photo/happy-rescued-sloth.jpg?s=612x612&w=0&k=20&c=Pa8lENkboBvXf6Kt7YvrxGyHlGHhQuQyYbP9ugRNer0=" alt="">
            <div>
                <h1><?php echo $lastname . " " . $firstname;?></h1>
                <?php if($subscription != ""): ?>
                    <div style="display: flex;">
                        <span>[<?php echo $subscription;?>]</span>
                        <form action="" method="POST">
                            <select name="" id="">
                                <option selected="selected">Change subscription</option>
                                <option value="">VIP</option>
                                <option value="">GOLD</option>
                                <option value="">CLASSIC</option>
                                <option value="">PASS DAY</option>
                                <option value="">DELETE</option>
                            </select>
                            <input type="submit" value="Change">
                        </form>
                    </div>
                <?php endif ?>
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