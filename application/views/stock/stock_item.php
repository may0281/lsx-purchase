<body>
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
								<table class="table table-striped table-bordered table-hover table-checkable datatable">
									<thead>
										<tr>
											<th>No</th>
											<th>Item Code</th>
											<th>Add by</th>
											<th>Add Type</th>
											<th>Order ID</th>
											<th>Add Date</th>
											<th>Qty</th>
										</tr>
									</thead>
									<tbody>
									<?php  $i=1;foreach ($q as $r) { ?>
										<tr>
											<th><?php echo $i;?></th>
											<th><?php echo $this->stock_model->getItemcode($r['item_id']);?></th>
											<th><?php echo $r['stk_add_by'];?></th>
											<th><?php echo $r['stk_add_type'];?></th>
											<th><?php echo $r['order_id'];?></th>
											<th><?php echo $r['stk_add_date'];?></th>
											<th><?php echo $r['stk_qty'];?></th>
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