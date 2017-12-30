<h3 class="title right btn-primary"><?php echo isset($_title)?$_title:''; ?></h3>
<div class="border-block">
<ul class="slide-3rode">

<?php foreach($_accessRows as $rows){ ?>

<li><a href="<?php echo $path['urlsite'] ?>access/index/id/<?php echo $rows['id_a'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rows['images_a'],0); ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="s3err"><?=_Theproduct?>:<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rows['id_a'];?>"><?php echo $rows['name_a']; ?></a></p>
<p class="s3err"><?=_Price?> : <?php echo $rows['price_a'] ?> <?=_Real?></p>
</div>
</li>
 <?php } ?>

</ul>

  <br clear="all">
</div>


	<div class="clear"></div>
    <div class="list">
	<?php if($numPage['list']!=1){ ?>
			<a class="star"  href="<?php echo $path['urlsite'].'access/'; ?>"><?=_First?></a>
			<?php } ?>
				<?php
					for($numP=1;$numPage['count'] > $numP ;$numP++){?>
					<a <?php echo($numPage['list']==$numP)?"class='active'":""; ?> href="<?php echo $path['urlsite'].'access/index/index/'.$numP; ?>"><?php echo $numP; ?></a>
				<?php	} ?>
				<?php if($numPage['list'] < ($numPage['count']-1)){ ?>
			<a class="end" href="<?php echo $path['urlsite'].'access/index/index/'.($numPage['count']-1); ?>"><?=_Last?></a>
					<?php } ?>
	</div>
	<div class="clear"></div>