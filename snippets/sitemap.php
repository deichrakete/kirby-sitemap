<?php
/**
 * @var Kirby\Cms\Pages $pages
 * @var Kirby\Cms\Languages $languages
 * @var array $ignore_template
 * @var array $ignore_uri
 */

use Kirby\Cms\Page;

/**
 * @param Page $page
 * @param array $ignore_uri
 * @param array $ignore_template
 * @return bool
 */
function isWhitelisted(Page $page, array $ignore_uri, array $ignore_template): bool
{
    if (in_array($page->uri(), $ignore_uri)) {
        return false;
    }
    if (in_array($page->intendedTemplate(), $ignore_template)) {
        return false;
    }

    return true;
}

?>
<?= '<?xml version="1.0" encoding="utf-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">
    <?php foreach ($pages as $page): ?>
        <?php if (isWhitelisted($page, $ignore_uri, $ignore_template)): ?>
            <url>
                <loc><?= html($page->url()) ?></loc>
                <?php if ($page->modified()): ?>
                    <lastmod><?= $page->modified('c', 'date') ?></lastmod>
                <?php endif; ?>
                <priority><?= $page->isHomePage()
                        ? 1
                        : number_format(0.5 / $page->depth(), 1) ?></priority>
                <?php if (kirby()->option('foerdeliebe.sitemap.languages')): ?>
                    <?php foreach ($languages as $language): ?>
                        <xhtml:link rel="alternate" hreflang="<?= $language->code() ?>" href="<?= html($page->url($language->code())) ?>" />
                    <?php endforeach; ?>
                <?php endif; ?>
            </url>
        <?php endif; ?>
    <?php endforeach; ?>
</urlset>
