
 <form action="" method="post">
 <h3  class="title btn-primary right"><?php echo _t(_Addacar);?></h3>
<div class="border-block inputh" >

 <div class="right span3">
   <table cellpadding="4" cellspacing="4" style="border-size: 0px ;font-size:15px;" class="title">
     <tr>
       <td style="width:110px;"><?php echo _t(_Typeofcar);?></td>
        <td>
            <select class="span12 inputsize inputcolor" name="modelcar" onchange="return changeselect(this,'typecar','#subtype') " data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                <?php foreach($_typecar->getTypeAll() as $rowstype ): ?>
                      <option value="<?php echo $rowstype['id_t']; ?>"><?php echo $rowstype['name_t']; ?></option>
                 <?php endforeach; ?>
             </select>
            <?php echo isset($error['modelcar'])?' <span class="help-inline badge badge-error">'.$error['modelcar'].'</span>':''; ?>

       </td>
     </tr>
         <tr>
       <td><?php echo _t(_Model);?></td>
       <td>
            <select class="span12 inputsize inputcolor"  name="model" id="subtype" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
             </select>
             <?php echo isset($error['model'])?$error['model']:''; ?>
       </td>
     </tr>
        <tr>
       <td><?php echo _t("سنة الصنع");?></td>
        <td>
             <select class="span12 inputsize inputcolor" name="years" data-placeholder="<?php echo _t(_Choose._Manufacturingyear) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                <?php $y=date("Y")+1; for($x=1970 ; $x<=$y ;$x++){
                     echo "<option value='".$x."'>".$x."</option>";
                }  ?>
             </select>
             <?php echo isset($error['years'])?$error['years']:''; ?>
       </td>
     </tr>
        <tr>
       <td><?php echo _t("اللون");?></td>
       <td>
            <select class="span12 inputsize inputcolor" name="color" data-placeholder="<?php echo _t(_Choose._Color)); ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose._Color)); ?></option>
                 <?php foreach($lib_func->jsonArray($_option->getCode('color','option_o')) as $rowscolor): ?>
                <option value="<?php echo $rowscolor;?>"><?php echo $rowscolor;?></option>
               <?php endforeach; ?>

             </select>
             <?php echo isset($error['color'])?$error['color']:''; ?>
       </td>
     </tr>
        <tr>
       <td><?php echo _t(_Thetraveleddistance);?></td>
       <td>
             <input type="text" name="odometer" class="span7 inputcolor inputsize1" /> <span class="add-on"><?php echo _t('كم') ?></span>
                 <span class="help-inline"><?php echo isset($error['odometer'])?$error['odometer']:''; ?> </span>
       </td>
     </tr>
        <tr>
       <td><?php echo _t(_Motionvector);?></td>
       <td>
              <select class="span12 inputsize inputcolor" name="transmission" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                 <?php foreach($lib_func->jsonArray($_option->getCode('transmission','option_o')) as $rowstransmission): ?>
                <option value="<?php echo $rowstransmission;?>"><?php echo $rowstransmission;?></option>
               <?php endforeach; ?>
             </select>
              <span class="help-inline"><?php echo isset($error['transmission'])?$error['transmission']:''; ?> </span>
       </td>
     </tr>
         <tr>
       <td><?php echo _t("_Carcondition");?></td>
       <td>
             <select class="span12  inputsize inputcolor" name="status" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                 <?php foreach($lib_func->jsonArray($_option->getCode('status','option_o')) as $rowsstatus): ?>
                <option value="<?php echo $rowsstatus;?>"><?php echo $rowsstatus;?></option>
               <?php endforeach; ?>

             </select>
              <span class="help-inline"><?php echo isset($error['status'])?$error['status']:''; ?> </span>
       </td>
     </tr>
         <tr>
       <td><?php echo _t(_Externalbody);?></td>
       <td>
             <select class="span12 inputsize inputcolor" name="body" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                 <?php foreach($lib_func->jsonArray($_option->getCode('body','option_o')) as $rowsbody): ?>
                <option value="<?php echo $rowsbody;?>"><?php echo $rowsbody;?></option>
               <?php endforeach; ?>

             </select>
              <span class="help-inline"><?php echo isset($error['body'])?$error['body']:''; ?> </span>
        </td>
     </tr>
         <tr>
       <td><?php echo _t(_Theform);?></td>
       <td>
            <select class="span12 inputsize inputcolor" name="form" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                 <?php foreach($lib_func->jsonArray($_option->getCode('form','option_o')) as $rowsform): ?>
                <option value="<?php echo $rowsform;?>"><?php echo $rowsform;?></option>
               <?php endforeach; ?>

             </select>
              <span class="help-inline"><?php echo isset($error['form'])?$error['form']:''; ?> </span>
       </td>
     </tr>
         <tr>
       <td><?php echo _t(_Price);?></td>
       <td>
            <div class="input-prepend input-append">
                    <span class="add-on">ريال</span><input class="span7 inputcolor inputsize1" name="price" type="text" /><span class="add-on">.00</span>
                 </div>
                  <span class="help-inline"><?php echo isset($error['price'])?$error['price']:''; ?> </span>
       </td>
     </tr>
         <tr>
       <td><?php echo _t(_Country);?></td>
       <td>
            <select class="span12 inputsize inputcolor" name="country" onchange="return changeselect(this,'city','#subcity') "  data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
             <?php foreach($_city->getCountryAll() as $rowscity ): ?>
                <option value="<?php echo $rowscity['id_c']; ?>"><?php echo $rowscity['name_c']; ?></option>
             <?php endforeach; ?>
             </select>
              <span class="help-inline"><?php echo isset($error['country'])?$error['country']:''; ?> </span>
        </td>
     </tr>
     <tr>
       <td ><?php echo _t(_City);?></td>
       <td>
            <select class="span12 inputsize inputcolor" name="city" id="subcity" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
             </select>
              <span class="help-inline"><?php echo isset($error['city'])?$error['city']:''; ?> </span>
        </td>
     </tr>
   </table>

 </div>
 <div class="left span6">


       <br clear="all" />
 <h3 class="title"><?php echo _t(_AdvertisingType);?></h3>
 <div class="span12 border-b">
     <div class="special">
        <?php foreach($lib_func->jsonArray($_option->getCode('special','option_o')) as $rowsspecial): ?>
                   <div class="span3 right paddadd title" style="font-size:15px;">
                      <label class="checkbox">
                         <input type="checkbox" name="special[]" value="<?php echo $rowsspecial; ?>"><?php echo $rowsspecial;?>
                      </label>
                      </div>
                    <?php endforeach; ?>

                  <br clear="all">
                         <span class="help-inline"><?php echo isset($error['special'])?$error['special']:''; ?> </span>
     </div>

        <h3 class="title"><?php echo _t(_Additionalspecifications);?></h3>
                 <textarea name="des" class="span12 inputcolor" style="height:100px;"></textarea>
       <br clear="all" />
 </div>

    <div class="control-group">
              <label class="control-label title"><?php echo _t(_Addimage) ?></label>
              <div class="controls">

					  	<input type="file" onchange="return UploatImages('images','.loadUpload','.imgUpload','imagemsh[]');" name="images" id="images" />
						<button style="display:none;" type="submit" id="btn"><?=_Uploadaphoto?></button>
						<div class="imgUpload"><span class="loadUpload"></span></div>
              </div>
           </div>
               <span class="help-inline"><?php echo isset($error['imagemsh'])?$error['imagemsh']:''; ?> </span>
            <br clear="all">

         <input type="submit" value="<?php echo _t('اضافة') ?>" class="btn btn-primary left" />
         <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
         <input type="hidden" name="add" value='1' />




 </div>



<br clear="all">
</div>

 </form>
