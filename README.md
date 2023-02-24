# Kirby sitemap plugin

Simple sitemap generator

## Installation

### Download

Download and copy this repository to `/site/plugins/sitemap`.

### Git submodule

```
git submodule add https://gitlab.com/foerdeliebe/kirby/sitemap.git site/plugins/sitemap
```

### Composer

```
composer require foerdeliebe/kirby-sitemap
```

## Setup

Usable config options

```
'foerdeliebe.sitemap' => [
  'ignore' => [
    'uri' => ['error', 'hidden/page',],
    'template' => ['redirect', 'data_store'],
  ],
  'languages' => false,
]
```

## Options

<!-- Document the options and APIs that this plugin offers -->

## Development

<!-- Add instructions on how to help working on the plugin (e.g. npm setup, Composer dev dependencies, etc.) -->

## License

MIT

## Credits

- [](https://getkirby.com/plugins/foerdeliebe)
