<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";


  // create template object
  $template = new HTML_Template_IT('.');

// load template
    $template->loadTemplatefile('login_template.html', true, true);

    $template->setCurrentBlock("TOP");
    $template->setVariable('MENU_1', 'THE CLUB HOUSE');
    $template->setVariable('MENU_2', 'Log in');
    $template->setVariable('MENU_3', 'Sign Up');
    $template->parseCurrentBlock(); 
    
    switch($status){
    case "OK":
         
	$template->setCurrentBlock("FORM");
	$template->setVariable('NOME', '');
	$template->setVariable('EMAIL', '');
	$template->parseCurrentBlock();    
	break;
    case "UF":
        $template->setCurrentBlock("MESSAGE");
	$template->setVariable('MESSAGE', 'O email que inseriu nao esta associado a nenhum utilizador!');
	$template->parseCurrentBlock();

	$emailfromtuple = urldecode( $_GET["email"] );
	$template->setCurrentBlock("FORM");
	$template->setVariable('EMAIL', $emailfromtuple);
	$template->parseCurrentBlock();        
	break;
    case "DF":
        $template->setCurrentBlock("MESSAGE");
	$template->setVariable('MESSAGE', 'O email ou palavra passe inserida não estão correta! Tente novamente ou contacte o administrador!');
	$template->parseCurrentBlock();

	$emailfromtuple = urldecode( $_GET["email"] );
	$template->setCurrentBlock("FORM");
	$template->setVariable('EMAIL', $emailfromtuple);
	$template->parseCurrentBlock();        
	break;
    case "FF":
        $template->setCurrentBlock("MESSAGE");
	$template->setVariable('MESSAGE', 'Verifique se todos os campos estão preenchidos e tente novamente!');
	$template->parseCurrentBlock();

	$emailfromtuple = urldecode( $_GET["email"] );
	$template->setCurrentBlock("FORM");
	$template->setVariable('EMAIL', $emailfromtuple);
	$template->parseCurrentBlock();        
	break;
	//Time Fault! 1 hour timespan!
	case "TF":
	$template->setCurrentBlock("MESSAGE");
      	$template->setVariable('MESSAGE', 'O token já não está disponivel! Tente novamente!');
   	$template->parseCurrentBlock(); 
	$template->setCurrentBlock("FORM");
	$template->setVariable('NOME', '');
	$template->setVariable('EMAIL', '');
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
$pwd=$_POST["pwd"];





?>