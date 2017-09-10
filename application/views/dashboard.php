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

	// Sample Data
	var d1 = [[<?php echo $jan_s; ?>, <?php echo $jan_t; ?>], [<?php echo $feb_s; ?>, <?php echo $feb_t; ?>], [<?php echo $mar_s; ?>, <?php echo $mar_t; ?>], [<?php echo $apr_s; ?>, <?php echo $apr_t; ?>], [<?php echo $may_s; ?>, <?php echo $may_t; ?>], [<?php echo $jun_s; ?>, <?php echo $jun_t; ?>], [<?php echo $jul_s; ?>, <?php echo $jul_t; ?>], [<?php echo $aug_s; ?>, <?php echo $aug_t; ?>], [<?php echo $sep_s; ?>, <?php echo $sep_t; ?>], [<?php echo $oct_s; ?>, <?php echo $oct_t; ?>], [<?php echo $nov_s; ?>, <?php echo $nov_t; ?>], [<?php echo $dec_s; ?>, <?php echo $dec_t; ?>]];

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