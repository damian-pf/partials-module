<?php namespace Anomaly\PartialsModule\Type\Form;

/**
 * Class TypeFormSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Type\Form
 */
class TypeFormSections
{

    /**
     * Handle the form sections.
     *
     * @param TypeFormBuilder $builder
     */
    public function handle(TypeFormBuilder $builder)
    {
        $builder->setSections(
            [
                'general' => [
                    'tabs' => [
                        'general' => [
                            'title'  => 'module::tab.general',
                            'fields' => [
                                'name',
                                'slug',
                                'description'
                            ]
                        ],
                        'layout'  => [
                            'title'  => 'module::tab.layout',
                            'fields' => [
                                'layout'
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}
