<?php
include_once("../../core/admin.php");
admin::initialize('clasificador','clasificadorNew',false);
$mcl_uid = admin::getParam("uid");
$sql = "update mdl_classifier set cla_delete=1 where cla_uid=".$mcl_uid;
$db->query($sql);
?>