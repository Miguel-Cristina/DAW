<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";


  // create template object
  $template = new HTML_Template_IT('.');

// load template
    $template->loadTemplatefile('password_reset_template.html', true, true);

    $template->setCurrentBlock("TOP");
    $template->setVariable('MENU_1', 'THE CLUB HOUSE');
    $template->setVariable('MENU_2', 'Home');
    $template->setVariable('MENU_3', 'Login');
    $template->parseCurrentBlock(); 
    
    switch($status){
    case "OK":
         
	$template->setCurrentBlock("FORM");
	$template->setVariable('NOME', '');
	$template->setVariable('EMAIL', '');
	$template->parseCurrentBlock();    
	break;
    case "EF":
        $template->setCurrentBlock("MESSAGE");
	$template->setVariable('MESSAGE', 'O email que inseriu nao esta associado a nenhum utilizador!');
	$template->parseCurrentBlock();

	$emailfromtuple = urldecode( $_GET["email"] );
	$template->setCurrentBlock("FORM");
	$template->setVariable('EMAIL', $emailfromtuple);
	$template->parseCurrentBlock();        
	break;
 case "TF":
        $template->setCurrentBlock("MESSAGE");
	$template->setVariable('MESSAGE', 'O token é invalido!');
	$template->parseCurrentBlock();

	$emailfromtuple = urldecode( $_GET["email"] );
	$template->setCurrentBlock("FORM");
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
$email = $pwd = "";
$email=$_POST["email"];






?>