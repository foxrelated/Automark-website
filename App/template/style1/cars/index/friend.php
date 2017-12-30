<form action="" method="post">
 <h3  class="title-gold-car btn-primary"><?php echo _t(_Sendtoafriend);?></h3>
   <br clear="all">
 <div class="right span8">
   <table cellpadding="4"  class="span12 table-hover table table-striped" cellspacing="4" style="border-size: 0px ;font-size:15px;" class="title">
          <tr>
       <td  class="span2"><?php echo _t(_Yourfriendsname);?></td>
       <td  class="span7">
             <input type="text" name="fname" class="span12 inputcolor inputsize1" />
                 <span class="help-inline"><?php echo isset($error['fname'])?$error['fname']:''; ?> </span>
       </td>
     </tr>
    <tr>
       <td  class="span2"><?php echo _t(_Yourfriendsemail);?></td>
       <td  class="span7">
             <input type="text" name="femail" class="span12 inputcolor inputsize1" />
                 <span class="help-inline"><?php echo isset($error['femail'])?$error['femail']:''; ?> </span>
       </td>
     </tr>
       <tr>
       <td><?php echo _t(_YourName);?></td>
       <td>
             <input type="text" name="name" class="span12 inputcolor inputsize1" />
                 <span class="help-inline"><?php echo isset($error['name'])?$error['name']:''; ?> </span>
       </td>
     </tr>
         <tr>
       <td><?php echo _t(_YourEmail);?></td>
       <td>
             <input type="text" name="email" class="span12 inputcolor inputsize1" />
                 <span class="help-inline"><?php echo isset($error['email'])?$error['email']:''; ?> </span>
       </td>
     </tr>
        <tr>
       <td><?php echo _t(_Address);?></td>
       <td>
             <input type="text" name="title" value="رسالة من صديق :اسمك:" class="span12 inputcolor inputsize1" />
                 <span class="help-inline"><?php echo isset($error['title'])?$error['title']:''; ?> </span>
       </td>
     </tr>
        <tr>
       <td><?php echo _t(_Content);?></td>
       <td>
              <textarea name="subject" class="span12 inputcolor" style="height:100px;"><?=_Welcomeyou[yourfriendsname]?> <br /> <?=_Isentyou[yourname]?><br> <?=_Linktotheannouncementofthesalessiteatthefollowinglink?><br><a href='<?php echo $path['urlsite'];?>cars/index/id/<?php echo $_id;?>'><?=_Thefollowinglink?></a></textarea>
                 <span class="help-inline"><?php echo isset($error['subject'])?$error['subject']:''; ?> </span>
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
   </table>
   <br clear="all">

            <br clear="all">

         <input type="submit" value="<?php echo _t('ارسال') ?>" class="btn btn-primary left" />
         <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
         <input type="hidden" name="send" value='1' />


 </div>




<br clear="all">


 </form>
