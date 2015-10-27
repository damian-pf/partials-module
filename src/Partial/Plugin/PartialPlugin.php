<?php namespace Anomaly\PartialsModule\Partial\Plugin;

use Anomaly\PartialsModule\Partial\Plugin\Command\RenderPartial;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class PartialPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial\Plugin
 */
class PartialPlugin extends Plugin
{

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'partial',
                function ($slug) {
                    return $this->dispatch(new RenderPartial($slug));
                },
                [
                    'is_safe' => ['html']
                ]
            )
        ];
    }
}
