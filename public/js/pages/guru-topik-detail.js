$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var id = $('input[name="id"]').val();

    var table4 = $('#table-reference').DataTable({
        ajax: '/teacher/reference/topic/'+id,
        searching: false,
        ordering: false,
        paging: false,
        columnDefs: [
            {
                targets: 0,
                className: "text-center",
                width: '10%',
                render: function (data, type, row, meta) {
                    return meta.row + 1
                }
            },
            {
                targets: 1,
                data: 'link',
                render: function (data, type, row, meta) {
                    return `<a href="${data}" target="_blank">${row.name}</a>`
                }
            },
            {
                targets: 2,
                className: "text-center",
                width: '20%',
                data: '_id',
                render: function (data, type, row, meta) {
                    return `<button type="button" class="btn btn-sm btn-outline-danger btn-delete" data-id="${data}" title="Hapus"><i class="fas fa-times"></button>`
                }
            }
        ]
    });

    $('#modalReferensi').on('shown.bs.modal', function () {
        table4.columns.adjust();
    });

    // Editor Point
    var editor_point;

    ClassicEditor
        .create( document.querySelector( '#editor-point' ) )
        .then( editor => {
            console.log( editor );
            editor_point = editor
        } )
        .catch( error => {
            console.error( error );
        } );

    $('#modalPoint').on('shown.bs.modal', function () {
        editor_point.setData($('#editor-point-display').html());
    });

    // Update points
    $("#form-point").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "PUT",
            url: "/teacher/topic/point",
            data: {id: $(this).find('input[name="id"]').val(), poin: editor_point.getData()},
            dataType: "JSON",
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status == 'success') {
                    $('#modalPoint').modal('hide')
                    Swal.fire('Berhasil!', 'Data berhasil disimpan', 'success')
                    window.location.reload()
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                $.LoadingOverlay('hide')
                Swal.fire('Oops!', 'Terjadi Kesalahan Server.', 'error')
            }
        });
    });

    // Add reference
    $("#form-reference").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/teacher/reference",
            data: $(this).serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status == 'success') {
                    Swal.fire('Berhasil!', 'Data berhasil disimpan', 'success')
                    $("#form-reference").trigger('reset')
                    table4.ajax.reload()
                    $("#ref-list").append(`<li class="text-primary"><a href="${response.data.url}" id="${response.data._id}" target="_blank">${response.data.name}</a></li>`);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                $.LoadingOverlay('hide')
                Swal.fire('Oops!', 'Terjadi Kesalahan Server.', 'error')
            }
        });
    });

    // Button delete reference
    $('#table-reference tbody').on( 'click', '.btn-delete', function () {
        var data = table4.row( $(this).parents('tr') ).data();
        // console.log(data._id);

        $.ajax({
            type: "delete",
            url: "/teacher/reference/"+data._id,
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status == 'success') {
                    table4.ajax.reload()
                    Swal.fire('Berhasil!', 'Data berhasil dihapus', 'success')
                    $(`#${data._id}`).parent().remove();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                $.LoadingOverlay('hide')
                Swal.fire('Oops!', 'Terjadi Kesalahan Server.', 'error')
            }
        });
    } );

    // init
    $('#video_meeting_id').val($('#table-video-1').data('id'));
    $('#module_meeting_id').val($('#table-module-1').data('id'));
    $('#task_meeting_id').val($('#table-task-1').data('id'));

    // on shown
    $('a[data-toggle="pill"]').on('shown.bs.tab', function (event) {
        $('#video_meeting_id').val($(this).data('id'));
        $('#module_meeting_id').val($(this).data('id'));
        $('#task_meeting_id').val($(this).data('id'));
    })

     // Form submit video
    $('#form-video').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/teacher/meeting/video",
            data: $(this).serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status == 'success') {
                    Swal.fire('Berhasil!', 'Data berhasil disimpan', 'success')
                    var data = response.data
                    $('#table-video-'+data.meeting).DataTable().ajax.reload()
                    $("#modalVideo").modal('hide');

                    $("input[name='nama']").val('');
                    $("input[name='url']").val('');
                    $("input[name='file']").val('');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                $.LoadingOverlay('hide')
                Swal.fire('Oops!', 'Terjadi Kesalahan Server.', 'error')
            }
        });
    });

    // Form submit module
    $('#form-module').submit(function (e) {
        e.preventDefault();
        var formData = new FormData($("#form-module")[0]);
        $.ajax({
            type: "POST",
            url: "/teacher/meeting/module",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status == 'success') {
                    Swal.fire('Berhasil!', 'Data berhasil disimpan', 'success')
                    var data = response.data
                    $('#table-module-'+data.meeting).DataTable().ajax.reload()
                    $("#modalModule").modal('hide');

                    $("input[name='nama']").val('');
                    $("input[name='url']").val('');
                    $("input[name='file']").val('');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                $.LoadingOverlay('hide')
                Swal.fire('Oops!', 'Terjadi Kesalahan Server.', 'error')
            }
        });
    });

    // Form submit task
    $('#form-task').submit(function (e) {
        e.preventDefault();
        var formData = new FormData($("#form-task")[0]);
        $.ajax({
            type: "POST",
            url: "/teacher/meeting/task",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status == 'success') {
                    Swal.fire('Berhasil!', 'Data berhasil disimpan', 'success')
                    var data = response.data
                    $('#table-task-'+data.meeting).DataTable().ajax.reload()
                    $("#modalTask").modal('hide');

                    $("input[name='nama']").val('');
                    $("input[name='url']").val('');
                    $("input[name='file']").val('');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                $.LoadingOverlay('hide')
                Swal.fire('Oops!', 'Terjadi Kesalahan Server.', 'error')
            }
        });
    });

    // Ganti pertemuan
    $("#meeting").change(function (e) {
        e.preventDefault();
        var topic_meeting = $('input[name="topic_meeting"]').val()
        $.ajax({
            type: "put",
            url: "/teacher/topic/meeting",
            data: {id_topic: topic_meeting, meeting: $(this).val()},
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status == 'success') {
                    Swal.fire('Sukses!', 'Pertemuan Topic Diubah.', 'success')
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $.LoadingOverlay('hide')
                Swal.fire('Error!', 'Terjadi Kesalahan Server.', 'error')
                console.log(jqXHR)
            }
        });
    });
});
