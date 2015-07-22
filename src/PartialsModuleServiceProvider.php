<?php namespace Anomaly\PartialsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class PartialsModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule
 */
class PartialsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The module plugins.
     *
     * @var array
     */
    protected $plugins = [
        'Anomaly\PartialsModule\PartialsModulePlugin'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\PartialsModule\Type\Contract\TypeRepositoryInterface'       => 'Anomaly\PartialsModule\Type\TypeRepository',
        'Anomaly\PartialsModule\Partial\Contract\PartialRepositoryInterface' => 'Anomaly\PartialsModule\Partial\PartialRepository'
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/partials'                                           => 'Anomaly\PartialsModule\Http\Controller\Admin\PartialsController@index',
        'admin/partials/choose'                                    => 'Anomaly\PartialsModule\Http\Controller\Admin\PartialsController@choose',
        'admin/partials/create'                                    => 'Anomaly\PartialsModule\Http\Controller\Admin\PartialsController@create',
        'admin/partials/edit/{id}'                                 => 'Anomaly\PartialsModule\Http\Controller\Admin\PartialsController@edit',
        'admin/partials/view/{id}'                                 => 'Anomaly\PartialsModule\Http\Controller\Admin\PartialsController@view',
        'admin/partials/delete/{id}'                               => 'Anomaly\PartialsModule\Http\Controller\Admin\PartialsController@delete',
        'admin/partials/types'                                     => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@index',
        'admin/partials/types/create'                              => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@create',
        'admin/partials/types/edit/{id}'                           => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@edit',
        'admin/partials/types/fields/{id}'                         => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@fields',
        'admin/partials/types/choose/{id}'                         => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@choose',
        'admin/partials/types/fields/{id}/assign/{field}'          => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@assign',
        'admin/partials/types/fields/{id}/assignment/{assignment}' => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@assignment',
        'admin/partials/fields'                                    => 'Anomaly\PartialsModule\Http\Controller\Admin\FieldsController@index',
        'admin/partials/fields/choose'                             => 'Anomaly\PartialsModule\Http\Controller\Admin\FieldsController@choose',
        'admin/partials/fields/create'                             => 'Anomaly\PartialsModule\Http\Controller\Admin\FieldsController@create',
        'admin/partials/fields/edit/{id}'                          => 'Anomaly\PartialsModule\Http\Controller\Admin\FieldsController@edit',
        'admin/partials/settings'                                  => 'Anomaly\PartialsModule\Http\Controller\Admin\SettingsController@index',
    ];

}
