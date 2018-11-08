<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";
session_start();
  	
  	$template = new HTML_Template_IT('.');
	$template->loadTemplatefile('blog_template.html', true, true);
	$template->setCurrentBlock("TOP");
	$template->setVariable('MENU_1', 'Home');
	$template->setVariable('MENU_4', 'Blog');
    	$template->parseCurrentBlock(); 
	$isNew=$_GET['micropost_id'];
	if(empty($isNew))
	{
		$template->setCurrentBlock("MENU");
		$template->setVariable('BLOG','');
		$template->setVariable('LABEL', 'Create');
		$template->setVariable('ACTION', 'newblog_action.php');
    		$template->parseCurrentBlock(); 
	}
	else	
	{
		$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
		if($db) 
		{
   			$query = "SELECT * FROM microposts WHERE id = '$isNew'";
			$result = @ mysql_query($query,$db);
			$tupple= mysql_fetch_array($result);
		}
		
		$_SESSION['micropost_id']=$isNew;
		$template->setCurrentBlock("MENU");
		$template->setVariable('BLOG', $tupple['content']);
		$template->setVariable('LABEL', 'Update');
		$template->setVariable('ACTION', 'updateblog_action.php');
    		$template->parseCurrentBlock(); 
		mysql_close($db); 
	}
	 $template->show();
?>