(function (e) {
    var t = e(window);
    var n = t.height();
    t.resize(function () {
        n = t.height();
    });
    e.fn.parallax = function (r, i, s) {
        function l() {
            var s = t.scrollTop();
            o.each(function () {
                var t = e(this);
                var f = t.offset().top;
                var l = u(t);
                if (f + l < s || f > s + n) {
                    return;
                }
                o.css(
                    "backgroundPosition",
                    r + " " + Math.round((a - s) * i) + "px",
                );
            });
        }
        var o = e(this);
        var u;
        var a;
        var f = 0;
        o.each(function () {
            a = o.offset().top;
        });
        if (s) {
            u = function (e) {
                return e.outerHeight(true);
            };
        } else {
            u = function (e) {
                return e.height();
            };
        }
        if (arguments.length < 1 || r === null) r = "50%";
        if (arguments.length < 2 || i === null) i = 0.1;
        if (arguments.length < 3 || s === null) s = true;
        t.bind("scroll", l).resize(l);
        l();
    };
})(jQuery);
