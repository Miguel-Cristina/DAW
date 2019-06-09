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
    
    switch($status){
    case "T":
         
	$template->setCurrentBlock("FORM");
	$template->setVariable('NOME', '');
	$template->setVariable('EMAIL', '');
	$template->parseCurrentBlock();    
	break;
    case "EF":
        $template->setCurrentBlock("MESSAGE");
	$template->setVariable('MESSAGE', 'O email solicitado jс existe na base de dados! Faчa log in com o email existente, ou solicite a sua inscriчуo com um email diferente!');
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
	$template->setVariable('MESSAGE', 'A palavra-passe inserida nуo coincide! Insira de novo a palavra-passe e tente novamente!');
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
	$template->setVariable('MESSAGE', 'Verifique se todos os campos estуo preenchidos e tente novamente!');
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