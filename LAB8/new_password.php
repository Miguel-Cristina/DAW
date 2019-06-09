<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";
session_start();
	$tokenstring=urldecode( $_GET["token"] );
  	$template = new HTML_Template_IT('.');
   	$template->loadTemplatefile('new_password_template.html', true, true);
   	$template->setCurrentBlock("TOP");
   	$template->setVariable('MENU_1', 'Blog');
   	$template->setVariable('MENU_2', 'Login');
   	$template->setVariable('MENU_3', 'Register');
   	$template->parseCurrentBlock(); 
	$template->setCurrentBlock("MENU");
    $template->setVariable('TOKEN', $tokenstring);
   	$template->parseCurrentBlock(); 
	switch($status)
	{
		case "1":
		$template->setCurrentBlock("MESSAGE");
      		$template->setVariable('MESSAGE', 'Wrong password!');
   		$template->parseCurrentBlock(); 
		break;
		//Server Fault! Database doesnt respond!
		case "2":
		$template->setCurrentBlock("MESSAGE");
      		$template->setVariable('MESSAGE', 'ERROR');
   		$template->parseCurrentBlock(); 
		break;
		//Email fault for some reason the email doesnt exist!
		case "3":
		$template->setCurrentBlock("MESSAGE");
      		$template->setVariable('MESSAGE', 'Wrong email!');
   		$template->parseCurrentBlock(); 
		break;
		case "4":
		$template->setCurrentBlock("MESSAGE");
      		$template->setVariable('MESSAGE', 'Wrong token!');
   		$template->parseCurrentBlock(); 
		break;
	}
$template->show();
$_SESSION['token']=$tokenstring;
?>