<?php
namespace Imarc\Craft\Kindling;

use Craft;

class Plugin extends \craft\base\Plugin
{
    public function init()
    {
        parent::init();

        Craft::$app->view->registerTwigExtension(new PathingVariablesExtension());
        Craft::$app->view->registerTwigExtension(new CookieExtension());
        Craft::$app->view->registerTwigExtension(new ArrayExtension());
        Craft::$app->view->registerTwigExtension(new WrapEmbedsExtension());
        Craft::$app->view->registerTwigExtension(new InflectionExtension());
    }
}
