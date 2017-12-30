
<div class="border-c">
<div class="border-block">

 <div class="right span3" >
 <h3 class="title-color"><?=_Thedetails?></h3>
   <table cellpadding="7" cellspacing="4" style="border-size: 0px;	font-family: GE_Flow_Regular;">
     <tr>
       <td><?=_Publicationdate?></td>
       <td><?php echo $_rows['date_a'];?></td>
     </tr>
     <tr>
       <td><?=_Productname?></td>
       <td><?php echo $_rows['name_a']; ?></td>
     </tr>
     <tr>
       <td><?=_Section?></td>
       <td><?php echo $_rows['section_a']; ?></td>
     </tr>
         <tr>
       <td><?=_Brand?></td>
       <td><?php echo $_rows['marka_a'];?></td>
     </tr>

        <tr>
       <td><?=_Color?></td>
       <td><?php echo $_rows['color_a'];?></td>
     </tr>

     <tr>
       <td><?=_Price?></td>
       <td><?php echo $_rows['price_a'];?> ريال </td>
     </tr>
         <tr>
       <td><?=_Country?></td>
       <td><?php echo $_city->getNameId($_rows['country_a']);?> </td>
     </tr>
     <tr>
       <td><?=_City?></td>
       <td><?php echo  $_city->getNameId($_rows['city_a']);?> </td>
     </tr>

    <tr>
       <td><?=_Cellphone?></td>
       <td> <?php echo $lib_func->jsonId($_rows['option_a'],'mobile'); ?> </td>
     </tr>


   </table>
    <div class="mod">
     <a onclick="javascript:bookmarksite( '<?php echo $_rows['name_a'];?>','<?php echo $path['urlsite']."cars/index/id/".$_rows['id_a']; ?>');"><img src="<?php echo $path['template'];?>images/dd_05.png"  /></a>

      <a href="<?php echo $path['urlsite']."cars/index/sendmsg/".$_rows['id_a']; ?>" class="iframe"><img src="<?php echo $path['template'];?>images/dd_07.png"  />  </a>

      <a href="<?php echo $path['urlsite']."cars/index/friend/".$_rows['id_a']; ?>" class="iframe"><img src="<?php echo $path['template'];?>images/dd_03.png"  />  </a>
   </div>
<br clear="all">

   <h4 class="" style="text-align:center;"><?=_Pleasesaythatyousawhiminapledge?></h4>
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

          <?php $xx=0; foreach($lib_func->jsonArray($_rows['images_a']) as $rowsimg){?>
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
	<div class="text"> <?php  foreach($lib_func->jsonArray($_rows['special_a']) as $rowspe){?>
          <?php echo $rowspe;?> -
           <?php  } ?><?php //echo $_carsId['description_c'] ?></div>
	</div>


 </div>
 


<div style="text-align:center">
 <a href="<?php echo $_adscars->url; ?>"><img src="<?php echo $_adscars->img; ?>" alt="<?php echo $_adscars->name; ?>" style="" /></a>
</div>
<br  />
<div class="border-head"><i class="icon-caret-left"></i><?=_Recentlyaddedcars?> </div>

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
</div>
</div>

