<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Admin Controller css</title>
<!--	<meta name="keywords" content="" />
	<meta name="description" content="" />-->
	<link rel="stylesheet" href="/files/style.css" type="text/css" media="screen, projection" />
	<!--[if lte IE 6]><link rel="stylesheet" href="style_ie.css" type="text/css" media="screen, projection" /><![endif]-->
</head>

<body>

<div id="wrapper">

	<div id="header">
		<strong>Framework v 2.0</strong>
                </br><strong>Login as <?php echo Core::getInstance()->getUser()->getLogin(); ?></strong>
	</div><!-- #header-->

	<div id="middle">

		<div id="container">
			<div id="content">
				<?php echo $content; ?>
			</div><!-- #content-->
		</div><!-- #container-->

		<div class="sidebar" id="sideLeft">
			<strong></br><a href="/admin/list">click here to see all available pages</a></strong> 
                        <strong></br><a href="/admin/add">click here if you want add new page</a></strong>
                        </br>
                        <strong></br><a href="/admin/logout">logout</a></strong>
		</div><!-- .sidebar#sideLeft -->

	</div><!-- #middle-->

</div><!-- #wrapper -->

<div id="footer">
    <strong><q>Masik i Alenka Group ©</q></strong>
</div><!-- #footer -->

</body>
</html>