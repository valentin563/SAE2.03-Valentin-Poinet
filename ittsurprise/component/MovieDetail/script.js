let templateFile = await fetch("./component/MovieDetail/template.html");
let template = await templateFile.text();

let MovieDetail = {};

MovieDetail.format = function(movie) {
  let html = template;
  html = html.replace("{{image}}", movie.image);
  html = html.replace("{{name}}", movie.name);
  html = html.replace("{{trailer}}", movie.trailer);
  html = html.replace("{{descritption}}", movie.description);
  html = html.replace("{{director}}", movie.director);
  html = html.replace("{{year}}", movie.year);
  html = html.replace("{{min_age}}", movie.min_age);
  html = html.replace("{{category}}", movie.category);



  return html;
};

export { MovieDetail };
