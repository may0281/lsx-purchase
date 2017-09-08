
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
                        <a href="<?php echo base_url();?>project/lists" title=""><?php echo strtoupper($menu); ?></a>
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
								<h4><i class="icon-reorder"></i> Project List</h4>
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
											<th>Name</th>
											<th>Create date</th>
											<th>Action</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									  <?php  $i=1;foreach ($q as $r) { ?>
										<tr>
											<td class="checkbox-column"><?php echo $i;?></td>
											<td><?php echo $r['proj_name'];?></td>
											<td><?php echo $r['proj_createdate'];?></td>
											<td><span class="btn-group">
													<a href="<?php echo base_url();?>project/edit/<?php echo $r['proj_id'];?>" class="btn btn-xs bs-tooltip" title="Edit"><i class="icon-pencil"></i></a>
													<a href="<?php echo base_url();?>project/del/<?php echo $r['proj_id'];?>" class="btn btn-xs bs-tooltip" title="Delete"><i class="icon-trash"></i></a>
												</span></td>
												<td><input type="button" class="btn btn-sm btn-inverse" value="Request Purchase" onclick="location.href='<?php echo base_url();?>purchase/request?p=18'"><!--<?php echo nbs(5);?><input type="button" class="btn btn-sm btn" value="List Request Purchase">--><!--purchase/request?p=18--></td>
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