<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>お問い合わせ(確認)</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div>
			<?php echo $instance->name ?>
		</div>
		<div>
			<?php echo $instance->email ?>
		</div>
		<div>
			<?php echo $instance->tel ?>
		</div>
		<div>
			<?php echo $instance->type ?>
		</div>
		<div>
			<?php echo nl2br($instance->content) ?>
		</div>
		<div>
			<a href="<?php echo Uri::create('/') ?>" class="btn btn-warning">戻る</a>
			<a href="<?php echo Uri::create('inquiry/submit') ?>" class="btn btn-primary">確定</a>
		</div>
	</body>
</html>