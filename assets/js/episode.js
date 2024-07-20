$(document).on('click', '#but_send_report', function () {
    var log_des = $('#log_des').val() ?? '';
    $.ajax({
        url: URL_POST_AJAX,
        method: 'POST',
        dataType: 'json',
        data: { message: log_des,action : "reportbug"
        }
    }).done(function (data) {
        var str = "Gửi báo lỗi thành công!";
        setTimeout(function () {
            $('#ModalBaoloi').modal('hide');
        }, 1000);
        $('#show_msg').html(str);
        $("#ModalBaoloi").modal();
        $('#report_error').remove();
    }).fail(function () {
        console.log('error-connection');
    });
});
