$(document).ready(function () {
    $(".hamb").click(function () {
        $(".menu").toggle("slow");
    });

    $(".imgprofil").mouseenter(function () {
        $(this)
            .next()
            .next()
            .css("opacity", 1);
    });

    $(".imgprofil").mouseleave(function () {
        $(this)
            .next()
            .next()
            .css("opacity", 0);
    });

    $(".imgcouv").mouseenter(function () {
        $(this)
            .next()
            .next()
            .css("opacity", 1);
    });

    $(".imgcouv").mouseleave(function () {
        $(this)
            .next()
            .next()
            .css("opacity", 0);
        $(this)
            .parent()
            .css("opacity", 1);
    });

    $(".editimgprofil").mouseenter(function () {
        console.log("coucou");
        $(this).css("opacity", 1);
    });

    $(".fileprofil").mouseenter(function () {
        $(this)
            .next()
            .css("opacity", 1);
        $(this)
            .prev()
            .css("opacity", 0.5);
    });

    $(".fileprofil").mouseleave(function () {
        $(this)
            .next()
            .css("opacity", 0);
        $(this)
            .prev()
            .css("opacity", 1);
    });

    $(".messagesendform").submit(function (e) {
        e.preventDefault();
        $(".messageshow").append(
            `<p class="bgcolor68c2e8 rounded text-white p-2 w-75 mx-auto">${$(
                ".responsemessage"
            ).val()}</p>`
        );
        $(".responsemessage").val("");
    });
    $(".fileprofil").mouseleave(function () {
        $(this)
            .next()
            .css("opacity", 0);
        $(this)
            .prev()
            .css("opacity", 1);
    });

    $('.messagesendform').submit(function () {

    })

    $('.name').click(function () {
        $('.text').toggle("slow");
    });

    $('.zoom').click(function () {
        $('.zoomer').removeClass('d-none');
        $('.zoom').removeClass('col-3', 'col-lg-4', 'col-xl-3')
        $('.zoomer').append($(this));
    })
});