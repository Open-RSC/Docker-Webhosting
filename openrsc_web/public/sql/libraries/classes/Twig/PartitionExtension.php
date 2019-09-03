<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Twig\PartitionExtension class.
 */

namespace PhpMyAdmin\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

/**
 * Class PartitionExtension.
 */
class PartitionExtension extends AbstractExtension
{
    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            new TwigFunction(
                'Partition_getPartitions',
                'PhpMyAdmin\Partition::getPartitions',
                ['is_safe' => ['html']]
            ),
        ];
    }
}
