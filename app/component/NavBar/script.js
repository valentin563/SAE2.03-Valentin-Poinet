let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let NavBar = {};

NavBar.format = function (hAbout, hHome, name) {
  let html = template;
  html = html.replace("{{hAbout}}", hAbout);
  html = html.replace("{{hHome}}", hHome);
  html = html.replace("{{name}}", name);

  return html;
};

NavBar.formatMany = function(data) {
  let html = "";
  for(const profil of data ){
      html += NavBar.format(profil);
  }
  return html;
}

export { NavBar };
