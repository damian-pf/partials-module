<?php namespace Anomaly\PartialsModule\Type;

use Anomaly\PartialsModule\Type\Contract\TypeInterface;
use Anomaly\PartialsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentCollection;

/**
 * Class TypeRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Type
 */
class TypeRepository implements TypeRepositoryInterface
{

    /**
     * The partial type model.
     *
     * @var TypeModel
     */
    protected $model;

    /**
     * Create a new TypeRepository instance.
     *
     * @param TypeModel $model
     */
    public function __construct(TypeModel $model)
    {
        $this->model = $model;
    }

    /**
     * Return all available partial types.
     *
     * @return EloquentCollection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a partial type by ID.
     *
     * @param $id
     * @return null|TypeInterface
     */
    public function find($id)
    {
        return $this->model->find($id);
    }
}
