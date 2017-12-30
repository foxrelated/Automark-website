 <div class="row-fluid">


    <div class="span12">
      <div class="social-box">
          <div class="header">
              <h4>ادارة المجموعات</h4>
          </div>
          <div class="body">

            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>اسم المجموعه </th>

                  <th>الاعدادات</th>
                </tr>
              </thead>
              <tbody>
               <?php foreach($data_users->getGroup() as $grouall){?>
                <tr class="success">
                  <td><span class="badge badge-info"><?php  echo $grouall['id_g'] ?></span></td>
                  <td><?php  echo $grouall['name_g'] ?></td>

                    <td>

                    <a href="<?php echo $path['urladmin']  ?>users/groupedit/<?php echo $grouall['id_g']; ?>">تعديل</a>

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
