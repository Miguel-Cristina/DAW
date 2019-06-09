<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";
session_start();

$cookie_name = 'siteAuth';
$cookie_time = (3600 * 24 * 30); // 30 days	
setcookie ($cookie_name, '', time() - $cookie_time);
unset($_COOKIE[$cookie_name]);
session_unset(); 
session_destroy(); 



$template = new HTML_Template_IT('.');
$template->loadTemplatefile('message_template.html', true, true);

    $template->setCurrentBlock("TOP");
    $template->setVariable('MESSAGE', 'See you back soon!');
    $template->parseCurrentBlock(); 
    $template->show();


?>