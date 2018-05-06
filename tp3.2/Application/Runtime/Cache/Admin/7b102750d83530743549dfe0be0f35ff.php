<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<meta charset="utf-8">
</head>
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
				<li class="lineli"><label><?php echo ($uname); ?></label></li>
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
		                    <p><label class="">密码:</label>
		                    <input type="password" class="search" name="password" value="" id="search" placeholder="不少于6位，不超过16位"></p>
		                </div>
		                <div class="form-group">
		                    <p><label class="">新密码:</label>
		                    <input type="password" class="search" name="npassword" value="" id="search" placeholder="不少于6位，不超过16位"></p>
		                </div>
		                <div class="form-group">
		                    <p><label class="">确认新密码:</label>
		                    <input type="password" class="search" name="enternpassword" value="" id="search" ></p>
		                </div>
		                <div class="form-group">
	                   	 	<p><label></label><input type="button" class="button_submit" id="submit" type="button" value="保存" ></p>
	               		 </div>
		            </form>
			</div>
			
			
	</div>

</body>
<script>

    var SCOPE = {
        'save_url' : '/index.php?m=admin&c=user&a=savePassw',
        'jump_url' : '/index.php?m=admin&c=login&a=index',
    }
</script>

</html>