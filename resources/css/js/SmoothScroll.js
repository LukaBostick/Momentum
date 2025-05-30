!(function () {
    var e,
        t,
        o,
        n,
        r = {
            frameRate: 150,
            animationTime: 400,
            stepSize: 100,
            pulseAlgorithm: !0,
            pulseScale: 4,
            pulseNormalize: 1,
            accelerationDelta: 50,
            accelerationMax: 3,
            keyboardSupport: !0,
            arrowScroll: 50,
            fixedBackground: !0,
            excluded: "",
        },
        a = r,
        l = !1,
        i = !1,
        c = { x: 0, y: 0 },
        u = !1,
        s = document.documentElement,
        d = [],
        f = /^Mac/.test(navigator.platform),
        m = {
            left: 37,
            up: 38,
            right: 39,
            down: 40,
            spacebar: 32,
            pageup: 33,
            pagedown: 34,
            end: 35,
            home: 36,
        },
        h = { 37: 1, 38: 1, 39: 1, 40: 1 };
    function w() {
        if (!u && document.body) {
            u = !0;
            var n = document.body,
                r = document.documentElement,
                c = window.innerHeight,
                d = n.scrollHeight;
            if (
                ((s = document.compatMode.indexOf("CSS") >= 0 ? r : n),
                (e = n),
                a.keyboardSupport && A("keydown", S),
                top != self)
            )
                i = !0;
            else if (
                Z &&
                d > c &&
                (n.offsetHeight <= c || r.offsetHeight <= c)
            ) {
                var f,
                    m = document.createElement("div");
                (m.style.cssText =
                    "position:absolute; z-index:-10000; top:0; left:0; right:0; height:" +
                    s.scrollHeight +
                    "px"),
                    document.body.appendChild(m),
                    (o = function () {
                        f ||
                            (f = setTimeout(function () {
                                l ||
                                    ((m.style.height = "0"),
                                    (m.style.height = s.scrollHeight + "px"),
                                    (f = null));
                            }, 500));
                    }),
                    setTimeout(o, 10),
                    A("resize", o);
                if (
                    ((t = new q(o)).observe(n, {
                        attributes: !0,
                        childList: !0,
                        characterData: !1,
                    }),
                    s.offsetHeight <= c)
                ) {
                    var h = document.createElement("div");
                    (h.style.clear = "both"), n.appendChild(h);
                }
            }
            a.fixedBackground ||
                l ||
                ((n.style.backgroundAttachment = "scroll"),
                (r.style.backgroundAttachment = "scroll"));
        }
    }
    var p = [],
        v = !1,
        y = Date.now();
    function b(e, t, o) {
        var n, r;
        if (
            ((n = (n = t) > 0 ? 1 : -1),
            (r = (r = o) > 0 ? 1 : -1),
            (c.x !== n || c.y !== r) &&
                ((c.x = n), (c.y = r), (p = []), (y = 0)),
            1 != a.accelerationMax)
        ) {
            var l = Date.now() - y;
            if (l < a.accelerationDelta) {
                var i = (1 + 50 / l) / 2;
                i > 1 &&
                    ((i = Math.min(i, a.accelerationMax)), (t *= i), (o *= i));
            }
            y = Date.now();
        }
        if (
            (p.push({
                x: t,
                y: o,
                lastX: t < 0 ? 0.99 : -0.99,
                lastY: o < 0 ? 0.99 : -0.99,
                start: Date.now(),
            }),
            !v)
        ) {
            var u = V(),
                s = e === u || e === document.body;
            null == e.$scrollBehavior &&
                (function (e) {
                    var t = M(e);
                    if (null == B[t]) {
                        var o = getComputedStyle(e, "")["scroll-behavior"];
                        B[t] = "smooth" == o;
                    }
                    return B[t];
                })(e) &&
                ((e.$scrollBehavior = e.style.scrollBehavior),
                (e.style.scrollBehavior = "auto"));
            var d = function (n) {
                for (
                    var r = Date.now(), l = 0, i = 0, c = 0;
                    c < p.length;
                    c++
                ) {
                    var u = p[c],
                        f = r - u.start,
                        m = f >= a.animationTime,
                        h = m ? 1 : f / a.animationTime;
                    a.pulseAlgorithm && (h = I(h));
                    var w = (u.x * h - u.lastX) >> 0,
                        y = (u.y * h - u.lastY) >> 0;
                    (l += w),
                        (i += y),
                        (u.lastX += w),
                        (u.lastY += y),
                        m && (p.splice(c, 1), c--);
                }
                s
                    ? window.scrollBy(l, i)
                    : (l && (e.scrollLeft += l), i && (e.scrollTop += i)),
                    t || o || (p = []),
                    p.length
                        ? R(d, e, 1e3 / a.frameRate + 1)
                        : ((v = !1),
                          null != e.$scrollBehavior &&
                              ((e.style.scrollBehavior = e.$scrollBehavior),
                              (e.$scrollBehavior = null)));
            };
            R(d, e, 0), (v = !0);
        }
    }
    function g(t) {
        u || w();
        var o = t.target;
        if (t.defaultPrevented || t.ctrlKey) return !0;
        if (
            K(e, "embed") ||
            (K(o, "embed") && /\.pdf/i.test(o.src)) ||
            K(e, "object") ||
            o.shadowRoot
        )
            return !0;
        var r = -t.wheelDeltaX || t.deltaX || 0,
            l = -t.wheelDeltaY || t.deltaY || 0;
        f &&
            (t.wheelDeltaX &&
                P(t.wheelDeltaX, 120) &&
                (r = (t.wheelDeltaX / Math.abs(t.wheelDeltaX)) * -120),
            t.wheelDeltaY &&
                P(t.wheelDeltaY, 120) &&
                (l = (t.wheelDeltaY / Math.abs(t.wheelDeltaY)) * -120)),
            r || l || (l = -t.wheelDelta || 0),
            1 === t.deltaMode && ((r *= 40), (l *= 40));
        var c = L(o);
        return c
            ? !!(function (e) {
                  if (!e) return;
                  d.length || (d = [e, e, e]);
                  (e = Math.abs(e)),
                      d.push(e),
                      d.shift(),
                      clearTimeout(n),
                      (n = setTimeout(function () {
                          try {
                              localStorage.SS_deltaBuffer = d.join(",");
                          } catch (e) {}
                      }, 1e3));
                  var t = e > 120 && $(e);
                  return !$(120) && !$(100) && !t;
              })(l) ||
                  (Math.abs(r) > 1.2 && (r *= a.stepSize / 120),
                  Math.abs(l) > 1.2 && (l *= a.stepSize / 120),
                  b(c, r, l),
                  t.preventDefault(),
                  void C())
            : !i ||
                  !U ||
                  (Object.defineProperty(t, "target", {
                      value: window.frameElement,
                  }),
                  parent.wheel(t));
    }
    function S(t) {
        var o = t.target,
            n =
                t.ctrlKey ||
                t.altKey ||
                t.metaKey ||
                (t.shiftKey && t.keyCode !== m.spacebar);
        document.body.contains(e) || (e = document.activeElement);
        var r = /^(button|submit|radio|checkbox|file|color|image)$/i;
        if (
            t.defaultPrevented ||
            /^(textarea|select|embed|object)$/i.test(o.nodeName) ||
            (K(o, "input") && !r.test(o.type)) ||
            K(e, "video") ||
            (function (e) {
                var t = e.target,
                    o = !1;
                if (-1 != document.URL.indexOf("www.youtube.com/watch"))
                    do {
                        if (
                            (o =
                                t.classList &&
                                t.classList.contains("html5-video-controls"))
                        )
                            break;
                    } while ((t = t.parentNode));
                return o;
            })(t) ||
            o.isContentEditable ||
            n
        )
            return !0;
        if (
            (K(o, "button") || (K(o, "input") && r.test(o.type))) &&
            t.keyCode === m.spacebar
        )
            return !0;
        if (K(o, "input") && "radio" == o.type && h[t.keyCode]) return !0;
        var l = 0,
            c = 0,
            u = L(e);
        if (!u) return !i || !U || parent.keydown(t);
        var s = u.clientHeight;
        switch ((u == document.body && (s = window.innerHeight), t.keyCode)) {
            case m.up:
                c = -a.arrowScroll;
                break;
            case m.down:
                c = a.arrowScroll;
                break;
            case m.spacebar:
                c = -(t.shiftKey ? 1 : -1) * s * 0.9;
                break;
            case m.pageup:
                c = 0.9 * -s;
                break;
            case m.pagedown:
                c = 0.9 * s;
                break;
            case m.home:
                u == document.body &&
                    document.scrollingElement &&
                    (u = document.scrollingElement),
                    (c = -u.scrollTop);
                break;
            case m.end:
                var d = u.scrollHeight - u.scrollTop - s;
                c = d > 0 ? d + 10 : 0;
                break;
            case m.left:
                l = -a.arrowScroll;
                break;
            case m.right:
                l = a.arrowScroll;
                break;
            default:
                return !0;
        }
        b(u, l, c), t.preventDefault(), C();
    }
    function x(t) {
        e = t.target;
    }
    var k,
        D,
        M =
            ((k = 0),
            function (e) {
                return e.uniqueID || (e.uniqueID = k++);
            }),
        E = {},
        T = {},
        B = {};
    function C() {
        clearTimeout(D),
            (D = setInterval(function () {
                E = T = B = {};
            }, 1e3));
    }
    function H(e, t, o) {
        for (var n = o ? E : T, r = e.length; r--; ) n[M(e[r])] = t;
        return t;
    }
    function z(e, t) {
        return (t ? E : T)[M(e)];
    }
    function L(e) {
        var t = [],
            o = document.body,
            n = s.scrollHeight;
        do {
            var r = z(e, !1);
            if (r) return H(t, r);
            if ((t.push(e), n === e.scrollHeight)) {
                var a = (X(s) && X(o)) || Y(s);
                if ((i && O(s)) || (!i && a)) return H(t, V());
            } else if (O(e) && Y(e)) return H(t, e);
        } while ((e = e.parentElement));
    }
    function O(e) {
        return e.clientHeight + 10 < e.scrollHeight;
    }
    function X(e) {
        return (
            "hidden" !== getComputedStyle(e, "").getPropertyValue("overflow-y")
        );
    }
    function Y(e) {
        var t = getComputedStyle(e, "").getPropertyValue("overflow-y");
        return "scroll" === t || "auto" === t;
    }
    function A(e, t, o) {
        window.addEventListener(e, t, o || !1);
    }
    function N(e, t, o) {
        window.removeEventListener(e, t, o || !1);
    }
    function K(e, t) {
        return e && (e.nodeName || "").toLowerCase() === t.toLowerCase();
    }
    if (window.localStorage && localStorage.SS_deltaBuffer)
        try {
            d = localStorage.SS_deltaBuffer.split(",");
        } catch (e) {}
    function P(e, t) {
        return Math.floor(e / t) == e / t;
    }
    function $(e) {
        return P(d[0], e) && P(d[1], e) && P(d[2], e);
    }
    var j,
        R =
            window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            function (e, t, o) {
                window.setTimeout(e, o || 1e3 / 60);
            },
        q =
            window.MutationObserver ||
            window.WebKitMutationObserver ||
            window.MozMutationObserver,
        V =
            ((j = document.scrollingElement),
            function () {
                if (!j) {
                    var e = document.createElement("div");
                    (e.style.cssText = "height:10000px;width:1px;"),
                        document.body.appendChild(e);
                    var t = document.body.scrollTop;
                    document.documentElement.scrollTop,
                        window.scrollBy(0, 3),
                        (j =
                            document.body.scrollTop != t
                                ? document.body
                                : document.documentElement),
                        window.scrollBy(0, -3),
                        document.body.removeChild(e);
                }
                return j;
            });
    function F(e) {
        var t, o;
        return (
            (e *= a.pulseScale) < 1
                ? (t = e - (1 - Math.exp(-e)))
                : ((e -= 1),
                  (t = (o = Math.exp(-1)) + (1 - Math.exp(-e)) * (1 - o))),
            t * a.pulseNormalize
        );
    }
    function I(e) {
        return e >= 1
            ? 1
            : e <= 0
              ? 0
              : (1 == a.pulseNormalize && (a.pulseNormalize /= F(1)), F(e));
    }
    var _ = window.navigator.userAgent,
        W = /Edge/.test(_),
        U = /chrome/i.test(_) && !W,
        G = /safari/i.test(_) && !W,
        J = /mobile/i.test(_),
        Q = /Windows NT 6.1/i.test(_) && /rv:11/i.test(_),
        Z = G && (/Version\/8/i.test(_) || /Version\/9/i.test(_)),
        ee = (U || G || Q) && !J,
        te = !1;
    try {
        window.addEventListener(
            "test",
            null,
            Object.defineProperty({}, "passive", {
                get: function () {
                    te = !0;
                },
            }),
        );
    } catch (e) {}
    var oe = !!te && { passive: !1 },
        ne =
            "onwheel" in document.createElement("div") ? "wheel" : "mousewheel";
    function re(e) {
        for (var t in e) r.hasOwnProperty(t) && (a[t] = e[t]);
    }
    ne && ee && (A(ne, g, oe), A("mousedown", x), A("load", w)),
        (re.destroy = function () {
            t && t.disconnect(),
                N(ne, g),
                N("mousedown", x),
                N("keydown", S),
                N("resize", o),
                N("load", w);
        }),
        window.SmoothScrollOptions && re(window.SmoothScrollOptions),
        "function" == typeof define && define.amd
            ? define(function () {
                  return re;
              })
            : "object" == typeof exports
              ? (module.exports = re)
              : (window.SmoothScroll = re);
})();
