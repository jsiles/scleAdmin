<?php
include_once("../../core/admin.php");
admin::initialize('todos','subastasList');
$searchTerm = admin::getParam("term");
    
    //get matched data from skills table
    $db->query("SELECT cli_uid as id, cli_socialreason as data FROM mdl_client WHERE cli_status_main=1 and (cli_socialreason LIKE '%".$searchTerm."%' or cli_nit_ci like '%".$searchTerm."%') and cli_type=2 ORDER BY cli_socialreason ASC");
    while ($row = $db->next_record()) {
        $data[] =  array('label' =>$row["data"] , 'value' =>$row["id"]);
    }
    
    //return json data
    echo json_encode($data);