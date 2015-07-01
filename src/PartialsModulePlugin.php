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
     * Create a new PartialsModulePlugin instance.
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
            new \Twig_SimpleFunction('partial', [$this->functions, 'partial'], ['is_safe' => ['html']])
        ];
    }
}
