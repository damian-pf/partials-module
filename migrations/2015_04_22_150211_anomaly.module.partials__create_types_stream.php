<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePartialsCreateTypesStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePartialsCreateTypesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'types',
        'title_column' => 'name'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'   => [
            'required' => true,
            'unique'   => true
        ],
        'slug'   => [
            'required' => true,
            'unique'   => true
        ],
        'layout' => [
            'required' => true
        ],
        'description',
        'css',
        'js'
    ];

}
