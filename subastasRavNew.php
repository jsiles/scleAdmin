<?php 
include_once ("core/admin.php");
$tipUid=  admin::getParam("tipUid");
switch($tipUid){
    case 1: $opcionMenu = "subastaRavParametros";
            $opocionSubMenu ="subastasRavNew";
            $etiquetaCrear = "subastasRavNew";
            $moduleListId=8;
            $moduleCrearId=9;
            break;
    case 2: $opcionMenu = "subastaRavInforme";
            $opocionSubMenu ="subastasRavInfNew";
            $etiquetaCrear = "subastasRavInfNew";
            $moduleListId=11;
            $moduleCrearId=12;
            break;    
    case 3: $opcionMenu = "ravSolicitud";
            $opocionSubMenu ="ravSolicitudNew";
            $etiquetaCrear = "ravSolicitudNew";
            $moduleListId=32;
            $moduleCrearId=33;
            break;    
    case 4: $opcionMenu = "ravOrden";
            $opocionSubMenu ="ravOrdenNew";
            $etiquetaCrear = "ravOrdenNew";
            $moduleListId=35;
            $moduleCrearId=36; 
            break;
    case 5: $opcionMenu = "subastaRavParametros2";
            $opocionSubMenu ="subastasRavNew2";
            $etiquetaCrear = "subastasRavNew2";
            $moduleListId=59;
            $moduleCrearId=60; 
            break;
    case 6: $opcionMenu = "subastaRavInforme2";
            $opocionSubMenu ="subastasRavInfNew2";
            $etiquetaCrear = "subastasRavInfNew2";
            $moduleListId=75;
            $moduleCrearId=76;
            break;    
    case 7: $opcionMenu = "ravSolicitudV";
            $opocionSubMenu ="ravSolicitudListV";
            $etiquetaCrear = "ravSolicitudNewV";
            $moduleListId=78;
            $moduleCrearId=79;
            break;    
    case 8: $opcionMenu = "ravOrdenV";
            $opocionSubMenu ="ravOrdenListV";
            $etiquetaCrear = "ravOrdenNewV";
            $moduleListId=81;
            $moduleCrearId=82; 
            break;        
    default :
            $opcionMenu = "subastaRavParametros";
            $opocionSubMenu ="subastasRavNew";
             $moduleListId=8;
            $moduleCrearId=9;        

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
<script type="text/javascript">var SERVER='<?=$domain?>'; </script>
<script type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="js/ajaxlib.js?version=<?=VERSION?>"></script>
<script type="text/javascript" src="js/interface.js"></script>
<!--BEGINIMPROMTU-->
<link rel="stylesheet" type="text/css" href="css/impromptu.css">
<script type="text/javascript" src="js/jquery.Impromptu.js"></script>
<!--ENDIMPROMTU--> 
<script type="text/javascript">      
// ELIMINA LOS REGISTROS DE LA CATEGORIA PRINCIPAL
function removeListCat(id){
	var txt = '<?=admin::labels('delete','sure')?><br><input type="hidden" id="list" name="list" value="'+ id +'" />';
	$.prompt(txt,{
		show:'fadeIn' ,
		opacity:0,
		buttons:{Eliminar:true, Cancelar:false},
		callback: function(v,m){
										   
			if(v){
				var uid = m.find('#list').val();
				  $('#'+id).fadeOut(500, function(){ $(this).remove(); });
					  $.ajax({
						url: 'code/execute/subastaCatDel.php',
						type: 'POST',
						data: 'uid='+id
					});
				 /********BeginResetColorDelete*************/  
				  resetOrderRemove(id);  
				 /********EndResetColorDelete*************/ 
		 
			}
			else{}
			
		}
	});
}
// ELIMINA LOS REGISTROS DE LA CATEGORIA PRINCIPAL
function removeList(id){
	var txt = '<?=admin::labels('delete','sure')?>?<br><input type="hidden" id="list" name="list" value="'+ id +'" />';
	$.prompt(txt,{
		show:'fadeIn' ,
		opacity:0,
		buttons:{Eliminar:true, Cancelar:false},
		callback: function(v,m){
										   
			if(v){
				var uid = m.find('#list').val();
				  $('#sub_'+id).fadeOut(500, function(){ $(this).remove(); });
					  $.ajax({
						url: 'code/execute/subastasDel.php',
						type: 'POST',
						data: 'sub_uid='+id
					});
				/********BeginResetColorDelete*************/  
				//	  resetOrderRemove(id);  
				/********EndResetColorDelete*************/ 
				}
			else {}
		$("#list_"+id).hide();	
		}
	});
}
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td valign="top"><?php include_once("skin/header.php");?>
</td></tr>
  <tr>
    <td valign="top" id="content"><?php include_once("code/template/subastasRavNewTpl.php"); ?></td>
  </tr>
<tr><td>
  <?php include("skin/footer.php"); ?>
  </td></tr>
</table>
</body>
</html>