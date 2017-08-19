
<!-- Forms -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/uniform/jquery.uniform.min.js"></script> <!-- Styled radio and checkboxes -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->

<!-- DataTables -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/columnfilter/jquery.dataTables.columnFilter.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/DT_bootstrap.js"></script>

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
        <!-- /Breadcrumbs line -->

        <!--=== Page Header ===-->
        <div class="page-header">
            <div class="page-title">
                <h3><?php echo strtoupper($subMenu) ?></h3>
            </div>
        </div>

        <form class="form-horizontal"method="post" action="<?php echo base_url('purchase/pre-order/create')?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget box">
                        <div class="widget-header">
                            <h4><i class="icon-reorder"></i> REQUEST ITEM</h4>

                        </div>
                        <div class="widget-content">
                            <table class="table table-bordered table-hover table-checkable ">
                                <thead>
                                <tr>
                                    <th class="checkbox-column">
                                        <input type="checkbox" class="uniform">
                                    </th>
                                    <th>Item Code</th>
                                    <th>Project</th>
                                    <th>QTY</th>
                                    <th>In Stock</th>
                                    <th>Minimum</th>
                                    <th>Suggest</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach ($list as $li){ $suggest = ($li['item_min']-$li['item_qty'])+$li['qty'];  $itemFromPurchase[] = $li['item_code']; ?>
                                    <tr>
                                        <td class="checkbox-column">
                                            <input type="checkbox" name="item[]" value="<?php echo $li['item_code']; ?>,<?php echo $li['purq_id']; ?>,<?php echo $i ?>" class="uniform">
                                        </td>
                                        <td><?php echo $li['item_code']; ?> </td>
                                        <td><?php echo $li['proj_name']; ?> - [ <?php echo $li['purq_code']; ?> ] </td>
                                        <td><?php echo $li['qty']; ?> </td>
                                        <td><?php if($li['item_code'] != $oldItem){  echo $li['item_qty']; } ?> </td>
                                        <td><?php if($li['item_code'] != $oldItem){  echo $li['item_min']; } ?> </td>
                                        <td>
                                            <?php if($li['item_code'] == $oldItem){  $suggest = $li['qty']; } ?>
                                            <span class="filter_column filter_text">
                                                <input type="text" name="suggest-<?php echo $i ?>" class="text_filter form-control" placeholder="<?php echo $suggest; ?>" value="<?php echo $suggest?>">
                                            </span>
                                        </td>
                                    </tr>
                                    <?php  $oldItem = $li['item_code']; $i++; } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="widget box">
                        <div class="widget-header">
                            <h4><i class="icon-reorder"></i> STOCK ITEM LESS THAN MINIMUM</h4>

                        </div>
                        <div class="widget-content">
                            <table class="table table-bordered table-hover table-checkable">
                                <thead>
                                <tr>
                                    <th class="checkbox-column">
                                        <input type="checkbox" class="uniform" >
                                    </th>
                                    <th>Item Code</th>
                                    <th>In Stock</th>
                                    <th>Minimum</th>
                                    <th>Suggest</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $k=$i;
                                foreach ($item as $it){ $suggest = ($it['item_min']-$it['item_qty']);
                                    if (!in_array($it['item_code'], $itemFromPurchase)) {
                                        ?>
                                        <tr>
                                            <td class="checkbox-column">
                                                <input type="checkbox" class="uniform"  name="item[]" value="<?php echo $it['item_code']; ?>, ,<?php echo $k ?>" >
                                            </td>
                                            <td><?php echo $it['item_code']; ?> </td>
                                            <td><?php echo $it['item_qty']; ?> </td>
                                            <td><?php echo $it['item_min']; ?> </td>
                                            <td>
                                                <span class="filter_column filter_text">
                                                    <input type="text" name="suggest-<?php echo $k ?>" class="text_filter form-control" placeholder="<?php echo $suggest; ?>" value="<?php echo $suggest?>">
                                                </span>
                                            </td>
                                        </tr>
                                    <?php $k++; } } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" value="Submit" class="btn btn-primary pull-right">
            </div>
        </form>
    </div>
</div>