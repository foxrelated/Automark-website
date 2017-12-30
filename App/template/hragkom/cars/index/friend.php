<form action="" method="post">
 <h3  class=""><?php echo _t(_Sendtoafriend);?></h3>
   <br clear="all">
 <div class="">
   <table cellpadding="4"  class="table" >
          <tr>
       <td  class="col-lg-2"><?php echo _t(_Yourfriendsname);?></td>
       <td  class="col-lg-7">
             <input type="text" name="fname" class="form-control" />
                 <span class="help-inline"><?php echo isset($error['fname'])?$error['fname']:''; ?> </span>
       </td>
     </tr>
    <tr>
       <td  class="col-lg-2"><?php echo _t(_Yourfriendsemail);?></td>
       <td  class="col-lg-7">
             <input type="text" name="femail" class="form-control" />
                 <span class="help-inline"><?php echo isset($error['femail'])?$error['femail']:''; ?> </span>
       </td>
     </tr>
       <tr>
       <td><?php echo _t(_YourName);?></td>
       <td>
             <input type="text" name="name" class="form-control" />
                 <span class="help-inline"><?php echo isset($error['name'])?$error['name']:''; ?> </span>
       </td>
     </tr>
         <tr>
       <td><?php echo _t(_YourEmail);?></td>
       <td>
             <input type="text" name="email" class="form-control" />
                 <span class="help-inline"><?php echo isset($error['email'])?$error['email']:''; ?> </span>
       </td>
     </tr>
        <tr>
       <td><?php echo _t(_Address);?></td>
       <td>
             <input type="text" name="title" value="<?php echo _t(_MessagefromaFriendYourName); ?>" class="form-control" />
                 <span class="help-inline"><?php echo isset($error['title'])?$error['title']:''; ?> </span>
       </td>
     </tr>
        <tr>
       <td><?php echo _t(_Content);?></td>
       <td>
              <textarea name="subject" class="form-control" style="height:100px;"><?php echo _t(_Welcomeyou[yourfriendsname]." <br />"._Isentyou[yourname]." <br> "._Linkadfromwebsite.system::_data("title_site")._Onthefollowinglink);?><br><a href='<?php echo $path['urlsite'];?>cars/index/id/<?php echo $_id;?>'><?php echo _t(_Thefollowinglink);?></a></textarea>
                 <span class="help-inline"><?php echo isset($error['subject'])?$error['subject']:''; ?> </span>
       </td>
     </tr>
       <tr>
         <td style="width:110px;" valign="top"><?php echo _t(_HumanVerification);?></td>
       <td>
          <div class="input-group">
                      <input class="form-control" name="captcha" type="text" />
						 <span class="input-group-addon" style="padding:0px 10px;"><img src="<?php echo $path['public'] ?>php/captcha.php" alt="" /> </span>
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
