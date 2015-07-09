<div class="">
    <div class="padding-10 content-box">
        <div class="row">
            <div class="container">
                <span class="alert-info someinfo"><?php flash();?></span>
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="txt-color-blueDark">
                        <i class="fa fa-lg fa-fw fa-quote-left"></i> <span>Testimonial Manager</span>
                      </h1>
                </div>
                    <div class="panel-body">
                    <div class="table-responsive">
                    <table id="dt_basic" class="table table-striped table-bordered table-hover">  
                            <thead>
                                <tr class="success">
                                    <th>Name</th>
                                    <th>Short Desc</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!$details){
                                    ?>
                                    <?php
                                }
                                else{
                                    foreach($details as $test){
                                        //$username = ($test->middle_name != '') ? ucwords($test->first_name).' '.ucwords($test->middle_name).' '.ucwords($test->last_name) : ucwords($test->first_name).' '.ucwords($test->last_name);
                                        ?>
                                        <tr>
                                            <td><?php echo ucwords($test->testimonial_by);?></td>
                                            <td><?php echo substr($test->testimonial_description, 0,50).'...'?></td>
                                            <td><?php echo($test->is_active=='1')?'Approved':'Pending';?></td>
                                            <td>
                                                <a href="<?php echo site_url("admin/testimonial/edit/{$test->id}");?>" class="btn btn-info" title="View/Edit">View/Edit</span></a>
                                                <a href="<?php echo site_url("admin/testimonial/delete/{$test->id}");?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this testimonial?');">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                        <div id="res"></div>
                    <div class="pull-right" >
                            <a href="<?php echo site_url('admin/testimonial/add')?>" class="btn btn-success">Add New Testimonial</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
//    $(function(){
//         $('.view_by').on('change', function() {
//           var number = this.value;
//           $.ajax({
//             type:"get",
//             url:"<?php echo site_url();?>admin/testimonial/getdata/"+number,
//             dataType:"json",
//             success:function(msg){
//                if(msg.length>0){
//                 $('#example').hide();
//                 //$()
//                }
//                if(msg == '1'){
//                 $('#example').show();
//                }
//             }
//           });
//         });
//     });



//    $( document ).ready(function() {
 
//     $( "a" ).click(function( event ) {
 
//         alert( "Thanks for visiting!" );
 
//     });
 
// });
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
