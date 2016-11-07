$(document).ready(function(){


    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

    //随滚动识别中心内容，高亮右侧导航
    $('.scrollspy').scrollSpy();

    //对话框
    $('.modal-trigger').leanModal();
});
