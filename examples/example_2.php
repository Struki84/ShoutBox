<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../css/shoutbox_style.css" />
<title>Example 2</title>
</head>
<body>
<?php   
include_once "../mvc/controller.php";
$controller = new Controller('localhost', 'root', 'root', 'development'); 
?>
<h1>Multiple shoutbox example</h1>
<ul style="list-style: none; margin: 0; padding: 0;" >
	<li style="display: inline;"><a href="../documentation/index.html">Documentation</a></li>
	<li style="display: inline;"><a href="../index.php#example_1">Example 1</a></li>
	<li style="display: inline;"><a href="example_3.php">Example 3</a></li>
</ul>

<h3>Some article</h3>
<p>Rapidiously empower customized bandwidth through proactive technologies. Enthusiastically syndicate 24/365 e-services after transparent action items. Completely recaptiualize cost effective action items with multimedia based potentialities. 

Credibly drive cooperative collaboration and idea-sharing for covalent technologies. Efficiently mesh enterprise-wide "outside the box" thinking for optimal users. Phosfluorescently optimize best-of-breed value through visionary resources. 

Seamlessly matrix sustainable relationships with resource sucking meta-services. Rapidiously streamline intuitive e-markets and B2B schemas. Distinctively grow virtual relationships after viral e-tailers. 

Enthusiastically actualize backend leadership skills via B2B testing procedures. Proactively foster frictionless quality vectors for superior products. Dynamically monetize installed base deliverables before front-end scenarios. <h3>Comments</h3>
<?php $controller->insertShoutBox('article_comment', 'article_comment', 'desc'); ?>
<br />
<hr>
<h3>Your blog post</h3>
<p>Rapidiously empower customized bandwidth through proactive technologies. Enthusiastically syndicate 24/365 e-services after transparent action items. Completely recaptiualize cost effective action items with multimedia based potentialities. 

Credibly drive cooperative collaboration and idea-sharing for covalent technologies. Efficiently mesh enterprise-wide "outside the box" thinking for optimal users. Phosfluorescently optimize best-of-breed value through visionary resources. 

Seamlessly matrix sustainable relationships with resource sucking meta-services. Rapidiously streamline intuitive e-markets and B2B schemas. Distinctively grow virtual relationships after viral e-tailers. 

Enthusiastically actualize backend leadership skills via B2B testing procedures. Proactively foster frictionless quality vectors for superior products. Dynamically monetize installed base deliverables before front-end scenarios. <h3>Comments</h3>
<?php $controller->insertShoutBox('blog', 'blog'); ?>
<br />
<hr>
</body>
</html>
