<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";


  // create template object
  $template = new HTML_Template_IT('.');

// load template
    $template->loadTemplatefile('register_template.html', true, true);

    $template->setCurrentBlock("TOP");
    $template->setVariable('MENU_1', 'THE CLUB HOUSE');
    $template->setVariable('MENU_2', 'Log in');
    $template->setVariable('MENU_3', 'Post');
    $template->parseCurrentBlock(); 
    //T for true, EF for Email fault, PF for Password fault, FF for Field fault
    switch($status){
    case "T":
         
	$template->setCurrentBlock("FORM");
	$template->setVariable('NOME', '');
	$template->setVariable('EMAIL', '');
	$template->parseCurrentBlock();    
	break;
    case "EF":
        $template->setCurrentBlock("MESSAGE");
	$template->setVariable('MESSAGE', 'Oops! This email address is already used by other user! Please login with the current email or try again with a different email address!');
	$template->parseCurrentBlock();

	$nomefromtuple = urldecode( $_GET["nome"] );
	$emailfromtuple = urldecode( $_GET["email"] );
	$template->setCurrentBlock("FORM");
	$template->setVariable('NOME', $nomefromtuple);
	$template->setVariable('EMAIL', $emailfromtuple);
	$template->parseCurrentBlock();        
	break;
    case "PF":
        $template->setCurrentBlock("MESSAGE");
	$template->setVariable('MESSAGE', 'Oops! Passwords dont match please type them again!');
	$template->parseCurrentBlock();

	$nomefromtuple = urldecode( $_GET["nome"] );
	$emailfromtuple = urldecode( $_GET["email"] );
	$template->setCurrentBlock("FORM");
	$template->setVariable('NOME', $nomefromtuple);
	$template->setVariable('EMAIL', $emailfromtuple);
	$template->parseCurrentBlock();        
	break;
    case "FF":
        $template->setCurrentBlock("MESSAGE");
	$template->setVariable('MESSAGE', 'Oops! Looks like you forgot to fill one or more fields! Check and try again!');
	$template->parseCurrentBlock();

	$nomefromtuple = urldecode( $_GET["nome"] );
	$emailfromtuple = urldecode( $_GET["email"] );
	$template->setCurrentBlock("FORM");
	$template->setVariable('NOME', $nomefromtuple);
	$template->setVariable('EMAIL', $emailfromtuple);
	$template->parseCurrentBlock();        
	break;


    default:
   	$template->setCurrentBlock("FORM");
	$template->setVariable('NOME', '');
	$template->setVariable('EMAIL', '');
	$template->parseCurrentBlock(); 
        break;
  }
//show template
 $template->show();
$n = $email = $pwd = $confirmpwd = "";
$n=$_POST["n"];
$email=$_POST["email"];
$pwd=$_POST["pwd"];
$confirmpwd=$_POST["confirmpwd"];




?>