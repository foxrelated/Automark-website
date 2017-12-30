<?php foreach($_carsId as $rowscars){ ?>
        <div class="prod-cnt prod-box<?php echo($_view=='list')?'-list':'' ?> shadow cat-<?php echo $rowscars['category_c'];?>" >
            <img width="190"  src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>">
			<div class="box_title">
            <div class="buy-ico"></div>
			 <div class="dashord_box">
                <div class="tachometer_box"><i class='fa fa-tachometer' aria-hidden='true'></i> 23423</div>
                <div class="year_box"><i class="fa fa-location-arrow" aria-hidden="true"></i> 2016</div>
            </div>
            <h3>
                <a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $rowscars['title_c'];?></a>
            </h3>
            <div class="price-cnt">
               <!-- <div class="price old"><?php echo $rowscars['id_c'];?>#</div>-->
                <div class="price"><?php echo $rowscars['price_c'] ?></div>
            </div>
            <p>
				<?php echo $rowscars['description_c'];?>           
			 </p>
			</div>
        </div><!-- end product box prod-box -->
		 <?php } ?>
