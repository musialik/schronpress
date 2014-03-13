'use strict';
module.exports = function(grunt) {

    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        // watch for changes and trigger compass, jshint, uglify and livereload
        watch: {
            compass: {
                files: ['assets/styles/source/**/*.{scss,sass}'],
                tasks: ['compass']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['jshint', 'uglify']
            },
            images: {
                files: ['assets/images/**/*.{png,jpg,gif}', 'assets/js/vendor/**/img/*.{png,jpg,gif}'],
                tasks: ['imagemin']
            },
            livereload: {
                options: { livereload: true },
                files: ['style.css', 'assets/js/*.js', 'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}']
            }
        },

        // compass and scss
        compass: {
            dist: {
                options: {
                    config: 'config.rb',
                    force: true
                }
            }
        },

        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js',
                'assets/js/source/**/*.js'
            ]
        },

        // uglify to concat, minify, and make source maps
        uglify: {
            plugins: {
                options: {
                    sourceMap: 'assets/js/plugins.js.map',
                    sourceMappingURL: 'plugins.js.map',
                    sourceMapPrefix: 2
                },
                files: {
                    'assets/js/plugins.min.js': [
                        'assets/js/source/plugins.js',
                        'assets/js/vendor/carouFredSel/*.js',
                        'assets/js/vendor/lightbox2/js/lightbox.js',
                    ]
                }
            },
            main: {
                options: {
                    sourceMap: 'assets/js/main.js.map',
                    sourceMappingURL: 'main.js.map',
                    sourceMapPrefix: 2
                },
                files: {
                    'assets/js/main.min.js': [
                        'assets/js/source/main.js'
                    ]
                }
            }
        },

        // image optimization
        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 7,
                    progressive: true,
                    interlaced: true,
                    cache: false
                },
                files: [{
                    expand: true,
                    cwd: 'assets/images/source/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'assets/images/'
                }]
            },
            lightbox2: {
                options: {
                    optimizationLevel: 7,
                    progressive: true,
                    interlaced: true,
                    cache: false
                },
                files: [{
                    expand: true,
                    cwd: 'assets/js/vendor/lightbox2/img/',
                    src: ['*.{png,jpg,gif}'],
                    dest: 'assets/images/lightbox2/'
                }]
            }
        },

        // deploy via rsync
        deploy: {
            options: {
                src: "./",
                args: ["--verbose"],
                exclude: ['.git*', 'node_modules', '.sass-cache', 'Gruntfile.js', 'package.json', '.DS_Store', 'README.md', 'config.rb', '.jshintrc', '.bowerrc', 'assets/js/vendor', 'assets/js/source', 'assets/images/source', 'assets/styles/source', 'assets/styles/vendor'],
                recursive: true,
                syncDestIgnoreExcl: true,
                clean: true
            },
            staging: {
                options: {
                    dest: "/var/www/otoz-dev/wp-content/themes/schronpress/",
                    host: "root@dev.otozanimalsoswiecim.pl"
                }
            },
            // production: {
            //     options: {
            //         dest: "~/path/to/theme",
            //         host: "user@host.com"
            //     }
            // }
        }

    });

    // rename tasks
    grunt.renameTask('rsync', 'deploy');

    // register task
    // grunt.registerTask('default', ['compass', 'uglify', 'imagemin', 'watch']);

    // disable imagemin for now
    grunt.registerTask('default', ['compass', 'uglify', 'watch']);

};