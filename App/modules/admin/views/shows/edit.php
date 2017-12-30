
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('تعديل المعارض') ?></h4>
    </div>
    <div class="body">



        <!-- END SELECT name -->

         <div class="control-group">
              <label class="control-label"><?php echo _t('الاسم') ?></label>
              <div class="controls">
                 <input type="text" name="name" value="<?php echo $data['name_s']; ?>" class="span7" />
                     <?php echo isset($error['name'])?$error['name']:''; ?>
              </div>
           </div>
            <div class="control-group">
              <label class="control-label"><?php echo _t('رفع صورة') ?></label>
              <div class="controls">

						<input type="file" onchange="return UploatImages('images','.imgUpload','.imgUpload','imagemsh');" name="images" id="images" />
						<button style="display:none;" type="submit" id="btn">رفع صورة</button>
						<div class="imgUpload"><span class="loadUpload">
                         <?php if($data['images_s']!=''){ ?>
                          <img src="<?php echo $path['upload'];?>thumb/thumb_<?php echo $data['images_s']; ?>" alt="" />
                          <input type="hidden" name="imagemsh" value="<?php echo $data['images_s']; ?>" />
                          <?php } ?>
                        </span></div>
              </div>
           </div>

         <div class="control-group">
          <label class="control-label"><?php echo _t('نوع المعرض') ?></label>
          <div class="controls">
             <select class="span7" name="type" data-placeholder="<?php echo _t('الدولة ') ?>" tabindex="1">
                <option value=""><?php echo _t('حدد نوع المعرض') ?></option>
                <option <?php echo $lib_func->selected($data['type_s'],1);?> value="1"><?php echo _t('بيع وشراء') ?></option>
                <option <?php echo $lib_func->selected($data['type_s'],2);?> value="2"><?php echo _t('تاجير') ?></option>
             </select>
              <?php echo isset($error['type'])?$error['type']:''; ?>
          </div>
       </div>
                <div class="control-group">
              <label class="control-label"><?php echo _t('الاعلان') ?></label>
              <div class="controls">
                 <input type="text" name="ads" value="<?php echo $data['ads_s'];?>" class="span7" />
                     <?php echo isset($error['ads'])?$error['ads']:''; ?>
              </div>
           </div>
              <div class="control-group">
                <!-- Text input-->
                <label class="control-label">حالة المعرض</label>
                <div class="controls">

                    <div class="make-switch" data-on="info" data-off="success">
                        <input type="checkbox" name="act" value="1" <?php echo $lib_func->checked($data['act_s'],1) ;?>  />
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

