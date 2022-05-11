$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table_video = $('#table-video-1').DataTable({
        ajax: '/teacher/meeting/video/'+$('#table-video-1').data('id'),
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
                data: 'name',
                render: function (data, type, row, meta) {
                    return `<a href="${row.url}" target="_blank">${data}</a>`
                }
            },
            {
                targets: 2,
                className: "text-center",
                width: '10%',
                data: '_id',
                render: function (data, type, row, meta) {
                    return `<button class="btn btn-sm btn-danger btn-delete" data-id="${data}"><i class="fas fa-times"></i></button>`
                }
            }
        ]
    });

    var table_module = $('#table-module-1').DataTable({
        ajax: '/teacher/meeting/module/'+$('#table-module-1').data('id'),
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
                data: 'name',
                render: function (data, type, row, meta) {
                    return `<a href="/storage/modules/${row.file}" target="_blank">${data}</a>`
                }
            },
            {
                targets: 2,
                className: "text-center",
                width: '10%',
                data: '_id',
                render: function (data, type, row, meta) {
                    return `<button class="btn btn-sm btn-danger btn-delete" data-id="${data}"><i class="fas fa-times"></i></button>`
                }
            }
        ]
    });

    var table_task = $('#table-task-1').DataTable({
        ajax: '/teacher/meeting/task/'+$('#table-task-1').data('id'),
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
                data: 'name',
                render: function (data, type, row, meta) {
                    return `<a href="/storage/tasks/${row.file}" target="_blank">${data}</a>`
                }
            },
            {
                targets: 2,
                className: "text-center",
                width: '10%',
                data: '_id',
                render: function (data, type, row, meta) {
                    return `<button class="btn btn-sm btn-danger btn-delete" data-id="${data}"><i class="fas fa-times"></i></button>`
                }
            }
        ]
    });

    var table_assignment = $('#table-assignment-1').DataTable({
        ajax: '/teacher/meeting/assignment/'+$('#table-assignment-1').data('id'),
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
                data: 'name',
                render: function (data, type, row, meta) {
                    return `<a href="/storage/assignments/${row.file}" target="_blank">${data}</a>`
                }
            },
            {
                targets: 2,
                className: "text-center",
                width: '10%',
                data: '_id',
                render: function (data, type, row, meta) {
                    return `<button class="btn btn-sm btn-danger btn-delete" data-id="${data}"><i class="fas fa-times"></i></button>`
                }
            }
        ]
    });

    var task_result = $('#table-task-result-1').DataTable({
        ajax: '/teacher/meeting/answer/'+$('#table-task-result-1').data('id'),
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
                data: null,
                render: function (data, type, row, meta) {
                    return row.user.name
                }
            },
            {
                targets: 2,
                data: null,
                render: function (data, type, row, meta) {
                    return row.user.classroom
                }
            },
            {
                targets: 3,
                className: "text-center",
                data: null,
                render: function (data, type, row, meta) {
                    return `<a href="/storage/modules/${row.group}" target="_blank"><i class="fas fa-download"></i></a>`
                }
            },
            {
                targets: 4,
                className: "text-center",
                data: null,
                render: function (data, type, row, meta) {
                    return `<a href="/storage/modules/${row.individual}" target="_blank"><i class="fas fa-download"></i></a>`
                }
            }
        ]
    });

    var editor1;

    ClassicEditor
        .create( document.querySelector( '#editor1' ) )
        .then( editor => {
            console.log( editor );
            editor1 = editor
        } )
        .catch( error => {
            console.error( error );
        } );

    // Update Goals
    $("#form-goal-1").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "PUT",
            url: "/teacher/meeting/goal/"+$(this).data('id'),
            data: {id: $(this).data('id'), tujuan: editor1.getData()},
            dataType: "JSON",
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status == 'success') {
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

    // VIDEO
    // Modal add video
    $('.btn-video-tambah').on('click', function (e) {
        e.preventDefault()
        // var meeting_id = $('#table-video-1').data('id');
        // $('#video_meeting_id').val(meeting_id);
        $("#modalVideo").modal('show');
    });

    // Button delete video
    $('#table-video-1 tbody').on('click', '.btn-delete', function () {
        var data = table_video.row( $(this).parents('tr') ).data();
        var id = data._id
        var meeting_id = $('#table-video-1').data('id')

        $.ajax({
            type: "DELETE",
            url: `/teacher/meeting/video/${id}/${meeting_id}`,
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status == 'success') {
                    Swal.fire('Berhasil!', 'Data berhasil dihapus', 'success')
                    table_video.ajax.reload()
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                $.LoadingOverlay('hide')
                Swal.fire('Oops!', 'Terjadi Kesalahan Server.', 'error')
            }
        });
    });

    // MODULE
    // Button add module
    $('.btn-module-tambah').on('click', function (e) {
        e.preventDefault()
        // var meeting_id = $('#table-module-1').data('id');
        // $('#module_meeting_id').val(meeting_id);
        $("#modalModule").modal('show');
    });

    // Button delete module
    $('#table-module-1 tbody').on('click', '.btn-delete', function () {
        var data = table_module.row( $(this).parents('tr') ).data();
        var id = data._id
        var meeting_id = $('#table-module-1').data('id')

        $.ajax({
            type: "DELETE",
            url: `/teacher/meeting/module/${id}/${meeting_id}`,
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status == 'success') {
                    Swal.fire('Berhasil!', 'Data berhasil dihapus', 'success')
                    table_module.ajax.reload()
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                $.LoadingOverlay('hide')
                Swal.fire('Oops!', 'Terjadi Kesalahan Server.', 'error')
            }
        });
    });

    // TASK
    // Button add task
    $('.btn-task-tambah').on('click', function (e) {
        e.preventDefault()
        // var meeting_id = $('#table-task-1').data('id');
        // $('#task_meeting_id').val(meeting_id);
        $("#modalTask").modal('show');
    });

    // Button delete task
    $('#table-task-1 tbody').on('click', '.btn-delete', function () {
        var data = table_task.row( $(this).parents('tr') ).data();
        var id = data._id
        var meeting_id = $('#table-task-1').data('id')

        $.ajax({
            type: "DELETE",
            url: `/teacher/meeting/task/${id}/${meeting_id}`,
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status == 'success') {
                    Swal.fire('Berhasil!', 'Data berhasil dihapus', 'success')
                    table_task.ajax.reload()
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                $.LoadingOverlay('hide')
                Swal.fire('Oops!', 'Terjadi Kesalahan Server.', 'error')
            }
        });
    });

    // ASSIGNMENT
    // Button add assignment
    $('.btn-assignment-tambah').on('click', function (e) {
        e.preventDefault()
        // var meeting_id = $('#table-assignment-1').data('id');
        // $('#assignment_meeting_id').val(meeting_id);
        $("#modalAssignment").modal('show');
    });

    // Button delete assignment
    $('#table-assignment-1 tbody').on('click', '.btn-delete', function () {
        var data = table_assignment.row( $(this).parents('tr') ).data();
        var id = data._id
        var meeting_id = $('#table-assignment-1').data('id')

        $.ajax({
            type: "DELETE",
            url: `/teacher/meeting/assignment/${id}/${meeting_id}`,
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                if (response.meta.status == 'success') {
                    Swal.fire('Berhasil!', 'Data berhasil dihapus', 'success')
                    table_assignment.ajax.reload()
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                $.LoadingOverlay('hide')
                Swal.fire('Oops!', 'Terjadi Kesalahan Server.', 'error')
            }
        });
    });
});
