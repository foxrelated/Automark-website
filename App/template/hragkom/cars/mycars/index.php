



<div class=" col-sm-12">
<div class="bs-example-bg-classes">
    <p class=" title"><?php echo _t(_Advertisingmanagement);?></p>

  </div>



<table cellpadding="0" cellspacing="0"  style="border-size: 1px " class="span12 title table-hover table table-striped">
<thead>
  <tr>
    <td>#</td>
    <td><?php echo _t(_Address);?></td>
    <td><?php echo _t(_Section);?></td>
    <td><?php echo _t(_Type);?></td>
    <td><?php echo _t(_Model);?></td>
     <td><?php echo _t(_Manufacturingyear);?></td>
     <td><?php echo _t(_Price);?></td>
    <td><?php echo _t(_Dateofpublication);?></td>
    <td><?php echo _t(_Settings);?></td>
    <td><?php echo _t(_Advertisingstatus);?></td>
  </tr>
</thead>


<?php foreach($_carsId as $rowscars){ ?>
 <tr <?php echo ($rowscars['act_c']==1)?"class='success' ":' class="info" '; ?>>
<td><?php echo $rowscars['id_c'];?></td>
<td><?php echo $rowscars['title_c'];?></td>
<td><?php echo language::getLang($lib_option->getCatNameId($rowscars['category_c'])); ?></td>
    <td><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo language::getLang($_typecar->getNameId($rowscars['type_c'])); ?></a></td>
    <td><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo language::getLang($_typecar->getNameId($rowscars['model_c'])); ?></a></td>
    <td><?php echo $rowscars['year_c'] ?></td>
    <td> <?php echo $rowscars['price_c'] ?>  <?php echo language::getLang(system::_data("default_currency"));?></td>
    <td><?php echo $rowscars['dateadd_c'] ?></td>
    <td>
   <a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo _t(_Watchthead); ?></a>-
    <a href="<?php echo $path['urlsite'] ?>cars/mycars/edit/<?php echo $rowscars['id_c'];?>"><?php echo _t(_Modifythead); ?></a>-
    <a href="<?php echo $path['urlsite'] ?>cars/mycars/del/<?php echo $rowscars['id_c'];?>"><?php echo _t(_Deletead); ?></a>
    </td>
   <td><?php  echo $lib_lang->carsStatus($rowscars['status_c']); ?></td>
   </tr>
 <?php } ?>

</table>

  <br clear="all">


	<div class="clear"></div>


            <div class="row text-center">

                <ul class="pagination">

            <?php if($numPage['list']!=1){ ?>
		    <li>	<a class="star"  href="<?php echo $path['urlsite'].'cars/mycars/index/'.$_codePage.'/'; ?>">&laquo;</a></li>
			<?php } ?>
				<?php
					for($numP=1;$numPage['count'] > $numP ;$numP++){?>
				    <li <?php echo($numPage['list']==$numP)?" class='active' ":""; ?>>	<a  href="<?php echo $path['urlsite'].'cars/mycars/index/'.$_codePage.'/next/'.$numP; ?>"><?php echo $numP; ?></a></li>
				<?php	} ?>
				<?php if($numPage['list'] < ($numPage['count']-1)){ ?>
			 <li><a class="end" href="<?php echo $path['urlsite'].'cars/mycars/index/'.$_codePage.'/next/'.($numPage['count']-1); ?>">&raquo;</a></li>
					<?php } ?>
  </ul>


            </div>


	<div class="clear"></div>
</div>
