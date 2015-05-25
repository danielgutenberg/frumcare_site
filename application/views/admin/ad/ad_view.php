<div class="row">
    <div class="col-md-9 content-box">
        <div class="row main-content">
            <script>
var arescrolling = 0;
function scroller(from,to) {
	if (arescrolling) return; // avoid potential recursion/inefficiency
	arescrolling = 1;
	// set the other div's scroll position equal to ours
	document.getElementById(to).scrollLeft =
		document.getElementById(from).scrollLeft;
	arescrolling = 0;
}
</script>
            <div onscroll="scroller('scroller', 'scrollme')" id="scroller" class="fakeContainer" style="width: 1025px; height: 10px !important; overflow-x:scroll;">
                <img src="1x2066.gif" height="1" width="1390" style="width:1350px;">
            </div>
            <div class="container" style="width:1025px !important; overflow-x:scroll;" id="scrollme">
                <div class="panel panel-default" style="width:1380px">
                <span class="someinfo"><?php if($this->session->flashdata('info')){echo '<span class="alert-info">'.$this->session->flashdata('info').'</span>';}?></span>
                <div class="panel-heading">
                  <h4>
                    <i class="glyphicon glyphicon-book"></i><span class="break"></span> <span>Ad Manager</span>
                    <div class="pull-right" >
                    </div>
                  </h4>
                </div>
                <?php flash() ?>
                <div class="panel-body">
                <div class="table-responsive">
                <table id="dt_basic" class="table table-striped table-bordered table-hover"> 
                	<thead>
                		<tr>
                                    <th>User Id</th>
                             <th>Ad Title</th> 
                            <th>Name</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Email</th>
                            <th>Phone</th>
                           
                             <th>Created On</th>
                             <th>Updated on</th>
                             <th>Status</th>
                            <th colspan="4">Actions</th>
                		</tr>
                	</thead>
                	<tbody>
                		<?php foreach($user_data as $ud) { 
                            $care_type = get_care_type($ud['care_type']);
                        ?>
                        
                        <tr>
                            <?php $nme = $ud['organization_name'] ? $ud['organization_name'] : $ud['name']  ;?>
                            <td><?php echo $ud['user_id'];?></td>
                           <td><?php echo ($care_type)? $care_type->service_name: '';?></td> 
                            <td><?php echo $nme; ?></td>
                            <td>
                                
                               <!--  <?php echo $ud['account_category']==1 ? 'Care Giver': 'Care Seeker';?> -->
                               <?php 
                                   if($ud['account_category'] == 1){
                                        echo 'Caregiver';
                                   }elseif($ud['account_category'] == 2){
                                    echo 'Parent';
                                   }else{
                                    echo 'Organization';
                                   }
                                   
                               ?>
                            </td>
                            <td><?php echo $ud['ad_type']==1 ? 'Paid': 'Free';?></td>
                            <td><?php echo $ud['email'];?></td>
                            <td><?php echo $ud['contact_number'];?></td>
                            <td><?php echo date('Y-m-d H:i:s',$ud['created_time']);?></td>
                            
                            <td><?php echo date('Y-m-d H:i:s',$ud['updated_time']);?></td>
                            <td><?php echo $ud['profile_status'] == 1 ? 'Approved':'Pending';?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo base_url('admin/ad/detail/'.$ud['id']);?>">Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="<?php echo base_url('admin/ad/delete/'.$ud['id']);?>" onclick="return confirm('Are sure to delete this advertisement?');">Delete</a>
                            </td>
                            <td>
                                <a class="btn btn-default" href="<?php echo base_url();?>admin/ad/changestatus/<?php if($ud['profile_status'] != 1){ echo 'approve/'.$ud['id']; }else{ echo 'reject/'.$ud['id']; } ?>"onclick="return confirm('Are you sure to change the status?');"> <?php if($ud['profile_status'] == 0){ echo 'Approve'; }else{ echo 'Reject'; } ?></a>
                            </td>
                            <td>
                                <a class="btn btn-default" href="<?php echo base_url();?>admin/user-dashboard/<?php echo $ud['id'] ?>">Dashboard</a>
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
<style type="text/css">
    html{
    height:auto;
}
</style>


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