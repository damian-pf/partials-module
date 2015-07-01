<?php namespace Anomaly\PartialsModule\Type\Contract;

use Anomaly\Streams\Platform\Model\EloquentCollection;

/**
 * Interface TypeRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Type\Contract
 */
interface TypeRepositoryInterface
{

    /**
     * Return all available partial types.
     *
     * @return EloquentCollection
     */
    public function all();

    /**
     * Find a partial type by ID.
     *
     * @param $id
     * @return null|TypeInterface
     */
    public function find($id);

    /**
     * Find a partial by it's slug.
     *
     * @param $slug
     * @return null|TypeInterface
     */
    public function findBySlug($slug);
}
