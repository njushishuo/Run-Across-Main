function vote(momentId,userId,count) {

    var starId = "i#"+momentId+"star";
    var spanId = "span#"+momentId+"span";

    var tmp1 = $(starId).hasClass("black-text");
    var tmp2 = $(starId).hasClass("red-text");
    var cnt =  $(spanId).html();

    var isVote = tmp1&!tmp2;
    var type = "post";
    if(!isVote){
        type="delete"
    }


    $.ajax({
        type: type,
        url: "/moment/"+momentId+"/user/"+userId,
        success: function(msg){

            console.log(msg);

            if(msg.result){

                if(isVote){
                    $(starId).removeClass("black-text");
                    $(starId).addClass("red-text");
                    $(spanId).html(++cnt);

                }else{
                    $(starId).removeClass("red-text");
                    $(starId).addClass("black-text");
                    $(spanId).html(--cnt);
                }
            }else{
                alert("点赞失败");
            }

        }
    });
}
