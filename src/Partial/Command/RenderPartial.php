<?php namespace Anomaly\PartialsModule\Partial\Command;

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
 * @package       Anomaly\PartialsModule\Partial\Command
 */
class RenderPartial implements SelfHandling
{

    /**
     * The partial.
     *
     * @var string
     */
    protected $partial;

    /**
     * Create a new RenderPartial instance.
     *
     * @param $partial
     */
    public function __construct($partial)
    {
        $this->partial = $partial;
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
        if (is_numeric($this->partial) && !$partial = $partials->find($this->partial)) {
            return null;
        }

        if (!is_numeric($this->partial) && !$partial = $partials->findBySlug($this->partial)) {
            return null;
        }

        if (is_object($this->partial)) {
            $partial = $this->partial;
        }

        if (!isset($partial)) {
            return null;
        }

        return $view->make('anomaly.module.partials::partial', compact('partial'))->render();
    }
}
