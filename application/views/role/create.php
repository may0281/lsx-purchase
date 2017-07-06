
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
                    <div class="widget-content">
                        <form class="form-horizontal row-border" method="post" id="validate-1" action="<?php echo base_url(); ?>authen/createRoleAction">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Role Code <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="roleCode" class="form-control required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Role Description <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="roleDes" class="form-control required" minlength="5">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Function <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <div class="widget box">

                                        <div class="widget-content no-padding">
                                            <table class="table table-hover table-striped table-checkable table-bordered table-highlight-head table-responsive">
                                                <thead>
                                                <tr>
                                                    <th rowspan="2" class="align-center">#</th>
                                                    <th rowspan="2" class="align-center"> Menu</th>
                                                    <th rowspan="2" class="align-center"> Sub Menu</th>
                                                    <th colspan="5" class="checkbox-column">Permission <input type="checkbox" class="uniform"> </th>
                                                </tr>
                                                <tr>
                                                    <th class="align-center">
                                                        View
                                                    </th>
                                                    <th class="align-center">
                                                        Create
                                                    </th>
                                                    <th class="align-center">
                                                        Update
                                                    </th>
                                                    <th class="align-center">
                                                        Delete
                                                    </th>

                                                    <th class="align-center">
                                                        Change <br> Status
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=1; foreach ($function as $r){ ?>
                                                    <tr>
                                                        <td class="align-center"><?php echo $i; ?></td>
                                                        <td class="hidden-xs"><?php echo $r['masterName'] ?></td>
                                                        <td><?php echo $r['minorName'] ?></td>
                                                        <td class="checkbox-column  align-center">
                                                            <?php if($r['view']){ ?>
                                                                <input type="checkbox" name="functions[]" class="uniform required" value="<?php echo $r['view'] ?>">
                                                            <?php } ?>
                                                        </td>
                                                        <td class="checkbox-column align-center">
                                                            <?php if($r['create']){ ?>
                                                                <input type="checkbox" name="functions[]" class="uniform required" value="<?php echo $r['create'] ?>">
                                                            <?php } ?>
                                                        </td>
                                                        <td class="checkbox-column align-center">
                                                            <?php if($r['update']){ ?>
                                                                <input type="checkbox" name="functions[]" class="uniform required" value="<?php echo $r['update'] ?>">
                                                            <?php } ?>
                                                        </td>
                                                        <td class="checkbox-column align-center">
                                                            <?php if($r['delete']){ ?>
                                                                <input type="checkbox" name="functions[]" class="uniform required" value="<?php echo $r['delete'] ?>">
                                                            <?php } ?>
                                                        </td>
                                                        <td class="checkbox-column align-center">
                                                            <?php if($r['change-status']){ ?>
                                                                <input type="checkbox" name="functions[]" class="uniform required" value="<?php echo $r['change-status'] ?>">
                                                            <?php } ?>
                                                        </td>

                                                    </tr>
                                                <?php $i++; } ?>

                                                </tr>
                                                </tbody>
                                            </table>

                                        </div> <!-- /.widget-content -->
                                    </div> <!-- /.widget -->
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