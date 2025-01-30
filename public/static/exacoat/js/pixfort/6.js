"use strict";
(self.webpackChunkpixfort_core = self.webpackChunkpixfort_core || []).push([[76], {
    226: (e, t, s) => {
        function a() {
            $(document).on("click", ".alert .close", (function(e) {
                e.preventDefault(),
                $(this).closest(".alert").remove()
            }
            )),
            function() {
                let e = 0
                  , t = 0;
                $(".pix-post-area").length > 0 && (e = $("#pix-entry-content").offset().top,
                t = $("#pix-entry-content").height());
                ($(".back_to_top").length || $(".pix-post-area").length) && document.addEventListener("scroll", (s => {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20 ? $(".back_to_top").addClass("active") : $(".back_to_top").removeClass("active"),
                    $(".pix-post-area").length > 0)
                        if (document.documentElement.scrollTop > e) {
                            let s = 0;
                            document.documentElement.scrollTop > e + t ? (s = .999,
                            NProgress.set(s)) : (s = (document.documentElement.scrollTop - e) / t,
                            NProgress.set(s))
                        } else
                            NProgress.set(.001)
                }
                ), {
                    passive: !0
                });
                $(".back_to_top").on("click", (function(e) {
                    return e.preventDefault(),
                    $("body, html").animate({
                        scrollTop: 0
                    }, 700),
                    !1
                }
                ))
            }(),
            function() {
                let e = !1;
                e = JSON.parse(localStorage.getItem("menusstate")),
                e ? $.each(e, (function(t, s) {
                    let a = '.menu-hidden-state[data-target="#' + t + '"]'
                      , o = $(a);
                    $(a).length ? (o.addClass("is-active"),
                    o.attr("aria-expanded", !0),
                    o.closest(".navbar-nav").find("li").addClass("is-shown")) : delete e[t]
                }
                )) : e = {};
                $("body").on("click", ".hamburger.normal-menu-toggle", (function(t) {
                    t.preventDefault();
                    let s = $(this).attr("data-target").replace("#", "");
                    $(this).hasClass("is-active") ? ($(this).removeClass("is-active"),
                    $(this).attr("aria-expanded", !1),
                    $(this).closest(".navbar-nav").find("li").removeClass("is-shown"),
                    delete e[s]) : ($(this).addClass("is-active"),
                    $(this).attr("aria-expanded", !0),
                    $(this).closest(".navbar-nav").find("li").addClass("is-shown"),
                    e[s] = !0),
                    localStorage.setItem("menusstate", JSON.stringify(e))
                }
                ))
            }()
        }
        s.r(t),
        s.d(t, {
            default: () => a
        })
    }
}]);
