<?php namespace Anomaly\PartialsModule\Partial\Form\Command;

use Anomaly\PartialsModule\Partial\Contract\PartialInterface;
use Anomaly\PartialsModule\Partial\Form\PartialEntryFormBuilder;
use Anomaly\PartialsModule\Partial\Form\PartialFormBuilder;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class AddPartialFormFromPartial
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial\Form\Command
 */
class AddPartialFormFromPartial implements SelfHandling
{

    use DispatchesJobs;

    /**
     * The multiple form builder.
     *
     * @var PartialEntryFormBuilder
     */
    protected $builder;

    /**
     * The partial instance.
     *
     * @var PartialInterface
     */
    protected $partial;

    /**
     * Create a new AddPartialFormFromPartial instance.
     *
     * @param PartialEntryFormBuilder $builder
     * @param PartialInterface        $partial
     */
    public function __construct(PartialEntryFormBuilder $builder, PartialInterface $partial)
    {
        $this->builder = $builder;
        $this->partial = $partial;
    }

    /**
     * Handle the command.
     *
     * @param PartialFormBuilder $builder
     */
    public function handle(PartialFormBuilder $builder)
    {
        $builder->setEntry($this->partial->getId());

        $this->builder->addForm('partial', $builder);
    }
}
