 <?php echo (isset($error['msg']))?$error['msg']:'' ; ?>

 
 
  <h3  class="title btn-primary right"><?php echo _t(_Createanewaccount);?></h3>
<div class="border-block inputh" >
   




 <form action="" method="post">
  

 <div class="right span4">

           <table cellpadding="4" cellspacing="4" style="border-size: 0px ;font-size:15px;" class="title span12">


         <tr>
       <td style="width:110px;"><?php echo _t(_FirstName); ?></td>
       <td>
            <div class="input-prepend input-append">
             <input type="text" class="span12 inputcolor inputsize1" name="firstname" value="<?php echo isset($get['firstname'])?$lib_seurty->tities($get['firstname']):'';?>" />



        </div>
                  <span class="help-inline"><?php echo isset($error['firstname'])?$error['firstname']:'' ?></span>
       </td>
     </tr>

     <tr>
       <td style="width:110px;"><?php echo _t(_Lastname); ?></td>
       <td>
       <div class="input-prepend input-append">
                    <input type="text" class="span12 inputcolor inputsize1" name="lastname" value="<?php echo isset($get['lastname'])?$lib_seurty->tities($get['lastname']):'';?>" />


        </div>
                  <span class="help-inline"><?php echo isset($error['lastname'])?$error['lastname']:'' ?></span>
       </td>
     </tr>
	  <tr>
       <td style="width:110px;"><?php echo _t("_Age"); ?></td>
       <td>
       <div class="input-prepend input-append">
                  <input type="text" class="span12 inputcolor inputsize1" name="age" value="<?php echo isset($get['age'])?$get['age']:'';?>" />


        </div>
                  <span class="help-inline"><?php echo isset($error['age'])?$error['age']:'' ?></span>
       </td>
     </tr>
	  <tr>
       <td style="width:110px;"><?php echo _t(_Cellphone); ?></td>
       <td>
       <div class="input-prepend input-append">
                    <input type="text" class="span12 inputcolor inputsize1" name="mobile" value="<?php echo isset($get['mobile'])?$get['mobile']:'';?>" />


        </div>
                  <span class="help-inline"><?php echo isset($error['mobile'])?$error['mobile']:'' ?></span>
       </td>
     </tr>


	  <tr>
       <td style="width:110px;"><?php echo _t(_Username); ?></td>
       <td>
       <div class="input-prepend input-append">
                  <input type="text" class="span12 inputcolor inputsize1" name="username" value="<?php echo isset($get['username'])?$lib_seurty->tities($get['username']):'';?>" />
<?php echo isset($error['username'])?$error['username']:'' ?>

        </div>
                  <span class="help-inline"><?php echo isset($error['username'])?$error['username']:'' ?></span>
       </td>
     </tr>
	   <tr>
       <td style="width:110px;"> <?php echo _t(_Email); ?></td>
       <td>
       <div class="input-prepend input-append">
                   <input type="text" class="span12 inputcolor inputsize1" name="email" value="<?php echo isset($get['email'])?$lib_seurty->tities($get['email']):'';?>" />


        </div>
                  <span class="help-inline"><?php echo isset($error['email'])?$error['email']:'' ?></span>
       </td>
     </tr>
	   <tr>
       <td style="width:110px;"><?php echo _t(_Password); ?></td>
       <td>
       <div class="input-prepend input-append">
                <input type="password" class="span12 inputcolor inputsize1" name="password" value="" />


        </div>
                  <span class="help-inline"><?php echo isset($error['password'])?$error['password']:'' ?></span>
       </td>
     </tr>
	   <tr>
       <td style="width:110px;"><?php echo _t(_Resetpassword); ?></td>
       <td>
       <div class="input-prepend input-append">
                    <input type="password" class="span12 inputcolor inputsize1" name="rpassword" value="" />


        </div>
                  <span class="help-inline">  <?php echo isset($error['rpassword'])?$error['rpassword']:'' ?></span>
       </td>
     </tr>
	       <tr>
         <td style="width:110px;" valign="top"><?php echo _t(_HumanVerification);?></td>
       <td>
            <div class="input-prepend input-append">
                 <input class="span2 inputcolor inputsize1 right" name="captcha" type="text" />

                 <span class="right"><img src="<?php echo $path['public'] ?>php/captcha.php" alt="" /> </span>
        </div>
                  <span class="help-inline"><?php echo isset($error['captcha'])?$error['captcha']:''; ?> </span>
       </td>
     </tr>
    <tr>
		<td colspan="2">
			  <p>
				<input type="checkbox" name="using" value="1" />
				<label><?php echo _t(_IagreetotheSiteUsageAgreement); ?>(<a href="<?php echo $path['urlsite'];?>pages/index/id/6"><?php echo _t(_Viewtheusageagreement);?></a>)</label>
				<?php echo isset($error['using'])?$error['using']:'' ?>
			  </p>
			  <p>
				<input type="checkbox" name="lastnews" value="1" />
				<label><?php echo _t(_Registerforthelatestnews); ?></label>
				<?php echo isset($error['lastnews'])?$error['lastnews']:'' ?>
				  </p>
		</td>


	</tr>
     <tr><td colspan="2">
          <input type="submit" class="btn btn-primary left"  value="<?php echo _t("تسجيل"); ?>" />

     </td></tr>
   </table>
     <div class="" style="text-align:center">

    <h5 class="title" style="font-size:13px;"><?php echo _t(_OryoucanloginthroughyourFacebookaccount);?></h5>
    <a href="#"> <img  src="<?php echo $path["template"]; ?>images/loginf.jpg" style="" />  </a>
</div>

 <br clear="all">
    <input type="hidden" name="insert" value="1" />
  <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />





 </div>
 <div class="left span6" style="text-align:center;">
 
 <img src="<?php echo $path["template"]; ?>images/logo.png"  style="" />
 <br />
 <img src="<?php echo $path["template"]; ?>images/register.png" style="" />
</div>
 </form>
<br clear="all">
</div>



 
 
 