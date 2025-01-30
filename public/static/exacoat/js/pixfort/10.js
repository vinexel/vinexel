"use strict";
(self.webpackChunkpixfort_core = self.webpackChunkpixfort_core || []).push([[59], {
    509: (s, e, t) => {
        function a(s) {
            setTimeout((function() {
                $("body").hasClass("vc_editor") || $(".pix-scale-in, .pix-scale-in-xs, .pix-scale-in-sm, .pix-scale-in-lg").each((function() {
                    let s = $(this);
                    if (s.hasClass("pix-loaded"))
                        return !1;
                    s.addClass("pix-loaded");
                    let e = s.outerHeight()
                      , t = 2
                      , a = 600
                      , l = e / 3;
                    s.hasClass("pix-scale-in-xs") && (t = 1.1,
                    l > 300 && (l = 300),
                    a = 200),
                    s.hasClass("pix-scale-in-sm") && (t = 1.2,
                    a = 200),
                    s.hasClass("pix-scale-in") && (t = 1.6,
                    a = 400),
                    s.css({
                        "z-index": "99999999",
                        "transform-style": "preserve-3d"
                    });
                    let n = 600;
                    let i = this.getBoundingClientRect()
                      , c = this
                      , o = $(window).height()
                      , r = $(window).height() / 2
                      , p = o - r;
                    if (i.top <= o && i.top >= r) {
                        let e = (i.top - r) / p
                          , a = (t - 1) * e;
                        a++;
                        let n = l * e;
                        s.css({
                            transform: "scale(" + a + ") translateY(" + n + "px)"
                        })
                    } else
                        i.top > o ? s.css({
                            transform: "scale(" + t + ") translateY(" + l + "px)"
                        }) : s.css({
                            transform: "scale(1) translateY(0px)"
                        });
                    document.addEventListener("scroll", window.handleScaleEvent = function(e) {
                        if (i = c.getBoundingClientRect(),
                        i.top <= o && i.top >= r) {
                            let e = (i.top - r) / p
                              , a = (t - 1) * e;
                            a++;
                            let n = l * e;
                            s.css({
                                transform: "scale(" + a + ") translateY(" + n + "px)"
                            })
                        } else
                            i.top > o ? s.css({
                                transform: "scale(" + t + ") translateY(" + l + "px)"
                            }) : s.css({
                                transform: "scale(1) translateY(0px)"
                            })
                    }
                    , {
                        passive: !0
                    })
                }
                ))
            }
            ), 500)
        }
        t.r(e),
        t.d(e, {
            default: () => a
        })
    }
}]);
