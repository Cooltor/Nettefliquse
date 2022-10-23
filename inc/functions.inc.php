<?php


function userConnected() {
    if (isset($_SESSION['membre'])) {
        return true;
    } else {
        return false;
    }
}




?>

