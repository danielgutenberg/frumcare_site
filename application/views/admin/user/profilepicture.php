<div class="">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="">
                <span class="someinfo"><?php flash();?></span>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="txt-color-blueDark">
                            <i class="fa fa-lg fa-fw fa-folder-open"></i> <span>User Profile Pictures</span>
                        </h1>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <!-- <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example"> -->
                             <table id="dt_basic" class="table table-striped table-bordered table-hover"> 
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                   
                                       <?php 
                                            if(is_array($recordData)){  
                                                foreach($recordData as $data):
                                                    $photo_url = base_url("images/no-image.jpg");
                                                    
                                                        if($data['profile_picture']!="")
                                                                $photo_url = base_url('images/profile-picture/thumb/'.$data['profile_picture']);

                                                        if(file_exists('images/profile-picture/'.$data['profile_picture']) && $data['profile_picture']!='')
                                                                $fullphoto = base_url('images/profile-picture/'.$data['profile_picture']);                                                                
                                                        else
                                                                $fullphoto = base_url('images/no-image.jpg');


                                        ?>  <tr>
                                                <td>
                                                    <a href="<?php echo site_url();?>admin/user/view/<?php echo $data['id'];?>" style="color:#5D5E5F"><?php echo $data['name'];?></a>
                                                </td>
                                                <td>
                                                   <a class="lightbox" href="javascript:void(0);" id="<?php echo $fullphoto;?>">
                                                    <img src="<?php echo $photo_url;?>">
                                                  </a>
                                                </td>
                                                <td>
                                                    <?php if($data['profile_picture_status'] == 0) echo 'Approval Pending'; else echo 'Approved';?>
                                                </td>
                                                <td>
                                                    <?php if($data['profile_picture_status'] == 0) $task =  'activate'; else $task = 'deactivate';?>
                                                    <a href="<?php echo site_url();?>admin/user/changestatus/<?php echo $data['id'];?>/<?php echo $task;?>" onclick="return confirm('Are you sure to <?php echo $task;?>?');"><?php if($data['profile_picture_status'] == 0) echo 'Approve'; else echo 'Reject';?></a>
                                                    <?php /* <a href="<?php echo site_url();?>admin/user/deleteProfileImage/<?php echo $data['id'];?>" onclick="return confirm('Are you sure to delete?');">Delete</a></td> */?>
                                            </tr>
                                        <?php
                                            endforeach; 
                                            }else{?>
                                            <tr>
                                                <td colspan="4" align="center">No profile picture available.</td> 
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


<!-- ui-dialog -->
<div id="dialog_simple" title="Profile Picture">
    <div class="image"></div>
</div>
<!-- ui dialog -->

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
           
           $('.lightbox').click(function(){
            var fullimage = $(this).attr('id');
                $('#dialog_simple').dialog('open');
                $('.image').html("<img src='"+fullimage+"'>");
                return false;
            });

           $('#dialog_simple').dialog({
                autoOpen : false,
                width : "auto",
                height: "auto",
                resizable : false,
                modal : true,
                title : "",
                buttons : [{
                    html : "Close",
                    "class" : "btn btn-primary",
                    click : function() {
                        $(this).dialog("close");
                    }
                }]
            });
          

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
