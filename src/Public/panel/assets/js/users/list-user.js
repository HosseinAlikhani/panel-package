jQuery(document).ready(function($) {

    $('.delete-user').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        console.log(url);
        $.ajax({
            url: url,
            type: "DELETE",
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
