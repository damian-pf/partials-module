<?php namespace Anomaly\PartialsModule;

use Anomaly\PartialsModule\Partial\Contract\PartialRepositoryInterface;
use Illuminate\View\View;

/**
 * Class PartialsModulePluginFunctions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial
 */
class PartialsModulePluginFunctions
{

    /**
     * The partials repository.
     *
     * @var PartialRepositoryInterface
     */
    protected $partials;

    /**
     * Create a new PartialsModulePluginFunctions instance.
     *
     * @param PartialRepositoryInterface $partials
     */
    public function __construct(PartialRepositoryInterface $partials)
    {
        $this->partials = $partials;
    }

    /**
     * Render a partial.
     *
     * @param $slug
     * @return null|View
     */
    public function render($slug)
    {
        if (!$partial = $this->partials->findBySlug($slug)) {
            return null;
        }

        return view('anomaly.module.partials::partial', compact('partial'))->render();
    }
}
