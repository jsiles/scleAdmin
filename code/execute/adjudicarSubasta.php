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
$elaborado= '';
$aprobado = '';//admin::getParam("aprobado");
$observaciones = admin::getParam("observaciones");
$ahorro = admin::getParam("ahorro");
$monto = admin::getParam("monto");
$token = admin::getParam("token");
$sql = "insert into mdl_subasta_informe "
        . "(sua_user_uid, sua_sub_uid, sua_elaborado, sua_aprobado, sua_observaciones, sua_date, sua_ahorro, sua_monto, sua_status)"
        . " values "
        . "($userUID, $sub_uid, '".admin::toSql($elaborado, "Text")."','".admin::toSql($aprobado, "Text")."','".admin::toSql($observaciones, "Text")."',GETDATE(), '$ahorro', '$monto','ACTIVE' )";
//echo $sql;die;
$db->query($sql);
header('Location: ../../informeList.php?tipUid='.$tipUid);
?>