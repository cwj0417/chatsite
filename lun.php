<?php 
set_time_limit(0);
$conn=mysql_connect('localhost','root','111111');
mysql_query('use sug',$conn);
mysql_query('set names utf8',$conn);

$num=$_POST['number'];//聊天室号码 chart1
$cr=$_POST['current'];
$sql="select*from ".$num." where id>".$cr." order by id asc limit 1";


while (1) {
	$res=mysql_query($sql,$conn);
	if($i=mysql_fetch_assoc($res)){
		echo json_encode($i);
		break;
	}
	sleep(1);
}

 ?>
