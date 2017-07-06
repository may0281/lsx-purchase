
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

<script type="text/javascript" src="<?php echo base_url(); ?>plugins/nestable/jquery.nestable.min.js"></script>

<!-- Demo JS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/form_validation.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/ui_nestable_list.js"></script>

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
                    <?php $roleData = $data[0]; ?>
                    <div class="widget-content">
                        <form class="form-horizontal row-border" method="post" id="validate-1" action="<?php echo base_url(); ?>authen/updateRoleAction">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Role Code <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="roleCode" disabled value="<?php echo $roleData['role_code'] ?>" class="form-control required">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Role Description <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="roleDes" value="<?php echo $roleData['role_desc'] ?> " class="form-control required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Function <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <div class="widget box">
                                        <div class="widget-header">
                                            <h4><i class="icon-reorder"></i> </h4>
                                            <div class="toolbar no-padding">
                                                <div class="btn-group">
                                                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content no-padding">
                                            <table class="table table-striped table-checkable table-hover table-responsive">
                                                <thead>
                                                <tr>
                                                    <th rowspan="2" class="align-center">#</th>
                                                    <th rowspan="2" class="hidden-xs"> Menu</th>
                                                    <th rowspan="2" >Sub Menu</th>
                                                    <th colspan="5" class="checkbox-column">Permission <input type="checkbox" class="uniform"> </th>
                                                </tr>
                                                <tr>
                                                    <th class="checkbox-column">
                                                        View
                                                    </th>
                                                    <th class="checkbox-column">
                                                        Create
                                                    </th>
                                                    <th class="checkbox-column">
                                                        Update
                                                    </th>
                                                    <th class="checkbox-column">
                                                        Delete
                                                    </th>

                                                    <th class="checkbox-column">
                                                        Change Status
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=1; foreach ($function as $r){ $allow = null; ?>
                                                    <tr>
                                                        <td class="align-center"><?php echo $i; ?></td>
                                                        <td class="hidden-xs"><?php echo $r['masterName'] ?></td>
                                                        <td><?php echo $r['minorName'] ?></td>
                                                        <td class="checkbox-column  align-center">
                                                            <?php if($r['view']){
                                                                $allow = null;
                                                                if (is_array($permission)) {
                                                                    if (in_array($r['view'], $permission, true)) {
                                                                        $allow = 'checked';
                                                                    }
                                                                }
                                                                ?>
                                                                <input type="checkbox" name="functions[]"  <?php echo $allow; ?> class="uniform required" value="<?php echo $r['view'] ?>">
                                                            <?php } ?>
                                                        </td>
                                                        <td class="checkbox-column align-center">
                                                            <?php if($r['create']){
                                                                $allow = null;
                                                                if (is_array($permission)) {
                                                                    if (in_array($r['create'], $permission, true)) {
                                                                        $allow = 'checked';
                                                                    }
                                                                }
                                                                ?>
                                                                <input type="checkbox" name="functions[]" <?php echo $allow; ?>  class="uniform required" value="<?php echo $r['create'] ?>">
                                                            <?php } ?>
                                                        </td>
                                                        <td class="checkbox-column align-center">
                                                            <?php if($r['update']){
                                                                $allow = null;
                                                                if (is_array($permission)) {
                                                                    if (in_array($r['update'], $permission, true)) {
                                                                        $allow = 'checked';
                                                                    }
                                                                }
                                                                ?>
                                                                <input type="checkbox" name="functions[]" <?php echo $allow; ?>  class="uniform required" value="<?php echo $r['update'] ?>">
                                                            <?php } ?>
                                                        </td>
                                                        <td class="checkbox-column align-center">
                                                            <?php if($r['delete']){
                                                                $allow = null;
                                                                if (is_array($permission)) {
                                                                    if (in_array($r['delete'], $permission, true)) {
                                                                        $allow = 'checked';
                                                                    }

                                                                }
                                                                ?>
                                                                <input type="checkbox" name="functions[]" <?php echo $allow; ?>  class="uniform required" value="<?php echo $r['delete'] ?>">
                                                            <?php } ?>
                                                        </td>
                                                        <td class="checkbox-column align-center">
                                                            <?php if($r['change-status']){
                                                                $allow = null;
                                                                if (is_array($permission)) {
                                                                    if (in_array($r['change-status'], $permission, true)) {
                                                                        $allow = 'checked';
                                                                    }
                                                                }
                                                                ?>
                                                                <input type="checkbox" name="functions[]" <?php echo $allow; ?>  class="uniform required" value="<?php echo $r['change-status'] ?>">
                                                            <?php } ?>
                                                        </td>

                                                    </tr>
                                                <?php
                                                    $i++;

                                                 } ?>


                                                </tbody>
                                            </table>

                                        </div> <!-- /.widget-content -->
                                    </div> <!-- /.widget -->
                                </div>
                            </div>

                            <div class="form-actions">
                                <input type="hidden" name="roleCode" value="<?php echo $roleData['role_code'] ?>" >
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