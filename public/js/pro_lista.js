const contenedor = document.getElementById("contenedor");

function mostrar() {
  speciality = document.getElementById("select-especialidad");
  //   console.log(speciality.value);
  //   console.log(speciality.selectedOptions[0].innerText);
  let bandera = verificar(parseInt(speciality.value));
  if (bandera) {
    let registro =
      '<tr><th  value="' +
      speciality.value +
      '" scope="row">' +
      speciality.selectedOptions[0].innerText +
      "</th>" +
      '<input type="hidden" name="pro_especialidad[]" value="' +
      speciality.value +
      '">' +
      "<td><button type='button' class=" +
      '"restar-especialidad"' +
      ">-</button></td></tr>";

    $("#new-especialidades").append(registro);
  } else {
    console.log("YA EXISTE");
  }
}

function verificar(nuevovalor) {
  const tabla = document.getElementById("new-especialidades").children;
  let arreglo = [];
  for (let i = 0; i < tabla.length; i++) {
    const element = parseInt(tabla[i].childNodes[0].attributes[0].value);
    console.log(element);
    arreglo.push(element);
    // console.log(element.childNodes[0].attributes);
  }
  if (arreglo.length > 0) {
    let valor = arreglo.filter((numero) => numero == nuevovalor);
    console.log(valor);
    if (valor.length == 0) {
      console.log("noexistey lo agrego");
      return true;
    } else {
      return false;
    }
  } else {
    return true;
  }
  //   console.log(tabla[0].childNodes[0]);
}
