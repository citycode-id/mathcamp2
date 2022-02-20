$(function () {

  const step = 1

  function check() {
    var start = document.getElementById("start").childElementCount
    var wrong = $( ".btn-danger" ).length

    if (start > 0 ) {
      Swal.fire(
        "Oops!",
        "Kamu harus menyelesaikan tugas ini sebelum melanjutkan ke tahap berikutnya.",
        "warning"
      );
    } else if (start < 1 && wrong > 1) {
      Swal.fire(
        "Oops!",
        "Ada jawaban yang masih salah, pastikan kembali jawaban kamu sudah benar.",
        "warning"
      );
    } else if (start < 1 && wrong < 1) {
      Swal.fire(
        "Bagus!",
        "Kamu sudah menyelesaikan tahapan ini, silahkan lanjut ke tahap berikutnya.",
        "success"
      );
    }
  }

  function move () {
    $("#start>.1").appendTo('#dropBD');
    $("#start>.2").appendTo('#dropBRSD');
  };

  $(".btn-next").click(function (e) {
    e.preventDefault();
    check()
  });

  // Swal.fire(
  //   'Selamat Datang',
  //   'Selamat datang dikelas matematika pada hari ini dengan materi bangun ruang sisi datar, sebelum kita memulai pembelajaran ada baiknya kalian memahami Kembali materi mengenai bangun datar dan bangun ruang sisi datar Sebutkan bangun datar  dan bangun ruang sisi datar yang kalian ketahui dan tuliskan pada kolom dibawah ini.',
  //   'info'
  // )

});
