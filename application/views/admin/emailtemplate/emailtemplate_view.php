<div class="">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="">
                <span class="someinfo"><?php flash();?></span>
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="txt-color-blueDark">
                    <i class="fa fa-lg fa-fw fa-pencil-square"></i> <span>Email Templates Manager</span>
                    
                      </h1>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive">
                       <table id="dt_basic" class="table table-striped table-bordered table-hover"> 
                            <thead>
                                <tr class="success">
                                    <th>Template Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!$emailtemplate)
                                {
                                    ?>
                                    <?php
                                }
                                else
                                {
                                    foreach($emailtemplate as $cat)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $cat['title'];?></td>
                                            <td>
                                                <a href="<?php echo site_url('admin/emailtemplate/edit')."/".$cat['id'];?>" class="btn btn-info" title="Edit">Edit</a>
                                                <a href="<?php echo site_url('admin/emailtemplate/createclone')."/".$cat['id'];?>" class="btn btn-info" title="Clone">Clone</a>
                                                <a href="<?php echo site_url('admin/emailtemplate/send')."/".$cat['id'];?>" class="btn btn-default" title="Send">Send</a>
                                                <a href="<?php echo site_url('admin/emailtemplate/delete')."/".$cat['id'];?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this email template?');">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                            <div class="pull-right" >
                            <a href="<?php echo site_url('admin/emailtemplate/add')?>"><input type="button" value="Add New Template" class="btn btn-success"/></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                

            </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.updateInfo').click(function(){
        var site_url="<?php echo site_url();?>";
    var idd=$(this).attr('id');
    $('.someinfo').html("Please Wait..<img src='"+site_url+"images/loader.gif' width='28px' height='25px' />");
    if(this.checked) {
            $.ajax({
            url: '<?php echo site_url().'admin/email/updatestatus'; ?>',
            data: 'id=' + idd+'&value=1',
            type: 'POST',
            success: function () {

                $('.someinfo').html("Status Updated Successfully");
            }
        });

    }
    else{
        $.ajax({
            url: '<?php echo site_url().'admin/email/updatestatus'; ?>',
            data: 'id=' + idd+'&value=0',
            type: 'POST',
            success: function () {

                $('.someinfo').html("Status Updated Successfully");
            }
        });
    }
    });

</script>

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
