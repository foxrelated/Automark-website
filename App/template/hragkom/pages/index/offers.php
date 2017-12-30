<div class="col-sm-9" >
<h3 class="title  "><?=_CarShows?></h3>
<div class="border-block inputh" >
<table style="width:910px;margin:0 auto;">
<tr>

<td colspan="2">


		<div class="slider-wrapper theme-bar">

    <div id="slider" class="nivoSlider">

                    <?php  foreach($ads_big as $rowsbig){

                        if(isset($rowsbig->date) and $rowsbig->date!=""){
                            $timeAds=strtotime($rowsbig->date);
                            $timeNow=time();
                            if($timeAds<$timeNow){
                                        continue;
                            }
                        }
                     ?>
		                	<a href="<?php echo $rowsbig->url ?>" title="<?php echo $rowsbig->name ?>"><img src="<?php echo $rowsbig->img; ?>"   alt="<?php echo $rowsbig->name ?>" title=""  /></a>
                    <?php } ?>
				</div>
			</div>




</td>
</tr>

  	<tr>
		<td>


        	<div class="slider04">


		        <div class="slider-wrapper theme-bar">
				<div id="slider1" class="nivoSlider">
                   <?php  foreach($mediam1 as $rowsmed1){
                   if(isset($rowsmed1->date) and $rowsmed1->date!=""){
                            $timeAds=strtotime($rowsmed1->date);
                            $timeNow=time();
                            if($timeAds<$timeNow){
                                        continue;
                            }
                        }
                   ?>
              			<a href="<?php echo $rowsmed1->url ?>" title="<?php echo $rowsmed1->name ?>"><img src="<?php echo $rowsmed1->img; ?>"   alt="<?php echo $rowsmed1->name ?>" title=""  /></a>
                  <?php } ?>
				</div>
			</div>

		 </div>


    </td>



		<td>

          	<div class="slider04">


		<div class="slider-wrapper theme-bar">
				<div id="slider2" class="nivoSlider">
                   <?php  foreach($mediam2 as $rowsmed2){
                    if(isset($rowsmed2->date) and $rowsmed2->date!=""){
                            $timeAds=strtotime($rowsmed2->date);
                            $timeNow=time();
                            if($timeAds<$timeNow){
                                        continue;
                            }
                        }
                   ?>
              			<a href="<?php echo $rowsmed2->url ?>" title="<?php echo $rowsmed2->name ?>"><img src="<?php echo $rowsmed2->img; ?>" alt="<?php echo $rowsmed2->name ?>"  title=""  /></a>
                  <?php } ?>
				</div>
			</div>

		 </div>

        </td>
</tr>

  	<tr>
		<td>
	       	<div class="slider04">


		<div class="slider-wrapper theme-bar">
				<div id="slider3" class="nivoSlider">
                   <?php  foreach($mediam3 as $rowsmed3){
                        if(isset($rowsmed3->date) and $rowsmed3->date!=""){
                            $timeAds=strtotime($rowsmed3->date);
                            $timeNow=time();
                            if($timeAds<$timeNow){
                                        continue;
                            }
                        }

                   ?>
              			<a href="<?php echo $rowsmed3->url ?>" title="<?php echo $rowsmed3->name ?>"><img src="<?php echo $rowsmed3->img; ?>" alt="<?php echo $rowsmed3->name ?>"   title="" /></a>
                  <?php } ?>
				</div>
			</div>

		 </div>

            </td>



		<td>
	     	<div class="slider04">


		<div class="slider-wrapper theme-bar">
				<div id="slider4" class="nivoSlider">
                   <?php  foreach($mediam4 as $rowsmed4){
                    if(isset($rowsmed4->date) and $rowsmed4->date!=""){
                            $timeAds=strtotime($rowsmed4->date);
                            $timeNow=time();
                            if((int)$timeAds<$timeNow){
                                        continue;
                            }
                        }
                    ?>
              			<a href="<?php echo $rowsmed4->url ?>" title="<?php echo $rowsmed4->name ?>"><img src="<?php echo $rowsmed4->img; ?>"  alt="<?php echo $rowsmed4->name ?>"  title=""  /></a>
                  <?php } ?>
				</div>
			</div>

		 </div>

            </td>
</tr>



</table>


   </div>
   </div>
