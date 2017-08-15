<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/tabletools/TableTools.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/colvis/ColVis.min.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/columnfilter/jquery.dataTables.columnFilter.js"></script> <!-- optional -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/DT_bootstrap.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>plugins/datatables/responsive/datatables.responsive.js"></script> <!-- optional -->

<script type="text/javascript" src="<?php echo base_url();?>plugins/bootbox/bootbox.min.js"></script>
<!--<script type="text/javascript" src="--><?php //echo base_url();?><!--assets/js/demo/ui_general.js"></script>-->
<!-- Noty -->
<script type="text/javascript" src="<?php echo base_url();?>plugins/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/noty/layouts/top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/noty/themes/default.js"></script>
<?php

$label = array(
    'request' => 'label-default',
    'approved' => 'label-success',
    'unapproved' => 'label-danger',
    'pending' => 'label-warning',
    'ordered' => 'label-primary',
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
                            <table id="table-approve" class="table table-striped table-bordered table-hover table-checkable table-responsive datatable" data-display-length="30"  data-dataTable='{"bSort": false}'>
                                <thead>
                                <tr>
                                    <th>PurchaseNo</th>
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
                                    <td><?php echo $r['purq_code'];?></td>
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
                                    <td><span id="span-status-<?php echo $r['purq_id']; ?>" class="label <?php echo $label[$r['purq_status']]; ?>"><?php echo $r['purq_status'];?></span></td>
                                    <td class="align-center">
                                        <a href="<?php echo base_url('purchase/request/detail/'.$r['purq_id'])?>" class="btn btn-xs btn-info bs-tooltip" title="" data-original-title="View Detail"><i class="icon-search"></i></a>
                                        <a class="btn btn-xs btn-success confirm-dialog" id="app_<?php echo $r['purq_id'];?>" data-value="approved">Approve</a>
                                        <?php if($r['purq_status'] != 'pending'){ ?>
                                            <a data-toggle="modal" href="#pending_<?php echo $r['purq_id'];?>" id="pen_<?php echo $r['purq_id'];?>" class="btn btn-xs btn-warning">Pending</a>
                                            <div class="modal fade" id="pending_<?php echo $r['purq_id'];?>">
                                                <form class="form-horizontal row-border" method="post" id="frm_pending_<?php echo $r['purq_id'];?>"   action="<?php echo base_url('purchase/request/'.$action); ?>" onsubmit="return checkForm(this);" >
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Are you sure for change status <?php echo $r['purq_code'];?> to <strong style="color: red">pending</strong> ?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div > </div>
                                                                <label class="col-md-2 control-label" style="clear: both">Note</label>
                                                                <div class="col-md-10">
                                                                    <textarea rows="2" cols="5" name="purq_comment" class="form-control"> </textarea>
                                                                </div>
                                                                <input type="hidden" name="purq_id" value="<?php echo $r['purq_id'];?>">
                                                                <input type="hidden" name="status" value="pending">
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
                                        <?php } ?>

                                        <?php if($r['purq_status'] != 'unapproved'){ ?>
                                            <a data-toggle="modal" href="#unapproved_<?php echo $r['purq_id'];?>" id="una_<?php echo $r['purq_id'];?>" class="btn btn-xs btn-danger">Unapproved</a>
                                            <div class="modal fade" id="unapproved_<?php echo $r['purq_id'];?>">
                                                <form class="form-horizontal row-border" method="post" id="frm_unapproved_<?php echo $r['purq_id'];?>"   action="<?php echo base_url('purchase/request/'.$action); ?>" onsubmit="return checkForm(this);" >
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Are you sure for change status <?php echo $r['purq_code'];?> to <strong style="color: red">unapproved</strong> ?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div > </div>
                                                                <label class="col-md-2 control-label" style="clear: both">Note</label>
                                                                <div class="col-md-10">
                                                                    <textarea rows="2" cols="5" name="purq_comment" class="form-control"> </textarea>
                                                                </div>
                                                                <input type="hidden" name="purq_id" value="<?php echo $r['purq_id'];?>">
                                                                <input type="hidden" name="status" value="unapproved">
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
                                        <?php } ?>

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
<div id="loader" class="hide"></div>
<script  type="text/javascript">

    $("a.confirm-dialog").click(function(e) {
        var  id = this.id;
        var change_status = $('#' + id).attr('data-value');
        var purq_id = id.substr(4);

        e.preventDefault();
        bootbox.confirm("<strong>Are you sure for change status to " + change_status + "  ? </strong>", function(confirmed) {
            if(confirmed == true)
            {
                $('#loader').removeClass('hide');
                $('.modal').modal('hide');
                var base_url = window.location.origin;
                var url = base_url + '/purchase/get-change-status/' + purq_id + '/approved';
                $.ajax({
                    url: url,
                    type: 'GET',
                    contentType: false,
                    processData: false,
                    success: function(result){

                        if(result.code == 200)
                        {
                            console.log(result.act);
                            $('#span-status-' + result.id).removeClass('label-default label-danger label-warning').addClass('label-success').html(result.act);
                            $('#app_' + result.id).removeClass('btn btn-xs btn-success confirm-dialog').html('');
                            noty({
                                text: 'Success',
                                type: 'information',
                                layout: 'top',
                                timeout: 2000,
                                modal: 'false'
                            });
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
        var url = base_url + '/purchase/change-status';
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
                console.log(result);
                if(result.act == 'pending')
                {
                    $('#span-status-' + result.id).removeClass('label-default label-danger').addClass('label-warning').html('pending');
                    $('#pen_' + result.id).removeClass('btn btn-xs btn-success btn-danger').html('');
                    $('#pending_' + result.id).html('');
                }

                if(result.act == 'unapproved')
                {
                    $('#span-status-' + result.id).removeClass('label-default label-warning').addClass('label-danger').html('unapproved');
                    $('#una_' + result.id).removeClass('btn btn-xs btn-success btn-warning').html('');
                    $('#unapproved_' + result.id).html('');
                }
                noty({
                    text: 'Success',
                    type: 'information',
                    layout: 'top',
                    timeout: 2000,
                    modal: 'false'
                });
            },
            error: function(result){
                $('.modal').modal('hide');
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

