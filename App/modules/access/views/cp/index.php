 <div class="row-fluid">


    <div class="span12">
      <div class="social-box">
          <div class="header">
              <h4><?=_Allproductsareadded?></h4>
          </div>
          <div class="body">
             <form action="" method="post">
            <table class="table table-striped">
              <thead>
                <tr>
                <td>#</td>
                  <td><?=_Productname?></td>
                  <td><?=_Brand?></td>
                   <td><?=_Section?></td>
                   <td><?=_Price?></td>
                  <td><?=_Dateadded?></td>
                  <td><?=_Settings?></td>
                </tr>
              </thead>
              <tbody>
                    <?php foreach($_cp->getAll() as $rows){?>
              <tr <?php echo ($rows['act_a']==0)?'class="info"':'class="success"' ?> >
                  <td></td>
                  <td><?php echo $rows['name_a']; ?></td>
                  <td><?php echo $rows['marka_a']; ?></td>
                  <td><?php echo $rows['section_a']; ?></td>
                  <td><?php echo $rows['price_a']; ?></td>
                  <td><?php echo $rows['date_a']; ?></td>
                  <td><a href="<?php echo $path['urlsite']  ?>/access/cp/remove/<?php echo $rows['id_a']; ?>"><?=_Delete?></a>
				  -
				    <a href="<?php echo $path['urlsite']  ?>/access/cp/edit/<?php echo $rows['id_a']; ?>"><?=_Modification?></a>

				  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>


             </form>
          </div>
      </div>
    </div>
    <!-- END ZEBRA-STRIPING TABLE EXAMPLE -->
  </div>
