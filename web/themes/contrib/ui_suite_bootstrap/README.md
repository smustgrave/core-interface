# UI Suite Bootstrap

A site-builder friendly [Bootstrap](https://getbootstrap.com/) theme for
Drupal, using the [UI Suite](https://www.drupal.org/project/ui_suite) approach.

Use Bootstrap directly from Drupal backoffice (layout builder, manage display,
views, blocks...).

See the [docs](./docs) folder for more detailed documentation on:
- [details element](./docs/Details.md)
- [form API](./docs/Forms.md)
- [modal](./docs/Modal.md)
- [what is out of scope](./docs/Out-of-scope.md)
- [limitations](./docs/Limitations.md)


## Requirements

This theme requires the following modules:
- [UI Patterns](https://www.drupal.org/project/ui_patterns)
- [UI Styles](https://www.drupal.org/project/ui_styles)

The Bootstrap library can be:
- loaded locally
- loaded by CDN
- manually handled

When loaded locally, this theme requires the Bootstrap library to be placed in
the `libraries` folder.

Optionally, this theme provides integration with
[Bootswatch](https://bootswatch.com), the Bootswatch library needs to be placed
in the `libraries` folder if loaded locally.

Optionally, this theme provides integration with
[Bootstrap icons](https://icons.getbootstrap.com), icons needs to be placed in
the `libraries` folder.


### Install libraries manually

You can download the Bootstrap library on its
[GitHub](https://github.com/twbs/bootstrap) page.

You can download the Bootstrap icons library on its
[GitHub](https://github.com/twbs/icons) page.

You can download the Bootswatch library on its
[GitHub](https://github.com/thomaspark/bootswatch) page.

### Install libraries with Composer

#### With Asset Packagist

If you are using the website [Asset Packagist](https://asset-packagist.org), the
composer.json can be like:

```json
{
    "require": {
        "composer/installers": "2.*",
        "oomphinc/composer-installers-extender": "2.*",
        "npm-asset/bootstrap": "5.3.8",
        "npm-asset/bootstrap-icons": "1.13.1",
        "npm-asset/bootswatch": "5.3.8"
    },
    "repositories": {
        "asset-packagist": {
            "type": "composer",
            "url": "https://asset-packagist.org"
        }
    },
    "extra": {
        "installer-paths": {
            "app/libraries/{$name}": [
                "type:drupal-library",
                "type:bower-asset",
                "type:npm-asset"
            ]
        },
        "installer-types": [
            "bower-asset",
            "npm-asset"
        ]
    }
}
```

This version of Bootstrap will only contain compiled CSS/JS and SASS files.

#### With a package repository

You can declare a custom [package repositories](https://getcomposer.org/doc/05-repositories.md#package-2),
Example:

```json
{
    "require": {
        "asset/bootstrap": "5.3.8",
        "asset/bootstrap-icons": "1.13.1",
        "asset/bootswatch": "5.3.8",
        "composer/installers": "2.*"
    },
    "repositories": {
        "asset-bootstrap": {
            "type": "package",
            "package": {
                "name": "asset/bootstrap",
                "version": "5.3.8",
                "type": "drupal-library",
                "extra": {
                    "installer-name": "bootstrap"
                },
                "dist": {
                    "type": "zip",
                    "url": "https://api.github.com/repos/twbs/bootstrap/zipball/25aa8cc0b32f0d1a54be575347e6d84b70b1acd7",
                    "reference": "25aa8cc0b32f0d1a54be575347e6d84b70b1acd7"
                }
            }
        },
        "asset-bootstrap-icons": {
            "type": "package",
            "package": {
                "name": "asset/bootstrap-icons",
                "version": "1.13.1",
                "type": "drupal-library",
                "extra": {
                    "installer-name": "bootstrap-icons"
                },
                "dist": {
                    "type": "zip",
                    "url": "https://api.github.com/repos/twbs/icons/zipball/ce0e49dd063243118a115f17ad1fe1fe7576d552",
                    "reference": "ce0e49dd063243118a115f17ad1fe1fe7576d552"
                }
            }
        },
        "asset-bootswatch": {
          "type": "package",
          "package": {
            "name": "asset/bootswatch",
            "version": "5.3.8",
            "type": "drupal-library",
            "extra": {
              "installer-name": "bootswatch"
            },
            "dist": {
              "type": "zip",
              "url": "https://api.github.com/repos/thomaspark/bootswatch/zipball/bcf464aa10ff5914c2d61608022e9c017328c313",
              "reference": "bcf464aa10ff5914c2d61608022e9c017328c313"
            }
          }
        }
    },
    "extra": {
        "installer-paths": {
            "app/libraries/{$name}": [
                "type:drupal-library"
            ]
        }
    }
}
```

This version will contain compiled CSS/JS and SASS files as well as all the
files used for the development of Bootstrap.


## Installation

Install as you would normally install a contributed Drupal theme. For further
information, see
[Installing Drupal Themes](https://www.drupal.org/docs/extending-drupal/themes/installing-themes).


## Configuration

The theme has settings available on the theme settings page.

Configuration is provided by the UI Suite ecosystem modules.


## Starterkits

The theme provides starterkits to help you generate your own subtheme.
* [starterkit](./starterkits/ui_suite_bootstrap_starterkit/README.md) for SASS
  compilation in one file.
* [starterkit split](./starterkits/ui_suite_bootstrap_starterkit_split/README.md)
  for SASS compilation split by component.
