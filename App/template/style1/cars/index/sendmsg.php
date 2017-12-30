<form action="" method="post">
 <h3  class="title btn-primary"><?php echo _t(_Sendamessage);?></h3>
   <br clear="all">
 <div class="right span8">
   <table cellpadding="4"  class="span12 table-hover table table-striped" cellspacing="4" style="border-size: 0px ;font-size:15px;" class="title">

    <tr>
       <td  class="span2"><?php echo _t(_Thename);?></td>
       <td  class="span7">
             <input type="text" name="odometer" class="span12 inputcolor inputsize1" />
                 <span class="help-inline"><?php echo isset($error['odometer'])?$error['odometer']:''; ?> </span>
       </td>
     </tr>
         <tr>
       <td><?php echo _t(_Email);?></td>
       <td>
             <input type="text" name="odometer" class="span12 inputcolor inputsize1" />
                 <span class="help-inline"><?php echo isset($error['odometer'])?$error['odometer']:''; ?> </span>
       </td>
     </tr>
        <tr>
       <td><?php echo _t(_Address);?></td>
       <td>
             <input type="text" name="odometer" class="span12 inputcolor inputsize1" />
                 <span class="help-inline"><?php echo isset($error['odometer'])?$error['odometer']:''; ?> </span>
       </td>
     </tr>
        <tr>
       <td><?php echo _t(_Content);?></td>
       <td>
              <textarea name="des" class="span12 inputcolor" style="height:100px;"></textarea>
                 <span class="help-inline"><?php echo isset($error['odometer'])?$error['odometer']:''; ?> </span>
       </td>
     </tr>
   </table>
   <br clear="all">
                <span class="help-inline"><?php echo isset($error['imagemsh'])?$error['imagemsh']:''; ?> </span>
            <br clear="all">

         <input type="submit" value="<?php echo _t('ارسال') ?>" class="btn btn-primary left" />
         <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
         <input type="hidden" name="add" value='1' />


 </div>




<br clear="all">


 </form>
