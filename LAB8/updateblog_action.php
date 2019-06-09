<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";
session_start();
       		
       		$postid=$_SESSION['micropost_id'];
		$id=$_SESSION['id'];
		$cont=$_POST['content'];
		$d1 = date('Y-m-d H:i:s');
		$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
		if($db) 
		{

			$sql_update="UPDATE microposts SET content='$cont',updated_at='$d1' WHERE id='$postid'AND user_id='$id'";
			if(mysql_query($sql_update,$db))
			{
        			$querystring="Location: index.php";
			}
		}
		header($querystring);

?>