/*!
 * Launchframe v1.0.0 by @Whiteboardis dev team
 * Copyright 2014 Whiteboard
 *
 * Designed and built for developers by developers.
 */
if (!jQuery) throw new Error("LaunchFrame requires jQuery");
! function (a, b) {
    var c = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
    a.fn.imagesLoaded = function (d) {
        function e() {
            var b = a(l),
                c = a(m);
            h && (m.length ? h.reject(j, b, c) : h.resolve(j)), a.isFunction(d) && d.call(g, j, b, c)
        }

        function f(b, d) {
            b.src === c || -1 !== a.inArray(b, k) || (k.push(b), d ? m.push(b) : l.push(b), a.data(b, "imagesLoaded", {
                isBroken: d,
                src: b.src
            }), i && h.notifyWith(a(b), [d, j, a(l), a(m)]), j.length === k.length && (setTimeout(e), j.unbind(".imagesLoaded")))
        }
        var g = this,
            h = a.isFunction(a.Deferred) ? a.Deferred() : 0,
            i = a.isFunction(h.notify),
            j = g.find("img").add(g.filter("img")),
            k = [],
            l = [],
            m = [];
        return j.length ? j.bind("load.imagesLoaded error.imagesLoaded", function (a) {
            f(a.target, "error" === a.type)
        }).each(function (d, e) {
            var g = e.src,
                h = a.data(e, "imagesLoaded");
            h && h.src === g ? f(e, h.isBroken) : e.complete && e.naturalWidth !== b ? f(e, 0 === e.naturalWidth || 0 === e.naturalHeight) : (e.readyState || e.complete) && (e.src = c, e.src = g)
        }) : e(), h ? h.promise(g) : g
    }
}(jQuery),
function (a, b) {
    function c(b, c) {
        var e = b.nodeName.toLowerCase();
        if ("area" === e) {
            var f, g = b.parentNode,
                h = g.name;
            return b.href && h && "map" === g.nodeName.toLowerCase() ? (f = a("img[usemap=#" + h + "]")[0], !! f && d(f)) : !1
        }
        return (/input|select|textarea|button|object/.test(e) ? !b.disabled : "a" == e ? b.href || c : c) && d(b)
    }

    function d(b) {
        return !a(b).parents().andSelf().filter(function () {
            return "hidden" === a.curCSS(this, "visibility") || a.expr.filters.hidden(this)
        }).length
    }
    a.ui = a.ui || {}, a.ui.version || (a.extend(a.ui, {
        version: "1.8.22",
        keyCode: {
            ALT: 18,
            BACKSPACE: 8,
            CAPS_LOCK: 20,
            COMMA: 188,
            COMMAND: 91,
            COMMAND_LEFT: 91,
            COMMAND_RIGHT: 93,
            CONTROL: 17,
            DELETE: 46,
            DOWN: 40,
            END: 35,
            ENTER: 13,
            ESCAPE: 27,
            HOME: 36,
            INSERT: 45,
            LEFT: 37,
            MENU: 93,
            NUMPAD_ADD: 107,
            NUMPAD_DECIMAL: 110,
            NUMPAD_DIVIDE: 111,
            NUMPAD_ENTER: 108,
            NUMPAD_MULTIPLY: 106,
            NUMPAD_SUBTRACT: 109,
            PAGE_DOWN: 34,
            PAGE_UP: 33,
            PERIOD: 190,
            RIGHT: 39,
            SHIFT: 16,
            SPACE: 32,
            TAB: 9,
            UP: 38,
            WINDOWS: 91
        }
    }), a.fn.extend({
        propAttr: a.fn.prop || a.fn.attr,
        _focus: a.fn.focus,
        focus: function (b, c) {
            return "number" == typeof b ? this.each(function () {
                var d = this;
                setTimeout(function () {
                    a(d).focus(), c && c.call(d)
                }, b)
            }) : this._focus.apply(this, arguments)
        },
        scrollParent: function () {
            var b;
            return b = a.browser.msie && /(static|relative)/.test(this.css("position")) || /absolute/.test(this.css("position")) ? this.parents().filter(function () {
                return /(relative|absolute|fixed)/.test(a.curCSS(this, "position", 1)) && /(auto|scroll)/.test(a.curCSS(this, "overflow", 1) + a.curCSS(this, "overflow-y", 1) + a.curCSS(this, "overflow-x", 1))
            }).eq(0) : this.parents().filter(function () {
                return /(auto|scroll)/.test(a.curCSS(this, "overflow", 1) + a.curCSS(this, "overflow-y", 1) + a.curCSS(this, "overflow-x", 1))
            }).eq(0), /fixed/.test(this.css("position")) || !b.length ? a(document) : b
        },
        zIndex: function (c) {
            if (c !== b) return this.css("zIndex", c);
            if (this.length)
                for (var d, e, f = a(this[0]); f.length && f[0] !== document;) {
                    if (d = f.css("position"), ("absolute" === d || "relative" === d || "fixed" === d) && (e = parseInt(f.css("zIndex"), 10), !isNaN(e) && 0 !== e)) return e;
                    f = f.parent()
                }
            return 0
        },
        disableSelection: function () {
            return this.bind((a.support.selectstart ? "selectstart" : "mousedown") + ".ui-disableSelection", function (a) {
                a.preventDefault()
            })
        },
        enableSelection: function () {
            return this.unbind(".ui-disableSelection")
        }
    }), a("<a>").outerWidth(1).jquery || a.each(["Width", "Height"], function (c, d) {
        function e(b, c, d, e) {
            return a.each(f, function () {
                c -= parseFloat(a.curCSS(b, "padding" + this, !0)) || 0, d && (c -= parseFloat(a.curCSS(b, "border" + this + "Width", !0)) || 0), e && (c -= parseFloat(a.curCSS(b, "margin" + this, !0)) || 0)
            }), c
        }
        var f = "Width" === d ? ["Left", "Right"] : ["Top", "Bottom"],
            g = d.toLowerCase(),
            h = {
                innerWidth: a.fn.innerWidth,
                innerHeight: a.fn.innerHeight,
                outerWidth: a.fn.outerWidth,
                outerHeight: a.fn.outerHeight
            };
        a.fn["inner" + d] = function (c) {
            return c === b ? h["inner" + d].call(this) : this.each(function () {
                a(this).css(g, e(this, c) + "px")
            })
        }, a.fn["outer" + d] = function (b, c) {
            return "number" != typeof b ? h["outer" + d].call(this, b) : this.each(function () {
                a(this).css(g, e(this, b, !0, c) + "px")
            })
        }
    }), a.extend(a.expr[":"], {
        data: a.expr.createPseudo ? a.expr.createPseudo(function (b) {
            return function (c) {
                return !!a.data(c, b)
            }
        }) : function (b, c, d) {
            return !!a.data(b, d[3])
        },
        focusable: function (b) {
            return c(b, !isNaN(a.attr(b, "tabindex")))
        },
        tabbable: function (b) {
            var d = a.attr(b, "tabindex"),
                e = isNaN(d);
            return (e || d >= 0) && c(b, !e)
        }
    }), a(function () {
        var b = document.body,
            c = b.appendChild(c = document.createElement("div"));
        c.offsetHeight, a.extend(c.style, {
            minHeight: "100px",
            height: "auto",
            padding: 0,
            borderWidth: 0
        }), a.support.minHeight = 100 === c.offsetHeight, a.support.selectstart = "onselectstart" in c, b.removeChild(c).style.display = "none"
    }), a.curCSS || (a.curCSS = a.css), a.extend(a.ui, {
        plugin: {
            add: function (b, c, d) {
                var e = a.ui[b].prototype;
                for (var f in d) e.plugins[f] = e.plugins[f] || [], e.plugins[f].push([c, d[f]])
            },
            call: function (a, b, c) {
                var d = a.plugins[b];
                if (d && a.element[0].parentNode)
                    for (var e = 0; e < d.length; e++) a.options[d[e][0]] && d[e][1].apply(a.element, c)
            }
        },
        contains: function (a, b) {
            return document.compareDocumentPosition ? 16 & a.compareDocumentPosition(b) : a !== b && a.contains(b)
        },
        hasScroll: function (b, c) {
            if ("hidden" === a(b).css("overflow")) return !1;
            var d = c && "left" === c ? "scrollLeft" : "scrollTop",
                e = !1;
            return b[d] > 0 ? !0 : (b[d] = 1, e = b[d] > 0, b[d] = 0, e)
        },
        isOverAxis: function (a, b, c) {
            return a > b && b + c > a
        },
        isOver: function (b, c, d, e, f, g) {
            return a.ui.isOverAxis(b, d, f) && a.ui.isOverAxis(c, e, g)
        }
    }))
}(jQuery),
function (a, b) {
    if (a.cleanData) {
        var c = a.cleanData;
        a.cleanData = function (b) {
            for (var d, e = 0; null != (d = b[e]); e++) try {
                a(d).triggerHandler("remove")
            } catch (f) {}
            c(b)
        }
    } else {
        var d = a.fn.remove;
        a.fn.remove = function (b, c) {
            return this.each(function () {
                return c || (!b || a.filter(b, [this]).length) && a("*", this).add([this]).each(function () {
                    try {
                        a(this).triggerHandler("remove")
                    } catch (b) {}
                }), d.call(a(this), b, c)
            })
        }
    }
    a.widget = function (b, c, d) {
        var e, f = b.split(".")[0];
        b = b.split(".")[1], e = f + "-" + b, d || (d = c, c = a.Widget), a.expr[":"][e] = function (c) {
            return !!a.data(c, b)
        }, a[f] = a[f] || {}, a[f][b] = function (a, b) {
            arguments.length && this._createWidget(a, b)
        };
        var g = new c;
        g.options = a.extend(!0, {}, g.options), a[f][b].prototype = a.extend(!0, g, {
            namespace: f,
            widgetName: b,
            widgetEventPrefix: a[f][b].prototype.widgetEventPrefix || b,
            widgetBaseClass: e
        }, d), a.widget.bridge(b, a[f][b])
    }, a.widget.bridge = function (c, d) {
        a.fn[c] = function (e) {
            var f = "string" == typeof e,
                g = Array.prototype.slice.call(arguments, 1),
                h = this;
            return e = !f && g.length ? a.extend.apply(null, [!0, e].concat(g)) : e, f && "_" === e.charAt(0) ? h : (this.each(f ? function () {
                var d = a.data(this, c),
                    f = d && a.isFunction(d[e]) ? d[e].apply(d, g) : d;
                return f !== d && f !== b ? (h = f, !1) : void 0
            } : function () {
                var b = a.data(this, c);
                b ? b.option(e || {})._init() : a.data(this, c, new d(e, this))
            }), h)
        }
    }, a.Widget = function (a, b) {
        arguments.length && this._createWidget(a, b)
    }, a.Widget.prototype = {
        widgetName: "widget",
        widgetEventPrefix: "",
        options: {
            disabled: !1
        },
        _createWidget: function (b, c) {
            a.data(c, this.widgetName, this), this.element = a(c), this.options = a.extend(!0, {}, this.options, this._getCreateOptions(), b);
            var d = this;
            this.element.bind("remove." + this.widgetName, function () {
                d.destroy()
            }), this._create(), this._trigger("create"), this._init()
        },
        _getCreateOptions: function () {
            return a.metadata && a.metadata.get(this.element[0])[this.widgetName]
        },
        _create: function () {},
        _init: function () {},
        destroy: function () {
            this.element.unbind("." + this.widgetName).removeData(this.widgetName), this.widget().unbind("." + this.widgetName).removeAttr("aria-disabled").removeClass(this.widgetBaseClass + "-disabled ui-state-disabled")
        },
        widget: function () {
            return this.element
        },
        option: function (c, d) {
            var e = c;
            if (0 === arguments.length) return a.extend({}, this.options);
            if ("string" == typeof c) {
                if (d === b) return this.options[c];
                e = {}, e[c] = d
            }
            return this._setOptions(e), this
        },
        _setOptions: function (b) {
            var c = this;
            return a.each(b, function (a, b) {
                c._setOption(a, b)
            }), this
        },
        _setOption: function (a, b) {
            return this.options[a] = b, "disabled" === a && this.widget()[b ? "addClass" : "removeClass"](this.widgetBaseClass + "-disabled ui-state-disabled").attr("aria-disabled", b), this
        },
        enable: function () {
            return this._setOption("disabled", !1)
        },
        disable: function () {
            return this._setOption("disabled", !0)
        },
        _trigger: function (b, c, d) {
            var e, f, g = this.options[b];
            if (d = d || {}, c = a.Event(c), c.type = (b === this.widgetEventPrefix ? b : this.widgetEventPrefix + b).toLowerCase(), c.target = this.element[0], f = c.originalEvent, f)
                for (e in f) e in c || (c[e] = f[e]);
            return this.element.trigger(c, d), !(a.isFunction(g) && g.call(this.element[0], c, d) === !1 || c.isDefaultPrevented())
        }
    }
}(jQuery),
function (a) {
    var b = !1;
    a(document).mouseup(function () {
        b = !1
    }), a.widget("ui.mouse", {
        options: {
            cancel: ":input,option",
            distance: 1,
            delay: 0
        },
        _mouseInit: function () {
            var b = this;
            this.element.bind("mousedown." + this.widgetName, function (a) {
                return b._mouseDown(a)
            }).bind("click." + this.widgetName, function (c) {
                return !0 === a.data(c.target, b.widgetName + ".preventClickEvent") ? (a.removeData(c.target, b.widgetName + ".preventClickEvent"), c.stopImmediatePropagation(), !1) : void 0
            }), this.started = !1
        },
        _mouseDestroy: function () {
            this.element.unbind("." + this.widgetName), a(document).unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate)
        },
        _mouseDown: function (c) {
            if (!b) {
                this._mouseStarted && this._mouseUp(c), this._mouseDownEvent = c;
                var d = this,
                    e = 1 == c.which,
                    f = "string" == typeof this.options.cancel && c.target.nodeName ? a(c.target).closest(this.options.cancel).length : !1;
                return e && !f && this._mouseCapture(c) ? (this.mouseDelayMet = !this.options.delay, this.mouseDelayMet || (this._mouseDelayTimer = setTimeout(function () {
                    d.mouseDelayMet = !0
                }, this.options.delay)), this._mouseDistanceMet(c) && this._mouseDelayMet(c) && (this._mouseStarted = this._mouseStart(c) !== !1, !this._mouseStarted) ? (c.preventDefault(), !0) : (!0 === a.data(c.target, this.widgetName + ".preventClickEvent") && a.removeData(c.target, this.widgetName + ".preventClickEvent"), this._mouseMoveDelegate = function (a) {
                    return d._mouseMove(a)
                }, this._mouseUpDelegate = function (a) {
                    return d._mouseUp(a)
                }, a(document).bind("mousemove." + this.widgetName, this._mouseMoveDelegate).bind("mouseup." + this.widgetName, this._mouseUpDelegate), c.preventDefault(), b = !0, !0)) : !0
            }
        },
        _mouseMove: function (b) {
            return !a.browser.msie || document.documentMode >= 9 || b.button ? this._mouseStarted ? (this._mouseDrag(b), b.preventDefault()) : (this._mouseDistanceMet(b) && this._mouseDelayMet(b) && (this._mouseStarted = this._mouseStart(this._mouseDownEvent, b) !== !1, this._mouseStarted ? this._mouseDrag(b) : this._mouseUp(b)), !this._mouseStarted) : this._mouseUp(b)
        },
        _mouseUp: function (b) {
            return a(document).unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate), this._mouseStarted && (this._mouseStarted = !1, b.target == this._mouseDownEvent.target && a.data(b.target, this.widgetName + ".preventClickEvent", !0), this._mouseStop(b)), !1
        },
        _mouseDistanceMet: function (a) {
            return Math.max(Math.abs(this._mouseDownEvent.pageX - a.pageX), Math.abs(this._mouseDownEvent.pageY - a.pageY)) >= this.options.distance
        },
        _mouseDelayMet: function () {
            return this.mouseDelayMet
        },
        _mouseStart: function () {},
        _mouseDrag: function () {},
        _mouseStop: function () {},
        _mouseCapture: function () {
            return !0
        }
    })
}(jQuery),
function (a) {
    var b = 5;
    a.widget("ui.slider", a.ui.mouse, {
        widgetEventPrefix: "slide",
        options: {
            animate: !1,
            distance: 0,
            max: 100,
            min: 0,
            orientation: "horizontal",
            range: !1,
            step: 1,
            value: 0,
            values: null
        },
        _create: function () {
            var c = this,
                d = this.options,
                e = this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"),
                f = "<a class='ui-slider-handle ui-state-default ui-corner-all' href='#'></a>",
                g = d.values && d.values.length || 1,
                h = [];
            this._keySliding = !1, this._mouseSliding = !1, this._animateOff = !0, this._handleIndex = null, this._detectOrientation(), this._mouseInit(), this.element.addClass("ui-slider ui-slider-" + this.orientation + " ui-widget ui-widget-content ui-corner-all" + (d.disabled ? " ui-slider-disabled ui-disabled" : "")), this.range = a([]), d.range && (d.range === !0 && (d.values || (d.values = [this._valueMin(), this._valueMin()]), d.values.length && 2 !== d.values.length && (d.values = [d.values[0], d.values[0]])), this.range = a("<div></div>").appendTo(this.element).addClass("ui-slider-range ui-widget-header" + ("min" === d.range || "max" === d.range ? " ui-slider-range-" + d.range : "")));
            for (var i = e.length; g > i; i += 1) h.push(f);
            this.handles = e.add(a(h.join("")).appendTo(c.element)), this.handle = this.handles.eq(0), this.handles.add(this.range).filter("a").click(function (a) {
                a.preventDefault()
            }).hover(function () {
                d.disabled || a(this).addClass("ui-state-hover")
            }, function () {
                a(this).removeClass("ui-state-hover")
            }).focus(function () {
                d.disabled ? a(this).blur() : (a(".ui-slider .ui-state-focus").removeClass("ui-state-focus"), a(this).addClass("ui-state-focus"))
            }).blur(function () {
                a(this).removeClass("ui-state-focus")
            }), this.handles.each(function (b) {
                a(this).data("index.ui-slider-handle", b)
            }), this.handles.keydown(function (d) {
                var e, f, g, h, i = a(this).data("index.ui-slider-handle");
                if (!c.options.disabled) {
                    switch (d.keyCode) {
                    case a.ui.keyCode.HOME:
                    case a.ui.keyCode.END:
                    case a.ui.keyCode.PAGE_UP:
                    case a.ui.keyCode.PAGE_DOWN:
                    case a.ui.keyCode.UP:
                    case a.ui.keyCode.RIGHT:
                    case a.ui.keyCode.DOWN:
                    case a.ui.keyCode.LEFT:
                        if (d.preventDefault(), !c._keySliding && (c._keySliding = !0, a(this).addClass("ui-state-active"), e = c._start(d, i), e === !1)) return
                    }
                    switch (h = c.options.step, f = g = c.options.values && c.options.values.length ? c.values(i) : c.value(), d.keyCode) {
                    case a.ui.keyCode.HOME:
                        g = c._valueMin();
                        break;
                    case a.ui.keyCode.END:
                        g = c._valueMax();
                        break;
                    case a.ui.keyCode.PAGE_UP:
                        g = c._trimAlignValue(f + (c._valueMax() - c._valueMin()) / b);
                        break;
                    case a.ui.keyCode.PAGE_DOWN:
                        g = c._trimAlignValue(f - (c._valueMax() - c._valueMin()) / b);
                        break;
                    case a.ui.keyCode.UP:
                    case a.ui.keyCode.RIGHT:
                        if (f === c._valueMax()) return;
                        g = c._trimAlignValue(f + h);
                        break;
                    case a.ui.keyCode.DOWN:
                    case a.ui.keyCode.LEFT:
                        if (f === c._valueMin()) return;
                        g = c._trimAlignValue(f - h)
                    }
                    c._slide(d, i, g)
                }
            }).keyup(function (b) {
                var d = a(this).data("index.ui-slider-handle");
                c._keySliding && (c._keySliding = !1, c._stop(b, d), c._change(b, d), a(this).removeClass("ui-state-active"))
            }), this._refreshValue(), this._animateOff = !1
        },
        destroy: function () {
            return this.handles.remove(), this.range.remove(), this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-slider-disabled ui-widget ui-widget-content ui-corner-all").removeData("slider").unbind(".slider"), this._mouseDestroy(), this
        },
        _mouseCapture: function (b) {
            var c, d, e, f, g, h, i, j, k, l = this.options;
            return l.disabled ? !1 : (this.elementSize = {
                width: this.element.outerWidth(),
                height: this.element.outerHeight()
            }, this.elementOffset = this.element.offset(), c = {
                x: b.pageX,
                y: b.pageY
            }, d = this._normValueFromMouse(c), e = this._valueMax() - this._valueMin() + 1, g = this, this.handles.each(function (b) {
                var c = Math.abs(d - g.values(b));
                e > c && (e = c, f = a(this), h = b)
            }), l.range === !0 && this.values(1) === l.min && (h += 1, f = a(this.handles[h])), i = this._start(b, h), i === !1 ? !1 : (this._mouseSliding = !0, g._handleIndex = h, f.addClass("ui-state-active").focus(), j = f.offset(), k = !a(b.target).parents().andSelf().is(".ui-slider-handle"), this._clickOffset = k ? {
                left: 0,
                top: 0
            } : {
                left: b.pageX - j.left - f.width() / 2,
                top: b.pageY - j.top - f.height() / 2 - (parseInt(f.css("borderTopWidth"), 10) || 0) - (parseInt(f.css("borderBottomWidth"), 10) || 0) + (parseInt(f.css("marginTop"), 10) || 0)
            }, this.handles.hasClass("ui-state-hover") || this._slide(b, h, d), this._animateOff = !0, !0))
        },
        _mouseStart: function () {
            return !0
        },
        _mouseDrag: function (a) {
            var b = {
                x: a.pageX,
                y: a.pageY
            }, c = this._normValueFromMouse(b);
            return this._slide(a, this._handleIndex, c), !1
        },
        _mouseStop: function (a) {
            return this.handles.removeClass("ui-state-active"), this._mouseSliding = !1, this._stop(a, this._handleIndex), this._change(a, this._handleIndex), this._handleIndex = null, this._clickOffset = null, this._animateOff = !1, !1
        },
        _detectOrientation: function () {
            this.orientation = "vertical" === this.options.orientation ? "vertical" : "horizontal"
        },
        _normValueFromMouse: function (a) {
            var b, c, d, e, f;
            return "horizontal" === this.orientation ? (b = this.elementSize.width, c = a.x - this.elementOffset.left - (this._clickOffset ? this._clickOffset.left : 0)) : (b = this.elementSize.height, c = a.y - this.elementOffset.top - (this._clickOffset ? this._clickOffset.top : 0)), d = c / b, d > 1 && (d = 1), 0 > d && (d = 0), "vertical" === this.orientation && (d = 1 - d), e = this._valueMax() - this._valueMin(), f = this._valueMin() + d * e, this._trimAlignValue(f)
        },
        _start: function (a, b) {
            var c = {
                handle: this.handles[b],
                value: this.value()
            };
            return this.options.values && this.options.values.length && (c.value = this.values(b), c.values = this.values()), this._trigger("start", a, c)
        },
        _slide: function (a, b, c) {
            var d, e, f;
            this.options.values && this.options.values.length ? (d = this.values(b ? 0 : 1), 2 === this.options.values.length && this.options.range === !0 && (0 === b && c > d || 1 === b && d > c) && (c = d), c !== this.values(b) && (e = this.values(), e[b] = c, f = this._trigger("slide", a, {
                handle: this.handles[b],
                value: c,
                values: e
            }), d = this.values(b ? 0 : 1), f !== !1 && this.values(b, c, !0))) : c !== this.value() && (f = this._trigger("slide", a, {
                handle: this.handles[b],
                value: c
            }), f !== !1 && this.value(c))
        },
        _stop: function (a, b) {
            var c = {
                handle: this.handles[b],
                value: this.value()
            };
            this.options.values && this.options.values.length && (c.value = this.values(b), c.values = this.values()), this._trigger("stop", a, c)
        },
        _change: function (a, b) {
            if (!this._keySliding && !this._mouseSliding) {
                var c = {
                    handle: this.handles[b],
                    value: this.value()
                };
                this.options.values && this.options.values.length && (c.value = this.values(b), c.values = this.values()), this._trigger("change", a, c)
            }
        },
        value: function (a) {
            return arguments.length ? (this.options.value = this._trimAlignValue(a), this._refreshValue(), this._change(null, 0), void 0) : this._value()
        },
        values: function (b, c) {
            var d, e, f;
            if (arguments.length > 1) return this.options.values[b] = this._trimAlignValue(c), this._refreshValue(), this._change(null, b), void 0;
            if (!arguments.length) return this._values();
            if (!a.isArray(arguments[0])) return this.options.values && this.options.values.length ? this._values(b) : this.value();
            for (d = this.options.values, e = arguments[0], f = 0; f < d.length; f += 1) d[f] = this._trimAlignValue(e[f]), this._change(null, f);
            this._refreshValue()
        },
        _setOption: function (b, c) {
            var d, e = 0;
            switch (a.isArray(this.options.values) && (e = this.options.values.length), a.Widget.prototype._setOption.apply(this, arguments), b) {
            case "disabled":
                c ? (this.handles.filter(".ui-state-focus").blur(), this.handles.removeClass("ui-state-hover"), this.handles.propAttr("disabled", !0), this.element.addClass("ui-disabled")) : (this.handles.propAttr("disabled", !1), this.element.removeClass("ui-disabled"));
                break;
            case "orientation":
                this._detectOrientation(), this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-" + this.orientation), this._refreshValue();
                break;
            case "value":
                this._animateOff = !0, this._refreshValue(), this._change(null, 0), this._animateOff = !1;
                break;
            case "values":
                for (this._animateOff = !0, this._refreshValue(), d = 0; e > d; d += 1) this._change(null, d);
                this._animateOff = !1
            }
        },
        _value: function () {
            var a = this.options.value;
            return a = this._trimAlignValue(a)
        },
        _values: function (a) {
            var b, c, d;
            if (arguments.length) return b = this.options.values[a], b = this._trimAlignValue(b);
            for (c = this.options.values.slice(), d = 0; d < c.length; d += 1) c[d] = this._trimAlignValue(c[d]);
            return c
        },
        _trimAlignValue: function (a) {
            if (a <= this._valueMin()) return this._valueMin();
            if (a >= this._valueMax()) return this._valueMax();
            var b = this.options.step > 0 ? this.options.step : 1,
                c = (a - this._valueMin()) % b,
                d = a - c;
            return 2 * Math.abs(c) >= b && (d += c > 0 ? b : -b), parseFloat(d.toFixed(5))
        },
        _valueMin: function () {
            return this.options.min
        },
        _valueMax: function () {
            return this.options.max
        },
        _refreshValue: function () {
            var b, c, d, e, f, g = this.options.range,
                h = this.options,
                i = this,
                j = this._animateOff ? !1 : h.animate,
                k = {};
            this.options.values && this.options.values.length ? this.handles.each(function (d) {
                b = (i.values(d) - i._valueMin()) / (i._valueMax() - i._valueMin()) * 100, k["horizontal" === i.orientation ? "left" : "bottom"] = b + "%", a(this).stop(1, 1)[j ? "animate" : "css"](k, h.animate), i.options.range === !0 && ("horizontal" === i.orientation ? (0 === d && i.range.stop(1, 1)[j ? "animate" : "css"]({
                    left: b + "%"
                }, h.animate), 1 === d && i.range[j ? "animate" : "css"]({
                    width: b - c + "%"
                }, {
                    queue: !1,
                    duration: h.animate
                })) : (0 === d && i.range.stop(1, 1)[j ? "animate" : "css"]({
                    bottom: b + "%"
                }, h.animate), 1 === d && i.range[j ? "animate" : "css"]({
                    height: b - c + "%"
                }, {
                    queue: !1,
                    duration: h.animate
                }))), c = b
            }) : (d = this.value(), e = this._valueMin(), f = this._valueMax(), b = f !== e ? (d - e) / (f - e) * 100 : 0, k["horizontal" === i.orientation ? "left" : "bottom"] = b + "%", this.handle.stop(1, 1)[j ? "animate" : "css"](k, h.animate), "min" === g && "horizontal" === this.orientation && this.range.stop(1, 1)[j ? "animate" : "css"]({
                width: b + "%"
            }, h.animate), "max" === g && "horizontal" === this.orientation && this.range[j ? "animate" : "css"]({
                width: 100 - b + "%"
            }, {
                queue: !1,
                duration: h.animate
            }), "min" === g && "vertical" === this.orientation && this.range.stop(1, 1)[j ? "animate" : "css"]({
                height: b + "%"
            }, h.animate), "max" === g && "vertical" === this.orientation && this.range[j ? "animate" : "css"]({
                height: 100 - b + "%"
            }, {
                queue: !1,
                duration: h.animate
            }))
        }
    }), a.extend(a.ui.slider, {
        version: "1.8.22"
    })
}(jQuery),
function (a) {
    a.BigVideo = function (b) {
        function c() {
            var b = a(window).width(),
                c = a(window).height(),
                d = b / c;
            q > d ? "video" === l ? (j.width(c * q).height(c), a(o).css("top", 0).css("left", -(c * q - b) / 2).css("height", c), a(o + "_html5_api").css("width", c * q), a(o + "_flash_api").css("width", c * q).css("height", c)) : a("#big-video-image").css({
                width: "auto",
                height: c,
                top: 0,
                left: -(c * q - b) / 2
            }) : "video" === l ? (j.width(b).height(b / q), a(o).css("top", -(b / q - c) / 2).css("left", 0).css("height", b / q), a(o + "_html5_api").css("width", "100%"), a(o + "_flash_api").css("width", b).css("height", b / q)) : a("#big-video-image").css({
                width: b,
                height: "auto",
                top: -(b / q - c) / 2,
                left: 0
            })
        }

        function d() {
            var b = '<div id="big-video-control-container">';
            b += '<div id="big-video-control">', b += '<a href="#" id="big-video-control-play"></a>', b += '<div id="big-video-control-middle">', b += '<div id="big-video-control-bar">', b += '<div id="big-video-control-bound-left"></div>', b += '<div id="big-video-control-progress"></div>', b += '<div id="big-video-control-track"></div>', b += '<div id="big-video-control-bound-right"></div>', b += "</div>", b += "</div>", b += '<div id="big-video-control-timer"></div>', b += "</div>", b += "</div>", z.container.append(b), a("#big-video-control-container").css("display", "none"), a("#big-video-control-track").slider({
                animate: !0,
                step: .01,
                slide: function (b, c) {
                    u = !0, a("#big-video-control-progress").css("width", c.value - .16 + "%"), j.currentTime(c.value / 100 * j.duration())
                },
                stop: function (a, b) {
                    u = !1, j.currentTime(b.value / 100 * j.duration())
                }
            }), a("#big-video-control-bar").click(function (b) {
                j.currentTime(b.offsetX / a(this).width() * j.duration())
            }), a("#big-video-control-play").click(function (a) {
                a.preventDefault(), e("toggle")
            }), j.on("timeupdate", function () {
                if (!u && j.currentTime() / j.duration()) {
                    var b = j.currentTime(),
                        c = Math.floor(b / 60),
                        d = Math.floor(b) - 60 * c;
                    10 > d && (d = "0" + d);
                    var e = j.currentTime() / j.duration() * 100;
                    a("#big-video-control-track").slider("value", e), a("#big-video-control-progress").css("width", e - .16 + "%"), a("#big-video-control-timer").text(c + ":" + d + "/" + r)
                }
            })
        }

        function e(b) {
            var c = b || "toggle";
            "toggle" === c && (c = v ? "pause" : "play"), "pause" === c ? (j.pause(), a("#big-video-control-play").css("background-position", "-16px"), v = !1) : "play" === c && (j.play(), a("#big-video-control-play").css("background-position", "0"), v = !0)
        }

        function f() {
            j.play(), z.container.off("click", f)
        }

        function g() {
            k++, k === y.length && (k = 0), h(y[k])
        }

        function h(b) {
            a(o).css("display", "block"), l = "video", j.src(b), v = !0, x ? (a("#big-video-control-container").css("display", "none"), j.ready(function () {
                j.volume(0)
            }), doLoop = !0) : (a("#big-video-control-container").css("display", "block"), j.ready(function () {
                j.volume(s)
            }), doLoop = !1), a("#big-video-image").css("display", "none"), a(o).css("display", "block")
        }

        function i(b) {
            a("#big-video-image").remove(), j.pause(), a(o).css("display", "none"), a("#big-video-control-container").css("display", "none"), l = "image";
            var d = a('<img id="big-video-image" src=' + b + " />");
            p.append(d), a("#big-video-image").imagesLoaded(function () {
                q = a("#big-video-image").width() / a("#big-video-image").height(), c()
            })
        }
        var j, k, l, m = {
                useFlashForFirefox: !0,
                forceAutoplay: !1,
                controls: !0,
                doLoop: !1,
                container: a("body")
            }, n = this,
            o = "#big-video-vid",
            p = a('<div id="big-video-wrap"></div>'),
            q = (a(""), 16 / 9),
            r = 0,
            s = .8,
            t = !1,
            u = !1,
            v = !1,
            w = !1,
            x = !1,
            y = [],
            z = a.extend({}, m, b),
            A = navigator.userAgent.toLowerCase(),
            B = -1 != A.indexOf("firefox");
        z.useFlashForFirefox && B && (VideoJS.options.techOrder = ["flash"]), n.init = function () {
            if (!t) {
                z.container.prepend(p);
                var b = z.forceAutoplay ? "autoplay" : "";
                j = a('<video id="' + o.substr(1) + '" class="video-js vjs-default-skin" preload="auto" data-setup="{}" ' + b + " webkit-playsinline></video>"), j.css("position", "absolute"), p.append(j), j = _V_(o.substr(1), {
                    controls: !1,
                    autoplay: !0,
                    preload: "auto"
                }), z.controls && d(), c(), t = !0, v = !1, z.forceAutoplay && a("body").on("click", f), a("#big-video-vid_flash_api").attr("scale", "noborder").attr("width", "100%").attr("height", "100%"), a(window).resize(function () {
                    c()
                }), j.on("loadedmetadata", function () {
                    q = document.getElementById("big-video-vid_flash_api") ? document.getElementById("big-video-vid_flash_api").vjs_getProperty("videoWidth") / document.getElementById("big-video-vid_flash_api").vjs_getProperty("videoHeight") : a("#big-video-vid_html5_api").prop("videoWidth") / a("#big-video-vid_html5_api").prop("videoHeight"), c();
                    var b = Math.round(j.duration()),
                        d = Math.floor(b / 60),
                        e = b - 60 * d;
                    10 > e && (e = "0" + e), r = d + ":" + e
                }), j.on("ended", function () {
                    z.doLoop && (j.currentTime(0), j.play()), w && g()
                })
            }
        }, n.show = function (a, b) {
            if (void 0 === b && (b = {}), x = b.ambient === !0, (x || b.doLoop) && (z.doLoop = !0), "string" == typeof a) {
                var c = a.substring(a.lastIndexOf(".") + 1);
                "jpg" === c || "gif" === c || "png" === c ? i(a) : (b.altSource && navigator.userAgent.toLowerCase().indexOf("firefox") > -1 && (a = b.altSource), h(a), w = !1)
            } else y = a, k = 0, h(y[k]), w = !0
        }, n.getPlayer = function () {
            return j
        }, n.triggerPlayer = function (a) {
            e(a)
        }
    }
}(jQuery),
function () {
    var a = /\blang(?:uage)?-(?!\*)(\w+)\b/i,
        b = self.Prism = {
            util: {
                type: function (a) {
                    return Object.prototype.toString.call(a).match(/\[object (\w+)\]/)[1]
                },
                clone: function (a) {
                    var c = b.util.type(a);
                    switch (c) {
                    case "Object":
                        var d = {};
                        for (var e in a) a.hasOwnProperty(e) && (d[e] = b.util.clone(a[e]));
                        return d;
                    case "Array":
                        return a.slice()
                    }
                    return a
                }
            },
            languages: {
                extend: function (a, c) {
                    var d = b.util.clone(b.languages[a]);
                    for (var e in c) d[e] = c[e];
                    return d
                },
                insertBefore: function (a, c, d, e) {
                    e = e || b.languages;
                    var f = e[a],
                        g = {};
                    for (var h in f)
                        if (f.hasOwnProperty(h)) {
                            if (h == c)
                                for (var i in d) d.hasOwnProperty(i) && (g[i] = d[i]);
                            g[h] = f[h]
                        }
                    return e[a] = g
                },
                DFS: function (a, c) {
                    for (var d in a) c.call(a, d, a[d]), "Object" === b.util.type(a) && b.languages.DFS(a[d], c)
                }
            },
            highlightAll: function (a, c) {
                for (var d, e = document.querySelectorAll('code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code'), f = 0; d = e[f++];) b.highlightElement(d, a === !0, c)
            },
            highlightElement: function (d, e, f) {
                for (var g, h, i = d; i && !a.test(i.className);) i = i.parentNode;
                if (i && (g = (i.className.match(a) || [, ""])[1], h = b.languages[g]), h) {
                    d.className = d.className.replace(a, "").replace(/\s+/g, " ") + " language-" + g, i = d.parentNode, /pre/i.test(i.nodeName) && (i.className = i.className.replace(a, "").replace(/\s+/g, " ") + " language-" + g);
                    var j = d.textContent;
                    if (j) {
                        j = j.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/\u00a0/g, " ");
                        var k = {
                            element: d,
                            language: g,
                            grammar: h,
                            code: j
                        };
                        if (b.hooks.run("before-highlight", k), e && self.Worker) {
                            var l = new Worker(b.filename);
                            l.onmessage = function (a) {
                                k.highlightedCode = c.stringify(JSON.parse(a.data), g), b.hooks.run("before-insert", k), k.element.innerHTML = k.highlightedCode, f && f.call(k.element), b.hooks.run("after-highlight", k)
                            }, l.postMessage(JSON.stringify({
                                language: k.language,
                                code: k.code
                            }))
                        } else k.highlightedCode = b.highlight(k.code, k.grammar, k.language), b.hooks.run("before-insert", k), k.element.innerHTML = k.highlightedCode, f && f.call(d), b.hooks.run("after-highlight", k)
                    }
                }
            },
            highlight: function (a, d, e) {
                return c.stringify(b.tokenize(a, d), e)
            },
            tokenize: function (a, c) {
                var d = b.Token,
                    e = [a],
                    f = c.rest;
                if (f) {
                    for (var g in f) c[g] = f[g];
                    delete c.rest
                }
                a: for (var g in c)
                    if (c.hasOwnProperty(g) && c[g]) {
                        var h = c[g],
                            i = h.inside,
                            j = !! h.lookbehind,
                            k = 0;
                        h = h.pattern || h;
                        for (var l = 0; l < e.length; l++) {
                            var m = e[l];
                            if (e.length > a.length) break a;
                            if (!(m instanceof d)) {
                                h.lastIndex = 0;
                                var n = h.exec(m);
                                if (n) {
                                    j && (k = n[1].length);
                                    var o = n.index - 1 + k,
                                        n = n[0].slice(k),
                                        p = n.length,
                                        q = o + p,
                                        r = m.slice(0, o + 1),
                                        s = m.slice(q + 1),
                                        t = [l, 1];
                                    r && t.push(r);
                                    var u = new d(g, i ? b.tokenize(n, i) : n);
                                    t.push(u), s && t.push(s), Array.prototype.splice.apply(e, t)
                                }
                            }
                        }
                    }
                return e
            },
            hooks: {
                all: {},
                add: function (a, c) {
                    var d = b.hooks.all;
                    d[a] = d[a] || [], d[a].push(c)
                },
                run: function (a, c) {
                    var d = b.hooks.all[a];
                    if (d && d.length)
                        for (var e, f = 0; e = d[f++];) e(c)
                }
            }
        }, c = b.Token = function (a, b) {
            this.type = a, this.content = b
        };
    if (c.stringify = function (a, d, e) {
        if ("string" == typeof a) return a;
        if ("[object Array]" == Object.prototype.toString.call(a)) return a.map(function (b) {
            return c.stringify(b, d, a)
        }).join("");
        var f = {
            type: a.type,
            content: c.stringify(a.content, d, e),
            tag: "span",
            classes: ["token", a.type],
            attributes: {},
            language: d,
            parent: e
        };
        "comment" == f.type && (f.attributes.spellcheck = "true"), b.hooks.run("wrap", f);
        var g = "";
        for (var h in f.attributes) g += h + '="' + (f.attributes[h] || "") + '"';
        return "<" + f.tag + ' class="' + f.classes.join(" ") + '" ' + g + ">" + f.content + "</" + f.tag + ">"
    }, !self.document) return void self.addEventListener("message", function (a) {
        var c = JSON.parse(a.data),
            d = c.language,
            e = c.code;
        self.postMessage(JSON.stringify(b.tokenize(e, b.languages[d]))), self.close()
    }, !1);
    var d = document.getElementsByTagName("script");
    d = d[d.length - 1], d && (b.filename = d.src, document.addEventListener && !d.hasAttribute("data-manual") && document.addEventListener("DOMContentLoaded", b.highlightAll))
}(), Prism.languages.markup = {
    comment: /&lt;!--[\w\W]*?-->/g,
    prolog: /&lt;\?.+?\?>/,
    doctype: /&lt;!DOCTYPE.+?>/,
    cdata: /&lt;!\[CDATA\[[\w\W]*?]]>/i,
    tag: {
        pattern: /&lt;\/?[\w:-]+\s*(?:\s+[\w:-]+(?:=(?:("|')(\\?[\w\W])*?\1|\w+))?\s*)*\/?>/gi,
        inside: {
            tag: {
                pattern: /^&lt;\/?[\w:-]+/i,
                inside: {
                    punctuation: /^&lt;\/?/,
                    namespace: /^[\w-]+?:/
                }
            },
            "attr-value": {
                pattern: /=(?:('|")[\w\W]*?(\1)|[^\s>]+)/gi,
                inside: {
                    punctuation: /=|>|"/g
                }
            },
            punctuation: /\/?>/g,
            "attr-name": {
                pattern: /[\w:-]+/g,
                inside: {
                    namespace: /^[\w-]+?:/
                }
            }
        }
    },
    entity: /&amp;#?[\da-z]{1,8};/gi
}, Prism.hooks.add("wrap", function (a) {
    "entity" === a.type && (a.attributes.title = a.content.replace(/&amp;/, "&"))
}), Prism.languages.css = {
    comment: /\/\*[\w\W]*?\*\//g,
    atrule: {
        pattern: /@[\w-]+?.*?(;|(?=\s*{))/gi,
        inside: {
            punctuation: /[;:]/g
        }
    },
    url: /url\((["']?).*?\1\)/gi,
    selector: /[^\{\}\s][^\{\};]*(?=\s*\{)/g,
    property: /(\b|\B)[\w-]+(?=\s*:)/gi,
    string: /("|')(\\?.)*?\1/g,
    important: /\B!important\b/gi,
    ignore: /&(lt|gt|amp);/gi,
    punctuation: /[\{\};:]/g
}, Prism.languages.markup && Prism.languages.insertBefore("markup", "tag", {
    style: {
        pattern: /(&lt;|<)style[\w\W]*?(>|&gt;)[\w\W]*?(&lt;|<)\/style(>|&gt;)/gi,
        inside: {
            tag: {
                pattern: /(&lt;|<)style[\w\W]*?(>|&gt;)|(&lt;|<)\/style(>|&gt;)/gi,
                inside: Prism.languages.markup.tag.inside
            },
            rest: Prism.languages.css
        }
    }
}), Prism.languages.css.selector = {
    pattern: /[^\{\}\s][^\{\}]*(?=\s*\{)/g,
    inside: {
        "pseudo-element": /:(?:after|before|first-letter|first-line|selection)|::[-\w]+/g,
        "pseudo-class": /:[-\w]+(?:\(.*\))?/g,
        "class": /\.[-:\.\w]+/g,
        id: /#[-:\.\w]+/g
    }
}, Prism.languages.insertBefore("css", "ignore", {
    hexcode: /#[\da-f]{3,6}/gi,
    entity: /\\[\da-f]{1,8}/gi,
    number: /[\d%\.]+/g,
    "function": /(attr|calc|cross-fade|cycle|element|hsla?|image|lang|linear-gradient|matrix3d|matrix|perspective|radial-gradient|repeating-linear-gradient|repeating-radial-gradient|rgba?|rotatex|rotatey|rotatez|rotate3d|rotate|scalex|scaley|scalez|scale3d|scale|skewx|skewy|skew|steps|translatex|translatey|translatez|translate3d|translate|url|var)/gi
}), Prism.languages.clike = {
    comment: {
        pattern: /(^|[^\\])(\/\*[\w\W]*?\*\/|(^|[^:])\/\/.*?(\r?\n|$))/g,
        lookbehind: !0
    },
    string: /("|')(\\?.)*?\1/g,
    "class-name": {
        pattern: /((?:(?:class|interface|extends|implements|trait|instanceof|new)\s+)|(?:catch\s+\())[a-z0-9_\.\\]+/gi,
        lookbehind: !0,
        inside: {
            punctuation: /(\.|\\)/
        }
    },
    keyword: /\b(if|else|while|do|for|return|in|instanceof|function|new|try|catch|finally|null|break|continue)\b/g,
    "boolean": /\b(true|false)\b/g,
    "function": {
        pattern: /[a-z0-9_]+\(/gi,
        inside: {
            punctuation: /\(/
        }
    },
    number: /\b-?(0x[\dA-Fa-f]+|\d*\.?\d+([Ee]-?\d+)?)\b/g,
    operator: /[-+]{1,2}|!|&lt;=?|>=?|={1,3}|(&amp;){1,2}|\|?\||\?|\*|\/|\~|\^|\%/g,
    ignore: /&(lt|gt|amp);/gi,
    punctuation: /[{}[\];(),.:]/g
}, Prism.languages.javascript = Prism.languages.extend("clike", {
    keyword: /\b(var|let|if|else|while|do|for|return|in|instanceof|function|new|with|typeof|try|catch|finally|null|break|continue)\b/g,
    number: /\b-?(0x[\dA-Fa-f]+|\d*\.?\d+([Ee]-?\d+)?|NaN|-?Infinity)\b/g
}), Prism.languages.insertBefore("javascript", "keyword", {
    regex: {
        pattern: /(^|[^/])\/(?!\/)(\[.+?]|\\.|[^/\r\n])+\/[gim]{0,3}(?=\s*($|[\r\n,.;})]))/g,
        lookbehind: !0
    }
}), Prism.languages.markup && Prism.languages.insertBefore("markup", "tag", {
    script: {
        pattern: /(&lt;|<)script[\w\W]*?(>|&gt;)[\w\W]*?(&lt;|<)\/script(>|&gt;)/gi,
        inside: {
            tag: {
                pattern: /(&lt;|<)script[\w\W]*?(>|&gt;)|(&lt;|<)\/script(>|&gt;)/gi,
                inside: Prism.languages.markup.tag.inside
            },
            rest: Prism.languages.javascript
        }
    }
}), Prism.hooks.add("after-highlight", function (a) {
    var b = a.element.parentNode;
    if (b && /pre/i.test(b.nodeName) && -1 !== b.className.indexOf("line-numbers")) {
        var c, d = 1 + a.code.split("\n").length;
        lines = new Array(d), lines = lines.join("<span></span>"), c = document.createElement("span"), c.className = "line-numbers-rows", c.innerHTML = lines, b.hasAttribute("data-start") && (b.style.counterReset = "linenumber " + (parseInt(b.getAttribute("data-start"), 10) - 1)), a.element.appendChild(c)
    }
}),
function (a) {
    var c, d, e = a(window),
        f = a("body"),
        g = (a(".page-wrap"), !1);
    touch = Modernizr.touch;
    var h = {
        scroll: function () {
            c = e.scrollTop(), c > 90 ? f.not(".scrolled").addClass("scrolled").removeClass("at-top") : (h.resize(), f.not(".wrapper").addClass("at-top").removeClass("scrolled"))
        },
        bgvid: function () {
            var b = a("body").attr("data-mp4-url");
			
                var c = new a.BigVideo({
                    useFlashForFirefox: !1
                });
                c.init(), c.show("https://s3.amazonaws.com/whiteboard.is/videos/bg-loop-new.mp4", {
                    altSource: "https://s3.amazonaws.com/whiteboard.is/videos/bg-loop-new.ogv",
                    ambient: !0,
                    loop: !0,
                    useFlashForFirefox: !1
                })
        },
        hiliter: function () {
            a(".hiliter").each(function () {
                var b = a(this).html(),
                    c = "<span>" + b.split(" ").join("</span> <span>") + "</span>";
                a(this).html(c)
            })
        },
        videoplayer: function () {
            var b = a(".video-player"),
                c = a("#big-video-wrap");
            a("body").on("click", ".video-player-start", function (d) {
                d.preventDefault(), c.fadeOut(300);
                var e = a(this).attr("href");
                f.addClass("video-on"), b.css("display", "block"), setTimeout(function () {
                    b.css("opacity", "1"), b.addClass("zoomed"), setTimeout(function () {
                        b.find(".iframe-wrapper").append('<iframe src="' + e + '" width="100%" height="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>')
                    }, 500)
                }, 50)
            }), b.on("click", ".close-btn", function (a) {
                a.preventDefault(), b.css("opacity", "0").removeClass("zoomed"), f.removeClass("video-on"), c.fadeIn(300), setTimeout(function () {
                    b.css("display", "none"), b.find("iframe").remove()
                }, 500)
            })
        },
        responsiveimages: function () {
            var b = 600,
                c = 1025;
            a("[data-image-small]").each(function (d, f) {
                f.sm = a(this).data("image-small"), f.med = a(this).data("image-medium"), f.lg = a(this).data("image-large"), a(this).is("img") ? e.w < b ? a(f).attr("src", a(this).attr("data-image-small")) : e.w < c ? a(f).attr("src", a(this).attr("data-image-medium")) : a(f).attr("src", a(this).attr("data-image-large")) : e.w < b ? a(f).css("background-image", "url(" + a(this).attr("data-image-small") + ")") : e.w < c ? a(f).css("background-image", "url(" + a(this).attr("data-image-medium") + ")") : a(f).css("background-image", "url(" + a(this).attr("data-image-large") + ")")
            })
        },
        resize: function () {
            h.responsiveimages()
        },
        init: function () {
			h.resize(), touch || h.bgvid(), h.videoplayer(), touch || ( e.on("scroll", h.scroll)), a(window).resize(function () {
                clearTimeout(d), g = !0, d = setTimeout(function () {
                    g === !0 && (h.resize(), g = !1)
                }, 250)
            })
        }
    };
    h.init();
}(jQuery, window);