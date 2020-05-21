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
    public function linkify($string) {

        $replacements = [
            "~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~" => "<a href=\"\\0\">\\0</a>",
            "~(\S+@\S+\.\S+)~" => "<a href=\"mailto:\\0\">\\0</a>",
        ];

        foreach ($replacements as $regex => $replace) {
            $string = preg_replace($regex, $replace, $string);
        }
        
        return $string;
    }
}