<?php 
//time before function
function time_before($time){
	$t1 = new DateTime($time, new DateTimezone('Asia/Dhaka'));
	$t2 = new DateTime('now', new DateTimezone('Asia/Dhaka'));
	$diff = $t1->diff($t2);
	if($diff->d > 0){
		$time_before = $diff->d.' days ago';
	}elseif($diff->h > 0){
		$time_before = $diff->h.' hours ago';
	}elseif($diff->i > 0){
		$time_before = $diff->i.' mins ago.';
	}else{
		$time_before = $diff->s.' seconds ago';
	}
	return $time_before;
}

// Store Activitys
function activitys($user_id, $activity){
	if($user_id != null && $activity != null){
		require 'db.php';
		$insert = "INSERT INTO activitys(user_id, activity) VALUES($user_id, '$activity')";
		mysqli_query($conn, $insert);
	}
}
?>