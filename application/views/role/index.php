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
                        <a href="<?php echo base_url();?>blog" title=""><?php echo strtoupper($menu); ?></a>
                    </li>
                    <li class="current">
                        <a href="#" title=""><?php echo strtoupper($subMenu) ?></a>
                    </li>
                </ul>
                <ul class="crumb-buttons">
                    <li><a href="<?php echo base_url(); ?>authen/init-role/create" title=""><i class="icon-plus"></i><span>ADD ROLE</span></a></li>

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
                                    <th data-hide="phone,tablet">Edit</th>
                                    <th data-hide="phone,tablet">Del</th>
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

                                    <td data-hide="phone,tablet"><a href="<?php echo base_url(); ?>authen/init-role/update/<?php echo $r['role_code']; ?>" title="Edit">Edit </a></td>
                                    <td data-hide="phone,tablet"><a href="<?php echo base_url(); ?>authen/delete-role/<?php echo $r['role_code']; ?>" title="Del">Del </a></td>
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