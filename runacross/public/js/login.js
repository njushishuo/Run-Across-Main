function loginVerify(){

    $.ajax({

        type: "post",
        url: "/login",
        data: $("#loginForm").serialize(),
        success: function(msg){

                console.log(msg);

                if(msg.result){
                    alert("登陆成功"+"正在跳转"+msg.url);
                    window.location.href = msg.url;
                }else{
                    alert("登陆失败");
                }

        }
    });

}

function register(){

    $.ajax({
        type: "post",
        url: "/register",
        data: $("#registerForm").serialize(),
        success: function(msg){

            console.log(msg);

            if(msg.result){
                alert("登陆成功"+"正在跳转"+msg.url);
                window.location.href = msg.url;
            }else{
                alert("登陆失败");
            }

        }
    });

}