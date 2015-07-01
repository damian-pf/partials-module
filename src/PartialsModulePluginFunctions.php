<?php namespace Anomaly\PartialsModule;

use Anomaly\PartialsModule\Partial\Contract\PartialRepositoryInterface;

/**
 * Class PartialsModulePluginFunctions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule
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
     * Return a partial.
     *
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function partial($slug)
    {
        $partial = $this->partials->findBySlug($slug);

        return view('anomaly.module.partials::partial', compact('partial'));
    }
}
