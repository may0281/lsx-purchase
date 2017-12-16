<title>Dashboard | Purchase Order </title>
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
                        <a href="<?php echo base_url().'purchase/po-report';?>" title=""><?php echo strtoupper($menu); ?></a>
                    </li>

                </ul>
            </div>

            <!--=== Page Header ===-->
            <div class="page-header">
                <div class="page-title">
                    <h3> Purchase Order Report</h3>
                    <span></span>
                </div>
            </div>
            <div class="row row-bg"> <!-- .row-bg -->
                <div class="row">
                    <div class="col-md-11">

                        <form class="form-horizontal row-border" action="" method="get">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Purchase Order Code:</label>
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="puror_code" value="<?php echo $filter['puror_code'];?>" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <label class="col-md-2 control-label">Order Date</label>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="puror_order_date_start" value="<?php echo $filter['puror_order_date_start'];?>" class="form-control datepicker">
                                            <span class="help-block align-center">start</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="puror_order_date_end" value="<?php echo $filter['puror_order_date_end'];?>" class="form-control datepicker">
                                            <span class="help-block align-center">end</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Status</label>
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select name="puror_status" class="form-control" name="select">
                                                <option value="">Select All Status</option>
                                                <option value="ordered" <?php echo ($filter['puror_status'] == 'ordered')? 'selected' : null; ?> >Ordered</option>
                                                <option value="received" <?php echo ($filter['puror_status'] == 'received')? 'selected' : null; ?>>Received</option>
                                                <option value="accrual" <?php echo ($filter['puror_status'] == 'accrual')? 'selected' : null; ?>>Accrual</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <label class="col-md-2 control-label">Forecasts Receive Date</label>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="puror_forecasts_date_start" value="<?php echo $filter['puror_forecasts_date_start'];?>" class="form-control datepicker">
                                            <span class="help-block align-center">start</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="puror_forecasts_date_end" value="<?php echo $filter['puror_forecasts_date_end'];?>" class="form-control datepicker">
                                            <span class="help-block align-center">end</span>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div>
                                <input type="submit" name="submit" value="SEARCH" class="btn btn-primary pull-right" style="margin-bottom: 20px">
                            </div>

                        </form>
                    </div>
                </div>
            </div> <!-- /.row -->

            <?php if($data){ ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="widget box">
                        <div class="widget-header">
                            <h4><i class="icon-reorder"></i> Purchase Order List</h4>
                            <div class="toolbar no-padding">
                                <div class="btn-group">
                                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content">
                            <table class="table table-striped table-bordered table-hover table-checkable datatable" data-display-length="30" data-dataTable='{"bSort": false}'>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>PO Code</th>
                                    <th>Create By</th>
                                    <th>Order Date</th>
                                    <th>Forecasts Receive Date</th>
                                    <th class="align-center">Status</th>

                                    <th class="align-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $i=1;foreach ($data as $r) { ?>
                                <tr id="tr_<?php echo $r['puror_id'];?>">
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $r['puror_code'];?></td>
                                    <td><?php echo $r['puror_inquiry_by'];?></td>
                                    <td><?php echo $r['puror_order_date'];?></td>
                                    <td><?php echo $r['puror_forecasts_date'];?></td>
                                    <td class="align-center">
                                        <div id="status_<?php echo $r['puror_id'];?>">
                                            <?php echo $r['puror_status'];?>
                                            <?php
                                            if($r['puror_status'] == 'received'){
                                                $amount = $this->db->where('puror_id',$r['puror_id'])->where('puror_item_status','ordered')->from("purchase_order_item")->count_all_results(); ?>
                                                <?php if($amount > 0){ ?>
                                                <i class="icon-warning-sign red bs-tooltip" data-original-title="สินคัายังเข้าไม่ครบจำนวน <?php echo $amount; ?> items."></i>
                                            <?php } } ?>
                                        </div>
                                    </td>
                                    <td class="align-center">
                                        <span class="btn-group">
                                            <a href="<?php echo base_url('purchase/po-report/detail/'.$r['puror_id'])?>" class="btn btn-xs bs-tooltip" title="" data-original-title="View"><i class="icon-search"></i></a>
                                            <a href="<?php echo base_url('purchase/po-report/list/'.$r['puror_id'])?>" class="btn btn-xs bs-tooltip" title="" data-original-title="View List"><i class="icon-list"></i></a>
                                            <?php if($allowChangeStatus ==true){?>
                                            <a data-toggle="modal" href="#change_status_<?php echo $i;?>" id="cha_<?php echo $r['purq_id'];?>" class="btn btn-xs bs-tooltip" title="" data-original-title="ค้างรับ">ACCRUAL</a>
                                            <div class="modal fade" id="change_status_<?php echo $i;?>">
                                                <form class="form-horizontal row-border" method="post" id="frm_change_status_<?php echo $i;?>"  onsubmit="return checkForm(this);" >
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Set Accrual  <strong><?php echo $r['purq_code'];?> </strong></h4>
                                                            </div>
                                                            <div class="modal-body">

                                                                <label class="col-md-12 ">
                                                                    Are you sure to set accrual (<?php echo $r['puror_code']; ?>) ?
                                                                </label>

                                                                <div style="height: 10px; clear: both;" > </div>
                                                                <label class="col-md-2 control-label" style="clear: both">Note</label>
                                                                <div class="col-md-10">
                                                                    <textarea rows="2" cols="5" name="puror_note" class="form-control"> </textarea>
                                                                </div>
                                                                <input type="hidden" name="status" value="accrual">
                                                                <input type="hidden" name="puror_id" value="<?php echo $r['puror_id'];?>">
                                                            </div>
                                                            <div style="clear: both"></div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <input type="submit" value="Submit" class="btn btn-primary pull-right">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal -->
                                            <?php }?>
                                            <?php if($allowDelete == true){?>
                                                <a data-toggle="modal" href="#delete-<?php echo $i;?>" class="btn btn-xs bs-tooltip" title="Delete"><i class="icon-trash"></i></a>
                                                <div class="modal fade" id="delete-<?php echo $i;?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form class="form-horizontal row-border" method="get" action="<?php echo base_url(); ?>purchaseorder/delete/<?php echo $r['puror_id'];?>">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title">Delete</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure to delete this PO (<?php echo $r['puror_code']; ?>) ?
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
            <?php } ?>
        </div>
    </div>
</div>
<div id="loader" class="hide"></div>



<script  type="text/javascript">
    $(document).ready(function() {
        $(".datepicker").datepicker({
            showOtherMonths: true,
            autoSize: true,
            dateFormat: 'yy-mm-dd'
        });
    });
    $("a.confirm-dialog").click(function(e) {
        var  id = this.id;
        var purq_id = id.substr(4);

        e.preventDefault();
        bootbox.confirm("<strong>Are you sure to delete ? </strong>", function(confirmed) {
            if(confirmed == true)
            {
                $('#loader').removeClass('hide');
                $('.modal').modal('hide');
                var base_url = window.location.origin;
                var url = base_url + '/purchase/request/delete/' + purq_id ;
                $.ajax({
                    url: url,
                    type: 'GET',
                    contentType: false,
                    processData: false,
                    success: function(result){

                        if(result.code == 200)
                        {
                            console.log(result.act);

                            noty({
                                text: 'Success',
                                type: 'information',
                                layout: 'top',
                                timeout: 2000,
                                modal: 'false'
                            });
                            $('#tr_' + result.id).html('');
                        }
                    },
                    error: function(result){
                        console.log(result);
                    }
                }).done(function() {
                    $('#loader').addClass('hide');
                });
            }

        });
    });

    function checkForm(form) {
        var id = form.id;
        var formDataSend = new FormData($('#' + id)[0]);
        var base_url = window.location.origin;
        var url = base_url + '/purchaseorder/change-status';

        $('#loader').removeClass('hide');
        $('.modal').modal('hide');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: url,
            data: formDataSend,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(result){
                $('#status_' + result.id).html(result.puror_status);
                noty({
                    text: 'Success',
                    type: 'information',
                    layout: 'top',
                    timeout: 2000,
                    modal: 'false'
                });
            },
            error: function(result){

                $('#loader').addClass('hide');
                noty({
                    text: 'Opp. Something went wrong. Please try again.',
                    type: 'error',
                    layout: 'top',
                    timeout: 2000,
                    modal: 'false'
                });
            }
        }).done(function() {
            $('#loader').addClass('hide');
        });

        return false;
    }

</script>

