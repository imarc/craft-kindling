<?php
namespace Craft;

/**
 * Provides the wrapembeds Twig filter, which currently wraps iframes
 * within the input with:
 *
 * <div class="responsive_video">...</div>
 *
 */

class WrapEmbedsExtension extends \Twig_Extension
{

    public function getName()
    {
        return 'WrapEmbeds Twig Extension';
    }

    public function getFilters()
    {
        return array('wrapembeds' => new \Twig_Filter_Method($this, 'wrapembeds'));
    }

    public function wrapembeds($content)
    {
        $filtered = preg_replace('(<iframe.+?iframe>)si', '<div class="responsive_video">\0</div>', $content);

        $charset = craft()->templates->getTwig()->getCharset();
        $filtered = new RichTextData($filtered, $charset);

        return $filtered;
    }
    
}