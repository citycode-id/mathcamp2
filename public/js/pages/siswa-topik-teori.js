$(function () {

  if (parseInt(localStorage.getItem("checkpoint")) >= 2) {
    Swal.fire(
      "Bagus!",
      "Kamu sudah menyelesaikan tahapan ini, silahkan lanjut ke tahap berikutnya.",
      "success"
    );
  } else {
    Swal.fire(
      "Instruksi!",
      "Tujuan pembelajaran kita pada materi bangun ruang sisi datar menggunakan web based instruction adalah mengenali permasalahan pada poin-poin materi sebagai berikut.",
      "info"
    );
  }

  $(".btn-next").click(function (e) {
    e.preventDefault();
    check($(this).data('id'));
  });

  function check(id) {
    if (parseInt(localStorage.getItem("checkpoint")) >= 2) {
      window.location = "/student/topic/"+id+"/video";
    } else {
      localStorage.setItem("checkpoint", 2);
      window.location = "/student/topic/"+id+"/video";
    }
  }
});
