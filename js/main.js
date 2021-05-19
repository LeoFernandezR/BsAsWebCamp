// Mapa
var mapa = document.querySelector("#mapa");

if (mapa) {
  var map = L.map("mapa").setView([-34.580273, -58.421248], 17);

  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);

  L.marker([-34.580273, -58.421248])
    .addTo(map)
    .bindPopup("GDLWebCamp 2020. <br/> ¡Boletos ya disponibles!")
    .openPopup();
}

(function () {
  "use strict";

  var regalo = document.getElementById("regalo");

  document.addEventListener("DOMContentLoaded", function () {
    //Campos datos usuario
    var nombre = document.getElementById("nombre");
    var apellido = document.getElementById("apellido");
    var email = document.getElementById("email");

    //Campos Pase
    var pase_dia = document.getElementById("pase_dia");
    var pase_dosdias = document.getElementById("pase_dosdias");
    var pase_completo = document.getElementById("pase_completo");

    //Botones y divs

    var calcular = document.getElementById("calcular");
    var errorDiv = document.getElementById("error");
    var botonRegistro = document.getElementById("btnRegistro");
    var lista_productos = document.getElementById("lista-productos");
    var suma = document.getElementById("suma-total");

    if (botonRegistro) {
      botonRegistro.disabled = true;
    }

    //Extras
    var etiquetas = document.getElementById("etiquetas");
    var camisas = document.getElementById("camisa_evento");

    if (document.getElementById("calcular")) {
      calcular.addEventListener("click", calcularMontos);

      pase_dia.addEventListener("input", mostrarDias);
      pase_dosdias.addEventListener("input", mostrarDias);
      pase_completo.addEventListener("input", mostrarDias);

      nombre.addEventListener("blur", validarCampos);
      apellido.addEventListener("blur", validarCampos);
      email.addEventListener("blur", validarMail);

      function validarCampos() {
        if (this.value == "") {
          errorDiv.style.display = "block";
          errorDiv.innerHTML = "este campo es obligatorio";
          this.style.border = "1px solid red";
        } else {
          errorDiv.style.display = "none";
          this.style.border = "1px solid #cccccc";
        }
      }
      function validarMail() {
        if (this.value.includes("@") == true) {
          errorDiv.style.display = "none";
          this.style.border = "1px solid #cccccc";
        } else {
          errorDiv.style.display = "block";
          errorDiv.innerHTML = "email erroneo";
          this.style.border = "1px solid red";
        }
      }

      function calcularMontos(event) {
        event.preventDefault();
        if (regalo.value === "") {
          alert("Debes elegir un regalo");
          regalo.focus;
        } else {
          var boletosDia = parseInt(pase_dia.value, 10) || 0,
            boletos2Dia = parseInt(pase_dosdias.value, 10) || 0,
            boletoCompleto = parseInt(pase_completo.value, 10) || 0,
            cantCamisas = parseInt(camisas.value, 10) || 0,
            cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

          var totalPagar =
            boletosDia * 30 +
            boletos2Dia * 45 +
            boletoCompleto * 50 +
            cantCamisas * 10 * 0.93 +
            cantEtiquetas * 2;

          var listadoProductos = [];

          if (boletosDia >= 1) {
            listadoProductos.push(boletosDia + " Pase por día");
          }
          if (boletos2Dia >= 1) {
            listadoProductos.push(boletos2Dia + " Pase por 2 días");
          }
          if (boletoCompleto >= 1) {
            listadoProductos.push(boletoCompleto + " Pases completo");
          }
          if (cantCamisas >= 1) {
            listadoProductos.push(cantCamisas + " Camisas");
          }
          if (cantEtiquetas >= 1) {
            listadoProductos.push(cantEtiquetas + " Etiquetas");
          }
          lista_productos.style.display = "block";
          lista_productos.innerHTML = "";
          for (var i = 0; i < listadoProductos.length; i++) {
            lista_productos.innerHTML += listadoProductos[i] + "<br/>";
          }
          suma.innerHTML = "$ " + totalPagar.toFixed(2);

          if (botonRegistro) {
            botonRegistro.disabled = false;
          }

          document.getElementById("total_pedido").value = totalPagar;
        }
      }
      function mostrarDias() {
        var boletosDia = parseInt(pase_dia.value, 10) || 0,
          boletos2Dia = parseInt(pase_dosdias.value, 10) || 0,
          boletoCompleto = parseInt(pase_completo.value, 10) || 0;

        var diasElegidos = [];

        if (boletosDia > 0) {
          diasElegidos.push("viernes");
        }
        if (boletos2Dia > 0) {
          diasElegidos.push("viernes", "sabado");
        }
        if (boletoCompleto > 0) {
          diasElegidos.push("viernes", "sabado", "domingo");
        }
        document.getElementById("viernes").style.display = "none";
        document.getElementById("sabado").style.display = "none";
        document.getElementById("domingo").style.display = "none";

        for (var i = 0; i < diasElegidos.length; i++) {
          document.getElementById(diasElegidos[i]).style.display = "block";
        }
      }
    }
  }); // DOM CONTENT LOADED
})();

$(function () {
  // Activo menu
  $(
    'body.conferencia .navegacion-principal a:contains("Conferencia")'
  ).addClass("activo");
  $('body.calendario .navegacion-principal a:contains("Calendario")').addClass(
    "activo"
  );
  $('body.invitados .navegacion-principal a:contains("Invitados")').addClass(
    "activo"
  );

  //Menu fijo

  var windowHeight = $(window).height();
  var barraAltura = $(".barra").innerHeight();

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll > windowHeight) {
      $(".barra").addClass("fixed");
      $("body").css({ "margin-top": barraAltura + "px" });
    } else {
      $(".barra").removeClass("fixed");
      $("body").css({ "margin-top": "0px" });
    }
  });

  //Menu-Responsive

  $(".menu-movil").on("click", function () {
    $(".navegacion-principal").slideToggle();
  });

  // Programa de conferencias

  $(".programa-evento .info-curso:first").show();
  $(".menu-programa a:first").addClass("activo");
  $(".menu-programa a").on("click", function () {
    $(".menu-programa a").removeClass("activo");
    $(this).addClass("activo");
    $(".ocultar").hide();
    var enlace = $(this).attr("href");
    $(enlace).fadeIn(1000);
    return false;
  });

  // Animaciones para los numeros

  $(".resumen-evento li:nth-child(1) p").animateNumber({ number: 6 }, 1200);
  $(".resumen-evento li:nth-child(2) p").animateNumber({ number: 15 }, 1200);
  $(".resumen-evento li:nth-child(3) p").animateNumber({ number: 3 }, 1500);
  $(".resumen-evento li:nth-child(4) p").animateNumber({ number: 9 }, 1500);

  //Cuenta regresiva

  $(".cuenta-regresiva").countdown("2020/12/10 09:00:00", function (event) {
    $("#dias").html(event.strftime("%D"));
    $("#horas").html(event.strftime("%H"));
    $("#minutos").html(event.strftime("%M"));
    $("#segundos").html(event.strftime("%S"));
  });

  //Colorbox
  if (
    document.querySelector("body.invitados") ||
    document.querySelector("body.index")
  ) {
    $(".invitado-info").colorbox({ inline: true, width: "50%" });
    $(".boton_newsletter").colorbox({ inline: true, width: "50%" });
  }
});
