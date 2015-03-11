<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>お問い合わせ</title>

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
<?php if ($messages): ?>
		<div class="alert alert-danger">
			<ul class="list-unstyled">
<?php foreach ($messages as $message): ?>
				<li><?php echo $message ?></li>
<?php endforeach ?>
			</ul>
		</div>
<?php endif ?>
		<form action="<?php echo Uri::create('inquiry/confirm') ?>" method="post">
			<div>
				<label>氏名</label><input type="text" name="name" value="<?php echo $instance->name ?>" />
			</div>
			<div>
				<label>メールアドレス</label><input type="text" name="email" value="<?php echo $instance->email ?>" />
			</div>
			<div>
				<label>電話番号</label><input type="text" name="tel" value="<?php echo $instance->tel ?>" />
			</div>
			<div>
				<label>お問い合わせ種別</label>
				<ul class="list-unstyled">
					<li><label><input type="radio" name="type" value="商品" <?php echo $instance->type == '商品' ? 'checked="checked"' : null ?>>: 商品</label></li>
					<li><label><input type="radio" name="type" value="アフターサポート" <?php echo $instance->type == 'アフターサポート' ? 'checked="checked"' : null ?>>: アフターサポート</label></li>
					<li><label><input type="radio" name="type" value="その他" <?php echo $instance->type == 'その他' ? 'checked="checked"' : null ?>>: その他</label></li>
				</ul>
			</div>
			<div>
				<label>内容</label>
				<textarea name="content"><?php echo $instance->content ?></textarea>
			</div>
			<div>
				<input type="submit" value="確認画面へ" class="btn btn-primary">
			</div>
		</form>
	</body>
</html>