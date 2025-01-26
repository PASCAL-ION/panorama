<h1 class="sessions__title">Sessions</h1>

<form class="sessions__form" action="" method="post">
    <label class="sessions__form-label" for="session_movie_title">Search by title</label>
    <input class="sessions__form-input" name="session_movie_title" id="session_movie_title" type="text">
    <input class="sessions__form-submit" type="submit" value="search">
</form>

<form class="sessions__form" action="" method="post">
    <label class="sessions__form-label" for="session_date">Search by Date</label>
    <input class="sessions__form-input" name="session_date" type="date">
    <input class="sessions__form-submit" type="submit" value="search">
</form>

<form class="sessions__form" action="POST">
    <input class="sessions__form-submit" type="submit" value="Delete filters">
</form>

<form class="sessions__add-form" action="" method="post">
    <?php if (isset($error_message)): ?>
        <div class="sessions__error-message"><?= htmlspecialchars($error_message); ?></div>
    <?php endif; ?>
    <div class="sessions__add-form-group">
        <label class="sessions__add-form-label" for="room">Room</label>
        <select class="sessions__add-form-select" name="room" id="room">
            <?php if (!empty($rooms)): ?>
                <?php foreach ($rooms as $room): ?>
                    <option value="<?= htmlspecialchars($room['id']); ?>"><?= htmlspecialchars($room['name']); ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="">No rooms available</option>
            <?php endif; ?>
        </select>
    </div>

    <div class="sessions__add-form-group">
        <label class="sessions__add-form-label" for="films">Choose movie to add:</label>
        <input list="films_names" class="sessions__add-form-input" name="films" id="films">
        <datalist id="films_names">
            <?php if (!empty($moviesTitle)): ?>
                <?php foreach ($moviesTitle as $title): ?>
                    <option value="<?= htmlspecialchars($title['title']); ?>"></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </datalist>
    </div>

    <div class="sessions__add-form-group">
        <label class="sessions__add-form-label" for="datetime">Choose date and time</label>
        <input type="datetime-local" class="sessions__add-form-input" id="datetime" name="datetime">
    </div>

    <div class="sessions__add-form-group">
        <input type="submit" value="Add session" class="sessions__add-form-submit">
    </div>
</form>

<div class="sessions__table-container">
    <table class="sessions__table">
        <thead>
            <tr>
                <th class="sessions__table-header">Movie</th>
                <th class="sessions__table-header">Sessions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sessionsByTitle = [];
            foreach ($sessions as $session) {
                $sessionsByTitle[$session['title']][] = $session;
            }
            ?>

            <?php foreach ($sessionsByTitle as $title => $sessionsGroup): ?>
                <tr class="sessions__table-row">
                    <td class="sessions__movie-title"><?= htmlspecialchars($title); ?></td>
                    <td class="sessions__sessions">
                        <div class="sessions__session-dropdown">
                            <div class="sessions__session-header">Date | Room</div>
                            <ul class="sessions__session-list">
                                <?php foreach ($sessionsGroup as $session): ?>
                                    <li class="sessions__session-item"><?= htmlspecialchars($session['date_begin']); ?> | <?= htmlspecialchars($session['room']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>