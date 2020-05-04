<?php

function redirect($path){
	header("location: " . SITE_ROOT . $path);
}

// converting date to  year - month - date format
function dateForDb($date){
	return date("Y-m-d", strtotime($date));
}


// converting date to day - month - year format
function dateForUser($date){
	return date("d-m-Y", strtotime($date));
}


// currnt date with time
function timestramp(){
    return date("Y-m-d H:s:i");
}



// Time Ago
function timeAgo($dateTime) {
        $time = strtotime($dateTime);
        $current = time();
        $seconds = $current - $time;
        $min = round($seconds / 60);
        $hours = round($seconds / 3600);
        $day = round($seconds / 86400);
        $week = round($seconds / 604800);
        $months = round($seconds / 2600640);

        if ($seconds <= 59) {
            return $seconds == 0 ? 'now' : $seconds . 's ago';

        } else if ($min <= 59) {
            return $min . 'm ago';

        } else if ($hours <= 23) {
            return $hours . 'h ago';

        } else if ($day <= 6) {
            return $day . 'd ago';

        } else if ($months <= 12) {
            return date("M j", $time);

        } else {

            return date("j M Y", $time);

        }

    }









?>
