
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

        <!--=== Page Header ===-->
        <div class="page-header">
            <div class="page-title">
                <h3><?php echo strtoupper($subMenu) ?></h3>
                <span></span>
            </div>
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
                        <form class="form-horizontal row-border" method="post" id="validate-1" action="<?php echo base_url(); ?>user/createAction">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="account" class="form-control required email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="password" name="pass" class="form-control required" minlength="5">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Role Code<span class="required">*</span></label>
                                <div class="col-md-9 clearfix">
                                    <select name="role_id" class="col-md-12 select2 full-width-fix required">
                                        <option></option>
                                        <?php foreach ($roles as $role){ ?>
                                        <option value="<?php echo array_get($role,'role_code'); ?>"><?php echo array_get($role,'role_desc'); ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="chosen1" generated="true" class="has-error help-block" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">First Name <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="firstname" class="form-control required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Last Name <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="lastname" class="form-control required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Status<span class="required">*</span></label>
                                <div class="col-md-9 clearfix">
                                    <select name="status" class="col-md-12 select2 full-width-fix required">
                                        <option value="A">Active</option>
                                        <option value="I">Inactive</option>
                                    </select>
                                    <label for="chosen1" generated="true" class="has-error help-block" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="form-actions">
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