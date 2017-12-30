
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span5">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t(_Addanewproduct) ?></h4>
    </div>
    <div class="body">


         <div class="control-group">
              <label class="control-label"><?php echo _t(_Productname) ?></label>
              <div class="controls">
                 <input type="text" name="name" value="<?php echo $accessId['name_a']; ?>" class="span7" />
                     <?php echo isset($error['name'])?$error['name']:''; ?>
              </div>
           </div>

                   <div class="control-group">
              <label class="control-label"><?php echo _t(_Cellphone) ?></label>
              <div class="controls">
                 <input type="text" name="mobile" value="<?php echo $lib_func->jsonId($accessId['option_a'],'mobile'); ?>" class="span7" />
                     <?php echo isset($error['mobile'])?$error['mobile']:''; ?>

              </div>
           </div>

                 <div class="control-group">
              <label class="control-label"><?php echo _t(_Email) ?></label>
              <div class="controls">
                 <input type="text" name="email" value="<?php echo $lib_func->jsonId($accessId['option_a'],'email'); ?>" class="span7" />
                     <?php echo isset($error['email'])?$error['email']:''; ?>
              </div>
           </div>
            <div class="control-group">
          <label class="control-label"><?php echo _t(_Section) ?></label>
          <div class="controls">
             <select class="span7" name="section" data-placeholder="<?php echo _t(_SelectSection) ?>" tabindex="1">
                <option value=""><?php echo _t(_SelectSection) ?></option>
                 <?php foreach($lib_func->jsonArray($_option->getCode('section_access','option_o')) as $rowscolor): ?>
                <option  <?php echo ($lib_func->selected($accessId['section_a'],$rowscolor));?> value="<?php echo $rowscolor;?>"><?php echo $rowscolor;?></option>
               <?php endforeach; ?>
             </select>
             <?php echo isset($error['section'])?$error['section']:''; ?>
          </div>
       </div>

            <div class="control-group">
          <label class="control-label"><?php echo _t(_Brand) ?></label>
          <div class="controls">
             <select class="span7" name="marka" data-placeholder="<?php echo _t(_Brand) ?>" tabindex="1">
                <option value=""><?php echo _t(_SelectBrand) ?></option>
                 <?php foreach($lib_func->jsonArray($_option->getCode('marka_access','option_o')) as $rowscolor): ?>
                <option  <?php echo ($lib_func->selected($accessId['marka_a'],$rowscolor));?> value="<?php echo $rowscolor;?>"><?php echo $rowscolor;?></option>
               <?php endforeach; ?>
             </select>
             <?php echo isset($error['marka'])?$error['marka']:''; ?>
          </div>
       </div>

           <div class="control-group">
          <label class="control-label"><?php echo _t(_Color) ?></label>
          <div class="controls">
             <select class="span7" name="color" data-placeholder="<?php echo _t(_Choosecolor) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choosecolor) ?></option>
                 <?php foreach($lib_func->jsonArray($_option->getCode('color_access','option_o')) as $rowscolor): ?>
                <option  <?php echo ($lib_func->selected($accessId['color_a'],$rowscolor));?> value="<?php echo $rowscolor;?>"><?php echo $rowscolor;?></option>
               <?php endforeach; ?>
             </select>
             <?php echo isset($error['color'])?$error['color']:''; ?>
          </div>
       </div>

        <!-- END SELECT Color -->
           <div class="control-group">
              <label class="control-label"><?php echo _t(_Price) ?></label>
              <div class="controls">
                 <div class="input-prepend input-append">
                    <span class="add-on"><?=_Real?></span><input class=" " value="<?php echo $accessId['price_a']; ?>" name="price" type="text" /><span class="add-on">.00</span>
                 </div>
                  <span class="help-inline"><?php echo isset($error['price'])?$error['price']:''; ?> </span>
              </div>
           </div>
                             <!-- SELECT country-->
       <div class="control-group">
          <label class="control-label"><?php echo _t(_Country) ?></label>
          <div class="controls">
              <select class="span12" name="country" onchange="return changeselect(this,'city','#subcity') "  data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
             <?php foreach($_city->getCountryAll() as $rowscity ): ?>
                <option <?php echo ($lib_func->selected($accessId['country_a'],$rowscity['id_c']));?> value="<?php echo $rowscity['id_c']; ?>"><?php echo $rowscity['name_c']; ?></option>
             <?php endforeach; ?>
             </select>
              <span class="help-inline"><?php echo isset($error['country'])?$error['country']:''; ?> </span>
          </div>
       </div>
        <!-- END SELECT country -->

                               <!-- SELECT city-->
       <div class="control-group">
          <label class="control-label"><?php echo _t(_City) ?></label>
          <div class="controls">
              <select class="span12" name="city" id="subcity" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
				<?php foreach($_city->getCityId($accessId['country_a']) as $rowsc ): ?>
                <option <?php echo ($lib_func->selected($accessId['city_a'],$rowsc['id_c']));?> value="<?php echo $rowsc['id_c']; ?>"><?php echo $rowsc['name_c']; ?></option>
             <?php endforeach; ?>
             </select>
              <span class="help-inline"><?php echo isset($error['city'])?$error['city']:''; ?> </span>
          </div>
       </div>
        <!-- END SELECT city -->
    </div>
</div>
        </div>
        <!-- END SELECT SECTION -->
        <!-- BEGIN RADIO & CHECKBOXES SECTION -->
        <div class="span7">
            <div class="social-box">
    <div class="header">
        <h4><?=_Featuresofthecar?></h4>
    </div>
    <div class="body">

         <div class="control-group">
            <!-- BEGIN DEFAULT RADIO BUTTONS EXAMPLE -->
            <label class="control-label"><strong><?=_ChooseSpecifications?></strong></label>
            <div class="controls row-fluid">


            <?php foreach($lib_func->jsonArray($_option->getCode('special_access','option_o')) as $rowsspecial): ?>
               <div class="span3">
                  <label class="checkbox">
                     <input type="checkbox" <?php echo ($lib_func->checkArray($rowsspecial,$lib_func->jsonArray($accessId['special_a'])));?> name="special[]" value="<?php echo $rowsspecial; ?>"><?php echo $rowsspecial;?>
                  </label>
                  </div>
                <?php endforeach; ?>
                     <span class="help-inline"><?php echo isset($error['special'])?$error['special']:''; ?> </span>
                 </div>
               </div>


            </div>


       <div class="control-group">
              <label class="control-label"><?php echo _t(_Uploadaphoto) ?></label>
              <div class="controls">

						<input type="file" onchange="return UploatImages('images','.loadUpload','.imgUpload','imagemsh[]');" name="images" id="images" />
						<button style="display:none;" type="submit" id="btn"><?=_Uploadaphoto?></button>
						<div class="imgUpload"><span class="loadUpload"></span>
                        	<?php foreach($lib_func->jsonArray($accessId['images_a']) as $rowsImages){?>
										<a onclick='return imagesdlet(this);' href='#'>
										<img  align='right' src='<?php echo $path['upload']; ?>thumb/thumb_<?php echo $rowsImages; ?>' />
										<input type='hidden' name='imagemsh[]' value='<?php echo $rowsImages; ?>' /></a>

							<?php } ?>
                        </div>
              </div>
           </div>
               <span class="help-inline"><?php echo isset($error['imagemsh'])?$error['imagemsh']:''; ?> </span>

     <br clear="all" />


     <div class="control-group">
   <label class="checkbox">
   <?=_Productactivationstatus?>
   <br />
                     <input type="radio" <?php echo ($lib_func->checked($accessId['act_a'],1));?>  name="act" value="1"> <?=_Enabled?>
                     <input type="radio" <?php echo ($lib_func->checked($accessId['act_a'],0));?>  name="act" value=""> <?=_Notenabled?>
                  </label>
</div>
 <br clear="all" />
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

