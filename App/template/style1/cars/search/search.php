<h3 class="title right btn-primary"><?=_Researchresults?></h3>
<div class="border-block">
<ul class="slide-3rode">

<?php foreach($search as $rowscars){ ?>

<li><a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="170" height="173" alt=""></a>
<div class="bgslid">
<p class="no333"><?=_Model?> :<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $_typecar->getNameId($rowscars['type_c']); ?></a></p>
<p class="s3err"><?=_Price?> : <?php echo $rowscars['price_c'] ?> <?=_Real?></p>
<p class="no333"><?=_Dateofpublication?> <a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>"><?php echo $rowscars['dateadd_c'] ?></a></p>
</div>
</li>
 <?php } ?>

</ul>

  <br clear="all">
</div>