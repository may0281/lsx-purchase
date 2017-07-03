<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/columnfilter/jquery.dataTables.columnFilter.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/DT_bootstrap.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/demo/ui_general.js"></script>
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
                    <li><a href="<?php echo base_url(); ?>authen/create-user" title=""><i class="icon-plus"></i><span>ADD USER</span></a></li>

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
                                    <th>Enable</th>
                                    <th>User</th>
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>Last Login</th>
                                    <th class="align-center">Edit</th>
                                    <th class="align-center">Del</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $i=1;foreach ($q as $r) { ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td class="checkbox-column">
                                        <input type="checkbox" class="uniform" onchange="OnChangeCheckbox (this)" id="myCheckbox" <?php if($r['status']== 'A'){ echo "checked";}?>   value="<?php echo $r['account'];?>" />
                                    </td>
                                    <td><?php echo $r['account'];?></td>
                                    <td><?php echo $r['role_id'];?></td>
                                    <td><?php echo $r['firstname'] .' ' . $r['lastname'];?></td>
                                    <td><?php echo $r['last_login_date'];?></td>

                                    <td class="align-center">
                                        <a class="btn btn-sm btn-warning" href="<?php echo base_url(); ?>authen/update-user/<?php echo $r['account']; ?>">
                                            <i class="icon-edit"></i>
                                        </a>
                                    </td>
                                    <td class="align-center">
                                        <a class="btn btn-sm btn-danger" href="<?php echo base_url(); ?>authen/delete-user/<?php echo $r['account']; ?>" onclick="delFunction()">
                                            <i class=" icon-remove"></i>
                                        </a>
                                    </td>
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

<script  type="text/javascript">
    function delFunction() {
        var r = confirm("Are you sure to delete user?");
        if (r == true) {
            return true;
        }
    }

    function OnChangeCheckbox (checkbox) {
        var id = checkbox.value;
        var base_url = "<?php echo base_url();?>";
        if (checkbox.checked) {
            window.location.href = base_url + "user/enable/A/" + id;
        }
        else {
            window.location.href = base_url + "user/enable/I/" + id;
        }
    }
</script>

