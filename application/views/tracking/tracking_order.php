<title>Dashboard | Tracking Order</title>
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
<?php
$label = array(
    'request' => 'label-default',
    'approved' => 'label-success',
    'unapproved' => 'label-danger',
    'pending' => 'label-warning',
    'ordered' => 'label-info',
    'received' => 'label-primary',
    'delivered' => 'label-primary',
    'reject' => 'label-danger',
)
?>


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
						<a href="<?php echo base_url($menu);?>" title=""><?php echo strtoupper($menu); ?></a>
					</li>
					<li class="current">
						<a href="#" title=""><?php echo strtoupper($subMenu) ?></a>
					</li>
				</ul>
			</div>

			<!--=== Page Header ===-->
			<div class="page-header">
				<div class="page-title">
					<h3>ประมาณการสินค้าเข้า</h3>
					<span></span>
				</div>
			</div>
			<!--=== Normal ===-->
			<div class="row">
				<div class="col-md-12">
					<div class="widget box">
						<div class="widget-header">
							<h4><i class="icon-reorder"></i> ประมาณการสินค้าเข้า</h4>
							<div class="toolbar no-padding">
								<div class="btn-group">
									<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
								</div>
							</div>
						</div>
						<div class="widget-content">
							<table class="table table-striped table-bordered table-hover table-checkable datatable" data-display-length="25">
								<thead>
								<tr>
									<th>No</th>
									<th>Item</th>
									<th>Order QTY</th>
									<th>PO No.</th>
									<th>Order Date</th>
									<th>Forecast Receive Date</th>
									<th>Project</th>
									<th>Purchase Code</th>
									<th>Req. Qty</th>
									<th>Request ETD</th>
								</tr>
								</thead>
								<tbody>
								<?php $i=1; foreach ($item as $it){ ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $it['item_code']; ?></td>
										<td><?php echo $it['order_qty']; ?></td>
										<td><?php echo $it['puror_code']; ?></td>
										<td><?php echo $it['puror_order_date']; ?></td>
										<td><?php echo $it['puror_forecasts_date']; ?></td>

										<td><?php echo $it['proj_name']; ?></td>
										<td><?php echo $it['purq_code']; ?></td>
										<td><?php echo $it['request_qty']; ?></td>




										<td><span class="label label-warning"><?php echo $it['purq_require_end'] ?></span></td>
									</tr>
									<?php $i++;} ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>