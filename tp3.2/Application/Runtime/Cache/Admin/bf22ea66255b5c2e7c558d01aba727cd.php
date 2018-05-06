<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<meta charset="utf-8">
</head>
<link rel="stylesheet" type="text/css" href="/public/css/user.css">
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/admin/user.js"></script>
<style type="text/css">
	table{
  		border-collapse:collapse;
	}

	table,th, td{
 		 border: 1px solid black;
	}
</style>

<body>
	<div class="header">
		<h1>校园预约</h1>
		<div class="person">
			<ul>
				<li class="lineli"><label><?php echo ($uname); ?></label></li>
				<li class="lineli"><a class="exita" href="/index.php?m=admin&c=user&a=index" >预约</a></li>
				<li class="lineli"><a class="exita" href="/index.php?m=admin&c=login&a=loginout" >退出</a></li>
			</ul>
			
		</div>
	</div>
	<div class="nav">
		<ul class="userMenu">
            <li class="current"><a class="menua" href="/index.php?m=admin&c=user&a=person" >个人信息</a></li>
            <li><a class="menua" href="/index.php?m=admin&c=user&a=changeInfo">修改信息</a></li>
            <li><a class="menua" href="/index.php?m=admin&c=user&a=changePassw">修改密码</a></li>
     	</ul>
	</div>

	<div class="section">
		
			<div class="lshow">
					<p>用户名：<?php echo ($user["username"]); ?></p>
					<p>姓名：<?php echo ($user["name"]); ?></p>
					<p>工作：<?php if($user["type"] == 1): ?>学生<?php else: ?>教师<?php endif; ?></p>
					<p>学号/教工号：<?php echo ($user["sid"]); ?></p>
					<p>电话：<?php echo ($user["phone"]); ?></p>
			</div>
			
			
	</div>

</body>
</html>