<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Films filter</h2>
        <form method="get" action="">
          <label for="distributor">Distributor : </label>
          <input type="text" name="distributor" id="distributor" value="<?php echo htmlspecialchars($_GET['distributor'] ?? '', ENT_QUOTES);?>">
          
          <label for="title">Title : </label>
          <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($_GET['title'] ?? '', ENT_QUOTES);?>">
    
          <select name="genre">
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
          <input type="submit" value="Submit">
        </form>

        <ul class="row_container">
          <?php if (!empty($movies)): ?>
            <?php foreach ($movies as $movie): ?>
              <li class="row"><?= $movie["title"] ?></li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
</body>
</html>
