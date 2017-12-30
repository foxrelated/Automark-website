
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo $_option->getCode('adsimg','name_o'); ?></h4>
    </div>
    <div class="body">



        <!-- END SELECT name -->


    <div class="controls row-fluid " id="specialcode">
               <div class="span12">

               </div>
    <?php $x=0;foreach($_adsimg as $rowsall){ ?>
                <div class="span4">
                   <label class="control-label"><?php echo _t('الاسم') ?></label>
                    <input type="text" name="ads[<?php echo $x ?>][name]" value="<?php echo isset($rowsall->name)?$rowsall->name:''; ?>"  />
               </div>
                <div class="span4">
                   <label class="control-label"><?php echo _t('الرابط') ?></label>
                    <input type="text" name="ads[<?php echo $x ?>][img]" value="<?php echo isset($rowsall->img)?$rowsall->img:''; ?>"  />
               </div>
                   <div class="span4">
                      <label class="control-label"><?php echo _t('مسار الصورة') ?></label>
                    <input type="text" name="ads[<?php echo $x ?>][url]" value="<?php echo isset($rowsall->url)?$rowsall->url:''; ?>"  />
               </div>
               <div class="span4">
                  <label class="control-label"><?php echo _t('المكان') ?></label>
            <select class="span7" name="ads[<?php echo $x ?>][dir]" data-placeholder="<?php echo _t('المكان ') ?>" tabindex="1">
                 <option <?php echo $lib_func->selected($rowsall->dir,'footer'); ?> value="footer">الفوتر</option>
                 <option <?php echo $lib_func->selected($rowsall->dir,'search'); ?> value="search">بجوار البحث</option>
                 <option <?php echo $lib_func->selected($rowsall->dir,'vedio'); ?> value="vedio">بجوار الفيديو</option>
                 <option  <?php echo $lib_func->selected($rowsall->dir,'cars'); ?> value="cars">اسفل معلومات السيارة</option>
             </select>
               </div>

     <?php $x++;} ?>

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
   <input type="hidden" name="add" value='1' />

 </form>

