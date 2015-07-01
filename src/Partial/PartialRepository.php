<?php namespace Anomaly\PartialsModule\Partial;

use Anomaly\PartialsModule\Partial\Contract\PartialInterface;
use Anomaly\PartialsModule\Partial\Contract\PartialRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;

/**
 * Class PartialRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial
 */
class PartialRepository implements PartialRepositoryInterface
{

    /**
     * The partial model.
     *
     * @var PartialModel
     */
    protected $model;

    /**
     * Create a new PartialRepositoryInterface instance.
     *
     * @param PartialModel $model
     */
    public function __construct(PartialModel $model)
    {
        $this->model = $model;
    }

    /**
     * Return all partials.
     *
     * @return PartialCollection
     */
    public function all()
    {
        return $this->model->ordered()->get();
    }

    /**
     * Return the first partial.
     *
     * @return PartialInterface
     */
    public function first()
    {
        return $this->model->ordered()->first();
    }

    /**
     * Find a partial by ID.
     *
     * @param $id
     * @return null|PartialInterface
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Find a partial by it's path.
     *
     * @param $path
     * @return null|PartialInterface
     */
    public function findByPath($path)
    {
        return $this->model->where('home', false)->where('path', $path)->first();
    }

    /**
     * Save a partial.
     *
     * @param PartialInterface|EloquentModel $partial
     * @return PartialInterface
     */
    public function save(PartialInterface $partial)
    {
        return $partial->save();
    }

    /**
     * Delete a partial.
     *
     * @param PartialInterface|EloquentModel $partial
     * @return bool
     */
    public function delete(PartialInterface $partial)
    {
        return $partial->delete();
    }
}
