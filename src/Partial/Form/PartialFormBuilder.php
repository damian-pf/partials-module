<?php namespace Anomaly\PartialsModule\Partial\Form;

use Anomaly\PartialsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class PartialFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial\Form
 */
class PartialFormBuilder extends FormBuilder
{

    /**
     * The partial type.
     *
     * @var null|TypeInterface
     */
    protected $type = null;

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        '*',
        'slug' => [
            'rules'      => [
                'unique_selector'
            ],
            'validators' => [
                'unique_selector' => [
                    'handler' => 'Anomaly\PartialsModule\Partial\Form\Validation\ValidateSelector@handle',
                    'message' => 'anomaly.module.partials::validation.unique_selector'
                ]
            ]
        ]
    ];

    /**
     * Skip these fields.
     *
     * @var array
     */
    protected $skips = [
        'type',
        'entry'
    ];

    /**
     * Fired when the builder is ready to build.
     *
     * @throws \Exception
     */
    public function onReady()
    {
        if (!$this->getType() && !$this->getEntry()) {
            throw new \Exception('The $type parameter is required when creating a partial.');
        }
    }

    /**
     * Get the type.
     *
     * @return TypeInterface|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the type.
     *
     * @param TypeInterface $type
     * @return $this
     */
    public function setType(TypeInterface $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Fired just before saving the form.
     */
    public function onSaving()
    {
        $entry = $this->getFormEntry();
        $type  = $this->getType();

        if (!$entry->type_id) {
            $entry->type_id = $type->getId();
        }
    }
}
