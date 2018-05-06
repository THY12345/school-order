
var user = {
    add : function() {
        var data = $("#addform").serializeArray();
        postData = {};
        $(data).each(function(i){
         postData[this.name] = this.value;
        });
        //时间间隔
        // var stime = postData['date']+' '+postData['stime']+':00';
        // var etime = postData['date']+' '+postData['etime']+':00';
        // var stime1 = stime.replace(/\-/g, "/");
        // var etime1 = etime.replace(/\-/g, "/");
        // var date1 = new Date(stime1);
        // var date2 = new Date(etime1);
        // var dvalue = parseInt(date2 - date1) / 1000 / 60;
        // if(dvalue >30 || dvalue<=5){
        //     alert('请输入适当的时间差');
        // }else{
            url = "/index.php?m=admin&c=user&a=add";
            $.post(url,postData,function(result){
                if(result.status==1){
                    alert(result.message);
                    window.location.href="/index.php?m=admin&c=user&a=index";
                }else if(result.status==0){
                    alert(result.message);
                }
            },"JSON");
        // }
    },
    delete : function(id) {
        //var id = $("#delete").attr('attr-id');
        //alert(id);
        var data = {'id':id};
        url = "/index.php?m=admin&c=user&a=delete";
        var conf = confirm("确认删除？");
        if(conf==true){
            $.post(url,data,function(result){
                //alert(2);
                if(result.status==1){
                    alert(result.message);
                    window.location.href="/index.php?m=admin&c=user&a=index";

                }else{
                    alert(result.message);
                }
            },"JSON");
        }else{
            return 0;
            //alert(1);
        }
    },

    search : function() {
        var element=document.getElementById("search").value;
        url = '/index.php?m=admin&c=user&a=search';
        var data = {'element':element};
        $.post(url,data,function(result){
            //alert(result.message);
            window.location.href="/index.php?m=admin&c=user&a=order";
        },"JSON");
    },

    order : function(id) {
        var data = {'id':id};
        url = "/index.php?m=admin&c=user&a=appointment";
        var conf = confirm("确认预约？");
        if(conf==true){
            $.post(url,data,function(result){
                //alert(2);
                if(result.status==1){
                    alert(result.message);
                    window.location.href="/index.php?m=admin&c=user&a=order";

                }else{
                    alert(result.message);
                }
            },"JSON");
        }else{
            return 0;
            //alert(1);
        }
    },

    cancel : function(id) {
        var data = {'id':id};
        url = "/index.php?m=admin&c=user&a=cancel";
        var conf = confirm("确认取消预约？");
        if(conf==true){
            $.post(url,data,function(result){
                //alert(2);
                if(result.status==1){
                    alert(result.message);
                    window.location.href="/index.php?m=admin&c=user&a=change";

                }else{
                    alert(result.message);
                }
            },"JSON");
        }else{
            return 0;
            //alert(1);
        }
    },

    // saveInfo : function() {
    //     var data = $(".submit-form").serializeArray();
    //     postData = {};
    //     $(data).each(function(i){
    //        postData[this.name] = this.value;
    //     });
    //     console.log(postData);
    //     url = "/index.php?m=admin&c=user&a=saveInfo";
    //     var conf = confirm("确认保存？");
    //     if(conf==true){
    //         $.post(url,data,function(result){
    //             //alert(2);
    //             if(result.status==1){
    //                 alert(result.message);
    //                 window.location.href="/index.php?m=admin&c=user&a=person";

    //             }else{
    //                 alert(result.message);
    //             }
    //         },"JSON");
    //     }else{
    //         return 0;
    //         //alert(1);
    //     }

    // }
    

}





// $('#delete').on('click',function(){
//     var id = $(this).attr('attr-id');
//     var url = "/index?m=admin&c=user&a=delete";
//     var conf = confirm("确认删除？");
//     if(conf==1){
//         $.post(url,id,function(result){
//             if(result.status==1){

//             }else{

//             }
//         },"JSON");
//     }else{
//         return 0;
//     }
    
// });
    

