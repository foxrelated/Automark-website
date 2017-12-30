
<div class=" col-sm-9">


		<div class="weight-cars">
			<div class="rows">
				<div class="col-sm-6" style="text-align:center">
					<h3 class="add-cars add-special-car col-sm-7"><a  href="<?php echo $path['urlsite'] ?>cars/mycars/add"><?php echo _t(_AddFeaturedAd);?></a></h3>
				</div>
				<div class="col-sm-6">
					<h3 class="add-cars add-gold-car col-sm-7"><a href="<?php echo $path['urlsite'] ?>cars/mycars/add"><?php echo _t(_Addagoldad);?></a></h3>
				</div>
			</div>
			<div class="clear"></div>
		</div>
</div>

<div class=" col-sm-9">


		<div class="weight-cars">
			<div class="rows">
				<div class="col-sm-6" style="text-align:center">
					<h3 class="add-cars add-free-car col-sm-7"><a  href="<?php echo $path['urlsite'] ?>cars/mycars/add"><?php echo _t(_Startsellingforfree);?></a></h3>
				</div>
				<div class="col-sm-6">
					<ul class="add-cars add-menu-list-car col-sm-7">
						<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo _t(_SellList);?><i class="fa fa-angle-down size10 pull-right"></i></a>

							<ul class="dropdown-menu">
<?php foreach($db_category->getAll() as $rowsCategory){?>

		<li><a href="<?php echo $path['urlsite'] ?>cars/cate/<?php echo $rowsCategory['id_ss'];?>"><?php echo language::getLang($rowsCategory['code_ss']);?></a></li>
								
<?php } ?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
</div>


<div class=" col-sm-9">


		<div class="weight-cars">
			<div class=" height-title-cars">
				<h3 class=""><?php echo _t(_FeaturedAds);?></h3>
			</div>

			<div class=" col-sm-12">

			<div class="list_carousel">
				<ul id="carstopspecial" class="thumbnails  col-sm-12">
                     <?php foreach($_cars->getlimit('features',5,'desc','','on','vzt') as $rowscars){ ?>
                       <li>
                        <a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="170" height="173" class="thumbnail" alt=""></a>
						<div class="list-t"><?php echo _t("النوع");?>: <a href="#"><?php echo language::getLang($_typecar->getNameId($rowscars['type_c'])); ?></a></div>
						<div class="list-t"><?php echo _t("السعر");?>: <a href="#"><?php echo $rowscars['price_c'] ?>
						<?php echo _t("درهم");?></a></div>
					</li>
                     <?php } ?>
				</ul>

				<div class="clearfix"></div>
				<div class="slidesp">
					<a id="prev2" class="prev" href="#"><i class="fa fa-angle-left"></i></a>
					<a id="next2" class="next" href="#"><i class="fa fa-angle-right"></i></a>
					<div id="pager2" class="pager "></div>
				</div>
			</div>


			</div>
			<div class="clear"></div>
		</div>


		<div class="row">

				<div class="col-sm-6 ">


						<div class="weight-cars">
							<div class=" height-free-cars">
								<h3 class=""><?php echo _t(_Regularads);?></h3>
							</div>
<!-- list index cars free -->

                              <?php foreach($_cars->getlimit('bay',5,'asc','','on','vzt') as $rowscars){ ?>
                               <!-- بداية الاعلان -->
								<div class="row">
									<div class="col-sm-5 ">
										<div class="thumbnails list-free-cars ">
										   <a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="165" height="106" class="thumbnail" alt=""></a>

										</div>
									</div>
									<div class="col-sm-7  list-free-cars  ">
										<div class="list-t"><?php echo _t(_Telephonenumber);?>: <a href="#"><?php echo $rowscars['mobile_u'];?></a></div>
										<div class="list-t"><?php echo _t(_Model);?>: <a href="#"><?php echo language::getLang($_typecar->getNameId($rowscars['type_c'])); ?></a></div>
										<div class="list-t"><?php echo _t(_Dateofpublication);?>: <a href="#"><?php echo $rowscars['dateadd_c'] ?></a></div>
									</div>
									<div class="col-sm-12  list-free-cars ">
										<div class="row">
											<div class="col-sm-7">
												<div class="list-t col-sm-9   bord-blue">
													<?php echo _t(_Price);?>: <a href="#"><?php echo $rowscars['price_c'] ?></a>
												</div>
											</div>
											<div class="col-sm-5">
												<div class=" more-cars">
													<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo _t(_Thedetails);?></a>
												</div>
											</div>
										</div>
									</div>

								</div>
                            <!-- بداية الاعلان -->
                             <?php } ?>

							<div class="clear"></div>
							<div class="col-sm-12 ">
								<a class="col-sm-12  more-free-care" href="#"><?php echo _t(_More);?></a>
							</div>

							<div class="clear"></div>
						</div>
				</div>
				<div class="col-sm-6">


						<div class="weight-cars">
							<div class="add-gold-car">
								<h3 class=""><?php echo _t(_Goldenads);?></h3>
							</div>
                              <?php foreach($_cars->getlimit('features',5,'desc','','on','vzt') as $rowscars){ ?>

								<div class="row">
									<div class="col-sm-5 ">
										<div class="thumbnails list-free-cars ">
									     <a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="165" height="106" class="thumbnail" alt=""></a>
                                        </div>
									</div>
									<div class="col-sm-7  list-free-cars  ">
									    <div class="list-t"><?php echo _t(_Telephonenumber);?>: <a href="#"><?php echo $rowscars['mobile_u'];?></a></div>
										<div class="list-t"><?php echo _t(_Model);?>: <a href="#"><?php echo language::getLang($_typecar->getNameId($rowscars['type_c'])); ?></a></div>
										<div class="list-t"><?php echo _t(_Dateofpublication);?>: <a href="#"><?php echo $rowscars['dateadd_c'] ?></a></div>
							    	</div>
									<div class="col-sm-12  list-free-cars ">
										<div class="row">
											<div class="col-sm-7">
												<div class="list-t col-sm-9   bord-blue">
													<?php echo _t(_Price);?>: <a href="#"><?php echo $rowscars['price_c'] ?></a>
												</div>
											</div>
											<div class="col-sm-5">
												<div class="more-cars-id-gold">
													<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo _t(_Thedetails);?></a>
											</div>
											</div>
										</div>
									</div>

								</div>
                               <?php } ?>

							<div class="clear"></div>
						<div class="rows">
							<div class="col-sm-12">
									<a class="col-sm-12 more-cars-gold" href="#"><?php echo _t("المزيد من الاعلانات الذهبية");?></a>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
</div>

