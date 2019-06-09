<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";

  // create template object
  $template = new HTML_Template_IT('.');

$email=$_POST["email"];

// connect to database
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
if($db) 
{
   	$query = "SELECT * FROM users WHERE email = '" .$_POST[email] ."'";
 	$result = @ mysql_query($query,$db);
  	if( $email == '')
	{
		$querystring="Location: password_reset.php?status=EF&email=" . urlencode($email);

	}
  	else if(mysql_num_rows($result) == 0)
	{
		$querystring="Location: password_reset.php?status=EF&email=" . urlencode($email);

	}
	else
	{	
		$tupple = mysql_fetch_array(mysql_query($query));
		$name=$tupple['name'];
		$reset_digest = substr(md5(time()),0,32); 
		$d1 = date('Y-m-d H:i:s');
		$sql_update="UPDATE users SET reset_digest='$reset_digest', reset_sent_at='$d1' WHERE email='$email'";
		if(mysql_query($sql_update,$db))
		{
			$message="Ola Sr.(a) $name
			Para obter uma nova password clique no link
			
			http://intranet.deei.fct.ualg.pt/~a54375/LAB8/new_password.php?token=$reset_digest
			
			Este link tem a validade de uma hora.
			Se nao pediu uma nova password IGNORE este email.
			
			
			Cumprimentos,
			webmaster!
			Pagina Web: http://intranet.deei.fct.ualg.pt/~a54375/LAB8/
			E-mail: a54375@deei.fct.ualg.pt
			NOTA: Nao responda a este email, nao vai obter resposta! ";
			mail($_POST['email'],"Password reset from THE CLUB HOUSE's blog",$message, "From: <a54375@ualg.pt>");
			$querystring="Location: message.php?status=PR";
		}

	}	
}
	header($querystring);
?>