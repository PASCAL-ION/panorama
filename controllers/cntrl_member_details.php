<?php
require_once "../models/member_details_model.php";


function getMemberDetails($id) {
    return fetchMemberDetails($id);
}

function getUserDetails($id){
    return fetchUserDetails($id);
}

function getUserHistory($id) {
    return fetchUserHistory($id);
}

function changeSubscription($id, $selectedSubId) {
    $member_exist = memberExist($id);
    if ($member_exist && !empty($member_exist)) {
        if ($selectedSubId != "DELETE") {
            updateSubscription($id, $selectedSubId);
            header("Refresh:0");
        } elseif($selectedSubId == "DELETE") {
            $member_id = getMemberIdFromUserId($id);
            deleteSubscription($member_id["id"], $id);
            header('Location: members.php');
        }
    } else {
        if ($selectedSubId === "DELETE") {
            echo "Can't delete, the user does not have a subscription";
        } else {
            echo "add subscription cntrl" . "<br/>";
            addSubscription($selectedSubId, $id);
            header("Refresh:0");
        }
    }
}

function getMoviesTitle(){
    return fetchAllMoviesTitle();
}

function addToHistory(){
    return addFilmToHistory();
}
?>
