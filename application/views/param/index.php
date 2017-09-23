<title>Dashboard | <?php echo strtoupper($menu); ?></title>
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

<!-- Form Validation -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/form_validation.js"></script>

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
						<a href="<?php echo base_url('param');?>" title=""><?php echo strtoupper($menu); ?></a>
					</li>

				</ul>
				<ul class="crumb-buttons">
					<?php if($this->hublibrary_model->permission('param',0,'create') == true){ ?>
					<li><a data-toggle="modal" href="#createParamConfig" ><i class="icon-plus"></i><span>Create Config Email</span></a></li>
					<?php }?>
				</ul>
			</div>

			<!--=== Page Header ===-->
			<div class="page-header">
				<div class="page-title">
					<h3><?php echo strtoupper($menu); ?></h3>
					<span></span>
				</div>

			</div>
			<!--=== Normal ===-->
			<div class="row">
				<div class="col-md-12">
					<div class="widget box">
						<div class="widget-header">
							<h4><i class="icon-reorder"></i> List</h4>
							<div class="toolbar no-padding">
								<div class="btn-group">
									<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
								</div>
							</div>
						</div>
						<div class="widget-content">
							<table class="table table-striped table-bordered table-hover table-checkable datatable" data-display-length="25">
								<thead>
								<tr>
									<th>#</th>
									<th>TYPE</th>
									<th>Email</th>
									<th>Description</th>
									<th class="align-center">Option</th>
								</tr>
								</thead>
								<tbody>
								<?php $i=1; foreach ($item as $it){ ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $it['param_key']; ?></td>
										<td><?php echo $it['param_email']; ?></td>
										<td><?php echo $it['param_des']; ?></td>
										<td class="align-center">
											<?php if($this->hublibrary_model->permission('param',0,'update')){?>
												<a class="btn btn-sm btn-warning" data-toggle="modal" href="#updateParamConfig-<?php echo $it['param_id'];?>" ><i class="icon-edit"></i></a>
											<?php }?>
											<?php if($this->hublibrary_model->permission('param',0,'delete')){?>
												<a data-toggle="modal" href="#delete-<?php echo $it['param_id'];?>"class="btn btn-sm btn-danger"><i class=" icon-remove"></i></a>
											<?php }?>
										</td>
										<?php if($this->hublibrary_model->permission('param',0,'update')){?>
											<div class="modal fade" id="updateParamConfig-<?php echo $it['param_id'];?>">
											<div class="modal-dialog">
												<div class="modal-content">
													<form class="form-horizontal row-border" method="post" id="validate-1" action="<?php echo base_url(); ?>param/update">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title">Create Config Email</h4>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label class="col-md-3 control-label">TYPE<span class="required">*</span></label>
																<div class="col-md-9 clearfix">
																	<select name="param_key" class="col-md-12 select2 full-width-fix required">
																		<option></option>
																		<option value="purchase-request" <?php echo ($it['param_key'] == 'purchase-request')? 'selected' : null; ?>>	Purchase Request Send To Email</option>
																		<option value="bat-today" <?php echo ($it['param_key'] == 'bat-today')? 'selected' : null; ?>>	Bat Today Send To Email</option>
																	</select>
																	<label for="chosen1" generated="true" class="has-error help-block" style="display:none;"></label>
																</div>
																<label class="has-error help-block"></label>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label">Email <span class="required">*</span></label>
																<div class="col-md-9">
																	<input type="text" name="param_email" value="<?php echo $it['param_email']; ?>" class="form-control required email">
																	<label class="has-error help-block" style="height: 15px;"></label>
																</div>

															</div>

															<div class="form-group">
																<label class="col-md-3 control-label">Description</label>
																<div class="col-md-9">
																	<textarea  name="param_des" class="form-control"><?php echo $it['param_des']; ?></textarea>
																</div>
																<label class="has-error help-block"></label>
															</div>
														</div>
														<div style="clear:both;"></div>
														<div class="modal-footer">
															<input type="hidden" name="param_id" value="<?php echo $it['param_id'];?>">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary" >Save changes</button>
														</div>
													</form>
												</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
										<?php }?>
										<?php if($this->hublibrary_model->permission('param',0,'delete')){?>
											<div class="modal fade" id="delete-<?php echo $it['param_id'];?>">
											<div class="modal-dialog">
												<div class="modal-content">
													<form class="form-horizontal row-border" method="get" action="<?php echo base_url(); ?>param/delete/<?php echo $it['param_id'];?>">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title">Delete</h4>
													</div>
													<div class="modal-body">
														Are you sure to delete this email [<?php echo $it['param_email']; ?>]?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Delete</button>
													</div>
													</form>
												</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
										<?php }?>
									</tr>

									<?php $i++;} ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="createParamConfig">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-horizontal row-border" method="post" id="validate-1" action="<?php echo base_url(); ?>param/create">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Create Config Email</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-md-3 control-label">TYPE<span class="required">*</span></label>
						<div class="col-md-9 clearfix">
							<select name="param_key" class="col-md-12 select2 full-width-fix required">
								<option></option>
								<option value="purchase-request">	Purchase Request Send To Email</option>
								<option value="bat-today">	Bat Today Send To Email</option>
							</select>
							<label for="chosen1" generated="true" class="has-error help-block" style="display:none;"></label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Email <span class="required">*</span></label>
						<div class="col-md-9">
							<input type="text" name="param_email" class="form-control required email">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Description</label>
						<div class="col-md-9">
							<textarea  name="param_des" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" >Save changes</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="application/javascript">

	function checkForm(form) {

		var r = confirm("Are you sure to purchasing order?");
		if (r == true) {

			return true;

		} else {

			return false;
		}
	}
</script>