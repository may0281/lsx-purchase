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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/ui_general.js"></script>

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
                        <form class="form-horizontal row-border" method="post" id="validate-1" action="<?php echo base_url(); ?>authen/createRoleAction">

                            <div class="form-group">
                                <label class="col-md-2 control-label">Project <span class="required">*</span></label>
                                <div class="col-md-4 clearfix">
                                    <select name="proj_id" class="col-md-12 select2 full-width-fix required">
                                        <option></option>
                                        <?php foreach ($projects as $project){ ?>
                                            <option value="<?php echo array_get($project,'proj_id')?>"><?php echo array_get($project,'proj_name');?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="chosen1" generated="true" class="has-error help-block" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Require Date <span class="required">*</span></label>
                                <div class="col-md-4">
                                    <input type="text" name="purq_require_start" class="form-control datepicker required" placeholder="Start Date">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="purq_require_end" class="form-control datepicker required" placeholder="End Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Product Code<span class="required">*</span></label>
                                <div class="col-md-2 clearfix">
                                    <select name="proj_id" class="col-md-12 select2 full-width-fix required">
                                        <option></option>
                                        <?php foreach ($projects as $project){ ?>
                                            <option value="<?php echo array_get($project,'prod_id')?>"><?php echo array_get($project,'prod_name');?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="chosen1" generated="true" class="has-error help-block" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">เจ้าของโครงการ <span class="required">*</span></label>
                                <div class="col-md-2">
                                    <input type="text" name="proj_owner_name" class="form-control" placeholder="ชื่อเจ้าของโครงการ">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="proj_contacts" class="form-control" placeholder="ชื่อผู้ติดต่อ">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="proj_mobile" class="form-control" placeholder="เบอร์ผู้ติดต่อ">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="proj_email" class="form-control" placeholder="อีเมล์">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">ผู้ออกแบบ <span class="required">*</span></label>
                                <div class="col-md-2">
                                    <input type="text" name="designer_name" class="form-control" placeholder="ชื่อผู้ออกแบบ">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="designer_contacts" class="form-control" placeholder="ชื่อผู้ติดต่อ">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="designer_mobile" class="form-control" placeholder="เบอร์ผู้ติดต่อ">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="designer_email" class="form-control" placeholder="อีเมล์">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">ผู้รับเหมา <span class="required">*</span></label>
                                <div class="col-md-2">
                                    <input type="text" name="contractor_name" class="form-control" placeholder="ชื่อผู้รับเหมา">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="contractor_contacts" class="form-control" placeholder="ชื่อผู้ติดต่อ">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="contractor_mobile" class="form-control" placeholder="เบอร์ผู้ติดต่อ">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="contractor_email" class="form-control" placeholder="อีเมล์">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Note</label>
                                <div class="col-md-8">
                                    <textarea rows="3" cols="5" name="textarea" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Marketing<span class="required">*</span></label>
                                <div class="col-md-4 clearfix">
                                    <select name="mkt_id" id="marketing" class="col-md-12 select2 full-width-fix required">
                                        <option></option>
                                        <?php
                                            foreach ($users as $user){
                                        ?>
                                            <option value="<?php echo array_get($user,'account')?>"  mobile-value="<?php echo array_get($user,'mobile')?>"><?php echo array_get($user,'firstname'). ' '.array_get($user,'lastname');?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="chosen1" generated="true" class="has-error help-block" style="display:none;"></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="mkt_mobile" id="mkt_mobile" class="form-control" placeholder="">
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
<script>
    $('#marketing').change(function () {
        var mobile = $('#marketing option:selected').attr('mobile-value');
        $("#mkt_mobile").val(mobile);

    });

    jQuery(function($) {



        $('#dateStart').click(function () {
            $('#warning-date').html('');
        });
    });

</script>