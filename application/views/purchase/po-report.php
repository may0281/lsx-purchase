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
<?php
$label = array(
    'request' => 'label-default',
    'approved' => 'label-success',
    'unapproved' => 'label-danger',
    'pending' => 'label-warning',
    'ordered' => 'label-info',
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
                    <h3> Purchase Order List</h3>
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
                                    <th>Forecasts Date</th>
                                    <th>Status</th>

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
                                    <td> <div id="status_<?php echo $r['puror_id'];?>"><?php echo $r['puror_status'];?></div></td>

                                    <td class="align-center">
                                        <span class="btn-group">
                                            <a href="<?php echo base_url('purchase/po-report/detail/'.$r['puror_id'])?>" class="btn btn-xs bs-tooltip" title="" data-original-title="View"><i class="icon-search"></i></a>
                                            <a href="<?php echo base_url('purchase/po-report/list/'.$r['puror_id'])?>" class="btn btn-xs bs-tooltip" title="" data-original-title="View List"><i class="icon-list"></i></a>
                                            <a data-toggle="modal" href="#change_status_<?php echo $r['purq_id'];?>" id="cha_<?php echo $r['purq_id'];?>" class="btn btn-xs bs-tooltip" title="" data-original-title="Change Status"><i class="icon-exchange"></i></a>
                                            <div class="modal fade" id="change_status_<?php echo $r['purq_id'];?>">
                                                <form class="form-horizontal row-border" method="post" id="frm_change_status_<?php echo $r['purq_id'];?>"  onsubmit="return checkForm(this);" >
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Change status  <strong><?php echo $r['purq_code'];?> </strong></h4>
                                                            </div>
                                                            <div class="modal-body">

                                                                <label class="col-md-2 control-label">Status<span class="required">*</span></label>
                                                                <div class="col-md-10 clearfix">
                                                                    <select name="status" id="status_id" class="col-md-12 select2 full-width-fix required">
                                                                        <option></option>
                                                                        <option value="ordered" <?php echo ($r['puror_status'] == 'ordered' ? 'selected' : '') ?>>Ordered</option>
                                                                        <option value="received" <?php echo ($r['puror_status'] == 'received' ? 'selected' : '') ?>>Received</option>
                                                                    </select>
                                                                </div>
                                                                <div style="height: 10px; clear: both;" > </div>
                                                                <label class="col-md-2 control-label" style="clear: both">Note</label>
                                                                <div class="col-md-10">
                                                                    <textarea rows="2" cols="5" name="puror_note" class="form-control"> </textarea>
                                                                </div>
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
        </div>
    </div>
</div>
<div id="loader" class="hide"></div>



<script  type="text/javascript">

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

