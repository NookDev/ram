//import purify from "purify-css"

const purify = require("purify-css");

/*let content = ["/assets/js/*.js", "/includes/components/*.php", "/includes/content/*.php", "/includes/modals/*.php"],*

css = "/assets/scss/styles.min.css",

options = {
		// Will write purified CSS to this file.
		output: "/assets/scss/purified.css",


		info: true,

		// Logs out removed selectors.
		rejected: true
	};*/
	


let content = "../index.php";

let	css = "/assets/scss/video.css";

let options = {output: "/assets/scss/purified.css"};

purify(content, css, options);

//cmd 
/*
purifycss assets/scss/styles.min.css ["assets/js/*.js", "includes/components/*.php", "includes/content/*.php", "includes/modals/*.php"] --min --info --out assets/scss/purified.css

*/