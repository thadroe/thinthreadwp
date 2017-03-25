## ThinThreadWP Wordpress development theme

A blank starter theme

### Changing the textdomain

If you use this theme you'll likely want to change the [text domain](https://codex.wordpress.org/I18n_for_WordPress_Developers#Text_Domains). 

[Perl](https://www.perl.org/get.html) is pretty useful for doing this.

This perl command will search and replace within text of all PHP and style.css files in a single directory. Run it with your own text domain in both the theme directory and then in the 'template-parts' directory.

`perl -p -i -e 's/thinthreadwp/{yourtextdomain}/g' *.php style.css`

### Gulp

If using gulp, you should also tweak gulpfile.js and package.json to your liking.


