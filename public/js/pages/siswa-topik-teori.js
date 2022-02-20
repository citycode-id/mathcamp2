$(function () {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  const step = 2
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
        window.location = "/student/topic/"+next+"/video";
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
      window.location = "/student/topic/"+next+"/video";
    } else (
      ajaxStore()
    )
  });

});
