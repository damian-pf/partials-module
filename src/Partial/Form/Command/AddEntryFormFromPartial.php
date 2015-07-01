<?php namespace Anomaly\PartialsModule\Partial\Form\Command;

use Anomaly\PartialsModule\Entry\Form\EntryFormBuilder;
use Anomaly\PartialsModule\Partial\Contract\PartialInterface;
use Anomaly\PartialsModule\Partial\Form\PartialEntryFormBuilder;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class AddEntryFormFromPartial
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial\Form\Command
 */
class AddEntryFormFromPartial implements SelfHandling
{

    use DispatchesCommands;

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
     * Create a new AddEntryFormFromPartial instance.
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
     * @param EntryFormBuilder $builder
     */
    public function handle(EntryFormBuilder $builder)
    {
        $type = $this->partial->getType();

        $builder->setModel($type->getEntryModelName());
        $builder->setEntry($this->partial->getEntryId());

        $this->builder->addForm('entry', $builder);
    }
}
