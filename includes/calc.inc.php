<?php 

function calc($date1, $date2) {

    //calculate duration checkout - checkin
    $difference = strtotime($date2) - strtotime($date1);

    //round of figure and return number / 1 day 

    return abs(round($difference / 86400));
}

?>

