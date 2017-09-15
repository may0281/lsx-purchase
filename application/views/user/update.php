<title>Dashboard | User Management </title>
<?php $data = $userData[0]; ?>
<!-- Charts -->
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

<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>

<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/sample.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/ckeditor/toolbarconfigurator/lib/codemirror/neo.css">


<!-- Demo JS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/form_validation.js"></script>
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
                    <a href="<?php echo base_url();?>user/init-user" title=""><?php echo strtoupper($menu); ?></a>
                </li>
                <li class="current">
                    <a href="#" title=""><?php echo strtoupper($subMenu) ?></a>
                </li>
            </ul>
        </div>
        <!-- /Breadcrumbs line -->
        <div class="page-header">
            <div class="page-title">
                <h3><?php echo strtoupper($subMenu) ?></h3>
                <span><?php echo array_get($data,'account');?></span>
            </div>

            <!-- Page Stats -->
            <ul class="page-stats">
                <li>
                    Create By : <?php echo array_get($data,'create_by');?> <br>
                    Create Date : <?php echo array_get($data,'create_date');?>
                </li>
                <li>
                    Update By : <?php echo array_get($data,'update_by');?> <br>
                    Update Date : <?php echo array_get($data,'update_date');?>
                </li>
            </ul>
            <!-- /Page Stats -->
        </div>

        <!-- /Page Header -->

        <!--=== Page Content ===-->
        <div class="row">
            <!--=== Validation Example 1 ===-->
            <div class="col-md-12">
                <div class="widget box">
                    <div class="widget-header">
                        <h4><i class="icon-reorder"></i> Fill the information.</h4>
                    </div>
                    <div class="widget-content">

                        <form class="form-horizontal row-border" method="post" id="validate-1" action="<?php echo base_url(); ?>user/updateAction">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" disabled="disabled" name="account" class="form-control" value="<?php echo array_get($data,'account');?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Role Code<span class="required">*</span></label>
                                <div class="col-md-9 clearfix">
                                    <select name="role_id" class="col-md-12 select2 full-width-fix required">
                                        <option></option>
                                        <?php foreach ($roles as $role){ ?>
                                            <option value="<?php echo array_get($role,'role_code'); ?>" <?php echo (array_get($role,'role_code') == array_get($data,'role_id'))? 'selected' : null ?>>
                                                <?php echo array_get($role,'role_desc'); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <label for="chosen1" generated="true" class="has-error help-block" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">First Name <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="firstname" class="form-control required" value="<?php echo array_get($data,'firstname');?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Last Name <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="lastname" class="form-control required" value="<?php echo array_get($data,'lastname');?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Mobile <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="mobile" class="form-control required" value="<?php echo array_get($data,'mobile');?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Status<span class="required">*</span></label>
                                <div class="col-md-9 clearfix">
                                    <select name="status" class="col-md-12 select2 full-width-fix required">
                                        <option value="A" <?php echo ('A' == array_get($data,'status'))? 'selected' : null ?>>Active</option>
                                        <option value="I" <?php echo ('I' == array_get($data,'status'))? 'selected' : null ?>>Inactive</option>
                                    </select>
                                    <label for="chosen1" generated="true" class="has-error help-block" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="hidden" name="account" value="<?php echo array_get($data,'account');?>">
                                <input type="submit" value="<?php echo strtoupper($subMenu) ?>" class="btn btn-primary pull-right">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Validation Example 1 -->
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /.container -->

</div>