<?php
include_once("../../core/admin.php");
admin::initialize('todos','subastasList');
$ca2_description = admin::getParam("nivel2_desc");
$ca1_uid=  admin::getParam("ca1_uid");
if(strlen($ca2_description)>0&&$ca1_uid!=''){
$sql = "insert into mdl_categoria2(
                                        ca2_ca1_uid,
					ca2_description,
					ca2_delete
					)
				values
					(
                                                ".admin::toSql($ca1_uid,"Number").",
						'".admin::toSql($ca2_description, "Text")."', 
						0
					)";

$db->query($sql);	
}
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="nivel2_uid" id="nivel2_uid" class="input" onchange="actualizaNiveles2();">
    <option value="" selected="selected" >Seleccionar</option>
               	<?php
                    $sql = "select ca2_uid, ca2_description from mdl_categoria2 where ca2_delete=0 and ca2_ca1_uid=".admin::toSql($ca1_uid,"Number");
					$db2->query($sql);
					while ($content=$db2->next_record())
					{	
					?>
					<option value="<?=$content["ca2_uid"]?>"><?=$content["ca2_description"]?></option>					
					<?php
					}
                ?>
</select>
                <a href="nuevo" onclick="addNivel2();return false;" class="small2"><?=strtolower(admin::labels('add'));?></a> | 
                <a href="borrar" onclick="deleteNivel2();return false;" class="small3"><?=admin::labels('del');?></a>
                <div id="div_nivel2" style="display:none;">
		<input type="text" name="nivel2" id="nivel2" class="input3" 
                       onfocus="setClassInput3(this,'ON');document.getElementById('div_nivel2_error').style.display='none';" 
                       onblur="setClassInput3(this,'OFF');document.getElementById('div_nivel2_error').style.display='none';" 
                       onclick="setClassInput3(this,'ON');document.getElementById('div_nivel2_error').style.display='none';"/>		
		<a href="" onclick="nivel2Add();return false;" class="button3"><?=admin::labels('add');?></a><a href="javascript:nivel2();" class="link2">Cerrar</a>		
                </div>
		<br /><span id="div_nivel2_error" style="display:none; padding-left:5px; padding-right:5px;" class="error"><?=admin::labels('required');?></span>
