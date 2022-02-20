$(function () {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  const step = 1
  const meeting = $("#meeting-id").val();
  const next = $(".btn-next").data('id')

  let forward = true;

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
        move();
        alertNext();
      }
    },
    error: function (jqxhr, textStatus, errorThrown) {
      if (jqxhr.status == 404) {
        Swal.fire(
          'Selamat Datang',
          'Selamat datang dikelas matematika pada hari ini dengan materi bangun ruang sisi datar, sebelum kita memulai pembelajaran ada baiknya kalian memahami Kembali materi mengenai bangun datar dan bangun ruang sisi datar Sebutkan bangun datar  dan bangun ruang sisi datar yang kalian ketahui dan tuliskan pada kolom dibawah ini.',
          'info'
        )
      }
    }
  });

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
      ajaxStore();
    }
  }

  function move () {
    $("#start>.1").appendTo('#dropBD');
    $("#start>.2").appendTo('#dropBRSD');
    $(".1").addClass("btn-success");
  };

  function alertNext(){
    Swal.fire(
      'Bagus!',
      'Kamu sudah menyelesaikan tahapan ini, silahkan lanjut ke tahap berikutnya.',
      'success'
    )

    forward = true;
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
      window.location = "/student/topic/"+next+"/teori";
    } else (
      check()
    )
  });
});
