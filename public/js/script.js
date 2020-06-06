$(function() {

    $('.tombolTambahData').on('click', function() {

        $('#formModalLabel').html('Tambah Data Tamu');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#email').val('');
        $('#pesan').val('');
        $('#id').val('');

    });

    $('.tampilModalEdit').on('click', function() {

        $('#formModalLabel').html('Edit Data Tamu');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', 'http://localhost/mvc/public/bukutamu/edit');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mvc/public/bukutamu/getEdit',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#email').val(data.email);
                $('#pesan').val(data.pesan);
                $('#id').val(data.id);
            }
        });

    });

});