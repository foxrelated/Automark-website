
 <h3  class="title btn-primary"><?php echo _t(_CarsManagement);?></h3>
<div class="border-block inputh" >

<table cellpadding="0" cellspacing="0"  style="border-size: 1px " class="span12 title table-hover table table-striped">
<thead>
  <tr>
    <td>#</td>
    <td><?=_Type?></td>
    <td><?=_Model?></td>
     <td><?=_Manufacturingyear?></td>
     <td><?=_Price?></td>
    <td><?=_Dateofpublication?></td>
    <td><?=_Settings?></td>
    <td><?=_Advertisingstatus?></td>
  </tr>
</thead>


<?php foreach($_carsId as $rowscars){ ?>
 <tr <?php echo ($rowscars['act_c']==1)?"class='success' ":' class="info" '; ?>>
<td><?php echo $rowscars['id_c'];?></td>
    <td><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $_typecar->getNameId($rowscars['type_c']); ?></a></td>
    <td><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $_typecar->getNameId($rowscars['model_c']); ?></a></td>
    <td><?php echo $rowscars['year_c'] ?></td>
    <td> <?php echo $rowscars['price_c'] ?> <?=_Real?></td>
    <td><?php echo $rowscars['dateadd_c'] ?></td>
    <td>
    <a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?=_Watchthead?></a>-
    <a href="<?php echo $path['urlsite'] ?>cars/mycars/edit/<?php echo $rowscars['id_c'];?>"><?=_Modifythead?></a>-
    <a href="<?php echo $path['urlsite'] ?>cars/mycars/del/<?php echo $rowscars['id_c'];?>"><?=_Deletead?></a>
    </td>
    <td><?php echo ($rowscars['act_c']==1)?echo_t(_Approved):echo_t(_Waitingforreview); ?></td>
   </tr>
 <?php } ?>

</table>

  <br clear="all">

</div>


	<div class="clear"></div>
    <div class="list">
	<?php if($numPage['list']!=1){ ?>
			<a class="star"  href="<?php echo $path['urlsite'].'/cars/mycars/'; ?>"><?=_First?></a>
			<?php } ?>
				<?php
					for($numP=1;$numPage['count'] > $numP ;$numP++){?>
					<a <?php echo($numPage['list']==$numP)?"class='active'":""; ?> href="<?php echo $path['urlsite'].'/cars/mycars/index/'.$numP; ?>"><?php echo $numP; ?></a>
				<?php	} ?>
				<?php if($numPage['list'] < ($numPage['count']-1)){ ?>
			<a class="end" href="<?php echo $path['urlsite'].'/cars/mycars/index/'.($numPage['count']-1); ?>"><?=_Last?></a>
					<?php } ?>
	</div>
	<div class="clear"></div>