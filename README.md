# Dashboard Theme

This is a WordPress theme designed around a widget-based,
dashboard-style front page.

## Build Process

To get the theme running from source, you'll need to do a few steps.
First, you'll need to have both `npm` and `composer` installed and
working on your system. Next, you'll need to do the following to build
the assets:

````bash
$ cd dashboard-theme
$ npm install          # Installs dependencies for asset building
$ npm build            # Builds assets/bundle.css and assets/bundle.js
````

You can also use `npm start` to watch your assets and rebuild them on
changes.

Finally, you'll need to compile the templates. Dashboard uses
Handlebars templates via the [lightncandy][lightncandy] library, but
those templates have to be compiled into PHP before the site can use
them. To compile the templates, you'll need to run the following
commands:

````bash
$ composer install     # Installs lightncandy templating library

# This will compile the templates in to the templates_compiled directory
$ php -f compile-templates.php
````

Eventually I'll add a shell script wrapper around
`compile-templates.php` that will allow for watching and automatically
recompiling them.

Now you're good to go!

[lightncandy]: https://github.com/zordius/lightncandy
