
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('أدارة الصلاحيات') ?></h4>
    </div>
    <div class="body">




         <div class="control-group">
              <label class="control-label"><?php echo _t('اسم المجموعه') ?></label>
              <div class="controls">
                 <input type="text" name="name" value="<?php echo $group['name_g']; ?>" class="span7" />
                     <?php echo isset($error['name'])?$error['name']:''; ?>
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

