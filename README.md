# ConfigGen

Helpful tool to render a file containing mustache tags using environment variables as data (e.g configuration template).

You can inject environment variables to be used in the templates.

## Example

```
$ configen /path/to/file.mustache -e EXISTING_ENV -e CUSTOM_VAR=Something
```

## Installation

```
$ composer global require renegare/configen:dev-master
```
