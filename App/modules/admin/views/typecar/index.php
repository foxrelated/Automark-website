 <div class="row-fluid">


    <div class="span12">
      <div class="social-box">
          <div class="header">
              <h4>الموديلات</h4>
          </div>
          <div class="body">

            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>اسم الموديل</th>

                  <th>الاعدادات</th>
                </tr>
              </thead>
              <tbody>
               <?php foreach($rowstypeSql as $countyall){?>
                <tr class="success">
                  <td><span class="badge badge-info"><?php  echo $countyall['id_t'] ?></span></td>
                  <td><?php  echo language::getLang($countyall['name_t']) ?></td>

                  <td><a href="<?php echo $path['urladmin']  ?>/typecar/remove/sq/<?php echo $countyall['id_t']; ?>">حذف</a> -
                     <a href="<?php echo $path['urladmin']  ?>/typecar/edit/<?php echo $countyall['id_t']; ?>">تعديل</a>
                  </td>
                </tr>
                <?php  if(count($data_type->getTypeSubId($countyall['id_t']))){?>

                        <?php foreach($data_type->getTypeSubId($countyall['id_t']) as $rowsCity){?>

                            <tr class="info">
                                <td><span class="badge badge-success"> <i class="icon-minus"></i> &nbsp;&nbsp;<?php  //echo $rowsCity['id_c'] ?></span></td>
                                <td><?php  echo language::getLang($rowsCity['name_t']) ?></td>

                                <td><a href="<?php echo $path['urladmin']  ?>/typecar/remove/sub/<?php echo $rowsCity['id_t']; ?>">حذف</a>-
                                  <a href="<?php echo $path['urladmin']  ?>/typecar/edit/<?php echo $rowsCity['id_t']; ?>">تعديل</a>
                                </td>
                            </tr>

                     <?php  } ?>

                            <?php  } ?>
               <?php  } ?>
              </tbody>
            </table>

          </div>
      </div>
    </div>
    <!-- END ZEBRA-STRIPING TABLE EXAMPLE -->
  </div>
