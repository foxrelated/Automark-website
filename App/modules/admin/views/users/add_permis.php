
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('اضافة صلاحية جديد') ?></h4>
    </div>
    <div class="body">




         <div class="control-group">
              <label class="control-label"><?php echo _t('الاسم ') ?></label>
              <div class="controls">
                 <input type="text" name="name" value="<?php echo isset($get['name'])?$get['name']:''; ?>" class="span7" />
                     <?php echo isset($error['name'])?$error['name']:''; ?>
              </div>
           </div>
              <div class="control-group">
              <label class="control-label"><?php echo _t('الكود ') ?></label>
              <div class="controls">
                 <input type="text" name="code" value="<?php echo isset($get['code'])?$get['code']:''; ?>" class="span7" />
                     <?php echo isset($error['code'])?$error['code']:''; ?>
              </div>
           </div>
                         <br clear="all" />
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
   <input type="hidden" name="add" value='1' />

 </form>

