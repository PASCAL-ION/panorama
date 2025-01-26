<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/member_details.css">
    <title>Member Details</title>
</head>
<body>
    <?php
        require_once "../controllers/cntrl_member_details.php";


        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = intval($_GET['id']);
            
            $memberData = getMemberDetails($id);
            $userData = getUserDetails($id);
            $movieHistory = getUserHistory($id);
            $allMoviesTitle = getMoviesTitle();
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subscription_select']) && !empty($_POST['subscription_select'])) {
                $subSelectedId = $_POST['subscription_select'];
                changeSubscription($id, $subSelectedId);

            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['films']) && !empty($_POST['films'])) {
                $film_title = $_POST['films'];
                addFilmToHistory($film_title, $id);
            }
            

            if (isset($_GET['films_names']) && !empty($_GET['films_names'])) {
                $film_title = $_GET['films_names'];
    
                addFilmToHistory($film_title, $id);
            }

            require_once "../views/view_member_details.php";
        } else {
            echo "<p>Member ID not provided or invalid.</p>";
        }
    ?>
</body>
</html>
