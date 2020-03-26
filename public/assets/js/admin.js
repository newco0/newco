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
    console.log("coucou");
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
    console.log($(".responsemessage").val())
    if ($(".responsemessage").val().length > 0) {
      $(".messageshow").append(
        `<p class="bgcolor68c2e8 rounded text-white p-2 w-75 mx-auto messageclient">${$(
          ".responsemessage"
        ).val()}</p>`
      );
    }
    $(".responsemessage").val("");
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
});
