<div class="weight-cars">
<h3><?php echo _t(_InfringementNotificationForm); ?></h3>

<div class="row">
        <form action="" method="post">
       
   
        
          <div class="form-group">
                  <label for="input3" class="col-sm-3 control-label title"><?php echo _t(_Typeofnotification); ?></label>
                  <div class="col-sm-7">
                        <input type="radio" class=""   value="1" name="type_ss" /><?php echo _t(_Violent); ?>
                 <br />
 					<input type="radio" class=""   value="2" name="type_ss" /><?php echo _t(_Conman); ?>
                 <br />
                  <input type="radio" class=""   value="1" name="type_ss" /><?php echo _t(_Inappropriate); ?>
                 <br />
                 <input type="radio" class="" value="2" name="type_ss" /> <?php echo _t(_Other); ?>

                   </div>
                   <span class="help-inline"><?php echo isset($error['title'])?$error['title']:''; ?> </span>
           </div>
          <div class="form-group">
                  <label for="input3" class="col-sm-3 control-label title"><?php echo _t(_Reasonofnotification); ?></label>
                  <div class="col-sm-7">
                    <textarea rows="5" name="subject"  class="form-control"><?php echo isset($get['subject'])?$lib_seurty->tities($get['subject']):'';?></textarea>
                    
                   </div>
                     <span class="help-inline"><?php echo isset($error['subject'])?$error['subject']:''; ?> </span>
           </div>
            <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_HumanVerification);?></label>
                    <div class="col-lg-7">
                     <div class="input-group">
                      <input class="form-control" name="captcha" type="text" />
						 <span class="input-group-addon" style="padding:0px 10px;"><img src="<?php echo $path['public'] ?>php/captcha.php" alt="" /> </span>
                      </div>
                       <span class="help-inline"><?php echo isset($error['captcha'])?$error['captcha']:''; ?> </span>
                     </div>
                </div>
           <div class="form-group">
                 <input type="submit" value="<?php echo _t('تبليغ') ?>" class="btn btn-primary left" />
                 
        </div>
                    <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
                    <input type="hidden" name="add" value='1' />
      </form>
</div>

</div>