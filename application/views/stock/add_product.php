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
                        <a href="<?php echo base_url();?>blog" title=""><?php echo strtoupper($menu); ?></a>
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
			<h4><i class="icon-reorder"></i> Add by import file</h4>
			</div>
			<div class="widget-content">
			<form class="form-horizontal row-border" action="#">
			<!--									<div class="alert alert-info fade in">
			<i class="icon-remove close" data-dismiss="alert"></i>
			This are examples of full width input fields. Please find select-boxes and other things below.
			</div>-->
			<div class="form-group">
			<label class="col-md-2 control-label">File Upload:</label>
			<div class="col-md-10">
			<input type="file" data-style="fileinput">
			</div>
			</div>
			
			
			</form>
			</div>
			</div>
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
			<div class="widget box">
			<div class="widget-header">
			<h4><i class="icon-reorder"></i> Add Items</h4>
			</div>
			<div class="widget-content">
			<form class="form-horizontal row-border" action="#">
			<!--									<div class="alert alert-info fade in">
			<i class="icon-remove close" data-dismiss="alert"></i>
			This are examples of full width input fields. Please find select-boxes and other things below.
			</div>-->
			<div class="form-group">
			<label class="col-md-2 control-label">Add by import file:</label>
			<div class="col-md-10">
			<input type="file" data-style="fileinput">
			</div>
			</div>
			<div class="form-group">
			<label class="col-md-2 control-label">Item Code:</label>
			<div class="col-md-10"><input type="text" name="regular" class="form-control"></div>
			</div>
			<div class="form-group">
			<label class="col-md-2 control-label" for="input19">Type</label>
			<div class="col-md-10">
			<select id="input19" class="select2-select-00 col-md-12 full-width-fix">
			<option value="AK">---Select--</option>
			<option value="HI">-----</option>
			</select>
			</div>
			</div>			
			<div class="form-group">
			<label class="col-md-2 control-label">Qty:</label>
			<div class="col-md-10"><input class="form-control input-width-medium" type="text" name="text"></div>
			</div>
			<div class="form-group">
			<label class="col-md-2 control-label">Detail:</label>
			<div class="col-md-10">
			<div class="row">
			<div class="col-md-3">
			<input type="text" name="regular" class="form-control input-width-medium" placeholder="Size">
			</div>
			<div class="col-md-3">
			<input type="text" name="regular" class="form-control input-width-medium" placeholder="Thickness">
			</div>
			<div class="col-md-3">
			<input type="text" name="regular" class="form-control input-width-medium" placeholder="P. Film">
			</div>
			<div class="col-md-3">
			<input type="text" name="regular" class="form-control input-width-medium" placeholder="AICA Finish">
			</div>
			</div>
			</div>
			</div>
			<div class="form-group">
			<label class="col-md-2 control-label">Required Date:</label>
			<div class="col-md-10">
			<div class="row">
			<div class="col-md-4">
			<input type="text" name="regular" class="form-control"><span class="help-block">Start (dd-mm-yyyy)</span>
			</div>
			<div class="col-md-4">
			<input type="text" name="regular" class="form-control"><span class="help-block align-center">End (dd-mm-yyyy)</span>
			</div>
			</div>
			</div>
			</div>	
			<div class="form-group">
			<label class="col-md-2 control-label" for="input19">Company</label>
			<div class="col-md-10">
			<select id="input19" class="select2-select-00 col-md-12 full-width-fix">
			<option value="AK">---Select--</option>
			<option value="HI">-----</option>
			</select>
			</div>
			</div>
			<div class="form-group">
			<div class="row">
			<label class="col-md-2 control-label">MKT:</label><div class="col-md-3">
			<input type="text" name="regular" class="form-control" placeholder="">
			</div>
			<label class="col-md-2 control-label">CT:</label><div class="col-md-3">
			<input type="text" name="regular" class="form-control" placeholder="">
			</div>
			
			</div>
			</div>
			<div class="form-group">
			<label class="col-md-2 control-label">Price:</label>
			<div class="col-md-10"><input class="form-control input-width-medium" type="text" name="text"></div>
			</div>
							<div class="form-group">
			<label class="col-md-2 control-label">Remark:</label>
			<div class="col-md-10"><textarea rows="2" cols="5" name="textarea" class="form-control"></textarea></div>
			</div>
			<div class="form-group" style="float:right; margin-right:20px; margin-top:20px;">
			<input class="btn btn-sm btn-primary" type="submit" value="Save"> <input class="btn" type="reset" value="Reset">
			</div>
			
			</form>
			</div>
			</div>
			</div>
			</div>
			<!-- /Normal -->


        <!-- /Page Content -->
    </div>
    <!-- /.container -->

</div>
</div>
<script>
	$(function () {
	  $('#Add').on('click', function () {
	//	$('<p>Text</p>').appendTo('#other_company');
		 $("#other_company").toggle();
	  });
	});
	
</script>
</body>