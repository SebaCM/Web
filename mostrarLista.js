var fs = require('browserify-fs');

function mostrarArchivos() {
  const archivos = fs.readdir("..\\..\\cypress\\downloads");

  archivos.forEach((archivo) => {
    const li = document.createElement("li");
    const a = document.createElement("a");
    a.href = "../../cypress/downloads/" + archivo;
    a.textContent = archivo;
    li.appendChild(a);
    document.getElementById("lista").appendChild(li);
  });
}

mostrarArchivos();
