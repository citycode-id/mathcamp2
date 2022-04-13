$(function () {
    var DateTime = luxon.DateTime;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    bsCustomFileInput.init()

    const step = 5
    const meeting = $("#meeting-id").val();
    const next = $(".btn-next").data('id')

    let forward = false;

    $.ajax({
      type: "get",
      url: "/student/step",
      data: {id: meeting},
      dataType: "json",
      success: function (response) {
        console.log(response);
        var data = response.data;
        var last = data.last_step;
        if (last >= step) {
          alertNext();
        } else {
          Swal.fire(
              "Instruksi!",
              "Seluruh siswa dan kelompoknya diharapkan membagikan hasil temuan yang didiskusikan kedalam ruang tugas kemudian mengakses soal Latihan untuk dikerjakan secara mandiri dan diupload kembali keruang tugas",
              "info"
          );
        }
      },
      error: function (jqxhr, textStatus, errorThrown) {
        console.log(jqxhr)
      }
    });

    function alertNext(){
      Swal.fire({
        title: 'Bagus!',
        text: 'Kamu sudah menyelesaikan topik ini.',
        imageUrl: '/img/applause.gif',
        imageWidth: 380,
        confirmButtonText: 'Selesai'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "/student/topic/"+next+"/pembuka";
        }
      })
    }

    function ajaxStore() {
      $.ajax({
        type: "post",
        url: "/student/step",
        data: {id: meeting, last_step: step},
        dataType: "json",
        success: function (response) {
          if (response.meta.status == "success") {
            alertNext()
            forward = true
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR)
        }
      });
    }

    $(".btn-next").click(function (e) {
      e.preventDefault();
      if (forward) {
        window.location = "/student/topic/"+next+"/pembuka";
      } else (
        ajaxStore()
      )
    });


    $(".btn-outline-success").click(function (e) {
        e.preventDefault();
        $("#modalTugas").modal('show')
    });

    $('.btn-assignment').click(function (e) {
        e.preventDefault();
        $('input.meeting-id').val($(this).data('meeting'));
        $('#modalAssignment').modal('show');
    });

    $('#form-assignment').submit(function (e) {
        e.preventDefault();

        var formData = new FormData($("#form-assignment")[0]);

        $.ajax({
            url: "/student/answer/group",
            type: "POST",
            data : formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function(response){
                $.LoadingOverlay('hide')
                if (response.meta.status === 'success') {
                    $("#modalAssignment").modal('hide');

                    var date = DateTime.fromISO(response.data.created_at).toFormat('dd-MM-yyyy HH:mm:ss')
                    var content = `<a href="/storage/answers/${response.data.file}" target="_blank" rel="noopener noreferrer">Hasil Tugas</a> - <small>${date}</small> `
                    $(content).appendTo('#assignment-answer');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $.LoadingOverlay('hide')
                Swal.fire('Error!', 'Terjadi Kesalahan Server.', 'error');
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    $('.btn-task').click(function (e) {
        e.preventDefault();
        $('input.meeting-id').val($(this).data('meeting'));
        $('#modalTask').modal('show');
    });

    $('#form-task').submit(function (e) {
        e.preventDefault();

        var formData = new FormData($("#form-task")[0]);

        $.ajax({
            url: "/student/answer/individual",
            type: "POST",
            data : formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $.LoadingOverlay('show')
            },
            success: function(response){
                $.LoadingOverlay('hide')
                if (response.meta.status === 'success') {
                    $("#modalTask").modal('hide');

                    var date = DateTime.fromISO(response.data.created_at).toFormat('dd-MM-yyyy HH:mm:ss')
                    var content = `<a href="/storage/answers/${response.data.file}" target="_blank" rel="noopener noreferrer">Hasil Tugas</a> - <small>${date}</small> `
                    $(content).appendTo('#task-answer');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $.LoadingOverlay('hide')
                Swal.fire('Error!', 'Terjadi Kesalahan Server.', 'error');
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
});
