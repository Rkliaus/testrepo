<!DOCTYPE html>
<html>
<head>
	<title>helloresult</title>
</head>
<body>
<?php
session_start();
if (isset($_POST['name']))  {
    $_SESSION['name'] = $_POST['name']; 
}
if (isset($_SESSION['name'])) {
    echo "Welcome fellow traveler, yoyr name is " . $_SESSION['name'] . "?";
} 
?>
  
   
</body>
</html>