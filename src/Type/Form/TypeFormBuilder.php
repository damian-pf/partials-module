<?php namespace Anomaly\PartialsModule\Type\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class TypeFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Type\Form
 */
class TypeFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        '*',
        'slug' => [
            'disabled' => 'edit'
        ]
    ];
}
