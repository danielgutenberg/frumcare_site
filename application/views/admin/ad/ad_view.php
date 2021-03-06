<div class="">
    <div class="padding-10">
        <div class="row main-content">
            <div class="">
                <?php if($this->session->flashdata('info')){echo '<div class="message alert alert-info">'.$this->session->flashdata('info').'</div>';}?>
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h1 class="txt-color-blueDark">
                    <i class="fa fa-lg fa-fw fa-group"></i> <span>User Manager</span>
                    <div class="pull-right" >
                        <?php /*<a href="<?php echo site_url('admin/page/sort_page');?>"><input type="button" class="btn btn-default" value="Sort Pages"/></a>*/?>
                        <!--<a href="<?php //echo site_url('admin/page/add')?>"><input type="button" value="Add New Page" class="btn btn-success"/></a>-->
                    </div>
                  </h1>
                </div>
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="dt_basic" class="table table-striped table-bordered table-hover"  data-order='[[ 0, "asc" ]]'> 
                           <!--  <div class="dt-top-row"><div id="dt_basic_length" class="dataTables_length"><span class="smart-form"><label style="width:60px" class="select"><select name="dt_basic_length" size="1" aria-controls="dt_basic"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select><i></i></label></span></div><div class="dataTables_filter" id="dt_basic_filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input type="text" placeholder="Filter" class="form-control" aria-controls="dt_basic"></div></div> -->
                                <thead>
                        		<tr>
                        		    <th style="display:none"></th>
                        			<th>User Id</th>
                        			<th>Name</th>
                                    <th>Category</th>
                                    <th>Care Type</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Phone</th>
                                    <th>Created On</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                        		<?php foreach($user_data as $ud) { ?>
                                <tr>
                                    <td style="display:none"><?php echo 100000 - $ud['id']?></td>
                                    <td><?php echo $ud['user_id'];?></td>
                                    <td><?php 
                                        if (isset($ud['organization_name'])  && $ud['organization_name'] != '') {
                                            echo $ud['organization_name'];
                                        } else {
                                            echo $ud['name'];
                                        }
                                        ?>
                                        
                                    </td>
                                    <td>
                                    
                                   
                                   <?php 
                                        $ct = $ud['care_type'];
                                       if($ct < 11){
                                            echo 'Caregiver';
                                       }elseif($ct < 17 || $ct > 24){
                                        echo 'Organization';
                                       }else{
                                        echo 'Parent';
                                       }
                                       
                                   ?>
                                </td>
                                <td><?php echo $ud['service_name'];?></td>
                            <td><?php echo $ud['email'];?></td>
                            <td><?php echo $ud['location'];?></td>
                            <td><?php echo $ud['contact_number'];?></td>
                            <td><?php echo date('M j, Y H:i',$ud['created_time']);?></td>
                            <?php
                                if ($ud['archive'] == 1) {
                                    $archiveStatus = 'Archived';
                                } else {
                                    if ($ud['profile_status'] == 1) {
                                       $archiveStatus = 'Approved'; 
                                    } else {
                                        $archiveStatus = 'Pending'; 
                                    }
                                }
                            ?>
                            <td><?php echo $archiveStatus;?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo base_url('admin/ad/detail/'.$ud['userProfileId']);?>">Edit</a>
                            
                                <a class="btn btn-danger" href="<?php echo base_url('admin/ad/delete/'.$ud['userProfileId']);?>" onclick="return confirm('Are sure to delete this advertisement?');">Delete</a>
                          
                                <a class="btn btn-default" href="<?php echo base_url();?>admin/ad/changestatus/<?php if($ud['profile_status'] != 1){ echo 'approve/'.$ud['userProfileId']; }else{ echo 'reject/'.$ud['userProfileId']; } ?>"onclick="return confirm('Are you sure to change the status?');"> <?php if($ud['profile_status'] == 0){ echo 'Approve'; }else{ echo 'Reject'; } ?></a>
                                
                                <a class="btn btn-default" href="<?php echo base_url();?>admin/ad/sendAlert/<?php echo $ud['userProfileId']; ?>"onclick="return confirm('Are you sure you want to send out an alert?');">Send Alert</a>
                                <?php
                                    $attributes = array('id' => 'adminLogIn' . $ud['user_id'], 'target' => '_blank');
                                    echo form_open('login', $attributes);
                                ?>
                                    <input type="hidden" name="email" value="<?php echo $ud['email']?>"/>
                                    <input type="hidden" name="passwd" value="<?php echo $ud['original_password']?>"/>
                                    <input type="submit" id="adminLogInButton" class="btn btn-default" value="Dashboard"/>
                                </form>
                                
                            </td>
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
            
            // pageSetUp();
            
            /*
             * BASIC
             */
            $('#dt_basic').dataTable({
                "sPaginationType" : "bootstrap_full"
            });
            $('#dt_basic thead tr th:nth-child(9)').click()
            $('#dt_basic thead tr th:nth-child(9)').click()
    
            /* END BASIC */
    
        //     /* Add the events etc before DataTables hides a column */
        //     $("#datatable_fixed_column thead input").keyup(function() {
        //         oTable.fnFilter(this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $("thead input").index(this)));
        //     });
    
        //     $("#datatable_fixed_column thead input").each(function(i) {
        //         this.initVal = this.value;
        //     });
        //     $("#datatable_fixed_column thead input").focus(function() {
        //         if (this.className == "search_init") {
        //             this.className = "";
        //             this.value = "";
        //         }
        //     });
        //     $("#datatable_fixed_column thead input").blur(function(i) {
        //         if (this.value == "") {
        //             this.className = "search_init";
        //             this.value = this.initVal;
        //         }
        //     });     
            
    
        //     var oTable = $('#datatable_fixed_column').dataTable({
        //         "sDom" : "<'dt-top-row'><'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
        //         //"sDom" : "t<'row dt-wrapper'<'col-sm-6'i><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'>>",
        //         "oLanguage" : {
        //             "sSearch" : "Search all columns:"
        //         },
        //         "bSortCellsTop" : true
        //     });     
            
    
    
        //     /*
        //      * COL ORDER
        //      */
        //     $('#datatable_col_reorder').dataTable({
        //         "sPaginationType" : "bootstrap",
        //         "sDom" : "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
        //         "fnInitComplete" : function(oSettings, json) {
        //             $('.ColVis_Button').addClass('btn btn-default btn-sm').html('Columns <i class="icon-arrow-down"></i>');
        //         }
        //     });
            
        //     /* END COL ORDER */
    
        //     /* TABLE TOOLS */
        //     $('#datatable_tabletools').dataTable({
        //         "sDom" : "<'dt-top-row'Tlf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
        //         "oTableTools" : {
        //             "aButtons" : ["copy", "print", {
        //                 "sExtends" : "collection",
        //                 "sButtonText" : 'Save <span class="caret" />',
        //                 "aButtons" : ["csv", "xls", "pdf"]
        //             }],
        //             "sSwfPath" : "js/plugin/datatables/media/swf/copy_csv_xls_pdf.swf"
        //         },
        //         "fnInitComplete" : function(oSettings, json) {
        //             $(this).closest('#dt_table_tools_wrapper').find('.DTTT.btn-group').addClass('table_tools_group').children('a.btn').each(function() {
        //                 $(this).addClass('btn-sm btn-default');
        //             });
        //         }
        //     });
        
        // /* END TABLE TOOLS */
        })

        </script>
