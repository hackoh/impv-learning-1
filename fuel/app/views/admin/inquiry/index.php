<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>お問い合わせ一覧</title>

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
		<table class="table table-striped">
			<tr>
				<th>名前</th>
				<th>メールアドレス</th>
				<th>お問い合わせ種別</th>
				<th></th>
			</tr>
<?php foreach ($instances as $instance): ?>
			<tr>
				<td><?php echo $instance->name ?></td>
				<td><?php echo $instance->email ?></td>
				<td><?php echo $instance->type ?></td>
				<td>
					<a href="<?php echo Uri::create('admin/inquiry/'.$instance->id.'/edit') ?>" class="btn btn-success">編集</a>
					<a href="<?php echo Uri::create('admin/inquiry/'.$instance->id.'/delete') ?>" class="btn btn-danger">削除</a>
				</td>
			</tr>	
<?php endforeach ?>
		</table>
	</body>
</html>