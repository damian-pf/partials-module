<?php namespace Anomaly\PartialsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class PartialsModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule
 */
class PartialsModule extends Module
{

    /**
     * The module icon.
     *
     * @var string
     */
    protected $icon = 'laptop';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'partials' => [
            'buttons' => [
                'new_partial' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/partials/ajax/choose_type'
                ]
            ]
        ],
        'types'    => [
            'buttons' => [
                'new_type',
                'add_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'enabled'     => 'admin/partials/types/fields/*',
                    'href'        => 'admin/partials/ajax/choose_field/{route.parameters.id}'
                ]
            ]
        ],
        'fields'   => [
            'buttons' => [
                'new_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/partials/fields/choose'
                ]
            ]
        ],
        'settings'
    ];

}
