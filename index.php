<?php

use Kirby\Cms\Response as Response;
use Kirby\Cms\App as Kirby;

Kirby::plugin('deichrakete/sitemap', [
    'options' => [
        'ignore' => [
            'uri' => ['error'],
            'template' => [],
        ],
        'languages' => true,
    ],
    'routes' => [
        [
            'pattern' => 'sitemap.xml',
            'action'  => function() {
                $ignore_template = kirby()->option('deichrakete.sitemap.ignore.template');
                $ignore_uri = kirby()->option('deichrakete.sitemap.ignore.uri');
                $languages = kirby()->languages() ?: [];
                $pages = site()->pages()->index();

                $content = snippet(
                    'sitemap',
                    compact(
                        'pages',
                        'ignore_template',
                        'ignore_uri',
                        'languages'
                    ),
                    true
                );

                return new Response($content, 'application/xml');
            }
        ],
        [
            'pattern' => 'sitemap',
            'action'  => function() {
                go('sitemap.xml', 301);
            }
        ]
    ],
    'snippets' => [
        'sitemap' => __DIR__ . '/snippets/sitemap.php',
    ]
]);
