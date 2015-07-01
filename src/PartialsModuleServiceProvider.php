<?php namespace Anomaly\PartialsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Filesystem\Filesystem;

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
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/partials'                                           => 'Anomaly\PartialsModule\Http\Controller\Admin\PartialsController@index',
        'admin/partials/create'                                    => 'Anomaly\PartialsModule\Http\Controller\Admin\PartialsController@create',
        'admin/partials/edit/{id}'                                 => 'Anomaly\PartialsModule\Http\Controller\Admin\PartialsController@edit',
        'admin/partials/view/{id}'                                 => 'Anomaly\PartialsModule\Http\Controller\Admin\PartialsController@view',
        'admin/partials/delete/{id}'                               => 'Anomaly\PartialsModule\Http\Controller\Admin\PartialsController@delete',
        'admin/partials/types'                                     => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@index',
        'admin/partials/types/create'                              => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@create',
        'admin/partials/types/edit/{id}'                           => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@edit',
        'admin/partials/types/fields/{id}'                         => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@fields',
        'admin/partials/types/fields/{id}/assign/{field}'          => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@assign',
        'admin/partials/types/fields/{id}/assignment/{assignment}' => 'Anomaly\PartialsModule\Http\Controller\Admin\TypesController@assignment',
        'admin/partials/fields'                                    => 'Anomaly\PartialsModule\Http\Controller\Admin\FieldsController@index',
        'admin/partials/fields/choose'                             => 'Anomaly\PartialsModule\Http\Controller\Admin\FieldsController@choose',
        'admin/partials/fields/create'                             => 'Anomaly\PartialsModule\Http\Controller\Admin\FieldsController@create',
        'admin/partials/fields/edit/{id}'                          => 'Anomaly\PartialsModule\Http\Controller\Admin\FieldsController@edit',
        'admin/partials/ajax/choose_type'                          => 'Anomaly\PartialsModule\Http\Controller\Admin\AjaxController@chooseType',
        'admin/partials/ajax/choose_field/{id}'                    => 'Anomaly\PartialsModule\Http\Controller\Admin\AjaxController@chooseField',
        'admin/partials/settings'                                  => 'Anomaly\PartialsModule\Http\Controller\Admin\SettingsController@index',
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\Streams\Platform\Model\Partials\PartialsPartialsEntryModel' => 'Anomaly\PartialsModule\Partial\PartialModel',
        'Anomaly\Streams\Platform\Model\Partials\PartialsTypesEntryModel'    => 'Anomaly\PartialsModule\Type\TypeModel'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\PartialsModule\Partial\Contract\PartialRepositoryInterface' => 'Anomaly\PartialsModule\Partial\PartialRepository',
        'Anomaly\PartialsModule\Type\Contract\TypeRepositoryInterface'       => 'Anomaly\PartialsModule\Type\TypeRepository'
    ];

    /**
     * Map additional routes.
     *
     * @param Filesystem  $files
     * @param Application $application
     */
    public function map(Filesystem $files, Application $application)
    {
        // Include public routes.
        if ($files->exists($routes = $application->getStoragePath('partials/routes.php'))) {
            $files->requireOnce($routes);
        }
    }
}
