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
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" data-order='[[ 0, "desc" ]]'>
                                <thead>
                                <tr>
                                    <th style="display:none"></th>
                                    <th>Searched Date</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Distance</th>
                                    <th>Searched Keywords</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                if(is_array($record)){
                                    foreach($record as $rec):
                                ?>
                                        <tr>
                                            <td style="display:none"><?php echo 100000000000000 - strtotime($rec->searcheddate)?></td>
                                            <td>

                                                <?php echo $rec->searcheddate;?>

                                            </td>
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

        $('#dt_basic').dataTable({
            "sPaginationType" : "bootstrap_full"
        });

       
    })

</script>
