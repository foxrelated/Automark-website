
<?php
$_SESSION['username'] = $_fromuser; // Must be already set
$_SESSION['fromuser'] = $_fromuser;
?>
	<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/style-auto.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/media.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/share-button.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/chat.css">
    <!--<link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/screen.css">-->
    <!--<link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/screen_ie.css">-->
    <script type="text/javascript" src="<?php echo $path['template'];?>lib/js/share-button.js"></script>

    <script type="text/javascript" src="<?php echo $path['template'];?>lib/js/chat.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
  </head>

  <body>

    <div class="head" style="margin-top: 175px; ">
      <div class="container">
        <ul class="list-unstyled">
          <a href="<?php echo $path['urlsite'] ?>"><li><?=_Themainpage?></li></a>
          <li> > </li>
          <a href="<?php echo $path['urlsite'] ?>"><li><?=_Shows?></li></a>
          <li></li>
          
          <li class="baws"> | </li>
          
        </ul>
      </div>
    </div>

    <!-- Company Info -->

    <section class="info">
      <div class="container">
        <div class="row">
          <?php foreach ($_shows as $show) {?>
          <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="my-class">
              <a href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $show['id_s'];?>">
              <div class="my-info text-center">
                <img src="<?php echo $path['template'];?>img/06.png" />
                <div class="divrgent">
                  <img src="<?php echo $path['thumb'];?>thumb_<?php echo $show['images_s'] ?>" />
                </div>
                <div class="my-p">
                  <p class="text-center"><?php echo isset($show['name_ar_s'])?$show['name_ar_s']:''; echo ('&nbsp;');?> <?=_Car?></p>
                  <p class="text-center bla"><?php echo isset($show['name_en_s'])?$show['name_en_s']:''; echo ('&nbsp;');?> Cars</p>
                </div>
              </div>
              </a>
            </div>
            <ul class="list-unstyled col-lg-12" id="right-section">
              <li class="col-lg-12 col-md-3 col-sm-3 col-xs-6"><a href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $show['id_s'];?>"><?php echo isset($show['region_s'])?$show['region_s']:''; ?> -

              	<?php   if(isset($show['city_s']) and $show['city_s']!=''){ ?> <?php echo  language::getLang($_city->getNameId($show['city_s']));?> <?php } ?></a></li>
              <li class="col-lg-12 col-md-3 col-sm-3 col-xs-6"><a href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $show['id_s'];?>"><?php echo isset($show['phone_num1'])?$show['phone_num1']:''; ?></a></li>
              <li class="col-lg-12 col-md-3 col-sm-3 col-xs-6"><a href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $show['id_s'];?>"><?php echo isset($show['phone_num2'])?$show['phone_num2']:''; ?></a></li>
              <li class="col-lg-12 col-md-3 col-sm-3 col-xs-6"><a href="mailto:<?php echo $show['email_s'] ?>"><?=$show['email_s']?></a></li>
              
            </ul>
          </div>
          <?php } ?>
          <!-- Gallary Section -->

        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li>
	                	<?php if($numPage['list']!=1){ ?>
						<a class="star"  href="<?php echo $path['urlsite'].'cars/index/'.$_codePage.'/'; ?>"><?=_First?></a>
						<?php } ?>
							<?php
								for($numP=1;$numPage['count'] > $numP ;$numP++){?>
								<a <?php echo($numPage['list']==$numP)?"class='active'":""; ?> href="<?php echo $path['urlsite'].'cars/index/'.$_codePage.'/'.$numP; ?>"><?php echo $numP; ?></a>
							<?php	} ?>
							<?php if($numPage['list'] < ($numPage['count']-1)){ ?>
						<a class="end" href="<?php echo $path['urlsite'].'cars/index/'.$_codePage.'/'.($numPage['count']-1); ?>"><?=_Last?></a>
								<?php } ?>

                </li>
              </ul>

            </nav>
          </div>
          
      </div>
    </section>



    <!-- Scripts -->

    <script>
      var elements = document.getElementsByClassName("column");
      var i;
      function listView() {
        for (i = 0; i < elements.length; i++) {
          elements[i].style.width = "60%";
        }
      }
      function gridView() {
        for (i = 0; i < elements.length; i++) {
          elements[i].style.width = "30%";
        }
      }

	var share = new ShareButton();
	share.toggle(); // toggles the share button popup
share.open();   // open the share button popup
share.close();  // closes the share button popup
share.config;
    </script>
  </body>
  </html>
