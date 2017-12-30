<h3 class="title right btn-primary"><?=_Shows?></h3>

<div class="border-block">
<ul class="slide-3rode">

<?php foreach($_showsRows as $rowsshows){ ?>

<li><a href="<?php echo $path['urlsite'] ;?>cars/index/showsid/<?php echo $rowsshows['id_s'];?>"><img src="<?php echo $path['upload'].$rowsshows['images_s']; ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="no333"><a href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $rowsshows['id_s'];?>"><?php echo $rowsshows['name_s'] ?></a></p>
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