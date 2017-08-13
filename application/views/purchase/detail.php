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

        <!--=== Page Content ===-->
        <div class="row">
            <!--=== Invoice ===-->
            <div class="col-md-12">
                <div class="widget invoice">
                    <div class="widget-header">
                        <div class="pull-left">
                            <h2>Purchase No <span>#<?php echo $data['purq_id'] ?></span></h2>
                        </div>

                    </div>
                    <div class="widget-content">
                        <div class="row">
                            <!--=== Adresses ===-->
                            <div class="col-md-6">
                                <h3><?php echo $data['proj_name'] ?></h3>

                                <address>
                                    <strong>Require Date</strong><br>
                                    <p><?php echo date('Y-m-d',strtotime($data['purq_require_start'])) ?> <br>
                                    <?php echo date('Y-m-d',strtotime($data['purq_require_end'])) ?></p>
                                </address>
                            </div>
                            <div class="col-md-6 align-right">
                                <h3></h3>

                                <address>
                                    <strong>Create by </strong> - <?php echo $data['purq_create_by'] ?> [ <?php echo $data['purq_create_date'] ?> ]<br>
                                    <strong>Update by </strong> - <?php echo $data['purq_update_by'] ?> [ <?php echo $data['purq_update_date'] ?> ]<br>

                                </address>
                            </div>
                            <!-- /Adresses -->

                            <!--=== Table ===-->
                            <div class="col-md-6">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th class="hidden-xs">Quantity</th>

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
                            </div>
                            <!-- /Table -->
                        </div>

                        <div class="row padding-top-10px">
                            <div class="col-md-6">
                                <div class="well">
                                    <p><strong>Notes: </strong> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                </div>
                            </div>

                            <div class="col-md-6 align-right">
                                <ul class="list-unstyled amount padding-bottom-5px">
                                    <li><strong>Subtotal:</strong> $11,069</li>
                                    <li><strong>Delivery:</strong> $5</li>
                                    <li><strong>VAT (10%):</strong> $1107.40</li>
                                    <li class="total"><strong>Total:</strong> $12,181.40</li>
                                </ul>

                                <div class="buttons">
                                    <a class="btn btn-default btn-lg" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-print"></i> Print</a>
                                    <a class="btn btn-success btn-lg" href="javascript:void(0);">Proceed to Payment <i class="icon-angle-right"></i></a>
                                </div>
                            </div>
                        </div> <!-- /.row -->
                    </div>
                </div> <!-- /.widget box -->
            </div> <!-- /.col-md-12 -->
            <!-- /Invoice -->
        </div> <!-- /.row -->
        <!-- /Page Content -->
    </div>
    <!-- /.container -->

</div>