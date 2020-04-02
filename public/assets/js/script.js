$(document).ready(function() {
  $(".currentpagetitle").html(`<h1>${$(".titlepage").text()}</h1>`);
  let formconnect = $(".formconnect").clone();
  let formsubscribe = $(".formsubscribe").clone();
  $(window).resize(function() {
    if (
      window.location.pathname == "/newco/html/front/suggestionpage.php" ||
      window.location.pathname == "/newco/html/front/notificationpage.php" ||
      window.location.pathname == "/newco/html/front/suggestionpage" ||
      window.location.pathname == "/newco/html/front/notificationpage"
    ) {
      if ($(window).width() > 991) {
        document.location.href = "index.php";
      }
    }
    if ($(window).width() > 991) {
      $(".formmobileconnect").html("");
      $(".formmobilesubscribe").html("");
      $(".closeconnect").css("opacity", 0);
      $(".closesubscribe").css("opacity", 0);
      $(".btnconnection").addClass("bgcolor0d1d3d");
      $(".btninscription").addClass("bgcolor0d1d3d");
    } else {
      formconnect
        .children()
        .children()
        .last()
        .children()
        .removeClass("bgcolor0d1d3d");
      formsubscribe
        .children()
        .children()
        .last()
        .children()
        .removeClass("bgcolor0d1d3d");
    }
  });

  if ($(window).width() > 991) {
    $(".btnconnection").addClass("bgcolor0d1d3d");
    $(".btninscription").addClass("bgcolor0d1d3d");
  }

  $(".showmore").on("click", function() {
    if ($(this).html() == "Voir plus") {
      $(this).text("Voir moins");
    } else {
      $(this).text("Voir plus");
    }
    $(this)
      .prev()
      .children()
      .last()
      .toggleClass("d-none");
  });

  $(".imgprofil").mouseenter(function() {
    $(".editimgprofil").css("opacity", 1);
  });

  $(".editimgprofil").mouseenter(function() {
    $(".editimgprofil").css("opacity", 1);
    console.log("coucou");
  });

  $(".fileprofil").mouseenter(function() {
    $(".editimgprofil").css("opacity", 1);
  });

  $(".fileprofil").mouseleave(function() {
    $(".editimgprofil").css("opacity", 0);
  });
  $(".imgprofil").mouseleave(function() {
    $(".editimgprofil").css("opacity", 0);
  });

  $(".btnconnexion").click(function() {
    $(".formmobileconnect").append(formconnect);
    $(".formmobilesubscribe").html("");
    $(".closesubscribe").css("opacity", 0);
    $(".closeconnect").css("opacity", 1);
  });

  $(".closeconnect").click(function() {
    $(".closeconnect").css("opacity", 0);
    $(".formmobileconnect").html("");
  });

  $(".btnsubscribe").click(function() {
    $(".formmobilesubscribe").append(formsubscribe);
    $(".formmobileconnect").html("");
    $(".closeconnect").css("opacity", 0);
    $(".closesubscribe").css("opacity", 1);
  });

  $(".closesubscribe").click(function() {
    $(".closesubscribe").css("opacity", 0);
    $(".formmobilesubscribe").html("");
  });

  $(".link-com").on("click", function() {
    $(".div-com").toggle(500);
  });

  $(".block-menu").click(function() {
    $(".menu").toggle(3000, "slow");
  });

  $(".clearcomment").click(function() {
    $(this)
      .parent()
      .remove();
  });

  $(".zoom").click(function(e) {
    $(".zoomer").html("");
    let imgtozoom = $(this).clone();
    imgtozoom.removeClass("arround-newspaper rounded-circle mr-2");
    imgtozoom.addClass("w-100 imgen");
    $(".zoomer").css("display", "block");
    $(".zoomer").append(imgtozoom);
    e.stopPropagation();
  });

  if (
    window.location.pathname == "/newco/html/front/journal.php" ||
    window.location.pathname == "/newco/html/front/journal"
  ) {
    $(document).click(function(e) {
      if (!$(e.target).hasClass("imgen")) {
        $(".zoomer").html("");
        $(".zoomer").css("display", "none");
      }
    });
  }

  $(".comment").click(function() {
    if ($(".addcomment").hasClass("d-none")) {
      $(".addcomment").fadeIn("slow");
      $(".addcomment").addClass("d-flex");
      $(".addcomment").removeClass("d-none");
    } else {
      $(".addcomment").fadeOut("slow", function() {
        $(this).addClass("d-none");
        $(this).removeClass("d-flex");
      });
    }
  });

  $(".formcontact").submit(function(e) {
    e.preventDefault();
    let data = {};
    $(this)
      .serializeArray()
      .forEach(object => {
        data[object.name] = object.value;
      });
    $.ajax({
      type: "POST",
      url: `/contact`,
      data: data
    }).done(function(resp) {
      if (resp === true) {
        // strict equal to true because the controller have to return true and a string is also true.
        $(".successsend").removeClass("d-none");
        setTimeout(function() {
          $(".formcontact")[0].reset();
          $(".successsend").addClass("d-none");
        }, 1500);
      } else {
        $("body").html(resp);
      }
    });
  });

  if ($(".containform").children(".alert-success").length == 1) {
    setTimeout(function() {
      $(".alert-success").remove();
    }, 2000);
  }

  $(".renderdiscussion").click(function(e) {
    $(".renderdiscussion").each(function(elt) {
      $(".renderdiscussion").removeClass("backgray");
    });
    $(this).addClass("backgray");
    ajaxConversation($(this).attr("iddisc"), $(this).attr("idowner"));
  });

  if ($(window).width() > 576) {
    if (window.location.pathname == "/message") {
      $(".renderdiscussion")
        .first()
        .addClass("backgray");
      ajaxConversation(
        $(".renderdiscussion")
          .first()
          .attr("iddisc"),
        $(".renderdiscussion")
          .first()
          .attr("idowner")
      );
    }
  }

  let prevlistmessage = $(".prevlistmessage");

  prevlistmessage.click(function() {
    location.reload("message");
  });

  function ajaxConversation(arg1, arg2) {
    const iddisc = arg1;
    const idowner = arg2;
    $.ajax({
      type: "POST",
      url: `/messagedisc/${idowner}/${iddisc}`
    }).done(function(resp) {
      $(".conversation").html(resp);
      if ($(window).width() < 576) {
        $(".sendmessagemobile").removeClass("heightform");
        $(".listconversation").addClass("d-none");
        $(".footmobile").addClass("d-none");
        $(".footmobile").removeClass("d-flex");
        $(".conversation").removeClass("d-none");
        $(".listmessage").removeClass("border");
        $(".textmessage").css("height", "2.2rem");
        $(".sendmessagemobile").css("height", "4rem");
        $(window).scrollTop($(document).height());
        prevlistmessage.removeClass("d-none");
      }
      setTimeout(function() {
        updateisSeenMessage(idowner, iddisc, $(".backgray"));
      }, 2000);
      sendmessage(arg1, arg2);
      $(".listmessage").scrollTop($(".listmessage")[0].scrollHeight);
    });
  }

  function sendmessage(iddisc, idowner) {
    $(".sendmessagemobile").submit(function(e) {
      e.preventDefault();
      if ($(".textmessage").val().length > 0) {
        let data = {};
        $(this)
          .serializeArray()
          .forEach(object => {
            data[object.name] = object.value;
          });
        $.ajax({
          type: "POST",
          url: `/messagedisc/${idowner}/${iddisc}`,
          data: data
        }).done(function() {
          if ($(window).width() < 576) {
            $(".listconversation").addClass("d-none");
            $(".conversation").removeClass("d-none");
            ajaxConversation(iddisc, idowner);
          } else {
            ajaxConversation(iddisc, idowner);
          }
        });
        $(".renderdiscussion").each(function() {
          if ($(this).hasClass("backgray")) {
            $(this)
              .children()
              .last()
              .text($(".textmessage").val());
          }
        });
        $(".textmessage").val("");
        setTimeout(function() {
          if ($(window).width() < 576) {
            $(window).scrollTop($(document).height());
          } else {
            $(".listmessage").scrollTop($(".listmessage")[0].scrollHeight);
          }
        }, 200);
      }
    });
  }

  function updateisSeenMessage(userId, id, arg3) {
    arg3
      .children()
      .last()
      .removeClass("font-weight-bold");
    $.ajax({
      type: "POST",
      url: `/updateseen/${userId}/${id}`
    }).done(function(res) {});
  }
});
