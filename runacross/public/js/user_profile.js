$(document).ready(function () {
    $('.datepicker').pickadate({
        selectMonths: true ,// Creates a dropdown to control month
        selectYears: 20   // Creates a dropdown of 15 years to control year
    });
});



function updateInfo(userId){
    $.ajax({

        type: "post",
        url: "/user/"+userId+"/userInfo",
        data: $("#basicInfoForm").serialize(),
        success: function(msg){

            console.log(msg);

            if(msg.result){
                 //  alert("更新成功");
                window.location.href='/user/'+userId+'/userInfo';
            }else{
                alert("更新失败");
            }

        }
    });

}