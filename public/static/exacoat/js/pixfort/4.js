"use strict";
(self.webpackChunkpixfort_core = self.webpackChunkpixfort_core || []).push([[131], {
    573: (s, e, t) => {
        function l() {
            $("body").on("click", '[data-toggle="collapse"]', (function(s) {
                s.preventDefault();
                let e = $(this).attr("data-target");
                !function(s, e) {
                    let t = $(e);
                    if (t.hasClass("show"))
                        t.css("height", t[0].scrollHeight + "px"),
                        t[0].offsetHeight,
                        t.css("height", "0"),
                        t.addClass("collapsing"),
                        t.one("transitionend", (function() {
                            t.removeClass("collapsing").addClass("collapse"),
                            t.removeClass("show")
                        }
                        )),
                        s.attr("aria-expanded", !1);
                    else {
                        let e = s.closest(".accordion");
                        setTimeout((function() {
                            e.find(".collapse.show").each((function() {
                                let s = $(this);
                                s.css("height", s[0].scrollHeight + "px"),
                                s[0].offsetHeight,
                                s.css("height", "0"),
                                s.addClass("collapsing"),
                                s.one("transitionend", (function() {
                                    s.removeClass("collapsing").addClass("collapse"),
                                    s.css("height", ""),
                                    s.removeClass("show")
                                }
                                ))
                            }
                            ))
                        }
                        ), 10),
                        t.removeClass("collapse").addClass("collapsing"),
                        t.css("height", "0"),
                        setTimeout((function() {
                            t.css("height", t[0].scrollHeight + "px")
                        }
                        ), 10),
                        t.one("transitionend", (function() {
                            t.css("height", ""),
                            t.removeClass("collapsing").addClass("collapse show")
                        }
                        )),
                        s.attr("aria-expanded", !0)
                    }
                }($(this), e)
            }
            )),
            $(".collapse.show").each((function() {
                let s = $(this);
                s.css("height", s[0].scrollHeight + "px")
            }
            ))
        }
        t.r(e),
        t.d(e, {
            default: () => l
        })
    }
}]);
