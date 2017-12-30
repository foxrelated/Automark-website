<div id="alertacceptmazad" class="alert alert-info " style="display:none;" role="alert" ><?=_PleaseWait?></div>
<form action="" id="submitacceptmazad" method="post">

<div class="row">
       
          <div class="form-group">
            <label for="input3" class="col-sm-3 control-label title"><?php echo _t(_AdDetails); ?></label>
                  <div class="col-sm-7">
                      <?php echo _t(_Advertisingnumber); ?> : <?php echo $data['data_mazad']['cars_id'] ?><br />
                      <?php echo _t(_AdName); ?> : <?php echo $data['data_mazad']['title_c'] ?><br />
                      <?php echo _t(_Agreedprice); ?> : <?php echo $data['data_mazad']['price_mazad'] ?><br />
                      <?php echo _t(_Member); ?> : <?php echo $data['data_mazad']['name_u'] ?>
                    
                </div>
            <span class="help-inline"></span>
           </div> 
            <div class="form-group">
            <label for="input3" class="col-sm-3 control-label title"><?php echo _t(_Doyouagreetobid); ?></label>
                  <div class="col-sm-7">
                        <input type="radio" class=""   value="1" name="type_ss" /><?php echo _t(_YesIagree); ?>
                    <br />
 					    <input type="radio" class=""   value="2" name="type_ss" /><?php echo _t(_Notagree); ?>
                </div>
            <span class="help-inline"></span>
           </div>
          <div class="form-group">
                  <label for="input3" class="col-sm-3 control-label title"><?php echo _t(_Messagetomember); ?></label>
                  <div class="col-sm-7">
                    <textarea rows="5" name="subject"  class="form-control">
                    <?php echo _t(_Advertisingnumber); ?> : <?php echo $data['data_mazad']['cars_id'] ?>
                      <?php echo _t(_AdName); ?> : <?php echo $data['data_mazad']['title_c'] ?>
                      <?php echo _t(_Agreedprice); ?> : <?php echo $data['data_mazad']['price_mazad'] ?>
                      <?php echo _t(_Member); ?> : <?php echo $data['data_mazad']['name_u'] ?></textarea>
                    
                   </div>
                     <span class="help-inline"></span>
           </div>
         
                    <input type="hidden" name="cars_id" value="<?php echo   $data['cars_id']; ?>" />
                    <input type="hidden" name="mazad_id" value="<?php echo   $data['mazad_id']; ?>" />
                    <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
                    <input type="hidden" name="add" value='accept' />
   
</div>


<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=_Close?></button>
        <button type="button" id="mazss" class="btn btn-primary"><?=_Send?></button>
      </div>
</form>