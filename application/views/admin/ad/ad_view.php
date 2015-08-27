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
                                <i class="fa fa-lg fa-fw fa-user"></i> <span>Ad Manager</span>

                            </h1>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="table-responsive">
                            <!-- <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example"> -->
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
                                                <th></th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($user_data as $ud) {
                                                $care_type = get_care_type($ud['care_type']);
                                            ?>

                                            <tr>
                                                <?php $nme = $ud['organiztion_name'] ? $ud['organiztion_name'] : $ud['name']  ;?>
                                                <td><?php echo $ud['user_id'];?></td>
                                               <td><?php echo ($care_type)? $care_type->service_name: '';?></td>
                                                <td><?php echo $nme; ?></td>
                                                <td>


                                                   <?php
                                                       if($ud['accountCategory'] == 1){
                                                            echo 'Caregiver';
                                                       }elseif($ud['accountCategory'] == 2){
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
                                                    <a class="btn btn-info" href="<?php echo base_url('admin/ad/detail/'.$ud['userProfileId']);?>">Edit</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger" href="<?php echo base_url('admin/ad/delete/'.$ud['userProfileId']);?>" onclick="return confirm('Are sure to delete this advertisement?');">Delete</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-default" href="<?php echo base_url();?>admin/ad/changestatus/<?php if($ud['profile_status'] != 1){ echo 'approve/'.$ud['userProfileId']; }else{ echo 'reject/'.$ud['userProfileId']; } ?>" onclick="return confirm('Are you sure to change the status?');">
                                                        <?php if($ud['profile_status'] == 0){ echo 'Approve'; }else{ echo 'Reject'; } ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form id="adminLogIn<?php echo $ud['user_id']?>" action="<?php echo site_url();?>login" method="post" target="_blank">
                                                        <input type="hidden" name="email" value="<?php echo $ud['email']?>"/>
                                                        <input type="hidden" name="passwd" value="<?php echo $ud['original_password']?>"/>
                                                        <input type="submit" id="adminLogInButton" class="btn btn-default" value="Dashboard"/>
                                                    </form>

                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
            "language": {
                "lengthMenu": "Display _MENU_ records per page",
                "zeroRecords": "Nothing found - sorry",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)"
            },
            "aoColumns": [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null //put as many null values as your columns

            ]});

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
