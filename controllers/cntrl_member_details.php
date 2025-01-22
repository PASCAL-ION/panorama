<?php
require_once "../models/member_details_model.php";

function userHistory(){
    $id = $_GET["id"];
    
    $movieHistory = getUserHistory($id);
    
    require_once "../views/view_member_details.php";
}

function changeSubscription(){
    $userid = $_GET["id"];
    if ($_GET["subscription_select"] && !empty($_GET["subscription_select"])) {
        $selected_sub_id = $_GET["subscription_select"];
        
        if ($selected_sub_id == "DELETE") {
            deleteSubscription($userid);
        } else {
            modifySubscription($userid, $selected_sub_id);
        }
    }


    require_once "../views/view_member_details.php";
}
?>