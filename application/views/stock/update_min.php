<!-- Form Validation -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/additional-methods.min.js"></script>

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
                        <a href="<?php echo base_url();?>stock/list_item" title=""><?php echo strtoupper($menu); ?></a>
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

            <!--=== Page Content ===-->
            <!--=== Managed Tables ===-->

            <!--=== Normal ===-->
            <div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">

								<h4><i class="icon-reorder"></i></h4>
							</div>
							<div class="widget-content">
								<form class="form-horizontal row-border" method="post"  action="<?php echo base_url(); ?>stock/update_min_action/<?php echo $this->uri->segment(3);?>"  onsubmit="return checkForm(this);" >
								<div class="form-group">
										<label class="col-md-2 control-label">Item Code:</label>
										<div class="col-md-10"><input type="text" name="item_code" value="<?php echo $item_code; ?>" class="form-control" disabled="disabled"></div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Qty Min:</label>
										<div class="col-md-10"><input type="text" name="item_min" value="<?php echo $item_min; ?>" class="form-control"></div>
									</div>

									<div class="form-group" style="float:right; margin-right:20px; margin-top:20px;">
										<input class="btn btn-sm btn-primary" type="submit" value="UPDATE"> <input class="btn" type="reset" value="Reset">
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