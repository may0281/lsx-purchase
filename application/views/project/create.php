<title>Dashboard | Project Management </title>
<body>
<div id="container">
    <div id="content">
        <div class="container">
            <!-- Breadcrumbs line -->
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="<?php echo base_url();?>dashboard">DASHBOARD</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>project/lists" title=""><?php echo strtoupper($menu); ?></a>
                    </li>
                    <li class="current">
                        <a href="#" title=""><?php echo strtoupper($subMenu) ?></a>
                    </li>
                </ul>
            </div>
            <!--=== Page Header ===-->
            <div class="page-header">
                <div class="page-title">
                    <h3><?php echo strtoupper($subMenu) ?></h3>
                    <span></span>
                </div>
            </div>

            <!--=== Normal ===-->
            <div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Fill the information.</h4>
							</div>
							<div class="widget-content">
								<form class="form-horizontal row-border" method="post"  action="<?php echo base_url(); ?>project/create_action"  onsubmit="return checkForm(this);" >
									<div class="form-group">
										<label class="col-md-2 control-label">Project Name: <span class="required">*</span></label>
										<div class="col-md-10">
											<input type="text" id="name" name="name" class="form-control">
											<label id="msg_name" class="col-md-6 errors" style="color: red" > </label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Create By:</label>
										<div class="col-md-10"><input type="text" name="create_by" class="form-control" value="<?php echo $create_by; ?>" disabled="disabled"></div>
									</div>

									<div class="form-group" id="other_customer" style="display:none">
									<label class="col-md-2 control-label">Customer Name:</label>
										<div class="col-md-10"><input type="text" name="new_customer" id="new_customer" class="form-control"></div>
									</div>
										<div class="form-group">
										<label class="col-md-2 control-label">Detail:</label>
										<div class="col-md-10"><textarea rows="4" cols="5" name="detail" class="form-control"></textarea></div>
									</div>

									<div class="form-group" style="float:right; margin-right:20px; margin-top:20px;">
										<input class="btn btn-sm btn-primary" type="submit" value="CREATE PROJECT">
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
    </div>
    <!-- /.container -->

</div>
</div>
<script>
	$('#name').keypress(function() {
		$('#msg_name').html('');
	});
	function checkForm(form) {
		var error_msg = 'This field is required.';
		var status = true;
		if(form.name.value == '')
		{
			form.name.focus();
			$('#name').addClass('has-error');
			$('#msg_name').html(error_msg);
			status = false;
		}

		return status;
	}
</script>
</body>