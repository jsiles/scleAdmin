<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../core/safeHtml.php");
include_once("../../../classes/class.SymmetricCrypt.inc.php");
admin::initialize('clasificador','clasificadorNew',false);

$tipUid=admin::getParam("tipUid");
$cla_uid=admin::getParam("cla_uid");
$cla_codigo=admin::getParam("cla_codigo");
$cla_title=admin::getParam("cla_title");
$cla_level0=admin::getParam("cla_level0");
$cla_level1=admin::getParam("cla_level1");
$cla_level2=admin::getParam("cla_level2");
$cla_status = 'ACTIVE';
$parent=0;
    if($cla_level0==0) $level=1; else {
        $parent=$cla_level0;
        if($cla_level1==0) $level=2; else {
            $parent=$cla_level1;
            if($cla_level2==0) $level=3;else {
                $parent=$cla_level2;
                $level=4;
            }
        }
    }
    
    

    
    
	$sql = "update mdl_classifier set 							
								cla_cod='".admin::toSql($cla_codigo,"Text")."',
								cla_title='".admin::toSql($cla_title,"Text")."' ,
                                                                cla_parent=".admin::toSql($parent,"Number").",
								cla_level=".admin::toSql($level,"Number")."
                
                 where cla_uid=$cla_uid";
        //echo $sql;die;
	$db->query($sql);
		
	
header('Location: ../../clasificaList.php?tipUid='.$tipUid);
?>