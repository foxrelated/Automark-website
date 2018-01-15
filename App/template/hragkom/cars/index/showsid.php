<div class=" col-sm-12">




	<div class="row">
		<div class="col-sm-12">
	<div class="prods-cnt">
	<div class="bgheadercars">
	   <div class="view-cnt">
			<div id="grid" class="grid"></div>
            <div id="list" class="list "></div>

        </div>
        <div class="category-menu">
            <ul>
                <!-- change the "cat-1", "cat-2", "cat-3" with your "Categories ID" -->
                <li class="cat-active" category="prod-cnt"><?php echo language::getLang($_title); ?></li>

            </ul>
        </div>
      <div class="view-cnt-next">
			<div id="prevcars" class="prevcars"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
			<div id="nextcars" class="nextcars"><i class="fa fa-angle-right" aria-hidden="true"></i></div>


        </div>
        <div class="clear"></div>
</div>

        <!-- change the "cat-1", "cat-2", "cat-3" with your "Categories ID" -->
		 <?php foreach($_carsId as $rowscars){ ?>
        <div class="prod-cnt prod-box shadow cat-<?php echo $rowscars['category_c'];?>" >

				<img width="190"  src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>">

			<div class="box_title" >
			<a style="display:block;height:100%" href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>">
            <div class="buy-ico"></div>
			 <div class="dashord_box">
                <div class="tachometer_box"><i class='fa fa-tachometer' aria-hidden='true'></i> <?php echo $rowscars['model_c'];?></div>
                <div class="year_box"><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $rowscars['year_c'];?></div>
            </div>
            <h3 >
              <span ><?php echo $rowscars['title_c'];?></span>
            </h3>
            <div class="price-cnt">
               <!-- <div class="price old"><?php echo $rowscars['id_c'];?>#</div>-->
                <div class="price"> <?php echo $rowscars['price_c'] ?> <?=_AED?></div>
            </div>
            <p>
				<?php echo $rowscars['description_c'];?>
			 </p>
			 </a>
			</div>

        </div><!-- end product box prod-box -->
		 <?php } ?>



    </div><!-- /prods-cnt -->


		<div class="clear"></div>

            <div class="row text-center">

                <ul class="pagination">

            <?php if($numPage['list']!=1){ ?>
		    <li>	<a class="star"  href="<?php echo $path['urlsite'].$_codePage.'/'; ?>">&laquo;</a></li>
			<?php } ?>
				<?php
					for($numP=1;$numPage['count'] > $numP ;$numP++){?>
				    <li <?php echo($numPage['list']==$numP)?" class='active' ":""; ?>>	<a  href="<?php echo $path['urlsite'].$_codePage.'/'.$numP; ?>"><?php echo $numP; ?></a></li>
				<?php	} ?>
				<?php if($numPage['list'] < ($numPage['count']-1)){ ?>
				<li><a class="end" href="<?php echo $path['urlsite'].$_codePage.'/'.($numPage['count']-1); ?>">&raquo;</a></li>
					<?php } ?>
				</ul>


            </div>
	<div class="clear"></div>


		</div>
		</div>


</div>




<!--
<div class=" col-sm-9">

<div class="list_cars" style="display:none;" > <ul  class="thumbnails  col-sm-12">
                     <?php foreach($_carsId as $rowscars){ ?>
                       <li class="col-sm-3">
                        <a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="170" height="173" class="thumbnail" alt=""></a>
						<div class="list-t"><?php echo _t("النوع");?>: <a href="#"><?php echo language::getLang($_typecar->getNameId($rowscars['type_c'])); ?></a></div>
						<div class="list-t"><?php echo _t("السعر");?>: <a href="#"><?php echo $rowscars['price_c'] ?><?php echo language::getLang(system::_data("default_currency"));?></a></div>
					   <div class=" more-cars"><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo _t("التفاصيل");?></a></div>
					</li>
                     <?php } ?>
				</ul>
       </div>
</div>
-->


