<?php
$cla_uid=admin::getParam("con_uid");
$sSQL="select * from mdl_classifier where cla_uid=$cla_uid";
$db->query($sSQL);
$clasifica=$db->next_record();

?>
<br />
<form name="frmClasificador" id="frmClasificador" method="post" action="code/execute/clasificaAdd.php" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="77%" height="40"><span class="title">Crear Clasificador</span></td>
    <td width="23%" height="40">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" id="contentListing"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="54%" valign="top">
		
		<table width="98%" border="0" cellpadding="5" cellspacing="5" class="box">
                        <tr>
                            <td colspan="3" class="titleBox"><?=admin::labels('contents','data');?></td>
                        </tr>
                        <tr>
                          <td width="29%">C&oacute;digo Clasificador:</td>
                          <td width="64%">
                              <input name="cla_codigo" value="<?=$clasifica["cla_uid"]?>" type="text" class="input" id="cla_codigo" tabindex="1" onfocus="setClassInput(this,'ON');document.getElementById('div_cla_codigo').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cla_codigo').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cla_codigo').style.display='none';" size="10" />
                                <br /><span id="div_cla_codigo" style="display:none; padding-left:5px; padding-right:5px;" class="error">Campo requerido</span>			</td>
                        </tr>
                        <tr>
                          <td width="29%">Etiqueta Clasificador:</td>
                          <td width="64%">
                                <input name="cla_title" value="<?=$clasifica["cla_title"]?>" type="text" class="input" id="cla_title" tabindex="2" onfocus="setClassInput(this,'ON');document.getElementById('div_cla_title').style.display='none';" onblur="setClassInput(this,'OFF');document.getElementById('div_cla_title').style.display='none';" onclick="setClassInput(this,'ON');document.getElementById('div_cla_title').style.display='none';" size="50" />
                                <br /><span id="div_cla_title" style="display:none; padding-left:5px; padding-right:5px;" class="error">Campo requerido</span>			</td>
                        </tr>
                        <?php
                           $level =$clasifica["cla_level"];
                           switch ($level)
                           {
                               case 2: $parent0=$clasifica["cla_parent"];
                                       $parent1=0;
                                   break;
                               case 3: $parent0=admin::getDbValue("select cla_parent from mdl_classifier where cla_parent=".$clasifica["cla_parent"]);
                                       $parent1= $clasifica["cla_parent"];
                                   break;
                               default :
                                   $parent0=0;
                                   $parent1=0;
                                   $parent2=0;
                                   break;
                               
                           }
                        ?>
                        <tr>
                            <td>Nivel 1: </td>
                            <td>
                                <select name="cla_level0" class="listMenu" id="cla_level0"  tabindex="2">
                                    <!--onchange="subList(this);"-->		
                                          <?php 
                                          $sql = "select * from mdl_classifier where cla_delete=0 and cla_parent=0 order by cla_position";
                                          $db->query($sql)				
                                          ?>
                                          <option value="0" selected="selected">No Aplica</option>
                                          <?php
                                          while ($category = $db->next_record())
                                          { 
                                              if(($parent0!=0)&&($parent0==$category["cla_uid"])) $sel="selected";
                                              else $sel="";
                                              ?>
                                          <option value="<?=$category["cla_uid"]?>" <?=$sel?>><?=$category["cla_title"]?></option>
                                          <?php
                                          } 
                                          ?>
                                </select>
                                <span id="div_cla_level0" style="display:none;" class="error"></span>            </td>
                        </tr>
                        <tr>
                            <td>Nivel 2: </td>
                            <td>
                                <select name="cla_level1" class="listMenu" id="cla_level1"  tabindex="2">
                                    <!--onchange="subList(this);"-->		
                                          <?php 
                                          $sql = "select * from mdl_classifier where cla_delete=0 and cla_parent!=0 and cla_level=2 order by cla_position";
                                          $db->query($sql)				
                                          ?>
                                          <option value="0" selected="selected">No Aplica</option>
                                          <?php
                                          while ($category = $db->next_record())
                                          { 
                                              if(($parent1!=0)&&($parent1==$category["cla_uid"])) $sel="selected";
                                              else $sel="";
                                              ?>
                                          <option value="<?=$category["cla_uid"]?>" <?=$sel?>><?=$category["cla_title"]?></option>
                                          <?php
                                          } 
                                          ?>
                                </select>
                                <span id="div_cla_level1" style="display:none;" class="error"></span>            </td>
                        </tr>
                        <tr>
                            <td>Nivel 3: </td>
                            <td>
                                <select name="cla_level2" class="listMenu" id="cla_level2"  tabindex="2">
                                    <!--onchange="subList(this);"-->		
                                          <?php 
                                          $sql = "select * from mdl_classifier where cla_delete=0 and cla_parent!=0 and cla_level=3 order by cla_position";
                                          $db->query($sql)				
                                          ?>
                                          <option value="0" selected="selected">No Aplica</option>
                                          <?php
                                          while ($category = $db->next_record())
                                          { 
                                              if(($parent2!=0)&&($parent2==$category["cla_uid"])) $sel="selected";
                                              else $sel="";
                                              ?>
                                          <option value="<?=$category["cla_uid"]?>" <?=$sel?>><?=$category["cla_title"]?></option>
                                          <?php
                                          } 
                                          ?>
                                </select>
                                <span id="div_cla_level2" style="display:none;" class="error"></span>            </td>
                        </tr>
                      

                        <!--<tr>
                          <td><?=admin::labels('status');?>:</td>
                          <td>
                                      <select name="cla_status" class="listMenu" id="cla_status" tabindex="3">
                              <option selected="selected" value="ACTIVE"><?=admin::labels('active');?></option>
                              <option value="INACTIVE"><?=admin::labels('inactive');?></option>
                                      </select>
                                      <span id="div_cla_status" style="display:none;" class="error"></span>			</td>
                        </tr>-->
                    </table>
                    <br />
        </td>
        <td width="46%" valign="top">
            &nbsp;
		</td>
      </tr>
    </table></td>
    </tr>
</table>
      <br />
   
	 
      <br />
      <br />
      <div id="contentButton">
	  	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="59%" align="center">
                                    <a href="#" onclick="frmClasificador.submit();" class="button" tabindex="7">
				<?=admin::labels('public');?>
				</a> 
				</td>
          <td width="41%" style="font-size:11px;">
		  		<?=admin::labels('or');?> <a href="clasificaList.php?token=<?=admin::getParam("token")?>" tabindex="8" ><?=admin::labels('cancel');?></a> 
		  </td>
        </tr>
      </table></div>
      
       </form>
      <br /><br />
<br />
<br />