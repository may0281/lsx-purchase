
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
                    <h3><?php echo strtoupper($subMenu) ?><? echo $this->uri->segment(3); ?>
					 
					<?php
						$this->db->select('impre_qty, SUM(impre_qty) as total');
						$this->db->from('import_item_report');
						$this->db->where('impre_ipo',$this->uri->segment(3));	 
						$this->db->where('impre_import_num',$this->uri->segment(4));	
						$this->db->group_by('impre_qty'); 
						$query = $this->db->get();
						$row = $query->row();
						if ($query->num_rows() > 0)
						{
							$total = $row->total;
						}
					?>
					(Total Imported <?php echo $total; ?> Item.)
					</h3>
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
								<h4><i class="icon-reorder"></i>Transaction List</h4>
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
											<th>PO</th>
											<th>Item NO.</th>
											<th>AICA Finish</th>
											<th>P. Film</th>
											<th>SIZE</th>
											<th>Thickness</th>
											<th>Unit Price</th>
											<th>QTY</th>
										</tr>
									</thead>
									<tbody>
									<?php  $i=1;foreach ($q as $r) { ?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $r['impre_ipo'];?></td>
											<td><?php echo $r['impre_item_code'];?></td>
											<td><?php echo $r['item_aica'];?></td>
											<td><?php echo $r['item_pfilm'];?></td>
											<td><?php echo $r['item_size'];?></td>
											<td><?php echo $r['item_thickness'];?></td>
											<td><?php echo $r['stk_unit_price'];?></td>
											<td><?php echo $r['impre_qty'];?></td>
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