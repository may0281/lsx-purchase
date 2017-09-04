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
                        <a href="<?php echo base_url();?>stock/export_by_order" title=""><?php echo strtoupper($menu); ?></a>
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
								<h4><i class="icon-reorder"></i> Purchase Request Item List</h4>
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
											<th>Item Info</th>
											<th>Project Owner</th>
											<th>Request Qty</th>
											<th>Stock Qty</th>
											<th>Min Qty</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php $dis =0; $i=1;foreach ($q as $r) { ?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $r['item_code'];?></td>
											<td>
											Size: <?php echo $r['item_size'];?><br />
											Thickness: <?php echo $r['item_thickness'];?><br />
											P.Film: <?php echo $r['item_pfilm'];?><br />
											AICA: <?php echo $r['item_aica'];?><br />
											</td>
											<td><?php echo $r['firstname'];?> <?php echo $r['lastname']?></td>
											<td><?php echo $r['qty'];?></td>
											<td>
											<?php 
											if($r['qty'] > $r['item_qty']){
											$dis = 1;
												echo '<span style="color:#FF0000">';
												echo $r['item_qty'];
												echo '</span>';
											}else{
												echo $r['item_qty'];
											  }
											?>
											</td>
											<td><?php echo $r['item_min'];?></td>
											<td><input type="checkbox" checked="checked" disabled="disabled"></td>
										</tr>
									<?php $i++; }?>	
									</tbody>
								</table>
								<div align="right"><input class="btn btn-sm btn-inverse" type="submit" value="ยืนยัน" style="margin:10px" onclick="window.location.href='<?php echo base_url(); ?>stock/export_item_action/<?php echo $this->uri->segment(3); ?>'" <?php if($dis =='1'){ echo 'disabled="disabled"'; } ?>></div>
							</div>
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