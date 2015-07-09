<div class="">
    <div class="padding-10">
        <div class="row">
            <div class="">
                <?php flash();?>
                <!--Admin Details Manager-->
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="txt-color-blueDark">
                        <i class="fa fa-lg fa-fw fa-user"></i> <span>Notification Manager</span>
                        
                       </h1>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <div class="table-responsive">
                           <table id="dt_basic" class="table table-striped table-bordered table-hover">  
                                <thead>
                                    <tr class="">
                                        <th>Notification Subject</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($data!=null){
                                        foreach($data as $admins){
                                            ?>
                                            <tr>
                                                <td><?php echo ucwords($admins['notification_title']);?></td>
                                                <td>
                                                    <?php 
                                                        if($admins['status'] == 0){
                                                            echo 'Inactive';
                                                        }
                                                        if($admins['status'] == 1){
                                                            echo 'Active';
                                                        } 
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('admin/notification/edit')."/".$admins['id']; ?>" class="btn btn-info" title="Edit">Edit</a>
                                                    <a href="<?php echo site_url('admin/notification/delete')."/".$admins['id']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this notification?');">Delete</a>
                                                    <a href="<?php echo site_url();?>admin/notification/send/<?php echo $admins['id'];?>" class="btn btn-default" title="Send">Send</a>
                                                    <a href="<?php echo site_url();?>admin/notification/setasautoreplies/<?php echo $admins['id'];?>" class="btn btn-default" title="Set as Recurring">Set as auto replies</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr class="warning">
                                            <th>No Data</th>
                                            <th>No Data</th>
                                            <th>No Data</th>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>    
                            </table>
                            <div class="pull-right">
                            <a class="btn btn-success" href="<?php echo site_url('admin/notification/add'); ?>">Add New Notification</a>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!----------------------------Admin Details Manager Ends--------------------------->
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
            
            pageSetUp();
            
            /*
             * BASIC
             */
            $('#dt_basic').dataTable({
                "sPaginationType" : "bootstrap_full"
            });
    
            /* END BASIC */
    
            /* Add the events etc before DataTables hides a column */
            $("#datatable_fixed_column thead input").keyup(function() {
                oTable.fnFilter(this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $("thead input").index(this)));
            });
    
            $("#datatable_fixed_column thead input").each(function(i) {
                this.initVal = this.value;
            });
            $("#datatable_fixed_column thead input").focus(function() {
                if (this.className == "search_init") {
                    this.className = "";
                    this.value = "";
                }
            });
            $("#datatable_fixed_column thead input").blur(function(i) {
                if (this.value == "") {
                    this.className = "search_init";
                    this.value = this.initVal;
                }
            });     
            
    
            var oTable = $('#datatable_fixed_column').dataTable({
                "sDom" : "<'dt-top-row'><'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
                //"sDom" : "t<'row dt-wrapper'<'col-sm-6'i><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'>>",
                "oLanguage" : {
                    "sSearch" : "Search all columns:"
                },
                "bSortCellsTop" : true
            });     
            
    
    
            /*
             * COL ORDER
             */
            $('#datatable_col_reorder').dataTable({
                "sPaginationType" : "bootstrap",
                "sDom" : "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
                "fnInitComplete" : function(oSettings, json) {
                    $('.ColVis_Button').addClass('btn btn-default btn-sm').html('Columns <i class="icon-arrow-down"></i>');
                }
            });
            
            /* END COL ORDER */
    
            /* TABLE TOOLS */
            $('#datatable_tabletools').dataTable({
                "sDom" : "<'dt-top-row'Tlf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
                "oTableTools" : {
                    "aButtons" : ["copy", "print", {
                        "sExtends" : "collection",
                        "sButtonText" : 'Save <span class="caret" />',
                        "aButtons" : ["csv", "xls", "pdf"]
                    }],
                    "sSwfPath" : "js/plugin/datatables/media/swf/copy_csv_xls_pdf.swf"
                },
                "fnInitComplete" : function(oSettings, json) {
                    $(this).closest('#dt_table_tools_wrapper').find('.DTTT.btn-group').addClass('table_tools_group').children('a.btn').each(function() {
                        $(this).addClass('btn-sm btn-default');
                    });
                }
            });
        
        /* END TABLE TOOLS */
        })

        </script>
