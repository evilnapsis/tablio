<html>
<head>
<title> .: Tablio :. </title>
<link rel="stylesheet" type="text/css" href="res/bootstrap3/css/bootstrap.min.css">
<script src="res/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="res/font-awesome/css/font-awesome.min.css">
<?php Core::includeCSS(); ?>
<?php Core::includeJS(); ?>

</head>

<body>
<header class="navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">TABLIO</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
          <li><a href="./"><i class="fa fa-dashboard"></i> Inicio</a></li>

      </ul>
    </nav>
  </div>
</header>
<?php 
	View::load("index");
?>

<script src="res/jquery.min.js"></script>
<script src="res/bootstrap3/js/bootstrap.min.js"></script>


</body>

</html>