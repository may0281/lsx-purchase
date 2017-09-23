<!-- Form Validation -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/additional-methods.min.js"></script>

<?php $data = $item_code[0]; ?>
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
			<h4><i class="icon-reorder"></i>Edit</h4>
			</div>
			<div class="widget-content">
			<form class="form-horizontal row-border" method="post" action="<?php echo base_url(); ?>stock/edit_item_action/<?php echo $this->uri->segment(3);?>">
			<!--									<div class="alert alert-info fade in">
			<i class="icon-remove close" data-dismiss="alert"></i>
			This are examples of full width input fields. Please find select-boxes and other things below.
			</div>-->
			<div class="form-group">
			<label class="col-md-2 control-label">Item Code: <span style="color:#F00">*</span></label>
			<div class="col-md-10"><input type="text" name="item_code" value="<?php echo array_get($data,'item_code');?>" disabled="disabled" class="form-control" required></div>
			</div>
<!--			<div class="form-group">
			<label class="col-md-2 control-label" for="input19">Type</label>
			<div class="col-md-10">
			<select id="input19" class="select2-select-00 col-md-12 full-width-fix">
			<option value="AK">---Select--</option>
			<option value="HI">-----</option>
			</select>
			</div>
			</div-->		
			<div class="form-group">
			<label class="col-md-2 control-label">Qty:</label>
			<div class="col-md-10"><input class="form-control input-width-medium" type="text" name="stk_qty" value=" <?php echo array_get($data,'item_qty');?>" disabled="disabled"></div>
			</div>
			<div class="form-group">
			<label class="col-md-2 control-label">Detail:</label>
			<div class="col-md-10">
			<div class="row">
			<div class="col-md-3">
			Size <span style="color:#F00">*</span><input type="text" name="item_size" class="form-control input-width-medium" placeholder="Size" value="<?php echo array_get($data,'item_size');?>" required>
			</div>
			<div class="col-md-3">
			Thickness <span style="color:#F00">*</span><input type="text" name="item_thickness" class="form-control input-width-medium" placeholder="Thickness" value="<?php echo array_get($data,'item_thickness');?>" required>
			</div>
			<div class="col-md-3">
			P.Film 
            <input type="text" name="item_pfilm" class="form-control input-width-medium" placeholder="P.Film" value="<?php echo array_get($data,'item_pfilm');?>">
			</div>
			<div class="col-md-3">
			AICA Finish <span style="color:#F00">*</span><input type="text" name="item_aica" class="form-control input-width-medium" placeholder="AICA Finish" value="<?php echo array_get($data,'item_aica');?>" required>
			</div>
			</div>
			</div>
			</div>

			<div class="form-group">
			<label class="col-md-2 control-label">Unit Price: <span style="color:#F00">*</span></label>
			<div class="col-md-10"><input class="form-control input-width-medium" type="text" name="item_price" placeholder="US" value="<?php echo array_get($data,'item_price');?>" required></div>
			</div>
			<div class="form-group">
			<label class="col-md-2 control-label">QTY Min:</label>
			<div class="col-md-10"><input class="form-control input-width-medium" type="text" name="item_min" value="<?php echo array_get($data,'item_min');?>"></div>
			</div>
			<div align="right">
			<input class="btn btn-sm btn-primary" type="submit" value="Edit"> <!--<input class="btn" type="reset" value="Reset">--></div>
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