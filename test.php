<?php 
if(!empty($_POST)){
	var_dump($_POST);
	var_dump($_FILES);
	var_dump(file_get_contents('php://input'));
}else{ ?>
<html>
	<head>
		<title>TESt</title>
	</head>
	<body>
		<form method="POST">
			<input type="text" name="xxx"><br>
			<input type="file" name="yyy"><br>
			<input type="submit">
		</form>
	</body>
</html>
<?php } ?>

