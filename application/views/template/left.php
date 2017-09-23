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


	
		<!-- Charts -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/flot/jquery.flot.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/flot/jquery.flot.time.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/flot/jquery.flot.tooltip.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>plugins/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/fullcalendar/fullcalendar.min.js"></script>

	<!-- App -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins.form-components.js"></script>

	<style>
		#loader {
			position: fixed;
			left: 50%;
			top: 50%;
			z-index: 9999;
			margin: -75px 0 0 -75px;
			border: 5px solid #cccccc;
			border-radius: 50%;
			border-top: 5px solid #3498db;
			width: 80px;
			height: 80px;
			-webkit-animation: spin 2s linear infinite;
			animation: spin 2s linear infinite;
		}
	</style>
	<script>
		$(document).ready(function(){
			"use strict";

			App.init(); // Init layout and core plugins
			Plugins.init(); // Init all plugins
			FormComponents.init(); // Init all form-specific plugins
		});
	</script>

	<!-- Demo JS -->
<!--	<script type="text/javascript" src="<?php echo base_url();?>assets/js/demo/charts/chart_filled_blue.js"></script>-->


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
					<?php
					$dashboard  = $this->hublibrary_model->permission('dashboard',0,'view');
					if(	$dashboard == true){
					?>
					<li class="<?php if(array_get($path,1) == 'dashboard'){echo "current open";} ?>">
						<a href="<?php echo base_url('dashboard')?>">
							<i class="icon-dashboard"></i>
							Dashboard
						</a>
					</li>
					<?php } ?>
					<?php
					$user  = $this->hublibrary_model->permission('authen','init-user','view');
					$role  = $this->hublibrary_model->permission('authen','init-role','view');
					if(	$user == true or $role == true){
					?>
					<li class="<?php if(array_get($path,1) == 'authen'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-sitemap"></i>
							Authentication
						</a>
						<ul class="sub-menu">
							<?php if($user == true){ ?>
							<li class="<?php if($path_2 == 'init-user'){echo "current";} ?>">
								<a href="<?php echo base_url('authen/init-user');?>">
									<i class="icon-angle-right"></i>
									User Management
								</a>
							</li>
							<?php }?>
							<?php if($role == true){ ?>
							<li class="<?php if($path_2 == 'init-role'){echo "current";} ?>">
								<a href="<?php echo base_url('authen/init-role');?>">
									<i class="icon-angle-right"></i>
									Role Management
								</a>
							</li>
							<?php }?>
						</ul>
					</li>
					<?php }?>
					<?php
						$purq_rep_view  = $this->hublibrary_model->permission('purchase','request','view');
						$purq_req_create  = $this->hublibrary_model->permission('purchase','request','create');
						$purq_req_change_status = $this->hublibrary_model->permission('purchase','request','change-status');
						$po_report = $this->hublibrary_model->permission('purchase','po','view');
						$po_create = $this->hublibrary_model->permission('purchase','po','create');

						if(	$purq_rep_view == true or
							$purq_req_create == true or
							$purq_req_change_status == true or
							$po_report == true or
							$po_create == true){
					?>
					<li class="<?php if(array_get($path,1) == 'purchase'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-usd"></i>
							Purchase Management
						</a>
						<ul class="sub-menu">
							<?php  if($purq_rep_view == true){ ?>
							<li class="<?php if($path_2 == 'report' || $path_2 == ''){echo "current";} ?>">
								<a href="<?php echo base_url('purchase');?>">
									<i class="icon-angle-right"></i>
									Purchase Report
								</a>
							</li>
							<?php } ?>
							<?php  if($purq_req_create == true){ ?>
							<li class="<?php if($path_2 == 'request'){echo "current";} ?>">
								<a href="<?php echo base_url('purchase/request');?>">
									<i class="icon-angle-right"></i>
									Purchase Request
								</a>
							</li>
							<?php }?>
							<?php  if($purq_req_change_status == true){ ?>
							<li class="<?php if($path_2 == 'approve'){echo "current";} ?>">
								<a href="<?php echo base_url('purchase/approve');?>">
									<i class="icon-angle-right"></i>
									Purchase Approve
								</a>
							</li>
							<?php } ?>

							<?php if($po_report){?>
							<li class="<?php if($path_2 == 'po-report'){echo "current";} ?>">
								<a href="<?php echo base_url('purchase/po-report');?>">
									<i class="icon-angle-right"></i>
									Purchase Order Report
								</a>
							</li>
							<?php } ?>
							<?php if($po_create){?>
								<li class="<?php if($path_2 == 'pre-order'){echo "current";} ?>">
									<a href="<?php echo base_url('purchase/pre-order');?>">
										<i class="icon-angle-right"></i>
										Purchase Order
									</a>
								</li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>

					<?php
						$proj_view  = $this->hublibrary_model->permission('project','init-project','view');
						$proj_create  = $this->hublibrary_model->permission('project','init-project','create');
						if(	$proj_view == true or $proj_create == true){
					?>
					<li class="<?php if(array_get($path,1) == 'project'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-hdd"></i>
							Project
						</a>
						<ul class="sub-menu">
							<?php if($proj_create == true){?>
							<li class="<?php if($path_2 == 'create'){echo "current";} ?>">
								<a href="<?php echo base_url('project/create');?>">
									<i class="icon-angle-right"></i>
									Create Project
								</a>
							</li>
							<?php } ?>
							<?php if($proj_view == true){?>
							<li class="<?php if($path_2 == 'lists' || $path_2 == 'edit'){echo "current";} ?>">
								<a href="<?php echo base_url('project/lists');?>">
									<i class="icon-angle-right"></i>
									Project List
								</a>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>

					<?php
					$weekly_view  = $this->hublibrary_model->permission('report','weekly','view');
					$forecast_view  = $this->hublibrary_model->permission('report','forecast-receive','view');
					if(	$weekly_view == true or $forecast_view == true){
					?>
					<li class="<?php if(array_get($path,1) == 'report'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-hdd"></i>
							Report
						</a>
						<ul class="sub-menu">
							<?php if($weekly_view == true){ ?>
							<li class="<?php if($path_2 == 'weekly'){echo "current";} ?>">
								<a href="<?php echo base_url('report/weekly');?>">
									<i class="icon-angle-right"></i>
									Weekly Purchase Report
								</a>
							</li>
							<?php } ?>
							<?php if($forecast_view == true){ ?>
							<li>
								<a href="<?php echo base_url('report/forecast-receive');?>">
									<i class="icon-angle-right"></i>
									Forecast Receive Date By Item
								</a>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>
					<?php
					$stock_view  = $this->hublibrary_model->permission('stock','stock','view');
					$stock_update  = $this->hublibrary_model->permission('stock','stock','update');
					$stock_create  = $this->hublibrary_model->permission('stock','stock','create');
					if(	$stock_view == true or $stock_update == true or $stock_create == true){
					?>

					<li class="<?php if(array_get($path,1) == 'stock'){echo "current open";} ?>">
						<a href="javascript:void(0);">
							<i class="icon-barcode"></i>
							Stock
						</a>
						<ul class="sub-menu">
							<li class="<?php if(array_get($path,2) == 'add_new_item'){echo "current open";} ?>">
								<a href="<?php echo base_url('stock/add_new_item');?>">
									<i class="icon-angle-right"></i>
									Add Item
								</a>
							</li>
                            <?php if($stock_view == true){ ?>
                            <li class="<?php if(array_get($path,2) == 'list_item'){echo "current open";} ?>">
								<a href="<?php echo base_url('stock/list_item');?>">
									<i class="icon-angle-right"></i>
									Stock Item List
								</a>
							</li>
							<?php }?>
							<?php if($stock_update == true){ ?>
							<li class="<?php if(array_get($path,2) == 'add_item' or array_get($path,2) == 'import_item'){echo "current open";} ?>">
								<a href="<?php echo base_url('stock/add_item');?>">
									<i class="icon-angle-right"></i>
									Import Stock
								</a>
							</li>
							<?php }?>
							<?php if($stock_update == true){ ?>
							<li class="<?php if(array_get($path,2) == 'export'){echo "current open";} ?>">
								<a href="<?php echo base_url(); ?>stock/export">
									<i class="icon-angle-right"></i>
									Export Stock
								</a>
							</li>
							<?php }?>
							<?php if($stock_view == true){ ?>
							<li class="<?php if(array_get($path,2) == 'import_report'){echo "current open";} ?>">
								<a href="<?php echo base_url('stock/import_report');?>">
									<i class="icon-angle-right"></i>
									Report Import Item
								</a>
							</li>
							<?php }?>
							<?php if($stock_view == true){ ?>
							<li class="<?php if(array_get($path,2) == 'import_report_by_po'){echo "current open";} ?>">
								<a href="<?php echo base_url('stock/import_report_by_po');?>">
									<i class="icon-angle-right"></i>
									Report Import Item by PO
								</a>
							</li>
							<?php }?>


						</ul>
					</li>
					<?php }?>
					<?php
					$tracking  = $this->hublibrary_model->permission('tracking',0,'view');
					if($tracking == true){
					?>
					<li class="<?php if(array_get($path,1) == 'tracking'){echo "current open";} ?>">
						<a href="<?php echo base_url('tracking')?>">
							<i class="icon-barcode"></i>
							Tracking Order
						</a>
					</li>
					<?php }?>


					<?php
					$param  = $this->hublibrary_model->permission('param',0,'view');
					if($param == true){
					?>
					<li class="<?php if(array_get($path,1) == 'param'){echo "current open";} ?>">
						<a href="<?php echo base_url('param')?>">
							<i class="icon-barcode"></i>
							Parameter Config
						</a>
					</li>
					<?php }?>

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
