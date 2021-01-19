
$(document).ready(function () {
    $('#category').change(function () {
        var cid = $(this).val();
        alert(catid);
        $.ajax({
            url: {{ route('show.products') }},
        type: "POST",
        data: {
        '_token': "{{csrf_token()}}",
        'cid': id
    },
        success: function (response) {
            $('.show-products').show();
            $('.show-products').html(response);
        }
        });
    });
});
