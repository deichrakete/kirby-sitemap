<?php

use Kirby\Cms\Response as Response;

Kirby::plugin('foerdeliebe/sitemap', [
    'options' => [
        'ignore' => [
            'uri' => ['error'],
            'template' => [],
        ]
    ],
    'routes' => [
        [
            'pattern' => 'sitemap.xml',
            'action'  => function() {
                $ignore_template = kirby()->option('foerdeliebe.sitemap.ignore.template');
                $ignore_uri = kirby()->option('foerdeliebe.sitemap.ignore.uri');
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
