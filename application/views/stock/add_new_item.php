<style>
    .errors
    {
        color: red;
    }
    .input-error
    {
        border: red 1px solid;
    }
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/sparkline/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/blockui/jquery.blockUI.min.js"></script>

<!-- Forms -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/uniform/jquery.uniform.min.js"></script> <!-- Styled radio and checkboxes -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/fileinput/fileinput.js"></script>

<!-- Form Validation -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/additional-methods.min.js"></script>

<!-- Noty -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/layouts/top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/themes/default.js"></script>

<!-- App -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.form-components.js"></script>


<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/sample.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/ckeditor/toolbarconfigurator/lib/codemirror/neo.css">

<script type="text/javascript" src="<?php echo base_url();?>plugins/bootbox/bootbox.min.js"></script>

<!-- Demo JS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/form_validation.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>plugins/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/noty/layouts/top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/noty/themes/default.js"></script>
  
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
<div class="row">
                <div class="col-md-6">
                    <div class="widget box">
                        <div class="widget-header">
                            <h4><i class="icon-reorder"></i> Import New Item.</h4>
                        </div>
                        <div class="widget-content">
                            <form class="form-horizontal row-border" id="validate-3" method="post" action="<?php echo base_url('stock/import_new_item'); ?>" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">File <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input type="file" name="file" class="required" data-style="fileinput" data-inputsize="medium">
                                        <p class="help-block">Excel only (.xlsx)</p>
                                        <label for="file" class="has-error help-block" generated="true" style="display:none;"></label>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Upload" class="btn btn-primary pull-right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			<!--=== Normal ===-->
			<div class="row">
			<div class="col-md-12">
			<div class="widget box">
			<div class="widget-header">
			<h4><i class="icon-reorder"></i>Add</h4>
			</div>
			<div class="widget-content">
			<form class="form-horizontal row-border" id="validate-2" method="post" action="<?php echo base_url(); ?>stock/add_item_action">

			<div class="form-group">
			<label class="col-md-2 control-label">Item Code:<span style="color:#F00">*</span></label>
			<div class="col-md-10"><input type="text" name="item_code" class="form-control" required></div>
			</div>
			<div class="form-group">
			<label class="col-md-2 control-label">Qty:</label>
			<div class="col-md-10"><input class="form-control digits" name="stk_qty"></div>
			</div>
			<div class="form-group">
			<label class="col-md-2 control-label">Detail:</label>
			<div class="col-md-10">
			<div class="row">
			<div class="col-md-3">
			Size <span style="color:#F00">*</span><input type="text" name="item_size" class="form-control input-width-medium" placeholder="Size" required>
			</div>
			<div class="col-md-3">
			Thickness <span style="color:#F00">*</span><input type="text" name="item_thickness" class="form-control input-width-medium" placeholder="Thickness" required>
			</div>
			<div class="col-md-3">
			P.Film : <span style="color:#F00">*</span>
            <input type="text" name="item_pfilm" class="form-control input-width-medium" placeholder="P.Film" required>
			</div>
			<div class="col-md-3">
			AICA Finish <span style="color:#F00">*</span><input type="text" name="item_aica" class="form-control input-width-medium" placeholder="AICA Finish" required>
			</div>
			</div>
			</div>
			</div>

			<div class="form-group">
			<label class="col-md-2 control-label">Unit Price: <span style="color:#F00">*</span></label>
			<div class="col-md-10"><input class="form-control input-width-medium" type="text" name="item_price" placeholder="US" required></div>
			</div>
			<div class="form-group">
			<label class="col-md-2 control-label">QTY Min:</label>
			<div class="col-md-10"><input class="form-control digits input-width-medium" type="text" name="item_min"></div>
			</div>
			<div align="right">
			<input class="btn btn-sm btn-primary" type="submit" value="Add"> <input class="btn" type="reset" value="Reset"></div>
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
</body>