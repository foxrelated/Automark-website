<div class="col-sm-12">
    <?php echo (isset($error['msg']))?$error['msg']:'' ; ?>


        	<div class="weight-cars">
				<div class="bs-example-bg-classes">
					<p class="bg-primary title"><?php echo _t(_Editpersonaldata);?></p>
				</div>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label"><?php echo _t(_CurrentPassword); ?></label>
                                <div class="col-lg-8">
                                   <input type="password" class="form-control" name="oldpassword" value="" />
                                    <span class="help-inline"><?php echo isset($error['oldpassword'])?$error['oldpassword']:'' ?></span>
                               </div>
                            </div>

                             <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label"><?php echo _t(_Newpassword); ?></label>
                                <div class="col-lg-8">
                                  <input type="password" class="form-control" name="password" value="" />
                                   <span class="help-inline"><?php echo isset($error['password'])?$error['password']:'' ?></span>
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label"><?php echo _t(_Resetpassword); ?></label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" name="rpassword" value="" />
                                    <span class="help-inline">  <?php echo isset($error['rpassword'])?$error['rpassword']:'' ?></span>
                                </div>
                            </div>



                 <div class="form-group">
                     <input type="submit" class="btn btn-primary left"  value="<?php echo _t(_Modification); ?>" />
                </div>
              <input type="hidden" name="edit" value="1" />
              <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
                   </form>
	</div>
   </div>









