<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";
session_start(); 

// create template object
$template = new HTML_Template_IT('.');

$email=$_POST["email"];

$pwd=$_POST["pwd"];
$pass=substr(md5($_POST["pwd"]),0,32);


$_SESSION['email'] = $email; 
// connect to database
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
if($db) 
{	$queryuser= "SELECT * FROM users WHERE email ='$email'";
   	$query = "SELECT * FROM users WHERE email ='$email' AND password_digest='$pass'";
	$resultuser=@ mysql_query($queryuser,$db);
 	$result = @ mysql_query($query,$db);
  	if( $email == '' or $pwd == '')
	{
		
		$querystring="Location: login.php?status=FF&email=" . urlencode($email);
		unset($_SESSION['email']); 
		
	}
	if(mysql_num_rows($resultuser) == 0)
	{ 
 		
  		$querystring="Location: login.php?status=UF&email=" . urlencode($email);
		unset($_SESSION['email']); 	
	}
	else if(mysql_num_rows($result) == 0) 
  	{
		$querystring="Location: login.php?status=DF&email=" . urlencode($email);
	}else
	{	
	$tupple = mysql_fetch_array($result); 
	$_SESSION['id'] = $tupple['id']; 
	$_SESSION['name'] = $tupple['name']; 
	$_SESSION['email'] = $tupple['email']; 
	$querystring="Location: index.php?status=OK"; 
	mysql_close($db); 
	}
}
	header($querystring);
?>