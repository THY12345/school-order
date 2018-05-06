var login = {
    check : function() {
        // 获取登录页面中的用户名 和 密码
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();

        var url = "/index.php?m=admin&c=login&a=check";
        var data = {'username':username,'password':password};
        // 执行异步请求  $.post
        $.post(url,data,function(result){
            if(result.status == 0) {
                alert(result.message);
            }
            if(result.status == 1) {
                // return dialog.success(result.message, '/index.php?m=admin$c=index&a=index');
                //alert(result.message);
                if(result.message=='0'){
                    alert('登录成功');
                    location.href="/index.php?m=admin&c=user&a=index";
                }
                else{
                    alert('登录成功');
                    location.href="/index.php?m=admin&c=user&a=order";
                }
            }

        },'JSON');
    
    }
}