<div class="col-sm-9 col-sm-push-3">
    
    
    <section class="content-block team-2 team-2-2" data-pg-collapsed>
    <div class="">
        <div class="underlined-title ">
            <h1 class="text-center"><?php echo $_title;?> </h1>
            <hr>
        </div>
        <div class="">
       
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
                                <div class="col-sm-9"> 
                                    <div class="listsaleupcart"> 
                                        <div class="col-sm-7">
                                            <h3 class="title cneworold">
                                                 <a href="<?php echo $path['urlsite'] ?>chat/index/_c/<?php echo $rowschat['sub_id'];?>">
                                                     <?php echo $rowschat['title_chat'];?>
                                                 </a>
                                            </h3> 
                                            <h5 class="sectionlist">
                                                 <span class="badge"> 
                                                     <?php echo $lib_chat->getCountChats(array('status'=>1,'sub'=>$rowschat['sub_id'],'send'=>$lib_user_data['id_u'])); ?></span>

                                                 <a  href="<?php echo $path['urlsite'] ?>chat/index/_c/<?php echo $rowschat['sub_id'];?>">
                                                     <?php echo $rowschat['message_chat'] ?>
                                                </a></h5> 
                                        </div>
                                         <div class="col-sm-5"> 
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
        
            <!-- Large modal -->
<div class="modal fade activeuserprice" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><?=_Correspondence?></h4>
      </div>
      <div class="modal-body">
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
            
         <div class="clear"></div>
            <!-- /.gallery-item-wrapper -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>


</div>
