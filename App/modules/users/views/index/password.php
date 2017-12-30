 <?php echo (isset($error['msg']))?$error['msg']:'' ; ?>



  <h3  class="title btn-primary"><?=_Editpersonaldata?></h3>
<div class="border-block inputh" >





 <form action="" method="post">


 <div class="right span4">

           <table cellpadding="4" cellspacing="4" style="border-size: 0px ;font-size:15px;" class="title span12">


        <tr>
       <td style="width:110px;"><?php echo _t(_CurrentPassword); ?></td>
       <td>
       <div class="input-prepend input-append">
                <input type="password" class="span12 inputcolor inputsize1" name="oldpassword" value="" />


        </div>
                  <span class="help-inline"><?php echo isset($error['oldpassword'])?$error['oldpassword']:'' ?></span>
       </td>
	   <tr>
       </tr>
       <td style="width:110px;"><?php echo _t(_Newpassword); ?></td>
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




     <tr><td colspan="2">
          <input type="submit" class="btn btn-primary left"  value="<?php echo _t("تعديل"); ?>" />

     </td></tr>
   </table>

 <br clear="all">
    <input type="hidden" name="edit" value="1" />
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





