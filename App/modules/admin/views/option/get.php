
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo $_option->getCode($_id,'name_o'); ?></h4>
    </div>
    <div class="body">



        <!-- END SELECT name -->


    <div class="controls row-fluid " id="specialcode">
               <div class="span12">

               </div>
    <?php foreach($lib_func->jsonArray($_option->getCode($_id,'option_o')) as $rowsall){ ?>
                <div class="span4">
                    <input type="text" name="name[]" value="<?php echo $rowsall; ?>"  />
               </div>
     <?php } ?>

   </div>

    <button type="button" id="addspecial" class="btn btn-primary"><?php echo _t('اضف جديد') ?></button> 

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

