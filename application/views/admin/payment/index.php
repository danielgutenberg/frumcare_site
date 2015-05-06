<div class="row">
    <div class="col-md-9 content-box">
        <div class="row">
            <div class="container">
                <span class="alert-info someinfo"><?php if($this->session->flashdata('info')){echo $this->session->flashdata('info');}?></span>
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>
                        <i class="glyphicon glyphicon-credit-card"></i><span class="break"></span> <span>Payment Manager</span>
                      </h4>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive">
                        <table id="dt_basic" class="table table-striped table-bordered table-hover"> 
                            <thead>
                                <tr class="success">
                                   <th>User name</th>
                                   <th>Package Name</th>
                                   <th>Created On</th>
                                   <th>Updated On</th>
                                   <th>Amount</th>
                                   <th>Status</th>
                                   <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php
                                if(!$details)
                                {
                                    ?>
                                    <?php
                                }
                                else
                                {   
                                    foreach($details as $detail):
                                        //var_dump($detail);
                               ?>
                            <tr>
                                <td><?php echo $detail['user_name'];?></td>    
                                <td><?php echo $detail['package_name'];?></td>
                                <td><?php echo $detail['created_date'];?></td>    
                                <td><?php echo $detail['updated_date'];?></td> 
                                <td><?php echo $detail['package_amount'];?></td>    
                                <td><?php if($detail['status'] == 0) echo  'Pending'; else echo 'Paid';?></td>    
                                <td>
                                    <a href="<?php echo site_url();?>admin/payment/pay/<?php echo $detail['id'];?>" class="btn btn-default">Pay</a>
                                    <a href="<?php echo site_url();?>admin/payment/edit/<?php echo $detail['id'];?>" class="btn btn-info">Edit</a> 
                                    <a href="<?php echo site_url();?>admin/payment/delete/<?php echo $detail['id'];?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        <?php 
                            endforeach;  
                        }
                        ?>
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