## ThinThreadWP Wordpress development theme

A blank starter theme I use for development.

Includes
- [Gulp](http://gulpjs.com/)
- [Sass](http://sass-lang.com/)
- [Susy](http://susy.oddbird.net/)
- [Normalize](https://necolas.github.io/normalize.css/)
- [What Input](https://github.com/ten1seven/what-input)

### Changing the textdomain

If you use this theme you'll likely want to change the [text domain](https://codex.wordpress.org/I18n_for_WordPress_Developers#Text_Domains). 

[Perl](https://www.perl.org/get.html) is pretty useful for doing this.

This perl command will search and replace within text of all PHP and style.css files in a single directory. Run it with your own text domain in the theme directory and again in the 'template-parts' directory.

`perl -p -i -e 's/thinthreadwp/{yourtextdomain}/g' *.php style.css`

### Gulp

If using gulp, you should tweak gulpfile.js and package.json to your liking.

Currently includes the following gulp packages:

- autoprefixer
- livereload
- rename
- sass
- sourcemaps
- uglify
- util
- susy

To set it up and install depencencies, from your theme directory:

`npm install`

Start watching:

`gulp watch`

Note that depending on your gulpfile task customizations, you'll want to adjust what css and js is enqueued in functions.php. Currently css is compiled as 'expanded' and js is minified via uglify.


