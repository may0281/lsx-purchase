<!-- Forms -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/fileinput/fileinput.js"></script>

<!-- Form Validation -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/additional-methods.min.js"></script>

<!-- Noty -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/layouts/top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/themes/default.js"></script>

<!-- Demo JS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/form_validation.js"></script>

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
            <div class="page-header">
                <div class="page-title">
                    <h3><?php echo strtoupper($subMenu) ?></h3>
                    <span></span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="widget box">
                        <div class="widget-header">
                            <h4><i class="icon-reorder"></i> Select Files XLSX.</h4>
                        </div>
                        <div class="widget-content">
                            <form class="form-horizontal row-border" id="validate-3" method="post" action="<?php echo base_url('stock/import_item'); ?>" enctype="multipart/form-data">

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

        </div>
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