


<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('اضافة صفحه جديده') ?></h4>
    </div>
    <div class="body">

        <!-- name -->
       <div class="control-group">
          <label class="control-label"><?php echo _t('اسم الصفحه') ?></label>
       
        <?php foreach($language_array as $langk=>$langv){ ?>
                <div class="controls">
                      <label  class="span2"><?php echo $language_array[$langk]['name'] ?></label>
					  <input type="text" class="span5" name="name[<?php echo $langk; ?>]" value="<?php echo isset($get['name'][$langk])?$get['name'][$langk]:''; ?>" />
                 
				 </div>
                 <?php } ?>
                   <?php echo isset($error['name'])?$error['name']:''; ?> 
              
              
        <!-- END name -->

        <!-- END SELECT Color -->

         <div class="control-group">
              <label class="control-label"><?php echo _t('الترتيب') ?></label>
              <div class="controls">
                 <input type="text" name="order" value="<?php echo isset($get['order'])?$get['order']:''; ?>" class="span7" />
                     <?php echo isset($error['order'])?$error['order']:''; ?>
              </div>
           </div>
            <div class="control-group">
              <label class="control-label"><?php echo _t('المحتوى') ?></label>
              <div class="controls">
  <?php foreach($language_array as $langk=>$langv){ ?>
  <label class="control-label"><?php echo $language_array[$langk]['name'] ?></label>
                       <textarea cols="80" id="ckeditor-gray<?php echo $langk; ?>" name="subject[<?php echo $langk; ?>]" rows="10"><?php echo isset($get['subject'][$langk])?$get['subject'][$langk]:''; ?></textarea>
                           <?php } ?>
                        <?php echo isset($error['subject'])?$error['subject']:''; ?>
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

