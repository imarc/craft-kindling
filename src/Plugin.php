<?php
namespace Imarc\Craft\Kindling;

use Imarc\Craft\Kindling\variables\KindlingVariable;
use Imarc\Craft\Kindling\twigextensions\ArrayExtension;
use Imarc\Craft\Kindling\twigextensions\CookieExtension;
use Imarc\Craft\Kindling\twigextensions\InflectionExtension;
use Imarc\Craft\Kindling\twigextensions\LinkingExtension;
use Imarc\Craft\Kindling\twigextensions\PathingVariablesExtension;
use Imarc\Craft\Kindling\twigextensions\WrapEmbedsExtension;


use Craft;
use craft\web\twig\variables\CraftVariable;
use yii\base\Event;

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

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('kindling', KindlingVariable::class);
            }
        );

    }
}
