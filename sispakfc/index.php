<?php
include'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="icon" href="favicon.ico"/>

	<title>Konsultasi masalah mata dan kacamata</title>
	<link href="assets/css/sandstone-bootstrap.min.css" rel="stylesheet"/>
	<link href="assets/css/general.css" rel="stylesheet"/>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
  </head>
  <body>
	<nav class="navbar navbar-dark bg-primary navbar-static-top">
	  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <!-- <a class="navbar-brand" href="?">Home</a> -->
			</div>
			<div id="navbar" class="navbar-collapse collapse">
			  <ul class="nav navbar-nav">
				<?php if($_SESSION['login']):?>
				<li><a href="?m=diagnosa"><span class="glyphicon glyphicon-pushpin"></span> Keluhan</a></li>
				<li><a href="?m=gejala"><span class="glyphicon glyphicon-flash"></span> Gejala</a></li>
				<li><a href="?m=rule"><span class="glyphicon glyphicon-star"></span> Pengetahuan</a></li>
				<li><a href="?m=konsultasi&act=new"><span class="glyphicon glyphicon-stats"></span> Konsultasi</a></li>
				<li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
				<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				<?php else:?>
				<!-- <li><a href="?m=konsultasi&act=new"><span class="glyphicon glyphicon-stats"></span> Konsultasi</a></li> -->
				<li><a href="?m=informasi"><span class="glyphicon glyphicon-info-sign"></span> Informasi</a></li>
				<li><a href="?m=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<?php endif?>
			  </ul>
			</div>
		</div>
	</nav>
	<div class="container">
	<?php
		if(in_array($mod, array('diagnosa', 'gejala', 'pengetahuan', 'password')) && !$_SESSION['login'])
			redirect_js('?m=login');
		if(file_exists($mod.'.php'))
			include $mod.'.php';
		else
			include 'home.php';
	?>
	</div>
	<footer class="footer bg-dark">
	  <div class="container">
			<center><p>Copyright &copy; <?=date('Y')?> Forward Chaining</p></center>
	  </div>
	</footer>
	</body>
</html>
