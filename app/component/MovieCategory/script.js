let templateFile = await fetch("./component/MovieCategory/template.html");
let template = await templateFile.text();

let MovieCategory = {};

MovieCategory.format = function(movie) {
  let html = template;
  html = html.replace("{{category}}", movie.id_category);
  return html;
};

export { MovieCategory };
