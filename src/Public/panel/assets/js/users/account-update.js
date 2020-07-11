jQuery(document).ready(function($) {

    $('#update-profile-setting').click(function (e) {
        e.preventDefault();
        var formdata = $(".general-info").serializeArray();
        $.ajax({
            url: "http://127.0.0.1:8000/panel/setting",
            type: "POST",
            data: formdata,
            success: function(e) {
                toast({
                    type: 'success',
                    title: e,
                    padding: '2em',
                })
            },
            error: function(e) {
                toast({
                    type: 'error',
                    title: e.responseText,
                    padding: '2em',
                })
            }
        });
    });
});
