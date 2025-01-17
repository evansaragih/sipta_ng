/*
 Highcharts JS v8.1.0 (2020-05-05)

 Exporting module

 (c) 2010-2019 Torstein Honsi

 License: www.highcharts.com/license
*/
(function (c) {
	"object" === typeof module && module.exports
		? ((c["default"] = c), (module.exports = c))
		: "function" === typeof define && define.amd
		? define("highcharts/modules/export-data", [
				"highcharts",
				"highcharts/modules/exporting",
		  ], function (e) {
				c(e);
				c.Highcharts = e;
				return c;
		  })
		: c("undefined" !== typeof Highcharts ? Highcharts : void 0);
})(function (c) {
	function e(b, a, c, g) {
		b.hasOwnProperty(a) || (b[a] = g.apply(null, c));
	}
	c = c ? c._modules : {};
	e(
		c,
		"mixins/ajax.js",
		[c["parts/Globals.js"], c["parts/Utilities.js"]],
		function (b, a) {
			var c = a.merge,
				g = a.objectEach;
			b.ajax = function (b) {
				var a = c(
					!0,
					{
						url: !1,
						type: "get",
						dataType: "json",
						success: !1,
						error: !1,
						data: !1,
						headers: {},
					},
					b
				);
				b = {
					json: "application/json",
					xml: "application/xml",
					text: "text/plain",
					octet: "application/octet-stream",
				};
				var d = new XMLHttpRequest();
				if (!a.url) return !1;
				d.open(a.type.toUpperCase(), a.url, !0);
				a.headers["Content-Type"] ||
					d.setRequestHeader("Content-Type", b[a.dataType] || b.text);
				g(a.headers, function (a, b) {
					d.setRequestHeader(b, a);
				});
				d.onreadystatechange = function () {
					if (4 === d.readyState) {
						if (200 === d.status) {
							var b = d.responseText;
							if ("json" === a.dataType)
								try {
									b = JSON.parse(b);
								} catch (f) {
									a.error && a.error(d, f);
									return;
								}
							return a.success && a.success(b);
						}
						a.error && a.error(d, d.responseText);
					}
				};
				try {
					a.data = JSON.stringify(a.data);
				} catch (C) {}
				d.send(a.data || !0);
			};
			b.getJSON = function (a, c) {
				b.ajax({
					url: a,
					success: c,
					dataType: "json",
					headers: { "Content-Type": "text/plain" },
				});
			};
		}
	);
	e(c, "mixins/download-url.js", [c["parts/Globals.js"]], function (b) {
		var a = b.win,
			c = a.navigator,
			g = a.document,
			e = a.URL || a.webkitURL || a,
			t = /Edge\/\d+/.test(c.userAgent);
		b.dataURLtoBlob = function (b) {
			if (
				(b = b.match(/data:([^;]*)(;base64)?,([0-9A-Za-z+/]+)/)) &&
				3 < b.length &&
				a.atob &&
				a.ArrayBuffer &&
				a.Uint8Array &&
				a.Blob &&
				e.createObjectURL
			) {
				var d = a.atob(b[3]),
					c = new a.ArrayBuffer(d.length);
				c = new a.Uint8Array(c);
				for (var l = 0; l < c.length; ++l) c[l] = d.charCodeAt(l);
				b = new a.Blob([c], { type: b[1] });
				return e.createObjectURL(b);
			}
		};
		b.downloadURL = function (d, e) {
			var f = g.createElement("a");
			if ("string" === typeof d || d instanceof String || !c.msSaveOrOpenBlob) {
				if (t || 2e6 < d.length)
					if (((d = b.dataURLtoBlob(d)), !d))
						throw Error("Failed to convert to blob");
				if ("undefined" !== typeof f.download)
					(f.href = d),
						(f.download = e),
						g.body.appendChild(f),
						f.click(),
						g.body.removeChild(f);
				else
					try {
						var l = a.open(d, "chart");
						if ("undefined" === typeof l || null === l)
							throw Error("Failed to open window");
					} catch (y) {
						a.location.href = d;
					}
			} else c.msSaveOrOpenBlob(d, e);
		};
	});
	e(
		c,
		"modules/export-data.src.js",
		[c["parts/Globals.js"], c["parts/Utilities.js"]],
		function (b, a) {
			function c(a, b) {
				var c = d.navigator,
					n =
						-1 < c.userAgent.indexOf("WebKit") &&
						0 > c.userAgent.indexOf("Chrome"),
					f = d.URL || d.webkitURL || d;
				try {
					if (c.msSaveOrOpenBlob && d.MSBlobBuilder) {
						var q = new d.MSBlobBuilder();
						q.append(a);
						return q.getBlob("image/svg+xml");
					}
					if (!n)
						return f.createObjectURL(new d.Blob(["\ufeff" + a], { type: b }));
				} catch (H) {}
			}
			var e = a.defined,
				G = a.extend,
				t = a.pick,
				d = b.win,
				C = d.document,
				f = b.seriesTypes,
				l = b.downloadURL,
				y = b.fireEvent;
			b.setOptions({
				exporting: {
					csv: {
						columnHeaderFormatter: null,
						dateFormat: "%Y-%m-%d %H:%M:%S",
						decimalPoint: null,
						itemDelimiter: null,
						lineDelimiter: "\n",
					},
					showTable: !1,
					useMultiLevelHeaders: !0,
					useRowspanHeaders: !0,
				},
				lang: {
					downloadCSV: "Download CSV",
					downloadXLS: "Download XLS",
					exportData: {
						categoryHeader: "Category",
						categoryDatetimeHeader: "DateTime",
					},
					viewData: "View data table",
				},
			});
			b.addEvent(b.Chart, "render", function () {
				this.options &&
					this.options.exporting &&
					this.options.exporting.showTable &&
					!this.options.chart.forExport &&
					this.viewData();
			});
			b.Chart.prototype.setUpKeyToAxis = function () {
				f.arearange &&
					(f.arearange.prototype.keyToAxis = { low: "y", high: "y" });
				f.gantt && (f.gantt.prototype.keyToAxis = { start: "x", end: "x" });
			};
			b.Chart.prototype.getDataRows = function (a) {
				var c = this.hasParallelCoordinates,
					d = this.time,
					f = (this.options.exporting && this.options.exporting.csv) || {},
					n = this.xAxis,
					q = {},
					l = [],
					D = [],
					A = [],
					r;
				var u = this.options.lang.exportData;
				var w = u.categoryHeader,
					m = u.categoryDatetimeHeader,
					E = function (k, c, d) {
						if (f.columnHeaderFormatter) {
							var h = f.columnHeaderFormatter(k, c, d);
							if (!1 !== h) return h;
						}
						return k
							? k instanceof b.Axis
								? (k.options.title && k.options.title.text) ||
								  (k.dateTime ? m : w)
								: a
								? {
										columnTitle: 1 < d ? c : k.name,
										topLevelColumnTitle: k.name,
								  }
								: k.name + (1 < d ? " (" + c + ")" : "")
							: w;
					},
					F = function (a, c, d) {
						var k = {},
							h = {};
						c.forEach(function (c) {
							var m = ((a.keyToAxis && a.keyToAxis[c]) || c) + "Axis";
							m = b.isNumber(d) ? a.chart[m][d] : a[m];
							k[c] = (m && m.categories) || [];
							h[c] = m && m.dateTime;
						});
						return { categoryMap: k, dateTimeValueAxisMap: h };
					},
					h = [];
				var v = 0;
				this.setUpKeyToAxis();
				this.series.forEach(function (k) {
					var m = k.xAxis,
						e = k.options.keys || k.pointArrayMap || ["y"],
						l = e.length,
						p = !k.requireSorting && {},
						w = n.indexOf(m),
						z = F(k, e),
						g;
					if (
						!1 !== k.options.includeInDataExport &&
						!k.options.isInternal &&
						!1 !== k.visible
					) {
						b.find(h, function (a) {
							return a[0] === w;
						}) || h.push([w, v]);
						for (g = 0; g < l; )
							(r = E(k, e[g], e.length)),
								A.push(r.columnTitle || r),
								a && D.push(r.topLevelColumnTitle || r),
								g++;
						var u = {
							chart: k.chart,
							autoIncrement: k.autoIncrement,
							options: k.options,
							pointArrayMap: k.pointArrayMap,
						};
						k.options.data.forEach(function (a, b) {
							c && (z = F(k, e, b));
							var h = { series: u };
							k.pointClass.prototype.applyOptions.apply(h, [a]);
							a = h.x;
							var n = k.data[b] && k.data[b].name;
							g = 0;
							if (!m || "name" === k.exportKey || (!c && m && m.hasNames))
								a = n;
							p && (p[a] && (a += "|" + b), (p[a] = !0));
							q[a] || ((q[a] = []), (q[a].xValues = []));
							q[a].x = h.x;
							q[a].name = n;
							for (q[a].xValues[w] = h.x; g < l; )
								(b = e[g]),
									(n = h[b]),
									(q[a][v + g] = t(
										z.categoryMap[b][n],
										z.dateTimeValueAxisMap[b]
											? d.dateFormat(f.dateFormat, n)
											: null,
										n
									)),
									g++;
						});
						v += g;
					}
				});
				for (p in q) Object.hasOwnProperty.call(q, p) && l.push(q[p]);
				var p = a ? [D, A] : [A];
				for (v = h.length; v--; ) {
					var B = h[v][0];
					var g = h[v][1];
					var x = n[B];
					l.sort(function (a, b) {
						return a.xValues[B] - b.xValues[B];
					});
					u = E(x);
					p[0].splice(g, 0, u);
					a && p[1] && p[1].splice(g, 0, u);
					l.forEach(function (a) {
						var b = a.name;
						x &&
							!e(b) &&
							(x.dateTime
								? (a.x instanceof Date && (a.x = a.x.getTime()),
								  (b = d.dateFormat(f.dateFormat, a.x)))
								: (b = x.categories
										? t(x.names[a.x], x.categories[a.x], a.x)
										: a.x));
						a.splice(g, 0, b);
					});
				}
				p = p.concat(l);
				y(this, "exportData", { dataRows: p });
				return p;
			};
			b.Chart.prototype.getCSV = function (a) {
				var b = "",
					c = this.getDataRows(),
					d = this.options.exporting.csv,
					n = t(
						d.decimalPoint,
						"," !== d.itemDelimiter && a ? (1.1).toLocaleString()[1] : "."
					),
					f = t(d.itemDelimiter, "," === n ? ";" : ","),
					e = d.lineDelimiter;
				c.forEach(function (a, d) {
					for (var g, l = a.length; l--; )
						(g = a[l]),
							"string" === typeof g && (g = '"' + g + '"'),
							"number" === typeof g &&
								"." !== n &&
								(g = g.toString().replace(".", n)),
							(a[l] = g);
					b += a.join(f);
					d < c.length - 1 && (b += e);
				});
				return b;
			};
			b.Chart.prototype.getTable = function (a) {
				var b = '<table id="highcharts-data-table-' + this.index + '">',
					c = this.options,
					d = a ? (1.1).toLocaleString()[1] : ".",
					g = t(c.exporting.useMultiLevelHeaders, !0);
				a = this.getDataRows(g);
				var f = 0,
					e = g ? a.shift() : null,
					l = a.shift(),
					n = function (a, b, c, g) {
						var h = t(g, "");
						b = "text" + (b ? " " + b : "");
						"number" === typeof h
							? ((h = h.toString()),
							  "," === d && (h = h.replace(".", d)),
							  (b = "number"))
							: g || (b = "empty");
						return (
							"<" +
							a +
							(c ? " " + c : "") +
							' class="' +
							b +
							'">' +
							h +
							"</" +
							a +
							">"
						);
					};
				!1 !== c.exporting.tableCaption &&
					(b +=
						'<caption class="highcharts-table-caption">' +
						t(
							c.exporting.tableCaption,
							c.title.text
								? c.title.text
										.replace(/&/g, "&amp;")
										.replace(/</g, "&lt;")
										.replace(/>/g, "&gt;")
										.replace(/"/g, "&quot;")
										.replace(/'/g, "&#x27;")
										.replace(/\//g, "&#x2F;")
								: "Chart"
						) +
						"</caption>");
				for (var r = 0, u = a.length; r < u; ++r)
					a[r].length > f && (f = a[r].length);
				b += (function (a, b, d) {
					var f = "<thead>",
						h = 0;
					d = d || (b && b.length);
					var e,
						l = 0;
					if ((e = g && a && b)) {
						a: if (((e = a.length), b.length === e)) {
							for (; e--; )
								if (a[e] !== b[e]) {
									e = !1;
									break a;
								}
							e = !0;
						} else e = !1;
						e = !e;
					}
					if (e) {
						for (f += "<tr>"; h < d; ++h) {
							e = a[h];
							var m = a[h + 1];
							e === m
								? ++l
								: l
								? ((f += n(
										"th",
										"highcharts-table-topheading",
										'scope="col" colspan="' + (l + 1) + '"',
										e
								  )),
								  (l = 0))
								: (e === b[h]
										? c.exporting.useRowspanHeaders
											? ((m = 2), delete b[h])
											: ((m = 1), (b[h] = ""))
										: (m = 1),
								  (f += n(
										"th",
										"highcharts-table-topheading",
										'scope="col"' +
											(1 < m ? ' valign="top" rowspan="' + m + '"' : ""),
										e
								  )));
						}
						f += "</tr>";
					}
					if (b) {
						f += "<tr>";
						h = 0;
						for (d = b.length; h < d; ++h)
							"undefined" !== typeof b[h] &&
								(f += n("th", null, 'scope="col"', b[h]));
						f += "</tr>";
					}
					return f + "</thead>";
				})(e, l, Math.max(f, l.length));
				b += "<tbody>";
				a.forEach(function (a) {
					b += "<tr>";
					for (var c = 0; c < f; c++)
						b += n(c ? "td" : "th", null, c ? "" : 'scope="row"', a[c]);
					b += "</tr>";
				});
				b += "</tbody></table>";
				a = { html: b };
				y(this, "afterGetTable", a);
				return a.html;
			};
			b.Chart.prototype.downloadCSV = function () {
				var a = this.getCSV(!0);
				l(
					c(a, "text/csv") || "data:text/csv,\ufeff" + encodeURIComponent(a),
					this.getFilename() + ".csv"
				);
			};
			b.Chart.prototype.downloadXLS = function () {
				var a =
					'<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head>\x3c!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>Ark1</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--\x3e<style>td{border:none;font-family: Calibri, sans-serif;} .number{mso-number-format:"0.00";} .text{ mso-number-format:"@";}</style><meta name=ProgId content=Excel.Sheet><meta charset=UTF-8></head><body>' +
					this.getTable(!0) +
					"</body></html>";
				l(
					c(a, "application/vnd.ms-excel") ||
						"data:application/vnd.ms-excel;base64," +
							d.btoa(unescape(encodeURIComponent(a))),
					this.getFilename() + ".xls"
				);
			};
			b.Chart.prototype.viewData = function () {
				this.dataTableDiv ||
					((this.dataTableDiv = C.createElement("div")),
					(this.dataTableDiv.className = "highcharts-data-table"),
					this.renderTo.parentNode.insertBefore(
						this.dataTableDiv,
						this.renderTo.nextSibling
					));
				this.dataTableDiv.innerHTML = this.getTable();
				y(this, "afterViewData", this.dataTableDiv);
			};
			if ((a = b.getOptions().exporting))
				G(a.menuItemDefinitions, {
					downloadCSV: {
						textKey: "downloadCSV",
						onclick: function () {
							this.downloadCSV();
						},
					},
					downloadXLS: {
						textKey: "downloadXLS",
						onclick: function () {
							this.downloadXLS();
						},
					},
					viewData: {
						textKey: "viewData",
						onclick: function () {
							this.viewData();
						},
					},
				}),
					a.buttons &&
						a.buttons.contextButton.menuItems.push(
							"separator",
							"downloadCSV",
							"downloadXLS",
							"viewData"
						);
			f.map && (f.map.prototype.exportKey = "name");
			f.mapbubble && (f.mapbubble.prototype.exportKey = "name");
			f.treemap && (f.treemap.prototype.exportKey = "name");
		}
	);
	e(c, "masters/modules/export-data.src.js", [], function () {});
});
//# sourceMappingURL=export-data.js.map
