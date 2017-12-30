
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('اضافة موديل سيارة') ?></h4>
    </div>
    <div class="body">
   <div class="control-group">
          <label class="control-label"><?php echo _t('التصنيف') ?></label>
          <div class="controls">
             <select class="span7" name="category" data-placeholder="<?php echo _t('التصنيف ') ?>" tabindex="1">
                <option value="0"><?php echo _t('اختر التصنيف') ?></option>
                <?php foreach($_category->getAll() as $rowsCategory){?>
                     <option <?php echo $lib_func->selected($datatype['category_t'], $rowsCategory['id_ss']);?> value="<?php echo $rowsCategory['id_ss']; ?>">
					 <?php echo language::getLang($rowsCategory['code_ss']); ?></option>
                <?php } ?>
             </select>
          </div>
       </div>
        <!-- SELECT -->
       <div class="control-group">
          <label class="control-label"><?php echo _t('اختر الموديل الرئيسى') ?></label>
          <div class="controls">
             <select class="span7" name="type" data-placeholder="<?php echo _t('الموديل ') ?>" tabindex="1">
                <option value="0"><?php echo _t('الموديل رئيسى') ?></option>
                <?php foreach($data_type->getTypeAll(array('category'=>$datatype['category_t'])) as $rowstype){?>
                     <option <?php echo $lib_func->selected($datatype['sub_t'], $rowstype['id_t']);?> value="<?php echo $rowstype['id_t']; ?>"><?php echo language::getLang($rowstype['name_t'])?></option>
                <?php } ?>
             </select>
          </div>
       </div>
        <!-- END SELECT -->

        <!-- END SELECT Color -->

         <div class="control-group">
              <label class="control-label"><?php echo _t('الاسم') ?></label>
               	<?php $xnum=1; foreach($language_array as $langk=>$langv){ ?>
                <div class="controls">
                  		 <label  class="span2"> <?php echo $language_array[$langk]['name'] ?></label>
					 	 <input type="text" class="span5" name="name[<?php echo $langk; ?>]" value="<?php echo language::getLang($datatype['name_t'],$langk) ;?>" />
                 </div>
                 <?php } ?> 
				 <?php echo isset($error['name'])?$error['name']:''; ?>
           </div>
              <div class="control-group">
              <label class="control-label"><?php echo _t('رفع صورة') ?></label>
              <div class="controls">

						<input type="file" onchange="return UploatImages('images','.imgUpload','.imgUpload','imagemsh');" name="images" id="images" />
						<button style="display:none;" type="submit" id="btn">رفع صورة</button>
						<div class="imgUpload"><span class="loadUpload">
                        <?php if($datatype['images_t']!=''){ ?>
                          <img src="<?php echo $path['upload'];?>thumb/thumb_<?php echo $datatype['images_t']; ?>" alt="" />
                          <input type="hidden" name="imagemsh" value="<?php echo $datatype['images_t']; ?>" />
                          <?php } ?>
                        </span>
                        </div>
              </div>
           </div>
        <!-- END SELECT city -->
    </div>
</div>
        </div>
   <div class="span11">
  <div class="form-actions">
        <input type="submit" value="<?php echo _t('تعديل') ?>" class="btn btn-primary" />
 </div>
        </div>
        </div>
  <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
   <input type="hidden" name="edit" value='1' />

 </form>

