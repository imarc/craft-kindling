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
        return '1.2.0';
    }

	public function getSchemaVersion()
	{
		return '1.0.0';
	}

    public function getDeveloper()
    {
        return 'Imarc';
    }

    public function getDeveloperUrl()
    {
        return 'https://imarc.com';
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.kindling.twigextensions.PathingVariablesExtension');
        Craft::import('plugins.kindling.twigextensions.CookieExtension');
        Craft::import('plugins.kindling.twigextensions.ArrayExtension');

        return [
            new PathingVariablesExtension(),
            new CookieExtension(),
            new ArrayExtension()
        ];
    }
}
