<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>ShoutBox</title>
</head>
<body>

<?  
include_once "controller.php";
$controller = new Controller('localhost', 'root', 'root', 'development');
$controller->insertShoutBox(); ?>
<br />
<br />
<div style="border-top: solid 2px black; padding:5px;">
<br />
<br />
<? $controller->insertShoutBox('blog', 'desc'); ?>



</div>

</body>
</html>