<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
admin::initialize('todos','clientNew',false); 
$cov_uid=admin::getParam("cov_uid");

// REGISTRANDO LENGUAGE DE LAS CATEGORIAS
$sql = "update mdl_coverage set cov_delete=1 where cov_uid='".$cov_uid."'";
$db->query($sql);
// CONSTRUIMOS EL NUEVO SELECT	
?>
<select name="cli_cov_uid" id="cli_cov_uid" class="input" >
<?php
	$sql = "select cov_uid, cov_name from mdl_coverage where cov_delete=0";
	$db2->query($sql);
	while ($content=$db2->next_record())
	{	
	?>
	<option value="<?=$content["cov_uid"]?>"><?=$content["cov_name"]?></option>					
	<?php
	}
?>
</select>		
<a href="javascript:changeClientCoverage();" class="small2"><?=strtolower(admin::labels('add'));?></a> | 
                <a href="javascript:deleteClientCoverage();" class="small3"><?=admin::labels('del');?></a>
                <div id="div_client_coverage" style="display:none;">
		<input type="text" name="client_coverage" id="client_coverage" class="input3" onfocus="setClassInput3(this,'ON');document.getElementById('div_cli_cov_uid').style.display='none';" onblur="setClassInput3(this,'OFF');document.getElementById('div_cli_cov_uid').style.display='none';" onclick="setClassInput3(this,'ON');document.getElementById('div_cli_cov_uid').style.display='none';"/>		
		<a href="javascript:coverageClientAdd()" class="button3"><?=admin::labels('add');?></a><a href="javascript:changeClientCoverage();" class="link2">Cerrar</a>		</div>
				<br /><span id="div_cli_cov_uid" style="display:none;" class="error">Covertura es necesaria</span>