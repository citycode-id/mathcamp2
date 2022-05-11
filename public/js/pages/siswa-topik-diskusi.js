$(function () {
    var DateTime = luxon.DateTime;

    $(".scrollable").animate({ scrollTop: $(document).height() }, 1000);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    bsCustomFileInput.init()

    const step = 4
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
          console.log(last);
          alertNext();
        } else {
          Swal.fire(
            "Instruksi!",
            "Setelah kalian menonton video pembelajaran dan membaca materi pembelajaran serta menemukan sumber belajar melalui tautan, berikutnya kalian akan dibagi kedalam kelompok kecil untuk berdiskusi mengenai permasalahan yang ditemukan.",
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
        text: 'Kamu sudah menyelesaikan tahapan ini.',
        icon: 'success',
        confirmButtonText: 'Lanjut'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "/student/topic/"+next+"/tugas";
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
        window.location = "/student/topic/"+next+"/tugas";
      } else (
        ajaxStore()
      )
    });

    $('.btn-reply').click(function (e) {
        e.preventDefault();
        $("#group_id").val($(this).data('group'));
        $("#modalReply").modal('show');
    });

    $("#form-reply").submit(function (e) {
        e.preventDefault();
        // console.log($(this).serialize());

        $.ajax({
            type: "post",
            url: "/student/discussion",
            data: $(this).serialize(),
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                $('#modalReply').modal('hide');
                $('textarea[name="message"]').val("");

                var data = response.data;
                var date = DateTime.fromISO(data.created_at).toFormat('dd-MM-yyyy HH:mm:ss')
                var element = `<div class="list-group-item"><div class="d-flex w-100 justify-content-between"><h5 class="text-primary">${data.user.name}</h5><small>${date}</small></div><p class="mb-0">${data.message}</p></div>`;
                // $(element).appendTo($("ul").find(`[data-group='${data._id}']`));
                $(`ul[data-group='${data.group_id}']`).append(element);
                $(".scrollable").animate({ scrollTop: $(document).height() }, 1000);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
                Swal.fire('Error!', 'Tidak dapat mengirim pesan', 'error')
            }
        });


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

                    var date = DateTime.fromISO(response.data.updated_at).toFormat('dd-MM-yyyy HH:mm:ss')
                    $("#assignment-answer").empty();
                    var content = `<a href="/storage/answers/${response.data.group}" target="_blank" rel="noopener noreferrer">Hasil Tugas</a> - <small> ${date}</small> `
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
});
