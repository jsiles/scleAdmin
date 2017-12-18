<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
include_once("../../core/safeHtml.php");
include_once("../../../classes/class.SymmetricCrypt.inc.php");
admin::initialize('clasificador','clasificadorNew',false);

$tipUid=admin::getParam("tipUid");
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
    
    
$cla_val = admin::getDBvalue("select count(cla_cod) FROM mdl_classifier where cla_cod='".$cla_codigo."' and cla_level=$level and cla_delete=0 ");
if($cla_val==0){
    
    
	$sql = "insert into mdl_classifier(							
								cla_cod,
								cla_parent,
								cla_level,
								cla_position,
								cla_title,
								cla_delete,
								cla_status
								)
						values	(
								'".admin::toSql($cla_codigo,"Text")."' ,
								".admin::toSql($parent,"Number").",
								".admin::toSql($level,"Number").",
								0,
								'".admin::toSql($cla_title,"Text")."',
								0,
								'".admin::toSql($cla_status,"Text")."'
								)";
        //echo $sql;die;
	$db->query($sql);
}else{
    
    die("C&oacute;digo ya existe");
}
			
	
header('Location: ../../clasificaList.php?tipUid='.$tipUid);
?>