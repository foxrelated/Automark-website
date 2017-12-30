

 
 
  <h3  class="title btn-primary right"><?=_Login?> </h3>
<div class="border-block inputh" >
  <?php echo (isset($error['msg']))?'<h3 class="title">'.$error['msg'].'</h3>':'' ; ?>




 <form action="" method="post">

 <div class="right span4">
     <div class="" style="text-align:center">
<h5 class="title"><?=_Enteryourusernameandpassword?> </h5>
</div>
           <table cellpadding="4" cellspacing="4" style="border-size: 0px ;font-size:17px;" class="title span12">


         <tr>
       <td style="width:110px;"><?php echo _t(_Username); ?></td>
       <td>
            <div class="input-prepend input-append">
                   <input type="text"  class="span12 inputcolor inputsize1" name="username" value="<?php echo isset($get['username'])?$lib_seurty->tities($get['username']):'';?>" />

        </div>
                  <span class="help-inline"><?php echo isset($error['username'])?$error['username']:'' ?></span>
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
    <!--<tr>
		<td colspan="2">
			<input type="checkbox" name="remember" value="on" />
    <label><?php echo _t("تذكرني"); ?></label>
		</td>
	</tr> -->
     <tr><td colspan="2" style="text-align:center" >
			<input type="submit" class="btn btn-primary  " style="float:none;" value="<?php echo _t(_Login); ?>" />
             <h4 class="title"><a href="<?php echo $path['urlsite'];?>users/login/lostpasword"><?=_Iforgotthepassword?></a></h4>
     </td></tr>
   </table>

 <br clear="all">
           <input type="hidden" name="login" value="1" />
  <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />

<div class="" style="text-align:center">

    <h5 class="title" style="font-size:13px;"><?=_OryoucanloginthroughyourFacebookaccount?></h5>
    <a href="#"> <img  src="<?php echo $path["template"]; ?>images/loginf.jpg" style="" />  </a>
</div>

 </div>
 <div class="left span6" style="text-align:center;">

 <img src="<?php echo $path["template"]; ?>images/logo.png"  style="" />
 <br />
 <img style="width: 33%;" src="<?php echo $path["template"]; ?>images/login.png" style="" />
</div>
 </form>
<br clear="all">
</div>



 
 