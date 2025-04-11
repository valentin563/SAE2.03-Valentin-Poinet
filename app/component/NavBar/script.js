let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let NavBar = {};

NavBar.format = function (hAbout, hHome, name, image) {
  let html = template;
  html = html.replace("{{hAbout}}", hAbout);
  html = html.replace("{{hHome}}", hHome);
  html = html.replace("{{name}}", name);
  html = html.replace("{{image}}", image);

  return html;
};

export { NavBar };
