$(document).ready(function () {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
});



function updateRecord(userId) {

    var date = $('#datePicker').val();
    //alert(date);

    $.ajax({

        type: "put",
        url: "/user/"+userId+"/deviceRecords/"+date,

        success: function(msg){

            console.log(msg);

            if(msg.result){
            //    alert("更新成功");
                window.location.href="/user/"+userId+"/deviceRecords/"+date;
            }else{
              //  alert("更新失败");
            }

        }
    });
    
}