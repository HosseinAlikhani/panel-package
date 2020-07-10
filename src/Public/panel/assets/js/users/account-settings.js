jQuery(document).ready(function($) {
    $('.dropify').dropify({
        messages: { 'default': 'Click to Upload or Drag n Drop', 'remove':  '<i class="flaticon-close-fill"></i>', 'replace': 'Upload or Drag n Drop' }
    });

    // Save notification messagae
    $('#multiple-messages').on('click', function() {
        $.blockUI({
            message: $('.blockui-growl-message'),
            fadeIn: 700,
            fadeOut: 700,
            timeout: 3000, //unblock after 3 seconds
            showOverlay: false,
            centerY: false,
            css: {
                width: '250px',
                backgroundColor: 'transparent',
                top: '12px',
                left: '15px',
                right: 'auto',
                border: 0,
                opacity: .95,
                zIndex: 1200,
            }
        });
    });

    setTimeout(function(){ $('.list-group-item.list-group-item-action').last().removeClass('active'); }, 100);

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

progressBarCount('.progress-range-counter');

function progressBarCount($progressCount) {
    var elements = document.querySelectorAll($progressCount);
    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('input', function(event) {
            getValueOfRangeSlider = this.value;
            getParentElement = this.closest(".custom-progress").querySelector('.range-count-number');

            setValueOfRangeCountValue = getParentElement.innerHTML = getValueOfRangeSlider;
            setValueOfAttributeValue = getParentElement.setAttribute("data-rangeCountNumber", getValueOfRangeSlider)
        });
    }
}
