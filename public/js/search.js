$(function () {
    $('#search_click').click(function () {
        var data = $('#search').val();
        $.ajax({
            url: '/search/ajax',
            data: 'query=' + data,
            method: 'post',
            success: function (data) {
                $('#empty').html(data);
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });
});