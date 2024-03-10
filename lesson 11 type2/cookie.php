<!DOCTYPE html>
<html>
<head>
	<title>cookieresult</title>
</head>
<body>
<?php
	if (isset($_POST['name'])) {
		setcookie('name', $_POST['name'], time() + 3600); 
	}

	if (isset($_COOKIE['name'])) {
		echo "Sieg Heil ist mein Führer, " . $_COOKIE['name'] . "!";
	}
?>
</body>
</html>