$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table1 = $('#table-1').DataTable({
        ajax: "/teacher/group/"+$('#table-1').data('id')+"/student",
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
                className: "text-center",
                data: 'classroom'
            },
            {
                targets: 3,
                className: 'text-center',
                width: "20%",
                data: '_id',
                render: function(data, type, row, meta) {
                    return `<button type="button" class="btn btn-sm btn-danger btn-remove" data-id="${data}" title="Hapus dari Kelas"><i class="fas fa-times"></i></a>`
                }
            },
        ]
    });

    var table2 = $('#table-2').DataTable({
        ajax: "/teacher/group/"+$('#table-2').data('id')+"/student",
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
                className: "text-center",
                data: 'classroom'
            },
            {
                targets: 3,
                className: 'text-center',
                width: "20%",
                data: '_id',
                render: function(data, type, row, meta) {
                    return `<button type="button" class="btn btn-sm btn-danger btn-remove" data-id="${data}" title="Hapus dari Kelas"><i class="fas fa-times"></i></a>`
                }
            },
        ]
    });

    var table3 = $('#table-3').DataTable({
        ajax: "/teacher/group/"+$('#table-3').data('id')+"/student",
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
                className: "text-center",
                data: 'classroom'
            },
            {
                targets: 3,
                className: 'text-center',
                width: "20%",
                data: '_id',
                render: function(data, type, row, meta) {
                    return `<button type="button" class="btn btn-sm btn-danger btn-remove" data-id="${data}" title="Hapus dari Kelas"><i class="fas fa-times"></i></a>`
                }
            },
        ]
    });

    var table4 = $('#table-4').DataTable({
        ajax: "/teacher/group/"+$('#table-4').data('id')+"/student",
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
                className: "text-center",
                data: 'classroom'
            },
            {
                targets: 3,
                className: 'text-center',
                width: "20%",
                data: '_id',
                render: function(data, type, row, meta) {
                    return `<button type="button" class="btn btn-sm btn-danger btn-remove" data-id="${data}" title="Hapus dari Kelas"><i class="fas fa-times"></i></a>`
                }
            },
        ]
    });

    var table5 = $('#table-5').DataTable({
        ajax: "/teacher/group/"+$('#table-5').data('id')+"/student",
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
                className: "text-center",
                data: 'classroom'
            },
            {
                targets: 3,
                className: 'text-center',
                width: "20%",
                data: '_id',
                render: function(data, type, row, meta) {
                    return `<button type="button" class="btn btn-sm btn-danger btn-remove" data-id="${data}" title="Hapus dari Kelas"><i class="fas fa-times"></i></a>`
                }
            },
        ]
    });

    var table6 = $('#table-6').DataTable({
        ajax: "/teacher/group/"+$('#table-6').data('id')+"/student",
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
                className: "text-center",
                data: 'classroom'
            },
            {
                targets: 3,
                className: 'text-center',
                width: "20%",
                data: '_id',
                render: function(data, type, row, meta) {
                    return `<button type="button" class="btn btn-sm btn-danger btn-remove" data-id="${data}" title="Hapus dari Kelas"><i class="fas fa-times"></i></a>`
                }
            },
        ]
    });

    var table_siswa = $('#table-siswa').DataTable({
        ajax: "/teacher/student/filter/"+$('#table-siswa').data('topic'),
        lengthChange: false,
        pageLength: 5,
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
                className: "text-center",
                width: "10%",
                data: 'classroom'
            },
            {
                targets: 3,
                className: 'text-center',
                width: "10%",
                data: '_id',
                render: function(data, type, row, meta) {
                    return `<button type="button" class="btn btn-sm btn-primary btn-add" data-id="${data}" title="Tambahkan"><i class="fas fa-plus"></i></button>`
                }
            }
        ]
    });

    // Button modal siswa
    $('.btn-modal-siswa').on('click', function () {
        var id_kelompok = $(this).data('id');
        $('#table-siswa').data('kelompok', id_kelompok);
        $('#modalAdd').modal('show');
        table_siswa.ajax.reload();
    });

    $('#modalAdd').on('shown.bs.modal', function () {
        table_siswa.columns.adjust();
    });

    // Button add
    $('#table-siswa tbody').on('click', '.btn-add', function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/teacher/group/"+$('#table-siswa').data('kelompok')+'/student/'+$(this).data('id'),
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                var data = response.data;
                switch(data.group) {
                    case 1:
                        table1.ajax.reload();
                        break;
                    case 2:
                        table2.ajax.reload();
                        break;
                    case 3:
                        table3.ajax.reload();
                        break;
                    case 4:
                        table4.ajax.reload();
                        break;
                    case 5:
                        table5.ajax.reload();
                        break;
                    case 6:
                        table6.ajax.reload();
                        break;
                    default:
                      // code block
                }
                table_siswa.ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $.LoadingOverlay('hide')
                console.log(jqXHR)
            }
        });
    })

    // Button remove
    $('tbody').on('click', '.btn-remove', function(e) {
        e.preventDefault();
        var id_group = $(this).closest('table').data('id');

        $.ajax({
            url: "/teacher/group/"+id_group+'/student/'+$(this).data('id'),
            type: "delete",
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function (response) {
                $.LoadingOverlay('hide')
                var data = response.data;
                switch(data.group) {
                    case 1:
                        table1.ajax.reload();
                        break;
                    case 2:
                        table2.ajax.reload();
                        break;
                    case 3:
                        table3.ajax.reload();
                        break;
                    case 4:
                        table4.ajax.reload();
                        break;
                    case 5:
                        table5.ajax.reload();
                        break;
                    case 6:
                        table6.ajax.reload();
                        break;
                    default:
                      // code block
                }
                table_siswa.ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $.LoadingOverlay('hide')
                console.log(jqXHR)
            }
        });
    })
});
