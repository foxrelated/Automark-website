 <?php echo (isset($error['msg']))?$error['msg']:'' ; ?>



  <h3  class="title btn-primary"><?=_Editpersonaldata?></h3>
<div class="border-block inputh" >





 <form action="" method="post">


 <div class="right span4">

           <table cellpadding="4" cellspacing="4" style="border-size: 0px ;font-size:15px;" class="title span12">


         <tr>
       <td style="width:110px;"><?php echo _t(_FirstName); ?></td>
       <td>
            <div class="input-prepend input-append">
             <input type="text" class="span12 inputcolor inputsize1" name="firstname" value="<?php echo $_user['name_u'];?>" />



        </div>
                  <span class="help-inline"><?php echo isset($error['firstname'])?$error['firstname']:'' ?></span>
       </td>
     </tr>

     <tr>
       <td style="width:110px;"><?php echo _t(_Lastname); ?></td>
       <td>
       <div class="input-prepend input-append">
                    <input type="text" class="span12 inputcolor inputsize1" name="lastname" value="<?php echo $_user['lastname_u'];?>" />


        </div>
                  <span class="help-inline"><?php echo isset($error['lastname'])?$error['lastname']:'' ?></span>
       </td>
     </tr>
	  <tr>
       <td style="width:110px;"><?php echo _t(_Age); ?></td>
       <td>
       <div class="input-prepend input-append">
                  <input type="text" class="span12 inputcolor inputsize1" name="age" value="<?php echo $_user['age_u'];?>" />


        </div>
                  <span class="help-inline"><?php echo isset($error['age'])?$error['age']:'' ?></span>
       </td>
     </tr>
	  <tr>
       <td style="width:110px;"><?php echo _t(_Cellphone); ?></td>
       <td>
       <div class="input-prepend input-append">
                    <input type="text" class="span12 inputcolor inputsize1" name="mobile" value="<?php echo $_user['mobile_u'];?>" />


        </div>
                  <span class="help-inline"><?php echo isset($error['mobile'])?$error['mobile']:'' ?></span>
       </td>
     </tr>

	   <tr>
       <td style="width:110px;"> <?php echo _t(_Email); ?></td>
       <td>
       <div class="input-prepend input-append">
                   <input type="text" class="span12 inputcolor inputsize1" name="email" value="<?php echo $_user['email_u'];?>" />


        </div>
                  <span class="help-inline"><?php echo isset($error['email'])?$error['email']:'' ?></span>
       </td>
     </tr>


    <tr>
		<td colspan="2">

			  <p>
				<input <?php echo $lib_func->checked($_user['lastnews_u'],1); ?> type="checkbox" name="lastnews" value="1" />
				<label><?php echo _t(_Registerforthelatestnews); ?></label>
				<?php echo isset($error['lastnews'])?$error['lastnews']:'' ?>
				  </p>
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





