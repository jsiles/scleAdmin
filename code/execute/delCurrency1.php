<?php
include_once("../../core/admin.php");
include_once("../../core/files.php");
include_once("../../core/images.php");
admin::initialize('todos','subastasEdit', false); 
$sub_moneda=admin::getParam("sub_moneda");

// REGISTRAMOS LA CATEGORIA
// dca_uid, dca_delete, 
$sql = "update mdl_currency set cur_delete=1 where cur_uid=$sub_moneda";
$db->query($sql);

				$arrayMoneda = admin::dbFillArray("select cur_uid, cur_description from mdl_currency where cur_delete=0");
				
				?>
                <select name="sub_moneda1" id="sub_moneda1" class="input" >
                <?php
				foreach($arrayMoneda as $key=>$value)
				{                
				?>
                	<option <? if ($key==$prod["sub_moneda"]) echo 'selected="selected"';?> value="<?=$key?>"><?=$value?></option>
				<?php
				}
				?>
                </select>
                                &nbsp;<a href="javascript:addCurrency1();" class="small2">agregar</a> | 
                <a href="javascript:delCurrency1();" class="small3"><?=admin::labels('del');?></a>