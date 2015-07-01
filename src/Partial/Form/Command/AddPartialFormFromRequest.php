<?php namespace Anomaly\PartialsModule\Partial\Form\Command;

use Anomaly\PartialsModule\Partial\Form\PartialEntryFormBuilder;
use Anomaly\PartialsModule\Partial\Form\PartialFormBuilder;
use Anomaly\PartialsModule\Type\Contract\TypeRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Http\Request;

/**
 * Class AddPartialFormFromRequest
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial\Form\Command
 */
class AddPartialFormFromRequest implements SelfHandling
{

    /**
     * The multiple form builder.
     *
     * @var PartialEntryFormBuilder
     */
    protected $builder;

    /**
     * Create a new AddPartialFormFromRequest instance.
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
     * @param PartialFormBuilder      $builder
     * @param Request                 $request
     */
    public function handle(TypeRepositoryInterface $types, PartialFormBuilder $builder, Request $request)
    {
        $this->builder->addForm('partial', $builder->setType($types->find($request->get('type'))));
    }
}
