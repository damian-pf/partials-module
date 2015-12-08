<?php namespace Anomaly\PartialsModule;

use Anomaly\PartialsModule\Partial\Command\RenderPartial;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class PartialsModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule
 */
class PartialsModulePlugin extends Plugin
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
                'render_partial',
                function ($partial) {
                    return $this->dispatch(new RenderPartial($partial));
                },
                [
                    'is_safe' => ['html']
                ]
            ),
            new \Twig_SimpleFunction(
                'partial',
                function ($partial) {
                    return $this->dispatch(new RenderPartial($partial));
                },
                [
                    'is_safe' => ['html']
                ]
            )
        ];
    }
}
