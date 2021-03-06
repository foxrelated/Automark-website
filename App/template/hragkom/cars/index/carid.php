
<?php
$_SESSION['username'] = $_fromuser; // Must be already set
$_SESSION['fromuser'] = $_fromuser;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo _t(_Address);?> : <?php echo  $_carsId['title_c']; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/hover.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/lightslider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/style-detail.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/style-auto.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/media.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/share-button.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/chat.css">
      <link rel="stylesheet" type="text/css" href="<?php echo $path['template'];?>lib/css/pgwslider.min.css">


  </head>
  <body>
    <!-- Head Bar -->
    <div class="container head-bar text-right" style="margin-top: 25px; " >
    <div style="background-color:#db2d2e;">
      <div class="" style="padding-top: 10px;height: 100%;">
        <table class="table table-sm table-dark">
        <tbody>
          <tr>
            <th scope="row"></th>
            <?php foreach($db_category->getAll() as $rowsCategory){


          ?>
           <?php if($rowsCategory['id_ss'] == $_carsId['category_c']){

          ?>
          <td class="car-section pointer"><?php echo language::getLang($rowsCategory['code_ss']);?> <?php echo ("&nbsp;"); ?><?=_forsale?></td>
          <?php } ?>
          <?php } ?>


            <td style="padding-top: 8px;"><i class="fa fa-angle-left"></i></td>
            <td class="type"><?php echo  $_carsId['title_c']; ?></td>
          </tr>
        </tbody>
        </table>
      </div>
      </div>
    </div>
    <!-- Content -->
    <section class="container car-detail">
      <div style="padding: 0 30px;">
      <div class="car-image-head">
        <p class="car-type inline"><?php echo  $_carsId['title_c']; ?> </p>
        <p class="price inline hvr-bob"><span class="nums-font"><?php echo  $_carsId['price_c']; ?></span> <?php echo _t(_AED);?></p>
        <small class="text-muted nums-font" style="margin-top: 10px;"><?php echo $_carsId['dateadd_c'];?></small>
        <div class="basic-details">
          <ul class="list-inline">
            <li class="detail col-md-3 hvr-bob nums-font"><i class="fa fa-dashboard"></i>
              <?php
          if(count($show_meta_cars)>0 && isset($show_meta_cars)){

            $len = count($show_meta_cars);
            $firsthalf = array_slice($show_meta_cars, 0, $len / 2);
            $secondhalf = array_slice($show_meta_cars, $len / 2);
          foreach($secondhalf as $rows_meta_cars){
              if($rows_meta_cars['code_o'] == "kilometersconsumed"){
                  $kilometersconsumed = $lib_func->jsonArray($rows_meta_cars['value_m']);
                  echo $kilometersconsumed[0];
                  echo ('&nbsp;');
                  echo _kilometer;
            }
          }
          foreach($firsthalf as $rows_meta_cars){
            //if(($rows_meta_cars['name_o'] == "<!--:ar-->المسافة المقطوعة<!--:--><!--:en-->the traveled distance<!--:-->") || ($rows_meta_cars['name_o'] == "<!--:ar-->الكيلومترات المستهلكة<!--:--><!--:en-->Kilometers consumed<!--:-->")){
              if($rows_meta_cars['code_o'] == "kilometersconsumed"){
                  $kilometersconsumed = $lib_func->jsonArray($rows_meta_cars['value_m']);
                  echo $kilometersconsumed[0];
                  echo ('&nbsp;');
                  echo _kilometer;
            }
          }
        }?>
            </li>
            <li class="detail col-md-3 hvr-bob nums-font"><i class="fa fa-calendar fa-1"></i><?php echo  $_carsId['year_c']; ?></li>
            <li class="detail col-md-6 hvr-bob"><i class="fa fa-map-marker"></i><?php   if(isset($_carsId['Country_c']) and $_carsId['Country_c']!=''){ ?> <?php echo language::getLang($_city->getNameId($_carsId['Country_c']));?> <?php } ?> | <?php   if(isset($_carsId['city_c']) and $_carsId['city_c']!=''){ ?> <?php echo  language::getLang($_city->getNameId($_carsId['city_c']));?> <?php } ?></li>
          </ul>
        </div>
      </div>
    </div>
      <div class="car-images">
          <ul class="pgwSlider">
              <?php
              $car_images = $lib_func->jsonArray($_carsId['images_c']);
              if($car_images != null) {?>
                  <?php foreach($car_images as $rowsimg){
                      ?>
                      <li class="<?= count($car_images) == 1 ? 'singular-slider' : '' ?>"><img src="<?= $path['thumb'].'thumb_'.$rowsimg ?>" alt="" data-large-src="<?= $path['upload'].$rowsimg ?>"></li>
                  <?php  } ?>
              <?php } ?>
          </ul>
      </div>

      <div class="basic-information">
        <div class="container">
        <h3><?=_Maininformation?> </h3>
        <?php if(!$_iscarfavorite){

          ?>
        <span style="display:none" class="add-to-favorit pointer" dir="<?php echo $_dir; ?>">
          <a href="<?php echo $path['urlsite'] ;?>cars/index/addtofavorites/<?php echo $_carsId['id_c'];?>">
          <i class="fa fa-lg3 fa-heart-o"></i>
          <?=_Addtofavoriteslist?></a>
        </span>
        <?php }else{ ?>
        <span style="display:none" class="add-to-favorit pointer" dir="<?php echo $_dir; ?>">
          <i class="fa fa-lg3 fa-heart" style=""></i>
          <?=_AddedtoFavorites?>
        </span>
        <?php }?>
        <div class="all-details col-md-6 col-sm-6 col-xs-6">
          <table class="table table-sm table-dark">
            <tbody>
              <?php
          if(count($show_meta_cars)>0 && isset($show_meta_cars)){
            $len = count($show_meta_cars);
            $firsthalf = array_slice($show_meta_cars, 0, $len / 2);
            $secondhalf = array_slice($show_meta_cars, $len / 2);
          foreach($firsthalf as $rows_meta_cars){
          ?>
          <tr>
                <th scope="row"></th>
                <td><?php
                  if(($rows_meta_cars['name_o'] !== "<!--:ar-->المواصفات الاضافية<!--:--><!--:en-->Additional Specifications<!--:-->") ){
                echo language::getLang($rows_meta_cars['name_o']);
              }?>

                </td>
                <td><?php
        if($lib_func->jsonId($rows_meta_cars['option_o'],'type')=='select'){
        $option_id=$_option->get_value_option(array('id'=>$rows_meta_cars['value_m']));
        if(count($option_id) and $option_id){

        foreach($option_id as $rowsform): ?>
                <?php echo ($rows_meta_cars['value_m']==$rowsform['id_v'])?language::getLang($rowsform['value_v']):'';?>
        <?php endforeach;
          }
          }else{
            if(($rows_meta_cars['name_o'] !== "<!--:ar-->المواصفات الاضافية<!--:--><!--:en-->Additional Specifications<!--:-->") ){
                if($lib_func->jsonArray($rows_meta_cars['value_m']) != null) {
                    echo $lib_func->jsonArray($rows_meta_cars['value_m'])[0];
                }else {
                    echo $rows_meta_cars['value_m'];
                }
          }
        }
        ?></td>
              </tr>
        <?php  }
        } ?>



            </tbody>
          </table>
        </div>
        <div class="all-details col-md-6 col-sm-6 col-xs-6">
          <table class="table table-sm table-dark">
            <tbody>
                 <?php
          if(count($show_meta_cars)>0 && isset($show_meta_cars)){
            $len = count($show_meta_cars);
            $firsthalf = array_slice($show_meta_cars, 0, $len / 2);
            $secondhalf = array_slice($show_meta_cars, $len / 2);
          foreach($secondhalf as $rows_meta_cars){
          ?>
              <tr>
                <th scope="row"></th>
                <td><?php
                  if(($rows_meta_cars['name_o'] !== "<!--:ar-->المواصفات الاضافية<!--:--><!--:en-->Additional Specifications<!--:-->") ){
                echo language::getLang($rows_meta_cars['name_o']);
              }?></td>
                <td><?php
        if($lib_func->jsonId($rows_meta_cars['option_o'],'type')=='select'){
        $option_id=$_option->get_value_option(array('id'=>$rows_meta_cars['value_m']));
        if(count($option_id) and $option_id){

        foreach($option_id as $rowsform): ?>
                <?php echo ($rows_meta_cars['value_m']==$rowsform['id_v'])?language::getLang($rowsform['value_v']):'';?>
        <?php endforeach;
          }
          }else{
            if(($rows_meta_cars['name_o'] !== "<!--:ar-->المواصفات الاضافية<!--:--><!--:en-->Additional Specifications<!--:-->") ){
              echo $rows_meta_cars['value_m'];
            }
          }

        ?></td>
              </tr>
        <?php  }
        } ?>


            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
    </section>


    <section class="other-information">
      <div class="">
        <?php
          if(count($show_meta_cars)>0 && isset($show_meta_cars)){?>
          <?php
            foreach($show_meta_cars as $rows_meta_cars){

            if(($rows_meta_cars['name_o'] == "<!--:ar-->المواصفات الاضافية<!--:--><!--:en-->Additional Specifications<!--:-->") ){

          ?>
          <h3><?php echo language::getLang(($rows_meta_cars['name_o']));?></h3>
        <p><?php echo language::getLang(($rows_meta_cars['value_m']));?></p>
          <?php }}?>

        <?php
        } ?>
    </div>
  </section>


    <!-- Buyer -->

    <section class="buyer">
    <div class="container">
      <div style="display:none" class="col-md-6 col-xs-12 buy-info">
      <table class="table table-sm table-dark">
      <tbody class="col-xs-12">
        <tr style="width:150px">
          <td><?php echo _t(_Theseller);?>:</td>

          <td><?php echo  $_carsId['name_u']; ?></td>
        </tr>
        <tr style="display:none">
          <td><?php echo _t(_Methodofcommunication);?>:<?php echo ('&nbsp;');?></td>

          <td dir="ltr" class="fbold nums-font"><?php echo  $_carsId['mobile_u'];?></td>
        </tr>
      </tbody>
      </table>
      </div>
    <div class="col-md-6 col-xs-12 buy-info">
      <table class="table table-sm table-dark">
      <tbody class="col-xs-12">
        <tr>
          <td><?php echo _t(_Share);?></td>
          <td>
            <ul dir="ltr" class="list-unstyled list-inline social">
              <li><a class="details-share-icon" href="http://www.facebook.com/sharer.php?u=<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $_carsId['id_c'];?>" target="_blank">
                 <i class="hvr-grow pointer fa fa-lg fa-facebook-official"></i>
              </a></li>
              <li> <a class="details-share-icon" href="https://twitter.com/share?url=<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $_carsId['id_c'];?>&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
                <i class="hvr-grow pointer fa fa-lg fa-twitter-square"></i>
                </a></li>
              <li>

                  <a class="details-share-icon" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $_carsId['id_c'];?>" target="_blank">
                    <i class="hvr-grow pointer fa fa-lg fa-linkedin-square">
                    </i>
                  </a>
                </li>
              <li>
                <a class="details-share-icon" href="https://plus.google.com/share?url=<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $_carsId['id_c'];?>" target="_blank">
                    <i class="hvr-grow pointer fa fa-lg fa-google-plus-square"></i>
                </a>
              </li>
            </ul>
          </td>
        </tr>
        <tr>
          <td class="main-color"><button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal"><?php echo _t(_Callnow);?></button></td>
          <hr>
          <td class="main-color" style="text-align: center">
              <?php if(session::get(system::get("session/session_name"))){ ?>
              <button type="button" class="btn btn-danger btn-lg" id="btnChatWith" data-to-id="<?= $_carsId['id_user']; ?>"><?php echo _t(_Sendamessage);?></button>
              <?php
              }
              ?>
          </td>
        </tr>
      </tbody>
    </table>
    </div>

      </div>
    </section>

    <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo  _Cellphone;?></h4>
        </div>
        <div class="modal-body">
          <p><?php echo  $_carsId['mobile_u'];?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo  (_Close);?></button>
        </div>
      </div>

    </div>
  </div>
    <!-- Relative -->

      <section class="relative">
        <div class="container">
          <h2><?=_RelatedAds?></h2>
          <?php foreach($_lastcarsId as $rowscars){  ?>
          <div class="rel col-md-3 col-xs-12 hvr-float-shadow">
            <a style="display:block;height:100%" href="<?php echo $path['urlsite'] ?>cars/index/id/<?php echo $rowscars['id_c'];?>">
            <img src="<?php echo $path['upload'].$lib_func->jsonId($rowscars['images_c'],0); ?>" class="img-thumbnail"/>
            <div class="rel-title nums-font"><?php echo $rowscars['title_c'];?></div>
          </a>
          </div>
          <?php } ?>
        </div>
      </section>

      <!-- Advertise -->


      <!-- Scripts -->
      <script src="<?php echo $path['template'];?>lib/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo $path['template'];?>lib/js/script.js"></script>
    <script src="<?php echo $path['template'];?>lib/js/pgwslider.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.pgwSlider').pgwSlider();
        });
    </script>

    </body>
  </html>



