<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
admin::initialize('subastas','subastaImageDel'); 
$pro_uid = admin::getParam("uid");
$sql = "update mdl_product  
		set pro_document='' 
		where pro_uid=" . $pro_uid;
$db->query($sql);
?>
