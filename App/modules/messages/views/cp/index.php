 <div class="row-fluid">


    <div class="span12">
      <div class="social-box">
          <div class="header">
              <h4><?=_CarRentalrequests?></h4>
          </div>
          <div class="body">
             <form action="" method="post">
            <table class="table table-striped">
              <thead>
                <tr>
                <td>#</td>
                  <td><?=_Thedriversname?></td>
                  <td><?=_Age?></td>
                   <td><?=_Email?></td>
                   <td><?=_Cellphone?></td>
                   <td><?=_Receiveddate?></td>
                  <td><?=_Deliverydate?></td>
                  <td><?=_Settings??></td>
                </tr>
              </thead>
              <tbody>
                    <?php foreach($_cp->getTentAll() as $rows){ $lib_func->jsonRes($rows['subject']);   ?>
              <tr <?php echo ($rows['status']==0)?'class="info"':'class="success"' ?> >
                  <td><input type="checkbox" value="<?php echo $rows['id']; ?>" name="status[]" /></td>
                  <td><?php echo $lib_func->jRes('name'); ?> <?php echo $lib_func->jRes('lastname'); ?></td>
                  <td><?php echo $lib_func->jRes('age'); ?></td>
                  <td><?php echo $lib_func->jRes('email'); ?></td>
                  <td><?php echo $lib_func->jRes('mobile'); ?></td>
                  <td><?php echo $lib_func->jRes('datestart')->date; ?> <?php echo $lib_func->jRes('datestart')->time; ?></td>
                  <td><?php echo $lib_func->jRes('dateend')->date; ?> <?php echo $lib_func->jRes('dateend')->time; ?></td>
                  <td><a href="<?php echo $path['urlsite']  ?>/messages/cp/remove/<?php echo $rows['id']; ?>"><?=_Delete?></a>  |
				  <a  href="<?php echo $path['urlsite']  ?>/messages/cp/send/<?php echo $rows['id']; ?>"><?=_Sendamessage?></a>  |
				  <a target="_blank"href="<?php echo $path['urlsite']  ?>cars/index/id/<?php echo $lib_func->jRes('id'); ?>"><?=_VehicleInformation?></a>
                  <br>
                   <?php echo $lib_lang->carsStatus($rows['status']); ?>
				  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <select class="span3"  name="type" id="subtype" data-placeholder="<?php echo _t(_Choose) ?>" tabindex="1">
                <option value=""><?php echo _t(_Choose) ?></option>
                <option value="act"><?php echo _t(_Reservationconfirmation) ?></option>
                <option value="des"><?php echo _t(_Rejectionofthereservation) ?></option>


             </select>
               <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
                 <input type="hidden" name="edit" value='1' />
              <input type="submit" value="<?php echo _t('تعديل') ?>" class="btn btn-primary" />

             </form>
          </div>
      </div>
    </div>
    <!-- END ZEBRA-STRIPING TABLE EXAMPLE -->
  </div>
