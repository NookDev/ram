var fileset = require('fileset'),
	buildify = require('buildify');

var css_files = ["assets/styles/!(styles.min|styles).css"],
	
	js_files = ["assets/scripts/!(scripts).js"],
	
	php_functions = ["assets/functions/!(custom-functions.min).php"];

fileset(css_files, function(err, files) {
buildify()
  .concat(files)
  .save('assets/styles/styles.min.css');
});
		
fileset(js_files, function(err, files) {
buildify()
  .concat(files)
  .save('assets/scripts/scripts.js');
});

fileset(php_functions, function(err, files) {
buildify()
  .concat(files)
  .save('assets/functions/custom-functions.min.php');
});
