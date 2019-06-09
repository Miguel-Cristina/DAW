<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";
session_start();
$pwd=substr(md5($_POST["pwd"]),0,32);
$pwdconfirm=substr(md5($_POST["pwdconfirmation"]),0,32);
$token=$_SESSION['token'];
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 

if($pwd!="" && $pwdconfirm!="" && $pwd==$pwdconfirm)
{
	if($db)
	{
		$emailquery="SELECT * FROM users WHERE reset_digest='$token'";
		$emailresult=@ mysql_query($emailquery,$db);
		if(mysql_num_rows($emailresult) == 0)
		{
			$querystring="Location: new_password.php?status=TF&token=" .urlencode($token);
		}
		else
		{
			
			$tupple= mysql_fetch_array($emailresult); 
			$email=$tupple["email"];
			$date=$tupple["reset_sent_at"];
			$d1=date('Y-m-d H:i:s',time()-3600);
			if($date>$d1)
			{
				$sql_update="UPDATE users SET password_digest='$pwd' WHERE reset_digest='$token'";
				if(mysql_query($sql_update,$db))
				{
					$querystring="Location: message.php?status=RS";
				}
			}
			else
			{
				$querystring="Location: login.php?status=TF";

			}
	
		}
	}
	else
	{
		$querystring="Location: new_password.php?status=SF&token=". urlencode($token);
	}
}
else
{
	$querystring="Location: new_password.php?status=PF&token=". urlencode($token);
}
header($querystring);


?>