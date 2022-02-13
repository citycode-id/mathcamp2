$(function () {
  var remaining = 16;
  var bd = 0;
  var brsd = 0;

  if (parseInt(localStorage.getItem("checkpoint")) >= 1) {
    Swal.fire(
      "Bagus!",
      "Kamu sudah menyelesaikan tahapan ini, silahkan lanjut ke tahap berikutnya.",
      "success"
    );
  } else {
    Swal.fire(
      'Selamat Datang',
      'Selamat datang dikelas matematika pada hari ini dengan materi bangun ruang sisi datar, sebelum kita memulai pembelajaran ada baiknya kalian memahami Kembali materi mengenai bangun datar dan bangun ruang sisi datar.',
      'info'
    )
  }

  $(".btn-next").click(function (e) {
    e.preventDefault();
    check($(this).data('id'));
  });

  function check(id) {
    if (parseInt(localStorage.getItem("checkpoint")) >= 1) {
      window.location = "/student/topic/"+id+"/teori";
    } else {
      if (remaining > 0) {
        Swal.fire(
          "Oops!",
          "Kamu harus menyelesaikan tugas ini sebelum melanjutkan ke tahap berikutnya.",
          "warning"
        );
      } else if (remaining == 0 && bd + brsd < 16) {
        Swal.fire(
          "Oops!",
          "Ada jawaban yang masih salah, pastikan kembali jawaban kamu sudah benar.",
          "warning"
        );
      } else if (remaining == 0 && bd + brsd == 16) {
        localStorage.setItem("checkpoint", 1);
        window.location = "/student/topic/"+id+"/teori";
      }
    }
  }

  function countRemaining() {
    remaining = document.getElementById("start").childElementCount;
  }

  function correct() {
    bd = $("#dropBD button.1").length;
    brsd = $("#dropBRSD button.2").length;
  }


  var drake = dragula(
    [
      document.querySelector("#start"),
      document.querySelector("#dropBD"),
      document.querySelector("#dropBRSD"),
    ],
    {
      removeOnSpill: false,
    }
  );
  drake.on("drag", function (el) {
    // console.log('drag')
    // el.className.replace("ex-moved", "");
  });
  drake.on("drop", function (el, container) {
    if (container.id == "start") {
      el.classList.remove("btn-success", "btn-danger");
      el.classList.add("btn-light");
      countRemaining();
      correct();
    } else if (
      (container.id == "dropBD" && el.classList.contains("1")) ||
      (container.id == "dropBRSD" && el.classList.contains("2"))
    ) {
      el.classList.remove("btn-light", "btn-danger");
      el.classList.add("btn-success");
      countRemaining();
      correct();
    } else {
      el.classList.remove("btn-light", "btn-success");
      el.classList.add("btn-danger");
      countRemaining();
      correct();
    }
  });
});
