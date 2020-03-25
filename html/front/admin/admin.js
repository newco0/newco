$(document).ready(function () {
    $('.hamb').click(function () {
        console.log('coucou')
        $('.menu').toggle()
    })
});
$(document).ready(function () {
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
        console.log('coucou')
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
});
