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
                        <a href="<?php echo base_url();?>stock/add_item" title=""><?php echo strtoupper($menu); ?></a>
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
			<div class="alert alert-danger fade in">
			<i class="icon-remove close" data-dismiss="alert"></i>
			<strong>Error!</strong> พบ Item ที่มีอยู่แล้วใน Stock ไม่สามารถ Import ได้คือ<?php foreach ($t as $item_q) { ?>
			<?php echo $item_q['tmp_item_code'];?><?php echo "&nbsp;";?>
			<?php  }?>	
			</div>

            <div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>Import Temporary</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
							<form name="temp" method="post" action="<?php echo base_url(); ?>stock/import_stock_action/<?php echo $this->uri->segment(3); ?>">
								<table class="table table-striped table-bordered table-hover table-checkable datatable">
									<thead>
										<tr>
										    <th><INPUT type="checkbox" onChange="checkAll(this)" name="chk[]" /></th>
											<th>No</th>
											<th>Item Code</th>
											<th>Size</th>
											<th>Thickness</th>
											<th>P.Film</th>
											<th>ALCA</th>
											<th>Price</th>
											<th>QTY</th>
										</tr>
									</thead>
									<tbody>
									<?php  $i=1;foreach ($q as $r) { ?>
										<tr>
											<td><input type="checkbox" value="<?php echo $r['tmp_item_id'];?>" name="tmp_item_id[]"></td>
											<td><?php echo $i;?></td>
											<td><?php echo $r['tmp_item_code'];?></td>
											<td><?php echo $r['tmp_item_size'];?></td>
											<td><?php echo $r['tmp_item_thickness'];?></td>
											<td><?php echo $r['tmp_item_pfilm'];?></td>
											<td><?php echo $r['tmp_item_aica'];?></td>
											<td><?php echo $r['tmp_item_qty'];?></td>
											<td><?php echo $r['tmp_item_price'];?></td>
										</tr>
									<?php $i++; }?>	
									<tr style="text-align:right">
									<td colspan="9"><input class="btn btn-sm btn-success" type="submit" value="Import to Stock"></td>
									</tr>
									</tbody>
								</table>
								</form>
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
<script>
 function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
</script>
</body>