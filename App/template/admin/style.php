<!DOCTYPE html>

<html>


<head>
    <meta charset="utf-8">
    <title>
      <?php echo _t("لوحة تحكم الادارة") ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="<?php echo $path['template'];?>img/favicon.ico" />
    <link rel="icon" type="image/gif" href="<?php echo $path['template'];?>img/favicon.gif">

        <link href="<?php echo $path['template'];?>css/twitter-bootstrap-rtl/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $path['template'];?>css/social-jquery-ui-1.10.0.custom.css" rel="stylesheet">
    <link href="<?php echo $path['template'];?>css/social-rtl.css" rel="stylesheet">
    <link href="<?php echo $path['template'];?>css/social.plugins-rtl.css" rel="stylesheet">
    <link href="<?php echo $path['template'];?>css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $path['template'];?>css/social-coloredicons-buttons.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="/templates/social/assets/css/social-jquery.ui.1.10.0.ie.css"/>
    <![endif]-->


    <link href="<?php echo $path['template'];?>css/demo.css" rel="stylesheet">
    <link href="<?php echo $path['template'];?>plugins/jquery.uipro/style.css" rel="stylesheet">
    <link href="<?php echo $path['template'];?>plugins/jquery.simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet">
    <link href="<?php echo $path['template'];?>css/themes/social.theme-blue.css" rel="stylesheet" id="theme">
    <link href="<?php echo $path['template'];?>css/twitter-bootstrap-rtl/bootstrap-responsive.css" rel="stylesheet">


  <link href="<?php echo $path['template'];?>/plugins/jquery.jqvmap/jqvmap.css" rel="stylesheet">
  <style>
    #justGaugeExamples{
      text-align: center;
      height: 300px;
    }
    #g1, #g2 {
      width:200px; height:160px;
      display: inline-block;
      margin-top: -5px;
      /*margin: 5px;*/
    }

    @media (max-width: 767px){
      .fix1{
        margin-right: 0!important;
      }
    }

  </style>
        <style>
      .wraper #main{
        margin-top: 40px;
      }
    </style>
    <!-- END STYLE CODES -->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="/templates/social/assets/plugins/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body class="rtl">

    <div class="wraper sidebar-full">

      <aside class="social-sidebar sidebar-full">

    <div class="social-sidebar-content">
        <div class="scrollable">

            <div class="user">
              <img class="avatar" width="25" height="25" src="<?php echo $path['template'];?>img/avatar-30.png" alt="Julio Marquez">
              <span><?php echo _t('اهلا بك يا ادمن') ?></span>
              <i class="icon-user trigger-user-settings"></i>
            </div>

              <div class="navigation-sidebar">
                <i class="switch-sidebar-icon icon-align-justify"></i>
                              </div>

            <section class="menu">

                <div class="accordion" id="accordion2">



                  <div class="accordion-group ">

                    <div class="accordion-heading">
                                              <a class="accordion-toggle " href="<?php echo $path['urladmin'];?>">

                                              <img src="<?php echo $path['template'];?>img/icons/stuttgart-icon-pack/32x32/home.png" alt="Dashboard">


                    <span>الصفحه الرئيسية </span><span class="badge">9</span>
                        </a>
                    </div>

                                      </div>

<?php foreach($db_category->getAll() as $rowsCategory){?>

	<div class="accordion-group">

			  <div class="accordion-heading">
				  <a class="accordion-toggle <?php  echo ($lib_request->getController()=='cars' and isset($_id) and $_id==$rowsCategory['id_ss'])?'opened':''; ?>" data-toggle="collapse" data-parent="#accordion2" href="#collapse-multi-level<?php echo $rowsCategory['id_ss']; ?>">
					  <i class="icon-sitemap icon-2"></i>
					  <span><?php echo language::getLang($rowsCategory['code_ss']); ?></span><span class="arrow"></span>
				  </a>
			  </div>

			  <ul id="collapse-multi-level<?php echo $rowsCategory['id_ss']; ?>" class="accordion-body nav nav-list collapse sub-menu  <?php  echo ($lib_request->getController()=='cars' and isset($_id) and $_id==$rowsCategory['id_ss'])?'in':''; ?>">

				<li ><a href="<?php echo $path['urladmin']; ?>/cars/add/<?php echo $rowsCategory['id_ss']; ?>"><?php echo _t('اضافة ') ?></a></li>
				<li><a href="<?php echo $path['urladmin']; ?>/cars/index/<?php echo $rowsCategory['id_ss']; ?>"> <?php echo _t('ادارة') ?></a></li>
				<li><a href="<?php echo $path['urladmin']; ?>/cars/index/<?php echo $rowsCategory['id_ss']; ?>/2"> <?php echo _t('اعلانات تم البيع') ?></a></li>
				<li><a href="<?php echo $path['urladmin']; ?>/cars/index/<?php echo $rowsCategory['id_ss']; ?>/3"> <?php echo _t('اعلانات منتهية') ?></a></li>
			   </ul>

	</div>
<?php } ?>
 
 

 
 
 
 <div class="accordion-group">
  <div class="accordion-heading">
      <a class="accordion-toggle <?php  echo ($lib_request->getController()=='typecar')?'opened':''; ?>" data-toggle="collapse" data-parent="#accordion2" href="#collapse-multi-type">
          <i class="icon-sitemap icon-2"></i>
          <span><?php echo _t('ادارة الموديلات') ?></span><span class="arrow"></span>
      </a>
  </div>
  <ul id="collapse-multi-type" class="accordion-body nav nav-list collapse sub-menu  <?php  echo ($lib_request->getController()=='typecar')?'in':''; ?>">
    <li ><a href="<?php echo $path['urladmin']; ?>/typecar/add"><?php echo _t('اضافة نوع') ?></a></li>
   
<?php foreach($db_category->getAll() as $rowsCategory){?> 
    <li><a href="<?php echo $path['urladmin']; ?>/typecar/index/<?php echo $rowsCategory['id_ss']; ?>"><?php echo _t('ادارة موديلات ') ?> - <?php echo language::getLang($rowsCategory['code_ss']); ?> </a></li>
  <?php } ?>  
    
   </ul>
</div>



                  <div class="accordion-group ">
                    <div class="accordion-heading">
                                              <a class="accordion-toggle <?php  echo ($lib_request->getController()=='city')?'opened':''; ?> " data-toggle="collapse" data-parent="#accordion2" href="#collapse-ui-city">
                                              <img src="<?php echo $path['template'];?>img/icons/stuttgart-icon-pack/32x32/database.png" alt="UI Elements">
                    <span>ادارة المدن</span><span class="arrow"></span>
                        </a>
                    </div>
                        <ul id="collapse-ui-city" class="accordion-body nav nav-list collapse <?php  echo ($lib_request->getController()=='city')?'in':''; ?> ">

                                                            <li><a href="<?php echo $path['urladmin']; ?>city/add">اضافة  مدينة</a></li>
                                                            <li><a href="<?php echo $path['urladmin']; ?>city">ادارة المدن</a></li>
                          </ul>
                    </div>


                     <div class="accordion-group ">
                    <div class="accordion-heading">
                                              <a class="accordion-toggle <?php  //echo ($lib_request->getController()=='option')?'opened':''; ?>" data-toggle="collapse" data-parent="#accordion2" href="#collapse-ui-other">
                                              <img src="<?php echo $path['template'];?>img/icons/stuttgart-icon-pack/32x32/database.png" alt="UI Elements">
                    <span>خيارات اضافية</span><span class="arrow"></span>
                        </a>
                    </div>
                        <ul id="collapse-ui-other" class="accordion-body nav nav-list collapse  <?php  echo ($lib_request->getController()=='option')?'in':''; ?>">
                        		
                                
                                <li><a href="<?php echo $path['urladmin']; ?>option/">جميع المواصفات</a></li>
                             <?php 
							  foreach($lib_option->getOption(array('type'=>'form')) as $rowsOption){
								  if($lib_func->jsonId($rowsOption['option_o'],'admin')==1 ){
									  continue;
									  }
								  ?>
								
                                <li><a href="<?php echo $path['urladmin']; ?>option/edit/<?php echo $rowsOption['id_o'];?> ">
                              <?php echo  language::getLang($rowsOption['name_o']);?>
                               </a></li>
                               
               <?php } ?>
               
                           </ul>

                                      </div>

                <div class="accordion-group ">
                    <div class="accordion-heading">
                                              <a class="accordion-toggle <?php  echo ($lib_request->getController()=='shows')?'opened':''; ?>" data-toggle="collapse" data-parent="#accordion2" href="#collapse-ui-showin">
                                              <img src="<?php echo $path['template'];?>img/icons/stuttgart-icon-pack/32x32/database.png" alt="UI Elements">
                    <span>ادارة المعارض</span><span class="arrow"></span>
                        </a>
                    </div>
                        <ul id="collapse-ui-showin" class="accordion-body nav nav-list collapse  <?php  echo ($lib_request->getController()=='shows')?'in':''; ?>">
                                  <li><a href="<?php echo $path['urladmin']; ?>shows">ادارة المعارض</a></li>
                                  <li><a href="<?php echo $path['urladmin']; ?>shows/add">اضافة معرض جديد</a></li>
                           </ul>
                     </div>
                    
                   
                  <div class="accordion-group ">
                    <div class="accordion-heading">
                                              <a class="accordion-toggle <?php  echo ($lib_request->getController()=='users')?'opened':''; ?> " data-toggle="collapse" data-parent="#accordion2" href="#collapse-ui-users">
                                              <img src="<?php echo $path['template'];?>img/icons/stuttgart-icon-pack/32x32/database.png" alt="UI Elements">
                    <span>الاعضاء</span><span class="arrow"></span>
                        </a>
                    </div>
                        <ul id="collapse-ui-users" class="accordion-body nav nav-list collapse <?php  echo ($lib_request->getController()=='users')?'in':''; ?> ">


                                                            <li><a href="<?php echo $path['urladmin']; ?>users">ادارة الاعضاء</a></li>
                          </ul>
                    </div>
               
                </div>

                            </section>


        </div>

        </div>

</aside>

      <header>

        <nav class="navbar navbar-fixed-top social-navbar social-sm">
   <div class="navbar-inner">
     <div class="container-fluid">

       <a class="btn btn-navbar" data-toggle="collapse" data-target=".social-sidebar">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>

       <a class="brand" href="../dashboard.html">
                 الصفحه الرئيسية
       </a>

        <ul class="nav visible-desktop">

                                    <li class="dropdown visible-desktop ">
      <a href="#layouts" class="dropdown-toggle" data-toggle="dropdown">اعدادات عامة <b class="caret"></b></a>
      <ul class="dropdown-menu">

                    <!--  -->
                   <li>
                    <a href="<?php echo $path['urladmin']; ?>settings" >ادارة الموقع</a>
                  </li>
                  <!--  -->

                        </ul>
    </li>
                                    <li class="dropdown visible-desktop ">
      <a href="#pages" class="dropdown-toggle" data-toggle="dropdown">الصفحات <b class="caret"></b></a>
      <ul class="dropdown-menu">

                    <!--  -->
                  <li>
                    <a href="<?php echo $path['urladmin']; ?>pages/edit/5">اتصل بنا</a>
                  </li>
                   <li>
                    <a href="<?php echo $path['urladmin']; ?>pages/edit/2">من نحن </a>
                  </li>
				    <li>
                    <a href="<?php echo $path['urladmin']; ?>pages/edit/3">رؤيتنا  </a>
                  </li>
				      <li>
                    <a href="<?php echo $path['urladmin']; ?>pages/edit/4">اعلن معنا </a>
                  </li>
                        <li>
                    <a href="<?php echo $path['urladmin']; ?>pages/edit/6">شروط الاستخدام </a>
                  </li>
				     <li>
                    <a href="<?php echo $path['urladmin']; ?>pages">جميع الصفحات</a>
                  </li>
                  <!--  -->
            </ul>
    </li>
<!--  -->

 <li class="dropdown visible-desktop ">
      <a href="#pages" class="dropdown-toggle" data-toggle="dropdown">ادارة الاعلانات <b class="caret"></b></a>
      <ul class="dropdown-menu">

                    <!--  -->
                  <li>
                    <a href="<?php echo $path['urladmin']; ?>option/offers">ادارة العروض</a>
                  </li>
                  <li>
                    <a href="<?php echo $path['urladmin']; ?>option/vedioindex ">الفيديو</a>
                  </li>
                  <li>
                    <a href="<?php echo $path['urladmin']; ?>option/adsimg">الاعلانات المصورة</a>
                  </li>
                   <li>
                    <a href="<?php echo $path['urladmin']; ?>option/sliderserch">الاعلانات المتحركة بالبحث</a>
                  </li>

                  <!--  -->
            </ul>
    </li>
   </ul>



         <ul class="nav pull-left nav-indicators">


           <!--
            <li class="dropdown nav-notifications">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="badge">9</span><i class="icon-warning-sign"></i>
              </a>

              <ul class="dropdown-menu">

                <li class="nav-notifications-header">
                  <a tabindex="-1" href="#">You have <strong>9</strong> new notifications</a>
                </li>

                 <li class="nav-notification-body text-info">
                    <a href="#">
                          <i class="icon-user"></i> New User
                          <small class="pull-left">Just Now</small>
                    </a>
                  </li>

                <li class="nav-notifications-footer">
                  <a tabindex="-1" href="#">مشاهده جميع السيارات المضافة
                  </a>
                </li>

              </ul>

            </li>
                  -->

            <li class="dropdown nav-messages">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="badge"><?php echo count($lib_messages->getAll(array('status'=>0)))?></span>
                <i class="icon-envelope"></i>
              </a>

              <ul class="dropdown-menu">

                <li class="nav-messages-header">
                  <a tabindex="-1" href="#">لديك <strong><?php echo count($lib_messages->getAll(array('status'=>0)))?></strong> رسائل جديده</a>
                </li>

              <?php foreach($lib_messages->getAll(array('limitend'=>10)) as $rowsMessage){ $lib_func->jsonRes($rowsMessage['subject']);?>
               <li >
                  <a class=""href="<?php echo $path['urlsite'] ?>messages/cp/send/<?php echo $rowsMessage['id'] ?>">
                    <!--  <img src="<?php echo $path['template'];?>img/people-face/user1_55.jpg" alt="User">-->
                           <small class="pull-left ">طلب تاجير</small>
                        <strong class="<?php echo ($rowsMessage['status']==0)?'text-error':'text-info'; ?>"><?php echo $lib_func->jRes('name'); ?></strong>
                      </a>
                </li>
                  <?php } ?>
                <li class="nav-messages-footer">
                  <a tabindex="-1" href="<?php echo $path['urlsite'] ?>/messages/cp/">عرض كل الرسائل
                  </a>
                </li>
              </ul>

            </li>


            <li class="divider-vertical"></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $path['urlsite'];?>users"><i class="icon-user"></i> تعديل الملف الشخصى</a></li>
              <!--  <li><a href="<?php echo $path['urladmin']; ?>settings"><i class="icon-cogs"></i> الاعدادات</a></li>-->
                <li><a href="<?php echo $path['urlsite']; ?>users/login/logout"><i class="icon-off"></i> تسجيل خروج</a></li>
               <!-- <li class="divider"></li>
                <li><a href="#"><i class="icon-info-sign"></i> مركز المساعده</a></li>
                -->
                              </ul>
            </li>

         </ul>

        <ul class="nav pull-left hidden-phone">

          <li id="demo-setting" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <ul class="dropdown-menu settings">
              <li class="header">اعدادات الموقع</li>

            </ul>
          </li>

        </ul>

     </div>
   </div>
 </nav>

      </header>
   <div id="main">

         <div class="container-fluid">
                      <div class="row-fluid">
      <div class="span12">
          <h3 class="page-title">
             اسم الصفحه
          </h3>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo $path['urladmin']; ?>">الرئيسية</a>
                <span class="icon-angle-right"></span>
            </li>
                       <?php if(isset($_page)){ ?> <li><a href="#"><?php echo $_page ;?></a>
                                    <span class="icon-angle-right"></span>
                            </li>
                            <?php } ?>
                          <?php if(isset($_sub)){ ?>
                       <li><a href="<?php echo $path['template'];?>"><?php echo $_sub; ?></a></li>
                      <?php } ?>

</ul>

      </div>
  </div>

<?php  if(isset($_msg) and count($_msg)){?>
		  
           <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>!</strong> <?php  echo $_msg; ?>.
                </div>
		<?php  }
	
	 if(isset($msgsql) and count($msgsql)){?>
		 	
						<div class="alert alert-block alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4 class="alert-heading">النتيجه !</h4>
                    <p>
                    	<ul class="nav nav-list dividers">
						<?php foreach($msgsql['success'] AS $v){?>
                               		<li class="alert-success"><?php echo language::getLang($v) ; ?>   <strong>تم بنجاح</strong></li>
                                 <?php   	
                                }
							
					  ?>
                        </ul>
                    </p>
                    
                </div>
<?php } include($dirFile);?>
  </div>

                <footer id="footer">
    <div class="container-fluid">
        2014 © <em>برمجه وتطوير</em>ل  <a href="" target="_blank">demo.com</a>.
    </div>
</footer>

      </div>

    </div>

    <div style="display: none;">
      <ul class="rightPanel">
        <li><a href="../pages/basic-user-profile.html"><i class="icon-user"></i><span>ادارة السيارات</span></a></li>
        <li><a href="../pages/chat-inbox.html"><i class="icon-envelope"></i><span>ادارة الرسائل</span></a></li>
        <li>
          <a href="#">
	    <i class="icon-tasks"></i><span>تسجيل الخروج</span>
	  </a>
	</li>
      </ul>
    </div>



        <script src="<?php echo $path['template'];?>ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo $path['template'];?>plugins/jquery/jquery.min.js"><\/script>')</script>
            <script src="<?php echo $path['template'];?>plugins/jquery.ui/jquery-ui-1.10.1.custom.min.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.ui.touch-punch/jquery.ui.touch-punch.js"></script>
    <script src="<?php echo $path['template'];?>plugins/twitter-bootstrap/bootstrap.js"></script>

            <script src="<?php echo $path['template'];?>plugins/jquery.slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.cookie/jquery.cookie.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.simplecolorpicker/jquery.simplecolorpicker.js"></script>

    <script src="<?php echo $path['template'];?>plugins/jquery.uipro/uipro.min.js"></script>

    <script src="<?php echo $path['template'];?>plugins/jquery.ui.chatbox/jquery.ui.chatbox-rtl.js"></script>
    <script src="<?php echo $path['template'];?>js/chatboxManager.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.livefilter/jquery.liveFilter.js"></script>

    <script src="<?php echo $path['template'];?>js/extents.js"></script>
    <script src="<?php echo $path['template'];?>js/app.js"></script>
    <script src="<?php echo $path['template'];?>js/demo-settings.js"></script>
    <script src="<?php echo $path['template'];?>js/sidebar.js"></script>

    <script>
      /*<![CDATA[*/
      $(function() {
        App.init();
        DemoSettings.init({
          urlThemes: '<?php echo $path['template'];?>css/themes/social.theme-'
        });
        SideBar.init({
          shortenOnClickOutside: false
        });
      });
      /*]]>*/
    </script>
        <script src="<?php echo $path['urlsite'];?>Public/js/upload.js"></script>
        <script src="<?php echo $path['urlsite'];?>Public/js/changeselect.js"></script>
         <script type="text/javascript">
            var _root_ = '<?php echo $path['urlsite'];?>';
        </script>



  </body>


</html>
