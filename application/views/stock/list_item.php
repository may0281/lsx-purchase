
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
            <div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Item List</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<table class="table table-striped table-bordered table-hover table-checkable datatable"  data-display-length="50">
									<thead>
										<tr>
											<th>No</th>
											<th>Item Code</th>
											<th>Size</th>
											<th>Thickness</th>
											<th>P.film</th>
											<th>AICA</th>
											<th>Total Qty</th>
											<th>Min Qty</th>
											<th>Item Price</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php  $i=1;foreach ($q as $r) { ?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $r['item_code'];?></td>
											<td><?php echo $r['item_size'];?></td>
											<td><?php echo $r['item_thickness'];?></td>
											<td><?php echo $r['item_pfilm'];?></td>
											<td><?php echo $r['item_aica'];?></td>
											<td><?php echo $r['item_qty'];?></td>
											<td><?php echo $r['item_min'];?></td>
											<td><?php echo $r['item_price'];?> $</td>
											<td><?php echo nbs(5);?>
												<?php if($this->hublibrary_model->permission('stock','stock','update')== true){ ?>
												<input type="button" onClick="location.href='<?php echo base_url(); ?>stock/edit_item/<?php echo $r['item_id'];?>'" class="btn btn-sm btn" value="Edit">
												<?php } ?>
												<?php echo nbs(5);?>
												<input type="button" onClick="location.href='<?php echo base_url(); ?>stock/stock_item/<?php echo $r['item_id'];?>'" class="btn btn-sm btn-success" value="Imported Detail">

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

</body>