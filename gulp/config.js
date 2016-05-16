// the config file for Gulp tasks
// the majority of settings for inidividual tasks resides here
// there are a couple of tasks where settings are declared right
// inside their resepctive task.js file for one reason or another
// if you're adding a new task, create a new task.js file and set
// the appropriate module export settings appropriately

var dest = './html/wp-content/themes/';
var drupalThemeName = 'innova-theme';
var drupalThemePath = dest + drupalThemeName;
var src = './src';
var drupalTemplates = dest + drupalThemeName + '/templates';
var siteRoot = './html/';

module.exports = {
  browserSync: {
    proxy: "192.168.99.100:3001",
    files: [
        drupalThemePath + '/templates/**/*.php',
        drupalThemePath + '/css/**/*.css',
        drupalThemePath + '/js/**/*.js',
        siteRoot + 'frontend/**/*.php'
    ],
    logLevel: 'debug',
    logConnections: true
  },
  fonts: {
    src: './bower_components/components-font-awesome/fonts/**/*.{ttf,woff,eof,svg}',
    dest: drupalThemePath + '/fonts'
  },
  // Lossy compression old image compression task
  //images: {
  //  src: src + '/images/**.{png,jpg,jpeg,gif}',
  //  dest: drupalThemePath + '/images',
  //  settings: {
  //    optimizationLevel: 5,
  //    progressive: true,
  //    interlaced: true
  //  }
  //},
  images: {
    src: src + '/images/**.{png,jpg,jpeg,gif}',
    dest: drupalThemePath + '/images'
    //dest: dest + '/images'
  },
  filesimages: {
    src: src + '~/repos/cignaglobal.com-files/files/**.{png,jpg,jpeg,gif}',
    dest: src + '~/repos/cignaglobal.com-files/files-compressed'
  },
  sass: {
    src: src + '/scss/**/*.scss',
    dest: dest + drupalThemeName + '/css/',
    //dest: dest + '/css/',
    settings: {
      imagePath: '../images' // Used by the image-url helper
    }
  },
  sprite: {
    dest: drupalThemePath
  },
  markup: {
    src: './templates/**/*.*',
    dest: drupalTemplates
  },
  flags: {
    src: './bower_components/flag-icon-css/flags/**/*.*',
    dest: dest + drupalThemeName + '/flags'
  },
  scripts: {
    src: src + '/js/*.js',
    dest: dest + drupalThemeName + '/js'
    //dest: dest + '/js'
  },
  production: {
    cssSrc: drupalThemeName + '/css/*.css',
    //cssSrc: dest + '/css/*.css',
    jsSrc: dest + '/*.js',
    dest: dest,
    cssSettings: {
      keepSpecialComments: 0
    }
  }
};
