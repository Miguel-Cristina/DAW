<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";
session_start();
$template = new HTML_Template_IT('.');
$template->loadTemplatefile('message_template.html', true, true);
switch($status)
{
    case "PR":
        $template->setCurrentBlock("TOP");
        $template->setVariable('MESSAGE', 'Password reset activated! <br> Email sent to you :-)');
        $template->parseCurrentBlock(); 
    break;
	case "RS":
        $template->setCurrentBlock("TOP");
        $template->setVariable('MESSAGE', 'Password reset successfully!');
        $template->parseCurrentBlock(); 
    break;

}
$template->show();

?>