<?php namespace Anomaly\PartialsModule\Partial\Contract;

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
     * Find a partial by ID.
     *
     * @param $id
     * @return null|PartialInterface
     */
    public function find($id);

    /**
     * Find a partial by it's slug.
     *
     * @param $slug
     * @return null|PartialInterface
     */
    public function findBySlug($slug);

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
