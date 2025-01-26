<body>
    <?php require_once "templates/header.php" ?>
    <div class="member-details">
        <div class="member-details__profile">
            <img class="member-details__profile-image" alt="photo d'un paresseux" src="https://fac.img.pmdstatic.net/fit/~1~fac~2022~08~11~c3c7eb0b-7262-4ad3-9faf-8c11233f75ea.jpeg/1200x1200/quality/80/crop-from/center/4-infos-insolites-sur-le-paresseux.jpeg" alt="Profile Picture">
            <div class="member-details__info">
                <h1 class="member-details__name"><?php echo htmlspecialchars($userData[0]['lastname']) . " " . htmlspecialchars($userData[0]['firstname']); ?></h1>
                <p class="member-details__subscription">Actual subscription : 
                    <?php if($memberData['subscriptionId'] == 1): ?>
                        VIP
                    <?php elseif($memberData['subscriptionId'] == 2):?>
                        GOLD
                    <?php elseif($memberData['subscriptionId'] == 3):?>
                        Classic
                    <?php elseif($memberData['subscriptionId'] == 4):?>
                        Day Pass
                    <?php else:?>
                        No Subscription
                    <?php endif ?>
                </p>
                <form class="form-subscription" method="POST" action="">
                    <label class="form-subscription__label" for="subscription_select">Change Subscription : </label>
                    <select class="form-subscription__select" name="subscription_select" id="subscription_select">
                        <option value="1" <?= ($memberData['subscriptionId'] == 1 ? 'selected' : '') ?>>VIP</option>
                        <option value="2" <?= ($memberData['subscriptionId'] == 2 ? 'selected' : '') ?>>Gold</option>
                        <option value="3" <?= ($memberData['subscriptionId'] == 3 ? 'selected' : '') ?>>Classic</option>
                        <option value="4" <?= ($memberData['subscriptionId'] == 4 ? 'selected' : '') ?>>Day Pass</option>
                        <option value="DELETE">Delete Subscription</option>
                    </select>
                    <button class="form-subscription__button" type="submit">Change</button>
                </form>
            </div>
        </div>
        <h2 class="member-details__history-title">History</h2>
        <form class="form-history" action="" method="POST">
            <label class="form-history__label" for="films">Choose movie to add :</label>
            <input class="form-history__input" list="films_names" name="films" id="films">
            <datalist id="films_names">
                <?php foreach($allMoviesTitle as $title): ?>
                    <option value="<?= $title["title"] ?>">
                <?php endforeach ?>
            </datalist>
            <button class="form-history__button" type="submit">Add to history</button>
        </form>
        <?php if (!empty($movieHistory)): ?>
            <div class="member-details__history-table">
                <table>
                    <thead>
                        <tr>
                            <th>Movie</th>
                            <th>Date</th>
                            <th>Room</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($movieHistory as $movie): ?>
                            <tr>
                                <td><?= htmlspecialchars($movie['movie_title']); ?></td>
                                <td><?= htmlspecialchars($movie['date_begin']); ?></td>
                                <td><?= htmlspecialchars($movie['room']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="member-details__no-history">No history to display</p>
        <?php endif; ?>
    </div>
</body>
