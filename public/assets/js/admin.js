$(document).ready(function() {
  $(".hamb").click(function() {
    $(".menu").toggle("slow");
  });

  $(".imgprofil").mouseenter(function() {
    $(this)
      .next()
      .next()
      .css("opacity", 1);
  });

  $(".imgprofil").mouseleave(function() {
    $(this)
      .next()
      .next()
      .css("opacity", 0);
  });

  $(".imgcouv").mouseenter(function() {
    $(this)
      .next()
      .next()
      .css("opacity", 1);
  });

  $(".imgcouv").mouseleave(function() {
    $(this)
      .next()
      .next()
      .css("opacity", 0);
    $(this)
      .parent()
      .css("opacity", 1);
  });

  $(".editimgprofil").mouseenter(function() {
    $(this).css("opacity", 1);
  });

  $(".fileprofil").mouseenter(function() {
    $(this)
      .next()
      .css("opacity", 1);
    $(this)
      .prev()
      .css("opacity", 0.5);
  });

  $(".fileprofil").mouseleave(function() {
    $(this)
      .next()
      .css("opacity", 0);
    $(this)
      .prev()
      .css("opacity", 1);
  });

  $(".messagesendform").submit(function(e) {
    e.preventDefault();
    let data = {};
    $(this)
      .serializeArray()
      .forEach(object => {
        data[object.name] = object.value;
      });
    const location = window.location.pathname.split("/");
    const id = location[location.length - 1];
    $.ajax({
      type: "POST",
      url: `/admin/messageadmin/${id}`,
      data: data
    }).done(function(resp) {
      if (resp === true) {
        $(".messageshow").append(
          `<p class="bgcolor68c2e8 rounded text-white p-2 w-100 mx-auto messageclient">${$(
            ".responsemessage"
          ).val()}</p>`
        );
        $(".responsemessage").val("");
        $("main").addClass("position-relative");
        $(".containmessage").removeClass("d-none");
        setTimeout(function() {
          $("main").removeClass("position-relative");
          $(".containmessage").addClass("d-none");
        }, 1500);
      }else{
        $('body').html(resp);
      }
    });
  });


  $(".fileprofil").mouseleave(function() {
    $(this)
      .next()
      .css("opacity", 0);
    $(this)
      .prev()
      .css("opacity", 1);
  });

  $(".messagesendform").submit(function() {});

  $(".name").click(function() {
    $(".text").toggle("slow");
  });
  let imgtozoom;
  $(".zoom").click(function(e) {
    $(".zoomer").html("");
    imgtozoom = $(this).clone();
    imgtozoom.removeClass("col-3 col-lg-4 col-xl-3");
    imgtozoom.addClass("imgen");
    $(".zoomer").css("display", "block");
    $(".zoomer").append(imgtozoom);
    e.stopPropagation();
  });

  $(document).click(function(e) {
    if (!$(e.target).hasClass("imgen")) {
      $(".zoomer").html("");
      $(".zoomer").css("display", "none");
    }
  });

  $(".isreadmessage").on("change", function() {
    const id = $(this).attr("messageid");
    $.ajax({
      url: `/admin/listmessageadmin/updateisread/${id}`
    }).done(function(resp) {
      if (resp == 1) {
        $(".successupdate").removeClass("d-none");
        setTimeout(function() {
          $(".successupdate").addClass("d-none");
        }, 1500);
      }
    });
  });

  $(".isactivemessage").on("change", function() {
    const id = $(this).attr("messageid");
    $.ajax({
      url: `/admin/listmessageadmin/updateisactive/${id}`
    }).done(function(resp) {
      if (resp == 1) {
        $(".successupdate").removeClass("d-none");
        setTimeout(function() {
          $(".successupdate").addClass("d-none");
        }, 1500);
      }
    });
  });
});
