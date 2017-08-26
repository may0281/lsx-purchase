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

			<!--<div class="row">
			<div class="col-md-12">
			<div class="widget box">
			<div class="widget-header">
			<h4><i class="icon-reorder"></i>เลือกนำข้อมูลเข้าแบบ Import File</h4>
			</div>
			<div class="widget-content">
			<form class="form-horizontal row-border" method="post" action="<?php echo base_url(); ?>stock/import_item/2" enctype="multipart/form-data">
			<div class="form-group">
			<label class="col-md-2 control-label">File Upload:</label>
			<div class="col-md-10">
			<input type="file" name="file" data-style="fileinput">
			</div>
			</div>
			<div align="left"><a href="<?php echo base_url(); ?>stock/temp_list/2">รายการที่ Import ค้างไว้</a></div><div align="right"><input class="btn btn-sm btn-primary" type="submit" value="Import"> <input class="btn" type="reset" value="Reset"></div>
			
			</form>
			</div>
			</div>
			</div>
			</div>-->
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
											<th>Size</th>
											<th>Thickness</th>
											<th>P.film</th>
											<th>AICA</th>
											<th class="hidden-xs">Total Qty</th>
											<th class="hidden-xs">Min Qty</th>
											<th class="hidden-xs">Item Price</th>
											<th class="hidden-xs"></th>
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
											<td class="hidden-xs"><?php echo $r['item_qty'];?></td>
											<td class="hidden-xs"><?php echo $r['item_min'];?></td>
											<td class="hidden-xs"><?php echo $r['item_price'];?> $</td>
											<td class="hidden-xs"><?php echo nbs(5);?>
											<input type="button" onClick="location.href='<?php echo base_url(); ?>stock/add_more_item/<?php echo $r['item_id'];?>'" class="btn btn-sm btn" value="Add more item"><?php echo nbs(5);?><input type="button" onClick="location.href='<?php echo base_url(); ?>stock/stock_item/<?php echo $r['item_id'];?>'" class="btn btn-sm btn-success" value="Imported Detail">
											</td>
										</tr>
									<?php $i++; }?>	
									</tbody>
								</table>
								<div align="right"><!--<input class="btn btn-sm btn-primary" type="button"  onclick="window.location.href='<?php echo base_url(); ?>stock/export_by_order'" value="เบิกสินค้า">-->
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