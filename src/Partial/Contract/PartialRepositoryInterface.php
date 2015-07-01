<?php namespace Anomaly\PartialsModule\Partial\Contract;

use Anomaly\PartialsModule\Partial\PartialCollection;

/**
 * Interface PartialRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial\Contract
 */
interface PartialRepositoryInterface
{

    /**
     * Return all partials.
     *
     * @return PartialCollection
     */
    public function all();

    /**
     * Return the first partial.
     *
     * @return PartialInterface
     */
    public function first();

    /**
     * Find a partial by ID.
     *
     * @param $id
     * @return null|PartialInterface
     */
    public function find($id);

    /**
     * Find a partial by it's path.
     *
     * @param $path
     * @return null|PartialInterface
     */
    public function findByPath($path);

    /**
     * Save a partial.
     *
     * @param PartialInterface $partial
     * @return PartialInterface
     */
    public function save(PartialInterface $partial);

    /**
     * Delete a partial.
     *
     * @param PartialInterface $partial
     * @return bool
     */
    public function delete(PartialInterface $partial);
}
