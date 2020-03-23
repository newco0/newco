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

  let clonelistmessage = $(".listmessage").clone();
  let sendmessagemobile = $(".sendmessagemobile").clone();
  let prevlistmessage = $('.prevlistmessage')
     

  if ($(window).width() < 576) {
    $(".conversationuser").click(function() {
      $(".content-mobile").html(clonelistmessage);
      $("body").scrollTop($("body").height());
      console.log($("body").scrollTop())
      $(".footmobile").removeClass("h-25");
      $(".widthscreen").removeClass("h-100");
      sendmessagemobile.removeClass("h-25");
      sendmessagemobile.removeClass("border");
      prevlistmessage.removeClass("d-none");
      prevlistmessage.addClass("d-block");
      $(".footmobile").html(sendmessagemobile);
      $('.textmessage').removeClass("w-50");
      $('.textmessage').addClass("w-75");
    });
  }

  prevlistmessage.click(function(){
    location.reload('listmessage.php');
  })

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

  $(".listmessage").scrollTop($(".listmessage").height());

  $(".block-menu").click(function() {
    $(".menu").toggle(3000, "slow");
  });
});
