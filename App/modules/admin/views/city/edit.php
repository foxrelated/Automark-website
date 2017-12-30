
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('اضافة مدينة او دولة') ?></h4>
    </div>
    <div class="body">

        <!-- SELECT -->
       <div class="control-group">
          <label class="control-label"><?php echo _t('اختر الدولة الرئيسية') ?></label>
          <div class="controls">
             <select class="span7" name="country" data-placeholder="<?php echo _t('الدولة ') ?>" tabindex="1">
                <option value="0"><?php echo _t('دولة رئيسية ') ?></option>
                <?php foreach($data_city->getCountryAll() as $countyall){?>
                     <option <?php echo $lib_func->selected($cityId['sub_c'], $countyall['id_c']);?> value="<?php echo $countyall['id_c']; ?>"><?php echo language::getLang($countyall['name_c'] )?></option>
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
                     <?php echo $language_array[$langk]['name'] ?>
					  <input type="text" class="span7" name="name[<?php echo $langk; ?>]" value="<?php echo language::getLang($cityId['name_c'],$langk) ;?>" />
                 </div>
                 <?php } ?> 
				 <?php echo isset($error['name'])?$error['name']:''; ?>
             
           </div>
            <div class="control-group">
              <label class="control-label"><?php echo _t('كود الدولة') ?></label>
              <div class="controls">
                 <input type="text" name="code" value="<?php echo $cityId['code_c']; ?>" class="span7" />
                     <?php echo isset($error['code'])?$error['code']:''; ?>
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

