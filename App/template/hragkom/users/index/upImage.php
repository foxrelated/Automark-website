<div class="col-sm-12">
    <?php echo (isset($error['msg']))?$error['msg']:'' ; ?>


        	<div class="weight-cars">
				<div class="bs-example-bg-classes">
					<p class="bg-primary title"><?php echo _t(_Uploadapersonalphoto);?></p>
				</div>
                 <form action="" method="post">
                           
                             
                       <div class="form-group">
          <label for="input3" class="col-sm-3 control-label title"><?=_Upload?></label>
           <div class="col-sm-7">
                        <input type="file" onchange="return UploatImages('images','.loadUpload','.imgUpload','imageuser');" name="images" id="images" />
						<button style="display:none;" type="submit" id="btn">Upload Image</button>
                          <span class="help-inline"><?php echo isset($get['imageuser'])?$error[$get['imageuser']]:''; ?> </span>
						<div class="imgUpload"><span class="loadUpload"></span>
                        
                        <?php  if(isset($get['imageuser']) and count($get['imageuser'])){?>
										<a onclick='return imagesdlet(this);' href='#'>
										<img  align='right' src='<?php echo $path['upload']; ?>thumb/thumb_<?php echo $get['imageuser']; ?>' />
										<input type='hidden' name='imageuser' value='<?php echo $get['imageuser']; ?>' /></a>

							<?php } ?>
                            
                        </div>
                            
								  
          </div>
       </div>      


                 <div class="form-group">
                     <input type="submit" class="btn btn-primary left"  value="<?php echo _t("تعديل"); ?>" />
                </div>
              <input type="hidden" name="edit" value="1" />
              <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
                   </form>
	</div>
   </div>
