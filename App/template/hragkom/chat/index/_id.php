
<div class="col-sm-4">

              <ul class="list-group">
  
   
  

     <?php $numx=0; foreach($_chat as $rowschat){ $numx++; ?> 
          <li class="list-group-item">
                    <div class="listborder2">
                  <div class="">
                                <div class="col-sm-1"> 
                                   <!-- <a class="iframe" href="<?php echo $path['urlsite'] ?>chat/index/_c/<?php echo $rowschat['sub_id'];?>">
                                        <img src="<?php echo $path['upload'].$rowschat['image_u']; ?>" width="100%" height="" style="max-height:110px;    margin-bottom: 10px;" class="thumbnail" alt="">
                                    </a>-->                                     
                                </div>                                 
                                <div class="col-sm-11"> 
                                    <div class="listsaleupcart"> 
                                        <div class="col-sm-12">
                                            <h3 class="title cneworold">
                                                 <a href="<?php echo $path['urlsite'] ?>chat/index/_c/<?php echo $rowschat['sub_id'];?>">
                                                     <?php echo $rowschat['title_chat'];?>
                                                 </a>
                                            </h3> 
                                            <h5 class="sectionlist">
                                                    <span class="badge"> 
                                                     <?php echo $lib_chat->getCountChats(array('status'=>1,'sub'=>$rowschat['sub_id'],'send'=>$lib_user_data['id_u'])); ?></span>
                                                 <a  href="<?php echo $path['urlsite'] ?>chat/index/_c/<?php echo $rowschat['sub_id'];?>"><?php echo $rowschat['message_chat'] ?>
                                                </a></h5> 
                                        </div>
                                         <div class="col-sm-12"> 
                                            <div class="ratsubstar text-center"> 
                                                <div class="row"> 

                                                    <div class="col-sm-12"> 
                                                        <div class="date"> 
                                                            
                                                           <?php echo $rowschat['time_chat'] ?>
                                                            
                                                        </div>                                                     
                                                    </div> 
                                                    <div class="col-sm-12"> 
                                                        <div class="status"></div>
                                                    </div> 
                                                </div>                                             
                                            </div>  
                                        </div>  
                                        
                                                                  
                                                                         
                                </div>                                 
        </div>
        <!-- /.row -->
                 </div> 
                        <div class="clear"></div>
                 </div> 
             </li>
     <?php } ?>
            </ul>
        


</div>
 <div class="col-sm-8">
     <section id="content-3-11" class="content-block content-3-11" data-pg-collapsed>
         
   <div class="clear"></div>    
<div id="chatContainer">

    <div id="chatTopBar" class="rounded"></div>
    <div id="chatLineHolder"></div>
    
    <div id="chatUsers" class="rounded"></div>
    <div id="chatBottomBar" class="rounded">
    	<div class="tip"></div>
        
        <form id="loginForm" method="post" action="">
            <input id="name" name="sender" value="<?php echo (isset($show_meta_chat[0]['sender_id']))?$show_meta_chat[0]['sender_id']:$lib_user_data['id_u']; ?>" type="hidden"  />
            <input id="email" name="user" value="<?php echo $show_meta_chat[0]['user_id']; ?>" type="hidden"  />
            <input id="subi" name="sub" value="<?php echo $_idchat; ?>" type="hidden"  />
            <input id="chatTexttt" name="chatText" class="rounded" maxlength="255" />
            <input type="submit" class="blueButton" value="ارسال" />
        </form>
        
        <form id="submitForm" method="post" action="">
            <input id="sender" name="sender" value="<?php echo (isset($show_meta_chat[0]['sender_id']))?$show_meta_chat[0]['sender_id']:$lib_user_data['id_u']; ?>" type="hidden"  />
            <input id="user" name="user" value="<?php echo (isset($show_meta_chat[0]['user_id']))?$show_meta_chat[0]['user_id']:$_iduser; ?>" type="hidden"  />
            <input id="sub" name="sub" value="<?php echo $_idchat; ?>" type="hidden"  />
            <input id="chatText" name="chatText" class="rounded" maxlength="255" />
            <input type="submit" class="blueButton" value="ارسال" />
        </form>
        
    </div>
    
</div>


</section>

     
</div>

