<?php
namespace Imarc\Craft\Kindling\twigextensions;

use Twig_Extension;
use Twig_SimpleFilter;

/**
 * Provides the wrapembeds Twig filter, which currently wraps iframes
 * within the input with:
 *
 * <div class="responsive_video">...</div>
 *
 */

class WrapEmbedsExtension extends Twig_Extension
{

    public function getName()
    {
        return 'WrapEmbeds Twig Extension';
    }

    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('wrapembeds', [$this, 'wrapembeds'], ['is_safe' => ['html']]),
        ];
    }

    public function wrapembeds($content)
    {
        return preg_replace('(<iframe.+?iframe>)si', '<div class="responsive_video">\0</div>', $content);
    }

}
