"use strict";
(self.webpackChunkpixfort_core = self.webpackChunkpixfort_core || []).push([[608], {
    230: (o, n, s) => {
        function e() {
            $(document).ready((function() {
                function o(o) {
                    o.addClass("show"),
                    o.find(".dropdown-menu").addClass("show")
                }
                function n(o) {
                    o.removeClass("show"),
                    o.find(".dropdown-menu").removeClass("show")
                }
                $(document).on("click", '[data-toggle="dropdown"]', (function(s) {
                    s.preventDefault();
                    var e = $(this).closest(".dropdown");
                    e.hasClass("show") ? n(e) : ($(".dropdown.show").each((function() {
                        n($(this))
                    }
                    )),
                    o(e))
                }
                )),
                $(document).on("click", (function(o) {
                    $(o.target).closest(".dropdown").length || $(".dropdown.show").each((function() {
                        n($(this))
                    }
                    ))
                }
                ))
            }
            ))
        }
        s.r(n),
        s.d(n, {
            default: () => e
        })
    }
}]);
