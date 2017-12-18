<?php
include ("core/admin.php");
$tipUid=  admin::getParam("tipUid");
switch($tipUid){
    case 1: $opcionMenu = "clasificador";
            $opocionSubMenu ="clasificadorList";
            $etiquetaCrear = "clasificadorNew";
            $moduleListId=94;
            $moduleCrearId=95;
            break;
    default :
            $opcionMenu = "clasificador";
            $opocionSubMenu ="clientList";
            $etiquetaCrear = "clasificadorNew";
            $moduleListId=94;
            $moduleCrearId=95;
            break;
}
admin::initialize('clasificador','clasificadorList'); 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">    
<html>
<head>
<title>Sistema de Subastas > <?=admin::labels('htmltitlepage')?></title>
<link rel="shortcut icon" href="lib/favicon.ico" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/dhtml_horiz.css" type="text/css" />
<META NAME="author" CONTENT="DEVZONE">
<META NAME="reply-to" CONTENT="info@devzone.xyz">
<META NAME="copyright" CONTENT="Software propietario de DEVZONE">
<META NAME="rating" CONTENT="General">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; ISO-8859-1">
<script type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="js/ajaxlib.js?version=<?=VERSION?>"></script>
<script type="text/javascript" src="js/interface.js"></script>

<!--BEGINIMPROMTU-->
<link rel="stylesheet" type="text/css" href="css/impromptu.css">
<script type="text/javascript" src="js/jquery.Impromptu.js"></script>
<!--ENDIMPROMTU--> 

<script type="text/javascript">        
function removeList(id){
	var txt = '<?=admin::labels('delete','sure')?>?<br><input type="hidden" id="list" name="list" value="'+ id +'" />';
	$.prompt(txt,{
		show:'fadeIn' ,
		opacity:0,
		buttons:{Eliminar:true, Cancelar:false},
		callback: function(v,m){
										   
			if(v){
				
					  $.ajax({
						url: 'code/execute/clasificaDel.php',
						type: 'POST',
						data: 'uid='+id,
						 success: function() { 
								window.location.href='./clasificaList.php';
							}
					});
		 
			}
			else{}
			
		}
	});
}
</script>

</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td valign="top"><? include_once("skin/header.php");?>
</td></tr>
  
  <tr>
    <td valign="top" id="content"><?php include_once("code/template/clasificaListTpl.php"); ?></td>
  </tr>
<tr><td>
  <?php include("skin/footer.php"); ?>
  </td></tr>
</table>
</body>
</html>