( () => {
    "use strict";
    var e, t, n = {}, i = {};
    function o(e) {
        var t = i[e];
        if (void 0 !== t)
            return t.exports;
        var r = i[e] = {
            exports: {}
        };
        return n[e].call(r.exports, r, r.exports, o),
        r.exports
    }
    function r(e, t=500) {
        var n = e.getBoundingClientRect()
          , i = window.innerHeight || document.documentElement.clientHeight;
        return n.top <= i + t && n.top + n.height >= 0
    }
    function a(e, t) {
        if (document.querySelectorAll(e).length) {
            function n() {
                t()
            }
            (function(e) {
                for (var t = document.querySelectorAll(e), n = 0; n < t.length; n++)
                    if (r(t[n]))
                        return !0;
                return !1
            }
            )(e) && n(),
            window.addEventListener("scroll", (function() {
                n()
            }
            ), {
                once: !0,
                passive: !0
            })
        }
    }
    o.m = n,
    o.n = e => {
        var t = e && e.__esModule ? () => e.default : () => e;
        return o.d(t, {
            a: t
        }),
        t
    }
    ,
    o.d = (e, t) => {
        for (var n in t)
            o.o(t, n) && !o.o(e, n) && Object.defineProperty(e, n, {
                enumerable: !0,
                get: t[n]
            })
    }
    ,
    o.f = {},
    o.e = e => Promise.all(Object.keys(o.f).reduce(( (t, n) => (o.f[n](e, t),
    t)), [])),
    o.u = e => 973 === e ? "973.d9ccaeb2453f6c85376b.js" : 157 === e ? "157.888fe41f4bed3b5e339e.js" : 574 === e ? "footer.1db80a492563cfd8641d.js" : 134 === e ? "marquee.b810f04d86f44e7cb048.js" : 65 === e ? "chart.9075a060e6768c7ab486.js" : 416 === e ? "countdown.ca3688bcf5568c611047.js" : 59 === e ? "scale.f3f21efe5cc9092e1aff.js" : 618 === e ? "tilt.3efe3edc9c97be4422ae.js" : 989 === e ? "989.395fb900e799afa8d8fd.js" : 286 === e ? "286.bea815e3dc583f821bff.js" : 235 === e ? "element-parallax.bccda04fd11d4bad7570.js" : 669 === e ? "animated-heading.eccfb367c18d4f78fb3e.js" : 897 === e ? "carousel.1a2ff88f876b0fcd4a34.js" : 436 === e ? "slider.13250d994b3ecdaed9e4.js" : 150 === e ? "parallax.1d3093f6826dafc3fb07.js" : 208 === e ? "208.e1b69c56b45214fe570a.js" : 171 === e ? "numbers.4b772fd7edfe8178cdcc.js" : 753 === e ? "bars.6cd92c1196ba0d1772fb.js" : 907 === e ? "dialog.e3cd0050264c13f8f817.js" : 692 === e ? "692.bf79c8c94385f1ddd0b3.js" : 887 === e ? "popup.0bef849a7a5f820e82ce.js" : 493 === e ? "legacy-popup-loader.c174d33169dcdb6064e2.js" : 700 === e ? "woo.797844e029d3f6a310cf.js" : 187 === e ? "search.4fe7a1d908d376abb827.js" : 244 === e ? "244.5746db44c5cf563e1668.js" : 283 === e ? "search-suggestions.2e416a3a03330d1a8bda.js" : 749 === e ? "749.1b717686606fe9998e72.js" : 299 === e ? "299.9d3e636fccc50c222568.js" : 485 === e ? "floating-meta.103a376cd89ac476ffea.js" : 663 === e ? "663.2c6baffa703c9165e93a.js" : 635 === e ? "tooltips.0056ba2822daf3f3bb87.js" : 131 === e ? "accordion.373aa650a58bd65e9c14.js" : 575 === e ? "tabs.451182328bcd44ef3d4d.js" : 632 === e ? "masonry.d3d8269249f6fd1563f3.js" : 478 === e ? "fancy-mockup.061e5c6fcf766e3de3c8.js" : 167 === e ? "select.a2e2b3b9452cb71a4339.js" : 348 === e ? "main-fns.60af6e75ea81256b2454.js" : 608 === e ? "header.1ca1af3ae72114be26de.js" : 76 === e ? "common.adeda14e9798ab04e161.js" : 492 === e ? "492.1fae6fcec65868766dba.js" : 944 === e ? "944.5859a44d9cb9bc433d0b.js" : void 0,
    o.miniCssF = e => e + "." + {
        59: "880fc981c149c8a847e3",
        157: "e949450fb85265b3f64f",
        167: "ae48f3dc50a74e228b08",
        187: "5db707c0f6b4762b39ff",
        283: "7a4bb1c9b726eb7fb1ef",
        492: "8311986e276a4bcd589c",
        700: "4017f5490b8d70e2cd51",
        887: "bda04058e8d9398f0a08",
        944: "3064f5ad32b6dee35015",
        973: "da936b956df5da6b2d7d"
    }[e] + ".css",
    o.g = function() {
        if ("object" == typeof globalThis)
            return globalThis;
        try {
            return this || new Function("return this")()
        } catch (e) {
            if ("object" == typeof window)
                return window
        }
    }(),
    o.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t),
    e = {},
    t = "pixfort-core:",
    o.l = (n, i, r, a) => {
        if (e[n])
            e[n].push(i);
        else {
            var d, c;
            if (void 0 !== r)
                for (var l = document.getElementsByTagName("script"), s = 0; s < l.length; s++) {
                    var u = l[s];
                    if (u.getAttribute("src") == n || u.getAttribute("data-webpack") == t + r) {
                        d = u;
                        break
                    }
                }
            d || (c = !0,
            (d = document.createElement("script")).charset = "utf-8",
            d.timeout = 120,
            o.nc && d.setAttribute("nonce", o.nc),
            d.setAttribute("data-webpack", t + r),
            d.src = n),
            e[n] = [i];
            var f = (t, i) => {
                d.onerror = d.onload = null,
                clearTimeout(p);
                var o = e[n];
                if (delete e[n],
                d.parentNode && d.parentNode.removeChild(d),
                o && o.forEach((e => e(i))),
                t)
                    return t(i)
            }
              , p = setTimeout(f.bind(null, void 0, {
                type: "timeout",
                target: d
            }), 12e4);
            d.onerror = f.bind(null, d.onerror),
            d.onload = f.bind(null, d.onload),
            c && document.head.appendChild(d)
        }
    }
    ,
    o.r = e => {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }),
        Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }
    ,
    ( () => {
        var e;
        o.g.importScripts && (e = o.g.location + "");
        var t = o.g.document;
        if (!e && t && (t.currentScript && (e = t.currentScript.src),
        !e)) {
            var n = t.getElementsByTagName("script");
            if (n.length)
                for (var i = n.length - 1; i > -1 && (!e || !/^http(s?):/.test(e)); )
                    e = n[i--].src
        }
        if (!e)
            throw new Error("Automatic publicPath is not supported in this browser");
        e = e.replace(/#.*$/, "").replace(/\?.*$/, "").replace(/\/[^\/]+$/, "/"),
        o.p = e
    }
    )(),
    ( () => {
        if ("undefined" != typeof document) {
            var e = e => new Promise(( (t, n) => {
                var i = o.miniCssF(e)
                  , r = o.p + i;
                if (( (e, t) => {
                    for (var n = document.getElementsByTagName("link"), i = 0; i < n.length; i++) {
                        var o = (a = n[i]).getAttribute("data-href") || a.getAttribute("href");
                        if ("stylesheet" === a.rel && (o === e || o === t))
                            return a
                    }
                    var r = document.getElementsByTagName("style");
                    for (i = 0; i < r.length; i++) {
                        var a;
                        if ((o = (a = r[i]).getAttribute("data-href")) === e || o === t)
                            return a
                    }
                }
                )(i, r))
                    return t();
                ( (e, t, n, i, r) => {
                    var a = document.createElement("link");
                    a.rel = "stylesheet",
                    a.type = "text/css",
                    o.nc && (a.nonce = o.nc),
                    a.onerror = a.onload = n => {
                        if (a.onerror = a.onload = null,
                        "load" === n.type)
                            i();
                        else {
                            var o = n && n.type
                              , d = n && n.target && n.target.href || t
                              , c = new Error("Loading CSS chunk " + e + " failed.\n(" + o + ": " + d + ")");
                            c.name = "ChunkLoadError",
                            c.code = "CSS_CHUNK_LOAD_FAILED",
                            c.type = o,
                            c.request = d,
                            a.parentNode && a.parentNode.removeChild(a),
                            r(c)
                        }
                    }
                    ,
                    a.href = t,
                    n ? n.parentNode.insertBefore(a, n.nextSibling) : document.head.appendChild(a)
                }
                )(e, r, null, t, n)
            }
            ))
              , t = {
                57: 0
            };
            o.f.miniCss = (n, i) => {
                t[n] ? i.push(t[n]) : 0 !== t[n] && {
                    59: 1,
                    157: 1,
                    167: 1,
                    187: 1,
                    283: 1,
                    492: 1,
                    700: 1,
                    887: 1,
                    944: 1,
                    973: 1
                }[n] && i.push(t[n] = e(n).then(( () => {
                    t[n] = 0
                }
                ), (e => {
                    throw delete t[n],
                    e
                }
                )))
            }
        }
    }
    )(),
    ( () => {
        var e = {
            57: 0
        };
        o.f.j = (t, n) => {
            var i = o.o(e, t) ? e[t] : void 0;
            if (0 !== i)
                if (i)
                    n.push(i[2]);
                else {
                    var r = new Promise(( (n, o) => i = e[t] = [n, o]));
                    n.push(i[2] = r);
                    var a = o.p + o.u(t)
                      , d = new Error;
                    o.l(a, (n => {
                        if (o.o(e, t) && (0 !== (i = e[t]) && (e[t] = void 0),
                        i)) {
                            var r = n && ("load" === n.type ? "missing" : n.type)
                              , a = n && n.target && n.target.src;
                            d.message = "Loading chunk " + t + " failed.\n(" + r + ": " + a + ")",
                            d.name = "ChunkLoadError",
                            d.type = r,
                            d.request = a,
                            i[1](d)
                        }
                    }
                    ), "chunk-" + t, t)
                }
        }
        ;
        var t = (t, n) => {
            var i, r, [a,d,c] = n, l = 0;
            if (a.some((t => 0 !== e[t]))) {
                for (i in d)
                    o.o(d, i) && (o.m[i] = d[i]);
                if (c)
                    c(o)
            }
            for (t && t(n); l < a.length; l++)
                r = a[l],
                o.o(e, r) && e[r] && e[r][0](),
                e[r] = 0
        }
          , n = self.webpackChunkpixfort_core = self.webpackChunkpixfort_core || [];
        n.forEach(t.bind(null, 0)),
        n.push = t.bind(null, n.push.bind(n))
    }
    )(),
    "undefined" == typeof $ && "undefined" != jQuery && ($ = jQuery),
    window.pixfort = {},
    jQuery(document).ready((function(e) {
        const t = "ontouchstart"in window || navigator.msMaxTouchPoints;
        "undefined" == typeof PIX_JS_OPTIONS && (window.PIX_JS_OPTIONS = {}),
        !t && function(e) {
            if (PIX_JS_OPTIONS.hasOwnProperty(e) && PIX_JS_OPTIONS[e])
                return PIX_JS_OPTIONS[e];
            return !1
        }("ENABLE_CURSOR") && o.e(973).then(o.bind(o, 973));
        let n = 992;
        if ("undefined" == typeof pixfort_main_object && (window.pixfort_main_object = {}),
        pixfort_main_object.hasOwnProperty("dataBreakpoint") && (n = pixfort_main_object.dataBreakpoint),
        window.innerWidth > n ? (document.querySelectorAll(".pix-sections-stack").length && !window.vc_iframe && o.e(157).then(o.bind(o, 157)).then((e => {
            e.default()
        }
        )),
        document.querySelectorAll(".pix-sticky-footer").length && (e(".pix-sticky-footer").outerHeight() > window.innerHeight ? e(".pix-sticky-footer").removeClass("pix-sticky-footer") : a(".pix-sticky-footer", ( () => o.e(574).then(o.bind(o, 384)).then((e => {
            e.default()
        }
        )))))) : (document.querySelector("body").classList.remove("pix-sections-stack"),
        document.querySelector(".pix-sticky-footer") && document.querySelector(".pix-sticky-footer").classList.remove("pix-sticky-footer")),
        window.pix_marquee = async function(e) {
            document.querySelectorAll(".pix-marquee").length && o.e(134).then(o.bind(o, 543)).then((t => {
                t.default(e)
            }
            ))
        }
        ,
        window.pix_marquee(),
        window.init_chart = async function(e) {
            a(".chart", ( () => o.e(65).then(o.bind(o, 263)).then((t => {
                t.default(e)
            }
            ))))
        }
        ,
        window.init_chart(),
        window.pix_countdown = async function(e) {
            document.querySelectorAll(".pix-countdown").length && o.e(416).then(o.bind(o, 912)).then((t => {
                t.default(e)
            }
            ))
        }
        ,
        window.pix_countdown(),
        window.pix_section_stack = async function(e) {
            document.querySelectorAll(".pix-scale-in, .pix-scale-in-xs, .pix-scale-in-sm, .pix-scale-in-lg").length && o.e(59).then(o.bind(o, 509)).then((t => {
                t.default(e)
            }
            ))
        }
        ,
        window.pix_section_stack(),
        window.init_tilts = async function(e) {
            if (!t && document.querySelectorAll(".tilt, .tilt_small, .tilt_big").length) {
                function n() {
                    window.removeEventListener("mousemove", n),
                    o.e(618).then(o.bind(o, 644)).then((t => {
                        t.default(e)
                    }
                    ))
                }
                window.addEventListener("mousemove", n, {
                    once: !0,
                    passive: !0
                })
            }
        }
        ,
        window.init_tilts(),
        window.init_jarallax = async function() {
            Promise.all([o.e(989), o.e(286)]).then(o.bind(o, 286)).then((e => {
                e.default()
            }
            )),
            a("[data-jarallax-element]", ( () => o.e(235).then(o.bind(o, 519)).then((e => {
                e.default()
            }
            ))))
        }
        ,
        window.init_jarallax(),
        window.init_animated_heading = async function() {
            document.querySelectorAll(".pix-headline").length && o.e(669).then(o.bind(o, 285)).then((e => {
                e.default()
            }
            ))
        }
        ,
        window.init_animated_heading(),
        window.pix_main_slider = async function(t) {
            e(".pix-main-slider").length && o.e(897).then(o.bind(o, 709)).then((e => {
                e.default(t)
            }
            ))
        }
        ,
        window.pix_main_slider(),
        window.pix_sliders = async function(t) {
            e(".pix-slider").length && o.e(436).then(o.bind(o, 886)).then((e => {
                e.default(t)
            }
            ))
        }
        ,
        window.pix_sliders(),
        window.init_Parallax = async function(e) {
            if (!t && document.querySelectorAll(".scene, .pix-scene").length) {
                function n() {
                    window.removeEventListener("mousemove", n),
                    o.e(150).then(o.bind(o, 292)).then((t => {
                        t.default(e)
                    }
                    ))
                }
                window.addEventListener("mousemove", n, {
                    once: !0,
                    passive: !0
                })
            }
        }
        ,
        window.init_Parallax(),
        window.init_dividerShapes = async function(t) {
            t || (t = e("body")),
            t.find(".pix-shape-dividers:not(.loaded)").each((function(e, t) {
                new IntersectionObserver((function(e, n) {
                    e.forEach((e => {
                        e.isIntersecting && (o.e(208).then(o.bind(o, 208)).then((e => {
                            e.default(t)
                        }
                        )),
                        n.unobserve(e.target))
                    }
                    ))
                }
                ),{
                    threshold: [0]
                }).observe(t)
            }
            ))
        }
        ,
        window.init_dividerShapes(),
        window.update_numbers = async function(t) {
            t || (t = e("body")),
            t.find(".animate-math .number").each((function(e, t) {
                new IntersectionObserver((function(e, n) {
                    e.forEach((e => {
                        e.isIntersecting && (o.e(171).then(o.bind(o, 993)).then((e => {
                            e.default(t)
                        }
                        )),
                        n.unobserve(e.target))
                    }
                    ))
                }
                ),{
                    threshold: [0]
                }).observe(t)
            }
            ))
        }
        ,
        window.update_numbers(),
        window.init_bars = async function(t) {
            t || (t = e("body")),
            t.find(".pix-progress:not(.pix_ready)").each((function(e, t) {
                new IntersectionObserver((function(e, n) {
                    e.forEach((e => {
                        e.isIntersecting && (o.e(753).then(o.bind(o, 245)).then((e => {
                            e.default(t)
                        }
                        )),
                        n.unobserve(e.target))
                    }
                    ))
                }
                ),{
                    threshold: [0]
                }).observe(t)
            }
            ))
        }
        ,
        window.init_bars(),
        window.video_element = async function(t) {
            t || (t = e("body")),
            setTimeout(( () => {
                t.find("video").each((function() {
                    this.autoplay && this.paused && this.play()
                }
                ))
            }
            ), 200)
        }
        ,
        window.video_element(),
        window.pix_intro_bg = async function() {
            const t = e(".pix-intro-1 .pix-intro-img");
            t.length && t.each((function(t, n) {
                let i = new IntersectionObserver((t => {
                    const o = t[0];
                    o.isIntersecting && (setTimeout((function() {
                        e(n).addClass("animated")
                    }
                    ), 1),
                    i.unobserve(o.target))
                }
                ),{
                    threshold: [0]
                });
                i.observe(n)
            }
            ))
        }
        ,
        window.pix_intro_bg(),
        PIX_JS_OPTIONS.hasOwnProperty("ENABLE_NEW_POPUPS"))
            o.e(907).then(o.bind(o, 895)).then((e => {
                e.dialogLoader(PIX_JS_OPTIONS.dataPopupBase),
                "undefined" != typeof PIX_POPUPS_OPTIONS && e.loadPopupOptions(PIX_POPUPS_OPTIONS)
            }
            )),
            window.loadPopup = async function(e) {
                e && o.e(907).then(o.bind(o, 895)).then((t => {
                    t.default(e)
                }
                ))
            }
            ;
        else {
            window.loadPopup = async function(e) {
                e && Promise.all([o.e(692), o.e(887)]).then(o.bind(o, 538)).then((t => {
                    t.default(e)
                }
                ))
            }
            ;
            const t = e(".pix-popup-link, .pix-audio-popup, .pix-story-popup, .pix-video-popup");
            if (t && t.length) {
                let e = !1;
                t.one("mouseenter", (function() {
                    e || (e = !0,
                    Promise.all([o.e(692), o.e(887)]).then(o.bind(o, 538)).then((e => {
                        e.default()
                    }
                    )))
                }
                ))
            }
            o.e(493).then(o.bind(o, 811)).then((e => {
                e.default()
            }
            ))
        }
        PIX_JS_OPTIONS.hasOwnProperty("WOO") && document.querySelectorAll(".product, .pix-product-preview, a.plus, a.minus, .widget_product_categories, .pix-add-to-cart, .pix-add-to-wishlist").length && o.e(700).then(o.bind(o, 672)).then((e => {
            e.default()
        }
        )),
        window.searchOverlay = async function() {
            document.querySelector(".pix-search-btn") && o.e(187).then(o.bind(o, 51)).then((e => {
                e.default()
            }
            ))
        }
        ,
        window.searchOverlay(),
        e("body").on("mouseover", ".pix-ajax-search", (function(t) {
            let n = e(this);
            n.hasClass("ajax-loaded") || Promise.all([o.e(244), o.e(283)]).then(o.bind(o, 175)).then((e => {
                e.default(n)
            }
            ))
        }
        )),
        window.pix_runtime = async function(e) {
            a(".pix-runtime-canvas", ( () => Promise.all([o.e(749), o.e(299)]).then(o.bind(o, 299)).then((t => {
                t.default(e)
            }
            ))))
        }
        ,
        window.pix_runtime(),
        e("body").on("mouseover", ".pix-circles-elem", (function(t) {
            e(".pix-circles").addClass("circles-transition")
        }
        )),
        document.querySelectorAll(".pix-floating-meta").length && o.e(485).then(o.bind(o, 723)).then((e => {
            e.default()
        }
        )),
        document.querySelectorAll(".pix-floating-meta").length && o.e(485).then(o.bind(o, 723)).then((e => {
            e.default()
        }
        )),
        window.pixTooltips = async function() {
            document.querySelectorAll('[data-toggle="tooltip"]').length && Promise.all([o.e(663), o.e(635)]).then(o.bind(o, 271)).then((e => {
                e.default()
            }
            ))
        }
        ,
        window.pixTooltips(),
        document.querySelectorAll('[data-toggle="collapse"]').length && o.e(131).then(o.bind(o, 573)).then((e => {
            e.default()
        }
        )),
        document.querySelectorAll(".pix_tabs_btns").length || e("body").hasClass("elementor-editor-active") ? o.e(575).then(o.bind(o, 323)).then((e => {
            e.default()
        }
        )) : setTimeout(( () => {
            (document.querySelectorAll(".pix_tabs_btns").length || e("body").hasClass("elementor-editor-active")) && o.e(575).then(o.bind(o, 323)).then((e => {
                e.default()
            }
            ))
        }
        ), 1e3),
        window.update_masonry = async function(e) {
            a(".pix_masonry", ( () => Promise.all([o.e(692), o.e(632)]).then(o.bind(o, 820)).then((t => {
                t.default(e)
            }
            ))))
        }
        ,
        window.init_portfolio = async function(e) {
            a(".portfolio_grid, .portfolio_filter", ( () => Promise.all([o.e(692), o.e(632)]).then(o.bind(o, 820)).then((t => {
                t.init_portfolio(e)
            }
            ))))
        }
        ,
        window.init_fancy_mockup = async function(e) {
            a(".pix-fancy-mockup", ( () => o.e(478).then(o.bind(o, 44)).then((t => {
                t.default(e)
            }
            ))))
        }
        ,
        window.initBootstrapSelect = async function() {
            document.querySelectorAll(".pixfort-select, .widget select, .wp-block-archives.wp-block-archives-dropdown select, .wp-block-categories.wp-block-categories-dropdown select, .pixfort-shop-select").length && Promise.all([o.e(663), o.e(167)]).then(o.bind(o, 31)).then((e => {
                e.default()
            }
            ))
        }
        ,
        window.initBootstrapSelect(),
        window.init_scroll_rotate = async function(e) {
            document.querySelectorAll(".pix-rotate-scroll").length && o.e(348).then(o.bind(o, 18)).then((t => {
                t.default(e)
            }
            ))
        }
        ,
        window.init_scroll_rotate(),
        window.pix_init_particles = async function() {
            document.querySelectorAll(".pix-scene").length && o.e(348).then(o.bind(o, 18)).then((e => {
                e.init_particles()
            }
            ))
        }
        ,
        window.pix_init_particles(),
        o.e(608).then(o.bind(o, 230)).then((e => {
            e.default()
        }
        )),
        o.e(76).then(o.bind(o, 226)).then((e => {
            e.default()
        }
        ))
    }
    ))
}
)();
