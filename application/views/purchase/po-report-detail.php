<title>Dashboard | Purchase Order </title>
<style>
    .pageBreak { page-break-before: always; }
    @media print
    {
        @page { margin: 0; }
        body  { margin-top: 30px }
    }
</style>
<div id="content"">
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
                        <div class="pull-left" style="padding-left: 25px">
                            <img src="<?php echo base_url('assets/img/lsx-logo-1.png')?>">
                        </div>
                        <div class="pull-right" style="padding-right: 25px">
                            <h3>Purchase Order</h3>
                        </div>
                    </div>
                    <table class="table" style="font-size: 10px;">
                        <tr>
                        </tr>
                        <tr>
                            <td>
                                <div class="col-md-12">
                                    <strong>LSX COMPANY LIMITED</strong> <br>
                                    <address>
                                        33  SOI SUKHUMVIT 62,  BANGCHAK,<br>
                                        PRAKANONG,  BANGKOK  10260 <br>
                                        THAILAND.
                                    </address>
                                    <strong> TO : 	AICA KOGYO CO., LTD.</strong> <br>
                                    <address>
                                        2288 NISHIHORIE, KIYOSU-SHI<br>
                                        AICHI PREFECTURE, 452-0917 <br>
                                        JAPAN.
                                    </address>
                                </div>
                            </td>
                            <td>
                                <div class="col-md-12 align-right">
                                    <address>
                                        <strong> P.O. Number : <?php  echo $data['puror_code'] ?></span>  <br>
                                            Date : <?php echo date('F d, Y', strtotime(date('Y-m-d'))); ?> <br>
                                            Vendor ID : A1001
                                        </strong> <br>
                                    </address>

                                    <strong> SHIP TO :	LSX COMPANY LIMITED </strong> <br>
                                    <address>
                                        33  SOI SUKHUMVIT 62,  BANGCHAK, <br>
                                        PRAKANONG,  BANGKOK  10260 <br>
                                        THAILAND		<br>
                                    </address>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div style="clear: both"></div>
                    <div class="col-md-12">
                        <table class="table"  style="font-size: 10px;">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SHIPPING METHOD	</th>
                                <th style="text-align: center;">SHIPPING TERMS	</th>
                                <th style="text-align: center;">DESTINATION	</th>
                                <th style="text-align: center;">PAYMENT TERM	</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;"><?php echo $data['puror_shipping_method']; ?></td>
                                    <td style="text-align: center;"><?php echo $data['puror_shipping_term']; ?></td>
                                    <td style="text-align: center;"><?php echo $data['puror_shipping_destination']; ?></td>
                                    <td style="text-align: center;"><?php echo $data['puror_shipping_payment_term']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="clear: both;padding: 20px;font-size: 10px;"> <strong>Description :</strong> <?php echo $data['puror_description']; ?>	</div>
                    <div class="col-md-12">
                        <table class="table table-hover" style="font-size: 10px;">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">QTY</th>
                                <th style="text-align: center;">ITEM NO.</th>
                                <th style="text-align: center;">AICA Finish</th>
                                <th style="text-align: center;">P. Film</th>
                                <th style="text-align: center;">Size</th>
                                <th style="text-align: center;">Thickness</th>
                                <th style="text-align: right;">Unit Price</th>
                                <th style="text-align: right;">Total Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $items = $this->purchase_model->getPurchaseItem($data['purq_id']); ?>
                            <?php  $total_sheets=0;$total_amount=0; $i=1; foreach ($item as $it){ $amount = ($it['puror_qty']*$it['puror_price']); ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $i; ?></td>
                                    <td style="text-align: center;"><?php echo $it['puror_qty'] ?></td>
                                    <td style="text-align: center;"><?php echo $it['item_code'] ?></td>
                                    <td style="text-align: center;"><?php echo $it['item_aica'] ?></td>
                                    <td style="text-align: center;"><?php echo ($it['item_pfilm']) ? $it['item_pfilm'] : '-'; ?></td>
                                    <td style="text-align: center;"><?php echo $it['item_size'] ?></td>
                                    <td style="text-align: center;"><?php echo $it['item_thickness'] ?></td>
                                    <td style="text-align: right;"><?php echo $it['puror_price'] ?></td>
                                    <td style="text-align: right;"><?php echo number_format($amount,2) ?></td>
                                </tr>
                                <?php $total_sheets += $it['puror_qty']; $total_amount += $amount; $i++; }  ?>
                            <tr style="font-weight: bold">
                                <td colspan="3" style="text-align: center;font-size: 12px">Total <?php echo number_format($total_sheets); ?> Sheets </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: right;font-size: 12px">Amount</td>
                                <td style="text-align: right;font-size: 12px"><?php echo number_format($total_amount,2) ?></td>
                            </tr>
                            <tr style="font-weight: bold">
                                <td colspan="3" style="text-align: center;font-size: 12px"> </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: right;font-size: 12px"></td>
                                <td style="text-align: right;font-size: 12px"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="row padding-top-10px">
                        <div class="col-md-8">
                            <div style="padding-left: 20px;font-size: 10px">
                                <p><?php echo $data['puror_note'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 align-right">
                            <div style="padding-left: 20px">
                            </div>

                        </div>
                    </div>
                    <table class="table" style="border-top: 0px solid #fff;">
                        <tr style="border-top: 2px solid #fff;">
                            <td width="70%">
                                <div class="well">
                                    <p style="font-size: 8px"> 1. Enter this order in accordance with the prices, terms, delivery method, and specifications  listed above. <br>
                                        2. Price CIF Bangkok indicating FOB Value, Freight Charges and Insurance Premium Separately <br>
                                        3. Protection of Material in Transit. All articles delivered on this order to be packed adequately <br>
                                        to prevent any damage in shipment and storage. All packages to be properly indentified.<br>
                                        4. Seller must execute acknowledgment copy hereof and return to buyer.<br>
                                        Buyer expressly limits acceptance to the terms stated herin and any additional or different terms<br>
                                        proposed by seller shall not be binding on buyer, whether of not they would materially<br>
                                        alter this order, and are rejected.<br>
                                        5. Please notify us immediately if you are unable to ship as specified.<br>
                                        6. Send all correspondence to: Mr. Kriengkrai.T or Ms. Sineenard.S <br>
                                        LSX Company Limited  33 Soi Sukhumvit 62, Bangchak, Prakanong, Bangkok 10260, THAILAND<br>
                                        7. Delivery date of goods to LSX Co., Ltd. within_________________________________			<br>
                                    </p>
                                </div>
                            </td>
                            <td width="30%">
                                <div style="padding-left: 50px">
                                    <p><strong>LSX COMPANY LIMITED</strong></p>
                                    <p style="padding-top: 50px;border: 1px solid #dddddd;"></p>
                                    <p style="font-size: 12px">(Mr.Kriengkrai  Tienpothong)</p>
                                    <p style="font-size: 12px;padding-left: 30px">Managing Director</p>
                                    <p style="font-size: 12px;padding-left: 20px;font-size: 10px">Date ( <?php echo date('F d, Y', strtotime(date('Y-m-d'))); ?> )</p>
                                </div>
                                <div class="buttons align-right" >
                                    <a class="btn btn-default btn-lg" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-print"></i> Print</a>
                                </div>
                            </td>
                        </tr>
                    </table>

                </div> <!-- /.widget box -->
            </div> <!-- /.col-md-12 -->
            <!-- /Invoice -->
        </div> <!-- /.row -->
        <!-- /Page Content -->
    </div>
    <!-- /.container -->

</div>