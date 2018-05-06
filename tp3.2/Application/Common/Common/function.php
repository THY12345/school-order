<?php
function show($status,$message){
	$result=array(
		'status'=>$status,
		'message'=>$message,
		//'type'=>$type,
	);s
	exit(json_encode($result));
}
function getMd5Password($password) {
    return md5($password . C('MD5_PRE'));
}

?>