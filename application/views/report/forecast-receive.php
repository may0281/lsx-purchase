<title> ประมาณการสินค้าเข้า </title>
<style>
	.print:last-child {
		page-break-after: auto;
	}
	@media print
	{
		@page { margin: 0;margin-top: 30px }
		body  {  height: 99%;   }
		.no-print, .no-print *
		{
			display: none !important;
		}
	}
</style>
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
						<a href="#" title=""><?php echo strtoupper($menu); ?></a>
					</li>
					<li class="current">
						<a href="#" title="">Forecast Receive Date By Item</a>
					</li>
				</ul>
			</div>

			<!--=== Page Header ===-->
			<div class="page-header">
				<div class="page-title">
					<h3>Forecast Receive Date By Item</h3>
					<span></span>
				</div>

			</div>
			<!--=== Normal ===-->
			<div class="row">
				<div class="col-md-12">
					<div class="widget box">

						<?php
							$totalLast =  count($month['lastMonth']['weeks']);
							$totalCurrent =  count($month['currentMonth']['weeks']);
							$totalNext1 =  count($month['next1Month']['weeks']);
							$totalNext2 =  count($month['next2Month']['weeks']);
							$totalColumn = $totalLast+$totalCurrent+$totalNext1+$totalNext2;
						?>
						<div class="widget-content">
							<table class="table table-bordered datatable  "data-display-length="55">
								<thead>
								<tr>
									<th class="align-center" style="vertical-align: middle" rowspan="2">ITEM</th>
									<th class="align-center" style="vertical-align: middle" rowspan="2">QTY</th>
									<th class="align-center" colspan="<?php echo $totalLast;?>"><?php echo $month['lastMonth']['month'] ?></th>
									<th class="align-center" colspan="<?php echo $totalCurrent;?>"><?php echo $month['currentMonth']['month'] ?></th>
									<th class="align-center" colspan="<?php echo $totalNext1;?>"><?php echo $month['next1Month']['month'] ?></th>
									<th class="align-center" colspan="<?php echo $totalNext2;?>"><?php echo $month['next2Month']['month'] ?></th>
								</tr>
								<tr>
									<?php
										$i=1; $data =array();
										foreach ($month['lastMonth']['weeks'] as $date){
											$td = array(array('start'=>$date['start'],'end'=>$date['end']));
											$data = array_merge($data, $td);
										?>
										<th class="align-center" style="font-size: 10px">Week <?php echo $i; ?>
											<p><?php echo date('M,d',strtotime($date['start'])); ?> - <?php echo date('M,d',strtotime($date['end'])); ?></p>
										</th>
									<?php $i++;} ?>

									<?php
										$i=1; foreach ($month['currentMonth']['weeks'] as $date){
										$td = array(array('start'=>$date['start'],'end'=>$date['end']));
										$data = array_merge($data, $td);
										?>
										<th class="align-center" style="font-size: 10px">Week <?php echo $i; ?>
											<p><?php echo date('M,d',strtotime($date['start'])); ?> - <?php echo date('M,d',strtotime($date['end'])); ?></p>
										</th>
									<?php $i++; } ?>

									<?php $i=1; foreach ($month['next1Month']['weeks'] as $date){
										$td = array(array('start'=>$date['start'],'end'=>$date['end']));
										$data = array_merge($data, $td);
										?>
										<th class="align-center" style="font-size: 10px">Week <?php echo $i; ?>
											<p><?php echo date('M,d',strtotime($date['start'])); ?> - <?php echo date('M,d',strtotime($date['end'])); ?></p>
										</th>
									<?php $i++; } ?>

									<?php $i=1; foreach ($month['next2Month']['weeks'] as $date){
										$td = array(array('start'=>$date['start'],'end'=>$date['end']));
										$data = array_merge($data, $td);
										?>
										<th class="align-center" style="font-size: 10px">Week <?php echo $i; ?>
											<p><?php echo date('M,d',strtotime($date['start'])); ?> - <?php echo date('M,d',strtotime($date['end'])); ?></p>
										</th>
									<?php $i++; } ?>
								</tr>

								</thead>
								<tbody>
									<?php  $oldPur_code = null; $i=0;
									foreach($items as $item) {  ?>
										<tr>
											<td class="align-center" style="font-size: 11px"><?php echo $item['item_code']; ?></td>
											<td class="align-center"><?php echo $item['item_qty']; ?></td>
											<?php for($j=0; $j<$totalColumn;$j++){  ?>
												<td>
													<?php if($item['dataList']){
														$dataList = $item['dataList'];
														foreach ($dataList as $list)
														{
															if(strtotime($list['puror_forecasts_date']) > strtotime($data[$j]['start'].' 00:00:00') and strtotime($list['puror_forecasts_date']) <= strtotime($data[$j]['end'].' 23:59:59'))
															{
																echo $list['puror_qty'].'<br>';
															}
														}
													?>
													<?php } ?>
												</td>
											<?php } ?>
										</tr>
									<?php $i++; } ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="print"></div>
					<div class="buttons align-right no-print" >
						<a class="btn btn-default btn-lg no-print" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-print"></i> Print</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>