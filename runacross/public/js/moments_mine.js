
$(document).ready(function(){

    $('.modal-trigger').leanModal();

});


function deleteMomentById(userId , momentId) {

   // alert(userId,momentId);
    $.ajax({

        type: "delete",
        url:   "/user/"+userId+"/moments/"+momentId,
        success: function(msg){

            console.log(msg);

            if(msg.result){

               // window.location.href = msg.url;
                 $('#'+momentId).remove();
            }else{
                alert("删除失败");
            }

        }
    });
    
}


function showToasts(userId , momentId) {
    var $toastContent = $('<span>删除成功</span>');
    Materialize.toast($toastContent, 1000);
    deleteMomentById(userId,momentId);

}