"use strict";
(self.webpackChunkpixfort_core = self.webpackChunkpixfort_core || []).push([[286], {
    286: (a, t, e) => {
        e.r(t),
        e.d(t, {
            default: () => d
        });
        var i = e(989);
        function d() {
            $("[data-jarallax-video], [data-video-src], .jarallax-video").length && ((0,
            i.nk)(),
            $("[data-jarallax-video], [data-video-src], .jarallax-video").each((function() {
                let a = !1;
                if ($(this).attr("data-pix-bg-video"))
                    a = $(this).attr("data-pix-bg-video");
                else {
                    if (!$(this).attr("data-video-src"))
                        return !1;
                    a = $(this).attr("data-video-src")
                }
                (0,
                i.c1)(this, {
                    speed: .2,
                    videoSrc: a
                })
            }
            ))),
            $(".jarallax").each((function() {
                let a = !1;
                if (!$(this).attr("data-speed"))
                    return !1;
                a = $(this).attr("data-speed"),
                $(this).find("img").addClass("parallax"),
                (0,
                i.c1)(this, {
                    speed: a
                })
            }
            )),
            (0,
            i.c1)(document.querySelectorAll(".intro-jarallax"), {
                speed: .4,
                imgSize: "object-fit",
                imgPosition: "object-position"
            })
        }
    }
}]);
