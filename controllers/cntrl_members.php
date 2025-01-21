<?php 
require_once "../models/members_model.php";

function showUsers(){
    $lastname = $_GET["lastname"];
    $firstname = $_GET["firstname"];

    $members = getUsers($lastname, $firstname);
    require_once "../views/view_members.php";
}
?>