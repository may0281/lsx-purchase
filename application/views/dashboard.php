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
                    <a href="<?php echo base_url();?>blogs" title=""><?php echo strtoupper($menu); ?></a>
                </li>

            </ul>
        </div>
        <!-- /Breadcrumbs line -->

        <!--=== Page Header ===-->
        <div class="page-header">
            <div class="page-title">
                <h3><?php echo strtoupper($menu); ?></h3>
                <span></span>
            </div>
        </div>
        <!-- /Page Header -->

        <!--=== Page Content ===-->
<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Purchasing of Year <!--(<span class="blue">+29%</span>--></h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<div id="chart_filled_blue" class="chart"></div>
							</div>
							<div class="divider"></div>
							<div class="widget-content">
								<ul class="stats"> <!-- .no-dividers -->
									<li>
										<strong><?php echo $c_request;?></strong>
										<small>Total Request</small>
									</li>
									<li class="light hidden-xs">
										<strong><?php echo $c_approve;?></strong>
										<small>Total Approved</small>
									</li>
									<li>
										<strong><?php echo $c_reject;?></strong>
										<small>Total Reject</small>
									</li>
									<li class="light hidden-xs">
										<strong><?php echo $c_delivered;?></strong>
										<small>Total Delivered</small>
									</li>
								</ul>
							</div>
						</div>
					</div> <!-- /.col-md-12 -->
				</div>
    </div>
    <!-- /.container -->

</div>
<script>
"use strict";

$(document).ready(function(){

	// Sample Data
	
	<?php 
	
	//print_r($chart);
	
	foreach ($chart as $r) {
	
	
	
	 	if($r["month"] == "1"){
			$jan = "[1262304000000, ".$r["total"]."]";
		}else{
			$jan = "[1262304000000, 0]";
		}
		
		 if($r["month"] == "2"){
			$feb = "[1264982400000, ".$r["total"]."]";
		}else{
			$feb = "[1264982400000, 0]";
		}
		
		 if($r["month"] == "3"){
			$mar = "[1267401600000, ".$r["total"]."]";
		}else{
			$mar = "[1267401600000, 0]";
		}
		
		 if($r["month"] == "4"){
			$apr = "[1270080000000, ".$r["total"]."]";
		}else{
			$apr = "[1270080000000, 0]";
		}
		
		 if($r["month"] == "5"){
			$may = "[1272672000000, ".$r["total"]."]";
		}else{
			$may = "[1272672000000, 0]";
		}
		
		 if($r["month"] == "6"){
			$jun = "[1275350400000, ".$r["total"]."]";
		}else{
			$jun = "[1275350400000, 0]";
		}
		
		 if($r["month"] == "7"){
			$jul = "[1277942400000, ".$r["total"]."]";
		}else{
			$jul = "[1277942400000, 0]";
		}
		
		 if($r["month"] == "8"){
			$aug = "[1280620800000, ".$r["total"]."]";
		}else{
			$aug = "[1280620800000, 0]";
		}
		
		 if($r["month"] == "9"){
			$sep = "[1283299200000, ".$r["total"]."]";
		}else{
			$sep = "[1283299200000, 0]";
		}
		
		 if($r["month"] == "10"){
			$oct = "[1285891200000, ".$r["total"]."]";
		}else{
			$oct = "[1285891200000, 0]";
		}
		
		 if($r["month"] == "11"){
			$nov = "[1288569600000, ".$r["total"]."]";
		}else{
			$nov = "[1288569600000, 0]";
		}
		
		 if($r["month"] == "12"){
			$dec = "[1291161600000, ".$r["total"]."]";
		}else{
			$dec = "[1291161600000, 0]";
		}
		
/*		$r["month"] = NULL;
		$r["total"] = NULL;*/
		
	 }
//echo $aug;
	?>
	
	
	
var d1 = [<?php echo $jan; ?>, <?php echo $feb; ?>, <?php echo $mar; ?>, <?php echo $apr; ?>, <?php echo $may; ?>, <?php echo $jun; ?>, <?php echo $jul; ?>, <?php echo $aug; ?>, <?php echo $sep; ?>, <?php echo $oct; ?>, <?php echo $nov; ?>, <?php echo $dec; ?>];

	var data1 = [
		{ label: "Total Request", data: d1, color: App.getLayoutColorCode('blue') }
	];

	$.plot("#chart_filled_blue", data1, $.extend(true, {}, Plugins.getFlotDefaults(), {
		xaxis: {
			min: (new Date(2009, 12, 1)).getTime(),
			max: (new Date(2010, 11, 2)).getTime(),
			mode: "time",
			tickSize: [1, "month"],
			monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			tickLength: 0
		},
		series: {
			lines: {
				fill: true,
				lineWidth: 1.5
			},
			points: {
				show: true,
				radius: 2.5,
				lineWidth: 1.1
			},
			grow: { active: true, growings:[ { stepMode: "maximum" } ] }
		},
		grid: {
			hoverable: true,
			clickable: true
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: %y'
		}
	}));


});
</script>