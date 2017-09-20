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
                        <a href="<?php echo base_url();?>stock/list_item" title=""><?php echo strtoupper($menu); ?></a>
                    </li>
                    <li class="current">
                        <a href="#" title=""><?php echo strtoupper($subMenu) ?></a>
                    </li>
                </ul>
            </div>
            <div class="page-header">
                <div class="page-title">
                    <h3><?php echo strtoupper($subMenu) ?></h3>
                    <span></span>
                </div>
            </div>
			<div class="row">
			    <div class="col-md-12">
			        <div class="widget box">
                        <div class="widget-header">
                            <h4><i class="icon-reorder"></i> Add by import file</h4>
                        </div>
                        <div class="widget-content">
                            <form class="form-horizontal row-border" method="post" action="<?php echo base_url(); ?>stock/import_item/1" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">File Upload:</label>
                                    <div class="col-md-10">
                                        <input type="file" name="file" data-style="fileinput">
                                    </div>
                                </div>
                            <div align="left"><!--<a href="<?php echo base_url(); ?>stock/temp_list/1">รายการที่ Import ค้างไว้</a>--></div><div align="right"><input class="btn btn-sm btn-primary" type="submit" value="Import"> <input class="btn" type="reset" value="Reset"></div>

                            </form>
                        </div>
                    </div>
			    </div>
			</div>
    </div>
    <!-- /.container -->

</div>
</div>
<script>
	$(function () {
	  $('#Add').on('click', function () {
	//	$('<p>Text</p>').appendTo('#other_company');
		 $("#other_company").toggle();
	  });
	});
	
</script>
</body>