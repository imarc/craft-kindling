<?php
namespace Imarc\Craft\Kindling\twigextensions;

class ArrayExtension extends \Twig\Extension\AbstractExtension
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
            new \Twig\TwigFunction('intersect', [$this, 'intersect']),
        ];
    }

    /**
     */
    public function intersect() {
        $args = func_get_args();

        return call_user_func_array('array_intersect', $args);
    }
}
