<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/shoutbox_style.css" />
<title>ShoutBox</title>
</head>
<body>
<?  

include_once "mvc/controller.php";
$controller = new Controller('localhost', 'root', 'root', 'development');
$controller->insertShoutBox(); 

?>

<div id="test">test</div>
</body>
</html>