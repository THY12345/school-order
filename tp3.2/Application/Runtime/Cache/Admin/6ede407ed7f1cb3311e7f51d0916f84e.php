<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<meta charset="utf-8">
</head>
<link rel="stylesheet" type="text/css" href="/public/css/signin.css">
<link rel="stylesheet" type="text/css" href="/public/css/user.css">
<!-- <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.css"> -->
<script src="/Public/js/jquery.js"></script>
<!-- <script src="/Public/js/admin/user.js"></script> -->
<script src="/Public/js/admin/signin.js"></script>
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
				<li class="lineli"><a class="exita" href="/index.php?m=admin&c=login&a=index" >登录</a></li>
			</ul>
			
		</div>
	</div>
	<div class="nav">
		
	</div>

	<div class="section">
		
			<!-- <div class="lshow"> -->
		<!-- 		<form enctype="multipart/form-data" id="addform" method="post">
					<label >用户名</label><input type="text" class="search" name="username" value="" id="search" >
					<label >密码</label><input type="text" class="search" name="username" value="" id="search" >
					<label >姓名</label><input type="text" class="search" name="username" value="" id="search" >
					<label >学号/教工号</label><input type="text" class="search" name="username" value="" id="search" >
					<label >电话</label><input type="text" class="search" name="username" value="" id="search" >
					
					<button class="button" id="submit" type="button" >注册</button>
				</form> -->

				<form class="submit-form">
					<div class="form-group">
	                    <p><label class="">用户名:</label>
	                    <input type="text" class="search" name="username" value="" id="search" placeholder="不超过16位"></p>
	                </div>
	                <div class="form-group">
	                    <p><label class="">密码:</label>
	                    <input type="password" class="search" name="password" value="" id="search" placeholder="不少于6位，不超过16位"></p>
	                </div>
	                <div class="form-group">
	                    <p><label class="">确认密码:</label>
	                    <input type="password" class="search" name="enterpassword" value="" id="search" ></p>
	                </div>
	                <div class="form-group">
	                    <p><label class="">姓名:</label>
	                    <input type="text" class="search" name="name" value="" id="search" ></p>
	                </div>
					<div class="form-group">
	                    <p><label class="">工作:</label>
	                    <input type="radio" name="type" id="" value="1" checked> 学生
	                    <input type="radio" name="type" id="" value="0"> 教师</p>
	                </div>
	                <div class="form-group">
	                    <p><label class="">学号/教工号:</label>
	                    <input type="text" class="search" name="sid" value="" id="search" ></p>
	                </div>
	                <div class="form-group">
	                    <p><label class="">电话:</label>
	                    <input type="text" class="search" name="phone" value="" id="search" ></p>
	                </div>
	                <div class="form-group">
	                    <p><label></label><input type="button" class="button_submit" id="submit" type="button" value="注册" onclick="signin()"></p>
	                </div>
				</form>
				
			</div>
			
			<!-- <div class="rshow">
				<div>
					
				</div>
			</div> -->
			
	</div>

</body>
</html>