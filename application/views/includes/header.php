<!DOCTYPE html>
<html>
	<head>
		<title>Connect!</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<link rel="stylesheet" type="text/css" href="<?= $this->config->base_url(); ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?= $this->config->base_url(); ?>assets/css/simple-sidebar.css" />
		<link rel="stylesheet" type="text/css" href="<?= $this->config->base_url(); ?>assets/css/custom.css" />
		<script src="<?= $this->config->base_url(); ?>assets/js/boostrap.min.js"></script>
		<script src="<?= $this->config->base_url(); ?>assets/js/jquery-1.11.0.js"></script>
	</head>
	
	<body>
		<div id="wrapper">
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav">
					<li class="sidebar-brand">
						<a href="<?= $this->config->base_url(); ?>index.php">
							<img src="<?= $this->config->base_url(); ?>assets/images/mthconnect.png" style="width: 80%;" />
						</a>
					</li>
					<li><a href="<?= $this->config->base_url(); ?>index.php">Home</a></li>
					<li><a href="<?= $this->config->base_url(); ?>index.php/test/">Take Test</a></li>
					<!--<li><a href="#">Results</a></li>-->
					<li><a href="<?= $this->config->base_url(); ?>index.php/login/">Login</a></li>
				</ul>
			</div>
			
			<div id="page-content-wrapper">
				<? if( $this->User->ActiveUser != false ) { ?>
				<div class="panel panel-default" style="float: right;">
					<div class="panel-body" style="font-size: 12px;">
						<div class="row">
							<div class="col-md-4">
								<img style="width: 32px;height: 32px;" src="<?= $this->config->base_url(); ?>assets/images/standard-avatar.jpg" />
							</div>
							<div class="col-md-8">
								Hello, <?= $this->User->ActiveUser->FirstName ?><br />
								<a href="<?= $this->config->base_url(); ?>/index.php/login/logout">Logout?</a>
							</div>
						</div>
					</div>
				</div>
				<? } ?>
				
				<!--
				<div class="alert alert-info" role="alert">
					Don't know who to take to homecoming? Try <a href="<?= $this->config->base_url(); ?>">MTH Connect!</a>
				</div>
				-->