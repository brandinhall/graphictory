// our wrapper function (required by grunt and its plugins)
// all configuration goes inside this function
module.exports = function (grunt) {

    // ===========================================================================
    // CONFIGURE GRUNT ===========================================================
    // ===========================================================================
    grunt.initConfig({


        // get the configuration info from package.json ----------------------------
        // this way we can use things like name and version (pkg.name)
        pkg: grunt.file.readJSON('package.json'),

        // all of our configuration will go here
        // configure jshint to validate js files -----------------------------------
        jshint: {
            options: {
                reporter: require('jshint-stylish') // use jshint-stylish to make our errors look and read good
            },

            // when this task is run, lint the Gruntfile and all js files in src
            build: ['Gruntfile.js', 'src/**/*.js']
        },
        // configure watchh to spy on files ----------------------------------------
        watch: {
            css: {
                files: 'src/**/*.less',
                tasks: ['less', 'cssmin'],
                options: {
                    livereload: true,
                },
            },
        },


        // configure uglify to minify js files -------------------------------------
        uglify: {
            options: {
                banner: '/*\n <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
            },
            build: {
                files: {
                    'dist/js/main.min.js':

                       ['src/js/events-data.js',
                        'src/js/jquery.calendario.js',
                        'src/js/jquery.camera.js',
                        'src/js/jquery.elastic.js',
                        'src/js/jquery.gmap.js',
                        'src/js/jquery.mousewheel.min.js',
                        'src/js/jquery.nivo.js',
                        'src/js/jquery.vmap.js',
                        'src/js/canvas.slider.fade.js'],

                    'dist/js/plugins.min.js' : 'src/js/plugins.js'
                }
            }
        },

        // compile less stylesheets to css -----------------------------------------
        less: {
            build: {
                files: {
                    'src/css/style.css': 'src/css/style.less', 'src/css/responsive.css': 'src/css/less/responsive.less'
                }
            }
        },



        // configure cssmin to minify css files ------------------------------------
        cssmin: {
            options: {
                banner: '/*\n <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
            },
            build: {
                files: {
                    'dist/css/style.min.css':

                       ['src/css/style.css',
                        'src/css/animate.css',
                        'src/css/calendar.css',
                        'src/css/camera.css',
                        'src/css/elastic.css',
                        'src/css/font-icons.css',
                        'src/css/magnific-popup.css',
                        'src/css/nivo-slider.css',
                        'src/css/magnific-popup.css',
                        'src/css/responsive.css',
                        'src/css/vmap.css']
                }
            }
        }

       

    });

    // ===========================================================================
    // LOAD GRUNT PLUGINS ========================================================
    // ===========================================================================
    // we can only load these if they are in our package.json
    // make sure you have run npm install so our app can find these
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    
    // ============= // CREATE TASKS ========== //
    grunt.registerTask('default', ['uglify', 'less', 'cssmin']);

};
