<?php namespace Anomaly\PartialsModule\Partial\Form\Validation;

use Anomaly\PartialsModule\Partial\Contract\PartialRepositoryInterface;
use Anomaly\PartialsModule\Partial\Form\PartialEntryFormBuilder;
use Anomaly\PartialsModule\Partial\Form\PartialFormBuilder;

/**
 * Class ValidateSelector
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial\Form\Validation
 */
class ValidateSelector
{

    /**
     * Handle the validator.
     *
     * @param PartialRepositoryInterface $partials
     * @param PartialEntryFormBuilder    $builder
     * @param                            $value
     */
    public function handle(PartialRepositoryInterface $partials, PartialEntryFormBuilder $builder, $value)
    {
        /* @var PartialFormBuilder $form */
        $form  = $builder->getChildForm('partial');
        $entry = $builder->getChildFormEntry('partial');

        $type = $form->getType();

        if (!$partial = $partials->findBySelector($selector = $type->getSlug() . '.' . $value)) {
            return true;
        }

        if ($partial->getId() !== $entry->getId()) {
            return false;
        }

        return true;
    }
}
