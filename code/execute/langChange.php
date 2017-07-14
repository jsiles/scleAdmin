<?php
include_once("../../core/admin.php");
admin::initialize('todos','contentList',false); 

$_SESSION["LANG"] = admin::getParam("language");
header('Location: ../../../..'.admin::getParam("origin"));	
?>