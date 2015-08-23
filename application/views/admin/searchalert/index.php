<div class="">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="">
                <span class="someinfo"><?php flash();?></span>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="txt-color-blueDark">
                            <i class="fa fa-lg fa-fw fa-folder-open"></i> <span>Search Alerts</span>
                        </h1>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <!-- <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example"> -->
                            <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Distance</th>
                                    <th>Searched Keywords</th>
                                    <th>Searched Date</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                if(is_array($record)){
                                    foreach($record as $rec):
                                ?>
                                        <tr>
                                            <td><?php echo $rec->name;?></td>
                                            <td>


                                                <div id="locationField">
                                                    <?php echo $rec->location;?>
                                                    </div>
                                            </td>
                                            <td>
                                                <?php echo $rec->distance;?>

                                            </td>
                                            <td>
                                                <?php
                                                echo $rec->service_name;
                                                unset($rec->service_name);
                                                unset($rec->distance);
                                                unset($rec->lat);
                                                unset($rec->long);
                                                if ($rec->gender == 1) {
                                                    echo ', Male';
                                                }
                                                if ($rec->gender == 2) {
                                                    echo ', Female';
                                                }
                                                unset($rec->gender);
                                                if ($rec->year_experience > 0) {
                                                    if ($rec->year_experience == 6) {
                                                        echo ', 5+ years of experience';
                                                    } else {
                                                        echo ', ' . $rec->year_experience . ' years of experience';
                                                    }
                                                }
                                                // 	foreach($rec as $key => $value) {
                                                // 	   if ($value > 0) {
                                                // 	        echo ', ' . $key;
                                                // 	   }
                                                // 	}
                                                ?>
                                            </td>
                                            <td>

                                                <?php echo $rec->searcheddate;?>
                                            </td>

                                        </tr>
                                    <?php
                                    endforeach;
                                }else{?>
                                    <tr>
                                        <td colspan="4" align="center">No Records available.</td>
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

       pageSetUp();


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
