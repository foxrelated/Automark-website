<div class="col-sm-12">
    <?php echo (isset($error['msg']))?$error['msg']:'' ; ?>


        	<div class="weight-cars">
				<div class="bs-example-bg-classes">
					<p class="bg-primary title"><?php echo _t(_PasswordRecovery);?></p>
				</div>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label"><?php echo _t(_Email); ?></label>
                                <div class="col-lg-8">
                                   <input type="text"   class="form-control"  name="email" value="<?php echo isset($get['email'])?$lib_seurty->tities($get['email']):'';?>" />
                                      <span class="help-inline"><?php echo isset($error['email'])?$error['email']:'' ?></span>
                               </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label"><?php echo _t(_HumanVerification);?></label>
                                  <div class="col-lg-8">
                                    <div class="input-group">
                                         <input   class="form-control"   name="captcha" type="text" />
                                          <span class="input-group-addon" style="padding:0px 10px;"><img src="<?php echo $path['public'] ?>php/captcha.php" alt="" /> </span>
                                         <span class="help-inline"><?php echo isset($error['captcha'])?$error['captcha']:''; ?> </span>
                                    </div>
                                </div>
                            </div>



                 <div class="form-group">
                     	<input type="submit" class="btn btn-primary " style="float:none;" value="<?php echo _t("ارسال"); ?>" />
                </div>
              <input type="hidden" name="send" value="1" />
              <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
                   </form>
	</div>
   </div>













