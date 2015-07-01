<?php namespace Anomaly\PartialsModule\Partial\Form\Command;

use Anomaly\PartialsModule\Entry\Form\EntryFormBuilder;
use Anomaly\PartialsModule\Partial\Form\PartialEntryFormBuilder;
use Anomaly\PartialsModule\Type\Contract\TypeRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;

/**
 * Class AddEntryFormFromRequest
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial\Form\Command
 */
class AddEntryFormFromRequest implements SelfHandling
{

    use DispatchesCommands;

    /**
     * The multiple form builder.
     *
     * @var PartialEntryFormBuilder
     */
    protected $builder;

    /**
     * Create a new AddEntryFormFromRequest instance.
     *
     * @param PartialEntryFormBuilder $builder
     */
    public function __construct(PartialEntryFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param TypeRepositoryInterface $types
     * @param EntryFormBuilder        $builder
     * @param Request                 $request
     */
    public function handle(TypeRepositoryInterface $types, EntryFormBuilder $builder, Request $request)
    {
        $type = $types->find($request->get('type'));

        $this->builder->addForm('entry', $builder->setModel($type->getEntryModelName()));
    }
}
