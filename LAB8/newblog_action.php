<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";

		session_start();
		$id=$_SESSION['id'];
		$cont=$_POST["content"];
		$d1 = date('Y-m-d H:i:s');
		$d2 = date('Y-m-d H:i:s');
		$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
		if($db) 
		{

			$sql_insert="INSERT INTO microposts(content,user_id,created_at,updated_at) VALUES ('$cont','$id', '$d1' , '$d2 ')";
			if(mysql_query($sql_insert,$db))
			{
        			$querystring="Location: index.php";
			}
		}
			header($querystring);

?>