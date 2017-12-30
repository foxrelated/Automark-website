
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('تعديل  سيارة ') ?></h4>
    </div>
    <div class="body">
  
   <?php

    foreach($data_category as $rows_values){

                 foreach ($_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option){ ?>
						
				 
                 <?php if($lib_func->jsonId($rows_option['option_o'],'default')==1){

if($rows_option['code_o']=='years'){?>
	<div class="control-group">
          <label class="control-label span2" ><?php echo  language::getLang($rows_option['name_o']); ?></label>
          <div class="controls">
             <select class="span5" name="years"  data-placeholder="<?php echo _t('اختر ') ?>" tabindex="1">
                <option value=""><?php echo _t('اختر') ?></option>
                <?php for($year=date("Y") ; $year > 1970; $year--){ ?>
                <option <?php echo ($lib_func->selected($carRows['year_c'],$year));?>  value="<?php echo $year; ?>"><?php echo  $year; ?></option>
             <?php } ?>
             </select>
            <?php echo isset($error['years'])?' <span class="help-inline badge badge-error">'.$error['years'].'</span>':''; ?>
          </div>
       </div>
	
	<?php }
                           if($rows_option['code_o']=='type_c'){
                 ?>
                             <!-- SELECT -->
       <div class="control-group"> <label class="control-label span2"><?php echo  language::getLang($rows_option['name_o']); ?></label>
          <div class="controls">
              <select class="span5" name="type_c" onchange="return changeselect(this,'typecar','#subtype') " data-placeholder="<?php echo _t('اختر ') ?>" tabindex="1">
                <option value=""><?php echo _t('اختر ') ?></option>
                <?php foreach($_typecar->getTypeAll() as $rowstype ): ?>
                <option <?php echo ($lib_func->selected($carRows['type_c'],$rowstype['id_t']));?> value="<?php echo  $rowstype['id_t']; ?>"><?php echo language::getLang($rowstype['name_t']); ?></option>
             <?php endforeach; ?>
             </select>
            <?php echo isset($error['type_c'])?' <span class="help-inline badge badge-error">'.$error['type_c'].'</span>':''; ?>
          </div>
       </div>
        <!-- END SELECT -->
        <!-- SELECT model -->
       <div class="control-group"> <label class="control-label span2"><?php echo _t('الموديل') ?></label>
          <div class="controls">
               <select class="span5"  name="model" id="subtype" data-placeholder="<?php echo _t('اختر ') ?>" tabindex="1">
                <option value=""><?php echo _t('اختر ') ?></option>
				<?php foreach($_typecar->getTypeSubId($carRows['type_c']) as $rowstypesub ): ?>
                <option <?php echo ($lib_func->selected($carRows['model_c'],$rowstypesub['id_t']));?> value="<?php echo $rowstypesub['id_t']; ?>"><?php echo  language::getLang($rowstypesub['name_t']); ?></option>
             <?php endforeach; ?>
             </select>
             <?php echo isset($error['model'])?$error['model']:''; ?>
          </div>
       </div>
        <!-- END SELECT moedl -->
           <?php  }else   if($rows_option['code_o']=='Country_c'){?>
				   <div class="control-group"> <label class="control-label span2"><?php echo _t('البلد') ?></label>
          <div class="controls">
             <select class="span5" name="Country_c" onchange="return changeselect(this,'city','#subcity') "  data-placeholder="<?php echo _t('اختر') ?>" tabindex="1">
                <option value=""><?php echo _t('اختر') ?></option>
             <?php foreach($_city->getCountryAll() as $rowscity ): ?>
                <option <?php echo ($lib_func->selected($carRows['Country_c'],$rowscity['id_c']));?> value="<?php echo $rowscity['id_c']; ?>"><?php echo  language::getLang($rowscity['name_c']); ?></option>
             <?php endforeach; ?>
             </select>
              <span class="help-inline"><?php echo isset($error['Country_c'])?$error['Country_c']:''; ?> </span>
          </div>
       </div>
        <!-- END SELECT country -->

                               <!-- SELECT city-->
       <div class="control-group"> <label class="control-label span2"><?php echo _t('المدينة') ?></label>
          <div class="controls">
             <select class="span5" name="city" id="subcity" data-placeholder="<?php echo _t('اختر') ?>" tabindex="1">
                <option value=""><?php echo _t('اختر') ?></option>
				<?php foreach($_city->getCityId($carRows['Country_c']) as $rowsc ): ?>
                <option <?php echo ($lib_func->selected($carRows['city_c'],$rowsc['id_c']));?> value="<?php echo $rowsc['id_c']; ?>"><?php echo  language::getLang($rowsc['name_c']); ?></option>
             <?php endforeach; ?>
             </select>
              <span class="help-inline"><?php echo isset($error['city'])?$error['city']:''; ?> </span>
          </div>
       </div>
		   
		  <?php }

               }else{ ?>
                        <div class="control-group"> <label class="control-label span2"><?php echo  language::getLang($rows_option['name_o']); ?></label>
          <div class="controls">
		  
		  
		  
		  
<?php 
/*$v_text=($rows_option['code_o']=='act')?$carRows['act_c']:'';
$v_text=($rows_option['code_o']=='features')?$carRows['features_c']:'';
$v_text=($rows_option['code_o']=='imagemsh')?$carRows['images_c']:'';
$v_text=($rows_option['code_o']=='price')?$carRows['price_c']:'';
$v_text=($rows_option['code_o']=='des')?$carRows['description_c']:'';
*/
 foreach($show_meta_cars as $rows_meta_cars){
	if($rows_meta_cars['code_m']==$rows_option['code_o']){
		  $v_text=$rows_meta_cars['value_m'];
		  break;
	}

}
if($lib_func->jsonId($rows_option['option_o'],'basic')==1){
	$v_text=$carRows[$rows_option['code_o']];
	}

?>
          <?php if($lib_func->jsonId($rows_option['option_o'],'type')=='text'){ ?>
                 <?php $type_text=($lib_func->jsonId($rows_option['option_o'],'addon_star')!='' or $lib_func->jsonId($rows_option['option_o'],'addon_end')!='')?"input-prepend input-append":""; ?>
                <div class="<?php echo $type_text;?>">
                <?php echo ($lib_func->jsonId($rows_option['option_o'],'addon_star')!='')?"<span class='add-on'>".$lib_func->jsonId($rows_option['option_o'],'addon_star')."</span>":""; ?>
                   <input class="span5" name="<?php echo $rows_option['code_o']; ?>" value="<?php echo $v_text; ?>" type="text" />
                <?php echo ($lib_func->jsonId($rows_option['option_o'],'addon_end')!='')?"<span class='add-on'>".$lib_func->jsonId($rows_option['option_o'],'addon_end')."</span>":""; ?>
            </div>

          <?php }else if($lib_func->jsonId($rows_option['option_o'],'type')=='select'){  
				
		  ?>
<select class="span5" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t('اختر') ?>" tabindex="1">
                <option value=""><?php echo _t('اختر') ?></option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform): ?>
                   
				 <?php  $rowse= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option  <?php echo ($lib_func->selected($rowse,$v_text));?> value="<?php echo $rowse;?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
             </select>
          <?php }else if($lib_func->jsonId($rows_option['option_o'],'type')=='checkbox'){   ?>
             <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform): ?>
			 
			 <?php $rowse= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                         <div class="span3">
                  <label class="checkbox">
                     <input type="checkbox" <?php echo $lib_func->checkArray($rowse,$lib_func->jsonArray($v_text));?> name="<?php echo $rows_option['code_o']; ?>[]" value="<?php echo $rowse; ?>"><?php echo language::getLang($rowsform['value_v']);?>
                  </label>
                  </div>
                  <?php endforeach; ?>
                   <?php }else if($lib_func->jsonId($rows_option['option_o'],'type')=='textarea'){   ?>

                         <textarea name="<?php echo $rows_option['code_o']; ?>" class="span5"><?php echo $v_text; ?></textarea>

                   <?php }else if($lib_func->jsonId($rows_option['option_o'],'type')=='images' ){   ?>

                        <input type="file" onchange="return UploatImages('images<?php echo $rows_option['id_o']; ?>','.loadUpload<?php echo $rows_option['id_o']; ?>','.imgUpload<?php echo $rows_option['id_o']; ?>','<?php echo $rows_option['code_o']; ?>[]');" name="images<?php echo $rows_option['id_o']; ?>" id="images<?php echo $rows_option['id_o']; ?>" />
						<button style="display:none;" type="submit" id="btn">رفع صورة</button>
						
						<div class="imgUpload<?php echo $rows_option['id_o']; ?>"><span class="loadUpload<?php echo $rows_option['id_o']; ?>"></span>
                        
                        <?php
                            $imgs=$lib_func->jsonArray($v_text);
                                 if(count($imgs)){ foreach( $imgs as $rowsImages){?>
										<a onclick='return imagesdlet(this);' href='#'>
										<img  align='right' src='<?php echo $path['upload']; ?>thumb/thumb_<?php echo $rowsImages; ?>' />
										<input type='hidden' name='<?php echo $rows_option['code_o']; ?>[]' value='<?php echo $rowsImages; ?>' /></a>

							<?php }} ?>
                            </div>
                                 <br clear="all" />
                    <?php  }else if($lib_func->jsonId($rows_option['option_o'],'type')=='yes'){   ?>
                            <input type="checkbox" <?php echo $lib_func->checked(1,$v_text);?> value="1"  name="<?php echo $rows_option['code_o']; ?>" /> <?php echo _t("نعم") ?>
                   <?php }  ?>
              <span class="help-inline"><?php echo isset($error[$rows_option['code_o']])?$error[$rows_option['code_o']]:''; ?> </span>
          </div>
       </div>
	  
               <?php
               }
			   
			   
                    }
                        } ?>

	  
	  
	  

    </div>
    </div>
      </div>
</div>


        <div class="span11">
  <div class="form-actions">
        <input type="submit" value="<?php echo _t('تعديل') ?>" class="btn btn-primary" />
 </div>
        </div>

  <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
   <input type="hidden" name="edit" value='1' />

        </div>


 </form>

