<title>Dashboard | Purchase Request </title>

<style>
    .pageBreak { page-break-before: always; }
    @media print
    {
        @page { margin: 0; }
        body  { margin-top: 25px }
        .go-back
        {
            display: none !important;
        }
    }
</style>
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
            <ul class="crumb-buttons">
                <li class="first"><a style="cursor: pointer;" href="#" onclick="window.history.go(-1); return false;" title=""><i class="icon-arrow-left"></i><span>Back</span></a></li>
            </ul>
        </div>
        <!-- /Breadcrumbs line -->

        <!--=== Page Content ===-->
        <div class="row">
            <!--=== Invoice ===-->
            <div class="col-md-12">
                <div class="widget invoice">
                    <div class="widget-header" style="border: none;">
                        <div class="pull-left">
                            <h2>Purchase No <span><?php echo $data['purq_code'] ?></span> </h2>
                        </div>

                    </div>
                    <table class="table  ">
                        <tr>
                        </tr>
                        <tr>
                            <td>
                                <div class="col-md-12">
                                    <strong style="font-size: larger"> Project Name : <?php echo $data['proj_name'] ?></strong> <br>
                                    <strong>Status </strong> : <span><?php echo $data['purq_status'] ?></span>
                                    <address>
                                        <strong>Require Date</strong><br>
                                        <p><?php echo date('Y-m-d',strtotime($data['purq_require_start'])) ?> -
                                            <?php echo date('Y-m-d',strtotime($data['purq_require_end'])) ?></p>
                                    </address>
                                </div>
                            </td>
                            <td>
                                <div class="col-md-12 align-right">
                                    <address>
                                        <strong>Marketing </strong> : <?php echo $data['mkt_account'] ?> [ <?php echo $data['mkt_mobile'] ?> ]<br>
                                        <strong>Sale </strong> : <?php echo $data['sale_account'] ?> [ <?php echo $data['sale_mobile'] ?> ]<br>
                                        <strong>Create by </strong> : <?php echo $data['purq_create_by'] ?> [ <?php echo $data['purq_create_date'] ?> ]<br>
                                        <strong>Update by </strong> : <?php echo $data['purq_update_by'] ?> [ <?php echo $data['purq_update_date'] ?> ]<br>

                                    </address>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div style="clear: both"></div>

                    <table class="table">
                        <tr>
                        </tr>
                        <tr>
                            <td class="col-md-6">
                                <div class="col-md-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th colspan="3"> ITEM LIST</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $items = $this->purchase_model->getPurchaseItem($data['purq_id']); ?>
                                        <?php $i=1; foreach ($items as $it){ ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $it['item_code'] ?></td>
                                                <td><?php echo $it['qty'] ?></td>
                                            </tr>
                                            <?php $i++; }  ?>

                                        </tbody>
                                    </table>

                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th colspan="2"> Project Owner</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Project Owner</td>
                                            <td><?php echo $data['proj_owner_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Contact Name</td>
                                            <td><?php echo $data['proj_contacts'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tel</td>
                                            <td><?php echo $data['proj_mobile'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $data['proj_email'] ?></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </td>
                            <td class="col-md-6">
                                <div class="col-md-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th colspan="2"> Designer</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Designer</td>
                                            <td><?php echo $data['designer_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Contact Name</td>
                                            <td><?php echo $data['designer_contacts'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tel</td>
                                            <td><?php echo $data['designer_mobile'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $data['designer_email'] ?></td>
                                        </tr>
                                        </tbody>
                                        <thead>
                                        <tr>
                                            <th colspan="2"> Contractor</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Contractor</td>
                                            <td><?php echo $data['contractor_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Contact Name</td>
                                            <td><?php echo $data['contractor_contacts'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tel</td>
                                            <td><?php echo $data['contractor_mobile'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $data['contractor_email'] ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="row padding-top-10px">
                        <div class="col-md-6">
                            <div class="well">
                                <p><strong>Notes: </strong>
                                    <?php echo wordwrap($data['purq_comment'],90,"<br>\n",true); ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 align-right">
                            <div class="buttons">
                                <a class="btn btn-default btn-lg" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-print"></i> Print</a>
                            </div>
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.widget box -->
            </div> <!-- /.col-md-12 -->
            <!-- /Invoice -->
        </div> <!-- /.row -->
        <!-- /Page Content -->
    </div>
    <!-- /.container -->

</div>