
<form action="" method="post">
   <div class="row-fluid">
        <!-- BEGIN SELECT SECTION -->
        <div class="span12">
            <div class="social-box">
    <div class="header">
        <h4><?php echo _t('ادارة الموقع') ?></h4>
    </div>
    <div class="body">

        <ul id="myTab" class="nav nav-tabs">
          <li class="active"><a href="#home" data-toggle="tab"><i class="icon-home"></i> الاعدادات العامة</a></li>
		  <li><a href="#footerinf" data-toggle="tab"><i class="icon-user"></i> معلومات الفوتر</a></li>
          <li><a href="#securty" data-toggle="tab"><i class="icon-user"></i> الحماية</a></li>
          <li><a href="#lang" data-toggle="tab"><i class="icon-user"></i> اعدادات اللغه و العملة</a></li>
          <li><a href="#style" data-toggle="tab"><i class="icon-user"></i> التصميم</a></li>
         
         
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade in active" id="home">
            <div class="control-group">
              <label class="control-label"><?php echo _t('اسم الموقع') ?></label>
              <div class="controls">
                 <input type="text" class="span7" name="title_site" value="<?php echo $_option->getNameId('title_site');?>" />

              </div>
           </div>
            <div class="control-group">
              <label class="control-label"><?php echo _t('رابط الموقع') ?></label>
              <div class="controls">
                 <input type="text" class="span7" name="url_site" value="<?php echo $_option->getNameId('url_site');?>" />

              </div>
           </div>
           <div class="control-group">
              <label class="control-label"><?php echo _t('البريد الرسمى') ?></label>
              <div class="controls">
                <input type="text" class="span7" name="email_admin" value="<?php echo $_option->getNameId('email_admin');?>" />

              </div>
           </div>
            <div class="control-group">
              <label class="control-label"><?php echo _t('الكلمات الدليلية') ?></label>
              <div class="controls">
                 <input type="text" class="span7" name="key_site" value="<?php echo $_option->getNameId('key_site');?>" />

              </div>
           </div>
<div class="control-group">
              <label class="control-label"><?php echo _t('تفعيل التعليقات') ?></label>
              <div class="controls">
			  
                 <input type="radio" class=""  <?php echo $lib_func->checked($_option->getNameId('active_comment'), '3');?> value="3" name="active_comment" /> ايقاف التعليقات 
                 <br />

                 <input type="radio" class="" <?php echo $lib_func->checked($_option->getNameId('active_comment'), '2');?> value="2" name="active_comment" /> تفعيل التعليقات للاعضاء فقط
<br />

<input type="radio" class="" <?php echo $lib_func->checked($_option->getNameId('active_comment'), '1');?> value="1" name="active_comment" />
تفعيل التعليقات للاعضاء والزوار
              </div>
           </div>
<div class="control-group">
              <label class="control-label"><?php echo _t('حاله مراجعه التعليقات') ?></label>
              <div class="controls">
			  
                 <input type="radio" class=""  <?php echo $lib_func->checked($_option->getNameId('actcomment'), '1');?> value="1" name="actcomment" /> نشر التعليق بدون مراجعه 
                 <br />

                 <input type="radio" class="" <?php echo $lib_func->checked($_option->getNameId('actcomment'), '0');?> value="0" name="actcomment" /> مراجعه التعليق قبل النشر

              </div>
           </div>

            <div class="control-group">
              <label class="control-label"><?php echo _t('وصف الموقعى') ?></label>
              <div class="controls">
                  <input type="text" class="span7" name="des_site" value="<?php echo $_option->getNameId('des_site');?>" />
              </div>
           </div>

            <div class="control-group">
              <label class="control-label"><?php echo _t('حالة الموقع') ?></label>
              <div class="controls">
			  
                 <input type="radio" class=""  <?php echo $lib_func->checked($_option->getNameId('act_site'), 'on');?> value="on" name="act_site" /> تفعيل
                 <br />

                 <input type="radio" class="" <?php echo $lib_func->checked($_option->getNameId('act_site'), 'off');?> value="off" name="act_site" />اغلاق 

              </div>
           </div>
		   <div class="control-group">
              <label class="control-label"><?php echo _t('رسالة اغلاق الموقع') ?></label>
              <div class="controls">
                  <input type="text" class="span7" name="message_act" value="<?php echo $_option->getNameId('message_act');?>" />
              </div>
           </div>
		   
           
           
          </div>
		     <div class="tab-pane fade" id="footerinf">
              <div class="control-group">
              <label class="control-label"><?php echo _t('الموقع') ?></label>
              <div class="controls">
                <input type="text" class="span7" name="location_footer" value="<?php echo $_option->getNameId('location_footer');?>" />

              </div>
           </div>
		   
		    <div class="control-group">
              <label class="control-label"><?php echo _t('اتصل بنا') ?></label>
              <div class="controls">
                <input type="text" class="span7" name="contact_footer" value="<?php echo $_option->getNameId('contact_footer');?>" />

              </div>
           </div>
		   
		   <div class="control-group">
              <label class="control-label"><?php echo _t('البريد') ?></label>
              <div class="controls">
                <input type="text" class="span7" name="email_footer" value="<?php echo $_option->getNameId('email_footer');?>" />

              </div>
           </div>
		   <hr />
		   <div class="control-group">
              <label class="control-label"><?php echo _t('الفيس بوك') ?></label>
              <div class="controls">
                <input type="text" class="span7" name="facebook_footer" value="<?php echo $_option->getNameId('facebook_footer');?>" />

              </div>
           </div>
		   <div class="control-group">
              <label class="control-label"><?php echo _t('google+') ?></label>
              <div class="controls">
                <input type="text" class="span7" name="google_footer" value="<?php echo $_option->getNameId('google_footer');?>" />

              </div>
           </div>
		   
		   <div class="control-group">
              <label class="control-label"><?php echo _t('تويتر') ?></label>
              <div class="controls">
                <input type="text" class="span7" name="twitter_footer" value="<?php echo $_option->getNameId('twitter_footer');?>" />

              </div>
           </div>
		   <div class="control-group">
              <label class="control-label"><?php echo _t('يوتيوب') ?></label>
              <div class="controls">
                <input type="text" class="span7" name="youtube_footer" value="<?php echo $_option->getNameId('youtube_footer');?>" />

              </div>
           </div>
		   
            </div>
          <div class="tab-pane fade" id="securty">
              <div class="control-group">
              <label class="control-label"><?php echo _t('اسم الجلسة') ?></label>
              <div class="controls">
                <input type="text" class="span7" name="session_name" value="<?php echo $_option->getNameId('session_name');?>" />

              </div>
           </div>
		   
		    <div class="control-group">
              <label class="control-label"><?php echo _t('اسم الجلسة') ?></label>
              <div class="controls">
                <input type="text" class="span7" name="session_name" value="<?php echo $_option->getNameId('session_name');?>" />

              </div>
           </div>
		   
		   <div class="control-group">
              <label class="control-label"><?php echo _t('token') ?></label>
              <div class="controls">
                <input type="text" class="span7" name="session_token" value="<?php echo $_option->getNameId('session_token');?>" />

              </div>
           </div>
		   
		   
            </div>
            
			<div class="tab-pane fade" id="lang">
            

			<div class="control-group">
              <label class="control-label"><?php echo _t('اللغه الافتراضية') ?></label>
              <div class="controls">
                  <select name="default_language">
				  <?php foreach(system::get("language_array") as $kayLang => $valueLang){?>
					<option <?php echo $lib_func->selected($_option->getNameId('default_language'),$kayLang); ?> value="<?php echo $kayLang ; ?>"><?php echo $valueLang['name'] ; ?></option>
					
				  <?php } ?>
				  </select>
              </div>
           </div>		  
			  
			     <div class="control-group">
              <label class="control-label"><?php echo _t('العملة الافتراضية') ?></label>
            	<?php 
				
				$xnum=1; foreach($language_array as $langk=>$langv){ ?>
                <div class="controls">
                      <label  class="span2"> <?php echo $language_array[$langk]['name'] ?></label>
					  <input type="text" class="span7" name="default_currency[<?php echo $langk; ?>]" value="<?php echo language::getLang($_option->getNameId('default_currency'),$langk) ;?>" />
                 </div>
                 <?php } ?>
                 
           </div>
			  
			  
            </div>
              <div class="tab-pane fade" id="style">
               
			   
			<div class="control-group">
              <label class="control-label"><?php echo _t('التصميم الافتراضى') ?></label>
              <div class="controls">
               <select name="default_style">
					<option <?php echo $lib_func->selected($_option->getNameId('default_style'),'hragkom'); ?> value="hragkom">تصميم حراج</option>
					
				  </select>
              </div>
           </div>
		   
		     <div class="control-group">
              <label class="control-label"><?php echo _t('الصفحه الرئيسية') ?></label>
              <div class="controls">
                  <select name="default_controller">
					<option <?php echo $lib_func->selected($_option->getNameId('default_controller'),'index'); ?> value="index">الرئيسية</option>
					<option <?php echo $lib_func->selected($_option->getNameId('default_controller'),'news'); ?> value="news">اخر الاخبار</option>
					<option  <?php echo $lib_func->selected($_option->getNameId('default_controller'),'cars'); ?> value="cars">السيارات</option>
				  </select>
              </div>
           </div>	
		   
		   
                </div>
              </div>
       
    </div>
</div>
        </div>
   <div class="span11">
		   <div class="form-actions">
				<button type="submit" class="btn btn-primary"><?php echo _t('تعديل') ?></button>
		  </div>
        </div>
        </div>

  <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
   <input type="hidden" name="edit" value='1' />
 </form>

