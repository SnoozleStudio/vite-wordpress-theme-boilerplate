// src/scripts/main.js

/**
 * Main JS file for Snoozle WordPress Vite
 *
 * Import the main css file
 * Import all the JavaScript files that are needed for the theme.
 */

// Import the main CSS file
import "../scss/main.scss";

// Build the main JS file
import General from "./_general";

const App = {
	/**
	 * App.init
	 */
	init() {
		// General scripts
		function initGeneral() {
			return new General();
		}
		initGeneral();
	},
};

document.addEventListener("DOMContentLoaded", () => {
	App.init();
});
