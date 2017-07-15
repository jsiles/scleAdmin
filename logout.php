<?php 
include_once("core/admin.php");
//if($_SESSION["usr_uid"]==14) admin::doLog("Logout:");
//@session_start();
$sql = "UPDATE sys_users_verify SET suv_status=1 WHERE suv_cli_uid='" . $_SESSION["usr_uid"] . "' and suv_status=0 ";// and suv_token='". $_SESSION["token"]."'";
$db->query($sql);
session_id(NULL);
$_SESSION=array();
session_unset();
session_destroy(); 
header('Location: index.php?logout');
?>