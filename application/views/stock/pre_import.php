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
                    <a href="<?php echo base_url(strtolower($menu));?>" title=""><?php echo strtoupper($menu); ?></a>
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
        <div class="alert alert-warning "><strong>อัพเดทสำเร็จ จำนวน <?php echo $total_success; ?> รายการ</strong></div>
        <div style="clear:both"></div>
        <?php if($async){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="widget box">
                    <div class="widget-header">
                        <h4><i class="icon-reorder"></i> รายการที่อัพเดทไม่สำเร็จ เนื่องจาก ITEM กับ PO ไม่ตรงกัน</h4>
                        <div class="toolbar no-padding">
                            <div class="btn-group">
                            </div>
                        </div>
                    </div>
                    <div class="widget-content no-padding">
                        <table class="table table-striped table-bordered table-hover table-checkable datatable">
                            <thead>
                            <tr>
                                <th class="checkbox-column">
                                    <input type="checkbox" class="uniform">
                                </th>
                                <th>PO CODE</th>
                                <th>ITEM CODE</th>
                                <th>QTY</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form class="form-horizontal row-border" method="post" action="<?php echo base_url('stock/updateStockAsync')?>">
                                <?php $i=0; foreach ($async as $a){ ?>
                                <tr>
                                    <td class="checkbox-column">
                                        <input type="checkbox" name="row[]" value="<?php echo $i;?>" class="uniform">
                                    </td>
                                    <td><?php echo $a['po_code'] ?></td>
                                    <td><?php echo $a['item_code'] ?></td>
                                    <td><?php echo $a['qty'] ?></td>
                                    <input type="hidden" name="po[]" value="<?php echo $a['po_code'] ?>">
                                    <input type="hidden" name="item[]" value="<?php echo $a['item_code'] ?>">
                                    <input type="hidden" name="qty[]" value="<?php echo $a['qty'] ?>">
                                </tr>
                                <?php $i++; } ?>

                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="form-actions">
                    <a href="<?php echo base_url('stock/list_item') ?>" class="btn btn-default pull-left"> ไม่อัพเดท</a>
                    <input type="submit" value="อัพเดทสต็อกโดยไม่สน PO" class="btn btn-primary pull-right">
                </div>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
