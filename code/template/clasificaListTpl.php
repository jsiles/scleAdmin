<?php
if ($lang!='es') $urlLangAux=$lang.'/';
else $urlLangAux='';

/**************Begin 1er NIVEL****************************/

    $sSQL="select cla_uid, cla_parent, cla_level, cla_title, cla_status  from mdl_classifier where cla_parent=0 and cla_delete=0";

$nroReg = $db->numrows($sSQL);
$db->query($sSQL);
if ($nroReg>0)
	{
	?>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td width="77%" height="40"><span class="title"><?=admin::modulesLabels()?></span></td>
    <td width="23%" height="40" align="right">
     <?php
        $moduleId=95;
        $valuePermit=admin::getDBvalue("select moa_status from sys_modules_options,sys_modules_access where mop_uid=moa_mop_uid and mop_status='ACTIVE'and mop_mod_uid=$moduleId and mop_lab_category='Crear' and moa_rol_uid=".$_SESSION['usr_rol']."");
	if($valuePermit=='ACTIVE'){?>
            <a href="<?=admin::modulesLink($etiquetaCrear)?>?tipUid=<?=admin::getParam("tipUid")?>"><?=admin::modulesLabels($etiquetaCrear)?></a>
        <?php
        }
        ?>
            &nbsp;  
    </td>
  </tr>
  <tr>
    <td colspan="2" id="contentListing">
<div class="itemList1" id="itemList" style="width:99%"> 
<?php
$i=1;
while ($regContent = $db->next_record())
{

  $con_uid = $regContent["cla_uid"];
  $title = $regContent["cla_title"];
  $cont_status = $regContent["cla_status"];
  if ($cont_status=='ACTIVE') $labels_content='status_on';
  else $labels_content='status_off';
  if ($i%2==0) $class='row';
  else  $class='row0';
/**************End 1er NIVEL****************************/
/**************Begin 2do NIVEL****************************/     
  ?> 
  <div id="category_<?=$con_uid?>" style="display:none;"><?=$class?></div>
      <div class="groupItem" id="<?=$con_uid?>">
            <div id="list_<?=$con_uid?>" class="<?=$class?>" style="width:100%">
                <table class="list" width="100%"><tr><td width="50%">
<?php
	$sSQL="select cla_uid, cla_parent, cla_level, cla_title, cla_status  from mdl_classifier where cla_parent=$con_uid and cla_delete=0";
	$nrmreg = $db2->numrows($sSQL);
        $db2->query($sSQL);
	
$j=0;

if ($nrmreg>0) { 

/**************End 2do NIVEL****************************/

/**************Begin 1er NIVEL****************************/    
    ?>
	<span id="div_more_<?=$con_uid?>">
		<a href="subList_<?=$con_uid?>" onclick="moreMinusContent(<?=$con_uid?>); return false;">
			<img src="lib/buttons/more.gif" border="0" alt="<?=admin::labels('more_on')?>" title="<?=admin::labels('more_on')?>">
		</a>
	</span>
	<span id="div_minus_<?=$con_uid?>" style="display:none;">
		<a href="subList_<?=$con_uid?>" onclick="moreMinusContent(<?=$con_uid?>); return false;">
		<img src="lib/buttons/minus.gif" border="0" alt="<?=admin::labels('minus_on')?>" title="<?=admin::labels('minus_on')?>">
		</a>
	</span>
	 <span id="div_more_off_<?=$con_uid?>" style="display:none;">
		<img src="lib/buttons/more_off.gif" title="<?=admin::labels('more_off')?>" alt="<?=admin::labels('more_off')?>">
	</span>&nbsp;
	<?php
/**************End 1er NIVEL****************************/
/**************Begin 2do NIVEL****************************/
	$swSubmenu=true;                              
	}
else { ?>
	<span><img src="lib/buttons/more_off.gif" title="<?=admin::labels('more_off')?>" alt="<?=admin::labels('more_off')?>"></span>&nbsp;
	<?php
	$swSubmenu=false;
	} 
/**************End 2do NIVEL****************************/
/**************Begin 1er NIVEL****************************/    
    ?>
           <?=admin::toHtml($title)?></td>
	<td align="center" width="12%" height="5">
	<?php 
	if ($nrmreg>0) 
		{ 
		$stylebuttonOn = "none";
		$stylebuttonOff = "";
		}
	else
		{ 
		$stylebuttonOn = "";  
		$stylebuttonOff = "none";
		}
		
		 
		?>
		<span id="div_view_off_<?=$con_uid?>" style="">
		<img src="lib/view_off_es.gif" border="0" title="<?=admin::labels('view')?>" alt="<?=admin::labels('view')?>">
		</span>
		<!--<span id="div_view_on_<?=$con_uid?>" style="display:<?=$stylebuttonOn?>;">
		<a href="../<?=$urlLangAux.$regContent["col_url"]?>/<?=$nextUrl?>" target="_blank">
		<img src="lib/view_es.gif" border="0" title="<?=admin::labels('view')?>" alt="<?=admin::labels('view')?>">
		</a>
		</span>-->
	</td>
	<td align="center" width="12%" height="5">
	<?php 

		$stylebuttonOn = "";  
		$stylebuttonOff = "none";

		?>
		<!--<span id="div_edit_off_<?=$con_uid?>" style="display:<?=$stylebuttonOff?>;">
		<img src="lib/edit_off_<?=$lang?>.gif" border="0" title="<?=admin::labels('edit')?>" alt="<?=admin::labels('edit')?>">
		</span>-->
		<span id="div_edit_on_<?=$con_uid?>" style="display:<?=$stylebuttonOn?>;">
		<a href="clasificaEdit.php?con_uid=<?=$con_uid?>">
		<img src="lib/edit_es.gif" border="0" title="<?=admin::labels('edit')?>" alt="<?=admin::labels('edit')?>">
		</a>
		</span>
	</td>
	<td align="center" width="12%" height="5">
	
		<a href="removeList" onclick="removeList(<?=$con_uid?>);return false;">		
			<img src="lib/delete_es.gif" border="0" title="<?=admin::labels('delete')?>" alt="<?=admin::labels('delete')?>">
		</a>		
	
	</td>
	<!--<td align="center" width="14%" height="5"> 
	<div id="status_<?=$con_uid?>">
	  
           
                <a href="javascript:void(0);" onclick="contentCS('<?=$con_uid?>','<?=$cont_status?>');">
                    <img src="<?=admin::labels($labels_content,'linkImage')?>" border="0" title="<?=admin::labels($labels_content)?>" alt="<?=admin::labels($labels_content)?>">
		</a>
            
	
	</div>
	</td>-->
		</tr>
	</table>
<?php
//CREACION DE SUB MENU
//echo "-->" . $swSubmenu;die;
/**************End 1er NIVEL****************************/
/**************Begin 2do NIVEL****************************/
if ($swSubmenu){
	echo "\n";
    ?>
	<div class="subList_<?=$con_uid?>" id="subList_<?=$con_uid?>" style="display:none;width:100%">
	<?php
	}   
if ($nrmreg>0) $arrayscript .="
 SubList[$con_uid]=$nrmreg;
 ";	
 

while ($regSubContent=$db2->next_record()){
   $con_uid1 = $regSubContent["cla_uid"];
   $title1 = $regSubContent["cla_title"]; 
   $cont_status1 = $regSubContent["cla_status"];   
  if ($cont_status1 =='ACTIVE') $labels_content1='status_on';
  else $labels_content1='status_off'; 
     
?>
<div class="groupItem_<?=$con_uid?>" id="<?=$con_uid1?>">
    <table class="list1a" width="100%"><tr><td width="50%">
    <li id="lista_<?=$con_uid1?>" class="<?=$class?>a">
<?php
/**************End 2do NIVEL****************************/
/**************Begin 3er NIVEL****************************/ 
    $sSQL="select cla_uid, cla_parent, cla_level, cla_title, cla_status  from mdl_classifier where cla_parent=$con_uid1 and cla_delete=0";
    $nrmreg1 = $db3->numrows($sSQL);
    $db3->query($sSQL);
    
    $k=0;
    if ($nrmreg1>0) { ?>
                        <span id="div_more_<?=$con_uid1?>">
                            <a href="treeList_<?=$con_uid1?>" onclick="moreMinusSubList(<?=$con_uid1?>); return false;">
                                <img src="lib/buttons/more.gif" border="0" alt="<?=admin::labels('more_on')?>" title="<?=admin::labels('more_on')?>">
                            </a>
                        </span>
                        <span id="div_minus_<?=$con_uid1?>" style="display:none;">
                            <a href="treeList_<?=$con_uid1?>" onclick="moreMinusSubList(<?=$con_uid1?>); return false;">
                            <img src="lib/buttons/minus.gif" border="0" alt="<?=admin::labels('minus_on')?>" title="<?=admin::labels('minus_on')?>">
                            </a>
                        </span>
                        <span id="div_more_off_<?=$con_uid1?>" style="display:none;">
                        <img src="lib/buttons/more_off.gif" title="<?=admin::labels('more_off')?>" alt="<?=admin::labels('more_off')?>">
                        </span>&nbsp;         
                    
        <?php
        $swSubmenu1=true;                              
        }
    else {
        ?>
                    <span><img src="lib/buttons/more_off.gif" title="<?=admin::labels('more_off')?>" alt="<?=admin::labels('more_off')?>"></span>&nbsp;
        <?php
        $swSubmenu1=false;
        } 
/**************End 3er NIVEL****************************/
/**************Begin 2do NIVEL****************************/
    ?>    
            <?=admin::toHtml($title1)?></li></td>
            <td align="center" width="12%" height="5">
    <?php 
    if ($nrmreg1>0){ 
        $stylebuttonOn = "none";
        $stylebuttonOff = "";
    }
    else{ 
        $stylebuttonOn = "";  
        $stylebuttonOff = "none";
    }
        ?>
        <span id="div_view_off_<?=$con_uid1?>" style="">
        <img src="lib/view_off_es.gif" border="0" title="<?=admin::labels('view')?>" alt="<?=admin::labels('view')?>">
        </span>
        <!--<span id="div_view_on_<?=$con_uid1?>" style="display:<?=$stylebuttonOn?>;">
        <a href="../<?=$urlLangAux.$regContent["col_url"]?>/<?=$regSubContent["col_url"]?>/" target="_blank">
        <img src="lib/view_es.gif" border="0" title="<?=admin::labels('view')?>" alt="<?=admin::labels('view')?>">
        </a>
        </span>-->
    </td>
<td align="center" width="12%" height="5">
    <?php 
    if ($nrmreg1>0) { 
        $stylebuttonOn = "";
        $stylebuttonOff = "";
    }
    else{ 
        $stylebuttonOn = "";  
        $stylebuttonOff = "none";
    }
  
        ?>
        <!--<span id="div_edit_off_<?=$con_uid1?>" style="display:<?=$stylebuttonOff?>;">
        <img src="lib/edit_off_<?=$lang?>.gif" border="0" title="<?=admin::labels('edit')?>" alt="<?=admin::labels('edit')?>">
        </span>-->
        <span id="div_edit_on_<?=$con_uid1?>" style="display:<?=$stylebuttonOn?>;">
        <a href="clasificaEdit.php?con_uid=<?=$con_uid1?>">
        <img src="lib/edit_es.gif" border="0" title="<?=admin::labels('edit')?>" alt="<?=admin::labels('edit')?>">
        </a>
        </span>
    </td>

            
			        
	        <td align="center" width="12%" height="5">
		          <a href="removeList" onclick="removeList(<?=$con_uid1?>);return false;">  
		        <img src="lib/delete_es.gif" border="0" title="<?=admin::labels('delete')?>" alt="<?=admin::labels('delete')?>">
		        </a>
	        </td>
	        <!--<td align="center" width="14%" height="5">
	        <div id="status_<?=$con_uid1?>">
	           <a href="javascript:void(0);" onclick="contentCS('<?=$con_uid1?>','<?=$cont_status1?>');">
		        <img src="<?=admin::labels($labels_content1,'linkImage')?>" border="0" title="<?=admin::labels($labels_content1)?>" alt="<?=admin::labels($labels_content1)?>">
		        </a>
	        </div>	
	        </td>-->
         </tr>
            </table>

<?php
/**************End 2do NIVEL****************************/
/**************Begin 3er NIVEL****************************/ 
//echo "-->" . $swSubmenu;die;
if ($swSubmenu1){ 

  //echo "\n";
    ?>
    <div class="treeList_<?=$con_uid1?>" id="treeList_<?=$con_uid1?>" style="display:none;width:100%">
                                        
    <?php
}   
if ($nrmreg1>0) $arrayscript .="
 subSubList[$con_uid1]=$nrmreg1;";
 
while ($regSubSubContent=$db3->next_record()){
	$con_uid2 = $regSubSubContent["cla_uid"];
	$title2 = $regSubSubContent["cla_title"]; 
	$cont_status2 = $regSubSubContent["cla_status"]; 
	if ($cont_status2 =='ACTIVE') $labels_content2='status_on';
	else $labels_content2='status_off';   
	?>
	<div class="groupSubItem_<?=$con_uid2?>" id="<?=$con_uid2?>">
	<table class="list2a" width="100%" border="0"><tr><td width="49%">
	<li id="lista_<?=$con_uid2?>" class="<?=$class?>a">
            <?php
/**************End 3er NIVEL****************************/
/**************Begin 4to NIVEL****************************/ 
    $sSQL="select cla_uid, cla_parent, cla_level, cla_title, cla_status  from mdl_classifier where cla_parent=$con_uid2 and cla_delete=0";
    $nrmreg2 = $db4->numrows($sSQL);
    //echo $nrmreg2."-->";
    $db4->query($sSQL);
    
    $l=0;
    if ($nrmreg2>0) { 
        
        ?>
                        <span id="div_more_<?=$con_uid2?>">
                            <a href="treeList_<?=$con_uid2?>" onclick="moreMinusSubList(<?=$con_uid2?>); return false;">
                                <img src="lib/buttons/more.gif" border="0" alt="<?=admin::labels('more_on')?>" title="<?=admin::labels('more_on')?>">
                            </a>
                        </span>
                        <span id="div_minus_<?=$con_uid2?>" style="display:none;">
                            <a href="treeList_<?=$con_uid2?>" onclick="moreMinusSubList(<?=$con_uid2?>); return false;">
                            <img src="lib/buttons/minus.gif" border="0" alt="<?=admin::labels('minus_on')?>" title="<?=admin::labels('minus_on')?>">
                            </a>
                        </span>
                        <span id="div_more_off_<?=$con_uid2?>" style="display:none;">
                        <img src="lib/buttons/more_off.gif" title="<?=admin::labels('more_off')?>" alt="<?=admin::labels('more_off')?>">
                        </span>&nbsp;         
                    
        <?php
        $swSubmenu2=true;                              
        }
    else {
        ?>
                    <span><img src="lib/buttons/more_off.gif" title="<?=admin::labels('more_off')?>" alt="<?=admin::labels('more_off')?>"></span>&nbsp;
        <?php
        $swSubmenu2=false;
        } 
/**************End 3er NIVEL****************************/
/**************Begin 4to NIVEL****************************/
    ?>  
	<?=admin::toHtml($title2)?>
            </li>
	</td><td align="center" width="13%" height="5">
	<span id="div_view_off_<?=$con_uid1?>" style="">
        <img src="lib/view_off_es.gif" border="0" title="<?=admin::labels('view')?>" alt="<?=admin::labels('view')?>">
        </span>
        </td>
	<td align="center" width="11%" height="5">
	<a href="clasificaEdit.php?con_uid=<?=$con_uid2?>"><img src="lib/edit_es.gif" border="0" alt="<?=admin::labels('edit')?>" title="<?=admin::labels('edit')?>"></a></td>            
	<td align="center" width="13%" height="5">
		<a href="removeList" onclick="removeList(<?=$con_uid2?>);return false;">
		<img src="lib/delete_es.gif" border="0" title="<?=admin::labels('delete')?>" alt="<?=admin::labels('delete')?>">		</a>	</td>
	<!--<td align="center" width="14%" height="5">
	<div id="status_<?=$con_uid2?>">
	   <a href="javascript:contentCS('<?=$con_uid2?>','<?=$cont_status2?>');">
		<img src="<?=admin::labels($labels_content2,'linkImage')?>" border="0" title="<?=admin::labels($labels_content)?>" alt="<?=admin::labels($labels_content)?>">
	   </a>
	</div>    
	</td>-->
 </tr>
	</table>
	</div> 
    <?php    
        if ($swSubmenu2){ 

  //echo "\n";
    ?>
    <div class="treeList_<?=$con_uid2?>" id="treeList_<?=$con_uid2?>" style="display:none;width:100%">
                                        
    <?php
}   
if ($nrmreg2>0) $arrayscript .="
 subSubList[$con_uid1]=$nrmreg2;";
 
while ($regSubSubContent=$db4->next_record()){
   
	$con_uid3 = $regSubSubContent["cla_uid"];
	$title3 = $regSubSubContent["cla_title"]; 
	$cont_status3 = $regSubSubContent["cla_status"]; 
	if ($cont_status3 =='ACTIVE') $labels_content3='status_on';
	else $labels_content3='status_off';   
	?>
	<div class="groupSubItem_<?=$con_uid3?>" id="<?=$con_uid3?>">
	<table class="list2a" width="100%" border="0"><tr><td width="49%">
	<li id="lista_<?=$con_uid3?>" class="<?=$class?>a">
         <span><img src="lib/buttons/more_off.gif" title="<?=admin::labels('more_off')?>" alt="<?=admin::labels('more_off')?>"></span>&nbsp;   
 
    <?=admin::toHtml($title3)?>
            </li>
	</td><td align="center" width="13%" height="5">
	<span id="div_view_off_<?=$con_uid1?>" style="">
        <img src="lib/view_off_es.gif" border="0" title="<?=admin::labels('view')?>" alt="<?=admin::labels('view')?>">
        </span>
        </td>
	<td align="center" width="11%" height="5">
	<a href="clasificaEdit.php?con_uid=<?=$con_uid3?>"><img src="lib/edit_es.gif" border="0" alt="<?=admin::labels('edit')?>" title="<?=admin::labels('edit')?>"></a></td>            
	<td align="center" width="13%" height="5">
		<a href="removeList" onclick="removeList(<?=$con_uid3?>);return false;">
		<img src="lib/delete_es.gif" border="0" title="<?=admin::labels('delete')?>" alt="<?=admin::labels('delete')?>">		</a>	</td>
	<!--<td align="center" width="14%" height="5">
	<div id="status_<?=$con_uid3?>">
	   <a href="javascript:contentCS('<?=$con_uid3?>','<?=$cont_status2?>');">
		<img src="<?=admin::labels($labels_content2,'linkImage')?>" border="0" title="<?=admin::labels($labels_content)?>" alt="<?=admin::labels($labels_content)?>">
	   </a>
	</div>    
	</td>-->
        </tr>
	</table>
	</div>     
        
<?php
}
?>
    </div>
        <?php
$k++;
}
if ($swSubmenu1){
?>
                                     </div>
                                     </div>
<?php
} 
else{
?> 
                                  </div>
<?php
}
/**************End 3er NIVEL****************************/

$j++;    
}
/**************Begin 2do NIVEL****************************/  
if ($swSubmenu){
	?>
	</div>
	<?php
}
$i++;
?>
	</div>
</div>
<?php
}  
/**************End 2do NIVEL****************************/
/**************Begin 1er NIVEL****************************/
?>

</div>
    </td>
    </tr>
</table><br />
<br />
<br />
<?php
} 
else{ ?>
	<br />
<br />
<div id="itemList"> 
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">   
     <tr>
      <td width="77%" height="40"><span class="title"><?=admin::modulesLabels()?></span></td>
    <td width="23%" height="40" align="right">
     <?php
        $moduleId=95;
        $valuePermit=admin::getDBvalue("select moa_status from sys_modules_options,sys_modules_access where mop_uid=moa_mop_uid and mop_status='ACTIVE'and mop_mod_uid=$moduleId and mop_lab_category='Crear' and moa_rol_uid=".$_SESSION['usr_rol']."");
	if($valuePermit=='ACTIVE'){?>
            <a href="<?=admin::modulesLink($etiquetaCrear)?>?tipUid=<?=admin::getParam("tipUid")?>"><?=admin::modulesLabels($etiquetaCrear)?></a>
        <?php
        }
        ?>
            &nbsp;  
    </td>
  </tr>
  <tr>
    <td colspan="2" id="contentListing">
<div  style="background-color: #f7f8f8;">
<table class="list"  width="100%">
	<tr><td height="30px" align="center" class="bold">
	No existen registros.
	</td></tr>	
 </table>
</div>
</td></tr></table>
<?php 	
} 
/**************End 1er NIVEL****************************/ 
?>