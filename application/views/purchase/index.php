<title>Dashboard | Purchase Request </title>
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

<script type="text/javascript" src="<?php echo base_url();?>plugins/pickadate/picker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/pickadate/picker.date.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/pickadate/picker.time.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
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
                        <a href="<?php echo base_url(strtolower($menu));?>" title=""><?php echo strtoupper($menu); ?></a>
                    </li>
                    <li class="current">
                        <a href="#" title=""><?php echo strtoupper($subMenu) ?></a>
                    </li>
                </ul>
            </div>

            <!--=== Page Header ===-->
            <div class="page-header">
                <div class="page-title">
                    <h3>Purchase Request Report</h3>
                    <span></span>
                </div>
            </div>

            <div class="row row-bg"> <!-- .row-bg -->
                <div class="row">
                    <div class="col-md-11">

                        <form class="form-horizontal row-border" action="" method="post">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Project:</label>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="proj_name" value="<?php echo $filter['proj_name'];?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <label class="col-md-2 control-label">Purchase Request Code</label>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="purq_code" value="<?php echo $filter['purq_code'];?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Require Date</label>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="purq_require_start" value="<?php echo $filter['purq_require_start'];?>" class="form-control datepicker">
                                            <span class="help-block align-center">StartDate</span>
                                            <input type="text" name="purq_require_end" value="<?php echo $filter['purq_require_end'];?>" class="form-control datepicker">
                                            <span class="help-block align-center">EndDate</span>
                                        </div>
                                    </div>
                                </div>

                                <label class="col-md-2 control-label">Status</label>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select name="purq_status" class="form-control" name="select">
                                                <option value="">Select All Status</option>
                                                <option value="request" <?php echo ($filter['purq_status'] == 'request')? 'selected' : null; ?> >Request</option>
                                                <option value="pending" <?php echo ($filter['purq_status'] == 'pending')? 'selected' : null; ?>>Pending</option>
                                                <option value="unapproved" <?php echo ($filter['purq_status'] == 'unapproved')? 'selected' : null; ?>>UnApproved</option>
                                                <option value="approved" <?php echo ($filter['purq_status'] == 'approved')? 'selected' : null; ?>>Approved</option>
                                                <option value="completed" <?php echo ($filter['purq_status'] == 'completed')? 'selected' : null; ?>>Completed</option>
                                                <option value="reject" <?php echo ($filter['purq_status'] == 'reject')? 'selected' : null; ?>>Reject</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div  class="col-md-6" style="margin-top: 20px">
                                    <input type="submit" name="submit" value="SEARCH" class="btn btn-primary pull-right">
                                </div>
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
                            <h4><i class="icon-reorder"></i> Purchase Request List</h4>
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
                                    <th>PR Code</th>
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
                                <tr id="tr_<?php echo $r['purq_id'];?>">
                                    <td><?php echo $r['purq_code'];?></td>
                                    <td><?php echo $r['proj_name'];?></td>
                                    <td><?php echo $r['proj_owner_name'];?><br><?php echo $r['proj_contacts'];?><br><?php echo $r['proj_mobile'];?><br><?php echo $r['proj_email'];?></td>
                                    <td><?php echo $r['designer_name'];?><br><?php echo $r['designer_contacts'];?><br><?php echo $r['designer_mobile'];?><br><?php echo $r['designer_email'];?></td>
                                    <td><?php echo $r['contractor_name'];?><br><?php echo $r['contractor_contacts'];?><br><?php echo $r['contractor_mobile'];?><br><?php echo $r['contractor_email'];?></td>
                                    <td>
                                        <?php  $purchaseItem = $this->purchase_model->getPurchaseItem($r['purq_id']);
                                            foreach ($purchaseItem as $purqItem) {
                                                echo $purqItem['item_code'] . ' = ' . $purqItem['qty'] . '<br>';
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo date('Y-m-d',strtotime($r['purq_require_start']));?></td>
                                    <td><?php echo date('Y-m-d',strtotime($r['purq_require_end']));?></td>
                                    <td><span id="span-status-<?php echo $r['purq_id'];?>" class="label <?php echo $label[$r['purq_status']]; ?>"><?php echo $r['purq_status'];?></span></td>
                                    <td class="align-center">
                                        <span class="btn-group">
                                            <a href="<?php echo base_url('purchase/report/'.$r['purq_id'])?>" class="btn btn-xs bs-tooltip" title="" data-original-title="View"><i class="icon-search"></i></a>
                                            <a href="<?php echo base_url('purchase/report/list/'.$r['purq_id'].'/'.$r['purq_code'])?>" class="btn btn-xs bs-tooltip" title="" data-original-title="List"><i class="icon-list"></i></a>

                                            <?php if($allowUpdate == true && $r['purq_status'] == 'request'){ ?>
                                                <a href="<?php echo base_url('purchase/request/update/'.$r['purq_id'])?>" class="btn btn-xs bs-tooltip" title="" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                            <?php } ?>
                                            <?php if($allowDelete == true && $r['purq_status'] == 'request'){ ?>
                                                <a id="del_<?php echo $r['purq_id'];?>" class="btn btn-xs bs-tooltip confirm-dialog" title="" data-original-title="Delete"><i class="icon-trash"></i></a>
                                            <?php } ?>

                                            <?php if($allowChangeStatus == true && $r['purq_status'] == 'approved'){ ?>
                                            <a data-toggle="modal" href="#change_status_<?php echo $r['purq_id'];?>" id="cha_<?php echo $r['purq_id'];?>" class="btn btn-xs bs-tooltip" title="" data-original-title="Reject"><i class="icon-exchange"></i></a>
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
                                                                        <?php foreach ($status as $st){ ?>
                                                                            <option value="<?php echo $st?>" ><?php echo $st;?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div style="height: 10px; clear: both;" > </div>
                                                                <label class="col-md-2 control-label" style="clear: both">Note</label>
                                                                <div class="col-md-10">
                                                                    <textarea rows="2" cols="5" name="purq_comment" class="form-control"> </textarea>
                                                                </div>
                                                                <input type="hidden" name="purq_id" value="<?php echo $r['purq_id'];?>">
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
        var url = base_url + '/purchase/change-status';

        $('#loader').removeClass('hide');
        $('.modal').modal('hide');
        var status = [];
            status['request'] = 'label-default';
            status['approved'] = 'label-success';
            status['unapproved'] = 'label-danger';
            status['pending'] = 'label-info';
            status['ordered'] = 'label-warning';
            status['received'] = 'label-primary';
            status['delivered'] = 'label-primary';
            status['reject'] = 'label-danger';

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
                $('#span-status-' + result.id).removeClass('label-default label-primary label-info label-success label-danger label-warning').addClass(status[result.act]).html(result.act);
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

