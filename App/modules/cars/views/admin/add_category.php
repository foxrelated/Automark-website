
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span7">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('اضافة سيارة جديدة') ?></h4>
    </div>
    <div class="body">
        <!-- SELECT -->
        <div class="control-group">
              <label class="control-label "><?php echo _t('اسم التصنيف') ?></label>
                <?php foreach($language_array as $langk=>$langv){ ?>
                <div class="controls">
                      <label  class="span2"><?php echo $language_array[$langk]['name'] ?></label>
					  <input type="text" class="span5" name="name[<?php echo $langk; ?>]" value="<?php echo isset($get['name'][$langk])?$get['name'][$langk]:''; ?>" />

				 </div>
                 <?php } ?>
                  <span class="help-inline"><?php echo isset($error['name'])?$error['name']:''; ?> </span>
             
           </div>


        <div class="control-group">
          <label class="control-label">خيارات التصنيف</label>
          <div class="controls">
             <select class="span12" multiple="multiple" name="form[]" data-placeholder="<?php echo _t('اختر الموديل الفرعى ') ?>" tabindex="1">
                <?php foreach($option_form as $row_form){?>
                <option value="<?php echo $row_form['code_o'];?>"><?php echo language::getLang($row_form['name_o']);?></option>
                   <?php } ?>
             </select>  <!-- (.r.DdOPmSrA -->
          </div>
       </div>

            <div class="span11">
                                           <div class="form-actions">
                                            <input type="submit" class="btn btn-primary" value="<?php echo _t('اضافة') ?>" />
                                          </div>

        </div>
        </div>

  <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
   <input type="hidden" name="add" value='1' />

       </div>
        </div>
        </div>
        </div>
 </form>