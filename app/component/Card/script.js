let templateFile = await fetch("./component/Card/template.html");
let template = await templateFile.text();

let Card = {};

Card.format = function(movie) {
  let html = template;
  html = html.replace('<div class="card', `<div class="card" onclick="C.handlerDetail(${movie.id})"`);
  html = html.replace("{{image}}", movie.image);
  html = html.replace("{{titre}}", movie.name);

  return html;
};

Card.formatMany = function(data) {
    let html = "";
    for(const movie of data ){
        html += Card.format(movie);
    }
    return html;
}

export { Card };
