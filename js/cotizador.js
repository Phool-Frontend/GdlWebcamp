! function() {
    "use strict";
    var e = document.getElementById("regalo");
    document.addEventListener("DOMContentLoaded", function() {
        var t = document.getElementById("nombre"),
            n = document.getElementById("apellido"),
            l = document.getElementById("email"),
            d = document.getElementById("pase_dia"),
            s = document.getElementById("pase_dosdias"),
            a = document.getElementById("pase_completo"),
            o = document.getElementById("calcular"),
            r = document.getElementById("error"),
            i = document.getElementById("btnRegistro"),
            u = document.getElementById("lista-productos"),
            c = document.getElementById("suma-total"),
            m = document.getElementById("camisa_evento"),
            p = document.getElementById("etiquetas");
        if (i.disabled = !0, document.getElementById("calcular")) {
            function y() {
                "" == this.value ? (r.style.display = "block", r.innerHTML = "Este campo es obligatorio", this.style.border = "2px solid red", r.style.border = "3px solid red",r.style.backgroundColor = "red",r.style.color = "white") : (r.style.display = "none", this.style.border = "1px solid #cccccc")
            }

            function v() {
                var e = parseInt(d.value, 10) || 0,
                    t = parseInt(s.value, 10) || 0,
                    n = parseInt(a.value, 10) || 0,
                    l = [];
                e > 0 && (l.push("viernes"), console.log(l)), t > 0 && (l.push("viernes", "sabado"), console.log(l)), n > 0 && (l.push("viernes", "sabado", "domingo"), console.log(l));
                for (var o = 0; o < l.length; o++) document.getElementById(l[o]).style.display = "block"
            }
            o.addEventListener("click", function(t) {
                if (t.preventDefault(), "" === e.value) alert("Debes elegir un regalo"), e.focus();
                else {
                    var n = parseInt(d.value, 10) || 0,
                        l = parseInt(s.value, 10) || 0,
                        o = parseInt(a.value, 10) || 0,
                        r = parseInt(m.value, 10) || 0,
                        y = parseInt(p.value, 10) || 0,
                        v = 30 * n + 45 * l + 50 * o + 10 * r * .93 + 2 * y,
                        g = [];
                    n >= 1 && g.push(n + " Pases por dia"), l >= 1 && g.push(l + " Pases por 2 dias"), o >= 1 && g.push(o + " Pases completos"), r >= 1 && g.push(r + " Camisas"), y >= 1 && g.push(y + " Etiquetas"), u.style.display = "block", u.innerHTML = "";
                    for (var E = 0; E < g.length; E++) u.innerHTML += g[E] + "<br/>";
                    c.innerHTML = "$ " + v.toFixed(2), i.disabled = !1, document.getElementById("total_pedido").value = v
                }
            }), d.addEventListener("blur", v), s.addEventListener("blur", v), a.addEventListener("blur", v), t.addEventListener("blur", y), n.addEventListener("blur", y), l.addEventListener("blur", y), l.addEventListener("blur", function() {
                this.value.indexOf("@") > -1 ? (r.style.display = "none", this.style.border = "1px solid #cccccc") : (r.style.display = "block", r.innerHTML = "Debe tener un @", this.style.border = "2px solid red", r.style.border = "2px solid red")
            }), document.getElementsByClassName("editar_registrado").length > 0 && (d.value || s.value || a.value) && v()
        }
    })
}();