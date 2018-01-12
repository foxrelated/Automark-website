<?php
$_SESSION['username'] = $_fromuser; // Must be already set
$_SESSION['fromuser'] = $_fromuser;
?>
<?php
                if($_dir=="ltr")
                  $dir = "rtl";
                else
                  $dir = "ltr";
              ?>
<!DOCTYPE html>
<html lang="en" dir="<?php echo $_dir; ?>">
<head>
  <meta charset="utf-8">
  <title><?=_AdPage?></title>
  <link rel="stylesheet" href="<?php echo $path['template'];?>lib/css/hover.css" />
  <link rel="stylesheet" href="<?php echo $path['template'];?>lib/css/magnific-popup.css" />
  <link rel="stylesheet" href="<?php echo $path['template'];?>lib/css/lightslider.css" />
  <link rel="stylesheet" href="<?php echo $path['template'];?>lib/css/style-Ads.css" />

</head>
<body>

    <!-- Add New Ads -->
<form action="" method="post">
<section dir="<?php echo $_dir; ?>" class="add-ad">
  <div class="container">
    <h2><?=_Addyouradforfree?></h2>
    <div dir="<?php echo $_dir; ?>" class="bar">

      <!--<button class="btn btn-secondary col-lg-2"><?=_Car?>   </button>-->  

      <?php foreach($db_category->getAll() as $rowsCategory){
          

          ?>
          
          <?php if($rowsCategory['id_ss'] == $id){

          ?>
          <a class="btn btn-secondary active col-lg-2" style="margin-left: 1px;"  href="<?php echo $path['urlsite'] ?>/cars/mycars/addfreeads/<?php echo $rowsCategory['id_ss'];?>"><?php echo language::getLang($rowsCategory['code_ss']);?></a>
          <?php } else { ?>
          
        <a class="btn btn-secondary col-lg-2" style="margin-left: 1px;"  href="<?php echo $path['urlsite'] ?>/cars/mycars/addfreeads/<?php echo $rowsCategory['id_ss'];?>"><?php echo language::getLang($rowsCategory['code_ss']);?></a>
        <?php } ?>
         
        
        
        <?php }echo ("&nbsp;"); echo ("&nbsp;"); echo ("&nbsp;"); ?>


    </div>
    
    <div class="form-group">
      <input class="car-type-input col-lg-12 col-md-12 col-sm-12 col-xs-12" name ="title_c" type="text" placeholder="<?=_AddAdTitle40characters?>" maxlength="40" style="height: 45px;"/>
      <input class="price-input col-lg-12 col-md-12 col-sm-12 col-xs-12" type="text" name="price_c" placeholder="<?=_AskingPriceAED?>" style="height: 45px;"/>
    </div>
    <?php echo ("&nbsp;"); echo ("&nbsp;"); echo ("&nbsp;"); ?>
    <div style="" class="form-row">
      <?php
    foreach($data_category as $rows_values){

                 foreach ($_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option){
           if($lib_func->jsonId($rows_option['option_o'],'admin')==1){continue;}
          $litForce=($lib_func->jsonId($rows_option['option_o'],'force')==1)?'<span style="color:red">*</span>':'';
             ?>
             <?php  if($lib_func->jsonId($rows_option['option_o'],'type')=='text'){ ?>
             <?php if ($rows_option['code_o']=='kilometersconsumed') { ?>
             <input class="detail-km-input col-lg-6"  style="margin-right: 300px; margin-top: 20px;" type="text" placeholder="<?=_kilometersconsumed?>" name="<?php echo $rows_option['code_o']; ?>[0]" value="<?php echo (isset($get[$rows_option['code_o']][0]))?$get[$rows_option['code_o']][0]:'';?>" />
             <?php } ?>
             
             <?php if ($rows_option['code_o']=='colorinter') { ?>
             <input class="detail-km-input1 col-lg-6" style="margin-right: 300px; margin-top: 20px;" type="text" placeholder="<?=_InteriorColor?>" name="<?php echo $rows_option['code_o']; ?>[0]" value="<?php echo (isset($get[$rows_option['code_o']][0]))?$get[$rows_option['code_o']][0]:'';?>" />
             <?php } ?>
             
             <?php if ($rows_option['code_o']=='plate_number') { ?>
             <input style="width:45%" class="detail-plate-input col-lg-6" type="text" placeholder="<?=_Carplate?>" name="<?php echo $rows_option['code_o']; ?>[0]" value="<?php echo (isset($get[$rows_option['code_o']][0]))?$get[$rows_option['code_o']][0]:'';?>" />
             <?php } ?>
             <?php } ?>
             <?php  if($lib_func->jsonId($rows_option['option_o'],'type')=='select'){ ?>
             <?php if ($rows_option['code_o']=='category') { ?>
             <select style="width:30%;margin-left:1%;margin-right:1%" class="custom-select d-block col-lg-4" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Category) ?>" tabindex="1">
                <option value=""><?php echo _t(_Category) ?></option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
             </select>
    <?php } ?>
    <?php if ($rows_option['code_o']=='symbol') { ?>
    <select style="width:23%" class="custom-select d-block col-lg-4" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Symbol) ?>" tabindex="1">
                <option value=""><?php echo _t(_Symbol) ?></option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
             </select>
     <?php } ?>
     <?php if ($rows_option['code_o']=='the_company_provided_the_service') { ?>
    <select style="width:49%" class="custom-select d-block col-lg-4" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Thecompanyprovidedtheservice) ?>" tabindex="1">
                <option value=""><?php echo _t(_Thecompanyprovidedtheservice) ?></option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
             </select>

     <?php } ?>
          <?php } ?>
     <?php }} ?>





    </div>
  </div>
</section>

  <!-- Car Details -->
    <section class="car-detail" dir="<?php echo $_dir; ?>">
      <div class="container">
        <div class="car-image-head">
          <p class="car-type inline"><?=_AddAdTitle40characters?></p>
          <p class="price inline hvr-bob"><span class="num-bd">00,000</span> <?=_AED?></p>
          <small class="text-muted">04:23am | 12 Oct, 2017</small>
          <div class="basic-details">
            <ul class="list-inline">
              <li class="detail col-md-3 hvr-bob"><i class="fa fa-dashboard"></i><span class="detail-km num-bd">95,000</span> <?=_kilometer?></li>
              <li class="detail col-md-3 hvr-bob"><i class="fa fa-calendar fa-1"></i><span class="detail-make num-bd">2012</span></li>
              <li class="detail detail-place col-md-3 hvr-bob"><i class="fa fa-map-marker"></i>القوز | دبي</li>

              <li dir="<?php echo($dir); ?>" class="detail detail-phone num-bd col-md-3 hvr-bob"><?=$phoneuser?><i class="fa fa-mobile"></i></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <div class="car-images">
        <div class="container">
            <ul id="vertical" class="list-unstyled">
              
              
                <?php
                // just 4 pictures for the Ad

                for($i=0;$i<4;$i++){?>
                    <li id="imgThumb<?=$i.$rows_option['id_o']?>"
                        data-thumb="<?=$path['template']?>img/Rectangle47.png">

                        <input style="display: none;" type="file"
                               onchange="return UploatImages('images<?=$i.$rows_option['id_o']?>','.loadUpload<?=$i.$rows_option['id_o']?>','.imgUpload<?=$i.$rows_option['id_o']?>','<?=$rows_option['code_o']?>[]','clicko img-responsive',300,300,'imgThumb<?=$i.$rows_option['id_o']?>');"
                               name="images<?=$i.$rows_option['id_o']?>"
                               id="images<?=$i.$rows_option['id_o']?>" />

                        <button type="button" id="btn<?=$i?>" onclick="openBrowseDialog('images<?=$i.$rows_option['id_o']?>')"><?=_Uploadaphoto?></button>
                        <span class="help-inline"><?php echo isset($error[$rows_option['code_o']])?$error[$rows_option['code_o']]:''; ?> </span>
                        <div class="imgUpload<?=$i.$rows_option['id_o']?>">
                            <span class="loadUpload<?=$i.$rows_option['id_o']?>"></span>
                        </div>


                    </li>
                <?php
                }
                ?>
                
            </ul>
        </div>
    </div>

  <!-- Information -->
<div class="container">
  <section class="information" id="boat" dir="<?php echo $_dir; ?>">
    <div class="container">
      <h2><?=_Maininformation?></h2>


      <div class="half-info col-lg-6 col-md-6 col-sm-6 col-xs-6" >
        <?php
      foreach($data_category as $rows_values){

       foreach ($_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option){
             if($lib_func->jsonId($rows_option['option_o'],'admin')==1){continue;}
                $litForce=($lib_func->jsonId($rows_option['option_o'],'force')==1)?'<span style="color:red">*</span>':'';
            if($lib_func->jsonId($rows_option['option_o'],'type')=='select'){
            if ($rows_option['code_o']=='fuel') {

        ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>
        <?php if($rows_option['code_o']=='case'){
          ?>

        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
        </select>


        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>

        <?php if ($rows_option['code_o']=='claas_car') {
          
        ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):
         
          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
        </select>
        
        
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>
        <?php if ($rows_option['code_o']=='motive') {
          
        ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):
         
          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
        </select>
        
        
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>
        <?php if ($rows_option['code_o']=='Outside') {
          
        ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):
         
          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
        </select>
        
        
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>
        <?php if ($rows_option['code_o']=='howmuchload') { ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3"  name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>

       <?php if ($rows_option['code_o']=='enginepower') { ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?><?php echo('&nbsp;') ?><?=_Horsepower?></option>
               <?php endforeach; ?>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>

        <?php if ($rows_option['code_o']=='enginespeed') { ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?><?php echo('&nbsp;') ?><?=_kmperho?></option>
               <?php endforeach; ?>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>
        <?php if ($rows_option['code_o']=='lengthoftheboat') { ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?><?php echo('&nbsp;') ?><?=_Meter?></option>
               <?php endforeach; ?>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>
        <?php if ($rows_option['code_o']=='thecaseoftheboat') { ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?><?php echo('&nbsp;') ?></option>
               <?php endforeach; ?>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>
        <?php if ($rows_option['code_o']=='numberselender') { ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?><?php echo('&nbsp;') ?></option>
               <?php endforeach; ?>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>
        <?php if ($rows_option['code_o']=='transmission') { ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?><?php echo('&nbsp;') ?></option>
               <?php endforeach; ?>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>
        <?php if ($rows_option['code_o']=='bikecase') { ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?><?php echo('&nbsp;') ?></option>
               <?php endforeach; ?>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>
        <?php if ($rows_option['code_o']=='thecaseofthetruck') { ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?><?php echo('&nbsp;') ?></option>
               <?php endforeach; ?>
        </select>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>
        <?php }}}  ?>

      </div>
      <div class="half-info col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <?php
      foreach($data_category as $rows_values){

       foreach ($_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option){
             if($lib_func->jsonId($rows_option['option_o'],'admin')==1){continue;}
                $litForce=($lib_func->jsonId($rows_option['option_o'],'force')==1)?'<span style="color:red">*</span>':'';
   ?>


     <?php if($lib_func->jsonId($rows_option['option_o'],'default')==1){
      if($rows_option['code_o']=='years'){
      ?>
      <div class="symbol-container">
        <select class="custom-select d-block my-3" name="years"  data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                <?php for($year=date("Y") ; $year > 1970; $year--){ ?>
                <option  <?php echo (isset($get[$rows_option['code_o']]))? $lib_func->selected($get[$rows_option['code_o']],$year):'';?> value="<?php echo $year; ?>"><?php echo  $year; ?></option>
             <?php } ?>
             </select>
            <?php echo isset($error['years'])?' <span class="help-inline badge badge-error">'.$error['years'].'</span>':''; ?>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
      <?php } ?>
      <?php
      if($rows_option['code_o']=='type_c'){
      ?>

        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="type_c"  tabindex="1" onchange="return changeselect(this,'typecar','#subtype') ">
          <option value=""><?php echo _t(_Type) ?> </option>
                <?php foreach($_typecar->getTypeAll(array('category'=>$rows_values['category_id'])) as $rowstype ): ?>
                <option <?php echo (isset($get[$rows_option['code_o']]))? $lib_func->selected($get[$rows_option['code_o']],$rowstype['id_t']):'';?> value="<?php echo $rowstype['id_t']; ?>"><?php echo  language::getLang($rowstype['name_t']); ?></option>
             <?php endforeach; ?>
        </select>
        <?php echo isset($error['type_c'])?' <span class="help-inline badge badge-error">'.$error['type_c'].'</span>':''; ?>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="model" id="subtype" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>

<?php if(isset($get['model'])){ foreach($_typecar->getTypeSubId($get['type_c']) as $rowstypesub ): ?>
                <option <?php echo ($lib_func->selected($get['model'],$rowstypesub['id_t']));?> value="<?php echo $rowstypesub['id_t']; ?>"><?php echo  language::getLang($rowstypesub['name_t']); ?></option>
             <?php endforeach; } ?>
        </select>
        <?php echo isset($error['model'])?$error['model']:''; ?>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php }?>
        <?php if($rows_option['code_o']=='Country_c'){

          ?>
          <div class="symbol-container">
        <select class="custom-select d-block my-3" name="Country_c" onchange="return changeselect(this,'city','#subcity') "  data-placeholder="<?php echo _t(_Country) ?>" tabindex="1">
                <option value=""><?php echo _t(_Country) ?></option>
             <?php foreach($_city->getCountryAll() as $rowscity ): ?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$rowscity['id_c']):'';?> value="<?php echo $rowscity['id_c']; ?>"><?php echo language::getLang($rowscity['name_c']); ?></option>
             <?php endforeach; ?>
             </select>
        <span class="help-inline"><?php echo isset($error['Country_c'])?$error['Country_c']:''; ?> </span>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="city" id="subcity" data-placeholder="<?php echo _t(_City) ?>" tabindex="1">
                <option value=""><?php echo _t(_City) ?></option>
            <?php if(isset($get['city'])){ foreach($_city->getCityId($get['Country_c']) as $rowsc ): ?>
                <option <?php echo ($lib_func->selected($get['city'],$rowsc['id_c']));?> value="<?php echo $rowsc['id_c']; ?>"><?php echo  language::getLang($rowsc['name_c']); ?></option>
             <?php endforeach;} ?>
             </select>
        <span class="help-inline"><?php echo isset($error['city'])?$error['city']:''; ?> </span>
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php }}else{
            if($lib_func->jsonId($rows_option['option_o'],'type')=='select'){
          ?>
        <?php if ($rows_option['code_o']=='color') {

        ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):

          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
        </select>


        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>

        <?php if ($rows_option['code_o']=='supplier') {
          
        ?>
        <div class="symbol-container">
        <select class="custom-select d-block my-3" name="<?php echo $rows_option['code_o']; ?>" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
          <option value=""><?php echo  language::getLang($rows_option['name_o']); ?> </option>
                 <?php foreach($_option->get_value_option(array('option_id'=>$rows_option['id_o'])) as $rowsform):
         
          ?>
                  <?php $valuer= ($rowsform['type_v']!=''  and $rowsform['type_v']!=0 )?$rowsform['type_v']:$rowsform['id_v'];?>
                <option <?php echo (isset($get[$rows_option['code_o']]) )? $lib_func->selected($get[$rows_option['code_o']],$valuer):'';?> value="<?php echo $valuer; ?>"><?php echo language::getLang($rowsform['value_v']);?></option>
               <?php endforeach; ?>
        </select>
        
        
        <i class="fa fa-angle-down fa-lg"></i>
        </div>
        <?php } ?>
        <?php }}}}   ?>

      </div>
      <?php
      foreach($data_category as $rows_values){

       foreach ($_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option){
             if($lib_func->jsonId($rows_option['option_o'],'admin')==1){continue;}
                $litForce=($lib_func->jsonId($rows_option['option_o'],'force')==1)?'<span style="color:red">*</span>':'';


        ?>
      <?php if($lib_func->jsonId($rows_option['option_o'],'type')=='textarea') {
          if ($rows_option['code_o']=='specifications'){
        ?>
      <textarea class="col-lg-12" name="<?php echo $rows_option['code_o']; ?>" maxlength="150" placeholder="<?=_AdditionalInformation150characters?>" ></textarea>
      <?php }} ?>
      <?php }} ?>
    </div>
  </section>

</div>
  <!-- Publish -->

  <section class="publish" dir="<?php echo $_dir; ?>">
    <div class="container">
      <div>
      <button type="submit" class="btn btn1 col-lg-6"><?=_PutAd?></button>
      <!--<button class="btn btn2 col-lg-6">عرض الإعلان</button>-->
      <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
         <input type="hidden" name="add" value='1' />
      </div>
    </div>
  </section>
</form>
  <!-- Advertise -->


<!-- Scripts -->

<script src="<?php echo $path['template'];?>lib/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo $path['template'];?>lib/js/script1.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
        $('#vertical').lightSlider({
          gallery:true,
          item:1,
          vertical:true,
          verticalHeight:650,
          vThumbWidth:225,
          thumbItem:4,
          thumbMargin:4,
          slideMargin:0
        });
      });
      </script>
</body>
</html>
