<?php
include_once("../../core/admin.php");
$tipUid=  admin::getParam("tipUid");
switch($tipUid){
    case 2: $opcionMenu = "informes";
            $opocionSubMenu ="informesList";
            $etiquetaCrear = "informesNew";
            $moduleListId=22;
            $moduleCrearId=23;
            break;
    case 6: $opcionMenu = "informes2";
            $opocionSubMenu ="informesList2";
            $etiquetaCrear = "informesNew2";
            $moduleListId=68;
            $moduleCrearId=69;
            break;    
    default:$opcionMenu = "informes";
            $opocionSubMenu ="informesList";
            $moduleListId=22;
            $moduleCrearId=23;
            break; 
}
admin::initialize($opcionMenu, $opocionSubMenu); 
$sub_uid = admin::getParam("sub_uid");
/*$sql = "update mdl_subasta set sub_finish=4 where sub_uid=".$sub_uid;
$db->query($sql);*/
$userUID = admin::getSession("usr_uid");
$elaborado='';//admin::getParam("elaborado");
$aprobado = '';//admin::getParam("aprobado");
$observaciones = admin::getParam("observaciones");
$ahorro = admin::getParam("ahorro");
$sua_uid = admin::getParam("sua_uid");
$token = admin::getParam("token");
$monto = admin::getParam("monto");
$sql = "update mdl_subasta_informe set "
        . "sua_user_uid=$userUID, sua_elaborado='".admin::toSql($elaborado, "Text")."', sua_aprobado='".admin::toSql($aprobado, "Text")."',"
        . " sua_observaciones='".admin::toSql($observaciones, "Text")."', sua_date=GETDATE(), sua_ahorro=$ahorro, sua_monto=$monto "
        . " where sua_uid=$sua_uid";
//echo $sql;die;        
$db->query($sql);
header('Location: ../../informeList.php?tipUid='.$tipUid);
?>