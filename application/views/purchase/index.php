<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/columnfilter/jquery.dataTables.columnFilter.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/DT_bootstrap.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/demo/ui_general.js"></script>
<?php

$label = array(
    'request' => 'label-default',
    'approved' => 'label-success',
    'unapproved' => 'label-warning',
    'pending' => 'label-info',
    'ordered' => 'label-default',
    'received' => 'label-primary',
    'delivered' => 'label-primary',
    'reject' => 'label-danger',
)

?>
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
                        <a href="<?php echo base_url($menu);?>" title=""><?php echo strtoupper($menu); ?></a>
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
                            <h4><i class="icon-reorder"></i> Purchase Request List</h4>
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

                                    <th>Project</th>
                                    <th>Project Owner</th>
                                    <th>Designer</th>
                                    <th>Contractor</th>
                                    <th>Product Code</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th class="align-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $i=1;foreach ($data as $r) { ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $r['proj_name'];?></td>
                                    <td><?php echo $r['proj_owner_name'];?></td>
                                    <td><?php echo $r['designer_name'];?></td>
                                    <td><?php echo $r['contractor_name'];?></td>
                                    <td>
                                        <?php  $purchaseItem = $this->purchase_model->getPurchaseItem($r['purq_id']);
                                            foreach ($purchaseItem as $purqItem) {
                                                echo $purqItem['item_code'] . ' = ' . $purqItem['qty'] . '<br>';
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo date('Y-m-d',strtotime($r['purq_require_start']));?></td>
                                    <td><?php echo date('Y-m-d',strtotime($r['purq_require_end']));?></td>
                                    <td><span class="label <?php echo $label[$r['purq_status']]; ?>"><?php echo $r['purq_status'];?></span></td>
                                    <td class="align-center">
                                        <span class="btn-group">
                                            <a href="<?php echo base_url('purchase/request/detail/'.$r['purq_id'])?>" class="btn btn-xs bs-tooltip" title="" data-original-title="Search"><i class="icon-search"></i></a>
                                            <?php if($allowUpdate == true){ ?>
                                                <a href="<?php echo base_url('purchase/request/update/'.$r['purq_id'])?>" class="btn btn-xs bs-tooltip" title="" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                            <?php } ?>
                                            <?php if($allowDelete == true){ ?>
                                                <a href="javascript:void(0);" class="btn btn-xs bs-tooltip" title="" data-original-title="Delete"><i class="icon-trash"></i></a>
                                            <?php } ?>
                                        </span>
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

