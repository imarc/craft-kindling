<?php
namespace Imarc\Craft\Kindling;

use Craft;

class Plugin extends \craft\base\Plugin
{
    public function init()
    {
        parent::init();

        Craft::$app->view->twig->addExtension(new PathingVariablesExtension());
        Craft::$app->view->twig->addExtension(new CookieExtension());
        Craft::$app->view->twig->addExtension(new ArrayExtension());
        Craft::$app->view->twig->addExtension(new WrapEmbedsExtension());
        Craft::$app->view->twig->addExtension(new InflectionExtension());
    }
}
