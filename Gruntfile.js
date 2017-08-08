module.exports = function(grunt) {
  require('jit-grunt')(grunt);

  grunt.initConfig({
    less: {
      development: {
        options: {
          
        },
        files: {
          //"css/bootstrap.css": "less/bootstrap.less", // destination file and source file
          "css/template.css": "less/template.less"
        }
      }
    },
	postcss: {
		options: {
		map: false, // inline sourcemaps

		processors: [
			require('pixrem')(), // add fallbacks for rem units
			require('autoprefixer')({browsers: ['IE 8', 'IE 9', 'last 5 versions', 'Firefox 14', 'Opera 11.1']}), // add vendor prefixes
			//require('cssnano')() // minify the result
		]
		},
		dist: {
		src: 'css/template.css'
		}
	},
    cssmin: {
		target: {
			files: [{
			expand: true,
			cwd: 'css/',
			src: ['template.css', 'template.min.css'],
			dest: 'css/',
			ext: '.min.css'
			}]
		}
	},
    watch: {
      styles: {
        files: ['less/**/*.less'], // which files to watch
        tasks: ['less', 'postcss', 'cssmin'],
        options: {
          nospawn: true
        }
      }
    }
  });

  grunt.registerTask('default', ['less', 'postcss', 'cssmin', 'watch']);
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-watch');
};