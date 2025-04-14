let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let NavBar = {};

NavBar.format = function (profiles) {
  let html = template;
  html = html.replace("{{name}}", NavBar.profilesOptions(profiles));
  const defaultImage = "";
  html = html.replace("{{imageURL}}", defaultImage);
  html = html.replace("{{Class}}", "hidden");
  
  return html;
};

NavBar.profilesOptions = function (profiles) {
  let html = "";
  if (profiles && profiles.length > 0) {
      html += '<option value="">Sélectionner un profil</option>';
      for (const obj of profiles) {
          html += `<option value="${obj.id}" data-avatar="${obj.image}">${obj.name}</option>`;
      }
  }
  return html;
}


export { NavBar };
