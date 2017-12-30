 <div class="row-fluid">


    <div class="span12">
      <div class="social-box">
          <div class="header">
              <h4>اضافة معرض جديد</h4>
          </div>
          <div class="body">

            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>اسم المعرض</th>

                  <th>الاعدادات</th>
                </tr>
              </thead>
              <tbody>
               <?php foreach($data_shows->getAll() as $rowsall){?>
                <tr >
                  <td><span class="badge badge-info"><?php  echo $rowsall['id_s'] ?></span></td>
                  <td><?php  echo $rowsall['name_s'] ?></td>

                  <td><a href="<?php echo $path['urladmin']  ?>/shows/remove/<?php echo $rowsall['id_s']; ?>">حذف</a>
                  -<a href="<?php echo $path['urladmin']  ?>/shows/edit/<?php echo $rowsall['id_s']; ?>">تعديل</a>
               
                  </td>
                </tr>

               <?php  } ?>
              </tbody>
            </table>

          </div>
      </div>
    </div>
    <!-- END ZEBRA-STRIPING TABLE EXAMPLE -->
  </div>
