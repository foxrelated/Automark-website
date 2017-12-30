
   <div class="col-sm-12">
        	<div class="weight-cars">

    <h3 class="linetitlelogin2">
            
            <i class="fa fa-smile-o size30" aria-hidden="true"></i>
   <?php echo _t(_Clientarea);?>
            
            </h3>
                    <a href="#" class="alert-link"><?php //echo _t("X");?></a>

     <!--SING IN FORM EXAMPLE-->
            <form  method="post" class="form-horizontal">

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_Username); ?></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="username" value="<?php echo isset($get['username'])?$lib_seurty->tities($get['username']):'';?>" id="inputName" placeholder="<?php echo _t(_Username); ?>">
                        <span class="help-inline"><?=_Signinbyemailormobilenumber?></span>
                        <span class="help-inline"><?php echo isset($error['username'])?$error['username']:'' ?></span>
                     </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-3 control-label"><?php echo _t(_Password); ?></label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control"  name="password" id="inputPassword" placeholder="<?php echo _t(_Password); ?>">

                            <span class="help-inline"><?php echo isset($error['password'])?$error['password']:'' ?></span>
                       <div class="checkbox">
                            <label>
                                <input type="checkbox">
                                <?php echo _t(_Rememberme); ?>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default"><?php echo _t(_Login); ?></button>
                    </div>
                </div>
                        <input type="hidden" name="login" value="1" />
                        <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />

            </form>

             <h4 class="title"><a href="<?php echo $path['urlsite'];?>users/login/lostpasword"><?php echo _t(_Iforgotthepassword);?></a></h4>

   </div>
   </div>

