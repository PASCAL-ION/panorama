<?php 
require_once "../models/members_model.php";

function getUsers(){
    $membersFilter = $_GET["membersFilter"];
    $members = getAllUsers();
    require_once "../views/view_members.php";
}
?>