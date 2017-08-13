<style>
    .errors
    {
        color: red;
    }
    .input-error
    {
        border: red 1px solid;
    }
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/sparkline/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/blockui/jquery.blockUI.min.js"></script>

<!-- Forms -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/uniform/jquery.uniform.min.js"></script> <!-- Styled radio and checkboxes -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/fileinput/fileinput.js"></script>

<!-- Form Validation -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/validation/additional-methods.min.js"></script>

<!-- Noty -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/jquery.noty.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/layouts/top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/noty/themes/default.js"></script>

<!-- App -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.form-components.js"></script>


<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/sample.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/ckeditor/toolbarconfigurator/lib/codemirror/neo.css">


<!-- Demo JS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo/form_validation.js"></script>
<!--<script type="text/javascript" src="--><?php //echo base_url(); ?><!--assets/js/demo/ui_general.js"></script>-->

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
                    <a href="<?php echo base_url();?>user/init-user" title=""><?php echo strtoupper($menu); ?></a>
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
                <span></span>
            </div>
        </div>
        <!-- /Page Header -->

        <!--=== Page Content ===-->
        <div class="row">
            <!--=== Validation Example 1 ===-->
            <div class="col-md-12">
                <div class="widget box">
                    <div class="widget-header">
                        <h4><i class="icon-reorder"></i> Fill the information.</h4>
                    </div>
                    <div class="widget-content">
                        <form class="form-horizontal row-border" method="post" id="<?php echo $action ?>"  action="<?php echo base_url('purchase/request/'.$action); ?>" onsubmit="return checkForm(this);" >
                            <div class="form-group">
                                <label class="col-md-2 control-label">Project <?php echo $data['proj_id']; ?><span class="required">*</span></label>
                                <div class="col-md-5 clearfix">
                                    <select name="proj_id" id="proj_id" class="col-md-12 select2 full-width-fix required">
                                        <option></option>
                                        <?php foreach ($projects as $project){ ?>
                                            <option value="<?php echo array_get($project,'proj_id')?>" <?php echo ($data['proj_id'] == array_get($project,'proj_id') ? 'selected' : '') ?>><?php echo array_get($project,'proj_name');?></option>
                                        <?php } ?>
                                    </select>
                                    <label id="msg_proj" class="errors"> </label>
                                </div>
                            </div>
                            <?php if($action == 'create'){?>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Require Date <span class="required">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="purq_require_start" id="purq_require_start" value="" class="form-control datepicker required" placeholder="Start Date">
                                    <label id="msg_purq_require_start" class="control-label errors"> </label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="purq_require_end" id="purq_require_end" value="" class="form-control datepicker required" placeholder="End Date">
                                    <label id="msg_purq_require_end" class="errors"> </label>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($action == 'update'){
                                $purchaseItem = $this->purchase_model->getPurchaseItem($data['purq_id']);
                                ?>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Require Date <span class="required">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" name="purq_require_start" id="purq_require_start" value="<?php echo date('Y-m-d',strtotime($data['purq_require_start'])); ?>" class="form-control datepicker required" placeholder="Start Date">
                                    <label id="msg_purq_require_start" class="control-label errors"> </label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="purq_require_end" id="purq_require_end" value="<?php echo date('Y-m-d',strtotime($data['purq_require_end'])); ?>" class="form-control datepicker required" placeholder="End Date">
                                    <label id="msg_purq_require_end" class="errors"> </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">PRODUCT CODE</label>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label"></label>
                                <label class="col-md-1 control-label">Delete</label>
                                <label class="col-md-2 control-label" style="text-align: center"> ITEM CODE</label>
                                <label class="col-md-2 control-label" style="text-align: center"> QTY</label>
                                <label class="col-md-2 control-label" style="text-align: center"> Size</label>
                                <label class="col-md-1 control-label" style="text-align: center"> Thickness</label>
                                <label class="col-md-2 control-label" style="text-align: center"> Film</label>
                                <label class="col-md-1 control-label" style="text-align: center"> Aica</label>
                                <div style="clear: both ; height: 10px" ></div>

                                <?php $k=1; $j=1; foreach ($purchaseItem as $it){ ?>
                                <div class="" id="item-list-<?php echo $j;?>" data-value="<?php echo $j;?>">
                                    <label class="col-md-1 control-label"><?php echo $k; ?> </label>
                                    <div class="col-md-1" style="text-align: center">
                                        <label class="checkbox"><input type="checkbox" name="delete[]" value="<?php echo $it['purq_item_id'] ?>" class="uniform"> </label>
                                    </div>
                                    <input type="hidden" name="purchase_item[]" value="<?php echo $it['purq_item_id'] ?>">
                                    <div class="col-md-2 clearfix">
                                        <select name="purchase_item_list[]" id="item-<?php echo $j ?>" class="col-md-12 select2 full-width-fix required item_list">
                                            <option></option>
                                            <?php foreach ($items as $item){ ?>
                                                <option value="<?php echo array_get($item,'item_code')?>" <?php echo ($it['item_code'] == $item['item_code']) ? 'selected' : ''; ?> data-size="<?php echo array_get($item,'item_size'); ?>" data-thickness="<?php echo array_get($item,'item_thickness'); ?>" data-film="<?php echo array_get($item,'item_pfilm'); ?>" data-aica="<?php echo array_get($item,'item_aica'); ?>"><?php echo array_get($item,'item_code');?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="purchase-item-<?php echo $j ?>-qty" name="purchase_item_qty[]" value="<?php echo $it['qty']?>" placeholder="QTY" class="form-control purchase_qty" >
                                        <label id="purchase_msg_qty_<?php echo $j ?>" class="errors"></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="item-<?php echo $j ?>-size" disabled="disabled"  value="<?php echo $item['item_size']; ?>" placeholder="Size" class="form-control" >
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="item-<?php echo $j ?>-thickness" disabled="disabled" value="<?php echo $item['item_thickness']; ?>" placeholder="Thickness" class="form-control" >
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="item-<?php echo $j ?>-film" disabled="disabled" value="<?php echo $item['item_pfilm']; ?>" placeholder="Film" class="form-control" >
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="item-<?php echo $j ?>-aica" disabled="disabled" value="<?php echo $item['item_aica']; ?>" placeholder="Aica Finish" class="form-control" >
                                    </div>
                                    <div style="clear: both ; height: 10px" ></div>
                                </div>
                                <?php $k++; $j++; } ?>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <label class="col-md-2 control-label" style="text-align: center"> ITEM CODE</label>
                                <label class="col-md-2 control-label" style="text-align: center"> QTY</label>
                                <label class="col-md-2 control-label" style="text-align: center"> Size</label>
                                <label class="col-md-1 control-label" style="text-align: center"> Thickness</label>
                                <label class="col-md-2 control-label" style="text-align: center"> Film</label>
                                <label class="col-md-1 control-label" style="text-align: center"> Aica</label>
                                <div style="clear: both ; height: 10px" ></div>

                                <?php for($i=1; $i<= 30;$i++) {?>
                                <div class="<?php if($i<2){echo 'count-form';}?> <?php if($i>1){echo 'hidden';}?>" id="item-list-<?php echo $i;?>" data-value="<?php echo $i;?>">
                                    <label class="col-md-2 control-label"><?php if($i==1){ ?>Product Code <?php }?> [<?php echo $i;?>] <?php if($i==1){ ?> <span class="required">*</span><?php }?></label>
                                    <div class="col-md-2 clearfix">
                                        <select name="item_id[]" id="item-<?php echo $i ?>" class="col-md-12 select2 full-width-fix required item_list">
                                            <option></option>
                                            <?php foreach ($items as $item){ ?>
                                                <option value="<?php echo array_get($item,'item_code')?>" data-size="<?php echo array_get($item,'item_size'); ?>" data-thickness="<?php echo array_get($item,'item_thickness'); ?>" data-film="<?php echo array_get($item,'item_pfilm'); ?>" data-aica="<?php echo array_get($item,'item_aica'); ?>"><?php echo array_get($item,'item_code');?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="item-<?php echo $i ?>-qty" name="qty[]" value="" placeholder="QTY" class="form-control qty" >
                                        <label id="msg_qty_<?php echo $i ?>" class="errors"></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="item-<?php echo $i ?>-size"  value="" placeholder="Size" class="form-control" >
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="item-<?php echo $i ?>-thickness"  value="" placeholder="Thickness" class="form-control" >
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" id="item-<?php echo $i ?>-film"  value="" placeholder="Film" class="form-control" >
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" id="item-<?php echo $i ?>-aica"  value="" placeholder="Aica Finish" class="form-control" >
                                    </div>
                                    <div style="clear: both ; height: 10px" ></div>
                                </div>
                                <?php } ?>
                                <label id="msg_item" class="col-md-6 errors" style="text-align: left" > </label>

                            </div>
                            <div class="col-md-12" style="text-align: center; margin: 20px 0px;">
                                <button id="btn-add" class="btn btn-primary btn-sm ">
                                    <i class="icon-plus"></i>
                                    ADD MORE
                                </button>
                            </div>
                            <div class="form-group">
                                <label id="lbl_proj" class="col-md-2 control-label">เจ้าของโครงการ </label>
                                <div class="col-md-3">
                                    <input type="text" name="proj_owner_name"  id="proj_owner_name" value="<?php echo $data['proj_owner_name']; ?>" class="form-control has-error" placeholder="เจ้าของโครงการ">
                                    <label id="msg_proj_owner_name" class="errors"></label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="proj_contacts" id="proj_contacts"  value="<?php echo $data['proj_contacts']; ?>" class="form-control" placeholder="ชื่อผู้ติดต่อ">
                                    <label id="msg_proj_contacts" class="errors"></label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="proj_mobile" id="proj_mobile"  value="<?php echo $data['proj_mobile']; ?>"  class="form-control" placeholder="เบอร์ผู้ติดต่อ">
                                    <label id="msg_proj_mobile" class="errors"></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="proj_email" id="proj_email"  value="<?php echo $data['proj_email']; ?>"  class="form-control" placeholder="อีเมล์">
                                </div>

                                <div style="clear:both;"></div>

                                <label class="col-md-2 control-label">ผู้ออกแบบ </label>
                                <div class="col-md-3">
                                    <input type="text" name="designer_name" id="designer_name"  value="<?php echo $data['designer_name']; ?>"  class="form-control" placeholder="ผู้ออกแบบ">
                                    <label id="msg_designer_name" class="errors"></label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="designer_contacts"  id="designer_contacts"  value="<?php echo $data['designer_contacts']; ?>"  class="form-control" placeholder="ชื่อผู้ติดต่อ">
                                    <label id="msg_designer_contacts" class="errors"></label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="designer_mobile"  id="designer_mobile"  value="<?php echo $data['designer_mobile']; ?>"  class="form-control" placeholder="เบอร์ผู้ติดต่อ">
                                    <label id="msg_designer_mobile" class="errors"></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="designer_email" class="form-control"  value="<?php echo $data['designer_email']; ?>"  placeholder="อีเมล์">
                                </div>

                                <div style="clear:both;"></div>

                                <label id="lbl_contractor" class="col-md-2 control-label">ผู้รับเหมา </label>
                                <div class="col-md-3">
                                    <input type="text" name="contractor_name" id="contractor_name"  value="<?php echo $data['contractor_name']; ?>"  class="form-control" placeholder="ผู้รับเหมา">
                                    <label id="msg_contractor_name" class="errors"></label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="contractor_contacts" class="form-control"  value="<?php echo $data['contractor_contacts']; ?>"  placeholder="ชื่อผู้ติดต่อ">
                                    <label id="msg_contractor_contacts" class="errors"></label>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="contractor_mobile" class="form-control"  value="<?php echo $data['contractor_mobile']; ?>"  placeholder="เบอร์ผู้ติดต่อ">
                                    <label id="msg_contractor_mobile" class="errors"></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="contractor_email" class="form-control"  value="<?php echo $data['contractor_email']; ?>"  placeholder="อีเมล์">
                                </div>
                                <div style="clear:both;"></div>
                                <label id="msg_project" class="col-md-6 errors" style="text-align: left" > </label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Note</label>
                                <div class="col-md-10">
                                    <textarea rows="3" cols="5" name="purq_comment" class="form-control"> <?php echo $data['purq_comment'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Marketing</label>
                                <div class="col-md-5 clearfix">
                                    <select name="mkt_account" id="marketing" class="col-md-12 select2 full-width-fix">
                                        <option></option>
                                        <?php
                                            foreach ($users as $user){
                                        ?>
                                            <option value="<?php echo array_get($user,'account')?>" <?php echo ($data['mkt_account'] == array_get($user,'account') ? 'selected' : '') ?>   mobile-value="<?php echo array_get($user,'mobile')?>"><?php echo array_get($user,'firstname'). ' '.array_get($user,'lastname');?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="mkt_mobile" id="mkt_mobile" value="<?php echo $data['mkt_mobile']?>"  class="form-control" placeholder="">
                                </div>
                                <div style="clear: both ; height: 10px" ></div>
                                <label class="col-md-2 control-label">Sale</label>
                                <div class="col-md-5 clearfix">
                                    <select name="sale_account" id="sale" class="col-md-12 select2 full-width-fix">
                                        <option></option>
                                        <?php
                                            foreach ($users as $user){
                                        ?>
                                            <option value="<?php echo array_get($user,'account')?>" <?php echo ($data['sale_account'] == array_get($user,'account') ? 'selected' : '') ?>  mobile-value="<?php echo array_get($user,'mobile')?>"><?php echo array_get($user,'firstname'). ' '.array_get($user,'lastname');?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="sale_mobile" id="sale_mobile" value="<?php echo $data['sale_mobile']?>" class="form-control" placeholder="">
                                </div>
                                <label id="msg_person" class="col-md-6 errors" style="text-align: left" > </label>
                            </div>

                            <div class="form-actions">
                                <?php if($action == 'update'){ ?>
                                    <input type="hidden" name="purq_id" value="<?php echo $data['purq_id']?>">
                                <?php }?>
                                <input type="submit" value="<?php echo strtoupper($subMenu) ?>" class="btn btn-primary pull-right">
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /Validation Example 1 -->
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /.container -->

</div>
<script>
    $(document).ready(function() {

        //===== Date Pickers & Time Pickers & Color Pickers =====//
        $(".datepicker").datepicker({
            // defaultDate: +7,
            showOtherMonths: true,
            autoSize: true,
//            appendText: '<span class="help-block">(yyyy-mm-dd)</span>',
            dateFormat: 'yy-mm-dd'
        });
    });

    $('#proj_id').change(function () {
        $('#msg_proj').html('');
        $('#proj_id').removeClass('has-error');
    });
    $("#purq_require_start").click(function () {
        $('#msg_purq_require_start').html('');
        $('#purq_require_start').removeClass('input-error');
    });
    $("#purq_require_end").click(function () {
        $('#msg_purq_require_end').html('');
        $('#purq_require_end').removeClass('input-error');
    });
    $('#proj_owner_name').keypress(function() {
        $('#proj_owner_name').removeClass('input-error');
        $('#contractor_name').removeClass('input-error');
        $('#designer_name').removeClass('input-error');
        $('#msg_project').html('');
    });
    $('#designer_name').keypress(function() {
        $('#proj_owner_name').removeClass('input-error');
        $('#contractor_name').removeClass('input-error');
        $('#designer_name').removeClass('input-error');
        $('#msg_project').html('');
    });
    $('#contractor_name').keypress(function() {
        $('#proj_owner_name').removeClass('input-error');
        $('#contractor_name').removeClass('input-error');
        $('#designer_name').removeClass('input-error');
        $('#msg_project').html('');
    });

    $('#proj_contacts').keypress(function() {
        $('#proj_contacts').removeClass('input-error');
        $('#msg_proj_contacts').html('');
    });
    $('#proj_mobile').keypress(function() {
        $('#proj_mobile').removeClass('input-error');
        $('#msg_proj_mobile').html('');
    });
    $('#designer_contacts').keypress(function() {
        $('#designer_contacts').removeClass('input-error');
        $('#msg_designer_contacts').html('');
    });
    $('#designer_mobile').keypress(function() {
        $('#designer_mobile').removeClass('input-error');
        $('#msg_designer_mobile').html('');
    });
    $('#contractor_contacts').keypress(function() {
        $('#contractor_contacts').removeClass('input-error');
        $('#msg_contractor_contacts').html('');
    });
    $('#contractor_mobile').keypress(function() {
        $('#contractor_mobile').removeClass('input-error');
        $('#msg_contractor_mobile').html('');
    });
    $('#marketing').change(function () {
        var mobile = $('#marketing option:selected').attr('mobile-value');
        $("#mkt_mobile").val(mobile);
        $('#marketing').removeClass('input-error');
        $('#sale').removeClass('input-error');
        $("#msg_person").html('');
    });
    $('#sale').change(function () {
        var mobile = $('#sale option:selected').attr('mobile-value');
        $("#sale_mobile").val(mobile);
        $('#marketing').removeClass('input-error');
        $('#sale').removeClass('input-error');
        $("#msg_person").html('');
    });

    $('.item_list').change(function () {
        var data_size = $('#' + this.id +' option:selected').attr('data-size');
        var data_thickness = $('#' + this.id+' option:selected').attr('data-thickness');
        var data_film = $('#' + this.id+' option:selected').attr('data-film');
        var data_aica = $('#' + this.id+' option:selected').attr('data-aica');
        $('#' + this.id + '-size').val(data_size).attr('disabled','disabled');
        $('#' + this.id + '-thickness').val(data_thickness).attr('disabled','disabled');
        $('#' + this.id + '-film').val(data_film).attr('disabled','disabled');
        $('#' + this.id + '-aica').val(data_aica).attr('disabled','disabled');
        $('#' + this.id + '-qty').focus();
        $("#msg_item").html('');
        $('#item-1').removeClass('input-error');
        $('#item-1-qty').removeClass('input-error');
        $('#item-1-size').removeClass('input-error');
        $('#item-1-thickness').removeClass('input-error');
        $('#item-1-film').removeClass('input-error');
        $('#item-1-aica').removeClass('input-error');
    });

    $('.qty').keypress(function () {
        var res = this.id.substr(5, 1);
        $('#msg_qty_'+res).html('');

    });

    $('.purchase_qty').keypress(function () {
        var res = this.id.substr(14, 1);
        $('#purchase-item-'+res+'-qty').removeClass('input-error');
        $('#purchase_msg_qty_'+res).html('');

    });

    $('#btn-add').click(function () {
        var last_child =  parseInt($("div.count-form:last").attr('data-value'), 10);
        var current_div = last_child+1;
        $('#item-list-'+ current_div).addClass('count-form').removeClass('hidden');
        return false;

    });

    function checkForm(form) {
        var error_msg = 'This field is required.';
        var status = true;
        if(form.proj_id.value == '')
        {
            form.proj_id.focus();
            $('#proj_id').addClass('has-error');
            $('#msg_proj').html(error_msg);
            status = false;
        }

        if(form.purq_require_start.value == '')
        {
            $('#purq_require_start').addClass('input-error');
            $('#msg_purq_require_start').html(error_msg);
            status = false;
        }

        if(form.purq_require_end.value == '')
        {
            $('#purq_require_end').addClass('input-error');
            $('#msg_purq_require_end').html(error_msg);
            status = false;
        }



        if(form.id== 'create')
        {
            var item = $("select[name='item_id[]']").map(function(){return $(this).val();}).get();
            var qty = $("input[name='qty[]']").map(function(){return $(this).val();}).get();
            if(item[0] == '')
            {
                $('#item-1').addClass('input-error');
                $('#item-1-qty').addClass('input-error');
                $('#item-1-size').addClass('input-error');
                $('#item-1-thickness').addClass('input-error');
                $('#item-1-film').addClass('input-error');
                $('#item-1-aica').addClass('input-error');
                $("#msg_item").html('* Please fill the product code at least 1 product.');
                status = false;
            }

            for(var i =0; i<=item.length; i++)
            {
                var id = i+1;
                if(item[i] && qty[i] == '')
                {
                    $('#item-'+id+'-qty').addClass('input-error');
                    $('#msg_qty_'+id).html(error_msg);
                    status = false;
                }
            }
        }

        if(form.id== 'update')
        {
            var item = $("select[name='purchase_item_list[]']").map(function(){return $(this).val();}).get();
            var qty = $("input[name='purchase_item_qty[]']").map(function(){return $(this).val();}).get();


            for(var i =0; i<=item.length; i++)
            {
                var id = i+1;
                if(item[i] && qty[i] == '')
                {
                    $('#purchase-item-'+id+'-qty').addClass('input-error');
                    $('#purchase_msg_qty_'+id).html(error_msg);
                    status = false;
                }
            }
        }



        if(form.proj_owner_name.value == '' &&  form.contractor_name.value == '' && form.designer_name.value  == '')
        {
            $('#proj_owner_name').addClass('input-error');
            $('#contractor_name').addClass('input-error');
            $('#designer_name').addClass('input-error');
            $("#msg_project").html('* Please fill in one set.');
            status = false;
        }

        if(form.proj_owner_name.value)
        {
            if(form.proj_contacts.value == '' && form.proj_mobile.value == '')
            {
                form.proj_mobile.focus();
                form.proj_contacts.focus();
                $('#proj_mobile').addClass('input-error');
                $('#proj_contacts').addClass('input-error');
                $('#msg_proj_contacts').html(error_msg);
                $('#msg_proj_mobile').html(error_msg);
                status = false;
            }

            if(form.proj_contacts.value == '')
            {
                form.proj_contacts.focus();
                $('#proj_contacts').addClass('input-error');
                $('#msg_proj_contacts').html(error_msg);
                status = false;
            }
            if(form.proj_mobile.value == '')
            {
                form.proj_mobile.focus();
                $('#proj_mobile').addClass('input-error');
                $('#msg_proj_mobile').html(error_msg);
                status = false;
            }
        }

        if(form.designer_name.value)
        {
            if(form.designer_contacts.value == '' && form.designer_mobile.value == '')
            {
                form.designer_contacts.focus();
                form.designer_mobile.focus();
                $('#designer_contacts').addClass('input-error');
                $('#designer_mobile').addClass('input-error');
                $('#msg_designer_contacts').html(error_msg);
                $('#msg_designer_mobile').html(error_msg);
                status = false;
            }

            if(form.designer_contacts.value == '')
            {
                form.designer_contacts.focus();
                $('#designer_contacts').addClass('input-error');
                $('#msg_designer_contacts').html(error_msg);
                status = false;
            }
            if(form.designer_mobile.value == '')
            {
                form.designer_mobile.focus();
                $('#designer_mobile').addClass('input-error');
                $('#msg_designer_mobile').html(error_msg);
                status = false;
            }
        }

        if(form.contractor_name.value)
        {
            if(form.contractor_contacts.value == '' && form.contractor_mobile.value == '')
            {
                form.contractor_contacts.focus();
                form.contractor_mobile.focus();
                $('#contractor_contacts').addClass('input-error');
                $('#contractor_mobile').addClass('input-error');
                $('#msg_contractor_contacts').html(error_msg);
                $('#msg_contractor_mobile').html(error_msg);
                status = false;
            }

            if(form.contractor_contacts.value == '')
            {
                form.contractor_contacts.focus();
                $('#contractor_contacts').addClass('input-error');
                $('#msg_contractor_contacts').html(error_msg);
                status = false;
            }
            if(form.contractor_mobile.value == '')
            {
                form.contractor_mobile.focus();
                $('#contractor_mobile').addClass('input-error');
                $('#msg_contractor_mobile').html(error_msg);
                status = false;
            }
        }

        if(form.mkt_account.value == '' && form.sale_account.value == '')
        {
            $('#marketing').addClass('input-error');
            $('#sale').addClass('input-error');
            $("#msg_person").html('* Please fill in one set [Marketing or sale].');
            status = false;
        }

        return status;

    }

</script>