$(document).ready(function() {
    $('#logout-ahref').click(function(event) {
        event.preventDefault();

        $.ajax({
            url: '/api/user/logout',
            method: 'POST',
            success: function(response) {
                if (response.valid) {
                    window.location.href = '/';
                } else {
                    console.log('Logout gagal.');
                }
            },
            error: function() {
                console.log('Error pada saat logout.');
            }
        });
    });
});