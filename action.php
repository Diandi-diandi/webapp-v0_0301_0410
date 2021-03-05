<?php
header('Content-type:application/json;charset=utf-8');
use function PHPSTORM_META\type;

require_once 'conn.php';
	$userid = $_POST['userid'];
	$action = $_POST['action'];
	if($action=='search'){
		$category = $_POST['category'];
		if($category == 'food'){
			$sql1 = "SELECT `uname` FROM `users` WHERE `uid`='".$userid."'";
			$sql2 = "SELECT `loc_id` FROM `collection` WHERE `uid`='".$userid."'";
			$username = $db_link->query($sql1)->fetch_assoc()['uname'];
			$collection = $db_link->query($sql2); // mysqli_result
			if($collection->num_rows == 0) $answer = json_encode([""]); // searching failed
			else{
				while($loc_id = $collection->fetch_assoc()['loc_id']){
					$sql3 = "SELECT `loc_name` FROM `location` WHERE `loc_id`='".$loc_id."'";
					$loc_name = $db_link->query($sql3)->fetch_assoc()['loc_name'];
					$list[] = $loc_name;
				}
				$answer = json_encode($list);
			}
		}
		else if($category == 'drink'){
			$answer = json_encode(['香篆茶坊']) ;



		}
		else if($category == 'scenery'){
			$answer = json_encode('no result');



		}
		$db_link->close();
		echo $answer; //3個答案[A, B, C]
	}
	else if($action=='pesona'){
		$userid = $_POST['userid'];
		$sql = "SELECT * FROM `users` WHERE `uid`='".$userid."'";
		$data = $db_link->query($sql) ;
		if($data->num_rows != 0) $answer = json_encode($data->fetch_assoc());
		else $answer = json_encode([""]);

		echo $answer; //輸出[等級、頭像、稱號]
	}
	else if($action=='message'){



		$answer = json_encode('hello, welcome to this big family') ;
		echo $answer; //輸出"郵件內容"
	}
?>