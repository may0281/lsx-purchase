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
						<a href="#" title=""><?php echo strtoupper($submenu) ?></a>
					</li>
				</ul>
			</div>

			<!--=== Page Header ===-->
			<div class="page-header">
				<div class="page-title">
					<h3><?php echo strtoupper($submenu) ?></h3>
					<span></span>
				</div>
				<ul class="page-stats">
					<li>
						<p style="font-size: 15px"><?php echo $startDate;?> TO <?php echo $endDate;  ?></p>
					</li>
					<li>

					</li>
				</ul>
			</div>
			<!--=== Normal ===-->
			<div class="row">
				<div class="col-md-12">
					<div class="widget box">
						<div class="widget-header">
							<h4><i class="icon-reorder"></i> </h4>
							<div class="toolbar no-padding">
								<div class="btn-group">
									<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
								</div>
							</div>
						</div>
						<div class="widget-content">
							<table class="table table-striped table-bordered  datatable" data-display-length="25">
								<thead>
								<tr>
									<th class="align-center">Project</th>
									<th class="align-center">Item Code</th>
									<th class="align-center">Quantity (Sheets)</th>
									<th class="align-center">Stock (Sheets)</th>
									<th class="align-center">ประมาญการ <br>สินค้าเข้า</th>
									<th class="align-center">Request <br> Date</th>
									<th class="align-center">Require <br> Date</th>
									<th class="align-center">Company</th>
									<th class="align-center">MKT</th>
									<th class="align-center">Sale</th>
									<th class="align-center">Remark</th>
								</tr>
								</thead>
								<tbody>
								<?php  foreach ($project as $p){ ?>
									<?php  $oldPur_code = null; $i=0;
									foreach($p['purchase'] as $pu) {  ?>
										<tr>
											<?php if($i==0){ ?><td rowspan="<?php echo count($p['purchase']) ?>"><?php echo $p['proj_name']; ?></td> <?php } ?>
											<td class="align-center"><?php echo $pu['item_code']; ?></td>
											<td class="align-center"><?php echo ($pu['order_qty']) ? $pu['order_qty'] : "สินค้าพร้อมส่ง"; ?></td>
											<td class="align-center"><?php echo $pu['item_qty']; ?></td>
											<td class="align-center"><?php echo ($pu['puror_forecasts_date']) ? date('Y/m/d',strtotime($pu['puror_forecasts_date'])) : null; ?></td>
											<td class="align-center"><?php echo date('Y/m/d',strtotime($pu['purq_create_date'])); ?></td>
											<td><?php echo date('Y/m/d',strtotime($pu['purq_require_start'])); ?> - <br> <?php echo date('Y/m/d',strtotime($pu['purq_require_end'])); ?></td>
											<td class="align-center">
												<?php echo ($pu['proj_owner_name'])? $pu['proj_owner_name'].'<br>' : null  ?>
												<?php echo ($pu['designer_name'])? $pu['designer_name'].'<br>' : null  ?>
												<?php echo ($pu['contractor_name'])? $pu['contractor_name'].'<br>' : null  ?>
											</td>
											<td class="align-center"><?php echo $pu['mkt']; ?></td>
											<td class="align-center"><?php echo $pu['sale']; ?></td>
											<td >
												PR No =  <?php echo $pu['purq_code'];?> </br>
												PR QTY =  <?php echo $pu['qty'];?> </br>
												<?php if($pu['puror_order_date']){ ?>สั่งสินค้าวันที่ <?php echo date('Y/m/d',strtotime($pu['puror_order_date'])); ?> <br>
												PO No =  <?php echo $pu['puror_code'] ?> <br> <?php }?>
												......................................<br>
												<?php echo $pu['purq_comment'] ?>
											</td>
										</tr>
									<?php $oldPur_code = $pu['purq_code']; $i++; } ?>

									<?php } ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>