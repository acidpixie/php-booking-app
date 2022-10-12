<?php 

//calculating duration of stay

function calcDuration ($date1, $date2) {

    $diff = strtotime($date2) - strtotime($date1);

// 1 day = 24hrs = 86400 secs

    $duration = abs(round($diff / 86400));
    return $duration;

}

//calc total cost of stay

function calcTotalCost($duration, $cost) {

    $totalCost = $duration * $cost;
    return $totalCost;
}



