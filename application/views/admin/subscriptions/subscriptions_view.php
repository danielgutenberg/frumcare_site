<div class="">
    <div class="padding-10">
        <div class="row main-content">
            <div class="">
                <?php if($this->session->flashdata('info')){echo '<div class="message alert alert-info">'.$this->session->flashdata('info').'</div>';}?>
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h1 class="txt-color-blueDark">
                    <i class="fa fa-lg fa-fw fa-envelope"></i> <span>Subscriptions</span>
                    <div class="pull-right" >
                        <?php /*<a href="<?php echo site_url('admin/page/sort_page');?>"><input type="button" class="btn btn-default" value="Sort Pages"/></a>*/?>
                        <!--<a href="<?php //echo site_url('admin/page/add')?>"><input type="button" value="Add New Page" class="btn btn-success"/></a>-->
                    </div>
                  </h1>
                </div>
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="dt_basic" class="table table-striped table-bordered table-hover"  data-order='[[ 7, "desc" ]]'> 
                           <!--  <div class="dt-top-row"><div id="dt_basic_length" class="dataTables_length"><span class="smart-form"><label style="width:60px" class="select"><select name="dt_basic_length" size="1" aria-controls="dt_basic"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select><i></i></label></span></div><div class="dataTables_filter" id="dt_basic_filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input type="text" placeholder="Filter" class="form-control" aria-controls="dt_basic"></div></div> -->
                                <thead>
                        		<tr>
                        			<th>User Id</th>
                        			<th>Name</th>
                                    <th>Email</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                        		<?php foreach($user_data as $ud) { ?>
                                <tr>
                                    <td><?php echo $ud['id'];?></td>
                                    <td><?php echo $ud['name'] ?></td>
                                    <td><?php echo $ud['email'];?></td>
                                </tr>
                                <?php } ?>
                        	</tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PAGE RELATED PLUGIN(S) -->
        <script src="<?php echo site_url();?>plugins/admin/js/plugin/datatables/jquery.dataTables-cust.min.js"></script>
        <script src="<?php echo site_url();?>plugins/admin/js/plugin/datatables/ColReorder.min.js"></script>
        <script src="<?php echo site_url();?>plugins/admin/js/plugin/datatables/FixedColumns.min.js"></script>
        <script src="<?php echo site_url();?>plugins/admin/js/plugin/datatables/ColVis.min.js"></script>
        <script src="<?php echo site_url();?>plugins/admin/js/plugin/datatables/ZeroClipboard.js"></script>
        <script src="<?php echo site_url();?>plugins/admin/js/plugin/datatables/media/js/TableTools.min.js"></script>
        <script src="<?php echo site_url();?>plugins/admin/js/plugin/datatables/DT_bootstrap.js"></script>
        

        <script type="text/javascript">
        
        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        
        $(document).ready(function() {
            
            /*
             * BASIC
             */
            $('#dt_basic').dataTable({
                "sPaginationType" : "bootstrap_full"
            });
    
            /* END BASIC */
    

        })

        </script>
