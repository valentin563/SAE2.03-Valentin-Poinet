let templateFile = await fetch("./component/MovieCategory/template.html");
let template = await templateFile.text();

let MovieCategory = {};

MovieCategory.format = function(category) {
  let html = template;
  html = html.replace("{{category}}", movie.id_category);
  return html;
};



MovieCategory.formatMany = async function(category){
  let html = "";
  for (const obj of category) {
    let movies = await DataMovie.requestMovieCategory(obj.id);
    if (movies.length === 0){
      continue
    }
    else{
      html += MovieCategory.format(obj.name, movies);
  }
}
  return html;
};


export { MovieCategory };
