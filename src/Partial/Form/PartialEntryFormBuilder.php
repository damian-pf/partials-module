<?php namespace Anomaly\PartialsModule\Partial\Form;

use Anomaly\PartialsModule\Entry\Form\EntryFormBuilder;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;

/**
 * Class PartialEntryFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial\Form
 */
class PartialEntryFormBuilder extends MultipleFormBuilder
{

    /**
     * Fired after the entry form is saved.
     *
     * After the entry form is saved take the
     * entry and use it to populate the partial
     * before it saves directly after.
     *
     * @param EntryFormBuilder $builder
     */
    public function onSavedEntry(EntryFormBuilder $builder)
    {
        /* @var FormBuilder $form */
        $form = $this->forms->get('partial');

        $partial = $form->getFormEntry();

        $entry = $builder->getFormEntry();

        $partial->entry_id   = $entry->getId();
        $partial->entry_type = get_class($entry);
    }
}
