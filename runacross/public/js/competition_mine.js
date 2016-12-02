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

            alert(msg.info);

            if(msg.result) {
                window.location.reload();
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

            $('quit_confirm_modal'+competitionId).closeModal();

            alert(msg.info);

            if(msg.result) {
                window.location.reload();
            }
        }
    });
}