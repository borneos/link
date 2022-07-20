function checkPrefixLanding(){
    $('#checkPrefixLanding').on('click', function (){
        let getValue = $('#prefixLanding').val();
        let notice = $('.notice');
        $.ajax({
            type: 'GET',
            url: `getPrefixLanding`,
            data: {
                prefix: getValue,
            },
            success: function (data){
                if (data === 1){
                    return notice.addClass("text-danger").text("Prefix telah tersedia! Silahkan coba prefix baru!");
                } else {
                    return notice.removeClass("text-danger").addClass("text-success").text("Prefix dapat digunakan!");
                }
            }
        });
    });
}
