<?php
namespace Craft;

class KindlingPlugin extends BasePlugin
{
    function getName()
    {
        return 'Kindling';
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'Imarc';
    }

    function getDeveloperUrl()
    {
        return 'http://imarc.com';
    }

    function addTwigExtension()
    {
        Craft::import('plugins.kindling.twigextensions.PathingVariablesExtension');
        return new PathingVariablesExtension();
    }
}
