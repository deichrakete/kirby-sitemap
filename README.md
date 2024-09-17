# Kirby sitemap plugin

Simple sitemap generator

## Installation

### Download

Download and copy this repository to `/site/plugins/sitemap`.

### Git submodule

```
git submodule add https://github.com/deichrakete/kirby-sitemap.git site/plugins/sitemap
```

### Composer

```
composer require deichrakete/kirby-sitemap
```

## Setup

Usable config options

```
'deichrakete.sitemap' => [
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

- [](https://getkirby.com/plugins/deichrakete)
