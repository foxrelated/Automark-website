


<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('تعديل صفحه ') ?></h4>
    </div>
    <div class="body">

        <!-- SELECT -->
       <div class="control-group">
          <label class="control-label"><?php echo _t('اسم الصفحه') ?></label>
              <?php foreach($language_array as $langk=>$langv){ ?>
                <div class="controls">
                      <label  class="span2"><?php echo $language_array[$langk]['name'] ?></label>
					  <input type="text" class="span5" name="name[<?php echo $langk; ?>]" value="<?php echo language::getLang($get['name_p'],$langk) ;?>" />
                 
				 </div>
                 <?php } ?>
                   <?php echo isset($error['name'])?$error['name']:''; ?> 
                   
         
       </div>
        <!-- END SELECT -->

        <!-- END SELECT Color -->

         <div class="control-group">
              <label class="control-label"><?php echo _t('الترتيب') ?></label>
              <div class="controls">
                 <input type="text" name="order" value="<?php echo isset($get['order_p'])?$get['order_p']:''; ?>" class="span7" />
                     <?php echo isset($error['order'])?$error['order']:''; ?>
              </div>
           </div>
            <div class="control-group">
              <label class="control-label"><?php echo _t('المحتوى') ?></label>
              <div class="controls">
<?php foreach($language_array as $langk=>$langv){ ?>
  <label class="control-label"><?php echo $language_array[$langk]['name'] ?></label>
                       <textarea cols="80" id="ckeditor-gray<?php echo $langk; ?>" name="subject[<?php echo $langk; ?>]" rows="10"><?php echo language::getLang($get['subject_p'],$langk) ;?></textarea>
                           <?php } ?>
                       
                        <?php echo isset($error['subject'])?$error['subject']:''; ?>
             
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

