$('#prefix').focusout(function (){
    let getValue = $('#prefix').val(); 
    let notice = $('.notice');
    $.ajax({
        type: "GET",
        url: `getPrefix`,
        data: {
            prefix: getValue,
        },
        success: function (data){

           if (data === 0 && getValue === ''){
               notice.text('');
           } else if (data === 1){
                return notice.removeClass("text-success").addClass("text-danger").text("Prefix has been used!");
           } else if (data === 0 ) {
                return notice.removeClass("text-danger").addClass("text-success").text("Prefix can be use!");
           } 

        }
    });
});

$('#generate').click(function (){
    let getValue = $('#prefix').val(); 
    let notice = $('.notice');
    $.ajax({
        type: 'GET',
        url: `getPrefix`,
        data: {
            prefix: getValue,
        },
        success: function (data){
            if (data === 1){
                return notice.addClass("text-danger").text("Prefix has been used!");
            } else {
                return notice.removeClass("text-danger").addClass("text-success").text("Prefix can be use!");
            }
        }
    });
});