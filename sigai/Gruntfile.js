module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        
        target_name: "libraries",
        target_dir: "public/",

        bower_concat: {
            all: {
                dest: 'public/js/libraries.js',
                cssDest: 'public/css/libraries.css',
                exclude: [
                    'jquery',
                    'modernizr'
                ],
                mainFiles: {
                    'bootstrap': [
                        "dist/css/bootstrap.css",
                        "dist/js/bootstrap.js",
                    ],

                    'bootstrap-datepicker': [
                        "dist/css/bootstrap-datepicker.css",
                        "dist/css/bootstrap-datepicker3.css",
                        "js/bootstrap-datepicker.js",
                        "locales/bootstrap-datepicker.pt-BR.min.js"
                    ],
                    
                    'bootstrap-fileinput': [
                        "css/fileinput.min.css",
                        "js/fileinput.min.js",
                        "js/fileinput_locale_pt-BR.js"
                    ],
                    
                    'bootstrap-table': [
                        "src/bootstrap-table.css",
                        "src/bootstrap-table.js",
                        "src/extensions/toolbar/bootstrap-table-toolbar.js",
                        "src/locale/bootstrap-table-pt-BR.js"
                    ],

                    'bootstrap-3-timepicker': [
                        "css/bootstrap-timepicker.min.css",
                        "js/bootstrap-timepicker.js"
                    ],
                    
                    'fullcalendar': [
                        "dist/fullcalendar.js",
                        "dist/lang/pt-br.js",
                        "dist/fullcalendar.css"
                    ],

                    'handlebars': [
                        "handlebars.js"
                    ],
                    
                    'qtip2': [
		                "jquery.qtip.js",
		                "jquery.qtip.css"
                    ]
                },
                bowerOptions: {
                    relative: false
                }
            }
        },
        
        uglify: {
            my_target: {
                options: {
                    sourceMap: true,
                    sourceMapName: 'public/js/app.min.map'
                },
                files: {
                    'public/js/app.min.js': [
                        'public/js/libraries.js',
                        'resources/assets/js/app.js'
                    ]
                }
            }
        },
        
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    'public/css/app.min.css': [
                        'public/css/libraries.css',
                        'resources/assets/css/app.css'
                    ]
                }
            }
        },
        
        copy: {
            main: {
                files: [
                    {
                        expand: true,
                        src: ['bower_components/bootstrap/fonts/*'],
                        dest: 'public/fonts/',
                        flatten: true,
                        filter: 'isFile'
                    },
                    
                    {
                        expand: true,
                        src: ['bower_components/fontawesome/fonts/*'],
                        dest: 'public/fonts/',
                        flatten: true,
                        filter: 'isFile'
                    },
                    
                    {
                        expand: true,
                        src: ['bower_components/bootstrap-fileinput/img/*'],
                        dest: 'public/img/',
                        flatten: true,
                        filter: 'isFile'
                    },
                    
                    {
                        expand: true,
                        src: ['bower_components/jquery/dist/jquery.min.*'],
                        dest: 'public/js/',
                        flatten: true,
                        filter: 'isFile'
                    },
                    
                    {
                        expand: true,
                        src: ['resources/assets/img/*'],
                        dest: 'public/img/',
                        flatten: true,
                        filter: 'isFile'
                    }
                ],
            },
        },
        
        clean: {
            public: ["public/css/*", "public/js/*", "public/fonts/*", "public/img/*"]
        }
        
    });

    // Load plugins
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-bower-concat');
  
    grunt.registerTask('default', ['bower_concat', 'uglify', 'cssmin', 'copy']);

};
