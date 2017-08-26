
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/columnfilter/jquery.dataTables.columnFilter.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/DT_bootstrap.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->

<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/responsive/datatables.responsive.js"></script> <!-- optional -->

<script type="text/javascript" src="<?php echo base_url();?>plugins/bootbox/bootbox.min.js"></script>
<!--<script type="text/javascript" src="--><?php //echo base_url();?><!--assets/js/demo/ui_general.js"></script>-->
<script type="text/javascript" src="<?php echo base_url();?>plugins/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/noty/layouts/top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/noty/themes/default.js"></script>
<!-- Forms -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->



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
            <!--=== Validation Example 1 ===-->
            <div class="col-md-12">
                <div class="widget box">
                    <div class="widget-header">
                        <h4><i class="icon-reorder"></i> Searching by.</h4>
                    </div>
                    <div class="widget-content">
                        <form class="form-horizontal row-border" method="post" action="<?php echo base_url('stock/export_by_order/search'); ?>"  >
                            <div class="form-group">
                                <label class="col-md-2 control-label">Project</label>
                                <div class="col-md-5 clearfix">
                                    <select name="proj_id" id="proj_id" class="col-md-12 select2 full-width-fix required">
                                       		<option></option>
											<?php foreach ($pj as $j) { ?>
                                            <option value="<?php echo array_get($j,'proj_id'); ?>" <?php echo (array_get($j,'proj_id') == $proj_id)? 'selected' : null ?>><?php echo array_get($j,'proj_name'); ?></option>
											<?php } ?>
                                    </select>
                                    <label id="msg_proj" class="errors"> </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Owner Project</label>
                                <div class="col-md-5 clearfix">
                                    <select name="proj_owner_name" id="proj_owner_name" class="col-md-12 select2 full-width-fix required">
                                     	    <option></option>
                                           	<?php foreach ($own as $o) { ?>
                                            <option value="<?php echo array_get($o,'account'); ?>" <?php echo (array_get($o,'account') == $proj_owner_name)? 'selected' : null ?>><?php echo array_get($o,'firstname'); ?> <?php echo array_get($o,'lastname'); ?></option>
											<?php } ?>
                                    </select>
                                    <label id="msg_proj" class="errors"> </label>
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-2 control-label">Purchase ID</label>
                                <div class="col-md-5 clearfix">
                                    <select name="purq_id" id="purq_id" class="col-md-12 select2 full-width-fix required">
                                        	<option></option>
                                           <?php foreach ($pur as $p) { ?>
                                            <option value="<?php echo array_get($p,'purq_id'); ?>" <?php echo (array_get($p,'purq_id') == $purq_id)? 'selected' : null ?>><?php echo array_get($p,'purq_code'); ?></option>
											<?php } ?>
                                    </select>
                                    <label id="msg_proj" class="errors"> </label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Search" class="btn btn-primary pull-right">
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /Validation Example 1 -->
            </div>
        </div>
			
            <div class="row">
                <div class="col-md-12">
                    <div class="widget box">
                        <div class="widget-header">
                            <h4><i class="icon-reorder"></i> Purchase Request List</h4>
                            <div class="toolbar no-padding">
                                <div class="btn-group">
                                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content">
                            <table class="table table-striped table-bordered table-hover table-checkable datatable" data-display-length="30" data-dataTable='{"bSort": false}'>
                                <thead>
                                <tr>
                                    <th>#</th>

                                    <th>Project</th>
                                    <th>Project Owner</th>
                                    <th>Designer</th>
                                    <th>Contractor</th>
                                    <th>Product Code</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                  <!--  <th>Total About</th>-->
                                    <th class="align-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $i=1;foreach ($q as $r) { ?>
                                <tr id="tr_<?php echo $r['purq_id'];?>">
                                    <td><?php echo $r['purq_code'];?></td>
                                    <td><?php echo $r['proj_name'];?></td>
                                    <td><?php echo $r['firstname'];?> <?php echo $r['lastname'];?></td>
                                    <td><?php echo $r['designer_name'];?></td>
                                    <td><?php echo $r['contractor_name'];?></td>
                                    <td>
                                        <?php  $purchaseItem = $this->purchase_model->getPurchaseItem($r['purq_id']);
                                            foreach ($purchaseItem as $purqItem) {
                                                echo $purqItem['item_code'] . ' = ' . $purqItem['qty'] . '<br>';
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo date('Y-m-d',strtotime($r['purq_require_start']));?></td>
                                    <td><?php echo date('Y-m-d',strtotime($r['purq_require_end']));?></td>
                                    <td class="align-center">
                                        <span class="btn-group">
                               			<a href="<?php echo base_url('stock/export_by_order_sum/'.$r['purq_id'].''); ?>">เบิก</a>
                                        </span>
                                    </td>
                                </tr>
                                <?php $i++; }?>
                            </tbody>
                            </table>
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

