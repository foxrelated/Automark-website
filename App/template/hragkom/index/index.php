




		<div class="col-sm-12">
	<div class="prods-cnt" style="margin: 0; padding: 0;">
	<div class="bgheadercars">
	   <div class="view-cnt">
			<div id="grid" class="grid"></div>
            <div id="list" class="list "></div>
            
        </div>
        <div class="category-menu">
            <ul>
                <!-- change the "cat-1", "cat-2", "cat-3" with your "Categories ID" -->
                <li class="cat-active" category="prod-cnt"><?=_All?></li>
                <li class="" category="cat-1"><?=_Latestcars?></li>
                <li class="" category="cat-3"><?=_LatestPhoneNumbers?></li>
                <li class="" category="cat-2"><?=_Latestvehicleboards?></li>
                <li class="" category="cat-4"><?=_Latesttrucks?></li>
                <li class="" category="cat-5"><?=_LatestBoats?></li>
            </ul>
        </div>
      <div class="view-cnt-next">
			<div id="prevcars" class="prevcars"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
			<div id="nextcars" class="nextcars"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
        </div>
        <div class="clear"></div>
</div>
        <!-- change the "cat-1", "cat-2", "cat-3" with your "Categories ID" -->
		<div class="showCarTypeJ">
		 <?php foreach($_carsId as $rowscars){  ?>
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

       </div>

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
	
	
