
<div class="border-c">
<div class="border-block">

 <div class="right span3" >
 <h3 class="title-color"><?=_Thedetails?></h3>
   <table cellpadding="7" cellspacing="4" style="border-size: 0px;	font-family: GE_Flow_Regular;">
    <tr>
    <td><?=_TrafficCounters?></td>
    <td><?php echo $_carsId['vzt_c'];?></td>
   </tr>
     <tr>
       <td><?=_Publicationdate?></td>
       <td><?php echo $_carsId['dateadd_c'];?></td>
     </tr>
     <tr>
       <td><?=_Typeofcar?></td>
       <td><?php echo $_typecar->getNameId($_carsId['type_c']); ?></td>
     </tr>
         <tr>
       <td><?=_Model?></td>
       <td><?php echo $_typecar->getNameId($_carsId['model_c']); ?></td>
     </tr>
        <tr>
       <td><?=_Manufacturingyear?></td>
       <td><?php echo $_carsId['year_c'];?></td>
     </tr>
        <tr>
       <td><?=_Color?></td>
       <td><?php echo $_carsId['color_c'];?></td>
     </tr>
        <tr>
       <td><?=_Thetraveleddistance?></td>
       <td><?php echo $_carsId['odometer_c'];?> كم</td>
     </tr>
        <tr>
       <td><?=_Motionvector?></td>
       <td><?php echo $_carsId['transmission_c'];?> </td>
     </tr>
         <tr>
       <td><?=_Status?></td>
       <td><?php echo $_carsId['status_c'];?> </td>
     </tr>
         <tr>
       <td><?=_Externalbody?></td>
       <td><?php echo $_carsId['body_c'];?> </td>
     </tr>
         <tr>
       <td><?=_Theform?></td>
       <td><?php echo $_carsId['form_c'];?> </td>
     </tr>
         <tr>
       <td><?=_Price?></td>
       <td><?php echo $_carsId['price_c'];?> ريال </td>
     </tr>
         <tr>
       <td><?=_Country?></td>
       <td><?php echo $_city->getNameId($_carsId['Country_c']);?> </td>
     </tr>
     <tr>
       <td><?=_City?></td>
       <td><?php echo  $_city->getNameId($_carsId['city_c']);?> </td>
     </tr>
      <tr>
       <td><?=_Advertisermobilenumber?></td>
       <td><?php echo  $_carsId['mobile_u'];?> </td>
     </tr>
     <!--<tr>
        <td colspan="2">
           <h3 class="title-color">المميزات الاضافية</h3>
        <?php echo  $_carsId['description_c'];?>

        </td>
     </tr> -->
   </table>
   <h4 class="" style="text-align:center;"><?=_Pleasesaythatyousawhiminapledge?></h4>
    <div class="mod">
      <a href="<?php echo $path['urlsite']."cars/index/sendmsg/".$_carsId['id_c']; ?>" class="iframe"><img src="<?php echo $path['template'];?>images/dd_07.png"  />  </a>

      <a href="<?php echo $path['urlsite']."cars/index/friend/".$_carsId['id_c']; ?>" class="iframe"><img src="<?php echo $path['template'];?>images/dd_03.png"  />  </a>
   </div>


 </div>
 <div class="left span7">

 <div class="left span8" >
   <div id="gallery" class="ad-gallery">
      <div class="ad-image-wrapper">
      </div>
      <div class="ad-controls">
      </div>
      <div class="ad-nav">
        <div class="ad-thumbs">
          <ul class="ad-thumb-list">

          <?php $xx=0; foreach($lib_func->jsonArray($_carsId['images_c']) as $rowsimg){?>
            <li>
              <a href="<?php echo $path['upload'].$rowsimg;?>">
                <img src="<?php echo $path['thumb'].'thumb_'.$rowsimg; ?>" title="" alt=""  class="image<?php echo $xx;?>">
              </a>
            </li>
           <?php $xx++; } ?>
          </ul>
        </div>
      </div>
    </div>

    </div>

	<div class="preciall">
	<div class="text"> <?php  foreach($lib_func->jsonArray($_carsId['special_c']) as $rowspe){?>
          <?php echo $rowspe;?> -
           <?php  } ?>

            <h3 class="title-color"><?=_Additionalfeatures?></h3>
            <?php echo ($_carsId['description_c']!='')?'<hr />'. $_carsId['description_c']:'';?>  </div>
	</div>


 </div>


 <br clear="all"  />
<div style="text-align:right;">
        <h3 class="title-color"><?=_Driverdata?></h3>
         <form action="" style="margin:0;padding:0;" method="post">
      <table cellpadding="4" cellspacing="4" style="border-size: 0px ;float:right;" class="title span5">


         <tr>
       <td style="width:160px;"><?php echo _t(_FirstName);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1"  value="<?php echo isset($get['name'])?$lib_seurty->tities($get['name']):'';?>" name="name" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['name'])?$error['name']:''; ?> </span>
       </td>
     </tr>
         <tr>
       <td ><?php echo _t(_Lastname);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1"  value="<?php echo isset($get['lastname'])?$lib_seurty->tities($get['lastname']):'';?>" name="lastname" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['lastname'])?$error['lastname']:''; ?> </span>
       </td>
     </tr>
            <tr>
       <td ><?php echo _t(_Age);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1"  value="<?php echo isset($get['age'])?$lib_seurty->tities($get['age']):'';?>" name="age" type="number" title="<?=_Pleasewritetheage?>" />
        </div>
                  <span class="help-inline"><?php echo isset($error['age'])?$error['age']:''; ?> </span>
       </td>
     </tr>
           <tr>
       <td ><?php echo _t(_Email);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="email"  value="<?php echo isset($get['email'])?$lib_seurty->tities($get['email']):'';?>" title="<?=_Typeyouremailcorrectly?>" type="email" />
        </div>
                  <span class="help-inline"><?php echo isset($error['email'])?$error['email']:''; ?> </span>
       </td>
     </tr>
          <tr>
       <td ><?php echo _t(_Verifyyouremail);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="remail"  value="<?php echo isset($get['remail'])?$lib_seurty->tities($get['remail']):'';?>" title="<?=_Typeyouremailcorrectly?>"   type="email" />
        </div>
                  <span class="help-inline"><?php echo isset($error['remail'])?$error['remail']:''; ?> </span>
       </td>
     </tr>
           <tr>
       <td><?php echo _t(_Cellphone);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="mobile" value="<?php echo isset($get['mobile'])?$lib_seurty->tities($get['mobile']):'';?>" type="tel" />
        </div>
                  <span class="help-inline"><?php echo isset($error['mobile'])?$error['mobile']:''; ?> </span>
       </td>
     </tr>
          <tr>
       <td><?php echo _t(_Placeofdelivery);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span12 inputcolor inputsize1" name="mkan" value="<?php echo isset($get['mkan'])?$lib_seurty->tities($get['mkan']):'';?>" type="text" />
        </div>
                  <span class="help-inline"><?php echo isset($error['mkan'])?$error['mkan']:''; ?> </span>
       </td>
     </tr>
            <tr>
       <td><?php echo _t(_Receiveddate);?></td>
       <td>
            <div class="input-prepend input-append">
                    <input class="span4 inputcolor inputsize1 right" name="datestart[date]" value="<?php echo isset($get['datestart'])?$lib_seurty->tities($get['datestart']):'';?>" type="date" />
                    <label class="right" style="margin:0 10px;"> <?=_Timing?></label>
                      <input class="span3 inputcolor inputsize1 right" name="datestart[time]" value="<?php echo isset($get['datestart'])?$lib_seurty->tities($get['datestart']):'';?>"  type="time" />
        </div>
                  <span class="help-inline"><?php echo isset($error['datestart'])?$error['datestart']:''; ?> </span>
       </td>
     </tr>
              <tr>
       <td><?php echo _t(_Deliverydate);?></td>
       <td>
            <div class="input-prepend input-append">
                 <input class="span4 inputcolor inputsize1 right" name="dateend[date]" value="<?php echo isset($get['dateend'])?$lib_seurty->tities($get['dateend']):'';?>" type="date" />
                 <label class="right" style="margin:0 10px;"> <?=_Timing?></label>
                 <input class="span3 inputcolor inputsize1 right" name="dateend[time]" value="<?php echo isset($get['dateend'])?$lib_seurty->tities($get['dateend']):'';?>"  type="time" />
          </div>
                  <span class="help-inline"><?php echo isset($error['dateend'])?$error['dateend']:''; ?> </span>
       </td>
     </tr>
         <tr><td colspan="2">
          <input type="checkbox" value="1" name="retur" />
          <?=_Returnthevehicletothesameplace?>
     </td></tr>
       <tr><td colspan="2">
          <input type="checkbox" value="1" name="ageup" />
          <?=_Thedriverisbetween20and60yearsold?>  
     </td></tr>
          <tr>

         <td valign="top"><?php echo _t(_HumanVerification);?></td>
       <td>
            <div class="input-prepend input-append">
                 <input class="span2 inputcolor inputsize1" name="captcha" type="text" /><img src="<?php echo $path['public'] ?>php/captcha.php" alt="" />

       <input type="submit" value="<?php echo _t("احجز") ?>" class="btn btn-primary left" style="float:left;" />
       </div>
                  <span class="help-inline"><?php echo isset($error['captcha'])?$error['captcha']:''; ?> </span>


       </td>
     </tr>

   </table>
          <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
         <input type="hidden" name="send" value='1' />
   </form>
 </div>
<br clear="all"  />
<div class="border-head"><i class="icon-caret-left"></i><?=_Recentlyaddedcars?></div>

<div class="border-block">

<ul class="slide-3rode">

<?php foreach($_cars->getlimit('',5,'desc','','on') as $rowscars){ ?>

<li><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="s3err"><?=_Price?> : <?php echo $rowscars['price_c'] ?> <?=_Real?></p>
<p class="no333"><?=_Model?> :<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $_typecar->getNameId($rowscars['type_c']); ?></a></p>
<p class="no333"><?=_Dateofpublication?> :<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $rowscars['dateadd_c'] ?></a></p>
</div>
</li>
 <?php } ?>

</ul>
</div>
</div>
</div>
 <br clear="all" />

<div class="border-c">
<div class="border-block">
<div class="video">
<?php echo $lib_func->jsonId($_option->getCode('vedioindex','option_o'),0); ?>
</div>
<div class="news">
     <div style="text-align:center">
            <a href="<?php echo $_adsvedio->url; ?>"><img width="722" height="227" src="<?php echo $_adsvedio->img; ?>" alt="<?php echo $_adsvedio->name; ?>" style="" /></a>

    </div>
</div>
   <br clear="all" />
</div></div>