<?php namespace Anomaly\PartialsModule;

use Anomaly\PartialsModule\Partial\Contract\PartialRepositoryInterface;
use Anomaly\Streams\Platform\Asset\Asset;
use Illuminate\View\View;

/**
 * Class PartialsModuleFunctions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial
 */
class PartialsModuleFunctions
{

    /**
     * The partials repository.
     *
     * @var PartialRepositoryInterface
     */
    protected $partials;

    /**
     * Create a new PartialsModuleFunctions instance.
     *
     * @param PartialRepositoryInterface $partials
     */
    public function __construct(PartialRepositoryInterface $partials, Asset $asset)
    {
        $this->asset    = $asset;
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
