
   <div class="col-sm-8 col-sm-push-2">
    <?php echo (isset($error['msg']))?$error['msg']:'' ; ?>


        	<div class="weight-cars">
				<div class="bs-example-bg-classes">
					<p class="title"><?php echo _t(_Createanewaccount);?></p>
				</div>
               <div class="col-sm-9">
     <!--SING IN FORM EXAMPLE-->
            <form  method="post" class="form-horizontal">
			
	<!-- start -->
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_FirstName); ?></label>
                    <div class="col-lg-8">
                         <input type="text" class="form-control" name="firstname" value="<?php echo isset($get['firstname'])?$lib_seurty->tities($get['firstname']):'';?>" />   
                  <span class="help-inline"><?php echo isset($error['firstname'])?$error['firstname']:'' ?></span>
                     </div>
                </div>
	<!-- end -->
	
	<!-- start -->
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_Lastname); ?></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="lastname" value="<?php echo isset($get['lastname'])?$lib_seurty->tities($get['lastname']):'';?>" />
						<span class="help-inline"><?php echo isset($error['lastname'])?$error['lastname']:'' ?></span>
                     </div>
                </div>
	<!-- end -->	
	
	
	
	<!-- start -->
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_Cellphone); ?></label>
                    <div class="col-lg-8">
                    <div class="row">
					<div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="5300000000" name="mobile" value="<?php echo isset($get['mobile'])?$get['mobile']:'';?>" />
						</div>
						<div class="col-lg-4">
                        <input type="text" class="form-control " placeholder="966" name="mobilecode" value="<?php echo isset($get['mobilecode'])?$get['mobilecode']:'';?>" />
					</div>
					</div>
						<span class="help-inline"><?=_Example?> : 5300000000  966</span>
						<span class="help-inline"><?php echo isset($error['mobile'])?$error['mobile']:'' ?></span>
						<span class="help-inline"><?php echo isset($error['mobilecode'])?$error['mobilecode']:'' ?></span>
                     </div>
                </div>
	<!-- end -->	
	
	<!-- start -->
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_Username); ?></label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="username" value="<?php echo isset($get['username'])?$lib_seurty->tities($get['username']):'';?>" />

						<span class="help-inline"><?php echo isset($error['username'])?$error['username']:'' ?></span>
                     </div>
                </div>
	<!-- end -->
	
	<!-- start -->
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label"> <?php echo _t(_Email); ?></label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="email" value="<?php echo isset($get['email'])?$lib_seurty->tities($get['email']):'';?>" />
						<span class="help-inline"><?php echo isset($error['email'])?$error['email']:'' ?></span>
                     </div>
                </div>
	<!-- end -->
	
	<!-- start -->
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_Password); ?></label>
                    <div class="col-lg-8">
                      <input type="password" class="form-control" name="password" value="" />
						<span class="help-inline"><?php echo isset($error['password'])?$error['password']:'' ?></span>
                     </div>
                </div>
	<!-- end -->
	
	<!-- start -->
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_Resetpassword); ?></label>
                    <div class="col-lg-8">
                    <input type="password" class="form-control" name="rpassword" value="" />
					<span class="help-inline">  <?php echo isset($error['rpassword'])?$error['rpassword']:'' ?></span>
                     </div>
                </div>
	<!-- end -->
	<!-- start -->
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_TypeofMembership); ?></label>
                    <div class="col-lg-8">
					<select class="form-control" name="age">
                        <option <?php echo (isset($get['age']) and $get['age']==1 )?'selected':'';?> value="1"><?=_StandardMember?></option>
                        <option <?php echo (isset($get['age']) and $get['age']==2 )?'selected':'';?> value="2"><?=_Exhibition?></option>
                        <option <?php echo (isset($get['age']) and $get['age']==3 )?'selected':'';?> value="3"><?=_CarDealer?></option>
					</select>
					<span class="help-inline"><?php echo isset($error['age'])?$error['age']:'' ?></span>
                     </div>
                </div>
	<!-- end -->	
	<!-- start -->
                 <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_HumanVerification);?></label>
                    <div class="col-lg-8">
                     <div class="input-group">
                      <input class="form-control" name="captcha" type="text" />
						 <span class="input-group-addon" style="padding:0px 10px;"><img src="<?php echo $path['public'] ?>php/captcha.php" alt="" /> </span>
                      </div>
                       <span class="help-inline"><?php echo isset($error['captcha'])?$error['captcha']:''; ?> </span>
                     </div>
                </div>
	<!-- end -->
	
	<!-- start -->
                <div class="form-group ">
                <div class="col-lg-8">
					 <div class="checkbox">
                           <input type="checkbox" name="using" value="1" />
							<label><?php echo _t(_IagreetotheSiteUsageAgreement); ?>(<a href="<?php echo $path['urlsite'];?>pages/index/id/6"><?php echo _t(_Viewtheusageagreement);?></a>)</label>
							<?php echo isset($error['using'])?$error['using']:'' ?>
							  </p>
							  <p>
								<input type="checkbox" name="lastnews" value="1" />
								<label><?php echo _t(_Registerforthelatestnews); ?></label>
								<?php echo isset($error['lastnews'])?$error['lastnews']:'' ?>
								  </p>
                        </div>
                </div>
                </div>
	<!-- end -->		
                <div class="form-group">
                     <input type="submit" class="btn btn-default"  value="<?php echo _t("تسجيل"); ?>" />
                           <input type="hidden" name="insert" value="1" />
  <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
            </div>
            </form>
			<!--
<a href="<?php echo $login_face;?>"></a>
-->
   </div>
   <div class="clear"></div>
   </div>
   </div>

