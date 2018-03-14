<?php
namespace Imarc\Craft\Kindling;

class Plugin extends \craft\base\Plugin
{
    public function init()
    {
        parent::init();

        if (Craft::$app->getIsSiteRequest()) {
            Craft::$app->view->registerTwigExtension(new PathingVariableExtension());
            Craft::$app->view->registerTwigExtension(new CookieExtension());
            Craft::$app->view->registerTwigExtension(new ArrayExtension());
            Craft::$app->view->registerTwigExtension(new WrapEmbedsExtension());
        }
    }
}
