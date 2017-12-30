 <div class="row-fluid">


    <div class="span12">
      <div class="social-box">
          <div class="header">
              <h4>ادارة الاعضاء</h4>
          </div>
          <div class="body">

            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>الاسم </th>
                  <th>البريد</th>
                  <th>تاريخ الانضمام</th>
                  <th>الاعدادات</th>
                </tr>
              </thead>
              <tbody>
               <?php foreach($data_users->getAll() as $usersall){?>
                <tr class="success">
                  <td><span class="badge badge-info"><?php  echo $usersall['id_u'] ?></span></td>
                  <td><?php  echo $usersall['username'] ?></td>
                  <td><?php  echo $usersall['email_u'] ?></td>
                  <td><?php  echo $usersall['joined_u'] ?></td>
                    <td><a onclick="return imagesdlet(this);" href="<?php echo $path['urladmin']  ?>users/remove/<?php echo $usersall['id_u']; ?>">حذف</a>
                    -
                    <a href="<?php echo $path['urladmin']  ?>users/edit/<?php echo $usersall['id_u']; ?>">تعديل</a>
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
