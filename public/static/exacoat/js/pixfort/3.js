"use strict";
(self.webpackChunkpixfort_core = self.webpackChunkpixfort_core || []).push([[989], {
    989: (e, t, i) => {
        i.d(t, {
            c1: () => R,
            nk: () => D
        });
        /*!
* Jarallax v2.2.1 (https://github.com/nk-o/jarallax)
* Copyright 2024 nK <https://nkdev.info>
* Licensed under MIT (https://github.com/nk-o/jarallax/blob/master/LICENSE)
*/
        var o = {
            type: "scroll",
            speed: .5,
            containerClass: "jarallax-container",
            imgSrc: null,
            imgElement: ".jarallax-img",
            imgSize: "cover",
            imgPosition: "50% 50%",
            imgRepeat: "no-repeat",
            keepImg: !1,
            elementInViewport: null,
            zIndex: -100,
            disableParallax: !1,
            onScroll: null,
            onInit: null,
            onDestroy: null,
            onCoverImage: null,
            videoClass: "jarallax-video",
            videoSrc: null,
            videoStartTime: 0,
            videoEndTime: 0,
            videoVolume: 0,
            videoLoop: !0,
            videoPlayOnlyVisible: !0,
            videoLazyLoading: !0,
            disableVideo: !1,
            onVideoInsert: null,
            onVideoWorkerInit: null
        };
        let n;
        n = "undefined" != typeof window ? window : void 0 !== i.g ? i.g : "undefined" != typeof self ? self : {};
        var a = n;
        const {navigator: s} = a
          , r = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(s.userAgent);
        let l, p, d;
        function m() {
            l = a.innerWidth || document.documentElement.clientWidth,
            r ? (!d && document.body && (d = document.createElement("div"),
            d.style.cssText = "position: fixed; top: -9999px; left: 0; height: 100vh; width: 0;",
            document.body.appendChild(d)),
            p = (d ? d.clientHeight : 0) || a.innerHeight || document.documentElement.clientHeight) : p = a.innerHeight || document.documentElement.clientHeight
        }
        var c;
        function u() {
            return {
                width: l,
                height: p
            }
        }
        m(),
        a.addEventListener("resize", m),
        a.addEventListener("orientationchange", m),
        a.addEventListener("load", m),
        c = () => {
            m()
        }
        ,
        "complete" === document.readyState || "interactive" === document.readyState ? c() : document.addEventListener("DOMContentLoaded", c, {
            capture: !0,
            once: !0,
            passive: !0
        });
        const g = [];
        function y() {
            if (!g.length)
                return;
            const {width: e, height: t} = u();
            g.forEach(( (i, o) => {
                const {instance: n, oldData: a} = i;
                if (!n.isVisible())
                    return;
                const s = n.$item.getBoundingClientRect()
                  , r = {
                    width: s.width,
                    height: s.height,
                    top: s.top,
                    bottom: s.bottom,
                    wndW: e,
                    wndH: t
                }
                  , l = !a || a.wndW !== r.wndW || a.wndH !== r.wndH || a.width !== r.width || a.height !== r.height
                  , p = l || !a || a.top !== r.top || a.bottom !== r.bottom;
                g[o].oldData = r,
                l && n.onResize(),
                p && n.onScroll()
            }
            )),
            a.requestAnimationFrame(y)
        }
        const h = new a.IntersectionObserver((e => {
            e.forEach((e => {
                e.target.jarallax.isElementInViewport = e.isIntersecting
            }
            ))
        }
        ),{
            rootMargin: "50px"
        });
        const {navigator: v} = a;
        let f = 0;
        class b {
            constructor(e, t) {
                const i = this;
                i.instanceID = f,
                f += 1,
                i.$item = e,
                i.defaults = {
                    ...o
                };
                const n = i.$item.dataset || {}
                  , a = {};
                if (Object.keys(n).forEach((e => {
                    const t = e.substr(0, 1).toLowerCase() + e.substr(1);
                    t && void 0 !== i.defaults[t] && (a[t] = n[e])
                }
                )),
                i.options = i.extend({}, i.defaults, a, t),
                i.pureOptions = i.extend({}, i.options),
                Object.keys(i.options).forEach((e => {
                    "true" === i.options[e] ? i.options[e] = !0 : "false" === i.options[e] && (i.options[e] = !1)
                }
                )),
                i.options.speed = Math.min(2, Math.max(-1, parseFloat(i.options.speed))),
                "string" == typeof i.options.disableParallax && (i.options.disableParallax = new RegExp(i.options.disableParallax)),
                i.options.disableParallax instanceof RegExp) {
                    const e = i.options.disableParallax;
                    i.options.disableParallax = () => e.test(v.userAgent)
                }
                if ("function" != typeof i.options.disableParallax) {
                    const e = i.options.disableParallax;
                    i.options.disableParallax = () => !0 === e
                }
                if ("string" == typeof i.options.disableVideo && (i.options.disableVideo = new RegExp(i.options.disableVideo)),
                i.options.disableVideo instanceof RegExp) {
                    const e = i.options.disableVideo;
                    i.options.disableVideo = () => e.test(v.userAgent)
                }
                if ("function" != typeof i.options.disableVideo) {
                    const e = i.options.disableVideo;
                    i.options.disableVideo = () => !0 === e
                }
                let s = i.options.elementInViewport;
                s && "object" == typeof s && void 0 !== s.length && ([s] = s),
                s instanceof Element || (s = null),
                i.options.elementInViewport = s,
                i.image = {
                    src: i.options.imgSrc || null,
                    $container: null,
                    useImgTag: !1,
                    position: "fixed"
                },
                i.initImg() && i.canInitParallax() && i.init()
            }
            css(e, t) {
                return function(e, t) {
                    return "string" == typeof t ? a.getComputedStyle(e).getPropertyValue(t) : (Object.keys(t).forEach((i => {
                        e.style[i] = t[i]
                    }
                    )),
                    e)
                }(e, t)
            }
            extend(e, ...t) {
                return function(e, ...t) {
                    return e = e || {},
                    Object.keys(t).forEach((i => {
                        t[i] && Object.keys(t[i]).forEach((o => {
                            e[o] = t[i][o]
                        }
                        ))
                    }
                    )),
                    e
                }(e, ...t)
            }
            getWindowData() {
                const {width: e, height: t} = u();
                return {
                    width: e,
                    height: t,
                    y: document.documentElement.scrollTop
                }
            }
            initImg() {
                const e = this;
                let t = e.options.imgElement;
                return t && "string" == typeof t && (t = e.$item.querySelector(t)),
                t instanceof Element || (e.options.imgSrc ? (t = new Image,
                t.src = e.options.imgSrc) : t = null),
                t && (e.options.keepImg ? e.image.$item = t.cloneNode(!0) : (e.image.$item = t,
                e.image.$itemParent = t.parentNode),
                e.image.useImgTag = !0),
                !!e.image.$item || (null === e.image.src && (e.image.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7",
                e.image.bgImage = e.css(e.$item, "background-image")),
                !(!e.image.bgImage || "none" === e.image.bgImage))
            }
            canInitParallax() {
                return !this.options.disableParallax()
            }
            init() {
                const e = this
                  , t = {
                    position: "absolute",
                    top: 0,
                    left: 0,
                    width: "100%",
                    height: "100%",
                    overflow: "hidden"
                };
                let i = {
                    pointerEvents: "none",
                    transformStyle: "preserve-3d",
                    backfaceVisibility: "hidden"
                };
                if (!e.options.keepImg) {
                    const t = e.$item.getAttribute("style");
                    if (t && e.$item.setAttribute("data-jarallax-original-styles", t),
                    e.image.useImgTag) {
                        const t = e.image.$item.getAttribute("style");
                        t && e.image.$item.setAttribute("data-jarallax-original-styles", t)
                    }
                }
                if ("static" === e.css(e.$item, "position") && e.css(e.$item, {
                    position: "relative"
                }),
                "auto" === e.css(e.$item, "z-index") && e.css(e.$item, {
                    zIndex: 0
                }),
                e.image.$container = document.createElement("div"),
                e.css(e.image.$container, t),
                e.css(e.image.$container, {
                    "z-index": e.options.zIndex
                }),
                "fixed" === this.image.position && e.css(e.image.$container, {
                    "-webkit-clip-path": "polygon(0 0, 100% 0, 100% 100%, 0 100%)",
                    "clip-path": "polygon(0 0, 100% 0, 100% 100%, 0 100%)"
                }),
                e.image.$container.setAttribute("id", `jarallax-container-${e.instanceID}`),
                e.options.containerClass && e.image.$container.setAttribute("class", e.options.containerClass),
                e.$item.appendChild(e.image.$container),
                e.image.useImgTag ? i = e.extend({
                    "object-fit": e.options.imgSize,
                    "object-position": e.options.imgPosition,
                    "max-width": "none"
                }, t, i) : (e.image.$item = document.createElement("div"),
                e.image.src && (i = e.extend({
                    "background-position": e.options.imgPosition,
                    "background-size": e.options.imgSize,
                    "background-repeat": e.options.imgRepeat,
                    "background-image": e.image.bgImage || `url("${e.image.src}")`
                }, t, i))),
                "opacity" !== e.options.type && "scale" !== e.options.type && "scale-opacity" !== e.options.type && 1 !== e.options.speed || (e.image.position = "absolute"),
                "fixed" === e.image.position) {
                    const t = function(e) {
                        const t = [];
                        for (; null !== e.parentElement; )
                            1 === (e = e.parentElement).nodeType && t.push(e);
                        return t
                    }(e.$item).filter((e => {
                        const t = a.getComputedStyle(e)
                          , i = t["-webkit-transform"] || t["-moz-transform"] || t.transform;
                        return i && "none" !== i || /(auto|scroll)/.test(t.overflow + t["overflow-y"] + t["overflow-x"])
                    }
                    ));
                    e.image.position = t.length ? "absolute" : "fixed"
                }
                var o;
                i.position = e.image.position,
                e.css(e.image.$item, i),
                e.image.$container.appendChild(e.image.$item),
                e.onResize(),
                e.onScroll(!0),
                e.options.onInit && e.options.onInit.call(e),
                "none" !== e.css(e.$item, "background-image") && e.css(e.$item, {
                    "background-image": "none"
                }),
                o = e,
                g.push({
                    instance: o
                }),
                1 === g.length && a.requestAnimationFrame(y),
                h.observe(o.options.elementInViewport || o.$item)
            }
            destroy() {
                const e = this;
                var t;
                t = e,
                g.forEach(( (e, i) => {
                    e.instance.instanceID === t.instanceID && g.splice(i, 1)
                }
                )),
                h.unobserve(t.options.elementInViewport || t.$item);
                const i = e.$item.getAttribute("data-jarallax-original-styles");
                if (e.$item.removeAttribute("data-jarallax-original-styles"),
                i ? e.$item.setAttribute("style", i) : e.$item.removeAttribute("style"),
                e.image.useImgTag) {
                    const t = e.image.$item.getAttribute("data-jarallax-original-styles");
                    e.image.$item.removeAttribute("data-jarallax-original-styles"),
                    t ? e.image.$item.setAttribute("style", i) : e.image.$item.removeAttribute("style"),
                    e.image.$itemParent && e.image.$itemParent.appendChild(e.image.$item)
                }
                e.image.$container && e.image.$container.parentNode.removeChild(e.image.$container),
                e.options.onDestroy && e.options.onDestroy.call(e),
                delete e.$item.jarallax
            }
            coverImage() {
                const e = this
                  , {height: t} = u()
                  , i = e.image.$container.getBoundingClientRect()
                  , o = i.height
                  , {speed: n} = e.options
                  , a = "scroll" === e.options.type || "scroll-opacity" === e.options.type;
                let s = 0
                  , r = o
                  , l = 0;
                return a && (n < 0 ? (s = n * Math.max(o, t),
                t < o && (s -= n * (o - t))) : s = n * (o + t),
                n > 1 ? r = Math.abs(s - t) : n < 0 ? r = s / n + Math.abs(s) : r += (t - o) * (1 - n),
                s /= 2),
                e.parallaxScrollDistance = s,
                l = a ? (t - r) / 2 : (o - r) / 2,
                e.css(e.image.$item, {
                    height: `${r}px`,
                    marginTop: `${l}px`,
                    left: "fixed" === e.image.position ? `${i.left}px` : "0",
                    width: `${i.width}px`
                }),
                e.options.onCoverImage && e.options.onCoverImage.call(e),
                {
                    image: {
                        height: r,
                        marginTop: l
                    },
                    container: i
                }
            }
            isVisible() {
                return this.isElementInViewport || !1
            }
            onScroll(e) {
                const t = this;
                if (!e && !t.isVisible())
                    return;
                const {height: i} = u()
                  , o = t.$item.getBoundingClientRect()
                  , n = o.top
                  , a = o.height
                  , s = {}
                  , r = Math.max(0, n)
                  , l = Math.max(0, a + n)
                  , p = Math.max(0, -n)
                  , d = Math.max(0, n + a - i)
                  , m = Math.max(0, a - (n + a - i))
                  , c = Math.max(0, -n + i - a)
                  , g = 1 - (i - n) / (i + a) * 2;
                let y = 1;
                if (a < i ? y = 1 - (p || d) / a : l <= i ? y = l / i : m <= i && (y = m / i),
                "opacity" !== t.options.type && "scale-opacity" !== t.options.type && "scroll-opacity" !== t.options.type || (s.transform = "translate3d(0,0,0)",
                s.opacity = y),
                "scale" === t.options.type || "scale-opacity" === t.options.type) {
                    let e = 1;
                    t.options.speed < 0 ? e -= t.options.speed * y : e += t.options.speed * (1 - y),
                    s.transform = `scale(${e}) translate3d(0,0,0)`
                }
                if ("scroll" === t.options.type || "scroll-opacity" === t.options.type) {
                    let e = t.parallaxScrollDistance * g;
                    "absolute" === t.image.position && (e -= n),
                    s.transform = `translate3d(0,${e}px,0)`
                }
                t.css(t.image.$item, s),
                t.options.onScroll && t.options.onScroll.call(t, {
                    section: o,
                    beforeTop: r,
                    beforeTopEnd: l,
                    afterTop: p,
                    beforeBottom: d,
                    beforeBottomEnd: m,
                    afterBottom: c,
                    visiblePercent: y,
                    fromViewportCenter: g
                })
            }
            onResize() {
                this.coverImage()
            }
        }
        const $ = function(e, t, ...i) {
            ("object" == typeof HTMLElement ? e instanceof HTMLElement : e && "object" == typeof e && null !== e && 1 === e.nodeType && "string" == typeof e.nodeName) && (e = [e]);
            const o = e.length;
            let n, a = 0;
            for (; a < o; a += 1)
                if ("object" == typeof t || void 0 === t ? e[a].jarallax || (e[a].jarallax = new b(e[a],t)) : e[a].jarallax && (n = e[a].jarallax[t].apply(e[a].jarallax, i)),
                void 0 !== n)
                    return n;
            return e
        };
        $.constructor = b;
        /*!
* Video Worker v2.2.0 (https://github.com/nk-o/video-worker)
* Copyright 2024 nK <https://nkdev.info>
* Licensed under MIT (https://github.com/nk-o/video-worker/blob/master/LICENSE)
*/
        var I = {
            autoplay: !1,
            loop: !1,
            mute: !1,
            volume: 100,
            showControls: !0,
            accessibilityHidden: !1,
            startTime: 0,
            endTime: 0
        };
        let A, x = 0;
        class E {
            type = "none";
            constructor(e, t) {
                const i = this;
                i.url = e,
                i.options_default = {
                    ...I
                },
                i.options = function(e, ...t) {
                    return e = e || {},
                    Object.keys(t).forEach((i => {
                        t[i] && Object.keys(t[i]).forEach((o => {
                            e[o] = t[i][o]
                        }
                        ))
                    }
                    )),
                    e
                }({}, i.options_default, t),
                i.videoID = i.constructor.parseURL(e),
                i.videoID && i.init()
            }
            isValid() {
                return !!this.videoID
            }
            init() {
                const e = this;
                e.ID = x,
                x += 1,
                e.playerID = `VideoWorker-${e.ID}`
            }
            on(e, t) {
                this.userEventsList = this.userEventsList || [],
                (this.userEventsList[e] || (this.userEventsList[e] = [])).push(t)
            }
            off(e, t) {
                this.userEventsList && this.userEventsList[e] && (t ? this.userEventsList[e].forEach(( (i, o) => {
                    i === t && (this.userEventsList[e][o] = !1)
                }
                )) : delete this.userEventsList[e])
            }
            fire(e, ...t) {
                this.userEventsList && void 0 !== this.userEventsList[e] && this.userEventsList[e].forEach((e => {
                    e && e.apply(this, t)
                }
                ))
            }
            static parseURL(e) {
                return !1
            }
            play(e) {}
            pause() {}
            mute() {}
            unmute() {}
            setVolume(e=!1) {}
            getVolume(e) {}
            getMuted(e) {}
            setCurrentTime(e=!1) {}
            getCurrentTime(e) {}
            getImageURL(e) {}
            getVideo(e) {}
        }
        A = "undefined" != typeof window ? window : void 0 !== i.g ? i.g : "undefined" != typeof self ? self : {};
        var V = A;
        function w() {
            this.doneCallbacks = [],
            this.failCallbacks = []
        }
        w.prototype = {
            execute(e, t) {
                let i = e.length;
                for (t = Array.prototype.slice.call(t); i; )
                    i -= 1,
                    e[i].apply(null, t)
            },
            resolve(...e) {
                this.execute(this.doneCallbacks, e)
            },
            reject(...e) {
                this.execute(this.failCallbacks, e)
            },
            done(e) {
                this.doneCallbacks.push(e)
            },
            fail(e) {
                this.failCallbacks.push(e)
            }
        };
        let T = 0
          , C = 0;
        const L = new w;
        let P = 0
          , k = 0;
        const S = new w;
        function j(e, t) {
            let i = !1;
            return Object.keys(j.providers).forEach((o => {
                !i && j.providers[o].parseURL(e) && (i = new j.providers[o](e,t))
            }
            )),
            i || new E(e,t)
        }
        j.BaseClass = E,
        j.providers = {
            Youtube: class extends E {
                type = "youtube";
                static parseURL(e) {
                    const t = e.match(/.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|shorts\/|watch\?v=)([^#\&\?]*).*/);
                    return !(!t || 11 !== t[1].length) && t[1]
                }
                init() {
                    super.init(),
                    function() {
                        if (T)
                            return;
                        T = !0;
                        let e = document.createElement("script")
                          , t = document.getElementsByTagName("head")[0];
                        e.src = "https://www.youtube.com/iframe_api",
                        t.appendChild(e),
                        t = null,
                        e = null
                    }()
                }
                play(e) {
                    const t = this;
                    t.player && t.player.playVideo && (void 0 !== e && t.player.seekTo(e || 0),
                    V.YT.PlayerState.PLAYING !== t.player.getPlayerState() && (t.options.endTime && !t.options.loop ? t.getCurrentTime((e => {
                        e < t.options.endTime && t.player.playVideo()
                    }
                    )) : t.player.playVideo()))
                }
                pause() {
                    const e = this;
                    e.player && e.player.pauseVideo && V.YT.PlayerState.PLAYING === e.player.getPlayerState() && e.player.pauseVideo()
                }
                mute() {
                    const e = this;
                    e.player && e.player.mute && e.player.mute()
                }
                unmute() {
                    const e = this;
                    e.player && e.player.unMute && e.player.unMute()
                }
                setVolume(e=!1) {
                    const t = this;
                    t.player && "number" == typeof e && t.player.setVolume && t.player.setVolume(e)
                }
                getVolume(e) {
                    const t = this;
                    t.player ? t.player.getVolume && e(t.player.getVolume()) : e(!1)
                }
                getMuted(e) {
                    const t = this;
                    t.player ? t.player.isMuted && e(t.player.isMuted()) : e(null)
                }
                setCurrentTime(e=!1) {
                    const t = this;
                    t.player && "number" == typeof e && t.player.seekTo && t.player.seekTo(e)
                }
                getCurrentTime(e) {
                    const t = this;
                    t.player && t.player.getCurrentTime && e(t.player.getCurrentTime())
                }
                getImageURL(e) {
                    const t = this;
                    if (t.videoImage)
                        return void e(t.videoImage);
                    const i = ["maxresdefault", "sddefault", "hqdefault", "0"];
                    let o = 0;
                    const n = new Image;
                    n.onload = function() {
                        120 !== (this.naturalWidth || this.width) || o === i.length - 1 ? (t.videoImage = `https://img.youtube.com/vi/${t.videoID}/${i[o]}.jpg`,
                        e(t.videoImage)) : (o += 1,
                        this.src = `https://img.youtube.com/vi/${t.videoID}/${i[o]}.jpg`)
                    }
                    ,
                    n.src = `https://img.youtube.com/vi/${t.videoID}/${i[o]}.jpg`
                }
                getVideo(e) {
                    const t = this;
                    t.$video ? e(t.$video) : function(e) {
                        void 0 !== V.YT && 0 !== V.YT.loaded || C ? "object" == typeof V.YT && 1 === V.YT.loaded ? e() : L.done(( () => {
                            e()
                        }
                        )) : (C = 1,
                        V.onYouTubeIframeAPIReady = function() {
                            V.onYouTubeIframeAPIReady = null,
                            L.resolve("done"),
                            e()
                        }
                        )
                    }(( () => {
                        let i, o, n;
                        t.$video || (i = document.createElement("div"),
                        i.style.display = "none"),
                        t.playerOptions = {
                            host: "https://www.youtube-nocookie.com",
                            videoId: t.videoID,
                            playerVars: {
                                autohide: 1,
                                rel: 0,
                                autoplay: 0,
                                playsinline: 1
                            }
                        },
                        t.options.showControls || (t.playerOptions.playerVars.iv_load_policy = 3,
                        t.playerOptions.playerVars.modestbranding = 1,
                        t.playerOptions.playerVars.controls = 0,
                        t.playerOptions.playerVars.showinfo = 0,
                        t.playerOptions.playerVars.disablekb = 1),
                        t.playerOptions.events = {
                            onReady(e) {
                                if (t.options.mute ? e.target.mute() : "number" == typeof t.options.volume && e.target.setVolume(t.options.volume),
                                t.options.autoplay && t.play(t.options.startTime),
                                t.fire("ready", e),
                                t.options.loop && !t.options.endTime) {
                                    const e = .1;
                                    t.options.endTime = t.player.getDuration() - e
                                }
                                setInterval(( () => {
                                    t.getVolume((i => {
                                        t.options.volume !== i && (t.options.volume = i,
                                        t.fire("volumechange", e))
                                    }
                                    ))
                                }
                                ), 150)
                            },
                            onStateChange(e) {
                                t.options.loop && e.data === V.YT.PlayerState.ENDED && t.play(t.options.startTime),
                                o || e.data !== V.YT.PlayerState.PLAYING || (o = 1,
                                t.fire("started", e)),
                                e.data === V.YT.PlayerState.PLAYING && t.fire("play", e),
                                e.data === V.YT.PlayerState.PAUSED && t.fire("pause", e),
                                e.data === V.YT.PlayerState.ENDED && t.fire("ended", e),
                                e.data === V.YT.PlayerState.PLAYING ? n = setInterval(( () => {
                                    t.fire("timeupdate", e),
                                    t.options.endTime && t.player.getCurrentTime() >= t.options.endTime && (t.options.loop ? t.play(t.options.startTime) : t.pause())
                                }
                                ), 150) : clearInterval(n)
                            },
                            onError(e) {
                                t.fire("error", e)
                            }
                        };
                        const a = !t.$video;
                        if (a) {
                            const e = document.createElement("div");
                            e.setAttribute("id", t.playerID),
                            i.appendChild(e),
                            document.body.appendChild(i)
                        }
                        t.player = t.player || new V.YT.Player(t.playerID,t.playerOptions),
                        a && (t.$video = document.getElementById(t.playerID),
                        t.options.accessibilityHidden && (t.$video.setAttribute("tabindex", "-1"),
                        t.$video.setAttribute("aria-hidden", "true")),
                        t.videoWidth = parseInt(t.$video.getAttribute("width"), 10) || 1280,
                        t.videoHeight = parseInt(t.$video.getAttribute("height"), 10) || 720),
                        e(t.$video)
                    }
                    ))
                }
            }
            ,
            Vimeo: class extends E {
                type = "vimeo";
                static parseURL(e) {
                    const t = e.match(/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/);
                    return !(!t || !t[3]) && t[3]
                }
                static parseURLHash(e) {
                    const t = e.match(/^.*(vimeo.com\/|video\/)(\d+)(\?.*&*h=|\/)+([\d,a-f]+)/);
                    return t && 5 === t.length ? t[4] : null
                }
                init() {
                    super.init(),
                    function() {
                        if (P)
                            return;
                        if (P = !0,
                        void 0 !== V.Vimeo)
                            return;
                        let e = document.createElement("script")
                          , t = document.getElementsByTagName("head")[0];
                        e.src = "https://player.vimeo.com/api/player.js",
                        t.appendChild(e),
                        t = null,
                        e = null
                    }()
                }
                play(e) {
                    const t = this;
                    t.player && (void 0 !== e && t.player.setCurrentTime(e),
                    t.player.getPaused().then((e => {
                        e && (t.options.endTime && !t.options.loop ? t.getCurrentTime((e => {
                            e < t.options.endTime && t.player.play()
                        }
                        )) : t.player.play())
                    }
                    )))
                }
                pause() {
                    const e = this;
                    e.player && e.player.getPaused().then((t => {
                        t || e.player.pause()
                    }
                    ))
                }
                mute() {
                    const e = this;
                    e.player && e.player.setVolume && e.setVolume(0)
                }
                unmute() {
                    const e = this;
                    e.player && e.player.setVolume && e.setVolume(e.options.volume || 100)
                }
                setVolume(e=!1) {
                    const t = this;
                    t.player && "number" == typeof e && t.player.setVolume && t.player.setVolume(e / 100)
                }
                getVolume(e) {
                    const t = this;
                    t.player ? t.player.getVolume && t.player.getVolume().then((t => {
                        e(100 * t)
                    }
                    )) : e(!1)
                }
                getMuted(e) {
                    const t = this;
                    t.player ? t.player.getVolume && t.player.getVolume().then((t => {
                        e(!!t)
                    }
                    )) : e(null)
                }
                setCurrentTime(e=!1) {
                    const t = this;
                    t.player && "number" == typeof e && t.player.setCurrentTime && t.player.setCurrentTime(e)
                }
                getCurrentTime(e) {
                    const t = this;
                    t.player && t.player.getCurrentTime && t.player.getCurrentTime().then((t => {
                        e(t)
                    }
                    ))
                }
                getImageURL(e) {
                    const t = this;
                    if (t.videoImage)
                        return void e(t.videoImage);
                    let i = V.innerWidth || 1920;
                    V.devicePixelRatio && (i *= V.devicePixelRatio),
                    i = Math.min(i, 1920);
                    let o = new XMLHttpRequest;
                    o.open("GET", `https://vimeo.com/api/oembed.json?url=${t.url}&width=${i}`, !0),
                    o.onreadystatechange = function() {
                        if (4 === this.readyState && this.status >= 200 && this.status < 400) {
                            const i = JSON.parse(this.responseText);
                            i.thumbnail_url && (t.videoImage = i.thumbnail_url,
                            e(t.videoImage))
                        }
                    }
                    ,
                    o.send(),
                    o = null
                }
                getVideo(e) {
                    const t = this;
                    t.$video ? e(t.$video) : function(e) {
                        if (void 0 !== V.Vimeo || k)
                            void 0 !== V.Vimeo ? e() : S.done(( () => {
                                e()
                            }
                            ));
                        else {
                            k = 1;
                            const t = setInterval(( () => {
                                void 0 !== V.Vimeo && (clearInterval(t),
                                S.resolve("done"),
                                e())
                            }
                            ), 20)
                        }
                    }(( () => {
                        let i;
                        t.$video || (i = document.createElement("div"),
                        i.style.display = "none"),
                        t.playerOptions = {
                            dnt: 1,
                            id: t.videoID,
                            autopause: 0,
                            transparent: 0,
                            autoplay: t.options.autoplay ? 1 : 0,
                            loop: t.options.loop ? 1 : 0,
                            muted: t.options.mute || 0 === t.options.volume ? 1 : 0
                        };
                        const o = t.constructor.parseURLHash(t.url);
                        if (o && (t.playerOptions.h = o),
                        t.options.showControls || (t.playerOptions.controls = 0),
                        !t.options.showControls && t.options.loop && t.options.autoplay && (t.playerOptions.background = 1),
                        !t.$video) {
                            let e = "";
                            Object.keys(t.playerOptions).forEach((i => {
                                "" !== e && (e += "&"),
                                e += `${i}=${encodeURIComponent(t.playerOptions[i])}`
                            }
                            )),
                            t.$video = document.createElement("iframe"),
                            t.$video.setAttribute("id", t.playerID),
                            t.$video.setAttribute("src", `https://player.vimeo.com/video/${t.videoID}?${e}`),
                            t.$video.setAttribute("frameborder", "0"),
                            t.$video.setAttribute("mozallowfullscreen", ""),
                            t.$video.setAttribute("allowfullscreen", ""),
                            t.$video.setAttribute("title", "Vimeo video player"),
                            t.options.accessibilityHidden && (t.$video.setAttribute("tabindex", "-1"),
                            t.$video.setAttribute("aria-hidden", "true")),
                            i.appendChild(t.$video),
                            document.body.appendChild(i)
                        }
                        let n;
                        t.player = t.player || new V.Vimeo.Player(t.$video,t.playerOptions),
                        t.options.mute || "number" != typeof t.options.volume || t.setVolume(t.options.volume),
                        t.options.startTime && t.options.autoplay && t.player.setCurrentTime(t.options.startTime),
                        t.player.getVideoWidth().then((e => {
                            t.videoWidth = e || 1280
                        }
                        )),
                        t.player.getVideoHeight().then((e => {
                            t.videoHeight = e || 720
                        }
                        )),
                        t.player.on("timeupdate", (e => {
                            n || (t.fire("started", e),
                            n = 1),
                            t.fire("timeupdate", e),
                            t.options.endTime && e.seconds >= t.options.endTime && (t.options.loop ? t.play(t.options.startTime) : t.pause())
                        }
                        )),
                        t.player.on("play", (e => {
                            t.fire("play", e),
                            t.options.startTime && 0 === e.seconds && t.play(t.options.startTime)
                        }
                        )),
                        t.player.on("pause", (e => {
                            t.fire("pause", e)
                        }
                        )),
                        t.player.on("ended", (e => {
                            t.fire("ended", e)
                        }
                        )),
                        t.player.on("loaded", (e => {
                            t.fire("ready", e)
                        }
                        )),
                        t.player.on("volumechange", (e => {
                            t.getVolume((e => {
                                t.options.volume = e
                            }
                            )),
                            t.fire("volumechange", e)
                        }
                        )),
                        t.player.on("error", (e => {
                            t.fire("error", e)
                        }
                        )),
                        e(t.$video)
                    }
                    ))
                }
            }
            ,
            Local: class extends E {
                type = "local";
                static parseURL(e) {
                    const t = e.split(/,(?=mp4\:|webm\:|ogv\:|ogg\:)/)
                      , i = {};
                    let o = 0;
                    return t.forEach((e => {
                        const t = e.match(/^(mp4|webm|ogv|ogg)\:(.*)/);
                        t && t[1] && t[2] && (i["ogv" === t[1] ? "ogg" : t[1]] = t[2],
                        o = 1)
                    }
                    )),
                    !!o && i
                }
                play(e) {
                    const t = this;
                    t.player && (void 0 !== e && (t.player.currentTime = e),
                    t.player.paused && (t.options.endTime && !t.options.loop ? t.getCurrentTime((e => {
                        e < t.options.endTime && t.player.play()
                    }
                    )) : t.player.play()))
                }
                pause() {
                    const e = this;
                    e.player && !e.player.paused && e.player.pause()
                }
                mute() {
                    this.player && (this.$video.muted = !0)
                }
                unmute() {
                    this.player && (this.$video.muted = !1)
                }
                setVolume(e=!1) {
                    this.player && "number" == typeof e && (this.$video.volume = e / 100)
                }
                getVolume(e) {
                    this.player ? e(100 * this.$video.volume) : e(!1)
                }
                getMuted(e) {
                    this.player ? e(this.$video.muted) : e(null)
                }
                setCurrentTime(e=!1) {
                    this.player && "number" == typeof e && (this.$video.currentTime = e)
                }
                getCurrentTime(e) {
                    this.player && e(this.player.currentTime)
                }
                getImageURL(e) {
                    const t = this;
                    t.videoImage && e(t.videoImage)
                }
                getVideo(e) {
                    const t = this;
                    if (t.$video)
                        return void e(t.$video);
                    let i, o;
                    t.$video || (i = document.createElement("div"),
                    i.style.display = "none"),
                    t.$video || (t.$video = document.createElement("video"),
                    t.player = t.$video,
                    t.options.showControls && (t.$video.controls = !0),
                    "number" == typeof t.options.volume && t.setVolume(t.options.volume),
                    t.options.mute && t.mute(),
                    t.options.loop && (t.$video.loop = !0),
                    t.$video.setAttribute("playsinline", ""),
                    t.$video.setAttribute("webkit-playsinline", ""),
                    t.options.accessibilityHidden && (t.$video.setAttribute("tabindex", "-1"),
                    t.$video.setAttribute("aria-hidden", "true")),
                    t.$video.setAttribute("id", t.playerID),
                    i.appendChild(t.$video),
                    document.body.appendChild(i),
                    Object.keys(t.videoID).forEach((e => {
                        !function(e, t, i) {
                            const o = document.createElement("source");
                            o.src = t,
                            o.type = i,
                            e.appendChild(o)
                        }(t.$video, t.videoID[e], `video/${e}`)
                    }
                    ))),
                    t.player.addEventListener("playing", (e => {
                        o || t.fire("started", e),
                        o = 1
                    }
                    )),
                    t.player.addEventListener("timeupdate", (function(e) {
                        t.fire("timeupdate", e),
                        t.options.endTime && this.currentTime >= t.options.endTime && (t.options.loop ? t.play(t.options.startTime) : t.pause())
                    }
                    )),
                    t.player.addEventListener("play", (e => {
                        t.fire("play", e)
                    }
                    )),
                    t.player.addEventListener("pause", (e => {
                        t.fire("pause", e)
                    }
                    )),
                    t.player.addEventListener("ended", (e => {
                        t.fire("ended", e)
                    }
                    )),
                    t.player.addEventListener("loadedmetadata", (function() {
                        t.videoWidth = this.videoWidth || 1280,
                        t.videoHeight = this.videoHeight || 720,
                        t.fire("ready"),
                        t.options.autoplay && t.play(t.options.startTime)
                    }
                    )),
                    t.player.addEventListener("volumechange", (e => {
                        t.getVolume((e => {
                            t.options.volume = e
                        }
                        )),
                        t.fire("volumechange", e)
                    }
                    )),
                    t.player.addEventListener("error", (e => {
                        t.fire("error", e)
                    }
                    )),
                    e(t.$video)
                }
            }
        };
        const R = $
          , D = function() {
            return function(e=a.jarallax) {
                if (void 0 === e)
                    return;
                const t = e.constructor
                  , i = t.prototype.onScroll;
                t.prototype.onScroll = function() {
                    const e = this;
                    i.apply(e),
                    !e.isVideoInserted && e.video && (!e.options.videoLazyLoading || e.isElementInViewport) && !e.options.disableVideo() && (e.isVideoInserted = !0,
                    e.video.getVideo((t => {
                        const i = t.parentNode;
                        e.css(t, {
                            position: e.image.position,
                            top: "0px",
                            left: "0px",
                            right: "0px",
                            bottom: "0px",
                            width: "100%",
                            height: "100%",
                            maxWidth: "none",
                            maxHeight: "none",
                            pointerEvents: "none",
                            transformStyle: "preserve-3d",
                            backfaceVisibility: "hidden",
                            margin: 0,
                            zIndex: -1
                        }),
                        e.$video = t,
                        "local" === e.video.type && (e.image.src ? e.$video.setAttribute("poster", e.image.src) : e.image.$item && "IMG" === e.image.$item.tagName && e.image.$item.src && e.$video.setAttribute("poster", e.image.$item.src)),
                        e.options.videoClass && e.$video.setAttribute("class", `${e.options.videoClass} ${e.options.videoClass}-${e.video.type}`),
                        e.image.$container.appendChild(t),
                        i.parentNode.removeChild(i),
                        e.options.onVideoInsert && e.options.onVideoInsert.call(e)
                    }
                    )))
                }
                ;
                const o = t.prototype.coverImage;
                t.prototype.coverImage = function() {
                    const e = this
                      , t = o.apply(e)
                      , i = !!e.image.$item && e.image.$item.nodeName;
                    if (t && e.video && i && ("IFRAME" === i || "VIDEO" === i)) {
                        let o = t.image.height
                          , n = o * e.image.width / e.image.height
                          , a = (t.container.width - n) / 2
                          , s = t.image.marginTop;
                        t.container.width > n && (n = t.container.width,
                        o = n * e.image.height / e.image.width,
                        a = 0,
                        s += (t.image.height - o) / 2),
                        "IFRAME" === i && (o += 400,
                        s -= 200),
                        e.css(e.$video, {
                            width: `${n}px`,
                            marginLeft: `${a}px`,
                            height: `${o}px`,
                            marginTop: `${s}px`
                        })
                    }
                    return t
                }
                ;
                const n = t.prototype.initImg;
                t.prototype.initImg = function() {
                    const e = this
                      , t = n.apply(e);
                    return e.options.videoSrc || (e.options.videoSrc = e.$item.getAttribute("data-jarallax-video") || null),
                    e.options.videoSrc ? (e.defaultInitImgResult = t,
                    !0) : t
                }
                ;
                const s = t.prototype.canInitParallax;
                t.prototype.canInitParallax = function() {
                    const e = this;
                    let t = s.apply(e);
                    if (!e.options.videoSrc)
                        return t;
                    const i = new j(e.options.videoSrc,{
                        autoplay: !0,
                        loop: e.options.videoLoop,
                        showControls: !1,
                        accessibilityHidden: !0,
                        startTime: e.options.videoStartTime || 0,
                        endTime: e.options.videoEndTime || 0,
                        mute: !e.options.videoVolume,
                        volume: e.options.videoVolume || 0
                    });
                    function o() {
                        e.image.$default_item && (e.image.$item = e.image.$default_item,
                        e.image.$item.style.display = "block",
                        e.coverImage(),
                        e.onScroll())
                    }
                    if (e.options.onVideoWorkerInit && e.options.onVideoWorkerInit.call(e, i),
                    i.isValid())
                        if (this.options.disableParallax() && (t = !0,
                        e.image.position = "absolute",
                        e.options.type = "scroll",
                        e.options.speed = 1),
                        t) {
                            if (i.on("ready", ( () => {
                                if (e.options.videoPlayOnlyVisible) {
                                    const t = e.onScroll;
                                    e.onScroll = function() {
                                        t.apply(e),
                                        e.videoError || !e.options.videoLoop && (e.options.videoLoop || e.videoEnded) || (e.isVisible() ? i.play() : i.pause())
                                    }
                                } else
                                    i.play()
                            }
                            )),
                            i.on("started", ( () => {
                                e.image.$default_item = e.image.$item,
                                e.image.$item = e.$video,
                                e.image.width = e.video.videoWidth || 1280,
                                e.image.height = e.video.videoHeight || 720,
                                e.coverImage(),
                                e.onScroll(),
                                e.image.$default_item && (e.image.$default_item.style.display = "none")
                            }
                            )),
                            i.on("ended", ( () => {
                                e.videoEnded = !0,
                                e.options.videoLoop || o()
                            }
                            )),
                            i.on("error", ( () => {
                                e.videoError = !0,
                                o()
                            }
                            )),
                            e.video = i,
                            !e.defaultInitImgResult && (e.image.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7",
                            "local" !== i.type))
                                return i.getImageURL((t => {
                                    e.image.bgImage = `url("${t}")`,
                                    e.init()
                                }
                                )),
                                !1
                        } else
                            e.defaultInitImgResult || i.getImageURL((t => {
                                const i = e.$item.getAttribute("style");
                                i && e.$item.setAttribute("data-jarallax-original-styles", i),
                                e.css(e.$item, {
                                    "background-image": `url("${t}")`,
                                    "background-position": "center",
                                    "background-size": "cover"
                                })
                            }
                            ));
                    return t
                }
                ;
                const r = t.prototype.destroy;
                t.prototype.destroy = function() {
                    const e = this;
                    e.image.$default_item && (e.image.$item = e.image.$default_item,
                    delete e.image.$default_item),
                    r.apply(e)
                }
            }(R)
        }
    }
}]);
