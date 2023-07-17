$(document).ready(function() {
    $('#login-form').submit(function(event) {
        event.preventDefault();

        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            url: '/api/user/login',
            method: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                console.log(response.valid)
                if (response.valid) {
                    showMessage('Login sukses!', 'success');
                    
                    window.location.href = '/';
                } else {
                    showMessage('Username atau password salah.', 'error');
                }
            },
            error: function() {
                showMessage('Error pada saat login.', 'error');
            }
        });

        $('#username').val('');
        $('#password').val('');
    });

    function showMessage(message, type) {
        var alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        var messageBox = $('#div-message').addClass('alert ' + alertClass).text(message);

        $('.login-card-body').prepend(messageBox);

        // Automatically remove message after 3 seconds
        setTimeout(function() {
            messageBox.remove();
        }, 3000);
    }
});