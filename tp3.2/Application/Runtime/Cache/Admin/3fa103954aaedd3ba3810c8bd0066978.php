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
				<li class="lineli"><a class="exita" href="/index.php?m=admin&c=user&a=person" >个人中心</a></li>
				<li class="lineli"><a class="exita" href="/index.php?m=admin&c=login&a=loginout">退出</a></li>
			</ul>
			
		</div>
	</div>
	<div class="nav">
		<ul class="userMenu">
            <li ><a class="menua" href="/index.php?m=admin&c=user&a=index" <?php if($type == 1): ?>style="display:none"<?php endif; ?>>时间</a></li>
            <li><a class="menua" href="/index.php?m=admin&c=user&a=order" <?php if($type == 0): ?>style="display:none"<?php endif; ?>>查询</a></li>
            <li class="current"><a class="menua" href="/index.php?m=admin&c=user&a=change" <?php if($type == 0): ?>style="display:none"<?php endif; ?>>已预约</a></li>
            <li><a class="menua" href="/index.php?m=admin&c=user&a=watch" <?php if($type == 1): ?>style="display:none"<?php endif; ?>>已被预约</a></li>

     	</ul>
	</div>
	<!-- <?php
 echo json_encode($users); echo $users[stime]; ?> -->
	<div class="section">
		
			<div class="lshow">
				<!-- <form enctype="multipart/form-data" id="addform" method="post">
					<label style="display:none">username</label><input type="text" class="search" name="username" value="<?php echo ($uname); ?>" id="search" style="display:none">
					<label>开始时间</label><input type="text" class="search" name="stime" value="" id="search"></br>
					<label>结束时间</label><input type="text" class="search" name="etime" value="" id="search">
					<label style="display:none">status</label><input type="text" class="search" name="status" value="1" id="search" style="display:none">
					<br>
					<button class="button" id="button_add" type="button" onclick="user.add()">添加</button>
				</form> -->
				
				<form>
					<table>
						<thead>
							<tr>
								<th>id</th>
								<th>username</th>
								<th>uid</th>
								<th>name</th>
								<th>日期</th>
								<th>开始时间</th>
								<th>结束时间</th>
								<!-- <th>状态</th> -->
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						<?php if(is_array($change)): $i = 0; $__LIST__ = $change;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($user["id"]); ?></td>
								<td><?php echo ($user["username"]); ?></td>
								<td><?php echo ($user["uid"]); ?></td>
								<td><?php echo ($user["name"]); ?></td>
								<td><?php echo ($user["date"]); ?></td>
								<td><?php echo ($user["stime"]); ?></td>
								<td><?php echo ($user["etime"]); ?></td>
								<!-- <td><?php echo ($user["etime"]); ?></td>
								<td><?php echo ($user["status"]); ?></td> -->
								<td><a href="javascript:void(0)" attr-id="<?php echo ($user["id"]); ?>" id="delete" onclick="user.cancel(<?php echo ($user["id"]); ?>)">取消预约</a></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
				</form>
			</div>
			
			<div class="rshow">
				<!-- <div class="searchdiv">
					<input type="text" class="search" value="<?php echo ($searchname); ?>" id="search">
					<input type="button" value="搜索" class="button" onclick="user.search()">
				</div> -->
				<div>
					
				</div>
			</div>
			
	</div>

</body>
</html>