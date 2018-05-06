function signin(){
    var data = $(".submit-form").serializeArray();
    postData = {};
    $(data).each(function(i){
       postData[this.name] = this.value;
    });
    console.log(postData);
    url = '/index.php?m=admin&c=login&a=signincheck';
    jump_url = '/index.php?m=admin&c=login&a=index';
    $.post(url,postData,function(result){
        if(result.status == 1) {
            alert(result.message);
            window.location.href=jump_url;
        }else if(result.status == 0) {
            // 失败
            alert(result.message);
        }
    },"JSON");    
}

// $(document).ready(function(){
//   $(".button_submit").click(function(){
//     var data = $(".submit-form").serializeArray();
//     postData = {};
//     $(data).each(function(i){
//        postData[this.name] = this.value;
//     });
//     console.log(postData);
//     //将获取到的数据post给服务器
//     url = SCOPE.save_url;
//     jump_url = SCOPE.jump_url;
    
//     var conf = confirm("确认保存？");
//         if(conf==true){
//             $.post(url,postData,function(result){
//                 if(result.status == 1) {
//                     //成功
//                     alert(result.message);
//                     window.location.href = jump_url;
//                 }else if(result.status == 0) {
//                     // 失败
//                     alert(result.message);
//                 }
//             },"JSON");
//         }else{
//             return 0;
//             //alert(1);
//         }
//     });
// });