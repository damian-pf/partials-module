<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePartials_1_0_0_CreatePartialsFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePartials_1_0_0_CreatePartialsFields extends Migration
{

    /**
     * The module fields.
     *
     * @var array
     */
    protected $fields = [
        'name'        => 'anomaly.field_type.text',
        'description' => 'anomaly.field_type.textarea',
        'slug'        => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'name',
                'type'    => '_'
            ]
        ],
        'css'         => [
            'type'   => 'anomaly.field_type.editor',
            'config' => [
                'mode' => 'css'
            ]
        ],
        'js'          => [
            'type'   => 'anomaly.field_type.editor',
            'config' => [
                'mode' => 'javascript'
            ]
        ],
        'layout'      => [
            'type'   => 'anomaly.field_type.editor',
            'config' => [
                'default_value' => '<h1>{{ partial.entry.awesome }}</h1>',
                'mode'          => 'twig'
            ]
        ],
        'type'        => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\PartialsModule\Type\TypeModel'
            ]
        ],
        'entry'       => 'anomaly.field_type.polymorphic'
    ];

}
