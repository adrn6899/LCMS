(function(){
    "use strict";

    $(function(){
       $('#btn-update-pw').on('click', function(e){
        e.preventDefault();
        var form = $('#password-update');

        $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form.serialize(),
        success: function(response) {
            toastRWithTime("Password changed successfully",'success');
            window.location.reload();
        },
        error: function(xhr, status, error) {
            toastRWithTime(JSON.parse(xhr.responseText).message,'error');
        }
        });
       }); 
    });
})();