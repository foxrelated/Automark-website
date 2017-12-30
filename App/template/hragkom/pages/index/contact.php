 <div class="col-sm-12">
           <div class="bs-example-bg-classes">
					<p class=" title"><?php echo language::getLang($data['name_p']) ?></p>
				</div>

    <div class="weight-cars">
    <p class="font"> <?php echo  language::getLang($data['subject_p']) ?> </p>
      <br clear="all" />



    <h5 class="title"><?php echo _t(_Filloutthefollowingformandwewillcontactyouassoonaspossible);?></h5>

     <div class="col-sm-8">

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_Thename);?></label>
                                <div class="col-lg-8">
                                    <input class="form-control"  value="<?php echo isset($get['name'])?$lib_seurty->tities($get['name']):'';?>" name="name" type="text" />
                                    <span class="help-inline"><?php echo isset($error['name'])?$error['name']:''; ?> </span>
                                </div>
                             </div>

                             <div class="form-group">
                                  <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_Email);?></label>
                                  <div class="col-lg-8">
                                <input class="form-control" name="email"  value="<?php echo isset($get['email'])?$lib_seurty->tities($get['email']):'';?>" type="text" />
                                  <span class="help-inline"><?php echo isset($error['email'])?$error['email']:''; ?> </span>
                              </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_Cellphone); ?></label>
                                <div class="col-lg-8">
                                  <input class="form-control" name="mobile" value="<?php echo isset($get['mobile'])?$lib_seurty->tities($get['mobile']):'';?>" type="text" />
                                    <span class="help-inline"><?php echo isset($error['mobile'])?$error['mobile']:''; ?> </span>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label"> <?php echo _t(_Subject);?></label>
                                  <div class="col-lg-8">
                                      <input class="form-control" name="title" value="<?php echo isset($get['title'])?$lib_seurty->tities($get['title']):'';?>" type="text" />
                                      <span class="help-inline"><?php echo isset($error['title'])?$error['title']:''; ?> </span>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label"> <?php echo _t(_Thedetails);?></label>
                                  <div class="col-lg-8">

                                         <textarea class="col-lg-12 form-control" name="subject" style="height:100px;"><?php echo isset($get['subject'])?$lib_seurty->tities($get['subject']):'';?></textarea>
                                         <span class="help-inline"><?php echo isset($error['subject'])?$error['subject']:''; ?> </span>
                                   </div>
                            </div>
                                 <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label"><?php echo _t(_HumanVerification);?></label>
                                  <div class="col-lg-8">
                                    <div class="input-group">
                                         <input   class="form-control"   name="captcha" type="text" />
                                          <span class="input-group-addon" style="padding:0px 10px;"><img src="<?php echo $path['public'] ?>php/captcha.php" alt="" /> </span>
                                         <span class="help-inline"><?php echo isset($error['captcha'])?$error['captcha']:''; ?> </span>
                                    </div>
                                </div>
                            </div>
                 <div class="form-group">
                       <input type="submit" value="<?php echo _t("ارسال") ?>" class="btn btn-primary" />
                </div>
                       <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
                       <input type="hidden" name="send" value='1' />
                    </form>

                    </div>
                      <div class="clear"></div>
	</div>
   </div>




