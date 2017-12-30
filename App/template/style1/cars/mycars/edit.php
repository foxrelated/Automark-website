


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
                      <option <?php echo $lib_func->selected($data_user['type_c'],$rowstype['id_t']); ?>value="<?php echo $rowstype['id_t']; ?>"><?php echo $rowstype['name_t']; ?></option>
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
                     <?php foreach($_typecar->getTypeSubId($data_user['type_c']) as $rowsmodel ): ?>
                      <option <?php echo $lib_func->selected($data_user['model_c'],$rowsmodel['id_t']); ?> value="<?php echo $rowsmodel['id_t']; ?>"><?php echo $rowsmodel['name_t']; ?></option>
                 <?php endforeach; ?>
             </select>
             <?php echo isset($error['model'])?$error['model']:''; ?>
       </td>
     </tr>
        <tr>
       <td><?php echo _t(_Manufacturingyear);?></td>
        <td>
             <select class="span12 inputsize inputcolor" name="years" data-placeholder="<?php echo _t(_Choose._Manufacturingyear) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                <?php $y=date("Y")+1; for($x=1970 ; $x<=$y ;$x++){
                  	$selc= ($lib_func->selected($x,$data_user['year_c']));
                     echo "<option $selc value='".$x."'>".$x."</option>";
                }  ?>
             </select>
             <?php echo isset($error['years'])?$error['years']:''; ?>
       </td>
     </tr>
        <tr>
       <td><?php echo _t(_Color);?></td>
       <td>
            <select class="span12 inputsize inputcolor" name="color" data-placeholder="<?php echo _t(_Choose._Color) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose._Color) ?></option>
                 <?php foreach($lib_func->jsonArray($_option->getCode('color','option_o')) as $rowscolor): ?>
                <option <?php echo $lib_func->selected($data_user['color_c'],$rowscolor); ?>  value="<?php echo $rowscolor;?>"><?php echo $rowscolor;?></option>
               <?php endforeach; ?>

             </select>
             <?php echo isset($error['color'])?$error['color']:''; ?>
       </td>
     </tr>
        <tr>
       <td><?php echo _t(_Thetraveleddistance);?></td>
       <td>
             <input type="text" name="odometer" value="<?php echo $data_user['odometer_c']; ?>" class="span7 inputcolor inputsize1" /> <span class="add-on"><?php echo _t('كم') ?></span>
                 <span class="help-inline"><?php echo isset($error['odometer'])?$error['odometer']:''; ?> </span>
       </td>
     </tr>
        <tr>
       <td><?php echo _t(_Motionvector);?></td>
       <td>
              <select class="span12 inputsize inputcolor" name="transmission" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                 <?php foreach($lib_func->jsonArray($_option->getCode('transmission','option_o')) as $rowstransmission): ?>
                <option <?php echo $lib_func->selected($data_user['transmission_c'],$rowstransmission); ?>  value="<?php echo $rowstransmission;?>"><?php echo $rowstransmission;?></option>
               <?php endforeach; ?>
             </select>
              <span class="help-inline"><?php echo isset($error['transmission'])?$error['transmission']:''; ?> </span>
       </td>
     </tr>
         <tr>
       <td><?php echo _t(_Carcondition);?></td>
       <td>
             <select class="span12  inputsize inputcolor" name="status" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                 <?php foreach($lib_func->jsonArray($_option->getCode('status','option_o')) as $rowsstatus): ?>
                <option <?php echo $lib_func->selected($data_user['status_c'],$rowsstatus); ?>   value="<?php echo $rowsstatus;?>"><?php echo $rowsstatus;?></option>
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
                <option  <?php echo $lib_func->selected($data_user['body_c'],$rowsbody); ?>  value="<?php echo $rowsbody;?>"><?php echo $rowsbody;?></option>
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
                <option  <?php echo $lib_func->selected($data_user['form_c'],$rowsform); ?>  value="<?php echo $rowsform;?>"><?php echo $rowsform;?></option>
               <?php endforeach; ?>

             </select>
              <span class="help-inline"><?php echo isset($error['form'])?$error['form']:''; ?> </span>
       </td>
     </tr>
         <tr>
       <td><?php echo _t(_Price);?></td>
       <td>
            <div class="input-prepend input-append">
                    <span class="add-on"><?=_Real?></span><input class="span7 inputcolor inputsize1" value="<?php echo $data_user['price_c'];?>" name="price" type="text" /><span class="add-on">.00</span>
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
                <option <?php echo $lib_func->selected($data_user['Country_c'],$rowscity['id_c']); ?>  value="<?php echo $rowscity['id_c']; ?>"><?php echo $rowscity['name_c']; ?></option>
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
                	<?php foreach($_city->getCityId($data_user['Country_c']) as $rowsc ): ?>
                <option <?php echo ($lib_func->selected($data_user['city_c'],$rowsc['id_c']));?> value="<?php echo $rowsc['id_c']; ?>"><?php echo $rowsc['name_c']; ?></option>
             <?php endforeach; ?>
             </select>
              <span class="help-inline"><?php echo isset($error['city'])?$error['city']:''; ?> </span>
        </td>
     </tr>
   </table>

 </div>
 <div class="left span6">

  <h3 class="title"><?php echo _t(_AdvertisingType);?></h3>
   <select  class="span12 inputsize inputcolor"  name="type" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                <option <?php echo ($lib_func->selected($data_user['type_ads_c'],1));?> value="1"><?=_Sale?></option>
                <option <?php echo ($lib_func->selected($data_user['type_ads_c'],2));?> value="2"><?=_Buy?></option>

             </select>
       <br clear="all" />
       <h3 class="title"><?php echo _t(_Additionalspecifications);?></h3>
                 <textarea name="des" class="span12 inputcolor" style="height:100px;"><?php echo $data_user['description_c']; ?></textarea>
       <br clear="all" />
 <h3 class="title"><?php echo _t(_Featuresofthecar);?></h3>
 <div class="span12 border-b">
     <div class="special">
        <?php foreach($lib_func->jsonArray($_option->getCode('special','option_o')) as $rowsspecial): ?>
                   <div class="span3 right paddadd title" style="font-size:15px;">
                      <label class="checkbox">
                         <input type="checkbox" <?php echo ($lib_func->checkArray($rowsspecial,$lib_func->jsonArray($data_user['special_c'])));?>  name="special[]" value="<?php echo $rowsspecial; ?>"><?php echo $rowsspecial;?>
                      </label>
                      </div>
                    <?php endforeach; ?>

                  <br clear="all">
                         <span class="help-inline"><?php echo isset($error['special'])?$error['special']:''; ?> </span>
     </div>
 </div>

    <div class="control-group">
              <label class="control-label title"><?php echo _t(_Addimage) ?></label>
              <div class="controls">

						<input type="file" onchange="return UploatImages('images','.loadUpload','.imgUpload','imagemsh[]');" name="images" id="images" />
						<button style="display:none;" type="submit" id="btn"><?=_Uploadaphoto?></button>
						<div class="imgUpload"><span class="loadUpload"></span>
                        	<?php
                            $imgs=$lib_func->jsonArray($data_user['images_c']);
                                 if(count($imgs)){ foreach($lib_func->jsonArray($data_user['images_c']) as $rowsImages){?>
										<a onclick='return imagesdlet(this);' href='#'>
										<img  align='right' src='<?php echo $path['upload']; ?>thumb/thumb_<?php echo $rowsImages; ?>' />
										<input type='hidden' name='imagemsh[]' value='<?php echo $rowsImages; ?>' /></a>

							<?php }} ?>

                        </div>
              </div>
           </div>
               <span class="help-inline"><?php echo isset($error['imagemsh'])?$error['imagemsh']:''; ?> </span>
            <br clear="all">

         <input type="submit" value="<?php echo _t('تعديل') ?>" class="btn btn-primary left" />
         <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
         <input type="hidden" name="edit" value='1' />




 </div>



<br clear="all">
</div>

 </form>
