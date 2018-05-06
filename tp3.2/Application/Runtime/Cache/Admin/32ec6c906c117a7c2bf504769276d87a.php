<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>校园预约登录</title>
	

</head>
<body>
	<link href="/Public/css/css.css" rel="stylesheet">
	<script src="/Public/js/jquery.js"></script>
	<script src="/Public/js/admin/login.js"></script>

<div class="logindiv">
	<form enctype="multipart/form-data" method="post">
		<h2>请登录</h2>
		<label>用户名</label>
		<input type="text" name="username" class="login" placeholder="请输入用户名" required autofocus>
		<br />
		<label>密码</label>
		<input type="password" name="password" class="login" placeholder="密码" required>
		<br />
		<button class="button" type="button" onclick="login.check()">登录</button>
		<button class="button" type="button" onclick="window.location.href='/index.php?m=admin&c=login&a=signin'">注册</button>
	</form>
</div>

</body>
</html>