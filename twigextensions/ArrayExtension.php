<?php
namespace Craft;

use Twig_Extension;
use Twig_SimpleFunction;

class ArrayExtension extends Twig_Extension
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Kindling Array Extension';
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('intersect', [$this, 'intersect']),
        ];
    }

    /**
     */
    public function intersect() {
        $args = func_get_args();

        return call_user_func_array('array_intersect', $args);
    }
}
