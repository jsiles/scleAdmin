<?php 
include_once ("core/admin.php");
 $tipUid=  admin::getParam("tipUid");
switch($tipUid){
    case 1: $opcionMenu = "reportesInformes";
            $opocionSubMenu ="reporteListInf";
            $etiquetaCrear = "reporteListInf";
            $moduleListId=73;
            $moduleCrearId=73;
            break;
    case 2: $opcionMenu = "reportesInformes2";
            $opocionSubMenu ="reporteListInf2";
            $etiquetaCrear = "reporteListInf2";
            $moduleListId=73;
            $moduleCrearId=73;
            break;    
    default:$opcionMenu = "reportesInformes";
            $opocionSubMenu ="reporteListInf";
            $moduleListId=73;
            $moduleCrearId=73;
            break; 
}
admin::initialize($opcionMenu, $opocionSubMenu); 

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">    
<html>
<head>
<title>Sistema de Subastas > <?=admin::labels('htmltitlepage')?></title>
<link rel="shortcut icon" href="lib/favicon.ico" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/dhtml_horiz.css" type="text/css" />
<!--[if gte IE 5.5]>
<script language="JavaScript" src="css/dhtml.js" type="text/JavaScript"></script>
<![endif]-->
<meta name="author" content="DEVZONE">
<meta name="reply-to" content="info@devzone.xyz">
<meta name="copyright" content="Software propietario de DEVZONE">
<meta name="rating" content="General">
<meta http-equiv="Content-Type" content="text/html; ISO-8859-1">
<script type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="js/ajaxlib.js?version=<?=VERSION?>"></script>
<script type="text/javascript" src="js/interface.js"></script>
<!--BEGINIMPROMTU-->
<link rel="stylesheet" type="text/css" href="css/impromptu.css">
<script type="text/javascript" src="js/jquery.Impromptu.js"></script>
<!--ENDIMPROMTU--> 
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td valign="top"><?php include_once("skin/header.php");?>
</td></tr>
  <tr>
    <td valign="top" id="content"><?php include_once("code/template/reporteView2Tpl.php"); ?></td>
  </tr>
<tr><td>
  <?php include("skin/footer.php"); ?>
  </td></tr>
</table>
</body>
</html>