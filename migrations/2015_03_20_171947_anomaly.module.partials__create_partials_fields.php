<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePartialsCreatePartialsFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePartialsCreatePartialsFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name'        => 'anomaly.field_type.text',
        'description' => 'anomaly.field_type.textarea',
        'slug'        => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'name'
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
                'mode'          => 'twig',
                'default_value' => '<h1>{{ partial.entry.field_slug }}</h1>'
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
