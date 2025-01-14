<?php
function BDConnection(){
    $host = "localhost";
    $username = "ion";
    $password = "golf2007";
    $db = "cinema";
    
    try {
        $connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $connection;
    } catch(PDOException $error) {
        echo "erreur : " . $error->getMessage() . "<br>";
    }
}
?>
