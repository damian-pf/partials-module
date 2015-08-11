<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePartialsCreatePartialsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePartialsCreatePartialsStream extends Migration
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
            'required' => true
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
        ],
        'css',
        'js'
    ];

}
