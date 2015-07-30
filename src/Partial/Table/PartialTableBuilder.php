<?php namespace Anomaly\PartialsModule\Partial\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class PartialTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial\Table
 */
class PartialTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'type'
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'name',
        'selector',
        'entry.type.name'
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit'
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete'
    ];

}
