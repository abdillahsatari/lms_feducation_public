<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" sizes="114x114" href="<?=base_url('assets/dist/img/icon.png')?>" type="image/x-icon">

	<title>404 Pertamina Trans Kontinental</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?=base_url('assets/')?>css/404.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		.notfound .notfound-404 {
			position: absolute;
			left: 0;
			top: 0;
			display: inline-block;
			width: 140px;
			height: 140px;
			background-image: url("<?=base_url('assets/dist/img/emoji.png')?>");
			background-size: cover;
		}
	</style>
</head>
<body>
<div id="notfound">
	<div class="notfound">
		<div class="notfound-404"></div>
		<h1>404</h1>
		<h2>Oops! Page Not Found</h2>
		<p>Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable</p>
		<a href="<?=base_url('welcome')?>">Back to homepage</a>
	</div>
</div>
</body>
</html>
