<?php 
   
    # Connect to MySQL database
    include_once "class_lib.php";
    $db = new Database('localhost', 'root', 'root', 'development');
    $db->connect();
	ob_start();
    if(isset($_GET['action'])) { $action = $_GET['action']; }
    if(isset($_GET['id']))     { $id = $_GET['id']; }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>ShoutBox</title>
</head>
<body>

<div id="container"><? include_once "shout_box.php"; ?></div>

</body>
</html>

