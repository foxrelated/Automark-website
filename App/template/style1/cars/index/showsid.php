<?php if(isset($_showsads) and $_showsads!=''){ ?>
<div class="border-block">
      <img  style="width:990px;height:250px;" src="<?php echo $_showsads; ?>" alt="" />
</div>
<?php }?>


<h3 class="title right btn-primary"><?php echo isset($_title)?$_title:''; ?></h3>
<div class="border-block">
<ul class="slide-3rode">

<?php foreach($_carsId as $rowscars){ ?>

<li><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="s3err"><?=_Typeofcar?>:<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $_typecar->getNameId($rowscars['type_c']); ?></a></p>
<p class="s3err"><?=_Price?> : <?php echo $rowscars['price_c'] ?> ريال</p>
<p class="no333"><?=_Dateofpublication?>   <a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $rowscars['dateadd_c'] ?></a></p>
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