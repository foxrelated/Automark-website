

   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('تعديل العضوية') ?></h4>
    </div>
    <div class="body">

                  <form method="post" action="" id="register-form" class="form-horizontal">
                    <fieldset class="span6 offset2">


                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label"><?php echo _t("الاسم الاول"); ?></label>
                            <div class="controls">
                               <input type="text" class="span12 inputcolor inputsize1"  name="firstname" value="<?php echo $dataId['name_u'];?>" />
                                   <span class="help-inline"><?php echo isset($error['firstname'])?$error['firstname']:'' ?></span>
                             </div>
                        </div>

                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label"><?php echo _t("الاسم الاخير"); ?></label>
                            <div class="controls">
                                <input type="text" class="span12 inputcolor inputsize1" name="lastname" value="<?php echo $dataId['lastname_u'];?>" />
                             <span class="help-inline"><?php echo isset($error['lastname'])?$error['lastname']:'' ?></span>
                        </div>
                        </div>

                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label"><?php echo _t("العمر"); ?></label>
                            <div class="controls">
                               <input type="text" class="span12 inputcolor inputsize1" name="age" value=" <?php echo $dataId['age_u'];?>" />
                              <span class="help-inline"><?php echo isset($error['age'])?$error['age']:'' ?></span>
                        </div>
                        </div>

                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label"><?php echo _t("الجوال"); ?></label>
                            <div class="controls">
                                <input type="text" class="span12 inputcolor inputsize1" name="mobile" value="<?php echo $dataId['mobile_u'];?>" />


   <span class="help-inline"><?php echo isset($error['mobile'])?$error['mobile']:'' ?></span>                             </div>
                        </div>

                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label"><?php echo _t("اسم المستخدم"); ?></label>
                            <div class="controls">
                                  <input type="text" class="span12 inputcolor inputsize1" name="username" value="<?php echo $dataId['username'];?>" />
   <span class="help-inline"><?php echo isset($error['username'])?$error['username']:'' ?></span>
                             </div>
                        </div>

                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label"><?php echo _t("البريد الالكترونى"); ?></label>
                            <div class="controls">
                                 <input type="text" class="span12 inputcolor inputsize1" name="email" value="<?php echo $dataId['email_u'];?>" />
                                      <span class="help-inline"><?php echo isset($error['email'])?$error['email']:'' ?></span>
                             </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo _t("كلمة المرور"); ?></label>
                            <div class="controls">
                                 <input type="password" class="span12 inputcolor inputsize1" name="password" value="" />
                                  <span class="help-inline"><?php echo isset($error['password'])?$error['password']:'' ?></span>
                                                               </div>
                        </div>


                            <div class="control-group">
                            <label class="control-label">المجموعه</label>
                            <div class="controls">
                                <select id="title" name="group" class="chzn-rtl">
                                    <option value="">اختر المجموعه</option>
                                   <?php foreach($data_users->getGroup() as $rowsg){ ?>
                                           <option  <?php echo $lib_func->selected($rowsg['id_g'] , $dataId['group_u']);?> value="<?php echo $rowsg['id_g']; ?>"><?php echo $rowsg['name_g']; ?></option>
                                   <?php } ?>
                                </select>
                                  <span class="help-inline"><?php echo isset($error['group'])?$error['group']:'' ?></span>
                            </div>
                        </div>
                         <div class="control-group">
                            <label class="control-label"> <?php echo _t("حالة العضو"); ?></label>
                            <div class="controls">
                                <label class="radio">
                                    	<input  <?php echo $lib_func->checked($dataId['act_u'] , 1);?>  type="radio" name="act" value="1" />
                                         مفعل
                                </label>
                                 <label class="radio">
                                    	<input type="radio"  <?php echo $lib_func->checked($dataId['act_u'] , 0);?> name="act" value="" />
                                        غير مفعل
                                </label>
                            </div>
                        </div>

                          <div class="control-group">
                            <label class="control-label"></label>
                            <div class="controls">
                                <label class="radio">
                                    	<input type="checkbox"  <?php echo $lib_func->checked($dataId['lastnews_u'] , 1);?> name="lastnews" value="1" />
                                        <?php echo _t("التسجيل للحصول على اخر الاخبار"); ?>
                                    <?php echo isset($error['lastnews'])?$error['using']:'' ?>
                                </label>

                            </div>
                        </div>


                    </fieldset>
                    <div class="clearfix"></div>
                    <div class="form-actions">
                        <div class="span6 offset2">
                            <input type="submit" value="<?php echo _t('تعديل') ?>" class="btn btn-primary" />
                        </div>
                    </div>
                      <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
   <input type="hidden" name="edit" value='1' />
                </form>

    </div>
</div>
        </div>

        </div>



