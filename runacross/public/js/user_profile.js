$(document).ready(function () {
    $('.datepicker').pickadate({
        selectMonths: true ,// Creates a dropdown to control month
        selectYears: 20   // Creates a dropdown of 15 years to control year
    });
});



function updateAvatar(userId) {

    var form = document.getElementById("avatarForm");
    var formData = new FormData(form);
    $.ajax({
        type: 'POST',
        url: '/user/' + userId + '/userInfo/avatar',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,

        success: function (msg) {

            if (msg.result) {

                window.location.href = '/user/' + userId + '/userInfo';
            } else {

                alert("error");
            }

        }
    })
    
}



function updateInfo(userId){

    $.ajax({

        type: "post",
        url: "/user/"+userId+"/userInfo",
        data: $("#basicInfoForm").serialize(),
        success: function(msg){

            console.log(msg);

            if(msg.result){

                window.location.href='/user/'+userId+'/userInfo';
            }else{
                alert(msg.info);
            }

        }
    });

}