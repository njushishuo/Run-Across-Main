

function follow(userId, followId) {

    userDetial = {
        username:'',
        age:'',
        goal:'',
        location:'',
        followId :null
    }

    $.ajax({
        type: "post",
        url: "/user/"+userId+"/watch/"+followId,
        success: function(msg){

            console.log(msg);

            if(msg.result){
                userDetial.followId = followId;
                window.location.reload();
            }else{

            }

        }
    });
}

function unfollow(userId, followId) {

    $.ajax({
        type: "delete",
        url: "/user/"+userId+"/watch/"+followId,
        success: function(msg){

            console.log(msg);

            if(msg.result){
                window.location.reload();
            }else{

            }

        }
    });
}