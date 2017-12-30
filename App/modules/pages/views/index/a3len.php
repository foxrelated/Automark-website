 <h3  class="title btn-primary right"><?php echo $data['name_p'] ?></h3>
<div class="border-block inputh" >

 <form action="" style="margin:0;padding:0;" method="post">
  <div class="right span5 font">
  <p > <?php echo  $data['subject_p'] ?> </p>
      <br clear="all" />
 </div>
 <div class="left span5" style="text-align:center;">

 <img src="<?php echo $path["template"]; ?>images/logo.png"  style="" />

</div>
    <br clear="all" />
 <div class="right span5">
 
 
 
  <h5 class="title"><?=_Pleasecompletethefollowingformtoenableustoserveyouassoonaspossible?></h5>
           <table cellpadding="4" cellspacing="4" style="border-size: 0px ;" class="title span12">


         <tr>
       <td style="width:110px;"><?php echo _t(_FullName);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="name" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['price'])?$error['price']:''; ?> </span>
       </td>
     </tr>

     <tr>
       <td style="width:110px;"><?php echo _t(_Functionality);?></td>
       <td>
       <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="jop" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['price'])?$error['price']:''; ?> </span>
       </td>
     </tr>
          <tr>
       <td style="width:110px;"><?php echo _t(_TheCompanysname);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="campany" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['price'])?$error['price']:''; ?> </span>
       </td>
     </tr>
           <tr>
       <td style="width:110px;"><?php echo _t(_Companyactivity);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="campnyn" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['price'])?$error['price']:''; ?> </span>
       </td>
     </tr>
           <tr>
       <td style="width:110px;"><?php echo _t(_Email);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="email" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['price'])?$error['price']:''; ?> </span>
       </td>
     </tr>
           <tr>
       <td style="width:110px;"><?php echo _t(_Cellphone);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="mobile" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['price'])?$error['price']:''; ?> </span>
       </td>
     </tr>
           <tr>
       <td style="width:110px;"><?php echo _t(_Website);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="sitename" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['price'])?$error['price']:''; ?> </span>
       </td>
     </tr>
        <tr>
         <td style="width:110px;" valign="top"><?php echo _t(_HumanVerification);?></td>
       <td>
            <div class="input-prepend input-append">
                 <input class="span2 inputcolor inputsize1 right" name="captcha" type="text" />   <span class="right"><img src="<?php echo $path['public'] ?>php/captcha.php" alt="" /> </span>
        </div>
                  <span class="help-inline"><?php echo isset($error['captcha'])?$error['captcha']:''; ?> </span>
       </td>
     </tr>
     <tr><td colspan="2">
         <input type="submit" value="<?php echo _t("ارسال") ?>" class="btn btn-primary left" />

     </td></tr>
   </table>

 <br clear="all">
         <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
         <input type="hidden" name="send" value='1' />




 </div>

 <div class="left span5" style="text-align:center;">

 <img src="<?php echo $path["template"]; ?>images/ads.png" style="" />
</div>
 </form>
<br clear="all">
</div>


