
<div class="search">
         <div class="adssearch">
          	<div class="slider04">

				<div class="slider-wrapper theme-bar">
				<div id="slidersearch" class="nivoSlider">
                   <?php  foreach($lib_func->jsonArray($_option->getCode("slider_search",'option_o')) as $rowsmed1){
                    if(isset($rowsmed1->date) and $rowsmed1->date!=""){
                            
                            $timeAds=strtotime($rowsmed1->date);
                            $timeNow=time();
                            if((int)$timeAds<$timeNow){
                                        continue;
                            }
                        }

                    ?>
              			<a href="<?php echo $rowsmed1->url ?>" title="<?php echo $rowsmed1->name ?>"><img src="<?php echo $rowsmed1->img; ?>" alt="<?php echo $rowsmed1->name ?>"   title=""  /></a>
                  <?php } ?>
				</div>
			</div>
		 </div>
         </div>
	<div class="search_sort" align="left" style="text-align:left;width:400px; float:left;">
									<form action="<?php echo $path['urlsite']?>/cars/search" class="form" style="margin-top: 40px;   " method="post">
                          <h3 class="title" style="text-align:center;color:#fff;text-shadow:1px 1px 0 #555;font-size:18px;">ابحث عن سياراتك</h3>
						<select onchange="return changeselect(this,'typecar','#subtype') " class="item_sort" name="model">
							<option   selected="selected" value=""><?=_Typeofcar?></option>
                              <?php foreach($_typecar->getTypeAll() as $rowstype ): ?>
                                  <option value="<?php echo $rowstype['id_t']; ?>"><?php echo $rowstype['name_t']; ?></option>
                               <?php endforeach; ?>
						</select>

						 <select  class="item_sort" id="subtype" name="submodel">
							<option selected="selected" value=""><?= _Model ?></option>

						</select>

					<!--  <select  class="item_sort" name="type">
							<option selected="selected" value="">الفئة</option>
							<option  value="1">بيع</option>
							<option  value="2">شراء</option>
							<option  value="3">ايجار</option>

						</select> -->
                        	<select id="item_sort" class="item_sort" style="margin:0px 0 5px 37px" name="years">
							<option selected="selected" value=""><?=_Manufacturingyear?></option>
                               <?php $y=date("Y")+1; for($x=1970 ; $x<=$y ;$x++){
                                     echo "<option value='".$x."'>".$x."</option>";
                                }  ?>
						</select>
                           <div class="item_sort_price">
                        <select id="item_sort" class="item_sortd" name="pricemin">
							<option selected="selected" value=""><?=_Theminimumprice?></option>

                            <option value="5000">5000</option>
                            <option value="10000">10000</option>
                            <option value="15000">15000</option>
                            <option value="20000">20000</option>
                            <option value="30000">30000</option>
                            <option value="40000">40000</option>
                            <option value="50000">50000</option>
                            <option value="50000">60000</option>
                            <option value="70000">70000</option>
                            <option value="80000">80000</option>
                            <option value="90000">90000</option>
                            <option value="100000">100000</option>
                            <option value="150000">150000</option>
                            <option value="200000">200000</option>


						</select>
                        <select id="item_sort"  class="item_sortd" name="pricemax">
							<option selected="selected" value=""><?=_Theupperlimitoftheprice?></option>
                            <option value="5000">5000</option>
                            <option value="10000">10000</option>
                            <option value="15000">15000</option>
                            <option value="20000">20000</option>
                            <option value="30000">30000</option>
                            <option value="40000">40000</option>
                            <option value="50000">50000</option>
                            <option value="50000">60000</option>
                            <option value="70000">70000</option>
                            <option value="80000">80000</option>
                            <option value="90000">90000</option>
                            <option value="100000">100000</option>
                            <option value="150000">150000</option>
                            <option value="200000">200000</option>
						</select>
                        </div>
						<select id="item_sort" class="item_sort" style="margin:0px 0 0 34px" name="city">
							<option selected="selected" value=""><?=_City?></option>
                                <?php foreach($_city->getCityId(11) as $rowscity ): ?>
                <option value="<?php echo $rowscity['id_c']; ?>"><?php echo $rowscity['name_c']; ?></option>
             <?php endforeach; ?>
						</select>

                            <br clear="all" />
                        <input type="submit" class="buttomnext" name="sub" value="التالى" />
                        <input type="hidden" name="search" value="1" />
						</form>

										</div>
</div>



<div id="SubjectTabs" class="clear">
    <ul>
       <li><a href="#fragment-1"><span><?=_Sellandbuy?></span></a></li>
        <li><a href="#fragment-2"><span><?=_Leasing?></span></a></li>
        <li><a href="#fragment-3"><span><?=_Accessories?></span></a></li>
         <li><a href="#fragment-4"><span><?=_Opposed?> </span></a></li>
         <li><a href="#fragment-5"><span>سيارات مميزة</span></a></li>
    </ul>
    <div class="tt" id="fragment-1">


<div class="border-block">
<ul class="slide-3rode">

<?php foreach($_cars->getlimit('bay',5,'desc','','on','vzt') as $rowscars){ ?>

<li><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="s3err"><?=_Typeofcar?>    :<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $_typecar->getNameId($rowscars['type_c']); ?></a></p>

<p class="s3err"><?=_Price?> : <?php echo $rowscars['price_c'] ?> <?=_Real?></p>
<p class="no333"><?=_Dateofpublication?> :<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $rowscars['dateadd_c'] ?></a></p>
</div>
</li>
 <?php } ?>

</ul>

<br clear="all">
</div>


    </div>
    <div class="tt" id="fragment-2">


<div class="border-block">
<ul class="slide-3rode">

<?php foreach($_cars->getlimit('rental',5,'desc','','on','vzt') as $rowscars){ ?>

<li><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="s3err"><?=_Typeofcar?> :<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $_typecar->getNameId($rowscars['type_c']); ?></a></p>
<p class="s3err"><?=_Price?> : <?php echo $rowscars['price_c'] ?> <?=_Real?></p>

<p class="no333"><?=_Dateofpublication?> : <a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $rowscars['dateadd_c'] ?></a></p>
</div>
</li>
 <?php } ?>

</ul>

  <br clear="all">
</div>
  </div>
    <div class="tt" id="fragment-3">
    <div class="border-block">
    <ul class="slide-3rode">

<?php foreach($_access->getAll('on',5) as $rows){ ?>

<li><a href="<?php echo $path['urlsite'] ?>access/index/id/<?php echo $rows['id_a'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rows['images_a'],0); ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="s3err"><?=_Theproduct?>:<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rows['id_a'];?>"><?php echo $rows['name_a']; ?></a></p>
<p class="s3err"><?=_Price?> : <?php echo $rows['price_a'] ?> <?=_Real?></p>
</div>
</li>
 <?php } ?>

</ul>

 </div>
 </div>
       <div class="tt" id="fragment-4">





<div class="border-block">
<ul class="slide-3rode">

<?php foreach($_shows->getlimit(5,'desc') as $rowsshows){ ?>

<li><a href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $rowsshows['id_s'];?>"><img src="<?php echo $path['upload'].$rowsshows['images_s']; ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="no333"><?=_Thenameoftheexhibition?>:<a href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $rowsshows['id_s'];?>"><?php echo $rowsshows['name_s'] ?></a></p>
</div>
</li>
 <?php } ?>

</ul>
   <br clear="all">
</div>
	<div class="clear"></div>
</div>


  <div class="tt" id="fragment-5">


<div class="border-block">

<ul class="slide-3rode">

<?php foreach($_cars->getlimit('features',5,'desc','','on','vzt') as $rowscars){ ?>

<li><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="s3err"><?=_Typeofcar?> :<?php echo $_typecar->getNameId($rowscars['type_c']); ?></p>
<p class="s3err"><?=_Price?> : <?php echo $rowscars['price_c'] ?> <?=_Real?></p>
<p class="no333"><?=_Dateofpublication?> :<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $rowscars['dateadd_c'] ?></a></p>
</div>
</li>
 <?php } ?>

</ul>

<br clear="all">
</div>

 </div>
</div>
     <script>
        $( "#SubjectTabs" ).tabs();
    </script>
  <br clear="all" />

 <div class="border-head"><i class="icon-caret-left"></i> <?=_AutoBrandInternational?></div>

<div class="border-block">

<div style="width:100%;" class="marquee" id="mycrawler2">

<?php foreach($_typecar->getTypeAll(array('limit'=>17)) as $type){ ?>

<a class="pd5" href="<?php echo $path['urlsite'] ?>cars/index/model/<?php echo $type['id_t'];?>"><img src="<?php echo $path['thumb'].'thumb_'.$type['images_t']; ?>" width="50" height="40" alt=""></a>

 <?php } ?>

</div>
</div>
<script type="text/javascript">
marqueeInit({
	uniqueid: 'mycrawler2',
	style: {
		'padding': '2px',
		'width': '100%',
		'height': '60px'
	},
	inc: 5, //speed - pixel increment for each iteration of this marquee's movement
	mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
	moveatleast: 2,
	neutral: 150,
	savedirection: true,
	random: true
});
</script>



<div class="border-head"><i class="icon-caret-left"></i><?=_Recentlyaddedcars?> </div>
<div class="border-block">
<ul class="slide-3rode">
<?php foreach($_cars->getlimit('',5,'desc','','on') as $rowscars){ ?>
<li><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],'0'); ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="s3err"><?=_Typeofcar?> :<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $_typecar->getNameId($rowscars['type_c']); ?></a></p>
<p class="s3err"><?=_Price?>: <?php echo $rowscars['price_c'] ?> <?=_Real?></p>
<p class="no333"><?=_Dateofpublication?> :<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $rowscars['dateadd_c'] ?></a></p>
</div>
</li>
 <?php } ?>



</ul>
</div>


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

