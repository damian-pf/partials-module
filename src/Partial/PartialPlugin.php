<?php namespace Anomaly\PartialsModule\Partial;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class PartialPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule
 */
class PartialPlugin extends Plugin
{

    /**
     * The plugin functions.
     *
     * @var PartialPluginFunctions
     */
    protected $functions;

    /**
     * Create a new PartialPlugin instance.
     *
     * @param PartialPluginFunctions $functions
     */
    public function __construct(PartialPluginFunctions $functions)
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
