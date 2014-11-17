# ConfigGen (Docker CLI Application)

helpful tool to render a file containing mustache tags.

You can inject environment variables to be used in the templates.

## Example

```
$ configen /path/to/file -e EXISTING_ENV -e CUSTOM_VAR=Something
```

## Installation

```
$ composer global require renegare/configen:dev-master
```
