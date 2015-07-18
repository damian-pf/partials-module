<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePartials_1_0_0_CreatePartialsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePartials_1_0_0_CreatePartialsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'partials',
        'title_column' => 'name'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'  => [
            'required' => true,
            'unique'   => true
        ],
        'slug'  => [
            'required' => true,
            'unique'   => true
        ],
        'type'  => [
            'required' => true
        ],
        'entry' => [
            'required' => true
        ]
    ];

}
