<?php
namespace Imarc\Craft\Kindling;

use Craft;

use \craft-kindling\twigextensions\ArrayExtension;
use \craft-kindling\twigextensions\CookieExtension;
use \craft-kindling\twigextensions\InflectionExtension;
use \craft-kindling\twigextensions\LinkingExtension;
use \craft-kindling\twigextensions\PathingVariablesExtension;
use \craft-kindling\twigextensions\WrapEmbedsExtension;

use \craft-kindling\variables\KindlingVariable;

class Plugin extends \craft\base\Plugin
{
    public function init()
    {
        parent::init();

        Craft::$app->view->registerTwigExtension(new ArrayExtension());
        Craft::$app->view->registerTwigExtension(new CookieExtension());
        Craft::$app->view->registerTwigExtension(new InflectionExtension());
        Craft::$app->view->registerTwigExtension(new LinkingExtension());
        Craft::$app->view->registerTwigExtension(new PathingVariablesExtension());
        Craft::$app->view->registerTwigExtension(new WrapEmbedsExtension());
    }
}
