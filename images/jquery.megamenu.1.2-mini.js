(function(e) {
    e.fn.hoverIntent = function(t, n) {
        var r = {
            sensitivity: 7,
            interval: 100,
            timeout: 0
        };
        r = e.extend(r, n ? {
            over: t,
            out: n
        } : t);
        var i, s, o, u;
        var a = function(e) {
            i = e.pageX;
            s = e.pageY
        };
        var f = function(t, n) {
            n.hoverIntent_t = clearTimeout(n.hoverIntent_t);
            if (Math.abs(o - i) + Math.abs(u - s) < r.sensitivity) {
                e(n).unbind("mousemove", a);
                n.hoverIntent_s = 1;
                return r.over.apply(n, [t])
            } else {
                o = i;
                u = s;
                n.hoverIntent_t = setTimeout(function() {
                    f(t, n)
                }, r.interval)
            }
        };
        var l = function(e, t) {
            t.hoverIntent_t = clearTimeout(t.hoverIntent_t);
            t.hoverIntent_s = 0;
            return r.out.apply(t, [e])
        };
        var c = function(t) {
            var n = (t.type == "mouseover" ? t.fromElement : t.toElement) || t.relatedTarget;
            while (n && n != this) {
                try {
                    n = n.parentNode
                } catch (t) {
                    n = this
                }
            }
            if (n == this) {
                return false
            }
            var i = jQuery.extend({}, t);
            var s = this;
            if (s.hoverIntent_t) {
                s.hoverIntent_t = clearTimeout(s.hoverIntent_t)
            }
            if (t.type == "mouseover") {
                o = i.pageX;
                u = i.pageY;
                e(s).bind("mousemove", a);
                if (s.hoverIntent_s != 1) {
                    s.hoverIntent_t = setTimeout(function() {
                        f(i, s)
                    }, r.interval)
                }
            } else {
                e(s).unbind("mousemove", a);
                if (s.hoverIntent_s == 1) {
                    s.hoverIntent_t = setTimeout(function() {
                        l(i, s)
                    }, r.timeout)
                }
            }
        };
        return this.mouseover(c).mouseout(c)
    }
})(jQuery);
(function(e) {
    e.fn.dcMegaMenu = function(t) {
        var n = {
            classParent: "dc-mega",
            classContainer: "sub-container",
            classSubParent: "mega-hdr",
            classSubLink: "mega-hdr",
            classWidget: "dc-extra",
            rowItems: 2,
            speed: "fast",
            effect: "fade",
            event: "hover",
            fullWidth: false,
            onLoad: function() {},
            beforeOpen: function() {},
            beforeClose: function() {}
        };
        var t = e.extend(n, t);
        var r = this;
        var i = 0;
        return r.each(function(t) {
            function l() {
                var t = e(".sub", this);
                e(this).addClass("mega-hover");
                if (n.effect == "fade") {
                    e(t).fadeIn(n.speed)
                }
                if (n.effect == "slide") {
                    e(t).show(n.speed)
                }
                n.beforeOpen.call(this)
            }

            function c(t) {
                var r = e(".sub", t);
                e(t).addClass("mega-hover");
                if (n.effect == "fade") {
                    e(r).fadeIn(n.speed)
                }
                if (n.effect == "slide") {
                    e(r).show(n.speed)
                }
                n.beforeOpen.call(this)
            }

            function h() {
                var t = e(".sub", this);
                e(this).removeClass("mega-hover");
                e(t).hide();
                n.beforeClose.call(this)
            }

            function p(t) {
                var r = e(".sub", t);
                e(t).removeClass("mega-hover");
                e(r).hide();
                n.beforeClose.call(this)
            }

            function d() {
                e("li", r).removeClass("mega-hover");
                e(".sub", r).hide()
            }

            function v() {
                $arrow = '<span class="dc-mega-icon"></span>';
                var t = u + "-li";
                var i = r.outerWidth();
                e("> li", r).each(function() {
                    var l = e("> ul", this);
                    var c = e("> a", this);
                    if (l.length) {
                        c.addClass(u).append($arrow);
                        l.addClass("sub").wrap('<div class="' + a + '" />');
                        var h = e(this).position();
                        pl = h.left;
                        if (e("ul", l).length) {
                            e(this).addClass(t);
                            e("." + a, this).addClass("mega");
                            e("> li", l).each(function() {
                                if (!e(this).hasClass(f)) {
                                    e(this).addClass("mega-unit");
                                    if (e("> ul", this).length) {
                                        e(this).addClass(s);
                                        e("> a", this).addClass(s + "-a")
                                    } else {
                                        e(this).addClass(o);
                                        e("> a", this).addClass(o + "-a")
                                    }
                                }
                            });
                            var p = e(".mega-unit", this);
                            rowSize = parseInt(n.rowItems);
                            for (var d = 0; d < p.length; d += rowSize) {
                                p.slice(d, d + rowSize).wrapAll('<div class="row" />')
                            }
                            l.show();
                            var v = e(this).width();
                            var m = pl + v;
                            var g = i - m;
                            var y = l.outerWidth();
                            var b = l.parent("." + a).outerWidth();
                            var w = b - y;
                            if (n.fullWidth == true) {
                                var E = i - w;
                                r.addClass("full-width")
                            }
                            var S = e(".mega-unit", l).outerWidth(true);
                            var x = e(".row:eq(0) .mega-unit", l).length;
                            var T = S * x;
                            var N = T + w;
                            e(".row", this).each(function() {
                                e(".mega-unit:last", this).addClass("last");
                                var t = undefined;
                                e(".mega-unit > a", this).each(function() {
                                    var n = parseInt(e(this).height());
                                    if (t === undefined || t < n) {
                                        t = n
                                    }
                                });
                                e(".mega-unit > a", this).css("height", t + "px");
                                if (n.fullWidth == true) {
                                    e(this).css("width", "470px")
                                } else {
                                    e(this).css("width", T + "px")
                                }
                            });
                            var C = g < C ? C + C - g : (N - v) / 2;
                            var k = pl - C;
                            var L = {
                                left: pl + "px",
                                marginLeft: -C + "px"
                            };
                            if (k < 0 || n.fullWidth == true) {
                                L = {
                                    left: 0
                                }
                            } else if (g < C) {
                                L = {
                                    right: 0
                                }
                            }
                            e("." + a, this).css(L);
                            e(".row", l).each(function() {
                                var t = e(this).height();
                                e(".mega-unit", this).css({
                                    height: t + "px"
                                });
                                e(this).parent(".row").css({
                                    height: t + "px"
                                });
                                e(this).parent(".row").css({
                                    width: e(".nav_bg").width()
                                })
                            });
                            l.hide()
                        } else {
                            e("." + a, this).addClass("non-mega").css("left", pl + "px")
                        }
                    }
                });
                var v = e("> li > a", r).outerHeight(true);
                e("." + a, r).css({
                    top: v + "px"
                }).css("z-index", "1000");
                if (n.event == "hover") {
                    var m = {
                        sensitivity: 2,
                        interval: 100,
                        over: l,
                        timeout: 400,
                        out: h
                    };
                    e("li", r).hoverIntent(m)
                }
                if (n.event == "click") {
                    e("body").mouseup(function(t) {
                        if (!e(t.target).parents(".mega-hover").length) {
                            d()
                        }
                    });
                    e("> li > a." + u, r).click(function(t) {
                        var n = e(this).parent();
                        if (n.hasClass("mega-hover")) {
                            p(n)
                        } else {
                            c(n)
                        }
                        t.preventDefault()
                    })
                }
                n.onLoad.call(this)
            }
            if (i != 0) {
                return
            }
            i++;
            var s = n.classSubParent;
            var o = n.classSubLink;
            var u = n.classParent;
            var a = n.classContainer;
            var f = n.classWidget;
            v()
        })
    }
})(jQuery);
jQuery(document).ready(function() {
    jQuery(".currentmenu3,.currentmenu3 div").click(function() {
        jQuery(this).parent().find("ul.mega").slideToggle("slow", function() {})
    })
})