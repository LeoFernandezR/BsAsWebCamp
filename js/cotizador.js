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

      const formulario_editar = document.querySelector(".editar-registrado");
      if (formulario_editar) {
        if (formulario_editar.length > 0) {
          if (pase_dia.value || pase_dosdias.value || pase_completo.value) {
            mostrarDias();
          }
        }
      }

      if (errorDiv) {
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
