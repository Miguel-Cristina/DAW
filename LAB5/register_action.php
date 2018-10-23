<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";

  // create template object
  $template = new HTML_Template_IT('.');



$nome=$_POST["n"];

$email=$_POST["email"];

$pwd=$_POST["pwd"];

$confirmpwd=$_POST["confirmpwd"];

// connect to database
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
if($db) 
{
   	$query = "SELECT * FROM users WHERE email = '" .$_POST[email] ."'";
 	$result = @ mysql_query($query,$db);
  	if( $nome == '' or $email == '' or $pwd == '' or $confirmpwd == '')
	{
		$querystring="Location: register.php?status=FF&nome=" . urlencode($nome) . "&email=" . urlencode($email);

	}
  	else if($pwd!=$confirmpwd)
	{
		$querystring="Location: register.php?status=PF&nome=" . urlencode($nome) . "&email=" . urlencode($email);
		
	}else if(mysql_num_rows($result) > 0)
	{
		$querystring="Location: register.php?status=EF&nome=" . urlencode($nome) . "&email=" . urlencode($email);

	}
	else
	{
	$d1 = date('Y-m-d H:i:s');
	$d2 = date('Y-m-d H:i:s');
	$pass=substr(md5($_POST["pwd"]),0,32);
 	//$sql_insert="INSERT INTO users VALUES (NULL, '$nome', '$email', '$d1', '$d2', '$pass')";
	$sql_insert="INSERT INTO users(name, email, created_at, updated_at, password_digest) VALUES ('$nome','$email','$d1','$d2','$pass')";

  	if(mysql_query($sql_insert,$db))
	{
          $querystring="Location: register_success.html";
	}
  	else
	{
	
	$querystring="Location: register.php?status=F&nome=" . urlencode($nome) . "&email=" . urlencode($email);
	}
	}
}
	header($querystring);
?>