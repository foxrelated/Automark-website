<div class=" col-sm-9 col-sm-push-3">


			<div class="rows">
				<div class="weight-cars">
                    <div class="navtitleindexsearch">
				<div class="col-sm-4">


 <ul class="add-menu-list-car">
						<li class="dropdown " style="text-align:center">
                                                        <i class="fa fa-navicon" aria-hidden="true"></i>
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo _t(_SelectSection);?></a>
							<ul class="dropdown-menu dropbg">
								<?php foreach($db_category->getAll() as $rowsCategory){?>
		<li><a href="<?php echo $path['urlsite'] ?>/cars/mycars/add/<?php echo $rowsCategory['id_ss'];?>"><?php echo language::getLang($rowsCategory['code_ss']);?></a></li>
<?php } ?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		</div>



 <form action="" method="post">


<div class="row">
 <div class=" col-sm-12">
 <?php
    foreach($data_category as $rows_values){

                 foreach ($_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option){
					 if($lib_func->jsonId($rows_option['option_o'],'admin')==1){continue;}
					 $litForce=($lib_func->jsonId($rows_option['option_o'],'force')==1)?'<span style="color:red">*</span>':'';
					   ?>

                 <?php if($lib_func->jsonId($rows_option['option_o'],'default')==1){

if($rows_option['code_o']=='years'){?>
	 <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo  language::getLang($rows_option['name_o']); ?> <?php echo $litForce; ?> </label>
          <div class="col-sm-7">
            <select  class="form-control"  name="years"  data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                <?php for($year=date("Y") ; $year > 1970; $year--){ ?>
                <option <?php echo (isset($get[$rows_option['code_o']]))? $lib_func->selected($get[$rows_option['code_o']],$year):'';?> value="<?php echo $year; ?>"><?php echo  $year; ?></option>
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
          <label for="input3" class="col-sm-3 control-label title"><?php echo _t(_Type) ?> <?php echo $litForce; ?> </label>
          <div class="col-sm-7">
            <select  class="form-control"  name="type_c" onchange="return changeselect(this,'typecar','#subtype') " data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                <?php foreach($_typecar->getTypeAll(array('category'=>$rows_values['category_id'])) as $rowstype ): ?>
                <option <?php echo (isset($get[$rows_option['code_o']]))? $lib_func->selected($get[$rows_option['code_o']],$rowstype['id_t']):'';?> value="<?php echo $rowstype['id_t']; ?>"><?php echo  language::getLang($rowstype['name_t']); ?></option>
             <?php endforeach; ?>
             </select>
            <?php echo isset($error['type_c'])?' <span class="help-inline badge badge-error">'.$error['type_c'].'</span>':''; ?>
          </div>
       </div>
        <!-- END SELECT -->
        <!-- SELECT model -->
        <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo  language::getLang($rows_option['name_o']); ?> <?php echo $litForce; ?> </label>
          <div class="col-sm-7">
            <select  class="form-control"  name="model" id="subtype" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>

<?php if(isset($get['model'])){ foreach($_typecar->getTypeSubId($get['type_c']) as $rowstypesub ): ?>
                <option <?php echo ($lib_func->selected($get['model'],$rowstypesub['id_t']));?> value="<?php echo $rowstypesub['id_t']; ?>"><?php echo  language::getLang($rowstypesub['name_t']); ?></option>
             <?php endforeach; } ?>

             </select>
             <?php echo isset($error['model'])?$error['model']:''; ?>
          </div>
       </div>
        <!-- END SELECT moedl -->
           <?php  }else   if($rows_option['code_o']=='Country_c'){?>
				  <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo _t(_Country) ?> <?php echo $litForce; ?> </label>
          <div class="col-sm-7">
            <select  class="form-control"  name="Country_c" onchange="return changeselect(this,'city','#subcity') "  data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
             <?php foreach($_city->getCountryAll() as $rowscity ): ?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$rowscity['id_c']):'';?> value="<?php echo $rowscity['id_c']; ?>"><?php echo language::getLang($rowscity['name_c']); ?></option>
             <?php endforeach; ?>
             </select>
              <span class="help-inline"><?php echo isset($error['Country_c'])?$error['Country_c']:''; ?> </span>
          </div>
       </div>
        <!-- END SELECT country -->

                               <!-- SELECT city-->
      <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo _t(_City) ?> <?php echo $litForce; ?> </label>
          <div class="col-sm-7">
            <select  class="form-control"  name="city" id="subcity" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
<?php if(isset($get['city'])){ foreach($_city->getCityId($get['Country_c']) as $rowsc ): ?>
                <option <?php echo ($lib_func->selected($get['city'],$rowsc['id_c']));?> value="<?php echo $rowsc['id_c']; ?>"><?php echo  language::getLang($rowsc['name_c']); ?></option>
             <?php endforeach;} ?>
             </select>
              <span class="help-inline"><?php echo isset($error['city'])?$error['city']:''; ?> </span>
          </div>
       </div>

		  <?php }



               } else{ ?>


          <?php if($lib_func->jsonId($rows_option['option_o'],'type')=='text'){ ?>
		  <div class="form-group">
          <label  for="input3"  class="col-sm-3 control-label title"><?php echo  language::getLang($rows_option['name_o']); ?> <?php echo $litForce; ?> </label>
          <div class="col-sm-7">
                 <?php $type_text=($lib_func->jsonId($rows_option['option_o'],'addon_star')!='' or $lib_func->jsonId($rows_option['option_o'],'addon_end')!='')?"input-group":""; ?>
                <div class="<?php echo $type_text;?>">
                <?php echo ($lib_func->jsonId($rows_option['option_o'],'addon_star')!='')?"<span class='input-group-addon'>".$lib_func->jsonId($rows_option['option_o'],'addon_star')."</span>":""; ?>
                   <?php if ($lib_func->jsonId($rows_option['option_o'],'multiText')==1){?>

				  <div class="row">
				  <div class="col-sm-3">
				   <input class="form-control "   name="<?php echo $rows_option['code_o']; ?>[0]" value="<?php echo (isset($get[$rows_option['code_o']][0]))?$get[$rows_option['code_o']][0]:'';?>" type="text" />
					</div>
					 <div class="col-sm-9">
				   <input class="form-control "  name="<?php echo $rows_option['code_o']; ?>[1]" value="<?php echo (isset($get[$rows_option['code_o']][1]))?$get[$rows_option['code_o']][1]:'';?>" type="text" />
					</div>
					</div>
				   <?php }else{ ?>
				   		 <input class="form-control "   name="<?php echo $rows_option['code_o']; ?>" value="<?php echo (isset($get[$rows_option['code_o']]))?$get[$rows_option['code_o']]:'';?>" type="text" />
				   <?php } ?>
				<?php echo ($lib_func->jsonId($rows_option['option_o'],'addon_end')!='')?"<span class='input-group-addon'>".$lib_func->jsonId($rows_option['option_o'],'addon_end')."</span>":""; ?>
            </div>
   <span class="help-inline"><?php echo isset($error[$rows_option['code_o']])?$error[$rows_option['code_o']]:''; ?> </span>
          </div>
       </div>
          <?php }else if($lib_func->jsonId($rows_option['option_o'],'type')=='select'){   ?>
		    <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo  language::getLang($rows_option['name_o']); ?> <?php echo $litForce; ?> </label>
          <div class="col-sm-7">
            <select  class="form-control"  name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

				  ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
             </select>
			    <span class="help-inline"><?php echo isset($error[$rows_option['code_o']])?$error[$rows_option['code_o']]:''; ?> </span>
          </div>
       </div>
          <?php }else if($lib_func->jsonId($rows_option['option_o'],'type')=='checkbox'){   ?>
		     <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo  language::getLang($rows_option['name_o']); ?> <?php echo $litForce; ?> </label>
          <div class="col-sm-7">
             <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

			  ?>
               <?php $rowse= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                         <div class="span2">
                  <label class="checkbox">
                     <input type="checkbox" <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->checkArray($rowse,$get[$rows_option['code_o']]):'';?> name="<?php echo $rows_option['code_o']; ?>[]" value="<?php echo $rowsform['id_v'];?>"><?php echo language::getLang($rowsform['value_v']);?>
                  </label>
                  </div>

                  <?php endforeach; ?>
				     <span class="help-inline"><?php echo isset($error[$rows_option['code_o']])?$error[$rows_option['code_o']]:''; ?> </span>
          </div>
       </div>
                   <?php }else if($lib_func->jsonId($rows_option['option_o'],'type')=='textarea'){   ?>
				    <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo  language::getLang($rows_option['name_o']); ?> <?php echo $litForce; ?> </label>
           <div class="col-sm-7">

                         <textarea name="<?php echo $rows_option['code_o']; ?>"  class="form-control"><?php echo (isset($get[$rows_option['code_o']]))?$get[$rows_option['code_o']]:'';?></textarea>
   <span class="help-inline"><?php echo isset($error[$rows_option['code_o']])?$error[$rows_option['code_o']]:''; ?> </span>
          </div>
       </div>
                   <?php }else if($lib_func->jsonId($rows_option['option_o'],'type')=='images'){   ?>
	 <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?=_Basicimage?><?php echo $litForce; ?> </label>
           <div class="col-sm-7">
                        <input type="file" onchange="return UploatImages('imagesu<?php echo $rows_option['id_o']; ?>','.loadUploadu<?php echo $rows_option['id_o']; ?>','.loadUploadu<?php echo $rows_option['id_o']; ?>','<?php echo $rows_option['code_o']; ?>[]');"
                               name="imagesu<?php echo $rows_option['id_o']; ?>"
                               id="imagesu<?php echo $rows_option['id_o']; ?>" />
						<button style="display:none;" type="submit" id="btn"><?=_Uploadaphoto?></button>
                          <span class="help-inline"><?php echo isset($error[$rows_option['code_o']])?$error[$rows_option['code_o']]:''; ?> </span>
						<div class="imgUploadu<?php echo $rows_option['id_o']; ?>"><span class="loadUploadu<?php echo $rows_option['id_o']; ?>"></span>

                        <?php
                          if(isset($get[$rows_option['code_o']]) and count($get[$rows_option['code_o']])){ foreach( $get[$rows_option['code_o']] as $rowsImages){?>
										<a onclick='return imagesdlet(this);' href='#'>
										<img width="150" height="100"  align='right' src='<?php echo $path['upload']; ?>thumb/thumb_<?php echo $rowsImages; ?>' />
										<input type='hidden' name='<?php echo $rows_option['code_o']; ?>[]' value='<?php echo $rowsImages; ?>' /></a>

							<?php }} ?>

                        </div>


          </div>
       </div>

  <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo  language::getLang($rows_option['name_o']); ?></label>
           <div class="col-sm-7">
                        <input type="file" onchange="return UploatImages('images<?php echo $rows_option['id_o']; ?>','.loadUpload<?php echo $rows_option['id_o']; ?>','.imgUpload<?php echo $rows_option['id_o']; ?>','<?php echo $rows_option['code_o']; ?>[]');" name="images<?php echo $rows_option['id_o']; ?>" id="images<?php echo $rows_option['id_o']; ?>" />
						<button style="display:none;" type="submit" id="btn"><?=_Uploadaphoto?></button>
                          <span class="help-inline"><?php echo isset($error[$rows_option['code_o']])?$error[$rows_option['code_o']]:''; ?> </span>
						<div class="imgUpload<?php echo $rows_option['id_o']; ?>">
                            <span class="loadUpload<?php echo $rows_option['id_o']; ?>"></span>

                        <?php  if(isset($get[$rows_option['code_o']]) and count($get[$rows_option['code_o']])){ foreach( $get[$rows_option['code_o']] as $rowsImages){?>
										<a onclick='return imagesdlet(this);' href='#'>
										<img width="150" height="100"  align='right' src='<?php echo $path['upload']; ?>thumb/thumb_<?php echo $rowsImages; ?>' />
										<input type='hidden' name='<?php echo $rows_option['code_o']; ?>[]' value='<?php echo $rowsImages; ?>' /></a>

							<?php }} ?>

                        </div>


          </div>
       </div>
                <?php  }else if($lib_func->jsonId($rows_option['option_o'],'type')=='yes'){ ?>
					  <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?php echo  language::getLang($rows_option['name_o']); ?> <?php echo $litForce; ?> </label>
           <div class="col-sm-7">
             <input type="radio" <?php echo (isset($get[$rows_option['code_o']]))?$lib_func->checked(1,$get[$rows_option['code_o']]):'';?> value="1" name="<?php echo $rows_option['code_o']; ?>" /> <?php echo _t(_Yes) ?>
              <input type="radio" <?php echo (isset($get[$rows_option['code_o']]))?$lib_func->checked(0,$get[$rows_option['code_o']]):'';?> value="0" name="<?php echo $rows_option['code_o']; ?>" /> <?php echo _t(_No) ?>
							   <span class="help-inline"><?php echo isset($error[$rows_option['code_o']])?$error[$rows_option['code_o']]:''; ?> </span>
          </div>
       </div>
                   <?php } ?>

               <?php
               }
                    }
                        } ?>
 		</div>
  </div>

  <div class="row">
  <div class="col-sm-12">
         <input type="submit" value="<?php echo _t(_Add) ?>" class="btn btn-primary left" />
         <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
         <input type="hidden" name="add" value='1' />
</div>
</div>
      </form>


 </div>


