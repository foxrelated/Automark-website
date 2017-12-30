
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t(_Sendamessagetothecustomer) ?></h4>
    </div>
    <div class="body">


         <div class="control-group">
              <label class="control-label"><?php echo _t(_FirstName) ?></label>
              <div class="controls">
                 <input type="text" name="name" value="<?php echo $lib_func->jRes('name'); ?>" class="span7" />
                     <?php echo isset($error['name'])?$error['name']:''; ?>
              </div>
           </div>
            <div class="control-group">
              <label class="control-label"><?php echo _t(_Lastname) ?></label>
              <div class="controls">
                 <input type="text" name="code" value="<?php echo $lib_func->jRes('lastname'); ?>" class="span7" />
                     <?php echo isset($error['code'])?$error['code']:''; ?>
              </div>
           </div>
           <div class="control-group">
              <label class="control-label"><?php echo _t(_Cellphone) ?></label>
              <div class="controls">
                 <input type="text" name="mobile" value="<?php echo $lib_func->jRes('mobile'); ?>" class="span7" />
                     <?php echo isset($error['mobile'])?$error['mobile']:''; ?>
              </div>
           </div>
              <div class="control-group">
              <label class="control-label"><?php echo _t(_Email) ?></label>
              <div class="controls">
                 <input type="text" name="email" value="<?php echo $lib_func->jRes('email'); ?>" class="span7" />
                     <?php echo isset($error['email'])?$error['email']:''; ?>
              </div>
               <div class="control-group">
              <label class="control-label"><?php echo _t(_Placeofdelivery) ?></label>
              <div class="controls">
                 <input type="text" name="mkan" value="<?php echo $lib_func->jRes('mkan'); ?>" class="span7" />
                     <?php echo isset($error['mkan'])?$error['mkan']:''; ?>
              </div>
           </div>
           </div>
              <div class="control-group">
              <label class="control-label"><?php echo _t(_Receiveddate) ?></label>
              <div class="controls">
                 <input type="date" name="datestart[date]" value="<?php echo $lib_func->jRes('datestart')->date; ?>" class="span3" />
                 <input type="time" name="datestart[time]" value="<?php echo $lib_func->jRes('datestart')->time; ?>" class="span3" />
              </div>
           </div>
            <div class="control-group">
              <label class="control-label"><?php echo _t(_Deliverydate) ?></label>
              <div class="controls">
                 <input type="date" name="dateend[date]" value="<?php echo $lib_func->jRes('dateend')->date; ?>" class="span3" />
                 <input type="time" name="dateend[time]" value="<?php echo $lib_func->jRes('dateend')->time; ?>" class="span3" />
              </div>
           </div>
           <div class="control-group">
              <label class="control-label"><?php echo _t(_Content) ?></label>
              <div class="controls">

                       <textarea cols="80" id="ckeditor-gray" name="subject" rows="10"><p>الاسم : <?php echo $lib_func->jRes('name'); ?> <?php echo $lib_func->jRes('lastname'); ?></p>
                              <p><?=_Cellphone?> :<?php echo $lib_func->jRes('mobile'); ?></p>
                              <p><?=_Email?> :<?php echo $lib_func->jRes('email'); ?></p>
                              <p><?=_Receiveddate?> :<?php echo $lib_func->jRes('datestart')->date; ?> <?php echo $lib_func->jRes('datestart')->time; ?></p>
                              <p><?=_Deliverydate?> :<?php echo $lib_func->jRes('dateend')->date; ?> <?php echo $lib_func->jRes('dateend')->time; ?></p>
                              <p><?=_Anycommentshere?></p>
                        </textarea>

             </div>
           </div>
    </div>
</div>
        </div>
   <div class="span11">
  <div class="form-actions">
        <input type="submit" value="<?php echo _t('ارسال') ?>" class="btn btn-primary" />
 </div>
        </div>
        </div>
  <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
   <input type="hidden" name="send" value='1' />

 </form>

