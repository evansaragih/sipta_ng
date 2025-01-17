/*
 Highmaps JS v8.1.0 (2020-05-05)

 (c) 2011-2018 Torstein Honsi

 License: www.highcharts.com/license
*/
(function (V, N) {
	"object" === typeof module && module.exports
		? ((N["default"] = N), (module.exports = V.document ? N(V) : N))
		: "function" === typeof define && define.amd
		? define("highcharts/highmaps", function () {
				return N(V);
		  })
		: (V.Highcharts && V.Highcharts.error(16, !0), (V.Highcharts = N(V)));
})("undefined" !== typeof window ? window : this, function (V) {
	function N(c, g, G, r) {
		c.hasOwnProperty(g) || (c[g] = r.apply(null, G));
	}
	var v = {};
	N(v, "parts/Globals.js", [], function () {
		var c =
				"undefined" !== typeof V
					? V
					: "undefined" !== typeof window
					? window
					: {},
			g = c.document,
			G = (c.navigator && c.navigator.userAgent) || "",
			r =
				g &&
				g.createElementNS &&
				!!g.createElementNS("http://www.w3.org/2000/svg", "svg").createSVGRect,
			D = /(edge|msie|trident)/i.test(G) && !c.opera,
			L = -1 !== G.indexOf("Firefox"),
			K = -1 !== G.indexOf("Chrome"),
			J = L && 4 > parseInt(G.split("Firefox/")[1], 10);
		return {
			product: "Highcharts",
			version: "8.1.0",
			deg2rad: (2 * Math.PI) / 360,
			doc: g,
			hasBidiBug: J,
			hasTouch: !!c.TouchEvent,
			isMS: D,
			isWebKit: -1 !== G.indexOf("AppleWebKit"),
			isFirefox: L,
			isChrome: K,
			isSafari: !K && -1 !== G.indexOf("Safari"),
			isTouchDevice: /(Mobile|Android|Windows Phone)/.test(G),
			SVG_NS: "http://www.w3.org/2000/svg",
			chartCount: 0,
			seriesTypes: {},
			symbolSizes: {},
			svg: r,
			win: c,
			marginNames: ["plotTop", "marginRight", "marginBottom", "plotLeft"],
			noop: function () {},
			charts: [],
			dateFormats: {},
		};
	});
	N(v, "parts/Utilities.js", [v["parts/Globals.js"]], function (c) {
		function g() {
			var b,
				e = arguments,
				n = {},
				a = function (b, e) {
					"object" !== typeof b && (b = {});
					Y(e, function (n, f) {
						!G(n, !0) || p(n) || A(n)
							? (b[f] = e[f])
							: (b[f] = a(b[f] || {}, n));
					});
					return b;
				};
			!0 === e[0] && ((n = e[1]), (e = Array.prototype.slice.call(e, 2)));
			var f = e.length;
			for (b = 0; b < f; b++) n = a(n, e[b]);
			return n;
		}
		function G(b, e) {
			return !!b && "object" === typeof b && (!e || !m(b));
		}
		function r(b, e, n) {
			var f;
			z(e)
				? a(n)
					? b.setAttribute(e, n)
					: b &&
					  b.getAttribute &&
					  ((f = b.getAttribute(e)) ||
							"class" !== e ||
							(f = b.getAttribute(e + "Name")))
				: Y(e, function (e, n) {
						b.setAttribute(n, e);
				  });
			return f;
		}
		function D() {
			for (var b = arguments, e = b.length, n = 0; n < e; n++) {
				var a = b[n];
				if ("undefined" !== typeof a && null !== a) return a;
			}
		}
		function L(b, e) {
			if (!b) return e;
			var n = b.split(".").reverse();
			if (1 === n.length) return e[b];
			for (
				b = n.pop();
				"undefined" !== typeof b && "undefined" !== typeof e && null !== e;

			)
				(e = e[b]), (b = n.pop());
			return e;
		}
		c.timers = [];
		var K = c.charts,
			J = c.doc,
			B = c.win,
			E = (c.error = function (b, e, n, a) {
				var f = M(b),
					d = f
						? "Highcharts error #" +
						  b +
						  ": www.highcharts.com/errors/" +
						  b +
						  "/"
						: b.toString(),
					I = function () {
						if (e) throw Error(d);
						B.console && console.log(d);
					};
				if ("undefined" !== typeof a) {
					var h = "";
					f && (d += "?");
					Y(a, function (b, e) {
						h += "\n" + e + ": " + b;
						f && (d += encodeURI(e) + "=" + encodeURI(b));
					});
					d += h;
				}
				n ? ba(n, "displayError", { code: b, message: d, params: a }, I) : I();
			}),
			t = (function () {
				function b(b, e, n) {
					this.options = e;
					this.elem = b;
					this.prop = n;
				}
				b.prototype.dSetter = function () {
					var b = this.paths,
						e = b && b[0];
					b = b && b[1];
					var n = [],
						a = this.now || 0;
					if (1 !== a && e && b)
						if (e.length === b.length && 1 > a)
							for (var f = 0; f < b.length; f++) {
								for (var d = e[f], I = b[f], h = [], q = 0; q < I.length; q++) {
									var u = d[q],
										l = I[q];
									h[q] =
										"number" === typeof u &&
										"number" === typeof l &&
										("A" !== I[0] || (4 !== q && 5 !== q))
											? u + a * (l - u)
											: l;
								}
								n.push(h);
							}
						else n = b;
					else n = this.toD || [];
					this.elem.attr("d", n, void 0, !0);
				};
				b.prototype.update = function () {
					var b = this.elem,
						e = this.prop,
						n = this.now,
						a = this.options.step;
					if (this[e + "Setter"]) this[e + "Setter"]();
					else
						b.attr
							? b.element && b.attr(e, n, null, !0)
							: (b.style[e] = n + this.unit);
					a && a.call(b, n, this);
				};
				b.prototype.run = function (b, e, n) {
					var a = this,
						f = a.options,
						d = function (b) {
							return d.stopped ? !1 : a.step(b);
						},
						I =
							B.requestAnimationFrame ||
							function (b) {
								setTimeout(b, 13);
							},
						q = function () {
							for (var b = 0; b < c.timers.length; b++)
								c.timers[b]() || c.timers.splice(b--, 1);
							c.timers.length && I(q);
						};
					b !== e || this.elem["forceAnimate:" + this.prop]
						? ((this.startTime = +new Date()),
						  (this.start = b),
						  (this.end = e),
						  (this.unit = n),
						  (this.now = this.start),
						  (this.pos = 0),
						  (d.elem = this.elem),
						  (d.prop = this.prop),
						  d() && 1 === c.timers.push(d) && I(q))
						: (delete f.curAnim[this.prop],
						  f.complete &&
								0 === Object.keys(f.curAnim).length &&
								f.complete.call(this.elem));
				};
				b.prototype.step = function (b) {
					var e = +new Date(),
						n = this.options,
						a = this.elem,
						f = n.complete,
						d = n.duration,
						I = n.curAnim;
					if (a.attr && !a.element) b = !1;
					else if (b || e >= d + this.startTime) {
						this.now = this.end;
						this.pos = 1;
						this.update();
						var q = (I[this.prop] = !0);
						Y(I, function (b) {
							!0 !== b && (q = !1);
						});
						q && f && f.call(a);
						b = !1;
					} else
						(this.pos = n.easing((e - this.startTime) / d)),
							(this.now = this.start + (this.end - this.start) * this.pos),
							this.update(),
							(b = !0);
					return b;
				};
				b.prototype.initPath = function (b, e, n) {
					function a(b, e) {
						for (; b.length < O; ) {
							var n = b[0],
								a = e[O - b.length];
							a &&
								"M" === n[0] &&
								(b[0] =
									"C" === a[0]
										? ["C", n[1], n[2], n[1], n[2], n[1], n[2]]
										: ["L", n[1], n[2]]);
							b.unshift(n);
							q && b.push(b[b.length - 1]);
						}
					}
					function f(b, e) {
						for (; b.length < O; )
							if (
								((e = b[b.length / h - 1].slice()),
								"C" === e[0] && ((e[1] = e[5]), (e[2] = e[6])),
								q)
							) {
								var n = b[b.length / h].slice();
								b.splice(b.length / 2, 0, e, n);
							} else b.push(e);
					}
					var d = b.startX,
						I = b.endX;
					e = e && e.slice();
					n = n.slice();
					var q = b.isArea,
						h = q ? 2 : 1;
					if (!e) return [n, n];
					if (d && I) {
						for (b = 0; b < d.length; b++)
							if (d[b] === I[0]) {
								var u = b;
								break;
							} else if (d[0] === I[I.length - d.length + b]) {
								u = b;
								var l = !0;
								break;
							} else if (d[d.length - 1] === I[I.length - d.length + b]) {
								u = d.length - b;
								break;
							}
						"undefined" === typeof u && (e = []);
					}
					if (e.length && M(u)) {
						var O = n.length + u * h;
						l ? (a(e, n), f(n, e)) : (a(n, e), f(e, n));
					}
					return [e, n];
				};
				b.prototype.fillSetter = function () {
					b.prototype.strokeSetter.apply(this, arguments);
				};
				b.prototype.strokeSetter = function () {
					this.elem.attr(
						this.prop,
						c.color(this.start).tweenTo(c.color(this.end), this.pos),
						null,
						!0
					);
				};
				return b;
			})();
		c.Fx = t;
		c.merge = g;
		var x = (c.pInt = function (b, e) {
				return parseInt(b, e || 10);
			}),
			z = (c.isString = function (b) {
				return "string" === typeof b;
			}),
			m = (c.isArray = function (b) {
				b = Object.prototype.toString.call(b);
				return "[object Array]" === b || "[object Array Iterator]" === b;
			});
		c.isObject = G;
		var A = (c.isDOMElement = function (b) {
				return G(b) && "number" === typeof b.nodeType;
			}),
			p = (c.isClass = function (b) {
				var e = b && b.constructor;
				return !(!G(b, !0) || A(b) || !e || !e.name || "Object" === e.name);
			}),
			M = (c.isNumber = function (b) {
				return (
					"number" === typeof b && !isNaN(b) && Infinity > b && -Infinity < b
				);
			}),
			k = (c.erase = function (b, e) {
				for (var n = b.length; n--; )
					if (b[n] === e) {
						b.splice(n, 1);
						break;
					}
			}),
			a = (c.defined = function (b) {
				return "undefined" !== typeof b && null !== b;
			});
		c.attr = r;
		var d = (c.splat = function (b) {
				return m(b) ? b : [b];
			}),
			l = (c.syncTimeout = function (b, e, n) {
				if (0 < e) return setTimeout(b, e, n);
				b.call(0, n);
				return -1;
			}),
			h = (c.clearTimeout = function (b) {
				a(b) && clearTimeout(b);
			}),
			f = (c.extend = function (b, e) {
				var n;
				b || (b = {});
				for (n in e) b[n] = e[n];
				return b;
			});
		c.pick = D;
		var q = (c.css = function (b, e) {
				c.isMS &&
					!c.svg &&
					e &&
					"undefined" !== typeof e.opacity &&
					(e.filter = "alpha(opacity=" + 100 * e.opacity + ")");
				f(b.style, e);
			}),
			u = (c.createElement = function (b, e, n, a, d) {
				b = J.createElement(b);
				e && f(b, e);
				d && q(b, { padding: "0", border: "none", margin: "0" });
				n && q(b, n);
				a && a.appendChild(b);
				return b;
			}),
			F = (c.extendClass = function (b, e) {
				var n = function () {};
				n.prototype = new b();
				f(n.prototype, e);
				return n;
			}),
			w = (c.pad = function (b, e, n) {
				return (
					Array((e || 2) + 1 - String(b).replace("-", "").length).join(
						n || "0"
					) + b
				);
			}),
			H = (c.relativeLength = function (b, e, n) {
				return /%$/.test(b)
					? (e * parseFloat(b)) / 100 + (n || 0)
					: parseFloat(b);
			}),
			y = (c.wrap = function (b, e, n) {
				var a = b[e];
				b[e] = function () {
					var b = Array.prototype.slice.call(arguments),
						e = arguments,
						f = this;
					f.proceed = function () {
						a.apply(f, arguments.length ? arguments : e);
					};
					b.unshift(a);
					b = n.apply(this, b);
					f.proceed = null;
					return b;
				};
			}),
			Q = (c.format = function (b, e, n) {
				var a = "{",
					f = !1,
					d = [],
					I = /f$/,
					q = /\.([0-9])/,
					h = c.defaultOptions.lang,
					u = (n && n.time) || c.time;
				for (n = (n && n.numberFormatter) || U; b; ) {
					var l = b.indexOf(a);
					if (-1 === l) break;
					var O = b.slice(0, l);
					if (f) {
						O = O.split(":");
						a = L(O.shift() || "", e);
						if (O.length && "number" === typeof a)
							if (((O = O.join(":")), I.test(O))) {
								var k = parseInt((O.match(q) || ["", "-1"])[1], 10);
								null !== a &&
									(a = n(
										a,
										k,
										h.decimalPoint,
										-1 < O.indexOf(",") ? h.thousandsSep : ""
									));
							} else a = u.dateFormat(O, a);
						d.push(a);
					} else d.push(O);
					b = b.slice(l + 1);
					a = (f = !f) ? "}" : "{";
				}
				d.push(b);
				return d.join("");
			}),
			P = (c.getMagnitude = function (b) {
				return Math.pow(10, Math.floor(Math.log(b) / Math.LN10));
			}),
			C = (c.normalizeTickInterval = function (b, e, n, a, f) {
				var d = b;
				n = D(n, 1);
				var I = b / n;
				e ||
					((e = f
						? [1, 1.2, 1.5, 2, 2.5, 3, 4, 5, 6, 8, 10]
						: [1, 2, 2.5, 5, 10]),
					!1 === a &&
						(1 === n
							? (e = e.filter(function (b) {
									return 0 === b % 1;
							  }))
							: 0.1 >= n && (e = [1 / n])));
				for (
					a = 0;
					a < e.length &&
					!((d = e[a]),
					(f && d * n >= b) || (!f && I <= (e[a] + (e[a + 1] || e[a])) / 2));
					a++
				);
				return (d = T(d * n, -Math.round(Math.log(0.001) / Math.LN10)));
			}),
			e = (c.stableSort = function (b, e) {
				var n = b.length,
					a,
					f;
				for (f = 0; f < n; f++) b[f].safeI = f;
				b.sort(function (b, n) {
					a = e(b, n);
					return 0 === a ? b.safeI - n.safeI : a;
				});
				for (f = 0; f < n; f++) delete b[f].safeI;
			}),
			b = (c.arrayMin = function (b) {
				for (var e = b.length, n = b[0]; e--; ) b[e] < n && (n = b[e]);
				return n;
			}),
			n = (c.arrayMax = function (b) {
				for (var e = b.length, n = b[0]; e--; ) b[e] > n && (n = b[e]);
				return n;
			}),
			I = (c.destroyObjectProperties = function (b, e) {
				Y(b, function (n, a) {
					n && n !== e && n.destroy && n.destroy();
					delete b[a];
				});
			}),
			O = (c.discardElement = function (b) {
				var e = c.garbageBin;
				e || (e = u("div"));
				b && e.appendChild(b);
				e.innerHTML = "";
			}),
			T = (c.correctFloat = function (b, e) {
				return parseFloat(b.toPrecision(e || 14));
			}),
			Z = (c.setAnimation = function (b, e) {
				e.renderer.globalAnimation = D(b, e.options.chart.animation, !0);
			}),
			aa = (c.animObject = function (b) {
				return G(b) ? g(b) : { duration: b ? 500 : 0 };
			}),
			W = (c.timeUnits = {
				millisecond: 1,
				second: 1e3,
				minute: 6e4,
				hour: 36e5,
				day: 864e5,
				week: 6048e5,
				month: 24192e5,
				year: 314496e5,
			}),
			U = (c.numberFormat = function (b, e, n, a) {
				b = +b || 0;
				e = +e;
				var f = c.defaultOptions.lang,
					d = (b.toString().split(".")[1] || "").split("e")[0].length,
					I = b.toString().split("e");
				if (-1 === e) e = Math.min(d, 20);
				else if (!M(e)) e = 2;
				else if (e && I[1] && 0 > I[1]) {
					var q = e + +I[1];
					0 <= q
						? ((I[0] = (+I[0]).toExponential(q).split("e")[0]), (e = q))
						: ((I[0] = I[0].split(".")[0] || 0),
						  (b = 20 > e ? (I[0] * Math.pow(10, I[1])).toFixed(e) : 0),
						  (I[1] = 0));
				}
				var h = (
					Math.abs(I[1] ? I[0] : b) + Math.pow(10, -Math.max(e, d) - 1)
				).toFixed(e);
				d = String(x(h));
				q = 3 < d.length ? d.length % 3 : 0;
				n = D(n, f.decimalPoint);
				a = D(a, f.thousandsSep);
				b = (0 > b ? "-" : "") + (q ? d.substr(0, q) + a : "");
				b += d.substr(q).replace(/(\d{3})(?=\d)/g, "$1" + a);
				e && (b += n + h.slice(-e));
				I[1] && 0 !== +b && (b += "e" + I[1]);
				return b;
			});
		Math.easeInOutSine = function (b) {
			return -0.5 * (Math.cos(Math.PI * b) - 1);
		};
		var S = (c.getStyle = function (b, e, n) {
				if ("width" === e)
					return (
						(e = Math.min(b.offsetWidth, b.scrollWidth)),
						(n = b.getBoundingClientRect && b.getBoundingClientRect().width),
						n < e && n >= e - 1 && (e = Math.floor(n)),
						Math.max(
							0,
							e - c.getStyle(b, "padding-left") - c.getStyle(b, "padding-right")
						)
					);
				if ("height" === e)
					return Math.max(
						0,
						Math.min(b.offsetHeight, b.scrollHeight) -
							c.getStyle(b, "padding-top") -
							c.getStyle(b, "padding-bottom")
					);
				B.getComputedStyle || E(27, !0);
				if ((b = B.getComputedStyle(b, void 0)))
					(b = b.getPropertyValue(e)), D(n, "opacity" !== e) && (b = x(b));
				return b;
			}),
			X = (c.inArray = function (b, e, n) {
				return e.indexOf(b, n);
			}),
			R = (c.find = Array.prototype.find
				? function (b, e) {
						return b.find(e);
				  }
				: function (b, e) {
						var n,
							a = b.length;
						for (n = 0; n < a; n++) if (e(b[n], n)) return b[n];
				  });
		c.keys = Object.keys;
		var ca = (c.offset = function (b) {
				var e = J.documentElement;
				b =
					b.parentElement || b.parentNode
						? b.getBoundingClientRect()
						: { top: 0, left: 0 };
				return {
					top: b.top + (B.pageYOffset || e.scrollTop) - (e.clientTop || 0),
					left: b.left + (B.pageXOffset || e.scrollLeft) - (e.clientLeft || 0),
				};
			}),
			da = (c.stop = function (b, e) {
				for (var n = c.timers.length; n--; )
					c.timers[n].elem !== b ||
						(e && e !== c.timers[n].prop) ||
						(c.timers[n].stopped = !0);
			}),
			Y = (c.objectEach = function (b, e, n) {
				for (var a in b)
					Object.hasOwnProperty.call(b, a) && e.call(n || b[a], b[a], a, b);
			});
		Y(
			{
				map: "map",
				each: "forEach",
				grep: "filter",
				reduce: "reduce",
				some: "some",
			},
			function (b, e) {
				c[e] = function (e) {
					return Array.prototype[b].apply(e, [].slice.call(arguments, 1));
				};
			}
		);
		var v = (c.addEvent = function (b, e, n, a) {
				void 0 === a && (a = {});
				var f = b.addEventListener || c.addEventListenerPolyfill;
				var d =
					"function" === typeof b && b.prototype
						? (b.prototype.protoEvents = b.prototype.protoEvents || {})
						: (b.hcEvents = b.hcEvents || {});
				c.Point &&
					b instanceof c.Point &&
					b.series &&
					b.series.chart &&
					(b.series.chart.runTrackerClick = !0);
				f && f.call(b, e, n, !1);
				d[e] || (d[e] = []);
				d[e].push({
					fn: n,
					order: "number" === typeof a.order ? a.order : Infinity,
				});
				d[e].sort(function (b, e) {
					return b.order - e.order;
				});
				return function () {
					ea(b, e, n);
				};
			}),
			ea = (c.removeEvent = function (b, e, n) {
				function a(e, n) {
					var a = b.removeEventListener || c.removeEventListenerPolyfill;
					a && a.call(b, e, n, !1);
				}
				function f(n) {
					var f;
					if (b.nodeName) {
						if (e) {
							var d = {};
							d[e] = !0;
						} else d = n;
						Y(d, function (b, e) {
							if (n[e]) for (f = n[e].length; f--; ) a(e, n[e][f].fn);
						});
					}
				}
				var d;
				["protoEvents", "hcEvents"].forEach(function (I, q) {
					var h = (q = q ? b : b.prototype) && q[I];
					h &&
						(e
							? ((d = h[e] || []),
							  n
									? ((h[e] = d.filter(function (b) {
											return n !== b.fn;
									  })),
									  a(e, n))
									: (f(h), (h[e] = [])))
							: (f(h), (q[I] = {})));
				});
			}),
			ba = (c.fireEvent = function (b, e, n, a) {
				var d;
				n = n || {};
				if (J.createEvent && (b.dispatchEvent || b.fireEvent)) {
					var I = J.createEvent("Events");
					I.initEvent(e, !0, !0);
					f(I, n);
					b.dispatchEvent ? b.dispatchEvent(I) : b.fireEvent(e, I);
				} else
					n.target ||
						f(n, {
							preventDefault: function () {
								n.defaultPrevented = !0;
							},
							target: b,
							type: e,
						}),
						(function (e, a) {
							void 0 === e && (e = []);
							void 0 === a && (a = []);
							var f = 0,
								I = 0,
								q = e.length + a.length;
							for (d = 0; d < q; d++)
								!1 ===
									(e[f]
										? a[I]
											? e[f].order <= a[I].order
												? e[f++]
												: a[I++]
											: e[f++]
										: a[I++]
									).fn.call(b, n) && n.preventDefault();
						})(b.protoEvents && b.protoEvents[e], b.hcEvents && b.hcEvents[e]);
				a && !n.defaultPrevented && a.call(b, n);
			}),
			ha = (c.animate = function (b, e, n) {
				var a,
					f = "",
					d,
					I;
				if (!G(n)) {
					var q = arguments;
					n = { duration: q[2], easing: q[3], complete: q[4] };
				}
				M(n.duration) || (n.duration = 400);
				n.easing =
					"function" === typeof n.easing
						? n.easing
						: Math[n.easing] || Math.easeInOutSine;
				n.curAnim = g(e);
				Y(e, function (q, h) {
					da(b, h);
					I = new t(b, n, h);
					d = null;
					"d" === h && m(e.d)
						? ((I.paths = I.initPath(b, b.pathArray, e.d)),
						  (I.toD = e.d),
						  (a = 0),
						  (d = 1))
						: b.attr
						? (a = b.attr(h))
						: ((a = parseFloat(S(b, h)) || 0), "opacity" !== h && (f = "px"));
					d || (d = q);
					d && d.match && d.match("px") && (d = d.replace(/px/g, ""));
					I.run(a, d, f);
				});
			}),
			ia = (c.seriesType = function (b, e, n, a, f) {
				var d = c.getOptions(),
					I = c.seriesTypes;
				d.plotOptions[b] = g(d.plotOptions[e], n);
				I[b] = F(I[e] || function () {}, a);
				I[b].prototype.type = b;
				f && (I[b].prototype.pointClass = F(c.Point, f));
				return I[b];
			}),
			fa = (c.uniqueKey = (function () {
				var b = Math.random().toString(36).substring(2, 9),
					e = 0;
				return function () {
					return "highcharts-" + b + "-" + e++;
				};
			})()),
			N = (c.isFunction = function (b) {
				return "function" === typeof b;
			});
		B.jQuery &&
			(B.jQuery.fn.highcharts = function () {
				var b = [].slice.call(arguments);
				if (this[0])
					return b[0]
						? (new c[z(b[0]) ? b.shift() : "Chart"](this[0], b[0], b[1]), this)
						: K[r(this[0], "data-highcharts-chart")];
			});
		return {
			Fx: c.Fx,
			addEvent: v,
			animate: ha,
			animObject: aa,
			arrayMax: n,
			arrayMin: b,
			attr: r,
			clamp: function (b, e, n) {
				return b > e ? (b < n ? b : n) : e;
			},
			clearTimeout: h,
			correctFloat: T,
			createElement: u,
			css: q,
			defined: a,
			destroyObjectProperties: I,
			discardElement: O,
			erase: k,
			error: E,
			extend: f,
			extendClass: F,
			find: R,
			fireEvent: ba,
			format: Q,
			getMagnitude: P,
			getNestedProperty: L,
			getStyle: S,
			inArray: X,
			isArray: m,
			isClass: p,
			isDOMElement: A,
			isFunction: N,
			isNumber: M,
			isObject: G,
			isString: z,
			merge: g,
			normalizeTickInterval: C,
			numberFormat: U,
			objectEach: Y,
			offset: ca,
			pad: w,
			pick: D,
			pInt: x,
			relativeLength: H,
			removeEvent: ea,
			seriesType: ia,
			setAnimation: Z,
			splat: d,
			stableSort: e,
			stop: da,
			syncTimeout: l,
			timeUnits: W,
			uniqueKey: fa,
			wrap: y,
		};
	});
	N(
		v,
		"parts/Color.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var G = g.isNumber,
				r = g.merge,
				D = g.pInt;
			g = (function () {
				function c(g) {
					this.parsers = [
						{
							regex: /rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]?(?:\.[0-9]+)?)\s*\)/,
							parse: function (c) {
								return [D(c[1]), D(c[2]), D(c[3]), parseFloat(c[4], 10)];
							},
						},
						{
							regex: /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/,
							parse: function (c) {
								return [D(c[1]), D(c[2]), D(c[3]), 1];
							},
						},
					];
					this.rgba = [];
					if (!(this instanceof c)) return new c(g);
					this.init(g);
				}
				c.parse = function (g) {
					return new c(g);
				};
				c.prototype.init = function (g) {
					var r, B;
					if (
						(this.input = g =
							c.names[g && g.toLowerCase ? g.toLowerCase() : ""] || g) &&
						g.stops
					)
						this.stops = g.stops.map(function (t) {
							return new c(t[1]);
						});
					else {
						if (g && g.charAt && "#" === g.charAt()) {
							var E = g.length;
							g = parseInt(g.substr(1), 16);
							7 === E
								? (r = [(g & 16711680) >> 16, (g & 65280) >> 8, g & 255, 1])
								: 4 === E &&
								  (r = [
										((g & 3840) >> 4) | ((g & 3840) >> 8),
										((g & 240) >> 4) | (g & 240),
										((g & 15) << 4) | (g & 15),
										1,
								  ]);
						}
						if (!r)
							for (B = this.parsers.length; B-- && !r; ) {
								var t = this.parsers[B];
								(E = t.regex.exec(g)) && (r = t.parse(E));
							}
					}
					this.rgba = r || [];
				};
				c.prototype.get = function (c) {
					var g = this.input,
						B = this.rgba;
					if ("undefined" !== typeof this.stops) {
						var E = r(g);
						E.stops = [].concat(E.stops);
						this.stops.forEach(function (t, x) {
							E.stops[x] = [E.stops[x][0], t.get(c)];
						});
					} else
						E =
							B && G(B[0])
								? "rgb" === c || (!c && 1 === B[3])
									? "rgb(" + B[0] + "," + B[1] + "," + B[2] + ")"
									: "a" === c
									? B[3]
									: "rgba(" + B.join(",") + ")"
								: g;
					return E;
				};
				c.prototype.brighten = function (c) {
					var g,
						B = this.rgba;
					if (this.stops)
						this.stops.forEach(function (g) {
							g.brighten(c);
						});
					else if (G(c) && 0 !== c)
						for (g = 0; 3 > g; g++)
							(B[g] += D(255 * c)),
								0 > B[g] && (B[g] = 0),
								255 < B[g] && (B[g] = 255);
					return this;
				};
				c.prototype.setOpacity = function (c) {
					this.rgba[3] = c;
					return this;
				};
				c.prototype.tweenTo = function (c, g) {
					var B = this.rgba,
						r = c.rgba;
					r.length && B && B.length
						? ((c = 1 !== r[3] || 1 !== B[3]),
						  (g =
								(c ? "rgba(" : "rgb(") +
								Math.round(r[0] + (B[0] - r[0]) * (1 - g)) +
								"," +
								Math.round(r[1] + (B[1] - r[1]) * (1 - g)) +
								"," +
								Math.round(r[2] + (B[2] - r[2]) * (1 - g)) +
								(c ? "," + (r[3] + (B[3] - r[3]) * (1 - g)) : "") +
								")"))
						: (g = c.input || "none");
					return g;
				};
				c.names = { white: "#ffffff", black: "#000000" };
				return c;
			})();
			c.Color = g;
			c.color = g.parse;
			return c.Color;
		}
	);
	N(
		v,
		"parts/SVGElement.js",
		[v["parts/Color.js"], v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g, G) {
			var r = g.deg2rad,
				D = g.doc,
				L = g.hasTouch,
				K = g.isFirefox,
				J = g.noop,
				B = g.svg,
				E = g.SVG_NS,
				t = g.win,
				x = G.animate,
				z = G.animObject,
				m = G.attr,
				A = G.createElement,
				p = G.css,
				M = G.defined,
				k = G.erase,
				a = G.extend,
				d = G.fireEvent,
				l = G.inArray,
				h = G.isArray,
				f = G.isFunction,
				q = G.isNumber,
				u = G.isString,
				F = G.merge,
				w = G.objectEach,
				H = G.pick,
				y = G.pInt,
				Q = G.stop,
				P = G.uniqueKey;
			G = (function () {
				function C() {
					this.height = this.element = void 0;
					this.opacity = 1;
					this.renderer = void 0;
					this.SVG_NS = E;
					this.symbolCustomAttribs = "x y width height r start end innerR anchorX anchorY rounded".split(
						" "
					);
					this.textProps = "color cursor direction fontFamily fontSize fontStyle fontWeight lineHeight textAlign textDecoration textOutline textOverflow width".split(
						" "
					);
					this.width = void 0;
				}
				C.prototype._defaultGetter = function (e) {
					e = H(
						this[e + "Value"],
						this[e],
						this.element ? this.element.getAttribute(e) : null,
						0
					);
					/^[\-0-9\.]+$/.test(e) && (e = parseFloat(e));
					return e;
				};
				C.prototype._defaultSetter = function (e, b, n) {
					n.setAttribute(b, e);
				};
				C.prototype.add = function (e) {
					var b = this.renderer,
						n = this.element;
					e && (this.parentGroup = e);
					this.parentInverted = e && e.inverted;
					"undefined" !== typeof this.textStr && b.buildText(this);
					this.added = !0;
					if (!e || e.handleZ || this.zIndex) var a = this.zIndexSetter();
					a || (e ? e.element : b.box).appendChild(n);
					if (this.onAdd) this.onAdd();
					return this;
				};
				C.prototype.addClass = function (e, b) {
					var n = b ? "" : this.attr("class") || "";
					e = (e || "")
						.split(/ /g)
						.reduce(
							function (b, e) {
								-1 === n.indexOf(e) && b.push(e);
								return b;
							},
							n ? [n] : []
						)
						.join(" ");
					e !== n && this.attr("class", e);
					return this;
				};
				C.prototype.afterSetters = function () {
					this.doTransform && (this.updateTransform(), (this.doTransform = !1));
				};
				C.prototype.align = function (e, b, n) {
					var a,
						f = {};
					var d = this.renderer;
					var q = d.alignedObjects;
					var h, l;
					if (e) {
						if (
							((this.alignOptions = e), (this.alignByTranslate = b), !n || u(n))
						)
							(this.alignTo = a = n || "renderer"),
								k(q, this),
								q.push(this),
								(n = void 0);
					} else
						(e = this.alignOptions),
							(b = this.alignByTranslate),
							(a = this.alignTo);
					n = H(n, d[a], d);
					a = e.align;
					d = e.verticalAlign;
					q = (n.x || 0) + (e.x || 0);
					var w = (n.y || 0) + (e.y || 0);
					"right" === a ? (h = 1) : "center" === a && (h = 2);
					h && (q += (n.width - (e.width || 0)) / h);
					f[b ? "translateX" : "x"] = Math.round(q);
					"bottom" === d ? (l = 1) : "middle" === d && (l = 2);
					l && (w += (n.height - (e.height || 0)) / l);
					f[b ? "translateY" : "y"] = Math.round(w);
					this[this.placed ? "animate" : "attr"](f);
					this.placed = !0;
					this.alignAttr = f;
					return this;
				};
				C.prototype.alignSetter = function (e) {
					var b = { left: "start", center: "middle", right: "end" };
					b[e] &&
						((this.alignValue = e),
						this.element.setAttribute("text-anchor", b[e]));
				};
				C.prototype.animate = function (e, b, n) {
					var a = z(H(b, this.renderer.globalAnimation, !0));
					H(D.hidden, D.msHidden, D.webkitHidden, !1) && (a.duration = 0);
					0 !== a.duration
						? (n && (a.complete = n), x(this, e, a))
						: (this.attr(e, void 0, n),
						  w(
								e,
								function (b, e) {
									a.step && a.step.call(this, b, { prop: e, pos: 1 });
								},
								this
						  ));
					return this;
				};
				C.prototype.applyTextOutline = function (e) {
					var b = this.element,
						n;
					-1 !== e.indexOf("contrast") &&
						(e = e.replace(
							/contrast/g,
							this.renderer.getContrast(b.style.fill)
						));
					e = e.split(" ");
					var a = e[e.length - 1];
					if ((n = e[0]) && "none" !== n && g.svg) {
						this.fakeTS = !0;
						e = [].slice.call(b.getElementsByTagName("tspan"));
						this.ySetter = this.xSetter;
						n = n.replace(/(^[\d\.]+)(.*?)$/g, function (b, e, n) {
							return 2 * e + n;
						});
						this.removeTextOutline(e);
						var f = b.textContent
							? /^[\u0591-\u065F\u066A-\u07FF\uFB1D-\uFDFD\uFE70-\uFEFC]/.test(
									b.textContent
							  )
							: !1;
						var d = b.firstChild;
						e.forEach(function (e, I) {
							0 === I &&
								(e.setAttribute("x", b.getAttribute("x")),
								(I = b.getAttribute("y")),
								e.setAttribute("y", I || 0),
								null === I && b.setAttribute("y", 0));
							I = e.cloneNode(!0);
							m(f && !K ? e : I, {
								class: "highcharts-text-outline",
								fill: a,
								stroke: a,
								"stroke-width": n,
								"stroke-linejoin": "round",
							});
							b.insertBefore(I, d);
						});
						f &&
							K &&
							e[0] &&
							((e = e[0].cloneNode(!0)),
							(e.textContent = " "),
							b.insertBefore(e, d));
					}
				};
				C.prototype.attr = function (e, b, n, a) {
					var f = this.element,
						d,
						I = this,
						q,
						h,
						u = this.symbolCustomAttribs;
					if ("string" === typeof e && "undefined" !== typeof b) {
						var k = e;
						e = {};
						e[k] = b;
					}
					"string" === typeof e
						? (I = (this[e + "Getter"] || this._defaultGetter).call(this, e, f))
						: (w(
								e,
								function (b, n) {
									q = !1;
									a || Q(this, n);
									this.symbolName &&
										-1 !== l(n, u) &&
										(d || (this.symbolAttr(e), (d = !0)), (q = !0));
									!this.rotation ||
										("x" !== n && "y" !== n) ||
										(this.doTransform = !0);
									q ||
										((h = this[n + "Setter"] || this._defaultSetter),
										h.call(this, b, n, f),
										!this.styledMode &&
											this.shadows &&
											/^(width|height|visibility|x|y|d|transform|cx|cy|r)$/.test(
												n
											) &&
											this.updateShadows(n, b, h));
								},
								this
						  ),
						  this.afterSetters());
					n && n.call(this);
					return I;
				};
				C.prototype.clip = function (e) {
					return this.attr(
						"clip-path",
						e ? "url(" + this.renderer.url + "#" + e.id + ")" : "none"
					);
				};
				C.prototype.crisp = function (e, b) {
					b = b || e.strokeWidth || 0;
					var n = (Math.round(b) % 2) / 2;
					e.x = Math.floor(e.x || this.x || 0) + n;
					e.y = Math.floor(e.y || this.y || 0) + n;
					e.width = Math.floor((e.width || this.width || 0) - 2 * n);
					e.height = Math.floor((e.height || this.height || 0) - 2 * n);
					M(e.strokeWidth) && (e.strokeWidth = b);
					return e;
				};
				C.prototype.complexColor = function (e, b, n) {
					var a = this.renderer,
						f,
						q,
						u,
						l,
						k,
						H,
						y,
						p,
						R,
						A,
						m = [],
						g;
					d(this.renderer, "complexColor", { args: arguments }, function () {
						e.radialGradient
							? (q = "radialGradient")
							: e.linearGradient && (q = "linearGradient");
						if (q) {
							u = e[q];
							k = a.gradients;
							H = e.stops;
							R = n.radialReference;
							h(u) &&
								(e[q] = u = {
									x1: u[0],
									y1: u[1],
									x2: u[2],
									y2: u[3],
									gradientUnits: "userSpaceOnUse",
								});
							"radialGradient" === q &&
								R &&
								!M(u.gradientUnits) &&
								((l = u),
								(u = F(u, a.getRadialAttr(R, l), {
									gradientUnits: "userSpaceOnUse",
								})));
							w(u, function (b, e) {
								"id" !== e && m.push(e, b);
							});
							w(H, function (b) {
								m.push(b);
							});
							m = m.join(",");
							if (k[m]) A = k[m].attr("id");
							else {
								u.id = A = P();
								var d = (k[m] = a.createElement(q).attr(u).add(a.defs));
								d.radAttr = l;
								d.stops = [];
								H.forEach(function (b) {
									0 === b[1].indexOf("rgba")
										? ((f = c.parse(b[1])),
										  (y = f.get("rgb")),
										  (p = f.get("a")))
										: ((y = b[1]), (p = 1));
									b = a
										.createElement("stop")
										.attr({ offset: b[0], "stop-color": y, "stop-opacity": p })
										.add(d);
									d.stops.push(b);
								});
							}
							g = "url(" + a.url + "#" + A + ")";
							n.setAttribute(b, g);
							n.gradient = m;
							e.toString = function () {
								return g;
							};
						}
					});
				};
				C.prototype.css = function (e) {
					var b = this.styles,
						n = {},
						f = this.element,
						d = "",
						q = !b,
						h = ["textOutline", "textOverflow", "width"];
					e && e.color && (e.fill = e.color);
					b &&
						w(e, function (e, a) {
							b && b[a] !== e && ((n[a] = e), (q = !0));
						});
					if (q) {
						b && (e = a(b, n));
						if (e)
							if (null === e.width || "auto" === e.width) delete this.textWidth;
							else if ("text" === f.nodeName.toLowerCase() && e.width)
								var u = (this.textWidth = y(e.width));
						this.styles = e;
						u && !B && this.renderer.forExport && delete e.width;
						if (f.namespaceURI === this.SVG_NS) {
							var l = function (b, e) {
								return "-" + e.toLowerCase();
							};
							w(e, function (b, e) {
								-1 === h.indexOf(e) &&
									(d += e.replace(/([A-Z])/g, l) + ":" + b + ";");
							});
							d && m(f, "style", d);
						} else p(f, e);
						this.added &&
							("text" === this.element.nodeName &&
								this.renderer.buildText(this),
							e && e.textOutline && this.applyTextOutline(e.textOutline));
					}
					return this;
				};
				C.prototype.dashstyleSetter = function (e) {
					var b = this["stroke-width"];
					"inherit" === b && (b = 1);
					if ((e = e && e.toLowerCase())) {
						var n = e
							.replace("shortdashdotdot", "3,1,1,1,1,1,")
							.replace("shortdashdot", "3,1,1,1")
							.replace("shortdot", "1,1,")
							.replace("shortdash", "3,1,")
							.replace("longdash", "8,3,")
							.replace(/dot/g, "1,3,")
							.replace("dash", "4,3,")
							.replace(/,$/, "")
							.split(",");
						for (e = n.length; e--; ) n[e] = "" + y(n[e]) * H(b, NaN);
						e = n.join(",").replace(/NaN/g, "none");
						this.element.setAttribute("stroke-dasharray", e);
					}
				};
				C.prototype.destroy = function () {
					var e = this,
						b = e.element || {},
						n = e.renderer,
						a = (n.isSVG && "SPAN" === b.nodeName && e.parentGroup) || void 0,
						f = b.ownerSVGElement;
					b.onclick = b.onmouseout = b.onmouseover = b.onmousemove = b.point = null;
					Q(e);
					if (e.clipPath && f) {
						var d = e.clipPath;
						[].forEach.call(
							f.querySelectorAll("[clip-path],[CLIP-PATH]"),
							function (b) {
								-1 < b.getAttribute("clip-path").indexOf(d.element.id) &&
									b.removeAttribute("clip-path");
							}
						);
						e.clipPath = d.destroy();
					}
					if (e.stops) {
						for (f = 0; f < e.stops.length; f++) e.stops[f].destroy();
						e.stops.length = 0;
						e.stops = void 0;
					}
					e.safeRemoveChild(b);
					for (
						n.styledMode || e.destroyShadows();
						a && a.div && 0 === a.div.childNodes.length;

					)
						(b = a.parentGroup),
							e.safeRemoveChild(a.div),
							delete a.div,
							(a = b);
					e.alignTo && k(n.alignedObjects, e);
					w(e, function (b, n) {
						e[n] && e[n].parentGroup === e && e[n].destroy && e[n].destroy();
						delete e[n];
					});
				};
				C.prototype.destroyShadows = function () {
					(this.shadows || []).forEach(function (e) {
						this.safeRemoveChild(e);
					}, this);
					this.shadows = void 0;
				};
				C.prototype.destroyTextPath = function (e, b) {
					var n = e.getElementsByTagName("text")[0];
					if (n) {
						if (
							(n.removeAttribute("dx"),
							n.removeAttribute("dy"),
							b.element.setAttribute("id", ""),
							this.textPathWrapper && n.getElementsByTagName("textPath").length)
						) {
							for (e = this.textPathWrapper.element.childNodes; e.length; )
								n.appendChild(e[0]);
							n.removeChild(this.textPathWrapper.element);
						}
					} else if (e.getAttribute("dx") || e.getAttribute("dy"))
						e.removeAttribute("dx"), e.removeAttribute("dy");
					this.textPathWrapper &&
						(this.textPathWrapper = this.textPathWrapper.destroy());
				};
				C.prototype.dSetter = function (e, b, n) {
					h(e) &&
						("string" === typeof e[0] && (e = this.renderer.pathToSegments(e)),
						(this.pathArray = e),
						(e = e.reduce(function (b, e, n) {
							return e && e.join
								? (n ? b + " " : "") + e.join(" ")
								: (e || "").toString();
						}, "")));
					/(NaN| {2}|^$)/.test(e) && (e = "M 0 0");
					this[b] !== e && (n.setAttribute(b, e), (this[b] = e));
				};
				C.prototype.fadeOut = function (e) {
					var b = this;
					b.animate(
						{ opacity: 0 },
						{
							duration: H(e, 150),
							complete: function () {
								b.attr({ y: -9999 }).hide();
							},
						}
					);
				};
				C.prototype.fillSetter = function (e, b, n) {
					"string" === typeof e
						? n.setAttribute(b, e)
						: e && this.complexColor(e, b, n);
				};
				C.prototype.getBBox = function (e, b) {
					var n,
						d = this.renderer,
						q = this.element,
						h = this.styles,
						u = this.textStr,
						l = d.cache,
						k = d.cacheKeys,
						w = q.namespaceURI === this.SVG_NS;
					b = H(b, this.rotation, 0);
					var F = d.styledMode
						? q && C.prototype.getStyle.call(q, "font-size")
						: h && h.fontSize;
					if (M(u)) {
						var y = u.toString();
						-1 === y.indexOf("<") && (y = y.replace(/[0-9]/g, "0"));
						y += [
							"",
							b,
							F,
							this.textWidth,
							h && h.textOverflow,
							h && h.fontWeight,
						].join();
					}
					y && !e && (n = l[y]);
					if (!n) {
						if (w || d.forExport) {
							try {
								var R =
									this.fakeTS &&
									function (b) {
										[].forEach.call(
											q.querySelectorAll(".highcharts-text-outline"),
											function (e) {
												e.style.display = b;
											}
										);
									};
								f(R) && R("none");
								n = q.getBBox
									? a({}, q.getBBox())
									: { width: q.offsetWidth, height: q.offsetHeight };
								f(R) && R("");
							} catch (ca) {
								("");
							}
							if (!n || 0 > n.width) n = { width: 0, height: 0 };
						} else n = this.htmlGetBBox();
						d.isSVG &&
							((e = n.width),
							(d = n.height),
							w &&
								(n.height = d =
									{ "11px,17": 14, "13px,20": 16 }[
										h && h.fontSize + "," + Math.round(d)
									] || d),
							b &&
								((h = b * r),
								(n.width =
									Math.abs(d * Math.sin(h)) + Math.abs(e * Math.cos(h))),
								(n.height =
									Math.abs(d * Math.cos(h)) + Math.abs(e * Math.sin(h)))));
						if (y && 0 < n.height) {
							for (; 250 < k.length; ) delete l[k.shift()];
							l[y] || k.push(y);
							l[y] = n;
						}
					}
					return n;
				};
				C.prototype.getStyle = function (e) {
					return t
						.getComputedStyle(this.element || this, "")
						.getPropertyValue(e);
				};
				C.prototype.hasClass = function (e) {
					return -1 !== ("" + this.attr("class")).split(" ").indexOf(e);
				};
				C.prototype.hide = function (e) {
					e ? this.attr({ y: -9999 }) : this.attr({ visibility: "hidden" });
					return this;
				};
				C.prototype.htmlGetBBox = function () {
					return { height: 0, width: 0, x: 0, y: 0 };
				};
				C.prototype.init = function (e, b) {
					this.element =
						"span" === b ? A(b) : D.createElementNS(this.SVG_NS, b);
					this.renderer = e;
					d(this, "afterInit");
				};
				C.prototype.invert = function (e) {
					this.inverted = e;
					this.updateTransform();
					return this;
				};
				C.prototype.on = function (e, b) {
					var n,
						a,
						f = this.element,
						d;
					L && "click" === e
						? ((f.ontouchstart = function (b) {
								n = b.touches[0].clientX;
								a = b.touches[0].clientY;
						  }),
						  (f.ontouchend = function (e) {
								(n &&
									4 <=
										Math.sqrt(
											Math.pow(n - e.changedTouches[0].clientX, 2) +
												Math.pow(a - e.changedTouches[0].clientY, 2)
										)) ||
									b.call(f, e);
								d = !0;
								e.preventDefault();
						  }),
						  (f.onclick = function (e) {
								d || b.call(f, e);
						  }))
						: (f["on" + e] = b);
					return this;
				};
				C.prototype.opacitySetter = function (e, b, n) {
					this[b] = e;
					n.setAttribute(b, e);
				};
				C.prototype.removeClass = function (e) {
					return this.attr(
						"class",
						("" + this.attr("class")).replace(
							u(e) ? new RegExp(" ?" + e + " ?") : e,
							""
						)
					);
				};
				C.prototype.removeTextOutline = function (e) {
					for (var b = e.length, n; b--; )
						(n = e[b]),
							"highcharts-text-outline" === n.getAttribute("class") &&
								k(e, this.element.removeChild(n));
				};
				C.prototype.safeRemoveChild = function (e) {
					var b = e.parentNode;
					b && b.removeChild(e);
				};
				C.prototype.setRadialReference = function (e) {
					var b =
						this.element.gradient &&
						this.renderer.gradients[this.element.gradient];
					this.element.radialReference = e;
					b &&
						b.radAttr &&
						b.animate(this.renderer.getRadialAttr(e, b.radAttr));
					return this;
				};
				C.prototype.setTextPath = function (e, b) {
					var n = this.element,
						a = { textAnchor: "text-anchor" },
						f = !1,
						d = this.textPathWrapper,
						h = !d;
					b = F(
						!0,
						{
							enabled: !0,
							attributes: { dy: -5, startOffset: "50%", textAnchor: "middle" },
						},
						b
					);
					var u = b.attributes;
					if (e && b && b.enabled) {
						d && null === d.element.parentNode
							? ((h = !0), (d = d.destroy()))
							: d &&
							  this.removeTextOutline.call(
									d.parentGroup,
									[].slice.call(n.getElementsByTagName("tspan"))
							  );
						this.options &&
							this.options.padding &&
							(u.dx = -this.options.padding);
						d ||
							((this.textPathWrapper = d = this.renderer.createElement(
								"textPath"
							)),
							(f = !0));
						var l = d.element;
						(b = e.element.getAttribute("id")) ||
							e.element.setAttribute("id", (b = P()));
						if (h)
							for (e = n.getElementsByTagName("tspan"); e.length; )
								e[0].setAttribute("y", 0),
									q(u.dx) && e[0].setAttribute("x", -u.dx),
									l.appendChild(e[0]);
						f && d && d.add({ element: this.text ? this.text.element : n });
						l.setAttributeNS(
							"http://www.w3.org/1999/xlink",
							"href",
							this.renderer.url + "#" + b
						);
						M(u.dy) && (l.parentNode.setAttribute("dy", u.dy), delete u.dy);
						M(u.dx) && (l.parentNode.setAttribute("dx", u.dx), delete u.dx);
						w(u, function (b, e) {
							l.setAttribute(a[e] || e, b);
						});
						n.removeAttribute("transform");
						this.removeTextOutline.call(
							d,
							[].slice.call(n.getElementsByTagName("tspan"))
						);
						this.text &&
							!this.renderer.styledMode &&
							this.attr({ fill: "none", "stroke-width": 0 });
						this.applyTextOutline = this.updateTransform = J;
					} else
						d &&
							(delete this.updateTransform,
							delete this.applyTextOutline,
							this.destroyTextPath(n, e),
							this.updateTransform(),
							this.options &&
								this.options.rotation &&
								this.applyTextOutline(this.options.style.textOutline));
					return this;
				};
				C.prototype.shadow = function (e, b, n) {
					var f = [],
						d = this.element,
						q = !1,
						h = this.oldShadowOptions;
					var u = {
						color: "#000000",
						offsetX: 1,
						offsetY: 1,
						opacity: 0.15,
						width: 3,
					};
					var l;
					!0 === e ? (l = u) : "object" === typeof e && (l = a(u, e));
					l &&
						(l &&
							h &&
							w(l, function (b, e) {
								b !== h[e] && (q = !0);
							}),
						q && this.destroyShadows(),
						(this.oldShadowOptions = l));
					if (!l) this.destroyShadows();
					else if (!this.shadows) {
						var k = l.opacity / l.width;
						var F = this.parentInverted
							? "translate(-1,-1)"
							: "translate(" + l.offsetX + ", " + l.offsetY + ")";
						for (u = 1; u <= l.width; u++) {
							var H = d.cloneNode(!1);
							var y = 2 * l.width + 1 - 2 * u;
							m(H, {
								stroke: e.color || "#000000",
								"stroke-opacity": k * u,
								"stroke-width": y,
								transform: F,
								fill: "none",
							});
							H.setAttribute(
								"class",
								(H.getAttribute("class") || "") + " highcharts-shadow"
							);
							n &&
								(m(H, "height", Math.max(m(H, "height") - y, 0)),
								(H.cutHeight = y));
							b
								? b.element.appendChild(H)
								: d.parentNode && d.parentNode.insertBefore(H, d);
							f.push(H);
						}
						this.shadows = f;
					}
					return this;
				};
				C.prototype.show = function (e) {
					return this.attr({ visibility: e ? "inherit" : "visible" });
				};
				C.prototype.strokeSetter = function (e, b, n) {
					this[b] = e;
					this.stroke && this["stroke-width"]
						? (C.prototype.fillSetter.call(this, this.stroke, "stroke", n),
						  n.setAttribute("stroke-width", this["stroke-width"]),
						  (this.hasStroke = !0))
						: "stroke-width" === b && 0 === e && this.hasStroke
						? (n.removeAttribute("stroke"), (this.hasStroke = !1))
						: this.renderer.styledMode &&
						  this["stroke-width"] &&
						  (n.setAttribute("stroke-width", this["stroke-width"]),
						  (this.hasStroke = !0));
				};
				C.prototype.strokeWidth = function () {
					if (!this.renderer.styledMode) return this["stroke-width"] || 0;
					var e = this.getStyle("stroke-width"),
						b = 0;
					if (e.indexOf("px") === e.length - 2) b = y(e);
					else if ("" !== e) {
						var n = D.createElementNS(E, "rect");
						m(n, { width: e, "stroke-width": 0 });
						this.element.parentNode.appendChild(n);
						b = n.getBBox().width;
						n.parentNode.removeChild(n);
					}
					return b;
				};
				C.prototype.symbolAttr = function (e) {
					var b = this;
					"x y r start end width height innerR anchorX anchorY clockwise"
						.split(" ")
						.forEach(function (n) {
							b[n] = H(e[n], b[n]);
						});
					b.attr({
						d: b.renderer.symbols[b.symbolName](b.x, b.y, b.width, b.height, b),
					});
				};
				C.prototype.textSetter = function (e) {
					e !== this.textStr &&
						(delete this.textPxLength,
						(this.textStr = e),
						this.added && this.renderer.buildText(this));
				};
				C.prototype.titleSetter = function (e) {
					var b = this.element.getElementsByTagName("title")[0];
					b ||
						((b = D.createElementNS(this.SVG_NS, "title")),
						this.element.appendChild(b));
					b.firstChild && b.removeChild(b.firstChild);
					b.appendChild(
						D.createTextNode(
							String(H(e, ""))
								.replace(/<[^>]*>/g, "")
								.replace(/&lt;/g, "<")
								.replace(/&gt;/g, ">")
						)
					);
				};
				C.prototype.toFront = function () {
					var e = this.element;
					e.parentNode.appendChild(e);
					return this;
				};
				C.prototype.translate = function (e, b) {
					return this.attr({ translateX: e, translateY: b });
				};
				C.prototype.updateShadows = function (e, b, n) {
					var a = this.shadows;
					if (a)
						for (var f = a.length; f--; )
							n.call(
								a[f],
								"height" === e
									? Math.max(b - (a[f].cutHeight || 0), 0)
									: "d" === e
									? this.d
									: b,
								e,
								a[f]
							);
				};
				C.prototype.updateTransform = function () {
					var e = this.translateX || 0,
						b = this.translateY || 0,
						n = this.scaleX,
						a = this.scaleY,
						f = this.inverted,
						d = this.rotation,
						q = this.matrix,
						h = this.element;
					f && ((e += this.width), (b += this.height));
					e = ["translate(" + e + "," + b + ")"];
					M(q) && e.push("matrix(" + q.join(",") + ")");
					f
						? e.push("rotate(90) scale(-1,1)")
						: d &&
						  e.push(
								"rotate(" +
									d +
									" " +
									H(this.rotationOriginX, h.getAttribute("x"), 0) +
									" " +
									H(this.rotationOriginY, h.getAttribute("y") || 0) +
									")"
						  );
					(M(n) || M(a)) && e.push("scale(" + H(n, 1) + " " + H(a, 1) + ")");
					e.length && h.setAttribute("transform", e.join(" "));
				};
				C.prototype.visibilitySetter = function (e, b, n) {
					"inherit" === e
						? n.removeAttribute(b)
						: this[b] !== e && n.setAttribute(b, e);
					this[b] = e;
				};
				C.prototype.xGetter = function (e) {
					"circle" === this.element.nodeName &&
						("x" === e ? (e = "cx") : "y" === e && (e = "cy"));
					return this._defaultGetter(e);
				};
				C.prototype.zIndexSetter = function (e, b) {
					var n = this.renderer,
						a = this.parentGroup,
						f = (a || n).element || n.box,
						d = this.element,
						q = !1;
					n = f === n.box;
					var h = this.added;
					var u;
					M(e)
						? (d.setAttribute("data-z-index", e),
						  (e = +e),
						  this[b] === e && (h = !1))
						: M(this[b]) && d.removeAttribute("data-z-index");
					this[b] = e;
					if (h) {
						(e = this.zIndex) && a && (a.handleZ = !0);
						b = f.childNodes;
						for (u = b.length - 1; 0 <= u && !q; u--) {
							a = b[u];
							h = a.getAttribute("data-z-index");
							var l = !M(h);
							if (a !== d)
								if (0 > e && l && !n && !u) f.insertBefore(d, b[u]), (q = !0);
								else if (y(h) <= e || (l && (!M(e) || 0 <= e)))
									f.insertBefore(d, b[u + 1] || null), (q = !0);
						}
						q || (f.insertBefore(d, b[n ? 3 : 0] || null), (q = !0));
					}
					return q;
				};
				return C;
			})();
			G.prototype["stroke-widthSetter"] = G.prototype.strokeSetter;
			G.prototype.yGetter = G.prototype.xGetter;
			G.prototype.matrixSetter = G.prototype.rotationOriginXSetter = G.prototype.rotationOriginYSetter = G.prototype.rotationSetter = G.prototype.scaleXSetter = G.prototype.scaleYSetter = G.prototype.translateXSetter = G.prototype.translateYSetter = G.prototype.verticalAlignSetter = function (
				a,
				e
			) {
				this[e] = a;
				this.doTransform = !0;
			};
			g.SVGElement = G;
			return g.SVGElement;
		}
	);
	N(
		v,
		"parts/SvgRenderer.js",
		[
			v["parts/Color.js"],
			v["parts/Globals.js"],
			v["parts/SVGElement.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, G, r) {
			var D = c.parse,
				L = r.addEvent,
				K = r.attr,
				J = r.createElement,
				B = r.css,
				E = r.defined,
				t = r.destroyObjectProperties,
				x = r.extend,
				z = r.isArray,
				m = r.isNumber,
				A = r.isObject,
				p = r.isString,
				M = r.merge,
				k = r.objectEach,
				a = r.pick,
				d = r.pInt,
				l = r.removeEvent,
				h = r.splat,
				f = r.uniqueKey,
				q = g.charts,
				u = g.deg2rad,
				F = g.doc,
				w = g.isFirefox,
				H = g.isMS,
				y = g.isWebKit;
			r = g.noop;
			var Q = g.svg,
				P = g.SVG_NS,
				C = g.symbolSizes,
				e = g.win;
			c = g.SVGRenderer = function () {
				this.init.apply(this, arguments);
			};
			x(c.prototype, {
				Element: G,
				SVG_NS: P,
				init: function (b, n, a, f, d, q, h) {
					var u = this.createElement("svg").attr({
						version: "1.1",
						class: "highcharts-root",
					});
					h || u.css(this.getStyle(f));
					f = u.element;
					b.appendChild(f);
					K(b, "dir", "ltr");
					-1 === b.innerHTML.indexOf("xmlns") && K(f, "xmlns", this.SVG_NS);
					this.isSVG = !0;
					this.box = f;
					this.boxWrapper = u;
					this.alignedObjects = [];
					this.url =
						(w || y) && F.getElementsByTagName("base").length
							? e.location.href
									.split("#")[0]
									.replace(/<[^>]*>/g, "")
									.replace(/([\('\)])/g, "\\$1")
									.replace(/ /g, "%20")
							: "";
					this.createElement("desc")
						.add()
						.element.appendChild(
							F.createTextNode("Created with Highcharts 8.1.0")
						);
					this.defs = this.createElement("defs").add();
					this.allowHTML = q;
					this.forExport = d;
					this.styledMode = h;
					this.gradients = {};
					this.cache = {};
					this.cacheKeys = [];
					this.imgCount = 0;
					this.setSize(n, a, !1);
					var I;
					w &&
						b.getBoundingClientRect &&
						((n = function () {
							B(b, { left: 0, top: 0 });
							I = b.getBoundingClientRect();
							B(b, {
								left: Math.ceil(I.left) - I.left + "px",
								top: Math.ceil(I.top) - I.top + "px",
							});
						}),
						n(),
						(this.unSubPixelFix = L(e, "resize", n)));
				},
				definition: function (b) {
					function e(b, n) {
						var f;
						h(b).forEach(function (b) {
							var d = a.createElement(b.tagName),
								q = {};
							k(b, function (b, e) {
								"tagName" !== e &&
									"children" !== e &&
									"textContent" !== e &&
									(q[e] = b);
							});
							d.attr(q);
							d.add(n || a.defs);
							b.textContent &&
								d.element.appendChild(F.createTextNode(b.textContent));
							e(b.children || [], d);
							f = d;
						});
						return f;
					}
					var a = this;
					return e(b);
				},
				getStyle: function (b) {
					return (this.style = x(
						{
							fontFamily:
								'"Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif',
							fontSize: "12px",
						},
						b
					));
				},
				setStyle: function (b) {
					this.boxWrapper.css(this.getStyle(b));
				},
				isHidden: function () {
					return !this.boxWrapper.getBBox().width;
				},
				destroy: function () {
					var b = this.defs;
					this.box = null;
					this.boxWrapper = this.boxWrapper.destroy();
					t(this.gradients || {});
					this.gradients = null;
					b && (this.defs = b.destroy());
					this.unSubPixelFix && this.unSubPixelFix();
					return (this.alignedObjects = null);
				},
				createElement: function (b) {
					var e = new this.Element();
					e.init(this, b);
					return e;
				},
				draw: r,
				getRadialAttr: function (b, e) {
					return {
						cx: b[0] - b[2] / 2 + e.cx * b[2],
						cy: b[1] - b[2] / 2 + e.cy * b[2],
						r: e.r * b[2],
					};
				},
				truncate: function (b, e, a, f, d, q, h) {
					var n = this,
						u = b.rotation,
						I,
						l = f ? 1 : 0,
						k = (a || f).length,
						w = k,
						O = [],
						H = function (b) {
							e.firstChild && e.removeChild(e.firstChild);
							b && e.appendChild(F.createTextNode(b));
						},
						y = function (q, u) {
							u = u || q;
							if ("undefined" === typeof O[u])
								if (e.getSubStringLength)
									try {
										O[u] = d + e.getSubStringLength(0, f ? u + 1 : u);
									} catch (fa) {
										("");
									}
								else
									n.getSpanWidth &&
										(H(h(a || f, q)), (O[u] = d + n.getSpanWidth(b, e)));
							return O[u];
						},
						T;
					b.rotation = 0;
					var p = y(e.textContent.length);
					if ((T = d + p > q)) {
						for (; l <= k; )
							(w = Math.ceil((l + k) / 2)),
								f && (I = h(f, w)),
								(p = y(w, I && I.length - 1)),
								l === k ? (l = k + 1) : p > q ? (k = w - 1) : (l = w);
						0 === k ? H("") : (a && k === a.length - 1) || H(I || h(a || f, w));
					}
					f && f.splice(0, w);
					b.actualWidth = p;
					b.rotation = u;
					return T;
				},
				escapes: {
					"&": "&amp;",
					"<": "&lt;",
					">": "&gt;",
					"'": "&#39;",
					'"': "&quot;",
				},
				buildText: function (b) {
					var e = b.element,
						f = this,
						q = f.forExport,
						h = a(b.textStr, "").toString(),
						u = -1 !== h.indexOf("<"),
						l = e.childNodes,
						w,
						H = K(e, "x"),
						y = b.styles,
						p = b.textWidth,
						R = y && y.lineHeight,
						A = y && y.textOutline,
						m = y && "ellipsis" === y.textOverflow,
						c = y && "nowrap" === y.whiteSpace,
						M = y && y.fontSize,
						g,
						z = l.length;
					y = p && !b.added && this.box;
					var t = function (b) {
							var n;
							f.styledMode ||
								(n = /(px|em)$/.test(b && b.style.fontSize)
									? b.style.fontSize
									: M || f.style.fontSize || 12);
							return R
								? d(R)
								: f.fontMetrics(n, b.getAttribute("style") ? b : e).h;
						},
						x = function (b, e) {
							k(f.escapes, function (n, a) {
								(e && -1 !== e.indexOf(n)) ||
									(b = b.toString().replace(new RegExp(n, "g"), a));
							});
							return b;
						},
						C = function (b, e) {
							var n = b.indexOf("<");
							b = b.substring(n, b.indexOf(">") - n);
							n = b.indexOf(e + "=");
							if (
								-1 !== n &&
								((n = n + e.length + 1),
								(e = b.charAt(n)),
								'"' === e || "'" === e)
							)
								return (b = b.substring(n + 1)), b.substring(0, b.indexOf(e));
						},
						r = /<br.*?>/g;
					var E = [h, m, c, R, A, M, p].join();
					if (E !== b.textCache) {
						for (b.textCache = E; z--; ) e.removeChild(l[z]);
						u || A || m || p || (-1 !== h.indexOf(" ") && (!c || r.test(h)))
							? (y && y.appendChild(e),
							  u
									? ((h = f.styledMode
											? h
													.replace(
														/<(b|strong)>/g,
														'<span class="highcharts-strong">'
													)
													.replace(
														/<(i|em)>/g,
														'<span class="highcharts-emphasized">'
													)
											: h
													.replace(
														/<(b|strong)>/g,
														'<span style="font-weight:bold">'
													)
													.replace(
														/<(i|em)>/g,
														'<span style="font-style:italic">'
													)),
									  (h = h
											.replace(/<a/g, "<span")
											.replace(/<\/(b|strong|i|em|a)>/g, "</span>")
											.split(r)))
									: (h = [h]),
							  (h = h.filter(function (b) {
									return "" !== b;
							  })),
							  h.forEach(function (n, a) {
									var d = 0,
										h = 0;
									n = n
										.replace(/^\s+|\s+$/g, "")
										.replace(/<span/g, "|||<span")
										.replace(/<\/span>/g, "</span>|||");
									var u = n.split("|||");
									u.forEach(function (n) {
										if ("" !== n || 1 === u.length) {
											var I = {},
												l = F.createElementNS(f.SVG_NS, "tspan"),
												k,
												O;
											(k = C(n, "class")) && K(l, "class", k);
											if ((k = C(n, "style")))
												(k = k.replace(/(;| |^)color([ :])/, "$1fill$2")),
													K(l, "style", k);
											(O = C(n, "href")) &&
												!q &&
												(K(l, "onclick", 'location.href="' + O + '"'),
												K(l, "class", "highcharts-anchor"),
												f.styledMode || B(l, { cursor: "pointer" }));
											n = x(n.replace(/<[a-zA-Z\/](.|\n)*?>/g, "") || " ");
											if (" " !== n) {
												l.appendChild(F.createTextNode(n));
												d ? (I.dx = 0) : a && null !== H && (I.x = H);
												K(l, I);
												e.appendChild(l);
												!d &&
													g &&
													(!Q && q && B(l, { display: "block" }),
													K(l, "dy", t(l)));
												if (p) {
													var y = n.replace(/([^\^])-/g, "$1- ").split(" ");
													I = !c && (1 < u.length || a || 1 < y.length);
													O = 0;
													var T = t(l);
													if (m)
														w = f.truncate(
															b,
															l,
															n,
															void 0,
															0,
															Math.max(0, p - parseInt(M || 12, 10)),
															function (b, e) {
																return b.substring(0, e) + "\u2026";
															}
														);
													else if (I)
														for (; y.length; )
															y.length &&
																!c &&
																0 < O &&
																((l = F.createElementNS(P, "tspan")),
																K(l, { dy: T, x: H }),
																k && K(l, "style", k),
																l.appendChild(
																	F.createTextNode(
																		y.join(" ").replace(/- /g, "-")
																	)
																),
																e.appendChild(l)),
																f.truncate(
																	b,
																	l,
																	null,
																	y,
																	0 === O ? h : 0,
																	p,
																	function (b, e) {
																		return y
																			.slice(0, e)
																			.join(" ")
																			.replace(/- /g, "-");
																	}
																),
																(h = b.actualWidth),
																O++;
												}
												d++;
											}
										}
									});
									g = g || e.childNodes.length;
							  }),
							  m && w && b.attr("title", x(b.textStr, ["&lt;", "&gt;"])),
							  y && y.removeChild(e),
							  A && b.applyTextOutline && b.applyTextOutline(A))
							: e.appendChild(F.createTextNode(x(h)));
					}
				},
				getContrast: function (b) {
					b = D(b).rgba;
					b[0] *= 1;
					b[1] *= 1.2;
					b[2] *= 0.5;
					return 459 < b[0] + b[1] + b[2] ? "#000000" : "#FFFFFF";
				},
				button: function (b, e, a, f, d, h, q, u, l, k) {
					var n = this.label(b, e, a, l, void 0, void 0, k, void 0, "button"),
						I = 0,
						w = this.styledMode;
					n.attr(M({ padding: 8, r: 2 }, d));
					if (!w) {
						d = M(
							{
								fill: "#f7f7f7",
								stroke: "#cccccc",
								"stroke-width": 1,
								style: {
									color: "#333333",
									cursor: "pointer",
									fontWeight: "normal",
								},
							},
							d
						);
						var O = d.style;
						delete d.style;
						h = M(d, { fill: "#e6e6e6" }, h);
						var F = h.style;
						delete h.style;
						q = M(
							d,
							{
								fill: "#e6ebf5",
								style: { color: "#000000", fontWeight: "bold" },
							},
							q
						);
						var y = q.style;
						delete q.style;
						u = M(d, { style: { color: "#cccccc" } }, u);
						var p = u.style;
						delete u.style;
					}
					L(n.element, H ? "mouseover" : "mouseenter", function () {
						3 !== I && n.setState(1);
					});
					L(n.element, H ? "mouseout" : "mouseleave", function () {
						3 !== I && n.setState(I);
					});
					n.setState = function (b) {
						1 !== b && (n.state = I = b);
						n.removeClass(
							/highcharts-button-(normal|hover|pressed|disabled)/
						).addClass(
							"highcharts-button-" +
								["normal", "hover", "pressed", "disabled"][b || 0]
						);
						w || n.attr([d, h, q, u][b || 0]).css([O, F, y, p][b || 0]);
					};
					w || n.attr(d).css(x({ cursor: "default" }, O));
					return n.on("click", function (b) {
						3 !== I && f.call(n, b);
					});
				},
				crispLine: function (b, e, a) {
					void 0 === a && (a = "round");
					var n = b[0],
						f = b[1];
					n[1] === f[1] && (n[1] = f[1] = Math[a](n[1]) - (e % 2) / 2);
					n[2] === f[2] && (n[2] = f[2] = Math[a](n[2]) + (e % 2) / 2);
					return b;
				},
				path: function (b) {
					var e = this.styledMode ? {} : { fill: "none" };
					z(b) ? (e.d = b) : A(b) && x(e, b);
					return this.createElement("path").attr(e);
				},
				circle: function (b, e, a) {
					b = A(b) ? b : "undefined" === typeof b ? {} : { x: b, y: e, r: a };
					e = this.createElement("circle");
					e.xSetter = e.ySetter = function (b, e, n) {
						n.setAttribute("c" + e, b);
					};
					return e.attr(b);
				},
				arc: function (b, e, a, f, d, h) {
					A(b)
						? ((f = b), (e = f.y), (a = f.r), (b = f.x))
						: (f = { innerR: f, start: d, end: h });
					b = this.symbol("arc", b, e, a, a, f);
					b.r = a;
					return b;
				},
				rect: function (b, e, a, f, d, h) {
					d = A(b) ? b.r : d;
					var n = this.createElement("rect");
					b = A(b)
						? b
						: "undefined" === typeof b
						? {}
						: { x: b, y: e, width: Math.max(a, 0), height: Math.max(f, 0) };
					this.styledMode ||
						("undefined" !== typeof h &&
							((b.strokeWidth = h), (b = n.crisp(b))),
						(b.fill = "none"));
					d && (b.r = d);
					n.rSetter = function (b, e, a) {
						n.r = b;
						K(a, { rx: b, ry: b });
					};
					n.rGetter = function () {
						return n.r;
					};
					return n.attr(b);
				},
				setSize: function (b, e, f) {
					var n = this.alignedObjects,
						d = n.length;
					this.width = b;
					this.height = e;
					for (
						this.boxWrapper.animate(
							{ width: b, height: e },
							{
								step: function () {
									this.attr({
										viewBox:
											"0 0 " + this.attr("width") + " " + this.attr("height"),
									});
								},
								duration: a(f, !0) ? void 0 : 0,
							}
						);
						d--;

					)
						n[d].align();
				},
				g: function (b) {
					var e = this.createElement("g");
					return b ? e.attr({ class: "highcharts-" + b }) : e;
				},
				image: function (b, n, a, f, d, h) {
					var q = { preserveAspectRatio: "none" },
						u = function (b, e) {
							b.setAttributeNS
								? b.setAttributeNS("http://www.w3.org/1999/xlink", "href", e)
								: b.setAttribute("hc-svg-href", e);
						},
						I = function (e) {
							u(l.element, b);
							h.call(l, e);
						};
					1 < arguments.length && x(q, { x: n, y: a, width: f, height: d });
					var l = this.createElement("image").attr(q);
					h
						? (u(
								l.element,
								"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
						  ),
						  (q = new e.Image()),
						  L(q, "load", I),
						  (q.src = b),
						  q.complete && I({}))
						: u(l.element, b);
					return l;
				},
				symbol: function (b, e, f, d, h, u) {
					var n = this,
						I = /^url\((.*?)\)$/,
						l = I.test(b),
						k = !l && (this.symbols[b] ? b : "circle"),
						w = k && this.symbols[k],
						O;
					if (w) {
						"number" === typeof e &&
							(O = w.call(
								this.symbols,
								Math.round(e || 0),
								Math.round(f || 0),
								d,
								h,
								u
							));
						var y = this.path(O);
						n.styledMode || y.attr("fill", "none");
						x(y, { symbolName: k, x: e, y: f, width: d, height: h });
						u && x(y, u);
					} else if (l) {
						var H = b.match(I)[1];
						y = this.image(H);
						y.imgwidth = a(C[H] && C[H].width, u && u.width);
						y.imgheight = a(C[H] && C[H].height, u && u.height);
						var p = function () {
							y.attr({ width: y.width, height: y.height });
						};
						["width", "height"].forEach(function (b) {
							y[b + "Setter"] = function (b, e) {
								var n = {},
									a = this["img" + e],
									f = "width" === e ? "translateX" : "translateY";
								this[e] = b;
								E(a) &&
									(u &&
										"within" === u.backgroundSize &&
										this.width &&
										this.height &&
										(a = Math.round(
											a *
												Math.min(
													this.width / this.imgwidth,
													this.height / this.imgheight
												)
										)),
									this.element && this.element.setAttribute(e, a),
									this.alignByTranslate ||
										((n[f] = ((this[e] || 0) - a) / 2), this.attr(n)));
							};
						});
						E(e) && y.attr({ x: e, y: f });
						y.isImg = !0;
						E(y.imgwidth) && E(y.imgheight)
							? p()
							: (y.attr({ width: 0, height: 0 }),
							  J("img", {
									onload: function () {
										var b = q[n.chartIndex];
										0 === this.width &&
											(B(this, { position: "absolute", top: "-999em" }),
											F.body.appendChild(this));
										C[H] = { width: this.width, height: this.height };
										y.imgwidth = this.width;
										y.imgheight = this.height;
										y.element && p();
										this.parentNode && this.parentNode.removeChild(this);
										n.imgCount--;
										if (!n.imgCount && b && !b.hasLoaded) b.onload();
									},
									src: H,
							  }),
							  this.imgCount++);
					}
					return y;
				},
				symbols: {
					circle: function (b, e, a, f) {
						return this.arc(b + a / 2, e + f / 2, a / 2, f / 2, {
							start: 0.5 * Math.PI,
							end: 2.5 * Math.PI,
							open: !1,
						});
					},
					square: function (b, e, a, f) {
						return [
							["M", b, e],
							["L", b + a, e],
							["L", b + a, e + f],
							["L", b, e + f],
							["Z"],
						];
					},
					triangle: function (b, e, a, f) {
						return [
							["M", b + a / 2, e],
							["L", b + a, e + f],
							["L", b, e + f],
							["Z"],
						];
					},
					"triangle-down": function (b, e, a, f) {
						return [
							["M", b, e],
							["L", b + a, e],
							["L", b + a / 2, e + f],
							["Z"],
						];
					},
					diamond: function (b, e, a, f) {
						return [
							["M", b + a / 2, e],
							["L", b + a, e + f / 2],
							["L", b + a / 2, e + f],
							["L", b, e + f / 2],
							["Z"],
						];
					},
					arc: function (b, e, f, d, h) {
						var n = h.start,
							q = h.r || f,
							u = h.r || d || f,
							l = h.end - 0.001;
						f = h.innerR;
						d = a(h.open, 0.001 > Math.abs(h.end - h.start - 2 * Math.PI));
						var I = Math.cos(n),
							k = Math.sin(n),
							w = Math.cos(l);
						l = Math.sin(l);
						n = a(h.longArc, 0.001 > h.end - n - Math.PI ? 0 : 1);
						q = [
							["M", b + q * I, e + u * k],
							["A", q, u, 0, n, a(h.clockwise, 1), b + q * w, e + u * l],
						];
						E(f) &&
							q.push(
								d ? ["M", b + f * w, e + f * l] : ["L", b + f * w, e + f * l],
								[
									"A",
									f,
									f,
									0,
									n,
									E(h.clockwise) ? 1 - h.clockwise : 0,
									b + f * I,
									e + f * k,
								]
							);
						d || q.push(["Z"]);
						return q;
					},
					callout: function (b, e, a, f, d) {
						var n = Math.min((d && d.r) || 0, a, f),
							h = n + 6,
							q = d && d.anchorX;
						d = d && d.anchorY;
						var u = [
							["M", b + n, e],
							["L", b + a - n, e],
							["C", b + a, e, b + a, e, b + a, e + n],
							["L", b + a, e + f - n],
							["C", b + a, e + f, b + a, e + f, b + a - n, e + f],
							["L", b + n, e + f],
							["C", b, e + f, b, e + f, b, e + f - n],
							["L", b, e + n],
							["C", b, e, b, e, b + n, e],
						];
						q && q > a
							? d > e + h && d < e + f - h
								? u.splice(
										3,
										1,
										["L", b + a, d - 6],
										["L", b + a + 6, d],
										["L", b + a, d + 6],
										["L", b + a, e + f - n]
								  )
								: u.splice(
										3,
										1,
										["L", b + a, f / 2],
										["L", q, d],
										["L", b + a, f / 2],
										["L", b + a, e + f - n]
								  )
							: q && 0 > q
							? d > e + h && d < e + f - h
								? u.splice(
										7,
										1,
										["L", b, d + 6],
										["L", b - 6, d],
										["L", b, d - 6],
										["L", b, e + n]
								  )
								: u.splice(
										7,
										1,
										["L", b, f / 2],
										["L", q, d],
										["L", b, f / 2],
										["L", b, e + n]
								  )
							: d && d > f && q > b + h && q < b + a - h
							? u.splice(
									5,
									1,
									["L", q + 6, e + f],
									["L", q, e + f + 6],
									["L", q - 6, e + f],
									["L", b + n, e + f]
							  )
							: d &&
							  0 > d &&
							  q > b + h &&
							  q < b + a - h &&
							  u.splice(
									1,
									1,
									["L", q - 6, e],
									["L", q, e - 6],
									["L", q + 6, e],
									["L", a - n, e]
							  );
						return u;
					},
				},
				clipRect: function (b, e, a, d) {
					var n = f() + "-",
						h = this.createElement("clipPath").attr({ id: n }).add(this.defs);
					b = this.rect(b, e, a, d, 0).add(h);
					b.id = n;
					b.clipPath = h;
					b.count = 0;
					return b;
				},
				text: function (b, e, a, f) {
					var n = {};
					if (f && (this.allowHTML || !this.forExport))
						return this.html(b, e, a);
					n.x = Math.round(e || 0);
					a && (n.y = Math.round(a));
					E(b) && (n.text = b);
					b = this.createElement("text").attr(n);
					f ||
						(b.xSetter = function (b, e, a) {
							var f = a.getElementsByTagName("tspan"),
								n = a.getAttribute(e),
								d;
							for (d = 0; d < f.length; d++) {
								var h = f[d];
								h.getAttribute(e) === n && h.setAttribute(e, b);
							}
							a.setAttribute(e, b);
						});
					return b;
				},
				fontMetrics: function (b, a) {
					b =
						(!this.styledMode && /px/.test(b)) || !e.getComputedStyle
							? b ||
							  (a && a.style && a.style.fontSize) ||
							  (this.style && this.style.fontSize)
							: a && G.prototype.getStyle.call(a, "font-size");
					b = /px/.test(b) ? d(b) : 12;
					a = 24 > b ? b + 3 : Math.round(1.2 * b);
					return { h: a, b: Math.round(0.8 * a), f: b };
				},
				rotCorr: function (b, e, a) {
					var f = b;
					e && a && (f = Math.max(f * Math.cos(e * u), 4));
					return { x: (-b / 3) * Math.sin(e * u), y: f };
				},
				pathToSegments: function (b) {
					for (
						var e = [],
							a = [],
							f = { A: 8, C: 7, H: 2, L: 3, M: 3, Q: 5, S: 5, T: 3, V: 2 },
							d = 0;
						d < b.length;
						d++
					)
						p(a[0]) &&
							m(b[d]) &&
							a.length === f[a[0].toUpperCase()] &&
							b.splice(d, 0, a[0].replace("M", "L").replace("m", "l")),
							"string" === typeof b[d] &&
								(a.length && e.push(a.slice(0)), (a.length = 0)),
							a.push(b[d]);
					e.push(a.slice(0));
					return e;
				},
				label: function (b, e, a, f, d, h, q, u, k) {
					var n = this,
						I = n.styledMode,
						w = n.g("button" !== k && "label"),
						y = (w.text = n.text("", 0, 0, q).attr({ zIndex: 1 })),
						F,
						H = { width: 0, height: 0, x: 0, y: 0 },
						O = H,
						p = 0,
						A = 3,
						c = 0,
						g,
						T,
						z,
						t,
						C,
						Q = {},
						P,
						B,
						Z = /^url\((.*?)\)$/.test(f),
						r = I || Z,
						aa = function () {
							return I
								? (F.strokeWidth() % 2) / 2
								: ((P ? parseInt(P, 10) : 0) % 2) / 2;
						};
					k && w.addClass("highcharts-" + k);
					var U = function () {
						var b = y.element.style,
							e = {};
						O = (m(g) && m(T) && !C) || !E(y.textStr) ? H : y.getBBox();
						w.width = (g || O.width || 0) + 2 * A + c;
						w.height = (T || O.height || 0) + 2 * A;
						B =
							A +
							Math.min(
								n.fontMetrics(b && b.fontSize, y).b,
								O.height || Infinity
							);
						r &&
							(F ||
								((w.box = F = n.symbols[f] || Z ? n.symbol(f) : n.rect()),
								F.addClass(
									("button" === k ? "" : "highcharts-label-box") +
										(k ? " highcharts-" + k + "-box" : "")
								),
								F.add(w),
								(b = aa()),
								(e.x = b),
								(e.y = (u ? -B : 0) + b)),
							(e.width = Math.round(w.width)),
							(e.height = Math.round(w.height)),
							F.attr(x(e, Q)),
							(Q = {}));
					};
					var W = function () {
						var b = c + A;
						var e = u ? 0 : B;
						E(g) &&
							O &&
							("center" === C || "right" === C) &&
							(b += { center: 0.5, right: 1 }[C] * (g - O.width));
						if (b !== y.x || e !== y.y)
							y.attr("x", b),
								y.hasBoxWidthChanged && ((O = y.getBBox(!0)), U()),
								"undefined" !== typeof e && y.attr("y", e);
						y.x = b;
						y.y = e;
					};
					var J = function (b, e) {
						F ? F.attr(b, e) : (Q[b] = e);
					};
					w.onAdd = function () {
						y.add(w);
						w.attr({ text: b || 0 === b ? b : "", x: e, y: a });
						F && E(d) && w.attr({ anchorX: d, anchorY: h });
					};
					w.widthSetter = function (b) {
						g = m(b) ? b : null;
					};
					w.heightSetter = function (b) {
						T = b;
					};
					w["text-alignSetter"] = function (b) {
						C = b;
					};
					w.paddingSetter = function (b) {
						E(b) && b !== A && ((A = w.padding = b), W());
					};
					w.paddingLeftSetter = function (b) {
						E(b) && b !== c && ((c = b), W());
					};
					w.alignSetter = function (b) {
						b = { left: 0, center: 0.5, right: 1 }[b];
						b !== p && ((p = b), O && w.attr({ x: z }));
					};
					w.textSetter = function (b) {
						"undefined" !== typeof b && y.attr({ text: b });
						U();
						W();
					};
					w["stroke-widthSetter"] = function (b, e) {
						b && (r = !0);
						P = this["stroke-width"] = b;
						J(e, b);
					};
					I
						? (w.rSetter = function (b, e) {
								J(e, b);
						  })
						: (w.strokeSetter = w.fillSetter = w.rSetter = function (b, e) {
								"r" !== e && ("fill" === e && b && (r = !0), (w[e] = b));
								J(e, b);
						  });
					w.anchorXSetter = function (b, e) {
						d = w.anchorX = b;
						J(e, Math.round(b) - aa() - z);
					};
					w.anchorYSetter = function (b, e) {
						h = w.anchorY = b;
						J(e, b - t);
					};
					w.xSetter = function (b) {
						w.x = b;
						p &&
							((b -= p * ((g || O.width) + 2 * A)), (w["forceAnimate:x"] = !0));
						z = Math.round(b);
						w.attr("translateX", z);
					};
					w.ySetter = function (b) {
						t = w.y = Math.round(b);
						w.attr("translateY", t);
					};
					w.isLabel = !0;
					var K = w.css;
					q = {
						css: function (b) {
							if (b) {
								var e = {};
								b = M(b);
								w.textProps.forEach(function (a) {
									"undefined" !== typeof b[a] && ((e[a] = b[a]), delete b[a]);
								});
								y.css(e);
								var a = "fontSize" in e || "fontWeight" in e;
								if ("width" in e || a) U(), a && W();
							}
							return K.call(w, b);
						},
						getBBox: function () {
							return {
								width: O.width + 2 * A,
								height: O.height + 2 * A,
								x: O.x - A,
								y: O.y - A,
							};
						},
						destroy: function () {
							l(w.element, "mouseenter");
							l(w.element, "mouseleave");
							y && y.destroy();
							F && (F = F.destroy());
							G.prototype.destroy.call(w);
							w = n = y = U = W = J = null;
						},
					};
					w.on = function (b, e) {
						var a = y && "SPAN" === y.element.tagName ? y : void 0;
						if (a) {
							var f = function (f) {
								(("mouseenter" === b || "mouseleave" === b) &&
									f.relatedTarget instanceof Element &&
									(w.element.contains(f.relatedTarget) ||
										a.element.contains(f.relatedTarget))) ||
									e.call(w.element, f);
							};
							a.on(b, f);
						}
						G.prototype.on.call(w, b, f || e);
						return w;
					};
					I ||
						(q.shadow = function (b) {
							b && (U(), F && F.shadow(b));
							return w;
						});
					return x(w, q);
				},
			});
			g.Renderer = c;
		}
	);
	N(
		v,
		"parts/Html.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var G = g.attr,
				r = g.createElement,
				D = g.css,
				L = g.defined,
				K = g.extend,
				J = g.pick,
				B = g.pInt,
				E = c.isFirefox,
				t = c.isMS,
				x = c.isWebKit,
				z = c.SVGElement;
			g = c.SVGRenderer;
			var m = c.win;
			K(z.prototype, {
				htmlCss: function (A) {
					var p = "SPAN" === this.element.tagName && A && "width" in A,
						m = J(p && A.width, void 0);
					if (p) {
						delete A.width;
						this.textWidth = m;
						var k = !0;
					}
					A &&
						"ellipsis" === A.textOverflow &&
						((A.whiteSpace = "nowrap"), (A.overflow = "hidden"));
					this.styles = K(this.styles, A);
					D(this.element, A);
					k && this.htmlUpdateTransform();
					return this;
				},
				htmlGetBBox: function () {
					var A = this.element;
					return {
						x: A.offsetLeft,
						y: A.offsetTop,
						width: A.offsetWidth,
						height: A.offsetHeight,
					};
				},
				htmlUpdateTransform: function () {
					if (this.added) {
						var A = this.renderer,
							p = this.element,
							m = this.translateX || 0,
							k = this.translateY || 0,
							a = this.x || 0,
							d = this.y || 0,
							l = this.textAlign || "left",
							h = { left: 0, center: 0.5, right: 1 }[l],
							f = this.styles,
							q = f && f.whiteSpace;
						D(p, { marginLeft: m, marginTop: k });
						!A.styledMode &&
							this.shadows &&
							this.shadows.forEach(function (a) {
								D(a, { marginLeft: m + 1, marginTop: k + 1 });
							});
						this.inverted &&
							[].forEach.call(p.childNodes, function (a) {
								A.invertChild(a, p);
							});
						if ("SPAN" === p.tagName) {
							f = this.rotation;
							var u = this.textWidth && B(this.textWidth),
								F = [f, l, p.innerHTML, this.textWidth, this.textAlign].join(),
								w;
							(w = u !== this.oldTextWidth) &&
								!(w = u > this.oldTextWidth) &&
								((w = this.textPxLength) ||
									(D(p, { width: "", whiteSpace: q || "nowrap" }),
									(w = p.offsetWidth)),
								(w = w > u));
							w &&
							(/[ \-]/.test(p.textContent || p.innerText) ||
								"ellipsis" === p.style.textOverflow)
								? (D(p, {
										width: u + "px",
										display: "block",
										whiteSpace: q || "normal",
								  }),
								  (this.oldTextWidth = u),
								  (this.hasBoxWidthChanged = !0))
								: (this.hasBoxWidthChanged = !1);
							F !== this.cTT &&
								((q = A.fontMetrics(p.style.fontSize, p).b),
								!L(f) ||
									(f === (this.oldRotation || 0) && l === this.oldAlign) ||
									this.setSpanRotation(f, h, q),
								this.getSpanCorrection(
									(!L(f) && this.textPxLength) || p.offsetWidth,
									q,
									h,
									f,
									l
								));
							D(p, {
								left: a + (this.xCorr || 0) + "px",
								top: d + (this.yCorr || 0) + "px",
							});
							this.cTT = F;
							this.oldRotation = f;
							this.oldAlign = l;
						}
					} else this.alignOnAdd = !0;
				},
				setSpanRotation: function (A, p, m) {
					var k = {},
						a = this.renderer.getTransformKey();
					k[a] = k.transform = "rotate(" + A + "deg)";
					k[a + (E ? "Origin" : "-origin")] = k.transformOrigin =
						100 * p + "% " + m + "px";
					D(this.element, k);
				},
				getSpanCorrection: function (A, p, m) {
					this.xCorr = -A * m;
					this.yCorr = -p;
				},
			});
			K(g.prototype, {
				getTransformKey: function () {
					return t && !/Edge/.test(m.navigator.userAgent)
						? "-ms-transform"
						: x
						? "-webkit-transform"
						: E
						? "MozTransform"
						: m.opera
						? "-o-transform"
						: "";
				},
				html: function (A, p, m) {
					var k = this.createElement("span"),
						a = k.element,
						d = k.renderer,
						l = d.isSVG,
						h = function (a, d) {
							["opacity", "visibility"].forEach(function (f) {
								a[f + "Setter"] = function (h, q, u) {
									var l = a.div ? a.div.style : d;
									z.prototype[f + "Setter"].call(this, h, q, u);
									l && (l[q] = h);
								};
							});
							a.addedSetters = !0;
						};
					k.textSetter = function (f) {
						f !== a.innerHTML && (delete this.bBox, delete this.oldTextWidth);
						this.textStr = f;
						a.innerHTML = J(f, "");
						k.doTransform = !0;
					};
					l && h(k, k.element.style);
					k.xSetter = k.ySetter = k.alignSetter = k.rotationSetter = function (
						a,
						d
					) {
						"align" === d && (d = "textAlign");
						k[d] = a;
						k.doTransform = !0;
					};
					k.afterSetters = function () {
						this.doTransform &&
							(this.htmlUpdateTransform(), (this.doTransform = !1));
					};
					k.attr({ text: A, x: Math.round(p), y: Math.round(m) }).css({
						position: "absolute",
					});
					d.styledMode ||
						k.css({
							fontFamily: this.style.fontFamily,
							fontSize: this.style.fontSize,
						});
					a.style.whiteSpace = "nowrap";
					k.css = k.htmlCss;
					l &&
						(k.add = function (f) {
							var q = d.box.parentNode,
								u = [];
							if ((this.parentGroup = f)) {
								var l = f.div;
								if (!l) {
									for (; f; ) u.push(f), (f = f.parentGroup);
									u.reverse().forEach(function (a) {
										function f(f, d) {
											a[d] = f;
											"translateX" === d
												? (w.left = f + "px")
												: (w.top = f + "px");
											a.doTransform = !0;
										}
										var d = G(a.element, "class");
										l = a.div =
											a.div ||
											r(
												"div",
												d ? { className: d } : void 0,
												{
													position: "absolute",
													left: (a.translateX || 0) + "px",
													top: (a.translateY || 0) + "px",
													display: a.display,
													opacity: a.opacity,
													pointerEvents: a.styles && a.styles.pointerEvents,
												},
												l || q
											);
										var w = l.style;
										K(a, {
											classSetter: (function (a) {
												return function (f) {
													this.element.setAttribute("class", f);
													a.className = f;
												};
											})(l),
											on: function () {
												u[0].div &&
													k.on.apply({ element: u[0].div }, arguments);
												return a;
											},
											translateXSetter: f,
											translateYSetter: f,
										});
										a.addedSetters || h(a);
									});
								}
							} else l = q;
							l.appendChild(a);
							k.added = !0;
							k.alignOnAdd && k.htmlUpdateTransform();
							return k;
						});
					return k;
				},
			});
		}
	);
	N(
		v,
		"parts/Tick.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var G = g.clamp,
				r = g.correctFloat,
				D = g.defined,
				L = g.destroyObjectProperties,
				K = g.extend,
				J = g.fireEvent,
				B = g.isNumber,
				E = g.merge,
				t = g.objectEach,
				x = g.pick,
				z = c.deg2rad;
			g = (function () {
				function m(A, p, m, k, a) {
					this.isNewLabel = this.isNew = !0;
					this.axis = A;
					this.pos = p;
					this.type = m || "";
					this.parameters = a || {};
					this.tickmarkOffset = this.parameters.tickmarkOffset;
					this.options = this.parameters.options;
					J(this, "init");
					m || k || this.addLabel();
				}
				m.prototype.addLabel = function () {
					var A = this,
						p = A.axis,
						m = p.options,
						k = p.chart,
						a = p.categories,
						d = p.logarithmic,
						l = p.names,
						h = A.pos,
						f = x(A.options && A.options.labels, m.labels),
						q = p.tickPositions,
						u = h === q[0],
						F = h === q[q.length - 1];
					l = this.parameters.category || (a ? x(a[h], l[h], h) : h);
					var w = A.label;
					a = (!f.step || 1 === f.step) && 1 === p.tickInterval;
					q = q.info;
					var H, y;
					if (p.dateTime && q) {
						var c = k.time.resolveDTLFormat(
							m.dateTimeLabelFormats[
								(!m.grid && q.higherRanks[h]) || q.unitName
							]
						);
						var g = c.main;
					}
					A.isFirst = u;
					A.isLast = F;
					A.formatCtx = {
						axis: p,
						chart: k,
						isFirst: u,
						isLast: F,
						dateTimeLabelFormat: g,
						tickPositionInfo: q,
						value: d ? r(d.lin2log(l)) : l,
						pos: h,
					};
					m = p.labelFormatter.call(A.formatCtx, this.formatCtx);
					if ((y = c && c.list))
						A.shortenLabel = function () {
							for (H = 0; H < y.length; H++)
								if (
									(w.attr({
										text: p.labelFormatter.call(
											K(A.formatCtx, { dateTimeLabelFormat: y[H] })
										),
									}),
									w.getBBox().width < p.getSlotWidth(A) - 2 * x(f.padding, 5))
								)
									return;
							w.attr({ text: "" });
						};
					a && p._addedPlotLB && p.isXAxis && A.moveLabel(m, f);
					D(w) || A.movedLabel
						? w &&
						  w.textStr !== m &&
						  !a &&
						  (!w.textWidth ||
								(f.style && f.style.width) ||
								w.styles.width ||
								w.css({ width: null }),
						  w.attr({ text: m }),
						  (w.textPxLength = w.getBBox().width))
						: ((A.label = w = A.createLabel({ x: 0, y: 0 }, m, f)),
						  (A.rotation = 0));
				};
				m.prototype.createLabel = function (A, p, m) {
					var k = this.axis,
						a = k.chart;
					if (
						(A =
							D(p) && m.enabled
								? a.renderer.text(p, A.x, A.y, m.useHTML).add(k.labelGroup)
								: null)
					)
						a.styledMode || A.css(E(m.style)),
							(A.textPxLength = A.getBBox().width);
					return A;
				};
				m.prototype.destroy = function () {
					L(this, this.axis);
				};
				m.prototype.getPosition = function (A, p, m, k) {
					var a = this.axis,
						d = a.chart,
						l = (k && d.oldChartHeight) || d.chartHeight;
					A = {
						x: A
							? r(a.translate(p + m, null, null, k) + a.transB)
							: a.left +
							  a.offset +
							  (a.opposite
									? ((k && d.oldChartWidth) || d.chartWidth) - a.right - a.left
									: 0),
						y: A
							? l - a.bottom + a.offset - (a.opposite ? a.height : 0)
							: r(l - a.translate(p + m, null, null, k) - a.transB),
					};
					A.y = G(A.y, -1e5, 1e5);
					J(this, "afterGetPosition", { pos: A });
					return A;
				};
				m.prototype.getLabelPosition = function (A, p, m, k, a, d, l, h) {
					var f = this.axis,
						q = f.transA,
						u =
							f.isLinked && f.linkedParent
								? f.linkedParent.reversed
								: f.reversed,
						F = f.staggerLines,
						w = f.tickRotCorr || { x: 0, y: 0 },
						H = a.y,
						y =
							k || f.reserveSpaceDefault
								? 0
								: -f.labelOffset * ("center" === f.labelAlign ? 0.5 : 1),
						c = {};
					D(H) ||
						(H =
							0 === f.side
								? m.rotation
									? -8
									: -m.getBBox().height
								: 2 === f.side
								? w.y + 8
								: Math.cos(m.rotation * z) *
								  (w.y - m.getBBox(!1, 0).height / 2));
					A = A + a.x + y + w.x - (d && k ? d * q * (u ? -1 : 1) : 0);
					p = p + H - (d && !k ? d * q * (u ? 1 : -1) : 0);
					F &&
						((m = (l / (h || 1)) % F),
						f.opposite && (m = F - m - 1),
						(p += (f.labelOffset / F) * m));
					c.x = A;
					c.y = Math.round(p);
					J(this, "afterGetLabelPosition", {
						pos: c,
						tickmarkOffset: d,
						index: l,
					});
					return c;
				};
				m.prototype.getLabelSize = function () {
					return this.label
						? this.label.getBBox()[this.axis.horiz ? "height" : "width"]
						: 0;
				};
				m.prototype.getMarkPath = function (m, p, c, k, a, d) {
					return d.crispLine(
						[
							["M", m, p],
							["L", m + (a ? 0 : -c), p + (a ? c : 0)],
						],
						k
					);
				};
				m.prototype.handleOverflow = function (m) {
					var p = this.axis,
						A = p.options.labels,
						k = m.x,
						a = p.chart.chartWidth,
						d = p.chart.spacing,
						l = x(p.labelLeft, Math.min(p.pos, d[3]));
					d = x(
						p.labelRight,
						Math.max(p.isRadial ? 0 : p.pos + p.len, a - d[1])
					);
					var h = this.label,
						f = this.rotation,
						q = { left: 0, center: 0.5, right: 1 }[
							p.labelAlign || h.attr("align")
						],
						u = h.getBBox().width,
						F = p.getSlotWidth(this),
						w = F,
						H = 1,
						y,
						c = {};
					if (f || "justify" !== x(A.overflow, "justify"))
						0 > f && k - q * u < l
							? (y = Math.round(k / Math.cos(f * z) - l))
							: 0 < f &&
							  k + q * u > d &&
							  (y = Math.round((a - k) / Math.cos(f * z)));
					else if (
						((a = k + (1 - q) * u),
						k - q * u < l
							? (w = m.x + w * (1 - q) - l)
							: a > d && ((w = d - m.x + w * q), (H = -1)),
						(w = Math.min(F, w)),
						w < F &&
							"center" === p.labelAlign &&
							(m.x += H * (F - w - q * (F - Math.min(u, w)))),
						u > w || (p.autoRotation && (h.styles || {}).width))
					)
						y = w;
					y &&
						(this.shortenLabel
							? this.shortenLabel()
							: ((c.width = Math.floor(y) + "px"),
							  (A.style || {}).textOverflow || (c.textOverflow = "ellipsis"),
							  h.css(c)));
				};
				m.prototype.moveLabel = function (m, p) {
					var A = this,
						k = A.label,
						a = !1,
						d = A.axis,
						l = d.reversed,
						h = d.chart.inverted;
					k && k.textStr === m
						? ((A.movedLabel = k), (a = !0), delete A.label)
						: t(d.ticks, function (f) {
								a ||
									f.isNew ||
									f === A ||
									!f.label ||
									f.label.textStr !== m ||
									((A.movedLabel = f.label),
									(a = !0),
									(f.labelPos = A.movedLabel.xy),
									delete f.label);
						  });
					if (!a && (A.labelPos || k)) {
						var f = A.labelPos || k.xy;
						k = h ? f.x : l ? 0 : d.width + d.left;
						d = h ? (l ? d.width + d.left : 0) : f.y;
						A.movedLabel = A.createLabel({ x: k, y: d }, m, p);
						A.movedLabel && A.movedLabel.attr({ opacity: 0 });
					}
				};
				m.prototype.render = function (m, p, c) {
					var k = this.axis,
						a = k.horiz,
						d = this.pos,
						l = x(this.tickmarkOffset, k.tickmarkOffset);
					d = this.getPosition(a, d, l, p);
					l = d.x;
					var h = d.y;
					k = (a && l === k.pos + k.len) || (!a && h === k.pos) ? -1 : 1;
					c = x(c, 1);
					this.isActive = !0;
					this.renderGridLine(p, c, k);
					this.renderMark(d, c, k);
					this.renderLabel(d, p, c, m);
					this.isNew = !1;
					J(this, "afterRender");
				};
				m.prototype.renderGridLine = function (m, p, c) {
					var k = this.axis,
						a = k.options,
						d = this.gridLine,
						l = {},
						h = this.pos,
						f = this.type,
						q = x(this.tickmarkOffset, k.tickmarkOffset),
						u = k.chart.renderer,
						F = f ? f + "Grid" : "grid",
						w = a[F + "LineWidth"],
						H = a[F + "LineColor"];
					a = a[F + "LineDashStyle"];
					d ||
						(k.chart.styledMode ||
							((l.stroke = H), (l["stroke-width"] = w), a && (l.dashstyle = a)),
						f || (l.zIndex = 1),
						m && (p = 0),
						(this.gridLine = d = u
							.path()
							.attr(l)
							.addClass("highcharts-" + (f ? f + "-" : "") + "grid-line")
							.add(k.gridGroup)));
					if (
						d &&
						(c = k.getPlotLinePath({
							value: h + q,
							lineWidth: d.strokeWidth() * c,
							force: "pass",
							old: m,
						}))
					)
						d[m || this.isNew ? "attr" : "animate"]({ d: c, opacity: p });
				};
				m.prototype.renderMark = function (m, p, c) {
					var k = this.axis,
						a = k.options,
						d = k.chart.renderer,
						l = this.type,
						h = l ? l + "Tick" : "tick",
						f = k.tickSize(h),
						q = this.mark,
						u = !q,
						F = m.x;
					m = m.y;
					var w = x(a[h + "Width"], !l && k.isXAxis ? 1 : 0);
					a = a[h + "Color"];
					f &&
						(k.opposite && (f[0] = -f[0]),
						u &&
							((this.mark = q = d
								.path()
								.addClass("highcharts-" + (l ? l + "-" : "") + "tick")
								.add(k.axisGroup)),
							k.chart.styledMode || q.attr({ stroke: a, "stroke-width": w })),
						q[u ? "attr" : "animate"]({
							d: this.getMarkPath(F, m, f[0], q.strokeWidth() * c, k.horiz, d),
							opacity: p,
						}));
				};
				m.prototype.renderLabel = function (m, p, c, k) {
					var a = this.axis,
						d = a.horiz,
						l = a.options,
						h = this.label,
						f = l.labels,
						q = f.step;
					a = x(this.tickmarkOffset, a.tickmarkOffset);
					var u = !0,
						F = m.x;
					m = m.y;
					h &&
						B(F) &&
						((h.xy = m = this.getLabelPosition(F, m, h, d, f, a, k, q)),
						(this.isFirst && !this.isLast && !x(l.showFirstLabel, 1)) ||
						(this.isLast && !this.isFirst && !x(l.showLastLabel, 1))
							? (u = !1)
							: !d ||
							  f.step ||
							  f.rotation ||
							  p ||
							  0 === c ||
							  this.handleOverflow(m),
						q && k % q && (u = !1),
						u && B(m.y)
							? ((m.opacity = c),
							  h[this.isNewLabel ? "attr" : "animate"](m),
							  (this.isNewLabel = !1))
							: (h.attr("y", -9999), (this.isNewLabel = !0)));
				};
				m.prototype.replaceMovedLabel = function () {
					var m = this.label,
						p = this.axis,
						c = p.reversed,
						k = this.axis.chart.inverted;
					if (m && !this.isNew) {
						var a = k ? m.xy.x : c ? p.left : p.width + p.left;
						c = k ? (c ? p.width + p.top : p.top) : m.xy.y;
						m.animate({ x: a, y: c, opacity: 0 }, void 0, m.destroy);
						delete this.label;
					}
					p.isDirty = !0;
					this.label = this.movedLabel;
					delete this.movedLabel;
				};
				return m;
			})();
			c.Tick = g;
			return c.Tick;
		}
	);
	N(
		v,
		"parts/Time.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var G = g.defined,
				r = g.error,
				D = g.extend,
				L = g.isObject,
				K = g.merge,
				J = g.objectEach,
				B = g.pad,
				E = g.pick,
				t = g.splat,
				x = g.timeUnits,
				z = c.win;
			g = (function () {
				function m(m) {
					this.options = {};
					this.variableTimezone = this.useUTC = !1;
					this.Date = z.Date;
					this.getTimezoneOffset = this.timezoneOffsetFunction();
					this.update(m);
				}
				m.prototype.get = function (m, p) {
					if (this.variableTimezone || this.timezoneOffset) {
						var c = p.getTime(),
							k = c - this.getTimezoneOffset(p);
						p.setTime(k);
						m = p["getUTC" + m]();
						p.setTime(c);
						return m;
					}
					return this.useUTC ? p["getUTC" + m]() : p["get" + m]();
				};
				m.prototype.set = function (m, p, c) {
					if (this.variableTimezone || this.timezoneOffset) {
						if ("Milliseconds" === m || "Seconds" === m || "Minutes" === m)
							return p["setUTC" + m](c);
						var k = this.getTimezoneOffset(p);
						k = p.getTime() - k;
						p.setTime(k);
						p["setUTC" + m](c);
						m = this.getTimezoneOffset(p);
						k = p.getTime() + m;
						return p.setTime(k);
					}
					return this.useUTC ? p["setUTC" + m](c) : p["set" + m](c);
				};
				m.prototype.update = function (m) {
					var p = E(m && m.useUTC, !0);
					this.options = m = K(!0, this.options || {}, m);
					this.Date = m.Date || z.Date || Date;
					this.timezoneOffset = (this.useUTC = p) && m.timezoneOffset;
					this.getTimezoneOffset = this.timezoneOffsetFunction();
					this.variableTimezone = !(p && !m.getTimezoneOffset && !m.timezone);
				};
				m.prototype.makeTime = function (m, p, g, k, a, d) {
					if (this.useUTC) {
						var l = this.Date.UTC.apply(0, arguments);
						var h = this.getTimezoneOffset(l);
						l += h;
						var f = this.getTimezoneOffset(l);
						h !== f
							? (l += f - h)
							: h - 36e5 !== this.getTimezoneOffset(l - 36e5) ||
							  c.isSafari ||
							  (l -= 36e5);
					} else
						l = new this.Date(
							m,
							p,
							E(g, 1),
							E(k, 0),
							E(a, 0),
							E(d, 0)
						).getTime();
					return l;
				};
				m.prototype.timezoneOffsetFunction = function () {
					var m = this,
						p = this.options,
						c = z.moment;
					if (!this.useUTC)
						return function (k) {
							return 6e4 * new Date(k.toString()).getTimezoneOffset();
						};
					if (p.timezone) {
						if (c)
							return function (k) {
								return 6e4 * -c.tz(k, p.timezone).utcOffset();
							};
						r(25);
					}
					return this.useUTC && p.getTimezoneOffset
						? function (k) {
								return 6e4 * p.getTimezoneOffset(k.valueOf());
						  }
						: function () {
								return 6e4 * (m.timezoneOffset || 0);
						  };
				};
				m.prototype.dateFormat = function (m, p, g) {
					var k;
					if (!G(p) || isNaN(p))
						return (
							(null === (k = c.defaultOptions.lang) || void 0 === k
								? void 0
								: k.invalidDate) || ""
						);
					m = E(m, "%Y-%m-%d %H:%M:%S");
					var a = this;
					k = new this.Date(p);
					var d = this.get("Hours", k),
						l = this.get("Day", k),
						h = this.get("Date", k),
						f = this.get("Month", k),
						q = this.get("FullYear", k),
						u = c.defaultOptions.lang,
						F = null === u || void 0 === u ? void 0 : u.weekdays,
						w = null === u || void 0 === u ? void 0 : u.shortWeekdays;
					k = D(
						{
							a: w ? w[l] : F[l].substr(0, 3),
							A: F[l],
							d: B(h),
							e: B(h, 2, " "),
							w: l,
							b: u.shortMonths[f],
							B: u.months[f],
							m: B(f + 1),
							o: f + 1,
							y: q.toString().substr(2, 2),
							Y: q,
							H: B(d),
							k: d,
							I: B(d % 12 || 12),
							l: d % 12 || 12,
							M: B(this.get("Minutes", k)),
							p: 12 > d ? "AM" : "PM",
							P: 12 > d ? "am" : "pm",
							S: B(k.getSeconds()),
							L: B(Math.floor(p % 1e3), 3),
						},
						c.dateFormats
					);
					J(k, function (f, d) {
						for (; -1 !== m.indexOf("%" + d); )
							m = m.replace(
								"%" + d,
								"function" === typeof f ? f.call(a, p) : f
							);
					});
					return g ? m.substr(0, 1).toUpperCase() + m.substr(1) : m;
				};
				m.prototype.resolveDTLFormat = function (m) {
					return L(m, !0)
						? m
						: ((m = t(m)), { main: m[0], from: m[1], to: m[2] });
				};
				m.prototype.getTimeTicks = function (m, p, c, k) {
					var a = this,
						d = [],
						l = {};
					var h = new a.Date(p);
					var f = m.unitRange,
						q = m.count || 1,
						u;
					k = E(k, 1);
					if (G(p)) {
						a.set(
							"Milliseconds",
							h,
							f >= x.second ? 0 : q * Math.floor(a.get("Milliseconds", h) / q)
						);
						f >= x.second &&
							a.set(
								"Seconds",
								h,
								f >= x.minute ? 0 : q * Math.floor(a.get("Seconds", h) / q)
							);
						f >= x.minute &&
							a.set(
								"Minutes",
								h,
								f >= x.hour ? 0 : q * Math.floor(a.get("Minutes", h) / q)
							);
						f >= x.hour &&
							a.set(
								"Hours",
								h,
								f >= x.day ? 0 : q * Math.floor(a.get("Hours", h) / q)
							);
						f >= x.day &&
							a.set(
								"Date",
								h,
								f >= x.month
									? 1
									: Math.max(1, q * Math.floor(a.get("Date", h) / q))
							);
						if (f >= x.month) {
							a.set(
								"Month",
								h,
								f >= x.year ? 0 : q * Math.floor(a.get("Month", h) / q)
							);
							var F = a.get("FullYear", h);
						}
						f >= x.year && a.set("FullYear", h, F - (F % q));
						f === x.week &&
							((F = a.get("Day", h)),
							a.set("Date", h, a.get("Date", h) - F + k + (F < k ? -7 : 0)));
						F = a.get("FullYear", h);
						k = a.get("Month", h);
						var w = a.get("Date", h),
							H = a.get("Hours", h);
						p = h.getTime();
						a.variableTimezone &&
							(u =
								c - p > 4 * x.month ||
								a.getTimezoneOffset(p) !== a.getTimezoneOffset(c));
						p = h.getTime();
						for (h = 1; p < c; )
							d.push(p),
								(p =
									f === x.year
										? a.makeTime(F + h * q, 0)
										: f === x.month
										? a.makeTime(F, k + h * q)
										: !u || (f !== x.day && f !== x.week)
										? u && f === x.hour && 1 < q
											? a.makeTime(F, k, w, H + h * q)
											: p + f * q
										: a.makeTime(F, k, w + h * q * (f === x.day ? 1 : 7))),
								h++;
						d.push(p);
						f <= x.hour &&
							1e4 > d.length &&
							d.forEach(function (f) {
								0 === f % 18e5 &&
									"000000000" === a.dateFormat("%H%M%S%L", f) &&
									(l[f] = "day");
							});
					}
					d.info = D(m, { higherRanks: l, totalRange: f * q });
					return d;
				};
				m.defaultOptions = {
					Date: void 0,
					getTimezoneOffset: void 0,
					timezone: void 0,
					timezoneOffset: 0,
					useUTC: !0,
				};
				return m;
			})();
			c.Time = g;
			return c.Time;
		}
	);
	N(
		v,
		"parts/Options.js",
		[
			v["parts/Globals.js"],
			v["parts/Time.js"],
			v["parts/Color.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, G, r) {
			G = G.parse;
			var D = r.merge;
			c.defaultOptions = {
				colors: "#7cb5ec #434348 #90ed7d #f7a35c #8085e9 #f15c80 #e4d354 #2b908f #f45b5b #91e8e1".split(
					" "
				),
				symbols: ["circle", "diamond", "square", "triangle", "triangle-down"],
				lang: {
					loading: "Loading...",
					months: "January February March April May June July August September October November December".split(
						" "
					),
					shortMonths: "Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec".split(
						" "
					),
					weekdays: "Sunday Monday Tuesday Wednesday Thursday Friday Saturday".split(
						" "
					),
					decimalPoint: ".",
					numericSymbols: "kMGTPE".split(""),
					resetZoom: "Reset zoom",
					resetZoomTitle: "Reset zoom level 1:1",
					thousandsSep: " ",
				},
				global: {},
				time: g.defaultOptions,
				chart: {
					styledMode: !1,
					borderRadius: 0,
					colorCount: 10,
					defaultSeriesType: "line",
					ignoreHiddenSeries: !0,
					spacing: [10, 10, 15, 10],
					resetZoomButton: {
						theme: { zIndex: 6 },
						position: { align: "right", x: -10, y: 10 },
					},
					width: null,
					height: null,
					borderColor: "#335cad",
					backgroundColor: "#ffffff",
					plotBorderColor: "#cccccc",
				},
				title: {
					text: "Chart title",
					align: "center",
					margin: 15,
					widthAdjust: -44,
				},
				subtitle: { text: "", align: "center", widthAdjust: -44 },
				caption: {
					margin: 15,
					text: "",
					align: "left",
					verticalAlign: "bottom",
				},
				plotOptions: {},
				labels: { style: { position: "absolute", color: "#333333" } },
				legend: {
					enabled: !0,
					align: "center",
					alignColumns: !0,
					layout: "horizontal",
					labelFormatter: function () {
						return this.name;
					},
					borderColor: "#999999",
					borderRadius: 0,
					navigation: { activeColor: "#003399", inactiveColor: "#cccccc" },
					itemStyle: {
						color: "#333333",
						cursor: "pointer",
						fontSize: "12px",
						fontWeight: "bold",
						textOverflow: "ellipsis",
					},
					itemHoverStyle: { color: "#000000" },
					itemHiddenStyle: { color: "#cccccc" },
					shadow: !1,
					itemCheckboxStyle: {
						position: "absolute",
						width: "13px",
						height: "13px",
					},
					squareSymbol: !0,
					symbolPadding: 5,
					verticalAlign: "bottom",
					x: 0,
					y: 0,
					title: { style: { fontWeight: "bold" } },
				},
				loading: {
					labelStyle: { fontWeight: "bold", position: "relative", top: "45%" },
					style: {
						position: "absolute",
						backgroundColor: "#ffffff",
						opacity: 0.5,
						textAlign: "center",
					},
				},
				tooltip: {
					enabled: !0,
					animation: c.svg,
					borderRadius: 3,
					dateTimeLabelFormats: {
						millisecond: "%A, %b %e, %H:%M:%S.%L",
						second: "%A, %b %e, %H:%M:%S",
						minute: "%A, %b %e, %H:%M",
						hour: "%A, %b %e, %H:%M",
						day: "%A, %b %e, %Y",
						week: "Week from %A, %b %e, %Y",
						month: "%B %Y",
						year: "%Y",
					},
					footerFormat: "",
					padding: 8,
					snap: c.isTouchDevice ? 25 : 10,
					headerFormat: '<span style="font-size: 10px">{point.key}</span><br/>',
					pointFormat:
						'<span style="color:{point.color}">\u25cf</span> {series.name}: <b>{point.y}</b><br/>',
					backgroundColor: G("#f7f7f7").setOpacity(0.85).get(),
					borderWidth: 1,
					shadow: !0,
					style: {
						color: "#333333",
						cursor: "default",
						fontSize: "12px",
						whiteSpace: "nowrap",
					},
				},
				credits: {
					enabled: !0,
					href: "https://www.highcharts.com?credits",
					position: { align: "right", x: -10, verticalAlign: "bottom", y: -5 },
					style: { cursor: "pointer", color: "#999999", fontSize: "9px" },
					text: "© DISPARDA BALI",
				},
			};
			c.setOptions = function (g) {
				c.defaultOptions = D(!0, c.defaultOptions, g);
				(g.time || g.global) &&
					c.time.update(
						D(c.defaultOptions.global, c.defaultOptions.time, g.global, g.time)
					);
				return c.defaultOptions;
			};
			c.getOptions = function () {
				return c.defaultOptions;
			};
			c.defaultPlotOptions = c.defaultOptions.plotOptions;
			c.time = new g(D(c.defaultOptions.global, c.defaultOptions.time));
			c.dateFormat = function (g, r, J) {
				return c.time.dateFormat(g, r, J);
			};
			("");
		}
	);
	N(
		v,
		"parts/Axis.js",
		[
			v["parts/Color.js"],
			v["parts/Globals.js"],
			v["parts/Tick.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, G, r) {
			var D = r.addEvent,
				L = r.animObject,
				K = r.arrayMax,
				J = r.arrayMin,
				B = r.clamp,
				E = r.correctFloat,
				t = r.defined,
				x = r.destroyObjectProperties,
				z = r.error,
				m = r.extend,
				A = r.fireEvent,
				p = r.format,
				M = r.getMagnitude,
				k = r.isArray,
				a = r.isFunction,
				d = r.isNumber,
				l = r.isString,
				h = r.merge,
				f = r.normalizeTickInterval,
				q = r.objectEach,
				u = r.pick,
				F = r.relativeLength,
				w = r.removeEvent,
				H = r.splat,
				y = r.syncTimeout,
				Q = g.defaultOptions,
				P = g.deg2rad;
			r = (function () {
				function C(e, b) {
					this.zoomEnabled = this.width = this.visible = this.userOptions = this.translationSlope = this.transB = this.transA = this.top = this.ticks = this.tickRotCorr = this.tickPositions = this.tickmarkOffset = this.tickInterval = this.tickAmount = this.side = this.series = this.right = this.positiveValuesOnly = this.pos = this.pointRangePadding = this.pointRange = this.plotLinesAndBandsGroups = this.plotLinesAndBands = this.paddedTicks = this.overlap = this.options = this.oldMin = this.oldMax = this.offset = this.names = this.minPixelPadding = this.minorTicks = this.minorTickInterval = this.min = this.maxLabelLength = this.max = this.len = this.left = this.labelFormatter = this.labelEdge = this.isLinked = this.height = this.hasVisibleSeries = this.hasNames = this.coll = this.closestPointRange = this.chart = this.categories = this.bottom = this.alternateBands = void 0;
					this.init(e, b);
				}
				C.prototype.init = function (e, b) {
					var f = b.isX,
						d = this;
					d.chart = e;
					d.horiz = e.inverted && !d.isZAxis ? !f : f;
					d.isXAxis = f;
					d.coll = d.coll || (f ? "xAxis" : "yAxis");
					A(this, "init", { userOptions: b });
					d.opposite = b.opposite;
					d.side =
						b.side || (d.horiz ? (d.opposite ? 0 : 2) : d.opposite ? 1 : 3);
					d.setOptions(b);
					var h = this.options,
						l = h.type;
					d.labelFormatter = h.labels.formatter || d.defaultLabelFormatter;
					d.userOptions = b;
					d.minPixelPadding = 0;
					d.reversed = h.reversed;
					d.visible = !1 !== h.visible;
					d.zoomEnabled = !1 !== h.zoomEnabled;
					d.hasNames = "category" === l || !0 === h.categories;
					d.categories = h.categories || d.hasNames;
					d.names || ((d.names = []), (d.names.keys = {}));
					d.plotLinesAndBandsGroups = {};
					d.positiveValuesOnly = !(!d.logarithmic || h.allowNegativeLog);
					d.isLinked = t(h.linkedTo);
					d.ticks = {};
					d.labelEdge = [];
					d.minorTicks = {};
					d.plotLinesAndBands = [];
					d.alternateBands = {};
					d.len = 0;
					d.minRange = d.userMinRange = h.minRange || h.maxZoom;
					d.range = h.range;
					d.offset = h.offset || 0;
					d.max = null;
					d.min = null;
					d.crosshair = u(
						h.crosshair,
						H(e.options.tooltip.crosshairs)[f ? 0 : 1],
						!1
					);
					b = d.options.events;
					-1 === e.axes.indexOf(d) &&
						(f ? e.axes.splice(e.xAxis.length, 0, d) : e.axes.push(d),
						e[d.coll].push(d));
					d.series = d.series || [];
					e.inverted &&
						!d.isZAxis &&
						f &&
						"undefined" === typeof d.reversed &&
						(d.reversed = !0);
					d.labelRotation = d.options.labels.rotation;
					q(b, function (b, e) {
						a(b) && D(d, e, b);
					});
					A(this, "afterInit");
				};
				C.prototype.setOptions = function (e) {
					this.options = h(
						C.defaultOptions,
						"yAxis" === this.coll && C.defaultYAxisOptions,
						[
							C.defaultTopAxisOptions,
							C.defaultRightAxisOptions,
							C.defaultBottomAxisOptions,
							C.defaultLeftAxisOptions,
						][this.side],
						h(Q[this.coll], e)
					);
					A(this, "afterSetOptions", { userOptions: e });
				};
				C.prototype.defaultLabelFormatter = function () {
					var e = this.axis,
						b = this.value,
						a = e.chart.time,
						f = e.categories,
						d = this.dateTimeLabelFormat,
						h = Q.lang,
						q = h.numericSymbols;
					h = h.numericSymbolMagnitude || 1e3;
					var u = q && q.length,
						l = e.options.labels.format;
					e = e.logarithmic ? Math.abs(b) : e.tickInterval;
					var k = this.chart,
						w = k.numberFormatter;
					if (l) var m = p(l, this, k);
					else if (f) m = b;
					else if (d) m = a.dateFormat(d, b);
					else if (u && 1e3 <= e)
						for (; u-- && "undefined" === typeof m; )
							(a = Math.pow(h, u + 1)),
								e >= a &&
									0 === (10 * b) % a &&
									null !== q[u] &&
									0 !== b &&
									(m = w(b / a, -1) + q[u]);
					"undefined" === typeof m &&
						(m = 1e4 <= Math.abs(b) ? w(b, -1) : w(b, -1, void 0, ""));
					return m;
				};
				C.prototype.getSeriesExtremes = function () {
					var e = this,
						b = e.chart,
						a;
					A(this, "getSeriesExtremes", null, function () {
						e.hasVisibleSeries = !1;
						e.dataMin = e.dataMax = e.threshold = null;
						e.softThreshold = !e.isXAxis;
						e.stacking && e.stacking.buildStacks();
						e.series.forEach(function (f) {
							if (f.visible || !b.options.chart.ignoreHiddenSeries) {
								var n = f.options,
									h = n.threshold;
								e.hasVisibleSeries = !0;
								e.positiveValuesOnly && 0 >= h && (h = null);
								if (e.isXAxis) {
									if (((n = f.xData), n.length)) {
										a = f.getXExtremes(n);
										var q = a.min;
										var l = a.max;
										d(q) ||
											q instanceof Date ||
											((n = n.filter(d)),
											(a = f.getXExtremes(n)),
											(q = a.min),
											(l = a.max));
										n.length &&
											((e.dataMin = Math.min(u(e.dataMin, q), q)),
											(e.dataMax = Math.max(u(e.dataMax, l), l)));
									}
								} else if (
									((f = f.applyExtremes()),
									d(f.dataMin) &&
										((q = f.dataMin),
										(e.dataMin = Math.min(u(e.dataMin, q), q))),
									d(f.dataMax) &&
										((l = f.dataMax),
										(e.dataMax = Math.max(u(e.dataMax, l), l))),
									t(h) && (e.threshold = h),
									!n.softThreshold || e.positiveValuesOnly)
								)
									e.softThreshold = !1;
							}
						});
					});
					A(this, "afterGetSeriesExtremes");
				};
				C.prototype.translate = function (e, b, a, f, h, q) {
					var n = this.linkedParent || this,
						u = 1,
						l = 0,
						k = f ? n.oldTransA : n.transA;
					f = f ? n.oldMin : n.min;
					var w = n.minPixelPadding;
					h =
						(n.isOrdinal ||
							(n.brokenAxis && n.brokenAxis.hasBreaks) ||
							(n.logarithmic && h)) &&
						n.lin2val;
					k || (k = n.transA);
					a && ((u *= -1), (l = n.len));
					n.reversed && ((u *= -1), (l -= u * (n.sector || n.len)));
					b
						? ((e = (e * u + l - w) / k + f), h && (e = n.lin2val(e)))
						: (h && (e = n.val2lin(e)),
						  (e = d(f)
								? u * (e - f) * k + l + u * w + (d(q) ? k * q : 0)
								: void 0));
					return e;
				};
				C.prototype.toPixels = function (e, b) {
					return (
						this.translate(e, !1, !this.horiz, null, !0) + (b ? 0 : this.pos)
					);
				};
				C.prototype.toValue = function (e, b) {
					return this.translate(
						e - (b ? 0 : this.pos),
						!0,
						!this.horiz,
						null,
						!0
					);
				};
				C.prototype.getPlotLinePath = function (e) {
					function b(b, e, a) {
						if (("pass" !== y && b < e) || b > a)
							y ? (b = B(b, e, a)) : (t = !0);
						return b;
					}
					var a = this,
						f = a.chart,
						h = a.left,
						q = a.top,
						l = e.old,
						k = e.value,
						w = e.translatedValue,
						m = e.lineWidth,
						y = e.force,
						F,
						H,
						p,
						c,
						g = (l && f.oldChartHeight) || f.chartHeight,
						z = (l && f.oldChartWidth) || f.chartWidth,
						t,
						x = a.transB;
					e = {
						value: k,
						lineWidth: m,
						old: l,
						force: y,
						acrossPanes: e.acrossPanes,
						translatedValue: w,
					};
					A(this, "getPlotLinePath", e, function (e) {
						w = u(w, a.translate(k, null, null, l));
						w = B(w, -1e5, 1e5);
						F = p = Math.round(w + x);
						H = c = Math.round(g - w - x);
						d(w)
							? a.horiz
								? ((H = q), (c = g - a.bottom), (F = p = b(F, h, h + a.width)))
								: ((F = h), (p = z - a.right), (H = c = b(H, q, q + a.height)))
							: ((t = !0), (y = !1));
						e.path =
							t && !y
								? null
								: f.renderer.crispLine(
										[
											["M", F, H],
											["L", p, c],
										],
										m || 1
								  );
					});
					return e.path;
				};
				C.prototype.getLinearTickPositions = function (e, b, a) {
					var f = E(Math.floor(b / e) * e);
					a = E(Math.ceil(a / e) * e);
					var d = [],
						n;
					E(f + e) === f && (n = 20);
					if (this.single) return [b];
					for (b = f; b <= a; ) {
						d.push(b);
						b = E(b + e, n);
						if (b === h) break;
						var h = b;
					}
					return d;
				};
				C.prototype.getMinorTickInterval = function () {
					var e = this.options;
					return !0 === e.minorTicks
						? u(e.minorTickInterval, "auto")
						: !1 === e.minorTicks
						? null
						: e.minorTickInterval;
				};
				C.prototype.getMinorTickPositions = function () {
					var e = this.options,
						b = this.tickPositions,
						a = this.minorTickInterval,
						f = [],
						d = this.pointRangePadding || 0,
						h = this.min - d;
					d = this.max + d;
					var q = d - h;
					if (q && q / a < this.len / 3) {
						var u = this.logarithmic;
						if (u)
							this.paddedTicks.forEach(function (b, e, d) {
								e &&
									f.push.apply(f, u.getLogTickPositions(a, d[e - 1], d[e], !0));
							});
						else if (this.dateTime && "auto" === this.getMinorTickInterval())
							f = f.concat(
								this.getTimeTicks(
									this.dateTime.normalizeTimeTickInterval(a),
									h,
									d,
									e.startOfWeek
								)
							);
						else
							for (e = h + ((b[0] - h) % a); e <= d && e !== f[0]; e += a)
								f.push(e);
					}
					0 !== f.length && this.trimTicks(f);
					return f;
				};
				C.prototype.adjustForMinRange = function () {
					var e = this.options,
						b = this.min,
						a = this.max,
						f = this.logarithmic,
						d,
						h,
						q,
						l,
						k;
					this.isXAxis &&
						"undefined" === typeof this.minRange &&
						!f &&
						(t(e.min) || t(e.max)
							? (this.minRange = null)
							: (this.series.forEach(function (b) {
									l = b.xData;
									for (h = k = b.xIncrement ? 1 : l.length - 1; 0 < h; h--)
										if (
											((q = l[h] - l[h - 1]), "undefined" === typeof d || q < d)
										)
											d = q;
							  }),
							  (this.minRange = Math.min(
									5 * d,
									this.dataMax - this.dataMin
							  ))));
					if (a - b < this.minRange) {
						var w = this.dataMax - this.dataMin >= this.minRange;
						var m = this.minRange;
						var y = (m - a + b) / 2;
						y = [b - y, u(e.min, b - y)];
						w &&
							(y[2] = this.logarithmic
								? this.logarithmic.log2lin(this.dataMin)
								: this.dataMin);
						b = K(y);
						a = [b + m, u(e.max, b + m)];
						w && (a[2] = f ? f.log2lin(this.dataMax) : this.dataMax);
						a = J(a);
						a - b < m && ((y[0] = a - m), (y[1] = u(e.min, a - m)), (b = K(y)));
					}
					this.min = b;
					this.max = a;
				};
				C.prototype.getClosest = function () {
					var e;
					this.categories
						? (e = 1)
						: this.series.forEach(function (b) {
								var a = b.closestPointRange,
									f = b.visible || !b.chart.options.chart.ignoreHiddenSeries;
								!b.noSharedTooltip &&
									t(a) &&
									f &&
									(e = t(e) ? Math.min(e, a) : a);
						  });
					return e;
				};
				C.prototype.nameToX = function (e) {
					var b = k(this.categories),
						a = b ? this.categories : this.names,
						f = e.options.x;
					e.series.requireSorting = !1;
					t(f) ||
						(f =
							!1 === this.options.uniqueNames
								? e.series.autoIncrement()
								: b
								? a.indexOf(e.name)
								: u(a.keys[e.name], -1));
					if (-1 === f) {
						if (!b) var d = a.length;
					} else d = f;
					"undefined" !== typeof d &&
						((this.names[d] = e.name), (this.names.keys[e.name] = d));
					return d;
				};
				C.prototype.updateNames = function () {
					var e = this,
						b = this.names;
					0 < b.length &&
						(Object.keys(b.keys).forEach(function (e) {
							delete b.keys[e];
						}),
						(b.length = 0),
						(this.minRange = this.userMinRange),
						(this.series || []).forEach(function (b) {
							b.xIncrement = null;
							if (!b.points || b.isDirtyData)
								(e.max = Math.max(e.max, b.xData.length - 1)),
									b.processData(),
									b.generatePoints();
							b.data.forEach(function (a, f) {
								if (a && a.options && "undefined" !== typeof a.name) {
									var d = e.nameToX(a);
									"undefined" !== typeof d &&
										d !== a.x &&
										((a.x = d), (b.xData[f] = d));
								}
							});
						}));
				};
				C.prototype.setAxisTranslation = function (e) {
					var b = this,
						a = b.max - b.min,
						f = b.axisPointRange || 0,
						d = 0,
						h = 0,
						q = b.linkedParent,
						k = !!b.categories,
						w = b.transA,
						m = b.isXAxis;
					if (m || k || f) {
						var y = b.getClosest();
						q
							? ((d = q.minPointOffset), (h = q.pointRangePadding))
							: b.series.forEach(function (e) {
									var a = k
											? 1
											: m
											? u(e.options.pointRange, y, 0)
											: b.axisPointRange || 0,
										n = e.options.pointPlacement;
									f = Math.max(f, a);
									if (!b.single || k)
										(e = e.is("xrange") ? !m : m),
											(d = Math.max(d, e && l(n) ? 0 : a / 2)),
											(h = Math.max(h, e && "on" === n ? 0 : a));
							  });
						q = b.ordinal && b.ordinal.slope && y ? b.ordinal.slope / y : 1;
						b.minPointOffset = d *= q;
						b.pointRangePadding = h *= q;
						b.pointRange = Math.min(f, b.single && k ? 1 : a);
						m && (b.closestPointRange = y);
					}
					e && (b.oldTransA = w);
					b.translationSlope = b.transA = w =
						b.staticScale || b.len / (a + h || 1);
					b.transB = b.horiz ? b.left : b.bottom;
					b.minPixelPadding = w * d;
					A(this, "afterSetAxisTranslation");
				};
				C.prototype.minFromRange = function () {
					return this.max - this.range;
				};
				C.prototype.setTickInterval = function (e) {
					var b = this,
						a = b.chart,
						h = b.logarithmic,
						q = b.options,
						l = b.isXAxis,
						k = b.isLinked,
						w = q.maxPadding,
						m = q.minPadding,
						y = q.tickInterval,
						F = q.tickPixelInterval,
						H = b.categories,
						p = d(b.threshold) ? b.threshold : null,
						c = b.softThreshold;
					b.dateTime || H || k || this.getTickAmount();
					var g = u(b.userMin, q.min);
					var x = u(b.userMax, q.max);
					if (k) {
						b.linkedParent = a[b.coll][q.linkedTo];
						var C = b.linkedParent.getExtremes();
						b.min = u(C.min, C.dataMin);
						b.max = u(C.max, C.dataMax);
						q.type !== b.linkedParent.options.type && z(11, 1, a);
					} else {
						if (!c && t(p))
							if (b.dataMin >= p) (C = p), (m = 0);
							else if (b.dataMax <= p) {
								var B = p;
								w = 0;
							}
						b.min = u(g, C, b.dataMin);
						b.max = u(x, B, b.dataMax);
					}
					h &&
						(b.positiveValuesOnly &&
							!e &&
							0 >= Math.min(b.min, u(b.dataMin, b.min)) &&
							z(10, 1, a),
						(b.min = E(h.log2lin(b.min), 16)),
						(b.max = E(h.log2lin(b.max), 16)));
					b.range &&
						t(b.max) &&
						((b.userMin = b.min = g = Math.max(b.dataMin, b.minFromRange())),
						(b.userMax = x = b.max),
						(b.range = null));
					A(b, "foundExtremes");
					b.beforePadding && b.beforePadding();
					b.adjustForMinRange();
					!(
						H ||
						b.axisPointRange ||
						(b.stacking && b.stacking.usePercentage) ||
						k
					) &&
						t(b.min) &&
						t(b.max) &&
						(a = b.max - b.min) &&
						(!t(g) && m && (b.min -= a * m), !t(x) && w && (b.max += a * w));
					d(b.userMin) ||
						(d(q.softMin) && q.softMin < b.min && (b.min = g = q.softMin),
						d(q.floor) && (b.min = Math.max(b.min, q.floor)));
					d(b.userMax) ||
						(d(q.softMax) && q.softMax > b.max && (b.max = x = q.softMax),
						d(q.ceiling) && (b.max = Math.min(b.max, q.ceiling)));
					c &&
						t(b.dataMin) &&
						((p = p || 0),
						!t(g) && b.min < p && b.dataMin >= p
							? (b.min = b.options.minRange
									? Math.min(p, b.max - b.minRange)
									: p)
							: !t(x) &&
							  b.max > p &&
							  b.dataMax <= p &&
							  (b.max = b.options.minRange
									? Math.max(p, b.min + b.minRange)
									: p));
					b.tickInterval =
						b.min === b.max ||
						"undefined" === typeof b.min ||
						"undefined" === typeof b.max
							? 1
							: k && !y && F === b.linkedParent.options.tickPixelInterval
							? (y = b.linkedParent.tickInterval)
							: u(
									y,
									this.tickAmount
										? (b.max - b.min) / Math.max(this.tickAmount - 1, 1)
										: void 0,
									H ? 1 : ((b.max - b.min) * F) / Math.max(b.len, F)
							  );
					l &&
						!e &&
						b.series.forEach(function (e) {
							e.processData(b.min !== b.oldMin || b.max !== b.oldMax);
						});
					b.setAxisTranslation(!0);
					b.beforeSetTickPositions && b.beforeSetTickPositions();
					b.ordinal &&
						(b.tickInterval = b.ordinal.postProcessTickInterval(
							b.tickInterval
						));
					b.pointRange &&
						!y &&
						(b.tickInterval = Math.max(b.pointRange, b.tickInterval));
					e = u(q.minTickInterval, b.dateTime && b.closestPointRange);
					!y && b.tickInterval < e && (b.tickInterval = e);
					b.dateTime ||
						b.logarithmic ||
						y ||
						(b.tickInterval = f(
							b.tickInterval,
							void 0,
							M(b.tickInterval),
							u(
								q.allowDecimals,
								0.5 > b.tickInterval || void 0 !== this.tickAmount
							),
							!!this.tickAmount
						));
					this.tickAmount || (b.tickInterval = b.unsquish());
					this.setTickPositions();
				};
				C.prototype.setTickPositions = function () {
					var e = this.options,
						b = e.tickPositions;
					var a = this.getMinorTickInterval();
					var f = e.tickPositioner,
						d = this.hasVerticalPanning(),
						h = "colorAxis" === this.coll,
						q = (h || !d) && e.startOnTick;
					d = (h || !d) && e.endOnTick;
					this.tickmarkOffset =
						this.categories &&
						"between" === e.tickmarkPlacement &&
						1 === this.tickInterval
							? 0.5
							: 0;
					this.minorTickInterval =
						"auto" === a && this.tickInterval ? this.tickInterval / 5 : a;
					this.single =
						this.min === this.max &&
						t(this.min) &&
						!this.tickAmount &&
						(parseInt(this.min, 10) === this.min || !1 !== e.allowDecimals);
					this.tickPositions = a = b && b.slice();
					!a &&
						((this.ordinal && this.ordinal.positions) ||
						!(
							(this.max - this.min) / this.tickInterval >
							Math.max(2 * this.len, 200)
						)
							? (a = this.dateTime
									? this.getTimeTicks(
											this.dateTime.normalizeTimeTickInterval(
												this.tickInterval,
												e.units
											),
											this.min,
											this.max,
											e.startOfWeek,
											this.ordinal && this.ordinal.positions,
											this.closestPointRange,
											!0
									  )
									: this.logarithmic
									? this.logarithmic.getLogTickPositions(
											this.tickInterval,
											this.min,
											this.max
									  )
									: this.getLinearTickPositions(
											this.tickInterval,
											this.min,
											this.max
									  ))
							: ((a = [this.min, this.max]), z(19, !1, this.chart)),
						a.length > this.len &&
							((a = [a[0], a.pop()]), a[0] === a[1] && (a.length = 1)),
						(this.tickPositions = a),
						f && (f = f.apply(this, [this.min, this.max]))) &&
						(this.tickPositions = a = f);
					this.paddedTicks = a.slice(0);
					this.trimTicks(a, q, d);
					this.isLinked ||
						(this.single &&
							2 > a.length &&
							!this.categories &&
							!this.series.some(function (b) {
								return (
									b.is("heatmap") && "between" === b.options.pointPlacement
								);
							}) &&
							((this.min -= 0.5), (this.max += 0.5)),
						b || f || this.adjustTickAmount());
					A(this, "afterSetTickPositions");
				};
				C.prototype.trimTicks = function (e, b, a) {
					var f = e[0],
						d = e[e.length - 1],
						n = (!this.isOrdinal && this.minPointOffset) || 0;
					A(this, "trimTicks");
					if (!this.isLinked) {
						if (b && -Infinity !== f) this.min = f;
						else for (; this.min - n > e[0]; ) e.shift();
						if (a) this.max = d;
						else for (; this.max + n < e[e.length - 1]; ) e.pop();
						0 === e.length &&
							t(f) &&
							!this.options.tickPositions &&
							e.push((d + f) / 2);
					}
				};
				C.prototype.alignToOthers = function () {
					var e = {},
						b,
						a = this.options;
					!1 === this.chart.options.chart.alignTicks ||
						!1 === a.alignTicks ||
						!1 === a.startOnTick ||
						!1 === a.endOnTick ||
						this.logarithmic ||
						this.chart[this.coll].forEach(function (a) {
							var f = a.options;
							f = [a.horiz ? f.left : f.top, f.width, f.height, f.pane].join();
							a.series.length && (e[f] ? (b = !0) : (e[f] = 1));
						});
					return b;
				};
				C.prototype.getTickAmount = function () {
					var e = this.options,
						b = e.tickAmount,
						a = e.tickPixelInterval;
					!t(e.tickInterval) &&
						!b &&
						this.len < a &&
						!this.isRadial &&
						!this.logarithmic &&
						e.startOnTick &&
						e.endOnTick &&
						(b = 2);
					!b && this.alignToOthers() && (b = Math.ceil(this.len / a) + 1);
					4 > b && ((this.finalTickAmt = b), (b = 5));
					this.tickAmount = b;
				};
				C.prototype.adjustTickAmount = function () {
					var e = this.options,
						b = this.tickInterval,
						a = this.tickPositions,
						f = this.tickAmount,
						d = this.finalTickAmt,
						h = a && a.length,
						q = u(this.threshold, this.softThreshold ? 0 : null),
						l;
					if (this.hasData()) {
						if (h < f) {
							for (l = this.min; a.length < f; )
								a.length % 2 || l === q
									? a.push(E(a[a.length - 1] + b))
									: a.unshift(E(a[0] - b));
							this.transA *= (h - 1) / (f - 1);
							this.min = e.startOnTick ? a[0] : Math.min(this.min, a[0]);
							this.max = e.endOnTick
								? a[a.length - 1]
								: Math.max(this.max, a[a.length - 1]);
						} else h > f && ((this.tickInterval *= 2), this.setTickPositions());
						if (t(d)) {
							for (b = e = a.length; b--; )
								((3 === d && 1 === b % 2) || (2 >= d && 0 < b && b < e - 1)) &&
									a.splice(b, 1);
							this.finalTickAmt = void 0;
						}
					}
				};
				C.prototype.setScale = function () {
					var e,
						b = !1,
						a = !1;
					this.series.forEach(function (e) {
						var f;
						b = b || e.isDirtyData || e.isDirty;
						a =
							a ||
							(null === (f = e.xAxis) || void 0 === f ? void 0 : f.isDirty) ||
							!1;
					});
					this.oldMin = this.min;
					this.oldMax = this.max;
					this.oldAxisLength = this.len;
					this.setAxisSize();
					(e = this.len !== this.oldAxisLength) ||
					b ||
					a ||
					this.isLinked ||
					this.forceRedraw ||
					this.userMin !== this.oldUserMin ||
					this.userMax !== this.oldUserMax ||
					this.alignToOthers()
						? (this.stacking && this.stacking.resetStacks(),
						  (this.forceRedraw = !1),
						  this.getSeriesExtremes(),
						  this.setTickInterval(),
						  (this.oldUserMin = this.userMin),
						  (this.oldUserMax = this.userMax),
						  this.isDirty ||
								(this.isDirty =
									e || this.min !== this.oldMin || this.max !== this.oldMax))
						: this.stacking && this.stacking.cleanStacks();
					b && this.panningState && (this.panningState.isDirty = !0);
					A(this, "afterSetScale");
				};
				C.prototype.setExtremes = function (e, b, a, f, d) {
					var n = this,
						h = n.chart;
					a = u(a, !0);
					n.series.forEach(function (b) {
						delete b.kdTree;
					});
					d = m(d, { min: e, max: b });
					A(n, "setExtremes", d, function () {
						n.userMin = e;
						n.userMax = b;
						n.eventArgs = d;
						a && h.redraw(f);
					});
				};
				C.prototype.zoom = function (e, b) {
					var a = this,
						f = this.dataMin,
						d = this.dataMax,
						h = this.options,
						q = Math.min(f, u(h.min, f)),
						l = Math.max(d, u(h.max, d));
					e = { newMin: e, newMax: b };
					A(this, "zoom", e, function (b) {
						var e = b.newMin,
							n = b.newMax;
						if (e !== a.min || n !== a.max)
							a.allowZoomOutside ||
								(t(f) && (e < q && (e = q), e > l && (e = l)),
								t(d) && (n < q && (n = q), n > l && (n = l))),
								(a.displayBtn =
									"undefined" !== typeof e || "undefined" !== typeof n),
								a.setExtremes(e, n, !1, void 0, { trigger: "zoom" });
						b.zoomed = !0;
					});
					return e.zoomed;
				};
				C.prototype.setAxisSize = function () {
					var e = this.chart,
						b = this.options,
						a = b.offsets || [0, 0, 0, 0],
						f = this.horiz,
						d = (this.width = Math.round(
							F(u(b.width, e.plotWidth - a[3] + a[1]), e.plotWidth)
						)),
						h = (this.height = Math.round(
							F(u(b.height, e.plotHeight - a[0] + a[2]), e.plotHeight)
						)),
						q = (this.top = Math.round(
							F(u(b.top, e.plotTop + a[0]), e.plotHeight, e.plotTop)
						));
					b = this.left = Math.round(
						F(u(b.left, e.plotLeft + a[3]), e.plotWidth, e.plotLeft)
					);
					this.bottom = e.chartHeight - h - q;
					this.right = e.chartWidth - d - b;
					this.len = Math.max(f ? d : h, 0);
					this.pos = f ? b : q;
				};
				C.prototype.getExtremes = function () {
					var e = this.logarithmic;
					return {
						min: e ? E(e.lin2log(this.min)) : this.min,
						max: e ? E(e.lin2log(this.max)) : this.max,
						dataMin: this.dataMin,
						dataMax: this.dataMax,
						userMin: this.userMin,
						userMax: this.userMax,
					};
				};
				C.prototype.getThreshold = function (e) {
					var b = this.logarithmic,
						a = b ? b.lin2log(this.min) : this.min;
					b = b ? b.lin2log(this.max) : this.max;
					null === e || -Infinity === e
						? (e = a)
						: Infinity === e
						? (e = b)
						: a > e
						? (e = a)
						: b < e && (e = b);
					return this.translate(e, 0, 1, 0, 1);
				};
				C.prototype.autoLabelAlign = function (e) {
					var b = (u(e, 0) - 90 * this.side + 720) % 360;
					e = { align: "center" };
					A(this, "autoLabelAlign", e, function (e) {
						15 < b && 165 > b
							? (e.align = "right")
							: 195 < b && 345 > b && (e.align = "left");
					});
					return e.align;
				};
				C.prototype.tickSize = function (e) {
					var b = this.options,
						a = b["tick" === e ? "tickLength" : "minorTickLength"],
						f = u(
							b["tick" === e ? "tickWidth" : "minorTickWidth"],
							"tick" === e && this.isXAxis && !this.categories ? 1 : 0
						);
					if (f && a) {
						"inside" === b[e + "Position"] && (a = -a);
						var d = [a, f];
					}
					e = { tickSize: d };
					A(this, "afterTickSize", e);
					return e.tickSize;
				};
				C.prototype.labelMetrics = function () {
					var e = (this.tickPositions && this.tickPositions[0]) || 0;
					return this.chart.renderer.fontMetrics(
						this.options.labels.style && this.options.labels.style.fontSize,
						this.ticks[e] && this.ticks[e].label
					);
				};
				C.prototype.unsquish = function () {
					var e = this.options.labels,
						b = this.horiz,
						a = this.tickInterval,
						f = a,
						d =
							this.len /
							(((this.categories ? 1 : 0) + this.max - this.min) / a),
						h,
						q = e.rotation,
						l = this.labelMetrics(),
						k,
						w = Number.MAX_VALUE,
						m,
						y = this.max - this.min,
						F = function (b) {
							var e = b / (d || 1);
							e = 1 < e ? Math.ceil(e) : 1;
							e * a > y &&
								Infinity !== b &&
								Infinity !== d &&
								y &&
								(e = Math.ceil(y / a));
							return E(e * a);
						};
					b
						? (m =
								!e.staggerLines &&
								!e.step &&
								(t(q)
									? [q]
									: d < u(e.autoRotationLimit, 80) && e.autoRotation)) &&
						  m.forEach(function (b) {
								if (b === q || (b && -90 <= b && 90 >= b)) {
									k = F(Math.abs(l.h / Math.sin(P * b)));
									var e = k + Math.abs(b / 360);
									e < w && ((w = e), (h = b), (f = k));
								}
						  })
						: e.step || (f = F(l.h));
					this.autoRotation = m;
					this.labelRotation = u(h, q);
					return f;
				};
				C.prototype.getSlotWidth = function (e) {
					var b,
						a = this.chart,
						f = this.horiz,
						h = this.options.labels,
						q = Math.max(
							this.tickPositions.length - (this.categories ? 0 : 1),
							1
						),
						u = a.margin[3];
					if (e && d(e.slotWidth)) return e.slotWidth;
					if (f && h && 2 > (h.step || 0))
						return h.rotation ? 0 : ((this.staggerLines || 1) * this.len) / q;
					if (!f) {
						e =
							null === (b = null === h || void 0 === h ? void 0 : h.style) ||
							void 0 === b
								? void 0
								: b.width;
						if (void 0 !== e) return parseInt(e, 10);
						if (u) return u - a.spacing[3];
					}
					return 0.33 * a.chartWidth;
				};
				C.prototype.renderUnsquish = function () {
					var e = this.chart,
						b = e.renderer,
						a = this.tickPositions,
						f = this.ticks,
						d = this.options.labels,
						h = (d && d.style) || {},
						q = this.horiz,
						u = this.getSlotWidth(),
						k = Math.max(1, Math.round(u - 2 * (d.padding || 5))),
						w = {},
						m = this.labelMetrics(),
						y = d.style && d.style.textOverflow,
						F = 0;
					l(d.rotation) || (w.rotation = d.rotation || 0);
					a.forEach(function (b) {
						b = f[b];
						b.movedLabel && b.replaceMovedLabel();
						b &&
							b.label &&
							b.label.textPxLength > F &&
							(F = b.label.textPxLength);
					});
					this.maxLabelLength = F;
					if (this.autoRotation)
						F > k && F > m.h
							? (w.rotation = this.labelRotation)
							: (this.labelRotation = 0);
					else if (u) {
						var H = k;
						if (!y) {
							var p = "clip";
							for (k = a.length; !q && k--; ) {
								var c = a[k];
								if ((c = f[c].label))
									c.styles && "ellipsis" === c.styles.textOverflow
										? c.css({ textOverflow: "clip" })
										: c.textPxLength > u && c.css({ width: u + "px" }),
										c.getBBox().height > this.len / a.length - (m.h - m.f) &&
											(c.specificTextOverflow = "ellipsis");
							}
						}
					}
					w.rotation &&
						((H = F > 0.5 * e.chartHeight ? 0.33 * e.chartHeight : F),
						y || (p = "ellipsis"));
					if (
						(this.labelAlign =
							d.align || this.autoLabelAlign(this.labelRotation))
					)
						w.align = this.labelAlign;
					a.forEach(function (b) {
						var e = (b = f[b]) && b.label,
							a = h.width,
							d = {};
						e &&
							(e.attr(w),
							b.shortenLabel
								? b.shortenLabel()
								: H &&
								  !a &&
								  "nowrap" !== h.whiteSpace &&
								  (H < e.textPxLength || "SPAN" === e.element.tagName)
								? ((d.width = H + "px"),
								  y || (d.textOverflow = e.specificTextOverflow || p),
								  e.css(d))
								: e.styles &&
								  e.styles.width &&
								  !d.width &&
								  !a &&
								  e.css({ width: null }),
							delete e.specificTextOverflow,
							(b.rotation = w.rotation));
					}, this);
					this.tickRotCorr = b.rotCorr(
						m.b,
						this.labelRotation || 0,
						0 !== this.side
					);
				};
				C.prototype.hasData = function () {
					return (
						this.series.some(function (e) {
							return e.hasData();
						}) ||
						(this.options.showEmpty && t(this.min) && t(this.max))
					);
				};
				C.prototype.addTitle = function (e) {
					var b = this.chart.renderer,
						a = this.horiz,
						f = this.opposite,
						d = this.options.title,
						q,
						u = this.chart.styledMode;
					this.axisTitle ||
						((q = d.textAlign) ||
							(q = (a
								? { low: "left", middle: "center", high: "right" }
								: {
										low: f ? "right" : "left",
										middle: "center",
										high: f ? "left" : "right",
								  })[d.align]),
						(this.axisTitle = b
							.text(d.text, 0, 0, d.useHTML)
							.attr({ zIndex: 7, rotation: d.rotation || 0, align: q })
							.addClass("highcharts-axis-title")),
						u || this.axisTitle.css(h(d.style)),
						this.axisTitle.add(this.axisGroup),
						(this.axisTitle.isNew = !0));
					u ||
						d.style.width ||
						this.isRadial ||
						this.axisTitle.css({ width: this.len + "px" });
					this.axisTitle[e ? "show" : "hide"](e);
				};
				C.prototype.generateTick = function (e) {
					var b = this.ticks;
					b[e] ? b[e].addLabel() : (b[e] = new G(this, e));
				};
				C.prototype.getOffset = function () {
					var e = this,
						b = e.chart,
						a = b.renderer,
						f = e.options,
						d = e.tickPositions,
						h = e.ticks,
						l = e.horiz,
						k = e.side,
						w = b.inverted && !e.isZAxis ? [1, 0, 3, 2][k] : k,
						m,
						y = 0,
						F = 0,
						H = f.title,
						p = f.labels,
						c = 0,
						g = b.axisOffset;
					b = b.clipOffset;
					var z = [-1, 1, 1, -1][k],
						x = f.className,
						C = e.axisParent;
					var B = e.hasData();
					e.showAxis = m = B || u(f.showEmpty, !0);
					e.staggerLines = e.horiz && p.staggerLines;
					e.axisGroup ||
						((e.gridGroup = a
							.g("grid")
							.attr({ zIndex: f.gridZIndex || 1 })
							.addClass(
								"highcharts-" + this.coll.toLowerCase() + "-grid " + (x || "")
							)
							.add(C)),
						(e.axisGroup = a
							.g("axis")
							.attr({ zIndex: f.zIndex || 2 })
							.addClass(
								"highcharts-" + this.coll.toLowerCase() + " " + (x || "")
							)
							.add(C)),
						(e.labelGroup = a
							.g("axis-labels")
							.attr({ zIndex: p.zIndex || 7 })
							.addClass(
								"highcharts-" + e.coll.toLowerCase() + "-labels " + (x || "")
							)
							.add(C)));
					B || e.isLinked
						? (d.forEach(function (b, a) {
								e.generateTick(b, a);
						  }),
						  e.renderUnsquish(),
						  (e.reserveSpaceDefault =
								0 === k ||
								2 === k ||
								{ 1: "left", 3: "right" }[k] === e.labelAlign),
						  u(
								p.reserveSpace,
								"center" === e.labelAlign ? !0 : null,
								e.reserveSpaceDefault
						  ) &&
								d.forEach(function (b) {
									c = Math.max(h[b].getLabelSize(), c);
								}),
						  e.staggerLines && (c *= e.staggerLines),
						  (e.labelOffset = c * (e.opposite ? -1 : 1)))
						: q(h, function (b, e) {
								b.destroy();
								delete h[e];
						  });
					if (
						H &&
						H.text &&
						!1 !== H.enabled &&
						(e.addTitle(m), m && !1 !== H.reserveSpace)
					) {
						e.titleOffset = y = e.axisTitle.getBBox()[l ? "height" : "width"];
						var Q = H.offset;
						F = t(Q) ? 0 : u(H.margin, l ? 5 : 10);
					}
					e.renderLine();
					e.offset = z * u(f.offset, g[k] ? g[k] + (f.margin || 0) : 0);
					e.tickRotCorr = e.tickRotCorr || { x: 0, y: 0 };
					a = 0 === k ? -e.labelMetrics().h : 2 === k ? e.tickRotCorr.y : 0;
					F = Math.abs(c) + F;
					c && (F = F - a + z * (l ? u(p.y, e.tickRotCorr.y + 8 * z) : p.x));
					e.axisTitleMargin = u(Q, F);
					e.getMaxLabelDimensions &&
						(e.maxLabelDimensions = e.getMaxLabelDimensions(h, d));
					l = this.tickSize("tick");
					g[k] = Math.max(
						g[k],
						e.axisTitleMargin + y + z * e.offset,
						F,
						d && d.length && l ? l[0] + z * e.offset : 0
					);
					f = f.offset ? 0 : 2 * Math.floor(e.axisLine.strokeWidth() / 2);
					b[w] = Math.max(b[w], f);
					A(this, "afterGetOffset");
				};
				C.prototype.getLinePath = function (e) {
					var b = this.chart,
						a = this.opposite,
						f = this.offset,
						d = this.horiz,
						h = this.left + (a ? this.width : 0) + f;
					f = b.chartHeight - this.bottom - (a ? this.height : 0) + f;
					a && (e *= -1);
					return b.renderer.crispLine(
						[
							["M", d ? this.left : h, d ? f : this.top],
							[
								"L",
								d ? b.chartWidth - this.right : h,
								d ? f : b.chartHeight - this.bottom,
							],
						],
						e
					);
				};
				C.prototype.renderLine = function () {
					this.axisLine ||
						((this.axisLine = this.chart.renderer
							.path()
							.addClass("highcharts-axis-line")
							.add(this.axisGroup)),
						this.chart.styledMode ||
							this.axisLine.attr({
								stroke: this.options.lineColor,
								"stroke-width": this.options.lineWidth,
								zIndex: 7,
							}));
				};
				C.prototype.getTitlePosition = function () {
					var e = this.horiz,
						b = this.left,
						a = this.top,
						f = this.len,
						d = this.options.title,
						h = e ? b : a,
						q = this.opposite,
						u = this.offset,
						l = d.x || 0,
						k = d.y || 0,
						w = this.axisTitle,
						m = this.chart.renderer.fontMetrics(d.style && d.style.fontSize, w);
					w = Math.max(w.getBBox(null, 0).height - m.h - 1, 0);
					f = {
						low: h + (e ? 0 : f),
						middle: h + f / 2,
						high: h + (e ? f : 0),
					}[d.align];
					b =
						(e ? a + this.height : b) +
						(e ? 1 : -1) * (q ? -1 : 1) * this.axisTitleMargin +
						[-w, w, m.f, -w][this.side];
					e = {
						x: e ? f + l : b + (q ? this.width : 0) + u + l,
						y: e ? b + k - (q ? this.height : 0) + u : f + k,
					};
					A(this, "afterGetTitlePosition", { titlePosition: e });
					return e;
				};
				C.prototype.renderMinorTick = function (e) {
					var b = this.chart.hasRendered && d(this.oldMin),
						a = this.minorTicks;
					a[e] || (a[e] = new G(this, e, "minor"));
					b && a[e].isNew && a[e].render(null, !0);
					a[e].render(null, !1, 1);
				};
				C.prototype.renderTick = function (e, b) {
					var a = this.isLinked,
						f = this.ticks,
						h = this.chart.hasRendered && d(this.oldMin);
					if (!a || (e >= this.min && e <= this.max))
						f[e] || (f[e] = new G(this, e)),
							h && f[e].isNew && f[e].render(b, !0, -1),
							f[e].render(b);
				};
				C.prototype.render = function () {
					var e = this,
						b = e.chart,
						a = e.logarithmic,
						f = e.options,
						h = e.isLinked,
						u = e.tickPositions,
						l = e.axisTitle,
						k = e.ticks,
						w = e.minorTicks,
						m = e.alternateBands,
						F = f.stackLabels,
						H = f.alternateGridColor,
						p = e.tickmarkOffset,
						c = e.axisLine,
						z = e.showAxis,
						t = L(b.renderer.globalAnimation),
						x,
						C;
					e.labelEdge.length = 0;
					e.overlap = !1;
					[k, w, m].forEach(function (b) {
						q(b, function (b) {
							b.isActive = !1;
						});
					});
					if (e.hasData() || h)
						e.minorTickInterval &&
							!e.categories &&
							e.getMinorTickPositions().forEach(function (b) {
								e.renderMinorTick(b);
							}),
							u.length &&
								(u.forEach(function (b, a) {
									e.renderTick(b, a);
								}),
								p &&
									(0 === e.min || e.single) &&
									(k[-1] || (k[-1] = new G(e, -1, null, !0)),
									k[-1].render(-1))),
							H &&
								u.forEach(function (f, d) {
									C =
										"undefined" !== typeof u[d + 1] ? u[d + 1] + p : e.max - p;
									0 === d % 2 &&
										f < e.max &&
										C <= e.max + (b.polar ? -p : p) &&
										(m[f] || (m[f] = new g.PlotLineOrBand(e)),
										(x = f + p),
										(m[f].options = {
											from: a ? a.lin2log(x) : x,
											to: a ? a.lin2log(C) : C,
											color: H,
										}),
										m[f].render(),
										(m[f].isActive = !0));
								}),
							e._addedPlotLB ||
								((f.plotLines || [])
									.concat(f.plotBands || [])
									.forEach(function (b) {
										e.addPlotBandOrLine(b);
									}),
								(e._addedPlotLB = !0));
					[k, w, m].forEach(function (e) {
						var a,
							f = [],
							d = t.duration;
						q(e, function (b, e) {
							b.isActive || (b.render(e, !1, 0), (b.isActive = !1), f.push(e));
						});
						y(
							function () {
								for (a = f.length; a--; )
									e[f[a]] &&
										!e[f[a]].isActive &&
										(e[f[a]].destroy(), delete e[f[a]]);
							},
							e !== m && b.hasRendered && d ? d : 0
						);
					});
					c &&
						(c[c.isPlaced ? "animate" : "attr"]({
							d: this.getLinePath(c.strokeWidth()),
						}),
						(c.isPlaced = !0),
						c[z ? "show" : "hide"](z));
					l &&
						z &&
						((f = e.getTitlePosition()),
						d(f.y)
							? (l[l.isNew ? "attr" : "animate"](f), (l.isNew = !1))
							: (l.attr("y", -9999), (l.isNew = !0)));
					F && F.enabled && e.stacking && e.stacking.renderStackTotals();
					e.isDirty = !1;
					A(this, "afterRender");
				};
				C.prototype.redraw = function () {
					this.visible &&
						(this.render(),
						this.plotLinesAndBands.forEach(function (e) {
							e.render();
						}));
					this.series.forEach(function (e) {
						e.isDirty = !0;
					});
				};
				C.prototype.getKeepProps = function () {
					return this.keepProps || C.keepProps;
				};
				C.prototype.destroy = function (e) {
					var b = this,
						a = b.plotLinesAndBands,
						f;
					A(this, "destroy", { keepEvents: e });
					e || w(b);
					[b.ticks, b.minorTicks, b.alternateBands].forEach(function (b) {
						x(b);
					});
					if (a) for (e = a.length; e--; ) a[e].destroy();
					"axisLine axisTitle axisGroup gridGroup labelGroup cross scrollbar"
						.split(" ")
						.forEach(function (e) {
							b[e] && (b[e] = b[e].destroy());
						});
					for (f in b.plotLinesAndBandsGroups)
						b.plotLinesAndBandsGroups[f] = b.plotLinesAndBandsGroups[
							f
						].destroy();
					q(b, function (e, a) {
						-1 === b.getKeepProps().indexOf(a) && delete b[a];
					});
				};
				C.prototype.drawCrosshair = function (e, b) {
					var a = this.crosshair,
						f = u(a.snap, !0),
						d,
						h = this.cross,
						q = this.chart;
					A(this, "drawCrosshair", { e: e, point: b });
					e || (e = this.cross && this.cross.e);
					if (this.crosshair && !1 !== (t(b) || !f)) {
						f
							? t(b) &&
							  (d = u(
									"colorAxis" !== this.coll ? b.crosshairPos : null,
									this.isXAxis ? b.plotX : this.len - b.plotY
							  ))
							: (d =
									e &&
									(this.horiz
										? e.chartX - this.pos
										: this.len - e.chartY + this.pos));
						if (t(d)) {
							var l = {
								value: b && (this.isXAxis ? b.x : u(b.stackY, b.y)),
								translatedValue: d,
							};
							q.polar &&
								m(l, {
									isCrosshair: !0,
									chartX: e && e.chartX,
									chartY: e && e.chartY,
									point: b,
								});
							l = this.getPlotLinePath(l) || null;
						}
						if (!t(l)) {
							this.hideCrosshair();
							return;
						}
						f = this.categories && !this.isRadial;
						h ||
							((this.cross = h = q.renderer
								.path()
								.addClass(
									"highcharts-crosshair highcharts-crosshair-" +
										(f ? "category " : "thin ") +
										a.className
								)
								.attr({ zIndex: u(a.zIndex, 2) })
								.add()),
							q.styledMode ||
								(h
									.attr({
										stroke:
											a.color ||
											(f
												? c.parse("#ccd6eb").setOpacity(0.25).get()
												: "#cccccc"),
										"stroke-width": u(a.width, 1),
									})
									.css({ "pointer-events": "none" }),
								a.dashStyle && h.attr({ dashstyle: a.dashStyle })));
						h.show().attr({ d: l });
						f && !a.width && h.attr({ "stroke-width": this.transA });
						this.cross.e = e;
					} else this.hideCrosshair();
					A(this, "afterDrawCrosshair", { e: e, point: b });
				};
				C.prototype.hideCrosshair = function () {
					this.cross && this.cross.hide();
					A(this, "afterHideCrosshair");
				};
				C.prototype.hasVerticalPanning = function () {
					var e, b;
					return /y/.test(
						(null ===
							(b =
								null === (e = this.chart.options.chart) || void 0 === e
									? void 0
									: e.panning) || void 0 === b
							? void 0
							: b.type) || ""
					);
				};
				C.defaultOptions = {
					dateTimeLabelFormats: {
						millisecond: { main: "%H:%M:%S.%L", range: !1 },
						second: { main: "%H:%M:%S", range: !1 },
						minute: { main: "%H:%M", range: !1 },
						hour: { main: "%H:%M", range: !1 },
						day: { main: "%e. %b" },
						week: { main: "%e. %b" },
						month: { main: "%b '%y" },
						year: { main: "%Y" },
					},
					endOnTick: !1,
					labels: {
						enabled: !0,
						indentation: 10,
						x: 0,
						style: { color: "#666666", cursor: "default", fontSize: "11px" },
					},
					maxPadding: 0.01,
					minorTickLength: 2,
					minorTickPosition: "outside",
					minPadding: 0.01,
					showEmpty: !0,
					startOfWeek: 1,
					startOnTick: !1,
					tickLength: 10,
					tickPixelInterval: 100,
					tickmarkPlacement: "between",
					tickPosition: "outside",
					title: { align: "middle", style: { color: "#666666" } },
					type: "linear",
					minorGridLineColor: "#f2f2f2",
					minorGridLineWidth: 1,
					minorTickColor: "#999999",
					lineColor: "#ccd6eb",
					lineWidth: 1,
					gridLineColor: "#e6e6e6",
					tickColor: "#ccd6eb",
				};
				C.defaultYAxisOptions = {
					endOnTick: !0,
					maxPadding: 0.05,
					minPadding: 0.05,
					tickPixelInterval: 72,
					showLastLabel: !0,
					labels: { x: -8 },
					startOnTick: !0,
					title: { rotation: 270, text: "Values" },
					stackLabels: {
						allowOverlap: !1,
						enabled: !1,
						crop: !0,
						overflow: "justify",
						formatter: function () {
							var e = this.axis.chart.numberFormatter;
							return e(this.total, -1);
						},
						style: {
							color: "#000000",
							fontSize: "11px",
							fontWeight: "bold",
							textOutline: "1px contrast",
						},
					},
					gridLineWidth: 1,
					lineWidth: 0,
				};
				C.defaultLeftAxisOptions = {
					labels: { x: -15 },
					title: { rotation: 270 },
				};
				C.defaultRightAxisOptions = {
					labels: { x: 15 },
					title: { rotation: 90 },
				};
				C.defaultBottomAxisOptions = {
					labels: { autoRotation: [-45], x: 0 },
					margin: 15,
					title: { rotation: 0 },
				};
				C.defaultTopAxisOptions = {
					labels: { autoRotation: [-45], x: 0 },
					margin: 15,
					title: { rotation: 0 },
				};
				C.keepProps = "extKey hcEvents names series userMax userMin".split(" ");
				return C;
			})();
			g.Axis = r;
			return g.Axis;
		}
	);
	N(
		v,
		"parts/DateTimeAxis.js",
		[v["parts/Axis.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var G = g.addEvent,
				r = g.getMagnitude,
				D = g.normalizeTickInterval,
				L = g.timeUnits,
				K = (function () {
					function c(c) {
						this.axis = c;
					}
					c.prototype.normalizeTimeTickInterval = function (c, g) {
						var t = g || [
							["millisecond", [1, 2, 5, 10, 20, 25, 50, 100, 200, 500]],
							["second", [1, 2, 5, 10, 15, 30]],
							["minute", [1, 2, 5, 10, 15, 30]],
							["hour", [1, 2, 3, 4, 6, 8, 12]],
							["day", [1, 2]],
							["week", [1, 2]],
							["month", [1, 2, 3, 4, 6]],
							["year", null],
						];
						g = t[t.length - 1];
						var x = L[g[0]],
							z = g[1],
							m;
						for (
							m = 0;
							m < t.length &&
							!((g = t[m]),
							(x = L[g[0]]),
							(z = g[1]),
							t[m + 1] && c <= (x * z[z.length - 1] + L[t[m + 1][0]]) / 2);
							m++
						);
						x === L.year && c < 5 * x && (z = [1, 2, 5]);
						c = D(c / x, z, "year" === g[0] ? Math.max(r(c / x), 1) : 1);
						return { unitRange: x, count: c, unitName: g[0] };
					};
					return c;
				})();
			g = (function () {
				function c() {}
				c.compose = function (c) {
					c.keepProps.push("dateTime");
					c.prototype.getTimeTicks = function () {
						return this.chart.time.getTimeTicks.apply(
							this.chart.time,
							arguments
						);
					};
					G(c, "init", function (c) {
						"datetime" !== c.userOptions.type
							? (this.dateTime = void 0)
							: this.dateTime || (this.dateTime = new K(this));
					});
				};
				c.AdditionsClass = K;
				return c;
			})();
			g.compose(c);
			return g;
		}
	);
	N(
		v,
		"parts/LogarithmicAxis.js",
		[v["parts/Axis.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var G = g.addEvent,
				r = g.getMagnitude,
				D = g.normalizeTickInterval,
				L = g.pick,
				K = (function () {
					function c(c) {
						this.axis = c;
					}
					c.prototype.getLogTickPositions = function (c, g, t, x) {
						var z = this.axis,
							m = z.len,
							A = z.options,
							p = [];
						x || (this.minorAutoInterval = void 0);
						if (0.5 <= c)
							(c = Math.round(c)), (p = z.getLinearTickPositions(c, g, t));
						else if (0.08 <= c) {
							A = Math.floor(g);
							var M, k;
							for (
								m =
									0.3 < c
										? [1, 2, 4]
										: 0.15 < c
										? [1, 2, 4, 6, 8]
										: [1, 2, 3, 4, 5, 6, 7, 8, 9];
								A < t + 1 && !k;
								A++
							) {
								var a = m.length;
								for (M = 0; M < a && !k; M++) {
									var d = this.log2lin(this.lin2log(A) * m[M]);
									d > g &&
										(!x || l <= t) &&
										"undefined" !== typeof l &&
										p.push(l);
									l > t && (k = !0);
									var l = d;
								}
							}
						} else
							(g = this.lin2log(g)),
								(t = this.lin2log(t)),
								(c = x ? z.getMinorTickInterval() : A.tickInterval),
								(c = L(
									"auto" === c ? null : c,
									this.minorAutoInterval,
									((A.tickPixelInterval / (x ? 5 : 1)) * (t - g)) /
										((x ? m / z.tickPositions.length : m) || 1)
								)),
								(c = D(c, void 0, r(c))),
								(p = z.getLinearTickPositions(c, g, t).map(this.log2lin)),
								x || (this.minorAutoInterval = c / 5);
						x || (z.tickInterval = c);
						return p;
					};
					c.prototype.lin2log = function (c) {
						return Math.pow(10, c);
					};
					c.prototype.log2lin = function (c) {
						return Math.log(c) / Math.LN10;
					};
					return c;
				})();
			g = (function () {
				function c() {}
				c.compose = function (c) {
					c.keepProps.push("logarithmic");
					var g = c.prototype,
						t = K.prototype;
					g.log2lin = t.log2lin;
					g.lin2log = t.lin2log;
					G(c, "init", function (c) {
						var g = this.logarithmic;
						"logarithmic" !== c.userOptions.type
							? (this.logarithmic = void 0)
							: (g || (g = this.logarithmic = new K(this)),
							  this.log2lin !== g.log2lin &&
									(g.log2lin = this.log2lin.bind(this)),
							  this.lin2log !== g.lin2log &&
									(g.lin2log = this.lin2log.bind(this)));
					});
					G(c, "afterInit", function () {
						var c = this.logarithmic;
						c &&
							((this.lin2val = function (g) {
								return c.lin2log(g);
							}),
							(this.val2lin = function (g) {
								return c.log2lin(g);
							}));
					});
				};
				return c;
			})();
			g.compose(c);
			return g;
		}
	);
	N(
		v,
		"parts/PlotLineOrBand.js",
		[v["parts/Globals.js"], v["parts/Axis.js"], v["parts/Utilities.js"]],
		function (c, g, G) {
			var r = G.arrayMax,
				D = G.arrayMin,
				L = G.defined,
				K = G.destroyObjectProperties,
				J = G.erase,
				B = G.extend,
				E = G.merge,
				t = G.objectEach,
				x = G.pick,
				z = (function () {
					function m(m, c) {
						this.axis = m;
						c && ((this.options = c), (this.id = c.id));
					}
					m.prototype.render = function () {
						c.fireEvent(this, "render");
						var m = this,
							p = m.axis,
							g = p.horiz,
							k = p.logarithmic,
							a = m.options,
							d = a.label,
							l = m.label,
							h = a.to,
							f = a.from,
							q = a.value,
							u = L(f) && L(h),
							F = L(q),
							w = m.svgElem,
							H = !w,
							y = [],
							z = a.color,
							P = x(a.zIndex, 0),
							C = a.events;
						y = {
							class:
								"highcharts-plot-" +
								(u ? "band " : "line ") +
								(a.className || ""),
						};
						var e = {},
							b = p.chart.renderer,
							n = u ? "bands" : "lines";
						k && ((f = k.log2lin(f)), (h = k.log2lin(h)), (q = k.log2lin(q)));
						p.chart.styledMode ||
							(F
								? ((y.stroke = z || "#999999"),
								  (y["stroke-width"] = x(a.width, 1)),
								  a.dashStyle && (y.dashstyle = a.dashStyle))
								: u &&
								  ((y.fill = z || "#e6ebf5"),
								  a.borderWidth &&
										((y.stroke = a.borderColor),
										(y["stroke-width"] = a.borderWidth))));
						e.zIndex = P;
						n += "-" + P;
						(k = p.plotLinesAndBandsGroups[n]) ||
							(p.plotLinesAndBandsGroups[n] = k = b
								.g("plot-" + n)
								.attr(e)
								.add());
						H && (m.svgElem = w = b.path().attr(y).add(k));
						if (F)
							y = p.getPlotLinePath({
								value: q,
								lineWidth: w.strokeWidth(),
								acrossPanes: a.acrossPanes,
							});
						else if (u) y = p.getPlotBandPath(f, h, a);
						else return;
						(H || !w.d) && y && y.length
							? (w.attr({ d: y }),
							  C &&
									t(C, function (b, e) {
										w.on(e, function (b) {
											C[e].apply(m, [b]);
										});
									}))
							: w &&
							  (y
									? (w.show(!0), w.animate({ d: y }))
									: w.d && (w.hide(), l && (m.label = l = l.destroy())));
						d &&
						(L(d.text) || L(d.formatter)) &&
						y &&
						y.length &&
						0 < p.width &&
						0 < p.height &&
						!y.isFlat
							? ((d = E(
									{
										align: g && u && "center",
										x: g ? !u && 4 : 10,
										verticalAlign: !g && u && "middle",
										y: g ? (u ? 16 : 10) : u ? 6 : -4,
										rotation: g && !u && 90,
									},
									d
							  )),
							  this.renderLabel(d, y, u, P))
							: l && l.hide();
						return m;
					};
					m.prototype.renderLabel = function (m, c, g, k) {
						var a = this.label,
							d = this.axis.chart.renderer;
						a ||
							((a = {
								align: m.textAlign || m.align,
								rotation: m.rotation,
								class:
									"highcharts-plot-" +
									(g ? "band" : "line") +
									"-label " +
									(m.className || ""),
							}),
							(a.zIndex = k),
							(k = this.getLabelText(m)),
							(this.label = a = d.text(k, 0, 0, m.useHTML).attr(a).add()),
							this.axis.chart.styledMode || a.css(m.style));
						d = c.xBounds || [c[0][1], c[1][1], g ? c[2][1] : c[0][1]];
						c = c.yBounds || [c[0][2], c[1][2], g ? c[2][2] : c[0][2]];
						g = D(d);
						k = D(c);
						a.align(m, !1, { x: g, y: k, width: r(d) - g, height: r(c) - k });
						a.show(!0);
					};
					m.prototype.getLabelText = function (m) {
						return L(m.formatter) ? m.formatter.call(this) : m.text;
					};
					m.prototype.destroy = function () {
						J(this.axis.plotLinesAndBands, this);
						delete this.axis;
						K(this);
					};
					return m;
				})();
			B(g.prototype, {
				getPlotBandPath: function (m, c) {
					var p = this.getPlotLinePath({
							value: c,
							force: !0,
							acrossPanes: this.options.acrossPanes,
						}),
						g = this.getPlotLinePath({
							value: m,
							force: !0,
							acrossPanes: this.options.acrossPanes,
						}),
						k = [],
						a = this.horiz,
						d = 1;
					m = (m < this.min && c < this.min) || (m > this.max && c > this.max);
					if (g && p) {
						if (m) {
							var l = g.toString() === p.toString();
							d = 0;
						}
						for (m = 0; m < g.length; m += 2) {
							c = g[m];
							var h = g[m + 1],
								f = p[m],
								q = p[m + 1];
							("M" !== c[0] && "L" !== c[0]) ||
								("M" !== h[0] && "L" !== h[0]) ||
								("M" !== f[0] && "L" !== f[0]) ||
								("M" !== q[0] && "L" !== q[0]) ||
								(a && f[1] === c[1]
									? ((f[1] += d), (q[1] += d))
									: a || f[2] !== c[2] || ((f[2] += d), (q[2] += d)),
								k.push(
									["M", c[1], c[2]],
									["L", h[1], h[2]],
									["L", q[1], q[2]],
									["L", f[1], f[2]],
									["Z"]
								));
							k.isFlat = l;
						}
					}
					return k;
				},
				addPlotBand: function (m) {
					return this.addPlotBandOrLine(m, "plotBands");
				},
				addPlotLine: function (m) {
					return this.addPlotBandOrLine(m, "plotLines");
				},
				addPlotBandOrLine: function (m, c) {
					var p = new z(this, m).render(),
						g = this.userOptions;
					if (p) {
						if (c) {
							var k = g[c] || [];
							k.push(m);
							g[c] = k;
						}
						this.plotLinesAndBands.push(p);
					}
					return p;
				},
				removePlotBandOrLine: function (m) {
					for (
						var c = this.plotLinesAndBands,
							p = this.options,
							g = this.userOptions,
							k = c.length;
						k--;

					)
						c[k].id === m && c[k].destroy();
					[
						p.plotLines || [],
						g.plotLines || [],
						p.plotBands || [],
						g.plotBands || [],
					].forEach(function (a) {
						for (k = a.length; k--; ) (a[k] || {}).id === m && J(a, a[k]);
					});
				},
				removePlotBand: function (m) {
					this.removePlotBandOrLine(m);
				},
				removePlotLine: function (m) {
					this.removePlotBandOrLine(m);
				},
			});
			c.PlotLineOrBand = z;
			return c.PlotLineOrBand;
		}
	);
	N(
		v,
		"parts/Tooltip.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var G = g.clamp,
				r = g.css,
				D = g.defined,
				L = g.discardElement,
				K = g.extend,
				J = g.fireEvent,
				B = g.format,
				E = g.isNumber,
				t = g.isString,
				x = g.merge,
				z = g.pick,
				m = g.splat,
				A = g.syncTimeout,
				p = g.timeUnits;
			("");
			var M = c.doc,
				k = (function () {
					function a(a, l) {
						this.crosshairs = [];
						this.distance = 0;
						this.isHidden = !0;
						this.isSticky = !1;
						this.now = {};
						this.options = {};
						this.outside = !1;
						this.chart = a;
						this.init(a, l);
					}
					a.prototype.applyFilter = function () {
						var a = this.chart;
						a.renderer.definition({
							tagName: "filter",
							id: "drop-shadow-" + a.index,
							opacity: 0.5,
							children: [
								{
									tagName: "feGaussianBlur",
									in: "SourceAlpha",
									stdDeviation: 1,
								},
								{ tagName: "feOffset", dx: 1, dy: 1 },
								{
									tagName: "feComponentTransfer",
									children: [
										{ tagName: "feFuncA", type: "linear", slope: 0.3 },
									],
								},
								{
									tagName: "feMerge",
									children: [
										{ tagName: "feMergeNode" },
										{ tagName: "feMergeNode", in: "SourceGraphic" },
									],
								},
							],
						});
						a.renderer.definition({
							tagName: "style",
							textContent:
								".highcharts-tooltip-" +
								a.index +
								"{filter:url(#drop-shadow-" +
								a.index +
								")}",
						});
					};
					a.prototype.bodyFormatter = function (a) {
						return a.map(function (a) {
							var d = a.series.tooltipOptions;
							return (
								d[(a.point.formatPrefix || "point") + "Formatter"] ||
								a.point.tooltipFormatter
							).call(
								a.point,
								d[(a.point.formatPrefix || "point") + "Format"] || ""
							);
						});
					};
					a.prototype.cleanSplit = function (a) {
						this.chart.series.forEach(function (d) {
							var h = d && d.tt;
							h &&
								(!h.isActive || a ? (d.tt = h.destroy()) : (h.isActive = !1));
						});
					};
					a.prototype.defaultFormatter = function (a) {
						var d = this.points || m(this);
						var h = [a.tooltipFooterHeaderFormatter(d[0])];
						h = h.concat(a.bodyFormatter(d));
						h.push(a.tooltipFooterHeaderFormatter(d[0], !0));
						return h;
					};
					a.prototype.destroy = function () {
						this.label && (this.label = this.label.destroy());
						this.split &&
							this.tt &&
							(this.cleanSplit(this.chart, !0), (this.tt = this.tt.destroy()));
						this.renderer &&
							((this.renderer = this.renderer.destroy()), L(this.container));
						g.clearTimeout(this.hideTimer);
						g.clearTimeout(this.tooltipTimeout);
					};
					a.prototype.getAnchor = function (a, l) {
						var d = this.chart,
							f = d.pointer,
							q = d.inverted,
							u = d.plotTop,
							k = d.plotLeft,
							w = 0,
							c = 0,
							y,
							p;
						a = m(a);
						this.followPointer && l
							? ("undefined" === typeof l.chartX && (l = f.normalize(l)),
							  (a = [l.chartX - k, l.chartY - u]))
							: a[0].tooltipPos
							? (a = a[0].tooltipPos)
							: (a.forEach(function (a) {
									y = a.series.yAxis;
									p = a.series.xAxis;
									w += a.plotX + (!q && p ? p.left - k : 0);
									c +=
										(a.plotLow ? (a.plotLow + a.plotHigh) / 2 : a.plotY) +
										(!q && y ? y.top - u : 0);
							  }),
							  (w /= a.length),
							  (c /= a.length),
							  (a = [
									q ? d.plotWidth - c : w,
									this.shared && !q && 1 < a.length && l
										? l.chartY - u
										: q
										? d.plotHeight - w
										: c,
							  ]));
						return a.map(Math.round);
					};
					a.prototype.getDateFormat = function (a, l, h, f) {
						var d = this.chart.time,
							u = d.dateFormat("%m-%d %H:%M:%S.%L", l),
							k = { millisecond: 15, second: 12, minute: 9, hour: 6, day: 3 },
							w = "millisecond";
						for (m in p) {
							if (
								a === p.week &&
								+d.dateFormat("%w", l) === h &&
								"00:00:00.000" === u.substr(6)
							) {
								var m = "week";
								break;
							}
							if (p[m] > a) {
								m = w;
								break;
							}
							if (k[m] && u.substr(k[m]) !== "01-01 00:00:00.000".substr(k[m]))
								break;
							"week" !== m && (w = m);
						}
						if (m) var c = d.resolveDTLFormat(f[m]).main;
						return c;
					};
					a.prototype.getLabel = function () {
						var a,
							l,
							h = this,
							f = this.chart.renderer,
							q = this.chart.styledMode,
							u = this.options,
							k = "tooltip" + (D(u.className) ? " " + u.className : ""),
							w =
								(null === (a = u.style) || void 0 === a
									? void 0
									: a.pointerEvents) ||
								(!this.followPointer && u.stickOnContact ? "auto" : "none"),
							m;
						a = function () {
							h.inContact = !0;
						};
						var y = function () {
							var a = h.chart.hoverSeries;
							h.inContact = !1;
							if (a && a.onMouseOut) a.onMouseOut();
						};
						if (!this.label) {
							this.outside &&
								((this.container = m = c.doc.createElement("div")),
								(m.className = "highcharts-tooltip-container"),
								r(m, {
									position: "absolute",
									top: "1px",
									pointerEvents: w,
									zIndex: 3,
								}),
								c.doc.body.appendChild(m),
								(this.renderer = f = new c.Renderer(
									m,
									0,
									0,
									null === (l = this.chart.options.chart) || void 0 === l
										? void 0
										: l.style,
									void 0,
									void 0,
									f.styledMode
								)));
							this.split
								? (this.label = f.g(k))
								: ((this.label = f
										.label(
											"",
											0,
											0,
											u.shape || "callout",
											null,
											null,
											u.useHTML,
											null,
											k
										)
										.attr({ padding: u.padding, r: u.borderRadius })),
								  q ||
										this.label
											.attr({
												fill: u.backgroundColor,
												"stroke-width": u.borderWidth,
											})
											.css(u.style)
											.css({ pointerEvents: w })
											.shadow(u.shadow));
							q &&
								(this.applyFilter(),
								this.label.addClass("highcharts-tooltip-" + this.chart.index));
							if (h.outside && !h.split) {
								var p = { x: this.label.xSetter, y: this.label.ySetter };
								this.label.xSetter = function (a, f) {
									p[f].call(this.label, h.distance);
									m.style.left = a + "px";
								};
								this.label.ySetter = function (a, f) {
									p[f].call(this.label, h.distance);
									m.style.top = a + "px";
								};
							}
							this.label
								.on("mouseenter", a)
								.on("mouseleave", y)
								.attr({ zIndex: 8 })
								.add();
						}
						return this.label;
					};
					a.prototype.getPosition = function (a, l, h) {
						var f = this.chart,
							d = this.distance,
							u = {},
							k = (f.inverted && h.h) || 0,
							w,
							m = this.outside,
							c = m ? M.documentElement.clientWidth - 2 * d : f.chartWidth,
							p = m
								? Math.max(
										M.body.scrollHeight,
										M.documentElement.scrollHeight,
										M.body.offsetHeight,
										M.documentElement.offsetHeight,
										M.documentElement.clientHeight
								  )
								: f.chartHeight,
							g = f.pointer.getChartPosition(),
							t = f.containerScaling,
							e = function (b) {
								return t ? b * t.scaleX : b;
							},
							b = function (b) {
								return t ? b * t.scaleY : b;
							},
							n = function (q) {
								var n = "x" === q;
								return [q, n ? c : p, n ? a : l].concat(
									m
										? [
												n ? e(a) : b(l),
												n
													? g.left - d + e(h.plotX + f.plotLeft)
													: g.top - d + b(h.plotY + f.plotTop),
												0,
												n ? c : p,
										  ]
										: [
												n ? a : l,
												n ? h.plotX + f.plotLeft : h.plotY + f.plotTop,
												n ? f.plotLeft : f.plotTop,
												n ? f.plotLeft + f.plotWidth : f.plotTop + f.plotHeight,
										  ]
								);
							},
							I = n("y"),
							x = n("x"),
							A =
								!this.followPointer &&
								z(h.ttBelow, !f.inverted === !!h.negative),
							r = function (a, f, h, q, n, l, w) {
								var m = "y" === a ? b(d) : e(d),
									c = (h - q) / 2,
									y = q < n - d,
									F = n + d + q < f,
									p = n - m - h + c;
								n = n + m - c;
								if (A && F) u[a] = n;
								else if (!A && y) u[a] = p;
								else if (y) u[a] = Math.min(w - q, 0 > p - k ? p : p - k);
								else if (F) u[a] = Math.max(l, n + k + h > f ? n : n + k);
								else return !1;
							},
							B = function (b, e, a, f, h) {
								var q;
								h < d || h > e - d
									? (q = !1)
									: (u[b] =
											h < a / 2 ? 1 : h > e - f / 2 ? e - f - 2 : h - a / 2);
								return q;
							},
							E = function (b) {
								var e = I;
								I = x;
								x = e;
								w = b;
							},
							J = function () {
								!1 !== r.apply(0, I)
									? !1 !== B.apply(0, x) || w || (E(!0), J())
									: w
									? (u.x = u.y = 0)
									: (E(!0), J());
							};
						(f.inverted || 1 < this.len) && E();
						J();
						return u;
					};
					a.prototype.getXDateFormat = function (a, l, h) {
						l = l.dateTimeLabelFormats;
						var f = h && h.closestPointRange;
						return (
							(f
								? this.getDateFormat(f, a.x, h.options.startOfWeek, l)
								: l.day) || l.year
						);
					};
					a.prototype.hide = function (a) {
						var d = this;
						g.clearTimeout(this.hideTimer);
						a = z(a, this.options.hideDelay, 500);
						this.isHidden ||
							(this.hideTimer = A(function () {
								d.getLabel().fadeOut(a ? void 0 : a);
								d.isHidden = !0;
							}, a));
					};
					a.prototype.init = function (a, l) {
						this.chart = a;
						this.options = l;
						this.crosshairs = [];
						this.now = { x: 0, y: 0 };
						this.isHidden = !0;
						this.split = l.split && !a.inverted && !a.polar;
						this.shared = l.shared || this.split;
						this.outside = z(
							l.outside,
							!(!a.scrollablePixelsX && !a.scrollablePixelsY)
						);
					};
					a.prototype.isStickyOnContact = function () {
						return !(
							this.followPointer ||
							!this.options.stickOnContact ||
							!this.inContact
						);
					};
					a.prototype.move = function (a, l, h, f) {
						var d = this,
							u = d.now,
							k =
								!1 !== d.options.animation &&
								!d.isHidden &&
								(1 < Math.abs(a - u.x) || 1 < Math.abs(l - u.y)),
							w = d.followPointer || 1 < d.len;
						K(u, {
							x: k ? (2 * u.x + a) / 3 : a,
							y: k ? (u.y + l) / 2 : l,
							anchorX: w ? void 0 : k ? (2 * u.anchorX + h) / 3 : h,
							anchorY: w ? void 0 : k ? (u.anchorY + f) / 2 : f,
						});
						d.getLabel().attr(u);
						d.drawTracker();
						k &&
							(g.clearTimeout(this.tooltipTimeout),
							(this.tooltipTimeout = setTimeout(function () {
								d && d.move(a, l, h, f);
							}, 32)));
					};
					a.prototype.refresh = function (a, l) {
						var d = this.chart,
							f = this.options,
							q = a,
							u = {},
							k = [],
							w = f.formatter || this.defaultFormatter;
						u = this.shared;
						var c = d.styledMode;
						if (f.enabled) {
							g.clearTimeout(this.hideTimer);
							this.followPointer = m(q)[0].series.tooltipOptions.followPointer;
							var y = this.getAnchor(q, l);
							l = y[0];
							var p = y[1];
							!u || (q.series && q.series.noSharedTooltip)
								? (u = q.getLabelConfig())
								: (d.pointer.applyInactiveState(q),
								  q.forEach(function (a) {
										a.setState("hover");
										k.push(a.getLabelConfig());
								  }),
								  (u = { x: q[0].category, y: q[0].y }),
								  (u.points = k),
								  (q = q[0]));
							this.len = k.length;
							d = w.call(u, this);
							w = q.series;
							this.distance = z(w.tooltipOptions.distance, 16);
							!1 === d
								? this.hide()
								: (this.split
										? this.renderSplit(d, m(a))
										: ((a = this.getLabel()),
										  (f.style.width && !c) ||
												a.css({ width: this.chart.spacingBox.width + "px" }),
										  a.attr({ text: d && d.join ? d.join("") : d }),
										  a
												.removeClass(/highcharts-color-[\d]+/g)
												.addClass(
													"highcharts-color-" + z(q.colorIndex, w.colorIndex)
												),
										  c ||
												a.attr({
													stroke:
														f.borderColor || q.color || w.color || "#666666",
												}),
										  this.updatePosition({
												plotX: l,
												plotY: p,
												negative: q.negative,
												ttBelow: q.ttBelow,
												h: y[2] || 0,
										  })),
								  this.isHidden &&
										this.label &&
										this.label.attr({ opacity: 1 }).show(),
								  (this.isHidden = !1));
							J(this, "refresh");
						}
					};
					a.prototype.renderSplit = function (a, l) {
						function d(b, a, e, f, d) {
							void 0 === d && (d = !0);
							e
								? ((a = E ? 0 : L), (b = G(b - f / 2, B.left, B.right - f)))
								: ((a -= J),
								  (b = d ? b - f - I : b + I),
								  (b = G(b, d ? b : B.left, B.right)));
							return { x: b, y: a };
						}
						var f = this,
							q = f.chart,
							u = f.chart,
							k = u.plotHeight,
							w = u.plotLeft,
							m = u.plotTop,
							y = u.pointer,
							p = u.renderer,
							g = u.scrollablePixelsY,
							x = void 0 === g ? 0 : g;
						g = u.scrollingContainer;
						g = void 0 === g ? { scrollLeft: 0, scrollTop: 0 } : g;
						var e = g.scrollLeft,
							b = g.scrollTop,
							n = u.styledMode,
							I = f.distance,
							A = f.options,
							r = f.options.positioner,
							B = {
								left: e,
								right: e + u.chartWidth,
								top: b,
								bottom: b + u.chartHeight,
							},
							M = f.getLabel(),
							E = !(!q.xAxis[0] || !q.xAxis[0].opposite),
							J = m + b,
							D = 0,
							L = k - x;
						t(a) && (a = [!1, a]);
						a = a.slice(0, l.length + 1).reduce(function (a, e, h) {
							if (!1 !== e && "" !== e) {
								h = l[h - 1] || {
									isHeader: !0,
									plotX: l[0].plotX,
									plotY: k,
									series: {},
								};
								var q = h.isHeader,
									u = q ? f : h.series,
									c = u.tt,
									y = h.isHeader;
								var F = h.series;
								var H =
									"highcharts-color-" + z(h.colorIndex, F.colorIndex, "none");
								c ||
									((c = { padding: A.padding, r: A.borderRadius }),
									n ||
										((c.fill = A.backgroundColor),
										(c["stroke-width"] = A.borderWidth)),
									(c = p
										.label(
											"",
											0,
											0,
											A[y ? "headerShape" : "shape"] || "callout",
											void 0,
											void 0,
											A.useHTML
										)
										.addClass(
											(y ? "highcharts-tooltip-header " : "") +
												"highcharts-tooltip-box " +
												H
										)
										.attr(c)
										.add(M)));
								c.isActive = !0;
								c.attr({ text: e });
								n ||
									c
										.css(A.style)
										.shadow(A.shadow)
										.attr({
											stroke: A.borderColor || h.color || F.color || "#333333",
										});
								e = u.tt = c;
								y = e.getBBox();
								u = y.width + e.strokeWidth();
								q && ((D = y.height), (L += D), E && (J -= D));
								F = h.plotX;
								F = void 0 === F ? 0 : F;
								H = h.plotY;
								H = void 0 === H ? 0 : H;
								var g = h.series;
								if (h.isHeader) {
									F = w + F;
									var t = m + k / 2;
								} else
									(c = g.xAxis),
										(g = g.yAxis),
										(F = c.pos + G(F, -I, c.len + I)),
										g.pos + H >= b + m &&
											g.pos + H <= b + m + k - x &&
											(t = g.pos + H);
								F = G(F, B.left - I, B.right + I);
								"number" === typeof t
									? ((y = y.height + 1),
									  (H = r ? r.call(f, u, y, h) : d(F, t, q, u)),
									  a.push({
											align: r ? 0 : void 0,
											anchorX: F,
											anchorY: t,
											boxWidth: u,
											point: h,
											rank: z(H.rank, q ? 1 : 0),
											size: y,
											target: H.y,
											tt: e,
											x: H.x,
									  }))
									: (e.isActive = !1);
							}
							return a;
						}, []);
						!r &&
							a.some(function (b) {
								return b.x < B.left;
							}) &&
							(a = a.map(function (b) {
								var a = d(
									b.anchorX,
									b.anchorY,
									b.point.isHeader,
									b.boxWidth,
									!1
								);
								return K(b, { target: a.y, x: a.x });
							}));
						f.cleanSplit();
						c.distribute(a, L);
						a.forEach(function (b) {
							var a = b.pos;
							b.tt.attr({
								visibility: "undefined" === typeof a ? "hidden" : "inherit",
								x: b.x,
								y: a + J,
								anchorX: b.anchorX,
								anchorY: b.anchorY,
							});
						});
						a = f.container;
						q = f.renderer;
						f.outside &&
							a &&
							q &&
							((u = M.getBBox()),
							q.setSize(u.width + u.x, u.height + u.y, !1),
							(y = y.getChartPosition()),
							(a.style.left = y.left + "px"),
							(a.style.top = y.top + "px"));
					};
					a.prototype.drawTracker = function () {
						if (this.followPointer || !this.options.stickOnContact)
							this.tracker && this.tracker.destroy();
						else {
							var a = this.chart,
								l = this.label,
								h = a.hoverPoint;
							if (l && h) {
								var f = { x: 0, y: 0, width: 0, height: 0 };
								h = this.getAnchor(h);
								var q = l.getBBox();
								h[0] += a.plotLeft - l.translateX;
								h[1] += a.plotTop - l.translateY;
								f.x = Math.min(0, h[0]);
								f.y = Math.min(0, h[1]);
								f.width =
									0 > h[0]
										? Math.max(Math.abs(h[0]), q.width - h[0])
										: Math.max(Math.abs(h[0]), q.width);
								f.height =
									0 > h[1]
										? Math.max(Math.abs(h[1]), q.height - Math.abs(h[1]))
										: Math.max(Math.abs(h[1]), q.height);
								this.tracker
									? this.tracker.attr(f)
									: ((this.tracker = l.renderer
											.rect(f)
											.addClass("highcharts-tracker")
											.add(l)),
									  a.styledMode ||
											this.tracker.attr({ fill: "rgba(0,0,0,0)" }));
							}
						}
					};
					a.prototype.styledModeFormat = function (a) {
						return a
							.replace('style="font-size: 10px"', 'class="highcharts-header"')
							.replace(
								/style="color:{(point|series)\.color}"/g,
								'class="highcharts-color-{$1.colorIndex}"'
							);
					};
					a.prototype.tooltipFooterHeaderFormatter = function (a, l) {
						var d = l ? "footer" : "header",
							f = a.series,
							q = f.tooltipOptions,
							u = q.xDateFormat,
							k = f.xAxis,
							w = k && "datetime" === k.options.type && E(a.key),
							m = q[d + "Format"];
						l = { isFooter: l, labelConfig: a };
						J(this, "headerFormatter", l, function (d) {
							w && !u && (u = this.getXDateFormat(a, q, k));
							w &&
								u &&
								((a.point && a.point.tooltipDateKeys) || ["key"]).forEach(
									function (a) {
										m = m.replace(
											"{point." + a + "}",
											"{point." + a + ":" + u + "}"
										);
									}
								);
							f.chart.styledMode && (m = this.styledModeFormat(m));
							d.text = B(m, { point: a, series: f }, this.chart);
						});
						return l.text;
					};
					a.prototype.update = function (a) {
						this.destroy();
						x(!0, this.chart.options.tooltip.userOptions, a);
						this.init(this.chart, x(!0, this.options, a));
					};
					a.prototype.updatePosition = function (a) {
						var d = this.chart,
							h = d.pointer,
							f = this.getLabel(),
							q = a.plotX + d.plotLeft,
							u = a.plotY + d.plotTop;
						h = h.getChartPosition();
						a = (this.options.positioner || this.getPosition).call(
							this,
							f.width,
							f.height,
							a
						);
						if (this.outside) {
							var k = (this.options.borderWidth || 0) + 2 * this.distance;
							this.renderer.setSize(f.width + k, f.height + k, !1);
							if ((d = d.containerScaling))
								r(this.container, {
									transform: "scale(" + d.scaleX + ", " + d.scaleY + ")",
								}),
									(q *= d.scaleX),
									(u *= d.scaleY);
							q += h.left - a.x;
							u += h.top - a.y;
						}
						this.move(Math.round(a.x), Math.round(a.y || 0), q, u);
					};
					return a;
				})();
			c.Tooltip = k;
			return c.Tooltip;
		}
	);
	N(
		v,
		"parts/Pointer.js",
		[
			v["parts/Globals.js"],
			v["parts/Utilities.js"],
			v["parts/Tooltip.js"],
			v["parts/Color.js"],
		],
		function (c, g, G, r) {
			var D = g.addEvent,
				L = g.attr,
				K = g.css,
				J = g.defined,
				B = g.extend,
				E = g.find,
				t = g.fireEvent,
				x = g.isNumber,
				z = g.isObject,
				m = g.objectEach,
				A = g.offset,
				p = g.pick,
				M = g.splat,
				k = r.parse,
				a = c.charts,
				d = c.noop;
			g = (function () {
				function l(a, f) {
					this.lastValidTouch = {};
					this.pinchDown = [];
					this.runChartClick = !1;
					this.chart = a;
					this.hasDragged = !1;
					this.options = f;
					this.unbindContainerMouseLeave = function () {};
					this.init(a, f);
				}
				l.prototype.applyInactiveState = function (a) {
					var f = [],
						d;
					(a || []).forEach(function (a) {
						d = a.series;
						f.push(d);
						d.linkedParent && f.push(d.linkedParent);
						d.linkedSeries && (f = f.concat(d.linkedSeries));
						d.navigatorSeries && f.push(d.navigatorSeries);
					});
					this.chart.series.forEach(function (a) {
						-1 === f.indexOf(a)
							? a.setState("inactive", !0)
							: a.options.inactiveOtherPoints &&
							  a.setAllPointsToState("inactive");
					});
				};
				l.prototype.destroy = function () {
					var a = this;
					"undefined" !== typeof a.unDocMouseMove && a.unDocMouseMove();
					this.unbindContainerMouseLeave();
					c.chartCount ||
						(c.unbindDocumentMouseUp &&
							(c.unbindDocumentMouseUp = c.unbindDocumentMouseUp()),
						c.unbindDocumentTouchEnd &&
							(c.unbindDocumentTouchEnd = c.unbindDocumentTouchEnd()));
					clearInterval(a.tooltipTimeout);
					m(a, function (f, d) {
						a[d] = null;
					});
				};
				l.prototype.drag = function (a) {
					var f = this.chart,
						d = f.options.chart,
						h = a.chartX,
						l = a.chartY,
						w = this.zoomHor,
						m = this.zoomVert,
						c = f.plotLeft,
						p = f.plotTop,
						g = f.plotWidth,
						t = f.plotHeight,
						e = this.selectionMarker,
						b = this.mouseDownX || 0,
						n = this.mouseDownY || 0,
						I = z(d.panning) ? d.panning && d.panning.enabled : d.panning,
						x = d.panKey && a[d.panKey + "Key"];
					if (!e || !e.touch)
						if (
							(h < c ? (h = c) : h > c + g && (h = c + g),
							l < p ? (l = p) : l > p + t && (l = p + t),
							(this.hasDragged = Math.sqrt(
								Math.pow(b - h, 2) + Math.pow(n - l, 2)
							)),
							10 < this.hasDragged)
						) {
							var A = f.isInsidePlot(b - c, n - p);
							f.hasCartesianSeries &&
								(this.zoomX || this.zoomY) &&
								A &&
								!x &&
								!e &&
								((this.selectionMarker = e = f.renderer
									.rect(c, p, w ? 1 : g, m ? 1 : t, 0)
									.attr({ class: "highcharts-selection-marker", zIndex: 7 })
									.add()),
								f.styledMode ||
									e.attr({
										fill:
											d.selectionMarkerFill ||
											k("#335cad").setOpacity(0.25).get(),
									}));
							e &&
								w &&
								((h -= b),
								e.attr({ width: Math.abs(h), x: (0 < h ? 0 : h) + b }));
							e &&
								m &&
								((h = l - n),
								e.attr({ height: Math.abs(h), y: (0 < h ? 0 : h) + n }));
							A && !e && I && f.pan(a, d.panning);
						}
				};
				l.prototype.dragStart = function (a) {
					var f = this.chart;
					f.mouseIsDown = a.type;
					f.cancelClick = !1;
					f.mouseDownX = this.mouseDownX = a.chartX;
					f.mouseDownY = this.mouseDownY = a.chartY;
				};
				l.prototype.drop = function (a) {
					var f = this,
						d = this.chart,
						h = this.hasPinched;
					if (this.selectionMarker) {
						var l = { originalEvent: a, xAxis: [], yAxis: [] },
							k = this.selectionMarker,
							m = k.attr ? k.attr("x") : k.x,
							c = k.attr ? k.attr("y") : k.y,
							p = k.attr ? k.attr("width") : k.width,
							g = k.attr ? k.attr("height") : k.height,
							z;
						if (this.hasDragged || h)
							d.axes.forEach(function (e) {
								if (
									e.zoomEnabled &&
									J(e.min) &&
									(h || f[{ xAxis: "zoomX", yAxis: "zoomY" }[e.coll]])
								) {
									var b = e.horiz,
										d = "touchend" === a.type ? e.minPixelPadding : 0,
										q = e.toValue((b ? m : c) + d);
									b = e.toValue((b ? m + p : c + g) - d);
									l[e.coll].push({
										axis: e,
										min: Math.min(q, b),
										max: Math.max(q, b),
									});
									z = !0;
								}
							}),
								z &&
									t(d, "selection", l, function (a) {
										d.zoom(B(a, h ? { animation: !1 } : null));
									});
						x(d.index) &&
							(this.selectionMarker = this.selectionMarker.destroy());
						h && this.scaleGroups();
					}
					d &&
						x(d.index) &&
						(K(d.container, { cursor: d._cursor }),
						(d.cancelClick = 10 < this.hasDragged),
						(d.mouseIsDown = this.hasDragged = this.hasPinched = !1),
						(this.pinchDown = []));
				};
				l.prototype.findNearestKDPoint = function (a, f, d) {
					var h = this.chart,
						q = h.hoverPoint;
					h = h.tooltip;
					if (q && h && h.isStickyOnContact()) return q;
					var l;
					a.forEach(function (a) {
						var h =
							!(a.noSharedTooltip && f) &&
							0 > a.options.findNearestPointBy.indexOf("y");
						a = a.searchPoint(d, h);
						if ((h = z(a, !0)) && !(h = !z(l, !0))) {
							h = l.distX - a.distX;
							var q = l.dist - a.dist,
								u =
									(a.series.group && a.series.group.zIndex) -
									(l.series.group && l.series.group.zIndex);
							h =
								0 <
								(0 !== h && f
									? h
									: 0 !== q
									? q
									: 0 !== u
									? u
									: l.series.index > a.series.index
									? -1
									: 1);
						}
						h && (l = a);
					});
					return l;
				};
				l.prototype.getChartCoordinatesFromPoint = function (a, f) {
					var d = a.series,
						h = d.xAxis;
					d = d.yAxis;
					var l = p(a.clientX, a.plotX),
						k = a.shapeArgs;
					if (h && d)
						return f
							? { chartX: h.len + h.pos - l, chartY: d.len + d.pos - a.plotY }
							: { chartX: l + h.pos, chartY: a.plotY + d.pos };
					if (k && k.x && k.y) return { chartX: k.x, chartY: k.y };
				};
				l.prototype.getChartPosition = function () {
					return (
						this.chartPosition || (this.chartPosition = A(this.chart.container))
					);
				};
				l.prototype.getCoordinates = function (a) {
					var f = { xAxis: [], yAxis: [] };
					this.chart.axes.forEach(function (d) {
						f[d.isXAxis ? "xAxis" : "yAxis"].push({
							axis: d,
							value: d.toValue(a[d.horiz ? "chartX" : "chartY"]),
						});
					});
					return f;
				};
				l.prototype.getHoverData = function (a, f, d, u, l, k) {
					var h,
						q = [];
					u = !(!u || !a);
					var m = f && !f.stickyTracking,
						w = {
							chartX: k ? k.chartX : void 0,
							chartY: k ? k.chartY : void 0,
							shared: l,
						};
					t(this, "beforeGetHoverData", w);
					m = m
						? [f]
						: d.filter(function (a) {
								return w.filter
									? w.filter(a)
									: a.visible &&
											!(!l && a.directTouch) &&
											p(a.options.enableMouseTracking, !0) &&
											a.stickyTracking;
						  });
					f = (h = u || !k ? a : this.findNearestKDPoint(m, l, k)) && h.series;
					h &&
						(l && !f.noSharedTooltip
							? ((m = d.filter(function (a) {
									return w.filter
										? w.filter(a)
										: a.visible &&
												!(!l && a.directTouch) &&
												p(a.options.enableMouseTracking, !0) &&
												!a.noSharedTooltip;
							  })),
							  m.forEach(function (a) {
									var e = E(a.points, function (b) {
										return b.x === h.x && !b.isNull;
									});
									z(e) &&
										(a.chart.isBoosting && (e = a.getPoint(e)), q.push(e));
							  }))
							: q.push(h));
					w = { hoverPoint: h };
					t(this, "afterGetHoverData", w);
					return { hoverPoint: w.hoverPoint, hoverSeries: f, hoverPoints: q };
				};
				l.prototype.getPointFromEvent = function (a) {
					a = a.target;
					for (var f; a && !f; ) (f = a.point), (a = a.parentNode);
					return f;
				};
				l.prototype.onTrackerMouseOut = function (a) {
					a = a.relatedTarget || a.toElement;
					var f = this.chart.hoverSeries;
					this.isDirectTouch = !1;
					if (
						!(
							!f ||
							!a ||
							f.stickyTracking ||
							this.inClass(a, "highcharts-tooltip") ||
							(this.inClass(a, "highcharts-series-" + f.index) &&
								this.inClass(a, "highcharts-tracker"))
						)
					)
						f.onMouseOut();
				};
				l.prototype.inClass = function (a, f) {
					for (var d; a; ) {
						if ((d = L(a, "class"))) {
							if (-1 !== d.indexOf(f)) return !0;
							if (-1 !== d.indexOf("highcharts-container")) return !1;
						}
						a = a.parentNode;
					}
				};
				l.prototype.init = function (a, f) {
					this.options = f;
					this.chart = a;
					this.runChartClick = f.chart.events && !!f.chart.events.click;
					this.pinchDown = [];
					this.lastValidTouch = {};
					G &&
						((a.tooltip = new G(a, f.tooltip)),
						(this.followTouchMove = p(f.tooltip.followTouchMove, !0)));
					this.setDOMEvents();
				};
				l.prototype.normalize = function (a, f) {
					var d = a.touches,
						h = d ? (d.length ? d.item(0) : d.changedTouches[0]) : a;
					f || (f = this.getChartPosition());
					d = h.pageX - f.left;
					f = h.pageY - f.top;
					if ((h = this.chart.containerScaling))
						(d /= h.scaleX), (f /= h.scaleY);
					return B(a, { chartX: Math.round(d), chartY: Math.round(f) });
				};
				l.prototype.onContainerClick = function (a) {
					var f = this.chart,
						d = f.hoverPoint;
					a = this.normalize(a);
					var h = f.plotLeft,
						l = f.plotTop;
					f.cancelClick ||
						(d && this.inClass(a.target, "highcharts-tracker")
							? (t(d.series, "click", B(a, { point: d })),
							  f.hoverPoint && d.firePointEvent("click", a))
							: (B(a, this.getCoordinates(a)),
							  f.isInsidePlot(a.chartX - h, a.chartY - l) &&
									t(f, "click", a)));
				};
				l.prototype.onContainerMouseDown = function (a) {
					a = this.normalize(a);
					if (c.isFirefox && 0 !== a.button) this.onContainerMouseMove(a);
					if (
						"undefined" === typeof a.button ||
						1 === ((a.buttons || a.button) & 1)
					)
						this.zoomOption(a), this.dragStart(a);
				};
				l.prototype.onContainerMouseLeave = function (d) {
					var f = a[p(c.hoverChartIndex, -1)],
						h = this.chart.tooltip;
					d = this.normalize(d);
					f &&
						(d.relatedTarget || d.toElement) &&
						(f.pointer.reset(), (f.pointer.chartPosition = void 0));
					h && !h.isHidden && this.reset();
				};
				l.prototype.onContainerMouseMove = function (a) {
					var f = this.chart;
					a = this.normalize(a);
					this.setHoverChartIndex();
					a.preventDefault || (a.returnValue = !1);
					"mousedown" === f.mouseIsDown && this.drag(a);
					f.openMenu ||
						(!this.inClass(a.target, "highcharts-tracker") &&
							!f.isInsidePlot(a.chartX - f.plotLeft, a.chartY - f.plotTop)) ||
						this.runPointActions(a);
				};
				l.prototype.onDocumentTouchEnd = function (d) {
					a[c.hoverChartIndex] && a[c.hoverChartIndex].pointer.drop(d);
				};
				l.prototype.onContainerTouchMove = function (a) {
					this.touch(a);
				};
				l.prototype.onContainerTouchStart = function (a) {
					this.zoomOption(a);
					this.touch(a, !0);
				};
				l.prototype.onDocumentMouseMove = function (a) {
					var f = this.chart,
						d = this.chartPosition;
					a = this.normalize(a, d);
					var h = f.tooltip;
					!d ||
						(h && h.isStickyOnContact()) ||
						f.isInsidePlot(a.chartX - f.plotLeft, a.chartY - f.plotTop) ||
						this.inClass(a.target, "highcharts-tracker") ||
						this.reset();
				};
				l.prototype.onDocumentMouseUp = function (d) {
					var f = a[p(c.hoverChartIndex, -1)];
					f && f.pointer.drop(d);
				};
				l.prototype.pinch = function (a) {
					var f = this,
						h = f.chart,
						u = f.pinchDown,
						l = a.touches || [],
						k = l.length,
						m = f.lastValidTouch,
						c = f.hasZoom,
						g = f.selectionMarker,
						t = {},
						z =
							1 === k &&
							((f.inClass(a.target, "highcharts-tracker") &&
								h.runTrackerClick) ||
								f.runChartClick),
						e = {};
					1 < k && (f.initiated = !0);
					c && f.initiated && !z && a.preventDefault();
					[].map.call(l, function (b) {
						return f.normalize(b);
					});
					"touchstart" === a.type
						? ([].forEach.call(l, function (b, a) {
								u[a] = { chartX: b.chartX, chartY: b.chartY };
						  }),
						  (m.x = [u[0].chartX, u[1] && u[1].chartX]),
						  (m.y = [u[0].chartY, u[1] && u[1].chartY]),
						  h.axes.forEach(function (b) {
								if (b.zoomEnabled) {
									var a = h.bounds[b.horiz ? "h" : "v"],
										e = b.minPixelPadding,
										f = b.toPixels(
											Math.min(p(b.options.min, b.dataMin), b.dataMin)
										),
										d = b.toPixels(
											Math.max(p(b.options.max, b.dataMax), b.dataMax)
										),
										q = Math.max(f, d);
									a.min = Math.min(b.pos, Math.min(f, d) - e);
									a.max = Math.max(b.pos + b.len, q + e);
								}
						  }),
						  (f.res = !0))
						: f.followTouchMove && 1 === k
						? this.runPointActions(f.normalize(a))
						: u.length &&
						  (g ||
								(f.selectionMarker = g = B(
									{ destroy: d, touch: !0 },
									h.plotBox
								)),
						  f.pinchTranslate(u, l, t, g, e, m),
						  (f.hasPinched = c),
						  f.scaleGroups(t, e),
						  f.res && ((f.res = !1), this.reset(!1, 0)));
				};
				l.prototype.pinchTranslate = function (a, f, d, u, l, k) {
					this.zoomHor && this.pinchTranslateDirection(!0, a, f, d, u, l, k);
					this.zoomVert && this.pinchTranslateDirection(!1, a, f, d, u, l, k);
				};
				l.prototype.pinchTranslateDirection = function (
					a,
					f,
					d,
					u,
					l,
					k,
					m,
					c
				) {
					var h = this.chart,
						q = a ? "x" : "y",
						w = a ? "X" : "Y",
						e = "chart" + w,
						b = a ? "width" : "height",
						n = h["plot" + (a ? "Left" : "Top")],
						y,
						p,
						F = c || 1,
						g = h.inverted,
						H = h.bounds[a ? "h" : "v"],
						t = 1 === f.length,
						z = f[0][e],
						x = d[0][e],
						A = !t && f[1][e],
						r = !t && d[1][e];
					d = function () {
						"number" === typeof r &&
							20 < Math.abs(z - A) &&
							(F = c || Math.abs(x - r) / Math.abs(z - A));
						p = (n - x) / F + z;
						y = h["plot" + (a ? "Width" : "Height")] / F;
					};
					d();
					f = p;
					if (f < H.min) {
						f = H.min;
						var B = !0;
					} else f + y > H.max && ((f = H.max - y), (B = !0));
					B
						? ((x -= 0.8 * (x - m[q][0])),
						  "number" === typeof r && (r -= 0.8 * (r - m[q][1])),
						  d())
						: (m[q] = [x, r]);
					g || ((k[q] = p - n), (k[b] = y));
					k = g ? 1 / F : F;
					l[b] = y;
					l[q] = f;
					u[g ? (a ? "scaleY" : "scaleX") : "scale" + w] = F;
					u["translate" + w] = k * n + (x - k * z);
				};
				l.prototype.reset = function (a, f) {
					var d = this.chart,
						h = d.hoverSeries,
						l = d.hoverPoint,
						k = d.hoverPoints,
						m = d.tooltip,
						c = m && m.shared ? k : l;
					a &&
						c &&
						M(c).forEach(function (f) {
							f.series.isCartesian &&
								"undefined" === typeof f.plotX &&
								(a = !1);
						});
					if (a)
						m &&
							c &&
							M(c).length &&
							(m.refresh(c),
							m.shared && k
								? k.forEach(function (a) {
										a.setState(a.state, !0);
										a.series.isCartesian &&
											(a.series.xAxis.crosshair &&
												a.series.xAxis.drawCrosshair(null, a),
											a.series.yAxis.crosshair &&
												a.series.yAxis.drawCrosshair(null, a));
								  })
								: l &&
								  (l.setState(l.state, !0),
								  d.axes.forEach(function (a) {
										a.crosshair &&
											l.series[a.coll] === a &&
											a.drawCrosshair(null, l);
								  })));
					else {
						if (l) l.onMouseOut();
						k &&
							k.forEach(function (a) {
								a.setState();
							});
						if (h) h.onMouseOut();
						m && m.hide(f);
						this.unDocMouseMove &&
							(this.unDocMouseMove = this.unDocMouseMove());
						d.axes.forEach(function (a) {
							a.hideCrosshair();
						});
						this.hoverX = d.hoverPoints = d.hoverPoint = null;
					}
				};
				l.prototype.runPointActions = function (d, f) {
					var h = this.chart,
						l = h.tooltip && h.tooltip.options.enabled ? h.tooltip : void 0,
						k = l ? l.shared : !1,
						m = f || h.hoverPoint,
						g = (m && m.series) || h.hoverSeries;
					g = this.getHoverData(
						m,
						g,
						h.series,
						(!d || "touchmove" !== d.type) &&
							(!!f || (g && g.directTouch && this.isDirectTouch)),
						k,
						d
					);
					m = g.hoverPoint;
					var y = g.hoverPoints;
					f = (g = g.hoverSeries) && g.tooltipOptions.followPointer;
					k = k && g && !g.noSharedTooltip;
					if (m && (m !== h.hoverPoint || (l && l.isHidden))) {
						(h.hoverPoints || []).forEach(function (a) {
							-1 === y.indexOf(a) && a.setState();
						});
						if (h.hoverSeries !== g) g.onMouseOver();
						this.applyInactiveState(y);
						(y || []).forEach(function (a) {
							a.setState("hover");
						});
						h.hoverPoint && h.hoverPoint.firePointEvent("mouseOut");
						if (!m.series) return;
						m.firePointEvent("mouseOver");
						h.hoverPoints = y;
						h.hoverPoint = m;
						l && l.refresh(k ? y : m, d);
					} else
						f &&
							l &&
							!l.isHidden &&
							((m = l.getAnchor([{}], d)),
							l.updatePosition({ plotX: m[0], plotY: m[1] }));
					this.unDocMouseMove ||
						(this.unDocMouseMove = D(
							h.container.ownerDocument,
							"mousemove",
							function (f) {
								var d = a[c.hoverChartIndex];
								if (d) d.pointer.onDocumentMouseMove(f);
							}
						));
					h.axes.forEach(function (a) {
						var f = p((a.crosshair || {}).snap, !0),
							l;
						f &&
							(((l = h.hoverPoint) && l.series[a.coll] === a) ||
								(l = E(y, function (e) {
									return e.series[a.coll] === a;
								})));
						l || !f ? a.drawCrosshair(d, l) : a.hideCrosshair();
					});
				};
				l.prototype.scaleGroups = function (a, f) {
					var d = this.chart,
						h;
					d.series.forEach(function (l) {
						h = a || l.getPlotBox();
						l.xAxis &&
							l.xAxis.zoomEnabled &&
							l.group &&
							(l.group.attr(h),
							l.markerGroup &&
								(l.markerGroup.attr(h),
								l.markerGroup.clip(f ? d.clipRect : null)),
							l.dataLabelsGroup && l.dataLabelsGroup.attr(h));
					});
					d.clipRect.attr(f || d.clipBox);
				};
				l.prototype.setDOMEvents = function () {
					var a = this.chart.container,
						f = a.ownerDocument;
					a.onmousedown = this.onContainerMouseDown.bind(this);
					a.onmousemove = this.onContainerMouseMove.bind(this);
					a.onclick = this.onContainerClick.bind(this);
					this.unbindContainerMouseLeave = D(
						a,
						"mouseleave",
						this.onContainerMouseLeave.bind(this)
					);
					c.unbindDocumentMouseUp ||
						(c.unbindDocumentMouseUp = D(
							f,
							"mouseup",
							this.onDocumentMouseUp.bind(this)
						));
					c.hasTouch &&
						(D(a, "touchstart", this.onContainerTouchStart.bind(this)),
						D(a, "touchmove", this.onContainerTouchMove.bind(this)),
						c.unbindDocumentTouchEnd ||
							(c.unbindDocumentTouchEnd = D(
								f,
								"touchend",
								this.onDocumentTouchEnd.bind(this)
							)));
				};
				l.prototype.setHoverChartIndex = function () {
					var a = this.chart,
						f = c.charts[p(c.hoverChartIndex, -1)];
					if (f && f !== a)
						f.pointer.onContainerMouseLeave({ relatedTarget: !0 });
					(f && f.mouseIsDown) || (c.hoverChartIndex = a.index);
				};
				l.prototype.touch = function (a, f) {
					var d = this.chart,
						h;
					this.setHoverChartIndex();
					if (1 === a.touches.length)
						if (
							((a = this.normalize(a)),
							(h = d.isInsidePlot(
								a.chartX - d.plotLeft,
								a.chartY - d.plotTop
							)) && !d.openMenu)
						) {
							f && this.runPointActions(a);
							if ("touchmove" === a.type) {
								f = this.pinchDown;
								var l = f[0]
									? 4 <=
									  Math.sqrt(
											Math.pow(f[0].chartX - a.chartX, 2) +
												Math.pow(f[0].chartY - a.chartY, 2)
									  )
									: !1;
							}
							p(l, !0) && this.pinch(a);
						} else f && this.reset();
					else 2 === a.touches.length && this.pinch(a);
				};
				l.prototype.zoomOption = function (a) {
					var f = this.chart,
						d = f.options.chart,
						h = d.zoomType || "";
					f = f.inverted;
					/touch/.test(a.type) && (h = p(d.pinchType, h));
					this.zoomX = a = /x/.test(h);
					this.zoomY = h = /y/.test(h);
					this.zoomHor = (a && !f) || (h && f);
					this.zoomVert = (h && !f) || (a && f);
					this.hasZoom = a || h;
				};
				return l;
			})();
			c.Pointer = g;
			return c.Pointer;
		}
	);
	N(
		v,
		"parts/MSPointer.js",
		[v["parts/Globals.js"], v["parts/Pointer.js"], v["parts/Utilities.js"]],
		function (c, g, G) {
			function r() {
				var c = [];
				c.item = function (m) {
					return this[m];
				};
				B(m, function (m) {
					c.push({ pageX: m.pageX, pageY: m.pageY, target: m.target });
				});
				return c;
			}
			function D(m, g, k, a) {
				("touch" !== m.pointerType &&
					m.pointerType !== m.MSPOINTER_TYPE_TOUCH) ||
					!t[c.hoverChartIndex] ||
					(a(m),
					(a = t[c.hoverChartIndex].pointer),
					a[g]({
						type: k,
						target: m.currentTarget,
						preventDefault: z,
						touches: r(),
					}));
			}
			var L =
					(this && this.__extends) ||
					(function () {
						var m = function (c, k) {
							m =
								Object.setPrototypeOf ||
								({ __proto__: [] } instanceof Array &&
									function (a, d) {
										a.__proto__ = d;
									}) ||
								function (a, d) {
									for (var l in d) d.hasOwnProperty(l) && (a[l] = d[l]);
								};
							return m(c, k);
						};
						return function (c, k) {
							function a() {
								this.constructor = c;
							}
							m(c, k);
							c.prototype =
								null === k
									? Object.create(k)
									: ((a.prototype = k.prototype), new a());
						};
					})(),
				K = G.addEvent,
				J = G.css,
				B = G.objectEach,
				E = G.removeEvent,
				t = c.charts,
				x = c.doc,
				z = c.noop,
				m = {},
				A = !!c.win.PointerEvent;
			return (function (c) {
				function g() {
					return (null !== c && c.apply(this, arguments)) || this;
				}
				L(g, c);
				g.prototype.batchMSEvents = function (k) {
					k(
						this.chart.container,
						A ? "pointerdown" : "MSPointerDown",
						this.onContainerPointerDown
					);
					k(
						this.chart.container,
						A ? "pointermove" : "MSPointerMove",
						this.onContainerPointerMove
					);
					k(x, A ? "pointerup" : "MSPointerUp", this.onDocumentPointerUp);
				};
				g.prototype.destroy = function () {
					this.batchMSEvents(E);
					c.prototype.destroy.call(this);
				};
				g.prototype.init = function (k, a) {
					c.prototype.init.call(this, k, a);
					this.hasZoom &&
						J(k.container, {
							"-ms-touch-action": "none",
							"touch-action": "none",
						});
				};
				g.prototype.onContainerPointerDown = function (k) {
					D(k, "onContainerTouchStart", "touchstart", function (a) {
						m[a.pointerId] = {
							pageX: a.pageX,
							pageY: a.pageY,
							target: a.currentTarget,
						};
					});
				};
				g.prototype.onContainerPointerMove = function (k) {
					D(k, "onContainerTouchMove", "touchmove", function (a) {
						m[a.pointerId] = { pageX: a.pageX, pageY: a.pageY };
						m[a.pointerId].target || (m[a.pointerId].target = a.currentTarget);
					});
				};
				g.prototype.onDocumentPointerUp = function (k) {
					D(k, "onDocumentTouchEnd", "touchend", function (a) {
						delete m[a.pointerId];
					});
				};
				g.prototype.setDOMEvents = function () {
					c.prototype.setDOMEvents.call(this);
					(this.hasZoom || this.followTouchMove) && this.batchMSEvents(K);
				};
				return g;
			})(g);
		}
	);
	N(
		v,
		"parts/Legend.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var G = g.addEvent,
				r = g.animObject,
				D = g.css,
				L = g.defined,
				K = g.discardElement,
				J = g.find,
				B = g.fireEvent,
				E = g.format,
				t = g.isNumber,
				x = g.merge,
				z = g.pick,
				m = g.relativeLength,
				A = g.setAnimation,
				p = g.stableSort,
				M = g.syncTimeout;
			g = g.wrap;
			var k = c.isFirefox,
				a = c.marginNames,
				d = c.win,
				l = (function () {
					function d(a, d) {
						this.allItems = [];
						this.contentGroup = this.box = void 0;
						this.display = !1;
						this.group = void 0;
						this.offsetWidth = this.maxLegendWidth = this.maxItemWidth = this.legendWidth = this.legendHeight = this.lastLineHeight = this.lastItemY = this.itemY = this.itemX = this.itemMarginTop = this.itemMarginBottom = this.itemHeight = this.initialItemY = 0;
						this.options = {};
						this.padding = 0;
						this.pages = [];
						this.proximate = !1;
						this.scrollGroup = void 0;
						this.widthOption = this.totalItemWidth = this.titleHeight = this.symbolWidth = this.symbolHeight = 0;
						this.chart = a;
						this.init(a, d);
					}
					d.prototype.init = function (a, d) {
						this.chart = a;
						this.setOptions(d);
						d.enabled &&
							(this.render(),
							G(this.chart, "endResize", function () {
								this.legend.positionCheckboxes();
							}),
							this.proximate
								? (this.unchartrender = G(this.chart, "render", function () {
										this.legend.proximatePositions();
										this.legend.positionItems();
								  }))
								: this.unchartrender && this.unchartrender());
					};
					d.prototype.setOptions = function (a) {
						var d = z(a.padding, 8);
						this.options = a;
						this.chart.styledMode ||
							((this.itemStyle = a.itemStyle),
							(this.itemHiddenStyle = x(this.itemStyle, a.itemHiddenStyle)));
						this.itemMarginTop = a.itemMarginTop || 0;
						this.itemMarginBottom = a.itemMarginBottom || 0;
						this.padding = d;
						this.initialItemY = d - 5;
						this.symbolWidth = z(a.symbolWidth, 16);
						this.pages = [];
						this.proximate = "proximate" === a.layout && !this.chart.inverted;
						this.baseline = void 0;
					};
					d.prototype.update = function (a, d) {
						var f = this.chart;
						this.setOptions(x(!0, this.options, a));
						this.destroy();
						f.isDirtyLegend = f.isDirtyBox = !0;
						z(d, !0) && f.redraw();
						B(this, "afterUpdate");
					};
					d.prototype.colorizeItem = function (a, d) {
						a.legendGroup[d ? "removeClass" : "addClass"](
							"highcharts-legend-item-hidden"
						);
						if (!this.chart.styledMode) {
							var f = this.options,
								h = a.legendItem,
								l = a.legendLine,
								k = a.legendSymbol,
								q = this.itemHiddenStyle.color;
							f = d ? f.itemStyle.color : q;
							var m = d ? a.color || q : q,
								c = a.options && a.options.marker,
								g = { fill: m };
							h && h.css({ fill: f, color: f });
							l && l.attr({ stroke: m });
							k &&
								(c &&
									k.isMarker &&
									((g = a.pointAttribs()), d || (g.stroke = g.fill = q)),
								k.attr(g));
						}
						B(this, "afterColorizeItem", { item: a, visible: d });
					};
					d.prototype.positionItems = function () {
						this.allItems.forEach(this.positionItem, this);
						this.chart.isResizing || this.positionCheckboxes();
					};
					d.prototype.positionItem = function (a) {
						var d = this.options,
							f = d.symbolPadding;
						d = !d.rtl;
						var h = a._legendItemPos,
							l = h[0];
						h = h[1];
						var k = a.checkbox;
						if ((a = a.legendGroup) && a.element)
							a[L(a.translateY) ? "animate" : "attr"]({
								translateX: d ? l : this.legendWidth - l - 2 * f - 4,
								translateY: h,
							});
						k && ((k.x = l), (k.y = h));
					};
					d.prototype.destroyItem = function (a) {
						var d = a.checkbox;
						["legendItem", "legendLine", "legendSymbol", "legendGroup"].forEach(
							function (d) {
								a[d] && (a[d] = a[d].destroy());
							}
						);
						d && K(a.checkbox);
					};
					d.prototype.destroy = function () {
						function a(a) {
							this[a] && (this[a] = this[a].destroy());
						}
						this.getAllItems().forEach(function (d) {
							["legendItem", "legendGroup"].forEach(a, d);
						});
						"clipRect up down pager nav box title group"
							.split(" ")
							.forEach(a, this);
						this.display = null;
					};
					d.prototype.positionCheckboxes = function () {
						var a = this.group && this.group.alignAttr,
							d = this.clipHeight || this.legendHeight,
							h = this.titleHeight;
						if (a) {
							var l = a.translateY;
							this.allItems.forEach(function (f) {
								var k = f.checkbox;
								if (k) {
									var q = l + h + k.y + (this.scrollOffset || 0) + 3;
									D(k, {
										left: a.translateX + f.checkboxOffset + k.x - 20 + "px",
										top: q + "px",
										display:
											this.proximate || (q > l - 6 && q < l + d - 6)
												? ""
												: "none",
									});
								}
							}, this);
						}
					};
					d.prototype.renderTitle = function () {
						var a = this.options,
							d = this.padding,
							h = a.title,
							l = 0;
						h.text &&
							(this.title ||
								((this.title = this.chart.renderer
									.label(
										h.text,
										d - 3,
										d - 4,
										null,
										null,
										null,
										a.useHTML,
										null,
										"legend-title"
									)
									.attr({ zIndex: 1 })),
								this.chart.styledMode || this.title.css(h.style),
								this.title.add(this.group)),
							h.width || this.title.css({ width: this.maxLegendWidth + "px" }),
							(a = this.title.getBBox()),
							(l = a.height),
							(this.offsetWidth = a.width),
							this.contentGroup.attr({ translateY: l }));
						this.titleHeight = l;
					};
					d.prototype.setText = function (a) {
						var d = this.options;
						a.legendItem.attr({
							text: d.labelFormat
								? E(d.labelFormat, a, this.chart)
								: d.labelFormatter.call(a),
						});
					};
					d.prototype.renderItem = function (a) {
						var d = this.chart,
							f = d.renderer,
							h = this.options,
							l = this.symbolWidth,
							k = h.symbolPadding,
							m = this.itemStyle,
							c = this.itemHiddenStyle,
							g = "horizontal" === h.layout ? z(h.itemDistance, 20) : 0,
							p = !h.rtl,
							e = a.legendItem,
							b = !a.series,
							n = !b && a.series.drawLegendSymbol ? a.series : a,
							I = n.options;
						I = this.createCheckboxForItem && I && I.showCheckbox;
						g = l + k + g + (I ? 20 : 0);
						var t = h.useHTML,
							A = a.options.className;
						e ||
							((a.legendGroup = f
								.g("legend-item")
								.addClass(
									"highcharts-" +
										n.type +
										"-series highcharts-color-" +
										a.colorIndex +
										(A ? " " + A : "") +
										(b ? " highcharts-series-" + a.index : "")
								)
								.attr({ zIndex: 1 })
								.add(this.scrollGroup)),
							(a.legendItem = e = f.text(
								"",
								p ? l + k : -k,
								this.baseline || 0,
								t
							)),
							d.styledMode || e.css(x(a.visible ? m : c)),
							e
								.attr({ align: p ? "left" : "right", zIndex: 2 })
								.add(a.legendGroup),
							this.baseline ||
								((this.fontMetrics = f.fontMetrics(
									d.styledMode ? 12 : m.fontSize,
									e
								)),
								(this.baseline = this.fontMetrics.f + 3 + this.itemMarginTop),
								e.attr("y", this.baseline)),
							(this.symbolHeight = h.symbolHeight || this.fontMetrics.f),
							n.drawLegendSymbol(this, a),
							this.setItemEvents && this.setItemEvents(a, e, t));
						I &&
							!a.checkbox &&
							this.createCheckboxForItem &&
							this.createCheckboxForItem(a);
						this.colorizeItem(a, a.visible);
						(!d.styledMode && m.width) ||
							e.css({
								width:
									(h.itemWidth || this.widthOption || d.spacingBox.width) -
									g +
									"px",
							});
						this.setText(a);
						d = e.getBBox();
						a.itemWidth = a.checkboxOffset =
							h.itemWidth || a.legendItemWidth || d.width + g;
						this.maxItemWidth = Math.max(this.maxItemWidth, a.itemWidth);
						this.totalItemWidth += a.itemWidth;
						this.itemHeight = a.itemHeight = Math.round(
							a.legendItemHeight || d.height || this.symbolHeight
						);
					};
					d.prototype.layoutItem = function (a) {
						var d = this.options,
							f = this.padding,
							h = "horizontal" === d.layout,
							l = a.itemHeight,
							k = this.itemMarginBottom,
							m = this.itemMarginTop,
							c = h ? z(d.itemDistance, 20) : 0,
							g = this.maxLegendWidth;
						d =
							d.alignColumns && this.totalItemWidth > g
								? this.maxItemWidth
								: a.itemWidth;
						h &&
							this.itemX - f + d > g &&
							((this.itemX = f),
							this.lastLineHeight &&
								(this.itemY += m + this.lastLineHeight + k),
							(this.lastLineHeight = 0));
						this.lastItemY = m + this.itemY + k;
						this.lastLineHeight = Math.max(l, this.lastLineHeight);
						a._legendItemPos = [this.itemX, this.itemY];
						h
							? (this.itemX += d)
							: ((this.itemY += m + l + k), (this.lastLineHeight = l));
						this.offsetWidth =
							this.widthOption ||
							Math.max(
								(h ? this.itemX - f - (a.checkbox ? 0 : c) : d) + f,
								this.offsetWidth
							);
					};
					d.prototype.getAllItems = function () {
						var a = [];
						this.chart.series.forEach(function (d) {
							var f = d && d.options;
							d &&
								z(f.showInLegend, L(f.linkedTo) ? !1 : void 0, !0) &&
								(a = a.concat(
									d.legendItems || ("point" === f.legendType ? d.data : d)
								));
						});
						B(this, "afterGetAllItems", { allItems: a });
						return a;
					};
					d.prototype.getAlignment = function () {
						var a = this.options;
						return this.proximate
							? a.align.charAt(0) + "tv"
							: a.floating
							? ""
							: a.align.charAt(0) +
							  a.verticalAlign.charAt(0) +
							  a.layout.charAt(0);
					};
					d.prototype.adjustMargins = function (d, h) {
						var f = this.chart,
							l = this.options,
							k = this.getAlignment();
						k &&
							[
								/(lth|ct|rth)/,
								/(rtv|rm|rbv)/,
								/(rbh|cb|lbh)/,
								/(lbv|lm|ltv)/,
							].forEach(function (q, u) {
								q.test(k) &&
									!L(d[u]) &&
									(f[a[u]] = Math.max(
										f[a[u]],
										f.legend[(u + 1) % 2 ? "legendHeight" : "legendWidth"] +
											[1, -1, -1, 1][u] * l[u % 2 ? "x" : "y"] +
											z(l.margin, 12) +
											h[u] +
											(f.titleOffset[u] || 0)
									));
							});
					};
					d.prototype.proximatePositions = function () {
						var a = this.chart,
							d = [],
							h = "left" === this.options.align;
						this.allItems.forEach(function (f) {
							var l = h;
							if (f.yAxis && f.points) {
								f.xAxis.options.reversed && (l = !l);
								var k = J(l ? f.points : f.points.slice(0).reverse(), function (
									a
								) {
									return t(a.plotY);
								});
								l =
									this.itemMarginTop +
									f.legendItem.getBBox().height +
									this.itemMarginBottom;
								var u = f.yAxis.top - a.plotTop;
								f.visible
									? ((k = k ? k.plotY : f.yAxis.height), (k += u - 0.3 * l))
									: (k = u + f.yAxis.height);
								d.push({ target: k, size: l, item: f });
							}
						}, this);
						c.distribute(d, a.plotHeight);
						d.forEach(function (d) {
							d.item._legendItemPos[1] = a.plotTop - a.spacing[0] + d.pos;
						});
					};
					d.prototype.render = function () {
						var a = this.chart,
							d = a.renderer,
							h = this.group,
							l = this.box,
							k = this.options,
							c = this.padding;
						this.itemX = c;
						this.itemY = this.initialItemY;
						this.lastItemY = this.offsetWidth = 0;
						this.widthOption = m(k.width, a.spacingBox.width - c);
						var g = a.spacingBox.width - 2 * c - k.x;
						-1 < ["rm", "lm"].indexOf(this.getAlignment().substring(0, 2)) &&
							(g /= 2);
						this.maxLegendWidth = this.widthOption || g;
						h ||
							((this.group = h = d.g("legend").attr({ zIndex: 7 }).add()),
							(this.contentGroup = d.g().attr({ zIndex: 1 }).add(h)),
							(this.scrollGroup = d.g().add(this.contentGroup)));
						this.renderTitle();
						var t = this.getAllItems();
						p(t, function (a, e) {
							return (
								((a.options && a.options.legendIndex) || 0) -
								((e.options && e.options.legendIndex) || 0)
							);
						});
						k.reversed && t.reverse();
						this.allItems = t;
						this.display = g = !!t.length;
						this.itemHeight = this.totalItemWidth = this.maxItemWidth = this.lastLineHeight = 0;
						t.forEach(this.renderItem, this);
						t.forEach(this.layoutItem, this);
						t = (this.widthOption || this.offsetWidth) + c;
						var z = this.lastItemY + this.lastLineHeight + this.titleHeight;
						z = this.handleOverflow(z);
						z += c;
						l ||
							((this.box = l = d
								.rect()
								.addClass("highcharts-legend-box")
								.attr({ r: k.borderRadius })
								.add(h)),
							(l.isNew = !0));
						a.styledMode ||
							l
								.attr({
									stroke: k.borderColor,
									"stroke-width": k.borderWidth || 0,
									fill: k.backgroundColor || "none",
								})
								.shadow(k.shadow);
						0 < t &&
							0 < z &&
							(l[l.isNew ? "attr" : "animate"](
								l.crisp.call(
									{},
									{ x: 0, y: 0, width: t, height: z },
									l.strokeWidth()
								)
							),
							(l.isNew = !1));
						l[g ? "show" : "hide"]();
						a.styledMode && "none" === h.getStyle("display") && (t = z = 0);
						this.legendWidth = t;
						this.legendHeight = z;
						g && this.align();
						this.proximate || this.positionItems();
						B(this, "afterRender");
					};
					d.prototype.align = function (a) {
						void 0 === a && (a = this.chart.spacingBox);
						var d = this.chart,
							f = this.options,
							h = a.y;
						/(lth|ct|rth)/.test(this.getAlignment()) && 0 < d.titleOffset[0]
							? (h += d.titleOffset[0])
							: /(lbh|cb|rbh)/.test(this.getAlignment()) &&
							  0 < d.titleOffset[2] &&
							  (h -= d.titleOffset[2]);
						h !== a.y && (a = x(a, { y: h }));
						this.group.align(
							x(f, {
								width: this.legendWidth,
								height: this.legendHeight,
								verticalAlign: this.proximate ? "top" : f.verticalAlign,
							}),
							!0,
							a
						);
					};
					d.prototype.handleOverflow = function (a) {
						var d = this,
							f = this.chart,
							h = f.renderer,
							l = this.options,
							k = l.y,
							m = this.padding;
						k = f.spacingBox.height + ("top" === l.verticalAlign ? -k : k) - m;
						var c = l.maxHeight,
							g,
							p = this.clipRect,
							e = l.navigation,
							b = z(e.animation, !0),
							n = e.arrowSize || 12,
							I = this.nav,
							t = this.pages,
							x,
							A = this.allItems,
							r = function (a) {
								"number" === typeof a
									? p.attr({ height: a })
									: p && ((d.clipRect = p.destroy()), d.contentGroup.clip());
								d.contentGroup.div &&
									(d.contentGroup.div.style.clip = a
										? "rect(" + m + "px,9999px," + (m + a) + "px,0)"
										: "auto");
							},
							B = function (a) {
								d[a] = h
									.circle(0, 0, 1.3 * n)
									.translate(n / 2, n / 2)
									.add(I);
								f.styledMode || d[a].attr("fill", "rgba(0,0,0,0.0001)");
								return d[a];
							};
						"horizontal" !== l.layout ||
							"middle" === l.verticalAlign ||
							l.floating ||
							(k /= 2);
						c && (k = Math.min(k, c));
						t.length = 0;
						a > k && !1 !== e.enabled
							? ((this.clipHeight = g = Math.max(
									k - 20 - this.titleHeight - m,
									0
							  )),
							  (this.currentPage = z(this.currentPage, 1)),
							  (this.fullHeight = a),
							  A.forEach(function (a, b) {
									var e = a._legendItemPos[1],
										d = Math.round(a.legendItem.getBBox().height),
										f = t.length;
									if (!f || (e - t[f - 1] > g && (x || e) !== t[f - 1]))
										t.push(x || e), f++;
									a.pageIx = f - 1;
									x && (A[b - 1].pageIx = f - 1);
									b === A.length - 1 &&
										e + d - t[f - 1] > g &&
										e !== x &&
										(t.push(e), (a.pageIx = f));
									e !== x && (x = e);
							  }),
							  p ||
									((p = d.clipRect = h.clipRect(0, m, 9999, 0)),
									d.contentGroup.clip(p)),
							  r(g),
							  I ||
									((this.nav = I = h.g().attr({ zIndex: 1 }).add(this.group)),
									(this.up = h.symbol("triangle", 0, 0, n, n).add(I)),
									B("upTracker").on("click", function () {
										d.scroll(-1, b);
									}),
									(this.pager = h
										.text("", 15, 10)
										.addClass("highcharts-legend-navigation")),
									f.styledMode || this.pager.css(e.style),
									this.pager.add(I),
									(this.down = h.symbol("triangle-down", 0, 0, n, n).add(I)),
									B("downTracker").on("click", function () {
										d.scroll(1, b);
									})),
							  d.scroll(0),
							  (a = k))
							: I &&
							  (r(),
							  (this.nav = I.destroy()),
							  this.scrollGroup.attr({ translateY: 1 }),
							  (this.clipHeight = 0));
						return a;
					};
					d.prototype.scroll = function (a, d) {
						var f = this,
							h = this.chart,
							l = this.pages,
							k = l.length,
							m = this.currentPage + a;
						a = this.clipHeight;
						var q = this.options.navigation,
							c = this.pager,
							g = this.padding;
						m > k && (m = k);
						0 < m &&
							("undefined" !== typeof d && A(d, h),
							this.nav.attr({
								translateX: g,
								translateY: a + this.padding + 7 + this.titleHeight,
								visibility: "visible",
							}),
							[this.up, this.upTracker].forEach(function (a) {
								a.attr({
									class:
										1 === m
											? "highcharts-legend-nav-inactive"
											: "highcharts-legend-nav-active",
								});
							}),
							c.attr({ text: m + "/" + k }),
							[this.down, this.downTracker].forEach(function (a) {
								a.attr({
									x: 18 + this.pager.getBBox().width,
									class:
										m === k
											? "highcharts-legend-nav-inactive"
											: "highcharts-legend-nav-active",
								});
							}, this),
							h.styledMode ||
								(this.up.attr({
									fill: 1 === m ? q.inactiveColor : q.activeColor,
								}),
								this.upTracker.css({ cursor: 1 === m ? "default" : "pointer" }),
								this.down.attr({
									fill: m === k ? q.inactiveColor : q.activeColor,
								}),
								this.downTracker.css({
									cursor: m === k ? "default" : "pointer",
								})),
							(this.scrollOffset = -l[m - 1] + this.initialItemY),
							this.scrollGroup.animate({ translateY: this.scrollOffset }),
							(this.currentPage = m),
							this.positionCheckboxes(),
							(d = r(z(d, h.renderer.globalAnimation, !0))),
							M(function () {
								B(f, "afterScroll", { currentPage: m });
							}, d.duration || 0));
					};
					return d;
				})();
			(/Trident\/7\.0/.test(d.navigator && d.navigator.userAgent) || k) &&
				g(l.prototype, "positionItem", function (a, d) {
					var f = this,
						h = function () {
							d._legendItemPos && a.call(f, d);
						};
					h();
					f.bubbleLegend || setTimeout(h);
				});
			c.Legend = l;
			return c.Legend;
		}
	);
	N(
		v,
		"parts/Chart.js",
		[
			v["parts/Globals.js"],
			v["parts/Legend.js"],
			v["parts/MSPointer.js"],
			v["parts/Pointer.js"],
			v["parts/Time.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, G, r, D, L) {
			var K = L.addEvent,
				J = L.animate,
				B = L.animObject,
				E = L.attr,
				t = L.createElement,
				x = L.css,
				z = L.defined,
				m = L.discardElement,
				A = L.erase,
				p = L.error,
				M = L.extend,
				k = L.find,
				a = L.fireEvent,
				d = L.getStyle,
				l = L.isArray,
				h = L.isFunction,
				f = L.isNumber,
				q = L.isObject,
				u = L.isString,
				F = L.merge,
				w = L.numberFormat,
				H = L.objectEach,
				y = L.pick,
				Q = L.pInt,
				P = L.relativeLength,
				C = L.removeEvent,
				e = L.setAnimation,
				b = L.splat,
				n = L.syncTimeout,
				I = L.uniqueKey,
				O = c.doc,
				T = c.Axis,
				Z = c.defaultOptions,
				v = c.charts,
				W = c.marginNames,
				U = c.seriesTypes,
				S = c.win,
				X = (c.Chart = function () {
					this.getArgs.apply(this, arguments);
				});
			c.chart = function (a, b, e) {
				return new X(a, b, e);
			};
			M(X.prototype, {
				callbacks: [],
				getArgs: function () {
					var a = [].slice.call(arguments);
					if (u(a[0]) || a[0].nodeName) this.renderTo = a.shift();
					this.init(a[0], a[1]);
				},
				init: function (b, e) {
					var d,
						f = b.series,
						l = b.plotOptions || {};
					a(this, "init", { args: arguments }, function () {
						b.series = null;
						d = F(Z, b);
						var n = d.chart || {};
						H(d.plotOptions, function (a, b) {
							q(a) && (a.tooltip = (l[b] && F(l[b].tooltip)) || void 0);
						});
						d.tooltip.userOptions =
							(b.chart && b.chart.forExport && b.tooltip.userOptions) ||
							b.tooltip;
						d.series = b.series = f;
						this.userOptions = b;
						var k = n.events;
						this.margin = [];
						this.spacing = [];
						this.bounds = { h: {}, v: {} };
						this.labelCollectors = [];
						this.callback = e;
						this.isResizing = 0;
						this.options = d;
						this.axes = [];
						this.series = [];
						this.time =
							b.time && Object.keys(b.time).length ? new D(b.time) : c.time;
						this.numberFormatter = n.numberFormatter || w;
						this.styledMode = n.styledMode;
						this.hasCartesianSeries = n.showAxes;
						var m = this;
						m.index = v.length;
						v.push(m);
						c.chartCount++;
						k &&
							H(k, function (a, b) {
								h(a) && K(m, b, a);
							});
						m.xAxis = [];
						m.yAxis = [];
						m.pointCount = m.colorCounter = m.symbolCounter = 0;
						a(m, "afterInit");
						m.firstRender();
					});
				},
				initSeries: function (a) {
					var b = this.options.chart;
					b = a.type || b.type || b.defaultSeriesType;
					var e = U[b];
					e || p(17, !0, this, { missingModuleFor: b });
					b = new e();
					b.init(this, a);
					return b;
				},
				setSeriesData: function () {
					this.getSeriesOrderByLinks().forEach(function (a) {
						a.points ||
							a.data ||
							!a.enabledDataSorting ||
							a.setData(a.options.data, !1);
					});
				},
				getSeriesOrderByLinks: function () {
					return this.series.concat().sort(function (a, b) {
						return a.linkedSeries.length || b.linkedSeries.length
							? b.linkedSeries.length - a.linkedSeries.length
							: 0;
					});
				},
				orderSeries: function (a) {
					var b = this.series;
					for (a = a || 0; a < b.length; a++)
						b[a] && ((b[a].index = a), (b[a].name = b[a].getName()));
				},
				isInsidePlot: function (b, e, d) {
					var f = d ? e : b;
					b = d ? b : e;
					f = {
						x: f,
						y: b,
						isInsidePlot:
							0 <= f && f <= this.plotWidth && 0 <= b && b <= this.plotHeight,
					};
					a(this, "afterIsInsidePlot", f);
					return f.isInsidePlot;
				},
				redraw: function (b) {
					a(this, "beforeRedraw");
					var d = this.axes,
						f = this.series,
						h = this.pointer,
						l = this.legend,
						n = this.userOptions.legend,
						k = this.isDirtyLegend,
						m = this.hasCartesianSeries,
						u = this.isDirtyBox,
						q = this.renderer,
						c = q.isHidden(),
						w = [];
					this.setResponsive && this.setResponsive(!1);
					e(this.hasRendered ? b : !1, this);
					c && this.temporaryDisplay();
					this.layOutTitles();
					for (b = f.length; b--; ) {
						var g = f[b];
						if (g.options.stacking) {
							var p = !0;
							if (g.isDirty) {
								var y = !0;
								break;
							}
						}
					}
					if (y)
						for (b = f.length; b--; )
							(g = f[b]), g.options.stacking && (g.isDirty = !0);
					f.forEach(function (b) {
						b.isDirty &&
							("point" === b.options.legendType
								? (b.updateTotals && b.updateTotals(), (k = !0))
								: n && (n.labelFormatter || n.labelFormat) && (k = !0));
						b.isDirtyData && a(b, "updatedData");
					});
					k &&
						l &&
						l.options.enabled &&
						(l.render(), (this.isDirtyLegend = !1));
					p && this.getStacks();
					m &&
						d.forEach(function (a) {
							a.updateNames();
							a.setScale();
						});
					this.getMargins();
					m &&
						(d.forEach(function (a) {
							a.isDirty && (u = !0);
						}),
						d.forEach(function (b) {
							var e = b.min + "," + b.max;
							b.extKey !== e &&
								((b.extKey = e),
								w.push(function () {
									a(b, "afterSetExtremes", M(b.eventArgs, b.getExtremes()));
									delete b.eventArgs;
								}));
							(u || p) && b.redraw();
						}));
					u && this.drawChartBox();
					a(this, "predraw");
					f.forEach(function (a) {
						(u || a.isDirty) && a.visible && a.redraw();
						a.isDirtyData = !1;
					});
					h && h.reset(!0);
					q.draw();
					a(this, "redraw");
					a(this, "render");
					c && this.temporaryDisplay(!0);
					w.forEach(function (a) {
						a.call();
					});
				},
				get: function (a) {
					function b(b) {
						return b.id === a || (b.options && b.options.id === a);
					}
					var e = this.series,
						d;
					var f = k(this.axes, b) || k(this.series, b);
					for (d = 0; !f && d < e.length; d++) f = k(e[d].points || [], b);
					return f;
				},
				getAxes: function () {
					var e = this,
						d = this.options,
						f = (d.xAxis = b(d.xAxis || {}));
					d = d.yAxis = b(d.yAxis || {});
					a(this, "getAxes");
					f.forEach(function (a, b) {
						a.index = b;
						a.isX = !0;
					});
					d.forEach(function (a, b) {
						a.index = b;
					});
					f.concat(d).forEach(function (a) {
						new T(e, a);
					});
					a(this, "afterGetAxes");
				},
				getSelectedPoints: function () {
					var a = [];
					this.series.forEach(function (b) {
						a = a.concat(
							b.getPointsCollection().filter(function (a) {
								return y(a.selectedStaging, a.selected);
							})
						);
					});
					return a;
				},
				getSelectedSeries: function () {
					return this.series.filter(function (a) {
						return a.selected;
					});
				},
				setTitle: function (a, b, e) {
					this.applyDescription("title", a);
					this.applyDescription("subtitle", b);
					this.applyDescription("caption", void 0);
					this.layOutTitles(e);
				},
				applyDescription: function (a, b) {
					var e = this,
						d =
							"title" === a
								? {
										color: "#333333",
										fontSize: this.options.isStock ? "16px" : "18px",
								  }
								: { color: "#666666" };
					d = this.options[a] = F(
						!this.styledMode && { style: d },
						this.options[a],
						b
					);
					var f = this[a];
					f && b && (this[a] = f = f.destroy());
					d &&
						!f &&
						((f = this.renderer
							.text(d.text, 0, 0, d.useHTML)
							.attr({
								align: d.align,
								class: "highcharts-" + a,
								zIndex: d.zIndex || 4,
							})
							.add()),
						(f.update = function (b) {
							e[
								{
									title: "setTitle",
									subtitle: "setSubtitle",
									caption: "setCaption",
								}[a]
							](b);
						}),
						this.styledMode || f.css(d.style),
						(this[a] = f));
				},
				layOutTitles: function (b) {
					var e = [0, 0, 0],
						d = this.renderer,
						f = this.spacingBox;
					["title", "subtitle", "caption"].forEach(function (a) {
						var b = this[a],
							h = this.options[a],
							l = h.verticalAlign || "top";
						a = "title" === a ? -3 : "top" === l ? e[0] + 2 : 0;
						if (b) {
							if (!this.styledMode) var n = h.style.fontSize;
							n = d.fontMetrics(n, b).b;
							b.css({
								width: (h.width || f.width + (h.widthAdjust || 0)) + "px",
							});
							var k = Math.round(b.getBBox(h.useHTML).height);
							b.align(
								M({ y: "bottom" === l ? n : a + n, height: k }, h),
								!1,
								"spacingBox"
							);
							h.floating ||
								("top" === l
									? (e[0] = Math.ceil(e[0] + k))
									: "bottom" === l && (e[2] = Math.ceil(e[2] + k)));
						}
					}, this);
					e[0] &&
						"top" === (this.options.title.verticalAlign || "top") &&
						(e[0] += this.options.title.margin);
					e[2] &&
						"bottom" === this.options.caption.verticalAlign &&
						(e[2] += this.options.caption.margin);
					var h =
						!this.titleOffset || this.titleOffset.join(",") !== e.join(",");
					this.titleOffset = e;
					a(this, "afterLayOutTitles");
					!this.isDirtyBox &&
						h &&
						((this.isDirtyBox = this.isDirtyLegend = h),
						this.hasRendered && y(b, !0) && this.isDirtyBox && this.redraw());
				},
				getChartSize: function () {
					var a = this.options.chart,
						b = a.width;
					a = a.height;
					var e = this.renderTo;
					z(b) || (this.containerWidth = d(e, "width"));
					z(a) || (this.containerHeight = d(e, "height"));
					this.chartWidth = Math.max(0, b || this.containerWidth || 600);
					this.chartHeight = Math.max(
						0,
						P(a, this.chartWidth) ||
							(1 < this.containerHeight ? this.containerHeight : 400)
					);
				},
				temporaryDisplay: function (a) {
					var b = this.renderTo;
					if (a)
						for (; b && b.style; )
							b.hcOrigStyle && (x(b, b.hcOrigStyle), delete b.hcOrigStyle),
								b.hcOrigDetached &&
									(O.body.removeChild(b), (b.hcOrigDetached = !1)),
								(b = b.parentNode);
					else
						for (; b && b.style; ) {
							O.body.contains(b) ||
								b.parentNode ||
								((b.hcOrigDetached = !0), O.body.appendChild(b));
							if ("none" === d(b, "display", !1) || b.hcOricDetached)
								(b.hcOrigStyle = {
									display: b.style.display,
									height: b.style.height,
									overflow: b.style.overflow,
								}),
									(a = { display: "block", overflow: "hidden" }),
									b !== this.renderTo && (a.height = 0),
									x(b, a),
									b.offsetWidth ||
										b.style.setProperty("display", "block", "important");
							b = b.parentNode;
							if (b === O.body) break;
						}
				},
				setClassName: function (a) {
					this.container.className = "highcharts-container " + (a || "");
				},
				getContainer: function () {
					var b = this.options,
						d = b.chart;
					var h = this.renderTo;
					var l = I(),
						n,
						k;
					h || (this.renderTo = h = d.renderTo);
					u(h) && (this.renderTo = h = O.getElementById(h));
					h || p(13, !0, this);
					var m = Q(E(h, "data-highcharts-chart"));
					f(m) && v[m] && v[m].hasRendered && v[m].destroy();
					E(h, "data-highcharts-chart", this.index);
					h.innerHTML = "";
					d.skipClone || h.offsetWidth || this.temporaryDisplay();
					this.getChartSize();
					m = this.chartWidth;
					var q = this.chartHeight;
					x(h, { overflow: "hidden" });
					this.styledMode ||
						(n = M(
							{
								position: "relative",
								overflow: "hidden",
								width: m + "px",
								height: q + "px",
								textAlign: "left",
								lineHeight: "normal",
								zIndex: 0,
								"-webkit-tap-highlight-color": "rgba(0,0,0,0)",
							},
							d.style
						));
					this.container = h = t("div", { id: l }, n, h);
					this._cursor = h.style.cursor;
					this.renderer = new (c[d.renderer] || c.Renderer)(
						h,
						m,
						q,
						null,
						d.forExport,
						b.exporting && b.exporting.allowHTML,
						this.styledMode
					);
					e(void 0, this);
					this.setClassName(d.className);
					if (this.styledMode)
						for (k in b.defs) this.renderer.definition(b.defs[k]);
					else this.renderer.setStyle(d.style);
					this.renderer.chartIndex = this.index;
					a(this, "afterGetContainer");
				},
				getMargins: function (b) {
					var e = this.spacing,
						d = this.margin,
						f = this.titleOffset;
					this.resetMargins();
					f[0] &&
						!z(d[0]) &&
						(this.plotTop = Math.max(this.plotTop, f[0] + e[0]));
					f[2] &&
						!z(d[2]) &&
						(this.marginBottom = Math.max(this.marginBottom, f[2] + e[2]));
					this.legend && this.legend.display && this.legend.adjustMargins(d, e);
					a(this, "getMargins");
					b || this.getAxisMargins();
				},
				getAxisMargins: function () {
					var b = this,
						a = (b.axisOffset = [0, 0, 0, 0]),
						e = b.colorAxis,
						d = b.margin,
						f = function (b) {
							b.forEach(function (b) {
								b.visible && b.getOffset();
							});
						};
					b.hasCartesianSeries ? f(b.axes) : e && e.length && f(e);
					W.forEach(function (e, f) {
						z(d[f]) || (b[e] += a[f]);
					});
					b.setChartSize();
				},
				reflow: function (b) {
					var a = this,
						e = a.options.chart,
						f = a.renderTo,
						h = z(e.width) && z(e.height),
						l = e.width || d(f, "width");
					e = e.height || d(f, "height");
					f = b ? b.target : S;
					if (!h && !a.isPrinting && l && e && (f === S || f === O)) {
						if (l !== a.containerWidth || e !== a.containerHeight)
							L.clearTimeout(a.reflowTimeout),
								(a.reflowTimeout = n(
									function () {
										a.container && a.setSize(void 0, void 0, !1);
									},
									b ? 100 : 0
								));
						a.containerWidth = l;
						a.containerHeight = e;
					}
				},
				setReflow: function (b) {
					var a = this;
					!1 === b || this.unbindReflow
						? !1 === b &&
						  this.unbindReflow &&
						  (this.unbindReflow = this.unbindReflow())
						: ((this.unbindReflow = K(S, "resize", function (b) {
								a.options && a.reflow(b);
						  })),
						  K(this, "destroy", this.unbindReflow));
				},
				setSize: function (b, d, f) {
					var h = this,
						l = h.renderer;
					h.isResizing += 1;
					e(f, h);
					f = l.globalAnimation;
					h.oldChartHeight = h.chartHeight;
					h.oldChartWidth = h.chartWidth;
					"undefined" !== typeof b && (h.options.chart.width = b);
					"undefined" !== typeof d && (h.options.chart.height = d);
					h.getChartSize();
					h.styledMode ||
						(f ? J : x)(
							h.container,
							{ width: h.chartWidth + "px", height: h.chartHeight + "px" },
							f
						);
					h.setChartSize(!0);
					l.setSize(h.chartWidth, h.chartHeight, f);
					h.axes.forEach(function (b) {
						b.isDirty = !0;
						b.setScale();
					});
					h.isDirtyLegend = !0;
					h.isDirtyBox = !0;
					h.layOutTitles();
					h.getMargins();
					h.redraw(f);
					h.oldChartHeight = null;
					a(h, "resize");
					n(function () {
						h &&
							a(h, "endResize", null, function () {
								--h.isResizing;
							});
					}, B(f).duration || 0);
				},
				setChartSize: function (b) {
					var e = this.inverted,
						d = this.renderer,
						f = this.chartWidth,
						h = this.chartHeight,
						l = this.options.chart,
						n = this.spacing,
						k = this.clipOffset,
						m,
						u,
						q,
						c;
					this.plotLeft = m = Math.round(this.plotLeft);
					this.plotTop = u = Math.round(this.plotTop);
					this.plotWidth = q = Math.max(
						0,
						Math.round(f - m - this.marginRight)
					);
					this.plotHeight = c = Math.max(
						0,
						Math.round(h - u - this.marginBottom)
					);
					this.plotSizeX = e ? c : q;
					this.plotSizeY = e ? q : c;
					this.plotBorderWidth = l.plotBorderWidth || 0;
					this.spacingBox = d.spacingBox = {
						x: n[3],
						y: n[0],
						width: f - n[3] - n[1],
						height: h - n[0] - n[2],
					};
					this.plotBox = d.plotBox = { x: m, y: u, width: q, height: c };
					f = 2 * Math.floor(this.plotBorderWidth / 2);
					e = Math.ceil(Math.max(f, k[3]) / 2);
					d = Math.ceil(Math.max(f, k[0]) / 2);
					this.clipBox = {
						x: e,
						y: d,
						width: Math.floor(this.plotSizeX - Math.max(f, k[1]) / 2 - e),
						height: Math.max(
							0,
							Math.floor(this.plotSizeY - Math.max(f, k[2]) / 2 - d)
						),
					};
					b ||
						this.axes.forEach(function (b) {
							b.setAxisSize();
							b.setAxisTranslation();
						});
					a(this, "afterSetChartSize", { skipAxes: b });
				},
				resetMargins: function () {
					a(this, "resetMargins");
					var b = this,
						e = b.options.chart;
					["margin", "spacing"].forEach(function (a) {
						var d = e[a],
							f = q(d) ? d : [d, d, d, d];
						["Top", "Right", "Bottom", "Left"].forEach(function (d, h) {
							b[a][h] = y(e[a + d], f[h]);
						});
					});
					W.forEach(function (a, e) {
						b[a] = y(b.margin[e], b.spacing[e]);
					});
					b.axisOffset = [0, 0, 0, 0];
					b.clipOffset = [0, 0, 0, 0];
				},
				drawChartBox: function () {
					var b = this.options.chart,
						e = this.renderer,
						d = this.chartWidth,
						f = this.chartHeight,
						h = this.chartBackground,
						l = this.plotBackground,
						n = this.plotBorder,
						k = this.styledMode,
						m = this.plotBGImage,
						u = b.backgroundColor,
						q = b.plotBackgroundColor,
						c = b.plotBackgroundImage,
						w,
						g = this.plotLeft,
						p = this.plotTop,
						y = this.plotWidth,
						I = this.plotHeight,
						t = this.plotBox,
						F = this.clipRect,
						z = this.clipBox,
						H = "animate";
					h ||
						((this.chartBackground = h = e
							.rect()
							.addClass("highcharts-background")
							.add()),
						(H = "attr"));
					if (k) var x = (w = h.strokeWidth());
					else {
						x = b.borderWidth || 0;
						w = x + (b.shadow ? 8 : 0);
						u = { fill: u || "none" };
						if (x || h["stroke-width"])
							(u.stroke = b.borderColor), (u["stroke-width"] = x);
						h.attr(u).shadow(b.shadow);
					}
					h[H]({
						x: w / 2,
						y: w / 2,
						width: d - w - (x % 2),
						height: f - w - (x % 2),
						r: b.borderRadius,
					});
					H = "animate";
					l ||
						((H = "attr"),
						(this.plotBackground = l = e
							.rect()
							.addClass("highcharts-plot-background")
							.add()));
					l[H](t);
					k ||
						(l.attr({ fill: q || "none" }).shadow(b.plotShadow),
						c &&
							(m
								? (c !== m.attr("href") && m.attr("href", c), m.animate(t))
								: (this.plotBGImage = e.image(c, g, p, y, I).add())));
					F
						? F.animate({ width: z.width, height: z.height })
						: (this.clipRect = e.clipRect(z));
					H = "animate";
					n ||
						((H = "attr"),
						(this.plotBorder = n = e
							.rect()
							.addClass("highcharts-plot-border")
							.attr({ zIndex: 1 })
							.add()));
					k ||
						n.attr({
							stroke: b.plotBorderColor,
							"stroke-width": b.plotBorderWidth || 0,
							fill: "none",
						});
					n[H](n.crisp({ x: g, y: p, width: y, height: I }, -n.strokeWidth()));
					this.isDirtyBox = !1;
					a(this, "afterDrawChartBox");
				},
				propFromSeries: function () {
					var b = this,
						a = b.options.chart,
						e,
						d = b.options.series,
						f,
						h;
					["inverted", "angular", "polar"].forEach(function (l) {
						e = U[a.type || a.defaultSeriesType];
						h = a[l] || (e && e.prototype[l]);
						for (f = d && d.length; !h && f--; )
							(e = U[d[f].type]) && e.prototype[l] && (h = !0);
						b[l] = h;
					});
				},
				linkSeries: function () {
					var b = this,
						e = b.series;
					e.forEach(function (b) {
						b.linkedSeries.length = 0;
					});
					e.forEach(function (a) {
						var e = a.options.linkedTo;
						u(e) &&
							(e = ":previous" === e ? b.series[a.index - 1] : b.get(e)) &&
							e.linkedParent !== a &&
							(e.linkedSeries.push(a),
							(a.linkedParent = e),
							e.enabledDataSorting && a.setDataSortingOptions(),
							(a.visible = y(a.options.visible, e.options.visible, a.visible)));
					});
					a(this, "afterLinkSeries");
				},
				renderSeries: function () {
					this.series.forEach(function (b) {
						b.translate();
						b.render();
					});
				},
				renderLabels: function () {
					var b = this,
						a = b.options.labels;
					a.items &&
						a.items.forEach(function (e) {
							var d = M(a.style, e.style),
								f = Q(d.left) + b.plotLeft,
								h = Q(d.top) + b.plotTop + 12;
							delete d.left;
							delete d.top;
							b.renderer.text(e.html, f, h).attr({ zIndex: 2 }).css(d).add();
						});
				},
				render: function () {
					var b = this.axes,
						a = this.colorAxis,
						e = this.renderer,
						d = this.options,
						f = 0,
						h = function (b) {
							b.forEach(function (b) {
								b.visible && b.render();
							});
						};
					this.setTitle();
					this.legend = new g(this, d.legend);
					this.getStacks && this.getStacks();
					this.getMargins(!0);
					this.setChartSize();
					d = this.plotWidth;
					b.some(function (b) {
						if (
							b.horiz &&
							b.visible &&
							b.options.labels.enabled &&
							b.series.length
						)
							return (f = 21), !0;
					});
					var l = (this.plotHeight = Math.max(this.plotHeight - f, 0));
					b.forEach(function (b) {
						b.setScale();
					});
					this.getAxisMargins();
					var n = 1.1 < d / this.plotWidth;
					var k = 1.05 < l / this.plotHeight;
					if (n || k)
						b.forEach(function (b) {
							((b.horiz && n) || (!b.horiz && k)) && b.setTickInterval(!0);
						}),
							this.getMargins();
					this.drawChartBox();
					this.hasCartesianSeries ? h(b) : a && a.length && h(a);
					this.seriesGroup ||
						(this.seriesGroup = e.g("series-group").attr({ zIndex: 3 }).add());
					this.renderSeries();
					this.renderLabels();
					this.addCredits();
					this.setResponsive && this.setResponsive();
					this.updateContainerScaling();
					this.hasRendered = !0;
				},
				addCredits: function (b) {
					var a = this;
					b = F(!0, this.options.credits, b);
					b.enabled &&
						!this.credits &&
						((this.credits = this.renderer
							.text(b.text + (this.mapCredits || ""), 0, 0)
							.addClass("highcharts-credits")
							.on("click", function () {
								b.href && (S.location.href = b.href);
							})
							.attr({ align: b.position.align, zIndex: 8 })),
						a.styledMode || this.credits.css(b.style),
						this.credits.add().align(b.position),
						(this.credits.update = function (b) {
							a.credits = a.credits.destroy();
							a.addCredits(b);
						}));
				},
				updateContainerScaling: function () {
					var b = this.container;
					if (b.offsetWidth && b.offsetHeight && b.getBoundingClientRect) {
						var a = b.getBoundingClientRect(),
							e = a.width / b.offsetWidth;
						b = a.height / b.offsetHeight;
						1 !== e || 1 !== b
							? (this.containerScaling = { scaleX: e, scaleY: b })
							: delete this.containerScaling;
					}
				},
				destroy: function () {
					var b = this,
						e = b.axes,
						d = b.series,
						f = b.container,
						h,
						l = f && f.parentNode;
					a(b, "destroy");
					b.renderer.forExport ? A(v, b) : (v[b.index] = void 0);
					c.chartCount--;
					b.renderTo.removeAttribute("data-highcharts-chart");
					C(b);
					for (h = e.length; h--; ) e[h] = e[h].destroy();
					this.scroller && this.scroller.destroy && this.scroller.destroy();
					for (h = d.length; h--; ) d[h] = d[h].destroy();
					"title subtitle chartBackground plotBackground plotBGImage plotBorder seriesGroup clipRect credits pointer rangeSelector legend resetZoomButton tooltip renderer"
						.split(" ")
						.forEach(function (a) {
							var e = b[a];
							e && e.destroy && (b[a] = e.destroy());
						});
					f && ((f.innerHTML = ""), C(f), l && m(f));
					H(b, function (a, e) {
						delete b[e];
					});
				},
				firstRender: function () {
					var b = this,
						e = b.options;
					if (!b.isReadyToRender || b.isReadyToRender()) {
						b.getContainer();
						b.resetMargins();
						b.setChartSize();
						b.propFromSeries();
						b.getAxes();
						(l(e.series) ? e.series : []).forEach(function (a) {
							b.initSeries(a);
						});
						b.linkSeries();
						b.setSeriesData();
						a(b, "beforeRender");
						r &&
							(b.pointer =
								c.hasTouch || (!S.PointerEvent && !S.MSPointerEvent)
									? new r(b, e)
									: new G(b, e));
						b.render();
						if (!b.renderer.imgCount && !b.hasLoaded) b.onload();
						b.temporaryDisplay(!0);
					}
				},
				onload: function () {
					this.callbacks.concat([this.callback]).forEach(function (b) {
						b && "undefined" !== typeof this.index && b.apply(this, [this]);
					}, this);
					a(this, "load");
					a(this, "render");
					z(this.index) && this.setReflow(this.options.chart.reflow);
					this.hasLoaded = !0;
				},
			});
		}
	);
	N(
		v,
		"parts/ScrollablePlotArea.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var G = g.addEvent,
				r = g.createElement,
				D = g.pick,
				L = g.stop;
			g = c.Chart;
			("");
			G(g, "afterSetChartSize", function (g) {
				var r = this.options.chart.scrollablePlotArea,
					B = r && r.minWidth;
				r = r && r.minHeight;
				if (!this.renderer.forExport) {
					if (B) {
						if (
							(this.scrollablePixelsX = B = Math.max(0, B - this.chartWidth))
						) {
							this.plotWidth += B;
							this.inverted
								? ((this.clipBox.height += B), (this.plotBox.height += B))
								: ((this.clipBox.width += B), (this.plotBox.width += B));
							var E = { 1: { name: "right", value: B } };
						}
					} else
						r &&
							(this.scrollablePixelsY = B = Math.max(
								0,
								r - this.chartHeight
							)) &&
							((this.plotHeight += B),
							this.inverted
								? ((this.clipBox.width += B), (this.plotBox.width += B))
								: ((this.clipBox.height += B), (this.plotBox.height += B)),
							(E = { 2: { name: "bottom", value: B } }));
					E &&
						!g.skipAxes &&
						this.axes.forEach(function (g) {
							E[g.side]
								? (g.getPlotLinePath = function () {
										var t = E[g.side].name,
											z = this[t];
										this[t] = z - E[g.side].value;
										var m = c.Axis.prototype.getPlotLinePath.apply(
											this,
											arguments
										);
										this[t] = z;
										return m;
								  })
								: (g.setAxisSize(), g.setAxisTranslation());
						});
				}
			});
			G(g, "render", function () {
				this.scrollablePixelsX || this.scrollablePixelsY
					? (this.setUpScrolling && this.setUpScrolling(), this.applyFixed())
					: this.fixedDiv && this.applyFixed();
			});
			g.prototype.setUpScrolling = function () {
				var c = this,
					g = {
						WebkitOverflowScrolling: "touch",
						overflowX: "hidden",
						overflowY: "hidden",
					};
				this.scrollablePixelsX && (g.overflowX = "auto");
				this.scrollablePixelsY && (g.overflowY = "auto");
				this.scrollingContainer = r(
					"div",
					{ className: "highcharts-scrolling" },
					g,
					this.renderTo
				);
				G(this.scrollingContainer, "scroll", function () {
					c.pointer && delete c.pointer.chartPosition;
				});
				this.innerContainer = r(
					"div",
					{ className: "highcharts-inner-container" },
					null,
					this.scrollingContainer
				);
				this.innerContainer.appendChild(this.container);
				this.setUpScrolling = null;
			};
			g.prototype.moveFixedElements = function () {
				var c = this.container,
					g = this.fixedRenderer,
					r = ".highcharts-contextbutton .highcharts-credits .highcharts-legend .highcharts-legend-checkbox .highcharts-navigator-series .highcharts-navigator-xaxis .highcharts-navigator-yaxis .highcharts-navigator .highcharts-reset-zoom .highcharts-scrollbar .highcharts-subtitle .highcharts-title".split(
						" "
					),
					E;
				this.scrollablePixelsX && !this.inverted
					? (E = ".highcharts-yaxis")
					: this.scrollablePixelsX && this.inverted
					? (E = ".highcharts-xaxis")
					: this.scrollablePixelsY && !this.inverted
					? (E = ".highcharts-xaxis")
					: this.scrollablePixelsY &&
					  this.inverted &&
					  (E = ".highcharts-yaxis");
				r.push(E, E + "-labels");
				r.forEach(function (t) {
					[].forEach.call(c.querySelectorAll(t), function (c) {
						(c.namespaceURI === g.SVG_NS
							? g.box
							: g.box.parentNode
						).appendChild(c);
						c.style.pointerEvents = "auto";
					});
				});
			};
			g.prototype.applyFixed = function () {
				var g,
					J,
					B = !this.fixedDiv,
					E = this.options.chart.scrollablePlotArea;
				B
					? ((this.fixedDiv = r(
							"div",
							{ className: "highcharts-fixed" },
							{
								position: "absolute",
								overflow: "hidden",
								pointerEvents: "none",
								zIndex: 2,
							},
							null,
							!0
					  )),
					  this.renderTo.insertBefore(this.fixedDiv, this.renderTo.firstChild),
					  (this.renderTo.style.overflow = "visible"),
					  (this.fixedRenderer = J = new c.Renderer(
							this.fixedDiv,
							this.chartWidth,
							this.chartHeight,
							null === (g = this.options.chart) || void 0 === g
								? void 0
								: g.style
					  )),
					  (this.scrollableMask = J.path()
							.attr({
								fill: this.options.chart.backgroundColor || "#fff",
								"fill-opacity": D(E.opacity, 0.85),
								zIndex: -1,
							})
							.addClass("highcharts-scrollable-mask")
							.add()),
					  this.moveFixedElements(),
					  G(this, "afterShowResetZoom", this.moveFixedElements),
					  G(this, "afterLayOutTitles", this.moveFixedElements))
					: this.fixedRenderer.setSize(this.chartWidth, this.chartHeight);
				g = this.chartWidth + (this.scrollablePixelsX || 0);
				J = this.chartHeight + (this.scrollablePixelsY || 0);
				L(this.container);
				this.container.style.width = g + "px";
				this.container.style.height = J + "px";
				this.renderer.boxWrapper.attr({
					width: g,
					height: J,
					viewBox: [0, 0, g, J].join(" "),
				});
				this.chartBackground.attr({ width: g, height: J });
				this.scrollingContainer.style.height = this.chartHeight + "px";
				B &&
					(E.scrollPositionX &&
						(this.scrollingContainer.scrollLeft =
							this.scrollablePixelsX * E.scrollPositionX),
					E.scrollPositionY &&
						(this.scrollingContainer.scrollTop =
							this.scrollablePixelsY * E.scrollPositionY));
				J = this.axisOffset;
				B = this.plotTop - J[0] - 1;
				E = this.plotLeft - J[3] - 1;
				g = this.plotTop + this.plotHeight + J[2] + 1;
				J = this.plotLeft + this.plotWidth + J[1] + 1;
				var t = this.plotLeft + this.plotWidth - (this.scrollablePixelsX || 0),
					x = this.plotTop + this.plotHeight - (this.scrollablePixelsY || 0);
				B = this.scrollablePixelsX
					? [
							["M", 0, B],
							["L", this.plotLeft - 1, B],
							["L", this.plotLeft - 1, g],
							["L", 0, g],
							["Z"],
							["M", t, B],
							["L", this.chartWidth, B],
							["L", this.chartWidth, g],
							["L", t, g],
							["Z"],
					  ]
					: this.scrollablePixelsY
					? [
							["M", E, 0],
							["L", E, this.plotTop - 1],
							["L", J, this.plotTop - 1],
							["L", J, 0],
							["Z"],
							["M", E, x],
							["L", E, this.chartHeight],
							["L", J, this.chartHeight],
							["L", J, x],
							["Z"],
					  ]
					: [["M", 0, 0]];
				"adjustHeight" !== this.redrawTrigger &&
					this.scrollableMask.attr({ d: B });
			};
		}
	);
	N(v, "parts/StackingAxis.js", [v["parts/Utilities.js"]], function (c) {
		var g = c.addEvent,
			G = c.destroyObjectProperties,
			r = c.fireEvent,
			D = c.objectEach,
			L = c.pick,
			v = (function () {
				function c(c) {
					this.oldStacks = {};
					this.stacks = {};
					this.stacksTouched = 0;
					this.axis = c;
				}
				c.prototype.buildStacks = function () {
					var c = this.axis,
						g = c.series,
						t = L(c.options.reversedStacks, !0),
						x = g.length,
						z;
					if (!c.isXAxis) {
						this.usePercentage = !1;
						for (z = x; z--; ) {
							var m = g[t ? z : x - z - 1];
							m.setStackedPoints();
						}
						for (z = 0; z < x; z++) g[z].modifyStacks();
						r(c, "afterBuildStacks");
					}
				};
				c.prototype.cleanStacks = function () {
					if (!this.axis.isXAxis) {
						if (this.oldStacks) var c = (this.stacks = this.oldStacks);
						D(c, function (c) {
							D(c, function (c) {
								c.cumulative = c.total;
							});
						});
					}
				};
				c.prototype.resetStacks = function () {
					var c = this,
						g = c.stacks;
					c.axis.isXAxis ||
						D(g, function (g) {
							D(g, function (t, z) {
								t.touched < c.stacksTouched
									? (t.destroy(), delete g[z])
									: ((t.total = null), (t.cumulative = null));
							});
						});
				};
				c.prototype.renderStackTotals = function () {
					var c = this.axis.chart,
						g = c.renderer,
						t = this.stacks,
						x = (this.stackTotalGroup =
							this.stackTotalGroup ||
							g
								.g("stack-labels")
								.attr({ visibility: "visible", zIndex: 6 })
								.add());
					x.translate(c.plotLeft, c.plotTop);
					D(t, function (c) {
						D(c, function (m) {
							m.render(x);
						});
					});
				};
				return c;
			})();
		return (function () {
			function c() {}
			c.compose = function (r) {
				g(r, "init", c.onInit);
				g(r, "destroy", c.onDestroy);
			};
			c.onDestroy = function () {
				var c = this.stacking;
				if (c) {
					var g = c.stacks;
					D(g, function (c, x) {
						G(c);
						g[x] = null;
					});
					c && c.stackTotalGroup && c.stackTotalGroup.destroy();
				}
			};
			c.onInit = function () {
				this.stacking || (this.stacking = new v(this));
			};
			return c;
		})();
	});
	N(
		v,
		"mixins/legend-symbol.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var G = g.merge,
				r = g.pick;
			c.LegendSymbolMixin = {
				drawRectangle: function (c, g) {
					var G = c.symbolHeight,
						D = c.options.squareSymbol;
					g.legendSymbol = this.chart.renderer
						.rect(
							D ? (c.symbolWidth - G) / 2 : 0,
							c.baseline - G + 1,
							D ? G : c.symbolWidth,
							G,
							r(c.options.symbolRadius, G / 2)
						)
						.addClass("highcharts-point")
						.attr({ zIndex: 3 })
						.add(g.legendGroup);
				},
				drawLineMarker: function (c) {
					var g = this.options,
						D = g.marker,
						v = c.symbolWidth,
						B = c.symbolHeight,
						E = B / 2,
						t = this.chart.renderer,
						x = this.legendGroup;
					c = c.baseline - Math.round(0.3 * c.fontMetrics.b);
					var z = {};
					this.chart.styledMode ||
						((z = { "stroke-width": g.lineWidth || 0 }),
						g.dashStyle && (z.dashstyle = g.dashStyle));
					this.legendLine = t
						.path(["M", 0, c, "L", v, c])
						.addClass("highcharts-graph")
						.attr(z)
						.add(x);
					D &&
						!1 !== D.enabled &&
						v &&
						((g = Math.min(r(D.radius, E), E)),
						0 === this.symbol.indexOf("url") &&
							((D = G(D, { width: B, height: B })), (g = 0)),
						(this.legendSymbol = D = t
							.symbol(this.symbol, v / 2 - g, c - g, 2 * g, 2 * g, D)
							.addClass("highcharts-point")
							.add(x)),
						(D.isMarker = !0));
				},
			};
			return c.LegendSymbolMixin;
		}
	);
	N(
		v,
		"parts/Point.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			"";
			var G = g.animObject,
				r = g.defined,
				D = g.erase,
				v = g.extend,
				K = g.fireEvent,
				J = g.format,
				B = g.getNestedProperty,
				E = g.isArray,
				t = g.isNumber,
				x = g.isObject,
				z = g.syncTimeout,
				m = g.pick,
				A = g.removeEvent,
				p = g.uniqueKey;
			g = (function () {
				function c() {
					this.colorIndex = this.category = void 0;
					this.formatPrefix = "point";
					this.id = void 0;
					this.isNull = !1;
					this.percentage = this.options = this.name = void 0;
					this.selected = !1;
					this.total = this.series = void 0;
					this.visible = !0;
					this.x = void 0;
				}
				c.prototype.animateBeforeDestroy = function () {
					var k = this,
						a = { x: k.startXPos, opacity: 0 },
						d,
						l = k.getGraphicalProps();
					l.singular.forEach(function (h) {
						d = "dataLabel" === h;
						k[h] = k[h].animate(
							d ? { x: k[h].startXPos, y: k[h].startYPos, opacity: 0 } : a
						);
					});
					l.plural.forEach(function (a) {
						k[a].forEach(function (a) {
							a.element &&
								a.animate(
									v(
										{ x: k.startXPos },
										a.startYPos ? { x: a.startXPos, y: a.startYPos } : {}
									)
								);
						});
					});
				};
				c.prototype.applyOptions = function (k, a) {
					var d = this.series,
						l = d.options.pointValKey || d.pointValKey;
					k = c.prototype.optionsToObject.call(this, k);
					v(this, k);
					this.options = this.options ? v(this.options, k) : k;
					k.group && delete this.group;
					k.dataLabels && delete this.dataLabels;
					l && (this.y = c.prototype.getNestedProperty.call(this, l));
					this.formatPrefix = (this.isNull = m(
						this.isValid && !this.isValid(),
						null === this.x || !t(this.y)
					))
						? "null"
						: "point";
					this.selected && (this.state = "select");
					"name" in this &&
						"undefined" === typeof a &&
						d.xAxis &&
						d.xAxis.hasNames &&
						(this.x = d.xAxis.nameToX(this));
					"undefined" === typeof this.x &&
						d &&
						(this.x = "undefined" === typeof a ? d.autoIncrement(this) : a);
					return this;
				};
				c.prototype.destroy = function () {
					function k() {
						if (a.graphic || a.dataLabel || a.dataLabels)
							A(a), a.destroyElements();
						for (m in a) a[m] = null;
					}
					var a = this,
						d = a.series,
						l = d.chart;
					d = d.options.dataSorting;
					var h = l.hoverPoints,
						f = G(a.series.chart.renderer.globalAnimation),
						m;
					a.legendItem && l.legend.destroyItem(a);
					h && (a.setState(), D(h, a), h.length || (l.hoverPoints = null));
					if (a === l.hoverPoint) a.onMouseOut();
					d && d.enabled
						? (this.animateBeforeDestroy(), z(k, f.duration))
						: k();
					l.pointCount--;
				};
				c.prototype.destroyElements = function (k) {
					var a = this;
					k = a.getGraphicalProps(k);
					k.singular.forEach(function (d) {
						a[d] = a[d].destroy();
					});
					k.plural.forEach(function (d) {
						a[d].forEach(function (a) {
							a.element && a.destroy();
						});
						delete a[d];
					});
				};
				c.prototype.firePointEvent = function (k, a, d) {
					var l = this,
						h = this.series.options;
					(h.point.events[k] ||
						(l.options && l.options.events && l.options.events[k])) &&
						l.importEvents();
					"click" === k &&
						h.allowPointSelect &&
						(d = function (a) {
							l.select && l.select(null, a.ctrlKey || a.metaKey || a.shiftKey);
						});
					K(l, k, a, d);
				};
				c.prototype.getClassName = function () {
					return (
						"highcharts-point" +
						(this.selected ? " highcharts-point-select" : "") +
						(this.negative ? " highcharts-negative" : "") +
						(this.isNull ? " highcharts-null-point" : "") +
						("undefined" !== typeof this.colorIndex
							? " highcharts-color-" + this.colorIndex
							: "") +
						(this.options.className ? " " + this.options.className : "") +
						(this.zone && this.zone.className
							? " " + this.zone.className.replace("highcharts-negative", "")
							: "")
					);
				};
				c.prototype.getGraphicalProps = function (k) {
					var a = this,
						d = [],
						l,
						h = { singular: [], plural: [] };
					k = k || { graphic: 1, dataLabel: 1 };
					k.graphic && d.push("graphic", "shadowGroup");
					k.dataLabel && d.push("dataLabel", "dataLabelUpper", "connector");
					for (l = d.length; l--; ) {
						var f = d[l];
						a[f] && h.singular.push(f);
					}
					["dataLabel", "connector"].forEach(function (d) {
						var f = d + "s";
						k[d] && a[f] && h.plural.push(f);
					});
					return h;
				};
				c.prototype.getLabelConfig = function () {
					return {
						x: this.category,
						y: this.y,
						color: this.color,
						colorIndex: this.colorIndex,
						key: this.name || this.category,
						series: this.series,
						point: this,
						percentage: this.percentage,
						total: this.total || this.stackTotal,
					};
				};
				c.prototype.getNestedProperty = function (k) {
					if (k)
						return 0 === k.indexOf("custom.") ? B(k, this.options) : this[k];
				};
				c.prototype.getZone = function () {
					var k = this.series,
						a = k.zones;
					k = k.zoneAxis || "y";
					var d = 0,
						l;
					for (l = a[d]; this[k] >= l.value; ) l = a[++d];
					this.nonZonedColor || (this.nonZonedColor = this.color);
					this.color =
						l && l.color && !this.options.color ? l.color : this.nonZonedColor;
					return l;
				};
				c.prototype.hasNewShapeType = function () {
					return (
						(this.graphic &&
							(this.graphic.symbolName || this.graphic.element.nodeName)) !==
						this.shapeType
					);
				};
				c.prototype.init = function (k, a, d) {
					this.series = k;
					this.applyOptions(a, d);
					this.id = r(this.id) ? this.id : p();
					this.resolveColor();
					k.chart.pointCount++;
					K(this, "afterInit");
					return this;
				};
				c.prototype.optionsToObject = function (k) {
					var a = {},
						d = this.series,
						l = d.options.keys,
						h = l || d.pointArrayMap || ["y"],
						f = h.length,
						m = 0,
						u = 0;
					if (t(k) || null === k) a[h[0]] = k;
					else if (E(k))
						for (
							!l &&
							k.length > f &&
							((d = typeof k[0]),
							"string" === d ? (a.name = k[0]) : "number" === d && (a.x = k[0]),
							m++);
							u < f;

						)
							(l && "undefined" === typeof k[m]) ||
								(0 < h[u].indexOf(".")
									? c.prototype.setNestedProperty(a, k[m], h[u])
									: (a[h[u]] = k[m])),
								m++,
								u++;
					else
						"object" === typeof k &&
							((a = k),
							k.dataLabels && (d._hasPointLabels = !0),
							k.marker && (d._hasPointMarkers = !0));
					return a;
				};
				c.prototype.resolveColor = function () {
					var k = this.series;
					var a = k.chart.options.chart.colorCount;
					var d = k.chart.styledMode;
					delete this.nonZonedColor;
					d || this.options.color || (this.color = k.color);
					k.options.colorByPoint
						? (d ||
								((a = k.options.colors || k.chart.options.colors),
								(this.color = this.color || a[k.colorCounter]),
								(a = a.length)),
						  (d = k.colorCounter),
						  k.colorCounter++,
						  k.colorCounter === a && (k.colorCounter = 0))
						: (d = k.colorIndex);
					this.colorIndex = m(this.colorIndex, d);
				};
				c.prototype.setNestedProperty = function (k, a, d) {
					d.split(".").reduce(function (d, h, f, k) {
						d[h] = k.length - 1 === f ? a : x(d[h], !0) ? d[h] : {};
						return d[h];
					}, k);
					return k;
				};
				c.prototype.tooltipFormatter = function (k) {
					var a = this.series,
						d = a.tooltipOptions,
						l = m(d.valueDecimals, ""),
						h = d.valuePrefix || "",
						f = d.valueSuffix || "";
					a.chart.styledMode && (k = a.chart.tooltip.styledModeFormat(k));
					(a.pointArrayMap || ["y"]).forEach(function (a) {
						a = "{point." + a;
						if (h || f) k = k.replace(RegExp(a + "}", "g"), h + a + "}" + f);
						k = k.replace(RegExp(a + "}", "g"), a + ":,." + l + "f}");
					});
					return J(k, { point: this, series: this.series }, a.chart);
				};
				return c;
			})();
			c.Point = g;
			return c.Point;
		}
	);
	N(
		v,
		"parts/Series.js",
		[
			v["mixins/legend-symbol.js"],
			v["parts/Globals.js"],
			v["parts/Point.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, G, r) {
			"";
			var D = r.addEvent,
				v = r.animObject,
				K = r.arrayMax,
				J = r.arrayMin,
				B = r.clamp,
				E = r.correctFloat,
				t = r.defined,
				x = r.erase,
				z = r.error,
				m = r.extend,
				A = r.find,
				p = r.fireEvent,
				M = r.getNestedProperty,
				k = r.isArray,
				a = r.isFunction,
				d = r.isNumber,
				l = r.isString,
				h = r.merge,
				f = r.objectEach,
				q = r.pick,
				u = r.removeEvent,
				F = r.seriesType,
				w = r.splat,
				H = r.syncTimeout,
				y = g.defaultOptions,
				Q = g.defaultPlotOptions,
				P = g.seriesTypes,
				C = g.SVGElement,
				e = g.win;
			g.Series = F(
				"line",
				null,
				{
					lineWidth: 2,
					allowPointSelect: !1,
					crisp: !0,
					showCheckbox: !1,
					animation: { duration: 1e3 },
					events: {},
					marker: {
						enabledThreshold: 2,
						lineColor: "#ffffff",
						lineWidth: 0,
						radius: 4,
						states: {
							normal: { animation: !0 },
							hover: {
								animation: { duration: 50 },
								enabled: !0,
								radiusPlus: 2,
								lineWidthPlus: 1,
							},
							select: {
								fillColor: "#cccccc",
								lineColor: "#000000",
								lineWidth: 2,
							},
						},
					},
					point: { events: {} },
					dataLabels: {
						align: "center",
						formatter: function () {
							var b = this.series.chart.numberFormatter;
							return "number" !== typeof this.y ? "" : b(this.y, -1);
						},
						padding: 5,
						style: {
							fontSize: "11px",
							fontWeight: "bold",
							color: "contrast",
							textOutline: "1px contrast",
						},
						verticalAlign: "bottom",
						x: 0,
						y: 0,
					},
					cropThreshold: 300,
					opacity: 1,
					pointRange: 0,
					softThreshold: !0,
					states: {
						normal: { animation: !0 },
						hover: {
							animation: { duration: 50 },
							lineWidthPlus: 1,
							marker: {},
							halo: { size: 10, opacity: 0.25 },
						},
						select: { animation: { duration: 0 } },
						inactive: { animation: { duration: 50 }, opacity: 0.2 },
					},
					stickyTracking: !0,
					turboThreshold: 1e3,
					findNearestPointBy: "x",
				},
				{
					axisTypes: ["xAxis", "yAxis"],
					coll: "series",
					colorCounter: 0,
					cropShoulder: 1,
					directTouch: !1,
					eventsToUnbind: [],
					isCartesian: !0,
					parallelArrays: ["x", "y"],
					pointClass: G,
					requireSorting: !0,
					sorted: !0,
					init: function (b, e) {
						p(this, "init", { options: e });
						var d = this,
							h = b.series,
							l;
						this.eventOptions = this.eventOptions || {};
						d.chart = b;
						d.options = e = d.setOptions(e);
						d.linkedSeries = [];
						d.bindAxes();
						m(d, {
							name: e.name,
							state: "",
							visible: !1 !== e.visible,
							selected: !0 === e.selected,
						});
						var n = e.events;
						f(n, function (b, e) {
							a(b) &&
								d.eventOptions[e] !== b &&
								(a(d.eventOptions[e]) && u(d, e, d.eventOptions[e]),
								(d.eventOptions[e] = b),
								D(d, e, b));
						});
						if (
							(n && n.click) ||
							(e.point && e.point.events && e.point.events.click) ||
							e.allowPointSelect
						)
							b.runTrackerClick = !0;
						d.getColor();
						d.getSymbol();
						d.parallelArrays.forEach(function (b) {
							d[b + "Data"] || (d[b + "Data"] = []);
						});
						d.isCartesian && (b.hasCartesianSeries = !0);
						h.length && (l = h[h.length - 1]);
						d._i = q(l && l._i, -1) + 1;
						b.orderSeries(this.insert(h));
						e.dataSorting && e.dataSorting.enabled
							? d.setDataSortingOptions()
							: d.points || d.data || d.setData(e.data, !1);
						p(this, "afterInit");
					},
					is: function (b) {
						return P[b] && this instanceof P[b];
					},
					insert: function (b) {
						var a = this.options.index,
							e;
						if (d(a)) {
							for (e = b.length; e--; )
								if (a >= q(b[e].options.index, b[e]._i)) {
									b.splice(e + 1, 0, this);
									break;
								}
							-1 === e && b.unshift(this);
							e += 1;
						} else b.push(this);
						return q(e, b.length - 1);
					},
					bindAxes: function () {
						var b = this,
							a = b.options,
							e = b.chart,
							d;
						p(this, "bindAxes", null, function () {
							(b.axisTypes || []).forEach(function (f) {
								e[f].forEach(function (e) {
									d = e.options;
									if (
										a[f] === d.index ||
										("undefined" !== typeof a[f] && a[f] === d.id) ||
										("undefined" === typeof a[f] && 0 === d.index)
									)
										b.insert(e.series), (b[f] = e), (e.isDirty = !0);
								});
								b[f] || b.optionalAxis === f || z(18, !0, e);
							});
						});
						p(this, "afterBindAxes");
					},
					updateParallelArrays: function (b, a) {
						var e = b.series,
							f = arguments,
							h = d(a)
								? function (d) {
										var f = "y" === d && e.toYData ? e.toYData(b) : b[d];
										e[d + "Data"][a] = f;
								  }
								: function (b) {
										Array.prototype[a].apply(
											e[b + "Data"],
											Array.prototype.slice.call(f, 2)
										);
								  };
						e.parallelArrays.forEach(h);
					},
					hasData: function () {
						return (
							(this.visible &&
								"undefined" !== typeof this.dataMax &&
								"undefined" !== typeof this.dataMin) ||
							(this.visible && this.yData && 0 < this.yData.length)
						);
					},
					autoIncrement: function () {
						var b = this.options,
							a = this.xIncrement,
							e,
							d = b.pointIntervalUnit,
							f = this.chart.time;
						a = q(a, b.pointStart, 0);
						this.pointInterval = e = q(this.pointInterval, b.pointInterval, 1);
						d &&
							((b = new f.Date(a)),
							"day" === d
								? f.set("Date", b, f.get("Date", b) + e)
								: "month" === d
								? f.set("Month", b, f.get("Month", b) + e)
								: "year" === d &&
								  f.set("FullYear", b, f.get("FullYear", b) + e),
							(e = b.getTime() - a));
						this.xIncrement = a + e;
						return a;
					},
					setDataSortingOptions: function () {
						var b = this.options;
						m(this, {
							requireSorting: !1,
							sorted: !1,
							enabledDataSorting: !0,
							allowDG: !1,
						});
						t(b.pointRange) || (b.pointRange = 1);
					},
					setOptions: function (b) {
						var a = this.chart,
							e = a.options,
							d = e.plotOptions,
							f = a.userOptions || {};
						b = h(b);
						a = a.styledMode;
						var l = { plotOptions: d, userOptions: b };
						p(this, "setOptions", l);
						var k = l.plotOptions[this.type],
							m = f.plotOptions || {};
						this.userOptions = l.userOptions;
						f = h(k, d.series, f.plotOptions && f.plotOptions[this.type], b);
						this.tooltipOptions = h(
							y.tooltip,
							y.plotOptions.series && y.plotOptions.series.tooltip,
							y.plotOptions[this.type].tooltip,
							e.tooltip.userOptions,
							d.series && d.series.tooltip,
							d[this.type].tooltip,
							b.tooltip
						);
						this.stickyTracking = q(
							b.stickyTracking,
							m[this.type] && m[this.type].stickyTracking,
							m.series && m.series.stickyTracking,
							this.tooltipOptions.shared && !this.noSharedTooltip
								? !0
								: f.stickyTracking
						);
						null === k.marker && delete f.marker;
						this.zoneAxis = f.zoneAxis;
						e = this.zones = (f.zones || []).slice();
						(!f.negativeColor && !f.negativeFillColor) ||
							f.zones ||
							((d = {
								value: f[this.zoneAxis + "Threshold"] || f.threshold || 0,
								className: "highcharts-negative",
							}),
							a ||
								((d.color = f.negativeColor),
								(d.fillColor = f.negativeFillColor)),
							e.push(d));
						e.length &&
							t(e[e.length - 1].value) &&
							e.push(a ? {} : { color: this.color, fillColor: this.fillColor });
						p(this, "afterSetOptions", { options: f });
						return f;
					},
					getName: function () {
						return q(this.options.name, "Series " + (this.index + 1));
					},
					getCyclic: function (b, a, e) {
						var d = this.chart,
							f = this.userOptions,
							h = b + "Index",
							l = b + "Counter",
							n = e
								? e.length
								: q(d.options.chart[b + "Count"], d[b + "Count"]);
						if (!a) {
							var k = q(f[h], f["_" + h]);
							t(k) ||
								(d.series.length || (d[l] = 0),
								(f["_" + h] = k = d[l] % n),
								(d[l] += 1));
							e && (a = e[k]);
						}
						"undefined" !== typeof k && (this[h] = k);
						this[b] = a;
					},
					getColor: function () {
						this.chart.styledMode
							? this.getCyclic("color")
							: this.options.colorByPoint
							? (this.options.color = null)
							: this.getCyclic(
									"color",
									this.options.color || Q[this.type].color,
									this.chart.options.colors
							  );
					},
					getPointsCollection: function () {
						return (this.hasGroupedData ? this.points : this.data) || [];
					},
					getSymbol: function () {
						this.getCyclic(
							"symbol",
							this.options.marker.symbol,
							this.chart.options.symbols
						);
					},
					findPointIndex: function (b, a) {
						var e = b.id,
							f = b.x,
							h = this.points,
							l,
							k = this.options.dataSorting;
						if (e) var n = this.chart.get(e);
						else if (this.linkedParent || this.enabledDataSorting) {
							var m = k && k.matchByName ? "name" : "index";
							n = A(h, function (a) {
								return !a.touched && a[m] === b[m];
							});
							if (!n) return;
						}
						if (n) {
							var c = n && n.index;
							"undefined" !== typeof c && (l = !0);
						}
						"undefined" === typeof c && d(f) && (c = this.xData.indexOf(f, a));
						-1 !== c &&
							"undefined" !== typeof c &&
							this.cropped &&
							(c = c >= this.cropStart ? c - this.cropStart : c);
						!l && h[c] && h[c].touched && (c = void 0);
						return c;
					},
					drawLegendSymbol: c.drawLineMarker,
					updateData: function (b, a) {
						var e = this.options,
							f = e.dataSorting,
							h = this.points,
							l = [],
							k,
							n,
							m,
							c = this.requireSorting,
							u = b.length === h.length,
							q = !0;
						this.xIncrement = null;
						b.forEach(function (b, a) {
							var n =
								(t(b) &&
									this.pointClass.prototype.optionsToObject.call(
										{ series: this },
										b
									)) ||
								{};
							var q = n.x;
							if (n.id || d(q)) {
								if (
									((q = this.findPointIndex(n, m)),
									-1 === q || "undefined" === typeof q
										? l.push(b)
										: h[q] && b !== e.data[q]
										? (h[q].update(b, !1, null, !1),
										  (h[q].touched = !0),
										  c && (m = q + 1))
										: h[q] && (h[q].touched = !0),
									!u || a !== q || (f && f.enabled) || this.hasDerivedData)
								)
									k = !0;
							} else l.push(b);
						}, this);
						if (k)
							for (b = h.length; b--; )
								(n = h[b]) && !n.touched && n.remove && n.remove(!1, a);
						else
							!u || (f && f.enabled)
								? (q = !1)
								: (b.forEach(function (b, a) {
										h[a].update && b !== h[a].y && h[a].update(b, !1, null, !1);
								  }),
								  (l.length = 0));
						h.forEach(function (b) {
							b && (b.touched = !1);
						});
						if (!q) return !1;
						l.forEach(function (b) {
							this.addPoint(b, !1, null, null, !1);
						}, this);
						null === this.xIncrement &&
							this.xData &&
							this.xData.length &&
							((this.xIncrement = K(this.xData)), this.autoIncrement());
						return !0;
					},
					setData: function (b, a, e, f) {
						var h = this,
							n = h.points,
							m = (n && n.length) || 0,
							c,
							u = h.options,
							g = h.chart,
							w = u.dataSorting,
							p = null,
							y = h.xAxis;
						p = u.turboThreshold;
						var t = this.xData,
							F = this.yData,
							H = (c = h.pointArrayMap) && c.length,
							x = u.keys,
							A = 0,
							I = 1,
							r;
						b = b || [];
						c = b.length;
						a = q(a, !0);
						w && w.enabled && (b = this.sortData(b));
						!1 !== f &&
							c &&
							m &&
							!h.cropped &&
							!h.hasGroupedData &&
							h.visible &&
							!h.isSeriesBoosting &&
							(r = this.updateData(b, e));
						if (!r) {
							h.xIncrement = null;
							h.colorCounter = 0;
							this.parallelArrays.forEach(function (b) {
								h[b + "Data"].length = 0;
							});
							if (p && c > p)
								if (((p = h.getFirstValidPoint(b)), d(p)))
									for (e = 0; e < c; e++)
										(t[e] = this.autoIncrement()), (F[e] = b[e]);
								else if (k(p))
									if (H)
										for (e = 0; e < c; e++)
											(f = b[e]), (t[e] = f[0]), (F[e] = f.slice(1, H + 1));
									else
										for (
											x &&
												((A = x.indexOf("x")),
												(I = x.indexOf("y")),
												(A = 0 <= A ? A : 0),
												(I = 0 <= I ? I : 1)),
												e = 0;
											e < c;
											e++
										)
											(f = b[e]), (t[e] = f[A]), (F[e] = f[I]);
								else z(12, !1, g);
							else
								for (e = 0; e < c; e++)
									"undefined" !== typeof b[e] &&
										((f = { series: h }),
										h.pointClass.prototype.applyOptions.apply(f, [b[e]]),
										h.updateParallelArrays(f, e));
							F && l(F[0]) && z(14, !0, g);
							h.data = [];
							h.options.data = h.userOptions.data = b;
							for (e = m; e--; ) n[e] && n[e].destroy && n[e].destroy();
							y && (y.minRange = y.userMinRange);
							h.isDirty = g.isDirtyBox = !0;
							h.isDirtyData = !!n;
							e = !1;
						}
						"point" === u.legendType &&
							(this.processData(), this.generatePoints());
						a && g.redraw(e);
					},
					sortData: function (b) {
						var a = this,
							e = a.options.dataSorting.sortKey || "y",
							d = function (b, a) {
								return (
									(t(a) &&
										b.pointClass.prototype.optionsToObject.call(
											{ series: b },
											a
										)) ||
									{}
								);
							};
						b.forEach(function (e, f) {
							b[f] = d(a, e);
							b[f].index = f;
						}, this);
						b.concat()
							.sort(function (b, a) {
								b = M(e, b);
								a = M(e, a);
								return a < b ? -1 : a > b ? 1 : 0;
							})
							.forEach(function (b, a) {
								b.x = a;
							}, this);
						a.linkedSeries &&
							a.linkedSeries.forEach(function (a) {
								var e = a.options,
									f = e.data;
								(e.dataSorting && e.dataSorting.enabled) ||
									!f ||
									(f.forEach(function (e, h) {
										f[h] = d(a, e);
										b[h] && ((f[h].x = b[h].x), (f[h].index = h));
									}),
									a.setData(f, !1));
							});
						return b;
					},
					getProcessedData: function (b) {
						var a = this.xData,
							e = this.yData,
							d = a.length;
						var f = 0;
						var h = this.xAxis,
							l = this.options;
						var k = l.cropThreshold;
						var m = b || this.getExtremesFromAll || l.getExtremesFromAll,
							c = this.isCartesian;
						b = h && h.val2lin;
						l = !(!h || !h.logarithmic);
						var u = this.requireSorting;
						if (h) {
							h = h.getExtremes();
							var q = h.min;
							var g = h.max;
						}
						if (c && this.sorted && !m && (!k || d > k || this.forceCrop))
							if (a[d - 1] < q || a[0] > g) (a = []), (e = []);
							else if (this.yData && (a[0] < q || a[d - 1] > g)) {
								f = this.cropData(this.xData, this.yData, q, g);
								a = f.xData;
								e = f.yData;
								f = f.start;
								var w = !0;
							}
						for (k = a.length || 1; --k; )
							if (
								((d = l ? b(a[k]) - b(a[k - 1]) : a[k] - a[k - 1]),
								0 < d && ("undefined" === typeof p || d < p))
							)
								var p = d;
							else 0 > d && u && (z(15, !1, this.chart), (u = !1));
						return {
							xData: a,
							yData: e,
							cropped: w,
							cropStart: f,
							closestPointRange: p,
						};
					},
					processData: function (b) {
						var a = this.xAxis;
						if (
							this.isCartesian &&
							!this.isDirty &&
							!a.isDirty &&
							!this.yAxis.isDirty &&
							!b
						)
							return !1;
						b = this.getProcessedData();
						this.cropped = b.cropped;
						this.cropStart = b.cropStart;
						this.processedXData = b.xData;
						this.processedYData = b.yData;
						this.closestPointRange = this.basePointRange = b.closestPointRange;
					},
					cropData: function (b, a, e, d, f) {
						var h = b.length,
							l = 0,
							k = h,
							n;
						f = q(f, this.cropShoulder);
						for (n = 0; n < h; n++)
							if (b[n] >= e) {
								l = Math.max(0, n - f);
								break;
							}
						for (e = n; e < h; e++)
							if (b[e] > d) {
								k = e + f;
								break;
							}
						return {
							xData: b.slice(l, k),
							yData: a.slice(l, k),
							start: l,
							end: k,
						};
					},
					generatePoints: function () {
						var b = this.options,
							a = b.data,
							e = this.data,
							d,
							f = this.processedXData,
							h = this.processedYData,
							l = this.pointClass,
							k = f.length,
							c = this.cropStart || 0,
							u = this.hasGroupedData;
						b = b.keys;
						var q = [],
							g;
						e || u || ((e = []), (e.length = a.length), (e = this.data = e));
						b && u && (this.options.keys = !1);
						for (g = 0; g < k; g++) {
							var y = c + g;
							if (u) {
								var t = new l().init(this, [f[g]].concat(w(h[g])));
								t.dataGroup = this.groupMap[g];
								t.dataGroup.options &&
									((t.options = t.dataGroup.options),
									m(t, t.dataGroup.options),
									delete t.dataLabels);
							} else
								(t = e[y]) ||
									"undefined" === typeof a[y] ||
									(e[y] = t = new l().init(this, a[y], f[g]));
							t && ((t.index = y), (q[g] = t));
						}
						this.options.keys = b;
						if (e && (k !== (d = e.length) || u))
							for (g = 0; g < d; g++)
								g !== c || u || (g += k),
									e[g] && (e[g].destroyElements(), (e[g].plotX = void 0));
						this.data = e;
						this.points = q;
						p(this, "afterGeneratePoints");
					},
					getXExtremes: function (b) {
						return { min: J(b), max: K(b) };
					},
					getExtremes: function (b, a) {
						var e = this.xAxis,
							f = this.yAxis,
							h = this.processedXData || this.xData,
							l = [],
							n = 0,
							m = 0;
						var c = 0;
						var u = this.requireSorting ? this.cropShoulder : 0,
							q = f ? f.positiveValuesOnly : !1,
							g;
						b = b || this.stackedYData || this.processedYData || [];
						f = b.length;
						e && ((c = e.getExtremes()), (m = c.min), (c = c.max));
						for (g = 0; g < f; g++) {
							var w = h[g];
							var y = b[g];
							var t = (d(y) || k(y)) && (y.length || 0 < y || !q);
							w =
								a ||
								this.getExtremesFromAll ||
								this.options.getExtremesFromAll ||
								this.cropped ||
								!e ||
								((h[g + u] || w) >= m && (h[g - u] || w) <= c);
							if (t && w)
								if ((t = y.length)) for (; t--; ) d(y[t]) && (l[n++] = y[t]);
								else l[n++] = y;
						}
						b = { dataMin: J(l), dataMax: K(l) };
						p(this, "afterGetExtremes", { dataExtremes: b });
						return b;
					},
					applyExtremes: function () {
						var b = this.getExtremes();
						this.dataMin = b.dataMin;
						this.dataMax = b.dataMax;
						return b;
					},
					getFirstValidPoint: function (b) {
						for (var a = null, e = b.length, d = 0; null === a && d < e; )
							(a = b[d]), d++;
						return a;
					},
					translate: function () {
						this.processedXData || this.processData();
						this.generatePoints();
						var b = this.options,
							a = b.stacking,
							e = this.xAxis,
							f = e.categories,
							h = this.enabledDataSorting,
							l = this.yAxis,
							m = this.points,
							c = m.length,
							u = !!this.modifyValue,
							g,
							w = this.pointPlacementToXValue(),
							y = !!w,
							F = b.threshold,
							H = b.startFromThreshold ? F : 0,
							z,
							x = this.zoneAxis || "y",
							A = Number.MAX_VALUE;
						for (g = 0; g < c; g++) {
							var r = m[g],
								C = r.x,
								M = r.y,
								P = r.low,
								Q =
									a &&
									l.stacking &&
									l.stacking.stacks[
										(this.negStacks && M < (H ? 0 : F) ? "-" : "") +
											this.stackKey
									];
							l.positiveValuesOnly && null !== M && 0 >= M && (r.isNull = !0);
							r.plotX = z = E(
								B(
									e.translate(C, 0, 0, 0, 1, w, "flags" === this.type),
									-1e5,
									1e5
								)
							);
							if (a && this.visible && Q && Q[C]) {
								var G = this.getStackIndicator(G, C, this.index);
								if (!r.isNull) {
									var D = Q[C];
									var v = D.points[G.key];
								}
							}
							k(v) &&
								((P = v[0]),
								(M = v[1]),
								P === H && G.key === Q[C].base && (P = q(d(F) && F, l.min)),
								l.positiveValuesOnly && 0 >= P && (P = null),
								(r.total = r.stackTotal = D.total),
								(r.percentage = D.total && (r.y / D.total) * 100),
								(r.stackY = M),
								this.irregularWidths ||
									D.setOffset(this.pointXOffset || 0, this.barW || 0));
							r.yBottom = t(P)
								? B(l.translate(P, 0, 1, 0, 1), -1e5, 1e5)
								: null;
							u && (M = this.modifyValue(M, r));
							r.plotY =
								"number" === typeof M && Infinity !== M
									? B(l.translate(M, 0, 1, 0, 1), -1e5, 1e5)
									: void 0;
							r.isInside = this.isPointInside(r);
							r.clientX = y ? E(e.translate(C, 0, 0, 0, 1, w)) : z;
							r.negative = r[x] < (b[x + "Threshold"] || F || 0);
							r.category = f && "undefined" !== typeof f[r.x] ? f[r.x] : r.x;
							if (!r.isNull && !1 !== r.visible) {
								"undefined" !== typeof J && (A = Math.min(A, Math.abs(z - J)));
								var J = z;
							}
							r.zone = this.zones.length && r.getZone();
							!r.graphic && this.group && h && (r.isNew = !0);
						}
						this.closestPointRangePx = A;
						p(this, "afterTranslate");
					},
					getValidPoints: function (b, a, e) {
						var d = this.chart;
						return (b || this.points || []).filter(function (b) {
							return a && !d.isInsidePlot(b.plotX, b.plotY, d.inverted)
								? !1
								: !1 !== b.visible && (e || !b.isNull);
						});
					},
					getClipBox: function (b, a) {
						var e = this.options,
							d = this.chart,
							f = d.inverted,
							h = this.xAxis,
							l = h && this.yAxis;
						b && !1 === e.clip && l
							? (b = f
									? {
											y: -d.chartWidth + l.len + l.pos,
											height: d.chartWidth,
											width: d.chartHeight,
											x: -d.chartHeight + h.len + h.pos,
									  }
									: {
											y: -l.pos,
											height: d.chartHeight,
											width: d.chartWidth,
											x: -h.pos,
									  })
							: ((b = this.clipBox || d.clipBox),
							  a && ((b.width = d.plotSizeX), (b.x = 0)));
						return a ? { width: b.width, x: b.x } : b;
					},
					setClip: function (b) {
						var a = this.chart,
							e = this.options,
							d = a.renderer,
							f = a.inverted,
							h = this.clipBox,
							l = this.getClipBox(b),
							k =
								this.sharedClipKey ||
								[
									"_sharedClip",
									b && b.duration,
									b && b.easing,
									l.height,
									e.xAxis,
									e.yAxis,
								].join(),
							m = a[k],
							c = a[k + "m"];
						b &&
							((l.width = 0),
							f && (l.x = a.plotHeight + (!1 !== e.clip ? 0 : a.plotTop)));
						m
							? a.hasLoaded || m.attr(l)
							: (b &&
									(a[k + "m"] = c = d.clipRect(
										f ? a.plotSizeX + 99 : -99,
										f ? -a.plotLeft : -a.plotTop,
										99,
										f ? a.chartWidth : a.chartHeight
									)),
							  (a[k] = m = d.clipRect(l)),
							  (m.count = { length: 0 }));
						b &&
							!m.count[this.index] &&
							((m.count[this.index] = !0), (m.count.length += 1));
						if (!1 !== e.clip || b)
							this.group.clip(b || h ? m : a.clipRect),
								this.markerGroup.clip(c),
								(this.sharedClipKey = k);
						b ||
							(m.count[this.index] &&
								(delete m.count[this.index], --m.count.length),
							0 === m.count.length &&
								k &&
								a[k] &&
								(h || (a[k] = a[k].destroy()),
								a[k + "m"] && (a[k + "m"] = a[k + "m"].destroy())));
					},
					animate: function (a) {
						var b = this.chart,
							e = v(this.options.animation);
						if (!b.hasRendered)
							if (a) this.setClip(e);
							else {
								var d = this.sharedClipKey;
								a = b[d];
								var f = this.getClipBox(e, !0);
								a && a.animate(f, e);
								b[d + "m"] &&
									b[d + "m"].animate(
										{ width: f.width + 99, x: f.x - (b.inverted ? 0 : 99) },
										e
									);
							}
					},
					afterAnimate: function () {
						this.setClip();
						p(this, "afterAnimate");
						this.finishedAnimating = !0;
					},
					drawPoints: function () {
						var a = this.points,
							e = this.chart,
							d,
							f,
							h = this.options.marker,
							l = this[this.specialGroup] || this.markerGroup,
							k = this.xAxis,
							m = q(
								h.enabled,
								!k || k.isRadial ? !0 : null,
								this.closestPointRangePx >= h.enabledThreshold * h.radius
							);
						if (!1 !== h.enabled || this._hasPointMarkers)
							for (d = 0; d < a.length; d++) {
								var c = a[d];
								var u = (f = c.graphic) ? "animate" : "attr";
								var g = c.marker || {};
								var w = !!c.marker;
								if (
									((m && "undefined" === typeof g.enabled) || g.enabled) &&
									!c.isNull &&
									!1 !== c.visible
								) {
									var p = q(g.symbol, this.symbol);
									var y = this.markerAttribs(c, c.selected && "select");
									this.enabledDataSorting &&
										(c.startXPos = k.reversed ? -y.width : k.width);
									var t = !1 !== c.isInside;
									f
										? f[t ? "show" : "hide"](t).animate(y)
										: t &&
										  (0 < y.width || c.hasImage) &&
										  ((c.graphic = f = e.renderer
												.symbol(p, y.x, y.y, y.width, y.height, w ? g : h)
												.add(l)),
										  this.enabledDataSorting &&
												e.hasRendered &&
												(f.attr({ x: c.startXPos }), (u = "animate")));
									f && "animate" === u && f[t ? "show" : "hide"](t).animate(y);
									if (f && !e.styledMode)
										f[u](this.pointAttribs(c, c.selected && "select"));
									f && f.addClass(c.getClassName(), !0);
								} else f && (c.graphic = f.destroy());
							}
					},
					markerAttribs: function (a, e) {
						var b = this.options,
							d = b.marker,
							f = a.marker || {},
							h = f.symbol || d.symbol,
							l = q(f.radius, d.radius);
						e &&
							((d = d.states[e]),
							(e = f.states && f.states[e]),
							(l = q(
								e && e.radius,
								d && d.radius,
								l + ((d && d.radiusPlus) || 0)
							)));
						a.hasImage = h && 0 === h.indexOf("url");
						a.hasImage && (l = 0);
						a = {
							x: b.crisp ? Math.floor(a.plotX) - l : a.plotX - l,
							y: a.plotY - l,
						};
						l && (a.width = a.height = 2 * l);
						return a;
					},
					pointAttribs: function (a, e) {
						var b = this.options.marker,
							d = a && a.options,
							f = (d && d.marker) || {},
							h = this.color,
							l = d && d.color,
							k = a && a.color;
						d = q(f.lineWidth, b.lineWidth);
						var m = a && a.zone && a.zone.color;
						a = 1;
						h = l || m || k || h;
						l = f.fillColor || b.fillColor || h;
						h = f.lineColor || b.lineColor || h;
						e = e || "normal";
						b = b.states[e];
						e = (f.states && f.states[e]) || {};
						d = q(
							e.lineWidth,
							b.lineWidth,
							d + q(e.lineWidthPlus, b.lineWidthPlus, 0)
						);
						l = e.fillColor || b.fillColor || l;
						h = e.lineColor || b.lineColor || h;
						a = q(e.opacity, b.opacity, a);
						return { stroke: h, "stroke-width": d, fill: l, opacity: a };
					},
					destroy: function (a) {
						var b = this,
							d = b.chart,
							h = /AppleWebKit\/533/.test(e.navigator.userAgent),
							l,
							k,
							m = b.data || [],
							c,
							u;
						p(b, "destroy");
						this.removeEvents(a);
						(b.axisTypes || []).forEach(function (a) {
							(u = b[a]) &&
								u.series &&
								(x(u.series, b), (u.isDirty = u.forceRedraw = !0));
						});
						b.legendItem && b.chart.legend.destroyItem(b);
						for (k = m.length; k--; ) (c = m[k]) && c.destroy && c.destroy();
						b.points = null;
						r.clearTimeout(b.animationTimeout);
						f(b, function (a, b) {
							a instanceof C &&
								!a.survive &&
								((l = h && "group" === b ? "hide" : "destroy"), a[l]());
						});
						d.hoverSeries === b && (d.hoverSeries = null);
						x(d.series, b);
						d.orderSeries();
						f(b, function (e, d) {
							(a && "hcEvents" === d) || delete b[d];
						});
					},
					getGraphPath: function (a, e, d) {
						var b = this,
							f = b.options,
							h = f.step,
							l,
							k = [],
							m = [],
							c;
						a = a || b.points;
						(l = a.reversed) && a.reverse();
						(h = { right: 1, center: 2 }[h] || (h && 3)) && l && (h = 4 - h);
						a = this.getValidPoints(a, !1, !(f.connectNulls && !e && !d));
						a.forEach(function (l, n) {
							var u = l.plotX,
								q = l.plotY,
								g = a[n - 1];
							(l.leftCliff || (g && g.rightCliff)) && !d && (c = !0);
							l.isNull && !t(e) && 0 < n
								? (c = !f.connectNulls)
								: l.isNull && !e
								? (c = !0)
								: (0 === n || c
										? (n = [["M", l.plotX, l.plotY]])
										: b.getPointSpline
										? (n = [b.getPointSpline(a, l, n)])
										: h
										? ((n =
												1 === h
													? [["L", g.plotX, q]]
													: 2 === h
													? [
															["L", (g.plotX + u) / 2, g.plotY],
															["L", (g.plotX + u) / 2, q],
													  ]
													: [["L", u, g.plotY]]),
										  n.push(["L", u, q]))
										: (n = [["L", u, q]]),
								  m.push(l.x),
								  h && (m.push(l.x), 2 === h && m.push(l.x)),
								  k.push.apply(k, n),
								  (c = !1));
						});
						k.xMap = m;
						return (b.graphPath = k);
					},
					drawGraph: function () {
						var a = this,
							e = this.options,
							d = (this.gappedPath || this.getGraphPath).call(this),
							f = this.chart.styledMode,
							h = [["graph", "highcharts-graph"]];
						f || h[0].push(e.lineColor || this.color || "#cccccc", e.dashStyle);
						h = a.getZonesGraphs(h);
						h.forEach(function (b, h) {
							var l = b[0],
								k = a[l],
								m = k ? "animate" : "attr";
							k
								? ((k.endX = a.preventGraphAnimation ? null : d.xMap),
								  k.animate({ d: d }))
								: d.length &&
								  (a[l] = k = a.chart.renderer
										.path(d)
										.addClass(b[1])
										.attr({ zIndex: 1 })
										.add(a.group));
							k &&
								!f &&
								((l = {
									stroke: b[2],
									"stroke-width": e.lineWidth,
									fill: (a.fillGraph && a.color) || "none",
								}),
								b[3]
									? (l.dashstyle = b[3])
									: "square" !== e.linecap &&
									  (l["stroke-linecap"] = l["stroke-linejoin"] = "round"),
								k[m](l).shadow(2 > h && e.shadow));
							k && ((k.startX = d.xMap), (k.isArea = d.isArea));
						});
					},
					getZonesGraphs: function (a) {
						this.zones.forEach(function (b, e) {
							e = [
								"zone-graph-" + e,
								"highcharts-graph highcharts-zone-graph-" +
									e +
									" " +
									(b.className || ""),
							];
							this.chart.styledMode ||
								e.push(
									b.color || this.color,
									b.dashStyle || this.options.dashStyle
								);
							a.push(e);
						}, this);
						return a;
					},
					applyZones: function () {
						var a = this,
							e = this.chart,
							d = e.renderer,
							f = this.zones,
							h,
							l,
							k = this.clips || [],
							m,
							c = this.graph,
							u = this.area,
							g = Math.max(e.chartWidth, e.chartHeight),
							w = this[(this.zoneAxis || "y") + "Axis"],
							p = e.inverted,
							y,
							t,
							F,
							H = !1,
							z,
							x;
						if (f.length && (c || u) && w && "undefined" !== typeof w.min) {
							var A = w.reversed;
							var r = w.horiz;
							c && !this.showLine && c.hide();
							u && u.hide();
							var C = w.getExtremes();
							f.forEach(function (b, f) {
								h = A ? (r ? e.plotWidth : 0) : r ? 0 : w.toPixels(C.min) || 0;
								h = B(q(l, h), 0, g);
								l = B(Math.round(w.toPixels(q(b.value, C.max), !0) || 0), 0, g);
								H && (h = l = w.toPixels(C.max));
								y = Math.abs(h - l);
								t = Math.min(h, l);
								F = Math.max(h, l);
								w.isXAxis
									? ((m = { x: p ? F : t, y: 0, width: y, height: g }),
									  r || (m.x = e.plotHeight - m.x))
									: ((m = { x: 0, y: p ? F : t, width: g, height: y }),
									  r && (m.y = e.plotWidth - m.y));
								p &&
									d.isVML &&
									(m = w.isXAxis
										? {
												x: 0,
												y: A ? t : F,
												height: m.width,
												width: e.chartWidth,
										  }
										: {
												x: m.y - e.plotLeft - e.spacingBox.x,
												y: 0,
												width: m.height,
												height: e.chartHeight,
										  });
								k[f] ? k[f].animate(m) : (k[f] = d.clipRect(m));
								z = a["zone-area-" + f];
								x = a["zone-graph-" + f];
								c && x && x.clip(k[f]);
								u && z && z.clip(k[f]);
								H = b.value > C.max;
								a.resetZones && 0 === l && (l = void 0);
							});
							this.clips = k;
						} else a.visible && (c && c.show(!0), u && u.show(!0));
					},
					invertGroups: function (a) {
						function b() {
							["group", "markerGroup"].forEach(function (b) {
								e[b] &&
									(d.renderer.isVML &&
										e[b].attr({ width: e.yAxis.len, height: e.xAxis.len }),
									(e[b].width = e.yAxis.len),
									(e[b].height = e.xAxis.len),
									e[b].invert(e.isRadialSeries ? !1 : a));
							});
						}
						var e = this,
							d = e.chart;
						e.xAxis &&
							(e.eventsToUnbind.push(D(d, "resize", b)),
							b(),
							(e.invertGroups = b));
					},
					plotGroup: function (a, e, d, f, h) {
						var b = this[a],
							l = !b;
						l &&
							(this[a] = b = this.chart.renderer
								.g()
								.attr({ zIndex: f || 0.1 })
								.add(h));
						b.addClass(
							"highcharts-" +
								e +
								" highcharts-series-" +
								this.index +
								" highcharts-" +
								this.type +
								"-series " +
								(t(this.colorIndex)
									? "highcharts-color-" + this.colorIndex + " "
									: "") +
								(this.options.className || "") +
								(b.hasClass("highcharts-tracker") ? " highcharts-tracker" : ""),
							!0
						);
						b.attr({ visibility: d })[l ? "attr" : "animate"](
							this.getPlotBox()
						);
						return b;
					},
					getPlotBox: function () {
						var a = this.chart,
							e = this.xAxis,
							d = this.yAxis;
						a.inverted && ((e = d), (d = this.xAxis));
						return {
							translateX: e ? e.left : a.plotLeft,
							translateY: d ? d.top : a.plotTop,
							scaleX: 1,
							scaleY: 1,
						};
					},
					removeEvents: function (a) {
						a
							? this.eventsToUnbind.length &&
							  (this.eventsToUnbind.forEach(function (a) {
									a();
							  }),
							  (this.eventsToUnbind.length = 0))
							: u(this);
					},
					render: function () {
						var a = this,
							e = a.chart,
							d = a.options,
							f =
								!a.finishedAnimating &&
								e.renderer.isSVG &&
								v(d.animation).duration,
							h = a.visible ? "inherit" : "hidden",
							l = d.zIndex,
							k = a.hasRendered,
							m = e.seriesGroup,
							c = e.inverted;
						p(this, "render");
						var u = a.plotGroup("group", "series", h, l, m);
						a.markerGroup = a.plotGroup("markerGroup", "markers", h, l, m);
						f && a.animate && a.animate(!0);
						u.inverted = a.isCartesian || a.invertable ? c : !1;
						a.drawGraph && (a.drawGraph(), a.applyZones());
						a.visible && a.drawPoints();
						a.drawDataLabels && a.drawDataLabels();
						a.redrawPoints && a.redrawPoints();
						a.drawTracker &&
							!1 !== a.options.enableMouseTracking &&
							a.drawTracker();
						a.invertGroups(c);
						!1 === d.clip || a.sharedClipKey || k || u.clip(e.clipRect);
						f && a.animate && a.animate();
						k ||
							(a.animationTimeout = H(function () {
								a.afterAnimate();
							}, f || 0));
						a.isDirty = !1;
						a.hasRendered = !0;
						p(a, "afterRender");
					},
					redraw: function () {
						var a = this.chart,
							e = this.isDirty || this.isDirtyData,
							d = this.group,
							f = this.xAxis,
							h = this.yAxis;
						d &&
							(a.inverted &&
								d.attr({ width: a.plotWidth, height: a.plotHeight }),
							d.animate({
								translateX: q(f && f.left, a.plotLeft),
								translateY: q(h && h.top, a.plotTop),
							}));
						this.translate();
						this.render();
						e && delete this.kdTree;
					},
					kdAxisArray: ["clientX", "plotY"],
					searchPoint: function (a, e) {
						var b = this.xAxis,
							d = this.yAxis,
							f = this.chart.inverted;
						return this.searchKDTree(
							{
								clientX: f ? b.len - a.chartY + b.pos : a.chartX - b.pos,
								plotY: f ? d.len - a.chartX + d.pos : a.chartY - d.pos,
							},
							e,
							a
						);
					},
					buildKDTree: function (a) {
						function b(a, d, f) {
							var h;
							if ((h = a && a.length)) {
								var l = e.kdAxisArray[d % f];
								a.sort(function (a, b) {
									return a[l] - b[l];
								});
								h = Math.floor(h / 2);
								return {
									point: a[h],
									left: b(a.slice(0, h), d + 1, f),
									right: b(a.slice(h + 1), d + 1, f),
								};
							}
						}
						this.buildingKdTree = !0;
						var e = this,
							d = -1 < e.options.findNearestPointBy.indexOf("y") ? 2 : 1;
						delete e.kdTree;
						H(
							function () {
								e.kdTree = b(e.getValidPoints(null, !e.directTouch), d, d);
								e.buildingKdTree = !1;
							},
							e.options.kdNow || (a && "touchstart" === a.type) ? 0 : 1
						);
					},
					searchKDTree: function (a, e, d) {
						function b(a, e, d, m) {
							var c = e.point,
								u = f.kdAxisArray[d % m],
								n = c;
							var q = t(a[h]) && t(c[h]) ? Math.pow(a[h] - c[h], 2) : null;
							var g = t(a[l]) && t(c[l]) ? Math.pow(a[l] - c[l], 2) : null;
							g = (q || 0) + (g || 0);
							c.dist = t(g) ? Math.sqrt(g) : Number.MAX_VALUE;
							c.distX = t(q) ? Math.sqrt(q) : Number.MAX_VALUE;
							u = a[u] - c[u];
							g = 0 > u ? "left" : "right";
							q = 0 > u ? "right" : "left";
							e[g] && ((g = b(a, e[g], d + 1, m)), (n = g[k] < n[k] ? g : c));
							e[q] &&
								Math.sqrt(u * u) < n[k] &&
								((a = b(a, e[q], d + 1, m)), (n = a[k] < n[k] ? a : n));
							return n;
						}
						var f = this,
							h = this.kdAxisArray[0],
							l = this.kdAxisArray[1],
							k = e ? "distX" : "dist";
						e = -1 < f.options.findNearestPointBy.indexOf("y") ? 2 : 1;
						this.kdTree || this.buildingKdTree || this.buildKDTree(d);
						if (this.kdTree) return b(a, this.kdTree, e, e);
					},
					pointPlacementToXValue: function () {
						var a = this.options,
							e = a.pointRange,
							f = this.xAxis;
						a = a.pointPlacement;
						"between" === a && (a = f.reversed ? -0.5 : 0.5);
						return d(a) ? a * q(e, f.pointRange) : 0;
					},
					isPointInside: function (a) {
						return (
							"undefined" !== typeof a.plotY &&
							"undefined" !== typeof a.plotX &&
							0 <= a.plotY &&
							a.plotY <= this.yAxis.len &&
							0 <= a.plotX &&
							a.plotX <= this.xAxis.len
						);
					},
				}
			);
			("");
		}
	);
	N(
		v,
		"parts/Stacking.js",
		[
			v["parts/Axis.js"],
			v["parts/Globals.js"],
			v["parts/StackingAxis.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, G, r) {
			var D = r.correctFloat,
				v = r.defined,
				K = r.destroyObjectProperties,
				J = r.format,
				B = r.pick;
			("");
			r = g.Chart;
			var E = g.Series,
				t = (function () {
					function c(c, m, g, p, t) {
						var k = c.chart.inverted;
						this.axis = c;
						this.isNegative = g;
						this.options = m = m || {};
						this.x = p;
						this.total = null;
						this.points = {};
						this.stack = t;
						this.rightCliff = this.leftCliff = 0;
						this.alignOptions = {
							align: m.align || (k ? (g ? "left" : "right") : "center"),
							verticalAlign:
								m.verticalAlign || (k ? "middle" : g ? "bottom" : "top"),
							y: m.y,
							x: m.x,
						};
						this.textAlign =
							m.textAlign || (k ? (g ? "right" : "left") : "center");
					}
					c.prototype.destroy = function () {
						K(this, this.axis);
					};
					c.prototype.render = function (c) {
						var m = this.axis.chart,
							g = this.options,
							p = g.format;
						p = p ? J(p, this, m) : g.formatter.call(this);
						this.label
							? this.label.attr({ text: p, visibility: "hidden" })
							: ((this.label = m.renderer.label(
									p,
									null,
									null,
									g.shape,
									null,
									null,
									g.useHTML,
									!1,
									"stack-labels"
							  )),
							  (p = {
									r: g.borderRadius || 0,
									text: p,
									rotation: g.rotation,
									padding: B(g.padding, 5),
									visibility: "hidden",
							  }),
							  m.styledMode ||
									((p.fill = g.backgroundColor),
									(p.stroke = g.borderColor),
									(p["stroke-width"] = g.borderWidth),
									this.label.css(g.style)),
							  this.label.attr(p),
							  this.label.added || this.label.add(c));
						this.label.labelrank = m.plotHeight;
					};
					c.prototype.setOffset = function (c, m, g, p, t) {
						var k = this.axis,
							a = k.chart;
						p = k.translate(
							k.stacking.usePercentage ? 100 : p ? p : this.total,
							0,
							0,
							0,
							1
						);
						g = k.translate(g ? g : 0);
						g = v(p) && Math.abs(p - g);
						c = B(t, a.xAxis[0].translate(this.x)) + c;
						k = v(p) && this.getStackBox(a, this, c, p, m, g, k);
						m = this.label;
						g = this.isNegative;
						c = "justify" === B(this.options.overflow, "justify");
						var d = this.textAlign;
						m &&
							k &&
							((t = m.getBBox()),
							(p = m.padding),
							(d =
								"left" === d
									? a.inverted
										? -p
										: p
									: "right" === d
									? t.width
									: a.inverted && "center" === d
									? t.width / 2
									: a.inverted
									? g
										? t.width + p
										: -p
									: t.width / 2),
							(g = a.inverted ? t.height / 2 : g ? -p : t.height),
							(this.alignOptions.x = B(this.options.x, 0)),
							(this.alignOptions.y = B(this.options.y, 0)),
							(k.x -= d),
							(k.y -= g),
							m.align(this.alignOptions, null, k),
							a.isInsidePlot(
								m.alignAttr.x + d - this.alignOptions.x,
								m.alignAttr.y + g - this.alignOptions.y
							)
								? m.show()
								: ((m.alignAttr.y = -9999), (c = !1)),
							c &&
								E.prototype.justifyDataLabel.call(
									this.axis,
									m,
									this.alignOptions,
									m.alignAttr,
									t,
									k
								),
							m.attr({ x: m.alignAttr.x, y: m.alignAttr.y }),
							B(!c && this.options.crop, !0) &&
								((a =
									a.isInsidePlot(m.x - p + m.width, m.y) &&
									a.isInsidePlot(m.x + p, m.y)) ||
									m.hide()));
					};
					c.prototype.getStackBox = function (c, m, g, p, t, k, a) {
						var d = m.axis.reversed,
							l = c.inverted,
							h = a.height + a.pos - (l ? c.plotLeft : c.plotTop);
						m = (m.isNegative && !d) || (!m.isNegative && d);
						return {
							x: l
								? m
									? p - a.right
									: p - k + a.pos - c.plotLeft
								: g + c.xAxis[0].transB - c.plotLeft,
							y: l ? a.height - g - t : m ? h - p - k : h - p,
							width: l ? k : t,
							height: l ? t : k,
						};
					};
					return c;
				})();
			r.prototype.getStacks = function () {
				var c = this,
					g = c.inverted;
				c.yAxis.forEach(function (c) {
					c.stacking &&
						c.stacking.stacks &&
						c.hasVisibleSeries &&
						(c.stacking.oldStacks = c.stacking.stacks);
				});
				c.series.forEach(function (m) {
					var t = (m.xAxis && m.xAxis.options) || {};
					!m.options.stacking ||
						(!0 !== m.visible && !1 !== c.options.chart.ignoreHiddenSeries) ||
						(m.stackKey = [
							m.type,
							B(m.options.stack, ""),
							g ? t.top : t.left,
							g ? t.height : t.width,
						].join());
				});
			};
			G.compose(c);
			E.prototype.setStackedPoints = function () {
				if (
					this.options.stacking &&
					(!0 === this.visible ||
						!1 === this.chart.options.chart.ignoreHiddenSeries)
				) {
					var c = this.processedXData,
						g = this.processedYData,
						m = [],
						r = g.length,
						p = this.options,
						E = p.threshold,
						k = B(p.startFromThreshold && E, 0),
						a = p.stack;
					p = p.stacking;
					var d = this.stackKey,
						l = "-" + d,
						h = this.negStacks,
						f = this.yAxis,
						q = f.stacking.stacks,
						u = f.stacking.oldStacks,
						F,
						w;
					f.stacking.stacksTouched += 1;
					for (w = 0; w < r; w++) {
						var H = c[w];
						var y = g[w];
						var Q = this.getStackIndicator(Q, H, this.index);
						var P = Q.key;
						var C = (F = h && y < (k ? 0 : E)) ? l : d;
						q[C] || (q[C] = {});
						q[C][H] ||
							(u[C] && u[C][H]
								? ((q[C][H] = u[C][H]), (q[C][H].total = null))
								: (q[C][H] = new t(f, f.options.stackLabels, F, H, a)));
						C = q[C][H];
						null !== y
							? ((C.points[P] = C.points[this.index] = [B(C.cumulative, k)]),
							  v(C.cumulative) || (C.base = P),
							  (C.touched = f.stacking.stacksTouched),
							  0 < Q.index &&
									!1 === this.singleStacks &&
									(C.points[P][0] = C.points[this.index + "," + H + ",0"][0]))
							: (C.points[P] = C.points[this.index] = null);
						"percent" === p
							? ((F = F ? d : l),
							  h && q[F] && q[F][H]
									? ((F = q[F][H]),
									  (C.total = F.total =
											Math.max(F.total, C.total) + Math.abs(y) || 0))
									: (C.total = D(C.total + (Math.abs(y) || 0))))
							: (C.total = D(C.total + (y || 0)));
						C.cumulative = B(C.cumulative, k) + (y || 0);
						null !== y &&
							(C.points[P].push(C.cumulative), (m[w] = C.cumulative));
					}
					"percent" === p && (f.stacking.usePercentage = !0);
					this.stackedYData = m;
					f.stacking.oldStacks = {};
				}
			};
			E.prototype.modifyStacks = function () {
				var c = this,
					g = c.stackKey,
					m = c.yAxis.stacking.stacks,
					t = c.processedXData,
					p,
					r = c.options.stacking;
				c[r + "Stacker"] &&
					[g, "-" + g].forEach(function (k) {
						for (var a = t.length, d, l; a--; )
							if (
								((d = t[a]),
								(p = c.getStackIndicator(p, d, c.index, k)),
								(l = (d = m[k] && m[k][d]) && d.points[p.key]))
							)
								c[r + "Stacker"](l, d, a);
					});
			};
			E.prototype.percentStacker = function (c, g, m) {
				g = g.total ? 100 / g.total : 0;
				c[0] = D(c[0] * g);
				c[1] = D(c[1] * g);
				this.stackedYData[m] = c[1];
			};
			E.prototype.getStackIndicator = function (c, g, m, t) {
				!v(c) || c.x !== g || (t && c.key !== t)
					? (c = { x: g, index: 0, key: t })
					: c.index++;
				c.key = [m, g, c.index].join();
				return c;
			};
			g.StackItem = t;
			return g.StackItem;
		}
	);
	N(
		v,
		"parts/Dynamics.js",
		[
			v["parts/Globals.js"],
			v["parts/Point.js"],
			v["parts/Time.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, G, r) {
			var v = r.addEvent,
				L = r.animate,
				K = r.createElement,
				J = r.css,
				B = r.defined,
				E = r.erase,
				t = r.error,
				x = r.extend,
				z = r.fireEvent,
				m = r.isArray,
				A = r.isNumber,
				p = r.isObject,
				M = r.isString,
				k = r.merge,
				a = r.objectEach,
				d = r.pick,
				l = r.relativeLength,
				h = r.setAnimation,
				f = r.splat,
				q = c.Axis;
			r = c.Chart;
			var u = c.Series,
				F = c.seriesTypes;
			c.cleanRecursively = function (d, f) {
				var h = {};
				a(d, function (a, l) {
					if (p(d[l], !0) && !d.nodeType && f[l])
						(a = c.cleanRecursively(d[l], f[l])),
							Object.keys(a).length && (h[l] = a);
					else if (p(d[l]) || d[l] !== f[l]) h[l] = d[l];
				});
				return h;
			};
			x(r.prototype, {
				addSeries: function (a, f, h) {
					var l,
						k = this;
					a &&
						((f = d(f, !0)),
						z(k, "addSeries", { options: a }, function () {
							l = k.initSeries(a);
							k.isDirtyLegend = !0;
							k.linkSeries();
							l.enabledDataSorting && l.setData(a.data, !1);
							z(k, "afterAddSeries", { series: l });
							f && k.redraw(h);
						}));
					return l;
				},
				addAxis: function (a, d, f, h) {
					return this.createAxis(d ? "xAxis" : "yAxis", {
						axis: a,
						redraw: f,
						animation: h,
					});
				},
				addColorAxis: function (a, d, f) {
					return this.createAxis("colorAxis", {
						axis: a,
						redraw: d,
						animation: f,
					});
				},
				createAxis: function (a, h) {
					var l = this.options,
						m = "colorAxis" === a,
						u = h.redraw,
						g = h.animation;
					h = k(h.axis, { index: this[a].length, isX: "xAxis" === a });
					var e = m ? new c.ColorAxis(this, h) : new q(this, h);
					l[a] = f(l[a] || {});
					l[a].push(h);
					m &&
						((this.isDirtyLegend = !0),
						this.axes.forEach(function (a) {
							a.series = [];
						}),
						this.series.forEach(function (a) {
							a.bindAxes();
							a.isDirtyData = !0;
						}));
					d(u, !0) && this.redraw(g);
					return e;
				},
				showLoading: function (a) {
					var f = this,
						h = f.options,
						l = f.loadingDiv,
						k = h.loading,
						c = function () {
							l &&
								J(l, {
									left: f.plotLeft + "px",
									top: f.plotTop + "px",
									width: f.plotWidth + "px",
									height: f.plotHeight + "px",
								});
						};
					l ||
						((f.loadingDiv = l = K(
							"div",
							{ className: "highcharts-loading highcharts-loading-hidden" },
							null,
							f.container
						)),
						(f.loadingSpan = K(
							"span",
							{ className: "highcharts-loading-inner" },
							null,
							l
						)),
						v(f, "redraw", c));
					l.className = "highcharts-loading";
					f.loadingSpan.innerHTML = d(a, h.lang.loading, "");
					f.styledMode ||
						(J(l, x(k.style, { zIndex: 10 })),
						J(f.loadingSpan, k.labelStyle),
						f.loadingShown ||
							(J(l, { opacity: 0, display: "" }),
							L(
								l,
								{ opacity: k.style.opacity || 0.5 },
								{ duration: k.showDuration || 0 }
							)));
					f.loadingShown = !0;
					c();
				},
				hideLoading: function () {
					var a = this.options,
						d = this.loadingDiv;
					d &&
						((d.className = "highcharts-loading highcharts-loading-hidden"),
						this.styledMode ||
							L(
								d,
								{ opacity: 0 },
								{
									duration: a.loading.hideDuration || 100,
									complete: function () {
										J(d, { display: "none" });
									},
								}
							));
					this.loadingShown = !1;
				},
				propsRequireDirtyBox: "backgroundColor borderColor borderWidth borderRadius plotBackgroundColor plotBackgroundImage plotBorderColor plotBorderWidth plotShadow shadow".split(
					" "
				),
				propsRequireReflow: "margin marginTop marginRight marginBottom marginLeft spacing spacingTop spacingRight spacingBottom spacingLeft".split(
					" "
				),
				propsRequireUpdateSeries: "chart.inverted chart.polar chart.ignoreHiddenSeries chart.type colors plotOptions time tooltip".split(
					" "
				),
				collectionsWithUpdate: ["xAxis", "yAxis", "zAxis", "series"],
				update: function (h, m, u, q) {
					var g = this,
						w = {
							credits: "addCredits",
							title: "setTitle",
							subtitle: "setSubtitle",
							caption: "setCaption",
						},
						e,
						b,
						n,
						p = h.isResponsiveOptions,
						y = [];
					z(g, "update", { options: h });
					p || g.setResponsive(!1, !0);
					h = c.cleanRecursively(h, g.options);
					k(!0, g.userOptions, h);
					if ((e = h.chart)) {
						k(!0, g.options.chart, e);
						"className" in e && g.setClassName(e.className);
						"reflow" in e && g.setReflow(e.reflow);
						if ("inverted" in e || "polar" in e || "type" in e) {
							g.propFromSeries();
							var t = !0;
						}
						"alignTicks" in e && (t = !0);
						a(e, function (a, e) {
							-1 !== g.propsRequireUpdateSeries.indexOf("chart." + e) &&
								(b = !0);
							-1 !== g.propsRequireDirtyBox.indexOf(e) && (g.isDirtyBox = !0);
							p || -1 === g.propsRequireReflow.indexOf(e) || (n = !0);
						});
						!g.styledMode && "style" in e && g.renderer.setStyle(e.style);
					}
					!g.styledMode && h.colors && (this.options.colors = h.colors);
					h.plotOptions && k(!0, this.options.plotOptions, h.plotOptions);
					h.time && this.time === c.time && (this.time = new G(h.time));
					a(h, function (a, e) {
						if (g[e] && "function" === typeof g[e].update) g[e].update(a, !1);
						else if ("function" === typeof g[w[e]]) g[w[e]](a);
						"chart" !== e &&
							-1 !== g.propsRequireUpdateSeries.indexOf(e) &&
							(b = !0);
					});
					this.collectionsWithUpdate.forEach(function (a) {
						if (h[a]) {
							if ("series" === a) {
								var b = [];
								g[a].forEach(function (a, e) {
									a.options.isInternal || b.push(d(a.options.index, e));
								});
							}
							f(h[a]).forEach(function (e, d) {
								(d = (B(e.id) && g.get(e.id)) || g[a][b ? b[d] : d]) &&
									d.coll === a &&
									(d.update(e, !1), u && (d.touched = !0));
								!d &&
									u &&
									g.collectionsWithInit[a] &&
									(g.collectionsWithInit[a][0].apply(
										g,
										[e].concat(g.collectionsWithInit[a][1] || []).concat([!1])
									).touched = !0);
							});
							u &&
								g[a].forEach(function (a) {
									a.touched || a.options.isInternal
										? delete a.touched
										: y.push(a);
								});
						}
					});
					y.forEach(function (a) {
						a.remove && a.remove(!1);
					});
					t &&
						g.axes.forEach(function (a) {
							a.update({}, !1);
						});
					b &&
						g.getSeriesOrderByLinks().forEach(function (a) {
							a.chart && a.update({}, !1);
						}, this);
					h.loading && k(!0, g.options.loading, h.loading);
					t = e && e.width;
					e = e && e.height;
					M(e) && (e = l(e, t || g.chartWidth));
					n || (A(t) && t !== g.chartWidth) || (A(e) && e !== g.chartHeight)
						? g.setSize(t, e, q)
						: d(m, !0) && g.redraw(q);
					z(g, "afterUpdate", { options: h, redraw: m, animation: q });
				},
				setSubtitle: function (a, d) {
					this.applyDescription("subtitle", a);
					this.layOutTitles(d);
				},
				setCaption: function (a, d) {
					this.applyDescription("caption", a);
					this.layOutTitles(d);
				},
			});
			r.prototype.collectionsWithInit = {
				xAxis: [r.prototype.addAxis, [!0]],
				yAxis: [r.prototype.addAxis, [!1]],
				series: [r.prototype.addSeries],
			};
			x(g.prototype, {
				update: function (a, f, h, l) {
					function k() {
						c.applyOptions(a);
						var l = b && c.hasDummyGraphic;
						l = null === c.y ? !l : l;
						b && l && ((c.graphic = b.destroy()), delete c.hasDummyGraphic);
						p(a, !0) &&
							(b &&
								b.element &&
								a &&
								a.marker &&
								"undefined" !== typeof a.marker.symbol &&
								(c.graphic = b.destroy()),
							a &&
								a.dataLabels &&
								c.dataLabel &&
								(c.dataLabel = c.dataLabel.destroy()),
							c.connector && (c.connector = c.connector.destroy()));
						m = c.index;
						e.updateParallelArrays(c, m);
						g.data[m] =
							p(g.data[m], !0) || p(a, !0) ? c.options : d(a, g.data[m]);
						e.isDirty = e.isDirtyData = !0;
						!e.fixedBox && e.hasCartesianSeries && (u.isDirtyBox = !0);
						"point" === g.legendType && (u.isDirtyLegend = !0);
						f && u.redraw(h);
					}
					var c = this,
						e = c.series,
						b = c.graphic,
						m,
						u = e.chart,
						g = e.options;
					f = d(f, !0);
					!1 === l ? k() : c.firePointEvent("update", { options: a }, k);
				},
				remove: function (a, d) {
					this.series.removePoint(this.series.data.indexOf(this), a, d);
				},
			});
			x(u.prototype, {
				addPoint: function (a, f, h, l, k) {
					var c = this.options,
						e = this.data,
						b = this.chart,
						m = this.xAxis;
					m = m && m.hasNames && m.names;
					var u = c.data,
						g = this.xData,
						q;
					f = d(f, !0);
					var w = { series: this };
					this.pointClass.prototype.applyOptions.apply(w, [a]);
					var p = w.x;
					var y = g.length;
					if (this.requireSorting && p < g[y - 1])
						for (q = !0; y && g[y - 1] > p; ) y--;
					this.updateParallelArrays(w, "splice", y, 0, 0);
					this.updateParallelArrays(w, y);
					m && w.name && (m[p] = w.name);
					u.splice(y, 0, a);
					q && (this.data.splice(y, 0, null), this.processData());
					"point" === c.legendType && this.generatePoints();
					h &&
						(e[0] && e[0].remove
							? e[0].remove(!1)
							: (e.shift(), this.updateParallelArrays(w, "shift"), u.shift()));
					!1 !== k && z(this, "addPoint", { point: w });
					this.isDirtyData = this.isDirty = !0;
					f && b.redraw(l);
				},
				removePoint: function (a, f, l) {
					var k = this,
						c = k.data,
						m = c[a],
						e = k.points,
						b = k.chart,
						u = function () {
							e && e.length === c.length && e.splice(a, 1);
							c.splice(a, 1);
							k.options.data.splice(a, 1);
							k.updateParallelArrays(m || { series: k }, "splice", a, 1);
							m && m.destroy();
							k.isDirty = !0;
							k.isDirtyData = !0;
							f && b.redraw();
						};
					h(l, b);
					f = d(f, !0);
					m ? m.firePointEvent("remove", null, u) : u();
				},
				remove: function (a, f, h, l) {
					function k() {
						c.destroy(l);
						c.remove = null;
						e.isDirtyLegend = e.isDirtyBox = !0;
						e.linkSeries();
						d(a, !0) && e.redraw(f);
					}
					var c = this,
						e = c.chart;
					!1 !== h ? z(c, "remove", null, k) : k();
				},
				update: function (a, f) {
					a = c.cleanRecursively(a, this.userOptions);
					z(this, "update", { options: a });
					var h = this,
						l = h.chart,
						m = h.userOptions,
						u = h.initialType || h.type,
						e = a.type || m.type || l.options.chart.type,
						b = !(
							this.hasDerivedData ||
							a.dataGrouping ||
							(e && e !== this.type) ||
							"undefined" !== typeof a.pointStart ||
							a.pointInterval ||
							a.pointIntervalUnit ||
							a.keys
						),
						g = F[u].prototype,
						q,
						w = ["group", "markerGroup", "dataLabelsGroup", "transformGroup"],
						p = ["eventOptions", "navigatorSeries", "baseSeries"],
						r = h.finishedAnimating && { animation: !1 },
						A = {};
					b &&
						(p.push(
							"data",
							"isDirtyData",
							"points",
							"processedXData",
							"processedYData",
							"xIncrement",
							"_hasPointMarkers",
							"_hasPointLabels",
							"mapMap",
							"mapData",
							"minY",
							"maxY",
							"minX",
							"maxX"
						),
						!1 !== a.visible && p.push("area", "graph"),
						h.parallelArrays.forEach(function (a) {
							p.push(a + "Data");
						}),
						a.data &&
							(a.dataSorting && x(h.options.dataSorting, a.dataSorting),
							this.setData(a.data, !1)));
					a = k(
						m,
						r,
						{
							index: "undefined" === typeof m.index ? h.index : m.index,
							pointStart: d(m.pointStart, h.xData[0]),
						},
						!b && { data: h.options.data },
						a
					);
					b && a.data && (a.data = h.options.data);
					p = w.concat(p);
					p.forEach(function (a) {
						p[a] = h[a];
						delete h[a];
					});
					h.remove(!1, null, !1, !0);
					for (q in g) h[q] = void 0;
					F[e || u]
						? x(h, F[e || u].prototype)
						: t(17, !0, l, { missingModuleFor: e || u });
					p.forEach(function (a) {
						h[a] = p[a];
					});
					h.init(l, a);
					if (b && this.points) {
						var H = h.options;
						!1 === H.visible
							? ((A.graphic = 1), (A.dataLabel = 1))
							: h._hasPointLabels ||
							  ((e = H.marker),
							  (g = H.dataLabels),
							  e && (!1 === e.enabled || "symbol" in e) && (A.graphic = 1),
							  g && !1 === g.enabled && (A.dataLabel = 1));
						this.points.forEach(function (a) {
							a &&
								a.series &&
								(a.resolveColor(),
								Object.keys(A).length && a.destroyElements(A),
								!1 === H.showInLegend &&
									a.legendItem &&
									l.legend.destroyItem(a));
						}, this);
					}
					a.zIndex !== m.zIndex &&
						w.forEach(function (b) {
							h[b] && h[b].attr({ zIndex: a.zIndex });
						});
					h.initialType = u;
					l.linkSeries();
					z(this, "afterUpdate");
					d(f, !0) && l.redraw(b ? void 0 : !1);
				},
				setName: function (a) {
					this.name = this.options.name = this.userOptions.name = a;
					this.chart.isDirtyLegend = !0;
				},
			});
			x(q.prototype, {
				update: function (f, h) {
					var l = this.chart,
						c = (f && f.events) || {};
					f = k(this.userOptions, f);
					l.options[this.coll].indexOf &&
						(l.options[this.coll][
							l.options[this.coll].indexOf(this.userOptions)
						] = f);
					a(l.options[this.coll].events, function (a, d) {
						"undefined" === typeof c[d] && (c[d] = void 0);
					});
					this.destroy(!0);
					this.init(l, x(f, { events: c }));
					l.isDirtyBox = !0;
					d(h, !0) && l.redraw();
				},
				remove: function (a) {
					for (
						var f = this.chart, h = this.coll, l = this.series, k = l.length;
						k--;

					)
						l[k] && l[k].remove(!1);
					E(f.axes, this);
					E(f[h], this);
					m(f.options[h])
						? f.options[h].splice(this.options.index, 1)
						: delete f.options[h];
					f[h].forEach(function (a, e) {
						a.options.index = a.userOptions.index = e;
					});
					this.destroy();
					f.isDirtyBox = !0;
					d(a, !0) && f.redraw();
				},
				setTitle: function (a, d) {
					this.update({ title: a }, d);
				},
				setCategories: function (a, d) {
					this.update({ categories: a }, d);
				},
			});
		}
	);
	N(
		v,
		"parts/AreaSeries.js",
		[
			v["parts/Globals.js"],
			v["parts/Color.js"],
			v["mixins/legend-symbol.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, G, r) {
			var v = g.parse,
				L = r.objectEach,
				K = r.pick;
			g = r.seriesType;
			var J = c.Series;
			g(
				"area",
				"line",
				{ softThreshold: !1, threshold: 0 },
				{
					singleStacks: !1,
					getStackPoints: function (c) {
						var g = [],
							t = [],
							r = this.xAxis,
							z = this.yAxis,
							m = z.stacking.stacks[this.stackKey],
							A = {},
							p = this.index,
							B = z.series,
							k = B.length,
							a = K(z.options.reversedStacks, !0) ? 1 : -1,
							d;
						c = c || this.points;
						if (this.options.stacking) {
							for (d = 0; d < c.length; d++)
								(c[d].leftNull = c[d].rightNull = void 0), (A[c[d].x] = c[d]);
							L(m, function (a, d) {
								null !== a.total && t.push(d);
							});
							t.sort(function (a, d) {
								return a - d;
							});
							var l = B.map(function (a) {
								return a.visible;
							});
							t.forEach(function (h, f) {
								var c = 0,
									u,
									F;
								if (A[h] && !A[h].isNull)
									g.push(A[h]),
										[-1, 1].forEach(function (c) {
											var g = 1 === c ? "rightNull" : "leftNull",
												q = 0,
												w = m[t[f + c]];
											if (w)
												for (d = p; 0 <= d && d < k; )
													(u = w.points[d]),
														u ||
															(d === p
																? (A[h][g] = !0)
																: l[d] &&
																  (F = m[h].points[d]) &&
																  (q -= F[1] - F[0])),
														(d += a);
											A[h][1 === c ? "rightCliff" : "leftCliff"] = q;
										});
								else {
									for (d = p; 0 <= d && d < k; ) {
										if ((u = m[h].points[d])) {
											c = u[1];
											break;
										}
										d += a;
									}
									c = z.translate(c, 0, 1, 0, 1);
									g.push({
										isNull: !0,
										plotX: r.translate(h, 0, 0, 0, 1),
										x: h,
										plotY: c,
										yBottom: c,
									});
								}
							});
						}
						return g;
					},
					getGraphPath: function (c) {
						var g = J.prototype.getGraphPath,
							t = this.options,
							r = t.stacking,
							z = this.yAxis,
							m,
							A = [],
							p = [],
							B = this.index,
							k = z.stacking.stacks[this.stackKey],
							a = t.threshold,
							d = Math.round(z.getThreshold(t.threshold));
						t = K(t.connectNulls, "percent" === r);
						var l = function (h, l, m) {
							var u = c[h];
							h = r && k[u.x].points[B];
							var g = u[m + "Null"] || 0;
							m = u[m + "Cliff"] || 0;
							u = !0;
							if (m || g) {
								var q = (g ? h[0] : h[1]) + m;
								var w = h[0] + m;
								u = !!g;
							} else !r && c[l] && c[l].isNull && (q = w = a);
							"undefined" !== typeof q &&
								(p.push({
									plotX: f,
									plotY: null === q ? d : z.getThreshold(q),
									isNull: u,
									isCliff: !0,
								}),
								A.push({
									plotX: f,
									plotY: null === w ? d : z.getThreshold(w),
									doCurve: !1,
								}));
						};
						c = c || this.points;
						r && (c = this.getStackPoints(c));
						for (m = 0; m < c.length; m++) {
							r ||
								(c[m].leftCliff = c[m].rightCliff = c[m].leftNull = c[
									m
								].rightNull = void 0);
							var h = c[m].isNull;
							var f = K(c[m].rectPlotX, c[m].plotX);
							var q = K(c[m].yBottom, d);
							if (!h || t)
								t || l(m, m - 1, "left"),
									(h && !r && t) ||
										(p.push(c[m]), A.push({ x: m, plotX: f, plotY: q })),
									t || l(m, m + 1, "right");
						}
						m = g.call(this, p, !0, !0);
						A.reversed = !0;
						h = g.call(this, A, !0, !0);
						(q = h[0]) && "M" === q[0] && (h[0] = ["L", q[1], q[2]]);
						h = m.concat(h);
						g = g.call(this, p, !1, t);
						h.xMap = m.xMap;
						this.areaPath = h;
						return g;
					},
					drawGraph: function () {
						this.areaPath = [];
						J.prototype.drawGraph.apply(this);
						var c = this,
							g = this.areaPath,
							t = this.options,
							r = [["area", "highcharts-area", this.color, t.fillColor]];
						this.zones.forEach(function (g, m) {
							r.push([
								"zone-area-" + m,
								"highcharts-area highcharts-zone-area-" + m + " " + g.className,
								g.color || c.color,
								g.fillColor || t.fillColor,
							]);
						});
						r.forEach(function (r) {
							var m = r[0],
								z = c[m],
								p = z ? "animate" : "attr",
								x = {};
							z
								? ((z.endX = c.preventGraphAnimation ? null : g.xMap),
								  z.animate({ d: g }))
								: ((x.zIndex = 0),
								  (z = c[m] = c.chart.renderer
										.path(g)
										.addClass(r[1])
										.add(c.group)),
								  (z.isArea = !0));
							c.chart.styledMode ||
								(x.fill = K(
									r[3],
									v(r[2]).setOpacity(K(t.fillOpacity, 0.75)).get()
								));
							z[p](x);
							z.startX = g.xMap;
							z.shiftUnit = t.step ? 2 : 1;
						});
					},
					drawLegendSymbol: G.drawRectangle,
				}
			);
			("");
		}
	);
	N(v, "parts/SplineSeries.js", [v["parts/Utilities.js"]], function (c) {
		var g = c.pick;
		c = c.seriesType;
		c(
			"spline",
			"line",
			{},
			{
				getPointSpline: function (c, r, v) {
					var G = r.plotX || 0,
						D = r.plotY || 0,
						J = c[v - 1];
					v = c[v + 1];
					if (
						J &&
						!J.isNull &&
						!1 !== J.doCurve &&
						!r.isCliff &&
						v &&
						!v.isNull &&
						!1 !== v.doCurve &&
						!r.isCliff
					) {
						c = J.plotY || 0;
						var B = v.plotX || 0;
						v = v.plotY || 0;
						var E = 0;
						var t = (1.5 * G + (J.plotX || 0)) / 2.5;
						var x = (1.5 * D + c) / 2.5;
						B = (1.5 * G + B) / 2.5;
						var z = (1.5 * D + v) / 2.5;
						B !== t && (E = ((z - x) * (B - G)) / (B - t) + D - z);
						x += E;
						z += E;
						x > c && x > D
							? ((x = Math.max(c, D)), (z = 2 * D - x))
							: x < c && x < D && ((x = Math.min(c, D)), (z = 2 * D - x));
						z > v && z > D
							? ((z = Math.max(v, D)), (x = 2 * D - z))
							: z < v && z < D && ((z = Math.min(v, D)), (x = 2 * D - z));
						r.rightContX = B;
						r.rightContY = z;
					}
					r = [
						"C",
						g(J.rightContX, J.plotX, 0),
						g(J.rightContY, J.plotY, 0),
						g(t, G, 0),
						g(x, D, 0),
						G,
						D,
					];
					J.rightContX = J.rightContY = void 0;
					return r;
				},
			}
		);
		("");
	});
	N(
		v,
		"parts/AreaSplineSeries.js",
		[
			v["parts/Globals.js"],
			v["mixins/legend-symbol.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, v) {
			v = v.seriesType;
			var r = c.seriesTypes.area.prototype;
			v("areaspline", "spline", c.defaultPlotOptions.area, {
				getStackPoints: r.getStackPoints,
				getGraphPath: r.getGraphPath,
				drawGraph: r.drawGraph,
				drawLegendSymbol: g.drawRectangle,
			});
			("");
		}
	);
	N(
		v,
		"parts/ColumnSeries.js",
		[
			v["parts/Globals.js"],
			v["parts/Color.js"],
			v["mixins/legend-symbol.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, v, r) {
			"";
			var G = g.parse,
				L = r.animObject,
				K = r.clamp,
				J = r.defined,
				B = r.extend,
				E = r.isNumber,
				t = r.merge,
				x = r.pick;
			g = r.seriesType;
			var z = c.Series;
			g(
				"column",
				"line",
				{
					borderRadius: 0,
					groupPadding: 0.2,
					marker: null,
					pointPadding: 0.1,
					minPointLength: 0,
					cropThreshold: 50,
					pointRange: null,
					states: {
						hover: { halo: !1, brightness: 0.1 },
						select: { color: "#cccccc", borderColor: "#000000" },
					},
					dataLabels: { align: null, verticalAlign: null, y: null },
					softThreshold: !1,
					startFromThreshold: !0,
					stickyTracking: !1,
					tooltip: { distance: 6 },
					threshold: 0,
					borderColor: "#ffffff",
				},
				{
					cropShoulder: 0,
					directTouch: !0,
					trackerGroups: ["group", "dataLabelsGroup"],
					negStacks: !0,
					init: function () {
						z.prototype.init.apply(this, arguments);
						var c = this,
							g = c.chart;
						g.hasRendered &&
							g.series.forEach(function (m) {
								m.type === c.type && (m.isDirty = !0);
							});
					},
					getColumnMetrics: function () {
						var c = this,
							g = c.options,
							p = c.xAxis,
							t = c.yAxis,
							k = p.options.reversedStacks;
						k = (p.reversed && !k) || (!p.reversed && k);
						var a,
							d = {},
							l = 0;
						!1 === g.grouping
							? (l = 1)
							: c.chart.series.forEach(function (f) {
									var h = f.yAxis,
										k = f.options;
									if (
										f.type === c.type &&
										(f.visible || !c.chart.options.chart.ignoreHiddenSeries) &&
										t.len === h.len &&
										t.pos === h.pos
									) {
										if (k.stacking) {
											a = f.stackKey;
											"undefined" === typeof d[a] && (d[a] = l++);
											var m = d[a];
										} else !1 !== k.grouping && (m = l++);
										f.columnIndex = m;
									}
							  });
						var h = Math.min(
								Math.abs(p.transA) *
									((p.ordinal && p.ordinal.slope) ||
										g.pointRange ||
										p.closestPointRange ||
										p.tickInterval ||
										1),
								p.len
							),
							f = h * g.groupPadding,
							q = (h - 2 * f) / (l || 1);
						g = Math.min(
							g.maxPointWidth || p.len,
							x(g.pointWidth, q * (1 - 2 * g.pointPadding))
						);
						c.columnMetrics = {
							width: g,
							offset:
								(q - g) / 2 +
								(f + ((c.columnIndex || 0) + (k ? 1 : 0)) * q - h / 2) *
									(k ? -1 : 1),
						};
						return c.columnMetrics;
					},
					crispCol: function (c, g, p, t) {
						var k = this.chart,
							a = this.borderWidth,
							d = -(a % 2 ? 0.5 : 0);
						a = a % 2 ? 0.5 : 1;
						k.inverted && k.renderer.isVML && (a += 1);
						this.options.crisp &&
							((p = Math.round(c + p) + d), (c = Math.round(c) + d), (p -= c));
						t = Math.round(g + t) + a;
						d = 0.5 >= Math.abs(g) && 0.5 < t;
						g = Math.round(g) + a;
						t -= g;
						d && t && (--g, (t += 1));
						return { x: c, y: g, width: p, height: t };
					},
					translate: function () {
						var c = this,
							g = c.chart,
							p = c.options,
							t = (c.dense = 2 > c.closestPointRange * c.xAxis.transA);
						t = c.borderWidth = x(p.borderWidth, t ? 0 : 1);
						var k = c.xAxis,
							a = c.yAxis,
							d = p.threshold,
							l = (c.translatedThreshold = a.getThreshold(d)),
							h = x(p.minPointLength, 5),
							f = c.getColumnMetrics(),
							q = f.width,
							u = (c.barW = Math.max(q, 1 + 2 * t)),
							F = (c.pointXOffset = f.offset),
							w = c.dataMin,
							r = c.dataMax;
						g.inverted && (l -= 0.5);
						p.pointPadding && (u = Math.ceil(u));
						z.prototype.translate.apply(c);
						c.points.forEach(function (f) {
							var m = x(f.yBottom, l),
								p = 999 + Math.abs(m),
								t = q,
								e = f.plotX;
							p = K(f.plotY, -p, a.len + p);
							var b = f.plotX + F,
								n = u,
								y = Math.min(p, m),
								z = Math.max(p, m) - y;
							if (h && Math.abs(z) < h) {
								z = h;
								var H =
									(!a.reversed && !f.negative) || (a.reversed && f.negative);
								E(d) &&
									E(r) &&
									f.y === d &&
									r <= d &&
									(a.min || 0) < d &&
									w !== r &&
									(H = !H);
								y = Math.abs(y - l) > h ? m - h : l - (H ? h : 0);
							}
							J(f.options.pointWidth) &&
								((t = n = Math.ceil(f.options.pointWidth)),
								(b -= Math.round((t - q) / 2)));
							f.barX = b;
							f.pointWidth = t;
							f.tooltipPos = g.inverted
								? [
										a.len + a.pos - g.plotLeft - p,
										k.len + k.pos - g.plotTop - (e || 0) - F - n / 2,
										z,
								  ]
								: [b + n / 2, p + a.pos - g.plotTop, z];
							f.shapeType = c.pointClass.prototype.shapeType || "rect";
							f.shapeArgs = c.crispCol.apply(
								c,
								f.isNull ? [b, l, n, 0] : [b, y, n, z]
							);
						});
					},
					getSymbol: c.noop,
					drawLegendSymbol: v.drawRectangle,
					drawGraph: function () {
						this.group[this.dense ? "addClass" : "removeClass"](
							"highcharts-dense-data"
						);
					},
					pointAttribs: function (c, g) {
						var m = this.options,
							r = this.pointAttrToOptions || {};
						var k = r.stroke || "borderColor";
						var a = r["stroke-width"] || "borderWidth",
							d = (c && c.color) || this.color,
							l = (c && c[k]) || m[k] || this.color || d,
							h = (c && c[a]) || m[a] || this[a] || 0;
						r = (c && c.options.dashStyle) || m.dashStyle;
						var f = x(c && c.opacity, m.opacity, 1);
						if (c && this.zones.length) {
							var q = c.getZone();
							d =
								c.options.color ||
								(q && (q.color || c.nonZonedColor)) ||
								this.color;
							q &&
								((l = q.borderColor || l),
								(r = q.dashStyle || r),
								(h = q.borderWidth || h));
						}
						g &&
							c &&
							((c = t(
								m.states[g],
								(c.options.states && c.options.states[g]) || {}
							)),
							(g = c.brightness),
							(d =
								c.color ||
								("undefined" !== typeof g &&
									G(d).brighten(c.brightness).get()) ||
								d),
							(l = c[k] || l),
							(h = c[a] || h),
							(r = c.dashStyle || r),
							(f = x(c.opacity, f)));
						k = { fill: d, stroke: l, "stroke-width": h, opacity: f };
						r && (k.dashstyle = r);
						return k;
					},
					drawPoints: function () {
						var c = this,
							g = this.chart,
							p = c.options,
							r = g.renderer,
							k = p.animationLimit || 250,
							a;
						c.points.forEach(function (d) {
							var l = d.graphic,
								h = !!l,
								f = l && g.pointCount < k ? "animate" : "attr";
							if (E(d.plotY) && null !== d.y) {
								a = d.shapeArgs;
								l && d.hasNewShapeType() && (l = l.destroy());
								c.enabledDataSorting &&
									(d.startXPos = c.xAxis.reversed
										? -(a ? a.width : 0)
										: c.xAxis.width);
								l ||
									((d.graphic = l = r[d.shapeType](a).add(
										d.group || c.group
									)) &&
										c.enabledDataSorting &&
										g.hasRendered &&
										g.pointCount < k &&
										(l.attr({ x: d.startXPos }), (h = !0), (f = "animate")));
								if (l && h) l[f](t(a));
								if (p.borderRadius) l[f]({ r: p.borderRadius });
								g.styledMode ||
									l[f](c.pointAttribs(d, d.selected && "select")).shadow(
										!1 !== d.allowShadow && p.shadow,
										null,
										p.stacking && !p.borderRadius
									);
								l.addClass(d.getClassName(), !0);
							} else l && (d.graphic = l.destroy());
						});
					},
					animate: function (c) {
						var g = this,
							m = this.yAxis,
							t = g.options,
							k = this.chart.inverted,
							a = {},
							d = k ? "translateX" : "translateY";
						if (c)
							(a.scaleY = 0.001),
								(c = K(m.toPixels(t.threshold), m.pos, m.pos + m.len)),
								k ? (a.translateX = c - m.len) : (a.translateY = c),
								g.clipBox && g.setClip(),
								g.group.attr(a);
						else {
							var l = g.group.attr(d);
							g.group.animate(
								{ scaleY: 1 },
								B(L(g.options.animation), {
									step: function (h, f) {
										g.group &&
											((a[d] = l + f.pos * (m.pos - l)), g.group.attr(a));
									},
								})
							);
						}
					},
					remove: function () {
						var c = this,
							g = c.chart;
						g.hasRendered &&
							g.series.forEach(function (g) {
								g.type === c.type && (g.isDirty = !0);
							});
						z.prototype.remove.apply(c, arguments);
					},
				}
			);
			("");
		}
	);
	N(v, "parts/BarSeries.js", [v["parts/Utilities.js"]], function (c) {
		c = c.seriesType;
		c("bar", "column", null, { inverted: !0 });
		("");
	});
	N(
		v,
		"parts/ScatterSeries.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var v = g.addEvent;
			g = g.seriesType;
			var r = c.Series;
			g(
				"scatter",
				"line",
				{
					lineWidth: 0,
					findNearestPointBy: "xy",
					jitter: { x: 0, y: 0 },
					marker: { enabled: !0 },
					tooltip: {
						headerFormat:
							'<span style="color:{point.color}">\u25cf</span> <span style="font-size: 10px"> {series.name}</span><br/>',
						pointFormat: "x: <b>{point.x}</b><br/>y: <b>{point.y}</b><br/>",
					},
				},
				{
					sorted: !1,
					requireSorting: !1,
					noSharedTooltip: !0,
					trackerGroups: ["group", "markerGroup", "dataLabelsGroup"],
					takeOrdinalPosition: !1,
					drawGraph: function () {
						this.options.lineWidth && r.prototype.drawGraph.call(this);
					},
					applyJitter: function () {
						var c = this,
							g = this.options.jitter,
							r = this.points.length;
						g &&
							this.points.forEach(function (v, B) {
								["x", "y"].forEach(function (E, t) {
									var x = "plot" + E.toUpperCase();
									if (g[E] && !v.isNull) {
										var z = c[E + "Axis"];
										var m = g[E] * z.transA;
										if (z && !z.isLog) {
											var A = Math.max(0, v[x] - m);
											z = Math.min(z.len, v[x] + m);
											t = 1e4 * Math.sin(B + t * r);
											v[x] = A + (z - A) * (t - Math.floor(t));
											"x" === E && (v.clientX = v.plotX);
										}
									}
								});
							});
					},
				}
			);
			v(r, "afterTranslate", function () {
				this.applyJitter && this.applyJitter();
			});
			("");
		}
	);
	N(
		v,
		"mixins/centered-series.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var v = g.isNumber,
				r = g.pick,
				D = g.relativeLength,
				L = c.deg2rad;
			c.CenteredSeriesMixin = {
				getCenter: function () {
					var c = this.options,
						g = this.chart,
						B = 2 * (c.slicedOffset || 0),
						v = g.plotWidth - 2 * B,
						t = g.plotHeight - 2 * B,
						x = c.center,
						z = Math.min(v, t),
						m = c.size,
						A = c.innerSize || 0;
					"string" === typeof m && (m = parseFloat(m));
					"string" === typeof A && (A = parseFloat(A));
					c = [
						r(x[0], "50%"),
						r(x[1], "50%"),
						r(m && 0 > m ? void 0 : c.size, "100%"),
						r(A && 0 > A ? void 0 : c.innerSize || 0, "0%"),
					];
					g.angular && (c[3] = 0);
					for (x = 0; 4 > x; ++x)
						(m = c[x]),
							(g = 2 > x || (2 === x && /%$/.test(m))),
							(c[x] = D(m, [v, t, z, c[2]][x]) + (g ? B : 0));
					c[3] > c[2] && (c[3] = c[2]);
					return c;
				},
				getStartAndEndRadians: function (c, g) {
					c = v(c) ? c : 0;
					g = v(g) && g > c && 360 > g - c ? g : c + 360;
					return { start: L * (c + -90), end: L * (g + -90) };
				},
			};
		}
	);
	N(
		v,
		"parts/PieSeries.js",
		[
			v["parts/Globals.js"],
			v["mixins/legend-symbol.js"],
			v["parts/Point.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, v, r) {
			var D = r.addEvent,
				G = r.clamp,
				K = r.defined,
				J = r.fireEvent,
				B = r.isNumber,
				E = r.merge,
				t = r.pick,
				x = r.relativeLength,
				z = r.seriesType,
				m = r.setAnimation;
			r = c.CenteredSeriesMixin;
			var A = r.getStartAndEndRadians,
				p = c.noop,
				M = c.Series;
			z(
				"pie",
				"line",
				{
					center: [null, null],
					clip: !1,
					colorByPoint: !0,
					dataLabels: {
						allowOverlap: !0,
						connectorPadding: 5,
						connectorShape: "fixedOffset",
						crookDistance: "70%",
						distance: 30,
						enabled: !0,
						formatter: function () {
							return this.point.isNull ? void 0 : this.point.name;
						},
						softConnector: !0,
						x: 0,
					},
					fillColor: void 0,
					ignoreHiddenPoint: !0,
					inactiveOtherPoints: !0,
					legendType: "point",
					marker: null,
					size: null,
					showInLegend: !1,
					slicedOffset: 10,
					stickyTracking: !1,
					tooltip: { followPointer: !0 },
					borderColor: "#ffffff",
					borderWidth: 1,
					lineWidth: void 0,
					states: { hover: { brightness: 0.1 } },
				},
				{
					isCartesian: !1,
					requireSorting: !1,
					directTouch: !0,
					noSharedTooltip: !0,
					trackerGroups: ["group", "dataLabelsGroup"],
					axisTypes: [],
					pointAttribs: c.seriesTypes.column.prototype.pointAttribs,
					animate: function (c) {
						var a = this,
							d = a.points,
							l = a.startAngleRad;
						c ||
							d.forEach(function (d) {
								var f = d.graphic,
									h = d.shapeArgs;
								f &&
									h &&
									(f.attr({
										r: t(d.startR, a.center && a.center[3] / 2),
										start: l,
										end: l,
									}),
									f.animate(
										{ r: h.r, start: h.start, end: h.end },
										a.options.animation
									));
							});
					},
					hasData: function () {
						return !!this.processedXData.length;
					},
					updateTotals: function () {
						var c,
							a = 0,
							d = this.points,
							l = d.length,
							h = this.options.ignoreHiddenPoint;
						for (c = 0; c < l; c++) {
							var f = d[c];
							a += h && !f.visible ? 0 : f.isNull ? 0 : f.y;
						}
						this.total = a;
						for (c = 0; c < l; c++)
							(f = d[c]),
								(f.percentage =
									0 < a && (f.visible || !h) ? (f.y / a) * 100 : 0),
								(f.total = a);
					},
					generatePoints: function () {
						M.prototype.generatePoints.call(this);
						this.updateTotals();
					},
					getX: function (c, a, d) {
						var l = this.center,
							h = this.radii ? this.radii[d.index] : l[2] / 2;
						c = Math.asin(G((c - l[1]) / (h + d.labelDistance), -1, 1));
						return (
							l[0] +
							(a ? -1 : 1) * Math.cos(c) * (h + d.labelDistance) +
							(0 < d.labelDistance
								? (a ? -1 : 1) * this.options.dataLabels.padding
								: 0)
						);
					},
					translate: function (c) {
						this.generatePoints();
						var a = 0,
							d = this.options,
							l = d.slicedOffset,
							h = l + (d.borderWidth || 0),
							f = A(d.startAngle, d.endAngle),
							k = (this.startAngleRad = f.start);
						f = (this.endAngleRad = f.end) - k;
						var g = this.points,
							m = d.dataLabels.distance;
						d = d.ignoreHiddenPoint;
						var p,
							r = g.length;
						c || (this.center = c = this.getCenter());
						for (p = 0; p < r; p++) {
							var y = g[p];
							var z = k + a * f;
							if (!d || y.visible) a += y.percentage / 100;
							var B = k + a * f;
							y.shapeType = "arc";
							y.shapeArgs = {
								x: c[0],
								y: c[1],
								r: c[2] / 2,
								innerR: c[3] / 2,
								start: Math.round(1e3 * z) / 1e3,
								end: Math.round(1e3 * B) / 1e3,
							};
							y.labelDistance = t(
								y.options.dataLabels && y.options.dataLabels.distance,
								m
							);
							y.labelDistance = x(y.labelDistance, y.shapeArgs.r);
							this.maxLabelDistance = Math.max(
								this.maxLabelDistance || 0,
								y.labelDistance
							);
							B = (B + z) / 2;
							B > 1.5 * Math.PI
								? (B -= 2 * Math.PI)
								: B < -Math.PI / 2 && (B += 2 * Math.PI);
							y.slicedTranslation = {
								translateX: Math.round(Math.cos(B) * l),
								translateY: Math.round(Math.sin(B) * l),
							};
							var C = (Math.cos(B) * c[2]) / 2;
							var e = (Math.sin(B) * c[2]) / 2;
							y.tooltipPos = [c[0] + 0.7 * C, c[1] + 0.7 * e];
							y.half = B < -Math.PI / 2 || B > Math.PI / 2 ? 1 : 0;
							y.angle = B;
							z = Math.min(h, y.labelDistance / 5);
							y.labelPosition = {
								natural: {
									x: c[0] + C + Math.cos(B) * y.labelDistance,
									y: c[1] + e + Math.sin(B) * y.labelDistance,
								},
								final: {},
								alignment:
									0 > y.labelDistance ? "center" : y.half ? "right" : "left",
								connectorPosition: {
									breakAt: {
										x: c[0] + C + Math.cos(B) * z,
										y: c[1] + e + Math.sin(B) * z,
									},
									touchingSliceAt: { x: c[0] + C, y: c[1] + e },
								},
							};
						}
						J(this, "afterTranslate");
					},
					drawEmpty: function () {
						var c = this.options;
						if (0 === this.total) {
							var a = this.center[0];
							var d = this.center[1];
							this.graph ||
								(this.graph = this.chart.renderer
									.circle(a, d, 0)
									.addClass("highcharts-graph")
									.add(this.group));
							this.graph.animate(
								{
									"stroke-width": c.borderWidth,
									cx: a,
									cy: d,
									r: this.center[2] / 2,
									fill: c.fillColor || "none",
									stroke: c.color || "#cccccc",
								},
								this.options.animation
							);
						} else this.graph && (this.graph = this.graph.destroy());
					},
					redrawPoints: function () {
						var c = this,
							a = c.chart,
							d = a.renderer,
							l,
							h,
							f,
							g,
							m = c.options.shadow;
						this.drawEmpty();
						!m ||
							c.shadowGroup ||
							a.styledMode ||
							(c.shadowGroup = d.g("shadow").attr({ zIndex: -1 }).add(c.group));
						c.points.forEach(function (k) {
							var u = {};
							h = k.graphic;
							if (!k.isNull && h) {
								g = k.shapeArgs;
								l = k.getTranslate();
								if (!a.styledMode) {
									var q = k.shadowGroup;
									m &&
										!q &&
										(q = k.shadowGroup = d.g("shadow").add(c.shadowGroup));
									q && q.attr(l);
									f = c.pointAttribs(k, k.selected && "select");
								}
								k.delayedRendering
									? (h.setRadialReference(c.center).attr(g).attr(l),
									  a.styledMode ||
											h
												.attr(f)
												.attr({ "stroke-linejoin": "round" })
												.shadow(m, q),
									  (k.delayedRendering = !1))
									: (h.setRadialReference(c.center),
									  a.styledMode || E(!0, u, f),
									  E(!0, u, g, l),
									  h.animate(u));
								h.attr({ visibility: k.visible ? "inherit" : "hidden" });
								h.addClass(k.getClassName());
							} else h && (k.graphic = h.destroy());
						});
					},
					drawPoints: function () {
						var c = this.chart.renderer;
						this.points.forEach(function (a) {
							a.graphic &&
								a.hasNewShapeType() &&
								(a.graphic = a.graphic.destroy());
							a.graphic ||
								((a.graphic = c[a.shapeType](a.shapeArgs).add(a.series.group)),
								(a.delayedRendering = !0));
						});
					},
					searchPoint: p,
					sortByAngle: function (c, a) {
						c.sort(function (d, c) {
							return "undefined" !== typeof d.angle && (c.angle - d.angle) * a;
						});
					},
					drawLegendSymbol: g.drawRectangle,
					getCenter: r.getCenter,
					getSymbol: p,
					drawGraph: null,
				},
				{
					init: function () {
						v.prototype.init.apply(this, arguments);
						var c = this;
						c.name = t(c.name, "Slice");
						var a = function (a) {
							c.slice("select" === a.type);
						};
						D(c, "select", a);
						D(c, "unselect", a);
						return c;
					},
					isValid: function () {
						return B(this.y) && 0 <= this.y;
					},
					setVisible: function (c, a) {
						var d = this,
							l = d.series,
							h = l.chart,
							f = l.options.ignoreHiddenPoint;
						a = t(a, f);
						c !== d.visible &&
							((d.visible = d.options.visible = c =
								"undefined" === typeof c ? !d.visible : c),
							(l.options.data[l.data.indexOf(d)] = d.options),
							["graphic", "dataLabel", "connector", "shadowGroup"].forEach(
								function (a) {
									if (d[a]) d[a][c ? "show" : "hide"](!0);
								}
							),
							d.legendItem && h.legend.colorizeItem(d, c),
							c || "hover" !== d.state || d.setState(""),
							f && (l.isDirty = !0),
							a && h.redraw());
					},
					slice: function (c, a, d) {
						var l = this.series;
						m(d, l.chart);
						t(a, !0);
						this.sliced = this.options.sliced = K(c) ? c : !this.sliced;
						l.options.data[l.data.indexOf(this)] = this.options;
						this.graphic && this.graphic.animate(this.getTranslate());
						this.shadowGroup && this.shadowGroup.animate(this.getTranslate());
					},
					getTranslate: function () {
						return this.sliced
							? this.slicedTranslation
							: { translateX: 0, translateY: 0 };
					},
					haloPath: function (c) {
						var a = this.shapeArgs;
						return this.sliced || !this.visible
							? []
							: this.series.chart.renderer.symbols.arc(
									a.x,
									a.y,
									a.r + c,
									a.r + c,
									{ innerR: a.r - 1, start: a.start, end: a.end }
							  );
					},
					connectorShapes: {
						fixedOffset: function (c, a, d) {
							var l = a.breakAt;
							a = a.touchingSliceAt;
							return [
								["M", c.x, c.y],
								d.softConnector
									? [
											"C",
											c.x + ("left" === c.alignment ? -5 : 5),
											c.y,
											2 * l.x - a.x,
											2 * l.y - a.y,
											l.x,
											l.y,
									  ]
									: ["L", l.x, l.y],
								["L", a.x, a.y],
							];
						},
						straight: function (c, a) {
							a = a.touchingSliceAt;
							return [
								["M", c.x, c.y],
								["L", a.x, a.y],
							];
						},
						crookedLine: function (c, a, d) {
							a = a.touchingSliceAt;
							var l = this.series,
								h = l.center[0],
								f = l.chart.plotWidth,
								k = l.chart.plotLeft;
							l = c.alignment;
							var g = this.shapeArgs.r;
							d = x(d.crookDistance, 1);
							f =
								"left" === l
									? h + g + (f + k - h - g) * (1 - d)
									: k + (h - g) * d;
							d = ["L", f, c.y];
							h = !0;
							if ("left" === l ? f > c.x || f < a.x : f < c.x || f > a.x)
								h = !1;
							c = [["M", c.x, c.y]];
							h && c.push(d);
							c.push(["L", a.x, a.y]);
							return c;
						},
					},
					getConnectorPath: function () {
						var c = this.labelPosition,
							a = this.series.options.dataLabels,
							d = a.connectorShape,
							l = this.connectorShapes;
						l[d] && (d = l[d]);
						return d.call(
							this,
							{ x: c.final.x, y: c.final.y, alignment: c.alignment },
							c.connectorPosition,
							a
						);
					},
				}
			);
			("");
		}
	);
	N(
		v,
		"parts/DataLabels.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var v = g.animObject,
				r = g.arrayMax,
				D = g.clamp,
				L = g.defined,
				K = g.extend,
				J = g.fireEvent,
				B = g.format,
				E = g.isArray,
				t = g.merge,
				x = g.objectEach,
				z = g.pick,
				m = g.relativeLength,
				A = g.splat,
				p = g.stableSort;
			g = c.noop;
			var M = c.Series,
				k = c.seriesTypes;
			c.distribute = function (a, d, l) {
				function h(a, d) {
					return a.target - d.target;
				}
				var f,
					k = !0,
					g = a,
					m = [];
				var w = 0;
				var t = g.reducedLen || d;
				for (f = a.length; f--; ) w += a[f].size;
				if (w > t) {
					p(a, function (a, d) {
						return (d.rank || 0) - (a.rank || 0);
					});
					for (w = f = 0; w <= t; ) (w += a[f].size), f++;
					m = a.splice(f - 1, a.length);
				}
				p(a, h);
				for (
					a = a.map(function (a) {
						return {
							size: a.size,
							targets: [a.target],
							align: z(a.align, 0.5),
						};
					});
					k;

				) {
					for (f = a.length; f--; )
						(k = a[f]),
							(w =
								(Math.min.apply(0, k.targets) + Math.max.apply(0, k.targets)) /
								2),
							(k.pos = D(w - k.size * k.align, 0, d - k.size));
					f = a.length;
					for (k = !1; f--; )
						0 < f &&
							a[f - 1].pos + a[f - 1].size > a[f].pos &&
							((a[f - 1].size += a[f].size),
							(a[f - 1].targets = a[f - 1].targets.concat(a[f].targets)),
							(a[f - 1].align = 0.5),
							a[f - 1].pos + a[f - 1].size > d &&
								(a[f - 1].pos = d - a[f - 1].size),
							a.splice(f, 1),
							(k = !0));
				}
				g.push.apply(g, m);
				f = 0;
				a.some(function (a) {
					var h = 0;
					if (
						a.targets.some(function () {
							g[f].pos = a.pos + h;
							if (
								"undefined" !== typeof l &&
								Math.abs(g[f].pos - g[f].target) > l
							)
								return (
									g.slice(0, f + 1).forEach(function (a) {
										delete a.pos;
									}),
									(g.reducedLen = (g.reducedLen || d) - 0.1 * d),
									g.reducedLen > 0.1 * d && c.distribute(g, d, l),
									!0
								);
							h += g[f].size;
							f++;
						})
					)
						return !0;
				});
				p(g, h);
			};
			M.prototype.drawDataLabels = function () {
				function a(a, b) {
					var e = b.filter;
					return e
						? ((b = e.operator),
						  (a = a[e.property]),
						  (e = e.value),
						  (">" === b && a > e) ||
						  ("<" === b && a < e) ||
						  (">=" === b && a >= e) ||
						  ("<=" === b && a <= e) ||
						  ("==" === b && a == e) ||
						  ("===" === b && a === e)
								? !0
								: !1)
						: !0;
				}
				function d(a, b) {
					var e = [],
						d;
					if (E(a) && !E(b))
						e = a.map(function (a) {
							return t(a, b);
						});
					else if (E(b) && !E(a))
						e = b.map(function (b) {
							return t(a, b);
						});
					else if (E(a) || E(b))
						for (d = Math.max(a.length, b.length); d--; ) e[d] = t(a[d], b[d]);
					else e = t(a, b);
					return e;
				}
				var c = this,
					h = c.chart,
					f = c.options,
					k = f.dataLabels,
					g = c.points,
					m,
					p = c.hasRendered || 0,
					r = v(f.animation).duration,
					y = Math.min(r, 200),
					D = !h.renderer.forExport && z(k.defer, 0 < y),
					G = h.renderer;
				k = d(
					d(
						h.options.plotOptions &&
							h.options.plotOptions.series &&
							h.options.plotOptions.series.dataLabels,
						h.options.plotOptions &&
							h.options.plotOptions[c.type] &&
							h.options.plotOptions[c.type].dataLabels
					),
					k
				);
				J(this, "drawDataLabels");
				if (E(k) || k.enabled || c._hasPointLabels) {
					var C = c.plotGroup(
						"dataLabelsGroup",
						"data-labels",
						D && !p ? "hidden" : "inherit",
						k.zIndex || 6
					);
					D &&
						(C.attr({ opacity: +p }),
						p ||
							setTimeout(function () {
								var a = c.dataLabelsGroup;
								a &&
									(c.visible && C.show(!0),
									a[f.animation ? "animate" : "attr"](
										{ opacity: 1 },
										{ duration: y }
									));
							}, r - y));
					g.forEach(function (e) {
						m = A(d(k, e.dlOptions || (e.options && e.options.dataLabels)));
						m.forEach(function (b, d) {
							var l = b.enabled && (!e.isNull || e.dataLabelOnNull) && a(e, b),
								k = e.dataLabels ? e.dataLabels[d] : e.dataLabel,
								g = e.connectors ? e.connectors[d] : e.connector,
								m = z(b.distance, e.labelDistance),
								u = !k;
							if (l) {
								var q = e.getLabelConfig();
								var n = z(b[e.formatPrefix + "Format"], b.format);
								q = L(n)
									? B(n, q, h)
									: (b[e.formatPrefix + "Formatter"] || b.formatter).call(q, b);
								n = b.style;
								var p = b.rotation;
								h.styledMode ||
									((n.color = z(b.color, n.color, c.color, "#000000")),
									"contrast" === n.color
										? ((e.contrastColor = G.getContrast(e.color || c.color)),
										  (n.color =
												(!L(m) && b.inside) || 0 > m || f.stacking
													? e.contrastColor
													: "#000000"))
										: delete e.contrastColor,
									f.cursor && (n.cursor = f.cursor));
								var w = {
									r: b.borderRadius || 0,
									rotation: p,
									padding: b.padding,
									zIndex: 1,
								};
								h.styledMode ||
									((w.fill = b.backgroundColor),
									(w.stroke = b.borderColor),
									(w["stroke-width"] = b.borderWidth));
								x(w, function (a, b) {
									"undefined" === typeof a && delete w[b];
								});
							}
							!k || (l && L(q))
								? l &&
								  L(q) &&
								  (k
										? (w.text = q)
										: ((e.dataLabels = e.dataLabels || []),
										  (k = e.dataLabels[d] = p
												? G.text(q, 0, -9999, b.useHTML).addClass(
														"highcharts-data-label"
												  )
												: G.label(
														q,
														0,
														-9999,
														b.shape,
														null,
														null,
														b.useHTML,
														null,
														"data-label"
												  )),
										  d || (e.dataLabel = k),
										  k.addClass(
												" highcharts-data-label-color-" +
													e.colorIndex +
													" " +
													(b.className || "") +
													(b.useHTML ? " highcharts-tracker" : "")
										  )),
								  (k.options = b),
								  k.attr(w),
								  h.styledMode || k.css(n).shadow(b.shadow),
								  k.added || k.add(C),
								  b.textPath &&
										!b.useHTML &&
										(k.setTextPath(
											(e.getDataLabelPath && e.getDataLabelPath(k)) ||
												e.graphic,
											b.textPath
										),
										e.dataLabelPath &&
											!b.textPath.enabled &&
											(e.dataLabelPath = e.dataLabelPath.destroy())),
								  c.alignDataLabel(e, k, b, null, u))
								: ((e.dataLabel = e.dataLabel && e.dataLabel.destroy()),
								  e.dataLabels &&
										(1 === e.dataLabels.length
											? delete e.dataLabels
											: delete e.dataLabels[d]),
								  d || delete e.dataLabel,
								  g &&
										((e.connector = e.connector.destroy()),
										e.connectors &&
											(1 === e.connectors.length
												? delete e.connectors
												: delete e.connectors[d])));
						});
					});
				}
				J(this, "afterDrawDataLabels");
			};
			M.prototype.alignDataLabel = function (a, d, c, h, f) {
				var l = this,
					k = this.chart,
					g = this.isCartesian && k.inverted,
					m = this.enabledDataSorting,
					p = z(a.dlBox && a.dlBox.centerX, a.plotX, -9999),
					t = z(a.plotY, -9999),
					r = d.getBBox(),
					x = c.rotation,
					A = c.align,
					e = k.isInsidePlot(p, Math.round(t), g),
					b = "justify" === z(c.overflow, m ? "none" : "justify"),
					n =
						this.visible &&
						!1 !== a.visible &&
						(a.series.forceDL ||
							(m && !b) ||
							e ||
							(c.inside &&
								h &&
								k.isInsidePlot(p, g ? h.x + 1 : h.y + h.height - 1, g)));
				var B = function (h) {
					m && l.xAxis && !b && l.setDataLabelStartPos(a, d, f, e, h);
				};
				if (n) {
					var v = k.renderer.fontMetrics(
						k.styledMode ? void 0 : c.style.fontSize,
						d
					).b;
					h = K(
						{
							x: g ? this.yAxis.len - t : p,
							y: Math.round(g ? this.xAxis.len - p : t),
							width: 0,
							height: 0,
						},
						h
					);
					K(c, { width: r.width, height: r.height });
					x
						? ((b = !1),
						  (p = k.renderer.rotCorr(v, x)),
						  (p = {
								x: h.x + c.x + h.width / 2 + p.x,
								y:
									h.y +
									c.y +
									{ top: 0, middle: 0.5, bottom: 1 }[c.verticalAlign] *
										h.height,
						  }),
						  B(p),
						  d[f ? "attr" : "animate"](p).attr({ align: A }),
						  (B = (x + 720) % 360),
						  (B = 180 < B && 360 > B),
						  "left" === A
								? (p.y -= B ? r.height : 0)
								: "center" === A
								? ((p.x -= r.width / 2), (p.y -= r.height / 2))
								: "right" === A &&
								  ((p.x -= r.width), (p.y -= B ? 0 : r.height)),
						  (d.placed = !0),
						  (d.alignAttr = p))
						: (B(h), d.align(c, null, h), (p = d.alignAttr));
					b && 0 <= h.height
						? this.justifyDataLabel(d, c, p, r, h, f)
						: z(c.crop, !0) &&
						  (n =
								k.isInsidePlot(p.x, p.y) &&
								k.isInsidePlot(p.x + r.width, p.y + r.height));
					if (c.shape && !x)
						d[f ? "attr" : "animate"]({
							anchorX: g ? k.plotWidth - a.plotY : a.plotX,
							anchorY: g ? k.plotHeight - a.plotX : a.plotY,
						});
				}
				f && m && (d.placed = !1);
				n || (m && !b) || (d.hide(!0), (d.placed = !1));
			};
			M.prototype.setDataLabelStartPos = function (a, d, c, h, f) {
				var l = this.chart,
					k = l.inverted,
					g = this.xAxis,
					m = g.reversed,
					p = k ? d.height / 2 : d.width / 2;
				a = (a = a.pointWidth) ? a / 2 : 0;
				g = k ? f.x : m ? -p - a : g.width - p + a;
				f = k ? (m ? this.yAxis.height - p + a : -p - a) : f.y;
				d.startXPos = g;
				d.startYPos = f;
				h
					? "hidden" === d.visibility &&
					  (d.show(), d.attr({ opacity: 0 }).animate({ opacity: 1 }))
					: d.attr({ opacity: 1 }).animate({ opacity: 0 }, void 0, d.hide);
				l.hasRendered &&
					(c && d.attr({ x: d.startXPos, y: d.startYPos }), (d.placed = !0));
			};
			M.prototype.justifyDataLabel = function (a, d, c, h, f, k) {
				var l = this.chart,
					g = d.align,
					m = d.verticalAlign,
					q = a.box ? 0 : a.padding || 0;
				var p = c.x + q;
				if (0 > p) {
					"right" === g ? ((d.align = "left"), (d.inside = !0)) : (d.x = -p);
					var t = !0;
				}
				p = c.x + h.width - q;
				p > l.plotWidth &&
					("left" === g
						? ((d.align = "right"), (d.inside = !0))
						: (d.x = l.plotWidth - p),
					(t = !0));
				p = c.y + q;
				0 > p &&
					("bottom" === m
						? ((d.verticalAlign = "top"), (d.inside = !0))
						: (d.y = -p),
					(t = !0));
				p = c.y + h.height - q;
				p > l.plotHeight &&
					("top" === m
						? ((d.verticalAlign = "bottom"), (d.inside = !0))
						: (d.y = l.plotHeight - p),
					(t = !0));
				t && ((a.placed = !k), a.align(d, null, f));
				return t;
			};
			k.pie &&
				((k.pie.prototype.dataLabelPositioners = {
					radialDistributionY: function (a) {
						return a.top + a.distributeBox.pos;
					},
					radialDistributionX: function (a, d, c, h) {
						return a.getX(c < d.top + 2 || c > d.bottom - 2 ? h : c, d.half, d);
					},
					justify: function (a, d, c) {
						return c[0] + (a.half ? -1 : 1) * (d + a.labelDistance);
					},
					alignToPlotEdges: function (a, d, c, h) {
						a = a.getBBox().width;
						return d ? a + h : c - a - h;
					},
					alignToConnectors: function (a, d, c, h) {
						var f = 0,
							l;
						a.forEach(function (a) {
							l = a.dataLabel.getBBox().width;
							l > f && (f = l);
						});
						return d ? f + h : c - f - h;
					},
				}),
				(k.pie.prototype.drawDataLabels = function () {
					var a = this,
						d = a.data,
						l,
						h = a.chart,
						f = a.options.dataLabels || {},
						k = f.connectorPadding,
						g,
						m = h.plotWidth,
						p = h.plotHeight,
						x = h.plotLeft,
						y = Math.round(h.chartWidth / 3),
						A,
						B = a.center,
						C = B[2] / 2,
						e = B[1],
						b,
						n,
						v,
						E,
						G = [[], []],
						D,
						J,
						K,
						N,
						S = [0, 0, 0, 0],
						X = a.dataLabelPositioners,
						R;
					a.visible &&
						(f.enabled || a._hasPointLabels) &&
						(d.forEach(function (a) {
							a.dataLabel &&
								a.visible &&
								a.dataLabel.shortened &&
								(a.dataLabel
									.attr({ width: "auto" })
									.css({ width: "auto", textOverflow: "clip" }),
								(a.dataLabel.shortened = !1));
						}),
						M.prototype.drawDataLabels.apply(a),
						d.forEach(function (a) {
							a.dataLabel &&
								(a.visible
									? (G[a.half].push(a),
									  (a.dataLabel._pos = null),
									  !L(f.style.width) &&
											!L(
												a.options.dataLabels &&
													a.options.dataLabels.style &&
													a.options.dataLabels.style.width
											) &&
											a.dataLabel.getBBox().width > y &&
											(a.dataLabel.css({ width: Math.round(0.7 * y) + "px" }),
											(a.dataLabel.shortened = !0)))
									: ((a.dataLabel = a.dataLabel.destroy()),
									  a.dataLabels &&
											1 === a.dataLabels.length &&
											delete a.dataLabels));
						}),
						G.forEach(function (d, g) {
							var u = d.length,
								q = [],
								w;
							if (u) {
								a.sortByAngle(d, g - 0.5);
								if (0 < a.maxLabelDistance) {
									var t = Math.max(0, e - C - a.maxLabelDistance);
									var y = Math.min(e + C + a.maxLabelDistance, h.plotHeight);
									d.forEach(function (a) {
										0 < a.labelDistance &&
											a.dataLabel &&
											((a.top = Math.max(0, e - C - a.labelDistance)),
											(a.bottom = Math.min(
												e + C + a.labelDistance,
												h.plotHeight
											)),
											(w = a.dataLabel.getBBox().height || 21),
											(a.distributeBox = {
												target: a.labelPosition.natural.y - a.top + w / 2,
												size: w,
												rank: a.y,
											}),
											q.push(a.distributeBox));
									});
									t = y + w - t;
									c.distribute(q, t, t / 5);
								}
								for (N = 0; N < u; N++) {
									l = d[N];
									v = l.labelPosition;
									b = l.dataLabel;
									K = !1 === l.visible ? "hidden" : "inherit";
									J = t = v.natural.y;
									q &&
										L(l.distributeBox) &&
										("undefined" === typeof l.distributeBox.pos
											? (K = "hidden")
											: ((E = l.distributeBox.size),
											  (J = X.radialDistributionY(l))));
									delete l.positionIndex;
									if (f.justify) D = X.justify(l, C, B);
									else
										switch (f.alignTo) {
											case "connectors":
												D = X.alignToConnectors(d, g, m, x);
												break;
											case "plotEdges":
												D = X.alignToPlotEdges(b, g, m, x);
												break;
											default:
												D = X.radialDistributionX(a, l, J, t);
										}
									b._attr = { visibility: K, align: v.alignment };
									R = l.options.dataLabels || {};
									b._pos = {
										x:
											D +
											z(R.x, f.x) +
											({ left: k, right: -k }[v.alignment] || 0),
										y: J + z(R.y, f.y) - 10,
									};
									v.final.x = D;
									v.final.y = J;
									z(f.crop, !0) &&
										((n = b.getBBox().width),
										(t = null),
										D - n < k && 1 === g
											? ((t = Math.round(n - D + k)),
											  (S[3] = Math.max(t, S[3])))
											: D + n > m - k &&
											  0 === g &&
											  ((t = Math.round(D + n - m + k)),
											  (S[1] = Math.max(t, S[1]))),
										0 > J - E / 2
											? (S[0] = Math.max(Math.round(-J + E / 2), S[0]))
											: J + E / 2 > p &&
											  (S[2] = Math.max(Math.round(J + E / 2 - p), S[2])),
										(b.sideOverflow = t));
								}
							}
						}),
						0 === r(S) || this.verifyDataLabelOverflow(S)) &&
						(this.placeDataLabels(),
						this.points.forEach(function (e) {
							R = t(f, e.options.dataLabels);
							if ((g = z(R.connectorWidth, 1))) {
								var d;
								A = e.connector;
								if (
									(b = e.dataLabel) &&
									b._pos &&
									e.visible &&
									0 < e.labelDistance
								) {
									K = b._attr.visibility;
									if ((d = !A))
										(e.connector = A = h.renderer
											.path()
											.addClass(
												"highcharts-data-label-connector  highcharts-color-" +
													e.colorIndex +
													(e.className ? " " + e.className : "")
											)
											.add(a.dataLabelsGroup)),
											h.styledMode ||
												A.attr({
													"stroke-width": g,
													stroke: R.connectorColor || e.color || "#666666",
												});
									A[d ? "attr" : "animate"]({ d: e.getConnectorPath() });
									A.attr("visibility", K);
								} else A && (e.connector = A.destroy());
							}
						}));
				}),
				(k.pie.prototype.placeDataLabels = function () {
					this.points.forEach(function (a) {
						var d = a.dataLabel,
							c;
						d &&
							a.visible &&
							((c = d._pos)
								? (d.sideOverflow &&
										((d._attr.width = Math.max(
											d.getBBox().width - d.sideOverflow,
											0
										)),
										d.css({
											width: d._attr.width + "px",
											textOverflow:
												(this.options.dataLabels.style || {}).textOverflow ||
												"ellipsis",
										}),
										(d.shortened = !0)),
								  d.attr(d._attr),
								  d[d.moved ? "animate" : "attr"](c),
								  (d.moved = !0))
								: d && d.attr({ y: -9999 }));
						delete a.distributeBox;
					}, this);
				}),
				(k.pie.prototype.alignDataLabel = g),
				(k.pie.prototype.verifyDataLabelOverflow = function (a) {
					var d = this.center,
						c = this.options,
						h = c.center,
						f = c.minSize || 80,
						k = null !== c.size;
					if (!k) {
						if (null !== h[0]) var g = Math.max(d[2] - Math.max(a[1], a[3]), f);
						else
							(g = Math.max(d[2] - a[1] - a[3], f)),
								(d[0] += (a[3] - a[1]) / 2);
						null !== h[1]
							? (g = D(g, f, d[2] - Math.max(a[0], a[2])))
							: ((g = D(g, f, d[2] - a[0] - a[2])),
							  (d[1] += (a[0] - a[2]) / 2));
						g < d[2]
							? ((d[2] = g),
							  (d[3] = Math.min(m(c.innerSize || 0, g), g)),
							  this.translate(d),
							  this.drawDataLabels && this.drawDataLabels())
							: (k = !0);
					}
					return k;
				}));
			k.column &&
				(k.column.prototype.alignDataLabel = function (a, d, c, h, f) {
					var l = this.chart.inverted,
						k = a.series,
						g = a.dlBox || a.shapeArgs,
						m = z(a.below, a.plotY > z(this.translatedThreshold, k.yAxis.len)),
						p = z(c.inside, !!this.options.stacking);
					g &&
						((h = t(g)),
						0 > h.y && ((h.height += h.y), (h.y = 0)),
						(g = h.y + h.height - k.yAxis.len),
						0 < g && g < h.height && (h.height -= g),
						l &&
							(h = {
								x: k.yAxis.len - h.y - h.height,
								y: k.xAxis.len - h.x - h.width,
								width: h.height,
								height: h.width,
							}),
						p ||
							(l
								? ((h.x += m ? 0 : h.width), (h.width = 0))
								: ((h.y += m ? h.height : 0), (h.height = 0))));
					c.align = z(c.align, !l || p ? "center" : m ? "right" : "left");
					c.verticalAlign = z(
						c.verticalAlign,
						l || p ? "middle" : m ? "top" : "bottom"
					);
					M.prototype.alignDataLabel.call(this, a, d, c, h, f);
					c.inside && a.contrastColor && d.css({ color: a.contrastColor });
				});
		}
	);
	N(
		v,
		"modules/overlapping-datalabels.src.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var v = g.addEvent,
				r = g.fireEvent,
				D = g.isArray,
				L = g.objectEach,
				K = g.pick;
			c = c.Chart;
			v(c, "render", function () {
				var c = [];
				(this.labelCollectors || []).forEach(function (g) {
					c = c.concat(g());
				});
				(this.yAxis || []).forEach(function (g) {
					g.stacking &&
						g.options.stackLabels &&
						!g.options.stackLabels.allowOverlap &&
						L(g.stacking.stacks, function (g) {
							L(g, function (g) {
								c.push(g.label);
							});
						});
				});
				(this.series || []).forEach(function (g) {
					var r = g.options.dataLabels;
					g.visible &&
						(!1 !== r.enabled || g._hasPointLabels) &&
						(g.nodes || g.points).forEach(function (g) {
							g.visible &&
								(D(g.dataLabels)
									? g.dataLabels
									: g.dataLabel
									? [g.dataLabel]
									: []
								).forEach(function (t) {
									var r = t.options;
									t.labelrank = K(
										r.labelrank,
										g.labelrank,
										g.shapeArgs && g.shapeArgs.height
									);
									r.allowOverlap || c.push(t);
								});
						});
				});
				this.hideOverlappingLabels(c);
			});
			c.prototype.hideOverlappingLabels = function (c) {
				var g = this,
					v = c.length,
					t = g.renderer,
					x,
					z,
					m,
					A = !1;
				var p = function (a) {
					var d,
						c = a.box ? 0 : a.padding || 0,
						h = (d = 0),
						f;
					if (a && (!a.alignAttr || a.placed)) {
						var k = a.alignAttr || { x: a.attr("x"), y: a.attr("y") };
						var g = a.parentGroup;
						a.width ||
							((d = a.getBBox()),
							(a.width = d.width),
							(a.height = d.height),
							(d = t.fontMetrics(null, a.element).h));
						var m = a.width - 2 * c;
						(f = { left: "0", center: "0.5", right: "1" }[a.alignValue])
							? (h = +f * m)
							: Math.round(a.x) !== a.translateX && (h = a.x - a.translateX);
						return {
							x: k.x + (g.translateX || 0) + c - h,
							y: k.y + (g.translateY || 0) + c - d,
							width: a.width - 2 * c,
							height: a.height - 2 * c,
						};
					}
				};
				for (z = 0; z < v; z++)
					if ((x = c[z]))
						(x.oldOpacity = x.opacity),
							(x.newOpacity = 1),
							(x.absoluteBox = p(x));
				c.sort(function (a, d) {
					return (d.labelrank || 0) - (a.labelrank || 0);
				});
				for (z = 0; z < v; z++) {
					var D = (p = c[z]) && p.absoluteBox;
					for (x = z + 1; x < v; ++x) {
						var k = (m = c[x]) && m.absoluteBox;
						!D ||
							!k ||
							p === m ||
							0 === p.newOpacity ||
							0 === m.newOpacity ||
							k.x > D.x + D.width ||
							k.x + k.width < D.x ||
							k.y > D.y + D.height ||
							k.y + k.height < D.y ||
							((p.labelrank < m.labelrank ? p : m).newOpacity = 0);
					}
				}
				c.forEach(function (a) {
					if (a) {
						var d = a.newOpacity;
						a.oldOpacity !== d &&
							(a.alignAttr && a.placed
								? (a[d ? "removeClass" : "addClass"](
										"highcharts-data-label-hidden"
								  ),
								  (A = !0),
								  (a.alignAttr.opacity = d),
								  a[a.isOld ? "animate" : "attr"](
										a.alignAttr,
										null,
										function () {
											g.styledMode ||
												a.css({ pointerEvents: d ? "auto" : "none" });
											a.visibility = d ? "inherit" : "hidden";
											a.placed = !!d;
										}
								  ),
								  r(g, "afterHideOverlappingLabel"))
								: a.attr({ opacity: d }));
						a.isOld = !0;
					}
				});
				A && r(g, "afterHideAllOverlappingLabels");
			};
		}
	);
	N(
		v,
		"parts/Interaction.js",
		[
			v["parts/Globals.js"],
			v["parts/Legend.js"],
			v["parts/Point.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, v, r) {
			var D = r.addEvent,
				G = r.createElement,
				K = r.css,
				J = r.defined,
				B = r.extend,
				E = r.fireEvent,
				t = r.isArray,
				x = r.isFunction,
				z = r.isNumber,
				m = r.isObject,
				A = r.merge,
				p = r.objectEach,
				M = r.pick;
			r = c.Chart;
			var k = c.defaultOptions,
				a = c.defaultPlotOptions,
				d = c.hasTouch,
				l = c.Series,
				h = c.seriesTypes,
				f = c.svg;
			var q = (c.TrackerMixin = {
				drawTrackerPoint: function () {
					var a = this,
						f = a.chart,
						c = f.pointer,
						h = function (a) {
							var d = c.getPointFromEvent(a);
							"undefined" !== typeof d &&
								((c.isDirectTouch = !0), d.onMouseOver(a));
						},
						l;
					a.points.forEach(function (a) {
						l = t(a.dataLabels)
							? a.dataLabels
							: a.dataLabel
							? [a.dataLabel]
							: [];
						a.graphic && (a.graphic.element.point = a);
						l.forEach(function (d) {
							d.div ? (d.div.point = a) : (d.element.point = a);
						});
					});
					a._hasTracking ||
						(a.trackerGroups.forEach(function (l) {
							if (a[l]) {
								a[l]
									.addClass("highcharts-tracker")
									.on("mouseover", h)
									.on("mouseout", function (a) {
										c.onTrackerMouseOut(a);
									});
								if (d) a[l].on("touchstart", h);
								!f.styledMode &&
									a.options.cursor &&
									a[l].css(K).css({ cursor: a.options.cursor });
							}
						}),
						(a._hasTracking = !0));
					E(this, "afterDrawTracker");
				},
				drawTrackerGraph: function () {
					var a = this,
						c = a.options,
						h = c.trackByArea,
						l = [].concat(h ? a.areaPath : a.graphPath),
						k = a.chart,
						g = k.pointer,
						m = k.renderer,
						q = k.options.tooltip.snap,
						e = a.tracker,
						b = function (b) {
							if (k.hoverSeries !== a) a.onMouseOver();
						},
						n = "rgba(192,192,192," + (f ? 0.0001 : 0.002) + ")";
					e
						? e.attr({ d: l })
						: a.graph &&
						  ((a.tracker = m
								.path(l)
								.attr({
									visibility: a.visible ? "visible" : "hidden",
									zIndex: 2,
								})
								.addClass(
									h ? "highcharts-tracker-area" : "highcharts-tracker-line"
								)
								.add(a.group)),
						  k.styledMode ||
								a.tracker.attr({
									"stroke-linecap": "round",
									"stroke-linejoin": "round",
									stroke: n,
									fill: h ? n : "none",
									"stroke-width": a.graph.strokeWidth() + (h ? 0 : 2 * q),
								}),
						  [a.tracker, a.markerGroup].forEach(function (a) {
								a.addClass("highcharts-tracker")
									.on("mouseover", b)
									.on("mouseout", function (a) {
										g.onTrackerMouseOut(a);
									});
								c.cursor && !k.styledMode && a.css({ cursor: c.cursor });
								if (d) a.on("touchstart", b);
						  }));
					E(this, "afterDrawTracker");
				},
			});
			h.column && (h.column.prototype.drawTracker = q.drawTrackerPoint);
			h.pie && (h.pie.prototype.drawTracker = q.drawTrackerPoint);
			h.scatter && (h.scatter.prototype.drawTracker = q.drawTrackerPoint);
			B(g.prototype, {
				setItemEvents: function (a, d, f) {
					var c = this,
						h = c.chart.renderer.boxWrapper,
						l = a instanceof v,
						k = "highcharts-legend-" + (l ? "point" : "series") + "-active",
						g = c.chart.styledMode;
					(f ? [d, a.legendSymbol] : [a.legendGroup]).forEach(function (e) {
						if (e)
							e.on("mouseover", function () {
								a.visible &&
									c.allItems.forEach(function (b) {
										a !== b && b.setState("inactive", !l);
									});
								a.setState("hover");
								a.visible && h.addClass(k);
								g || d.css(c.options.itemHoverStyle);
							})
								.on("mouseout", function () {
									c.chart.styledMode ||
										d.css(A(a.visible ? c.itemStyle : c.itemHiddenStyle));
									c.allItems.forEach(function (b) {
										a !== b && b.setState("", !l);
									});
									h.removeClass(k);
									a.setState();
								})
								.on("click", function (b) {
									var e = function () {
										a.setVisible && a.setVisible();
										c.allItems.forEach(function (b) {
											a !== b && b.setState(a.visible ? "inactive" : "", !l);
										});
									};
									h.removeClass(k);
									b = { browserEvent: b };
									a.firePointEvent
										? a.firePointEvent("legendItemClick", b, e)
										: E(a, "legendItemClick", b, e);
								});
					});
				},
				createCheckboxForItem: function (a) {
					a.checkbox = G(
						"input",
						{
							type: "checkbox",
							className: "highcharts-legend-checkbox",
							checked: a.selected,
							defaultChecked: a.selected,
						},
						this.options.itemCheckboxStyle,
						this.chart.container
					);
					D(a.checkbox, "click", function (d) {
						E(
							a.series || a,
							"checkboxClick",
							{ checked: d.target.checked, item: a },
							function () {
								a.select();
							}
						);
					});
				},
			});
			B(r.prototype, {
				showResetZoom: function () {
					function a() {
						d.zoomOut();
					}
					var d = this,
						f = k.lang,
						c = d.options.chart.resetZoomButton,
						h = c.theme,
						l = h.states,
						g =
							"chart" === c.relativeTo || "spaceBox" === c.relativeTo
								? null
								: "plotBox";
					E(this, "beforeShowResetZoom", null, function () {
						d.resetZoomButton = d.renderer
							.button(f.resetZoom, null, null, a, h, l && l.hover)
							.attr({ align: c.position.align, title: f.resetZoomTitle })
							.addClass("highcharts-reset-zoom")
							.add()
							.align(c.position, !1, g);
					});
					E(this, "afterShowResetZoom");
				},
				zoomOut: function () {
					E(this, "selection", { resetSelection: !0 }, this.zoom);
				},
				zoom: function (a) {
					var d = this,
						f,
						c = d.pointer,
						h = !1,
						l = d.inverted ? c.mouseDownX : c.mouseDownY;
					!a || a.resetSelection
						? (d.axes.forEach(function (a) {
								f = a.zoom();
						  }),
						  (c.initiated = !1))
						: a.xAxis.concat(a.yAxis).forEach(function (a) {
								var e = a.axis,
									b = d.inverted ? e.left : e.top,
									k = d.inverted ? b + e.width : b + e.height,
									g = e.isXAxis,
									m = !1;
								if ((!g && l >= b && l <= k) || g || !J(l)) m = !0;
								c[g ? "zoomX" : "zoomY"] &&
									m &&
									((f = e.zoom(a.min, a.max)), e.displayBtn && (h = !0));
						  });
					var k = d.resetZoomButton;
					h && !k
						? d.showResetZoom()
						: !h && m(k) && (d.resetZoomButton = k.destroy());
					f &&
						d.redraw(
							M(d.options.chart.animation, a && a.animation, 100 > d.pointCount)
						);
				},
				pan: function (a, d) {
					var f = this,
						h = f.hoverPoints,
						l = f.options.chart,
						k = f.options.mapNavigation && f.options.mapNavigation.enabled,
						g;
					d = "object" === typeof d ? d : { enabled: d, type: "x" };
					l && l.panning && (l.panning = d);
					var m = d.type;
					E(this, "pan", { originalEvent: a }, function () {
						h &&
							h.forEach(function (a) {
								a.setState();
							});
						var e = [1];
						"xy" === m ? (e = [1, 0]) : "y" === m && (e = [0]);
						e.forEach(function (b) {
							var e = f[b ? "xAxis" : "yAxis"][0],
								d = e.options,
								h = e.horiz,
								l = a[h ? "chartX" : "chartY"];
							h = h ? "mouseDownX" : "mouseDownY";
							var q = f[h],
								u = (e.pointRange || 0) / 2,
								p =
									(e.reversed && !f.inverted) || (!e.reversed && f.inverted)
										? -1
										: 1,
								t = e.getExtremes(),
								w = e.toValue(q - l, !0) + u * p;
							p = e.toValue(q + e.len - l, !0) - u * p;
							var r = p < w;
							q = r ? p : w;
							w = r ? w : p;
							var y = e.hasVerticalPanning(),
								x = e.panningState;
							e.series.forEach(function (a) {
								if (y && !b && (!x || x.isDirty)) {
									var e = a.getProcessedData(!0);
									a = a.getExtremes(e.yData, !0);
									x ||
										(x = {
											startMin: Number.MAX_VALUE,
											startMax: -Number.MAX_VALUE,
										});
									z(a.dataMin) &&
										z(a.dataMax) &&
										((x.startMin = Math.min(a.dataMin, x.startMin)),
										(x.startMax = Math.max(a.dataMax, x.startMax)));
								}
							});
							p = Math.min(
								c.pick(
									null === x || void 0 === x ? void 0 : x.startMin,
									t.dataMin
								),
								u ? t.min : e.toValue(e.toPixels(t.min) - e.minPixelPadding)
							);
							u = Math.max(
								c.pick(
									null === x || void 0 === x ? void 0 : x.startMax,
									t.dataMax
								),
								u ? t.max : e.toValue(e.toPixels(t.max) + e.minPixelPadding)
							);
							e.panningState = x;
							if (!d.ordinal) {
								d = p - q;
								0 < d && ((w += d), (q = p));
								d = w - u;
								0 < d && ((w = u), (q -= d));
								if (
									(e.series.length && q !== t.min && w !== t.max && b) ||
									(x && q >= p && w <= u)
								)
									e.setExtremes(q, w, !1, !1, { trigger: "pan" }),
										f.resetZoomButton ||
											k ||
											!m.match("y") ||
											(f.showResetZoom(), (e.displayBtn = !1)),
										(g = !0);
								f[h] = l;
							}
						});
						g && f.redraw(!1);
						K(f.container, { cursor: "move" });
					});
				},
			});
			B(v.prototype, {
				select: function (a, d) {
					var f = this,
						c = f.series,
						h = c.chart;
					this.selectedStaging = a = M(a, !f.selected);
					f.firePointEvent(
						a ? "select" : "unselect",
						{ accumulate: d },
						function () {
							f.selected = f.options.selected = a;
							c.options.data[c.data.indexOf(f)] = f.options;
							f.setState(a && "select");
							d ||
								h.getSelectedPoints().forEach(function (a) {
									var d = a.series;
									a.selected &&
										a !== f &&
										((a.selected = a.options.selected = !1),
										(d.options.data[d.data.indexOf(a)] = a.options),
										a.setState(
											h.hoverPoints && d.options.inactiveOtherPoints
												? "inactive"
												: ""
										),
										a.firePointEvent("unselect"));
								});
						}
					);
					delete this.selectedStaging;
				},
				onMouseOver: function (a) {
					var d = this.series.chart,
						f = d.pointer;
					a = a
						? f.normalize(a)
						: f.getChartCoordinatesFromPoint(this, d.inverted);
					f.runPointActions(a, this);
				},
				onMouseOut: function () {
					var a = this.series.chart;
					this.firePointEvent("mouseOut");
					this.series.options.inactiveOtherPoints ||
						(a.hoverPoints || []).forEach(function (a) {
							a.setState();
						});
					a.hoverPoints = a.hoverPoint = null;
				},
				importEvents: function () {
					if (!this.hasImportedEvents) {
						var a = this,
							d = A(a.series.options.point, a.options).events;
						a.events = d;
						p(d, function (d, f) {
							x(d) && D(a, f, d);
						});
						this.hasImportedEvents = !0;
					}
				},
				setState: function (d, f) {
					var c = this.series,
						h = this.state,
						l = c.options.states[d || "normal"] || {},
						k = a[c.type].marker && c.options.marker,
						g = k && !1 === k.enabled,
						m = (k && k.states && k.states[d || "normal"]) || {},
						e = !1 === m.enabled,
						b = c.stateMarkerGraphic,
						q = this.marker || {},
						u = c.chart,
						p = c.halo,
						t,
						r = k && c.markerAttribs;
					d = d || "";
					if (
						!(
							(d === this.state && !f) ||
							(this.selected && "select" !== d) ||
							!1 === l.enabled ||
							(d && (e || (g && !1 === m.enabled))) ||
							(d && q.states && q.states[d] && !1 === q.states[d].enabled)
						)
					) {
						this.state = d;
						r && (t = c.markerAttribs(this, d));
						if (this.graphic) {
							h && this.graphic.removeClass("highcharts-point-" + h);
							d && this.graphic.addClass("highcharts-point-" + d);
							if (!u.styledMode) {
								var z = c.pointAttribs(this, d);
								var x = M(u.options.chart.animation, l.animation);
								c.options.inactiveOtherPoints &&
									z.opacity &&
									((this.dataLabels || []).forEach(function (a) {
										a && a.animate({ opacity: z.opacity }, x);
									}),
									this.connector &&
										this.connector.animate({ opacity: z.opacity }, x));
								this.graphic.animate(z, x);
							}
							t &&
								this.graphic.animate(
									t,
									M(u.options.chart.animation, m.animation, k.animation)
								);
							b && b.hide();
						} else {
							if (d && m) {
								h = q.symbol || c.symbol;
								b && b.currentSymbol !== h && (b = b.destroy());
								if (t)
									if (b) b[f ? "animate" : "attr"]({ x: t.x, y: t.y });
									else
										h &&
											((c.stateMarkerGraphic = b = u.renderer
												.symbol(h, t.x, t.y, t.width, t.height)
												.add(c.markerGroup)),
											(b.currentSymbol = h));
								!u.styledMode && b && b.attr(c.pointAttribs(this, d));
							}
							b &&
								(b[d && this.isInside ? "show" : "hide"](),
								(b.element.point = this));
						}
						d = l.halo;
						l = ((b = this.graphic || b) && b.visibility) || "inherit";
						d && d.size && b && "hidden" !== l && !this.isCluster
							? (p || (c.halo = p = u.renderer.path().add(b.parentGroup)),
							  p.show()[f ? "animate" : "attr"]({ d: this.haloPath(d.size) }),
							  p.attr({
									class:
										"highcharts-halo highcharts-color-" +
										M(this.colorIndex, c.colorIndex) +
										(this.className ? " " + this.className : ""),
									visibility: l,
									zIndex: -1,
							  }),
							  (p.point = this),
							  u.styledMode ||
									p.attr(
										B(
											{
												fill: this.color || c.color,
												"fill-opacity": d.opacity,
											},
											d.attributes
										)
									))
							: p &&
							  p.point &&
							  p.point.haloPath &&
							  p.animate({ d: p.point.haloPath(0) }, null, p.hide);
						E(this, "afterSetState");
					}
				},
				haloPath: function (a) {
					return this.series.chart.renderer.symbols.circle(
						Math.floor(this.plotX) - a,
						this.plotY - a,
						2 * a,
						2 * a
					);
				},
			});
			B(l.prototype, {
				onMouseOver: function () {
					var a = this.chart,
						d = a.hoverSeries;
					a.pointer.setHoverChartIndex();
					if (d && d !== this) d.onMouseOut();
					this.options.events.mouseOver && E(this, "mouseOver");
					this.setState("hover");
					a.hoverSeries = this;
				},
				onMouseOut: function () {
					var a = this.options,
						d = this.chart,
						f = d.tooltip,
						c = d.hoverPoint;
					d.hoverSeries = null;
					if (c) c.onMouseOut();
					this && a.events.mouseOut && E(this, "mouseOut");
					!f ||
						this.stickyTracking ||
						(f.shared && !this.noSharedTooltip) ||
						f.hide();
					d.series.forEach(function (a) {
						a.setState("", !0);
					});
				},
				setState: function (a, d) {
					var f = this,
						c = f.options,
						h = f.graph,
						l = c.inactiveOtherPoints,
						k = c.states,
						g = c.lineWidth,
						e = c.opacity,
						b = M(
							k[a || "normal"] && k[a || "normal"].animation,
							f.chart.options.chart.animation
						);
					c = 0;
					a = a || "";
					if (
						f.state !== a &&
						([f.group, f.markerGroup, f.dataLabelsGroup].forEach(function (b) {
							b &&
								(f.state && b.removeClass("highcharts-series-" + f.state),
								a && b.addClass("highcharts-series-" + a));
						}),
						(f.state = a),
						!f.chart.styledMode)
					) {
						if (k[a] && !1 === k[a].enabled) return;
						a &&
							((g = k[a].lineWidth || g + (k[a].lineWidthPlus || 0)),
							(e = M(k[a].opacity, e)));
						if (h && !h.dashstyle)
							for (
								k = { "stroke-width": g }, h.animate(k, b);
								f["zone-graph-" + c];

							)
								f["zone-graph-" + c].attr(k), (c += 1);
						l ||
							[
								f.group,
								f.markerGroup,
								f.dataLabelsGroup,
								f.labelBySeries,
							].forEach(function (a) {
								a && a.animate({ opacity: e }, b);
							});
					}
					d && l && f.points && f.setAllPointsToState(a);
				},
				setAllPointsToState: function (a) {
					this.points.forEach(function (d) {
						d.setState && d.setState(a);
					});
				},
				setVisible: function (a, d) {
					var f = this,
						c = f.chart,
						h = f.legendItem,
						l = c.options.chart.ignoreHiddenSeries,
						k = f.visible;
					var g = (f.visible = a = f.options.visible = f.userOptions.visible =
						"undefined" === typeof a ? !k : a)
						? "show"
						: "hide";
					["group", "dataLabelsGroup", "markerGroup", "tracker", "tt"].forEach(
						function (a) {
							if (f[a]) f[a][g]();
						}
					);
					if (
						c.hoverSeries === f ||
						(c.hoverPoint && c.hoverPoint.series) === f
					)
						f.onMouseOut();
					h && c.legend.colorizeItem(f, a);
					f.isDirty = !0;
					f.options.stacking &&
						c.series.forEach(function (a) {
							a.options.stacking && a.visible && (a.isDirty = !0);
						});
					f.linkedSeries.forEach(function (e) {
						e.setVisible(a, !1);
					});
					l && (c.isDirtyBox = !0);
					E(f, g);
					!1 !== d && c.redraw();
				},
				show: function () {
					this.setVisible(!0);
				},
				hide: function () {
					this.setVisible(!1);
				},
				select: function (a) {
					this.selected = a = this.options.selected =
						"undefined" === typeof a ? !this.selected : a;
					this.checkbox && (this.checkbox.checked = a);
					E(this, a ? "select" : "unselect");
				},
				drawTracker: q.drawTrackerGraph,
			});
		}
	);
	N(
		v,
		"parts/Responsive.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var v = g.find,
				r = g.isArray,
				D = g.isObject,
				L = g.merge,
				K = g.objectEach,
				J = g.pick,
				B = g.splat,
				E = g.uniqueKey;
			c = c.Chart;
			c.prototype.setResponsive = function (c, g) {
				var t = this.options.responsive,
					m = [],
					r = this.currentResponsive;
				!g &&
					t &&
					t.rules &&
					t.rules.forEach(function (c) {
						"undefined" === typeof c._id && (c._id = E());
						this.matchResponsiveRule(c, m);
					}, this);
				g = L.apply(
					0,
					m.map(function (c) {
						return v(t.rules, function (g) {
							return g._id === c;
						}).chartOptions;
					})
				);
				g.isResponsiveOptions = !0;
				m = m.toString() || void 0;
				m !== (r && r.ruleIds) &&
					(r && this.update(r.undoOptions, c, !0),
					m
						? ((r = this.currentOptions(g)),
						  (r.isResponsiveOptions = !0),
						  (this.currentResponsive = {
								ruleIds: m,
								mergedOptions: g,
								undoOptions: r,
						  }),
						  this.update(g, c, !0))
						: (this.currentResponsive = void 0));
			};
			c.prototype.matchResponsiveRule = function (c, g) {
				var t = c.condition;
				(
					t.callback ||
					function () {
						return (
							this.chartWidth <= J(t.maxWidth, Number.MAX_VALUE) &&
							this.chartHeight <= J(t.maxHeight, Number.MAX_VALUE) &&
							this.chartWidth >= J(t.minWidth, 0) &&
							this.chartHeight >= J(t.minHeight, 0)
						);
					}
				).call(this) && g.push(c._id);
			};
			c.prototype.currentOptions = function (c) {
				function g(c, m, z, k) {
					var a;
					K(c, function (d, c) {
						if (!k && -1 < t.collectionsWithUpdate.indexOf(c))
							for (d = B(d), z[c] = [], a = 0; a < d.length; a++)
								m[c][a] && ((z[c][a] = {}), g(d[a], m[c][a], z[c][a], k + 1));
						else
							D(d)
								? ((z[c] = r(d) ? [] : {}), g(d, m[c] || {}, z[c], k + 1))
								: (z[c] = "undefined" === typeof m[c] ? null : m[c]);
					});
				}
				var t = this,
					m = {};
				g(c, this.options, m, 0);
				return m;
			};
		}
	);
	N(v, "masters/highcharts.src.js", [v["parts/Globals.js"]], function (c) {
		return c;
	});
	N(
		v,
		"parts-map/MapAxis.js",
		[v["parts/Axis.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var v = g.addEvent,
				r = g.pick,
				D = (function () {
					return function (c) {
						this.axis = c;
					};
				})();
			g = (function () {
				function c() {}
				c.compose = function (c) {
					c.keepProps.push("mapAxis");
					v(c, "init", function () {
						this.mapAxis || (this.mapAxis = new D(this));
					});
					v(c, "getSeriesExtremes", function () {
						if (this.mapAxis) {
							var c = [];
							this.isXAxis &&
								(this.series.forEach(function (g, r) {
									g.useMapGeometry && ((c[r] = g.xData), (g.xData = []));
								}),
								(this.mapAxis.seriesXData = c));
						}
					});
					v(c, "afterGetSeriesExtremes", function () {
						if (this.mapAxis) {
							var c = this.mapAxis.seriesXData || [],
								g;
							if (this.isXAxis) {
								var v = r(this.dataMin, Number.MAX_VALUE);
								var t = r(this.dataMax, -Number.MAX_VALUE);
								this.series.forEach(function (x, z) {
									x.useMapGeometry &&
										((v = Math.min(v, r(x.minX, v))),
										(t = Math.max(t, r(x.maxX, t))),
										(x.xData = c[z]),
										(g = !0));
								});
								g && ((this.dataMin = v), (this.dataMax = t));
								this.mapAxis.seriesXData = void 0;
							}
						}
					});
					v(c, "afterSetAxisTranslation", function () {
						if (this.mapAxis) {
							var c = this.chart,
								g = c.plotWidth / c.plotHeight;
							c = c.xAxis[0];
							var r;
							"yAxis" === this.coll &&
								"undefined" !== typeof c.transA &&
								this.series.forEach(function (c) {
									c.preserveAspectRatio && (r = !0);
								});
							if (
								r &&
								((this.transA = c.transA = Math.min(this.transA, c.transA)),
								(g /= (c.max - c.min) / (this.max - this.min)),
								(g = 1 > g ? this : c),
								(c = (g.max - g.min) * g.transA),
								(g.mapAxis.pixelPadding = g.len - c),
								(g.minPixelPadding = g.mapAxis.pixelPadding / 2),
								(c = g.mapAxis.fixTo))
							) {
								c = c[1] - g.toValue(c[0], !0);
								c *= g.transA;
								if (
									Math.abs(c) > g.minPixelPadding ||
									(g.min === g.dataMin && g.max === g.dataMax)
								)
									c = 0;
								g.minPixelPadding -= c;
							}
						}
					});
					v(c, "render", function () {
						this.mapAxis && (this.mapAxis.fixTo = void 0);
					});
				};
				return c;
			})();
			g.compose(c);
			return g;
		}
	);
	N(v, "parts-map/ColorSeriesMixin.js", [v["parts/Globals.js"]], function (c) {
		c.colorPointMixin = {
			setVisible: function (c) {
				var g = this,
					r = c ? "show" : "hide";
				g.visible = g.options.visible = !!c;
				["graphic", "dataLabel"].forEach(function (c) {
					if (g[c]) g[c][r]();
				});
			},
		};
		c.colorSeriesMixin = {
			optionalAxis: "colorAxis",
			colorAxis: 0,
			translateColors: function () {
				var c = this,
					v = this.options.nullColor,
					r = this.colorAxis,
					D = this.colorKey;
				(this.data.length ? this.data : this.points).forEach(function (g) {
					var G = g.getNestedProperty(D);
					if (
						(G =
							g.options.color ||
							(g.isNull || null === g.value
								? v
								: r && "undefined" !== typeof G
								? r.toColor(G, g)
								: g.color || c.color))
					)
						g.color = G;
				});
			},
		};
	});
	N(
		v,
		"parts-map/ColorAxis.js",
		[
			v["parts/Axis.js"],
			v["parts/Color.js"],
			v["parts/Globals.js"],
			v["parts/Legend.js"],
			v["mixins/legend-symbol.js"],
			v["parts/Point.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, v, r, D, L, K) {
			var G =
					(this && this.__extends) ||
					(function () {
						var a = function (d, f) {
							a =
								Object.setPrototypeOf ||
								({ __proto__: [] } instanceof Array &&
									function (a, d) {
										a.__proto__ = d;
									}) ||
								function (a, d) {
									for (var f in d) d.hasOwnProperty(f) && (a[f] = d[f]);
								};
							return a(d, f);
						};
						return function (d, f) {
							function c() {
								this.constructor = d;
							}
							a(d, f);
							d.prototype =
								null === f
									? Object.create(f)
									: ((c.prototype = f.prototype), new c());
						};
					})(),
				B = g.parse;
			g = K.addEvent;
			var E = K.erase,
				t = K.extend,
				x = K.Fx,
				z = K.isNumber,
				m = K.merge,
				A = K.pick,
				p = K.splat;
			("");
			K = v.Chart;
			var M = v.Series,
				k = v.colorPointMixin,
				a = v.noop;
			t(M.prototype, v.colorSeriesMixin);
			t(L.prototype, k);
			K.prototype.collectionsWithUpdate.push("colorAxis");
			K.prototype.collectionsWithInit.colorAxis = [K.prototype.addColorAxis];
			var d = (function (d) {
				function c(a, c) {
					var f = d.call(this, a, c) || this;
					f.beforePadding = !1;
					f.chart = void 0;
					f.coll = "colorAxis";
					f.dataClasses = void 0;
					f.legendItem = void 0;
					f.legendItems = void 0;
					f.name = "";
					f.options = void 0;
					f.stops = void 0;
					f.visible = !0;
					f.init(a, c);
					return f;
				}
				G(c, d);
				c.buildOptions = function (a, d, c) {
					a = a.options.legend || {};
					var f = c.layout ? "vertical" !== c.layout : "vertical" !== a.layout;
					return m(d, { side: f ? 2 : 1, reversed: !f }, c, {
						opposite: !f,
						showEmpty: !1,
						title: null,
						visible: a.enabled && (c ? !1 !== c.visible : !0),
					});
				};
				c.prototype.init = function (a, h) {
					var f = c.buildOptions(a, c.defaultOptions, h);
					this.coll = "colorAxis";
					d.prototype.init.call(this, a, f);
					h.dataClasses && this.initDataClasses(h);
					this.initStops();
					this.horiz = !f.opposite;
					this.zoomEnabled = !1;
				};
				c.prototype.initDataClasses = function (a) {
					var d = this.chart,
						f,
						c = 0,
						h = d.options.chart.colorCount,
						l = this.options,
						g = a.dataClasses.length;
					this.dataClasses = f = [];
					this.legendItems = [];
					a.dataClasses.forEach(function (a, k) {
						a = m(a);
						f.push(a);
						if (d.styledMode || !a.color)
							"category" === l.dataClassColor
								? (d.styledMode ||
										((k = d.options.colors), (h = k.length), (a.color = k[c])),
								  (a.colorIndex = c),
								  c++,
								  c === h && (c = 0))
								: (a.color = B(l.minColor).tweenTo(
										B(l.maxColor),
										2 > g ? 0.5 : k / (g - 1)
								  ));
					});
				};
				c.prototype.hasData = function () {
					return !!(this.tickPositions || []).length;
				};
				c.prototype.setTickPositions = function () {
					if (!this.dataClasses) return d.prototype.setTickPositions.call(this);
				};
				c.prototype.initStops = function () {
					this.stops = this.options.stops || [
						[0, this.options.minColor],
						[1, this.options.maxColor],
					];
					this.stops.forEach(function (a) {
						a.color = B(a[1]);
					});
				};
				c.prototype.setOptions = function (a) {
					d.prototype.setOptions.call(this, a);
					this.options.crosshair = this.options.marker;
				};
				c.prototype.setAxisSize = function () {
					var a = this.legendSymbol,
						d = this.chart,
						h = d.options.legend || {},
						l,
						g;
					a
						? ((this.left = h = a.attr("x")),
						  (this.top = l = a.attr("y")),
						  (this.width = g = a.attr("width")),
						  (this.height = a = a.attr("height")),
						  (this.right = d.chartWidth - h - g),
						  (this.bottom = d.chartHeight - l - a),
						  (this.len = this.horiz ? g : a),
						  (this.pos = this.horiz ? h : l))
						: (this.len =
								(this.horiz ? h.symbolWidth : h.symbolHeight) ||
								c.defaultLegendLength);
				};
				c.prototype.normalizedValue = function (a) {
					this.logarithmic && (a = this.logarithmic.log2lin(a));
					return 1 - (this.max - a) / (this.max - this.min || 1);
				};
				c.prototype.toColor = function (a, d) {
					var f = this.dataClasses,
						c = this.stops,
						h;
					if (f)
						for (h = f.length; h--; ) {
							var l = f[h];
							var g = l.from;
							c = l.to;
							if (
								("undefined" === typeof g || a >= g) &&
								("undefined" === typeof c || a <= c)
							) {
								var k = l.color;
								d && ((d.dataClass = h), (d.colorIndex = l.colorIndex));
								break;
							}
						}
					else {
						a = this.normalizedValue(a);
						for (h = c.length; h-- && !(a > c[h][0]); );
						g = c[h] || c[h + 1];
						c = c[h + 1] || g;
						a = 1 - (c[0] - a) / (c[0] - g[0] || 1);
						k = g.color.tweenTo(c.color, a);
					}
					return k;
				};
				c.prototype.getOffset = function () {
					var a = this.legendGroup,
						c = this.chart.axisOffset[this.side];
					a &&
						((this.axisParent = a),
						d.prototype.getOffset.call(this),
						this.added ||
							((this.added = !0),
							(this.labelLeft = 0),
							(this.labelRight = this.width)),
						(this.chart.axisOffset[this.side] = c));
				};
				c.prototype.setLegendColor = function () {
					var a = this.reversed,
						d = a ? 1 : 0;
					a = a ? 0 : 1;
					d = this.horiz ? [d, 0, a, 0] : [0, a, 0, d];
					this.legendColor = {
						linearGradient: { x1: d[0], y1: d[1], x2: d[2], y2: d[3] },
						stops: this.stops,
					};
				};
				c.prototype.drawLegendSymbol = function (a, d) {
					var f = a.padding,
						h = a.options,
						l = this.horiz,
						g = A(h.symbolWidth, l ? c.defaultLegendLength : 12),
						k = A(h.symbolHeight, l ? 12 : c.defaultLegendLength),
						m = A(h.labelPadding, l ? 16 : 30);
					h = A(h.itemDistance, 10);
					this.setLegendColor();
					d.legendSymbol = this.chart.renderer
						.rect(0, a.baseline - 11, g, k)
						.attr({ zIndex: 1 })
						.add(d.legendGroup);
					this.legendItemWidth = g + f + (l ? h : m);
					this.legendItemHeight = k + f + (l ? m : 0);
				};
				c.prototype.setState = function (a) {
					this.series.forEach(function (d) {
						d.setState(a);
					});
				};
				c.prototype.setVisible = function () {};
				c.prototype.getSeriesExtremes = function () {
					var a = this.series,
						d = a.length,
						c;
					this.dataMin = Infinity;
					for (this.dataMax = -Infinity; d--; ) {
						var h = a[d];
						var l = (h.colorKey = A(
							h.options.colorKey,
							h.colorKey,
							h.pointValKey,
							h.zoneAxis,
							"y"
						));
						var g = h.pointArrayMap;
						var k = h[l + "Min"] && h[l + "Max"];
						if (h[l + "Data"]) var m = h[l + "Data"];
						else if (g) {
							m = [];
							g = g.indexOf(l);
							var p = h.yData;
							if (0 <= g && p)
								for (c = 0; c < p.length; c++) m.push(A(p[c][g], p[c]));
						} else m = h.yData;
						k
							? ((h.minColorValue = h[l + "Min"]),
							  (h.maxColorValue = h[l + "Max"]))
							: ((m = M.prototype.getExtremes.call(h, m)),
							  (h.minColorValue = m.dataMin),
							  (h.maxColorValue = m.dataMax));
						"undefined" !== typeof h.minColorValue &&
							((this.dataMin = Math.min(this.dataMin, h.minColorValue)),
							(this.dataMax = Math.max(this.dataMax, h.maxColorValue)));
						k || M.prototype.applyExtremes.call(h);
					}
				};
				c.prototype.drawCrosshair = function (a, c) {
					var f = c && c.plotX,
						h = c && c.plotY,
						l = this.pos,
						g = this.len;
					if (c) {
						var k = this.toPixels(c.getNestedProperty(c.series.colorKey));
						k < l ? (k = l - 2) : k > l + g && (k = l + g + 2);
						c.plotX = k;
						c.plotY = this.len - k;
						d.prototype.drawCrosshair.call(this, a, c);
						c.plotX = f;
						c.plotY = h;
						this.cross &&
							!this.cross.addedToColorAxis &&
							this.legendGroup &&
							(this.cross
								.addClass("highcharts-coloraxis-marker")
								.add(this.legendGroup),
							(this.cross.addedToColorAxis = !0),
							!this.chart.styledMode &&
								this.crosshair &&
								this.cross.attr({ fill: this.crosshair.color }));
					}
				};
				c.prototype.getPlotLinePath = function (a) {
					var f = a.translatedValue;
					return z(f)
						? this.horiz
							? [
									["M", f - 4, this.top - 6],
									["L", f + 4, this.top - 6],
									["L", f, this.top],
									["Z"],
							  ]
							: [
									["M", this.left, f],
									["L", this.left - 6, f + 6],
									["L", this.left - 6, f - 6],
									["Z"],
							  ]
						: d.prototype.getPlotLinePath.call(this, a);
				};
				c.prototype.update = function (a, h) {
					var f = this.chart,
						l = f.legend,
						g = c.buildOptions(f, {}, a);
					this.series.forEach(function (a) {
						a.isDirtyData = !0;
					});
					((a.dataClasses && l.allItems) || this.dataClasses) &&
						this.destroyItems();
					f.options[this.coll] = m(this.userOptions, g);
					d.prototype.update.call(this, g, h);
					this.legendItem && (this.setLegendColor(), l.colorizeItem(this, !0));
				};
				c.prototype.destroyItems = function () {
					var a = this.chart;
					this.legendItem
						? a.legend.destroyItem(this)
						: this.legendItems &&
						  this.legendItems.forEach(function (d) {
								a.legend.destroyItem(d);
						  });
					a.isDirtyLegend = !0;
				};
				c.prototype.remove = function (a) {
					this.destroyItems();
					d.prototype.remove.call(this, a);
				};
				c.prototype.getDataClassLegendSymbols = function () {
					var d = this,
						c = d.chart,
						h = d.legendItems,
						l = c.options.legend,
						g = l.valueDecimals,
						k = l.valueSuffix || "",
						m;
					h.length ||
						d.dataClasses.forEach(function (f, l) {
							var q = !0,
								e = f.from,
								b = f.to,
								n = c.numberFormatter;
							m = "";
							"undefined" === typeof e
								? (m = "< ")
								: "undefined" === typeof b && (m = "> ");
							"undefined" !== typeof e && (m += n(e, g) + k);
							"undefined" !== typeof e &&
								"undefined" !== typeof b &&
								(m += " - ");
							"undefined" !== typeof b && (m += n(b, g) + k);
							h.push(
								t(
									{
										chart: c,
										name: m,
										options: {},
										drawLegendSymbol: D.drawRectangle,
										visible: !0,
										setState: a,
										isDataClass: !0,
										setVisible: function () {
											q = d.visible = !q;
											d.series.forEach(function (a) {
												a.points.forEach(function (a) {
													a.dataClass === l && a.setVisible(q);
												});
											});
											c.legend.colorizeItem(this, q);
										},
									},
									f
								)
							);
						});
					return h;
				};
				c.defaultLegendLength = 200;
				c.defaultOptions = {
					lineWidth: 0,
					minPadding: 0,
					maxPadding: 0,
					gridLineWidth: 1,
					tickPixelInterval: 72,
					startOnTick: !0,
					endOnTick: !0,
					offset: 0,
					marker: {
						animation: { duration: 50 },
						width: 0.01,
						color: "#999999",
					},
					labels: { overflow: "justify", rotation: 0 },
					minColor: "#e6ebf5",
					maxColor: "#003399",
					tickLength: 5,
					showInLegend: !0,
				};
				c.keepProps = [
					"legendGroup",
					"legendItemHeight",
					"legendItemWidth",
					"legendItem",
					"legendSymbol",
				];
				return c;
			})(c);
			Array.prototype.push.apply(c.keepProps, d.keepProps);
			v.ColorAxis = d;
			["fill", "stroke"].forEach(function (a) {
				x.prototype[a + "Setter"] = function () {
					this.elem.attr(
						a,
						B(this.start).tweenTo(B(this.end), this.pos),
						null,
						!0
					);
				};
			});
			g(K, "afterGetAxes", function () {
				var a = this,
					c = a.options;
				this.colorAxis = [];
				c.colorAxis &&
					((c.colorAxis = p(c.colorAxis)),
					c.colorAxis.forEach(function (f, c) {
						f.index = c;
						new d(a, f);
					}));
			});
			g(M, "bindAxes", function () {
				var a = this.axisTypes;
				a
					? -1 === a.indexOf("colorAxis") && a.push("colorAxis")
					: (this.axisTypes = ["colorAxis"]);
			});
			g(r, "afterGetAllItems", function (a) {
				var d = [],
					f,
					c;
				(this.chart.colorAxis || []).forEach(function (c) {
					(f = c.options) &&
						f.showInLegend &&
						(f.dataClasses && f.visible
							? (d = d.concat(c.getDataClassLegendSymbols()))
							: f.visible && d.push(c),
						c.series.forEach(function (d) {
							if (!d.options.showInLegend || f.dataClasses)
								"point" === d.options.legendType
									? d.points.forEach(function (d) {
											E(a.allItems, d);
									  })
									: E(a.allItems, d);
						}));
				});
				for (c = d.length; c--; ) a.allItems.unshift(d[c]);
			});
			g(r, "afterColorizeItem", function (a) {
				a.visible &&
					a.item.legendColor &&
					a.item.legendSymbol.attr({ fill: a.item.legendColor });
			});
			g(r, "afterUpdate", function () {
				var a = this.chart.colorAxis;
				a &&
					a.forEach(function (a, d, c) {
						a.update({}, c);
					});
			});
			g(M, "afterTranslate", function () {
				((this.chart.colorAxis && this.chart.colorAxis.length) ||
					this.colorAttribs) &&
					this.translateColors();
			});
			return d;
		}
	);
	N(
		v,
		"parts-map/ColorMapSeriesMixin.js",
		[v["parts/Globals.js"], v["parts/Point.js"], v["parts/Utilities.js"]],
		function (c, g, v) {
			var r = v.defined;
			v = c.noop;
			var D = c.seriesTypes;
			c.colorMapPointMixin = {
				dataLabelOnNull: !0,
				isValid: function () {
					return (
						null !== this.value &&
						Infinity !== this.value &&
						-Infinity !== this.value
					);
				},
				setState: function (c) {
					g.prototype.setState.call(this, c);
					this.graphic && this.graphic.attr({ zIndex: "hover" === c ? 1 : 0 });
				},
			};
			c.colorMapSeriesMixin = {
				pointArrayMap: ["value"],
				axisTypes: ["xAxis", "yAxis", "colorAxis"],
				trackerGroups: ["group", "markerGroup", "dataLabelsGroup"],
				getSymbol: v,
				parallelArrays: ["x", "y", "value"],
				colorKey: "value",
				pointAttribs: D.column.prototype.pointAttribs,
				colorAttribs: function (c) {
					var g = {};
					r(c.color) && (g[this.colorProp || "fill"] = c.color);
					return g;
				},
			};
		}
	);
	N(
		v,
		"parts-map/MapNavigation.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			function v(c) {
				c &&
					(c.preventDefault && c.preventDefault(),
					c.stopPropagation && c.stopPropagation(),
					(c.cancelBubble = !0));
			}
			function r(c) {
				this.init(c);
			}
			var D = g.addEvent,
				L = g.extend,
				K = g.merge,
				J = g.objectEach,
				B = g.pick;
			g = c.Chart;
			var E = c.doc;
			r.prototype.init = function (c) {
				this.chart = c;
				c.mapNavButtons = [];
			};
			r.prototype.update = function (c) {
				var g = this.chart,
					t = g.options.mapNavigation,
					m,
					r,
					p,
					E,
					k,
					a = function (a) {
						this.handler.call(g, a);
						v(a);
					},
					d = g.mapNavButtons;
				c && (t = g.options.mapNavigation = K(g.options.mapNavigation, c));
				for (; d.length; ) d.pop().destroy();
				B(t.enableButtons, t.enabled) &&
					!g.renderer.forExport &&
					J(t.buttons, function (c, h) {
						m = K(t.buttonOptions, c);
						g.styledMode ||
							((r = m.theme),
							(r.style = K(m.theme.style, m.style)),
							(E = (p = r.states) && p.hover),
							(k = p && p.select));
						c = g.renderer
							.button(
								m.text,
								0,
								0,
								a,
								r,
								E,
								k,
								0,
								"zoomIn" === h ? "topbutton" : "bottombutton"
							)
							.addClass(
								"highcharts-map-navigation highcharts-" +
									{ zoomIn: "zoom-in", zoomOut: "zoom-out" }[h]
							)
							.attr({
								width: m.width,
								height: m.height,
								title: g.options.lang[h],
								padding: m.padding,
								zIndex: 5,
							})
							.add();
						c.handler = m.onclick;
						D(c.element, "dblclick", v);
						d.push(c);
						var f = m,
							l = D(g, "load", function () {
								c.align(
									L(f, { width: c.width, height: 2 * c.height }),
									null,
									f.alignTo
								);
								l();
							});
					});
				this.updateEvents(t);
			};
			r.prototype.updateEvents = function (c) {
				var g = this.chart;
				B(c.enableDoubleClickZoom, c.enabled) || c.enableDoubleClickZoomTo
					? (this.unbindDblClick =
							this.unbindDblClick ||
							D(g.container, "dblclick", function (c) {
								g.pointer.onContainerDblClick(c);
							}))
					: this.unbindDblClick &&
					  (this.unbindDblClick = this.unbindDblClick());
				B(c.enableMouseWheelZoom, c.enabled)
					? (this.unbindMouseWheel =
							this.unbindMouseWheel ||
							D(
								g.container,
								"undefined" === typeof E.onmousewheel
									? "DOMMouseScroll"
									: "mousewheel",
								function (c) {
									g.pointer.onContainerMouseWheel(c);
									v(c);
									return !1;
								}
							))
					: this.unbindMouseWheel &&
					  (this.unbindMouseWheel = this.unbindMouseWheel());
			};
			L(g.prototype, {
				fitToBox: function (c, g) {
					[
						["x", "width"],
						["y", "height"],
					].forEach(function (t) {
						var m = t[0];
						t = t[1];
						c[m] + c[t] > g[m] + g[t] &&
							(c[t] > g[t]
								? ((c[t] = g[t]), (c[m] = g[m]))
								: (c[m] = g[m] + g[t] - c[t]));
						c[t] > g[t] && (c[t] = g[t]);
						c[m] < g[m] && (c[m] = g[m]);
					});
					return c;
				},
				mapZoom: function (c, g, r, m, v) {
					var p = this.xAxis[0],
						t = p.max - p.min,
						k = B(g, p.min + t / 2),
						a = t * c;
					t = this.yAxis[0];
					var d = t.max - t.min,
						l = B(r, t.min + d / 2);
					d *= c;
					k = this.fitToBox(
						{
							x: k - a * (m ? (m - p.pos) / p.len : 0.5),
							y: l - d * (v ? (v - t.pos) / t.len : 0.5),
							width: a,
							height: d,
						},
						{
							x: p.dataMin,
							y: t.dataMin,
							width: p.dataMax - p.dataMin,
							height: t.dataMax - t.dataMin,
						}
					);
					a =
						k.x <= p.dataMin &&
						k.width >= p.dataMax - p.dataMin &&
						k.y <= t.dataMin &&
						k.height >= t.dataMax - t.dataMin;
					m && p.mapAxis && (p.mapAxis.fixTo = [m - p.pos, g]);
					v && t.mapAxis && (t.mapAxis.fixTo = [v - t.pos, r]);
					"undefined" === typeof c || a
						? (p.setExtremes(void 0, void 0, !1),
						  t.setExtremes(void 0, void 0, !1))
						: (p.setExtremes(k.x, k.x + k.width, !1),
						  t.setExtremes(k.y, k.y + k.height, !1));
					this.redraw();
				},
			});
			D(g, "beforeRender", function () {
				this.mapNavigation = new r(this);
				this.mapNavigation.update();
			});
			c.MapNavigation = r;
		}
	);
	N(
		v,
		"parts-map/MapPointer.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			var v = g.extend,
				r = g.pick;
			g = g.wrap;
			c = c.Pointer;
			v(c.prototype, {
				onContainerDblClick: function (c) {
					var g = this.chart;
					c = this.normalize(c);
					g.options.mapNavigation.enableDoubleClickZoomTo
						? g.pointer.inClass(c.target, "highcharts-tracker") &&
						  g.hoverPoint &&
						  g.hoverPoint.zoomTo()
						: g.isInsidePlot(c.chartX - g.plotLeft, c.chartY - g.plotTop) &&
						  g.mapZoom(
								0.5,
								g.xAxis[0].toValue(c.chartX),
								g.yAxis[0].toValue(c.chartY),
								c.chartX,
								c.chartY
						  );
				},
				onContainerMouseWheel: function (c) {
					var g = this.chart;
					c = this.normalize(c);
					var r = c.detail || -(c.wheelDelta / 120);
					g.isInsidePlot(c.chartX - g.plotLeft, c.chartY - g.plotTop) &&
						g.mapZoom(
							Math.pow(g.options.mapNavigation.mouseWheelSensitivity, r),
							g.xAxis[0].toValue(c.chartX),
							g.yAxis[0].toValue(c.chartY),
							c.chartX,
							c.chartY
						);
				},
			});
			g(c.prototype, "zoomOption", function (c) {
				var g = this.chart.options.mapNavigation;
				r(g.enableTouchZoom, g.enabled) &&
					(this.chart.options.chart.pinchType = "xy");
				c.apply(this, [].slice.call(arguments, 1));
			});
			g(c.prototype, "pinchTranslate", function (c, g, r, v, B, E, t) {
				c.call(this, g, r, v, B, E, t);
				"map" === this.chart.options.chart.type &&
					this.hasZoom &&
					((c = v.scaleX > v.scaleY),
					this.pinchTranslateDirection(
						!c,
						g,
						r,
						v,
						B,
						E,
						t,
						c ? v.scaleX : v.scaleY
					));
			});
		}
	);
	N(
		v,
		"parts-map/MapSeries.js",
		[
			v["parts/Globals.js"],
			v["mixins/legend-symbol.js"],
			v["parts/Point.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, v, r) {
			var D = r.extend,
				G = r.fireEvent,
				K = r.getNestedProperty,
				J = r.isArray,
				B = r.isNumber,
				E = r.merge,
				t = r.objectEach,
				x = r.pick,
				z = r.seriesType,
				m = r.splat,
				A = c.colorMapPointMixin,
				p = c.noop,
				M = c.Series,
				k = c.seriesTypes;
			z(
				"map",
				"scatter",
				{
					animation: !1,
					dataLabels: {
						crop: !1,
						formatter: function () {
							return this.point.value;
						},
						inside: !0,
						overflow: !1,
						padding: 0,
						verticalAlign: "middle",
					},
					marker: null,
					nullColor: "#f7f7f7",
					stickyTracking: !1,
					tooltip: {
						followPointer: !0,
						pointFormat: "{point.name}: {point.value}<br/>",
					},
					turboThreshold: 0,
					allAreas: !0,
					borderColor: "#cccccc",
					borderWidth: 1,
					joinBy: "hc-key",
					states: {
						hover: { halo: null, brightness: 0.2 },
						normal: { animation: !0 },
						select: { color: "#cccccc" },
						inactive: { opacity: 1 },
					},
				},
				E(c.colorMapSeriesMixin, {
					type: "map",
					getExtremesFromAll: !0,
					useMapGeometry: !0,
					forceDL: !0,
					searchPoint: p,
					directTouch: !0,
					preserveAspectRatio: !0,
					pointArrayMap: ["value"],
					setOptions: function (a) {
						a = M.prototype.setOptions.call(this, a);
						var d = a.joinBy;
						null === d && (d = "_i");
						d = this.joinBy = m(d);
						d[1] || (d[1] = d[0]);
						return a;
					},
					getBox: function (a) {
						var d = Number.MAX_VALUE,
							g = -d,
							h = d,
							f = -d,
							k = d,
							m = d,
							p = this.xAxis,
							t = this.yAxis,
							r;
						(a || []).forEach(function (a) {
							if (a.path) {
								"string" === typeof a.path
									? (a.path = c.splitPath(a.path))
									: "M" === a.path[0] &&
									  (a.path = c.SVGRenderer.prototype.pathToSegments(a.path));
								var l = a.path || [],
									q = -d,
									p = d,
									e = -d,
									b = d,
									n = a.properties;
								a._foundBox ||
									(l.forEach(function (a) {
										var d = a[a.length - 2];
										a = a[a.length - 1];
										"number" === typeof d &&
											"number" === typeof a &&
											((p = Math.min(p, d)),
											(q = Math.max(q, d)),
											(b = Math.min(b, a)),
											(e = Math.max(e, a)));
									}),
									(a._midX =
										p + (q - p) * x(a.middleX, n && n["hc-middle-x"], 0.5)),
									(a._midY =
										b + (e - b) * x(a.middleY, n && n["hc-middle-y"], 0.5)),
									(a._maxX = q),
									(a._minX = p),
									(a._maxY = e),
									(a._minY = b),
									(a.labelrank = x(a.labelrank, (q - p) * (e - b))),
									(a._foundBox = !0));
								g = Math.max(g, a._maxX);
								h = Math.min(h, a._minX);
								f = Math.max(f, a._maxY);
								k = Math.min(k, a._minY);
								m = Math.min(a._maxX - a._minX, a._maxY - a._minY, m);
								r = !0;
							}
						});
						r &&
							((this.minY = Math.min(k, x(this.minY, d))),
							(this.maxY = Math.max(f, x(this.maxY, -d))),
							(this.minX = Math.min(h, x(this.minX, d))),
							(this.maxX = Math.max(g, x(this.maxX, -d))),
							p &&
								"undefined" === typeof p.options.minRange &&
								(p.minRange = Math.min(
									5 * m,
									(this.maxX - this.minX) / 5,
									p.minRange || d
								)),
							t &&
								"undefined" === typeof t.options.minRange &&
								(t.minRange = Math.min(
									5 * m,
									(this.maxY - this.minY) / 5,
									t.minRange || d
								)));
					},
					hasData: function () {
						return !!this.processedXData.length;
					},
					getExtremes: function () {
						var a = M.prototype.getExtremes.call(this, this.valueData),
							d = a.dataMin;
						a = a.dataMax;
						this.chart.hasRendered &&
							this.isDirtyData &&
							this.getBox(this.options.data);
						B(d) && (this.valueMin = d);
						B(a) && (this.valueMax = a);
						return { dataMin: this.minY, dataMax: this.maxY };
					},
					translatePath: function (a) {
						var d = this.xAxis,
							c = this.yAxis,
							h = d.min,
							f = d.transA,
							g = d.minPixelPadding,
							k = c.min,
							m = c.transA,
							p = c.minPixelPadding,
							t = [];
						a &&
							a.forEach(function (a) {
								"M" === a[0]
									? t.push([
											"M",
											(a[1] - (h || 0)) * f + g,
											(a[2] - (k || 0)) * m + p,
									  ])
									: "L" === a[0]
									? t.push([
											"L",
											(a[1] - (h || 0)) * f + g,
											(a[2] - (k || 0)) * m + p,
									  ])
									: "C" === a[0]
									? t.push([
											"C",
											(a[1] - (h || 0)) * f + g,
											(a[2] - (k || 0)) * m + p,
											(a[3] - (h || 0)) * f + g,
											(a[4] - (k || 0)) * m + p,
											(a[5] - (h || 0)) * f + g,
											(a[6] - (k || 0)) * m + p,
									  ])
									: "Q" === a[0]
									? t.push([
											"Q",
											(a[1] - (h || 0)) * f + g,
											(a[2] - (k || 0)) * m + p,
											(a[3] - (h || 0)) * f + g,
											(a[4] - (k || 0)) * m + p,
									  ])
									: "Z" === a[0] && t.push(["Z"]);
							});
						return t;
					},
					setData: function (a, d, g, h) {
						var f = this.options,
							l = this.chart.options.chart,
							k = l && l.map,
							m = f.mapData,
							p = this.joinBy,
							r = f.keys || this.pointArrayMap,
							z = [],
							x = {},
							A = this.chart.mapTransforms;
						!m && k && (m = "string" === typeof k ? c.maps[k] : k);
						a &&
							a.forEach(function (b, d) {
								var e = 0;
								if (B(b)) a[d] = { value: b };
								else if (J(b)) {
									a[d] = {};
									!f.keys &&
										b.length > r.length &&
										"string" === typeof b[0] &&
										((a[d]["hc-key"] = b[0]), ++e);
									for (var c = 0; c < r.length; ++c, ++e)
										r[c] &&
											"undefined" !== typeof b[e] &&
											(0 < r[c].indexOf(".")
												? v.prototype.setNestedProperty(a[d], b[e], r[c])
												: (a[d][r[c]] = b[e]));
								}
								p && "_i" === p[0] && (a[d]._i = d);
							});
						this.getBox(a);
						(this.chart.mapTransforms = A =
							(l && l.mapTransforms) || (m && m["hc-transform"]) || A) &&
							t(A, function (a) {
								a.rotation &&
									((a.cosAngle = Math.cos(a.rotation)),
									(a.sinAngle = Math.sin(a.rotation)));
							});
						if (m) {
							"FeatureCollection" === m.type &&
								((this.mapTitle = m.title),
								(m = c.geojson(m, this.type, this)));
							this.mapData = m;
							this.mapMap = {};
							for (A = 0; A < m.length; A++)
								(l = m[A]),
									(k = l.properties),
									(l._i = A),
									p[0] && k && k[p[0]] && (l[p[0]] = k[p[0]]),
									(x[l[p[0]]] = l);
							this.mapMap = x;
							if (a && p[1]) {
								var C = p[1];
								a.forEach(function (a) {
									a = K(C, a);
									x[a] && z.push(x[a]);
								});
							}
							if (f.allAreas) {
								this.getBox(m);
								a = a || [];
								if (p[1]) {
									var e = p[1];
									a.forEach(function (a) {
										z.push(K(e, a));
									});
								}
								z =
									"|" +
									z
										.map(function (a) {
											return a && a[p[0]];
										})
										.join("|") +
									"|";
								m.forEach(function (b) {
									(p[0] && -1 !== z.indexOf("|" + b[p[0]] + "|")) ||
										(a.push(E(b, { value: null })), (h = !1));
								});
							} else this.getBox(z);
						}
						M.prototype.setData.call(this, a, d, g, h);
					},
					drawGraph: p,
					drawDataLabels: p,
					doFullTranslate: function () {
						return (
							this.isDirtyData ||
							this.chart.isResizing ||
							this.chart.renderer.isVML ||
							!this.baseTrans
						);
					},
					translate: function () {
						var a = this,
							d = a.xAxis,
							c = a.yAxis,
							h = a.doFullTranslate();
						a.generatePoints();
						a.data.forEach(function (f) {
							B(f._midX) &&
								B(f._midY) &&
								((f.plotX = d.toPixels(f._midX, !0)),
								(f.plotY = c.toPixels(f._midY, !0)));
							h &&
								((f.shapeType = "path"),
								(f.shapeArgs = { d: a.translatePath(f.path) }));
						});
						G(a, "afterTranslate");
					},
					pointAttribs: function (a, d) {
						d = a.series.chart.styledMode
							? this.colorAttribs(a)
							: k.column.prototype.pointAttribs.call(this, a, d);
						d["stroke-width"] = x(
							a.options[
								(this.pointAttrToOptions &&
									this.pointAttrToOptions["stroke-width"]) ||
									"borderWidth"
							],
							"inherit"
						);
						return d;
					},
					drawPoints: function () {
						var a = this,
							d = a.xAxis,
							c = a.yAxis,
							h = a.group,
							f = a.chart,
							g = f.renderer,
							m = this.baseTrans;
						a.transformGroup ||
							((a.transformGroup = g.g().attr({ scaleX: 1, scaleY: 1 }).add(h)),
							(a.transformGroup.survive = !0));
						if (a.doFullTranslate())
							f.hasRendered &&
								!f.styledMode &&
								a.points.forEach(function (b) {
									b.shapeArgs &&
										(b.shapeArgs.fill = a.pointAttribs(b, b.state).fill);
								}),
								(a.group = a.transformGroup),
								k.column.prototype.drawPoints.apply(a),
								(a.group = h),
								a.points.forEach(function (b) {
									if (b.graphic) {
										var d = "";
										b.name &&
											(d +=
												"highcharts-name-" +
												b.name.replace(/ /g, "-").toLowerCase());
										b.properties &&
											b.properties["hc-key"] &&
											(d +=
												" highcharts-key-" +
												b.properties["hc-key"].toLowerCase());
										d && b.graphic.addClass(d);
										f.styledMode &&
											b.graphic.css(
												a.pointAttribs(b, (b.selected && "select") || void 0)
											);
									}
								}),
								(this.baseTrans = {
									originX: d.min - d.minPixelPadding / d.transA,
									originY:
										c.min -
										c.minPixelPadding / c.transA +
										(c.reversed ? 0 : c.len / c.transA),
									transAX: d.transA,
									transAY: c.transA,
								}),
								this.transformGroup.animate({
									translateX: 0,
									translateY: 0,
									scaleX: 1,
									scaleY: 1,
								});
						else {
							var p = d.transA / m.transAX;
							var t = c.transA / m.transAY;
							var r = d.toPixels(m.originX, !0);
							var z = c.toPixels(m.originY, !0);
							0.99 < p &&
								1.01 > p &&
								0.99 < t &&
								1.01 > t &&
								((t = p = 1), (r = Math.round(r)), (z = Math.round(z)));
							var v = this.transformGroup;
							if (f.renderer.globalAnimation) {
								var A = v.attr("translateX");
								var B = v.attr("translateY");
								var e = v.attr("scaleX");
								var b = v.attr("scaleY");
								v.attr({ animator: 0 }).animate(
									{ animator: 1 },
									{
										step: function (a, d) {
											v.attr({
												translateX: A + (r - A) * d.pos,
												translateY: B + (z - B) * d.pos,
												scaleX: e + (p - e) * d.pos,
												scaleY: b + (t - b) * d.pos,
											});
										},
									}
								);
							} else
								v.attr({ translateX: r, translateY: z, scaleX: p, scaleY: t });
						}
						f.styledMode ||
							h.element.setAttribute(
								"stroke-width",
								x(
									a.options[
										(a.pointAttrToOptions &&
											a.pointAttrToOptions["stroke-width"]) ||
											"borderWidth"
									],
									1
								) / (p || 1)
							);
						this.drawMapDataLabels();
					},
					drawMapDataLabels: function () {
						M.prototype.drawDataLabels.call(this);
						this.dataLabelsGroup &&
							this.dataLabelsGroup.clip(this.chart.clipRect);
					},
					render: function () {
						var a = this,
							d = M.prototype.render;
						a.chart.renderer.isVML && 3e3 < a.data.length
							? setTimeout(function () {
									d.call(a);
							  })
							: d.call(a);
					},
					animate: function (a) {
						var d = this.options.animation,
							c = this.group,
							h = this.xAxis,
							f = this.yAxis,
							g = h.pos,
							k = f.pos;
						this.chart.renderer.isSVG &&
							(!0 === d && (d = { duration: 1e3 }),
							a
								? c.attr({
										translateX: g + h.len / 2,
										translateY: k + f.len / 2,
										scaleX: 0.001,
										scaleY: 0.001,
								  })
								: c.animate(
										{ translateX: g, translateY: k, scaleX: 1, scaleY: 1 },
										d
								  ));
					},
					animateDrilldown: function (a) {
						var d = this.chart.plotBox,
							c = this.chart.drilldownLevels[
								this.chart.drilldownLevels.length - 1
							],
							h = c.bBox,
							f = this.chart.options.drilldown.animation;
						a ||
							((a = Math.min(h.width / d.width, h.height / d.height)),
							(c.shapeArgs = {
								scaleX: a,
								scaleY: a,
								translateX: h.x,
								translateY: h.y,
							}),
							this.points.forEach(function (a) {
								a.graphic &&
									a.graphic
										.attr(c.shapeArgs)
										.animate(
											{ scaleX: 1, scaleY: 1, translateX: 0, translateY: 0 },
											f
										);
							}));
					},
					drawLegendSymbol: g.drawRectangle,
					animateDrillupFrom: function (a) {
						k.column.prototype.animateDrillupFrom.call(this, a);
					},
					animateDrillupTo: function (a) {
						k.column.prototype.animateDrillupTo.call(this, a);
					},
				}),
				D(
					{
						applyOptions: function (a, d) {
							var c = this.series;
							a = v.prototype.applyOptions.call(this, a, d);
							d = c.joinBy;
							c.mapData &&
								c.mapMap &&
								((d = v.prototype.getNestedProperty.call(a, d[1])),
								(d = "undefined" !== typeof d && c.mapMap[d])
									? (c.xyFromShape && ((a.x = d._midX), (a.y = d._midY)),
									  D(a, d))
									: (a.value = a.value || null));
							return a;
						},
						onMouseOver: function (a) {
							r.clearTimeout(this.colorInterval);
							if (null !== this.value || this.series.options.nullInteraction)
								v.prototype.onMouseOver.call(this, a);
							else this.series.onMouseOut(a);
						},
						zoomTo: function () {
							var a = this.series;
							a.xAxis.setExtremes(this._minX, this._maxX, !1);
							a.yAxis.setExtremes(this._minY, this._maxY, !1);
							a.chart.redraw();
						},
					},
					A
				)
			);
			("");
		}
	);
	N(
		v,
		"parts-map/MapLineSeries.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			g = g.seriesType;
			var v = c.seriesTypes;
			g(
				"mapline",
				"map",
				{ lineWidth: 1, fillColor: "none" },
				{
					type: "mapline",
					colorProp: "stroke",
					pointAttrToOptions: { stroke: "color", "stroke-width": "lineWidth" },
					pointAttribs: function (c, g) {
						c = v.map.prototype.pointAttribs.call(this, c, g);
						c.fill = this.options.fillColor;
						return c;
					},
					drawLegendSymbol: v.line.prototype.drawLegendSymbol,
				}
			);
			("");
		}
	);
	N(v, "parts-map/MapPointSeries.js", [v["parts/Globals.js"]], function (c) {
		var g = c.merge,
			v = c.Point,
			r = c.Series;
		c = c.seriesType;
		c(
			"mappoint",
			"scatter",
			{
				dataLabels: {
					crop: !1,
					defer: !1,
					enabled: !0,
					formatter: function () {
						return this.point.name;
					},
					overflow: !1,
					style: { color: "#000000" },
				},
			},
			{
				type: "mappoint",
				forceDL: !0,
				drawDataLabels: function () {
					r.prototype.drawDataLabels.call(this);
					this.dataLabelsGroup &&
						this.dataLabelsGroup.clip(this.chart.clipRect);
				},
			},
			{
				applyOptions: function (c, r) {
					c =
						"undefined" !== typeof c.lat && "undefined" !== typeof c.lon
							? g(c, this.series.chart.fromLatLonToPoint(c))
							: c;
					return v.prototype.applyOptions.call(this, c, r);
				},
			}
		);
		("");
	});
	N(
		v,
		"parts-more/BubbleLegend.js",
		[
			v["parts/Globals.js"],
			v["parts/Color.js"],
			v["parts/Legend.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, v, r) {
			"";
			var D = g.parse;
			g = r.addEvent;
			var G = r.arrayMax,
				K = r.arrayMin,
				J = r.isNumber,
				B = r.merge,
				E = r.objectEach,
				t = r.pick,
				x = r.stableSort,
				z = r.wrap,
				m = c.Series,
				A = c.Chart,
				p = c.noop,
				M = c.setOptions;
			M({
				legend: {
					bubbleLegend: {
						borderColor: void 0,
						borderWidth: 2,
						className: void 0,
						color: void 0,
						connectorClassName: void 0,
						connectorColor: void 0,
						connectorDistance: 60,
						connectorWidth: 1,
						enabled: !1,
						labels: {
							className: void 0,
							allowOverlap: !1,
							format: "",
							formatter: void 0,
							align: "right",
							style: { fontSize: 10, color: void 0 },
							x: 0,
							y: 0,
						},
						maxSize: 60,
						minSize: 10,
						legendIndex: 0,
						ranges: {
							value: void 0,
							borderColor: void 0,
							color: void 0,
							connectorColor: void 0,
						},
						sizeBy: "area",
						sizeByAbsoluteValue: !1,
						zIndex: 1,
						zThreshold: 0,
					},
				},
			});
			M = (function () {
				function c(a, d) {
					this.options = this.symbols = this.visible = this.ranges = this.movementX = this.maxLabel = this.legendSymbol = this.legendItemWidth = this.legendItemHeight = this.legendItem = this.legendGroup = this.legend = this.fontMetrics = this.chart = void 0;
					this.setState = p;
					this.init(a, d);
				}
				c.prototype.init = function (a, d) {
					this.options = a;
					this.visible = !0;
					this.chart = d.chart;
					this.legend = d;
				};
				c.prototype.addToLegend = function (a) {
					a.splice(this.options.legendIndex, 0, this);
				};
				c.prototype.drawLegendSymbol = function (a) {
					var d = this.chart,
						c = this.options,
						h = t(a.options.itemDistance, 20),
						f = c.ranges;
					var g = c.connectorDistance;
					this.fontMetrics = d.renderer.fontMetrics(
						c.labels.style.fontSize.toString() + "px"
					);
					f && f.length && J(f[0].value)
						? (x(f, function (a, d) {
								return d.value - a.value;
						  }),
						  (this.ranges = f),
						  this.setOptions(),
						  this.render(),
						  (d = this.getMaxLabelSize()),
						  (f = this.ranges[0].radius),
						  (a = 2 * f),
						  (g = g - f + d.width),
						  (g = 0 < g ? g : 0),
						  (this.maxLabel = d),
						  (this.movementX = "left" === c.labels.align ? g : 0),
						  (this.legendItemWidth = a + g + h),
						  (this.legendItemHeight = a + this.fontMetrics.h / 2))
						: (a.options.bubbleLegend.autoRanges = !0);
				};
				c.prototype.setOptions = function () {
					var a = this.ranges,
						d = this.options,
						c = this.chart.series[d.seriesIndex],
						h = this.legend.baseline,
						f = { "z-index": d.zIndex, "stroke-width": d.borderWidth },
						g = { "z-index": d.zIndex, "stroke-width": d.connectorWidth },
						k = this.getLabelStyles(),
						m = c.options.marker.fillOpacity,
						p = this.chart.styledMode;
					a.forEach(function (l, q) {
						p ||
							((f.stroke = t(l.borderColor, d.borderColor, c.color)),
							(f.fill = t(
								l.color,
								d.color,
								1 !== m ? D(c.color).setOpacity(m).get("rgba") : c.color
							)),
							(g.stroke = t(l.connectorColor, d.connectorColor, c.color)));
						a[q].radius = this.getRangeRadius(l.value);
						a[q] = B(a[q], { center: a[0].radius - a[q].radius + h });
						p ||
							B(!0, a[q], {
								bubbleStyle: B(!1, f),
								connectorStyle: B(!1, g),
								labelStyle: k,
							});
					}, this);
				};
				c.prototype.getLabelStyles = function () {
					var a = this.options,
						d = {},
						c = "left" === a.labels.align,
						h = this.legend.options.rtl;
					E(a.labels.style, function (a, c) {
						"color" !== c && "fontSize" !== c && "z-index" !== c && (d[c] = a);
					});
					return B(!1, d, {
						"font-size": a.labels.style.fontSize,
						fill: t(a.labels.style.color, "#000000"),
						"z-index": a.zIndex,
						align: h || c ? "right" : "left",
					});
				};
				c.prototype.getRangeRadius = function (a) {
					var d = this.options;
					return this.chart.series[this.options.seriesIndex].getRadius.call(
						this,
						d.ranges[d.ranges.length - 1].value,
						d.ranges[0].value,
						d.minSize,
						d.maxSize,
						a
					);
				};
				c.prototype.render = function () {
					var a = this.chart.renderer,
						d = this.options.zThreshold;
					this.symbols ||
						(this.symbols = { connectors: [], bubbleItems: [], labels: [] });
					this.legendSymbol = a.g("bubble-legend");
					this.legendItem = a.g("bubble-legend-item");
					this.legendSymbol.translateX = 0;
					this.legendSymbol.translateY = 0;
					this.ranges.forEach(function (a) {
						a.value >= d && this.renderRange(a);
					}, this);
					this.legendSymbol.add(this.legendItem);
					this.legendItem.add(this.legendGroup);
					this.hideOverlappingLabels();
				};
				c.prototype.renderRange = function (a) {
					var d = this.options,
						c = d.labels,
						h = this.chart.renderer,
						f = this.symbols,
						g = f.labels,
						k = a.center,
						m = Math.abs(a.radius),
						p = d.connectorDistance || 0,
						t = c.align,
						r = c.style.fontSize;
					p = this.legend.options.rtl || "left" === t ? -p : p;
					c = d.connectorWidth;
					var z = this.ranges[0].radius || 0,
						x = k - m - d.borderWidth / 2 + c / 2;
					r = r / 2 - (this.fontMetrics.h - r) / 2;
					var v = h.styledMode;
					"center" === t &&
						((p = 0),
						(d.connectorDistance = 0),
						(a.labelStyle.align = "center"));
					t = x + d.labels.y;
					var e = z + p + d.labels.x;
					f.bubbleItems.push(
						h
							.circle(z, k + ((x % 1 ? 1 : 0.5) - (c % 2 ? 0 : 0.5)), m)
							.attr(v ? {} : a.bubbleStyle)
							.addClass(
								(v
									? "highcharts-color-" + this.options.seriesIndex + " "
									: "") +
									"highcharts-bubble-legend-symbol " +
									(d.className || "")
							)
							.add(this.legendSymbol)
					);
					f.connectors.push(
						h
							.path(
								h.crispLine(
									[
										["M", z, x],
										["L", z + p, x],
									],
									d.connectorWidth
								)
							)
							.attr(v ? {} : a.connectorStyle)
							.addClass(
								(v
									? "highcharts-color-" + this.options.seriesIndex + " "
									: "") +
									"highcharts-bubble-legend-connectors " +
									(d.connectorClassName || "")
							)
							.add(this.legendSymbol)
					);
					a = h
						.text(this.formatLabel(a), e, t + r)
						.attr(v ? {} : a.labelStyle)
						.addClass(
							"highcharts-bubble-legend-labels " + (d.labels.className || "")
						)
						.add(this.legendSymbol);
					g.push(a);
					a.placed = !0;
					a.alignAttr = { x: e, y: t + r };
				};
				c.prototype.getMaxLabelSize = function () {
					var a, d;
					this.symbols.labels.forEach(function (c) {
						d = c.getBBox(!0);
						a = a ? (d.width > a.width ? d : a) : d;
					});
					return a || {};
				};
				c.prototype.formatLabel = function (a) {
					var d = this.options,
						c = d.labels.formatter;
					d = d.labels.format;
					var h = this.chart.numberFormatter;
					return d ? r.format(d, a) : c ? c.call(a) : h(a.value, 1);
				};
				c.prototype.hideOverlappingLabels = function () {
					var a = this.chart,
						d = this.symbols;
					!this.options.labels.allowOverlap &&
						d &&
						(a.hideOverlappingLabels(d.labels),
						d.labels.forEach(function (a, c) {
							a.newOpacity
								? a.newOpacity !== a.oldOpacity && d.connectors[c].show()
								: d.connectors[c].hide();
						}));
				};
				c.prototype.getRanges = function () {
					var a = this.legend.bubbleLegend,
						d = a.options.ranges,
						c,
						h = Number.MAX_VALUE,
						f = -Number.MAX_VALUE;
					a.chart.series.forEach(function (a) {
						a.isBubble &&
							!a.ignoreSeries &&
							((c = a.zData.filter(J)),
							c.length &&
								((h = t(
									a.options.zMin,
									Math.min(
										h,
										Math.max(
											K(c),
											!1 === a.options.displayNegative
												? a.options.zThreshold
												: -Number.MAX_VALUE
										)
									)
								)),
								(f = t(a.options.zMax, Math.max(f, G(c))))));
					});
					var g =
						h === f
							? [{ value: f }]
							: [
									{ value: h },
									{ value: (h + f) / 2 },
									{ value: f, autoRanges: !0 },
							  ];
					d.length && d[0].radius && g.reverse();
					g.forEach(function (a, c) {
						d && d[c] && (g[c] = B(!1, d[c], a));
					});
					return g;
				};
				c.prototype.predictBubbleSizes = function () {
					var a = this.chart,
						d = this.fontMetrics,
						c = a.legend.options,
						h = "horizontal" === c.layout,
						f = h ? a.legend.lastLineHeight : 0,
						g = a.plotSizeX,
						k = a.plotSizeY,
						m = a.series[this.options.seriesIndex];
					a = Math.ceil(m.minPxSize);
					var p = Math.ceil(m.maxPxSize);
					m = m.options.maxSize;
					var t = Math.min(k, g);
					if (c.floating || !/%$/.test(m)) d = p;
					else if (
						((m = parseFloat(m)),
						(d = ((t + f - d.h / 2) * m) / 100 / (m / 100 + 1)),
						(h && k - d >= g) || (!h && g - d >= k))
					)
						d = p;
					return [a, Math.ceil(d)];
				};
				c.prototype.updateRanges = function (a, d) {
					var c = this.legend.options.bubbleLegend;
					c.minSize = a;
					c.maxSize = d;
					c.ranges = this.getRanges();
				};
				c.prototype.correctSizes = function () {
					var a = this.legend,
						d = this.chart.series[this.options.seriesIndex];
					1 < Math.abs(Math.ceil(d.maxPxSize) - this.options.maxSize) &&
						(this.updateRanges(this.options.minSize, d.maxPxSize), a.render());
				};
				return c;
			})();
			g(v, "afterGetAllItems", function (g) {
				var a = this.bubbleLegend,
					d = this.options,
					k = d.bubbleLegend,
					h = this.chart.getVisibleBubbleSeriesIndex();
				a &&
					a.ranges &&
					a.ranges.length &&
					(k.ranges.length && (k.autoRanges = !!k.ranges[0].autoRanges),
					this.destroyItem(a));
				0 <= h &&
					d.enabled &&
					k.enabled &&
					((k.seriesIndex = h),
					(this.bubbleLegend = new c.BubbleLegend(k, this)),
					this.bubbleLegend.addToLegend(g.allItems));
			});
			A.prototype.getVisibleBubbleSeriesIndex = function () {
				for (var c = this.series, a = 0; a < c.length; ) {
					if (c[a] && c[a].isBubble && c[a].visible && c[a].zData.length)
						return a;
					a++;
				}
				return -1;
			};
			v.prototype.getLinesHeights = function () {
				var c = this.allItems,
					a = [],
					d = c.length,
					g,
					h = 0;
				for (g = 0; g < d; g++)
					if (
						(c[g].legendItemHeight && (c[g].itemHeight = c[g].legendItemHeight),
						c[g] === c[d - 1] ||
							(c[g + 1] &&
								c[g]._legendItemPos[1] !== c[g + 1]._legendItemPos[1]))
					) {
						a.push({ height: 0 });
						var f = a[a.length - 1];
						for (h; h <= g; h++)
							c[h].itemHeight > f.height && (f.height = c[h].itemHeight);
						f.step = g;
					}
				return a;
			};
			v.prototype.retranslateItems = function (c) {
				var a,
					d,
					g,
					h = this.options.rtl,
					f = 0;
				this.allItems.forEach(function (k, l) {
					a = k.legendGroup.translateX;
					d = k._legendItemPos[1];
					if ((g = k.movementX) || (h && k.ranges))
						(g = h ? a - k.options.maxSize / 2 : a + g),
							k.legendGroup.attr({ translateX: g });
					l > c[f].step && f++;
					k.legendGroup.attr({ translateY: Math.round(d + c[f].height / 2) });
					k._legendItemPos[1] = d + c[f].height / 2;
				});
			};
			g(m, "legendItemClick", function () {
				var c = this.chart,
					a = this.visible,
					d = this.chart.legend;
				d &&
					d.bubbleLegend &&
					((this.visible = !a),
					(this.ignoreSeries = a),
					(c = 0 <= c.getVisibleBubbleSeriesIndex()),
					d.bubbleLegend.visible !== c &&
						(d.update({ bubbleLegend: { enabled: c } }),
						(d.bubbleLegend.visible = c)),
					(this.visible = a));
			});
			z(A.prototype, "drawChartBox", function (c, a, d) {
				var g = this.legend,
					h = 0 <= this.getVisibleBubbleSeriesIndex();
				if (
					g &&
					g.options.enabled &&
					g.bubbleLegend &&
					g.options.bubbleLegend.autoRanges &&
					h
				) {
					var f = g.bubbleLegend.options;
					h = g.bubbleLegend.predictBubbleSizes();
					g.bubbleLegend.updateRanges(h[0], h[1]);
					f.placed ||
						((g.group.placed = !1),
						g.allItems.forEach(function (a) {
							a.legendGroup.translateY = null;
						}));
					g.render();
					this.getMargins();
					this.axes.forEach(function (a) {
						a.visible && a.render();
						f.placed ||
							(a.setScale(),
							a.updateNames(),
							E(a.ticks, function (a) {
								a.isNew = !0;
								a.isNewLabel = !0;
							}));
					});
					f.placed = !0;
					this.getMargins();
					c.call(this, a, d);
					g.bubbleLegend.correctSizes();
					g.retranslateItems(g.getLinesHeights());
				} else c.call(this, a, d), g && g.options.enabled && g.bubbleLegend && (g.render(), g.retranslateItems(g.getLinesHeights()));
			});
			c.BubbleLegend = M;
			return c.BubbleLegend;
		}
	);
	N(
		v,
		"parts-more/BubbleSeries.js",
		[
			v["parts/Globals.js"],
			v["parts/Color.js"],
			v["parts/Point.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, v, r) {
			var D = g.parse,
				G = r.arrayMax,
				K = r.arrayMin,
				J = r.clamp,
				B = r.extend,
				E = r.isNumber,
				t = r.pick,
				x = r.pInt;
			g = r.seriesType;
			r = c.Axis;
			var z = c.noop,
				m = c.Series,
				A = c.seriesTypes;
			g(
				"bubble",
				"scatter",
				{
					dataLabels: {
						formatter: function () {
							return this.point.z;
						},
						inside: !0,
						verticalAlign: "middle",
					},
					animationLimit: 250,
					marker: {
						lineColor: null,
						lineWidth: 1,
						fillOpacity: 0.5,
						radius: null,
						states: { hover: { radiusPlus: 0 } },
						symbol: "circle",
					},
					minSize: 8,
					maxSize: "20%",
					softThreshold: !1,
					states: { hover: { halo: { size: 5 } } },
					tooltip: { pointFormat: "({point.x}, {point.y}), Size: {point.z}" },
					turboThreshold: 0,
					zThreshold: 0,
					zoneAxis: "z",
				},
				{
					pointArrayMap: ["y", "z"],
					parallelArrays: ["x", "y", "z"],
					trackerGroups: ["group", "dataLabelsGroup"],
					specialGroup: "group",
					bubblePadding: !0,
					zoneAxis: "z",
					directTouch: !0,
					isBubble: !0,
					pointAttribs: function (c, g) {
						var k = this.options.marker.fillOpacity;
						c = m.prototype.pointAttribs.call(this, c, g);
						1 !== k && (c.fill = D(c.fill).setOpacity(k).get("rgba"));
						return c;
					},
					getRadii: function (c, g, k) {
						var a = this.zData,
							d = this.yData,
							l = k.minPxSize,
							h = k.maxPxSize,
							f = [];
						var m = 0;
						for (k = a.length; m < k; m++) {
							var p = a[m];
							f.push(this.getRadius(c, g, l, h, p, d[m]));
						}
						this.radii = f;
					},
					getRadius: function (c, g, k, a, d, l) {
						var h = this.options,
							f = "width" !== h.sizeBy,
							m = h.zThreshold,
							p = g - c,
							t = 0.5;
						if (null === l || null === d) return null;
						if (E(d)) {
							h.sizeByAbsoluteValue &&
								((d = Math.abs(d - m)),
								(p = Math.max(g - m, Math.abs(c - m))),
								(c = 0));
							if (d < c) return k / 2 - 1;
							0 < p && (t = (d - c) / p);
						}
						f && 0 <= t && (t = Math.sqrt(t));
						return Math.ceil(k + t * (a - k)) / 2;
					},
					animate: function (c) {
						!c &&
							this.points.length < this.options.animationLimit &&
							this.points.forEach(function (c) {
								var g = c.graphic;
								if (g && g.width) {
									var a = { x: g.x, y: g.y, width: g.width, height: g.height };
									g.attr({ x: c.plotX, y: c.plotY, width: 1, height: 1 });
									g.animate(a, this.options.animation);
								}
							}, this);
					},
					hasData: function () {
						return !!this.processedXData.length;
					},
					translate: function () {
						var c,
							g = this.data,
							k = this.radii;
						A.scatter.prototype.translate.call(this);
						for (c = g.length; c--; ) {
							var a = g[c];
							var d = k ? k[c] : 0;
							E(d) && d >= this.minPxSize / 2
								? ((a.marker = B(a.marker, {
										radius: d,
										width: 2 * d,
										height: 2 * d,
								  })),
								  (a.dlBox = {
										x: a.plotX - d,
										y: a.plotY - d,
										width: 2 * d,
										height: 2 * d,
								  }))
								: (a.shapeArgs = a.plotY = a.dlBox = void 0);
						}
					},
					alignDataLabel: A.column.prototype.alignDataLabel,
					buildKDTree: z,
					applyZones: z,
				},
				{
					haloPath: function (c) {
						return v.prototype.haloPath.call(
							this,
							0 === c ? 0 : (this.marker ? this.marker.radius || 0 : 0) + c
						);
					},
					ttBelow: !1,
				}
			);
			r.prototype.beforePadding = function () {
				var c = this,
					g = this.len,
					k = this.chart,
					a = 0,
					d = g,
					l = this.isXAxis,
					h = l ? "xData" : "yData",
					f = this.min,
					m = {},
					u = Math.min(k.plotWidth, k.plotHeight),
					r = Number.MAX_VALUE,
					z = -Number.MAX_VALUE,
					v = this.max - f,
					A = g / v,
					B = [];
				this.series.forEach(function (a) {
					var d = a.options;
					!a.bubblePadding ||
						(!a.visible && k.options.chart.ignoreHiddenSeries) ||
						((c.allowZoomOutside = !0),
						B.push(a),
						l &&
							(["minSize", "maxSize"].forEach(function (a) {
								var b = d[a],
									e = /%$/.test(b);
								b = x(b);
								m[a] = e ? (u * b) / 100 : b;
							}),
							(a.minPxSize = m.minSize),
							(a.maxPxSize = Math.max(m.maxSize, m.minSize)),
							(a = a.zData.filter(E)),
							a.length &&
								((r = t(
									d.zMin,
									J(
										K(a),
										!1 === d.displayNegative ? d.zThreshold : -Number.MAX_VALUE,
										r
									)
								)),
								(z = t(d.zMax, Math.max(z, G(a)))))));
				});
				B.forEach(function (g) {
					var k = g[h],
						e = k.length;
					l && g.getRadii(r, z, g);
					if (0 < v)
						for (; e--; )
							if (E(k[e]) && c.dataMin <= k[e] && k[e] <= c.max) {
								var b = g.radii ? g.radii[e] : 0;
								a = Math.min((k[e] - f) * A - b, a);
								d = Math.max((k[e] - f) * A + b, d);
							}
				});
				B.length &&
					0 < v &&
					!this.logarithmic &&
					((d -= g),
					(A *= (g + Math.max(0, a) - Math.min(d, g)) / g),
					[
						["min", "userMin", a],
						["max", "userMax", d],
					].forEach(function (a) {
						"undefined" === typeof t(c.options[a[0]], c[a[1]]) &&
							(c[a[0]] += a[2] / A);
					}));
			};
			("");
		}
	);
	N(
		v,
		"parts-map/MapBubbleSeries.js",
		[v["parts/Globals.js"], v["parts/Point.js"], v["parts/Utilities.js"]],
		function (c, g, v) {
			var r = v.merge;
			v = v.seriesType;
			var D = c.seriesTypes;
			D.bubble &&
				v(
					"mapbubble",
					"bubble",
					{
						animationLimit: 500,
						tooltip: { pointFormat: "{point.name}: {point.z}" },
					},
					{
						xyFromShape: !0,
						type: "mapbubble",
						pointArrayMap: ["z"],
						getMapData: D.map.prototype.getMapData,
						getBox: D.map.prototype.getBox,
						setData: D.map.prototype.setData,
						setOptions: D.map.prototype.setOptions,
					},
					{
						applyOptions: function (c, v) {
							return c &&
								"undefined" !== typeof c.lat &&
								"undefined" !== typeof c.lon
								? g.prototype.applyOptions.call(
										this,
										r(c, this.series.chart.fromLatLonToPoint(c)),
										v
								  )
								: D.map.prototype.pointClass.prototype.applyOptions.call(
										this,
										c,
										v
								  );
						},
						isValid: function () {
							return "number" === typeof this.z;
						},
						ttBelow: !1,
					}
				);
			("");
		}
	);
	N(
		v,
		"parts-map/HeatmapSeries.js",
		[
			v["parts/Globals.js"],
			v["mixins/legend-symbol.js"],
			v["parts/Utilities.js"],
		],
		function (c, g, v) {
			var r = v.clamp,
				D = v.extend,
				G = v.fireEvent,
				K = v.isNumber,
				J = v.merge,
				B = v.pick;
			v = v.seriesType;
			var E = c.colorMapPointMixin,
				t = c.Series,
				x = c.SVGRenderer.prototype.symbols;
			v(
				"heatmap",
				"scatter",
				{
					animation: !1,
					borderWidth: 0,
					nullColor: "#f7f7f7",
					dataLabels: {
						formatter: function () {
							return this.point.value;
						},
						inside: !0,
						verticalAlign: "middle",
						crop: !1,
						overflow: !1,
						padding: 0,
					},
					marker: {
						symbol: "rect",
						radius: 0,
						lineColor: void 0,
						states: { hover: { lineWidthPlus: 0 }, select: {} },
					},
					clip: !0,
					pointRange: null,
					tooltip: { pointFormat: "{point.x}, {point.y}: {point.value}<br/>" },
					states: { hover: { halo: !1, brightness: 0.2 } },
				},
				J(c.colorMapSeriesMixin, {
					pointArrayMap: ["y", "value"],
					hasPointSpecificOptions: !0,
					getExtremesFromAll: !0,
					directTouch: !0,
					init: function () {
						t.prototype.init.apply(this, arguments);
						var c = this.options;
						c.pointRange = B(c.pointRange, c.colsize || 1);
						this.yAxis.axisPointRange = c.rowsize || 1;
						D(x, { ellipse: x.circle, rect: x.square });
					},
					getSymbol: t.prototype.getSymbol,
					setClip: function (c) {
						var g = this.chart;
						t.prototype.setClip.apply(this, arguments);
						(!1 !== this.options.clip || c) &&
							this.markerGroup.clip(
								(c || this.clipBox) && this.sharedClipKey
									? g[this.sharedClipKey]
									: g.clipRect
							);
					},
					translate: function () {
						var c = this.options,
							g = (c.marker && c.marker.symbol) || "",
							t = x[g] ? g : "rect";
						c = this.options;
						var p = -1 !== ["circle", "square"].indexOf(t);
						this.generatePoints();
						this.points.forEach(function (c) {
							var k = c.getCellAttributes(),
								a = {
									x: Math.min(k.x1, k.x2),
									y: Math.min(k.y1, k.y2),
									width: Math.max(Math.abs(k.x2 - k.x1), 0),
									height: Math.max(Math.abs(k.y2 - k.y1), 0),
								};
							var d = (c.hasImage =
								0 ===
								((c.marker && c.marker.symbol) || g || "").indexOf("url"));
							if (p) {
								var l = Math.abs(a.width - a.height);
								a.x = Math.min(k.x1, k.x2) + (a.width < a.height ? 0 : l / 2);
								a.y = Math.min(k.y1, k.y2) + (a.width < a.height ? l / 2 : 0);
								a.width = a.height = Math.min(a.width, a.height);
							}
							l = {
								plotX: (k.x1 + k.x2) / 2,
								plotY: (k.y1 + k.y2) / 2,
								clientX: (k.x1 + k.x2) / 2,
								shapeType: "path",
								shapeArgs: J(!0, a, { d: x[t](a.x, a.y, a.width, a.height) }),
							};
							d && (c.marker = { width: a.width, height: a.height });
							D(c, l);
						});
						G(this, "afterTranslate");
					},
					pointAttribs: function (g, m) {
						var r = t.prototype.pointAttribs.call(this, g, m),
							p = this.options || {},
							v = this.chart.options.plotOptions || {},
							k = v.series || {},
							a = v.heatmap || {};
						v = p.borderColor || a.borderColor || k.borderColor;
						k =
							p.borderWidth ||
							a.borderWidth ||
							k.borderWidth ||
							r["stroke-width"];
						r.stroke =
							(g && g.marker && g.marker.lineColor) ||
							(p.marker && p.marker.lineColor) ||
							v ||
							this.color;
						r["stroke-width"] = k;
						m &&
							((g = J(
								p.states[m],
								p.marker && p.marker.states[m],
								(g.options.states && g.options.states[m]) || {}
							)),
							(m = g.brightness),
							(r.fill =
								g.color ||
								c
									.color(r.fill)
									.brighten(m || 0)
									.get()),
							(r.stroke = g.lineColor));
						return r;
					},
					markerAttribs: function (c, g) {
						var m = c.marker || {},
							p = this.options.marker || {},
							t = c.shapeArgs || {},
							k = {};
						if (c.hasImage) return { x: c.plotX, y: c.plotY };
						if (g) {
							var a = p.states[g] || {};
							var d = (m.states && m.states[g]) || {};
							[
								["width", "x"],
								["height", "y"],
							].forEach(function (c) {
								k[c[0]] =
									(d[c[0]] || a[c[0]] || t[c[0]]) +
									(d[c[0] + "Plus"] || a[c[0] + "Plus"] || 0);
								k[c[1]] = t[c[1]] + (t[c[0]] - k[c[0]]) / 2;
							});
						}
						return g ? k : t;
					},
					drawPoints: function () {
						var c = this;
						if ((this.options.marker || {}).enabled || this._hasPointMarkers)
							t.prototype.drawPoints.call(this),
								this.points.forEach(function (g) {
									g.graphic &&
										g.graphic[c.chart.styledMode ? "css" : "animate"](
											c.colorAttribs(g)
										);
								});
					},
					hasData: function () {
						return !!this.processedXData.length;
					},
					getValidPoints: function (c, g) {
						return t.prototype.getValidPoints.call(this, c, g, !0);
					},
					getBox: c.noop,
					drawLegendSymbol: g.drawRectangle,
					alignDataLabel: c.seriesTypes.column.prototype.alignDataLabel,
					getExtremes: function () {
						var c = t.prototype.getExtremes.call(this, this.valueData),
							g = c.dataMin;
						c = c.dataMax;
						K(g) && (this.valueMin = g);
						K(c) && (this.valueMax = c);
						return t.prototype.getExtremes.call(this);
					},
				}),
				J(E, {
					applyOptions: function (g, m) {
						g = c.Point.prototype.applyOptions.call(this, g, m);
						g.formatPrefix = g.isNull || null === g.value ? "null" : "point";
						return g;
					},
					isValid: function () {
						return Infinity !== this.value && -Infinity !== this.value;
					},
					haloPath: function (c) {
						if (!c) return [];
						var g = this.shapeArgs;
						return [
							"M",
							g.x - c,
							g.y - c,
							"L",
							g.x - c,
							g.y + g.height + c,
							g.x + g.width + c,
							g.y + g.height + c,
							g.x + g.width + c,
							g.y - c,
							"Z",
						];
					},
					getCellAttributes: function () {
						var c = this.series,
							g = c.options,
							t = (g.colsize || 1) / 2,
							p = (g.rowsize || 1) / 2,
							v = c.xAxis,
							k = c.yAxis,
							a = this.options.marker || c.options.marker;
						c = c.pointPlacementToXValue();
						var d = B(this.pointPadding, g.pointPadding, 0),
							l = {
								x1: r(
									Math.round(
										v.len - (v.translate(this.x - t, !1, !0, !1, !0, -c) || 0)
									),
									-v.len,
									2 * v.len
								),
								x2: r(
									Math.round(
										v.len - (v.translate(this.x + t, !1, !0, !1, !0, -c) || 0)
									),
									-v.len,
									2 * v.len
								),
								y1: r(
									Math.round(k.translate(this.y - p, !1, !0, !1, !0) || 0),
									-k.len,
									2 * k.len
								),
								y2: r(
									Math.round(k.translate(this.y + p, !1, !0, !1, !0) || 0),
									-k.len,
									2 * k.len
								),
							};
						[
							["width", "x"],
							["height", "y"],
						].forEach(function (c) {
							var f = c[0];
							c = c[1];
							var g = c + "1",
								h = c + "2",
								k = Math.abs(l[g] - l[h]),
								m = (a && a.lineWidth) || 0,
								p = Math.abs(l[g] + l[h]) / 2;
							a[f] &&
								a[f] < k &&
								((l[g] = p - a[f] / 2 - m / 2), (l[h] = p + a[f] / 2 + m / 2));
							d &&
								("y" === c && ((g = h), (h = c + "1")),
								(l[g] += d),
								(l[h] -= d));
						});
						return l;
					},
				})
			);
			("");
		}
	);
	N(
		v,
		"parts-map/GeoJSON.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			function v(c, g) {
				var t,
					r = !1,
					m = c.x,
					v = c.y;
				c = 0;
				for (t = g.length - 1; c < g.length; t = c++) {
					var p = g[c][1] > v;
					var B = g[t][1] > v;
					p !== B &&
						m <
							((g[t][0] - g[c][0]) * (v - g[c][1])) / (g[t][1] - g[c][1]) +
								g[c][0] &&
						(r = !r);
				}
				return r;
			}
			var r = g.error,
				D = g.extend,
				L = g.format,
				K = g.merge;
			g = g.wrap;
			var J = c.Chart,
				B = c.win;
			J.prototype.transformFromLatLon = function (c, g) {
				var t,
					v =
						(null === (t = this.userOptions.chart) || void 0 === t
							? void 0
							: t.proj4) || B.proj4;
				if (!v) return r(21, !1, this), { x: 0, y: null };
				c = v(g.crs, [c.lon, c.lat]);
				t = g.cosAngle || (g.rotation && Math.cos(g.rotation));
				v = g.sinAngle || (g.rotation && Math.sin(g.rotation));
				c = g.rotation ? [c[0] * t + c[1] * v, -c[0] * v + c[1] * t] : c;
				return {
					x:
						((c[0] - (g.xoffset || 0)) * (g.scale || 1) + (g.xpan || 0)) *
							(g.jsonres || 1) +
						(g.jsonmarginX || 0),
					y:
						(((g.yoffset || 0) - c[1]) * (g.scale || 1) + (g.ypan || 0)) *
							(g.jsonres || 1) -
						(g.jsonmarginY || 0),
				};
			};
			J.prototype.transformToLatLon = function (c, g) {
				if ("undefined" === typeof B.proj4) r(21, !1, this);
				else {
					c = {
						x:
							((c.x - (g.jsonmarginX || 0)) / (g.jsonres || 1) -
								(g.xpan || 0)) /
								(g.scale || 1) +
							(g.xoffset || 0),
						y:
							((-c.y - (g.jsonmarginY || 0)) / (g.jsonres || 1) +
								(g.ypan || 0)) /
								(g.scale || 1) +
							(g.yoffset || 0),
					};
					var t = g.cosAngle || (g.rotation && Math.cos(g.rotation)),
						v = g.sinAngle || (g.rotation && Math.sin(g.rotation));
					g = B.proj4(
						g.crs,
						"WGS84",
						g.rotation ? { x: c.x * t + c.y * -v, y: c.x * v + c.y * t } : c
					);
					return { lat: g.y, lon: g.x };
				}
			};
			J.prototype.fromPointToLatLon = function (c) {
				var g = this.mapTransforms,
					x;
				if (g) {
					for (x in g)
						if (
							Object.hasOwnProperty.call(g, x) &&
							g[x].hitZone &&
							v({ x: c.x, y: -c.y }, g[x].hitZone.coordinates[0])
						)
							return this.transformToLatLon(c, g[x]);
					return this.transformToLatLon(c, g["default"]);
				}
				r(22, !1, this);
			};
			J.prototype.fromLatLonToPoint = function (c) {
				var g = this.mapTransforms,
					x;
				if (!g) return r(22, !1, this), { x: 0, y: null };
				for (x in g)
					if (Object.hasOwnProperty.call(g, x) && g[x].hitZone) {
						var z = this.transformFromLatLon(c, g[x]);
						if (v({ x: z.x, y: -z.y }, g[x].hitZone.coordinates[0])) return z;
					}
				return this.transformFromLatLon(c, g["default"]);
			};
			c.geojson = function (c, g, r) {
				var t = [],
					m = [],
					v = function (c) {
						c.forEach(function (c, g) {
							0 === g ? m.push(["M", c[0], -c[1]]) : m.push(["L", c[0], -c[1]]);
						});
					};
				g = g || "map";
				c.features.forEach(function (c) {
					var p = c.geometry,
						k = p.type;
					p = p.coordinates;
					c = c.properties;
					var a;
					m = [];
					"map" === g || "mapbubble" === g
						? ("Polygon" === k
								? (p.forEach(v), m.push(["Z"]))
								: "MultiPolygon" === k &&
								  (p.forEach(function (a) {
										a.forEach(v);
								  }),
								  m.push(["Z"])),
						  m.length && (a = { path: m }))
						: "mapline" === g
						? ("LineString" === k
								? v(p)
								: "MultiLineString" === k && p.forEach(v),
						  m.length && (a = { path: m }))
						: "mappoint" === g && "Point" === k && (a = { x: p[0], y: -p[1] });
					a && t.push(D(a, { name: c.name || c.NAME, properties: c }));
				});
				r &&
					c.copyrightShort &&
					((r.chart.mapCredits = L(r.chart.options.credits.mapText, {
						geojson: c,
					})),
					(r.chart.mapCreditsFull = L(r.chart.options.credits.mapTextFull, {
						geojson: c,
					})));
				return t;
			};
			g(J.prototype, "addCredits", function (c, g) {
				g = K(!0, this.options.credits, g);
				this.mapCredits && (g.href = null);
				c.call(this, g);
				this.credits &&
					this.mapCreditsFull &&
					this.credits.attr({ title: this.mapCreditsFull });
			});
		}
	);
	N(
		v,
		"parts-map/Map.js",
		[v["parts/Globals.js"], v["parts/Utilities.js"]],
		function (c, g) {
			function v(c, g, r, m, v, p, B, k) {
				return [
					["M", c + v, g],
					["L", c + r - p, g],
					["C", c + r - p / 2, g, c + r, g + p / 2, c + r, g + p],
					["L", c + r, g + m - B],
					["C", c + r, g + m - B / 2, c + r - B / 2, g + m, c + r - B, g + m],
					["L", c + k, g + m],
					["C", c + k / 2, g + m, c, g + m - k / 2, c, g + m - k],
					["L", c, g + v],
					["C", c, g + v / 2, c + v / 2, g, c + v, g],
					["Z"],
				];
			}
			var r = g.extend,
				D = g.merge,
				L = g.pick,
				K = c.Chart;
			g = c.defaultOptions;
			var J = c.Renderer,
				B = c.SVGRenderer,
				E = c.VMLRenderer;
			r(g.lang, { zoomIn: "Zoom in", zoomOut: "Zoom out" });
			g.mapNavigation = {
				buttonOptions: {
					alignTo: "plotBox",
					align: "left",
					verticalAlign: "top",
					x: 0,
					width: 18,
					height: 18,
					padding: 5,
					style: { fontSize: "15px", fontWeight: "bold" },
					theme: { "stroke-width": 1, "text-align": "center" },
				},
				buttons: {
					zoomIn: {
						onclick: function () {
							this.mapZoom(0.5);
						},
						text: "+",
						y: 0,
					},
					zoomOut: {
						onclick: function () {
							this.mapZoom(2);
						},
						text: "-",
						y: 28,
					},
				},
				mouseWheelSensitivity: 1.1,
			};
			c.splitPath = function (c) {
				"string" === typeof c &&
					((c = c
						.replace(/([A-Za-z])/g, " $1 ")
						.replace(/^\s*/, "")
						.replace(/\s*$/, "")),
					(c = c.split(/[ ,;]+/).map(function (c) {
						return /[A-za-z]/.test(c) ? c : parseFloat(c);
					})));
				return B.prototype.pathToSegments(c);
			};
			c.maps = {};
			B.prototype.symbols.topbutton = function (c, g, r, m, A) {
				return v(c - 1, g - 1, r, m, A.r, A.r, 0, 0);
			};
			B.prototype.symbols.bottombutton = function (c, g, r, m, A) {
				return v(c - 1, g - 1, r, m, 0, 0, A.r, A.r);
			};
			J === E &&
				["topbutton", "bottombutton"].forEach(function (c) {
					E.prototype.symbols[c] = B.prototype.symbols[c];
				});
			c.Map = c.mapChart = function (g, r, v) {
				var m = "string" === typeof g || g.nodeName,
					t = arguments[m ? 1 : 0],
					p = t,
					x = {
						endOnTick: !1,
						visible: !1,
						minPadding: 0,
						maxPadding: 0,
						startOnTick: !1,
					},
					k = c.getOptions().credits;
				var a = t.series;
				t.series = null;
				t = D(
					{
						chart: { panning: { enabled: !0, type: "xy" }, type: "map" },
						credits: {
							mapText: L(
								k.mapText,
								' \u00a9 <a href="{geojson.copyrightUrl}">{geojson.copyrightShort}</a>'
							),
							mapTextFull: L(k.mapTextFull, "{geojson.copyright}"),
						},
						tooltip: { followTouchMove: !1 },
						xAxis: x,
						yAxis: D(x, { reversed: !0 }),
					},
					t,
					{ chart: { inverted: !1, alignTicks: !1 } }
				);
				t.series = p.series = a;
				return m ? new K(g, t, v) : new K(t, r);
			};
		}
	);
	N(v, "masters/modules/map.src.js", [], function () {});
	N(v, "masters/highmaps.src.js", [v["masters/highcharts.src.js"]], function (
		c
	) {
		c.product = "Highmaps";
		return c;
	});
	v["masters/highmaps.src.js"]._modules = v;
	return v["masters/highmaps.src.js"];
});
//# sourceMappingURL=highmaps.js.map
