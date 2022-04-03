$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#dataTable').DataTable({
        ajax: "/teacher/topic/",
        ordering: false,
        lengthChange: false,
        columnDefs: [
            {
                targets: 0,
                className: 'text-center',
                width: "10%",
                render: function(data, type, row, meta) {
                    return meta.row + 1
                }
            },
            {
                targets: 1,
                data: 'name'
            },
            {
                targets: 2,
                className: 'text-center',
                width: "20%",
                data: '_id',
                render: function(data, type, row, meta) {
                    return `<a role="button" class="btn btn-sm btn-primary" href="/teacher/topic/detail/${data}" title="Detail Topik"><i class="fas fa-eye"></i></a>`
                }
            },
        ]
    });

    $('#form-create').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "/teacher/topic",
            data: $(this).serialize(),
            dataType: "JSON",
            beforeSend: function () {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status === "success") {
                    $('.modal').modal('hide');
                    Swal.fire('Berhasil!', 'Data berhasil disimpan.', 'success');
                    $('#form-create').trigger('reset');
                    table.ajax.reload();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                $.LoadingOverlay('hide')
                Swal.fire('Oops!', 'Terjadi Kesalahan Server.', 'error')
            }
        });
    });

    Swal.fire(
      "Selamat Datang!",
      "Disini Anda dapat membuat topik baru dan melihat topik yang pernah dibuat sebelumnya. Untuk melihat detil setiap topik, klik ikon mata.",
      "info"
    );
});
