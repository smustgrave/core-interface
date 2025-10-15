# UI Suite Bootstrap Starterkit Split

This is a starterkit example to demonstrate how some integrations can be done
like:
- CKEditor 5 stylesheets
- Negative margins in utility classes
- Background gradients

Those integrations cannot be done in the base theme because either not enabled
in Bootstrap default compiled CSS or impossible to do in a generic way.


## Usage

See the
[Starterkit documentation on Drupal.org](https://www.drupal.org/docs/core-modules-and-themes/core-themes/starterkit-theme).

Example command to generate your theme:

```bash
php core/scripts/drupal generate-theme my_theme --starterkit ui_suite_bootstrap_starterkit_split --path themes/custom
```

Then in the provided scss files, you will have to adapt paths to the Bootstrap
library to recompile assets.


## SASS

In some files, the actual SASS code is separated in an "import" file, like:

```sass
@import '../configuration-import';
@import 'import.form-required';
```

So in case you need to create a subtheme of the theme created from the
starterkit, it is easier to get recompiled version with other variables values.


## Autoloading

In case you have PSR-4 autoloading error with theme classes not found, you can
manually register the theme classes in your `composer.json` file:

```
"autoload": {
    "psr-4": {
        "Drupal\\ui_suite_bootstrap_starterkit_split\\": "app/themes/custom/ui_suite_bootstrap_starterkit_split/src"
    }
},
```

This will take effect after the next time Composer generates the autoload files.

You can run `composer dump-autoload` to generate the autoload files.


## Policy

There is no backward compatibility policy in this starterkit theme.

Breaking change can happen at any moment.
