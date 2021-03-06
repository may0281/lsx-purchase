<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Dashboard | lsx.co.th </title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />


	<!-- Theme -->
	<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fontawesome/font-awesome.min.css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<!--[if IE 8]>
		<link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/lodash.compat.min.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->

	<!-- Smartphone Touch Events -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/event.swipe/jquery.event.move.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/event.swipe/jquery.event.swipe.js"></script>

	<!-- General -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/breakpoints.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/cookie/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>

	<!-- App -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins.form-components.js"></script>

	<script>
		$(document).ready(function(){
			"use strict";

			App.init(); // Init layout and core plugins
			Plugins.init(); // Init all plugins
			FormComponents.init(); // Init all form-specific plugins
		});
	</script>

	<!-- Demo JS -->


</head>

<body>
	<!-- Header -->
	<header class="header navbar navbar-fixed-top" role="banner">
		<!-- Top Navigation Bar -->
		<div class="container">

			<!-- Only visible on smartphones, menu toggle -->
			<ul class="nav navbar-nav">
				<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
			</ul>

			<!-- Logo -->
			<a class="navbar-brand" href="<?php echo base_url();?>dashboard">
				
				<strong>Administrator</strong>
			</a>
			<!-- /logo -->

			<!-- Sidebar Toggler -->
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="icon-reorder"></i>
			</a>
			<!-- /Sidebar Toggler -->
			<!-- Top Left Menu -->
			<ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
				<li>
					<a href="<?php echo base_url();?>dashboard">
						Dashboard
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>logout"><i class="icon-plus"></i><span>Logout</span></a>
				</li>
			</ul>
			<!-- /Top Left Menu -->
		</div>
	</header> <!-- /.header -->
    <?php $path = array(1=>null,1=>null,2=>null); $path = explode('/',$_SERVER["REQUEST_URI"]);
	if(isset($path[2]))
	{
		$path_2 = $path[2];
	}else{ $path_2 =null;}
	?>
    <div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<!--=== Navigation ===-->
				<ul id="nav">
					<li class="<?php if(array_get($path,1) == 'dashboard'){echo "current open";} ?>">
						<a href="<?php echo base_url('dashboard')?>">
							<i class="icon-dashboard"></i>
							Dashboard
						</a>
					<li class="<?php if(array_get($path,1) == 'authen'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-sitemap"></i>
							Authentication
						</a>
						<ul class="sub-menu">
							<li class="<?php if($path_2 == 'init-user'){echo "current";} ?>">
								<a href="<?php echo base_url('authen/init-user');?>">
									<i class="icon-angle-right"></i>
									User Management
								</a>
							</li><li class="<?php if($path_2 == 'init-role'){echo "current";} ?>">
								<a href="<?php echo base_url('authen/init-role');?>">
									<i class="icon-angle-right"></i>
									Role Management
								</a>
							</li>
						</ul>
					</li>
					<li class="<?php if(array_get($path,1) == 'sale'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-group"></i>
							Marketing & Sale
						</a>
						<ul class="sub-menu">
							<li class="<?php if($path_2 == 'report'){echo "current";} ?>">
								<a href="<?php echo base_url('sale/report');?>">
									<i class="icon-angle-right"></i>
									Report
								</a>
							</li>
						</ul>
					</li>
					<li class="<?php if(array_get($path,1) == 'purchase'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-usd"></i>
							Purchase Management
						</a>
						<ul class="sub-menu">
							<li class="<?php if($path_2 == 'request'){echo "current";} ?>">
								<a href="<?php echo base_url('purchase/request');?>">
									<i class="icon-angle-right"></i>
									Purchase Request
								</a>
							</li>
							<li class="<?php if($path_2 == 'approve'){echo "current";} ?>">
								<a href="<?php echo base_url('purchase/approve');?>">
									<i class="icon-angle-right"></i>
									Purchase Approve
								</a>
							</li>
							<li class="<?php if($path_2 == 'report'){echo "current";} ?>">
								<a href="<?php echo base_url('purchase/report');?>">
									<i class="icon-angle-right"></i>
									Purchase Report
								</a>
							</li>
							<li class="<?php if($path_2 == 'po'){echo "current";} ?>">
								<a href="<?php echo base_url('purchase/po');?>">
									<i class="icon-angle-right"></i>
									PO
								</a>
							</li>
							<li class="<?php if($path_2 == 'po-report'){echo "current";} ?>">
								<a href="<?php echo base_url('purchase/po-report');?>">
									<i class="icon-angle-right"></i>
									PO report
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<!-- /Navigation -->
				<div class="sidebar-widget align-center">
					<div class="btn-group" data-toggle="buttons" id="theme-switcher">
						<label class="btn active">
							<input type="radio" name="theme-switcher" data-theme="bright"><i class="icon-sun"></i> Bright
						</label>
						<label class="btn">
							<input type="radio" name="theme-switcher" data-theme="dark"><i class="icon-moon"></i> Dark
						</label>
					</div>
				</div>

			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->
