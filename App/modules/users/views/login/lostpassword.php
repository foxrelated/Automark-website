 <?php echo (isset($error['msg']))?$error['msg']:'' ; ?>
 <h3  class="title btn-primary"><?=_Iforgotthepassword?></h3>
<div class="border-block inputh" >
 <form action="" method="post">

 <div class="right span4">
     <div class="" style="text-align:center">
<h5 class="title"><?=_PasswordRecovery?></h5>
</div>
           <table cellpadding="4" cellspacing="4" style="border-size: 0px ;font-size:17px;" class="title span12">


         <tr>
       <td style="width:110px;"><?php echo _t(_Email); ?></td>
       <td>
            <div class="input-prepend input-append">
                   <input type="text"  class="span12 inputcolor inputsize1" name="email" value="<?php echo isset($get['email'])?$lib_seurty->tities($get['email']):'';?>" />

        </div>
                  <span class="help-inline"><?php echo isset($error['email'])?$error['email']:'' ?></span>
       </td>
     </tr>
         <tr>
         <td style="width:110px;" valign="top"><?php echo _t(_HumanVerification);?></td>
       <td>
            <div class="input-prepend input-append">
                 <input class="span2 inputcolor inputsize1" name="captcha" type="text" /><img src="<?php echo $path['public'] ?>php/captcha.php" alt="" />
        </div>
                  <span class="help-inline"><?php echo isset($error['captcha'])?$error['captcha']:''; ?> </span>
       </td>
     </tr>
     <tr><td colspan="2" style="text-align:center" >
			<input type="submit" class="btn btn-primary " style="float:none;" value="<?php echo _t("ارسال"); ?>" />

     </td></tr>
   </table>

 <br clear="all">
           <input type="hidden" name="send" value="1" />
  <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />



 </div>
 <div class="left span6" style="text-align:center;">

 <img src="<?php echo $path["template"]; ?>images/logo.png"  style="" />
 <br />
 <img src="<?php echo $path["template"]; ?>images/login.png" style="" />
</div>
 </form>
<br clear="all">
</div>




