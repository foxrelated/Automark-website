
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('تعديل الموديل') ?></h4>
    </div>
    <div class="body">
           <?php
         //  print_r(array(md5('mobay3a.com'),md5('mobay3a.com/'),md5('http://mobay3a.com'),md5('http://mobay3a.com/'),md5('http://www.mobay3a.com'),md5('http://www.mobay3a.com/')));
            ?>
         <div class="control-group">
              <label class="control-label"><?php echo _t('اسم الموديل') ?></label>

                <?php $xnum=1; foreach($language_array as $langk=>$langv){ ?>
                <div class="controls">
                     <?php echo $language_array[$langk]['name'] ?>
                     <input type="text" name="name[<?php echo $langk; ?>]" value="<?php  echo language::getLang($option_data['name_o'],$langk);?>" class="span7" />
                 </div>
                 <?php } ?>

           </div>
           
         
           
    </div>

</div>

        </div>
        
        <?php  if($lib_func->jsonId($option_data['option_o'],'type')=='select' ){ ?>
              <div class="span11">
              <div class="form-actions">
            <button type="button" id="addspecial" class="btn btn-primary"><?php echo _t('اضف حقل') ?></button>
             <div id="specialcode">
			<?php $xnum=1;  foreach($option_value_data as $rowsvalueoption){?>
                  
                 <?php foreach($language_array as $langk=>$langv){ ?>
                    <div class="control-group">
                          <div class='span4'>   <?php echo $language_array[$langk]['name'] ?>
                                 <div class="controls" >  <input type='text'   name='option[<?php echo $rowsvalueoption['id_v']?>][<?php echo $langk; ?>]' value='<?php  echo language::getLang($rowsvalueoption['value_v'],$langk);?>'  />
                          </div>
                        </div>
                    </div>
                <?php  }?>
                <div class="control-group">
                          <div class='span4'>  قيمة افتراضية
                                 <div class="controls" > <input type='text'   name='value[<?php echo $rowsvalueoption['id_v']?>]' value='<?php echo $rowsvalueoption['type_v']?>'  />
                          </div>
                        </div>
                    </div>
          <input type="hidden" name="option_add[<?php echo $rowsvalueoption['id_v']?>]" value="old" />
           <?php $xnum++; } ?>
            <input type="hidden" value="<?php echo $xnum; ?>" id="numrows" />
           </div>
           </div>
           </div>
<?php } ?>

   <div class="span11">
            <div class="form-actions">
           			 <input type="submit" class="btn btn-primary" value="<?php echo _t('تعديل') ?>" />
            </div>

        </div>
        </div>

  <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
   <input type="hidden" name="edit" value='1' />
 </form>

