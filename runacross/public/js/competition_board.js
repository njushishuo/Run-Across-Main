$(document).ready(function(){
    //随滚动识别中心内容，高亮右侧导航
    $('.scrollspy').scrollSpy();

    //对话框
    $('.modal-trigger').leanModal();
});


function joinIdvCmpt(competitionId , userId) {

    $.ajax({

        type: "post",
        url: "/competitions/"+competitionId+"/"+userId,
        success: function(msg){
            console.log(msg);
            if(msg.result){
                alert(msg.info);
                window.location.reload();
            }else{
                alert("加入失败");
            }
        }
    });
}

function joinTmCmpt( competitionId , userId ) {
    var team = "";
    var bool = $('#red_radio:checked').val();
    if(bool){
        team="red";
    }else{
        team="blue";
    }

    $.ajax({

        type: "post",
        url: "/competitions/"+competitionId+"/"+userId+"/"+team,
        success: function(msg){
            console.log(msg);
            if(msg.result){
                $('team_confirm_modal').closeModal();
                alert(msg.info);
                window.location.reload();
            }else{
                alert("加入失败");
            }
        }
    });
}



function checkLevel(userLevel) {
    if(userLevel<3){
     alert("只有3级以上才可以发起竞赛哦！");
    }else{
       $('#createComp').openModal();
    }
}