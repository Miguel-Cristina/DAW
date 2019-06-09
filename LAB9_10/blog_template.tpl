
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Miguel Cristina's DAW Forum</title>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse" style="background-color: green;border-color: green;color:white;height:70px ">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="https://png.icons8.com/cotton/2x/golf-ball.png" style="height:60px;width: 60px;margin-top:5%">
    </div>
    <ul class="nav navbar-nav">
       <!-- BEGIN TOP -->
      <li><a href="index" style="color:lightgray;font-size:20px;margin-top:4%;">{$MENU_1}</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    
      <li><a href="blog"style="font-size:16px;margin-top:15%;">{$MENU_4}</a></li>

     
<!-- END TOP -->

    </ul>
  </div>
</nav>
 
<!-- BEGIN MENU -->
<div class="panel panel-default" style="margin-left: 5%;margin-right: 5%;margin-top:2%;border-color:green" >
  <div class="row">
    <div class="col-lg-12"></div>
    <form action="{ACTION}" method="post" >
<textarea name="content" style="width:1200px; height:200px;margin-left:6%;margin-top:5%;margin-bottom:5%">{BLOG}</textarea >
  </div>
  <div class="row">
    <div class="col-lg-12">
        <div class="align:center-block" style="margin-left:45%;">
            <button type="submit" class="btn btn-default" style="background-color:green;color:white;margin-bottom:3%"  >{$LABEL}</button>
            <button type="reset" class="btn btn-default" style="background-color:rgb(175, 18, 18);color:white;margin-bottom:3%">Cancel</button></form>
        </div>
      </div>
    </div>
      </div>
<div class="row">
  <div class="col-lg-12">
      <div class="panel panel-default" style="margin-left: 0.5%;margin-right: 0.5%;border-color: grey">
          
    </div>
    </div>
</div>
</div>

<!-- END MENU -->
<footer>
        <div class="page-header">
                <div class="pull-left" style="margin-left:10%">
                <h6>2018 Desenvolvimento de Aplicacoes Web</h6>
                </div>
                <div class="pull-right" style="margin-right:10%">
                <h6 class="text-right" >Designed by Miguel Cristina</h6>
                </div>
                <div class="clearfix"></div>
              </div>
              
</footer>   
</body>
</html>