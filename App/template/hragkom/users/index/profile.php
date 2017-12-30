 <div class="col-sm-12">
    <?php echo (isset($error['msg']))?$error['msg']:'' ; ?>


        	<div class="weight-cars">
				<div class="bs-example-bg-classes">
					<p class="bg-primary title"><?php echo _t(_Editpersonaldata);?></p>
				</div>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_FirstName); ?></label>
                                <div class="col-lg-8">
                                  <input type="text" class="form-control" name="firstname" value="<?php echo $_user['name_u'];?>" />
                                  <span class="help-inline"><?php echo isset($error['firstname'])?$error['firstname']:'' ?></span></div>
                            </div>

                             <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_Lastname); ?></label>
                                <div class="col-lg-8">
                                <input type="text"  class="form-control"  name="lastname" value="<?php echo $_user['lastname_u'];?>" />
                                 <span class="help-inline"><?php echo isset($error['lastname'])?$error['lastname']:'' ?></span></div>
                            </div>

                             <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_Age); ?></label>
                                <div class="col-lg-8">
                                   <input type="text"  class="form-control"  name="age" value="<?php echo $_user['age_u'];?>" />
                                  <span class="help-inline"><?php echo isset($error['age'])?$error['age']:'' ?></span> </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_Cellphone); ?></label>
                                <div class="col-lg-8">
                                   <input type="text"  class="form-control"  name="mobile" value="<?php echo $_user['mobile_u'];?>" />
                                   <span class="help-inline"><?php echo isset($error['mobile'])?$error['mobile']:'' ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label"> <?php echo _t(_Email); ?></label>
                                <div class="col-lg-8">
                                 <input type="text"  class="form-control"  name="email" value="<?php echo $_user['email_u'];?>" />
                                 <span class="help-inline"><?php echo isset($error['email'])?$error['email']:'' ?></span>
                                 </div>
                            </div>

                            <div class="form-group">
                                  <p>
                    				<input <?php echo $lib_func->checked($_user['lastnews_u'],1); ?> type="checkbox" name="lastnews" value="1" />
                    				<label><?php echo _t(_Registerforthelatestnews); ?></label>
                    				<?php echo isset($error['lastnews'])?$error['lastnews']:'' ?>
                				  </p>
                            </div>
                 <div class="form-group">
                      <input type="submit" class="btn btn-primary left"  value="<?php echo _t(_Modification); ?>" />
                      <a  class="btn btn-info left" href="<?php echo $path['urlsite'] ?>users/index/change_image" ><?php echo _t(_Changeprofile); ?></a>
                </div>
                        <input type="hidden" name="edit" value="1" />
                         <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
                    </form>
	</div>
   </div>


