<?php
namespace Imarc\Craft\Kindling;

use Twig_Extension;
use Twig_SimpleFunction;

class LinkingExtension extends Twig_Extension
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Kindling Linking Extension';
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('linkify', [$this, 'linkify']),
        ];
    }

    /**
     */
    public function linkify($text_content) {
        return preg_replace(
                      "~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~",
                      "<a href=\"\\0\">\\0</a>", 
                      $text_content);
    }
}




        