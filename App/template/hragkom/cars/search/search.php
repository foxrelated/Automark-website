
 <div class=" col-sm-3">
  <div class="weight-cars">
      		<form action="<?php echo $path['urlsite']?>/cars/search" class="form" style="  " method="post">
                          <div class="bs-example-bg-classes">
            					<p class=" title"><?php echo _t(_Searchforyourcars);?></p>
            				</div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                    <select onchange="return changeselect(this,'typecar','#subtype') " class="form-control" name="model">
            							<option   selected="selected" value=""><?php echo _t(_Typeofcar);?></option>
                                          <?php foreach($_typecar->getTypeAll() as $rowstype ): ?>
                                              <option value="<?php echo $rowstype['id_t']; ?>"><?php echo $rowstype['name_t']; ?></option>
                                           <?php endforeach; ?>
            						</select>
                                </div>
                             </div>

                         <div class="form-group">
                            <div class="col-lg-12">
                                     <select  class="form-control"  id="subtype" name="submodel">
            							    <option selected="selected" value=""><?php echo _t(_Model);?></option>
                                     </select>
                                </div>
                             </div>


                         <div class="form-group">
                            <div class="col-lg-12">
                                     	<select id="item_sort" class="form-control" name="years">
                  							<option selected="selected" value=""><?php echo _t(_Manufacturingyear);?></option>
                                                 <?php $y=date("Y")+1; for($x=1970 ; $x<=$y ;$x++){
                                                       echo "<option value='".$x."'>".$x."</option>";
                                                  }  ?>
                  						</select>
                                </div>
                             </div>


                                    <div class="form-group">
                            <div class="col-lg-12">
                                      	<select id="item_sort"  class="form-control"  name="city">
                    							<option selected="selected" value=""><?php echo _t(_City);?></option>
                                                    <?php foreach($_city->getCityId(11) as $rowscity ): ?>
                                                    <option value="<?php echo $rowscity['id_c']; ?>"><?php echo $rowscity['name_c']; ?></option>
                                                 <?php endforeach; ?>
                    						</select>
                                </div>
                             </div>


					<!--  <select  class="item_sort" name="type">
							<option selected="selected" value="">الفئة</option>
							<option  value="1">بيع</option>
							<option  value="2">شراء</option>
							<option  value="3">ايجار</option>

						</select> -->

                            <input type="hidden" name="pricemax" id="pricemax" />
                            <input type="hidden" name="pricemin" id="pricemin" />
                        <div class="form-group">
                            <div class="col-lg-12">
                                        <p>
                                                  <label for="amount"><?php echo _t(_Pricebetween);?>:</label>
                                                  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;width: 186px;
">
                                        </p>
                                                <div id="slider-range"></div>
                                </div>
                            </div>

                      <div class="form-group">
<br/>
                           <input type="submit" class="btn btn-primary pull-right" style="margin: 10px;"  name="sub" value="<?php echo _t(_Search);?>" />
                      </div>
                        <input type="hidden" name="search" value="1" />
						</form>
   <div class="clear"></div> 
</div>
</div>

    

<div class=" col-sm-9">



	<div class="row">
		<div class="col-sm-12">
	<div class="prods-cnt"  style="margin: 0; padding: 0;">
	<div class="bgheadercars">
	   <div class="view-cnt">
			<div id="grid" class="grid"></div>
            <div id="list" class="list "></div>
            
        </div>
        <div class="category-menu">
            <ul>
                <!-- change the "cat-1", "cat-2", "cat-3" with your "Categories ID" -->
                <li class="cat-active" category="prod-cnt"><?=_Latestcars?></li>
              
            </ul>
        </div>
      <div class="view-cnt-next">
			<div id="prevcars" class="prevcars"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
			<div id="nextcars" class="nextcars"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
            
            
        </div>
        <div class="clear"></div>
</div>
        <!-- change the "cat-1", "cat-2", "cat-3" with your "Categories ID" -->
		 <?php foreach($search as $rowscars){ ?>
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
                <div class="price"> <?php echo $rowscars['price_c'] ?> <?=_AED?> </div>
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

			
		
		</div>
		</div>
		
</div>
    
