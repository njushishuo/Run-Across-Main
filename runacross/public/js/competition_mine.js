$(document).ready(function(){
    //随滚动识别中心内容，高亮右侧导航
    $('.scrollspy').scrollSpy();

    //对话框
    $('.modal-trigger').leanModal();
});


function deleteCmpt(competitionId) {

    $.ajax({

        type: "delete",
        url: "/competitions/"+competitionId,
        success: function(msg){
            console.log(msg);

            if(msg.result) {
                var $toastContent = $('<span>取消成功</span>');
                Materialize.toast($toastContent, 1000);
                $('#'+competitionId).remove();

            }
        }
    });
}





function quitCmpt(competitionId , userId) {

    $.ajax({

        type: "delete",
        url: "/competitions/"+competitionId+"/"+userId,
        success: function(msg){
            console.log(msg);

            if(msg.result) {
                var $toastContent = $('<span>退出成功</span>');
                Materialize.toast($toastContent, 1000);
                $('#'+competitionId).remove();
            }
        }
    });
}

