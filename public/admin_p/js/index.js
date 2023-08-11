// видалення сповіщень
function sendMarkRequest(id = null) {
    return $.ajax("/admin/mark-as-read", {
        method: 'POST',
        data: {
            _token: $('#token').val(),
            id
        }
    });
}
$(function() {
    $('.mark-as-read').click(function() {
        let request = sendMarkRequest($(this).data('id'));
        request.done(() => {
            $(this).parents('div.alert').remove();
            console.log(request);
        });
    });
    $('#mark-all').click(function() {
        let request = sendMarkRequest();
        request.done(() => {
            $('div.alert').remove();
        })
    });
});


// вікно повідомлень для CRUD операцій
$('.toast').toast('show');

// удаление данных с таблиц
$(document).ready(function() {
    // For A Delete Record Popup
    $('.remove-record').click(function() {
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        $(".remove-record-model").attr("action", url);
        $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="' +
            id + '">');
    });

    $('.remove-data-from-delete-form').click(function() {
        $('body').find('.remove-record-model').find("input").remove();
    });
});


// Trumbowyg редактор тексту
$('#ua_description_trum, #en_description_trum').trumbowyg({
    btns: [
        ['unorderedList'],
    ],
    autogrow: true
});