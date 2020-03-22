$(document).ready(function() {
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

  let formconnect = $(".formconnect").clone();
  let formsubscribe = $(".formsubscribe").clone();

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
});
