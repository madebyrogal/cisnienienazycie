$(document).ready(function(){
    $(window).scroll(function () {
        var e = $(".m-teasers-container").offset().top,
            t = $(document).scrollTop(),
            a = $(".m-aside").offset().top,
            o = $(".page-content-article").height() - $(".m-aside-inside").height() + 12;
        t >= a && $(".m-aside .m-aside-inside").css({
            position: "fixed",
            width: "300px",
            top: "10px"
        }), a >= t && $(".m-aside .m-aside-inside").removeAttr("style"), e - t <= $(".m-aside-inside").height() && $(".m-aside .m-aside-inside").removeAttr("style").css({
            position: "absolute",
            top: o
        })
    });
});