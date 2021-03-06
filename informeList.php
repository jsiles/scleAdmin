<?php 
include_once ("core/admin.php");
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
						url: 'code/execute/autorizacionCatDel.php',
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
						url: 'code/execute/autorizacionDel.php',
						type: 'POST',
						data: 'uid='+id
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


function aprobarInf(id){
	var txt = '&iquest;Est&aacute; seguro de Aprobar este Informe?<br><input type="hidden" id="list" name="list" value="'+ id +'" />';
	$.prompt(txt,{
		show:'fadeIn' ,
		opacity:0,
		buttons:{Aprobar:true, Cancelar:false},
		callback: function(v,m){
										   
			if(v){
				var uid = m.find('#list').val();
				  $('#sub_'+id).fadeOut(500, function(){ $(this).remove(); });
					  $.ajax({
						url: 'code/execute/informeApr.php',
						type: 'POST',
						data: 'uid='+id,
						 success: function() { 
								window.location.href='./informeList.php?tipUid=<?=$tipUid?>';
							}
					});
					 
				}
			else {}
		//$("#list_"+id).hide();	
		}
	});
}

function rechazarInf(id){
	var txt = '&iquest;Est&aacute; seguro de Rechazar este Informe?<br><input type="hidden" id="list" name="list" value="'+ id +'" />';
	$.prompt(txt,{
		show:'fadeIn' ,
		opacity:0,
		buttons:{Rechazar:true, Cancelar:false},
		callback: function(v,m){
										   
			if(v){
				var uid = m.find('#list').val();
				  $('#sub_'+id).fadeOut(500, function(){ $(this).remove(); });
					  $.ajax({
						url: 'code/execute/informeRechazar.php',
						type: 'POST',
						data: 'uid='+id,
						 success: function() { 
								window.location.href='./informeList.php?tipUid=<?=$tipUid?>';
							}
					});
					 
				}
			else {}
		//$("#list_"+id).hide();	
		}
	});
}
function adjudicarSubasta(id){
	var txt = '<span style="align="left">Orden de compra <input type="file" id="adjuntarID" name="adjuntarID" value="" /></span><br>(Pdf,Excel, Word)<br><br><br><br> * Sólo para compras con montos <?=$valAdj.$rolMax?> ';
	$.prompt(txt,{
		show:'fadeIn' ,
		opacity:0,
		buttons:{Adjuidcar:true, Cancelar:false},
		callback: function(v,m){
										   
			if(v){
				var uid = m.find('#list').val();
				  $('#sub_'+id).fadeOut(500, function(){ $(this).remove(); });
					  $.ajax({
						url: 'code/execute/adjudicarSubasta.php',
						type: 'POST',
						data: 'uid='+id,
						 success: function() { 
								window.location.href='./informeList.php?tipUid=<?=$tipUid?>';
							}
					});
					 
				}
			else {}
		//$("#list_"+id).hide();	
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
    <td valign="top" id="content"><?php include_once("code/template/informeListTpl.php"); ?></td>
  </tr>
<tr><td>
  <?php include("skin/footer.php"); ?>
  </td></tr>
</table>
</body>
</html>