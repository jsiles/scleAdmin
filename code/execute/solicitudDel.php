<?php
include_once("../../core/admin.php");
admin::initialize('todos','usersNew',false);
$sol_uid = admin::getParam("uid");
$sql = "update mdl_solicitud_compra set sol_delete=1 where sol_uid=".$sol_uid;
$db->query($sql);
?>