$(function () {

    if (parseInt(localStorage.getItem("checkpoint")) >= 3) {
        Swal.fire(
        "Bagus!",
        "Kamu sudah menyelesaikan tahapan ini, silahkan lanjut ke tahap berikutnya.",
        "success"
        );
    } else {
        Swal.fire(
        "Instruksi!",
        "Kegiatan selanjutnya adalah kalian dapat menonton video pembelajaran di bawah ini sesuai dengan pertemuan yang kita laksanakan. Kalian juga dapat membaca materi yang telah disediakan kemudian kalian juga bisa mengklik tautan sebagai sumber belajar untuk membantu menambah informasi dan pengetahuan.",
        "info"
        );
    }

    $(".btn-next").click(function (e) {
        e.preventDefault();
        check($(this).data('id'));
    });

    function check(id) {
        localStorage.setItem("checkpoint", 3);
        window.location = "/student/topic/"+id+"/diskusi";
    }


    $(".btn-video").on("click", function(e) {
        e.preventDefault(); // Button that triggered the modal

        let url = $(this).data("video");      // Extract url from data-video attribute
        $("#modalVideo").find("iframe").attr({
            src : url,
            allow : "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
        });

        $('#modalVideo').modal('show');
    });

    // Remove iframe attributes when the modal has finished being hidden from the user
    $("#modalVideo").on("hidden.bs.modal", function() {
        $("#modalVideo iframe").removeAttr("src allow");
    });
});
