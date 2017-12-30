<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />



<link href="<?php echo $path['template'];?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $path['template'];?>/css/nivo-slider.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $path['template'];?>/css/bar.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $path['urlsite'];?>Public/css/font-awesome.css" rel="stylesheet" type="text/css" />
<!--<script src="<?php echo $path['template'].'js/jquery-1.7.1.min.js' ?>"></script>

      -->
      <script src="http://code.jquery.com/jquery-1.7.min.js"></script>
      <script src="<?php echo $path['template'].'js/jquery.nivo.slider.pack.js' ?>"></script>
      <script src="<?php echo $path['template'].'js/jquery.aes2.js' ?>"></script>
	  <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

 <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>css/jquery.ad-gallery.css">
  <script type="text/javascript" src="<?php echo $path['template'];?>js/jquery.ad-gallery.js"></script>
  <script type="text/javascript">
  $(function() {
    var galleries = $('.ad-gallery').adGallery();

  });
  </script>
	<script type="text/javascript">


		function bookmarksite(title,url){
		if (window.sidebar){ // firefox
			window.sidebar.addPanel(title, url, "");
			}
		else if(window.opera && window.print){ // opera
			var elem = document.createElement('a');
			elem.setAttribute('href',url);
			elem.setAttribute('title',title);
			elem.setAttribute('rel','sidebar');
			elem.click();
		}
		else{// ie
			window.external.AddFavorite(url, title);
		}}
	</script>
    <link rel="stylesheet" href="<?php echo $path['urlsite']; ?>Public/css/colorbox.css" />
     <script src="<?php echo $path['urlsite']; ?>Public/js/jquery.colorbox.js"></script>

         <script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".group1").colorbox({rel:'group1', width:"50%", height:"70%"});
				$(".iframe").colorbox({iframe:true, width:"50%", height:"70%"});
			});
                 </script>
<script type="text/javascript" src="<?php echo $path['urlsite']; ?>Public/js/crawler.js"></script> 
</head>
<body>

<header>
	<div class="top">
    <div class="wid" >
		<div class="links right">
			<a href="#">عربى</a>
		</div>
         <div class="links left">
         <?php if(session::get(system::get("session/session_name"))){?>
            <a href="#">اهلا بك </a>
          
            <a href="<?php echo $path['urlsite'] ?>cars/mycars/">| ادارة اعلاناتى  </a>
            <a href="<?php echo $path['urlsite'] ?>cars/mycars/add">| اضف سيارتك </a>
            <a href="<?php echo $path['urlsite'] ?>users/">| بياناتك الشخصية</a>
			  <a href="<?php echo $path['urlsite'] ?>users/login/logout/">| تسجيل الخروج</a>
       <?php  }else{ ?>
       <i class="icon-user"></i>
		    <a href="<?php echo $path['urlsite'] ?>users/register/">مستخدم جديد</a>
            <span style="color:#fff;">|</span>
			<a href="<?php echo $path['urlsite'] ?>users/login">تسجيل الدخول</a>
            <?php } ?>
		</div>
	</div>
	</div>


<div class="header1">

<img src="<?php echo $path['template'];?>images/logo.jpg" />




<div class="but" >

<ul class="menutop" >
    <li><a href="<?php echo $path['urlsite'] ?>cars/index/bay/">بيع وشراء</a></li>
    <li><a href="<?php echo $path['urlsite'] ?>cars/index/rental/">تاجير</a></li>
    <li><a href="<?php echo $path['urlsite'] ?>cars/index/shows/">معارض</a></li>
    <li><a href="<?php echo $path['urlsite'] ?>access">زينة واكسسورات</a></li>
    <li ><a href="<?php echo $path['urlsite'] ?>pages/index/offres">عروض</a></li>
    <li style="background:red"><a href="<?php echo $path['urlsite'] ?>cars/index/offers/">السيارات المميزة</a></li>
</ul>
</div>


</div>


<div class="menu-header-c">
<div class="menu-header-r">
<div class="menu-header-l">
<ul class="link-top-sub">
  <li><a href="<?php echo $path['urlsite'] ?>">الرئيسية</a></li>
  <li><a href="<?php echo $path['urlsite'] ?>/pages/index/ads">اعلن معنا</a></li>
  <li><a href="<?php echo $path['urlsite'] ?>/pages/index/aboutus">من نحن</a></li>
  <li><a href="<?php echo $path['urlsite'] ?>/pages/index/contact">اتصل بنا</a></li>
</ul>

<a class="left addcar" href="<?php echo $path['urlsite'] ?>/cars/mycars/add">اضافة سيارة</a>
</div>
</div>
</div>

</header>




<div class="border-c">
  <?php  if(isset($_msg) and count($_msg)){
        echo "<h3 class='title'>".$_msg."</h3><br clear='all' />";
     }?>
 <?php include($dirFile);?>
  </div>


<div class="border-c">
<div style="text-align:right">
 <a href="<?php echo $_adsfooter->url; ?>"><img src="<?php echo $_adsfooter->img; ?>" alt="<?php echo $_adsfooter->name; ?>" style="" /></a>
</div>
</div>

 <div style="height:50px; background:#000;">
 <div style="width:1000px; position:relative;margin:0 auto;">
<div class="footerc span5" style="">
	<a href="<?php echo $path['urlsite'] ?>cars/index/bay/">بيع وشراء</a>
	|
    <a href="<?php echo $path['urlsite'] ?>cars/index/rental/">تاجير</a>
    |
	<a href="<?php echo $path['urlsite'] ?>cars/index/shows/">معارض</a>
   |
   <a href="<?php echo $path['urlsite'] ?>access">زينة واكسسورات</a>
    |
	<a href="<?php echo $path['urlsite'] ?>pages/index/offres">عروض</a>
     |
	<a href="<?php echo $path['urlsite'] ?>cars/index/offers/">السيارات المميزة</a>
</div>
    <div class="faced">
     <a target="_blank" href="https://www.facebook.com/pages/%D9%85%D8%A8%D8%A7%D9%8A%D8%B9%D8%A9/691060180955676?ref=hl"><img src="<?php echo $path['template'];?>images/fac_17.png"  /></a>

      <a target="_blank" href="https://twitter.com/mobay3a"><img src="<?php echo $path['template'];?>images/fac_19.png"  />  </a>

      <a target="_blank" href="#"><img src="<?php echo $path['template'];?>images/fac_21.png"  />  </a>
   </div>
<img src="<?php echo $path["template"]; ?>images/footer.png" style="position: absolute;left:-68px;bottom: 0;" />
</div>
 </div>
       <script src="<?php echo $path['urlsite'];?>Public/js/upload.js"></script>
       <script src="<?php echo $path['urlsite'];?>Public/js/changeselect.js"></script>

 <script type="text/javascript">
            var _root_ = '<?php echo $path['urlsite'];?>';
        </script>

</body>

</html>
