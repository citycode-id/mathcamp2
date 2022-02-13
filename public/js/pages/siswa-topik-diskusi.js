$(function () {
    var DateTime = luxon.DateTime;

    $(".scrollable").animate({ scrollTop: $(document).height() }, 1000);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    Swal.fire(
        "Instruksi!",
        "Setelah kalian menonton video pembelajaran dan membaca materi pembelajaran serta menemukan sumberi belajar melalui tautan, berikutnya kalian akan dibagi kedalam kelompok kecil untuk berdiskusi mengenai permasalahan yang ditemukan.",
        "info"
    );

    $(".btn-next").click(function (e) {
        e.preventDefault();
        check($(this).data('id'));
    });

    function check(id) {
        localStorage.setItem("checkpoint", 4);
        window.location = "/student/topic/"+id+"/tugas";
    }

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
});
