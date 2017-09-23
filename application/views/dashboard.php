<title>Dashboard | lsx.co.th </title>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/flot/jquery.flot.tooltip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/flot/jquery.flot.time.min.js"></script>


<div id="content">
    <div class="container">
        <!-- Breadcrumbs line -->
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo base_url();?>dashboard">DASHBOARD</a>
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
		<div class="row">
			<div class="col-md-12">
				<div class="widget box">
					<div class="widget-header">
						<h4><i class="icon-reorder"></i> Purchase Request of Year <!--(<span class="blue">+29%</span>--></h4>
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
								<strong><?php echo $all;?></strong>
								<small>Total Request</small>
							</li>
							<li class="light">
								<strong><?php echo $request;?></strong>
								<small>Request</small>
							</li>
							<li class="light">
								<strong><?php echo $approved;?></strong>
								<small>Approve</small>
							</li>
							<li class="light">
								<strong><?php echo $unapproved;?></strong>
								<small>Un Approve</small>
							</li>
							<li>
								<strong><?php echo $reject;?></strong>
								<small>Reject</small>
							</li>
							<li>
								<strong><?php echo $pending;?></strong>
								<small>Pending</small>
							</li>
							<li class="light">
								<strong><?php echo $completed;?></strong>
								<small>Complete</small>
							</li>
						</ul>
					</div>
				</div>
			</div> <!-- /.col-md-12 -->
		</div>
    </div>
    <!-- /.container -->
</div>
<div id="data-time" data-min="<?php echo date('Y')-1 ?>, 12, 31" data-max="<?php echo date('Y') ?>, 12, 2" ></div>
<script>
"use strict";

$(document).ready(function(){

	var url = window.location.origin + "/dashboard/getYear";
	$.getJSON(url, function(result){
		var d1 = result;
		var dataMin = $("#data-time").attr('data-min');
		var dataMax = $("#data-time").attr('data-max');
		var data1 = [
			{ label: "Total Request ", data: d1, color: App.getLayoutColorCode('blue') }
		];
		$.plot("#chart_filled_blue", data1, $.extend(true, {}, Plugins.getFlotDefaults(), {
			xaxis: {
				min: (new Date(dataMin)).getTime(),
				max: (new Date(dataMax)).getTime(),
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



});
</script>