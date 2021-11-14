$(function () {
    $('.tampilmodaltambah').on('click', function () {
        $('#exampleModalLabel').html('Tambah Data User');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#username').val('');
        $('#password1').val('');
        $('#password2').val('');
        $('.modal-body form').attr('action', 'http://localhost/sistem_laundry/user');

    });

    $('.tampilmodaledit').on('click', function () {

        $('#exampleModalLabel').html('Edit Data User');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/sistem_laundry/user/edituser');


        const id = $(this).data('id');

        $.ajax({

            url: 'http://localhost/sistem_laundry/user/getedituser',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_user').val(data.id_user);
                $('#username').val(data.username);
            }
        });

    });
});

