<title>Dashboard | Purchase Order </title>

<!-- Forms -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/uniform/jquery.uniform.min.js"></script> <!-- Styled radio and checkboxes -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->

<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/columnfilter/jquery.dataTables.columnFilter.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/datatables/DT_bootstrap.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>plugins/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/noty/layouts/top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/noty/themes/default.js"></script>
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
                    <a href="<?php echo base_url().'purchase/po-report';?>" title=""><?php echo strtoupper($menu); ?></a>
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
                <h3><?php echo $menu ?> </h3>
            </div>
        </div>

        <form class="form-horizontal" method="post" action="<?php echo base_url('purchase/pre-order/create')?>"  onsubmit="return checkForm(this);">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label id="" class="col-md-3 align-center">SHIPPING *</label>
                        <label id="" class="col-md-3 align-center">SHIPPING TERMS *</label>
                        <label id="" class="col-md-3 align-center">DESTINATION *</label>
                        <label id="" class="col-md-3 align-center">PAYMENT TERM *</label>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <select name="puror_shipping_method" id="puror_shipping_method" class="col-md-12 select2 full-width-fix required">
                                <option value=""></option>
                                <option value="SEA FREIGHT">SEA FREIGHT</option>
                                <option value="AIR FREIGHT">AIR FREIGHT</option>
                            </select>
                            <label id="msg_shipping_method" style="color: red;"></label>
                        </div>
                        <div class="col-md-3">
                            <select name="puror_shipping_term" id="puror_shipping_term" class="col-md-12 select2 full-width-fix required">
                                <option value=""></option>
                                <option value="CIF">CIF</option>
                            </select>
                            <label id="msg_shipping_term" style="color: red;"></label>
                        </div>

                        <div class="col-md-3">
                            <select name="puror_shipping_destination" id="puror_shipping_destination" class="col-md-12 select2 full-width-fix required">
                                <option value=""></option>
                                <option value="BKK">BKK</option>
                            </select>
                            <label id="msg_shipping_destination" style="color: red;"></label>
                        </div>
                        <div class="col-md-3">
                            <select name="puror_shipping_payment_term" id="puror_shipping_payment_term" class="col-md-12 select2 full-width-fix required">
                                <option value=""></option>
                                <option value="L/C At 90 Days After Sight">L/C At 90 Days After Sight</option>
                                <option value="T/T At 180 Days After Sight">T/T At 180 Days After Sight</option>
                                <option value="T/T At 30 Days After Sight">T/T At 30 Days After Sight</option>
                            </select>
                            <label id="msg_shipping_payment_term" style="color: red;"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 align-left">Note</label>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea rows="3" cols="5" name="puror_note" class="form-control wysiwyg"></textarea>
                        </div>
                    </div>
                    <div class="widget box">
                        <div class="widget-header">
                            <h4><i class="icon-reorder"></i>PURCHASE REQUEST ITEM</h4>

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
                                            <input type="checkbox" name="item[]" value="<?php echo $li['item_code']; ?>,<?php echo $li['purq_id']; ?>,<?php echo $i ?>,<?php echo $li['item_price']?>" class="uniform item">
                                        </td>
                                        <td><?php echo $li['item_code']; ?> </td>
                                        <td><?php echo $li['proj_name']; ?> - [ <?php echo $li['purq_code']; ?> ] </td>
                                        <td><?php echo $li['qty']; ?> </td>
                                        <td><?php if($li['item_code'] != $oldItem){  echo $li['item_qty']; } ?> </td>
                                        <td><?php if($li['item_code'] != $oldItem){  echo $li['item_min']; } ?> </td>
                                        <td>
                                            <?php if($li['item_code'] == $oldItem){  $suggest = $li['qty']; } ?>
                                            <span class="filter_column filter_text">
                                                <input type="text" name="suggest-<?php echo $i ?>" class="text_filter form-control" placeholder="<?php echo $suggest; ?>" value="<?php echo ($suggest>0)? $suggest : 0; ?>">
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

                                foreach ($item['unOrdered'] as $it){ $suggest = ($it['item_min']-$it['item_qty']);
                                    if (!in_array($it['item_code'], $itemFromPurchase)) {
                                        ?>
                                        <tr>
                                            <td class="checkbox-column">
                                                <input type="checkbox" class="uniform item"  name="item[]" value="<?php echo $it['item_code']; ?>, ,<?php echo $k ?>,<?php echo $it['item_price']?>" >
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

            <div class="row">
                <div class="col-md-12">
                    <div class="widget box">
                        <div class="widget-header">
                            <h4><i class="icon-reorder"></i> STOCK ITEM LESS THAN MINIMUM [ IN PURCHASE ORDER ]</h4>
                        </div>
                        <div class="widget-content">
                            <table class="table table-bordered table-hover table-checkable">
                                <thead>
                                <tr>
                                    <th class="checkbox-column">
                                        <input type="checkbox" class="uniform" >
                                    </th>
                                    <th>Item Code</th>
                                    <th>Purchase Code </th>
                                    <th>In Stock</th>
                                    <th>Minimum</th>
                                    <th>Suggest</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $j=$k;

                                foreach ($item['ordered'] as $it_o){ $suggest = ($it_o['item_min']-$it_o['item_qty']);
                                    if (!in_array($it_o['item_code'], $itemFromPurchase)) {
                                        ?>
                                        <tr>
                                            <td class="checkbox-column">
                                                <input type="checkbox" class="uniform item"  name="item[]" value="<?php echo $it_o['item_code']; ?>, ,<?php echo $j ?>,<?php echo $it_o['item_price']?>" >
                                            </td>
                                            <td><?php echo $it_o['item_code']; ?> </td>
                                            <td><?php
                                                    foreach ($it_o['purchaseCode'] as $purorCode)
                                                    {
                                                        echo '<p>'.$purorCode['puror_code'] . ' = [' . $purorCode['puror_qty'] .'] <span class="label label-default" >'.date('Y M d',strtotime($purorCode['puror_forecasts_date'])). '</span><br> </p>';
                                                    }

                                                ?>
                                            </td>
                                            <td><?php echo $it_o['item_qty']; ?> </td>
                                            <td><?php echo $it_o['item_min']; ?> </td>
                                            <td>
                                                <span class="filter_column filter_text">
                                                    <input type="text" name="suggest-<?php echo $j ?>" class="text_filter form-control" placeholder="<?php echo $suggest; ?>" value="<?php echo $suggest?>">
                                                </span>
                                            </td>
                                        </tr>
                                    <?php $j++; } } ?>

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

<script type="application/javascript">

    $('#puror_shipping_method').change(function() {
        $('#msg_shipping_method').html('');
    });

    $('#puror_shipping_term').change(function() {
        $('#msg_shipping_term').html('');
    });

    $('#puror_shipping_destination').change(function() {
        $('#msg_shipping_destination').html('');
    });

    $('#puror_shipping_payment_term').change(function() {
        $('#msg_shipping_payment_term').html('');
    });

    
    function checkForm(form) {
        var status = true;
        var default_msg = 'This field is required.';
        var numberOfChecked = $('.item:checked').size();


        if(form.puror_shipping_method.value == '')
        {
            $("#msg_shipping_method").html(default_msg);
            status = false;
        }

        if(form.puror_shipping_term.value == '')
        {
            $("#msg_shipping_term").html(default_msg);
            status = false;
        }

        if(form.puror_shipping_destination.value == '')
        {
            $("#msg_shipping_destination").html(default_msg);
            status = false;
        }

        if(form.puror_shipping_payment_term.value == '')
        {
            $("#msg_shipping_payment_term").html(default_msg);
            status = false;
        }

        if(status == false)
        {
            noty({
                text: 'Please fill the information.',
                type: 'error',
                layout: 'top',
                timeout: 2000,
                modal: 'false'
            });
            return false;
        }


        if(numberOfChecked == 0 )
        {
            noty({
                text: 'Please select at least 1 item.',
                type: 'error',
                layout: 'top',
                timeout: 2000,
                modal: 'false'
            });
            return false;
        }



        var r = confirm("Are you sure to purchasing order?");
        if (r == true) {

            return true;

        } else {

            return false;
        }
    }
</script>