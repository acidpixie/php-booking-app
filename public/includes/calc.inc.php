<?php 

//calc duration of stay

function calcDuration($startDate, $endDate) {

    $diff = strtotime($endDate) - strtotime($startDate);

// 1 day = 24 hrs = 86400 secs
    $duration = abs(round($diff / 86400));

    return $duration;
}

//calc total cost of stay

function calcTotalCost($duration, $cost) {

    $totalCost = $duration * $cost;

    return $totalCost;

}

?>
