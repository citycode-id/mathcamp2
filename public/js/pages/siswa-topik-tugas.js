$(function () {
  bsCustomFileInput.init()
  
  Swal.fire(
    "Instruksi!",
    "Seluruh siswa dan kelompoknya diharapkan membagikan hasil temuan yang didiskusikan kedalam ruang tugas kemudian mengakses soal Latihan untuk dikerjakan secara mandiri dan diupload kembali keruang tugas",
    "info"
  );

  $(".btn-outline-success").click(function (e) { 
    e.preventDefault();
    $("#modalTugas").modal('show')
  });

  $(".btn-next").click(function (e) {
    e.preventDefault();
    check();
  });

  function check() {
    localStorage.setItem("checkpoint", 5);
    // window.location = "/siswa-topik-tugas.html";
  }
});
