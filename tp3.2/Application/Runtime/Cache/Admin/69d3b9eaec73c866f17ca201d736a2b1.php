<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<meta charset="utf-8">
</head>
<link rel="stylesheet" type="text/css" href="/public/css/signin.css">
<link rel="stylesheet" type="text/css" href="/public/css/user.css">
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/admin/user.js"></script>
<script src="/Public/js/admin/common.js"></script>
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
				<li class="lineli"><span><?php echo ($uname); ?></span></li>
				<li class="lineli"><a class="exita" href="/index.php?m=admin&c=user&a=person" >个人中心</a></li>
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
				<form class="submit-form">
					<div class="form-group">
	                    <p><label class="">用户名:</label>
	                    <input type="text" class="search" name="username"  id="search" value=<?php echo ($user["username"]); ?>></p>
	                </div>
	                <div class="form-group">
	                    <p><label class="">姓名:</label>
	                    <input type="text" class="search" name="name"  id="search" value=<?php echo ($user["name"]); ?>></p>
	                </div>
					<div class="form-group">
	                    <p><label class="">工作:</label>
	                    <input type="radio" name="type" id="" value="1" <?php if($user["type"] == 1): ?>checked="checked"<?php endif; ?>> 学生
	                    <input type="radio" name="type" id="" value="0" <?php if($user["type"] == 0): ?>checked="checked"<?php endif; ?>> 教师</p>
	                </div>
	                <div class="form-group">
	                    <p><label class="">学号/教工号:</label>
	                    <input type="text" class="search" name="sid"  id="search" value=<?php echo ($user["sid"]); ?>></p>
	                </div>
	                <div class="form-group">
	                    <p><label class="">电话:</label>
	                    <input type="text" class="search" name="phone"  id="search" value=<?php echo ($user["phone"]); ?>></p>
	                </div>
	                <div class="form-group">
	                    <p><label></label><input type="button" class="button_submit" id="submit" type="button" value="保存"></p>
	                </div>
				</form>
			</div>
			
			
	</div>

</body>
<script>

    var SCOPE = {
        'save_url' : '/index.php?m=admin&c=user&a=saveInfo',
        'jump_url' : '/index.php?m=admin&c=user&a=person',
    }
</script>
</html>