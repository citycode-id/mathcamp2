$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const step = 3
    const meeting = $("#meeting-id").val();
    const next = $(".btn-next").data('id')

    let forward = false;

    let alertVideo = 0
    let alertModul = 0

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
            "Kegiatan selanjutnya adalah kalian dapat menonton video pembelajaran di bawah ini sesuai dengan pertemuan yang kita laksanakan. Kalian juga dapat membaca materi yang telah disediakan kemudian kalian juga bisa mengklik tautan sebagai sumber belajar untuk membantu menambah informasi dan pengetahuan.",
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
        text: 'Kamu sudah menyelesaikan tahapan ini, silahkan lanjut ke tahap berikutnya.',
        icon: 'success',
        confirmButtonText: 'Lanjut'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "/student/topic/"+next+"/diskusi";
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
        window.location = "/student/topic/"+next+"/diskusi";
      } else (
        ajaxStore()
      )
    });

    $(".btn-video").on("click", function(e) {
        e.preventDefault(); // Button that triggered the modal
        if (alertVideo ==  1) {
          let url = $(this).data("video");      // Extract url from data-video attribute

          $("#modalVideo").find("iframe").attr({
              src : url,
              allow : "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
          });

          $('#modalVideo').modal('show');
        } else {
          Swal.fire({
            title: 'Video Pembelajaran',
            text: "Berikut ini adalah video tambahan sebagai pendukung materi tentang "+ $("span#name").html() +". Video akan dijalankan setelah klik tombol OK",
            icon: 'info',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.isConfirmed) {
              alertVideo = 1;

              let url = $(this).data("video");      // Extract url from data-video attribute

              $("#modalVideo").find("iframe").attr({
                  src : url,
                  allow : "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
              });

              $('#modalVideo').modal('show');
            }
          })
        }
    });

    // Remove iframe attributes when the modal has finished being hidden from the user
    $("#modalVideo").on("hidden.bs.modal", function() {
        $("#modalVideo iframe").removeAttr("src allow");
    });

    $(".btn-modul").on("click", function (e) {
      e.preventDefault();
      if (alertModul == 1) {
        let target = e.target
        let link = target.attributes.href.value
        window.open(link)
      } else {
        Swal.fire({
          title: 'Modul Pembelajaran',
          text: "Berikut ini adalah modul materi tentang "+ $("span#name").html() +". Silahkan pelajari terlebih dahulu modul ini untuk membantu pemahaman kalian agar bisa menjawab soal-soal berikutnya. Modul akan terbuka setelah klik OK",
          icon: 'info',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            alertModul = 1;

            let target = e.target
            let link = target.attributes.href.value
            window.open(link)
          }
        })
      }
    });
});
