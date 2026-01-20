// vite.config.mjs

import { resolve } from "node:path";
import { defineConfig } from "vite";

// Get the main.js where all your JavaScript files are imported
const JS_FILE = resolve("src/js/main.js");

// Define where the compiled and minified JavaScript files will be saved
const BUILD_DIR = resolve(__dirname, "assets/dist");

export default defineConfig({
	// Vite configuration options
	base: process.env.NODE_ENV === "production" ? "./" : "/",

	build: {
		assetsDir: "", // Will save the compiled JavaScript files in the root of the dist folder
		manifest: true, // Generate manifest.json file (for caching)
		emptyOutDir: true, // Empty the dist folder before building
		outDir: BUILD_DIR,
		rollupOptions: {
			input: JS_FILE,
		},
	},
});
