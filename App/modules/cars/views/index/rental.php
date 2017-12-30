
      <div class="searchtra">
         <div class="adssearch">
                <div class="adssearch">
          	<div class="slider04">

				<div class="slider-wrapper theme-bar">
				<div id="slidersearch" class="nivoSlider">
                   <?php  foreach($lib_func->jsonArray($_option->getCode("slider_search",'option_o')) as $rowsmed1){
                   if(isset($rowsmed1->date) and $rowsmed1->date!=""){
                            $timeAds=strtotime($rowsmed1->date);
                            $timeNow=time();
                            if($timeAds < $timeNow){
                                        continue;
                            }
                        }

                   ?>
              			<a href="<?php echo $rowsmed1->url ?>" title="<?php echo $rowsmed1->name ?>"><img src="<?php echo $rowsmed1->img; ?>" alt="<?php echo $rowsmed1->name ?>"   /></a>
                  <?php } ?>
				</div>
			</div>
		 </div>
         </div>
         </div>
	<div class="search_sortw" align="left" style="text-align:left;width:400px; float:left;">
									<form action="<?php echo $path['urlsite']?>/cars/search" style="margin: 70px 0 0 0;" class="form" method="post">

						<select id="item_sortw" class="item_sortw" style="margin:5px 0 0 37px" name="country" onchange="return changeselect(this,'city','#subcity'); " >
							<option value=""><?=_SelectCountry?></option>
                                <?php foreach($_city->getCountryAll() as $rowscity ): ?>
                <option value="<?php echo $rowscity['id_c']; ?>"><?php echo $rowscity['name_c']; ?></option>
             <?php endforeach; ?>
						</select>
                        	<select id="subcity" class="item_sortw" style="margin:7px 0 0 37px" name="city">
							<option selected="selected" value=""><?=_SelectCity?></option>

						</select>
             <select id="item_sortw" class="item_sortw" style="margin:7px 0 0 34px" name="b">
				 <option selected="selected" value=""><?=_SelectLocation?></option>
                  </select>
                            <br clear="all" />
                        <input type="submit" class="buttomnextw" name="sub" value="التالى" />
                        <input type="hidden" name="search" value="1" />
                        <input type="hidden" name="type" value="3" />
						</form>

										</div>
										</div>

             <h3 style="text-align: center;" class="title size21"><?=_Weguaranteeyouthebestpricesandoffersforcarrental?></h3>
             <hr style="width: 90%;margin:0 auto;" />


                      <div style="width: 90%;margin:0 auto;" class="marquee comptrie" id="mycrawler2">
                          <?php foreach($_shows->getAll('on',array('type'=>'rental','limit'=>17)) as $type){ ?>
                                <a class="pd5" href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $type['id_s'];?>"><img src="<?php echo $path['thumb'].'thumb_'.$type['images_s']; ?>" style="border-radius:3px; width: 73px;height:36px;"  alt="<?php echo $type['name_s'];?>"></a>
                           <?php } ?>
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


              <h3 style="text-align: center;color:red" class="title size17"><?=_InternationalcompaniesVariousoptionslargediscounts?></h3>
<br clear="both">
<h3 class="title right btn-primary"><?php echo isset($_title)?$_title:''; ?></h3>
<div class="border-block">
<ul class="slide-3rode">

<?php foreach($_carsId as $rowscars){ ?>

<li><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="s3err"><?=_Typeofcar?> :<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $_typecar->getNameId($rowscars['type_c']); ?></a></p>
<p class="s3err"><?=_Price?> : <?php echo $rowscars['price_c'] ?> <?=_Real?></p>
<p class="no333"><?=_Dateofpublication?> :<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $rowscars['dateadd_c'] ?></a></p>
</div>
</li>
 <?php } ?>

</ul>

  <br clear="all">
</div>


	<div class="clear"></div>
    <div class="list">
	<?php if($numPage['list']!=1){ ?>
			<a class="star"  href="<?php echo $path['urlsite'].'cars/index/'.$_codePage.'/'; ?>"><?=_First?></a>
			<?php } ?>
				<?php
					for($numP=1;$numPage['count'] > $numP ;$numP++){?>
					<a <?php echo($numPage['list']==$numP)?"class='active'":""; ?> href="<?php echo $path['urlsite'].'cars/index/'.$_codePage.'/next/'.$numP; ?>"><?php echo $numP; ?></a>
				<?php	} ?>
				<?php if($numPage['list'] < ($numPage['count']-1)){ ?>
			<a class="end" href="<?php echo $path['urlsite'].'cars/index/'.$_codePage.'/next/'.($numPage['count']-1); ?>"><?=_Last?></a>
					<?php } ?>
	</div>
	<div class="clear"></div>
