<?php namespace Anomaly\PartialsModule\Type\Form;

class TypeFormSections
{

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
                        ],
                        'css'     => [
                            'title'  => 'module::tab.css',
                            'fields' => [
                                'css'
                            ]
                        ],
                        'js'      => [
                            'title'  => 'module::tab.js',
                            'fields' => [
                                'js'
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}
