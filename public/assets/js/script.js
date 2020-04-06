if (window.location.pathname.match(/^\/message\/([\d]*)$/)) {
  let idcontact = window.location.pathname.split("/")[
    window.location.pathname.split("/").length - 1
  ];
  // charge before the page to ensure the execution if the user exit from the page before his load
  const idtodelete = $(`.renderdiscussion[iddest=${idcontact}]`).attr("iddisc");

  window.onbeforeunload = function () {
    $.ajax({
      type: "POST",
      url: `/deletedisc/${idtodelete}`,
    });

    return "Deleted";
  };
}

$(document).ready(function () {
  $(".currentpagetitle").html(`<h1>${$(".titlepage").text()}</h1>`);
  let formconnect = $(".formconnect").clone();
  let formsubscribe = $(".formsubscribe").clone();
  $(window).resize(function () {
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

  $(".showmore").on("click", function () {
    if ($(this).html() == "Voir plus") {
      $(this).text("Voir moins");
    } else {
      $(this).text("Voir plus");
    }
    $(this).prev().children().last().toggleClass("d-none");
  });

  $(".imgprofil").mouseenter(function () {
    $(".editimgprofil").css("opacity", 1);
  });

  $(".editimgprofil").mouseenter(function () {
    $(".editimgprofil").css("opacity", 1);
    console.log("coucou");
  });

  $(".fileprofil").mouseenter(function () {
    $(".editimgprofil").css("opacity", 1);
  });

  $(".fileprofil").mouseleave(function () {
    $(".editimgprofil").css("opacity", 0);
  });
  $(".imgprofil").mouseleave(function () {
    $(".editimgprofil").css("opacity", 0);
  });

  $(".btnconnexion").click(function () {
    $(".formmobileconnect").append(formconnect);
    $(".formmobilesubscribe").html("");
    $(".closesubscribe").css("opacity", 0);
    $(".closeconnect").css("opacity", 1);
  });

  $(".closeconnect").click(function () {
    $(".closeconnect").css("opacity", 0);
    $(".formmobileconnect").html("");
  });

  $(".btnsubscribe").click(function () {
    $(".formmobilesubscribe").append(formsubscribe);
    $(".formmobileconnect").html("");
    $(".closeconnect").css("opacity", 0);
    $(".closesubscribe").css("opacity", 1);
  });

  $(".closesubscribe").click(function () {
    $(".closesubscribe").css("opacity", 0);
    $(".formmobilesubscribe").html("");
  });

  $(".link-com").on("click", function () {
    $(".div-com").toggle(500);
  });

  $(".block-menu").click(function () {
    $(".menu").toggle(3000, "slow");
  });

  $(".clearcomment").click(function () {
    $(this).parent().remove();
  });

  $(".zoom").click(function (e) {
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
    $(document).click(function (e) {
      if (!$(e.target).hasClass("imgen")) {
        $(".zoomer").html("");
        $(".zoomer").css("display", "none");
      }
    });
  }

  $(".comment").click(function () {
    if ($(".addcomment").hasClass("d-none")) {
      $(".addcomment").fadeIn("slow");
      $(".addcomment").addClass("d-flex");
      $(".addcomment").removeClass("d-none");
    } else {
      $(".addcomment").fadeOut("slow", function () {
        $(this).addClass("d-none");
        $(this).removeClass("d-flex");
      });
    }
  });

  $(".formcontact").submit(function (e) {
    e.preventDefault();
    let data = {};
    $(this)
      .serializeArray()
      .forEach((object) => {
        data[object.name] = object.value;
      });
    $.ajax({
      type: "POST",
      url: `/contact`,
      data: data,
    }).done(function (resp) {
      if (!resp.error) {
        // strict equal to true because the controller have to return true and a string is also true.
        $(".successsend").removeClass("d-none");
        setTimeout(function () {
          $(".formcontact")[0].reset();
          $(".successsend").addClass("d-none");
        }, 1500);
      } else {
        $("body").html(resp);
      }
    });
  });

  if ($(".containform").children(".alert-success").length == 1) {
    setTimeout(function () {
      $(".alert-success").remove();
    }, 2000);
  }

  $(".renderdiscussion").click(function (e) {
    $(".renderdiscussion").each(function (elt) {
      $(".renderdiscussion").removeClass("backgray");
    });
    $(this).addClass("backgray");
    ajaxConversation($(this).attr("iddisc"), $(this).attr("idowner"));
  });

  if ($(window).width() > 576) {
    if (window.location.pathname.match(/^\/message$/)) {
      $(".renderdiscussion").first().addClass("backgray");
      if ($(".renderdiscussion").length > 0) {
        ajaxConversation(
          $(".renderdiscussion").first().attr("iddisc"),
          $(".renderdiscussion").first().attr("idowner"),
          $(".renderdiscussion").first().attr("idexp")
        );
      }
    } else if (window.location.pathname.match(/^\/message\/([\d]*)$/)) {
      let idtocontact;
      let idcontact = window.location.pathname.split("/")[
        window.location.pathname.split("/").length - 1
      ];
      if ($(`.renderdiscussion[iddest=${idcontact}]`).length > 0) {
        idtocontact = $(`.renderdiscussion[iddest=${idcontact}]`);
      } else if ($(`.renderdiscussion[idexp=${idcontact}]`).length > 0) {
        idtocontact = $(`.renderdiscussion[idexp=${idcontact}]`);
      }
      ajaxConversation(idtocontact.attr("iddisc"), idtocontact.attr("idowner"), idtocontact.attr("idexp"));
      idtocontact.addClass("backgray");
    }
  }

  let prevlistmessage = $(".prevlistmessage");

  prevlistmessage.click(function () {
    location.reload("message");
  });

  function ajaxConversation(arg1, arg2,arg3) {
    const iddisc = arg1;
    const idowner = arg2;
    const idexp = arg3;
    $.ajax({
      type: "POST",
      url: `/messagedisc/${idowner}/${iddisc}`,
    }).done(function (resp) {
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
      setTimeout(function () {
        updateisSeenMessage(idowner, iddisc, idexp, $(".backgray"));
      }, 2000);
      sendmessage(arg1, arg2, arg3);
      $(".listmessage").scrollTop($(".listmessage")[0].scrollHeight);
    });
  }

  function sendmessage(iddisc, idowner, idexp) {
    $(".sendmessagemobile").submit(function (e) {
      e.preventDefault();
      if ($(".textmessage").val().length > 0) {
        let data = {};
        $(this)
          .serializeArray()
          .forEach((object) => {
            data[object.name] = object.value;
          });
        $.ajax({
          type: "POST",
          url: `/messagedisc/${idowner}/${iddisc}`,
          data: data,
        }).done(function () {
          if ($(window).width() < 576) {
            $(".listconversation").addClass("d-none");
            $(".conversation").removeClass("d-none");
            ajaxConversation(iddisc, idowner, idexp);
          } else {
            ajaxConversation(iddisc, idowner, idexp);
          }
        });
        $(".renderdiscussion").each(function () {
          if ($(this).hasClass("backgray")) {
            $(this)
              .children()
              .last()
              .replaceWith(
                "<p>" + $(".textmessage").val().slice(0, 20) + "...</p>"
              );
          }
        });
        $(".textmessage").val("");
        setTimeout(function () {
          if ($(window).width() < 576) {
            $(window).scrollTop($(document).height());
          } else {
            $(".listmessage").scrollTop($(".listmessage")[0].scrollHeight);
          }
        }, 200);
      }
    });
  }

  function updateisSeenMessage(userId, id, idexp, arg3) {
    arg3.children().last().removeClass("font-weight-bold");
    console.log(`/updateseen/${userId}/${id}/${idexp}`);
    $.ajax({
      type: "POST",
      url: `/updateseen/${userId}/${id}/${idexp}`,
    }).done(function (res) {});
  }

  $(".formupdate").submit(function (e) {
    e.preventDefault();
    let data = {};
    $(this)
      .serializeArray()
      .forEach((object) => {
        data[object.name] = object.value;
      });
    $.ajax({
      type: "POST",
      url: `/admin/edituser`,
      data: data,
    }).done(function (resp) {
      if (resp === true) {
        $(".mdp").val("");
        $(".mdp1").val("");
        $(".successsend").removeClass("d-none");
        setTimeout(function () {
          $(".successsend").addClass("d-none");
        }, 1500);
      }
    });
  });

  function addFriendEvent() {
    return {
      addfriend: function () {
        return $(".addfriend").click(function () {
          console.log("coucou");
          const id = $(this).attr("idadded");
          const parent = $(this).parent();
          $.ajax({
            type: "POST",
            url: `/addfriends/${id}`,
          }).done(function (resp) {
            if (!resp.error) {
              parent.html("<p>Envoyée</p>");
            }
          });
        });
      },

      accept: function () {
        return $(".accepted").click(function () {
          const id = $(this).attr("idaccept");
          const parent = $(this).parent();
          $.ajax({
            type: "POST",
            url: `/accept/${id}`,
          }).done(function (resp) {
            if (!resp.error) {
              parent.html("<p>Accepté</p>");
            }
          });
        });
      },

      reject: function () {
        return $(".rejected").click(function () {
          const id = $(this).attr("idreject");
          const parent = $(this).parent();
          $.ajax({
            type: "POST",
            url: `/reject/${id}`,
          }).done(function (resp) {
            if (!resp.error) {
              parent.html("<p class='text-danger'>Refusé</p>");
            }
          });
        });
      },

      delete: function () {
        return $(".deleted").click(function () {
          const id = $(this).attr("iddelete");
          const parent = $(this).parent();
          $.ajax({
            type: "POST",
            url: `/delete/${id}`,
          }).done(function (resp) {
            if (!resp.error) {
              if ($(".cancel").length > 0) {
                parent.html("<p class='text-danger'>Demande annulé</p>");
              } else if ($(".unfollow").length > 0) {
                parent.html("<p class='text-danger'>Supprimé</p>");
              }
            }
          });
        });
      },
    };
  }

  const friendEvent = addFriendEvent();

  if (window.location.pathname == "/friendaction") {
    $.ajax({
      url: `/listfriends`,
    }).done(function (resp) {
      $(".contentfriend").html(resp);
      friendEvent.delete();
    });
  }

  $(".selectlistfriendaction").change(function () {
    if ($(this).val() == 1) {
      $.ajax({
        url: `/listfriends`,
      }).done(function (resp) {
        $(".contentfriend").html(resp);
        friendEvent.delete();
      });
    } else if ($(this).val() == 2) {
      $.ajax({
        url: `/searchfriends`,
      }).done(function (resp) {
        $(".contentfriend").html(resp);
        friendEvent.addfriend();
      });
    } else if ($(this).val() == 3) {
      $.ajax({
        url: `/friendrequest`,
      }).done(function (resp) {
        $(".contentfriend").html(resp);
        friendEvent.delete();
      });
    } else if ($(this).val() == 4) {
      $.ajax({
        url: `/friendreceive`,
      }).done(function (resp) {
        $(".contentfriend").html(resp);
        friendEvent.accept();
        friendEvent.reject();
      });
    }
  });
});
