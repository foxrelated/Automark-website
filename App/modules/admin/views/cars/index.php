 <div class="row-fluid">


    <div class="span12">
      <div class="social-box">
          <div class="header">
              <h4>جميع السيارات المضافة</h4>
          </div>
          <div class="body">
             <form action="" method="post">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>رقم الاعلان</th>
                  <th>النوع</th>
                  <th>سنة الصنع</th>
                  <th>اسم المستخم</th>
                  <th>تاريخ الاضافة</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                    <?php foreach($_cars->getAll($_id,$_status) as $rowscars){?>
              <tr <?php echo ($rowscars['act_c']==0)?'class="info"':'class="success"' ?> >
                  <td><input type="checkbox" value="<?php echo $rowscars['id_c']; ?>" name="status[]" /></td>
                  <td><?php echo $rowscars['id_c']; ?></td>
                  <td><?php echo language::getLang($_typecar->getNameId($rowscars['type_c'])); ?></td>
                  <td><?php echo $rowscars['year_c']; ?></td>
                  <td><?php echo $lib_user->findName($rowscars['id_user'],'username'); ?></td>
                  <td><?php echo $rowscars['dateadd_c']; ?></td>
                  <td><a href="<?php echo $path['urladmin']  ?>/cars/remove/<?php echo $rowscars['id_c'];echo "/".$_id; ?>">حذف</a>
				  -
				    <a href="<?php echo $path['urladmin']  ?>/cars/edit/<?php echo $rowscars['id_c']; ?>">تعديل</a>-
                       <?php echo $lib_lang->carsStatus($rowscars['act_c']); ?>
				  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
               <select class="span3"  name="type" id="subtype" data-placeholder="<?php echo _t('اختر ') ?>" tabindex="1">
                <option value=""><?php echo _t('اختر ') ?></option>
                <option value="act"><?php echo _t('تفعيل ') ?></option>

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
