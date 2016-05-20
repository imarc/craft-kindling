<?php
namespace Craft;

class KindlingPlugin extends BasePlugin
{
    public function getName()
    {
        return 'Kindling';
    }

    public function getVersion()
    {
        return '1.0';
    }

    public function getDeveloper()
    {
        return 'Imarc';
    }

    public function getDeveloperUrl()
    {
        return 'http://imarc.com';
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.kindling.twigextensions.PathingVariablesExtension');
        Craft::import('plugins.kindling.twigextensions.CookieExtension');
        Craft::import('plugins.kindling.twigextensions.InflectionExtension');

        return [
            new PathingVariablesExtension(),
            new CookieExtension(),
            new InflectionExtension(),
        ];
    }
}
