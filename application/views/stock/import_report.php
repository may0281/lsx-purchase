
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
											<th>Import ID</th>
											<th>Imported PO</th>
											<th>Date</th>
											<th>Imported QTY</th>
											<th>Imported By</th>
										</tr>
									</thead>
									<tbody>
									<?php  $i=1;foreach ($q as $r) { ?>
										<tr>
											<td><?php echo $i;?></td>
											<td>M<?php echo str_pad($r['impre_import_num'], 5, "0", STR_PAD_LEFT);?></td>
											<td><?php
													$this->db->select('impre_ipo');
													$this->db->from('import_item_report');
													$this->db->where('impre_import_num',$r['impre_import_num']);
													$this->db->group_by('impre_ipo');
													$query = $this->db->get();
													$k = 1;
													foreach ($query->result() as $row)
													{
														 if ($k % 3 == 0){
															echo '<a href="'.base_url().'stock/import_report_po/'.$row->impre_ipo.'/'.$r['impre_import_num'].'">'.$row->impre_ipo.'</a><br>';
														}else{
															echo '<a href="'.base_url().'stock/import_report_po/'.$row->impre_ipo.'/'.$r['impre_import_num'].'">'.$row->impre_ipo.'</a>, ';
														}
														$k ++;
													}
											
											?>
											</td>
											<td><?php echo $r['impre_date'];?></td>
											<td><?php echo $r['total'];?></td>
											<td><?php
											$this->db->select('stk_add_by');
											$this->db->from('stock');
											$this->db->where('stk_id',$r['impre_stk_id']);
											$query = $this->db->get();
											$row = $query->row();
											if ($query->num_rows() > 0)
											{
												echo $row->stk_add_by;
											}
											 ?></td>
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