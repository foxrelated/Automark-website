<aside class="col-sm-3 col-sm-pull-9 sidebar-offcanvas ">

		<div class="add-cars">
            <div class="col-xs-4">
            			<i class="pull-right fa fa-gavel size30"></i>
            </div>
			<div class="col-xs-8">
                <div class=" font-add-car text-left">
                            <a href="<?php echo $path['urlsite'] ?>cars/mycars/add">
                                <?php echo _t(_Addannouncement);?>

                            </a>
                </div>    
            </div>
			
			<div class="clear"></div>
		</div>
    
    <div class="add-cars">
            
        <h3 class="linetitlelogin">
            
            <i class="fa fa-smile-o size30" aria-hidden="true"></i>
   <?php echo _t(_Clientarea);?>
            
            </h3>
                    <a href="#" class="alert-link"><?php //echo _t("X");?></a>

     <!--SING IN FORM EXAMPLE-->
         <?php if(!isset($lib_user_data['id_u']) and $lib_user_data['id_u']==''){?>
            <form  method="post" action="<?php echo $path['urlsite'] ?>users/login" class="form-horizontal">

                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="text" class="form-control" name="username" value="<?php echo isset($get['username'])?$lib_seurty->tities($get['username']):'';?>" id="inputName" placeholder="<?php echo _t(_Username); ?>">
                        <span class="help-inline"><?php echo isset($error['username'])?$error['username']:'' ?></span>
                     </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="password" class="form-control"  name="password" id="inputPassword" placeholder="<?php echo _t(_Password); ?>">

                            <span class="help-inline"><?php echo isset($error['password'])?$error['password']:'' ?></span>
                       <div class="checkbox">
                            <label>
                                <input type="checkbox">
                                <?php echo _t(_Rememberme); ?>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default pull-right"><?php echo _t(_Login); ?></button>
                    </div>
                </div>
                        <input type="hidden" name="login" value="1" />
                        <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />

            </form>
<?php }else{?>
   <h3> 
     <?php echo _t(_Welcome);?>
     
       <?php echo $lib_user_data['name_u']; ?>
       </h3>
        <ul class="list-group">
                    
                               <li class="list-group-item"><a href="<?php echo $path['urlsite'] ?>cars/mycars/"><?php echo _t(_Advertisingmanagement);?> </a> </li>
                               <li class="list-group-item">
                                   <a href="<?php echo $path['urlsite'] ?>chat/">                                                           <?php echo _t(_Messages);?> 
                                          <span class="badge"> 
                                                     <?php echo $lib_chat->getCountChats(array('status'=>1,'dataOr'=>$lib_user_data['id_u'],'send'=>$lib_user_data['id_u'])); ?></span>
                                   </a>
                                </li>
                               <li class="list-group-item"><a href="<?php echo $path['urlsite'] ?>cars/mycars/add"><?php echo _t(_Addannouncement);?></a> </li>
                               <li class="list-group-item"><a href="<?php echo $path['urlsite'] ?>users/"><?php echo _t(_Yourpersonaldata);?></a> </li>
                  			   <li class="list-group-item"><a href="<?php echo $path['urlsite'] ?>users/login/logout/"><?php echo _t(_Signout);?></a> </li>

                      
                    </ul>
<?php }?>
        
			<div class="clear"></div>
		</div>


<div class="">

		<div class="title-cars" style="text-align:center">
			
			<div class=" font-title-car"><i class="fa fa-car size10"></i> <?php echo _t(_Typesofcars);?></div>
			<div class="clear"></div>
		</div>

 <div >
                <ul class="list-cars-right thumbnails">

 <?php foreach($lib_typecar->getTypeAll(array()) as $type){ ?>

        <li class="thumbnail">
			<a href="<?php echo $path['urlsite'] ?>cars/index/model/<?php echo $type['id_t'];?>"><img  width="65" src="<?php echo $path['thumb'].'thumb_'.$type['images_t']; ?>"></a>
		</li>
      <?php } ?>
	</ul>
	<div class="clear"></div>
</div>

</div>


	    <div class="add-cars">
            
        <h3 class="linetitlelogin">
            
            <i class="fa fa-unsorted size10" aria-hidden="true"></i>
   <?php echo _t(_Commissionaccount);?>
            
            </h3>
                    <a href="#" class="alert-link"><?php //echo _t("X");?></a>

     <!--SING IN FORM EXAMPLE-->
            
           
            <form  method="post"  class="form-horizontal">
 
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="text" class="form-control" name="priceval"  id="priceval" placeholder="<?php echo _t(_Enterthetotalvalue); ?>">
                        <span class="help-inline"><?php echo isset($error['username'])?$error['username']:'' ?></span>
                     </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <span id="price_val"></span>
                        <button type="submit" id="get_price" class="btn btn-default pull-right"><?php echo _t(_Commissionvalue); ?></button>
                    </div>
                </div>

            </form>

        
			<div class="clear"></div>
		</div>


	</aside>
