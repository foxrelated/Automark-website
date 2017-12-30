 <div class="row-fluid">


    <div class="span12">
      <div class="social-box">
          <div class="header">
              <h4>جميع المدن والدور</h4>
          </div>
          <div class="body">

            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>اسم المدينة</th>
                  <th>كود المدينة</th>
                  <th>الاعدادات</th>
                </tr>
              </thead>
              <tbody>
               <?php foreach($data_city->getCountryAll() as $countyall){?>
                <tr class="success">
                  <td><span class="badge badge-info"><?php  echo $countyall['id_c'] ?></span></td>
                  <td><?php  echo language::getLang($countyall['name_c']); ?></td>
                  <td><?php  echo $countyall['code_c'] ?></td>
                    <td>
                      <a href="<?php echo $path['urladmin']  ?>/city/remove/sq/<?php echo $countyall['id_c']; ?>">حذف</a>-
                      <a href="<?php echo $path['urladmin']  ?>/city/edit/<?php echo $countyall['id_c']; ?>">تعديل</a>
                    </td>

                </tr>
                <?php  if(count($data_city->getCityId($countyall['id_c']))){?>

                        <?php foreach($data_city->getCityId($countyall['id_c']) as $rowsCity){?>

                            <tr class="info">
                                <td><span class="badge badge-success"> <i class="icon-minus"></i> &nbsp;&nbsp;<?php  //echo $rowsCity['id_c'] ?></span></td>
                                <td><?php  echo language::getLang($rowsCity['name_c']) ?></td>
                                <td><?php  echo $rowsCity['code_c'] ?></td>
                                <td><a href="<?php echo $path['urladmin']  ?>/city/remove/sub/<?php echo $rowsCity['id_c']; ?>">حذف</a>-
                      <a href="<?php echo $path['urladmin']  ?>/city/edit/<?php echo $rowsCity['id_c']; ?>">تعديل</a></td>
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
