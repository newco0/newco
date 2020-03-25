$(document).ready(function() {
  let formconnect = $(".formconnect").clone();
  let formsubscribe = $(".formsubscribe").clone();
  $(window).resize(function() {
    if (
      window.location.pathname == "/newco/html/front/suggestionpage.php" ||
      window.location.pathname == "/newco/html/front/notificationpage.php"
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

  if (
    window.location.href ==
      "http://localhost/newco/html/front/listmessage.php" ||
    window.location.href == "http://localhost/newco/html/front/listmessage.php#"
  ) {
    $(".listmessage").scrollTop($(".listmessage")[0].scrollHeight);
  }

  let clonelistmessage = $(".listmessage").clone();
  let sendmessagemobile = $(".sendmessagemobile").clone();
  let prevlistmessage = $(".prevlistmessage");

  if ($(window).width() < 576) {
    $(".conversationuser").click(function() {
      $(".content-mobile").html(clonelistmessage);
      $(".footmobile").removeClass("h-25");
      $(".widthscreen").removeClass("h-100");
      sendmessagemobile.removeClass("h-25");
      sendmessagemobile.removeClass("border");
      prevlistmessage.removeClass("d-none");
      prevlistmessage.addClass("d-block");
      $(".footmobile").html(sendmessagemobile);
      $(".textmessage").removeClass("w-50");
      $(".textmessage").addClass("w-75");
      $(".titlemessage").text("Conversation");
      sendmessage(sendmessagemobile);
      setTimeout(function() {
        $(window).scrollTop($(document).height());
      }, 300);
    });
  } else {
    sendmessage($(".sendmessagemobile"));
  }

  function sendmessage(arg) {
    arg.submit(function(e) {
      e.preventDefault();
      if ($(".textmessage").val().length > 0) {
        $(".listmessage")
          .append(`<div class="d-flex justify-content-start w-100 p-3"><div class="w-75 d-flex"><img src="../img/profil.jpg" class="d-sm-none d-md-block imgconv d-sm rounded-circle"><p class="mx-2 p-2 rounded bgcolor68c2e8 text-white">${$(
          ".textmessage"
        ).val()} <span class="datemessage d-block text-right">Envoyé le ${new Date(
          Date.now()
        ).toLocaleString("en-GB")}</span>
                                </p>
                            </div>
                        </div>`);
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

  prevlistmessage.click(function() {
    location.reload("listmessage.php");
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
    $(".div-com").addClass("d-block");
  });

  $(".block-menu").click(function() {
    $(".menu").toggle(3000, "slow");
  });

  $(".icofont-close").click(function() {
    $(this)
      .parent()
      .remove();
  });

  $(".zoom").click(function(e) {
    $(".zoomer").html("");
    let imgtozoom = $(this).clone();
    imgtozoom.removeClass("arround-newspaper rounded-circle mr-2");
    imgtozoom.addClass("w-100");
    $(".zoomer").css("display", "block");
    $(".zoomer").append(imgtozoom);
    e.stopPropagation();
  }); 
  
  $(document).click(function() {
      $(".zoomer").html("");
      $(".zoomer").css("display", "none");
  });
});
