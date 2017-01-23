(function(b, e) {
    "function" === typeof define && define.amd ? define([], e(b)) : "object" === typeof exports ? module.exports = e(b) : b.sS = e(b)
})("undefined" !== typeof global ? global : this.window || this.global, function(b) {
    var e = {},
        y = !!b.document.querySelector && !!b.addEventListener,
        k, m, l, n, w = {
            offset: 0,
            cB: function() {},
            cA: function() {}
        },
        p = function(a, b, d) {
            if ("[object Object]" === Object.prototype.toString.call(a))
                for (var c in a) Object.prototype.hasOwnProperty.call(a, c) && b.call(d, a[c], c, a);
            else {
                c = 0;
                for (var f = a.length; c < f; c++) b.call(d, a[c], c, a)
            }
        },
        r = function(a, b) {
            var d = {};
            p(a, function(c, b) {
                d[b] = a[b]
            });
            p(b, function(a, f) {
                d[f] = b[f]
            });
            return d
        },
        z = function(a, g) {
            for (var d = g.charAt(0); a && a !== b.document; a = a.parentNode)
                if ("." === d) {
                    if (a.classList.contains(g.substr(1))) return a
                } else if ("#" === d) {
                if (a.id === g.substr(1)) return a
            } else if ("[" === d && a.hasAttribute(g.substr(1, g.length - 2))) return a;
            return !1
        },
        A = function(a) {
            a = String(a);
            for (var b = a.length, d = -1, c, f = "", e = a.charCodeAt(0); ++d < b;) {
                c = a.charCodeAt(d);
                if (0 === c) throw new InvalidCharacterError("Invalid character: the input contains U+0000.");
                f = 1 <= c && 31 >= c || 127 == c || 0 === d && 48 <= c && 57 >= c || 1 === d && 48 <= c && 57 >= c && 45 === e ? f + ("\\" + c.toString(16) + " ") : 128 <= c || 45 === c || 95 === c || 48 <= c && 57 >= c || 65 <= c && 90 >=
                    c || 97 <= c && 122 >= c ? f + a.charAt(d) : f + ("\\" + a.charAt(d))
            }
            return f
        },
        B = function(a, b, d) {
            var c = 0;
            if (a.offsetParent) {
                do c += a.offsetTop, a = a.offsetParent; while (a)
            }
            c = c - b - d;
            return 0 <= c ? c : 0
        },
        C = function(a) {
            return a && "object" === typeof JSON && "function" === typeof JSON.parse ? JSON.parse(a) : {}
        },
        t = function(a) {
            return null === a ? 0 : Math.max(a.scrollHeight, a.offsetHeight, a.clientHeight) + a.offsetTop
        };
    e.aS = function(a, g, d) {
        var c = r(c || w, d || {});
        d = C(a ? a.getAttribute("data-options") : null);
        c = r(c, d);
        g = "#" + A(g.substr(1));
        var f = "#" === g ? b.document.documentElement : b.document.querySelector(g),
            e = b.pageYOffset;
        l || (l = b.document.querySelector("[data-scroll-header]"));
        n || (n = t(l));
        var k = B(f, n, parseInt(c.offset, 10)),
            m, p = k - e,
            q = Math.max(b.document.body.scrollHeight, b.document.documentElement.scrollHeight, b.document.body.offsetHeight, b.document.documentElement.offsetHeight, b.document.body.clientHeight, b.document.documentElement.clientHeight),
            u = 0,
            h, v;
        0 === b.pageYOffset && b.scrollTo(0, 0);
        c.cB(a, g);
        m = setInterval(function() {
            u += 16;
            h = u / 500;
            h = 1 < h ? 1 : h;
            v = e + p * ((.5 > h ? 4 * h * h * h : (h - 1) * (2 * h - 2) * (2 * h - 2) + 1) || h);
            b.scrollTo(0, Math.floor(v));
            var d = b.pageYOffset;
            if (v == k || d == k || b.innerHeight + d >= q) clearInterval(m), f.focus(), c.cA(a, g)
        }, 16)
    };
    var q = function(a) {
            var b = z(a.target, "[data-scroll]");
            b && "a" === b.tagName.toLowerCase() && (a.preventDefault(), e.aS(b, b.hash, k))
        },
        x = function(a) {
            m || (m = setTimeout(function() {
                m = null;
                n = t(l)
            }, 66))
        };
    e.d = function() {
        k && (b.document.removeEventListener("click", q, !1), b.removeEventListener("resize", x, !1), n = l = m = k = null)
    };
    e.i = function(a) {
        y && (e.d(), k = r(w, a || {}), l = b.document.querySelector("[data-scroll-header]"), n = t(l), b.document.addEventListener("click", q, !1), l && b.addEventListener("resize", x, !1))
    };
    return e
});
sS.i();
