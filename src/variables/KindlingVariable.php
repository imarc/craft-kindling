<?php
namespace Imarc\Craft\Kindling\variables;

use Imarc\Craft\Kindling\Plugin;

use Craft;

class KindlingVariable
{
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