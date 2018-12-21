<?php
namespace Imarc\Craft\Kindling;

use Craft;

class KindlingVariable
{
    /**
     * Provides public access to the craft()->userSession->setFlash method from your Twig template:
     *
     *     {{ craft.kindling.setFlash(name, value, default) }}
     */
    public function setFlash($name, $value, $default = null)
    {
        craft()->userSession->setFlash($name, $value, $default);

        return true;
    }

    /**
     * Debuging helper method returns a text string stating the microtime required to execute the script 
     *
     *     {{ craft.kindling.executionTime }}
     */
    public function executionTime()
    {
        return 'Page executed in ' . (microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]) . ' seconds';
    }
}