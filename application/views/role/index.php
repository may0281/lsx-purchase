<title>Dashboard | Role Management </title>
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/columnfilter/jquery.dataTables.columnFilter.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/DT_bootstrap.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/demo/ui_general.js"></script>
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
                        <a href="#" title=""><?php echo strtoupper($menu); ?></a>
                    </li>
                </ul>
                <ul class="crumb-buttons">
                    <?php if($this->hublibrary_model->permission('authen','init-role','create') == true) { ?>
                    <li><a href="<?php echo base_url(); ?>authen/init-role/create" title=""><i class="icon-plus"></i><span>ADD ROLE</span></a></li>
                    <?php } ?>
                </ul>
            </div>

            <!--=== Page Header ===-->
            <div class="page-header">
                <div class="page-title">
                    <h3><?php echo strtoupper($menu) ?></h3>
                    <span></span>
                </div>
            </div>

            <!--=== Normal ===-->
            <div class="row">
                <div class="col-md-12">
                    <div class="widget box">
                        <div class="widget-header">
                            <h4><i class="icon-reorder"></i> Managed Table</h4>
                            <div class="toolbar no-padding">
                                <div class="btn-group">
                                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content">
                            <table class="table table-striped table-bordered table-hover table-checkable datatable" data-display-length="30">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role Code</th>
                                    <th>Description</th>
                                    <th>Create</th>
                                    <th>Last Update</th>
                                    <th class="align-center">Edit</th>
                                    <th class="align-center">Del</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $i=1;foreach ($q as $r) { ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $r['role_code'];?></td>
                                    <td><?php echo $r['role_desc'];?></td>
                                    <td><?php echo $r['create_by'];?> <br> <?php echo $r['create_date'];?> </td>
                                    <td><?php echo $r['update_by'];?> <br> <?php echo $r['update_date'];?> </td>

                                    <td class="align-center">
                                        <?php if($this->hublibrary_model->permission('authen','init-role','update') == true) { ?>
                                        <a class="btn btn-sm btn-warning" href="<?php echo base_url(); ?>authen/init-role/update/<?php echo $r['role_code']; ?>">
                                            <i class="icon-edit"></i>
                                        </a>
                                        <?php } ?>
                                    </td>
                                    <td class="align-center">
                                        <?php if($this->hublibrary_model->permission('authen','init-role','delete') == true) { ?>
                                        <a data-toggle="modal" href="#delete-<?php echo $i;?>" class="btn btn-sm btn-danger"><i class=" icon-remove"></i></a>
                                        <?php }?>
                                    </td>
                                </tr>
                                    <div class="modal fade" id="delete-<?php echo $i;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form class="form-horizontal row-border" method="get" action="<?php echo base_url(); ?>authen/delete-role/<?php echo $r['role_code'];?>">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Delete</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to delete this role (<?php echo $r['role_code']; ?>) ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Delete</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
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