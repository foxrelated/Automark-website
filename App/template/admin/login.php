<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Social - Premium Responsive Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="<?php echo $path['template'];?>img/favicon.ico" />
    <link rel="icon" type="image/gif" href="<?php echo $path['template'];?>img/favicon.gif">

    <!-- BEGIN STYLE CODES -->
    <link href="<?php echo $path['template'];?>css/twitter-bootstrap-rtl/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $path['template'];?>css/social-rtl.css" rel="stylesheet">
    <link href="<?php echo $path['template'];?>css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $path['template'];?>css/twitter-bootstrap-rtl/bootstrap-responsive.css" rel="stylesheet">

    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #e9eaed;
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
      <script src="<?php echo $path['template'];?>plugins/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body class="rtl">
    <!-- BEGIN FORMS CONTAINER -->
    <div class="container">
            <?php  if(isset($error['msg'])){ ?>
                   <div class="navbar-form">
								 <div class="form-footer-copyright">
									<h2 class="form-heading"><?php echo $error['msg']; ?></h2>
									 <div class="row-fluid">
									</div>
								  </div>
                   </div>
           <?php } ?>

		  <?php  if ($lib_acl->_permis('admin')){ ?>
                                <div class="navbar-form">
								 <div class="form-footer-copyright">
									<h2 class="form-heading"><?php echo _t("تم تسجيل الدخول بنجاح") ?></h2>
									 <div class="row-fluid">
									<a href="<?php echo $path['urlsite']."/out";?>" class="btn btn-primary pull-left span6"><i class="icon-fire"> </i> خروج</a>
								  </div>
								  </div>


                                </div>
                            <?php } else{ ?>
      <!-- BEGIN LOGIN FORM -->
      <form class="form-login" method="post" action="<?php echo $path['urlsite']; ?>users/login/index/cp">
        <h2 class="form-heading"><?php echo _t("من فضلك قم بتسجيل الدخول") ?></h2>
        <input type="text" class="input-block-level" name="username" placeholder="<?php echo _t("اسم المستخدم") ?>">
        <span class="help-inline"><?php echo isset($error['username'])?$error['username']:'' ?></span>
        <input type="password" class="input-block-level" name="password" placeholder="<?php echo _t("كلمة المرور") ?>">
        <span class="help-inline"><?php echo isset($error['password'])?$error['password']:'' ?></span>
        <div class="row-fluid">

          <input class="btn btn-primary pull-left span6" type="submit" value="<?php echo _t("تسجيل دخول") ?>" name="ok_login" />
        </div>
        <div class="forget-password">
          <p class="text-center"><?php echo _t("استرجاع كلمة المرور") ?>? <a href="#" id="link-forgot"><?php echo _t("اضغط هنا") ?></a></p>
        </div>
           <input type="hidden" name="login" value="1" />
  <input type="hidden" name="token" value="<?php echo  $lib_token->generate(); ?>" />
      </form>
      <!-- END LOGIN FORM -->
     <?php } ?>
      <!-- BEGIN FORGOT PASSWORD FORM -->
      <form class="form-forgot hide" method="get" action="">
        <h2 class="form-heading"><?php echo _t("استرجاع كلمة المرور") ?></h2>
        <p><?php echo _t("الرجاء ادخال كلمة المرور لارسال كلمة السر الجديده على البريد") ?></p>
        <div class="input-append input-fullwidth">
          <span class="add-on"><i class="icon-envelope-alt"></i></span>
          <div class="input-wrapper">
            <input type="text" placeholder="Email"/>
          </div>
        </div>
        <div class="form-actions">
          <button class="btn btn-primary btn-back" type="button"><i class="icon-angle-right"></i> <?php echo _t("رجوع") ?></button>
          <button class="btn btn-success pull-left" type="button"><?php echo _t("ارسال") ?></button>
        </div>
      </form>
      <!-- END FORGOT PASSWORD FORM -->

      <!-- BEGIN FOOTER -->
      <div class="form-footer-copyright">
        2015 © <small>اهلا بك بلوحة تحكم الموقع</small>
      </div>
      <!-- END FOOTER -->
    </div>
    <!-- END FORMS CONTAINER -->
    <!-- BEGIN JAVASCRIPT CODES -->
    <script src="<?php echo $path['template'];?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo $path['template'];?>js/login.js"></script>

    <script>
      $(function() {
        Login.init()
      });
    </script>
    <!-- END JAVASCRIPT CODES -->

  </body>
</html>
