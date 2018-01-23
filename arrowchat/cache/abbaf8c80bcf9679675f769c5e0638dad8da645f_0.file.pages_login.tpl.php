<?php
/* Smarty version 3.1.30, created on 2018-01-20 13:14:45
  from "C:\wamp64\www\automark\arrowchat\admin\layout\pages_login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a6340c50a7013_22118556',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abbaf8c80bcf9679675f769c5e0638dad8da645f' => 
    array (
      0 => 'C:\\wamp64\\www\\automark\\arrowchat\\admin\\layout\\pages_login.tpl',
      1 => 1476279314,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6340c50a7013_22118556 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr"> 
<head profile="http://gmpg.org/xfn/11"> 
 
	<title>ArrowChat - Administrator Panel Login</title> 
	
	<link rel="stylesheet" type="text/css" href="includes/css/login-style.css"> 
	
	<?php echo '<script'; ?>
 type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"><?php echo '</script'; ?>
> 
	<?php echo '<script'; ?>
 type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.3/jquery-ui.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="includes/js/scripts.js"><?php echo '</script'; ?>
>
	
	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function() {
			var emitter;
			$('.fwdbutton').click(function() {
				document.forms['login'].submit();
			});
			$(document).keypress(function(e) {
				if(e.keyCode == 13) {
					document.forms['login'].submit();
				}
			});
		});
	<?php echo '</script'; ?>
>
	
</head>
<body>
	<div style="margin: 0 auto; width: 550px; text-align: center; padding-top: 100px;">
		<div id="logo" style="width: 521px; height: 69px;">
			<a href="http://www.arrowchat.com" target="_blank"><img id="logo2" src="./images/img-logo.png" alt="ArrowChat Logo" border="0" /></a>
		</div>
		<div class="login-form">
			<form autocomplete="off" action="./" id="login" method="post"> 
				<div class="admin-panel-text">ArrowChat Admin Panel Login</div>
				<?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
				<div class="login-error">
					<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

				</div>
				<?php }?>
				<div style="clear: both;"></div>
				<div class="input-text">Username</div>
				<div class="input-box">
					<input autocomplete="off" class="text" id="username" name="username" value="<?php if (!empty($_smarty_tpl->tpl_vars['username_post']->value)) {
echo $_smarty_tpl->tpl_vars['username_post']->value;
}?>" type="text" />
				</div>
				<div style="clear: both;"></div>
				<div class="input-text">Password</div>
				<div class="input-box">
					<input autocomplete="off" class="text" name="password" value="<?php if (!empty($_smarty_tpl->tpl_vars['password_post']->value)) {
echo $_smarty_tpl->tpl_vars['password_post']->value;
}?>"  type="password" />
					<input type="hidden" name="login" value="1" />
				</div>
				<div style="clear: both;"></div>
				<div class="button_container float">
					<div class="floatr">
						<a class="fwdbutton">
							<span>Login</span>
						</a>
					</div>
					<div class="forgot">
						<a href="./forgot.php">Forgot Password?</a>
					</div>
				</div>
				<div style="clear: both;"></div>
			</form> 
		</div>
	</div>
	<div class="install-footer">
		<a href="https://www.arrowchat.com/support/" target="_blank">Get Help</a> | <a href="https://www.facebook.com/ArrowChat/" target="_blank">Like us on Facebook</a><br />
		ArrowChat Software
	</div>
	<?php echo '<script'; ?>
 type="text/javascript">
		document.getElementById("username").focus();
	<?php echo '</script'; ?>
>
</body>
</html><?php }
}
