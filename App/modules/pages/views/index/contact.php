 <h3  class="title btn-primary right"><?php echo $data['name_p'] ?></h3>
 <form action="" style="margin:0;padding:0;" method="post">
 <div class="border-block inputh" >

 <div class="right span5">
    <p class="font"> <?php echo  $data['subject_p'] ?> </p>
      <br clear="all" />

    <h5 class="title"><?=_Filloutthefollowingformandwewillcontactyouassoonaspossible?></h5>

           <table cellpadding="4" cellspacing="4" style="border-size: 0px ;" class="title span12">


         <tr>
       <td style="width:110px;"><?php echo _t(_Thename);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1"  value="<?php echo isset($get['name'])?$lib_seurty->tities($get['name']):'';?>" name="name" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['name'])?$error['name']:''; ?> </span>
       </td>
     </tr>


           <tr>
       <td style="width:110px;"><?php echo _t(_Email);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="email"  value="<?php echo isset($get['email'])?$lib_seurty->tities($get['email']):'';?>" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['email'])?$error['email']:''; ?> </span>
       </td>
     </tr>
           <tr>
       <td style="width:110px;"><?php echo _t(_Cellphone);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="mobile" value="<?php echo isset($get['mobile'])?$lib_seurty->tities($get['mobile']):'';?>" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['mobile'])?$error['mobile']:''; ?> </span>
       </td>
     </tr>
           <tr>
       <td style="width:110px;"><?php echo _t(_Subject);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="title" value="<?php echo isset($get['title'])?$lib_seurty->tities($get['title']):'';?>" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['title'])?$error['title']:''; ?> </span>
       </td>

     </tr>
     <tr>
         <td style="width:110px;" valign="top"><?php echo _t(_Thedetails);?></td>
       <td>
            <div class="input-prepend input-append">
                 <textarea class="span12 inputcolor" name="subject" style="height:100px;"><?php echo isset($get['subject'])?$lib_seurty->tities($get['subject']):'';?></textarea>
        </div>
                  <span class="help-inline"><?php echo isset($error['subject'])?$error['subject']:''; ?> </span>
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
 
 <img src="<?php echo $path["template"]; ?>images/logo.png"  style="" />
 <br />
 <img src="<?php echo $path["template"]; ?>images/contact.png" style="" />
</div>
<br clear="all">
</div>
 </form>



