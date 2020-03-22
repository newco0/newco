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
  });

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
  $('.link-com').on('click', function(){
    $('.div-com').addClass('d-block');
  });
});
