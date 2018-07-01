$(document).ready(() => {

    let $backTop = $("#back-top");
    let $menu = $("#menu");
    let $body = $("body");

    // $("body").niceScroll({
    //     cursorcolor: "#0799b4",
    //     cursorwidth: "15px",
    //     cursorborder: "2px solid #252b2e",
    //     zindex: "5000"
    // });

    $(".footer-slider").slick({
        autoplay: true,
        autoplaySpeed: 1000,
        arrows: false,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 1
    })

    // Main event scroll page
    $(window).scroll((e) => {
        let windowHe = $(this).height();
        let headerHe = $("#cabecalho").children(".content").innerHeight();
        let bodyHe = $("body").height();
        let menuHe = $menu.height();
        let scrollTop = $(this).scrollTop();

        // Back to top show/hidden
        (scrollTop > (bodyHe - windowHe) * 0.5) ? $backTop.fadeIn(): $backTop.fadeOut();

        // Menu fixed/block
        (scrollTop > menuHe) ? $menu.addClass("fixed") /*+ $body.css("padding-top", menuHe)*/ : $menu.removeClass("fixed") /*+ $body.css("padding-top", "0px")*/;
    });


    $.get("content-gallery.html", (data) => {
        $(".gallery-content").html(data);
    });

    // Menu click control
    $menu.find(".menu-control").click((e) => {
        $menu.find(".content > ul").slideToggle();
    });

    // Menu hover com animação smooth
    $("#menu ul li").each((i, el) => {
        $(el).hover(() => {
            $(el).find("ul").show().removeClass("zoomOut").addClass("zoomIn");
        }, () => {
            $(el).find("ul").removeClass("zoomIn").addClass("zoomOut").hide();
        });
    });

    // offset link shift animation
    var $doc = $("html, body");
    $(".scroll").click(function(e) {
        $doc.animate({
            scrollTop: $($.attr(this, "href")).offset().top - $menu.height()
        }, 700);
        // e.preventDefault() // Just prevent the default action if you want to hide the anchor URL
    });

    $("#contato form input, #contato form textarea").each((i, el) => {
        $(el).on("keyup", () => {
            let keyL = $(el).val().length;
            if (keyL > 0) {
                $(el).addClass("active");
                $(el).prev("p.info-input").addClass("active");
            } else {
                $(el).removeClass("active");
                $(el).prev("p.info-input").removeClass("active");
            }
        });
    });

    // Script para ocultar marca d'agua 000webhost
    $("div[style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;']").css("display", "none");
});
