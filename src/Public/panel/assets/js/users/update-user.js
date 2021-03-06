jQuery(document).ready(function($) {

    $('#update-profile').click(function (e) {
        e.preventDefault();
        var formdata = $(".general-info").serializeArray();
        var url = $(".general-info").attr('action');
        var role = {
            'name': 'role',
            'value': $("#role").val(),
        };
        console.log(role);
        formdata.push(role);
        $.ajax({
            url: url,
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
