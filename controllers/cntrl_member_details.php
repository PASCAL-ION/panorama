<?php
require_once "../models/member_details_model.php";

function userHistory(){
    $id = $_GET["id"];
    
    $movieHistory = getUserHistory($id);
    
    require_once "../views/view_member_details.php";
}

function changeSubscription(){
    
}
?>