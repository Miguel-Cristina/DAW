<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";
session_start(); 


$template = new HTML_Template_IT('.');
$template->loadTemplatefile('message_template.html', true, true);

    $template->setCurrentBlock("TOP");
    $template->setVariable('MESSAGE', 'See you back soon!');
    $template->parseCurrentBlock(); 
    $template->show();
session_unset(); 
session_destroy(); 



?>