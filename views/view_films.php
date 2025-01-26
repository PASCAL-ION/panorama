<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1 class="header">Home</h1>
    <p class="form__title">Films filter</p>
    <form class="form" method="get" action="">
        <label class="form__label" for="distributor">Distributor : </label>
        <input class="form__input" type="text" name="distributor" id="distributor" value="<?php echo htmlspecialchars($_GET['distributor'] ?? '', ENT_QUOTES);?>">

        <label class="form__label" for="title">Title : </label>
        <input class="form__input" type="text" name="title" id="title" value="<?php echo htmlspecialchars($_GET['title'] ?? '', ENT_QUOTES);?>">

        <select class="form__select" name="genre">
            <option selected="selected">Filter by genre</option>
            <option value="1" <?= (($_GET['genre'] ?? '') === "1") ? 'selected' : '' ?>>Action</option>
            <option value="2" <?= (($_GET['genre'] ?? '') === "2") ? 'selected' : '' ?>>Animation</option>
            <option value="3" <?= (($_GET['genre'] ?? '') === "3") ? 'selected' : '' ?>>Aventure</option>
            <option value="4" <?= (($_GET['genre'] ?? '') === "4") ? 'selected' : '' ?>>Drama</option>
            <option value="5" <?= (($_GET['genre'] ?? '') === "5") ? 'selected' : '' ?>>Comedy</option>
            <option value="6" <?= (($_GET['genre'] ?? '') === "6") ? 'selected' : '' ?>>Mystery</option>
            <option value="7" <?= (($_GET['genre'] ?? '') === "7") ? 'selected' : '' ?>>Biography</option>
            <option value="8" <?= (($_GET['genre'] ?? '') === "8") ? 'selected' : '' ?>>Crime</option>
            <option value="9" <?= (($_GET['genre'] ?? '') === "9") ? 'selected' : '' ?>>Fantasy</option>
            <option value="10" <?= (($_GET['genre'] ?? '') === "10") ? 'selected' : '' ?>>Horror</option>
            <option value="11" <?= (($_GET['genre'] ?? '') === "11") ? 'selected' : '' ?>>Sci-Fi</option>
            <option value="12" <?= (($_GET['genre'] ?? '') === "12") ? 'selected' : '' ?>>Romance</option>
            <option value="13" <?= (($_GET['genre'] ?? '') === "13") ? 'selected' : '' ?>>Family</option>
            <option value="14" <?= (($_GET['genre'] ?? '') === "14") ? 'selected' : '' ?>>Thriller</option>
        </select>
        <input class="form__submit" type="submit" value="Submit">
    </form>

    <form class="form" action="POST">
        <input class="form__submit" type="submit" value="Delete filters">
    </form>

    <ul class="movie-list">
        <?php if (!empty($movies)): ?>
            <?php foreach ($movies as $movie): ?>
                <li class="movie-list__item"><?= $movie["title"] ?></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</body>
</html>
