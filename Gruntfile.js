// Gruntfile.js

// our wrapper function (required by grunt and its plugins)
// all configuration goes inside this function
module.exports = function(grunt) {

  // ===========================================================================
  // CONFIGURE GRUNT ===========================================================
  // ===========================================================================
  grunt.initConfig({

    // get the configuration info from package.json ----------------------------
    // this way we can use things like name and version (pkg.name)
    pkg: grunt.file.readJSON('package.json'),

  // all of our configuration will go here

      

              // configure uglify to minify js files -------------------------------------
              uglify: {
                options: {
                  banner: '/*\n <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
                },
                build: {
                  files: {
                    'js/bootstrap.min.js' : 'src/js/bootstrap.js',
                    'js/main.min.js' : 'src/js/main.js'
                  }
                }
              },

              // configure uglify to multiple minify js files -------------------------------------
              // uglify: {
              //   options: {
              //     banner: '/*\n <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
              //   },
              //   build: {
              //     files: {
              //       'dist/js/magic.min.js': ['src/js/magic.js', 'src/js/magic2.js']
              //     }
              //   }
              // }



              // configure cssmin to minify css files ------------------------------------
              cssmin: {
                options: {
                  banner: '/*\n <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
                },
                build: {
                  files: {
                    'css/bootstrap.min.css': 'src/css/bootstrap.css',
                    'css/common.min.css' : 'src/css/common.css',
                    'css/iphone-ipad.min.css' : 'src/css/iphone-ipad.css',
                    'style.css' : 'src/css/style.css',
                    'css/responsive.min.css' : 'src/css/responsive.css',
                  }
                }
              },

              imagemin: {
                  // static: {
                  //   options: {
                  //     optimizationLevel: 4,
                  //     use: [mozjpeg()]
                  //   },
                  //   files: {
                  //     'dist/images/img.png': 'src/images/img.png', // 'destination': 'source'
                  //     'dist/images/img.jpg': 'src/images/img.jpg',
                  //     'dist/images/img.gif': 'src/images/img.gif'
                  //   }
                  // },
                  dynamic: {                         // Another target
                    files: [{
                      optimizationLevel: 3,
                      expand: true,                  // Enable dynamic expansion
                      cwd: 'src/images/',                   // Src matches are relative to this path
                      src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
                      dest: 'images/'                // Destination path prefix
                    }]
                  }
              },


              // configure watch to auto update ------------------------------------------
              watch: {

                // for stylesheets, watch css files
                // only run cssmin
                stylesheets: {
                  files: ['src/**/*.css'],
                  tasks: ['cssmin']
                },

                // for scripts, run uglify
                scripts: {
                  files: 'src/**/*.js',
                  tasks: ['uglify']
                },

                options: {
                  livereload: true
                }
              }




  });


  // ===========================================================================
  // LOAD GRUNT PLUGINS ========================================================
  // ===========================================================================
  // we can only load these if they are in our package.json
  // make sure you have run npm install so our app can find these
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-watch');


  // ===========================================================================
  // CREATE TASKS ==============================================================
  // ===========================================================================
  grunt.registerTask('default', ['uglify', 'cssmin','imagemin']);


            // this task will only run the dev configuration
            grunt.registerTask('dev', ['uglify:dev', 'cssmin:dev','imagemin:dev']);

            // only run production configuration
            grunt.registerTask('production', ['uglify:production', 'cssmin:production','imagemin:production']);


  // Run Commands
  // $ grunt
  // $ grunt uglify
  // $ grunt cssmin
  // $ grunt imagemin
  // $ grunt dev
  // $ grunt production
  // $ grunt watch

};