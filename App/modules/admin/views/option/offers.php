
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t("ادارة العروض"); ?></h4>
    </div>
    <div class="body">


        <!-- END SELECT name -->


    <div class="controls row-fluid " id="specialcode">
               <div class="span12">

               </div>
    <?php $x=1; foreach($lib_func->jsonArray($_option->getCode("offers",'option_o')) as $rowsall){ ?>
	<div class="adsw<?php echo $x; ?>">
	  <div class="span12">

               </div>
                <div class="span5">
				<label>اسم الاعلان</label>
                    <input type="text" name="name[<?php echo $x;?>][name]" value="<?php echo isset($rowsall->name)?$rowsall->name:''; ?>"  />
               </div>
			   <div class="span5">
					<label>رابط الصورة</label>
                    <input type="text" name="name[<?php echo $x;?>][img]" value="<?php echo isset($rowsall->img)?$rowsall->img:''; ?>"  />
               </div>
			   <div class="span5">
					<label>مسار الصورة</label>
                    <input type="text" name="name[<?php echo $x;?>][url]" value="<?php echo isset($rowsall->url)?$rowsall->url:''; ?>"  />
               </div>
			   <div class="span5">
					<label>حجم الاعلان</label>
               <select name="name[<?php echo $x;?>][size]">
						<option <?php echo $lib_func->selected($rowsall->size,'big'); ?> value="big">900*320</option>
						<option <?php echo $lib_func->selected($rowsall->size,'mediam1'); ?> value="mediam1">450*350 - 1</option>
						<option <?php echo $lib_func->selected($rowsall->size,'mediam2'); ?> value="mediam2">450*350 - 2</option>
						<option <?php echo $lib_func->selected($rowsall->size,'mediam3'); ?> value="mediam3">450*350 - 3</option>
						<option <?php echo $lib_func->selected($rowsall->size,'mediam4'); ?> value="mediam4">450*350 - 4</option>

				</select>
			   </div>
                <div class="span5">
					<label>تاريخ الانتهاء</label>
                    <input type="date" name="name[<?php echo $x;?>][date]" value="<?php echo isset($rowsall->date)?$rowsall->date:''; ?>"  />
               </div>
			   <br clear="all" />
			   <a onclick="return removeads('adsw<?php echo $x; ?>');" href="#">حذف الاعلان</a>
			   <hr />
		</div>	   
     <?php  $x++;} ?>
<input type="hidden" value="<?php echo $x ?>" id="numrows" />;
   </div>

    <button type="button" id="addspecial" class="btn btn-primary"><?php echo _t('اضف جديد') ?></button> 

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

