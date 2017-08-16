<?php

	header("Content-Type: text/json;charset=utf-8");
	$mysqli=new mysqli("112.74.45.198","root","chairman521","mthins");
	if($mysqli->connect_error)
	{
		$result=array('error-'>'1'.'info'->'database failed'.$mysqli->connect_error);
		each json_encode($result);
		exit;
	}
	else
	{
		$sql="select * from goods where limit 10";
		$sqlresult=$mysqli->query($sql);
		
		while($row=)
	}
	
?>