
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
                   //alert("删除成功");
                window.location.href = msg.url;
            }else{
                alert("删除失败");
            }

        }
    });
    
}