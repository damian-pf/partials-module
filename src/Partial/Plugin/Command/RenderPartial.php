<?php namespace Anomaly\PartialsModule\Partial\Plugin\Command;

use Anomaly\PartialsModule\Partial\Contract\PartialRepositoryInterface;
use Anomaly\Streams\Platform\Support\Decorator;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\View\Factory;

/**
 * Class RenderPartial
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial\Plugin\Command
 */
class RenderPartial implements SelfHandling
{

    /**
     * The partial slug.
     *
     * @var string
     */
    protected $slug;

    /**
     * Create a new RenderPartial instance.
     *
     * @param $slug
     */
    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Handle the command.
     *
     * @param PartialRepositoryInterface $partials
     * @param Decorator                  $decorator
     * @return string
     */
    public function handle(PartialRepositoryInterface $partials, Factory $view)
    {
        if (!$partial = $partials->findBySlug($this->slug)) {
            return null;
        }
        
        return $view->make('anomaly.module.partials::partial', compact('partial'))->render();
    }
}
