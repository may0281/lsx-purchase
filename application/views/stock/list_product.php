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
											<th>Order ID</th>
											<th>Item Code</th>
											<th>Price/Unit</th>
											<th class="hidden-xs">Qty</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>1</th>
											<th>0001</th>
											<th>TY-0001</th>
											<th>350</th>
											<th class="hidden-xs">250</th>
										</tr>
											<tr>
											<th>2</th>
											<th>0004</th>
											<th>TYA-114</th>
											<th>200</th>
											<th class="hidden-xs">1,450</th>
										</tr>
											<tr>
											<th>3</th>
											<th>0001</th>
											<th>TY-0001</th>
											<th>450</th>
											<th class="hidden-xs">250</th>
										</tr>
										
									</tbody>
									<tfoot>
									<td colspan="4"></td>
									<td>
									</td>
									</tfoot>
								</table>
								<div align="right"><input class="btn btn-sm btn-primary" type="submit" value="เบิกสินค้า">
									<input class="btn btn-sm btn-inverse" type="submit" value="Export"></div>
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