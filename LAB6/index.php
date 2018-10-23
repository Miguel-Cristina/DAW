<?php
require_once "HTML/Template/IT.php"; 
require_once "db.php";

session_start();
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
 $n=$_SESSION['name'];
 if($n!="")   
{      
	
	$template->setCurrentBlock("TOP");
	$template->setVariable('MENU_1', 'THE CLUB HOUSE');
	$template->setVariable('MENU_2', 'Log out');
	//$template->setVariable('MENU_3', 'Blog');
	$template->setVariable('MENU_4', 'Post');


	$template->setVariable('USER', $n);
$template->setVariable('WELCOME', 'Welcome ');

	$template->setVariable('LINK', 'logout_action.php');
	$template->parseCurrentBlock(); 
}else
{

	$template->setCurrentBlock("TOP");
	$template->setVariable('MENU_1', 'THE CLUB HOUSE');
	$template->setVariable('MENU_2', 'Login');
	$template->setVariable('MENU_3', 'Post');
	$template->setVariable('MENU_4', 'Sign Up');
	$template->setVariable('WELCOME', ' ');
	//$template->setVariable('USER', 'Visitante');
	$template->setVariable('LINK', 'login.php');
	$template->parseCurrentBlock(); 


}


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
	if($tuple['name']==$n)
	{
		$template->setVariable('POST', 'Update blog');
		$template->setVariable('POSTLINK', 'blog.php?micropost_id=' . urlencode($tuple['id']));
	}
     

   
     // parse any result
     $template->parseCurrentBlock();

   } // end for

  // show
  $template->show();

  // close
  mysql_close($db);
} // end if 
?>