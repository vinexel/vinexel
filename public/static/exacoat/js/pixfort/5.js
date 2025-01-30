"use strict";
(self.webpackChunkpixfort_core = self.webpackChunkpixfort_core || []).push([[897], {
    709: (e, i, t) => {
        function a(e) {
            if (e || (e = $("body")),
            e.find(".pix-main-slider").length > 0)
                return e.find(".pix-main-slider").each((function(e, i) {
                    if ($(i).hasClass("pix-is-loaded"))
                        return !1;
                    $(i).addClass("pix-is-loaded"),
                    $(i).hasClass("flickity-enabled") && $(i).flickity("destroy");
                    let t = {};
                    if ($(i).attr("data-flickity") && (t = JSON.parse($(i).attr("data-flickity"))),
                    t.draggable = !0,
                    t.adaptiveHeight && (t.adaptiveHeight = !0),
                    t.resize = !0,
                    t.imagesLoaded = !0,
                    t.selectedAttraction = .19,
                    t.friction = .9,
                    t.arrowShape = "M83.7718595,45.4606514 L31.388145,45.4606514 L54.2737785,23.1973134 C56.1027533,21.4180712 56.1027533,18.4982892 54.2737785,16.719047 C52.4448037,14.9398048 49.4903059,14.9398048 47.6613311,16.719047 L16.7563465,46.7836776 C14.9273717,48.5629198 14.9273717,51.4370802 16.7563465,53.2163224 L47.6613311,83.280953 C49.4903059,85.0601952 52.4448037,85.0601952 54.2737785,83.280953 C56.1027533,81.5017108 56.1027533,78.6275504 54.2737785,76.8483082 L31.388145,54.5849702 L83.7718595,54.5849702 C86.3511829,54.5849702 88.4615385,52.5319985 88.4615385,50.0228108 C88.4615385,47.5136231 86.3511829,45.4606514 83.7718595,45.4606514 Z",
                    $(i).on("ready.flickity", (function() {
                        t.pix_id && $(t.pix_id).hasClass("flickity-enabled") && setTimeout((function() {
                            $(t.pix_id).flickity && $(t.pix_id).flickity("resize")
                        }
                        ), 500),
                        t.pix_id && $(t.pix_id).hasClass("flickity-enabled") && setTimeout((function() {
                            $(t.pix_id).flickity && $(t.pix_id).flickity("resize")
                        }
                        ), 1500),
                        setTimeout((function() {
                            $(i).addClass("pix-slider-loaded")
                        }
                        ), 100)
                    }
                    )),
                    $(i).flickity(t),
                    t.slider_effect) {
                        t.slider_style && t.slider_style,
                        /^((?!chrome|android).)*safari/i.test(navigator.userAgent) && $(i).closest(".vc_row:not(.overflow-visible)").removeClass("vc_row_visible").addClass("overflow-hidden").css({
                            overflow: "hidden !important"
                        });
                        var a = 4;
                        let e = 0;
                        switch ("pix-circular-slider" == t.slider_effect && (e = 1),
                        t.slider_effect) {
                        case "pix-circular-slider":
                            e = 2;
                            break;
                        case "pix-circular-left":
                            e = 3;
                            break;
                        case "pix-circular-right":
                            e = 4;
                            break;
                        case "pix-fade-out-effect":
                            e = 5
                        }
                        $(i).hasClass("pix-slider-loaded") || ($(i).addClass("pix-slider-loaded"),
                        $(window).width() > 600 && $(i).on("scroll.flickity", (function(t, s) {
                            if ($(window).width() < 600)
                                return !1;
                            if (!$(i).data("flickity") || !$(i).data("flickity").slides)
                                return !1;
                            let r = $(i).width()
                              , l = $(i).offset().left
                              , d = $(i).find(".carousel-cell").width();
                            if (--a < 0)
                                return !1;
                            a = 4,
                            $(i).data("flickity").slides.forEach((function(t, a) {
                                let s = $(i).find(".carousel-cell:nth-child(" + (a + 1) + ")")
                                  , n = $(t.cells[0].element).offset().left
                                  , c = 1
                                  , o = 0
                                  , f = 0
                                  , p = 0
                                  , u = 10
                                  , h = "auto"
                                  , y = n - l
                                  , x = 0
                                  , k = n - (l + r - d + 1);
                                y >= 0 && k <= 0 ? x = 1 : y <= -d ? (h = "none",
                                x = 0,
                                2 !== e && 3 !== e || (c = 0)) : k >= d ? (h = "none",
                                x = 0,
                                2 !== e && 4 !== e || (c = 0)) : y < 0 && y > -d ? (x = 1 - Math.abs(y) / d,
                                2 !== e && 3 !== e || (o = 20 * (1 - x),
                                f = 1.8 * (-1 * n + l),
                                p = (l - n) / d * -180,
                                c = x),
                                u = -1) : k > 0 && k < d && (x = 1 - k / d,
                                2 !== e && 4 !== e || (o = -1 * (1 - x) * 20,
                                f = -1 * (1 - x) * 2.2 * d * .82,
                                p = -1 * (1 - x) * d * .52,
                                c = x),
                                u = -1),
                                5 === e && (c = x),
                                e > 1 && e < 5 && s.find(".slide-inner").css({
                                    "will-change": "transform, opacity",
                                    transform: "perspective(" + d + "px) translateX(" + f + "px) rotateY(" + o + "deg) translateZ( " + p + "px)",
                                    "-webkit-transform": "perspective(" + d + "px) translateX(" + f + "px) rotateY(" + o + "deg) translateZ( " + p + "px)",
                                    "-moz-transform": "perspective(" + d + "px) translateX(" + f + "px) rotateY(" + o + "deg) translateZ( " + p + "px)"
                                }),
                                e > 1 && s.css({
                                    "will-change": "transform, opacity",
                                    transform: "transale3d(0,0,0)",
                                    opacity: c,
                                    "z-index": u
                                }),
                                s.css({
                                    "pointer-events": h
                                }),
                                s.parent().css({
                                    "pointer-events": h
                                })
                            }
                            ))
                        }
                        )))
                    }
                    ($(i).flickity("resize"),
                    window.addEventListener("resize", (function() {
                        $(i).hasClass("pix-slider-loaded") && $(window).width() <= 600 && $(i).find(".carousel-cell").css({
                            "pointer-events": "auto",
                            opacity: "1"
                        })
                    }
                    )),
                    t.hasOwnProperty("autoPlay") && t.autoPlay && $(i).hasClass("pix-slider-loaded")) && new IntersectionObserver((function(e, t) {
                        e.forEach((e => {
                            e.isIntersecting ? $(i).flickity && $(i).flickity("unpausePlayer") : $(i).flickity && $(i).flickity("pausePlayer")
                        }
                        ))
                    }
                    ),{
                        threshold: [0]
                    }).observe(i)
                }
                )),
                !0
        }
        t.r(i),
        t.d(i, {
            default: () => a
        })
    }
}]);
