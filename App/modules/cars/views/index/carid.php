
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
       <td><?=_Dateofpublication?> </td>
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
    <!-- <tr>
        <td colspan="2">
           <h3 class="title-color">المميزات الاضافية</h3>

        </td>
     </tr>   -->
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
           <?php  } ?><?php //echo $_carsId['description_c'] ?>
           <?php echo ($_carsId['description_c']!='')?'<hr />'. $_carsId['description_c']:'';?>
           </div>
	</div>
	

 </div>
 


<div style="text-align:center">
 <a href="<?php echo $_adscars->url; ?>"><img src="<?php echo $_adscars->img; ?>" alt="<?php echo $_adscars->name; ?>" style="" /></a>
</div>
<br  />

</div>
</div>


<div class="border-head"><i class="icon-caret-left"></i><?=_Recentlyaddedcars?></div>

<div class="border-block">

<ul class="slide-3rode">

<?php foreach($_cars->getlimit('',5,'desc','','on') as $rowscars){ ?>

<li><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="s3err"><?=_Price?> : <?php echo $rowscars['price_c'] ?> <?=_Real?></p>
<p class="no333"><?=_Model?> :<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $_typecar->getNameId($rowscars['type_c']); ?></a></p>
<p class="no333"><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $rowscars['dateadd_c'] ?></a></p>
</div>
</li>
 <?php } ?>

</ul>
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