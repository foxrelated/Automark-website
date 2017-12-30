<div class=" col-sm-9">
      		<form action="<?php echo $path['urlsite']?>/cars/search" class="form" style="margin-top: 40px;   " method="post">
                          <h3 class="title" style="text-align:center;color:#fff;text-shadow:1px 1px 0 #555;font-size:18px;"><?=_Searchforyourcars?></h3>
						<select onchange="return changeselect(this,'typecar','#subtype') " class="item_sort" name="model">
							<option   selected="selected" value=""><?php echo _t(_Typeofcar);?></option>
                              <?php foreach($_typecar->getTypeAll() as $rowstype ): ?>
                                  <option value="<?php echo $rowstype['id_t']; ?>"><?php echo $rowstype['name_t']; ?></option>
                               <?php endforeach; ?>
						</select>

						 <select  class="item_sort" id="subtype" name="submodel">
							<option selected="selected" value=""><?php echo _t(_Model);?></option>

						</select>

					<!--  <select  class="item_sort" name="type">
							<option selected="selected" value="">الفئة</option>
							<option  value="1">بيع</option>
							<option  value="2">شراء</option>
							<option  value="3">ايجار</option>

						</select> -->
                        	<select id="item_sort" class="item_sort" style="margin:0px 0 5px 37px" name="years">
							<option selected="selected" value=""><?php echo _t(_Manufacturingyear);?></option>
                               <?php $y=date("Y")+1; for($x=1970 ; $x<=$y ;$x++){
                                     echo "<option value='".$x."'>".$x."</option>";
                                }  ?>
						</select>
                           <div class="item_sort_price">
                        <select id="item_sort" class="item_sortd" name="pricemin">
							<option selected="selected" value=""><?php echo _t(_Theminimumprice);?></option>

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
							<option selected="selected" value=""><?php echo _t(_Theupperlimitoftheprice);?></option>
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
							<option selected="selected" value=""><?php echo _t(_City);?></option>
                                <?php foreach($_city->getCityId(11) as $rowscity ): ?>
                <option value="<?php echo $rowscity['id_c']; ?>"><?php echo $rowscity['name_c']; ?></option>
             <?php endforeach; ?>
						</selecst>

                            <br clear="all" />
                        <input type="submit" class="buttomnext" name="sub" value="<?php echo _t("التالى");?>" />
                        <input type="hidden" name="search" value="1" />
						</form>

</div>