<?php namespace Anomaly\PartialsModule;

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
     * The plugin functions.
     *
     * @var PartialsModulePluginFunctions
     */
    protected $functions;

    /**
     * Create a new PartialsModule instance.
     *
     * @param PartialsModulePluginFunctions $functions
     */
    public function __construct(PartialsModulePluginFunctions $functions)
    {
        $this->functions = $functions;
    }

    /**
     * Get the plugin functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('partials_render', [$this->functions, 'render'], ['is_safe' => ['html']])
        ];
    }
}
