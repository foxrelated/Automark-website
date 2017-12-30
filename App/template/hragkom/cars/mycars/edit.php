<div class=" col-sm-9 col-sm-push-3">
<div class="bs-example-bg-classes">
    <p class="bg-primary title"><?php echo _t(_Editcontent);?></p>

  </div>
  
 <form action="" method="post">


<div class="row">
 <div class=" col-sm-12">

 


  
   <?php

    foreach($data_category as $rows_values){

                 foreach ($_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option){
					  if($lib_func->jsonId($rows_option['option_o'],'admin')==1){continue;}
					  ?>
						
				 
                 <?php if($lib_func->jsonId($rows_option['option_o'],'default')==1){

if($rows_option['code_o']=='years'){?>
	 <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo  language::getLang($rows_option['name_o']); ?></label>
          <div class="col-sm-7">
             <select   class="form-control"   name="years"  data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
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
        <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo _t(_Type) ?></label>
          <div class="col-sm-7">
              <select   class="form-control"   name="type_c" onchange="return changeselect(this,'typecar','#subtype') " data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                <?php foreach($_typecar->getTypeAll() as $rowstype ): ?>
                <option <?php echo ($lib_func->selected($carRows['type_c'],$rowstype['id_t']));?> value="<?php echo  $rowstype['id_t']; ?>"><?php echo language::getLang($rowstype['name_t']); ?></option>
             <?php endforeach; ?>
             </select>
            <?php echo isset($error['type_c'])?' <span class="help-inline badge badge-error">'.$error['type_c'].'</span>':''; ?>
          </div>
       </div>
        <!-- END SELECT -->
        <!-- SELECT model -->
        <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo  language::getLang($rows_option['name_o']); ?></label>
          <div class="col-sm-7">
               <select   class="form-control"    name="model" id="subtype" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
				<?php foreach($_typecar->getTypeSubId($carRows['type_c']) as $rowstypesub ): ?>
                <option <?php echo ($lib_func->selected($carRows['model_c'],$rowstypesub['id_t']));?> value="<?php echo $rowstypesub['id_t']; ?>"><?php echo  language::getLang($rowstypesub['name_t']); ?></option>
             <?php endforeach; ?>
             </select>
             <?php echo isset($error['model'])?$error['model']:''; ?>
          </div>
       </div>
        <!-- END SELECT moedl -->
           <?php  }else   if($rows_option['code_o']=='Country_c'){?>
				    <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo _t(_Country) ?></label>
          <div class="col-sm-7">
             <select   class="form-control"   name="Country_c" onchange="return changeselect(this,'city','#subcity') "  data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
             <?php foreach($_city->getCountryAll() as $rowscity ): ?>
                <option <?php echo ($lib_func->selected($carRows['Country_c'],$rowscity['id_c']));?> value="<?php echo $rowscity['id_c']; ?>"><?php echo  language::getLang($rowscity['name_c']); ?></option>
             <?php endforeach; ?>
             </select>
              <span class="help-inline"><?php echo isset($error['Country_c'])?$error['Country_c']:''; ?> </span>
          </div>
       </div>
        <!-- END SELECT country -->

                               <!-- SELECT city-->
        <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo _t(_City) ?></label>
          <div class="col-sm-7">
             <select   class="form-control"   name="city" id="subcity" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
				<?php foreach($_city->getCityId($carRows['Country_c']) as $rowsc ): ?>
                <option <?php echo ($lib_func->selected($carRows['city_c'],$rowsc['id_c']));?> value="<?php echo $rowsc['id_c']; ?>"><?php echo  language::getLang($rowsc['name_c']); ?></option>
             <?php endforeach; ?>
             </select>
              <span class="help-inline"><?php echo isset($error['city'])?$error['city']:''; ?> </span>
          </div>
       </div>
		   
		  <?php }

               }else{ ?>
                         <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo  language::getLang($rows_option['name_o']); ?></label>
          <div class="col-sm-7">
		  
		  
		  
		  
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
                 <?php $type_text=($lib_func->jsonId($rows_option['option_o'],'addon_star')!='' or $lib_func->jsonId($rows_option['option_o'],'addon_end')!='')?"input-group":""; ?>
                <div class="<?php echo $type_text;?>">
                <?php echo ($lib_func->jsonId($rows_option['option_o'],'addon_star')!='')?"<span class='input-group-addon'>".$lib_func->jsonId($rows_option['option_o'],'addon_star')."</span>":""; ?>
                   <input   class="form-control"   name="<?php echo $rows_option['code_o']; ?>" value="<?php echo $v_text; ?>" type="text" />
                <?php echo ($lib_func->jsonId($rows_option['option_o'],'addon_end')!='')?"<span class='input-group-addon'>".$lib_func->jsonId($rows_option['option_o'],'addon_end')."</span>":""; ?>
            </div>

          <?php }else if($lib_func->jsonId($rows_option['option_o'],'type')=='select'){  
				
		  ?>
<select   class="form-control"   name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
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

                         <textarea name="<?php echo $rows_option['code_o']; ?>"   class="form-control"  ><?php echo $v_text; ?></textarea>

                   <?php }else if($lib_func->jsonId($rows_option['option_o'],'type')=='images' ){   ?>

                        <input type="file" onchange="return UploatImages('images<?php echo $rows_option['id_o']; ?>','.loadUpload<?php echo $rows_option['id_o']; ?>','.imgUpload<?php echo $rows_option['id_o']; ?>','<?php echo $rows_option['code_o']; ?>[]');" name="images<?php echo $rows_option['id_o']; ?>" id="images<?php echo $rows_option['id_o']; ?>" />
						<button style="display:none;" type="submit" id="btn"><?=_Uploadaphoto?></button>
						
						<div class="imgUpload<?php echo $rows_option['id_o']; ?>"><span class="loadUpload<?php echo $rows_option['id_o']; ?>"></span>
                        
                        <?php
                            $imgs=$lib_func->jsonArray($v_text);
                                 if(count($imgs)){ foreach( $imgs as $rowsImages){?>
										<a onclick='return imagesdlet(this);' href='#'>
										<img  align='right' width="150" height="100" src='<?php echo $path['upload']; ?>thumb/thumb_<?php echo $rowsImages; ?>' />
										<input type='hidden' name='<?php echo $rows_option['code_o']; ?>[]' value='<?php echo $rowsImages; ?>' /></a>

							<?php }} ?>
                            </div>
                                 <br clear="all" />
                    <?php  }else if($lib_func->jsonId($rows_option['option_o'],'type')=='yes'){   ?>
                            <input type="checkbox" <?php echo $lib_func->checked(1,$v_text);?> value="1"  name="<?php echo $rows_option['code_o']; ?>" /> <?php echo _t(_Yes) ?>
                   <?php }  ?>
              <span class="help-inline"><?php echo isset($error[$rows_option['code_o']])?$error[$rows_option['code_o']]:''; ?> </span>
          </div>
       </div>
	  
               <?php
               }
			   
			   
                    }
                        } ?>

	  
	  
	  

     <div class="row">
  <div class="col-sm-12">

         <input type="submit" value="<?php echo _t(_Modification) ?>" class="btn btn-primary left" />
         <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
         <input type="hidden" name="edit" value='1' />
 </div>
 </div>
 </div>
 </div>
 </form>
 </div>