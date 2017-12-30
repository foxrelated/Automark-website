 <div class="row-fluid">


    <div class="span12">
      <div class="social-box">
          <div class="header">
              <h4>ادارة الصفحات</h4>
          </div>
          <div class="body">

            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>اسم الصفحه</th>
                  <th>ترتيب الصفحه</th>
                  <th>الاعدادات</th>
                </tr>
              </thead>
              <tbody>
               <?php foreach($data_pges->getAll() as $pagesall){?>
                <tr class="success">
                  <td><span class="badge badge-info"><?php  echo $pagesall['id_p'] ?></span></td>
                  <td><?php  echo $pagesall['name_p'] ?></td>
                  <td><?php  echo $pagesall['order_p'] ?></td>
                    <td>
                    <?php $r=(array(1,2,3,4,5)) ;if(!in_array($pagesall['id_p'],$r)){ ?><a href="<?php echo $path['urladmin']  ?>pages/remove/<?php echo $pagesall['id_p']; ?>">حذف</a><?php } ?>
                    <a href="<?php echo $path['urladmin']  ?>/pages/edit/<?php echo $pagesall['id_p']; ?>">تعديل</a>
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
