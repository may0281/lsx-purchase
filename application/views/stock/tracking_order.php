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
								<h4><i class="icon-reorder"></i>Track Order List</h4>
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
											<th>Order ID</th>
											<th>Item</th>
											<th>Qty</th>
											<th>Project</th>
											<th class="hidden-xs">Purchase ID</th>
											<th class="hidden-xs">Request by</th>
											<th>Request Date</th>
											<th class="hidden-xs">Order Date</th>
											<th class="hidden-xs">Order by</th>
											<th>Start date</th>
											<th>End date</th>
											<th>ของเข้าโดยประมาณ</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Order301</td>
											<td>AS-14015 C S15</td>
											<td>130</td>
											<td>Suparai Condo</td>
											<td class="hidden-xs">0001</td>
											<td class="hidden-xs">Sukanya</td>
											<td class="hidden-xs">11/06/2017</td>
											<td class="hidden-xs">14/06/2017</td>
											<td class="hidden-xs">Warut</td>
											<td class="hidden-xs">1/05/2017</td>
											<td class="hidden-xs">1/09/2017</td>
											<td class="hidden-xs">3/08/2017</td>
											<td><span class="label label-warning">Pending</span></td>									
										</tr>
									<tr>
											<td>1</td>
											<td>Order302</td>
											<td>AS-14015 C S14</td>
											<td>150</td>
											<td>Suparai Condo Sukumvit</td>
											<td class="hidden-xs">0001</td>
											<td class="hidden-xs">Sukanya</td>
											<td class="hidden-xs">3/05/2017</td>
											<td class="hidden-xs">1/05/2017</td>
											<td class="hidden-xs">Warut</td>
											<td class="hidden-xs">1/05/2017</td>
											<td class="hidden-xs">10/07/2017</td>
											<td class="hidden-xs">19/08/2017</td>
											<td><span class="label label-success">delivered</span></td>									
										</tr>
									</tbody>
									<tfoot>
									<td colspan="13"></td>
									<td></td>
									</tfoot>
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