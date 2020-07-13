var fileset = require('fileset'),
	buildify = require('buildify'),
	css_files = ["assets/functions/!(custom-functions.min).php"];
	
fileset(css_files, function(err, files) {
buildify()
  .concat(files)
  .save("assets/functions/custom-functions.min.php");
});

