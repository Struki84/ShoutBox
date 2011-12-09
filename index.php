<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/shoutbox_style.css" />
<title>ShoutBox</title>
</head>
<body>
<?php   
include_once "mvc/controller.php";
$controller = new Controller('localhost', 'root', 'root', 'development'); 
?>
<h1>Shoutbox</h1>
<h3>The thing you always wanted to have on a website</h3>
<ul style="list-style: none; margin: 0; padding: 0;" >
	<li style="display: inline;"><a href="documentation/index.html">Documentation</a></li>
	<li style="display: inline;"><a href="examples/example_2.php">Example 2</a></li>
	<li style="display: inline;"><a href="examples/example_3.php">Example 3</a></li>
</ul>
<p>Get a shoutbox on you'r website with a single line of code!</p>
<p>This is an example of a single shoutbox on a web site. For this to work properly you must have a database on a local computer or a remote webserver. Use the sql <a href = "shout_box_table.sql" >file</a> to create the shout_box table. DON'T change the name of the fields if you don't understand exactly what you are doing.</p>

<p><h2>NOTICE:</h2> At the moment there is no admin interface, what that means is, that you can't delete the posts from the app interface. You need to delete them in the databse manually. I'm working on it... :)</p>

<h2><a name="example_1">Example 1:</a></h2>

<hr>
<h3>Some article</h3>
<p>Rapidiously empower customized bandwidth through proactive technologies. Enthusiastically syndicate 24/365 e-services after transparent action items. Completely recaptiualize cost effective action items with multimedia based potentialities. 

Credibly drive cooperative collaboration and idea-sharing for covalent technologies. Efficiently mesh enterprise-wide "outside the box" thinking for optimal users. Phosfluorescently optimize best-of-breed value through visionary resources. 

Seamlessly matrix sustainable relationships with resource sucking meta-services. Rapidiously streamline intuitive e-markets and B2B schemas. Distinctively grow virtual relationships after viral e-tailers. 

Enthusiastically actualize backend leadership skills via B2B testing procedures. Proactively foster frictionless quality vectors for superior products. Dynamically monetize installed base deliverables before front-end scenarios. <h3>Comments</h3>
<?php $controller->insertShoutBox('single', 'single', 'desc'); ?>
<br />
<hr>
</body>
</html>
