<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title><?php echo $path['namesite']?></title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
     <link id="cssLink" href="<?php echo $path['template'];?>lib/<?php echo $_dir; ?>/css/bootstrap.css" rel="stylesheet" media="screen" />
     <link id="cssLink" href="<?php echo $path['template'];?>lib/css/docs.min.css" rel="stylesheet" media="screen" />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
	 <link href="<?php echo $path['template'];?>lib/css/font-awesome.css" rel="stylesheet">
	 <link id="cssLink" href="<?php echo $path['template'];?>lib/css/style.css" rel="stylesheet" media="screen" />
     <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/jquery.ad-gallery.css">
     <link rel="stylesheet" href="<?php echo $path['urlsite']; ?>Public/css/colorbox.css" />
<link rel="shortcut icon" href="<?php echo $path['template'];?>img/icone.png" />
    <link rel="icon" type="image/gif" href="<?php echo $path['template'];?>img/icone.png">
        <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>/lib/js/jScrollPane/jScrollPane.css" />

</head>
<body>
<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
          <div class="col-sm-12">
                      <?php  if(isset($_msg) and count($_msg)){
                          echo "<h3 class='title'>".$_msg."</h3><br clear='all' />";
                       }?>
          </div>
    </div>
<?php include($dirFile);?> 
</div>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="<?php echo $path['template'];?>lib/rtl/js/bootstrap.js"></script>
<script src="<?php echo $path['template'];?>lib/js/script.js"></script>
<script type="text/javascript" src="<?php echo $path['urlsite']; ?>Public/js/crawler.js"></script>
    <script src="<?php echo $path['urlsite'];?>Public/js/upload.js"></script>
    <script src="<?php echo $path['urlsite'];?>Public/js/changeselect.js"></script>
    <script type="application/javascript" src="<?php echo $path['template'];?>lib/js/jScrollPane/jquery.mousewheel.js"></script>
    <script type="application/javascript" src="<?php echo $path['template'];?>lib/js/jScrollPane/jScrollPane.min.js"></script>
    <script src="<?php echo $path['template'];?>lib/js/script.js"></script>
    <script type="text/javascript">
            var _root_ = '<?php echo $path['urlsite'];?>';
    </script>

</body>

</html>