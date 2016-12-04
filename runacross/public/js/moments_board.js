function vote(momentId,userId) {
    $.ajax({
        type: "post",
        url: "/moment/"+momentId+"/user/"+userId,
        success: function(msg){

            console.log(msg);

            if(msg.result){

                window.location.reload();
            }else{
                alert("点赞失败");
            }

        }
    });
}

function unVote(momentId,userId) {
    $.ajax({
        type: "delete",
        url: "/moment/"+momentId+"/user/"+userId,
        success: function(msg){

            console.log(msg);

            if(msg.result){

                window.location.reload();
            }else{
                alert("取消点赞失败");
            }

        }
    });
}