jQuery(document).ready(function($) {
    $('#form-submit').click(function () {
        console.log('hacker');
        var form = $("form[name='form']");
        var formdata = form.serializeArray();
        var url = form.attr('action');
        var method = form.attr('method');
        var permission = {
            'name': 'permission',
            'value': $("#permission").val(),
        };
        formdata.push(permission);
        $.ajax({
            url: url,
            type: method,
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
