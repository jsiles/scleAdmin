<?php
include_once("../../database/connection.php");  
include_once("../../core/admin.php");
include_once("../../core/files.php");
admin::initialize('banners','opinionNew',false); 
$ban_uid = admin::getParam("uid");
$sql = "UPDATE mdl_banners SET ban_content='', ban_file='' WHERE ban_uid=".$ban_uid;
$db->query($sql);
?>