"use strict";
(self.webpackChunkpixfort_core = self.webpackChunkpixfort_core || []).push([[907], {
    895: (e, i, t) => {
        t.r(i),
        t.d(i, {
            default: () => r,
            dialogLoader: () => g,
            loadPopupHelpers: () => h,
            loadPopupOptions: () => f,
            popupManager: () => d
        });
        let o = 1
          , n = 1e9
          , s = !1;
        t.e(492).then(t.bind(t, 492));
        let p = document.querySelector("body").classList.contains("elementor-editor-active") || document.querySelector("body").classList.contains("vc_editor");
        const a = {
            id: !1,
            $el: !1,
            dynamic: !1,
            popupClasses: "",
            showTimes: !1,
            contentSet: !1,
            cleanClose: !1,
            options: {},
            init(e) {
                $.extend(this, e)
            },
            appendContent(e) {
                this.$el.find(".pix-dialog-inner").append(e)
            },
            setContent(e) {
                this.contentSet = !0,
                this.$el.find(".pix-dialog-inner").html(e)
            },
            onOpen(e) {
                setTimeout(e, 0)
            },
            openPopup() {
                let e = this;
                if ($("dialog#pix_popup_" + this.id).length || $("body").append(this.$el),
                this.$el || (this.$el = $("dialog#pix_popup_" + this.id)),
                !this.dynamic && this.$el) {
                    if (!this.$el.open) {
                        this.$el.find(".animated, .animating, .pix-waiting").addClass("animate-in").removeClass("animated animating pix-waiting pix-animate animating-init"),
                        this.$el[0] && this.$el[0].show(),
                        "function" == typeof window.pixfort_init_popup_data && window.pixfort_init_popup_data(this.$el),
                        this.$el.attr("data-open-id", o++);
                        let i = $('.pix-popup-launcher[data-id="' + this.id + '"]');
                        this.$el.css({
                            "z-index": ++n
                        }),
                        i && (i.hasClass("launcher-in-front") || this.$el.hasClass("attach-popup-launcher")) && i.css({
                            "z-index": ++n
                        }),
                        setTimeout(( () => {
                            e.$el.addClass("transitioned displayed")
                        }
                        ), 1),
                        this.$el.find(".pix-dialog-inner").animate({
                            scrollTop: 0
                        }, 0),
                        this.$el.animate({
                            scrollTop: 0
                        }, 0),
                        this.$el.find("a").blur(),
                        window.pix_animation_display(this.$el),
                        window.dispatchEvent(new Event("resize")),
                        setTimeout(( () => {
                            window.dispatchEvent(new Event("resize"))
                        }
                        ), 300),
                        h(),
                        $('.pix-popup-launcher[data-id="' + this.id + '"]').addClass("opened"),
                        $(this.$el).find("video.pix-video-bg-element").each((function(e, i) {
                            i.paused && i.play()
                        }
                        )),
                        window.pixTooltips()
                    }
                } else
                    this.$el = $('<dialog id="pix_popup_' + this.id + '" class="pix-popup d-' + this.id + " " + this.popupClasses + '"><div class="pix-dialog-backdrop"></div><div class="pix-dialog-container"><div class="pix-dialog-inner bg-white"><div class="pix-popup-close"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path fill="currentcolor" fill-opacity=".25" d="M12,2 C6.4771525,2 2,6.4771525 2,12 C2,17.5228475 6.4771525,22 12,22 C17.5228475,22 22,17.5228475 22,12 C22,6.4771525 17.5228475,2 12,2 Z"/><path fill="currentcolor" d="M9.20710678,7.79289322 L12,10.585 L14.7928932,7.79289322 C15.1834175,7.40236893 15.8165825,7.40236893 16.2071068,7.79289322 C16.5976311,8.18341751 16.5976311,8.81658249 16.2071068,9.20710678 L13.415,12 L16.2071068,14.7928932 C16.5976311,15.1834175 16.5976311,15.8165825 16.2071068,16.2071068 C15.8165825,16.5976311 15.1834175,16.5976311 14.7928932,16.2071068 L12,13.415 L9.20710678,16.2071068 C8.81658249,16.5976311 8.18341751,16.5976311 7.79289322,16.2071068 C7.40236893,15.8165825 7.40236893,15.1834175 7.79289322,14.7928932 L10.585,12 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 Z"/></g></svg></div></div></div></dialog>'),
                    $("body").append(this.$el),
                    this.$el.find(".animated, .animating, .pix-waiting").addClass("animate-in").removeClass("animated animating pix-waiting pix-animate animating-init"),
                    "function" == typeof window.pixfort_init_popup_data && window.pixfort_init_popup_data(this.$el),
                    this.$el.addClass("transitioned displayed"),
                    this.$el.attr("data-open-id", o++),
                    this.$el.css({
                        "z-index": ++n
                    }),
                    this.$el.find(".pix-dialog-inner").animate({
                        scrollTop: 0
                    }, 0),
                    this.$el.find("a").blur(),
                    window.dispatchEvent(new Event("resize")),
                    setTimeout(( () => {
                        window.dispatchEvent(new Event("resize"))
                    }
                    ), 300),
                    h(),
                    $('.pix-popup-launcher[data-id="' + this.id + '"]').addClass("opened"),
                    window.pix_animation_display(this.$el),
                    this.onOpen();
                if ($("body").hasClass("pix-is-safari")) {
                    let e = 2 * this.$el.find(".pix-dialog-inner").height();
                    this.$el.find(".pix-dialog-backdrop").css("min-height", e)
                }
                return u(),
                !1
            },
            closePopup() {
                if (this.$el.hasClass("pix-editor"))
                    return !1;
                this.$el.find(".animated, .animating, .pix-waiting").addClass("animate-in").removeClass("animated animating pix-waiting pix-animate animating-init"),
                this.$el.removeClass("transitioned displayed"),
                $('.pix-popup-launcher[data-id="' + this.id + '"]').removeClass("opened"),
                this.cleanClose && setTimeout(( () => {
                    this.$el.remove()
                }
                ), 250),
                function(e=!1) {
                    e || (e = $(".pix-popup"));
                    e.find("iframe:not(.pix-keep-loaded)").each((function(e, i) {
                        i.src = $(this)[0].src
                    }
                    )),
                    e.find("video").each((function(e, i) {
                        $(i).pause()
                    }
                    ))
                }(this.$el);
                let e = this.$el.attr("data-display-id");
                if (e) {
                    let i = localStorage.getItem("pixfort")
                      , t = "popup_" + e + "_times";
                    i ? (i = JSON.parse(i),
                    i.hasOwnProperty(t) ? i[t] = i[t] + 1 : i[t] = 1,
                    localStorage.setItem("pixfort", JSON.stringify(i))) : (i = {},
                    i[t] = 1,
                    localStorage.setItem("pixfort", JSON.stringify(i)))
                }
            },
            closePosCheck() {
                if (!this.$el.hasClass("popup-close-inside")) {
                    let e = this.$el.find(".pix-dialog-container").width() + 35;
                    window.innerWidth <= e ? this.$el.addClass("pix-inner-close") : this.$el.removeClass("pix-inner-close")
                }
            },
            loadOptions(e) {
                let i = this
                  , t = !0;
                e.hasOwnProperty("showTimes") && (this.showTimes = parseInt(e.showTimes)),
                e.hasOwnProperty("popupDevices") && (t = this.popupDevicesCheck(e.popupDevices)),
                e.hasOwnProperty("isAjax") && (t = !1),
                Object.keys(e).forEach((function(o) {
                    let n = e[o];
                    switch (o) {
                    case "onpageload":
                        !p && t && i.onpageloadCheck(n);
                        break;
                    case "onpageexit":
                        !p && t && i.onpageexitCheck(n);
                        break;
                    case "onscroll":
                        !p && t && i.onscrollCheck(n);
                        break;
                    case "onscrollelement":
                        !p && t && i.onscrollelementCheck(n);
                        break;
                    case "customStyle":
                        i.addDialogStyle(n);
                        break;
                    case "launcherStyle":
                        i.addLauncherStyle(n)
                    }
                }
                ))
            },
            addDialogStyle(e) {
                let i = this
                  , t = "#pix_popup_" + this.id;
                Object.keys(e).forEach((function(o) {
                    document.querySelector(t) ? document.querySelector(t).style.setProperty(o, e[o]) : i.$el && i.$el.css(o, e[o])
                }
                ))
            },
            addLauncherStyle(e) {
                let i = "#pix_launcher_" + this.id;
                Object.keys(e).forEach((function(t) {
                    document.querySelector(i).style.setProperty(t, e[t])
                }
                )),
                setTimeout(( () => {
                    $(i).removeClass("d-none"),
                    $(i).find(".pix-launcher-close").removeClass("d-none")
                }
                ), 100)
            },
            popupDevicesCheck(e) {
                let i = JSON.parse(e);
                if (i && i.length && i.length < 3) {
                    let e = "none";
                    return e = window.innerWidth < 576 ? "mobile" : window.innerWidth < 992 ? "tablet" : "desktop",
                    i.includes(e)
                }
                return !0
            },
            showPopupCheck(e) {
                let i = !0;
                if (this.showTimes && this.$el && this.$el.attr("data-display-id")) {
                    const e = this.$el.attr("data-display-id");
                    let t = localStorage.getItem("pixfort");
                    const o = "popup_" + e + "_times";
                    t && (t = JSON.parse(t),
                    t.hasOwnProperty(o) && this.showTimes <= t[o] && (i = !1))
                }
                i && setTimeout(e, 0)
            },
            onpageloadCheck(e) {
                let i = this;
                e.hasOwnProperty("showAfter") || (e.showAfter = 0),
                setTimeout(( () => {
                    i.showPopupCheck(( () => {
                        r({
                            id: i.id
                        })
                    }
                    ))
                }
                ), e.showAfter)
            },
            onpageexitCheck() {
                let e = this;
                document.addEventListener("mouseleave", (function(i) {
                    e.showPopupCheck(( () => {
                        e.openPopup()
                    }
                    ))
                }
                ), {
                    once: !0
                })
            },
            onscrollCheck(e) {
                let i = !1
                  , t = this;
                window.addEventListener("scroll", (function() {
                    if (!i) {
                        if (document.documentElement.scrollTop / ($(document).height() - window.innerHeight) * 100 >= parseInt(e))
                            return t.showPopupCheck(( () => {
                                t.openPopup()
                            }
                            )),
                            i = !0,
                            !1
                    }
                }
                ))
            },
            onscrollelementCheck(e) {
                let i = this;
                if (e.hasOwnProperty("scrollSelector")) {
                    const t = document.querySelector(e.scrollSelector);
                    if (t)
                        new IntersectionObserver((function(e, t) {
                            e.forEach((e => {
                                e.isIntersecting && (i.showPopupCheck(( () => {
                                    i.openPopup()
                                }
                                )),
                                t.unobserve(e.target))
                            }
                            ))
                        }
                        ),{
                            threshold: [0]
                        }).observe(t)
                }
            }
        };
        function l(e) {
            $.extend(this, e),
            !e.hasOwnProperty("$el") && this.id && (this.$el = $("dialog#pix_popup_" + this.id))
        }
        Object.assign(l.prototype, a);
        const d = {
            instances: {},
            defaults: {
                id: 0,
                $el: !1,
                dynamic: !1
            },
            getPopup(e) {
                if (this.instances.hasOwnProperty(e)) {
                    let i = this.instances[e];
                    return i.$el && i.$el.length || (i.$el = $("#pix_popup_" + i.id)),
                    i
                }
                {
                    let i = $.extend({}, this.defaults, {
                        id: e
                    });
                    this.instances[e] = new l(i);
                    let t = this.instances[e];
                    return t.$el && t.$el.length || (t.$el = $("#pix_popup_" + t.id)),
                    this.instances[e]
                }
            },
            initPopup(e) {
                if (!this.instances.hasOwnProperty(e.id)) {
                    let i = $.extend({}, this.defaults, e);
                    i.$el = $('<dialog id="pix_popup_' + e.id + '" data-id="' + e.id + '" class="pix-popup d-' + e.id + " " + i.popupClasses + '"><div class="pix-dialog-backdrop"></div><div class="pix-dialog-container"><div class="pix-popup-close"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path fill="currentcolor" fill-opacity=".25" d="M12,2 C6.4771525,2 2,6.4771525 2,12 C2,17.5228475 6.4771525,22 12,22 C17.5228475,22 22,17.5228475 22,12 C22,6.4771525 17.5228475,2 12,2 Z"/><path fill="currentcolor" d="M9.20710678,7.79289322 L12,10.585 L14.7928932,7.79289322 C15.1834175,7.40236893 15.8165825,7.40236893 16.2071068,7.79289322 C16.5976311,8.18341751 16.5976311,8.81658249 16.2071068,9.20710678 L13.415,12 L16.2071068,14.7928932 C16.5976311,15.1834175 16.5976311,15.8165825 16.2071068,16.2071068 C15.8165825,16.5976311 15.1834175,16.5976311 14.7928932,16.2071068 L12,13.415 L9.20710678,16.2071068 C8.81658249,16.5976311 8.18341751,16.5976311 7.79289322,16.2071068 C7.40236893,15.8165825 7.40236893,15.1834175 7.79289322,14.7928932 L10.585,12 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 Z"/></g></svg></div><div class="pix-dialog-inner"></div></dialog>');
                    let t = new l(i);
                    return t.loadOptions(e),
                    this.instances[e.id] = t,
                    t
                }
                return this.instances[e.id]
            }
        };
        function r(e) {
            if (e) {
                let i = e.id
                  , t = $("dialog#pix_popup_" + i)
                  , o = d.getPopup(i);
                return o.openPopup(),
                t && t.length ? o.openPopup() : e.hasOwnProperty("theme") && ($("dialog#pix_popup_" + i).length || (s || (s = d.initPopup({
                    id: "loadingPopup",
                    popupClasses: "popup-width-sm pix-disable-backdrop popup-close-none text-center"
                }),
                s.contentSet || s.setContent('<svg class="pix-icon-loading bi bi-arrow-repeat text-dark-opacity-1 m-4" width="30px" height="30px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.854 7.146a.5.5 0 00-.708 0l-2 2a.5.5 0 10.708.708L2.5 8.207l1.646 1.647a.5.5 0 00.708-.708l-2-2zm13-1a.5.5 0 00-.708 0L13.5 7.793l-1.646-1.647a.5.5 0 00-.708.708l2 2a.5.5 0 00.708 0l2-2a.5.5 0 000-.708z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 3a4.995 4.995 0 00-4.192 2.273.5.5 0 01-.837-.546A6 6 0 0114 8a.5.5 0 01-1.001 0 5 5 0 00-5-5zM2.5 7.5A.5.5 0 013 8a5 5 0 009.192 2.727.5.5 0 11.837.546A6 6 0 012 8a.5.5 0 01.501-.5z" clip-rule="evenodd"/></svg>')),
                s.openPopup()),
                o.init(e),
                function(e, i) {
                    if ($("dialog#pix_popup_" + e).length)
                        setTimeout(i, 0);
                    else {
                        let t = PIX_JS_OPTIONS.dataPopupBase + "&id=" + e;
                        $.ajax({
                            url: t,
                            method: "get"
                        }).done((function(t) {
                            m(t, e, i)
                        }
                        ))
                    }
                }(i, ( () => {
                    s && s.closePopup(),
                    o.openPopup()
                }
                ))),
                !1
            }
        }
        let c = !1;
        function h() {
            if (!c)
                return c = !0,
                $("body").on("click", "dialog .pix-popup-close, dialog .pix-dialog-backdrop:not(.is-disabled), .pix-popup .pix-close-popup", (function(e) {
                    e.preventDefault();
                    let i = $(e.target).closest("dialog")
                      , t = i.attr("data-id")
                      , o = d.getPopup(t)
                      , n = $("#pix_launcher_" + t);
                    n && n.removeClass("opened"),
                    i[0].close(),
                    o.closePopup()
                }
                )),
                document.onkeydown = function(e) {
                    "Escape" == (e = e || window.event).key && function() {
                        let e = $(".pix-popup.displayed:not(.pix-disable-esc)")
                          , i = 0
                          , t = !1;
                        if (e.each((function(e, o) {
                            $(o).attr("data-open-id") > i && (t = $(o).attr("data-id"),
                            i = $(o).attr("data-open-id"))
                        }
                        )),
                        t) {
                            d.getPopup(t).closePopup()
                        }
                    }()
                }
                ,
                $("body").on("click", ".pix-popup-launcher", (function(e) {
                    e.preventDefault(),
                    e.stopPropagation();
                    let i = $(this).attr("data-id")
                      , t = $("#pix_popup_" + i);
                    if (t) {
                        let e = d.getPopup(i);
                        t.hasClass("displayed") ? (t[0].close(),
                        e.closePopup(),
                        $(this).removeClass("opened")) : ($(this).addClass("opened"),
                        e.openPopup())
                    }
                    return !1
                }
                )),
                u(),
                window.addEventListener("resize", u),
                !1
        }
        function u() {
            let e = window.innerWidth
              , i = window.innerHeight;
            $(".pix-popup.displayed").each((function(t, o) {
                if (!$(o).hasClass("popup-close-inside")) {
                    let i = $(o).find(".pix-dialog-container").width() + 35;
                    e <= i ? $(o).addClass("pix-inner-close") : $(o).removeClass("pix-inner-close")
                }
                if ($(o).hasClass("pix-disable-backdrop") && !$(o).hasClass("attach-popup-launcher")) {
                    let e = $(o).find(".pix-dialog-container").height();
                    i < e && $(o).removeClass("pix-disable-backdrop")
                }
            }
            ))
        }
        function f(e) {
            e && Object.keys(e).forEach((function(i) {
                let t = e[i];
                d.getPopup(i).loadOptions(t)
            }
            )),
            h()
        }
        function g(e) {
            let i = []
              , t = document.querySelectorAll("[data-popup-id]");
            for (const n of t) {
                let s = n.getAttribute("data-popup-id");
                !s || $("dialog#pix_popup_" + s).length || i.includes(s) || i.push(s)
            }
            let o = $("[href^='#pix_popup_']");
            if (o && o.length)
                for (const p of o) {
                    let a = $(p).attr("href").replace("#pix_popup_", "");
                    !a || $("dialog#pix_popup_" + a).length || i.includes(a) || i.push(a)
                }
            if (i && i.length) {
                function l() {
                    x(i),
                    window.removeEventListener("scroll", l),
                    document.querySelectorAll('a[href^="#pix_popup_"]').forEach((e => {
                        e.removeEventListener("mouseenter", c)
                    }
                    ))
                }
                window.addEventListener("scroll", l);
                let r = !1;
                function c() {
                    r || (x(i),
                    r = !0,
                    window.removeEventListener("scroll", l),
                    document.querySelectorAll('a[href^="#pix_popup_"]').forEach((e => {
                        e.removeEventListener("mouseenter", c)
                    }
                    )))
                }
                document.querySelectorAll('a[href^="#pix_popup_"]').forEach((e => {
                    e.addEventListener("mouseenter", c)
                }
                ))
            }
            $("body").on("click", ".pix-video-popup", (function(e) {
                if (e.preventDefault(),
                $(this).data("content") && "" != $(this).data("content")) {
                    let e = "video";
                    $(this).data("id") ? e = $(this).data("id") : (e = Math.floor(1e7 * Math.random()),
                    $(this).attr("data-id", e));
                    let i = $(this).data("content")
                      , t = "embed-responsive-21by9";
                    $(this).data("aspect") && "" != $(this).data("aspect") && (t = $(this).data("aspect"));
                    let o = d.initPopup({
                        id: e,
                        popupClasses: "popup-width-lg popup-shadow-large animation-scale",
                        cleanClose: !0
                    })
                      , n = "";
                    n += '<div class="pix-video video-active">',
                    n += '<div class="embed-responsive ' + t + '">',
                    n += i,
                    n += "</div>",
                    n += "</div>",
                    o.setContent(n),
                    o.openPopup(),
                    o.onOpen(( () => {
                        o.$el.find("iframe").each((function(e, i) {
                            let t = $(i).data("src");
                            $(i).attr("src", t).click(),
                            setTimeout((function() {
                                $(i).click()
                            }
                            ), 1e3)
                        }
                        ))
                    }
                    ))
                }
                return !1
            }
            )),
            $("body").on("click", ".pix-story-popup", (function(e) {
                e.preventDefault();
                let i = $(this).data("stories");
                if (i && "" != i) {
                    let e = ""
                      , t = "story";
                    $(this).data("id") ? t = $(this).data("id") : (t = Math.floor(1e7 * Math.random()),
                    $(this).attr("data-id", t)),
                    e += '<div class="pix-popup-content-div"><div class="pix-story-slider bg-black pix-slider-story no-dots2">',
                    $.each(i, (function(i, t) {
                        e += '<div class="carousel-cell p-0">',
                        e += '<img class="jarallax-img pix-fit-cover w-100 pix-opacity-8" width="730" src="' + t + '" />',
                        e += "</div>"
                    }
                    )),
                    e += "</div>",
                    e += "</div>";
                    let o = d.initPopup({
                        id: t,
                        popupClasses: "popup-width-sm popup-shadow-large animation-scale",
                        cleanClose: !0
                    });
                    o.setContent(e),
                    o.openPopup(),
                    o.onOpen(( () => {
                        o.$el.find(".pix-story-slider").length > 0 && o.$el.find(".pix-story-slider").flickity({
                            draggable: !0,
                            adaptiveHeight: !0,
                            wrapAround: !0,
                            autoPlay: 3500,
                            prevNextButtons: !1,
                            imagesLoaded: !0,
                            contain: !0,
                            resize: !0,
                            ready: function() {
                                $(".pix-story-slider").flickity("resize")
                            },
                            on: {
                                ready: function() {
                                    $(this).closest(".pix-story-slider").show(),
                                    $(this).closest(".pix-story-slider").removeClass("d-in"),
                                    $(this).removeClass("d-in")
                                }
                            }
                        })
                    }
                    ))
                }
                return !1
            }
            )),
            $("body").on("click", ".pix-audio-popup", (function(e) {
                if (e.preventDefault(),
                $(this).data("content") && "" != $(this).data("content")) {
                    let e = "audio";
                    $(this).data("id") ? e = $(this).data("id") : (e = Math.floor(1e7 * Math.random()),
                    $(this).attr("data-id", e));
                    let i = $(this).data("content")
                      , t = "embed-responsive-21by9";
                    $(this).data("aspect") && "" != $(this).data("aspect") && (t = $(this).data("aspect"));
                    let o = "";
                    o += i;
                    let n = d.initPopup({
                        id: e,
                        popupClasses: "popup-width-md popup-shadow-large pix-audio-popup animation-scale",
                        cleanClose: !0
                    });
                    n.setContent(o),
                    n.openPopup(),
                    n.onOpen(( () => {
                        n.$el.find("iframe").each((function(e, i) {
                            let t = $(i).data("src");
                            $(i).attr("src", t).click(),
                            setTimeout((function() {
                                $(i).click()
                            }
                            ), 1e3)
                        }
                        ))
                    }
                    ))
                }
                return !1
            }
            ))
        }
        async function x(e, i) {
            try {
                $.ajax({
                    url: PIX_JS_OPTIONS.dataPagePopupsBase,
                    method: "get",
                    data: {
                        popups: e
                    }
                }).done((function(e) {
                    if (!Array.isArray(e))
                        return !1;
                    e.forEach((e => {
                        m(e, !1, i)
                    }
                    ))
                }
                ))
            } catch (e) {}
        }
        function m(e, i=!1, t=!1) {
            let o = !1;
            try {
                if (o = JSON.parse(e),
                !i && o.hasOwnProperty("id") && (i = o.id),
                i && !$("dialog#pix_popup_" + i).length) {
                    let e = $(o.html)
                      , n = d.getPopup(i);
                    if (n.$el = e,
                    o.hasOwnProperty("popupOptions")) {
                        let e = o.popupOptions;
                        e.isAjax = !0,
                        n.loadOptions(e)
                    }
                    setTimeout((function() {
                        o.footer_content && n.appendContent('<div class="pix-popup-footer-div">' + o.footer_content + "</div>"),
                        o.result && o.result.scripts && o.result.styles && window.pix_dynamic_popup_js(o.result.scripts, o.result.styles)
                    }
                    ), 5),
                    $('.pix-popup-launcher[data-id="' + i + '"]').length || n.$el.removeClass("attach-popup-launcher"),
                    t && setTimeout(t, 0)
                }
            } catch (e) {
                return !1
            }
        }
    }
}]);
