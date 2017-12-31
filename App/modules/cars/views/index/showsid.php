
<?php
$_SESSION['username'] = $_user; // Must be already set
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
          <li> > </li>
          <a href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $_ids;?>"><li><?=_Showroom?><?php echo ('&nbsp;'); echo isset($_title)?$_title:''; echo ('&nbsp;');?><?=_Car?></li></a>
          <li class="baws"> | </li>
          <a href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $_ids;?>"><li class="baw"><?=_Back?></li></a>
        </ul>
      </div>
    </div>

    <!-- Company Info -->

    <section class="info">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="my-class">
              <div class="my-info text-center">
                <img src="<?php echo $path['template'];?>img/06.png" />
                <div class="divrgent">
                  <img src="<?php echo $path['thumb'];?>thumb_<?php echo $_showsimages ?>" />
                </div>
                <div class="my-p">
                  <p class="text-center"><?php echo isset($_name_ar)?$_name_ar:''; echo ('&nbsp;');?> <?=_Car?></p>
                  <p class="text-center bla"><?php echo isset($_name_en)?$_name_en:''; echo ('&nbsp;');?> Cars</p>
                </div>
              </div>
            </div>
            <ul class="list-unstyled col-lg-12" id="right-section">
              <li class="col-lg-12 col-md-3 col-sm-3 col-xs-6"><a href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $_ids;?>"><?php echo isset($_region_s)?$_region_s:''; ?> - 

              	<?php   if(isset($_city_s) and $_city_s!=''){ ?> <?php echo  language::getLang($_city->getNameId($_city_s));?> <?php } ?></a></li>
              <li class="col-lg-12 col-md-3 col-sm-3 col-xs-6"><a href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $_ids;?>"><?php echo isset($_phone_num1)?$_phone_num1:''; ?></a></li>
              <li class="col-lg-12 col-md-3 col-sm-3 col-xs-6"><a href="<?php echo $path['urlsite'] ?>cars/index/showsid/<?php echo $_ids;?>"><?php echo isset($_phone_num2)?$_phone_num2:''; ?></a></li>
              <li class="col-lg-12 col-md-3 col-sm-3 col-xs-6"><a href="mailto:<?php echo $_showsemail ?>"><?=$_showsemail?></a></li>
              <li class="my-li hidden-md hidden-xs col-sm-12">
                <ul class="list-unstyled text-center">
                  <li>
                  	<a href="javascript:void(0)" onclick="javascript:chatWith('<?=$_SESSION['username']?>')"><i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i></a>
                    
                  </li>
                  <li>
                  	
                  	<!-- AddToAny BEGIN -->
					<a class="a2a_dd" href="https://www.addtoany.com/share"><i class="fa fa-share-alt fa-2x" aria-hidden="true"></i></a>
					<script>
						var a2a_config = a2a_config || {};
						a2a_config.onclick = 1;
						a2a_config.num_services = 3;
						a2a_config.color_main = "D7E5ED";
						a2a_config.color_border = "AECADB";
						a2a_config.color_link_text = "333333";
						a2a_config.color_link_text_hover = "333333";
					</script>
					<script async src="https://static.addtoany.com/menu/page.js"></script>
					<!-- AddToAny END -->
                    
                  </li>
                </ul>
              </li>
            </ul>
          </div>

          <!-- Gallary Section -->

          <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="show">
              <ul class="list-unstyled">
                <li>
                  <div class=no-padding mnb" style="float: right;">
                    <i  id="list" onclick="listView()" class="fa fa-list-ul fa-2x" aria-hidden="true"></i>
                    <i  id="grid" onclick="gridView()" class="fa fa-th-large fa-2x" aria-hidden="true"></i>
                  </div>
                </li>
                <li>
                  <div class="col-md-9 col-sm-9 no-padding filters">
                    
                    <div class="half-info col-sm-6">
                	<form action="<?php echo $path['urlsite'] ?>cars/index/showsidfilter/<?=$_ids?>" method="post">
                      <select class="form-control" id="sel1" name="model" onchange="this.form.submit()">
                        <option><?=_Model?></option>
                        <?php foreach($lib_typecar->getTypeAll() as $rowstype ): ?>
                                  <option value="<?php echo $rowstype['id_t']; ?>"><?php echo language::getLang($rowstype['name_t']); ?></option>
                     <?php endforeach; ?> 
					 <option><?= _Other?></option>
                      </select>
                      <i class="fa fa-angle-down"></i>
                      <input type="hidden" name="generalsearch" value="1" />
                      </form>
                    </div>
                    <script>
	                    $('[name="model"]').change(function() {
						  $(this).closest('form').submit();
						});
					</script>
                    <div class="half-info col-sm-6">
                    	<form action="<?php echo $path['urlsite'] ?>cars/index/showsidfilter/<?=$_ids?>" method="post">
                      <select class="form-control" id="sel1" name="year" onchange="this.form.submit()">
                      	<option><?=_Manufacturingyear?></option>
                      	<?php foreach($_carsIdyear as $rowscars){ ?>
                        <option><?=$rowscars['year_c']?></option>
                        <?php } ?>
                      </select>
                      <script>
	                    $('[name="year"]').change(function() {
						  $(this).closest('form').submit();
						});
					</script>
                      <i class="fa fa-angle-down"></i>
                      <input type="hidden" name="generalsearch" value="1" />
                      </form>
                    </div>
                  </div>
                </li>
                <li class="hidden-xs">
                  <div class="col-xs-4 gre no-padding-left">
                    <div class="col-xs-8 no-padding">
                    	<form action="<?php echo $path['urlsite'] ?>cars/index/showsidfilter/<?=$_ids?>" method="post">
                      <select class="form-control no-padding" id="sel1" name="orderyear" onchange="this.form.submit()">
                        <option><?=_Sortbyyear?></option>
                        <option><?=_Fromnewesttooldest?></option>
                        <option><?=_Fromoldesttonewest?></option>

                      </select>
                      <script>
	                    $('[name="orderyear"]').change(function() {
						  $(this).closest('form').submit();
						});
					</script>
                      
                      <input type="hidden" name="generalsearch" value="1" />
                      </form>
                      
                    </div>
                    <div class="col-xs-4 no-padding chiv">
                      <a class="chiv1" href=""><i class="fa fa-chevron-right fa-lg"></i></a>
                      <a class="chiv2" href=""><i class="fa fa-chevron-left fa-lg"></i></a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>

<section class="toggle">


  <div class="row row-shift">

  	<?php foreach($_carsId as $rowscars){ ?>
    <div class="column">
      <div class="rel pic-one">
      	<a href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>">
        <img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" width="170" height="173" alt="">
        </a>
        <p class="rel-title"><?php echo $rowscars['title_c'];?></p>
      </div>
    </div>
    <?php } ?>
  </div>
  
</section>
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li>
	                	<?php if($numPage['list']!=1){ ?>
						<a class="star"  href="<?php echo $path['urlsite'].'cars/index/'.$_codePage.'/'.$_ids.'/'; ?>"><?=_First?></a>
						<?php } ?>
							<?php
								for($numP=1;$numPage['count'] > $numP ;$numP++){?>
								<a <?php echo($numPage['list']==$numP)?"class='active'":""; ?> href="<?php echo $path['urlsite'].'cars/index/'.$_codePage.'/'.$_ids.'/'.$numP; ?>"><?php echo $numP; ?></a>
							<?php	} ?>
							<?php if($numPage['list'] < ($numPage['count']-1)){ ?>
						<a class="end" href="<?php echo $path['urlsite'].'cars/index/'.$_codePage.'/'.$_ids.'/'.($numPage['count']-1); ?>"><?=_Last?></a>
								<?php } ?>
					
                </li>
              </ul>
              
            </nav>
          </div>

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
