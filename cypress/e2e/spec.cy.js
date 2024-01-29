const fs = require("fs");
const path = require("path");
const axios = require("axios");
const mysql = require("mysql");
const { config } = require("process");
const credentials = {
  username: "admin",
  password: "admin",
};
module.exports = (on, config) => {
  on("before:browser:launch", (_browser = {}, options) => {
    const downloadPath = Cypress.env("FOLDER");
    options.preferences["browser.download.dir"] = downloadPath;
  });
};

describe("My test", function () {
  beforeEach(() => {
    cy.visit(Cypress.env("HOST"), {
      //CYPRESS_CACHE_FOLDER="C:/xampp/htdocs/.vscode/PRUEBASPHP/dashboard/clientes/Cliente 3" CYPRESS_HOST=ip npx cypress run
      auth: {
        username: credentials.username,
        password: credentials.password,
      },
    });
  });
  it("Click on download", function () {
    const fecha = new Date().getFullYear().toString();
    const mes = new Date().getMonth() + 1;
    const mesdigitos = mes.toString().padStart(2, "0");
    cy.get("#zm_" + fecha + mesdigitos).click();
    cy.get("[id^=_cv_confirmDialog_dlg_YES]").click();
  });
});
