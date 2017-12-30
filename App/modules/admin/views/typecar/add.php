
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('اضافة موديل سيارة') ?></h4>
    </div>
    <div class="body">

      <!-- SELECT -->
       <div class="control-group">
          <label class="control-label"><?php echo _t('التصنيف') ?></label>
          <div class="controls">
             <select class="span7" name="category" onchange="return changeselect(this,'catoption','#typecrs') " data-placeholder="<?php echo _t('التصنيف ') ?>" tabindex="1">
               <option value="0"><?php echo _t('اختر التصنيف') ?></option>
               <?php foreach($_category->getAll() as $rowsCategory){?>
                <option value="<?php echo $rowsCategory['id_ss']; ?>"><?php echo  language::getLang($rowsCategory['code_ss']);?></option>
                <?php } ?>
             </select>
          </div>
       </div>
        <!-- END SELECT -->
        <!-- SELECT -->
       <div class="control-group">
          <label class="control-label"><?php echo _t('اختر الموديل الرئيسى') ?></label>
          <div class="controls">
             <select class="span7" name="type" id="typecrs" data-placeholder="<?php echo _t('الموديل ') ?>" tabindex="1">
                <option value="0"><?php echo _t('حدد  قسم اولا') ?></option>
                <?php //foreach($data_type->getTypeAll() as $rowstype){
                     //<option value="<?php echo $rowstype['id_t']; "><?php //echo $rowstype['name_t'] </option>
                // ?>
             </select>
          </div>
       </div>
        <!-- END SELECT -->

        <!-- END SELECT Color -->

         <div class="control-group">
              <label class="control-label"><?php echo _t('الاسم') ?></label>
             
              
                <?php foreach($language_array as $langk=>$langv){ ?>
                <div class="controls">
                      <label  class="span2"><?php echo $language_array[$langk]['name'] ?></label>
					  <input type="text" class="span5" name="name[<?php echo $langk; ?>]" value="<?php echo isset($get['name'][$langk])?$get['name'][$langk]:''; ?>" />
                 
				 </div>
                 <?php } ?>
                   <?php echo isset($error['name'])?$error['name']:''; ?> 
              
           </div>
              <div class="control-group">
              <label class="control-label"><?php echo _t('رفع صورة') ?></label>
              <div class="controls">

						<input type="file" onchange="return UploatImages('images','.imgUpload','.imgUpload','imagemsh');" name="images" id="images" />
						<button style="display:none;" type="submit" id="btn">رفع صورة</button>
						<div class="imgUpload"><span class="loadUpload"></span></div>
              </div>
           </div>
        <!-- END SELECT city -->
    </div>
</div>
        </div>
   <div class="span11">
  <div class="form-actions">
        <input type="submit" value="<?php echo _t('اضافة') ?>" class="btn btn-primary" />
 </div>
        </div>
        </div>
  <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
   <input type="hidden" name="add" value='1' />

 </form>

