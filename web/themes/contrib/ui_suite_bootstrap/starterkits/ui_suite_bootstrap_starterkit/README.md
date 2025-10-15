# UI Suite Bootstrap Starterkit

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
php core/scripts/drupal generate-theme my_theme --starterkit ui_suite_bootstrap_starterkit --path themes/custom
```

Then in the `assets/scss` folder, you will have to adapt paths to the Bootstrap
library to recompile assets.


## SASS

In some files, the actual SASS code is separated in an "import" file, like:

```sass
@import '../configuration-import';
@import 'import.form-required';
```

So in case you need to create a subtheme of the theme created from the
starterkit, it is easier to get recompiled version with other variables values.


## Policy

There is no backward compatibility policy in this starterkit theme.

Breaking change can happen at any moment.
