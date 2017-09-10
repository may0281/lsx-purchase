<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Error</title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="<?php echo base_url() ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Theme -->
	<link href="<?php echo base_url() ?>assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css" />

	<!-- Login -->
	<link href="<?php echo base_url() ?>assets/css/error.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fontawesome/font-awesome.min.css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<!--[if IE 8]>
		<link href="<?php echo base_url() ?>assets/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	<!--=== JavaScript ===-->

	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/libs/jquery-1.10.2.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/libs/lodash.compat.min.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="<?php echo base_url() ?>assets/js/libs/html5shiv.js"></script>
	<![endif]-->
</head>

<body class="error">
	<!--=== Error Title ===-->
	<div class="title">
		<h2>ERROR <br></h2>

		<h3><?php echo $message; ?></h3> <br>

	</div>
	<!-- /Error Title -->

	<div class="actions">
		<div class="list-group">
			<li class="list-group-item list-group-header align-center">
				Ooops! It looks like you have taken a wrong turn.
			</li>
			<a href="<?php echo base_url() ?>" class="list-group-item"><i class="icon-home"></i> Go to Dashboard <i class="icon-angle-right align-right"></i></a>
			<a href="#" onclick="goBack()" class="list-group-item"><i class="icon-question"></i> Go Back <i class="icon-angle-right align-right"></i></a>
		</div>
	</div>

	<!-- Footer -->
	<div class="footer">
		LSX Purchasing <br>  Admin Template<br>&copy; <?php echo  date('Y')?>
	</div>
	<!-- /Footer -->
</body>
</html>
<script>
	function goBack() {
		window.history.back();
	}
</script>