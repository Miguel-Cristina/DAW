<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";


// connect to database
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 
if($db) {
  // query
  $query  = "SELECT microposts.*,users.name FROM microposts INNER JOIN users ON microposts.user_id=users.id ORDER BY microposts.updated_at DESC";
  
  // execute query
  if(!($result = @ mysql_query($query,$db )))
   showerror();

  // create template object
  $template = new HTML_Template_IT('.');

  // load template
  $template->loadTemplatefile('index_template.html', true, true);

	$template->setCurrentBlock("TOP");
	$template->setVariable('MENU_1', 'Home');
	$template->setVariable('MENU_2', 'Logout');
	$template->setVariable('MENU_3', 'Post');
	$template->setVariable('USER', 'Miguel Cristina');
	$template->parseCurrentBlock(); 

  // display rows with query results

  $nrows  = mysql_num_rows($result);
   for($i=0; $i<$nrows; $i++) {
     $tuple = mysql_fetch_array($result,MYSQL_ASSOC);   

     // set variables inwith template
     $template->setCurrentBlock("MENU");
     $template->setVariable('CONTENT', $tuple['content']);
     $template->setVariable('USER', $tuple['name']);
     $template->setVariable('CREATED', $tuple['created_at']);
     $template->setVariable('UPDATED', $tuple['updated_at']);
   
     // parse any result
     $template->parseCurrentBlock();

   } // end for

  // show
  $template->show();

  // close
  mysql_close($db);
} // end if 
?>